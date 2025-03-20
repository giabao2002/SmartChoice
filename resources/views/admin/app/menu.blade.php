<!-- Sidebar -->
<div class="bg-gray-800 text-white flex-shrink-0 hidden sm:block transition-all duration-300" x-data="{ collapsed: false }"
    :class="collapsed ? 'w-16' : 'w-64'">
    <div class="px-6 pt-6 pb-4">
        <a href="/admin"
            class="text-xl font-bold text-white flex items-center justify-center hover:text-blue-400 transition-colors duration-200">
            <span x-show="!collapsed">Smart Choice</span>
        </a>
    </div>
    <nav class="mt-5">
        <div class="px-3 space-y-3">
            <a href="/admin" id="thongke"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-chart-bar text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Thống kê</span>
            </a>

            <a href="/admin/taikhoan" id="quanlytaikhoan"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-user-group text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Tài khoản</span>
            </a>

            <a href="/admin/thuonghieu" id="quanlythuonghieu"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-award text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Thương hiệu</span>
            </a>

            <a href="/admin/loaisanpham" id="quanlyloaisanpham"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-tags text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Loại sản phẩm</span>
            </a>

            <a href="/admin/sanpham" id="quanlysanpham"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-boxes-stacked text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Sản phẩm</span>
            </a>

            <a href="/admin/donhang" id="xetduyetdonhang"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-list-check text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Đơn hàng</span>
            </a>

            <a href="/admin/donhang/lichsu" id="lichsudonhang"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-clock-rotate-left text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Lịch sử</span>
            </a>

            <a href="/admin/khuyenmai" id="quanlykhuyenmai"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-gift text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Khuyến mãi</span>
            </a>

            <a href="/admin/phanquyen" id="quanlyphanquyen"
                class="group flex items-center px-4 py-2 text-base font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-shield-halved text-gray-300 group-hover:text-blue-400"></i>
                <span x-show="!collapsed" class="ml-3">Phân quyền</span>
            </a>
        </div>
    </nav>
</div>

<!-- Mobile sidebar toggle -->
<div class="sm:hidden fixed top-4 left-4 z-50">
    <button id="mobileSidebarToggle"
        class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-colors duration-200">
        <i class="fas fa-bars-staggered text-xl"></i>
    </button>
</div>
