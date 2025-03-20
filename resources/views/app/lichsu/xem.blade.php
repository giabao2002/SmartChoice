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
                        <a href="/lich-su" class="text-gray-500 hover:text-blue-600 transition-colors duration-200">
                            Lịch sử đơn hàng
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-700">Chi tiết đơn hàng
                            #{{ isset($donhang['id_don_hang']) ? $donhang['id_don_hang'] : '' }}</span>
                    </li>
                </ol>
            </nav>

            <!-- Order Details Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                <div class="border-b border-gray-200 p-4 flex justify-between items-center">
                    <h5 class="text-xl font-semibold text-gray-800">Chi tiết đơn hàng</h5>
                    <a href="/lich-su"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Quay lại
                    </a>
                </div>

                <!-- Order Information -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h6 class="text-lg font-medium text-gray-700 mb-3">Thông tin đơn hàng</h6>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="mb-2">
                                <span class="font-medium text-gray-600">ID đơn hàng:</span>
                                <span
                                    class="ml-2">{{ isset($donhang['id_don_hang']) ? $donhang['id_don_hang'] : '' }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="font-medium text-gray-600">Ngày đặt hàng:</span>
                                <span
                                    class="ml-2">{{ isset($donhang['created_at']) ? $donhang['created_at'] : '' }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="font-medium text-gray-600">Cập nhật cuối:</span>
                                <span
                                    class="ml-2">{{ isset($donhang['updated_at']) ? $donhang['updated_at'] : '' }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="font-medium text-gray-600">Trạng thái:</span>
                                @if (isset($donhang['trang_thai']))
                                    @if ($donhang['trang_thai'] == 'Đang xử lý')
                                        <span
                                            class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{ $donhang['trang_thai'] }}
                                        </span>
                                    @elseif($donhang['trang_thai'] == 'Đã giao hàng')
                                        <span
                                            class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $donhang['trang_thai'] }}
                                        </span>
                                    @elseif($donhang['trang_thai'] == 'Đã hủy')
                                        <span
                                            class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ $donhang['trang_thai'] }}
                                        </span>
                                    @else
                                        <span
                                            class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            {{ $donhang['trang_thai'] }}
                                        </span>
                                    @endif
                                @endif
                            </div>
                            <div>
                                <span class="font-medium text-gray-600">Hình thức thanh toán:</span>
                                <span
                                    class="ml-2">{{ isset($donhang['hinh_thuc_thanh_toan']) ? $donhang['hinh_thuc_thanh_toan'] : '' }}</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h6 class="text-lg font-medium text-gray-700 mb-3">Thông tin giao hàng</h6>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="mb-2">
                                <span class="font-medium text-gray-600">Tên người nhận:</span>
                                <span
                                    class="ml-2">{{ isset($donhang['ten_nguoi_nhan']) ? $donhang['ten_nguoi_nhan'] : '' }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="font-medium text-gray-600">Số điện thoại:</span>
                                <span class="ml-2">{{ isset($donhang['sdt']) ? $donhang['sdt'] : '' }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="font-medium text-gray-600">Địa chỉ:</span>
                                <span
                                    class="ml-2">{{ isset($donhang['dia_chi_nhan']) ? $donhang['dia_chi_nhan'] : '' }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-600">Ghi chú:</span>
                                <span
                                    class="ml-2">{{ isset($donhang['ghi_chu']) ? $donhang['ghi_chu'] : 'Không có' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="px-6 pb-6">
                    <h6 class="text-lg font-medium text-gray-700 mb-4">Sản phẩm đã đặt</h6>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200" id="dataTable">
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
                                    $totalAmount = 0;
                                @endphp

                                @foreach ($donhangs as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item['ten_san_pham'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ number_format($item['don_gia']) }} VNĐ</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item['so_luong'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                                            @php
                                                $subtotal = $item['don_gia'] * $item['so_luong'];
                                                $totalAmount += $subtotal;
                                                echo number_format($subtotal) . ' VNĐ';
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="bg-gray-50">
                                    <td colspan="3"
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold text-gray-900">
                                        Tổng cộng:</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">
                                        {{ number_format($totalAmount) }} VNĐ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false
            });
        });
    </script>
@endsection
