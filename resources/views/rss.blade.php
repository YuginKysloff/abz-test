@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                @if(isset($countAddLines))
                    <div class="alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Добавлено записей: {{ $countAddLines }}</strong>
                    </div>
                @endif
                @if(isset($countMissLines))
                    <div class="alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Пропущено записей: {{ $countMissLines }}</strong>
                        @if(isset($missLines))
                            <ul>
                                @foreach($missLines as $line)
                                    <li>
                                        {{ $line }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
                @if(isset($error))
                    <div class="alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{ $error }}</strong>
                    </div>
                @endif
                <h1 class="page-header">Список пользователей</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-6">
                                <form class="form-inline" role="form" method="post" action="{{ route('usersList') }}" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="file">
                                    </div>
                                    {{ csrf_field() }}
                                    <button type="submit" name="submit" class="btn btn-default">Загрузить файл</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="field__random">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="button__random">Случайный пользователь</button>
                                </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Логин</th>
                                        <th>Имя</th>
                                        <th>Фамилия</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->login }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/script.random.js') }}"></script>
@endsection