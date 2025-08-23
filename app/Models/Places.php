<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $fillable =[
        'id',
        'name',
        'description',
        'location',
        'thumbnail',
        'lat',
        'lng',
        'category_id',
        'country_id',
        'province_id',
        'city_id',
        'town_id',
        'external_url'
    ];
    public function images()
    {
        return $this->hasMany(PlaceImage::class, 'place_id');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function town()
    {
        return $this->belongsTo(Town::class, 'town_id');
    }

    public function galleries()
    {
      return $this->hasMany(Gallery::class, 'place_id');
    }

    public function ratings()
    {
     return $this->hasMany(Rate::class, 'place_id');
    }
    public function favoritedByUsers()
{
    return $this->hasMany(Favorite::class);
}

    protected static function booted()
    {
        // New record
        static::creating(function ($place) {
            $place->slug = static::makeUniqueSlug($place->name);
        });

        // Update par sirf jab name badle
        static::updating(function ($place) {
            if ($place->isDirty('name')) {
                $place->slug = static::makeUniqueSlug($place->name, $place->id);
            }
        });
    }

    protected static function makeUniqueSlug($name, $ignoreId = null)
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 2;

        $query = static::query();
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        while ($query->clone()->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }
        return $slug;
    }
    public function getRouteKeyName()
{
    return 'slug';
}










}
