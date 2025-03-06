<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhoaHoc;

class KhoaHocController extends Controller
{
    public function index()
    {
        $khoahocs = KhoaHoc::all();
        return view('khoahocs.index', compact('khoahocs'));
    }

    public function create()
    {
        return view('khoahocs.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'ten_khoa_hoc' => 'required|string|max:255',
            'so_tin_chi' => 'required|integer|min:0',
            'giang_vien' => 'required|string|max:255',
        ]);

        Khoahoc::create($request->all());

        return redirect()->route('khoahocs.index')->with('success', 'Khóa học đã được thêm thành công!');
    }


    public function edit(KhoaHoc $khoahoc)
    {
        return view('khoahocs.edit', compact('khoahoc'));
    }

    public function update(Request $request, KhoaHoc $khoahoc)
    {
        $request->validate([
            'ten_khoa_hoc' => 'required|string|max:255',
            'so_tin_chi' => 'required|integer|min:0',
            'giang_vien' => 'required|string|max:255',
        ]);

        $khoahoc->update($request->all());

        return redirect()->route('khoahocs.index')->with('success', 'Khóa học đã được cập nhật thành công!');
    }

    public function destroy(KhoaHoc $khoahoc)
    {
        $khoahoc->delete();

        return redirect()->route('khoahocs.index')->with('success', 'Khóa học đã được xóa thành công!');
    }
    public function show($id)
    {
        $khoahoc = KhoaHoc::with('hocViens')->findOrFail($id);
        return view('khoahocs.show', compact('khoahoc'));
    }
}
