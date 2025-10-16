@extends('layouts.app')

{{-- CSS KHUSUS UNTUK POP-UP FOTO (Sama seperti di halaman dosen) --}}
@section('styles')
<style>
    /* Kontainer untuk nama dosen, ini yang akan di-hover */
    .lecturer-name {
        cursor: pointer;
        position: relative;
        display: inline-block;
    }

    /* Kontainer untuk pop-up foto */
    .lecturer-name .photo-popup {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        margin-bottom: 10px;
        width: 150px;
        height: 150px;
        padding: 5px;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        z-index: 1000;
        transition: opacity 0.2s ease-in-out;
    }

    /* Style untuk gambar di dalam pop-up */
    .lecturer-name .photo-popup img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
    }

    /* Saat nama dosen di-hover, tampilkan pop-up */
    .lecturer-name:hover .photo-popup {
        visibility: visible;
        opacity: 1;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h2>Daftar Jadwal Kuliah</h2>

    <table class="table table-bordered align-middle mt-3">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Ruangan</th>
                <th>Hari / Jam</th>
                <th>Semester</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $sch)
            <tr>
                <td>{{ $sch->course->name }}</td>
                <td>
                    
                    {{-- Kontainer untuk nama dan pop-up foto tersembunyi --}}
                    <span class="lecturer-name">
                        {{ $sch->lecturer->name }}
                        <div class="photo-popup">
                            <img src="{{ $sch->lecturer->photo_path ? asset('storage/' . $sch->lecturer->photo_path) : 'https://placehold.co/150x150/EFEFEF/AAAAAA&text=No+Photo' }}" alt="Foto {{ $sch->lecturer->name }}">
                        </div>
                    </span>
                </td>
                <td>{{ $sch->room->name }}</td>
                <td>{{ $sch->timeslot->day }} {{ substr($sch->timeslot->start_time,0,5) }} - {{ substr($sch->timeslot->end_time,0,5) }}</td>
                <td>{{ $sch->semester }}</td>
                <td>{{ $sch->class }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada jadwal yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

