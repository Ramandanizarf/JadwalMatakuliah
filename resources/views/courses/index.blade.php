@extends('layouts.app')

@section('content')
<h2>Daftar Mata Kuliah</h2>

{{-- Tombol tambah hanya untuk admin --}}
@if(in_array(Auth::user()->role, ['admin', 'dosen']))
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">+ Tambah Mata Kuliah</a>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->code }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->credits }}</td>
            <td>{{ $course->program->name }}</td>
            <td>
                {{-- tombol edit & hapus hanya untuk admin --}}
                @if(in_array(Auth::user()->role, ['admin', 'petugas', 'dosen']))
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                @else
                    <span class="text-muted">Tidak ada aksi</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
