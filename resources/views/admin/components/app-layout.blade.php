<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Kuisioner</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100vh;
            background-color: #4e73df;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: left 0.3s ease;
        }

        .sidebar-brand {
            display: flex;
            align-items: flex-start;
            /* logo di kiri, teks di kanan */
            gap: 10px;
            /* jarak logo dan teks */
        }

        .logo {
            width: 40px;
            height: 40px;
        }

        .text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .text-container div {
            font-weight: bold;
            font-size: 16px;
            line-height: 1.2;
            /* jarak antar baris teks */
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar-link {
            color: rgba(255, 255, 255, 0.9) !important;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white !important;
        }

        .sidebar-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white !important;
            font-weight: bold;
        }

        .chevron-icon {
            transition: transform 0.3s ease;
        }

        .sidebar-link[data-bs-toggle="collapse"].collapsed .chevron-icon {
            transform: rotate(0deg);
        }

        .sidebar-link[data-bs-toggle="collapse"]:not(.collapsed) .chevron-icon {
            transform: rotate(180deg);
        }

        .sidebar-brand {
            color: white;
            text-decoration: none;
            padding: 20px;
            display: block;
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Main Content */
        .main-content {
            max-width: 100%;
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }

        .main-content.shifted {
            margin-left: 250px;
        }

        /* Topbar */
        .topbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Responsive */
        @media (min-width: 768px) {
            .sidebar {
                left: 0;
            }

            .sidebar.hide {
                left: -250px;
            }

            .main-content {
                margin-left: 250px;
            }

            .main-content.full {
                margin-left: 0;
            }
        }

        .main-footer {
            position: fixed;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #dee2e6;
            margin-top: 10px;
        }

        .sidebar-footer {
            position: fixed;
            bottom: 0;
            left: -250px;
            width: 250px;
            background-color: #4e73df;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1000;
            transition: left 0.3s ease;
        }

        .sidebar-footer.show {
            left: 0;
        }

        @media (min-width: 768px) {
            .sidebar-footer {
                left: 0;
            }

            .sidebar-footer.hide {
                left: -250px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/images/sa.png') }}" alt="Logo" class="logo">
            <div class="text-container">
                <div>Aplikasi Asesmen</div>
                <div>Diagnostik Non Kognitif</div>
            </div>
        </div>
        <div class="list-group list-group-flush grow">
            <a href="{{ route('dashboard') }}"
                class="sidebar-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i>
                Beranda
            </a>
            <a href="{{ route('siswa.index') }}"
                class="sidebar-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>
                Siswa
            </a>
            <a class="sidebar-link {{ request()->routeIs('pertanyaan.*') || request()->routeIs('category.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#pertanyaanCollapse" aria-expanded="false" aria-controls="pertanyaanCollapse">
                <i class="fa fa-list-alt me-2"></i>
                Pertanyaan
                <i class="fas fa-chevron-down float-end chevron-icon"></i>
            </a>
            <div class="collapse" id="pertanyaanCollapse">
                <a href="{{ route('pertanyaan.index') }}" class="sidebar-link ms-3 {{ request()->routeIs('pertanyaan.index') ? 'active' : '' }}">
                    <i class="fas fa-list me-2"></i>
                    Daftar Pertanyaan
                </a>
                <a href="{{ route('category.index') }}" class="sidebar-link ms-3 {{ request()->routeIs('category.index') ? 'active' : '' }}">
                    <i class="fas fa-tags me-2"></i>
                    Kategori
                </a>
            </div>
            <a href="#" class="sidebar-link {{ request()->routeIs('hasil.*') ? 'active' : '' }}">
                <i class="fas fa-poll me-2"></i>
                Hasil Quisioner
            </a>
            <a href="#" class="sidebar-link {{ request()->routeIs('hasil.*') ? 'active' : '' }}">
                <i class="fas fa-gear me-2"></i>
                Pengaturan
            </a>
            <a href="#" class="sidebar-link" onclick="logout()">
                <i class="fas fa-sign-out-alt me-2"></i>
                Logout
            </a>
        </div>
        <!-- Footer -->
        <div class="sidebar-footer p-3 text-center" id="sidebarFooter">
            <p class="mt-2 mb-0 text-muted" style="font-size: 0.8rem;">&copy; 2025 Codepelita SMKSA</p>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Topbar -->
        <div class="topbar">
            <button class="btn btn-light" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="d-flex align-items-center">
                <span class="text-muted me-3">
                    <i class="fas fa-user-circle me-2"></i>
                    {{ Auth::user()->name }}
                </span>
                <span class="text-muted small" id="currentTime"></span>
            </div>
        </div>

        {{ $slot }}

    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>

    <script>
        // toogle navbar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('mainContent');
            const footer = document.getElementById('sidebarFooter');

            // Untuk mobile
            sidebar.classList.toggle('show');
            footer.classList.toggle('show');

            // Untuk desktop
            if (window.innerWidth >= 768) {
                sidebar.classList.toggle('hide');
                content.classList.toggle('full');
                footer.classList.toggle('hide');
            }
        });

        // Handle collapse for Pertanyaan menu - removed custom JS as Bootstrap handles it

        // login error
        document.addEventListener('DOMContentLoaded', function() {
            @error('email')
                var toastEl = document.getElementById('loginAlert');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            @enderror
        });

        // data table
        $(document).ready(function() {
            $('#dataTable').DataTable({
                autoWidth: false,
                paging: true,
                lengthChange: true,
                language: {
                    "decimal": "",
                    "emptyTable": "Tidak ada data yang tersedia di tabel",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "loadingRecords": "Memuat...",
                    "processing": "Memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang cocok",
                    "paginate": {
                        "first": "<<",
                        "last": ">>",
                        "next": ">",
                        "previous": "<"
                    },
                    "aria": {
                        "sortAscending": ": aktifkan untuk mengurutkan kolom secara menaik",
                        "sortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                    }
                },
            });
        });

        // Update current time
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('currentTime').textContent = now.toLocaleDateString('id-ID', options);
        }

        updateTime();
        setInterval(updateTime, 60000);

        // Logout function
        function logout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Simulate logout
                alert('Anda telah berhasil logout!');
                // In real application, redirect to login page
                // window.location.href = 'login.html';
            }
        }

        // menutup alert otomatis
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000); // 1 detik

        // Delete confirmation
        document.querySelectorAll('.btn-danger').forEach(btn => {
            if (btn.querySelector('.fa-trash')) {
                btn.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        alert('Data berhasil dihapus!');
                        // In real application, send delete request to server
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.btn-detail');

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut data-*
                    const nisn = this.dataset.nisn;
                    const nis = this.dataset.nis;
                    const nama = this.dataset.nama;
                    const kelas = this.dataset.kelas;
                    const alamat = this.dataset.alamat;
                    const noTelp = this.dataset.no_telp;
                    const spp = this.dataset.spp;

                    // Masukkan data ke dalam modal
                    document.getElementById('nisn').textContent = nisn;
                    document.getElementById('nis').textContent = nis;
                    document.getElementById('nama').textContent = nama;
                    document.getElementById('kelas').textContent = kelas;
                    document.getElementById('alamat').textContent = alamat;
                    document.getElementById('no_telp').textContent = noTelp;
                    document.getElementById('spp').textContent = spp;
                });
            });
        });
    </script>
</body>

</html>
