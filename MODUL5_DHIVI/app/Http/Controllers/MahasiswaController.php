<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    //Tampilkan semua mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $nav = 'Koleksi Mahasiswa';
        return view('mahasiswa.index', compact('mahasiswa','nav'));
    }


    //Tampilkan mahasiswa
    public function show(Mahasiswa $mahasiswa)
    {
        $nav = 'Detail Mahasiswa - ' . $mahasiswa->nama_mahasiswa;
        return view('mahasiswa.show', compact('mahasiswa', 'nav'));
    }


    //Tambah Dosen
    public function create()
    {
        //
        $nav = 'Tambah Mahasiswa';
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('nav', 'dosens'));
    }


    //Tambah Dosen
    public function getCreateForm()
    {
        $nav = 'Tambah Mahasiswa';
        return view('mahasiswa.create', compact('nav'));
    }


    //Simpan Dosen
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_mahasiswa' => 'required|max:255',
            'email' => 'required|email|unique:mahasiswas',
            'jurusan' => 'required|max:255',
            'dosen_id' => 'required|exists:dosens,id',
        ]
        );

        Mahasiswa::create($validatedData);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    // 5. Tampilkan Form Edit Data
    public function edit($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id); // Cari Mahasiswa berdasarkan ID
    $dosens = Dosen::all();
    $nav = 'Edit Mahasiswa - ' . $mahasiswa->nama_mahasiswa;
    return view('mahasiswa.edit', compact('mahasiswa', 'nav', 'dosens'));
    
}

    // 6. Update Data
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_mahasiswa' => 'required|max:255',
            'email' => 'required|email|unique:mahasiswas',
            'jurusan' => 'required|max:255',
            'dosen_id' => 'required|exists:dosens,id',
        ]
        );
        
        $mahasiswa->update($validatedData);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui');
    }

    // 7. Hapus Buku
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
