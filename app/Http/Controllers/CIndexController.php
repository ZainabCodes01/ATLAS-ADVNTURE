<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Places;
use Illuminate\Http\Request;

class CIndexController extends Controller{
    public function getPlacesByCategory($category_id)
    {
        $places = Places::where('category_id', $category_id)
                       ->with('images')
                       ->get();

        return response()->json($places);
    }
}




