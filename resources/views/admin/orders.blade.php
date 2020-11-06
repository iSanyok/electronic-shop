@extends('layouts.layout')

@section('content')
    @foreach($orders as $order)
        <label>{{ $order->customer }}</label>
    @endforeach
@endsection
