@extends('layouts.app')

@section('content')
<h2>Edit Ruangan</h2>
<form method="POST" action="{{ route('rooms.update', $room->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="code" class="form-label">Kode Ruangan</label>
        <input type="text" class="form-control" id="code" name="code" value="{{ $room->code }}" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Ruangan</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}" required>
    </div>
    <div class="mb-3">
        <label for="capacity" class="form-label">Kapasitas (opsional)</label>
        <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $room->capacity }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
