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
                <h1 class="page-header">Список сотрудников</h1>
                <div class="panel panel-default" id="workers_list">
                    <div class="panel-body">
                        <div class="table">
                            <div class="row table-header">
                                <div class="col-sm-2">
                                    <a href="{{ route('formCreateWorker') }}" class="btn btn-primary">Добавить сотрудника</a>
                                </div>
                                <div class="col-sm-10">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>{{ session('success') }}</strong>
                                        </div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>{{ session('error') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <table id="workers" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>Зарплата</th>
                                    <th>Дата приема</th>
                                    <th>Дата редактирования</th>
                                </tr>
                                </thead>
                                <tfoot>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>Зарплата</th>
                                    <th>Дата приема</th>
                                    <th>Дата редактирования</th>
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
    <script src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.15/datatables.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#workers').DataTable({
                "stateSave": true,
                "Processing": true,
                "serverSide": true,
                rowId: 'id',
                ajax: {
                    url: '{{ route('getWorkers') }}',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr('content')
                    },
                    type: "POST"
                },
                "columns": [
                    {
                        "data": "name",
                        "name": "name",
                        "render": function ( name )  {
                            return '<button class="btn btn-xs btn-link worker_name" title="Подробный просмотр">'+name+'</button>';
//                            return  '<a href="'+name+'">' + name + '</a>';
                        }
                    },
                    { "data": "post.name", "name": "post_id" },
                    { "data": "salary", "name": "salary" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "updated_at", "name": "updated_at" }
                ]
            });
        });
    </script>
@endsection