@extends('layouts.app')

@section('title', 'Data Siswa')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Siswa</h1>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <hr />
       
    {{-- search button --}}
    <form action="{{ route('siswa.search') }}" method="GET">
        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama siswa...">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>  
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>No HP</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa as $siswaItem)
                <tr>
                    <td class="align-middle">{{ $siswaItem->nama }}</td>
                    <td class="align-middle">{{ $siswaItem->kelas }}</td>
                    <td class="align-middle">{{ $siswaItem->no_hp }}</td>
                    <td class="align-middle">{{ $siswaItem->nis }}</td>
                    <td class="align-middle">{{ $siswaItem->nisn }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('siswa.show', $siswaItem->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('siswa.edit', $siswaItem->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('siswa.destroy', $siswaItem->id) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>                             
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">Data siswa tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
