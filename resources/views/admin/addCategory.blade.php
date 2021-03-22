@extends('layouts.layout')

@section('content')
    <div style="margin-left: 3em; width: 45em">
        <form method="POST" action="{{ route('storeCategory') }}">
            @csrf
            <label for="name">Название категории</label>
            <div class="input-group input-group-sm mb-3">
                <input type="text" class="form-control"
                       aria-describedby="inputGroup-sizing-sm" value="{{ old('name') }}" name="name" id="name">
            </div>
            <label for="description">Описание категории</label>
            <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" id="description"
                          name="description" rows="4">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-top: 1em; margin-bottom: 1em">Добавить категорию</button>
        </form>
    </div>
@endsection
