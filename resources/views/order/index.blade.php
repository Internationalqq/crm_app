@extends('layouts.main')
@section('content')
    <div>
        <!-- Заголовок "Заказы" -->
        <div class="row mb-1">
            <div class="col-md-6">
                <h4>Заказы</h4>
            </div>
        </div>

        <!-- Кнопки и строка поиска -->
        <div class="row mb-4">
            <div class="col-md-6">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createOrderModal">
                    <i class="bi bi-plus"></i>
                    Создать
                </button>

                <!-- Поле поиска -->
                <form class="d-inline-block" method="GET" action="{{ route('order.index') }}" id="searchForm">
                    <input type="text" name="search" class="form-control form-control-sm d-inline-block w-auto"
                        placeholder="Поиск..." value="{{ request()->input('search') }}" id="searchInput">
                </form>
                {{-- <input type="text" class="form-control form-control-sm d-inline-block w-auto" placeholder="Поиск..."> --}}

                <!-- Кнопки фильтрации заказов -->
                <a href="{{ route('order.index', ['status' => 'all']) }}" class="btn btn-outline-secondary btn-sm">
                    Все заказы
                </a>
                <a href="{{ route('order.index', ['status' => 'in_progress']) }}" class="btn btn-outline-secondary btn-sm">
                    В работе
                </a>
                <a href="{{ route('order.index', ['status' => 'completed']) }}" class="btn btn-outline-secondary btn-sm">
                    Выполненные
                </a>
                <button class="btn btn-outline-secondary btn-sm">Фильтры</button>
            </div>
        </div>

        <!-- Таблица с заказами -->
        @include('order.table')

        <!-- Модальное окно для создания заказа -->
        @include('order.create')

        <!-- Модальные окна для редактирования заказов -->
        @include('order.edit')

        <!-- Модальное окно для добавления контрагента -->
        @include('contractor.create')

        <!-- Модальное окно для редактирования контрагента -->
        @include('contractor.edit')


        <!-- Стили для модальных окон -->
        <script>
            function formatPhone(input) {
                // Удаляем все символы, кроме цифр
                let value = input.value.replace(/\D/g, '');

                // Применяем форматирование для российского номера
                if (value.length > 10) {
                    value = '7' + value.slice(1); // Заменяем 8 на 7
                }

                let formattedValue = '';
                if (value.length > 0) {
                    formattedValue += '+7';
                }
                if (value.length > 1) {
                    formattedValue += ' ' + value.slice(1, 4) + ' '; // Скобки вокруг кода региона
                }
                if (value.length > 4) {
                    formattedValue += value.slice(4, 7); // Код города
                }
                if (value.length > 7) {
                    formattedValue += '-' + value.slice(7, 9); // Первые 2 цифры номера
                }
                if (value.length > 9) {
                    formattedValue += '-' + value.slice(9, 11); // Последние 2 цифры номера
                }

                // Устанавливаем форматированное значение
                input.value = formattedValue.trim();

                // Устанавливаем курсор в конец ввода
                setTimeout(() => {
                    input.setSelectionRange(input.value.length, input.value.length);
                }, 0);
            }
            document.getElementById('searchInput').addEventListener('keypress', function(event) {
                // Проверяем, нажата ли клавиша Enter
                if (event.key === 'Enter') {
                    event.preventDefault(); // Отменяем стандартное поведение
                    document.getElementById('searchForm').submit(); // Отправляем форму
                }
            });

            document.getElementById('add-contractor-btn').addEventListener('click', function() {
                const fields = document.getElementById('new-contractor-fields');
                if (fields.style.display === 'none') {
                    fields.style.display = 'block'; // Показываем поля
                } else {
                    fields.style.display = 'none'; // Скрываем поля
                }
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        {{-- @foreach ($posts as $post)
            <p><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></p>
        @endforeach --}}

        {{-- <div class="mt-5">
            {{ $posts->withQueryString()->links() }}
        </div> --}}
    @endsection
