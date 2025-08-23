<?php

namespace App\Http\Controllers;
use App\Models\Places;
use App\Models\Categories;
use Illuminate\Http\Request;

class Category_PlaceController extends Controller
{
    public function category_place(Request $request)
{
    $categoryId = $request->input('category_id');
    $keyWord = $request->input('place');
    $threshold = 40; // similarity % ka limit

    $places = Places::orderBy('id');

    if ($categoryId) {
        $places->where('category_id', $categoryId);
    }

    if ($keyWord) {
        $allPlaces = $places->get();

        // Filter manually using similarity
        $filtered = $allPlaces->filter(function ($place) use ($keyWord, $threshold) {
            similar_text(strtolower($keyWord), strtolower($place->name), $percentName);
            similar_text(strtolower($keyWord), strtolower($place->description), $percentDesc);

            return ($percentName >= $threshold || $percentDesc >= $threshold);
        });

        $places = $filtered;
    } else {
        $places = $places->get();
    }

    return view('category_place', compact('places'));
}


    public function show($id)
    {
        // Fetch place and its images
        if (!$places) {
            abort(404, 'Place not found.');
        }

        return view('place-details', compact('places'));
    }


}
