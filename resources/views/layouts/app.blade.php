<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Social Media Test</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <!-- Navigation stuff -->
        <ul class="flex items-center">
            <li class="p-3"><a href="{{ route('home') }}">Home</a></li>
            <li class="p-3"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="p-3"><a href="{{ route('posts') }}">Posts</a></li>
        </ul>

        <!-- Account stuff -->
        <ul class="flex items-center">
            @auth
                <li class="p-3"><a href="">{{ auth()->user()->username }}</a></li>
                <li class="p-3">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="p-3"><a href="{{ route('login') }}">Login</a></li>
                <li class="p-3"><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>