<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageFeature extends Model
{
    protected $table = 'homepage_features';
    protected $primaryKey = 'id_feature';
    public $timestamps = true;

    protected $fillable = [
        'nama_fitur',
        'gambar',
        'link_tujuan',
        'keterangan',
    ];
}
