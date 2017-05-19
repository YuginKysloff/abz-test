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
                        <li {{ (Request::is('/') ? 'class=active' : '') }}>
                            <a href="{{ url('/') }}">Резюме</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown {{ (Request::is('2up/*') ? 'active' : '') }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Для 2UP <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('task2UP') }}">Задание</a></li>
                                <li><a href="{{ route('listVacancies') }}">Вакансии</a></li>
                            </ul>
                        </li>
                        <li class="dropdown {{ (Request::is('leblav/*') ? 'active' : '') }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Для Leblav <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('taskLeblav') }}">Задание</a></li>
                                <li><a href="{{ route('getRss') }}">RSS</a></li>
                                <li><a href="{{ route('toDoList') }}">ToDo list</a></li>
                                <li><a href="{{ route('flatList') }}">Rent apartments</a></li>
                            </ul>
                        </li>
                        <li class="dropdown {{ (Request::is('wks/*') ? 'active' : '') }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Для WKS <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('taskWKS') }}">Задание</a></li>
                                <li><a href="{{ route('usersList') }}">Пользователи</a></li>
                            </ul>
                        </li>
                         <li class="dropdown {{ (Request::is('abroad/*') ? 'active' : '') }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">For abroad <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('taskAbroad') }}">Task</a></li>
                                <li><a href="http://cs90443-magento.tw1.ru/" target="_blank">Vocabulary</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="http://seven.cs90443-magento.tw1.ru/" target="_blank">Для СМ</a>
                        </li>
                        <li><a>|</a></li>
                        <li {{ (Request::is('task_abz') ? 'class=active' : '') }}>
                            <a href="{{ url('/task_abz') }}">Задание ABZ</a>
                        </li>
                        <li {{ (Request::is('workers') ? 'class=active' : '') }}>
                            <a href="{{ route('workersTree') }}">Сотрудники</a>
                        </li>
                        @if (Auth::guest())
                            <li {{ (Request::is('login') ? 'class=active' : '') }}>
                                <a href="{{ route('login') }}">Вход</a>
                            </li>
                        @else
                            <li {{ (Request::is('admin/*') ? 'class=active' : '') }}>
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
