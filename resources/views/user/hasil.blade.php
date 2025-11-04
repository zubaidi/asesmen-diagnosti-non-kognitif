<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuesioner - Asesmen Non Kognitif</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
            --light-bg: #ecf0f1;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .navbar {
            background-color: var(--primary-color) !important;
        }

        .result-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 20px;
        }

        .student-info {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .progress-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(var(--success-color) {{ $completionPercentage }}%, #ddd {{ $completionPercentage }}% 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            position: relative;
        }

        .progress-circle::before {
            content: '';
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            position: absolute;
        }

        .progress-text {
            position: relative;
            z-index: 1;
            font-size: 18px;
            font-weight: bold;
            color: var(--primary-color);
        }

        .category-badge {
            background: var(--accent-color);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }

        .answer-summary {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .btn-primary-custom {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary-custom:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .btn-success-custom {
            background-color: var(--success-color);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-success-custom:hover {
            background-color: #229954;
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

    <div class="container mt-4">
        <!-- Student Info -->
        <div class="student-info">
            <div class="row">
                <div class="col-md-6">
                    <h4><i class="fas fa-user me-2"></i>{{ $siswa->nama_siswa }}</h4>
                </div>
                <div class="col-md-6 text-md-end">
                    <h4><i class="fas fa-id-card me-2"></i>NIS: {{ $siswa->nis }}</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Results Summary -->
            <div class="col-lg-8">
                <div class="result-card">
                    <h3 class="text-center mb-4" style="color: var(--primary-color);">
                        <i class="fas fa-chart-line me-2"></i>Hasil Asesmen
                    </h3>

                    <!-- Completion Progress -->
                    <div class="text-center mb-4">
                        <div class="progress-circle">
                            <div class="progress-text">{{ number_format($completionPercentage, 1) }}%</div>
                        </div>
                        <h5>Tingkat Kelengkapan</h5>
                        <p class="text-muted">{{ $answeredQuestions }} dari {{ $totalQuestions }} soal terjawab</p>
                    </div>

                    <!-- Category Result -->
                    <div class="text-center mb-4">
                        <div class="category-badge">
                            <i class="fas fa-trophy me-2"></i>{{ $category }}
                        </div>
                        <p class="mt-2">{{ $description }}</p>
                    </div>

                    <!-- Answer Summary -->
                    <div class="answer-summary">
                        <h5><i class="fas fa-list-check me-2"></i>Ringkasan Jawaban</h5>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h4 style="color: var(--success-color);">{{ $answeredQuestions }}</h4>
                                    <small class="text-muted">Soal Dijawab</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h4 style="color: var(--accent-color);">{{ $totalQuestions - $answeredQuestions }}</h4>
                                    <small class="text-muted">Soal Belum Dijawab</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h4 style="color: var(--primary-color);">{{ $totalQuestions }}</h4>
                                    <small class="text-muted">Total Soal</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Panel -->
            <div class="col-lg-4">
                <div class="result-card">
                    <h5 class="mb-3"><i class="fas fa-tools me-2"></i>Aksi</h5>
                    <div class="d-grid gap-2">
                        <a href="{{ route('user.questionnaire') }}" class="btn btn-primary-custom">
                            <i class="fas fa-edit me-2"></i>Lanjutkan Kuesioner
                        </a>
                        <a href="/" class="btn btn-success-custom">
                            <i class="fas fa-home me-2"></i>Kembali ke Beranda
                        </a>
                        <button onclick="window.print()" class="btn btn-outline-secondary">
                            <i class="fas fa-print me-2"></i>Cetak Hasil
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="result-card">
                    <h5 class="mb-3"><i class="fas fa-chart-bar me-2"></i>Statistik Cepat</h5>
                    <div class="mb-2">
                        <small class="text-muted">Status:</small>
                        <span class="badge bg-success ms-2">{{ $completionPercentage >= 100 ? 'Selesai' : 'Dalam Proses' }}</span>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted">Tanggal Terakhir:</small>
                        <br>
                        <small>{{ $answers->isNotEmpty() ? $answers->last()->updated_at->format('d M Y H:i') : 'Belum ada jawaban' }}</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Answers (Optional - Collapsible) -->
        @if($answers->isNotEmpty())
        <div class="result-card">
            <h5 class="mb-3">
                <button class="btn btn-link p-0 text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#detailedAnswers" aria-expanded="false">
                    <i class="fas fa-chevron-down me-2"></i>Detail Jawaban ({{ $answers->count() }} soal)
                </button>
            </h5>
            <div class="collapse" id="detailedAnswers">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No. Soal</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($answers as $answer)
                            <tr>
                                <td>{{ $answer->id_soal }}</td>
                                <td>{{ $answer->question ? Str::limit($answer->question->question_text, 50) : 'Soal tidak ditemukan' }}</td>
                                <td>
                                    @if($answer->question)
                                        @if($answer->id_option_chosen == $answer->question->id_option_a)
                                            {{ $answer->question->option_a }}
                                        @elseif($answer->id_option_chosen == $answer->question->id_option_b)
                                            {{ $answer->question->option_b }}
                                        @elseif($answer->id_option_chosen == $answer->question->id_option_c)
                                            {{ $answer->question->option_c }}
                                        @else
                                            Jawaban tidak valid
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $answer->updated_at->format('d/m H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
