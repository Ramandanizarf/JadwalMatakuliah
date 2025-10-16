@extends('layouts.app')

@section('content')
<h2>Edit Mata Kuliah</h2>
<form method="POST" action="{{ route('courses.update', $course->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Kode</label>
        <input name="code" class="form-control" value="{{ $course->code }}" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input name="name" class="form-control" value="{{ $course->name }}" required>
    </div>
    <div class="mb-3">
        <label>SKS</label>
        <input name="credits" type="number" class="form-control" value="{{ $course->credits }}" required>
    </div>
    <div class="mb-3">
        <label>Program Studi</label>
        <select name="program_id" class="form-select" required>
            @foreach($programs as $p)
                <option value="{{ $p->id }}" @if($course->program_id==$p->id) selected @endif>
                    {{ $p->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
