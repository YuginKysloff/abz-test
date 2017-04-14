@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <h1 class="page-header">Добавление сотрудника</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form name="worker-crud" method="post" action="{{ route('storeWorker') }}" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                                        <label for="name">Введите ФИО</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="post">Выберите должность</label>
                                        <select class="form-control" name="post" id="post">
                                            @foreach($posts as $post)
                                                <option value="{{ $post->id }}" {{ ($post->id == 1) ? 'disabled' : '' }}>{{ $post->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="post">Выберите начальника</label>
                                        <select class="form-control" name="boss" id="boss">
                                            @foreach($workers as $worker)
                                                <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group {{ ($errors->has('salary')) ? 'has-error' : '' }}">
                                        <label for="salary">Зарплата</label>
                                        <input type="number" class="form-control" name="salary" id="salary" value="{{ old('salary') }}">
                                        @if ($errors->has('salary'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('salary') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <img src="{{ asset('/uploads/avatars/default.jpg') }}" alt="avatar" class="img-thumbnail center-block">
                                    </div>
                                    <div class="form-group {{ ($errors->has('avatar')) ? 'has-error' : '' }}">
                                        <label for="avatar">Выберите фото для загрузки</label>
                                        <input type="file" name="avatar" id="avatar">
                                        <p class="help-block">Максимальный размер фото 200кб. Размеры от 100X100 до 800X600</p>
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    {{ csrf_field() }}
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Создать</button>
                                    <a href="{{ url('/admin') }}" class="btn btn-primary">Назад</a>
                                </div>
                            </div>
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