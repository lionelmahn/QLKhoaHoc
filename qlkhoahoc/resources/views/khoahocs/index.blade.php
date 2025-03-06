<x-app-layout title="Danh sách khóa học">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách khóa học') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if ($message = Session::get('success'))
                <div id="alert" class="alert alert-success">
                    {{ $message }}
                </div>
                @endif
                <a href="{{ route('khoahocs.create') }}" class="btn btn-primary mb-3">Thêm khóa học</a>
                <table class="table-auto w-full mt-4 border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Tên khóa học</th>
                            <th class="border px-4 py-2">Số tín chỉ</th>
                            <th class="border px-4 py-2">Giảng viên</th>
                            <th class="border px-4 py-2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($khoahocs as $khoahoc)
                            <tr>
                                <td class="border px-4 py-2">{{ $khoahoc->ten_khoa_hoc }}</td>
                                <td class="border px-4 py-2">{{ $khoahoc->so_tin_chi }}</td>
                                <td class="border px-4 py-2">{{ $khoahoc->giang_vien }}</td>
                                <td class="border px-4 py-2 flex gap-2">
                                    <a href="{{ route('khoahocs.edit', $khoahoc) }}" class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="{{ route('khoahocs.destroy', $khoahoc) }}" method="POST" class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-button">Xóa</button>
                                    </form>
                                    <a href="{{ route('khoahocs.show', $khoahoc) }}" class="btn btn-info btn-sm">Quản lý</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-button").forEach(button => {
            button.addEventListener("click", function () {
                let form = this.closest(".delete-form");

                Swal.fire({
                    title: "Bạn có chắc chắn muốn xóa?",
                    text: "Thao tác này không thể hoàn tác!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Xóa!",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        let alertBox = document.getElementById("alert");
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.display = "none";
            }, 3000); 
        }
    });
</script>