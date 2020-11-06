@extends('layouts.layout')

@section('content')
    <div class="container">
        @forelse($products as $product)
            <div>
                <img
                    src="{{ $product['product']->photo }}"
                    alt=""
                    width="50" height="50"
                    style="margin-top: 15px">
                <label style="margin-left: 25px">{{ $product['product']->name }}</label>
                <label style="margin-left: 25px">Цена: {{ $product['product']->price * $product['count'] }}р</label>
                <label style="margin-left: 25px">Количество: {{ $product['count'] }}</label>
                <form method="POST" action="{{ route('add', $product) }}">
                    @csrf
                    <button style="flex: auto">+</button>
                </form>
                <form method="POST" action="{{ route('destroy', $product) }}">
                    @csrf
                    @method('DELETE')
                    <button style="margin-top: 5px">-</button>
                </form>
            </div>
        @empty
            <label class="title" style="margin-left: 40%">Корзина пуста.</label>
        @endforelse
        @if($products)

            <label class="title" style="margin-top: 10px">Общая сумма: {{ $summary_price }}р.</label>
            <div style="margin-top: 15px">
                @guest
                    <a href="{{ route('checkout') }}">
                        <button>Оформить заказ</button>
                    </a>
                @else
                    <form method="POST" action="{{ route('payoff') }}">
                        @csrf
                        <button>Оформить заказ</button>
                    </form>
                @endguest
            </div>

        @endif
    </div>
@endsection
