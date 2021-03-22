@extends('layouts.layout')

@section('content')
    <div class="container">
        @forelse($products as list('product' => $product, 'count' => $count))
            <div class="d-flex mb-3">
                <div>
                    <img
                        src="{{ asset('storage/' . $product->photo) }}"
                        alt=""
                        width="50" height="50"
                    >
                </div>
                <div class="mx-3">
                    <div>
                        <label>Название: </label>
                        <label class="ms-3">{{ $product->name }}</label>
                    </div>
                    <div>
                        <label>Цена за 1 шт.: </label>
                        <label class="ms-3">{{ $product->price }}р.</label>
                    </div>
                    <div>
                        <label>Цена: </label>
                        <label class="ms-3">{{ $product->price * $count }}р.</label>
                    </div>
                    <div>
                        <label>Количество: </label>
                        <label class="ms-3"> {{ $count }}</label>
                    </div>
                    <div class="d-flex mt-1">
                        <form method="POST" action="{{ route('destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark me-3">-</button>
                        </form>
                        <form method="POST" action="{{ route('add', $product) }}">
                            @csrf
                            <button class="btn btn-dark">+</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex justify-content-center pt-1 mb-2">
                <label>Корзина пуста.</label>
            </div>
        @endforelse
    </div>
        @if($products)
            <div class="container mb-2">
            <label class="title">Общая сумма: {{ $summary_price }}р.</label>
            <div class="mt-2">
                @guest
                    <a href="{{ route('checkout') }}">
                        <button class="btn btn-primary">Оформить заказ</button>
                    </a>
                @else
                    <form method="POST" action="{{ route('payoff') }}">
                        @csrf
                        <button class="btn btn-primary">Оформить заказ</button>
                    </form>
                @endguest
            </div>
            </div>
        @endif
@endsection
