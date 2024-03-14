<!-- resources/views/pengembalian/index.blade.php -->

@extends('layouts.app')

@section('title', 'Data Pengembalian')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Pengembalian</h1>
        <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">Tambah Pengembalian</a>
    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- search button --}}
    <form action="{{ route('pengembalian.search') }}" method="GET">
        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari list pengembalian...">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Siswa</th>
                <th>Buku</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengembalian as $pengembalianItem)
                <tr>
                    <td class="align-middle">{{ $pengembalianItem->peminjaman->siswa->nama }}</td>
                    <td class="align-middle">{{ $pengembalianItem->peminjaman->buku->judul }}</td>
                    <td class="align-middle">{{ $pengembalianItem->tanggal_pengembalian }}</td>
                    <td class="align-middle">{{ $pengembalianItem->status }}</td>
                    <td class="align-middle">
                        <!-- Delete button -->
                        <form action="{{ route('pengembalian.destroy', $pengembalianItem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="4">Data pengembalian tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
