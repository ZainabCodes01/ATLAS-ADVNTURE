<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Categories;
use App\Models\Places;
use Illuminate\Http\Request;

class HomesliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::orderBy('priority_order', 'asc')->get();
        $places = Places::all();
        $query = Places::query();
        $categories = Categories::all();

        // Debugging: Show search values in log
        \Log::info('Search Inputs:', $request->all());

        // ✅ Place Name (Destination) Search
        if ($request->has('place') && !empty($request->place)) {
            $query->where('name', 'LIKE', '%' . $request->place . '%');
        }

        // ✅ Category Search
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        $places = $query->get();

        // Debugging: Show filtered places in log
        \Log::info('Filtered Places:', $places->toArray());

        return view('homeslider.index', compact('sliders','places', 'categories'));
    }
    public function showPlace($id)
    {
        $place = Places::with('images')->findOrFail($id); // Fetch place with images
        return view('homeslider.show', compact('place'));
    }



}
