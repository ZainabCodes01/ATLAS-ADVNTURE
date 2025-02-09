<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Places;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $categories = Categories::all();

        if ($categoryId) {
            $places = Places::where('category_id', $categoryId)->get();
        } else {
            $places = Places::all(); // If no category selected, show all places
        }

        return view('places.index', compact('places', 'categories'));
    }
}
