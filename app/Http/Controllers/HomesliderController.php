<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Categories;
use App\Models\Places;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomesliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::orderBy('priority_order', 'asc')->get();
        $places = Places::paginate(8);
        $countries = Country::withCount('places')->get();
        $categories = Categories::all();

        $query = Places::query();

        if (!empty($request->place) && !empty($request->category_id)) {
            $query->where('category_id', $request->category_id)
                  ->where('name', 'LIKE', '%' . $request->place . '%');
        } elseif (!empty($request->place)) {
            $query->where('name', 'LIKE', '%' . $request->place . '%');
        } elseif (!empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        $filteredPlaces = $query->get();

        return view('homeslider.index', compact('categories', 'places', 'sliders', 'countries'));
    }

   public function showPlace($id)
{
    // Place find karo by ID
    $place = Places::findOrFail($id);

    // Exclude categories
    $excludeCategoryIds = Categories::whereIn('name', [
        'Traditional Foods',
        'Festivals'
    ])->pluck('id')->toArray();

    // Related places (slug ke bajaye ID based logic)
    $otherPlaces = Places::with('category')
        ->where('id', '!=', $place->id)
        ->whereNotIn('category_id', $excludeCategoryIds)
        ->inRandomOrder()
        ->limit(9)
        ->get();

    return view('homeslider.show', compact('place', 'otherPlaces'));
}





    public function showPlaces($countryId)
    {
        $country = Country::findOrFail($countryId);
        $places = Places::where('country_id', $countryId)->get();

        return view('homeslider.place', compact('country', 'places'));
    }

}
