<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceImage extends Model
{
    protected $fillable = ['id','place_id','image_path','caption'];

    public function place()
    {
        return $this->belongsTo(Places::class, 'place_id');
    }
}
