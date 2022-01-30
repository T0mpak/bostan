<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('link-css')
    @yield('style-css')

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>Bostan - @yield('title')</title>
</head>
<body>
    <div class="border-bottom border-2 pt-3 bg-white">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
                <a href="{{ route('home') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img width="52" src="{{ asset('img/bostan.svg') }}" alt="Bostan SVG">
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('home') }}" class="nav-link px-2 link-dark">Главная</a></li>
                    <li><a href="{{ route('news') }}" class="nav-link px-2 link-dark">Новости</a></li>
                </ul>

                @auth
                    <div class="col-md-3 text-end">
                        @if(auth()->user()->admin == 1)
                            <a href="{{ route('admin') }}" style="text-decoration: none;">
                                <button class="btn btn-link btn-outline-light m-2" style="text-decoration: none;">
                                    Админ
                                </button>
                            </a>
                        @else
                            <a href="{{ route('dashboard', auth()->user()->id) }}" style="text-decoration: none;">
                                <button class="btn btn-link btn-outline-light m-2" style="text-decoration: none;">
                                    Профиль
                                </button>
                            </a>
                        @endif
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary m-2">Выйти</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="col-md-3 text-end">
                        <a href="{{ route('login') }}"><button type="button" class="btn btn-outline-primary m-2">Войти</button></a>
                        <a href="{{ route('registration') }}"><button type="button" class="btn btn-primary m-2">Регистрация</button></a>
                    </div>
                @endguest
            </header>
        </div>
    </div>

    <div class="container mt-5 pb-3">
        @yield('content')
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="text-muted mb-3">Bostan 2021-2022 &copy;</div>
                    <div class="col item social">
                        <a href="https://facebook.com/"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a href="https://youtube.com/"><i class="fa fa-youtube"></i></a>
                        <a href="https://instagram.com/"><i class="fa fa-instagram"></i></a>
                        <a href="https://google.com/"><i class="fa fa-google"></i></a>
                    </div>
                </div>
                <div class="col-md-6 item text">
                    <h3>Bostan.kz</h3>
                    <span>"BOSTAN" официальная организация при <a href="https://iitu.edu.kz/" class="text-decoration-none text-info">АО "МУИТ"</a></span>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
