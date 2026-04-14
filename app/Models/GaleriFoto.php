<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    protected $table = 'galeri_foto';
    protected $primaryKey = 'id_foto';
    protected $fillable = ['id_galeri', 'gambar', 'caption', 'urutan'];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'id_galeri', 'id_galeri');
    }
}
