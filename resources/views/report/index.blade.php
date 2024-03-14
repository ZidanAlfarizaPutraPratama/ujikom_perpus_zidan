<!-- resources/views/report/index.blade.php -->

@extends('layouts.app')

@section('title', 'Report Peminjaman')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Report Peminjaman</h1>
    </div>
    <hr />

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Siswa</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
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
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="4">Data peminjaman tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
