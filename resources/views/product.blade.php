@extends('layouts.layout')

@section('content')
    <div class="container mb-2">
        <h1 class="mb-2">{{ $product->name }}</h1>
        <img src="{{ asset('storage/' . $product->photo) }}" alt="" width="325" height="425" class="mb-2">
        <h1 class="mb-2">{{ $product->description }}</h1>
        <h1 class="mb-2">Цена: {{ $product->price }}р.</h1>
        <form method="POST" action="{{ route('add', [$product]) }}">
            @csrf
            <button type="submit" class="btn btn-dark">Добавить в корзину</button>
        </form>
    </div>
@endsection
