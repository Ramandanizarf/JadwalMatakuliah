@extends('layouts.app')

@section('content')
<div class="container">
     {{-- Ganti judul menjadi Edit Jadwal --}}
     <h2>Edit Jadwal: {{ $schedule->course->name ?? 'Jadwal' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Aksi: Mengarah ke route update dengan ID jadwal --}}
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        {{-- WAJIB: Gunakan method PUT/PATCH untuk update --}}
        @method('PUT') 
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="course_id" class="form-label">Mata Kuliah</label>
                <select name="course_id" id="course_id" class="form-select" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($courses as $course)
                        {{-- Logika: Cek apakah ID Mata Kuliah saat ini sama dengan ID jadwal yang diedit --}}
                        <option value="{{ $course->id }}" 
                            {{ old('course_id', $schedule->course_id) == $course->id ? 'selected' : '' }}>
                            {{ $course->name }} ({{ $course->code }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lecturer_id" class="form-label">Dosen</label>
                <select name="lecturer_id" id="lecturer_id" class="form-select" required>
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($lecturers as $lecturer)
                        {{-- Logika: Cek apakah ID Dosen saat ini sama dengan ID jadwal yang diedit --}}
                        <option value="{{ $lecturer->id }}"
                            {{ old('lecturer_id', $schedule->lecturer_id) == $lecturer->id ? 'selected' : '' }}>
                            {{ $lecturer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="room_id" class="form-label">Ruangan</label>
                <select name="room_id" id="room_id" class="form-select" required>
                    <option value="">-- Pilih Ruangan --</option>
                    @foreach($rooms as $room)
                        {{-- Logika: Cek apakah ID Ruangan saat ini sama dengan ID jadwal yang diedit --}}
                        <option value="{{ $room->id }}"
                            {{ old('room_id', $schedule->room_id) == $room->id ? 'selected' : '' }}>
                            {{ $room->name }} ({{ $room->code }})
                        </option>
                    @endforeach
                </select>
            </div>
        <div class="col-md-6 mb-3">
            <label for="timeslot_id" class="form-label">Waktu</label>
            <select name="timeslot_id" id="timeslot_id" class="form-select" required>
<option value="">-- Pilih Waktu --</option>
@foreach($timeslots as $timeslot)
                        {{-- Logika: Cek apakah ID Waktu saat ini sama dengan ID jadwal yang diedit --}}
<option value="{{ $timeslot->id }}"
                            {{ old('timeslot_id', $schedule->timeslot_id) == $timeslot->id ? 'selected' : '' }}>
                            {{ $timeslot->day }}, {{ substr($timeslot->start_time, 0, 5) }} - {{ substr($timeslot->end_time, 0, 5) }}
                        </option>
@endforeach
</select>
</div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
<label for="semester" class="form-label">Semester</label>
                {{-- Mengisi input text dengan data yang sudah ada --}}
<input type="text" name="semester" id="semester" class="form-control" 
                       value="{{ old('semester', $schedule->semester) }}">
</div>
<div class="col-md-6 mb-3">
<label for="class" class="form-label">Kelas</label>
                {{-- Mengisi input text dengan data yang sudah ada --}}
<input type="text" name="class" id="class" class="form-control"
                       value="{{ old('class', $schedule->class) }}">
</div>
</div>

<button type="submit" class="btn btn-primary">Update Jadwal</button>
<a href="{{ route('schedules.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div>
@endsection