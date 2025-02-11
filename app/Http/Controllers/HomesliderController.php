<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Categories;
use App\Models\Places;
use App\Models\Country;
use Illuminate\Http\Request;

class HomesliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::orderBy('priority_order', 'asc')->get();
        $countries = Country::withCount('places')->get();
        $places=Places::paginate(6);
        $categories = Categories::all();

    // ✅ Initialize Query
    $query = Places::query();

    // ✅ Check if Both Place Name & Category are Selected
    if (!empty($request->place) && !empty($request->category_id)) {
        $query->where('category_id', $request->category_id)
              ->where('name', 'LIKE', '%' . $request->place . '%'); // Ensures place is inside selected category
    }
    // ✅ If Only Place Name is Entered
    elseif (!empty($request->place)) {
        $query->where('name', 'LIKE', '%' . $request->place . '%');
    }
    // ✅ If Only Category is Selected
    elseif (!empty($request->category_id)) {
        $query->where('category_id', $request->category_id);
    }

    // ✅ Get the Results
    $filteredPlaces = $query->get();

    // ✅ Debugging: Log results
    \Log::info('Filtered Places:', $filteredPlaces->toArray());

    // ✅ Pass Data to View
    return view('homeslider.index', compact('filteredPlaces', 'categories','places','sliders','countries'));
}

    public function showPlace($id)
    {
        $place = Places::with('images')->findOrFail($id); // Fetch place with images
        return view('homeslider.show', compact('place'));
    }
    public function showPlaces($countryId) {
        $country = Country::findOrFail($countryId);
        $places = Places::where('country_id', $countryId)->get();

        return view('homeslider.place', compact('country', 'places'));
    }


}
