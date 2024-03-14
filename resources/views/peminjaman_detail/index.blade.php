<!-- resources/views/peminjaman/index.blade.php -->

@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Peminjaman</h1>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- search button -- --}}
    <form action="{{ route('peminjaman.search') }}" method="GET">
        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari list peminjaman...">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Siswa</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman as $peminjamanItem)
                <tr>
                    <td class="align-middle">{{ $peminjamanItem->siswa->nama ?? 'Unknown Siswa' }}</td>
                    <td class="align-middle">
                        {{ $peminjamanItem->buku ? $peminjamanItem->buku->judul : 'Unknown Buku' }}
                    </td>
                    <td class="align-middle">{{ $peminjamanItem->tanggal_peminjaman }}</td>
                    <td class="align-middle">{{ $peminjamanItem->tanggal_pengembalian }}</td>
                    <td class="align-middle">
                        <div class="btn-group">
                            <form action="{{ route('peminjaman.destroy', $peminjamanItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">Data peminjaman tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
