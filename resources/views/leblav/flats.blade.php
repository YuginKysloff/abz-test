@extends('layouts.app')

@section('head')
    @parent
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Аренда квартир</h1>
            <p>Здесь вы можете разместить объявление о сдаче в аренду квартиры</p>
            <p><a href="{{ route('createFlat') }}" class="btn btn-primary btn-lg" role="button">Добавить объявление</a></p>
        </div>
    </div>
    <div class="container grid_list">
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
        <div class="row">
            @foreach($flats as $flat)
                <div class="col-lg-4">
                    <img class="grid_img img-thumbnail" src="{{ asset('storage/flats/'.$flat->image) }}" alt="{{ $flat->address }}">
                    <h2>{{ $flat->city }}</h2>
                    <p>Адрес: {{ $flat->address }}</p>
                    <p>Цена: {{ $flat->price }}</p>
                    <p><a class="btn btn-default" href="#" role="button">Подробнее &raquo;</a></p>
                </div>
            @endforeach
        </div>
        {{ $flats->links() }}
    </div>
@endsection
