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
                <form class="d-inline-block" method="GET" action="{{ route('order.index') }}" id="searchForm">
                    <input type="text" name="search" class="form-control form-control-sm d-inline-block w-auto"
                        placeholder="Поиск..." value="{{ request()->input('search') }}" id="searchInput">
                </form>
                {{-- <input type="text" class="form-control form-control-sm d-inline-block w-auto" placeholder="Поиск..."> --}}
                <button class="btn btn-outline-secondary btn-sm">Все заказы</button>
                <button class="btn btn-outline-secondary btn-sm">В работе</button>
                <button class="btn btn-outline-secondary btn-sm">Выполненные</button>
                <button class="btn btn-outline-secondary btn-sm">Фильтры</button>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createContractorModal"
                    id="addContractorBtn" data-toggle="tooltip" title="Дообавить контрагента">
                    Добавить
                    <i class="bi bi-person fa-lg"></i>
                </button>
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
                    formattedValue += '+7 ';
                }
                if (value.length > 1) {
                    formattedValue += '(' + value.slice(1, 4) + ') '; // Скобки вокруг кода региона
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

                input.value = formattedValue.trim();
            }
        </script>

        {{-- @foreach ($posts as $post)
            <p><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></p>
        @endforeach --}}

        {{-- <div class="mt-5">
            {{ $posts->withQueryString()->links() }}
        </div> --}}
    @endsection
