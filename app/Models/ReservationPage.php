<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationPage extends Model
{
    protected $fillable = [
        'headline',
        'subheadline',
        'headline_form',
        'subheadline_form',
        'background',
        'mockup'
    ];
}
