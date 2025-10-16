@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kelola Pengguna</h2>

    {{-- Tombol "Tambah User" dikembalikan ke posisi semula --}}
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge bg-secondary">{{ $user->role }}</span></td>
                        <td>
                            @if(Auth::id() !== $user->id)
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus user ini?')">Hapus</button>
                                </form>
                            @else
                                <span class="text-muted">Tidak ada aksi</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pengguna yang terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
