@extends('layouts.app')

@section('content')
{{-- Menambahkan kelas pt-4 (Padding Top 4) pada container. Ini akan memberi jarak dari atas ke semua konten di dalamnya, tanpa mengubah ukuran kartu statistik. --}}
<div class="container pt-4">
    <h2 class="mb-4">Selamat Datang, {{ Auth::user()->name }}!</h2>

    {{-- Baris untuk menampilkan kartu-kartu statistik --}}
    <div class="row">
        
        {{-- Kartu Total Dosen --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Dosen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lecturerCount }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- Anda bisa menambahkan ikon Font Awesome di sini jika sudah terpasang --}}
                            {{-- <i class="fas fa-users fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu Total Mata Kuliah --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Mata Kuliah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $courseCount }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-book-open fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu Total Ruangan --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Ruangan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $roomCount }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-door-open fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu Total Jadwal --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Jadwal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $scheduleCount }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-calendar-alt fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Anda bisa menambahkan baris baru untuk grafik atau tabel ringkasan di sini --}}

</div>
@endsection