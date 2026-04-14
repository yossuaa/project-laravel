<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'headline',
        'deskripsi',
        'headline_visi',
        'deskripsi_visi',
        'headline_misi',
        'deskripsi_misi',
        'gambar_profile',
        'gambar_visi',
        'gambar_misi',
    ];
}
