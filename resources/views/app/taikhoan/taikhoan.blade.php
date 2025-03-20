@extends('app.app.app')

@section('content')
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li>
                        <a href="/trang-chu" class="text-gray-500 hover:text-blue-600 transition-colors duration-200">
                            <i class="fas fa-home mr-1"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-700">Thông tin cá nhân</span>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col md:flex-row">
                <!-- Left column: Image -->
                <div class="md:w-1/2 p-8 flex flex-col items-center justify-center">
                    <img src="/upload-img/user.jpg" class="max-w-full h-auto rounded-lg shadow-md" alt="Account image">
                    <p class="mt-4 text-gray-600 text-center">Cập nhật thông tin cá nhân của bạn.</p>
                </div>

                <!-- Right column: Form -->
                <div class="md:w-1/2 p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Thông tin cá nhân</h2>

                    <form action="/tai-khoan/sua" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['id'] }}" />

                        <div>
                            <label for="ten_nguoi_dung" class="block text-sm font-medium text-gray-700">Tên người
                                dùng</label>
                            <input type="text" id="ten_nguoi_dung" name="ten_nguoi_dung"
                                value="{{ $data['ten_nguoi_dung'] }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ $data['email'] }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        </div>

                        <div>
                            <label for="sdt" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                            <input type="text" id="sdt" name="sdt" value="{{ $data['sdt'] }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        </div>

                        <div>
                            <label for="ten_dang_nhap" class="block text-sm font-medium text-gray-700">Tên đăng
                                nhập</label>
                            <input type="text" id="ten_dang_nhap" name="ten_dang_nhap"
                                value="{{ $data['ten_dang_nhap'] }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                            <input type="password" id="password" name="password" value="{{ $data['password'] }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        </div>

                        <div class="flex space-x-4 pt-4">
                            <button type="submit"
                                class="flex-1 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cập nhật thông tin
                            </button>
                            <a href="/trang-chu"
                                class="flex-1 flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Quay lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
