@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <h1 class="page-header">Тестовое задание.</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ol>
                        <li>
                            У каждого из нас есть свой любимый новостной портал. Так давайте напишем скрипт с
                            помощью которого мы сможем достать новости с данного новостного ресурса через RSS
                            канал. Вывод оформим с помощью таблицы.
                            Используем : PHP, Bootstrap
                        </li>
                        <li>
                            Каждый день мы имеем очень много задач, которые очень сложно запомнить. Предлагаю
                            создать todo list.
                            Используем: PHP, Jquery Ajax, Bootstrap.
                            Детали: Добавление/удаление задач c помощью ajax
                        </li>
                        <li>
                            Cоздать ресурс на котором можно размещать квартиры на сдачу.
                            Такой себе https://www.lun.ua/
                            Используем: Laravel/Bootstrap
                            Детали: Реализуем только список квартир, и возможность добавление (изображение,
                            цена, адрес, город)
                        </li>
                    </ol>
                    <a href="https://github.com/YuginKysloff/abz-test" target="_blank">Исходники</a>
                </div>
            </div>
        </div>
    </div>
@endsection