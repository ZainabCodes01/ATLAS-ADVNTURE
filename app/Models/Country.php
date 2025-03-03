<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'image',
        'flag',
    ];
    public function places()
{
    return $this->hasMany(Places::class, 'country_id');
}



}
