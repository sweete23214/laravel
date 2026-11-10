@extends('layouts.app')

@section('title', 'Категория')

@section('content')
    <h1>Категория: Технологии</h1>

    @for ($i = 1; $i <= 3; $i++)
        <div class="news-card">
            <p><strong>Категория:</strong> Технологии</p>
            <h3>Новость №{{ $i }} в категории</h3>
            <p>Текст новости, которая относится к категории «Технологии».</p>
            <p><small>Автор: Журналист {{ $i }}</small></p>
        </div>
    @endfor
@endsection