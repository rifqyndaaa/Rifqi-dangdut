<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <div class="card-header bg-primary text-white text-center mb-4">
            <h2 class="mb-0"><i class="bi bi-person-badge me-2"></i>Data Pegawai</h2>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-person me-2"></i>Nama:</strong> {{ $name ?? 'Tidak tersedia' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-calendar-heart me-2"></i>Umur:</strong> {{ $my_age ?? 0 }} tahun</span>
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-heart me-2"></i>Hobi:</strong>
                    <ul class="mt-2 mb-0 ps-3">
                        @forelse($hobbies ?? [] as $hobi)
                            <li>{{ $hobi }}</li>
                        @empty
                            <li>Tidak ada hobi tercatat.</li>
                        @endforelse
                    </ul>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-calendar-check me-2"></i>Tanggal Harus Wisuda:</strong>
                        {{ $tgl_harus_wisuda?->format('d F Y') ?? 'Tidak tersedia' }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-clock me-2"></i>Sisa Hari Menuju Wisuda:</strong></span>
                    <span class="badge @if(($time_to_study_left ?? 0) < 0) bg-danger @else bg-success @endif">
                        {{ abs($time_to_study_left ?? 0) }} hari
                        @if(($time_to_study_left ?? 0) < 0)
                            (Terlambat!)
                        @else
                            (Masih Ada Waktu)
                        @endif
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-book me-2"></i>Semester Saat Ini:</strong> {{ $current_semester ?? 0 }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-info-circle me-2"></i>Info:</strong></span>
                    <span class="text-danger fw-bold">{{ $info ?? '' }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-star me-2"></i>Cita-cita:</strong> {{ $future_goal ?? '' }}</span>
                </li>
            </ul>

            <div class="mt-4 text-center">
                <a href="{{ route('pegawai.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Pegawai Baru
                </a>
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary ms-2">
                    <i class="bi bi-arrow-left-circle me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
