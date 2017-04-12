@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <h1 class="page-header">Список сотрудников</h1>
                <div class="table-responsive">
                    <a href="{{ route('formCreateWorker') }}" class="btn btn-primary">Добавить сотрудника</a>
                    <table id="table_workers" class="table table-striped">
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
                                        <a title="Подробный просмотр">{{ $worker->name }}</a>
                                    </td>
                                    <td>{{ $worker->post_id }}</td>
                                    <td>{{ $worker->salary }}</td>
                                    <td>{{ $worker->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-warning" title="Изменить запись">
                                            Изменить
                                        </a>
                                        <a href="{{ route('deleteWorker', ['id' => $worker->id]) }}" class="btn btn-xs btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form{{ $worker->id }}').submit();" title="Удалить запись">
                                            Удалить
                                        </a>
                                        <form id="delete-form{{ $worker->id }}" action="{{ route('deleteWorker', ['id' =>$worker->id]) }}" method="POST">
                                            {{--<input type="hidden" name="id" value="{{ $slide->id }}">--}}
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