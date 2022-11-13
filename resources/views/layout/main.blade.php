<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- asset - этот метод связывается с папкой public. CSS прописывается в папке resources --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/> 
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"/> --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"/> --}}
</head>

<body>
    <header class="container__">
        <span class="logo"><a href="{{ route('home') }}">itProger</a></span>
        <nav>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer>Все права защищены</footer>
</body>
</html>