@extends('admin.index')

@section('admin_content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
            <div class="px-4 py-5">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">
                        <i class="fas fa-user mr-2"></i>
                        Thêm tài khoản
                    </h2>
                </div>

                <form action="/admin/taikhoan/them" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="ten_nguoi_dung" class="block text-sm font-medium text-gray-700">Tên người dùng</label>
                        <input type="text" name="ten_nguoi_dung" id="ten_nguoi_dung" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"/>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"/>
                    </div>

                    <div>
                        <label for="sdt" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="text" name="sdt" id="sdt" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"/>
                    </div>

                    <div>
                        <label for="ten_dang_nhap" class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                        <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"/>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                        <input type="password" name="password" id="password" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"/>
                    </div>

                    <div>
                        <label for="id_phan_quyen" class="block text-sm font-medium text-gray-700">Phân quyền</label>
                        <select name="id_phan_quyen" id="id_phan_quyen" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @foreach($phanquyens as $phanquyen)
                                <option value="{{ $phanquyen->id_phan_quyen }}">{{ $phanquyen->ten_phan_quyen }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-plus mr-2"></i>
                            Thêm
                        </button>
                        <a href="/admin/taikhoan" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Quay lại
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection