<?php

namespace App\Http\Controllers;
use App\Models\Festivals;
use App\Models\Places;

use Illuminate\Http\Request;

class FestivalsController extends Controller
{
    public function index()
    {
        $Festivals = Places::whereHas('category', function ($query) {
            $query->where('name', 'Festivals'); // Category filter karein
        })->get();

        return view('Festivals.index', compact('Festivals'));
    }

    // Specific food ka detail page
    public function show($id)
    {
        $Festivals = Places::with('category')->findOrFail($id);
        $otherFestivals = Places::where('id', '!=', $id)
                ->where('category_id', $Festivals->category_id) // ✅ Sirf same category wale foods show hon
                ->get();
        return view('Festivals.show', compact('Festivals','otherFestivals'));
    }
}
