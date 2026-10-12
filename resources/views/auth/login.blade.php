@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <h2>Selamat datang</h2>
    <p class="auth-subtitle">Masuk untuk mengelola data UKM Labbaik.</p>

    @if (session('status'))
        <div class="auth-alert auth-alert-success" role="alert">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="auth-field">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" placeholder="email@contoh.com" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="auth-field">
            <label for="password">{{ __('Password') }}</label>
            <div class="auth-password-control">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                    placeholder="Masukkan password" required autocomplete="current-password">
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

        <div class="auth-options">
            <label class="auth-remember" for="remember">
                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span>{{ __('Remember Me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">Lupa password?</a>
            @endif
        </div>

        <button class="auth-submit" type="submit">{{ __('Login') }}</button>
    </form>

    @if (Route::has('register'))
        <p class="auth-swap">Belum punya akun? <a class="auth-link" href="{{ route('register') }}">Register</a></p>
    @endif
@endsection
