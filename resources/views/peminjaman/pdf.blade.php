<!-- resources/views/peminjaman/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
</head>
<body>

    <h1>List Peminjaman</h1>

    <table border="1">
        <thead>
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
                    <td>{{ $peminjamanItem->siswa->nama ?? 'Unknown Siswa' }}</td>
                    <td>{{ $peminjamanItem->buku ? $peminjamanItem->buku->judul : 'Unknown Buku' }}</td>
                    <td>{{ $peminjamanItem->tanggal_peminjaman }}</td>
                    <td>{{ $peminjamanItem->tanggal_pengembalian }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data peminjaman tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
