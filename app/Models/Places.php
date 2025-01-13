<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $fillable=[
        'name',
        'description',
        'location',
        'thumbnail',
        'lat',
        'lng',
        'categories_id',
        'country_id',
        'province_id',
        'city_id',
        'town_id',
    ];
}
