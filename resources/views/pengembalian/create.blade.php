@extends('layouts.app')

@section('title', 'Pengembalian Buku')

@section('contents')
    <div class="container">
        <h1 class="mb-3">Pengembalian Buku</h1>
        <hr />
        <form action="{{ route('pengembalian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_peminjaman" class="form-label">Pilih Peminjaman:</label>
                <select name="id_peminjaman" class="form-control @error('id_peminjaman') is-invalid @enderror" required>
                    <option value="" disabled selected>Select Peminjaman</option>
                    @foreach ($peminjaman as $peminjamanItem)
                        <option value="{{ $peminjamanItem->id }}" {{ old('id_peminjaman') == $peminjamanItem->id ? 'selected' : '' }}>
                            {{ $peminjamanItem->siswa->nama }} - {{ $peminjamanItem->buku->judul }}
                        </option>
                    @endforeach
                </select>
                @error('id_peminjaman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian:</label>
                <input type="date" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" required>
                @error('tanggal_pengembalian')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
            </div>
        </form>
    </div>
@endsection
