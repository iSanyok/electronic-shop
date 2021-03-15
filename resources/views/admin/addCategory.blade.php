@extends('layouts.layout')

@section('content')
    <div>
        <form method="POST" action="{{ route('storeCategory') }}">
            @csrf
            <div >
                <label>Название категории</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Описание категории</label>
                <textarea name="description" style="width: 500px; height: 200px"></textarea>
            </div>

            <button type="submit">Добавить категорию</button>
        </form>
    </div>
@endsection
