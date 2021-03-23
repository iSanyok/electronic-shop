@extends('layouts.layout')

@section('content')
    <div class="container mb-3">
        <h2 class="text-center mb-2">ПРОСМОТР ЗАКАЗОВ</h2>
        @foreach($orders as $order)
                <div class="mb-1">
                    <label>Имя покупателя: {{ $order->user->name ?? $order->customer->name }}</label>
                </div>
                <div class="mb-1">
                    <label>Электронная почта: {{ $order->user->email ?? $order->customer->email }}</label>
                </div>
                <div class="mb-1">
                    <label>Цена заказа: {{ $order->price }}р.</label>
                </div>
                <div class="mb-1">
                    <a href="{{ route('order', ['order' => $order]) }}">
                        <button class="btn btn-secondary btn-sm mb-3">Перейти к заказу</button></a>
                </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
@endsection
