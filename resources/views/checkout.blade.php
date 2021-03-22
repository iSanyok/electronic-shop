@extends('layouts.layout')

@section('content')
    <div class="container mb-2">
        <form method="POST" action="{{ route('payoff') }}">
            @csrf
            <div>
                <div class="form-group row">
                    <label for="email"
                           class="col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="customer_name"
                           class="col-form-label text-md-right">{{ __('Имя') }}</label>

                    <div class="col-md-6">
                        <input id="customer_name" type="text"
                               class="form-control" name="customer_name"
                               value="{{ old('customer_name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone"
                           class="col-form-label text-md-right">{{ __('Телефон') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="text"
                               class="form-control" name="phone"
                               value="{{ old('phone') }}">
                    </div>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Подтвердить покупку</button>
            </div>
        </form>
    </div>
@endsection
