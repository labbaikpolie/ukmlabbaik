<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>UKM LABBAIK</title>
    <link rel="shortcut icon" href="{{ asset('/assets/images/Logo Labbaik.png') }}">
    <!-- Favicons -->
    <link href="{{ asset('/user/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/users/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/users/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/users/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/users/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/users/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/users/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/users/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/users/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/users/assets/css/style.css') }}" rel="stylesheet">
    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .more {
            margin-right: -10px !important;
        }

        .btn-outline-info {
            color: #47b2e4;
            /* warna teks awalnya (biru) */
            background-color: transparent;
            /* latar belakang awalnya (transparan untuk outline) */
            transition: color 0.3s, background-color 0.3s;
            /* animasi perubahan warna */
        }

        .btn-outline-info:hover {
            color: #fff;
            /* warna teks saat di-hover (putih) */
            background-color: #47b2e4;
            /* latar belakang saat di-hover (biru) */
        }

        .deskripsi {
            max-width: 0px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .modal-content {
            width: 100%;
            max-width: 600px;
            /* Sesuaikan lebar modal sesuai kebutuhan */
        }

        .motto-grid {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 5px;
            line-height: 1.6;
            color: #555;
            margin-top: 5px;
            font-style: italic;
            }

            .motto-grid strong {
            font-style: normal;
            }

            .motto-grid i {
            color: #3498db;
            }

        section#rapat {
            margin-top: -90px !important;
        }

        .modal-content {
            margin-top: 700px !important;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto logo-labbaik" style="color: white; font-weight: bold;">UKM Labbaik
            </h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
                    <li><a class="nav-link scrollto" href="#services">Visi Misi</a></li>
                    <li><a class="nav-link scrollto" href="#artikel">Artikel</a></li>
                    <li><a class="nav-link scrollto" href="/detail-anggota">Departemen</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Salam labbaik !!!</h1>
                    <h2>Bersama labbaik ayo lebih baik...</h2>
                    <div class="d-flex justify-content-center ">
                        <a href="https://youtu.be/Wk1Hg7Ehj_A?si=SsY4yU5wLn3plPqo" class="glightbox btn-watch-video"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>
                </div>
                <div class=" col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('assets/images/Logo Labbaik.png') }}" class="img-fluid animated" alt="Logo Labbaik" width="250">
                        <alt="" width="250">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>About Us</h2>
                </div>
                <div class="row content">
                    <div class="col-lg-12">
                        <p>
                            UKM labbaik merupakan Lembaga Dakwah Kampus atau Unit Kerohanian Islam yang menjadi
                            satu-satunya UKM Kerohanian Islam di Kampus Politeknik Negeri Jember. UKM labbaik lahir atas
                            sebuah keinginan yang mulia. Sebuah niat untuk membentuk ladang aktualisasi keislaman.
                            Banyak manfaat yang dapat kita ambil jika bergabung dengan ukm labbaik diantaranya :
                        </p>

                        <ul>
                            <li><i class="ri-check-double-line"></i>Menambah wawasan keislaman</li>
                            <li><i class="ri-check-double-line"></i>Menambah saudara seiman</li>
                            <li><i class="ri-check-double-line"></i>Softskill dan hardskill semakin terlatih </li>
                        </ul>
                    </div>
                </div>
                <div class="section-title content">
                    <a href="#"
                        class="btn-learn-more col-lg-3 justify-content-end align-content-end align-items-end">Join
                        Labbaik yuk!</a>
                </div>
            </div>
        </section><!-- End About Us Section -->
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Visi dan Misi</h2>
                    <p>Menjadikan UKM labbaik sebagai wadah bagi mahasiswa guna memperdalam ilmu agama dan juga mencetak
                        mahasiswa yang berakhlak mulia, jujur, serta bertanggung jawab yang diridhoi oleh Allah
                        subhanahu wata'ala
                    </p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            {{-- <div class="icon"><i class="bx bxl-dribbble"></i></div> --}}
                            <h4><a href="">Berjiwa Qurani</a></h4>
                            <p>Menciptakan mahasiswa yang berjiwa qurani
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            {{-- <div class="icon"><i class="bx bx-file"></i></div> --}}
                            <h4><a href="">Berakhlak Al-Qur'an dan as <br>Sunnah</a></h4>
                            <p>Menciptakan mahasiswa yang senantiasa <br> berakhlak Al-Qur'an dan as-Sunnah</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            {{-- <div class="icon"><i class="bx bx-tachometer"></i></div> --}}
                            <h4><a href="">Menjunjung tinggi nilai-<br>nilai ketakwaan</a></h4>
                            <p>Mahasiswa mampu menjunjung tinggi nilai-nilai ketakwaan dan bernafaskan Islam</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->
        <!-- ======= Team Section ======= -->
        <section id="artikel" class="team section-bg" style="padding-top:5rem; background:white;">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Artikel</h2>
                </div>
                <div class="row">
                    @foreach ($artikel as $item)
                        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="member d-flex align-items-start">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $item->id }}">
                                    <div class="card border-0" style="width: 18rem;">
                                        <img src="{{ url('storage/' . $item->foto) }}" alt="gambar"
                                            class="img-fluid" style="height: 150px !important; object-fit: cover;">
                                        <div class="card-body">
                                            <h4 class="text-center">{{ $item->judul }}</h4>
                                        </div>
                                    </div>

                                </a>

                            </div>
                        </div>

                        <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content mt-5">
                                    <div class="modal-header">
                                        <p class="modal-title" id="exampleModalLabel">
                                            <b> Post : </b> {{ \Carbon\Carbon::parse($item->tanggal_post)->translatedFormat('d F Y') }}
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <div class="container p-2">
                                            {{-- <div class="d-flex justify-content-center">
                                                <div class="col-10 justify-content-center"> --}}
                                            <div class="card" style="width: 24rem; margin: 0 auto;">
                                                {{-- <img src="images/card.png" class="card-img-top" alt="..."> --}}
                                                <img src="{{ url('storage/' . $item->foto) }}" alt="gambar"
                                                    class="card-img-top"
                                                    style="height: 195px !important; object-fit: cover;">
                                                <div class="card-body">
                                                    <h4 class="text-center">{{ $item->judul }}
                                                    </h4>
                                                    <p style="text-align: justify;">{{ $item->description }}
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- End Team Section -->
        <section id="rapat" class="team section-bg mb-0 mt-0" style="padding-top:5rem; background : white">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Rapat</h2>
                </div>
                <div class="row">
                    @foreach ($rapats as $rapat)
                        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="member d-flex align-items-start">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#rapatmodal{{ $rapat->id }}">
                                    <div class="card border-0" style="width: 18rem;">
                                        <img src="{{ url('storage/' . $rapat->foto) }}" alt="gambar"
                                            class="img-fluid" style="height: 150px !important; object-fit: cover;">
                                        <div class="card-body">
                                            <h4 class="text-center">{{ $rapat->agenda_rapat }}</h4>
                                        </div>
                                    </div>

                                </a>

                            </div>
                        </div>

                        <div class="modal fade" id="rapatmodal{{ $rapat->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content mt-5">
                                    <div class="modal-header">
                                        <p class="modal-title" id="exampleModalLabel">
                                            <b> Post : </b>{{ \Carbon\Carbon::parse($rapat->tanggal_rapat)->translatedFormat('d F Y') }}
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <div class="container p-2">
                                            {{-- <div class="d-flex align-items-center justify-content-center"> --}}
                                            {{-- <div class="col-12 col-sm-8 col-md-6 col-lg-4"> --}}
                                            <div class="card" style="width: 24rem; margin: 0 auto;">
                                                <img src="{{ url('storage/' . $rapat->foto) }}" alt="gambar"
                                                    class="card-img-top"
                                                    style="height: 195px !important; object-fit: cover;">
                                                <div class="card-body text-center">
                                                    <h4>{{ $rapat->agenda_rapat }}</h4>
                                                    <p style="text-align: justify;">
                                                        <b>Note:</b><br>{{ $rapat->note }} !!
                                                    </p>
                                                    <p style="text-align: justify;">
                                                        <b>Waktu:</b><br>{{ \Carbon\Carbon::parse($rapat->tanggal_rapat)->translatedFormat('d F Y') }}
                                                    </p>
                                                    <p style="text-align: justify;">
                                                        <b>Tempat:</b><br>{{ $rapat->tempat_rapat }}
                                                    </p>
                                                    <p style="text-align: justify;">
                                                        <b>Hadir:</b><br>{{ $rapat->jumlah_yang_hadir }} orang
                                                    </p>
                                                    <p style="text-align: justify;"><b>Tidak
                                                            Hadir:</b><br>{{ $rapat->jumlah_yang_tidak_hadir }}
                                                        orang</p>
                                                    <p style="text-align: justify;">
                                                        <b>Hasil:</b><br>{{ $rapat->hasil_rapat }}
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- </div> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Team Section -->
        <!-- Modal -->

        <section id="team" class="team section-bg" style="padding-top:5rem;">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Struktur Anggota UKM labbaik</h2>
                </div>

                <div class="row">
                    @foreach ($bph as $b)
                        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="member d-flex align-items-start">
                                <div class=""><img src="{{ url('storage/' . $b->foto) }}"
                                        {{-- class="img-fluid" --}} alt=""
                                        style="height: 155px !important; object-fit: cover; width:110px; border-radius: 20px;">
                                </div>
                               <div class="member-info">
                                 <h4 style="font-weight: 700; font-size: 20px; color: #2c3e50;">
                                   {{ $b->nama }}
                                    </h4>
                                    <span style="font-style: italic; color: #7f8c8d;">
                                    {{ $b->jabatan }}
                                    </span>
                                     <p><i class="fa fa-user-graduate" style="margin-right: 5px;"></i> 
                                     <strong>Angkatan:</strong> {{ $b->angkatan }}
                                    </p>
                                    <p><i class="fa fa-user-graduate" style="margin-right: 5px;"></i> 
                                     <strong>Prodi:</strong> {{ $b->prodi }}
                                    </p>
                                        <p><i class="fa fa-calendar-alt" style="margin-right: 5px;"></i> 
                                            <strong>Tanggal Lahir:</strong> {{ $b->tanggal_lahir ? \Carbon\Carbon::parse($b->tanggal_lahir)->translatedFormat('d F Y') : '-' }} 
                                        </p>
                                    <div class="motto-grid">
                                        <span><i class="fa fa-quote-left" style="margin-right: 5px;"></i><strong>Motto:</strong></span>
                                        <span><em>"{{ $b->moto }}"</em></span>
                                        </div>

                                    <div class="social">
                                        {{-- Tambahkan link jika ada --}}
                                        {{-- <a href="#"><i class="fab fa-instagram"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class=" mt-3 d-flex justify-content-center align-content-center align-items-center more">
                <a href="/detail-anggota" class="btn btn-outline-info col-lg-2 ">Anggota Lain</a>
            </div>
            {{-- <div class="section-title content">
                <a href="#"
                    class="anggota btn btn-outline-info col-lg-3 justify-content-end align-content-end align-items-end"
                    style=".anggota {
                        color: #3498db;
                    }

                    /* Saat di-hover, teks berubah menjadi putih */
                    .anggota:hover {
                        color: #fff;
                    }">Join
                    Labbaik yuk</a>
            </div> --}}
        </section><!-- End Team Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pertanyaan (QA)</h2>
                    {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum
                        quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                        alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                </div>
                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">apa itu UKM labbaik ? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    UKM labbaik merupakan Lembaga Dakwah Kampus atau Unit Kerohanian Islam yang menjadi
                                    satu-satunya UKM Kerohanian Islam di Kampus Politeknik Negeri Jember
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Bagaimana Struktur kepengurusan di
                                labbaik ? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Ada BPH dan 6 departemen diantaranya kominfo, syiar, kemuslimahan, PSDM dan
                                    kewirausahaan
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Apa saja kegiatan labbaik ? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Tentunya kegiatannya sangat bermanfaat diantaranya ada workshop kemuslimahan, polije
                                    mengaji, baksos ke panti asuhan dan masih banyak lagi kegiatan lainnya.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Bagaimana cara join labbaik ? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    sangat mudah kalian bisa join jadi staf muda dulu lalu next step jadi pengurus ukm
                                    labbaik
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="500">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">apa saja manfaat bagi saya jika ikut
                                labbaik ? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    wah pastinya banyak banget ya guys, kamu bakal punya saudara baru, wawasan keislaman
                                    semakin bertambah, punya circle temen yang bisa saling mengajak dalam hal kebaikan,
                                    softskill dan hardskill tentunya juga semakin terasah di dalam organisasi ini.
                                    <b>jadi tunggu apa lagi yuk join UKM labbaik</b>
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Jl. Mastrip POBOX 164 Sumbersari - Jember</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p> ukm.labaik@polije.ac.id</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>082143131449</p>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4235573861815!2d113.72061207358728!3d-8.160010181752565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1698975674838!5m2!1sid!2sid"
                                width="100%" height="290px" style="border:0;" allowfullscreen="" loading="lazy"
                                frameborder="0" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        {{-- <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join and Subscribe</h4>
                        <p>Yuk sobat polije join dan subscribe media sosial labbaik</p>
                        <a href="#">
                            <button type="submit">Send Message</button>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="footer-top section-bg" id="section-bg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>UKM Labbaik</h3>
                        <p>
                            Jl. Mastrip <br>
                            POBOX 164 Sumbersari<br>
                            Jember<br><br>
                            <strong>Phone:</strong> 082143131449<br>
                            <strong>Email:</strong>ukm.labaik@polije.ac.id<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Penting</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#home">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">Visi Misi</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#artikel">Artikel</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Kegiatan</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Mengaji</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Belajar</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Sosialisasi</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Wirausaha</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Silaturahim</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Sosial Media</h4>
                        <p>Yuk sobat polije join dan subscribe media sosial labbaik</p>
                        <div class="social-links mt-3">
                            {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
                            {{-- <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> --}}
                            <a href="https://instagram.com/ukmlabbaik?igshid=MTUxeHM1bXg1dHhsdw==" target="_blank"
                                class="instagram"><i class="bx bxl-instagram"></i></a>
                            {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}
                            {{-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
                            <a href="https://youtu.be/Wk1Hg7Ehj_A?si=SsY4yU5wLn3plPqo" target="_blank"
                                class="youtube">
                                <i class="bx bxl-youtube"></i>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix mt-5 p-0">
            <div class="copyright">
                &copy; Copyright <strong><span>UKM labbaik</span></strong>
                <p class="text-center align-content-center align-items-center justify-content-center">source <a
                        href="https://getbootstrap.com/" target="_blank">bootstrap</a></p>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                {{-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ --}}
                Development by <a href="https://www.linkedin.com/in/ahmad-hidayat-a6120b220/" target="_blank">Ahmad
                    Hidayat</a> <br>
                {{-- Design by <a href=" https://bootstrapmade.com/license/">bootstrap</a> --}}

            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('users/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('users/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('users/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('users/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('users/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('users/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ URL::asset('users/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ URL::asset('users/assets/js/main.js') }}"></script>

</body>

</html>
