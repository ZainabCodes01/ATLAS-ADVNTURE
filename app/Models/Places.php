<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'location',
        'thumbnail',
        'country_id',
        'province_id',
        'city_id',
        'town_id',
        'lat',
        'lng',
    ];
}
