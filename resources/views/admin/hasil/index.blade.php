<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hasil Kuisioner</li>
                </ol>
            </nav>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Hasil Kuisioner</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Kode Jawaban</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>ID Soal</th>
                                <th>Jawaban</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($answers as $index => $answer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $answer->answer_code }}</td>
                                    <td>{{ $answer->nis }}</td>
                                    <td>{{ $answer->nama_siswa }}</td>
                                    <td>{{ $answer->id_soal }}</td>
                                    <td>{{ $answer->id_option_chosen }}</td>
                                    <td>{{ $answer->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('hasil.show', $answer) }}" class="btn btn-sm btn-info"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('hasil.edit', $answer) }}" class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('hasil.destroy', $answer) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus hasil ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "autoWidth": false,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
                "language": {
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
                "columnDefs": [
                    { "orderable": false, "targets": [7] }, // Disable sorting for Aksi column
                    { "width": "5%", "targets": 0 }, // No column
                    { "width": "15%", "targets": 1 }, // Kode Jawaban
                    { "width": "10%", "targets": 2 }, // NIS
                    { "width": "20%", "targets": 3 }, // Nama Siswa
                    { "width": "10%", "targets": 4 }, // ID Soal
                    { "width": "10%", "targets": 5 }, // Jawaban
                    { "width": "15%", "targets": 6 }, // Tanggal
                    { "width": "15%", "targets": 7 }  // Aksi
                ]
            });
        });
    </script>
</x-app-layout>
