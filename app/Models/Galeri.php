<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $fillable = ['headline', 'quotes', 'gambar'];

    // Relasi ke foto galeri
    public function fotos()
    {
        return $this->hasMany(GaleriFoto::class, 'id_galeri', 'id_galeri');
    }
}
