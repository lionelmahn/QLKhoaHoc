<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DangKyKhoaHoc;
use App\Models\LichSuDiem;
use App\Models\KhoaHoc;
use App\Models\HocVien;

class DangKyController extends Controller
{
    public function capNhatDiem(Request $request, $hoc_vien_id, $khoa_hoc_id)
    {
        $dangKy = DangKyKhoaHoc::where('hoc_vien_id', $hoc_vien_id)
            ->where('khoa_hoc_id', $khoa_hoc_id)
            ->firstOrFail();

        $diemCu = $dangKy->diem;
        $diemMoi = $request->input('diem');

        if ($diemCu !== $diemMoi) {
            LichSuDiem::create([
                'dang_ky_id' => $dangKy->id,
                'diem_cu' => $diemCu,
                'diem_moi' => $diemMoi,
                'thoi_gian_cap_nhat' => now(),
            ]);
        }

        $dangKy->update(['diem' => $diemMoi]);
        return back()->with('success', 'Cập nhật điểm thành công!');
    }



    public function themHocVien($id)
    {
        $khoahoc = KhoaHoc::findOrFail($id);
        $hocviens = HocVien::whereDoesntHave('khoaHocs', function ($query) use ($id) {
            $query->where('khoa_hoc_id', $id);
        })->get();

        return view('khoahocs.themHocVien', compact('khoahoc', 'hocviens'));
    }

    public function luuHocVien(Request $request, $id)
    {
        $khoahoc = KhoaHoc::findOrFail($id);
        $hocvien_id = $request->input('hoc_vien_id');

        if ($hocvien_id) {
            DangKyKhoaHoc::create([
                'hoc_vien_id' => $hocvien_id,
                'khoa_hoc_id' => $id,
                'ngay_dang_ky' => now()->toDateString(), 
                'diem' => null
            ]);

            return redirect()->route('khoahocs.show', $id)->with('success', 'Thêm học viên thành công!');
        }

        return back()->with('error', 'Vui lòng chọn học viên!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hoc_vien_id' => 'required|exists:hoc_viens,id',
            'khoa_hoc_id' => 'required|exists:khoa_hocs,id',
        ]);


        $daDangKy = DangKyKhoaHoc::where('hoc_vien_id', $request->hoc_vien_id)
            ->where('khoa_hoc_id', $request->khoa_hoc_id)
            ->exists();

        if ($daDangKy) {
            return back()->with('error', 'Học viên đã đăng ký khóa học này!');
        }

      
        DangKyKhoaHoc::create([
            'hoc_vien_id' => $request->hoc_vien_id,
            'khoa_hoc_id' => $request->khoa_hoc_id,
            'diem' => null, 
        ]);

        return back()->with('success', 'Đăng ký khóa học thành công!');
    }
}
