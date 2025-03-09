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
    // Get the selected food with its category and country
    $food = Places::with('category')->findOrFail($id);

    // Get related foods (Same Country, Different ID)
    $relatedFoods = Places::where('id', '!=', $id)
                          ->where('country_id', $food->country_id) // ✅ Sirf same country wale foods
                          ->where('category_id', $food->category_id) // ✅ Aur same category wale foods
                          ->get();

    return view('food.show', compact('food', 'relatedFoods'));
}

}

