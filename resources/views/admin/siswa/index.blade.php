<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <div class="card shadow">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Siswa
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">NIS</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Kelas</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($siswa as $s)
                                    <tr>
                                        <td style="text-align: center; width: 60px;">{{ $s->id }}</td>
                                        <td style="text-align: center; width: 100px;">{{ $s->nis }}</td>
                                        <td>{{ $s->nama_siswa }}</td>
                                        <td style="text-align: center; width: 100px;">{{ $s->kelas }}</td>
                                        <td style="text-align: center; width: 157px;">
                                            <a href="{{ route('siswa.edit', $s) }}" class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('siswa.destroy', $s) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
</x-app-layout>
