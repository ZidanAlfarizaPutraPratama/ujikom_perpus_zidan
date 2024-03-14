<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required',
            'nis' => 'required',
            'nisn' => 'required|unique:siswa,nisn',
        ]);

        Siswa::create([
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
            'no_hp' => $request->input('no_hp'),
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil disimpan');
    }

    public function show(Siswa $siswa)
    {
        return view('siswa.show', ['siswa' => $siswa]);
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required',
            'nis' => 'required',
        ]);

        $siswa->update([
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
            'no_hp' => $request->input('no_hp'),
            'nis' => $request->input('nis'),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $siswa = Siswa::where('nama', 'like', '%' . $search . '%')->get();
    
        return view('siswa.index', ['siswa' => $siswa, 'search' => $search]);
    }
}    