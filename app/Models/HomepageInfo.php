<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageInfo extends Model
{
    protected $table = 'homepage_info';
    protected $primaryKey = 'id_homepage';
    public $timestamps = true;

    protected $fillable = [
        'headline',
        'subheadline',
        'background_image',
    ];
}
