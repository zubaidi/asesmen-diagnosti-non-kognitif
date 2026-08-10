<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Tracer Study</li>
                </ol>
            </nav>
            <div class="card shadow">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tracer Study</h6>
                    <div>
                        <a href="{{ route('tracer-study.export') }}" class="btn btn-success btn-sm me-1">
                            <i class="fas fa-file-excel me-2"></i>Export Excel
                        </a>
                        <a href="{{ route('tracer-study.create') }}" class="btn btn-primary btn-sm d-none">
                            <i class="fas fa-plus me-2"></i>Tambah Tracer Study
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                            <thead class="table-primary">
                                <tr>
                                    <th style="text-align: center; width: 4%;">#</th>
                                    <th style="text-align: center;">Nama Siswa</th>
                                    <th style="text-align: center; width: 10%;">Kelas</th>
                                    <th style="text-align: center; width: 15%;">Opsi</th>
                                    <th style="text-align: center;">Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tracerStudies as $ts)
                                    <tr>
                                        <td style="text-align: center;">{{ $ts->id }}</td>
                                        <td>{{ $ts->nama_siswa }}</td>
                                        <td style="text-align: center;">{{ $ts->siswa->kelas ?? 'N/A' }}</td>
                                        <td style="text-align: center;">{{ $ts->option }}</td>
                                        <td>{{ $ts->answer }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
