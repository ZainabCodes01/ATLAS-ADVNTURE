<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
      protected $fillable = ['id','city_id','name','image'];

      public function city()
{
    return $this->belongsTo(City::class, 'city_id');
}
}
