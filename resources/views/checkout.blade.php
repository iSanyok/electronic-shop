@extends('layouts.layout')

@section('content')
    <form method="POST" action="{{ route('payoff') }}">
        @csrf
        <div style="margin-left: 40%">
            <div class="form-group row">
                <label for="email"
                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus
                           style="margin-bottom: 1em;">
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                <div class="col-md-6">
                    <input id="customer_name" type="text"
                           class="form-control" name="customer_name"
                           value="{{ old('customer_name') }}" autofocus
                           style="margin-bottom: 1em;">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone"
                       class="col-md-4 col-form-label text-md-right">{{ __('Телефон') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text"
                           class="form-control" name="phone"
                           value="{{ old('phone') }}" autofocus
                           style="margin-bottom: 1em;">
                </div>
            </div>
            <input type="submit" value="Подтвердить покупку">
    </form>
@endsection
