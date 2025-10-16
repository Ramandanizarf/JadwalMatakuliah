@extends('layouts.app')

@section('content')
<h2>Edit Data Dosen</h2>

{{-- PENTING: Tambahkan enctype untuk mengizinkan unggah file --}}
<form method="POST" action="{{ route('lecturers.update', $lecturer->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Method untuk update --}}
    
    <div class="mb-3">
        <label for="nidn" class="form-label">NIDN</label>
        <input name="nidn" id="nidn" class="form-control" value="{{ $lecturer->nidn }}" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input name="name" id="name" class="form-control" value="{{ $lecturer->name }}" required>
    </div>
    
    {{-- INPUT UNTUK FOTO --}}
    <div class="mb-3">
        <label for="photo" class="form-label">Ganti Foto Dosen (Opsional)</label>
        <input name="photo" id="photo" type="file" class="form-control" accept="image/*">
        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
    </div>

    {{-- Tampilkan foto yang ada saat ini --}}
    @if ($lecturer->photo_path)
        <div class="mb-3">
            <label>Foto Saat Ini:</label><br>
            <img src="{{ asset('storage/' . $lecturer->photo_path) }}" alt="Foto {{ $lecturer->name }}" style="width: 150px; height: auto; border-radius: 8px;">
        </div>
    @endif

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" id="email" type="email" class="form-control" value="{{ $lecturer->email }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">No. HP</label>
        <input name="phone" id="phone" type="text" class="form-control" value="{{ $lecturer->phone }}">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
