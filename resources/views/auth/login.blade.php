@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn">Войти</button>
        <a href="{{ route('register') }}" style="margin-left: 10px;">Нет аккаунта? Зарегистрироваться</a>
    </form>
@endsection