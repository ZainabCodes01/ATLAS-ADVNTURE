<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;
use App\Models\Categories;
use App\Models\Country;

class FoodController extends Controller
{
    public function index(Request $request)
{
    $countries = Country::all();

    // Sare Places fetch karein jisme 'Traditional Foods' wali category ho
    $places = Places::whereHas('category', function ($query) {
        $query->where('name', 'Traditional Foods');
    })->get();

    return view('food.index', compact('countries', 'places'));
}


    // Specific food ka detail page
    public function show($id)
    {
        $food = Places::with('category')->findOrFail($id);

       // Get all places except the one being viewed
       $otherFoods = Places::where('id', '!=', $id)
                ->where('category_id', $food->category_id) // ✅ Sirf same category wale foods show hon
                ->get();
        return view('food.show', compact('food', 'otherFoods'));

    }
}

