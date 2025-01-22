<?php

namespace App\Http\Controllers;
use App\Models\Categories;

use Illuminate\Http\Request;

class PIndexController extends Controller
{
    public function pindex()
    {
        // Fetching only non-deleted places
        $categories = Categories::all();

        return view('pindex', compact('categories'));
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
