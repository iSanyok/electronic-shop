@extends('layouts.layout')

@section('content')
    @foreach($order->products as $product)
    <div>
        <img
            src="{{ $product->photo }}"
            alt=""
            width="50" height="50"
            style="margin-top: 15px">
        <label style="margin-left: 25px">{{ $product->name }}</label>
        <label style="margin-left: 25px">Цена: {{ $product->price * $product->pivot->count }}р</label>
        <label style="margin-left: 25px">Количество: {{ $product->pivot->count }}</label>
    </div>
    @endforeach
    <div>
        <form method="POST" action="{{ route('confirm', ['order' => $order]) }}">
            @csrf
            <button type="submit">Подтвердить заказ</button>
        </form>
    </div>
@endsection
