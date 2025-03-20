@extends('admin.index')

@section('admin_content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
            <div class="px-4 py-5">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">
                        <i class="fas fa-user-shield mr-2"></i>
                        Sửa phân quyền
                    </h2>
                </div>

                <form action="/admin/phanquyen/sua" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="id_phan_quyen" value="{{$phanquyen['id_phan_quyen']}}"/>

                    <div>
                        <label for="ten_phan_quyen" class="block text-sm font-medium text-gray-700">Tên phân quyền</label>
                        <input type="text" name="ten_phan_quyen" id="ten_phan_quyen" value="{{$phanquyen['ten_phan_quyen']}}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"/>
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-save mr-2"></i>
                            Cập nhật
                        </button>
                        <a href="/admin/phanquyen" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Quay lại
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection