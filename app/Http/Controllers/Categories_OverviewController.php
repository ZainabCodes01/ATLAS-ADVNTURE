<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Country;
use App\Models\Places;
use App\Models\PlaceImage;
use Illuminate\Http\Request;

class Categories_OverviewController extends Controller
{
    public function categories_overview(){
        $countries=Country::all();
        $categories = Categories::get();
        return view('categories_overview', compact('countries', 'categories'));
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

    return view('category_place', compact('category', 'places'));
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






