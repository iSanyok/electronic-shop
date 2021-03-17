@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 style="margin-bottom: 1em;">{{ $product->name }}</h1>
        <img src="{{ asset('storage/' . $product->photo) }}" alt="" width="325" height="425" style="margin-bottom: 1em;">
        <h1 style="margin-bottom: 1em;">{{ $product->description }}</h1>
        <h1 style="margin-bottom: 1em;">Цена: {{ $product->price }}р.</h1>
        <form method="POST" action="{{ route('add', [$product]) }}">
            @csrf
            <button type="submit" class="btn btn-dark">Добавить в корзину</button>
        </form>
    </div>
@endsection
