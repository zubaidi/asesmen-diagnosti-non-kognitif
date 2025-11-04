<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                    <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Kategori
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-primary">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Deskripsi</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td style="text-align: center; width: 60px;">{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if($category->description)
                                                <ul class="list-unstyled">
                                                    @foreach(explode("\n", $category->description) as $line)
                                                        @if(trim($line))
                                                            <li>{{ trim($line) }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @else
                                                Tidak ada deskripsi
                                            @endif
                                        </td>
                                        <td style="width: 100px;">
                                            <div class="d-flex flex-column align-items-center gap-1 w-100">
                                                <button class="btn btn-primary btn-sm me-1 w-100" title="Lihat" data-bs-toggle="modal" data-bs-target="#categoryModal" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-description="{{ $category->description }}" data-created="{{ $category->created_at->format('d M Y, H:i') }}" data-updated="{{ $category->updated_at->format('d M Y, H:i') }}" onclick="showCategoryDetails(this)">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('category.edit', $category) }}" class="btn btn-info btn-sm me-1 w-100" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form class="w-100 m-0 d-flex" action="{{ route('category.destroy',$category) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm w-100" title="Hapus">
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
            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="categoryModalLabel">Detail Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Kategori</label>
                                        <p class="form-control-plaintext" id="modal-name"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">ID Kategori</label>
                                        <p class="form-control-plaintext" id="modal-id"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Deskripsi</label>
                                        <div id="modal-description"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Dibuat Pada</label>
                                        <p class="form-control-plaintext" id="modal-created"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Diperbarui Pada</label>
                                        <p class="form-control-plaintext" id="modal-updated"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showCategoryDetails(button) {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');
            const created = button.getAttribute('data-created');
            const updated = button.getAttribute('data-updated');

            document.getElementById('modal-id').textContent = id;
            document.getElementById('modal-name').textContent = name;

            if (description) {
                const lines = description.split('\n').filter(line => line.trim());
                const list = lines.map(line => `<li>${line.trim()}</li>`).join('');
                document.getElementById('modal-description').innerHTML = `<ul class="list-unstyled">${list}</ul>`;
            } else {
                document.getElementById('modal-description').textContent = 'Tidak ada deskripsi';
            }

            document.getElementById('modal-created').textContent = created;
            document.getElementById('modal-updated').textContent = updated;
        }
    </script>
</x-app-layout>
