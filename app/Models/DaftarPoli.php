<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    use HasFactory;
    // Model Daftar Poli
    protected $fillable = [
        'id_pasien',
        'id_jadwal_periksa',
        'keluhan',
        'no_antrian',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function jadwalPeriksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal_periksa');
    }

    public function periksa(){
        return $this->hasOne(Periksa::class, 'id_daftar_poli');
    }
    //
}
