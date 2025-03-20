<!-- Main Container -->
<div class="container mx-auto px-4 py-8">
    <!-- Carousel Section with Added Padding -->
    {{-- <div class="mb-16">
        @include('app.app.carousel')
    </div> --}}

    <!-- Favorite Brands Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-12" x-data="productTabs">
        <h3 class="text-2xl font-bold text-center text-gray-800 uppercase tracking-wider mb-6">Các Thương Hiệu Yêu Thích
        </h3>

        <!-- Tabs Navigation -->
        <div class="flex justify-center space-x-4 mb-8">
            <button @click="activeTab = 'JBL'"
                :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'JBL', 'text-gray-500 hover:text-gray-700': activeTab !== 'JBL' }"
                class="px-4 py-2 text-lg font-medium transition-colors duration-200">
                JBL
            </button>
            <button @click="activeTab = 'B&O'"
                :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'B&O', 'text-gray-500 hover:text-gray-700': activeTab !== 'B&O' }"
                class="px-4 py-2 text-lg font-medium transition-colors duration-200">
                B&O
            </button>
            <button @click="activeTab = 'Marshall'"
                :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'Marshall', 'text-gray-500 hover:text-gray-700': activeTab !== 'Marshall' }"
                class="px-4 py-2 text-lg font-medium transition-colors duration-200">
                Marshall
            </button>
        </div>

        <!-- Tabs Content -->
        <div>
            <!-- JBL Products -->
            <div x-show="activeTab === 'JBL'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100">

                @php
                    $JBLProducts = collect($sanphams)->filter(function ($item) {
                        return $item['ten_thuong_hieu'] == 'JBL';
                    });
                    $JBLProductsChunks = $JBLProducts->chunk(8);
                    $totalPages = count($JBLProductsChunks);
                @endphp

                <div x-data="{ page: 0 }">
                    <!-- Products -->
                    @foreach ($JBLProductsChunks as $index => $chunk)
                        <div x-show="page === {{ $index }}" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 justify-items-center">
                            @foreach ($chunk as $sanpham)
                                <div
                                    class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 w-full max-w-xs">
                                    <a href="/cua-hang/san-pham={{ $sanpham['id_san_pham'] }}" class="block">
                                        <div class="relative overflow-hidden h-60">
                                            <img src="/product-img/{{ $sanpham->hinh_anh_1 }}"
                                                class="w-full h-full object-cover transform transition-transform duration-700 hover:scale-110"
                                                alt="{{ $sanpham['ten_san_pham'] }}">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end">
                                                <div class="p-4 w-full text-white">
                                                    <span
                                                        class="bg-blue-600 text-white text-xs px-2 py-1 rounded-full">JBL</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h4 class="text-lg font-semibold text-gray-800 mb-2 truncate">
                                                {{ $sanpham['ten_san_pham'] }}</h4>
                                            <div class="flex items-center justify-between">
                                                @php
                                                    $km = 0;
                                                    foreach ($khuyenmais as $khuyenmai) {
                                                        if (
                                                            $khuyenmai['ten_khuyen_mai'] == $sanpham['ten_khuyen_mai']
                                                        ) {
                                                            $km = sprintf(
                                                                '%d',
                                                                $sanpham['don_gia'] *
                                                                    0.01 *
                                                                    $khuyenmai['gia_tri_khuyen_mai'],
                                                            );
                                                        }
                                                    }
                                                @endphp
                                                <span class="text-lg font-bold text-blue-600">
                                                    {{ number_format($sanpham['don_gia'] - $km, 0, ',', ',') }} VNĐ
                                                </span>
                                                <span class="text-sm text-gray-500 line-through">
                                                    {{ number_format($sanpham['don_gia'], 0, ',', ',') }} VNĐ
                                                </span>
                                            </div>
                                            @if ($km > 0)
                                                <div class="mt-2">
                                                    <span
                                                        class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Giảm
                                                        {{ number_format($km, 0, ',', ',') }} VNĐ</span>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    @if ($totalPages > 1)
                        <div class="flex justify-center space-x-2 mt-8">
                            <button @click="page = Math.max(0, page-1)"
                                :class="{ 'opacity-50 cursor-not-allowed': page === 0 }"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-chevron-left"></i>
                            </button>

                            @for ($i = 0; $i < $totalPages; $i++)
                                <button @click="page = {{ $i }}"
                                    :class="{ 'bg-blue-600': page === {{ $i }}, 'bg-blue-400': page !==
                                            {{ $i }} }"
                                    class="px-3 py-1 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ $i + 1 }}
                                </button>
                            @endfor

                            <button @click="page = Math.min({{ $totalPages - 1 }}, page+1)"
                                :class="{ 'opacity-50 cursor-not-allowed': page === {{ $totalPages - 1 }} }"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- B&O Products -->
            <div x-show="activeTab === 'B&O'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100">

                @php
                    $BOProducts = collect($sanphams)->filter(function ($item) {
                        return $item['ten_thuong_hieu'] == 'B&O';
                    });
                    $BOProductsChunks = $BOProducts->chunk(8);
                    $totalBOPages = count($BOProductsChunks);
                @endphp

                <div x-data="{ BOPage: 0 }">
                    <!-- Products -->
                    @foreach ($BOProductsChunks as $index => $chunk)
                        <div x-show="BOPage === {{ $index }}"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 justify-items-center">
                            @foreach ($chunk as $sanpham)
                                <div
                                    class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 w-full max-w-xs">
                                    <a href="/cua-hang/san-pham={{ $sanpham['id_san_pham'] }}" class="block">
                                        <div class="relative overflow-hidden h-60">
                                            <img src="/product-img/{{ $sanpham->hinh_anh_1 }}"
                                                class="w-full h-full object-cover transform transition-transform duration-700 hover:scale-110"
                                                alt="{{ $sanpham['ten_san_pham'] }}">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end">
                                                <div class="p-4 w-full text-white">
                                                    <span
                                                        class="bg-red-600 text-white text-xs px-2 py-1 rounded-full">B&O</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h4 class="text-lg font-semibold text-gray-800 mb-2 truncate">
                                                {{ $sanpham['ten_san_pham'] }}</h4>
                                            <div class="flex items-center justify-between">
                                                @php
                                                    $km = 0;
                                                    foreach ($khuyenmais as $khuyenmai) {
                                                        if (
                                                            $khuyenmai['ten_khuyen_mai'] == $sanpham['ten_khuyen_mai']
                                                        ) {
                                                            $km = sprintf(
                                                                '%d',
                                                                $sanpham['don_gia'] *
                                                                    0.01 *
                                                                    $khuyenmai['gia_tri_khuyen_mai'],
                                                            );
                                                        }
                                                    }
                                                @endphp
                                                <span class="text-lg font-bold text-blue-600">
                                                    {{ number_format($sanpham['don_gia'] - $km, 0, ',', ',') }} VNĐ
                                                </span>
                                                <span class="text-sm text-gray-500 line-through">
                                                    {{ number_format($sanpham['don_gia'], 0, ',', ',') }} VNĐ
                                                </span>
                                            </div>
                                            @if ($km > 0)
                                                <div class="mt-2">
                                                    <span
                                                        class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Giảm
                                                        {{ number_format($km, 0, ',', ',') }} VNĐ</span>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    @if ($totalBOPages > 1)
                        <div class="flex justify-center space-x-2 mt-8">
                            <button @click="BOPage = Math.max(0, BOPage-1)"
                                :class="{ 'opacity-50 cursor-not-allowed': BOPage === 0 }"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-chevron-left"></i>
                            </button>

                            @for ($i = 0; $i < $totalBOPages; $i++)
                                <button @click="BOPage = {{ $i }}"
                                    :class="{ 'bg-blue-600': BOPage === {{ $i }}, 'bg-blue-400': BOPage !== {{ $i }} }"
                                    class="px-3 py-1 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ $i + 1 }}
                                </button>
                            @endfor

                            <button @click="BOPage = Math.min({{ $totalBOPages - 1 }}, BOPage+1)"
                                :class="{ 'opacity-50 cursor-not-allowed': BOPage === {{ $totalBOPages - 1 }} }"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Marshall Products -->
            <div x-show="activeTab === 'Marshall'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100">

                @php
                    $MarshallProducts = collect($sanphams)->filter(function ($item) {
                        return $item['ten_thuong_hieu'] == 'Marshall';
                    });
                    $MarshallProductsChunks = $MarshallProducts->chunk(8);
                    $totalMarshallPages = count($MarshallProductsChunks);
                @endphp

                <div x-data="{ MarshallPage: 0 }">
                    <!-- Products -->
                    @foreach ($MarshallProductsChunks as $index => $chunk)
                        <div x-show="MarshallPage === {{ $index }}"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 justify-items-center">
                            @foreach ($chunk as $sanpham)
                                <div
                                    class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 w-full max-w-xs">
                                    <a href="/cua-hang/san-pham={{ $sanpham['id_san_pham'] }}" class="block">
                                        <div class="relative overflow-hidden h-60">
                                            <img src="/product-img/{{ $sanpham->hinh_anh_1 }}"
                                                class="w-full h-full object-cover transform transition-transform duration-700 hover:scale-110"
                                                alt="{{ $sanpham['ten_san_pham'] }}">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end">
                                                <div class="p-4 w-full text-white">
                                                    <span
                                                        class="bg-green-600 text-white text-xs px-2 py-1 rounded-full">Marshall</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h4 class="text-lg font-semibold text-gray-800 mb-2 truncate">
                                                {{ $sanpham['ten_san_pham'] }}</h4>
                                            <div class="flex items-center justify-between">
                                                @php
                                                    $km = 0;
                                                    foreach ($khuyenmais as $khuyenmai) {
                                                        if (
                                                            $khuyenmai['ten_khuyen_mai'] == $sanpham['ten_khuyen_mai']
                                                        ) {
                                                            $km = sprintf(
                                                                '%d',
                                                                $sanpham['don_gia'] *
                                                                    0.01 *
                                                                    $khuyenmai['gia_tri_khuyen_mai'],
                                                            );
                                                        }
                                                    }
                                                @endphp
                                                <span class="text-lg font-bold text-blue-600">
                                                    {{ number_format($sanpham['don_gia'] - $km, 0, ',', ',') }} VNĐ
                                                </span>
                                                <span class="text-sm text-gray-500 line-through">
                                                    {{ number_format($sanpham['don_gia'], 0, ',', ',') }} VNĐ
                                                </span>
                                            </div>
                                            @if ($km > 0)
                                                <div class="mt-2">
                                                    <span
                                                        class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Giảm
                                                        {{ number_format($km, 0, ',', ',') }} VNĐ</span>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    @if ($totalMarshallPages > 1)
                        <div class="flex justify-center space-x-2 mt-8">
                            <button @click="MarshallPage = Math.max(0, MarshallPage-1)"
                                :class="{ 'opacity-50 cursor-not-allowed': MarshallPage === 0 }"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-chevron-left"></i>
                            </button>

                            @for ($i = 0; $i < $totalMarshallPages; $i++)
                                <button @click="MarshallPage = {{ $i }}"
                                    :class="{ 'bg-blue-600': MarshallPage ===
                                        {{ $i }}, 'bg-blue-400': MarshallPage !== {{ $i }} }"
                                    class="px-3 py-1 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ $i + 1 }}
                                </button>
                            @endfor

                            <button @click="MarshallPage = Math.min({{ $totalMarshallPages - 1 }}, MarshallPage+1)"
                                :class="{ 'opacity-50 cursor-not-allowed': MarshallPage === {{ $totalMarshallPages - 1 }} }"
                                class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-12">
        <h3 class="text-2xl font-bold text-center text-gray-800 uppercase tracking-wider mb-8">Các Sản Phẩm Nổi Bật
        </h3>

        <!-- Featured Products Pagination -->
        <div class="relative px-4" x-data="{ featuredPage: 0 }">
            @php
                $featuredProductsChunks = collect($sanphamnoibats)->chunk(4);
                $totalFeaturedPages = $featuredProductsChunks->count();
            @endphp

            <!-- Product Pages -->
            <div class="overflow-hidden">
                @foreach ($featuredProductsChunks as $index => $chunk)
                    <div x-show="featuredPage === {{ $index }}"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 justify-items-center">
                        @foreach ($chunk as $sanphamnoibat)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 w-full max-w-xs">
                                <a href="/cua-hang/san-pham={{ $sanphamnoibat->id_san_pham }}" class="block">
                                    <div class="relative overflow-hidden h-60">
                                        <img src="/product-img/{{ $sanphamnoibat->hinh_anh_1 }}"
                                            class="w-full h-full object-cover transform transition-transform duration-700 hover:scale-110"
                                            alt="{{ $sanphamnoibat->ten_san_pham }}">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end">
                                            <div class="p-4 w-full text-white">
                                                <span
                                                    class="bg-purple-600 text-white text-xs px-2 py-1 rounded-full">Nổi
                                                    bật</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2 truncate">
                                            {{ $sanphamnoibat->ten_san_pham }}</h4>
                                        <div class="flex items-center justify-between">
                                            @php
                                                $km = 0;
                                                foreach ($khuyenmais as $khuyenmai) {
                                                    if (
                                                        $khuyenmai['ten_khuyen_mai'] == $sanphamnoibat->ten_khuyen_mai
                                                    ) {
                                                        $km = sprintf(
                                                            '%d',
                                                            $sanphamnoibat->don_gia *
                                                                0.01 *
                                                                $khuyenmai['gia_tri_khuyen_mai'],
                                                        );
                                                    }
                                                }
                                            @endphp
                                            <span class="text-lg font-bold text-blue-600">
                                                {{ number_format($sanphamnoibat->don_gia - $km, 0, ',', ',') }} VNĐ
                                            </span>
                                            <span class="text-sm text-gray-500 line-through">
                                                {{ number_format($sanphamnoibat->don_gia, 0, ',', ',') }} VNĐ
                                            </span>
                                        </div>
                                        @if ($km > 0)
                                            <div class="mt-2">
                                                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Giảm
                                                    {{ number_format($km, 0, ',', ',') }} VNĐ</span>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <!-- Pagination Controls -->
            @if ($totalFeaturedPages > 1)
                <div class="flex justify-center space-x-2 mt-8">
                    <button @click="featuredPage = Math.max(0, featuredPage-1)"
                        :class="{ 'opacity-50 cursor-not-allowed': featuredPage === 0 }"
                        class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    @for ($i = 0; $i < $totalFeaturedPages; $i++)
                        <button @click="featuredPage = {{ $i }}"
                            :class="{ 'bg-blue-600': featuredPage === {{ $i }}, 'bg-blue-400': featuredPage !== {{ $i }} }"
                            class="px-3 py-1 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            {{ $i + 1 }}
                        </button>
                    @endfor

                    <button @click="featuredPage = Math.min({{ $totalFeaturedPages - 1 }}, featuredPage+1)"
                        :class="{ 'opacity-50 cursor-not-allowed': featuredPage === {{ $totalFeaturedPages - 1 }} }"
                        class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Alpine.js -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('productTabs', () => ({
            activeTab: 'JBL'
        }))
    })
</script>
