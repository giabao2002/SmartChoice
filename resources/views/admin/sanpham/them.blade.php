@extends('admin.index')

@section('admin_content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
                <div class="px-4 py-5">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">
                            <i class="fas fa-socks mr-2"></i>
                            Thêm sản phẩm
                        </h2>
                    </div>

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="/admin/sanpham/them" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <label for="ten_san_pham" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                            <input type="text" name="ten_san_pham" id="ten_san_pham" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                        </div>

                        <div>
                            <label for="ten_loai_san_pham" class="block text-sm font-medium text-gray-700">Loại sản phẩm</label>
                            <input type="text" name="ten_loai_san_pham" id="ten_loai_san_pham" list="loai_san_pham"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                            <datalist id="loai_san_pham">
                                @foreach ($loaisanphams as $loaisanpham)
                                    <option value="{{ $loaisanpham['ten_loai_san_pham'] }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div>
                            <label for="ten_thuong_hieu" class="block text-sm font-medium text-gray-700">Thương hiệu</label>
                            <input type="text" name="ten_thuong_hieu" id="ten_thuong_hieu" list="thuong_hieu" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                            <datalist id="thuong_hieu">
                                @foreach ($thuonghieus as $thuonghieu)
                                    <option value="{{ $thuonghieu['ten_thuong_hieu'] }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div>
                            <label for="mo_ta" class="block text-sm font-medium text-gray-700">Mô tả</label>
                            <textarea id="ckediter" name="mo_ta" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"> </textarea>
                            <div class="mt-1 text-sm text-gray-500">
                                <span id="editor-error" class="text-red-500 hidden">Vui lòng nhập mô tả sản phẩm</span>
                            </div>
                        </div>

                        <div>
                            <label for="don_gia" class="block text-sm font-medium text-gray-700">Đơn giá</label>
                            <input type="number" name="don_gia" id="don_gia" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                        </div>

                        <div>
                            <label for="so_luong" class="block text-sm font-medium text-gray-700">Số lượng</label>
                            <input type="number" name="so_luong" id="so_luong" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="hinh_anh_1" class="block text-sm font-medium text-gray-700">Hình ảnh 1</label>
                                <input type="file" name="hinh_anh_1" id="hinh_anh_1" required
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </div>

                            <div>
                                <label for="hinh_anh_2" class="block text-sm font-medium text-gray-700">Hình ảnh 2</label>
                                <input type="file" name="hinh_anh_2" id="hinh_anh_2"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </div>

                            <div>
                                <label for="hinh_anh_3" class="block text-sm font-medium text-gray-700">Hình ảnh 3</label>
                                <input type="file" name="hinh_anh_3" id="hinh_anh_3"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </div>

                            <div>
                                <label for="hinh_anh_4" class="block text-sm font-medium text-gray-700">Hình ảnh 4</label>
                                <input type="file" name="hinh_anh_4" id="hinh_anh_4"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            </div>
                        </div>

                        <div>
                            <label for="ten_khuyen_mai" class="block text-sm font-medium text-gray-700">Khuyến mãi</label>
                            <input type="text" name="ten_khuyen_mai" id="ten_khuyen_mai" list="khuyen_mai"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                            <datalist id="khuyen_mai">
                                @foreach ($khuyenmais as $khuyenmai)
                                    <option value="{{ $khuyenmai['ten_khuyen_mai'] }}">
                                @endforeach
                            </datalist>
                        </div>

                        <input type="hidden" name="so_luong_mua" value="0" />

                        <div class="flex space-x-3">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-plus mr-2"></i>
                                Thêm
                            </button>
                            <a href="/admin/sanpham"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
