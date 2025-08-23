<?php

namespace App\Models;
use Illuminate\Support\Str;
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
protected static function boot()
    {
        parent::boot();

        static::creating(function ($country) {
            $country->slug = Str::slug($country->name);
        });

        static::updating(function ($country) {
            $country->slug = Str::slug($country->name);
        });
    }


}
