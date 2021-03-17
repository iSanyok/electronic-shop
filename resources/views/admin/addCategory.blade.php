@extends('layouts.layout')

@section('content')
    <div>
        <form method="POST" action="{{ route('storeCategory') }}">
            @csrf
            <div style="margin-bottom: 1em">
                <label>Название категории</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div style="margin-bottom: 1em">
                <label>Описание категории</label>
                <textarea name="description" style="width: 500px; height: 200px">{{ old('description') }}</textarea>
            </div>
            <button type="submit">Добавить категорию</button>
        </form>
    </div>
@endsection
