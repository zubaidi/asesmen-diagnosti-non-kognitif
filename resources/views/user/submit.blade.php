<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Kuesioner</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #ecf0f1;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .navbar {
            background-color: #2c3e50 !important;
        }

        .submit-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .btn-submit {
            background-color: #e74c3c;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="submit-card">
                    <h2 class="mb-4">Selesai!</h2>
                    <p class="mb-4">Terima kasih telah mengisi kuesioner. Klik tombol di bawah untuk menyelesaikan.</p>
                    <form method="POST" action="{{ route('user.submit') }}">
                        @csrf
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-check me-2"></i>Selesai & Lihat Hasil
                        </button>
                    </form>
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
