@extends('layout.main')

@section('page-title')
Авторизация
@endsection

@section('content')
    <h1>Авторизация</h1>
    <a href="/" class="back-button">На главную</a>

    <form method="POST" action="/login"  class="article-form">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" value="{{ old('email') }}" name="email">

        <label for="password">Пароль</label>
        <input id="password" type="password" value="{{ old('passowrd') }}" name="password">

        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Запомнить меня</label>
        
        <input type="submit" value="Войти" class="login-btn" />
    </form>
@endsection
