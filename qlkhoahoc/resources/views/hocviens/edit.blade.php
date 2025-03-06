<x-app-layout title="Sửa học viên">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cập nhật học viên') }}
        </h2>
    </x-slot>

    <div class="container w-75 mx-auto mt-5">

        <form action="{{ route('hocviens.update', $hocvien->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Họ tên:</label>
                <input type="text" name="ho_ten" class="form-control" value="{{ $hocvien->ho_ten }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $hocvien->email }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại:</label>
                <input type="text" name="so_dien_thoai" class="form-control" required pattern="\d{10}" oninvalid="this.setCustomValidity('Số điện thoại phải gồm đúng 10 chữ số.')" oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ:</label>
                <input type="text" name="dia_chi" class="form-control" value="{{ $hocvien->dia_chi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày sinh:</label>
                <input type="date" name="ngay_sinh" class="form-control" value="{{ $hocvien->ngay_sinh }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</x-app-layout>
