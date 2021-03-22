@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="mb-2">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <label for="name"
                           class="col-form-label text-md-right">{{ __('Имя') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-form-label text-md-right">{{ __('Пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-form-label text-md-right">{{ __('Подтвердите пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-2 mt-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Зарегестрироваться') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
