@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
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
                <h1 class="page-header">Список сотрудников</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <a href="{{ route('formCreateWorker') }}" class="btn btn-primary">Добавить сотрудника</a>
                            <table id="table_workers" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ФИО</th>
                                        <th>Должность</th>
                                        <th>Зарплата</th>
                                        <th>Дата приема</th>
                                        <th>Операции</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(is_object($workers))
                                        @foreach($workers as $worker)
                                            <tr>
                                                <td class="worker_name" data-id="{{ $worker->id }}">
                                                    <button class="btn btn-xs btn-link" title="Подробный просмотр">{{ $worker->name }}</button>
                                                </td>
                                                <td>{{ $worker->post->name }}</td>
                                                <td>{{ $worker->salary }}</td>
                                                <td>{{ $worker->created_at->format('d.m.Y') }}</td>
                                                <td>
                                                    <a href="{{ route('formEditWorker', ['id' => $worker->id]) }}" class="btn btn-xs btn-warning" title="Изменить запись">
                                                        Изменить
                                                    </a>
                                                    <button class="btn btn-xs btn-danger" onclick="if(confirm('Вы действительно хотите удались запись?')){event.preventDefault(); document.getElementById('destroy-form{{ $worker->id }}').submit();}" title="Удалить запись">
                                                        Удалить
                                                    </button>
                                                    <form id="destroy-form{{ $worker->id }}" action="{{ route('destroyWorker', ['id' => $worker->id]) }}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">
                                                Нет данных
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $workers->links() }}
            </div>
        </div>
    </div>
    <div id="modal__wrapper"></div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/script.js') }}"></script>
@endsection