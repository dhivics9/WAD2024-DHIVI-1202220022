<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Dosen;

abstract class Controller
{
    public function dashboard()
{
    $mahasiswaCount = Mahasiswa::count();
    $dosenCount = Dosen::count();

    return view('dashboard', compact('mahasiswaCount', 'dosenCount'));
}
}
