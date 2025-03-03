<?php

namespace App\Http\Controllers;
use App\Models\Festivals;
use App\Models\Places;
use App\Models\Country;
use Illuminate\Http\Request;

class FestivalsController extends Controller
{


    public function index(Request $request)
    {
        $countries = Country::all();

        // Sare Places fetch karein jisme 'Traditional Foods' wali category ho
        $places = Places::whereHas('category', function ($query) {
            $query->where('name', 'Festivals');
        })->get();

        return view('Festivals.index', compact('countries', 'places'));
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
