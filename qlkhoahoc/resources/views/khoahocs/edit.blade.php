<x-app-layout title="Sửa khóa học">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa khóa học') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('khoahocs.update', $khoahoc) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label>Tên khóa học</label>
                        <input type="text" name="ten_khoa_hoc" value="{{ $khoahoc->ten_khoa_hoc }}" class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Số tín chỉ</label>
                        <input type="number" name="so_tin_chi" value="{{ $khoahoc->so_tin_chi }}" class="border rounded p-2 w-full">
                    </div>
                    <div>
                        <label>Giảng viên</label>
                        <input type="text" name="giang_vien" value="{{ $khoahoc->giang_vien }}" class="border rounded p-2 w-full">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>