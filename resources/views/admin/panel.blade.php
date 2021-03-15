@extends('layouts.layout')

@section('content')
    <div>
        <a href="{{ route('orders') }}">
            <button>Просмотреть заказы</button>
        </a>
        <a href="{{ route('addCategory') }}">
            <button>Добавить новую категорию</button>
        </a>
        <a href="{{ route('addProduct') }}">
            <button>Добавить товар</button>
        </a>
        <a href="{{ route('addCoupon') }}">
            <button>Создать купон</button>
        </a>
    </div>
@endsection
