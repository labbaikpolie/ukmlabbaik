<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>{{ $type === 'artikel' ? 'Semua Artikel' : 'Semua Rapat' }} - UKM LABBAIK</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/Logo Labbaik.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">
</head>

<body>
    @php
        $tgl = fn($date) => $date ? \Carbon\Carbon::parse($date)->translatedFormat('d F Y') : '-';
        $isArticle = $type === 'artikel';
    @endphp

    <header>
        <nav class="wrap">
            <a class="logo" href="{{ url('/') }}"><span class="logo-dot"></span> UKM LABBAIK</a>
            <div class="nav-links" id="navLinks">
                <a href="{{ url('/') }}#home">Home</a>
                <a href="{{ url('/') }}#about">About</a>
                <a href="{{ url('/') }}#visimisi">Visi Misi</a>
                <a href="{{ url('/') }}#artikel">Artikel</a>
                <a href="{{ url('/') }}#rapat">Rapat</a>
                <a href="{{ url('/') }}#departemen">Departemen</a>
                <a href="{{ url('/') }}#contact">Contact</a>
            </div>
            <button class="nav-toggle" id="navToggle" type="button" aria-label="Buka menu" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
    </header>

    <main class="section posts-page">
        <div class="wrap">
            <div class="section-head">
                <h1>{{ $isArticle ? 'Semua Artikel' : 'Semua Rapat' }}</h1>
                <div class="underline-bar"></div>
                <p>{{ $isArticle ? 'Jelajahi seluruh artikel terbaru dari LABBAIK.' : 'Jelajahi jadwal dan dokumentasi rapat pengurus.' }}</p>
            </div>

            <form class="posts-filter" method="GET" action="{{ $isArticle ? route('artikel.index') : route('rapat.index') }}">
                <div class="field posts-search">
                    <label for="posts-query">Kata kunci</label>
                    <input id="posts-query" type="search" name="q" value="{{ $search }}"
                        placeholder="{{ $isArticle ? 'Cari judul atau isi artikel' : 'Cari agenda, tempat, atau hasil rapat' }}">
                </div>
                <div class="field">
                    <label for="posts-from">Dari tanggal</label>
                    <input id="posts-from" type="date" name="from" value="{{ $dateFrom }}">
                </div>
                <div class="field">
                    <label for="posts-to">Sampai tanggal</label>
                    <input id="posts-to" type="date" name="to" value="{{ $dateTo }}">
                </div>
                <div class="posts-filter-actions">
                    <button class="btn-primary" type="submit">Cari</button>
                    <a class="btn-outline" href="{{ $isArticle ? route('artikel.index') : route('rapat.index') }}">Reset</a>
                </div>
            </form>

            @if ($items->isEmpty())
                <p class="empty-note">Tidak ada {{ $isArticle ? 'artikel' : 'rapat' }} yang cocok dengan filter.</p>
            @else
                <div class="card-grid">
                    @foreach ($items as $item)
                        @php
                            $id = $isArticle ? 'artikel-' . $item->id : 'rapat-' . $item->id;
                            $title = $isArticle ? $item->judul : $item->agenda_rapat;
                            $date = $isArticle ? $item->tanggal_post : $item->tanggal_rapat;
                        @endphp
                        <button type="button" class="post-card" data-dialog="{{ $id }}">
                            <div class="post-thumb">
                                @if ($item->foto)
                                    <img src="{{ url('storage/' . $item->foto) }}" alt="{{ $title }}" loading="lazy">
                                @endif
                            </div>
                            <div class="post-body">
                                <div class="post-meta">{{ $tgl($date) }}@if (!$isArticle) &middot; {{ $item->tempat_rapat }} @endif</div>
                                <h3>{{ $title }}</h3>
                                @if ($isArticle)
                                    <p>{{ \Illuminate\Support\Str::limit($item->description, 120) }}</p>
                                @endif
                            </div>
                        </button>

                        <dialog class="dlg" id="{{ $id }}">
                            <div class="dlg-head">
                                <span>{{ $isArticle ? 'Artikel' : 'Rapat' }}: {{ $tgl($date) }}</span>
                                <button type="button" class="dlg-close" data-close aria-label="Tutup">&times;</button>
                            </div>
                            @if ($item->foto)
                                <img class="dlg-img" src="{{ url('storage/' . $item->foto) }}" alt="{{ $title }}" loading="lazy">
                            @endif
                            <div class="dlg-body">
                                <h3>{{ $title }}</h3>
                                @if ($isArticle)
                                    <p>{{ $item->description }}</p>
                                @else
                                    <p><b>Catatan</b>{{ $item->note }}</p>
                                    <p><b>Waktu</b>{{ $tgl($item->tanggal_rapat) }}</p>
                                    <p><b>Tempat</b>{{ $item->tempat_rapat }}</p>
                                    <p><b>Hadir</b>{{ $item->jumlah_yang_hadir }} orang</p>
                                    <p><b>Tidak Hadir</b>{{ $item->jumlah_yang_tidak_hadir }} orang</p>
                                    <p><b>Hasil</b>{{ $item->hasil_rapat }}</p>
                                @endif
                            </div>
                        </dialog>
                    @endforeach
                </div>

                <div class="posts-pagination">
                    {{ $items->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </main>

    <script>
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');

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
            if (event.target.closest('a')) closeNav();
        });

        document.querySelectorAll('.post-thumb img, .dlg-img').forEach((image) => {
            image.addEventListener('error', () => image.remove(), { once: true });
        });

        document.querySelectorAll('[data-dialog]').forEach((trigger) => {
            trigger.addEventListener('click', () => {
                document.getElementById(trigger.dataset.dialog)?.showModal();
            });
        });
        document.querySelectorAll('[data-close]').forEach((button) => {
            button.addEventListener('click', () => button.closest('dialog')?.close());
        });
    </script>
</body>

</html>
