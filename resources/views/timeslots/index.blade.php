@extends('layouts.app')

@section('content')
<h2>Daftar Slot Waktu</h2>

{{-- Tombol tambah hanya untuk admin --}}
@if(in_array(Auth::user()->role, ['admin', 'dosen']))
    <a href="{{ route('timeslots.create') }}" class="btn btn-primary mb-3">+ Tambah Slot Waktu</a>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Hari</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($timeslots as $slot)
        <tr>
            <td>{{ $slot->day }}</td>
            <td>{{ substr($slot->start_time, 0, 5) }}</td>
            <td>{{ substr($slot->end_time, 0, 5) }}</td>
            <td>
                {{-- Tombol aksi hanya muncul untuk admin --}}
                @if(in_array(Auth::user()->role, ['admin', 'petugas', 'dosen']))
                    <a href="{{ route('timeslots.edit', $slot->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('timeslots.destroy', $slot->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus slot waktu ini?')">Hapus</button>
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
