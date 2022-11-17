@extends('layout.main')

@section('page-title')
{{ $article->title }}
@endsection

@section('content')
    <h1>{{ $article->title }} / Статья на Blog Spot</h1>
    <a href="/" class="back-button">На главную</a>
    <div class="articles one">
        <div class="post">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->anons }}</p><br>
            <p>{!! $article->text !!}</p>
            <br><hr>
            <a href="/article/{{$article->id}}/edit">Изменить</a>
            {!! Form::open(['method' => 'DELETE', 'action' => ['ArticlesController@destroy', $article->id]]) !!}
                {{ Form::submit('Удалить', ['class' => 'delete-button']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection