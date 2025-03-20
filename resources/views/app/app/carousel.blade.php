<div class="relative w-[80%] mx-auto mt-8" x-data="{ activeSlide: 0 }" x-init="setInterval(() => { activeSlide = activeSlide === 3 ? 0 : activeSlide + 1 }, 5000)">
    <div class="relative h-[300px] sm:h-[400px] md:h-[500px] overflow-hidden rounded-xl shadow-2xl">
        <div x-show="activeSlide === 0" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full" class="absolute inset-0">
            <img src="{{ URL('upload-img/banner1.png') }}" class="w-full h-full object-cover" alt="Banner 1">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/30 flex items-center justify-center">
                <div class="text-center text-white px-8 transform transition-all duration-700"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <h2
                        class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 transform transition-transform duration-500 hover:scale-105 drop-shadow-lg">
                        Smart Choice</h2>
                    <p class="text-lg sm:text-xl md:text-2xl max-w-2xl mx-auto mb-6 drop-shadow-md">Mua sắm sản phẩm mà
                        bạn mơ ước.</p>
                    <button
                        class="mt-4 px-6 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg transition-all duration-300 hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                        Khám phá ngay
                    </button>
                </div>
            </div>
        </div>

        <div x-show="activeSlide === 1" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full" class="absolute inset-0">
            <img src="{{ URL('upload-img/banner2.png') }}" class="w-full h-full object-cover" alt="Banner 2">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/30 flex items-center justify-center">
                <div class="text-center text-white px-8 transform transition-all duration-700"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <h2
                        class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 transform transition-transform duration-500 hover:scale-105 drop-shadow-lg">
                        Smart Choice</h2>
                    <p class="text-lg sm:text-xl md:text-2xl max-w-2xl mx-auto mb-6 drop-shadow-md">Mang lại cho bạn
                        những sản phẩm chất lượng nhất.</p>
                    <button
                        class="mt-4 px-6 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg transition-all duration-300 hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                        Khám phá ngay
                    </button>
                </div>
            </div>
        </div>

        <div x-show="activeSlide === 2" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full" class="absolute inset-0">
            <img src="{{ URL('upload-img/banner3.png') }}" class="w-full h-full object-cover" alt="Banner 3">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/30 flex items-center justify-center">
                <div class="text-center text-white px-8 transform transition-all duration-700"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <h2
                        class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 transform transition-transform duration-500 hover:scale-105 drop-shadow-lg">
                        Smart Choice</h2>
                    <p class="text-lg sm:text-xl md:text-2xl max-w-2xl mx-auto mb-6 drop-shadow-md">Chúng tôi luôn cập
                        nhật những mẫu sản phẩm mới nhất.</p>
                    <button
                        class="mt-4 px-6 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg transition-all duration-300 hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                        Khám phá ngay
                    </button>
                </div>
            </div>
        </div>

        <div x-show="activeSlide === 3" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full" class="absolute inset-0">
            <img src="{{ URL('upload-img/banner4.png') }}" class="w-full h-full object-cover" alt="Banner 4">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/30 flex items-center justify-center">
                <div class="text-center text-white px-8 transform transition-all duration-700"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <h2
                        class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 transform transition-transform duration-500 hover:scale-105 drop-shadow-lg">
                        Smart Choice</h2>
                    <p class="text-lg sm:text-xl md:text-2xl max-w-2xl mx-auto mb-6 drop-shadow-md">Chúng tôi luôn cập
                        nhật những mẫu sản phẩm mới nhất.</p>
                    <button
                        class="mt-4 px-6 py-3 bg-blue-600 text-white font-medium text-sm rounded-lg transition-all duration-300 hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg">
                        Khám phá ngay
                    </button>
                </div>
            </div>
        </div>
    </div>

    <button @click="activeSlide = activeSlide === 0 ? 3 : activeSlide - 1"
        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 w-10 h-10 flex items-center justify-center rounded-full shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none z-10">
        <i class="fas fa-chevron-left text-xl"></i>
    </button>
    <button @click="activeSlide = activeSlide === 3 ? 0 : activeSlide + 1"
        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 w-10 h-10 flex items-center justify-center rounded-full shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none z-10">
        <i class="fas fa-chevron-right text-xl"></i>
    </button>

    <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3 py-4 z-10">
        <button @click="activeSlide = 0"
            :class="{ 'w-10 bg-blue-600': activeSlide === 0, 'w-5 bg-gray-400': activeSlide !== 0 }"
            class="h-2 rounded-full transition-all duration-300 hover:bg-blue-500 focus:outline-none"></button>
        <button @click="activeSlide = 1"
            :class="{ 'w-10 bg-blue-600': activeSlide === 1, 'w-5 bg-gray-400': activeSlide !== 1 }"
            class="h-2 rounded-full transition-all duration-300 hover:bg-blue-500 focus:outline-none"></button>
        <button @click="activeSlide = 2"
            :class="{ 'w-10 bg-blue-600': activeSlide === 2, 'w-5 bg-gray-400': activeSlide !== 2 }"
            class="h-2 rounded-full transition-all duration-300 hover:bg-blue-500 focus:outline-none"></button>
        <button @click="activeSlide = 3"
            :class="{ 'w-10 bg-blue-600': activeSlide === 3, 'w-5 bg-gray-400': activeSlide !== 3 }"
            class="h-2 rounded-full transition-all duration-300 hover:bg-blue-500 focus:outline-none"></button>
    </div>
</div>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
