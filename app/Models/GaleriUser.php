<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriUser extends Model
{
    protected $table = 'galeri_user';
    protected $primaryKey = 'id_galeriuser';
    protected $fillable = ['headline', 'deskripsi', 'gambar', 'elemen'];
}
