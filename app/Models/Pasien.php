<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    //Relasi Tabel Pasien
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',
    ];

    public function daftarPoli(){
        return $this->hasMany(DaftarPoli::class, 'id_pasien');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
