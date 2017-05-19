@extends('layouts.app')

@section('head')
    @parent
    <link href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.15/datatables.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>В разработке</strong>
                </div>
                <h1 class="page-header">Список вакансий</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table">
                            <div class="row table-header">
                                <div class="col-sm-12">
                                    @if($parser->status)
                                        <button class="btn btn-warning" data-status="0" type="button" id="parser__button">Парсер включен</button>
                                    @else
                                        <button class="btn btn-default" data-status="1" type="button" id="parser__button">Парсер выключен</button>
                                    @endif
                                    <span class="text-success"> Запусков парсера : {{ $parser->sessions }} </span>
                                    <span class="text-success"> Последний запуск : {{ date('d-m-Y H:i:s', strtotime($parser->updated_at)) }} </span>
                                </div>
                            </div>
                            <table id="vacancies" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Город</th>
                                        <th>Компания</th>
                                        <th>Должность</th>
                                        <th>Ссылка</th>
                                        <th>Дата</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Город</th>
                                        <th>Компания</th>
                                        <th>Должность</th>
                                        <th>Ссылка</th>
                                        <th>Дата</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.15/datatables.min.js"></script>
    <script src="{{ asset('js/script.vacancies.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#vacancies').DataTable({
                "displayLength": 25,
                "stateSave": true,
                "Processing": true,
                "serverSide": true,
                rowId: 'id',
                ajax: {
                    url: '{{ route('getVacancies') }}',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr('content')
                    },
                    type: "POST"
                },
                "columns": [
                    { "data": "city", "name": "city" },
                    { "data": "employer_name", "name": "employer_name" },
                    { "data": "vacancy_name", "name": "vacancy_name" },
                    {
                        "data": "vacancy_url",
                        "name": "vacancy_url",
                        "render": function ( vacancy_url ) {
                            return '<a href="'+vacancy_url+'" target="_blank">'+vacancy_url+'</a>';
                        }
                    },
                    {
                        "data": "updated_at",
                        "name": "updated_at",
                        "render": function ( updated_at ) {
                            return parseDate(updated_at, 'P_DATETIME')
                        }
                    }
                ]
            });
        });
    </script>
@endsection