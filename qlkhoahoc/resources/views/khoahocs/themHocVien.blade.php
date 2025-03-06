<x-app-layout title="Thêm học viên vào khóa học {{ $khoahoc->ten_khoa_hoc }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm học viên - ' . $khoahoc->ten_khoa_hoc) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('dangky.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="khoa_hoc_id" value="{{ $khoahoc->id }}">

                    <label for="hoc_vien_id">Chọn học viên:</label>
                    <select name="hoc_vien_id" required>
                        @foreach($hocviens as $hocvien)
                            <option value="{{ $hocvien->id }}">{{ $hocvien->ho_ten }} - {{ $hocvien->email }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary mb-3">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
