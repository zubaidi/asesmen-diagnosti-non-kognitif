<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuesioner Asesmen Non Kognitif</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
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

        .question-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding: 15px;
        }

        .option-label {
            display: block;
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .option-label:hover {
            background: #e9ecef;
            border-color: var(--secondary-color);
        }

        .option-input:checked+.option-label {
            background: var(--secondary-color);
            color: white;
            border-color: var(--secondary-color);
        }

        .btn-submit {
            background-color: var(--accent-color);
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        .progress-bar {
            background-color: var(--secondary-color);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('assets/images/sa.png') }}" alt="Logo" width="30" height="30"
                    class="me-2">
                Asesmen Diagnostik Non Kognitif
            </a>
        </div>
    </nav> --}}

    <div class="container-fluid mt-2">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Daftar Soal</h5>
                    </div>
                    <div class="card-body p-2">
                        <div style="max-height: 400px; overflow-y: auto;">
                            @php
                                $questionKeys = $questions->keys()->toArray();
                            @endphp
                            @for ($row = 0; $row < ceil($totalQuestions / 5); $row++)
                                <div class="d-flex justify-content-start mb-1">
                                    @for ($col = 0; $col < 5; $col++)
                                        @php $i = $row * 5 + $col; @endphp
                                        @if ($i < $totalQuestions)
                                            @php $questionKey = $questionKeys[$i] ?? null; @endphp
                                            <a href="{{ route('user.questionnaire', ['index' => $i]) }}"
                                                class="btn btn-sm me-1 {{ $i == $currentIndex ? 'btn-primary' : ($questionKey && $answers->has($questionKey) ? 'btn-success' : 'btn-outline-secondary') }}"
                                                style="width: 35px; height: 35px; padding: 0; font-size: 12px;">
                                                {{ $i + 1 }}
                                            </a>
                                        @endif
                                    @endfor
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted">&copy; 2025 Codepelita RPL SMKSA</small>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">

                <!-- Student Info -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Nama:</strong> {{ $siswa->nama_siswa }}
                            </div>
                            <div class="col-md-6">
                                <strong>NIS:</strong> {{ $siswa->nis }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <strong>Progress:</strong> {{ $answeredCount }} dari {{ $totalQuestions }} soal telah
                                dikerjakan
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="mb-2">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%"
                            aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                            Pertanyaan {{ $currentIndex + 1 }} dari {{ $totalQuestions }}
                        </div>
                    </div>
                </div>

                <div class="question-card">
                    @if ($currentQuestion)
                        <h5 class="mb-3">{{ $currentIndex + 1 }}. {{ $currentQuestion->question_text }}</h5>

                        <div class="options">
                            <input type="radio" id="q{{ $currentQuestion->id }}_a" name="answer"
                                value="{{ $currentQuestion->id_option_a }}" class="d-none option-input"
                                {{ $selectedAnswer && $selectedAnswer->id_option_chosen == $currentQuestion->id_option_a ? 'checked' : '' }}
                                required>
                            <label for="q{{ $currentQuestion->id }}_a" class="option-label">
                                {{ $currentQuestion->option_a }}
                            </label>

                            <input type="radio" id="q{{ $currentQuestion->id }}_b" name="answer"
                                value="{{ $currentQuestion->id_option_b }}" class="d-none option-input"
                                {{ $selectedAnswer && $selectedAnswer->id_option_chosen == $currentQuestion->id_option_b ? 'checked' : '' }}>
                            <label for="q{{ $currentQuestion->id }}_b" class="option-label">
                                {{ $currentQuestion->option_b }}
                            </label>

                            <input type="radio" id="q{{ $currentQuestion->id }}_c" name="answer"
                                value="{{ $currentQuestion->id_option_c }}" class="d-none option-input"
                                {{ $selectedAnswer && $selectedAnswer->id_option_chosen == $currentQuestion->id_option_c ? 'checked' : '' }}>
                            <label for="q{{ $currentQuestion->id }}_c" class="option-label">
                                {{ $currentQuestion->option_c }}
                            </label>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            <h5>Soal Dalam Pengembangan</h5>
                            <p>Soal nomor {{ $currentIndex + 1 }} sedang dalam proses pengembangan.</p>
                        </div>
                    @endif
                </div>

                <div class="text-center mt-2">
                    @if ($currentIndex > 0)
                        <a href="{{ route('user.questionnaire', ['index' => $currentIndex - 1]) }}"
                            class="btn btn-secondary me-2">
                            <i class="fas fa-arrow-left me-2"></i>Sebelumnya
                        </a>
                    @endif

                    <button type="button" id="nextBtn" class="btn btn-primary me-2"
                        {{ $selectedAnswer ? '' : 'disabled' }}>
                        <i class="fas fa-arrow-right me-2"></i>Berikutnya
                    </button>

                    <button type="button" id="finishBtn" class="btn btn-success">
                        <i class="fas fa-check me-2"></i>Selesai Mengerjakan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Enable next button when an option is selected
            $('.option-input').change(function() {
                $('#nextBtn').prop('disabled', false);
            });

            // Pre-select if answer exists
            @if ($selectedAnswer)
                $('#nextBtn').prop('disabled', false);
            @endif

            $('#nextBtn').click(function() {
                @if ($currentQuestion)
                    var selectedAnswer = $('input[name="answer"]:checked').val();
                    if (!selectedAnswer) {
                        alert('Silakan pilih jawaban terlebih dahulu.');
                        return;
                    }

                    // Save answer via AJAX
                    $.ajax({
                        url: '{{ route('save.answer') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            question_id: {{ $currentQuestion->id }},
                            answer: selectedAnswer
                        },
                        success: function(response) {
                            // Redirect to next question or submit page
                            var nextIndex = {{ $currentIndex + 1 }};
                            if (nextIndex >= {{ $totalQuestions }}) {
                                window.location.href = '{{ route('user.submit.page') }}';
                            } else {
                                window.location.href =
                                    '{{ route('user.questionnaire', ['index' => $currentIndex + 1]) }}';
                            }
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan saat menyimpan jawaban.');
                        }
                    });
                @else
                    // If no question, just proceed to next
                    var nextIndex = {{ $currentIndex + 1 }};
                    if (nextIndex >= {{ $totalQuestions }}) {
                        window.location.href = '{{ route('user.submit.page') }}';
                    } else {
                        window.location.href =
                            '{{ route('user.questionnaire', ['index' => $currentIndex + 1]) }}';
                    }
                @endif
            });

            $('#finishBtn').click(function() {
                if (confirm(
                        'Apakah Anda yakin ingin menyelesaikan kuesioner? Jawaban yang belum tersimpan akan hilang.'
                        )) {
                    window.location.href = '{{ route('user.submit.page') }}';
                }
            });
        });
    </script>
</body>

</html>
