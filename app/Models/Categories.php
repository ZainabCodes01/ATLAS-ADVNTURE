<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['id','name','description','image'];

    public function places()
{
    return $this->hasMany(Places::class, 'category_id');
}

}
