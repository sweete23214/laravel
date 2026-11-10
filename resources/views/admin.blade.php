@extends('layouts.app')

@section('title', 'Админ')

@section('content')
    <h1>Админ-панель</h1>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <h2>Управление пользователями</h2>
    <table style="margin-bottom: 40px;">
        <tr>
            <th>ID</th>
            <th>Логин</th>
            <th>Текущая роль</th>
            <th>Изменить роль</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role->name ?? 'Нет роли' }}</td>
                <td>
                    <form action="{{ route('admin.updateRole', $user->id) }}" method="POST" style="display: flex; gap: 5px;">
                        @csrf
                        <select name="role_id" style="padding: 5px;">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn">Сохранить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h2>Управление статьями</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Автор</th>
            <th>Действия</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->user->name ?? 'Неизвестен' }}</td>
                <td>
                    <form action="{{ route('admin.deleteArticle', $article->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection