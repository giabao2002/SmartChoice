@extends('admin.index')

@section('admin_content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
                <div class="px-4 py-5">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">
                            <i class="fas fa-list-check mr-2"></i>
                            Quản lý đơn hàng
                        </h2>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Khách hàng</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Địa chỉ</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        SĐT</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Thời gian đặt</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Hình thức thanh toán</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Trạng thái</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Thanh toán</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($donhangs as $donhang)
                                    @if ($donhang['trang_thai'] != 'Đã hủy' && $donhang['trang_thai'] != 'Đã hoàn thành')
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #{{ $donhang['id_don_hang'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $donhang['ten_nguoi_nhan'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $donhang['dia_chi_nhan'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $donhang['sdt'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $donhang['created_at'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $donhang['hinh_thuc_thanh_toan'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $donhang['trang_thai'] === 'Đã hoàn thành'
                                                    ? 'bg-green-100 text-green-800'
                                                    : ($donhang['trang_thai'] === 'Đang xử lý'
                                                        ? 'bg-yellow-100 text-yellow-800'
                                                        : 'bg-red-100 text-red-800') }}">
                                                    {{ $donhang['trang_thai'] }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ str_replace(',', '.', $donhang->tong_tien) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="flex space-x-2">
                                                    <a href="/admin/donhang/xem/id={{ $donhang['id_don_hang'] }}"
                                                        class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="/admin/donhang/hoanthanh/id={{ $donhang['id_don_hang'] }}"
                                                        class="text-green-600 hover:text-green-900 transition-colors duration-200">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    <a href="/admin/donhang/xoa/id={{ $donhang['id_don_hang'] }}"
                                                        onclick="return confirm('Bạn có thật sự muốn xóa ?');"
                                                        class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
