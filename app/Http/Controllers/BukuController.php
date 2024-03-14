<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Log;



class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', ['buku' => $buku]);
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer',
            'pengarang' => 'required',
        ]);

        Buku::create([
            'judul' => $request->input('judul'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'stok' => $request->input('stok'),
            'pengarang' => $request->input('pengarang'),
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil disimpan');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', ['buku' => $buku]);
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', ['buku' => $buku]);
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer',
            'pengarang' => 'required',
        ]);

        $buku->update([
            'judul' => $request->input('judul'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'stok' => $request->input('stok'),
            'pengarang' => $request->input('pengarang'),
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'buku berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');


        $buku = Buku::where('judul', 'like', '%' . $search . '%')->get();

        return view('buku.index', ['buku' => $buku, 'search' => $search]);
    }
}