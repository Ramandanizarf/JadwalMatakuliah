@extends('layouts.app')

{{-- CSS KHUSUS UNTUK POP-UP FOTO --}}
@section('styles')
<style>
    /* Kontainer untuk nama dosen, ini yang akan di-hover */
    .lecturer-name {
        cursor: pointer;
        position: relative; /* Kunci agar pop-up bisa diposisikan relatif terhadap elemen ini */
        display: inline-block;
    }

    /* Kontainer untuk pop-up foto */
    .lecturer-name .photo-popup {
        /* Sembunyikan pop-up secara default */
        visibility: hidden;
        opacity: 0;
        
        /* Posisi dan tampilan */
        position: absolute;
        bottom: 100%; /* Posisi di atas nama */
        left: 50%;
        transform: translateX(-50%); /* Pusatkan pop-up */
        margin-bottom: 10px; /* Jarak dari nama */
        
        width: 150px;
        height: 150px;
        padding: 5px;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        z-index: 1000;

        /* Transisi untuk efek muncul yang halus */
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
<h2>Daftar Dosen</h2>

{{-- Tombol "Tambah Dosen" untuk peran yang diizinkan --}}
@if(in_array(Auth::user()->role, ['admin', 'petugas', 'dosen']))
    <a href="{{ route('lecturers.create') }}" class="btn btn-primary mb-3">+ Tambah Dosen</a>
@endif


<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lecturers as $lecturer)
        <tr>
            <td>{{ $lecturer->nidn }}</td>
            <td>
                {{-- Kontainer untuk nama dan pop-up foto tersembunyi --}}
                <span class="lecturer-name">
                    {{ $lecturer->name }}
                    <div class="photo-popup">
                        <img src="{{ $lecturer->photo_path ? asset('storage/' . $lecturer->photo_path) : 'https://placehold.co/150x150/EFEFEF/AAAAAA&text=No+Photo' }}" alt="Foto {{ $lecturer->name }}">
                    </div>
                </span>
            </td>
            <td>{{ $lecturer->email }}</td>
            <td>{{ $lecturer->phone }}</td>
            <td>
                @if(in_array(Auth::user()->role, ['admin', 'petugas', 'dosen']))
                    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('lecturers.destroy', $lecturer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus dosen ini?')">Hapus</button>
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

{{-- Kita tidak memerlukan JavaScript atau elemen pop-up terpisah di sini --}}

