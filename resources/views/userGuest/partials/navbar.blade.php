@php
    $activePage = $active ?? null;
    $isLanding = request()->is('/');
@endphp

<header>
    <nav class="wrap">
        <a class="logo" href="{{ url('/') }}"><span class="logo-dot"></span> UKM LABBAIK</a>
        <div class="nav-links" id="navLinks">
            <a href="{{ $isLanding ? '#home' : url('/') }}" class="{{ $activePage === 'home' || ($isLanding && !$activePage) ? 'active' : '' }}">Home</a>
            <a href="{{ $isLanding ? '#about' : url('/#about') }}" class="{{ $activePage === 'about' ? 'active' : '' }}">About</a>
            <a href="{{ $isLanding ? '#visimisi' : url('/#visimisi') }}" class="{{ $activePage === 'visimisi' ? 'active' : '' }}">Visi Misi</a>
            <a href="{{ $isLanding ? '#artikel' : route('artikel.index') }}" class="{{ $activePage === 'artikel' ? 'active' : '' }}">Artikel</a>
            <a href="{{ $isLanding ? '#departemen' : url('/#departemen') }}" class="{{ $activePage === 'departemen' ? 'active' : '' }}">Departemen</a>
            <a href="{{ $isLanding ? '#contact' : url('/#contact') }}" class="{{ $activePage === 'contact' ? 'active' : '' }}">Contact</a>
        </div>
        <button class="nav-toggle" id="navToggle" type="button" aria-label="Buka menu" aria-expanded="false">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>
</header>

<script>
    (function () {
        function initNavbarToggle() {
            const navToggle = document.getElementById('navToggle');
            const navLinks = document.getElementById('navLinks');
            if (!navToggle || !navLinks || navToggle.dataset.bound === 'true') return;
            navToggle.dataset.bound = 'true';

            function closeNav() {
                navLinks.classList.remove('is-open');
                navToggle.setAttribute('aria-expanded', 'false');
                navToggle.setAttribute('aria-label', 'Buka menu');
            }

            navToggle.addEventListener('click', () => {
                const isOpen = navLinks.classList.toggle('is-open');
                navToggle.setAttribute('aria-expanded', String(isOpen));
                navToggle.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
            });

            navLinks.addEventListener('click', (event) => {
                if (event.target.closest('a')) {
                    closeNav();
                }
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initNavbarToggle);
        } else {
            initNavbarToggle();
        }
    })();
</script>


