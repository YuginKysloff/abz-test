@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <h1 class="page-header">Список сотрудников</h1>
                <div class="panel panel-default" id="workers_list">
                    @if (count($workers) > 0)
                        @include('admin.workers_list')
                    @endif
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