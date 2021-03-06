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
            <h2 class="text-center">{{ session('message') }}</h2>
        @endif
    </div>
        @foreach($products as $product)
            @if($loop->first || ($loop->index % 3 == 0))
                <div id="three-column" class="container">
            @endif
            <div class="tbox{{ ($loop->index % 3) + 1}}">
                <div class="box-style">
                    <div class="content">
                        <div class="image"><img src="{{ asset('storage/' . $product->photo) }}" width="324" height="200"
                                                alt=""/>
                        </div>
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <a href="{{ route('product', [$product]) }}" class="btn btn-dark">Подробнее</a>
                    </div>
                </div>
            </div>
            @if(($loop->index + 1) % 3 == 0 || $loop->last)
                </div>
            @endif
    @endforeach
    </div>
                <div class="d-flex justify-content-center pt-1">
                    {{ $products->links() }}
                </div>
@endsection
