<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Buku;


class PeminjamanController extends Controller
{
    public function index()
    {
        // Redirect from index to create
        return redirect()->route('peminjaman.create');
    }

    public function show()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman_detail.index', ['peminjaman' => $peminjaman]);
    }

    public function create()
    {
        $siswa = Siswa::all();
        $buku = Buku::all();
        return view('peminjaman.create', ['siswa' => $siswa, 'buku' => $buku]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_buku' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
        ]);
    
        Peminjaman::create([
            'id_siswa' => $request->input('id_siswa'),
            'id_buku' => $request->input('id_buku'),
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
        ]);
    
        return redirect()->route('peminjaman.show')->with('success', 'Peminjaman berhasil disimpan');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        $peminjaman = Peminjaman::whereHas('buku', function ($query) use ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        })->get();

        return view('peminjaman_detail.index', ['peminjaman' => $peminjaman, 'search' => $search]);
    }
    
    public function destroy($id)
{
    $peminjaman = Peminjaman::find($id);

    if (!$peminjaman) {
        return redirect()->route('peminjaman.show')->with('error', 'Peminjaman tidak ditemukan');
    }

    $peminjaman->delete();

    return redirect()->route('peminjaman.show')->with('success', 'Peminjaman berhasil dihapus');
}
}