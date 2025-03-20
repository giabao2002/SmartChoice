<header class="bg-white shadow-sm">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Mobile menu button-->
                <button type="button"
                    class="sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-colors duration-200">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            <div class="flex items-center">
                <!-- Profile dropdown -->
                <div class="ml-4 relative" x-data="{ open: false }">
                    <div>
                        <button type="button" @click="open = !open"
                            class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <img class="h-10 w-10 rounded-full border-2 border-gray-200 hover:border-blue-500"
                                src="{{ URL('upload-img/admin.jpg') }}" alt="Admin profile">
                        </button>
                    </div>
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
                        <a href="/trang-chu"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-store mr-2"></i>
                            Cửa hàng
                        </a>
                        <a href="/auth/logoff"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
