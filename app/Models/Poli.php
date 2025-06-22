<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    //Relasi Tabel Poli
    protected $fillable = [
        'nama_poli',
        'keterangan',
    ];

    public function Dokter(){
        return $this->hasMany(Dokter::class, 'id_poli');
    }
}
