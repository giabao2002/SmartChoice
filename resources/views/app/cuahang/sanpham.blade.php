@extends('app.app.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <div class="flex-1">
                <ol class="inline-flex items-center space-x-2">
                    <li>
                        <a href="/trang-chu" class="text-gray-500 hover:text-blue-600 transition-colors duration-200">
                            <i class="fas fa-home mr-1"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="/cua-hang" class="text-gray-500 hover:text-blue-600 transition-colors duration-200">
                            Cửa hàng
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-700">{{ $sanpham['ten_san_pham'] }}</span>
                    </li>
                </ol>
            </div>
            @foreach ($gio_hangs as $id => $giohang)
                @if ($giohang['ten_san_pham'] == $sanpham['ten_san_pham'])
                    <div class="flex-1">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span>Sản phẩm này đã được thêm vào giỏ hàng của bạn!</span>
                        </div>
                    </div>
                @endif
            @endforeach
        </nav>

        <!-- Product Details -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="flex flex-col md:flex-row">
                <!-- Product Images -->
                <div class="md:w-1/2 p-6">
                    <div class="relative">
                        <img src="/product-img/{{ $sanpham['hinh_anh_1'] }}" alt="{{ $sanpham['ten_san_pham'] }}"
                            class="w-full h-96 object-cover rounded-lg shadow-md">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-10 transition-opacity duration-300 rounded-lg">
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <img src="/product-img/{{ $sanpham['hinh_anh_2'] }}" alt="Product view 2"
                            class="w-full h-24 object-cover rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 cursor-pointer">
                        <img src="/product-img/{{ $sanpham['hinh_anh_3'] }}" alt="Product view 3"
                            class="w-full h-24 object-cover rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 cursor-pointer">
                        <img src="/product-img/{{ $sanpham['hinh_anh_4'] }}" alt="Product view 4"
                            class="w-full h-24 object-cover rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 cursor-pointer">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="md:w-1/2 p-6">
                    <div class="flex justify-end items-center mb-4">
                        <div class="flex items-center">
                            <div id="RateDanhGia" class="mr-2"></div>
                            <span class="text-gray-500 text-sm">({{ $soluongdanhgia['count_danh_gia'] }} Đánh giá)</span>
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $sanpham['ten_san_pham'] }}</h1>

                    <div class="mb-6">
                        @php
                            $km = 0;
                            foreach ($khuyenmais as $khuyenmai) {
                                if ($khuyenmai['ten_khuyen_mai'] == $sanpham['ten_khuyen_mai']) {
                                    $km = sprintf('%d', $sanpham['don_gia'] * 0.01 * $khuyenmai['gia_tri_khuyen_mai']);
                                }
                            }
                        @endphp
                        <div class="flex items-center space-x-4">
                            <span class="text-2xl font-bold text-blue-600">
                                {{ number_format($sanpham['don_gia'] - $km, 0, ',', ',') }} VNĐ
                            </span>
                            @if ($km != 0)
                                <span class="text-lg text-gray-500 line-through">
                                    {{ number_format($sanpham['don_gia'], 0, ',', ',') }} VNĐ
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="prose max-w-none mb-6">
                        <p class="text-gray-600">{!! $sanpham['mo_ta'] !!}</p>
                    </div>

                    <div class="flex items-center space-x-4 mb-6">
                        <span class="text-gray-700">
                            <i class="fas fa-gift mr-2"></i>
                            {{ $sanpham['ten_loai_san_pham'] }}
                        </span>
                        <span class="text-gray-700">
                            <i class="fas fa-award mr-2"></i>
                            {{ $sanpham['ten_thuong_hieu'] }}
                        </span>
                    </div>

                    <div class="flex space-x-4">
                        <a href="/cua-hang/san-pham={{ $sanpham['id_san_pham'] }}/them"
                            class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center"
                            data-url="{{ route('them-vao-gio-hang', ['id' => $sanpham['id_san_pham']]) }}">
                            <i class="far fa-heart mr-2"></i>
                            Thêm vào giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px" aria-label="Tabs">
                    <a href="#ex2-tabs-1"
                        class="tab-link active border-b-2 border-blue-600 py-4 px-6 text-blue-600 font-medium"
                        data-tab="ex2-tabs-1">
                        Mô tả sản phẩm
                    </a>
                    <a href="#ex2-tabs-2"
                        class="tab-link border-b-2 border-transparent py-4 px-6 text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium"
                        data-tab="ex2-tabs-2">
                        Chi tiết sản phẩm
                    </a>
                    <a href="#ex2-tabs-3"
                        class="tab-link border-b-2 border-transparent py-4 px-6 text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium"
                        data-tab="ex2-tabs-3">
                        Đánh giá
                    </a>
                </nav>
            </div>

            <div class="p-6">
                <!-- Tab Content -->
                <div class="tab-content">
                    <div id="ex2-tabs-1" class="tab-pane active">
                        <div class="prose max-w-none">
                            {!! $sanpham['mo_ta'] !!}
                        </div>
                    </div>

                    <div id="ex2-tabs-2" class="tab-pane hidden">
                        <div class="space-y-3">
                            <p class="flex items-center">
                                <span class="text-green-500 mr-2">✔️</span>
                                <span class="font-medium">Mã sản phẩm:</span>
                                <span class="ml-2">{{ $sanpham['id_san_pham'] }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-green-500 mr-2">✔️</span>
                                <span class="font-medium">Tên sản phẩm:</span>
                                <span class="ml-2">{{ $sanpham['ten_san_pham'] }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-green-500 mr-2">✔️</span>
                                <span class="font-medium">Loại sản phẩm:</span>
                                <span class="ml-2">{{ $sanpham['ten_loai_san_pham'] }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-green-500 mr-2">✔️</span>
                                <span class="font-medium">Thương hiệu:</span>
                                <span class="ml-2">{{ $sanpham['ten_thuong_hieu'] }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-green-500 mr-2">✔️</span>
                                <span class="font-medium">Giá gốc:</span>
                                <span class="ml-2">{{ number_format($sanpham['don_gia']) }} VNĐ</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-green-500 mr-2">✔️</span>
                                <span class="font-medium">Số lượng đã bán:</span>
                                <span class="ml-2">{{ $sanpham['so_luong_mua'] }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-green-500 mr-2">✔️</span>
                                <span class="font-medium">Khuyến mãi:</span>
                                <span class="ml-2">{{ $sanpham['ten_khuyen_mai'] }}</span>
                            </p>
                        </div>
                    </div>

                    <div id="ex2-tabs-3" class="tab-pane hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Reviews List -->
                            <div>
                                <h5 class="text-xl font-semibold text-gray-800 mb-6">ĐÁNH GIÁ</h5>
                                <div class="space-y-6">
                                    @foreach ($danhgias as $danhgia)
                                        @if ($danhgia->id_user > 4)
                                            @php $ok = rand(1, 4); @endphp
                                        @else
                                            @php $ok = $danhgia->id_user; @endphp
                                        @endif

                                        <div class="flex items-start space-x-4">
                                            <img class="w-10 h-10 rounded-full object-cover"
                                                src="/upload-img/user.png" alt="User avatar">
                                            <div class="flex-1">
                                                <div class="flex justify-between items-start">
                                                    <span
                                                        class="font-medium text-gray-800">{{ $danhgia->ten_danh_gia }}</span>
                                                    <span class="text-sm text-gray-500">{{ $danhgia->updated_at }}</span>
                                                </div>
                                                <p class="text-gray-600 mt-1">{{ $danhgia->danh_gia_binh_luan }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-6">
                                    {{ $danhgias->links() }}
                                </div>
                            </div>

                            <!-- Review Form -->
                            @php $checkk = 0; @endphp
                            @foreach ($danh_gias as $id => $danh_gia)
                                @if ($danh_gia['ten_san_pham'] == $sanpham['ten_san_pham'])
                                    @php $checkk = 1; @endphp
                                @endif
                            @endforeach

                            @if ($checkk == 1)
                                <div>
                                    <h5 class="text-xl font-semibold text-gray-800 mb-6">ĐÁNH GIÁ SẢN PHẨM NÀY</h5>
                                    <div id="rateYo" class="mb-6"></div>

                                    <form action="/cua-hang/san-pham={{ $sanpham['id_san_pham'] }}/danh-gia"
                                        method="POST" class="space-y-4">
                                        @csrf
                                        <input type="hidden" name="danh_gia" id="danh_gia" value="4.5">
                                        <input type="hidden" name="id_user" value="{{ $data['id'] }}">
                                        <input type="hidden" name="id_san_pham" value="{{ $sanpham['id_san_pham'] }}">

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Tên</label>
                                            <input type="text" name="ten_danh_gia"
                                                value="{{ $data['ten_nguoi_dung'] }}" required
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Bình luận đánh
                                                giá</label>
                                            <textarea name="danh_gia_binh_luan" rows="4"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                                Gửi đánh giá
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <p class="text-red-500">Bạn cần mua sản phẩm này mới có thể đánh giá!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- RateYo -->
    <script>
        $(function() {
            $("#RateDanhGia").rateYo({
                starWidth: "20px",
                ratedFill: "#16B5EA",
                rating: {{ $soluongdanhgia['danh_gia'] }},
                readOnly: true,
            });

            $("#rateYo").rateYo({
                starWidth: "20px",
                ratedFill: "#16B5EA",
                rating: 4.5,
                onChange: function(rating) {
                    $("#danh_gia").val(rating);
                }
            });
        });
    </script>

    <!-- Tab Switching -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab-link');
            const contents = document.querySelectorAll('.tab-pane');

            tabs.forEach(tab => {
                tab.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = tab.getAttribute('data-tab');

                    // Update active tab
                    tabs.forEach(t => {
                        t.classList.remove('active', 'border-blue-600', 'text-blue-600');
                        t.classList.add('border-transparent', 'text-gray-500');
                    });
                    tab.classList.add('active', 'border-blue-600', 'text-blue-600');
                    tab.classList.remove('border-transparent', 'text-gray-500');

                    // Show target content
                    contents.forEach(content => {
                        content.classList.add('hidden');
                        if (content.id === target) {
                            content.classList.remove('hidden');
                        }
                    });
                });
            });
        });
    </script>
@endsection
