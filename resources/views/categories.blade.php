@extends('layouts.layout')

@section('content')
    @foreach($categories as $category)
    <ul>
        <li>
            <a href="{{ route('category', [$category->id]) }}">{{ $category->name }}</a>
            <p class="alert-info"> {{ $category->description }}</p>
        </li>
    </ul>
    @endforeach
@endsection
