@extends('layouts.app')
  
@section('title', 'Tambah Buku')
  
@section('contents')
    <div class="container">
        <h1 class="mb-3">Tambah Buku</h1>
        <hr />
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                <input type="text" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" placeholder="Tahun Terbit" value="{{ old('tahun_terbit') }}" required>
                @error('tahun_terbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok" value="{{ old('stok') }}" required>
                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang:</label>
                <input type="text" name="pengarang" class="form-control @error('pengarang') is-invalid @enderror" placeholder="Pengarang" value="{{ old('pengarang') }}" required>
                @error('pengarang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
