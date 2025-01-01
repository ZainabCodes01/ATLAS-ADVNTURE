<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place_Images extends Model
{
    protected $fillable = [
        'place_id',
        'image_path',
        'caption',
    ];
}
