<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Hasil Kuisioner - Asesmen Non Kognitif</title>
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

        .result-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .category-badge {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 20px 40px;
            border-radius: 25px;
            font-size: 24px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .description {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: left;
            line-height: 1.6;
        }

        .student-info {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .redirect-message {
            color: #27ae60;
            font-weight: bold;
            margin-top: 20px;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            <div class="col-lg-8">
                <!-- Student Info -->
                <div class="student-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-user me-2"></i>{{ $siswa->nama_siswa }}</h5>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5><i class="fas fa-id-card me-2"></i>NIS: {{ $siswa->nis }}</h5>
                        </div>
                    </div>
                </div>

                <div class="result-card">
                    <h2 class="mb-4" style="color: #2c3e50;">
                        <i class="fas fa-trophy me-2"></i>Kategori Hasil Kuisioner
                    {{-- </h2>

                    <!-- Category Result -->
                    <div class="category-badge">
                        <i class="fas fa-star me-2"></i>{{ $category }}
                    </div> --}}

                    <!-- Description -->
                    <div class="description">
                        <h5><i class="fas fa-info-circle me-2"></i>Rekomendasi Pembelajaran</h5>
                        <div>{!! nl2br(e($description)) !!}</div>
                    </div>

                    <!-- Auto Redirect Message -->
                    <div class="redirect-message">
                        <div class="spinner"></div>
                        <p>Halaman ini akan otomatis menutup dalam <span id="countdown">3</span> detik...</p>
                        <small>Anda akan diarahkan ke halaman utama.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        // Countdown timer
        let countdown = 3;
        const countdownElement = document.getElementById('countdown');

        const timer = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(timer);
                // Redirect to home page
                window.location.href = '/';
            }
        }, 1000);
    </script>
</body>

</html>
