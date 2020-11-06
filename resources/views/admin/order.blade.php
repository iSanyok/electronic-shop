@extends('layouts.layout')

@section('content')
    <div>
        <img
            src="{{ $product->photo }}"
            alt=""
            width="50" height="50"
            style="margin-top: 15px">
        <label style="margin-left: 25px">{{ $product->name }}</label>
        <label style="margin-left: 25px">Цена: {{ $product->price }}р</label>
        <label style="margin-left: 25px">Количество: {{ $product->pivot->count }}</label></div>
@endsection
