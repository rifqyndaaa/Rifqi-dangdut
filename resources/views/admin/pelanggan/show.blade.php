@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                <li class="breadcrumb-item active" aria-current="Detail Pelanggan">Detail Pelanggan</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Detail Pelanggan</h1>
                <p class="mb-0">Data lengkap pelanggan dan file pendukung.</p>
            </div>
            <div>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <!-- Data Pelanggan -->
                        <div class="col-md-6">
                            <h5 class="mb-3">Data Pribadi</h5>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="30%">First Name</th>
                                    <td>{{ $dataPelanggan->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ $dataPelanggan->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Birthday</th>
                                    <td>{{ $dataPelanggan->birthday ? \Carbon\Carbon::parse($dataPelanggan->birthday)->format('d/m/Y') : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        @if($dataPelanggan->gender == 'Male')
                                            <span class="badge bg-primary">Laki-laki</span>
                                        @elseif($dataPelanggan->gender == 'Female')
                                            <span class="badge bg-success">Perempuan</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $dataPelanggan->gender }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $dataPelanggan->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $dataPelanggan->phone }}</td>
                                </tr>
                            </table>

                            <div class="mt-4">
                                <a href="{{ route('pelanggan.edit', $dataPelanggan->pelanggan_id) }}" class="btn btn-primary me-2">
                                    <i class="fas fa-edit me-1"></i> Edit Data
                                </a>
                            </div>
                        </div>

                        <!-- File Upload Section -->
                        <div class="col-md-6">
                            <h5 class="mb-3">File Pendukung</h5>
                            
                            <!-- Form Upload File -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form action="{{ route('multipleupload.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="ref_table" value="pelanggan">
                                        <input type="hidden" name="ref_id" value="{{ $dataPelanggan->pelanggan_id }}">
                                        
                                        <div class="mb-3">
                                            <label for="files" class="form-label">Upload File Pendukung</label>
                                            <input type="file" class="form-control @error('files.*') is-invalid @enderror" 
                                                   id="files" name="files[]" multiple required>
                                            @error('files.*')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">
                                                Format yang didukung: JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX. Maksimal 2MB per file.
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-upload me-1"></i> Upload File
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Daftar File -->
                            <h6>Daftar File Terupload</h6>
                            @if($files->count() > 0)
                                <div class="row">
                                    @foreach($files as $file)
                                        <div class="col-md-6 mb-3">
                                            <div class="card file-card">
                                                <div class="card-body text-center">
                                                    @php
                                                        $extension = strtolower(pathinfo($file->original_name, PATHINFO_EXTENSION));
                                                        $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
                                                    @endphp
                                                    
                                                    @if($isImage)
                                                        <img src="{{ asset('storage/' . $file->file_path) }}" 
                                                             alt="{{ $file->original_name }}" 
                                                             class="img-thumbnail mb-2" 
                                                             style="max-height: 100px; object-fit: cover;">
                                                    @else
                                                        <div class="file-icon mb-2">
                                                            @if($extension == 'pdf')
                                                                <i class="fas fa-file-pdf fa-2x text-danger"></i>
                                                            @elseif(in_array($extension, ['doc', 'docx']))
                                                                <i class="fas fa-file-word fa-2x text-primary"></i>
                                                            @elseif(in_array($extension, ['xls', 'xlsx']))
                                                                <i class="fas fa-file-excel fa-2x text-success"></i>
                                                            @else
                                                                <i class="fas fa-file fa-2x text-secondary"></i>
                                                            @endif
                                                        </div>
                                                    @endif
                                                    
                                                    <p class="small text-truncate mb-1" title="{{ $file->original_name }}">
                                                        {{ $file->original_name }}
                                                    </p>
                                                    
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="{{ asset('storage/' . $file->file_path) }}" 
                                                           target="_blank" 
                                                           class="btn btn-outline-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ asset('storage/' . $file->file_path) }}" 
                                                           download="{{ $file->original_name }}"
                                                           class="btn btn-outline-success">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                        <form action="{{ route('multipleupload.destroy', $file->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger" 
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>Belum ada file pendukung.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .file-card {
            transition: transform 0.2s;
        }
        .file-card:hover {
            transform: translateY(-2px);
        }
        .file-icon {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection