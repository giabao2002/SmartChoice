<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Choice | Đăng nhập</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('upload-img/logo.jpg') }}">
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
                    <img src="{{ URL('upload-img/bg-auth.png') }}" class="max-w-full h-auto" alt="Login image">
                    <p class="mt-4 text-gray-600 text-center">Chúng tôi giúp bạn mua sắm sản phẩm mình yêu thích.</p>
                </div>
                
                <!-- Right column: Login Form -->
                <div class="md:w-1/2 p-8 flex flex-col">
                    <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Đăng nhập</h2>
                    
                    <form class="space-y-6" method="POST" action="{{ route('app.dashboard') }}">
                        <p class="text-gray-600">Hãy đăng nhập vào tài khoản của bạn</p>
                        @csrf
                        
                        @if (Session::get('thatbai'))
                            <p class="text-red-600">{{ Session::get('thatbai') }}</p>
                        @endif
                        
                        <div>
                            <label for="auth" class="block text-sm font-medium text-gray-700">Tên đăng nhập hoặc email</label>
                            <div class="mt-1">
                                <input id="auth" name="ten_dang_nhap" type="text" value="{{ old('ten_dang_nhap') }}" required autofocus
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required autocomplete="current-password"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">Ghi nhớ tài khoản</label>
                        </div>
                        
                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Đăng nhập
                            </button>
                            <div class="text-center mt-3">
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Quên mật khẩu?</a>
                            </div>
                        </div>
                        
                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">Chưa có tài khoản?
                                <a href="{{ route('auth.register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                    Đăng ký
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
