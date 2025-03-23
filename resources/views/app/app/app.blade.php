<!-- Header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Choice</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('upload-img/logo.jpg') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables -->
    <script src="{{ URL('js/jquery.dataTables.min.js') }}"></script>
    <!-- Facebook SDK -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
        nonce="gCULMMol"></script>
    <!-- RateYo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="min-h-screen bg-gray-50">
    <!-- Back to top button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"
        class="fixed bottom-4 right-4 z-50 hidden rounded-full p-2 bg-white shadow-lg">
        <img src="{{ URL('upload-img/scroll.png') }}" class="h-10" alt="Scroll to top">
    </button>

    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <a href="/" class="flex-shrink-0 flex items-center">
                        <img src="{{ URL('upload-img/logo-header.png') }}" class="h-14" alt="Smart Choice">
                    </a>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/"
                            class="inline-flex items-center px-1 pt-1 font-medium text-gray-500 hover:text-gray-900">Trang chủ</a>
                        <a href="/cua-hang"
                            class="inline-flex items-center px-1 pt-1 font-medium text-gray-500 hover:text-gray-900">Cửa hàng</a>
                        <a href="/gioi-thieu"
                            class="inline-flex items-center px-1 pt-1 font-medium text-gray-500 hover:text-gray-900">Giới thiệu</a>
                        <a href="/gio-hang"
                            class="inline-flex items-center px-1 pt-1 font-medium text-gray-500 hover:text-gray-900">Giỏ hàng</a>
                    </div>
                </div>

                <!-- Search and User Auth -->
                <div class="flex items-center">
                    <!-- Search -->
                    <form action="/tim-kiem" method="POST" class="relative hidden sm:block w-64 mr-4">
                        @csrf
                        <div class="flex">
                            <input type="text"
                                class="block w-full pl-3 pr-10 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                name="tim_kiem" placeholder="Tìm kiếm..." aria-label="Search">
                            <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-search text-gray-500"></i>
                            </button>
                        </div>
                    </form>

                    <!-- User Authentication -->
                    @if (Session::get('DangNhap'))
                        <div class="relative">
                            <button type="button" id="dropdownMenuButton" onclick="toggleDropdown()"
                                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm">
                                @if (session()->get('check') == 1)
                                    Quản trị viên
                                @else
                                    Khách hàng
                                @endif
                            </button>
                            <div id="userDropdown"
                                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="/tai-khoan"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Thông tin cá
                                        nhân</a>
                                    @if (session()->get('check') == 2)
                                        <a href="/lich-su"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đơn hàng</a>
                                    @endif
                                    <a href="/auth/logoff"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng xuất</a>
                                    @if (session()->get('check') == 1)
                                        <a href="/admin"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Trang Quản
                                            lý</a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('auth.login') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm mr-2">Đăng
                            nhập</a>
                        <a href="{{ route('auth.register') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm">Đăng ký</a>
                    @endif

                    <!-- Mobile menu button -->
                    <button type="button" onclick="toggleMobileMenu()"
                        class="sm:hidden inline-flex items-center justify-center p-2 ml-3 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="sm:hidden hidden" id="mobileMenu">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="/"
                        class="block pl-3 pr-4 py-2 border-l-4 border-blue-500 text-base font-medium text-blue-700 bg-blue-50">TRANG
                        CHỦ</a>
                    <a href="/cua-hang"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">CỬA
                        HÀNG</a>
                    <a href="/gioi-thieu"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">GIỚI
                        THIỆU</a>
                    <a href="/thanh-toan"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">THANH
                        TOÁN</a>
                    <a href="/gio-hang"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">Giỏ
                        hàng <i class="fas fa-shopping-cart ml-1"></i></a>

                    <!-- Mobile Search -->
                    <form action="/tim-kiem" method="POST" class="pt-2 px-3">
                        @csrf
                        <div class="relative">
                            <input type="text"
                                class="block w-full pl-3 pr-10 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                name="tim_kiem" placeholder="Tìm kiếm..." aria-label="Search">
                            <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-search text-gray-500"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 border-t border-gray-300">
        <div class="max-w-7xl mx-auto py-12 px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Liên hệ -->
                <div>
                    <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wider">Liên hệ</h3>
                    <div class="mt-4 space-y-3 text-gray-600">
                        <p><i class="fas fa-home text-blue-500 mr-2"></i>Thanh Xuân, Hà Nội</p>
                        <p><i class="fas fa-envelope text-blue-500 mr-2"></i>storm@gmail.com</p>
                        <p><i class="fas fa-phone text-blue-500 mr-2"></i>+84 123456789</p>
                    </div>
                </div>

                <!-- Tài khoản -->
                <div>
                    <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wider">Tài khoản</h3>
                    <div class="mt-4 space-y-3">
                        <a href="{{ route('auth.register') }}"
                            class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-angle-right text-silver-500 mr-2"></i> Đăng ký
                        </a>
                        <a href="{{ route('auth.login') }}"
                            class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-angle-right text-silver-500 mr-2"></i> Đăng nhập
                        </a>
                    </div>
                </div>

                <!-- Danh mục -->
                <div>
                    <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wider">Danh mục</h3>
                    <div class="mt-4 space-y-3">
                        <a href="/cua-hang" class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-angle-right text-silver-500 mr-2"></i> Cửa hàng
                        </a>
                        <a href="/gioi-thieu" class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-angle-right text-silver-500 mr-2"></i> Giới thiệu
                        </a>
                        <a href="/thanh-toan" class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-angle-right text-silver-500 mr-2"></i> Thanh toán
                        </a>
                    </div>
                </div>

                <!-- Mạng xã hội -->
                <div>
                    <h3 class="text-sm font-semibold text-blue-700 uppercase tracking-wider">Mạng xã hội</h3>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-blue-500 text-xl">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-silver-500 text-xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-500 text-xl">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-700 text-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bản quyền -->
        <div class="bg-gray-900 py-4">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <p class="text-gray-400">© 2024 Bản quyền thuộc về:
                    <a href="#" class="text-gray-300 hover:text-blue-400 font-semibold">Smart Choice</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // RateYo script
        $(function() {
            $("#rateYo").rateYo({
                starWidth: "30px",
                rating: "4.5",
                multiColor: {
                    "startColor": "#b0e4f5",
                    "endColor": "#16B5EA"
                }
            }).on("rateyo.set", function(e, data) {
                $('#danh_gia').val(data.rating);
            });
        });

        // Back to top script
        var mybutton = document.getElementById("myBtn");

        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // Toggle dropdown menu
        function toggleDropdown() {
            document.getElementById("userDropdown").classList.toggle("hidden");
        }

        // Toggle mobile menu
        function toggleMobileMenu() {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('#dropdownMenuButton')) {
                var dropdown = document.getElementById("userDropdown");
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        }
    </script>
</body>

</html>
