<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница CRM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Фиксированный сайдбар -->
    <nav class="sidebar">
        <h4 class="ms-3 text-primary fw-bold"><i class="bi bi-shop-window"></i> OrdersHub</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-house me-2 fa-lg"></i>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark active" href="{{ route('order.index') }}">
                    <i class="bi bi-shop-window me-2 fa-lg"></i>
                    Заказы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('sale.index') }}">
                    <i class="bi bi-stack me-2 fa-lg"></i>
                    Продажи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-box me-2 fa-lg"></i>
                    Склад
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-file-earmark-text me-2 fa-lg"></i>
                    Прайсы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-cart me-2 fa-lg"></i>
                    Корзина
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-wallet me-2 fa-lg"></i>
                    Финансы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-bar-chart me-2 fa-lg"></i>
                    Аналитика
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-info-circle me-2 fa-lg"></i>
                    Справочники
                </a>
            </li>
        </ul>

        <!-- Информация о пользователе -->
        <div class="user-info">
            <p>
                <a href="#" class="nav-link p-0">
                    <i class="bi bi-gear-fill me-2 fa-lg"></i>
                    Найстроки
                </a>
            </p>
            <p>
                <a href="{{ route('profile.index') }}" class="nav-link p-0">
                    <i class="bi bi-person me-2 fa-lg"></i>
                    {{ Auth::user()->name }} <!-- Здесь можно использовать переменную с именем пользователя -->
                </a>
            </p>
        </div>
    </nav>

    <!-- Основное содержимое -->
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('searchInput').addEventListener('keypress', function(event) {
            // Проверяем, нажата ли клавиша Enter
            if (event.key === 'Enter') {
                event.preventDefault(); // Отменяем стандартное поведение
                document.getElementById('searchForm').submit(); // Отправляем форму
            }
        });
    </script>
</body>

</html>
