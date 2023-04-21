{{--Шаблон файла, который включается в остальные вью--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>База контактов</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) {{--Подключение стилей бутстрап--}}
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('phoneBaseViews.index') }}">Контакты</a>
                    </li>
                    {{--ссылка появляется если юзер-админ--}}
                    @can('view', auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('layouts.admin') }}">Панель администратора</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-3">
    @yield('base') {{--Место куда включаются все вью, в которых есть секции--}}
    </div>
</body>
</html>
