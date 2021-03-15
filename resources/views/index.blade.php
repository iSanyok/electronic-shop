@extends('layouts.layout')
@section('content')
    <div id="logo" class="container">
        <h1><a href="{{ route('index') }}">ОНЛАЙН МАГАЗИН</a></h1>
        @if(isset($category))
            <p>{{ $category->name }}</p>
        @else
            <p>Онлайн магазин электроники</p>
        @endif
    </div>
    <div>
        @if(session()->has('message'))
            <h2 style="margin-left: 30%">{{ session('message') }}</h2>
        @endif
    </div>
    <div id="three-column" class="container">
        @foreach($products as $product)
            <div class="tbox{{ ($loop->index % 3) + 1}}">
                <div class="box-style">
                    <div class="content">
                        <div class="image"><img src="{{ asset('public/images/' . $product->photo) }}" width="324" height="200"
                                                alt=""/>
                        </div>
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <a href="{{ route('product', [$product]) }}" class="button">Подробнее</a>
                    </div>
                </div>
            </div>
            @if(($loop->index + 1) % 3 == 0)
    </div><div id="three-column" class="container">
            @endif
    @endforeach
@endsection
