<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:14',
            'email' => 'required|email|max:255|unique:mahasiswas,email',
            'no_hp' => 'required|string|max:20',
        ]);

        Mahasiswa::create($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:14',
            'email' => 'required|email|max:255|unique:mahasiswas,email,' . $mahasiswa->id,
            'no_hp' => 'required|string|max:20',
        ]);

        $mahasiswa->update($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}