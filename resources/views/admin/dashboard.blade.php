<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Administrator</li>
                </ol>
            </nav>
        </div>

        <div class="row mt-4">
            <!-- Card Jumlah Siswa -->
            <div class="col-md-4">
                <div class="card bg-white mb-3 shadow h-100">
                    <div class="card-header text-primary">
                        <i class="fas fa-users me-2"></i>Jumlah Siswa
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $totalSiswa }}</h5>
                        <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-sm mt-auto">
                            <i class="fas fa-eye me-1"></i>Lihat Siswa
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Sudah Mengerjakan -->
            <div class="col-md-4">
                <div class="card bg-white mb-3 shadow h-100">
                    <div class="card-header text-success">
                        <i class="fas fa-check-circle me-2"></i>Sudah Mengerjakan
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success">{{ $sudahMengerjakan }}</h5>
                        <a href="{{ route('hasil.index') }}" class="btn btn-success btn-sm mt-auto">
                            <i class="fas fa-eye me-1"></i>Lihat Hasil
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Belum Mengerjakan -->
            <div class="col-md-4">
                <div class="card bg-white mb-3 shadow h-100">
                    <div class="card-header text-danger">
                        <i class="fas fa-clock me-2"></i>Belum Mengerjakan
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-danger">{{ $belumMengerjakan }}</h5>
                        <a href="#" class="btn btn-danger btn-sm mt-auto">
                            <i class="fas fa-eye me-1"></i>Lihat Belum
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Kategori Jawaban Siswa -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card bg-white shadow">
                    <div class="card-header text-primary d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse" style="cursor: pointer;">
                        <span><i class="fas fa-chart-bar me-2"></i>Distribusi Kategori Jawaban Siswa</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="categoryCollapse" class="collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Persentase (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($categories as $category)
                                        <tr>
                                            <td>{{ $category['category'] }}</td>
                                            <td>{{ $category['count'] }}</td>
                                            <td>{{ $category['percentage'] }}%</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Belum ada data kategori</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
