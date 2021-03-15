@extends('layouts.layout')

@section('content')
    <div>
        <div style="margin-bottom: 1em">
            <a href="{{ route('orders') }}">
                <button>Просмотреть заказы</button>
            </a>
        </div>
        <div style="margin-bottom: 1em">
            <a href="{{ route('addCategory') }}">
                <button>Добавить новую категорию</button>
            </a>
        </div>
        <div style="margin-bottom: 1em">
            <a href="{{ route('addProduct') }}">
                <button>Добавить товар</button>
            </a>
        </div>
        <div style="margin-bottom: 1em">
            <a href="{{ route('addCoupon') }}">
                <button>Создать купон</button>
            </a>
        </div>
    </div>
@endsection
