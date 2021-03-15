@extends('layouts.layout')

@section('content')
    @foreach($orders as $order)
        @if($order->customer)
            <div style="padding-left: 10px; margin-bottom: 1em">
                <label style="margin-bottom: 10px">Имя покупателя: {{ $order->customer->name }}</label>
                <label>Электронная почта: {{ $order->customer->email }}</label>
                <label>Цена заказа: {{ $order->price }}</label>
                <a href="{{ route('order', ['order' => $order]) }}"><button>Перейти к заказу</button></a>
            </div>
        @else
            <label style="padding-left: 10px">Имя покупателя:{{ $order->customer_name }}</label>
            <a href="{{ route('order', ['order' => $order]) }}"><button>Перейти к заказу</button></a>
        @endif
    @endforeach
@endsection
