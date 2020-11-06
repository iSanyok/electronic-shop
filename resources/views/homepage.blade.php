@extends('layouts.layout')
@section('content')
    <div id="logo" class="container">
        <h1><a href="{{ route('mainpage') }}">ОНЛАЙН МАГАЗИН</a></h1>
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
        @for($i = 0, $j = 1; $i < count($products); $i++, $j++)
            @if ($j < 4)
                <div class="tbox{{ $j }}">
                    @else
                        <div class="tbox{{ $j = 1 }}">
                            @endif
                            <div class="box-style">
                                <div class="content">
                                    <div class="image"><img src="{{ $products[$i]->photo }}" width="324" height="200"
                                                            alt=""/>
                                    </div>
                                    <h2>{{ $products[$i]->name }}</h2>
                                    <p>{{ $products[$i]->description }}</p>
                                    <a href="{{ route('product', [$products[$i]]) }}" class="button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        @if($j % 3 == 0)
                </div>
                <div id="three-column" class="container">
    @endif
    @endfor
@endsection
