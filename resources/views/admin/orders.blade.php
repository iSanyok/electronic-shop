@extends('layouts.layout')

@section('content')
    @foreach($orders as $order)
        @if($order->customer)
            <div class="container mb-3">
                <div class="mb-1">
                    <label>Имя покупателя: {{ $order->customer->name }}</label>
                </div>
                <div class="mb-1">
                    <label>Электронная почта: {{ $order->customer->email }}</label>
                </div>
                <div class="mb-1">
                    <label>Цена заказа: {{ $order->price }}</label>
                </div>
                <div class="mb-1">
                    <a href="{{ route('order', ['order' => $order]) }}">
                        <button class="btn btn-secondary">Перейти к заказу</button></a>
                </div>
            </div>
        @else
            <div class="container mb-3">
                <div class="mb-1">
                    <label>Имя покупателя:{{ $order->customer_name }}</label>
                </div>
                <div class="mb-1">
                    <a href="{{ route('order', ['order' => $order]) }}">
                        <button class="btn btn-secondary">Перейти к заказу</button></a>
                </div>
            </div>
        @endif
    @endforeach
    <div class="d-flex justify-content-center pt-1">
        {{ $orders->links() }}
    </div>
@endsection
