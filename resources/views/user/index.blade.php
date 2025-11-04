<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesmen Non Kognitif</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-bg: #ecf0f1;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        .hero-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            width: 100vw;
            background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), url('assets/images/bg.jpg') no-repeat center center;
            background-size: cover;
            color: var(--primary-color);
            box-sizing: border-box;
            position: relative;
            padding: 0;
            max-width: 100%;
        }

        .hero-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
        }

        .hero-text {
            text-align: left;
            max-width: 600px;
        }

        .hero-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero-text p {
            font-size: 1.2rem;
        }

        .hero-logo img {
            width: 200px;
            height: auto;
        }

        @media (max-width: 768px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
            }

            .hero-text {
                text-align: center;
            }

            .hero-logo {
                margin-top: 1.5rem;
            }

            .hero-text h1 {
                font-size: 1.8rem;
            }

            .hero-text p {
                font-size: 1rem;
            }

            .hero-logo img {
                width: 100px;
            }
        }

        .navbar {
            background-color: var(--primary-color) !important;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1rem;
            color: var(--light-bg) !important;
        }

        .navbar-nav .nav-link {
            color: var(--light-bg);
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--accent-color);
        }

        .btn-login {
            background-color: var(--accent-color) !important;
            border: none;
            color: white !important;
            font-weight: 500;
            border-radius: 20px;
            padding: 8px 20px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #c0392b !important;
            transform: scale(1.05);
        }

        .content-section {
            display: none;
            animation: fadeIn 0.5s ease-in-out;

        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            margin: 0;
            padding: 1rem;
            width: 100%;
            max-width: 100%;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: var(--secondary-color);
            color: white;
            font-weight: 600;
            border: none;
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .feature-card {
            transition: all 0.3s ease;
            border-radius: 15px;
            color: var(--color-red-50);
            background-color: var(--accent-color);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .icon-wrapper i {
            font-size: 60px;
            background: linear-gradient(135deg, #0f9b0f, #00b09b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .feature-card h3 {
            font-size: 1.4rem;
            color: var(--light-bg);
        }

        .feature-card p {
            font-size: 0.95rem;
            color: var(--light-bg);
        }

        .icon-wrapper i {
            transition: transform 0.3s ease;
        }

        .feature-card:hover .icon-wrapper i {
            transform: scale(1.15);
        }

        .smk-link {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .smk-link:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
            color: white;
        }

        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 30px 0;
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/images/sa.png') }}" alt="Logo" width="30" height="30"
                    class="me-2">Asesmen Diagnostik Non Kognitif
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavRight">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavRight">
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-section="beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://ponpes-smksa.sch.id/">SMKSA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Admin Center</a>
                    </li>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div>
        <!-- Beranda Section -->
        <section id="beranda" class="content-section active">
            <div class="hero-section mb-3">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Kuisioner Asesmen Diagnostik Non-Kognitif</h1>
                        <p class="lead">Platform penilaian kemampuan non-akademik untuk pengembangan karakter siswa
                        </p>
                        <a class="btn btn-primary mt-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#mulaiKuisionerModal">Mulai Kuisioner</a>
                    </div>
                    <div class="hero-logo">
                        <img src="assets/images/sa.png" alt="Logo" />
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mb-4 text-center">
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card h-100 shadow-sm border-0 p-4">
                            <div class="icon-wrapper mb-3">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <h3 class="fw-bold mb-3">Pengenalan</h3>
                            <p class="text-light">
                                Asesmen Diagnostik Non Kognitif adalah penilaian untuk mengetahui kondisi psikologis,
                                emosional, sosial, serta gaya belajar peserta didik sebelum proses pembelajaran dimulai.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card h-100 shadow-sm border-0 p-4">
                            <div class="icon-wrapper mb-3">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <h3 class="fw-bold mb-3">Manfaat Asesmen</h3>
                            <p class="text-light">
                                Membantu mengidentifikasi kekuatan dan area pengembangan karakter siswa,
                                serta memberikan masukan untuk program pengembangan diri.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card h-100 shadow-sm border-0 p-4">
                            <div class="icon-wrapper mb-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <h3 class="fw-bold mb-3">Untuk Siapa?</h3>
                            <p class="text-light">
                                Dirancang khusus untuk siswa SMK-SA sebagai bagian dari program pengembangan karakter
                                dan penilaian kinerja non-akademik.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-3">Mengapa Asesmen Non Kognitif Penting?</h4>
                        <p>Di era modern, keberhasilan seseorang tidak hanya ditentukan oleh kecerdasan akademik semata
                            Aspek non-kognitif seperti:</p>
                        <div class="accordion mt-4" id="accordionGayaBelajar">

                            <!-- Visual -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingVisual">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseVisual" aria-expanded="false"
                                        aria-controls="collapseVisual">
                                        1. Gaya Belajar Visual
                                    </button>
                                </h2>
                                <div id="collapseVisual" class="accordion-collapse collapse"
                                    aria-labelledby="headingVisual" data-bs-parent="#accordionGayaBelajar">
                                    <div class="accordion-body">
                                        Adalah gaya belajar yang lebih menonjolkan siswa dalam bidang visual. Dimana
                                        anak
                                        lebih paham
                                        dengan apa yang mereka lihat baik membaca atau melihat gambar maupun video.
                                        Ciri-ciri anak
                                        dengan gaya belajar visual yaitu cenderung rapi pada penampilan, berbicara
                                        dengan
                                        cepat, sering
                                        membuat coretan-coretan, teliti, tidak mudah terganggu oleh suara keributan
                                        ketika
                                        sedang belajar,
                                        dan lebih suka membaca daripada dibacakan.
                                    </div>
                                </div>
                            </div>

                            <!-- Auditoris -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingAuditoris">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseAuditoris" aria-expanded="false"
                                        aria-controls="collapseAuditoris">
                                        2. Gaya Belajar Auditoris
                                    </button>
                                </h2>
                                <div id="collapseAuditoris" class="accordion-collapse collapse"
                                    aria-labelledby="headingAuditoris" data-bs-parent="#accordionGayaBelajar">
                                    <div class="accordion-body">
                                        Adalah gaya belajar yang lebih menonjolkan fungsi pendengaran siswa daripada
                                        visual.
                                        Mereka lebih
                                        paham jika sudah mendengar entah itu mendengar ceramah guru ataupun mendengar
                                        hasil
                                        rekaman pribadi.
                                        Ciri anak dengan gaya belajar auditoris yaitu terkesan independen dan unggul
                                        dalam
                                        kecerdasan
                                        interpersonal, jika bercanda mereka lebih senang bercanda langsung daripada
                                        harus
                                        membaca komik lucu.
                                    </div>
                                </div>
                            </div>

                            <!-- Kinetis -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingKinetis">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseKinetis"
                                        aria-expanded="false" aria-controls="collapseKinetis">
                                        3. Gaya Belajar Kinetis
                                    </button>
                                </h2>
                                <div id="collapseKinetis" class="accordion-collapse collapse"
                                    aria-labelledby="headingKinetis" data-bs-parent="#accordionGayaBelajar">
                                    <div class="accordion-body">
                                        Adalah gaya belajar yang memanfaatkan gerak tubuh. Siswa dengan tipe ini tidak
                                        akan
                                        menangkap informasi
                                        secara total jika harus dipaksa duduk diam tanpa melakukan apapun. Mereka
                                        cenderung
                                        menggerakkan atau
                                        memainkan apapun yang ada di dekatnya, bicara lebih lamban dari gaya yang lain,
                                        dan
                                        sering ekspresif
                                        serta penuh gerak ketika berbicara atau berinteraksi.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row m-3">
                <!-- Kolom 1: Alamat & Sosial Media -->
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-end mb-3">
                        <img src="{{ asset('assets/images/sa.png') }}" alt="Logo" width="40" height="40"
                            class="me-2">
                        <h4 class="text-uppercase m-0">SMK Syafi'i Akrom</h4>
                    </div>

                    <p class="mb-1">Jln. Pelita 1 No. 322, Kel. Jenggot, Kec. Pekalongan Selatan,</p>
                    <p class="mb-1">Kota Pekalongan, Jawa Tengah 51133</p>
                    <p class="mb-1">Telp: (0285) 410447</p>
                    <p class="mb-3">Email: smksa@ymail.com</p>

                    <hr class="border-light">
                    <h6 class="text-uppercase mb-3">Sosial Media</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fab fa-instagram me-2"></i>
                            <a href="https://instagram.com/smksapekalongan" class="text-light text-decoration-none"
                                target="_blank">
                                @smksapekalongan
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="fab fa-youtube me-2"></i>
                            <a href="https://youtube.com/@SMKSACHANNEL" class="text-light text-decoration-none"
                                target="_blank">
                                @SMKSACHANNEL
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="fab fa-tiktok me-2"></i>
                            <a href="https://tiktok.com/@smksyafiiakrom" class="text-light text-decoration-none"
                                target="_blank">
                                @smksyafiiakrom
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-laptop-code me-2"></i>
                            <a href="https://instagram.com/rplsmksa" class="text-light text-decoration-none"
                                target="_blank">
                                @rplsmksa
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 2: Google Maps -->
                <div class="col-md-6 text-left">
                    <h5 class="text-uppercase mb-3">Lokasi Kami</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.794558764325!2d109.6676!3d-6.915149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70241cd03a660b%3A0x4f78c8f09669ab88!2sPONPES%20%20SMK%20SYAFI&#39;I%20AKROM!5e0!3m2!1sid!2sid!4v1761887721702!5m2!1sid!2sid"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>

            <hr class="border-secondary mt-4">
            <p class="text-center mb-0">&copy; 2025 Codepelita RPL SMK Syafi'i Akrom. All rights reserved</p>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script>
        // Navigation handling
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const sections = document.querySelectorAll('.content-section');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const sectionId = this.getAttribute('data-section');

                    if (sectionId) {
                        // Navigasi internal
                        e.preventDefault();

                        // Remove active class
                        navLinks.forEach(l => l.classList.remove('active'));
                        sections.forEach(s => s.classList.remove('active'));

                        // Tambahkan active class
                        this.classList.add('active');

                        // Tampilkan section sesuai data-section
                        const targetSection = document.getElementById(sectionId);
                        if (targetSection) {
                            targetSection.classList.add('active');
                        }
                    }
                    // Jika tidak ada data-section → biarkan link menuju website eksternal
                });
            });
        });
    </script>
    <!-- Modal: Mulai Kuisioner -->
    <div class="modal fade" id="mulaiKuisionerModal" tabindex="-1" aria-labelledby="mulaiKuisionerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="mulaiKuisionerModalLabel">
                        <i class="bi bi-pencil-square me-2"></i> Formulir Pendaftaran Kuisioner
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="quizForm" action="{{ route('user.start') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama_siswa"
                                placeholder="Masukkan nama lengkap Anda" required>
                        </div>

                        <div class="mb-4">
                            <label for="nis" class="form-label">Nomor Induk Siswa (NIS)</label>
                            <input type="text" class="form-control" id="nis" name="nis"
                                placeholder="Masukkan NIS Anda" required>
                        </div>


                    </form>

                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <strong>Informasi:</strong> Pastikan data yang Anda masukkan sudah benar sebelum memulai kuisioner.
                        Anda tidak dapat mengubah data setelah kuisioner dimulai
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" form="quizForm" class="btn btn-primary">Mulai Kuisioner</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
