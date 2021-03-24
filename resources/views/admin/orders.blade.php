@extends('layouts.layout')

@section('content')
    <div class="container mb-3">
        <h2 class="text-center mb-2">ПРОСМОТР ЗАКАЗОВ</h2>

        <form method="POST" action="{{ route('find') }}">
            @csrf
            <div class="input-group mb-3 w-25">
                <input type="text" class="form-control" placeholder="Найти заказ по номеру" name="order"
                       aria-describedby="basic-addon2">
                <button type="submit" class="input-group-text">🔍</button>
            </div>
        </form>

        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{Request::path() === 'admin/orders' ? 'active' : ''}}"
                       aria-current="page" href="{{ route('orders') }}">Новые</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::path() === 'admin/orders/completed' ? 'active' : ''}}"
                       href="{{ route('completedOrders') }}">Подтвержденные</a>
                </li>
            </ul>
        </div>

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
