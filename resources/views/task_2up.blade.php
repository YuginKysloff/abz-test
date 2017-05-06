@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <h1 class="page-header">Тестовое задание.</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul>
                        <li>
                            Получить список вакансий с сайта http://hh.ru/ сохранив их в базу.
                        </li>
                        <li>
                            Организовать поиск вакансий по городам на основе своей базы данных.
                        </li>
                        <li>
                            Парсинг должен быть организован циклически и вести учет новых и старых вакансий. Для тестового задания достаточно 50000 вакансий.
                        </li>
                        <li>
                            Данные должны быть сохранены в MySql.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection