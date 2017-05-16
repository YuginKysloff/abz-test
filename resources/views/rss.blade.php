@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="main">
                <h1 class="page-header">{{ $rss->channel->title }}</h1>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="blog-main">
                                @foreach($rss->channel->item as $item)
                                    <div class="blog-post">
                                        <h2 class="blog-post-title">{{ $item->title }}</h2>
                                        <p class="blog-post-meta">Дата публикации: {{ date('d-m-Y', strtotime($item->pubDate)) }}</p>
                                        <p>{!! $item->description !!}</p>
                                    </div><!-- /.blog-post -->
                                @endforeach
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
