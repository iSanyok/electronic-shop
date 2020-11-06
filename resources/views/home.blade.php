@extends('layouts.layout')

@foreach($orders as $order)
    <h1>{{ $order->products }}</h1>
@endforeach
