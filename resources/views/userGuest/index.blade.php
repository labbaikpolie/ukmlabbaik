<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>UKM LABBAIK</title>
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
        $tgl = fn($d) => $d ? \Carbon\Carbon::parse($d)->translatedFormat('d F Y') : '-';
    @endphp

    <header>
        <nav class="wrap">
            <div class="logo"><span class="logo-dot"></span> UKM LABBAIK</div>
            <div class="nav-links" id="navLinks">
                <a href="#home" class="active">Home</a>
                <a href="#about">About</a>
                <a href="#visimisi">Visi Misi</a>
                <a href="#artikel">Artikel</a>
                <a href="#rapat">Rapat</a>
                <a href="#departemen">Departemen</a>
                <a href="#contact">Contact</a>
            </div>
            <button class="nav-toggle" id="navToggle" type="button" aria-label="Buka menu" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
    </header>

    <section class="hero" id="home">
        <div class="hero-bg">
            <span class="blob b1"></span><span class="blob b2"></span><span class="blob b3"></span>
            <span class="diag d1"></span><span class="diag d2"></span><span class="diag d3"></span>
            <span class="dot dt1"></span><span class="dot dt2"></span><span class="dot dt3"></span>
            <span class="ring-loop"></span>
        </div>
        <div class="wrap hero-grid">
            <div>
                <span class="eyebrow"><svg viewBox="0 0 24 24" fill="currentColor" class="star-ic">
                        <path d="M12 2l1.8 6.2L20 10l-6.2 1.8L12 18l-1.8-6.2L4 10l6.2-1.8Z" />
                    </svg> Politeknik Negeri Jember</span>
                <h1>Salam <span class="c-grad">LABBAIK</span> !!!</h1>
                <p>Bersama labbaik ayo lebih baik…</p>
                <div class="hero-cta">
                    <a class="btn-primary"
                        href="https://docs.google.com/forms/d/e/1FAIpQLSfqWWKRvqOBuoQCYflGAiOdH4jrBDnp6afHF8gp2LuyF755sw/viewform"
                        target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 21c0-4 4-6 8-6s8 2 8 6" />
                        </svg>
                        Join Labbaik
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                    <a class="play-link" href="https://youtu.be/Eu6Jm0Pqjjg?si=YzVriXR46g_wsGZQ" target="_blank"
                        rel="noopener"><span class="play-circle">&#9654;</span> Watch Video</a>
                </div>
            </div>
            <div class="hero-art">
                <div class="logo-glow"></div>
                <img class="logo-img" src="{{ asset('assets/images/Logo Labbaik.png') }}" alt="Logo UKM LABBAIK">
            </div>
        </div>
    </section>

    <section class="section" id="about">
        <div class="wrap">
            <div class="section-head">
                <h2>About Us</h2>
                <div class="underline-bar"></div>
                <p>UKM labbaik merupakan Lembaga Aktivis Islam Kampus atau Unit Kerohanian Islam yang menjadi satu-satunya UKM
                    Kerohanian Islam di Kampus Politeknik Negeri Jember. UKM labbaik lahir atas sebuah keinginan yang
                    mulia. Sebuah niat untuk membentuk ladang aktualisasi keislaman. Banyak manfaat yang dapat kita
                    ambil jika bergabung dengan ukm labbaik diantaranya :</p>
            </div>
            <ul class="about-list">
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg> Menambah wawasan keislaman</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg> Menambah saudara seiman</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg> Softskill dan hardskill semakin terlatih</li>
            </ul>
            <div class="center"><a class="btn-outline"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSfqWWKRvqOBuoQCYflGAiOdH4jrBDnp6afHF8gp2LuyF755sw/viewform"
                    target="_blank" rel="noopener noreferrer">Join Labbaik yuk!</a></div>
        </div>
    </section>

    <section class="section" id="visimisi">
        <div class="wrap">
            <div class="section-head">
                <h2>Visi dan Misi</h2>
                <div class="underline-bar"></div>
            </div>
            <div class="visi-misi-layout">
                <div class="visi-content">
                    <h3>Visi</h3>
                    <p>Menjadi wadah dakwah kampus yang membentuk generasi muslim berilmu, berakhlak, dan berdaya,
                        melalui lingkungan Islami yang hangat, inklusif, serta mendorong pengembangan potensi setiap
                        anggotanya.</p>
                </div>
                <div class="misi-content">
                    <h3>Misi</h3>
                    <div class="misi-grid">
                        <div class="visi-card">
                            <p>Menguatkan penerapan nilai-nilai Islam dalam setiap aktivitas Labbaik.</p>
                        </div>
                        <div class="visi-card">
                            <p>Mewujudkan komunikasi yang santun dan beradab.</p>
                        </div>
                        <div class="visi-card">
                            <p>Menghadirkan pembinaan keislaman yang terarah dan mudah diikuti.</p>
                        </div>
                        <div class="visi-card">
                            <p>Menciptakan lingkungan Islami yang hangat, inklusif, dan mendukung proses hijrah.</p>
                        </div>
                        <div class="visi-card">
                            <p>Mengembangkan potensi dan soft skill melalui pelatihan dan amanah organisasi kampus.</p>
                        </div>
                        <div class="visi-card">
                            <p>Membangun budaya kekeluargaan dan kolaborasi dalam dakwah kampus.</p>
                        </div>
                        <div class="visi-card">
                            <p>Menguatkan akhlak dan karakter kepemimpinan anggota.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== ARTIKEL (dinamis dari tabel blogs) ===== --}}
    <section class="section" id="artikel">
        <div class="wrap">
            <div class="section-head">
                <h2>Artikel</h2>
                <div class="underline-bar"></div>
                <p>Artikel terbaru dari LABBAIK.</p>
            </div>

            @if ($artikel->isEmpty())
                <p class="empty-note">Belum ada artikel.</p>
            @else
                <div class="card-grid">
                    @foreach ($artikel as $item)
                        <button type="button" class="post-card" data-dialog="artikel-{{ $item->id }}">
                            <div class="post-thumb">
                                <img src="{{ $item->foto_url }}" alt="{{ $item->judul }}" loading="lazy">
                            </div>
                            <div class="post-body">
                                <div class="post-meta">{{ $tgl($item->tanggal_post) }}</div>
                                <h3>{{ $item->judul }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($item->description, 90) }}</p>
                            </div>
                        </button>

                        <dialog class="dlg" id="artikel-{{ $item->id }}">
                            <div class="dlg-head">
                                <span>Post: {{ $tgl($item->tanggal_post) }}</span>
                                <button type="button" class="dlg-close" data-close
                                    aria-label="Tutup">&times;</button>
                            </div>
                            <img class="dlg-img" src="{{ $item->foto_url }}" alt="{{ $item->judul }}" loading="lazy">
                            <div class="dlg-body">
                                <h3>{{ $item->judul }}</h3>
                                <p>{{ $item->description }}</p>
                            </div>
                        </dialog>
                    @endforeach
                </div>
            @endif
            <div class="post-list-link">
                <a class="btn-outline" href="{{ route('artikel.index') }}">Lihat semua artikel</a>
            </div>
        </div>
    </section>

    {{-- ===== RAPAT (dinamis dari tabel rapats) ===== --}}
    <section class="section" id="rapat">
        <div class="wrap">
            <div class="section-head">
                <h2>Rapat</h2>
                <div class="underline-bar"></div>
                <p>Jadwal dan dokumentasi rapat pengurus.</p>
            </div>

            @if ($rapats->isEmpty())
                <p class="empty-note">Belum ada data rapat.</p>
            @else
                <div class="card-grid">
                    @foreach ($rapats as $rapat)
                        <button type="button" class="post-card" data-dialog="rapat-{{ $rapat->id }}">
                            <div class="post-thumb">
                                <img src="{{ $rapat->foto_url }}" alt="{{ $rapat->agenda_rapat }}" loading="lazy">
                            </div>
                            <div class="post-body">
                                <div class="post-meta">{{ $tgl($rapat->tanggal_rapat) }} &middot;
                                    {{ $rapat->tempat_rapat }}</div>
                                <h3>{{ $rapat->agenda_rapat }}</h3>
                            </div>
                        </button>

                        <dialog class="dlg" id="rapat-{{ $rapat->id }}">
                            <div class="dlg-head">
                                <span>Rapat: {{ $tgl($rapat->tanggal_rapat) }}</span>
                                <button type="button" class="dlg-close" data-close
                                    aria-label="Tutup">&times;</button>
                            </div>
                            <img class="dlg-img" src="{{ $rapat->foto_url }}" alt="{{ $rapat->agenda_rapat }}" loading="lazy">
                            <div class="dlg-body">
                                <h3>{{ $rapat->agenda_rapat }}</h3>
                                <p><b>Note</b>{{ $rapat->note }}</p>
                                <p><b>Waktu</b>{{ $tgl($rapat->tanggal_rapat) }}</p>
                                <p><b>Tempat</b>{{ $rapat->tempat_rapat }}</p>
                                <p><b>Hadir</b>{{ $rapat->jumlah_yang_hadir }} orang</p>
                                <p><b>Tidak Hadir</b>{{ $rapat->jumlah_yang_tidak_hadir }} orang</p>
                                <p><b>Hasil</b>{{ $rapat->hasil_rapat }}</p>
                            </div>
                        </dialog>
                    @endforeach
                </div>
            @endif
            <div class="post-list-link">
                <a class="btn-outline" href="{{ route('rapat.index') }}">Lihat semua rapat</a>
            </div>
        </div>
    </section>

    {{-- ===== STRUKTUR: BPH (dinamis dari tabel bphs) + kartu departemen ===== --}}
    <section class="section" id="departemen">
        <div class="wrap">
            <div class="section-head">
                <h2>Struktur Kepengurusan UKM Labbaik</h2>
                <div class="underline-bar"></div>
            </div>

            <div class="bph-banner">
                <div class="dept-icon" style="background:rgba(252,210,29,.16);"><svg viewBox="0 0 24 24"
                        fill="none" stroke="#FCD21D" stroke-width="1.6" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 2 3 7v6c0 5 4 8 9 9 5-1 9-4 9-9V7l-9-5Z" />
                    </svg></div>
                <div>
                    <h3>BPH</h3><span class="dept-sub">Badan Pengurus Harian</span>
                </div>
            </div>

            
            <div class="dept-grid dept-grid-3col">
                <div class="dept-card">
                    <div class="dept-icon" style="background:rgba(252,210,29,.14);"><svg viewBox="0 0 24 24"
                            fill="none" stroke="#FCD21D" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M4 11a9 9 0 0 1 9 9" />
                            <path d="M4 4a16 16 0 0 1 16 16" />
                            <circle cx="5" cy="19" r="1" />
                        </svg></div>
                    <h3>Kominfo</h3><span class="dept-sub">Komunikasi &amp; Informasi</span>
                </div>
                <div class="dept-card">
                    <div class="dept-icon" style="background:rgba(74,143,231,.14);"><svg viewBox="0 0 24 24"
                            fill="none" stroke="#4A8FE7" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
                        </svg></div>
                    <h3>Syiar</h3><span class="dept-sub">Dakwah &amp; Kajian</span>
                </div>
                <div class="dept-card">
                    <div class="dept-icon" style="background:rgba(0,23,178,.14);"><svg viewBox="0 0 24 24"
                            fill="none" stroke="#0017B2" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="8" r="5" />
                            <path d="M20 21a8 8 0 0 0-16 0" />
                        </svg></div>
                    <h3>Kemuslimahan</h3><span class="dept-sub">Pembinaan Muslimah</span>
                </div>
                <div class="dept-card">
                    <div class="dept-icon" style="background:rgba(252,210,29,.14);"><svg viewBox="0 0 24 24"
                            fill="none" stroke="#FCD21D" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 20V10" />
                            <path d="M18 20V4" />
                            <path d="M6 20v-4" />
                        </svg></div>
                    <h3>PSDM</h3><span class="dept-sub">Pengembangan SDM</span>
                </div>
                <div class="dept-card">
                    <div class="dept-icon" style="background:rgba(252,210,29,.14);"><svg viewBox="0 0 24 24"
                            fill="none" stroke="#FCD21D" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="7" width="18" height="13" rx="2" />
                            <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        </svg></div>
                    <h3>KWU</h3><span class="dept-sub">Kewirausahaan</span>
                </div>
                <div class="dept-card">
                    <div class="dept-icon" style="background:rgba(74,143,231,.14);"><svg viewBox="0 0 24 24"
                            fill="none" stroke="#4A8FE7" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="13.5" cy="6.5" r="2.5" />
                            <path d="M17 12.5c1.5 1 2.5 3 2.5 5.5H4c0-4 3-7 7-7 1 0 1.9.2 2.7.6" />
                            <path d="M6.5 8.5 4 6" />
                        </svg></div>
                    <h3>Minat &amp; Bakat</h3><span class="dept-sub">Minat &amp; Kreativitas</span>
                </div>
            </div>
            <div class="center" style="margin-top:28px;"><a class="btn-outline" href="/detail-anggota">Lihat Semua
                    Anggota</a></div>
        </div>
    </section>

    <section class="section" id="qa">
        <div class="wrap">
            <div class="section-head">
                <h2>Pertanyaan (QA)</h2>
                <div class="underline-bar"></div>
            </div>
            <div class="faq">
                <details class="faq-item" open>
                    <summary>Apa itu UKM labbaik ?</summary>
                    <p>UKM labbaik merupakan Lembaga Aktivis Islam Kampus atau Unit Kerohanian Islam yang menjadi satu-satunya
                        UKM Kerohanian Islam di Kampus Politeknik Negeri Jember.</p>
                </details>
                <details class="faq-item">
                    <summary>Bagaimana struktur kepengurusan di labbaik ?</summary>
                    <p>Struktur kepengurusan terdiri dari BPH dan enam departemen: Kominfo, Syiar, Kemuslimahan, PSDM,
                        KWU, dan Minat &amp; Bakat.</p>
                </details>
                <details class="faq-item">
                    <summary>Apa saja kegiatan labbaik ?</summary>
                    <p>Kegiatan meliputi kajian rutin, pembinaan keislaman, pengembangan diri, kewirausahaan, dan
                        penyaluran minat bakat anggota.</p>
                </details>
                <details class="faq-item">
                    <summary>Bagaimana cara join labbaik ?</summary>
                    <p>Pendaftaran dibuka setiap awal semester melalui open recruitment, atau hubungi kontak yang
                        tersedia di halaman ini.</p>
                </details>
                <details class="faq-item">
                    <summary>Apa saja manfaat bagi saya jika ikut labbaik ?</summary>
                    <p>Menambah wawasan keislaman, saudara seiman, serta melatih softskill dan hardskill.</p>
                </details>
            </div>
        </div>
    </section>

    <section class="section" id="contact">
        <div class="wrap">
            <div class="section-head">
                <h2>Contact</h2>
                <div class="underline-bar"></div>
            </div>
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="row"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0Z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <div>
                            <h4>Location</h4>
                            <p>Jl. Mastrip PO BOX 164, Jember - Jawa Timur - Indonesia</p>
                        </div>
                    </div>
                    <div class="row"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                            <path d="m2 6 10 7 10-7" />
                        </svg>
                        <div>
                            <h4>Email</h4>
                            <p><a href="mailto:ukm.labaik@polije.ac.id">ukm.labaik@polije.ac.id</a></p>
                        </div>
                    </div>
                    <div class="row"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.68 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.32 1.85.55 2.81.68A2 2 0 0 1 22 16.92Z" />
                        </svg>
                        <div>
                            <h4>Call</h4>
                            <p>083835371950</p>
                        </div>
                    </div>
                    <div class="map-embed">
                        <a class="map-open-badge" href="https://maps.app.goo.gl/3NehHxASY1ixJnE88" target="_blank"
                            rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                <path d="M15 3h6v6" />
                                <path d="M10 14 21 3" />
                            </svg>
                            Buka di Maps
                        </a>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7220.040937925075!2d113.723073!3d-8.159955!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e1!3m2!1sid!2sid!4v1790208982331!5m2!1sid!2sid"
                            loading="lazy" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"
                            title="Lokasi Politeknik Negeri Jember"></iframe>
                    </div>
                </div>

                <div class="contact-form">
                    @if (session('contact_success'))
                        <p class="form-status form-status-success" role="status">{{ session('contact_success') }}</p>
                    @endif
                    @if (session('contact_error'))
                        <p class="form-status form-status-error" role="alert">{{ session('contact_error') }}</p>
                    @endif
                    @if ($errors->contact->any())
                        <ul class="form-status form-status-error" role="alert">
                            @foreach ($errors->contact->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <input type="text" name="website" class="contact-honeypot" tabindex="-1" autocomplete="off"
                            aria-hidden="true">
                        <div class="form-grid">
                            <div class="field"><label for="c-name">Your Name</label><input id="c-name"
                                    name="name" type="text" placeholder="Nama Anda" value="{{ old('name') }}" required></div>
                            <div class="field"><label for="c-email">Your Email</label><input id="c-email"
                                    name="email" type="email" placeholder="email@contoh.com" value="{{ old('email') }}" required></div>
                        </div>
                        <div class="field" style="margin-bottom:14px;"><label for="c-subject">Subject</label><input
                                id="c-subject" name="subject" type="text" placeholder="Subjek pesan" value="{{ old('subject') }}" required></div>
                        <div class="field" style="margin-bottom:16px;"><label for="c-message">Message</label>
                            <textarea id="c-message" name="message" rows="5" placeholder="Tulis pesan Anda" required>{{ old('message') }}</textarea>
                        </div>
                        <button class="btn-primary" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
                    <a href="#home">Home</a><a href="#about">About us</a><a href="#visimisi">Visi Misi</a><a
                        href="#artikel">Artikel</a><a href="#contact">Contact</a>
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
            if (event.target.closest('a')) {
                closeNav();
            }
        });

        document.addEventListener('click', (event) => {
            const card = event.target.closest('[data-dialog]');
            if (card) {
                const dialog = document.getElementById(card.dataset.dialog);
                if (dialog instanceof HTMLDialogElement) {
                    dialog.showModal();
                }
                return;
            }

            const closeButton = event.target.closest('[data-close]');
            if (closeButton) {
                closeButton.closest('dialog').close();
                return;
            }

            if (event.target instanceof HTMLDialogElement && event.target.classList.contains('dlg')) {
                event.target.close();
            }
        });
    </script>
