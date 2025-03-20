@extends('admin.index')

@section('admin_content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden pt-6">
                <div class="px-4 py-5">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-3xl font-extrabold text-gray-900 flex items-center">
                            <i class="fas fa-chart-line mr-4 text-blue-600"></i> Thống kê
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                        @php
                            $cards = [
                                [
                                    'icon' => 'fas fa-dollar-sign',
                                    'color' => 'bg-green-500',
                                    'title' => 'Doanh thu tháng',
                                    'value' => number_format($thongkethang) . ' VNĐ',
                                ],
                                [
                                    'icon' => 'fas fa-chart-bar',
                                    'color' => 'bg-blue-500',
                                    'title' => 'Doanh thu năm',
                                    'value' => number_format($thongkenam) . ' VNĐ',
                                ],
                                [
                                    'icon' => 'fas fa-user-group',
                                    'color' => 'bg-indigo-500',
                                    'title' => 'Khách hàng',
                                    'value' => count($users),
                                ],
                                [
                                    'icon' => 'fas fa-copyright',
                                    'color' => 'bg-yellow-500',
                                    'title' => 'Thương hiệu',
                                    'value' => count($thuonghieus),
                                ],
                                [
                                    'icon' => 'fas fa-shapes',
                                    'color' => 'bg-purple-500',
                                    'title' => 'Loại sản phẩm',
                                    'value' => count($loaisanphams),
                                ],
                                [
                                    'icon' => 'fas fa-box-open',
                                    'color' => 'bg-red-500',
                                    'title' => 'Sản phẩm',
                                    'value' => count($sanphams),
                                ],
                                [
                                    'icon' => 'fas fa-tag',
                                    'color' => 'bg-green-500',
                                    'title' => 'Khuyến mãi',
                                    'value' => count($khuyenmais),
                                ],
                                [
                                    'icon' => 'fas fa-file-invoice',
                                    'color' => 'bg-blue-500',
                                    'title' => 'Hóa đơn',
                                    'value' => count($donhangs),
                                ],
                            ];
                        @endphp

                        @foreach ($cards as $card)
                            <div
                                class="bg-white shadow-lg rounded-xl p-7 flex items-center hover:shadow-2xl hover:-translate-y-2 transition-transform duration-300 border border-gray-300">
                                <div
                                    class="w-16 h-16 flex items-center justify-center rounded-full {{ $card['color'] }} text-white text-3xl">
                                    <i class="{{ $card['icon'] }}"></i>
                                </div>
                                <div class="ml-6">
                                    <dt class="text-lg font-semibold text-gray-600">{{ $card['title'] }}</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ $card['value'] }}</dd>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }
    </style>
@endsection
