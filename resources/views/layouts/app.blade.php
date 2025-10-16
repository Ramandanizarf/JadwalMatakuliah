<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Penjadwalan</title>
    
    {{-- Mengganti CSS dengan tema "Darkly" dari Bootswatch --}}
    <link href="https://bootswatch.com/5/zephyr/bootstrap.min.css" rel="stylesheet">

    @yield('styles')
</head>
<body>

{{-- Menggunakan navbar dengan kelas bg-primary dan data-bs-theme="dark" --}}
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Penjadwalan Mata Kuliah</a>
        <div>
            <ul class="navbar-nav ms-auto">
                @auth
                    @if(in_array(Auth::user()->role, ['admin', 'petugas', 'dosen']))
                        {{-- Menu untuk admin, petugas, dan dosen --}}
                        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Mata Kuliah</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('lecturers.index') }}">Dosen</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('rooms.index') }}">Ruangan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('timeslots.index') }}">Slot Waktu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('schedules.index') }}">Jadwal</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Kelola User</a></li>
                    @else
                        {{-- Menu untuk user biasa --}}
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Lihat Jadwal</a></li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container pt-5">
    @yield('content')
</div>



@stack('scripts')

</body>
</html>

