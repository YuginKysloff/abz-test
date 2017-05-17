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
        </div>
    </div>

    <div class="container grid_list">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-lg-4">
                <img class="grid_img" src="{{ asset('img/default.png') }}" width="200" alt="Generic placeholder image">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image">
                <h2>Heading</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div> <!-- /container -->

@endsection
