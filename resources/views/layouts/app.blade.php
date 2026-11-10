<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Новостной портал')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f2f2f2; }
        .container { width: 90%; max-width: 1000px; margin: 0 auto; }
        
        /* Шапка */
        header { background: #333; padding: 15px 0; }
        header a { color: #fff; text-decoration: none; }
        header .logo { font-size: 20px; font-weight: bold; margin-right: 20px; }
        header nav a { margin-right: 15px; }
        
        /* Контент */
        main { background: #fff; padding: 20px; margin: 20px auto; min-height: 400px; }
        
        /* Подвал */
        footer { background: #333; color: #fff; text-align: center; padding: 15px; }

        /* Карточки */
        .news-card { border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; }
        .news-card h3 { margin: 0 0 10px 0; }
        
        /* Формы */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: 8px; border: 1px solid #ccc; box-sizing: border-box;
        }
        .form-group textarea { height: 100px; }
        
        /* Кнопка */
        .btn { background: #333; color: #fff; padding: 10px 15px; border: none; cursor: pointer; }
        
        /* Таблица */
        table { width: 100%; border-collapse: collapse; }
        table th, table td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        table th { background: #eee; }
    </style>
</head>
<body>

    <x-header />

    <main class="container">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>