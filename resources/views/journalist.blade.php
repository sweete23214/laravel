@extends('layouts.app')

@section('title', 'Журналист')

@section('content')
    <h1>Создание статьи</h1>

    <form action="{{ route('article.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Заголовок</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Категория</label>
            <select name="category_id" required style="padding: 8px; width: 100%; margin-bottom: 15px;">
                <option value="">— Выберите категорию —</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Текст статьи</label>
            <textarea name="content" required></textarea>
        </div>

        <button type="submit" class="btn">Опубликовать</button>
    </form>
@endsection