@extends('layouts.app')

@section('content')
<h2>Daftar Ruangan</h2>

{{-- Tombol tambah hanya untuk admin --}}
@if(in_array(Auth::user()->role, ['admin', 'dosen']))
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">+ Tambah Ruangan</a>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Kapasitas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td>{{ $room->code }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->capacity ?? '-' }}</td>
            <td>
                {{-- Tombol aksi hanya muncul untuk admin --}}
                @if(in_array(Auth::user()->role, ['admin', 'petugas', 'dosen']))
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus ruangan ini?')">Hapus</button>
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

