<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    // Model Dokter
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_hp',
        'id_poli'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    function jadwalPeriksa()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
    }
}