@extends('layouts.app')

@section('head')
    @parent
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
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
                        <div class="table" id="vacancies_list">
                            <div class="row table-header">
                                <div class="col-sm-12">
                                    @if($parser->status)
                                        <button class="btn btn-warning" data-status="0" type="button" id="parser__button">Парсер включен</button>
                                    @else
                                        <button class="btn btn-default" data-status="1" type="button" id="parser__button">Парсер выключен</button>
                                    @endif
                                    <span class="text-success"> Запусков парсера : <span class="badge">{{ $parser->sessions }}</span> </span>
                                        <span class="text-success"> Новых вакансий: <span class="badge">{{ $parser->new }}</span> </span>
                                        <span class="text-success"> Всего вакансий : <span class="badge">{{ $parser->total }}</span> </span>
                                        <span class="text-success"> Последний запуск : <span class="badge">{{ date('d-m-Y H:i:s', strtotime($parser->updated_at)) }}</span> </span>
                                </div>
                            </div>
                            <table id="vacancies" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Город</th>
                                        <th>Компания</th>
                                        <th>Должность</th>
                                        <th>Ссылка</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Город</th>
                                        <th>Компания</th>
                                        <th>Должность</th>
                                        <th>Ссылка</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal__wrapper"></div>
@endsection

@section('scripts')
    @parent
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
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
                    {
                        "data": "updated_at",
                        "name": "updated_at",
                        "render": function ( updated_at ) {
                            return parseDate(updated_at, 'P_DATETIME')
                        }
                    },
                    { "data": "city", "name": "city" },
                    { "data": "employer_name", "name": "employer_name" },
                    {
                        "data": "vacancy_name",
                        "name": "vacancy_name",
                        "render": function ( vacancy_name )  {
                            return '<button class="btn btn-xs btn-link vacancy_name" title="Подробный просмотр">'+vacancy_name+'</button>';
                        }
                    },
                    {
                        "data": "vacancy_url",
                        "name": "vacancy_url",
                        "render": function ( vacancy_url ) {
                            return '<a href="'+vacancy_url+'" target="_blank" title="Ссылка на оригинал вакансии">'+vacancy_url+'</a>';
                        }
                    }
                ]
            });
        });
    </script>
@endsection