@extends('layouts.layout')

@section('content')
    <div class="mx-3 mb-2 w-25">
        <form method="POST" action="{{ route('storeProduct') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <select class="form-select mb-1" aria-label="Default select example" required name="category_id">
                    <option selected disabled>Категория</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="name">Название товара</label>
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
                <label for="description">Описание товара</label>
                <div class="input-group mb-1">
                    <textarea class="form-control" id="description"
                            name="description" rows="4" cols="61">{{ old('description') }}</textarea>
                </div>

                @error('description')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="price">Цена товара</label>
                <input type="text" class="form-control mb-1"
                       aria-describedby="inputGroup-sizing-sm" value="{{ old('price') }}" name="price" id="price">

                @error('price')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="photo">Фотография товара</label>
                <div class="input-group mb-1">
                    <input type="file" name="photo" class="form-control" id="inputGroupFile04"
                           aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>

                @error('photo')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-secondary">Добавить товар</button>
        </form>
    </div>
@endsection
