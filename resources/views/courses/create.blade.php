@extends('layouts.app')

@section('content')
<h2>Tambah Mata Kuliah</h2>
<form method="POST" action="{{ route('courses.store') }}">
    @csrf
    <div class="mb-3">
        <label>Kode</label>
        <input name="code" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>SKS</label>
        <input name="credits" type="number" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Program Studi</label>
        <select name="program_id" class="form-select" required>
            <option value="">-- Pilih Program --</option>
            @foreach($programs as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
