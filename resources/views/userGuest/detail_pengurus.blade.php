<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Struktur Pengurus - UKM LABBAIK</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/Logo Labbaik.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    {{-- CSS yang sama dengan halaman utama --}}
    <link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">

    {{-- Gaya khusus halaman ini (hero kecil + kartu anggota) --}}
    <style>
        .page-hero {
            position: relative;
            overflow: hidden;
            padding: 150px 0 70px;
            text-align: center;
        }

        .page-hero .wrap {
            position: relative;
            z-index: 1;
        }

        .page-hero h1 {
            font-size: clamp(28px, 5vw, 46px);
            line-height: 1.2;
            margin: 18px 0 12px;
        }

        .page-hero p {
            margin: 0 0 28px;
            font-size: 18px;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .chips a {
            padding: 8px 20px;
            border-radius: 50px;
            border: 1px solid rgba(74, 143, 231, .28);
            background: rgba(10, 18, 51, .7);
            font-size: 14px;
            font-weight: 600;
            color: #dbe5ff;
            transition: .3s;
        }

        .chips a:hover {
            background: linear-gradient(90deg, #FCD21D, #4A8FE7);
            border-color: transparent;
            color: #0a1233;
        }

        /* Tombol "Kembali ke Beranda": hover gradasi kuning-biru seperti chip departemen */
        .btn-outline.btn-back {
            transition: background .3s, color .3s, border-color .3s, box-shadow .3s, transform .3s;
        }

        .btn-outline.btn-back:hover,
        .btn-outline.btn-back:focus-visible {
            background: linear-gradient(90deg, #FCD21D, #4A8FE7);
            border-color: transparent;
            color: #0a1233;
            box-shadow: 0 6px 24px rgba(252, 210, 29, .25);
            transform: translateY(-2px);
        }

        .member-section {
            scroll-margin-top: 80px;
        }

        .member-count {
            display: block;
            margin-top: 10px;
            font-size: 13px;
            font-weight: 600;
            color: #4A8FE7;
            text-align: center;
        }

        .member-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .member-card {
            display: flex;
            gap: 24px;
            padding: 24px;
            background: #0a1233;
            border: 1px solid rgba(74, 143, 231, .28);
            border-radius: 16px;
            transition: .35s;
        }

        .member-card:hover {
            transform: translateY(-6px);
            border-color: #4A8FE7;
            box-shadow: 0 14px 40px rgba(26, 60, 160, .35);
        }

        .member-bph .member-card {
            border-color: rgba(252, 210, 29, .45);
            background: radial-gradient(circle at 20% 0%, rgba(252, 210, 29, .1), #0a1233 55%);
        }

        .member-bph .member-card:hover {
            border-color: #FCD21D;
            box-shadow: 0 14px 40px rgba(252, 210, 29, .18);
        }

        .member-photo {
            flex: 0 0 108px;
            width: 108px;
            height: 150px;
            border-radius: 14px;
            overflow: hidden;
            background: #172546;
            box-shadow: 0 0 0 1px rgba(255, 255, 255, .08), 0 8px 24px rgba(74, 143, 231, .25);
        }

        .member-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .member-info {
            min-width: 0;
            flex: 1;
        }

        .member-info h3 {
            font-size: 18px;
            margin: 0 0 8px;
            color: #fff;
        }

        .member-role {
            display: inline-block;
            margin-bottom: 12px;
            padding: 3px 14px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 600;
            color: #FCD21D;
            background: rgba(252, 210, 29, .12);
            border: 1px solid rgba(252, 210, 29, .35);
        }

        .member-meta {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .member-meta li {
            display: flex;
            gap: 10px;
            padding: 4px 0;
            font-size: 14px;
        }

        .member-meta svg {
            flex: 0 0 16px;
            width: 16px;
            height: 16px;
            margin-top: 3px;
            fill: none;
            stroke: #4A8FE7;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .member-meta b {
            font-weight: 600;
            color: #fff;
        }

        .member-motto {
            margin-top: 12px;
            padding: 10px 14px;
            border-left: 3px solid #FCD21D;
            border-radius: 0 10px 10px 0;
            background: rgba(74, 143, 231, .08);
            font-size: 13.5px;
            font-style: italic;
            color: #dbe5ff;
        }

        .member-motto b {
            font-style: normal;
            color: #fff;
        }

        .member-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 26px;
            border: 1px dashed rgba(74, 143, 231, .28);
            border-radius: 16px;
            color: #7f93bf;
        }

        @media (max-width: 900px) {
            .member-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .page-hero {
                padding: 120px 0 50px;
            }

            .page-hero p {
                font-size: 16px;
            }

            .member-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .member-meta li {
                justify-content: center;
            }

            .member-motto {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    @php
        $tgl = fn($d) => $d ? \Carbon\Carbon::parse($d)->translatedFormat('d F Y') : '-';

        // Daftar section. 'role' = kolom yang tampil sebagai jabatan di bawah nama.
        $sections = [
            ['id' => 'bph', 'nav' => 'BPH', 'title' => 'BPH', 'items' => $bph ?? collect(), 'role' => 'jabatan', 'class' => 'member-bph'],
            ['id' => 'kominfo', 'nav' => 'Kominfo', 'title' => 'Departement Kominfo', 'items' => $kominfo ?? collect(), 'role' => 'departement', 'class' => ''],
            ['id' => 'syiar', 'nav' => 'Syiar', 'title' => 'Departement Syiar', 'items' => $syiar ?? collect(), 'role' => 'departement', 'class' => ''],
            ['id' => 'kemuslimahan', 'nav' => 'Kemuslimahan', 'title' => 'Departement Kemuslimahan', 'items' => $kemuslimahan ?? collect(), 'role' => 'departement', 'class' => ''],
            ['id' => 'psdm', 'nav' => 'PSDM', 'title' => 'Departement PSDM', 'items' => $psdm ?? collect(), 'role' => 'departement', 'class' => ''],
            ['id' => 'kewirausahaan', 'nav' => 'KWU', 'title' => 'Departement KWU', 'items' => $kwu ?? collect(), 'role' => 'departement', 'class' => ''],
            ['id' => 'minatbakat', 'nav' => 'Minat & Bakat', 'title' => 'Departement Minat & Bakat', 'items' => $minatbakat ?? collect(), 'role' => 'departement', 'class' => ''],
        ];
    @endphp

    <header>
        <nav class="wrap">
            <div class="logo"><span class="logo-dot"></span> UKM LABBAIK</div>
            <div class="nav-links" id="navLinks">
                <a href="/#home">Home</a>
                <a href="/#about">About</a>
                <a href="/#visimisi">Visi Misi</a>
                <a href="/#artikel">Artikel</a>
                <a href="/detail-anggota" class="active">Departemen</a>
                <a href="/#contact">Contact</a>
            </div>
            <button class="nav-toggle" id="navToggle" type="button" aria-label="Buka menu" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
    </header>

    <section class="page-hero">
        <div class="hero-bg">
            <span class="blob b1"></span><span class="blob b2"></span><span class="blob b3"></span>
            <span class="diag d1"></span><span class="diag d2"></span><span class="diag d3"></span>
            <span class="dot dt1"></span><span class="dot dt2"></span><span class="dot dt3"></span>
            <span class="ring-loop"></span>
        </div>
        <div class="wrap">
            <span class="eyebrow"><svg viewBox="0 0 24 24" fill="currentColor" class="star-ic">
                    <path d="M12 2l1.8 6.2L20 10l-6.2 1.8L12 18l-1.8-6.2L4 10l6.2-1.8Z" />
                </svg> Politeknik Negeri Jember</span>
            <h1>Struktur <span class="c-grad">Pengurus</span> UKM Labbaik</h1>
            <p>Kenali orang-orang di balik Labbaik</p>
            <div class="chips">
                @foreach ($sections as $sec)
                    <a href="#{{ $sec['id'] }}">{{ $sec['nav'] }}</a>
                @endforeach
            </div>
        </div>
    </section>

    @foreach ($sections as $sec)
        <section class="section member-section {{ $sec['class'] }}" id="{{ $sec['id'] }}">
            <div class="wrap">
                <div class="section-head">
                    <h2>{{ $sec['title'] }}</h2>
                    <div class="underline-bar"></div>
                    @if (count($sec['items']) > 0)
                        <span class="member-count">{{ count($sec['items']) }} anggota</span>
                    @endif
                </div>

                <div class="member-grid">
                    @forelse ($sec['items'] as $m)
                        @php
                            $foto = !empty($m->foto)
                                ? url('storage/' . $m->foto)
                                : asset('assets/images/no-image.png');
                            $role = $m->{$sec['role']} ?? null;
                            $moto = trim((string) ($m->moto ?? ''), " \t\n\r\0\x0B\"");
                        @endphp
                        <article class="member-card">
                            <div class="member-photo">
                                <img src="{{ $foto }}" alt="{{ $m->nama }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('assets/images/no-image.png') }}';">
                            </div>
                            <div class="member-info">
                                <h3>{{ $m->nama }}</h3>
                                @if (!empty($role))
                                    <span class="member-role">{{ $role }}</span>
                                @endif
                                <ul class="member-meta">
                                    <li>
                                        <svg viewBox="0 0 24 24">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8" />
                                        </svg>
                                        <span><b>Angkatan:</b> {{ $m->angkatan ?: '-' }}</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24">
                                            <path d="M22 10 12 5 2 10l10 5 10-5z" />
                                            <path d="M6 12v5c3 2 9 2 12 0v-5" />
                                        </svg>
                                        <span><b>Prodi:</b> {{ $m->prodi ?: '-' }}</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24">
                                            <rect x="3" y="4" width="18" height="18" rx="2" />
                                            <path d="M16 2v4M8 2v4M3 10h18" />
                                        </svg>
                                        <span><b>Tanggal Lahir:</b> {{ $tgl($m->tanggal_lahir) }}</span>
                                    </li>
                                </ul>
                                @if ($moto !== '')
                                    <div class="member-motto"><b>Motto:</b> "{{ $moto }}"</div>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="member-empty">Belum ada data anggota.</div>
                    @endforelse
                </div>
            </div>
        </section>
    @endforeach

    <div class="center" style="padding: 10px 0 70px;">
        <a class="btn-outline btn-back" href="/">&larr; Kembali ke Beranda</a>
    </div>

    <footer>
        <div class="wrap">
            <div class="footer-grid">
                <div>
                    <h4>UKM LABBAIK</h4>
                    <p>Jl. Mastrip PO BOX 164,<br>Jember - Jawa Timur<br>Indonesia</p>
                    <p style="margin-top:14px;"><strong style="color:var(--text-hi);">Phone:</strong> 083835371950</p>
                    <p><strong style="color:var(--text-hi);">Email:</strong> <a href="mailto:ukm.labaik@polije.ac.id"
                            style="display:inline; color:var(--blue); font-weight:500;">ukm.labaik@polije.ac.id</a></p>
                </div>
                <div>
                    <h4>Penting</h4>
                    <a href="/#home">Home</a><a href="/#about">About us</a><a href="/#visimisi">Visi Misi</a><a
                        href="/#artikel">Artikel</a><a href="/#contact">Contact</a>
                </div>
                <div>
                    <h4>Kegiatan</h4>
                    <a href="#">Mengaji</a><a href="#">Belajar</a><a href="#">Sosialisasi</a><a
                        href="#">Wirausaha</a><a href="#">Silaturahim</a>
                </div>
                <div>
                    <h4>Sosial Media</h4>
                    <p>Yuk sobat polije join dan subscribe media sosial labbaik</p>
                    <div class="social-row">
                        <a href="https://instagram.com/ukmlabbaik" target="_blank" rel="noopener"
                            aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6">
                                <rect x="2" y="2" width="20" height="20" rx="5" />
                                <circle cx="12" cy="12" r="4" />
                                <circle cx="17.5" cy="6.5" r="1" />
                            </svg></a>
                        <a href="https://tiktok.com/@@ukmlabbaik_polije" target="_blank" rel="noopener"
                            aria-label="TikTok"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6">
                                <path d="M16 3a5 5 0 0 0 5 5" />
                                <path d="M16 3v12.5a4.5 4.5 0 1 1-4.5-4.5" />
                            </svg></a>
                        <a href="mailto:ukm.labaik@polije.ac.id" aria-label="Email"><svg viewBox="0 0 24 24"
                                fill="none" stroke-width="1.6">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="m2 6 10 7 10-7" />
                            </svg></a>
                        <a href="https://youtu.be/Eu6Jm0Pqjjg?si=YzVriXR46g_wsGZQ" target="_blank" rel="noopener"
                            aria-label="YouTube"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6">
                                <rect x="2" y="5" width="20" height="14" rx="4" />
                                <path d="m10 9 5 3-5 3Z" />
                            </svg></a>
                    </div>
                </div>
            </div>
            <div class="foot-bottom">
                <span>&copy; Copyright <strong>UKM Labbaik</strong></span>
                <span>Development by Departemen Kominfo</span>
            </div>
        </div>
    </footer>

    <script>
        // Menu mobile. Jika beranda Anda memakai nama class berbeda untuk menu terbuka,
        // samakan 'open' di bawah dengan script toggle di halaman beranda.
        (function() {
            var t = document.getElementById('navToggle'),
                l = document.getElementById('navLinks');
            if (!t || !l) return;
            t.addEventListener('click', function() {
                var o = l.classList.toggle('open');
                t.setAttribute('aria-expanded', o ? 'true' : 'false');
            });
        })();
    </script>
</body>

</html>