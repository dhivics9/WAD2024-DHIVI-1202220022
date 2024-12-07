<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{

    protected $table = 'dosens';
    // protected $primaryKey = 'id';

    protected $fillable = ['kode_dosen', 'nama_dosen', 'nip', 'email', 'no_telepon'];
    public function Mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
