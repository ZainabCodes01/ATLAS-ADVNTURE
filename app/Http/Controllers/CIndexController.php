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
public function search(Request $request)
{
    $place_id = $request->place_id;
    $category_id = $request->category_id;

    // Get all places
    $places = Places::all();

    // Get all categories
    $categories = Categories::all();

    // Filter places based on category and place selection
    $filteredPlaces = Places::whereHas('category', function ($query) use ($category_id) {
            if ($category_id) {
                $query->where('id', $category_id);
            }
        })
        ->when($place_id, function ($query, $place_id) {
            return $query->where('id', $place_id);
        })
        ->get();

    return view('homeslider.index', compact('categories', 'places', 'filteredPlaces'));
}



}






