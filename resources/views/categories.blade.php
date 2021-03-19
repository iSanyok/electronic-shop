@extends('layouts.layout')

@section('content')
    <div class="list-group" style="margin-left: 3em; width: 20em">
        @foreach($categories as $category)
            <a href="{{ route('category', [$category->id]) }}"
               class="list-group-item list-group-item-action" style="margin-bottom: 1em">{{ $category->name }}</a>
        @endforeach
    </div>
@endsection
