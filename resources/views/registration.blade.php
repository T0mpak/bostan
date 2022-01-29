<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <title>Регистрация</title>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 500;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }
</style>
</head>
<body class="text-center">
    <main class="form-signin">
        <form action="{{ route('registration') }}" method="post">
            @csrf

            <a href="{{ route('home') }}"><img class="mb-4" src="{{ asset('img/bostan.svg') }}" alt="Bostan SVG" width="72"></a>
            <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

            <div class="form-floating mb-2">
                <input name="name" type="text" class="form-control @error('name') border-danger @enderror" id="floatingInput" placeholder="Username"
                value="{{ old('name') }}">
                <label for="floatingInput">Имя пользователя</label>
                @error('name')
                    <div class="alert-danger mb-2 mt-1 small">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-2">
                <input name="email" type="email" class="form-control @error('email') border-danger @enderror" id="floatingInput" placeholder="name@example.com"
                value="{{ old('email') }}">
                <label for="floatingInput">E-mail</label>
                @error('email')
                    <div class="alert-danger mb-2 mt-1 small">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-2">
                <input name="password" type="password" class="form-control @error('password') border-danger @enderror" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Пароль</label>
                @error('password')
                    <div class="alert-danger mb-2 mt-1 small">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-1">
                <input name="password_confirmation" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Повторите пароль</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="1"> Запомнить меня
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегестрироваться</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>
</body>
</html>
