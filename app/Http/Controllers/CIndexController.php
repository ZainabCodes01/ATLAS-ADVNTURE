<?php

namespace App\Http\Controllers;
use App\Models\Categories;

use Illuminate\Http\Request;

class CIndexController extends Controller
{
    public function cindex()

    {
        // Fetching only non-deleted places
        $categories = Categories::all();

        return view('cindex', compact('categories'));
    }
    public function create()
    {
    $category  = new Categories(); // Empty category object
    return view('categories.create', compact('category '));
    }

    public function show($id)
    {
        // Fetch place and its images
        if (!$categories) {
            abort(404, 'Place not found.');
        }

        return view('place-details', compact('categories'));
    }
}



