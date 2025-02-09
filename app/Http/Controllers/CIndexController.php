<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Places;
use Illuminate\Http\Request;

class CIndexController extends Controller
{
    public function cindex(){
        return view('cindex');
    }
    public function getPlacesByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $places = Places::where('category_id', $categoryId)->get();
        return response()->json($places);
    }
    public function showPlaces($categoryId)
    {
        $category = Categories::findOrFail($categoryId);
        $places = Places::where('category_id', $categoryId)->get();

        return view('pindex', compact('category', 'places'));
    }

}



