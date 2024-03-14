<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        // Redirect from index to create
        return redirect()->route('pengembalian.create');
    }

    public function show()
    {
        $pengembalian = Pengembalian::all();
        return view('pengembalian_detail.index', ['pengembalian' => $pengembalian]);
    }

    public function create()
    {
        // Get all peminjaman records
        $peminjaman = Peminjaman::all();
    
        // Get the IDs of peminjaman records that have been returned
        $returnedPeminjamanIds = Pengembalian::pluck('id_peminjaman')->toArray();
    
        // Filter peminjaman records to exclude those that have been returned
        $peminjaman = $peminjaman->reject(function ($peminjamanItem) use ($returnedPeminjamanIds) {
            return in_array($peminjamanItem->id, $returnedPeminjamanIds);
        });
    
        return view('pengembalian.create', [
            'peminjaman' => $peminjaman,
        ]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
        ]);

        Pengembalian::create([
            'id_peminjaman' => $request->input('id_peminjaman'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
        ]);

        return redirect()->route('pengembalian.show')->with('success', 'Pengembalian berhasil disimpan')->with('removePeminjamanData', true);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $pengembalian = Pengembalian::whereHas('peminjaman.buku', function ($query) use ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        })->get();

        return view('pengembalian_detail.index', ['pengembalian' => $pengembalian, 'search' => $search]);
    }
    
    public function destroy($id)
    {
        $pengembalian = Pengembalian::find($id);
    
        if (!$pengembalian) {
            return redirect()->route('pengembalian.show')->with('error', 'Pengembalian tidak ditemukan');
        }
    
        // Store the ID of the related peminjaman record before deleting the pengembalian record
        $idPeminjaman = $pengembalian->id_peminjaman;
    
        // Delete the pengembalian record
        $pengembalian->delete();
    
        // Optionally, you can also delete the related peminjaman record if needed
        // Peminjaman::find($idPeminjaman)->delete();
    
        return redirect()->route('pengembalian.show')->with('success', 'Pengembalian berhasil dihapus')->with('removePeminjamanData', true);
    }
}    