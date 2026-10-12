@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <h2>Buat akun baru</h2>
    <p class="auth-subtitle">Daftar untuk mulai mengelola konten Labbaik.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="auth-field">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" placeholder="Nama Anda" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="auth-field">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" placeholder="email@contoh.com" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="auth-field">
            <label for="password">{{ __('Password') }}</label>
            <div class="auth-password-control">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                    placeholder="Minimal 8 karakter" required autocomplete="new-password">
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
                <input id="password-confirm" type="password" name="password_confirmation"
                    placeholder="Ulangi password" required autocomplete="new-password">
                <button class="auth-password-toggle" type="button" data-password-toggle
                    aria-label="Tampilkan password" aria-pressed="false">
                    <svg class="auth-eye-open" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
            </div>
        </div>

        <button class="auth-submit" type="submit">{{ __('Register') }}</button>
    </form>

    <p class="auth-swap">Sudah punya akun? <a class="auth-link" href="{{ route('login') }}">Login</a></p>
@endsection
