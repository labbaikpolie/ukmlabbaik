<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Autentikasi') - UKM Labbaik</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/Logo Labbaik.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-theme.css') }}">
</head>

<body class="auth-page">
    <div class="auth-shell">
        <aside class="auth-aside">
            <span class="auth-decoration auth-decoration-one"></span>
            <span class="auth-decoration auth-decoration-two"></span>
            <span class="auth-decoration auth-decoration-three"></span>
            <span class="auth-dot auth-dot-one"></span>
            <span class="auth-dot auth-dot-two"></span>
            <a class="auth-logo" href="{{ url('/') }}"><i aria-hidden="true"></i> UKM Labbaik</a>
            <div class="auth-intro">
                <span class="auth-eyebrow"><b>✦</b> Politeknik Negeri Jember</span>
                <h1>Salam <span>LABBAIK</span> !!!</h1>
                <p>Bersama labbaik ayo lebih baik…</p>
                <ul>
                    <li><span aria-hidden="true">✓</span> Menambah wawasan keislaman</li>
                    <li><span aria-hidden="true">✓</span> Menambah saudara seiman</li>
                    <li><span aria-hidden="true">✓</span> Softskill dan hardskill semakin terlatih</li>
                </ul>
            </div>
            <div class="auth-copyright">© Copyright UKM Labbaik</div>
        </aside>

        <main class="auth-main">
            <div class="auth-box">
                <a class="auth-back" href="{{ url('/') }}"><span aria-hidden="true">←</span> Kembali ke Beranda</a>
                <section class="auth-card">
                    @yield('content')
                </section>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('click', (event) => {
            const toggle = event.target.closest('[data-password-toggle]');
            if (!toggle) return;

            const input = toggle.closest('.auth-password-control').querySelector('input');
            const isVisible = input.type === 'text';
            input.type = isVisible ? 'password' : 'text';
            toggle.setAttribute('aria-pressed', String(!isVisible));
            toggle.setAttribute('aria-label', isVisible ? 'Tampilkan password' : 'Sembunyikan password');
        });
    </script>
</body>

</html>
