@extends('layouts.app')

@section('content')
<h2>Daftar Jadwal</h2>

{{-- Tombol tambah hanya untuk admin --}}
@if(in_array(Auth::user()->role, ['admin', 'dosen']))
    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruangan</th>
            <th>Hari / Jam</th>
            <th>Semester</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schedules as $sch)
        <tr>
            <td>{{ $sch->course->name }}</td>
            <td>{{ $sch->lecturer->name }}</td>
            <td>{{ $sch->room->name }}</td>
            <td>{{ $sch->timeslot->day }} {{ substr($sch->timeslot->start_time,0,5) }} - {{ substr($sch->timeslot->end_time,0,5) }}</td>
            <td>{{ $sch->semester }}</td>
            <td>{{ $sch->class }}</td>
            <td>
                {{-- Tombol aksi hanya muncul untuk admin --}}
                @if(in_array(Auth::user()->role, ['admin', 'petugas', 'dosen']))
                    <a href="{{ route('schedules.edit',$sch->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('schedules.destroy',$sch->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus jadwal ini?')">Hapus</button>
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
