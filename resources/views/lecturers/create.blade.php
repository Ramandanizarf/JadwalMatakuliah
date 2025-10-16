@extends('layouts.app')

@section('content')
<h2>Tambah Dosen Baru</h2>

{{-- PENTING: Tambahkan enctype untuk mengizinkan unggah file --}}
<form method="POST" action="{{ route('lecturers.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nidn" class="form-label">NIDN</label>
        <input name="nidn" id="nidn" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input name="name" id="name" class="form-control" required>
    </div>
    
    {{-- INPUT BARU UNTUK FOTO --}}
    <div class="mb-3">
        <label for="photo" class="form-label">Foto Dosen (Opsional)</label>
        <input name="photo" id="photo" type="file" class="form-control" accept="image/*">
        <small class="form-text text-muted">Format yang didukung: JPG, PNG. Ukuran maks: 2MB.</small>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" id="email" type="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">No. HP</label>
        <input name="phone" id="phone" type="text" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
