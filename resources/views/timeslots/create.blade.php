@extends('layouts.app')

@section('content')
<h2>Tambah Slot Waktu</h2>
<form method="POST" action="{{ route('timeslots.store') }}">
    @csrf
    <div class="mb-3">
        <label for="day" class="form-label">Hari</label>
        <input type="text" class="form-control" id="day" name="day" placeholder="Contoh: Senin" required>
    </div>
    <div class="mb-3">
        <label for="start_time" class="form-label">Waktu Mulai</label>
        <input type="time" class="form-control" id="start_time" name="start_time" required>
    </div>
    <div class="mb-3">
        <label for="end_time" class="form-label">Waktu Selesai</label>
        <input type="time" class="form-control" id="end_time" name="end_time" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
