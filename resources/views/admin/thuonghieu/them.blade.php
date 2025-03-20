@extends('admin.index')

@section('admin_content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
                <div class="px-4 py-5">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">
                            <i class="fas fa-trademark mr-2"></i>
                            Thêm thương hiệu
                        </h2>
                    </div>

                    <form action="/admin/thuonghieu/them" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="ten_thuong_hieu" class="block text-sm font-medium text-gray-700">Tên thương
                                hiệu</label>
                            <input type="text" name="ten_thuong_hieu" id="ten_thuong_hieu" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                        </div>

                        <div class="flex space-x-3">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-plus mr-2"></i>
                                Thêm
                            </button>
                            <a href="/admin/thuonghieu"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
