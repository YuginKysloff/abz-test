@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <h1 class="page-header">Добавление объявления</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" action="{{ route('storeFlat') }}" role="form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ ($errors->has('city')) ? 'has-error' : '' }}">
                                        <label for="city">Город</label>
                                        <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}">
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
                                        <label for="address">Адрес</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ ($errors->has('price')) ? 'has-error' : '' }}">
                                        <label for="price">Цена</label>
                                        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <img src="{{ asset('/storage/flats/default.png') }}" alt="Добавление фото" class="img-thumbnail center-block">
                                    </div>
                                    <div class="form-group {{ ($errors->has('image')) ? 'has-error' : '' }}">
                                        <label for="image">Выберите фото для загрузки</label>
                                        <input type="file" name="image" id="image">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    {{ csrf_field() }}
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Создать</button>
                                    <a href="{{ route('flatList') }}" class="btn btn-primary">Назад</a>
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
    {{--<script src="{{ asset('js/script.js') }}"></script>--}}
@endsection