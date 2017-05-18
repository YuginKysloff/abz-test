@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>В разработке</strong>
                </div>
                <h1 class="page-header">Список вакансий</h1>
                <div class="row">
                    <div class="col-sm-6">
                        @if(config('parser.status', false))
                            <button class="btn btn-warning" data-status="1" type="button" id="parser__button">Парсер включен</button>
                        @else
                            <button class="btn btn-success" data-status="0" type="button" id="parser__button">Парсер выключен</button>
                        @endif
                            <span class="text-success"> Запусков парсера : {{ $data['parser']->sessions }} </span>
                        <span class="text-success"> Получено вакансий : {{ $data['vacancies']->total() }} </span>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-6">
                                <form class="form-inline" role="form" method="post" action="" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="field__random">
                                        {{ csrf_field() }}
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="button__random">Поиск</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        {{--<th>ID</th>--}}
                                        <th>Город</th>
                                        <th>Компания</th>
                                        <th>Должность</th>
                                        <th>Ссылка</th>
                                        <th>Дата</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['vacancies'] as $vacancy)
                                        <tr>
                                            {{--<td>{{ $vacancy->vacancy_id }}</td>--}}
                                            <td>{{ $vacancy->city }}</td>
                                            <td>{{ $vacancy->employer_name }}</td>
                                            <td>{{ $vacancy->vacancy_name }}</td>
                                            <td><a href="{{ $vacancy->vacancy_url }}" target="_blank">{{ $vacancy->vacancy_url }}</a></td>
                                            <td>{{ date('d/m/Y', strtotime($vacancy->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data['vacancies']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/script.vacancies.js') }}"></script>
@endsection