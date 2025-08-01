<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $table = 'cartas';

    protected $fillable = [
        'name',
        'type',
        'race',
        'desc',
        'atk',
        'def',
        'level',
        'attribute',
        'image_url',
        'url',
    ];
}
