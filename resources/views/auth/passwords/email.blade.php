@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
    <h2>Lupa password?</h2>
    <p class="auth-subtitle">Masukkan email akun Anda. Kami akan mengirim link untuk mengatur ulang password.</p>

    @if (session('status'))
        <div class="auth-alert auth-alert-success" role="alert">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="auth-field">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" placeholder="email@contoh.com" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <button class="auth-submit" type="submit">{{ __('Send Password Reset Link') }}</button>
    </form>

    <p class="auth-swap"><a class="auth-link" href="{{ route('login') }}">← Kembali ke Login</a></p>
@endsection
