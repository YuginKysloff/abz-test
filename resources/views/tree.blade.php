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
                        {!! $tree !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection