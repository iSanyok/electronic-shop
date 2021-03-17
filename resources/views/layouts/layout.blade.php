<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Vestibule
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130406

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Онлайн магазин электроники</title>
    <link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="/css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
    <div id="menu-wrapper">
        <div id="menu" class="container">
            <ul>
                <li class="{{Request::path() === '/' ? 'current_page_item' : ''}}">
                    <a href="{{ route('index') }}">Главная</a></li>

                <li class="{{Request::path() === 'categories' ? 'current_page_item' : ''}}">
                    <a href="{{ route('categories') }}">Категории</a></li>

                <li class="{{Request::path() === 'basket' ? 'current_page_item' : ''}}">
                    <a href="{{ route('basket') }}">Корзина</a></li>

                <li class="{{Request::path() === 'contacts' ? 'current_page_item' : ''}}">
                    <a href="#">Наши магазины</a></li>
                @auth
                    @can('admin')
                        <li class="{{Request::path() === 'admin' ? 'current_page_item' : ''}}">
                            <a href="{{ route('panel') }}">Панель админа</a></li>
                    @else
                        <li class="{{Request::path() === 'profile' ? 'current_page_item' : ''}}">
                            <a href="{{ route('profile') }}">Профиль</a></li>
                    @endcan
                    <li class="{{Request::path() === 'logout' ? 'current_page_item' : ''}}"><a href="{{ route('logout') }}"
                                                                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        >Выход</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="{{Request::path() === 'login' ? 'current_page_item' : ''}}"><a href="{{ route('login') }}">Войти</a></li>
                    <li class="{{Request::path() === 'register' ? 'current_page_item' : ''}}"><a href="{{ route('register') }}">Регистрация</a></li>
                @endauth
            </ul>
        </div>
    </div>
    @yield('content')
</div>

<script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
