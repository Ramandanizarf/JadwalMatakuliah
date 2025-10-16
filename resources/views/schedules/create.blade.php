@extends('layouts.app')

@section('content')
<h2>Tambah Jadwal</h2>
<form method="POST" action="{{ route('schedules.store') }}">
    @csrf
    <div class="mb-3">
        <label>Mata Kuliah</label>
        <select name="course_id" class="form-select">
            @foreach($courses as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Dosen</label>
        <select name="lecturer_id" class="form-select">
            @foreach($lecturers as $d)
                <option value="{{ $d->id }}">{{ $d->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Ruangan</label>
        <select name="room_id" class="form-select">
            @foreach($rooms as $r)
                <option value="{{ $r->id }}">{{ $r->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Waktu</label>
        <select name="timeslot_id" class="form-select">
            @foreach($timeslots as $t)
                <option value="{{ $t->id }}">{{ $t->day }} {{ substr($t->start_time,0,5) }} - {{ substr($t->end_time,0,5) }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Semester</label>
        <input name="semester" class="form-control">
    </div>
    <div class="mb-3">
        <label>Kelas</label>
        <input name="class" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
