<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Choice | Đăng Ký</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('upload-img/icon-logo.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Left column: Image -->
                <div class="md:w-1/2 p-8 flex flex-col items-center justify-center">
                    <img src="{{ URL('upload-img/bg-auth.png') }}" class="max-w-full h-auto" alt="Register image">
                    <p class="mt-4 text-gray-600 text-center">Tạo tài khoản và bắt đầu mua sắm sản phẩm mà mình mơ ước.</p>
                </div>
                
                <!-- Right column: Registration Form -->
                <div class="md:w-1/2 p-8 flex flex-col">
                    <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Đăng ký tài khoản</h2>
                    
                    <form class="space-y-6" method="POST" action="{{ route('registerStore') }}">
                        @csrf
                        
                        <div class="space-y-4">
                            <!-- Full Name -->
                            <div>
                                <label for="ten_nguoi_dung" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                                <div class="mt-1">
                                    <input type="text" id="ten_nguoi_dung" name="ten_nguoi_dung" required autofocus
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="sdt" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                                <div class="mt-1">
                                    <input type="text" id="sdt" name="sdt" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="ten_dang_nhap" class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                                <div class="mt-1">
                                    <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" value="{{ old('ten_dang_nhap') }}" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('ten_dang_nhap')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                                <div class="mt-1">
                                    <input type="password" id="password" name="password" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu</label>
                                <div class="mt-1">
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Đăng ký
                            </button>
                        </div>

                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">
                                Đã có tài khoản?
                                <a href="{{ route('auth.login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                    Đăng nhập
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
