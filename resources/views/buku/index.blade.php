@extends('layouts.app')

@section('title', 'Data Buku')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Buku</h1>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>  
    @endif

    {{-- search button --}}
    <form action="{{ route('buku.search') }}" method="GET">
        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari judul buku...">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    
    
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Judul</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Pengarang</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buku as $bukuItem)
                <tr>    
                    <td class="align-middle">{{ $bukuItem->judul }}</td>
                    <td class="align-middle">{{ $bukuItem->tahun_terbit }}</td>
                    <td class="align-middle">{{ $bukuItem->stok }}</td>
                    <td class="align-middle">{{ $bukuItem->pengarang }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('buku.show', $bukuItem->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('buku.edit', $bukuItem->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('buku.destroy', $bukuItem->id) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>                           
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">Data buku tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
