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
                <a href="{{ route('hasil.export') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel me-2"></i>Export Excel
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered" style="font-size: 14px;">
                        <thead class="table-primary">
                            <tr>
                                <th style="text-align: center; width: 4%;">#</th>
                                <th style="text-align: center; width: 8%;">No. Pendaftaran</th>
                                <th style="text-align: center; width: 20%;">Nama Siswa</th>
                                <th>Jawaban Terbanyak</th>
                                <th>Kategori</th>
                                <th style="text-align: center;">Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupedAnswers as $index => $group)
                                <tr>
                                    <td style="text-align: center;">{{ $index + 1 }}</td>
                                    <td style="text-align: center;">{{ $group['nis'] }}</td>
                                    <td>{{ $group['nama_siswa'] }}</td>
                                    <td>{{ $group['jawaban_terbanyak'] }}</td>
                                    <td>{{ $group['kategori'] }}</td>
                                    <td>
                                        <ul>
                                            @foreach (explode('.', $group['rekomendasi']) as $rekomendasi)
                                                @if (trim($rekomendasi) !== '')
                                                    <li>{{ trim($rekomendasi) }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
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
                "columnDefs": [{
                        "orderable": false,
                        "targets": [5]
                    }, // Disable sorting for Rekomendasi column
                    {
                        "width": "5%",
                        "targets": 0
                    }, // No column
                    {
                        "width": "10%",
                        "targets": 1
                    }, // NIS
                    {
                        "width": "20%",
                        "targets": 2
                    }, // Nama Siswa
                    {
                        "width": "15%",
                        "targets": 3
                    }, // Jawaban Terbanyak
                    {
                        "width": "15%",
                        "targets": 4
                    }, // Kategori
                    {
                        "width": "35%",
                        "targets": 5
                    } // Rekomendasi
                ]
            });
        });
    </script>
</x-app-layout>
