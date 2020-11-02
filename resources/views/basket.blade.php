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
                <label style="margin-left: 25px">Цена: {{ $product['product']->price }}р</label>
                <label style="margin-left: 25px">Количество: {{ $product['count'] }}</label>
                <form method="POST" action="{{ route('add', $product) }}">
                    @csrf
                    <button style="flex: auto">+</button>
                </form>
                <form method="POST" action="{{ route('remove', $product) }}">
                    @csrf
                    <button style="margin-top: 5px">-</button>
                </form>
            </div>
        @empty
            <label class="title" style="margin-left: 40%">Корзина пуста.</label>
        @endforelse
        @if($products)

            <label class="title">Общая сумма: {{ $summary_price }}р.</label>
            <form method="POST" action="">
                <button type="submit">Оформить заказ</button>
            </form>
        @endif
    </div>
@endsection
