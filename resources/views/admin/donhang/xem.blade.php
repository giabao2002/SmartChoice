@extends('admin.index')

@section('admin_content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
                <div class="px-4 py-5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">
                                <i class="fas fa-eye mr-2"></i>
                                Chi tiết đơn hàng #{{ $id_don_hang }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                Đặt hàng ngày {{ $donhang->created_at }}
                            </p>
                        </div>
                        <div class="flex space-x-3">
                            @if ($trang_thai == 'Đang xử lý')
                                <a href="/admin/donhang/duyet/id={{ $id_don_hang }}"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                    <i class="fas fa-check mr-2"></i>
                                    Duyệt đơn hàng
                                </a>
                            @endif
                            @if ($trang_thai == 'Đã xác nhận')
                                <a href="/admin/donhang/hoanthanh/id={{ $id_don_hang }}"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                    <i class="fas fa-check-double mr-2"></i>
                                    Hoàn thành đơn hàng
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Sản phẩm</th>
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
                                    $donhangs = unserialize($donhang->hoa_don);
                                @endphp

                                @foreach ($donhangs as $item)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if(isset($item['hinh_anh_1']))
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ URL('product-img/' . $item['hinh_anh_1']) }}" alt="">
                                                </div>
                                                @endif
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $item['ten_san_pham'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ number_format((float)$item['don_gia']) }}đ
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item['so_luong'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ number_format((float)$item['don_gia'] * (int)$item['so_luong']) }}đ
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-50">
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-right text-sm font-medium text-gray-500">
                                        Tổng cộng:
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ str_replace(',', '.', $donhang->tong_tien) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
