@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>В разработке</strong>
                </div>
                <h1 class="page-header">Список вакансий</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-6">
                                <form class="form-inline" role="form" method="post" action="" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="field__random">
                                        {{ csrf_field() }}
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="button__random">Поиск</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </form>
                            </div>
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

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection