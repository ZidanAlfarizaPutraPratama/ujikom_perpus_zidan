@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('contents')
    <div class="container">
        <h1 class="mb-3">Detail Siswa</h1>
        <hr />
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <p>{{ $siswa->nama }}</p>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas:</label>
            <p>{{ $siswa->kelas }}</p>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP:</label>
            <p>{{ $siswa->no_hp }}</p>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS:</label>
            <p>{{ $siswa->nis }}</p>
        </div>
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN:</label>
            <p>{{ $siswa->nisn }}</p>
        </div>
        <div class="mb-3">
            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
