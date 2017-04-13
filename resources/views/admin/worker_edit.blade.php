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
                <h1 class="page-header">Изменение данных сотрудника</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" action="{{ route('updateWorker') }}" role="form">
                    <div class="form-group">
                        <label for="name">Введите ФИО</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="post">Выберите должность</label>
                        <select class="form-control" name="post" id="post">
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}" {{ ($post->id == old('id')) ? 'selected' : '' }}>{{ $post->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary">Зарплата</label>
                        <input type="number" class="form-control" name="salary" id="salary" value="{{ old('salary') }}">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Выберите фото для загрузки</label>
                        <input type="file" id="avatar">
                        <p class="help-block">Максимальный размер фото 200кб. Размеры до 800х600</p>
                    </div>
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal__wrapper"></div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/script.js') }}"></script>
@endsection