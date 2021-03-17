@extends('layouts.layout')

@section('content')
    <div class="container">
        @forelse($products as list('product' => $product, 'count' => $count))
            <div>
                <img
                    src="{{ asset('storage/' . $product->photo) }}"
                    alt=""
                    width="50" height="50"
                    style="margin-top: 15px">
                <label style="margin-left: 25px">{{ $product->name }}</label>
                <label style="margin-left: 25px">Цена: {{ $product->price * $count }}р</label>
                <label style="margin-left: 25px">Количество: {{ $count }}</label>
                <form method="POST" action="{{ route('add', $product) }}">
                    @csrf
                    <button style="flex: auto" class="btn btn-dark">+</button>
                </form>
                <form method="POST" action="{{ route('destroy', $product) }}">
                    @csrf
                    @method('DELETE')
                    <button style="margin-top: 5px" class="btn btn-dark">-</button>
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
                        <button class="btn btn-dark">Оформить заказ</button>
                    </a>
                @else
                    <form method="POST" action="{{ route('payoff') }}">
                        @csrf
                        <button class="btn btn-dark">Оформить заказ</button>
                    </form>
                @endguest
            </div>

        @endif
    </div>
@endsection
