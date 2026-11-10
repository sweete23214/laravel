@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <h1>Все новости</h1>

    @foreach ($articles as $article)
        <div class="news-card">
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->content }}</p>
        </div>
    @endforeach
@endsection