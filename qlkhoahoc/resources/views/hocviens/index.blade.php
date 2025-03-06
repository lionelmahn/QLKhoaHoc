<x-app-layout title="Danh sách học viên">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh sách học viên') }}
        </h2>
    </x-slot>

    <div class="container w-75 mx-auto mt-5">

        <a href="{{ route('hocviens.create') }}" class="btn btn-primary mb-3">Thêm học viên</a>
        @if ($message = Session::get('success'))
            <div id="alert" class="alert alert-success">{{ $message }}</div>
        @endif
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày sinh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hocViens as $hocvien)
                    <tr>
                        <td>{{ $hocvien->ho_ten }}</td>
                        <td>{{ $hocvien->email }}</td>
                        <td>{{ $hocvien->so_dien_thoai }}</td>
                        <td>{{ $hocvien->dia_chi }}</td>
                        <td>{{ $hocvien->ngay_sinh }}</td>
                        <td>
                            <a href="{{ route('hocviens.edit', $hocvien->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $hocvien->id }})">Xóa</button>
                            <form id="delete-form-{{ $hocvien->id }}" action="{{ route('hocviens.destroy', $hocvien->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Hành động này sẽ không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa ngay',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
    document.addEventListener("DOMContentLoaded", function () {
        let alertBox = document.getElementById("alert");
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.display = "none";
            }, 3000); 
        }
    });
</script>
