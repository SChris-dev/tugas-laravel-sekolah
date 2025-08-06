<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'pelajaran',
        'nama_guru',
        'kelas',
        'hari',
        'jam_awal',
        'jam_akhir'
    ];
}
