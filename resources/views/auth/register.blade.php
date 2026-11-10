@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <h1>Регистрация</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Подтверждение пароля</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn">Зарегистрироваться</button>
        <a href="{{ route('login') }}" style="margin-left: 10px;">Уже есть аккаунт? Войти</a>
    </form>
@endsection