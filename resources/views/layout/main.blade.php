<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <span class="logo"><a href="{{ route('home') }}">itProger</a></span>
        <nav>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Главная</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">О нас</a>
            <a href="{{ route('articleadd') }}" class="{{ request()->routeIs('articleadd') ? 'active' : '' }}">Добавить статью</a>
            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'active' : '' }}">Блог</a>
        </nav>
    </header>
    <main class="container">
        @include('blocks.messages')
        @yield('content')
    </main>
    <footer>Все права защищены</footer>
</body>
</html>