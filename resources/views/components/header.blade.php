<header>
    <div class="container">
        <a href="{{ route('home') }}" class="logo">Новостной портал</a>
        <nav style="display: inline-block;">
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('category') }}">Категория</a>
            <a href="{{ route('journalist') }}">Журналист</a>
            <a href="{{ route('admin') }}">Админ</a>
            
            @auth
                <span style="color: #fff; margin-left: 15px;">Привет, {{ Auth::user()->name }}!</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #fff; cursor: pointer; text-decoration: underline;">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="margin-left: 15px;">Вход</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </div>
</header>