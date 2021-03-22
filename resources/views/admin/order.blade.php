@extends('layouts.layout')

@section('content')
    @foreach($order->products as $product)
        <div class="container">
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
                        <label class="ms-3">{{ $product->price * $product->pivot->count }}р.</label>
                    </div>
                    <div>
                        <label>Количество: </label>
                        <label class="ms-3"> {{ $product->pivot->count }}</label>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="container mb-2">
        <form method="POST" action="{{ route('confirm', ['order' => $order]) }}">
            @csrf
            <button type="submit" class="btn btn-secondary">Подтвердить заказ</button>
        </form>
    </div>
@endsection
