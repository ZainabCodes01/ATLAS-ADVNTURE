<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Places;
use App\Models\PlaceImage;
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

    // Fetch places along with their multiple images
    $places = Places::where('category_id', $categoryId)
                    ->with('images') // Load place images
                    ->get();

    return view('pindex', compact('category', 'places'));
}

public function keywordSearch(Request $request)
{
    $keyword = $request->input('keyword');

    // Search for keyword in multiple fields
    $results = Places::where('name', 'LIKE', "%$keyword%")
                   ->orWhere('description', 'LIKE', "%$keyword%")
                   ->orWhereHas('category', function ($query) use ($keyword) {
                       $query->where('name', 'LIKE', "%$keyword%");
                   })
                   ->get();
    $country = $results->first()->country ?? null;


    return view('homeslider.place', compact('results', 'country'));
}



}






