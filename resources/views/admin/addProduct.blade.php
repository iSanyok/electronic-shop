@extends('layouts.layout')

@section('content')
    <div style="margin-left: 3em; width: 45em">
        <form method="POST" action="{{ route('storeProduct') }}" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 1em">
                <select class="form-select" aria-label="Default select example" required name="category_id">
                    <option disabled>Категория</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span>
                    <strong style="color: crimson">{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div style="margin-bottom: 1em">
                <label for="name">Название товара</label>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control"
                           aria-describedby="inputGroup-sizing-sm" value="{{ old('name') }}" name="name" id="name">
                </div>

                @error('name')
                <span>
                    <strong style="color: crimson">{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div style="margin-bottom: 1em">
                <label>
                    Описание товара
                    <textarea class="form-control" aria-label="With textarea" id="description"
                              name="description" rows="4" style="width: 37em">{{ old('description') }}</textarea>
                </label>

                @error('description')
                <span>
                    <strong style="color: crimson">{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price">Цена товара</label>
                <input type="text" class="form-control"
                       aria-describedby="inputGroup-sizing-sm" value="{{ old('price') }}" name="price" id="price">

                @error('price')
                <span>
                    <strong style="color: crimson">{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div style="margin-bottom: 1em">
                <label for="photo">Фотография товара</label>
                <div class="input-group">
                    <input type="file" name="photo" class="form-control" id="inputGroupFile04"
                           aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-bottom: 1em">Добавить товар</button>
        </form>
    </div>
@endsection
