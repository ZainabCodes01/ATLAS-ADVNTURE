<?php

namespace App\Http\Controllers;
use App\Models\Places;

use Illuminate\Http\Request;

class PIndexController extends Controller
{
    public function pindex()
    {
        // Fetching only non-deleted places
        $places = Places::all();

        return view('pindex', compact('places'));
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
