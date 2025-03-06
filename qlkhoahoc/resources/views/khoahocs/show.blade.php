<x-app-layout title="Quản lý học viên - {{ $khoahoc->ten_khoa_hoc }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quản lý học viên - ' . $khoahoc->ten_khoa_hoc) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('khoahocs.themHocVien', $khoahoc->id) }}" class="btn btn-primary mb-3">
                Thêm học viên
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold">Danh sách học viên</h3>                
                <table class="table-auto w-full mt-4 border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Họ tên</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Số điện thoại</th>
                            <th class="border px-4 py-2">Điểm</th>
                            <th class="border px-4 py-2 flex gap-2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($khoahoc->hocViens as $hocvien)
                            <tr>
                                <td class="border px-4 py-2">{{ $hocvien->ho_ten }}</td>
                                <td class="border px-4 py-2">{{ $hocvien->email }}</td>
                                <td class="border px-4 py-2">{{ $hocvien->so_dien_thoai }}</td>
                                <td class="border px-4 py-2">
                                    {{ optional($hocvien->pivot)->diem ?? 'Chưa có điểm' }}
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('capnhatdiem', ['hoc_vien_id' => $hocvien->id, 'khoa_hoc_id' => $khoahoc->id]) }}" method="POST">
                                        @csrf
                                        <input type="number" name="diem" step="0.1" value="{{ optional($hocvien->pivot)->diem ?? '' }}" required>
                                        <button type="submit" class="btn btn-primary mb-3">Cập nhật</button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>