@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="mb-2">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <label for="email"
                           class="col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror mb-1" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                           class="col-form-label text-md-right">{{ __('Пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror mb-1" name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Запомнить меня') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Войти') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Забыли свой пароль?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
