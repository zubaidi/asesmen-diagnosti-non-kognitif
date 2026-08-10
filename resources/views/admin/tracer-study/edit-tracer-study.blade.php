<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/tracer-study') }}">Data Tracer Study</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Tracer Study</li>
                </ol>
            </nav>
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Tracer Study</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tracer-study.update', $tracerStudy) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis', $tracerStudy->nis) }}" required>
                                    @error('nis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="option" class="form-label">Opsi <span class="text-danger">*</span></label>
                                    <select class="form-control @error('option') is-invalid @enderror" id="option" name="option" required>
                                        <option value="">Pilih Opsi</option>
                                        <option value="BEKERJA" {{ old('option', $tracerStudy->option) == 'BEKERJA' ? 'selected' : '' }}>BEKERJA</option>
                                        <option value="KULIAH" {{ old('option', $tracerStudy->option) == 'KULIAH' ? 'selected' : '' }}>KULIAH</option>
                                        <option value="WIRAUSAHA" {{ old('option', $tracerStudy->option) == 'WIRAUSAHA' ? 'selected' : '' }}>WIRAUSAHA</option>
                                    </select>
                                    @error('option')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Jawaban <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="4" required>{{ old('answer', $tracerStudy->answer) }}</textarea>
                                    @error('answer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tracer-study.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
