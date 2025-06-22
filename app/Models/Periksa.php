<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;
    //Model Periksa
    protected $fillable = [
        'id_daftar_poli',
        'tanggal_periksa',
        'catatan',
        'biaya_periksa',
    ];

    public function daftarPoli(){
        return $this->belongsTo(DaftarPoli::class, 'id_daftar_poli');
    }

    public function detailPeriksa(){
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
}
