<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   protected $fillable =['id','user_id','place_id','image_path','caption'];
}
