@extends('layouts.layout')

@section('content')
    <div>
        <a href="{{ route('orders') }}">
            <button>Просмотреть заказы</button>
        </a>
        <a href="{{ route('add_category') }}">
            <button>Добавить новую категорию</button>
        </a>
        <a href="{{ route('add_product') }}">
            <button>Добавить товар</button>
        </a>
        <a href="{{ route('create_coupon') }}">
            <button>Создать купон</button>
        </a>
    </div>
@endsection
