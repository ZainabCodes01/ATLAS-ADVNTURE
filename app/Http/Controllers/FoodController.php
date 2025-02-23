<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;
use App\Models\Categories;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Places::whereHas('category', function ($query) {
            $query->where('name', 'Traditional Foods'); // Category filter karein
        })->get();

        return view('food.index', compact('foods'));
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

