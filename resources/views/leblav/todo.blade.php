@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <div id="message"></div>
                <h1 class="page-header">ToDo list</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary" onclick="$('#Modal').modal('show');">Добавить задачу</button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Статус</th>
                                        <th>Дата</th>
                                        <th>Операции</th>
                                    </tr>
                                </thead>
                                <tbody id="table__body">
                                    @foreach($tasks as $task)
                                        <tr id="task{{ $task->id }}">
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>
                                                @php
                                                    switch($task->status) {
                                                        case 1:
                                                            echo '<span class="text-warning">Создана<span>';
                                                            break;
                                                        case 2:
                                                            echo '<span class="text-info">В работе<span>';
                                                            break;
                                                        case 3:
                                                            echo '<span class="text-success">Завершена<span>';
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{ $task->updated_at }}</td>
                                            <td>
                                                <button class="btn btn-xs btn-danger" onclick="if(confirm('Вы действительно хотите удалить запись?')) destroy({{ $task->id }});" title="Удалить задачу">Удалить</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Добавление задачи</h4>
                </div>
                <div class="modal-body">
                    <form id="form__create" method="post" action="{{ route('storeWorker') }}" role="form">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="form__submit-button">Добавить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/script.todo.js') }}"></script>
@endsection