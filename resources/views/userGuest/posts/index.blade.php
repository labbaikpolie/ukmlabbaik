<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Semua Artikel - UKM LABBAIK</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/Logo Labbaik.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">
    <style>
        .post-thumb img,
        .dlg-img {
            image-orientation: from-image;
        }
    </style>
</head>

<body>
    @php
        $tgl = fn($date) => $date ? \Carbon\Carbon::parse($date)->translatedFormat('d F Y') : '-';
    @endphp

    @include('userGuest.partials.navbar', ['active' => 'artikel'])

    <main class="section posts-page">
        <div class="wrap">
            <div class="section-head">
                <h1>Semua Artikel</h1>
                <div class="underline-bar"></div>
                <p>Jelajahi seluruh artikel terbaru dari LABBAIK.</p>
            </div>

            <form class="posts-filter" method="GET" action="{{ route('artikel.index') }}">
                <div class="field posts-search">
                    <label for="posts-query">Kata kunci</label>
                    <input id="posts-query" type="search" name="q" value="{{ $search }}"
                        placeholder="Cari judul atau isi artikel">
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
                    <a class="btn-outline" href="{{ route('artikel.index') }}">Reset</a>
                </div>
            </form>

            @if ($items->isEmpty())
                <p class="empty-note">Tidak ada artikel yang cocok dengan filter.</p>
            @else
                <div class="card-grid">
                    @foreach ($items as $item)
                        @php
                            $id = 'artikel-' . $item->id;
                            $title = $item->judul;
                            $date = $item->tanggal_post;
                        @endphp
                        <button type="button" class="post-card" data-dialog="{{ $id }}">
                            <div class="post-thumb">
                                <img src="{{ $item->foto_url }}" alt="{{ $title }}" loading="lazy">
                            </div>
                            <div class="post-body">
                                <div class="post-meta">{{ $tgl($date) }}</div>
                                <h3>{{ $title }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($item->description, 120) }}</p>
                            </div>
                        </button>

                        <dialog class="dlg" id="{{ $id }}">
                            <div class="dlg-head">
                                <span>Artikel: {{ $tgl($date) }}</span>
                                <button type="button" class="dlg-close" data-close aria-label="Tutup">&times;</button>
                            </div>
                            <img class="dlg-img" src="{{ $item->foto_url }}" alt="{{ $title }}" loading="lazy">
                            <div class="dlg-body">
                                <h3>{{ $title }}</h3>
                                <p>{{ $item->description }}</p>
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
        document.querySelectorAll('.post-thumb img, .dlg-img').forEach((image) => {
            image.addEventListener('error', () => image.remove(), { once: true });
        });

        document.querySelectorAll('[data-dialog]').forEach((trigger) => {
        trigger.addEventListener('click', () => {
            const dlg = document.getElementById(trigger.dataset.dialog);
            dlg?.showModal();
        });
    });
    // Close dialog when clicking outside image or pressing Escape
    document.querySelectorAll('dialog.dlg').forEach((dlg) => {
        dlg.addEventListener('click', (e) => {
            if (e.target === dlg) {
                dlg.close();
            }
        });
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('dialog.dlg[open]').forEach((openDlg) => openDlg.close());
        }
    });
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
