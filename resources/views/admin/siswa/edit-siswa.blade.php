<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/siswa') }}">Menu Siswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Siswa</li>
                </ol>
            </nav>
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Siswa</h6>
                </div>
                <div class="card-body">
                    @php
                        $kelasOptions = [
                            'XRPL1', 'XRPL2', 'XRPL3', 'XTKJ1', 'XTKJ2', 'XTKJ3', 'XTKJ4', 'XTKJ5', 'XTKR1', 'XTKR2', 'XTKR3', 'XTSM1', 'XTSM2', 'XTSM3', 'XDPB1', 'XDPB2',
                            'XIRPL1', 'XIRPL2', 'XIRPL3', 'XITKJ1', 'XITKJ2', 'XITKJ3', 'XITKJ4', 'XITKJ5', 'XITKR1', 'XITKR2', 'XITKR3', 'XITSM1', 'XITSM2', 'XITSM3', 'XIDPB1', 'XIDPB2',
                            'XIIRPL1', 'XIIRPL2', 'XIIRPL3', 'XIITKJ1', 'XIITKJ2', 'XIITKJ3', 'XIITKJ4', 'XIITKJ5', 'XIITKR1', 'XIITKR2', 'XIITKR3', 'XIITSM1', 'XIITSM2', 'XIITSM3', 'XIIDPB1', 'XIIDPB2',
                        ];
                    @endphp
                    <form action="{{ route('siswa.update', $siswa) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
                                    @error('nis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
                                    @error('nama_siswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        @foreach($kelasOptions as $kelas)
                                            <option value="{{ $kelas }}" {{ old('kelas', $siswa->kelas) == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
