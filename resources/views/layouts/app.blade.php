<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @section('head')
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>{{ config('app.name') }}</title>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @show
    </head>
    <body role="document">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li {{ (url()->current() == url('/')) ? 'class=active' : '' }}>
                            <a href="{{ url('/') }}">Резюме</a>
                        </li>
                        <li><a>|</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a>|</a></li>
                        <li {{ (url()->current() == url('/task_wks')) ? 'class=active' : '' }}>
                            <a href="{{ url('/task_wks') }}">Задание WKS</a>
                        </li>
                        <li {{ (url()->current() == route('usersList')) ? 'class=active' : '' }}>
                            <a href="{{ route('usersList') }}">Пользователи</a>
                        </li>
                        <li><a>|</a></li>
                        <li {{ (url()->current() == url('/task_abz')) ? 'class=active' : '' }}>
                            <a href="{{ url('/task_abz') }}">Задание ABZ</a>
                        </li>
                        <li {{ (url()->current() == route('workersTree')) ? 'class=active' : '' }}>
                            <a href="{{ route('workersTree') }}">Сотрудники</a>
                        </li>
                        @if (Auth::guest())
                            <li {{ (url()->current() == route('login')) ? 'class=active' : '' }}>
                                <a href="{{ route('login') }}">Войти</a>
                            </li>
                        @else
                            <li {{ (url()->current() == route('listWorkers')) ? 'class=active' : '' }}>
                                <a  href="{{ route('listWorkers') }}">Редактировать</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Выход
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

    @section('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @show
    </body>
</html>
