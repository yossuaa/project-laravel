<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'nama',
        'nomor_telepon',
        'instansi',
        'jenis_kunjungan',
        'waktu_kunjungan'
    ];
}
