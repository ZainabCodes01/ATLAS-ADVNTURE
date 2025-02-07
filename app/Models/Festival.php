<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = [
        'place_id',
        'name',
        'description',
        'image',
        'start_date',
        'end_date',
        'time',
    ];

    // Relationship with Place Model
    public function place()
    {
        return $this->belongsTo(Places::class);
    }
}
