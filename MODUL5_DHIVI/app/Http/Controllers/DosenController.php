<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    //Tampilkan semua dosen
    public function index()
    {
        $dosen = Dosen::all();
        $nav = 'Koleksi Dosen';
        return view('dosen.index', compact('dosen','nav'));
    }


    //Tampilkan Dosen
    public function show(Dosen $dosen)
    {
        $nav = 'Detail Dosen - ' . $dosen->nama_dosen;
        return view('dosen.show', compact('dosen', 'nav'));
    }


    //Tambah Dosen
    public function create()
    {
        //
        $nav = 'Tambah Dosen';
        return view('dosen.create', compact('nav'));
    }


    //Tambah Dosen
    public function getCreateForm()
    {
        $nav = 'Tambah Dosen';
        return view('dosen.create', compact('nav'));
    }


    //Simpan Dosen
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_dosen' => 'required|string|max:3|unique:dosens,kode_dosen',
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens,nip',
            'email' => 'required|email|unique:dosens,email',
            'no_telepon' => 'nullable|string',
        ]);

        Dosen::create($validatedData);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    // 5. Tampilkan Form Edit Data
    public function edit($id)
{
    $dosen = Dosen::findOrFail($id); // Cari dosen berdasarkan ID
    $nav = 'Edit Dosen - ' . $dosen->nama_dosen;
    return view('dosen.edit', compact('dosen', 'nav'));
}

    // 6. Update Data
    public function update(Request $request, Dosen $dosen)
    {
        $validatedData = $request->validate([
            'kode_dosen' => 'required|max:3|unique:dosens,kode_dosen,' . $dosen->id,
            'nama_dosen' => 'required|max:255',
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'no_telepon' => 'nullable|max:255',
        ]);
        
        $dosen->update($validatedData);
        return redirect()->route('dosen.index')->with('success', 'Data berhasil diperbarui');
    }

    // 7. Hapus Buku
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}
