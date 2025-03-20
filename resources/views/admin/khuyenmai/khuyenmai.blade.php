@extends('admin.index')

@section('admin_content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
            <div class="px-4 py-5">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">
                        <i class="fas fa-gift mr-2"></i>
                        Quản lý khuyến mãi
                    </h2>
                    <a href="/admin/khuyenmai/them" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus mr-2"></i>
                        Thêm khuyến mãi
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên khuyến mãi</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giá trị khuyến mãi</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($khuyenmais as $khuyenmai)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    #{{$khuyenmai['id_khuyen_mai']}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$khuyenmai['ten_khuyen_mai']}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$khuyenmai['gia_tri_khuyen_mai']}}%
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex space-x-2">
                                        <a href="/admin/khuyenmai/sua/id={{$khuyenmai['id_khuyen_mai']}}" 
                                           class="text-yellow-600 hover:text-yellow-900 transition-colors duration-200">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/admin/khuyenmai/xoa/id={{$khuyenmai['id_khuyen_mai']}}"
                                           onclick="return confirm('Bạn có thật sự muốn xóa ?');"
                                           class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection