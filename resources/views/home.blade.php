@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="text-center">
                            <h4>
                                {{ Auth::user()->name }}
                                {{ __('Вы успешно вошли в систему!') }}
                            </h4>
                            <p>{{ Auth::user()->email }}</p>
                            {{-- <div class="form-group mb-3">
                                <a href="{{ route('order.create') }}" class="btn btn-primary">Создать заказ</a>
                                <a href="{{ route('order.index') }}" class="btn btn-primary">Список заказов</a>
                                <a href="{{ route('sale.index') }}" class="btn btn-primary">Список продаж</a>
                            </div> --}}
                            <div class="btn btn-danger" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
