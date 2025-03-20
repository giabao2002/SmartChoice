@extends('app.app.app')

@section('content')
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Breadcrumb -->
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
                        <span class="text-gray-700">Lịch sử đơn hàng</span>
                    </li>
                </ol>
            </nav>

            <!-- Order History Table -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                @isset($donhangs)
                    <div class="p-4">
                        <!-- DataTable Controls -->
                        <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                            <div class="flex items-center mb-3 sm:mb-0">
                                <label class="mr-2 text-sm text-gray-600">Hiển thị</label>
                                <div class="relative inline-block w-24">
                                    <select id="entries-select"
                                        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <input type="text" id="table-search" placeholder="Tìm kiếm..."
                                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm w-full sm:w-64">
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table id="dataTable" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tên khách hàng</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Địa chỉ</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Số điện thoại</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Ngày cập nhật</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Hình thức thanh toán</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Trạng thái</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tổng tiền</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($donhangs as $donhang)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['id_don_hang'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['ten_nguoi_nhan'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['dia_chi_nhan'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['sdt'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['updated_at'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['hinh_thuc_thanh_toan'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($donhang['trang_thai'] == 'Đang xử lý')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        {{ $donhang['trang_thai'] }}
                                                    </span>
                                                @elseif($donhang['trang_thai'] == 'Đã giao hàng')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $donhang['trang_thai'] }}
                                                    </span>
                                                @elseif($donhang['trang_thai'] == 'Đã hủy')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $donhang['trang_thai'] }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        {{ $donhang['trang_thai'] }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                                                {{ $donhang['tong_tien'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="/lich-su/{{ $donhang['id_don_hang'] }}"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition-colors duration-200">
                                                    <i class="fas fa-eye mr-1"></i> Xem chi tiết
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- DataTable Pagination -->
                        <div class="flex flex-col sm:flex-row justify-between items-center mt-4">
                            <div class="text-sm text-gray-700 mb-3 sm:mb-0">
                                Hiển thị <span id="showing-start">1</span> đến <span id="showing-end">10</span> của <span
                                    id="total-entries">{{ count($donhangs) }}</span> mục
                            </div>
                            <div class="flex justify-center">
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <a href="#" id="prev-page"
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Previous</span>
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <div id="pagination-numbers" class="flex">
                                        <!-- Pagination numbers will be inserted here by JavaScript -->
                                    </div>
                                    <a href="#" id="next-page"
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Next</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Order Details Table -->
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tên sản phẩm</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Đơn giá</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Số lượng</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $donhangs = unserialize($donhang['hoa_don']);
                                    @endphp

                                    @foreach ($donhangs as $donhang)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['ten_san_pham'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ number_format($donhang['don_gia']) }} VNĐ</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donhang['so_luong'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                                                {{ number_format($donhang['don_gia'] * $donhang['so_luong']) }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            const table = $('#dataTable').DataTable({
                "dom": 't<"pagination">',
                "language": {
                    "emptyTable": "Không có dữ liệu",
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                    "infoFiltered": "(lọc từ _MAX_ tổng số mục)",
                    "zeroRecords": "Không tìm thấy dữ liệu phù hợp"
                },
                "pageLength": 10,
                "order": [
                    [0, 'desc']
                ] // Order by first column (ID) descending
            });

            // Search functionality
            $('#table-search').on('keyup', function() {
                table.search(this.value).draw();
                updatePaginationInfo();
            });

            // Number of entries functionality
            $('#entries-select').on('change', function() {
                table.page.len(this.value).draw();
                updatePaginationInfo();
                updatePaginationLinks();
            });

            // Custom pagination
            function updatePaginationLinks() {
                const paginationContainer = $('#pagination-numbers');
                paginationContainer.empty();

                const totalPages = table.page.info().pages;
                const currentPage = table.page.info().page;

                // Add first 3 pages
                for (let i = 0; i < Math.min(3, totalPages); i++) {
                    addPaginationButton(i, currentPage);
                }

                // Add ellipsis if needed
                if (totalPages > 6 && currentPage >= 3) {
                    paginationContainer.append(`
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                            ...
                        </span>
                    `);
                }

                // Add pages around current page
                if (totalPages > 3 && currentPage >= 3 && currentPage < totalPages - 3) {
                    for (let i = currentPage - 1; i <= currentPage + 1; i++) {
                        if (i >= 3 && i < totalPages - 3) {
                            addPaginationButton(i, currentPage);
                        }
                    }
                }

                // Add ellipsis if needed
                if (totalPages > 6 && currentPage < totalPages - 3) {
                    paginationContainer.append(`
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                            ...
                        </span>
                    `);
                }

                // Add last 3 pages
                if (totalPages > 3) {
                    for (let i = Math.max(3, totalPages - 3); i < totalPages; i++) {
                        addPaginationButton(i, currentPage);
                    }
                }
            }

            function addPaginationButton(pageNum, currentPage) {
                const paginationContainer = $('#pagination-numbers');
                const activeClass = pageNum === currentPage ? 'bg-blue-50 border-blue-500 text-blue-600 z-10' :
                    'bg-white border-gray-300 text-gray-500 hover:bg-gray-50';

                paginationContainer.append(`
                    <a href="#" data-page="${pageNum}" class="relative inline-flex items-center px-4 py-2 border ${activeClass} text-sm font-medium pagination-link">
                        ${pageNum + 1}
                    </a>
                `);
            }

            // Handle pagination clicks
            $(document).on('click', '.pagination-link', function(e) {
                e.preventDefault();
                const pageNum = parseInt($(this).attr('data-page'));
                table.page(pageNum).draw('page');
                updatePaginationLinks();
                updatePaginationInfo();
            });

            // Previous page button
            $('#prev-page').on('click', function(e) {
                e.preventDefault();
                if (table.page.info().page > 0) {
                    table.page('previous').draw('page');
                    updatePaginationLinks();
                    updatePaginationInfo();
                }
            });

            // Next page button
            $('#next-page').on('click', function(e) {
                e.preventDefault();
                if (table.page.info().page < table.page.info().pages - 1) {
                    table.page('next').draw('page');
                    updatePaginationLinks();
                    updatePaginationInfo();
                }
            });

            // Update the "Showing X to Y of Z entries" text
            function updatePaginationInfo() {
                const info = table.page.info();
                $('#showing-start').text(info.start + 1);
                $('#showing-end').text(info.end);
                $('#total-entries').text(info.recordsDisplay);
            }

            // Initial setup
            updatePaginationLinks();
            updatePaginationInfo();
        });
    </script>
@endsection
