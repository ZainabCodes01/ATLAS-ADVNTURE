<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $fillable = ['id', 'country_id', 'name', 'image'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}

