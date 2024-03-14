@extends('layouts.app')

@section('title', 'Peminjaman Buku')

@section('contents')
    <div class="container">
        <h1 class="mb-3">Peminjaman Buku</h1>
        <hr />
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_siswa" class="form-label">Pilih Siswa:</label>
                <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror" required>
                    <option value="id_siswa" disabled selected>Select Siswa</option>
                    @foreach ($siswa as $siswaItem)
                        <option value="{{ $siswaItem->id }}" {{ old('id_siswa') == $siswaItem->id ? 'selected' : '' }}>
                            {{ $siswaItem->nama }}
                        </option>
                    @endforeach
                </select>
                @error('id_siswa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">Pilih Buku:</label>
                <select name="id_buku" class="form-control @error('id_buku') is-invalid @enderror" required>
                    <option value="" disabled selected>Select Buku</option>
                    @foreach ($buku as $bukuItem)
                        <option value="{{ $bukuItem->id }}" {{ old('id_buku') == $bukuItem->id ? 'selected' : '' }}>
                            {{ $bukuItem->judul }} - {{ $bukuItem->pengarang }}
                        </option>
                    @endforeach
                </select>
                @error('id_buku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- ... (sisanya tetap seperti yang ada) ... -->
            <div class="mb-3">
                <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman:</label>
                <input type="date" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" required>
                @error('tanggal_peminjaman')
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
                <button type="submit" class="btn btn-primary">Pinjam Buku</button>
            </div>
        </form>
    </div>
@endsection
