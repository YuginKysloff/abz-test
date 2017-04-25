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
                        <ul>
                            @foreach($workers['first'] as $key => $boss)
                                <li>
                                    {{ $boss->post->name }} - {{ $boss->name }}
                                    @if(isset($workers['second'][$key]))
                                        <ul>
                                            @foreach($workers['second'][$key] as $worker)
                                                <li id="{{ $worker->id }}" class="worker">
                                                    <button class="btn btn-link">
                                                        {{ $worker->post->name }} - {{ $worker->name }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/script.tree.js') }}"></script>
@endsection