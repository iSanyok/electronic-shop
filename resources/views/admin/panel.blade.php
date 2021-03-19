@extends('layouts.layout')

@section('content')
    <div style="margin-left: 3em">
        <div style="margin-bottom: 1em">
            <a href="{{ route('orders') }}">
                <button class="btn btn-secondary">Просмотреть заказы</button>
            </a>
        </div>
        <div style="margin-bottom: 1em">
            <a href="{{ route('addCategory') }}">
                <button class="btn btn-secondary">Добавить новую категорию</button>
            </a>
        </div>
        <div style="margin-bottom: 1em">
            <a href="{{ route('addProduct') }}">
                <button class="btn btn-secondary">Добавить товар</button>
            </a>
        </div>
        <div style="margin-bottom: 1em">
            <a href="{{ route('addCoupon') }}">
                <button class="btn btn-secondary">Создать купон</button>
            </a>
        </div>
    </div>
@endsection
