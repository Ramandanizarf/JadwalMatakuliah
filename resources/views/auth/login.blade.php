@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            {{-- Tambahkan kelas mt-5 (Margin Top 5) di sini untuk memberi jarak dari atas --}}
            <div class="text-center mb-4 mt-5">
                <h2 class="fw-bold text-primary">Selamat Datang!</h2>
                <p class="text-muted">Silakan login untuk mengakses Aplikasi Penjadwalan Mata Kuliah.</p>
            </div>
            

            <div class="card">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input id="email" type="email" class="form-control" name="email" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Login
                            </button>
                        </div>
                        <p class="text-center mt-3">
                            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection