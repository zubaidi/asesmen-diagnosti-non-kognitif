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

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: 600;
        }

        .form-control {
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-start {
            background-color: var(--accent-color);
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-start:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        .alert-info {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('assets/images/sa.png') }}" alt="Logo" width="30" height="30" class="me-2">
                Asesmen Diagnostik Non Kognitif
            </a>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="form-container">
                        <h2 class="text-center mb-4" style="color: var(--primary-color);">Masukkan Data Siswa</h2>
                        <form id="studentForm" method="POST" action="{{ route('user.start') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                            </div>
                            <div class="form-group">
                                <label for="nis" class="form-label">No. Pendaftaran (NIS)</label>
                                <input type="text" class="form-control" id="nis" name="nis" required>
                            </div>
                            <button type="submit" class="btn btn-start">
                                <i class="fas fa-play me-2"></i>Mulai Kuisioner
                            </button>
                        </form>

                        <div class="alert alert-info text-center mt-3">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            <strong>Informasi:</strong> Pastikan data yang Anda masukkan sudah benar sebelum memulai kuisioner.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
