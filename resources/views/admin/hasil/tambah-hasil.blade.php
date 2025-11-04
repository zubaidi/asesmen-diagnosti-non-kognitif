<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('hasil.index') }}">Hasil Kuisioner</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Hasil</li>
                </ol>
            </nav>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-plus me-2"></i>Tambah Hasil Kuisioner</h2>
            <a href="{{ route('hasil.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Form Tambah Hasil Kuisioner</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('hasil.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="answer_code" class="form-label">Kode Jawaban <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('answer_code') is-invalid @enderror" id="answer_code" name="answer_code" value="{{ old('answer_code') }}" required>
                                    @error('answer_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}" required>
                                    @error('nis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" required>
                                @error('nama_siswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_soal" class="form-label">ID Soal <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('id_soal') is-invalid @enderror" id="id_soal" name="id_soal" value="{{ old('id_soal') }}" required>
                                @error('id_soal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_option_chosen" class="form-label">ID Opsi Dipilih <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('id_option_chosen') is-invalid @enderror" id="id_option_chosen" name="id_option_chosen" value="{{ old('id_option_chosen') }}" required>
                                @error('id_option_chosen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('hasil.index') }}" class="btn btn-secondary me-2">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
