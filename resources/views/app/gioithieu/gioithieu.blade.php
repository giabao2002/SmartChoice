<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Choice | Giới thiệu</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('upload-img/logo.jpg') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Breadcrumb -->
            <div class="px-8 py-4 bg-gray-50 border-b">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li>
                            <a href="/trang-chu"
                                class="text-gray-500 hover:text-blue-600 transition-colors duration-200">
                                <i class="fas fa-home mr-1"></i>
                                Trang chủ
                            </a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-gray-700">Giới thiệu</span>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- Left column: Image -->
                <div class="md:w-1/2 p-8 flex flex-col items-center justify-center">
                    <img src="{{ URL('upload-img/gioithieu.png') }}" class="max-w-full h-auto rounded-lg shadow-md"
                        alt="Giới thiệu">
                    <p class="mt-4 text-gray-600 text-center">Chúng tôi giúp bạn mua sắm sản phẩm mình yêu thích.</p>
                </div>

                <!-- Right column: Content -->
                <div class="md:w-1/2 p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Smart Choice - WEBSITE BÁN GIÀY</h2>

                    <div class="prose prose-lg text-gray-600 space-y-4">
                        <p>Chúng tôi cũng đã và đang là những người tiêu dùng nên chúng tôi hiểu rất rõ tầm quan trọng
                            của một sản phẩm. Đó có thể là một sản phẩm thể thao chạy bộ, đi chơi hay sản phẩm đá banh nhưng
                            tựu chung lại thứ chúng ta cần vẫn là sự thoải mái và tự tin khi mang sản phẩm vào.</p>

                        <p>Với một đôi chân khỏe, một sản phẩm tốt bạn có thể bước qua những chướng ngại, có thể thoải
                            mái thể hiện mình, thoải mái vận động với những dòng thể thao hay thoải mái chưng diện với
                            những dòng Sneaker kinh điển.</p>

                        <p>Từ niềm cảm hứng bất tận với sản phẩm, đội ngũ chúng tôi đã cho ra đời đứa con tinh thần "STORM
                            SHOP". Với mong muốn mang đến cho khách hàng những sản phẩm "chất nhất" đến từ các thương
                            hiệu hàng đầu thế giới như B&O, JBL, Puma, Reebok, Fila, Marshall, New Balance, Asics,…
                            với mức giá vô cùng hợp lý.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
