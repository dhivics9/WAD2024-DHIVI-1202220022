<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    // protected $primaryKey = 'id';

    protected $fillable = ['nim', 'nama_mahasiswa', 'email', 'jurusan', 'dosen_id'];

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
