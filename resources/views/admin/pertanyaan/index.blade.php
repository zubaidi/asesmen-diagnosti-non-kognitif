<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Pertanyaan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Pertanyaan</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pertanyaan</h6>
                    <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Pertanyaan
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th>ID Soal</th>
                                    <th>Pertanyaan</th>
                                    <th>Opsi A</th>
                                    <th>Opsi B</th>
                                    <th>Opsi C</th>
                                    <th>Kategori</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td style="text-align: center; width: 60px;">{{ $question->id }}</td>
                                        <td>{{ $question->id_soal }}</td>
                                        <td>{{ $question->question_text }}</td>
                                        <td>{{ $question->option_a }}</td>
                                        <td>{{ $question->option_b }}</td>
                                        <td>{{ $question->option_c }}</td>
                                        <td>{{ $question->category }}</td>
                                        <td style="text-align: center; width: 100px;">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <button class="btn btn-primary btn-sm me-1 w-100" title="View Detail"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $question->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('pertanyaan.edit', $question) }}"
                                                    class="btn btn-info btn-sm me-1 w-100" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('pertanyaan.destroy', $question) }}" method="post" class="w-100 m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm w-100" title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($questions as $question)
        <div class="modal fade" id="detailModal{{ $question->id }}" tabindex="-1"
            aria-labelledby="detailModalLabel{{ $question->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $question->id }}">Detail Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <p><strong>ID Soal:</strong> {{ $question->id_soal }}</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <p><strong>Kategori:</strong> {{ $question->category }}</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <strong>Pertanyaan:</strong>
                            <p>{{ $question->question_text }}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Opsi A:</strong>
                                <p>{{ $question->option_a }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Opsi B:</strong>
                                <p>{{ $question->option_b }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Opsi C:</strong>
                                <p>{{ $question->option_c }}</p>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <small class="text-muted fst-italic">Dibuat:
                                {{ $question->created_at->format('d-m-Y H:i:s') }} | Diupdate:
                                {{ $question->updated_at->format('d-m-Y H:i:s') }}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
