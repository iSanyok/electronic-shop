@extends('layouts.layout')

@section('content')
    <div style="margin-left: 20px">
        <form method="POST" action="{{ route('storeProduct') }}" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 1em">
                <label>Категория</label>
                <select required name="category_id">
                    <option disabled>Категории</option>
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
                <label>Название товара</label>
                <input type="text" name="name">

                @error('name')
                <span>
                    <strong style="color: crimson">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 1em">
                <label>Описание товара</label>
                <textarea name="description" style="width: 500px" rows="4"></textarea>

                @error('description')
                <span>
                    <strong style="color: crimson">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 1em">
                <label>Цена товара</label>
                <input type="text" name="price">

                @error('price')
                <span>
                    <strong style="color: crimson">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div style="margin-bottom: 1em">
                <label>Фотография товара</label>
                <input type="file" name="photo">
            </div>
            <button type="submit">Добавить товар</button>
        </form>
    </div>
@endsection
