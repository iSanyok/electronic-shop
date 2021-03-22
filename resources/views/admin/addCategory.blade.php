@extends('layouts.layout')

@section('content')
    <div class="mx-3 w-25 mb-2">
        <form method="POST" action="{{ route('storeCategory') }}">
            @csrf
            <div class="mb-2">
                <label for="name">Название категории</label>
                <div class="input-group input-group-sm mb-1">
                    <input type="text" class="form-control"
                           aria-describedby="inputGroup-sizing-sm" value="{{ old('name') }}" name="name" id="name">
                </div>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="description">Описание категории</label>
                <div class="input-group mb-1">
                <textarea class="form-control" id="description"
                          name="description" rows="4" cols="61">{{ old('description') }}</textarea>
                </div>
            </div>
            @error('description')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <button type="submit" class="btn btn-secondary">Добавить категорию</button>
        </form>
    </div>
@endsection
