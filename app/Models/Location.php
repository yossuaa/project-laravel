<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'headline',
        'maps',
        'alamat',
        'open',
        'instagram',
        'subheadline',
        'deskripsi',
        'foto',
        'elemen'
    ];
}
