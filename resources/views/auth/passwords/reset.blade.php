@extends('layouts.auth')

@section('title', 'Atur Ulang Password')

@section('content')
    <h2>Atur ulang password</h2>
    <p class="auth-subtitle">Buat password baru untuk akun UKM Labbaik Anda.</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="auth-field">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="auth-field">
            <label for="password">{{ __('Password') }}</label>
            <div class="auth-password-control">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password">
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

        <div class="auth-field">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <div class="auth-password-control">
                <input id="password-confirm" type="password" name="password_confirmation" required
                    autocomplete="new-password">
                <button class="auth-password-toggle" type="button" data-password-toggle
                    aria-label="Tampilkan password" aria-pressed="false">
                    <svg class="auth-eye-open" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
            </div>
        </div>

        <button class="auth-submit" type="submit">{{ __('Reset Password') }}</button>
    </form>
@endsection
