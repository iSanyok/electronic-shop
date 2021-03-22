@extends('layouts.layout')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="mb-2">
            <a href="{{ route('orders') }}">
                <button class="btn btn-secondary">Просмотреть заказы</button>
            </a>
        </div>
        <div class="mb-2">
            <a href="{{ route('addCategory') }}">
                <button class="btn btn-secondary">Добавить новую категорию</button>
            </a>
        </div>
        <div class="mb-2">
            <a href="{{ route('addProduct') }}">
                <button class="btn btn-secondary">Добавить товар</button>
            </a>
        </div>
        <div class="mb-2">
            <a href="{{ route('addCoupon') }}">
                <button class="btn btn-secondary">Создать купон</button>
            </a>
        </div>
    </div>
@endsection
