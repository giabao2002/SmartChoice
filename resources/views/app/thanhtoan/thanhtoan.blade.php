<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Choice | Thanh toán</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('upload-img/logo.jpg') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
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
                        <span class="text-gray-700">Thanh toán</span>
                    </li>
                </ol>
            </nav>

            @php
                $tongtien = 0;
            @endphp

            @foreach ($giohangs as $giohang)
                @php
                    $tongtien +=
                        $giohang['so_luong'] * $giohang['don_gia'] -
                        $giohang['so_luong'] * $giohang['don_gia'] * $giohang['khuyen_mai'] * 0.01;
                @endphp
            @endforeach

            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-1/2">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <form action="/thanh-toan/hoadon" method="POST">
                            @csrf
                            <div class="border-b border-gray-200 p-4">
                                <h5 class="text-xl font-semibold text-gray-800">Thông tin giao hàng</h5>
                            </div>

                            @if (session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4"
                                    role="alert">
                                    <span class="block sm:inline">{{ session('error') }}</span>
                                </div>
                            @endif

                            <div class="p-6 space-y-6">
                                <div>
                                    <label for="hinh_thuc_thanh_toan" class="block text-sm font-medium text-gray-700">
                                        Hình thức thanh toán
                                    </label>
                                    <select name="hinh_thuc_thanh_toan" id="hinh_thuc_thanh_toan"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="Sau khi nhận hàng">Thanh toán khi nhận hàng</option>
                                        <option value="Thanh toán qua MoMo">Thanh toán qua MoMo</option>
                                        <optgroup label="Ngân hàng">
                                            <option value="NCB">Ngân hàng NCB</option>
                                            <option value="AGRIBANK">Ngân hàng Agribank</option>
                                            <option value="SCB">Ngân hàng SCB</option>
                                            <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                            <option value="EXIMBANK">Ngân hàng EximBank</option>
                                            <option value="MSBANK">Ngân hàng MSBANK</option>
                                            <option value="NAMABANK">Ngân hàng NamABank</option>
                                            <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                            <option value="VIETCOMBANK">Ngân hàng VCB</option>
                                            <option value="HDBANK">Ngân hàng HDBank</option>
                                            <option value="DONGABANK">Ngân hàng Dong A</option>
                                            <option value="TPBANK">Ngân hàng TPBank</option>
                                            <option value="OJB">Ngân hàng OceanBank</option>
                                            <option value="BIDV">Ngân hàng BIDV</option>
                                            <option value="TECHCOMBANK">Ngân hàng Techcombank</option>
                                            <option value="VPBANK">Ngân hàng VPBank</option>
                                            <option value="MBBANK">Ngân hàng MBBank</option>
                                            <option value="ACB">Ngân hàng ACB</option>
                                            <option value="OCB">Ngân hàng OCB</option>
                                            <option value="IVB">Ngân hàng IVB</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div>
                                    <label for="ten_nguoi_nhan" class="block text-sm font-medium text-gray-700">
                                        Tên người nhận
                                    </label>
                                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan"
                                        value="{{ $data['ten_nguoi_dung'] }}" required
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                                </div>

                                <div>
                                    <label for="sdt" class="block text-sm font-medium text-gray-700">
                                        Số điện thoại
                                    </label>
                                    <input type="text" id="sdt" name="sdt" value="{{ $data['sdt'] }}"
                                        required
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                                </div>

                                <div>
                                    <label for="dia_chi_nhan" class="block text-sm font-medium text-gray-700">
                                        Địa chỉ nhận
                                    </label>
                                    <input type="text" id="dia_chi_nhan" name="dia_chi_nhan" required
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                                </div>

                                <div>
                                    <label for="ghi_chu" class="block text-sm font-medium text-gray-700">
                                        Ghi chú
                                    </label>
                                    <textarea id="ghi_chu" name="ghi_chu" rows="4"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <input type="hidden" name="tong_tien" value="{{ number_format($tongtien) }}" />
                                <input type="hidden" name="thanh_toans" value="{{ serialize($giohangs) }}" />

                                <button type="submit"
                                    class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg transition-colors duration-200 flex items-center justify-center">
                                    <i class="fas fa-credit-card mr-2"></i>
                                    Thanh Toán
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="border-b border-gray-200 p-4">
                            <h5 class="text-xl font-semibold text-gray-800">Thông tin hóa đơn</h5>
                        </div>
                        <div class="p-6">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Sản phẩm
                                        </th>
                                        <th
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Đơn giá
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($giohangs as $giohang)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $giohang['ten_san_pham'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                                                {{ number_format($km = sprintf('%d', $giohang['so_luong'] * $giohang['don_gia'] - $giohang['so_luong'] * $giohang['don_gia'] * $giohang['khuyen_mai'] * 0.01)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            Phí vận chuyển
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right">
                                            Miễn phí
                                        </td>
                                    </tr>

                                    <tr class="bg-green-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-700">
                                            Tổng giá
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-700 text-right">
                                            {{ number_format($tongtien) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="cart-footer mt-6 flex flex-col items-center" style="display: none;">
                                <div class="qr-code bg-white p-4 rounded-lg shadow-md w-64 h-64 mb-4"
                                    id="image-qr-code">
                                    @if (!empty($qrCode))
                                        <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"
                                            class="w-full h-full object-cover" />
                                    @endif
                                </div>
                                <button id="btn-generate-new-qr"
                                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition-colors duration-200">
                                    Tạo mới
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.cart-footer').hide();
            $(document).on('change', '#hinh_thuc_thanh_toan', function(event) {
                event.preventDefault();
                if ($(this).val() == 'Thanh toán qua MoMo') {
                    const qrCodeHtml = $('#image-qr-code').html();
                    if (qrCodeHtml == '') {
                        $('#image-qr-code').html('');
                        generateQrCode();
                    }
                    $('.cart-footer').show();
                } else {
                    $('.cart-footer').hide();
                }
            });

            function generateQrCode() {
                const url = "{{ route('get-qr') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        const qrCode = data.qrCode;
                        if (qrCode == '') {
                            alert('Có lỗi xảy ra, vui lòng thử lại sau');
                            return;
                        }
                        $('#image-qr-code').html(
                            `<img src="data:image/svg+xml;base64,${qrCode}" alt="QR Code" class="w-full h-full object-cover"/>`
                            );
                    },
                    error: function(data) {
                        alert(data.error);
                    }
                });
            }

            $('#btn-generate-new-qr').click(function(event) {
                event.preventDefault();
                generateQrCode();
            });
        });
    </script>
</body>

</html>
