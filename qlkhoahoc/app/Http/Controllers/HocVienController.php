<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

use App\Models\HocVien;
use Illuminate\Http\Request;

class HocVienController extends Controller
{
    public function index()
    {
        $hocViens = HocVien::all();
        return view('hocviens.index', compact('hocViens'));
    }

    public function create()
    {
        return view('hocviens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required',
            'email' => 'required|email|unique:hoc_viens',
            'so_dien_thoai' => 'required',
            'dia_chi' => 'required',
            'ngay_sinh' => 'required|date',
        ]);

        HocVien::create($request->only(['ho_ten', 'email', 'so_dien_thoai', 'dia_chi', 'ngay_sinh']));

        return redirect()->route('hocviens.index')->with('success', 'Học viên được thêm thành công.');
    }

    public function edit(HocVien $hocvien)
    {
        return view('hocviens.edit', compact('hocvien'));
    }

    public function update(Request $request, HocVien $hocvien)
    {
        $request->validate([
            'ho_ten' => 'required',
            'email' => 'required|email|unique:hoc_viens,email,' . $hocvien->id,
            'so_dien_thoai' => 'required',
            'dia_chi' => 'required',
            'ngay_sinh' => 'required|date',
        ]);

        $hocvien->update($request->only(['ho_ten', 'email', 'so_dien_thoai', 'dia_chi', 'ngay_sinh']));

        return redirect()->route('hocviens.index')->with('success', 'Cập nhật học viên thành công.');
    }

    public function destroy(HocVien $hocvien)
    {
        $hocvien->delete();
        return redirect()->route('hocviens.index')->with('success', 'Xóa học viên thành công.');
    }
}
