<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pertanyaan.index') }}">Pertanyaan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Pertanyaan</li>
                </ol>
            </nav>
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Pertanyaan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pertanyaan.update', $pertanyaan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_soal" class="form-label">ID Soal <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('id_soal') is-invalid @enderror" id="id_soal" name="id_soal" value="{{ old('id_soal', $pertanyaan->id_soal) }}" required>
                                    @error('id_soal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                                        <option value="">Pilih Kategori</option>
                                        <option value="A" {{ old('category', $pertanyaan->category) == 'A' ? 'selected' : '' }}>Kategori A</option>
                                        <option value="B" {{ old('category', $pertanyaan->category) == 'B' ? 'selected' : '' }}>Kategori B</option>
                                        <option value="C" {{ old('category', $pertanyaan->category) == 'C' ? 'selected' : '' }}>Kategori C</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="question_text" class="form-label">Pertanyaan <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('question_text') is-invalid @enderror" id="question_text" name="question_text" rows="3" required>{{ old('question_text', $pertanyaan->question_text) }}</textarea>
                            @error('question_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="id_option_a" class="form-label">ID Opsi A</label>
                                    <input type="text" class="form-control" id="id_option_a" value="1" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="option_a" class="form-label">Opsi A</label>
                                    <input type="text" class="form-control @error('option_a') is-invalid @enderror" id="option_a" name="option_a" value="{{ old('option_a', $pertanyaan->option_a) }}">
                                    @error('option_a')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="id_option_b" class="form-label">ID Opsi B</label>
                                    <input type="text" class="form-control" id="id_option_b" value="2" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="option_b" class="form-label">Opsi B</label>
                                    <input type="text" class="form-control @error('option_b') is-invalid @enderror" id="option_b" name="option_b" value="{{ old('option_b', $pertanyaan->option_b) }}">
                                    @error('option_b')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="id_option_c" class="form-label">ID Opsi C</label>
                                    <input type="text" class="form-control" id="id_option_c" value="3" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="option_c" class="form-label">Opsi C</label>
                                    <input type="text" class="form-control @error('option_c') is-invalid @enderror" id="option_c" name="option_c" value="{{ old('option_c', $pertanyaan->option_c) }}">
                                    @error('option_c')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pertanyaan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
