@extends('layouts.app')

@section('content')
<h2>Tambah Ruangan</h2>
<form method="POST" action="{{ route('rooms.store') }}">
    @csrf
    <div class="mb-3">
        <label for="code" class="form-label">Kode Ruangan</label>
        <input type="text" class="form-control" id="code" name="code" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Ruangan</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="capacity" class="form-label">Kapasitas (opsional)</label>
        <input type="number" class="form-control" id="capacity" name="capacity">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
