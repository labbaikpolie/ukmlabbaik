@extends('layouts.auth')

@section('title', 'Konfirmasi Password')

@section('content')
    <h2>{{ __('Confirm Password') }}</h2>
    <p class="auth-subtitle">{{ __('Please confirm your password before continuing.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="auth-field">
            <label for="password">{{ __('Password') }}</label>
            <div class="auth-password-control">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                    required autocomplete="current-password" autofocus>
                <button class="auth-password-toggle" type="button" data-password-toggle
                    aria-label="Tampilkan password" aria-pressed="false">
                    <svg class="auth-eye-open" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <button class="auth-submit" type="submit">{{ __('Confirm Password') }}</button>
    </form>

    @if (Route::has('password.request'))
        <p class="auth-swap"><a class="auth-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p>
    @endif
@endsection
