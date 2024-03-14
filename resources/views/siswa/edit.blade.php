@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('contents')
    <div class="container">
        <h1 class="mb-3">Edit Siswa</h1>
        <hr />
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menambahkan method PUT untuk update -->

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama', $siswa->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" placeholder="Kelas" value="{{ old('kelas', $siswa->kelas) }}" required>
                @error('kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP:</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Nomor HP" value="{{ old('no_hp', $siswa->no_hp) }}" required>
                @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" placeholder="NIS" value="{{ old('nis', $siswa->nis) }}" required>
                @error('nis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN:</label>
                <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN" value="{{ old('nisn', $siswa->nisn) }}" required>
                @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
