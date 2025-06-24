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
        'jadwal_periksa_id',
        'keluhan',
        'no_antrian',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function jadwalPeriksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'jadwal_periksa_id');
    }

    public function periksa(){
        return $this->hasOne(Periksa::class, 'id_daftar_poli');
    }
    //
}
