@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="list-group w-25">
            @foreach($categories as $category)
                <a href="{{ route('category', [$category->id]) }}"
                   class="list-group-item list-group-item-action mb-2">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
@endsection
