@extends('app.app.app')

@section('content')
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li>
                        <a href="/trang-chu" class="text-gray-500 hover:text-blue-600 transition-colors duration-200">
                            <i class="fas fa-home mr-1"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-700">Cửa hàng</span>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4 border-b border-gray-200">
                            <h5 class="text-lg font-semibold text-gray-800 text-center">Danh mục</h5>
                        </div>
                        <div class="p-4">
                            <div class="space-y-4" x-data="{ openSection: null }">
                                <div>
                                    <button @click="openSection = openSection === 'shoes' ? null : 'shoes'"
                                        class="w-full flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                                        <div class="flex items-center">
                                            <i class="fas fa-tags text-gray-600 mr-2"></i>
                                            <span class="font-medium text-gray-700">LOẠI SẢN PHẨM</span>
                                        </div>
                                        <i class="fas"
                                            :class="openSection === 'shoes' ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                                    </button>
                                    <div x-show="openSection === 'shoes'"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                                        x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-2 pl-4">
                                        <ul class="space-y-2">
                                            @foreach ($loaisanphams as $loaisanpham)
                                                <li>
                                                    <a href="/cua-hang/loaisanpham={{ $loaisanpham['ten_loai_san_pham'] }}"
                                                        class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                        {{ $loaisanpham['ten_loai_san_pham'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div>
                                    <button @click="openSection = openSection === 'brands' ? null : 'brands'"
                                        class="w-full flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                                        <div class="flex items-center">
                                            <i class="fas fa-award text-gray-600 mr-2"></i>
                                            <span class="font-medium text-gray-700">THƯƠNG HIỆU</span>
                                        </div>
                                        <i class="fas"
                                            :class="openSection === 'brands' ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                                    </button>
                                    <div x-show="openSection === 'brands'"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                                        x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-2 pl-4">
                                        <ul class="space-y-2">
                                            @foreach ($thuonghieus as $thuonghieu)
                                                <li>
                                                    <a href="/cua-hang/thuonghieu={{ $thuonghieu['ten_thuong_hieu'] }}"
                                                        class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                        {{ $thuonghieu['ten_thuong_hieu'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div>
                                    <button @click="openSection = openSection === 'price' ? null : 'price'"
                                        class="w-full flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                                        <div class="flex items-center">
                                            <i class="fas fa-dollar-sign text-gray-600 mr-2"></i>
                                            <span class="font-medium text-gray-700">GIÁ CẢ</span>
                                        </div>
                                        <i class="fas"
                                            :class="openSection === 'price' ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                                    </button>
                                    <div x-show="openSection === 'price'"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                                        x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-2 pl-4">
                                        <ul class="space-y-2">
                                            <li>
                                                <a href="/cua-hang/gia=0-300000"
                                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                    < 300,000 VNĐ </a>
                                            </li>
                                            <li>
                                                <a href="/cua-hang/gia=300000-500000"
                                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                    300,000 ~ 500,000 VNĐ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cua-hang/gia=500000-700000"
                                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                    500,000 ~ 700,000 VNĐ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cua-hang/gia=700000-1000000"
                                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                    700,000 ~ 1,000,000 VNĐ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cua-hang/gia=1000000-1500000"
                                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                    1,000,000 ~ 1,500,000 VNĐ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cua-hang/gia=1500000-2000000"
                                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                    1,500,000 ~ 2,000,000 VNĐ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cua-hang/gia=2000000-10000000"
                                                    class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                                                    > 2,000,000 VNĐ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($sanphams as $sanpham)
                            @if (
                                ($timloaisanpham == '' && $timthuonghieu == '') ||
                                    ($timloaisanpham != '' && $sanpham->ten_loai_san_pham == $timloaisanpham) ||
                                    ($timthuonghieu != '' && $sanpham->ten_thuong_hieu == $timthuonghieu))
                                <div
                                    class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                    <a href="/cua-hang/san-pham={{ $sanpham->id_san_pham }}" class="block">
                                        <div class="relative overflow-hidden">
                                            <img src="/product-img/{{ $sanpham->hinh_anh_1 }}"
                                                class="w-full h-64 object-cover transform transition-transform duration-300 hover:scale-105"
                                                alt="{{ $sanpham->ten_san_pham }}">
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-10 transition-opacity duration-300">
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h4 class="text-lg font-semibold text-gray-800 mb-2">
                                                {{ $sanpham->ten_san_pham }}
                                            </h4>
                                            <div class="flex items-center justify-between">
                                                @php
                                                    $km = 0;
                                                    foreach ($khuyenmais as $khuyenmai) {
                                                        if ($khuyenmai['ten_khuyen_mai'] == $sanpham->ten_khuyen_mai) {
                                                            $km = sprintf(
                                                                '%d',
                                                                $sanpham->don_gia *
                                                                    0.01 *
                                                                    $khuyenmai['gia_tri_khuyen_mai'],
                                                            );
                                                        }
                                                    }
                                                @endphp
                                                <span class="text-lg font-bold text-blue-600">
                                                    {{ number_format($sanpham->don_gia - $km, 0, ',', ',') }} VNĐ
                                                </span>
                                                @if ($km != 0)
                                                    <span class="text-sm text-gray-500 line-through">
                                                        {{ number_format($sanpham->don_gia, 0, ',', ',') }} VNĐ
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-8 flex justify-center">
                        {{ $sanphams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
