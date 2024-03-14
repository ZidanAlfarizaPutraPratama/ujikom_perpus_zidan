@extends('layouts.app')

@section('title', 'Detail Buku')

@section('contents')
    <div class="container">
        <h1 class="mb-3">Detail Buku</h1>
        <hr />
        <div class="mb-3">
            <label for="judul" class="form-label">Judul:</label>
            <p>{{ $buku->judul }}</p>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
            <p>{{ $buku->tahun_terbit }}</p>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <p>{{ $buku->stok }}</p>
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang:</label>
            <p>{{ $buku->pengarang }}</p>
        </div>
        <div class="mb-3">
            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
