<?php

namespace App\Http\Controllers; // ✅ Correct namespace
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Places;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Auth::user()->galleries()->with('place')->get();
        return view('profile.index', compact('galleries'));
    }



    public function store(Request $request)
    {
        Log::info('Gallery Store Request:', $request->all()); // Logs request data

        $request->validate([
            'place_id' => 'required|exists:places,id',
        ]);

        $gallery = Gallery::create([
            'user_id' => Auth::id(),
            'place_id' => $request->place_id,
        ]);

        Log::info('Gallery Created:', $gallery->toArray()); // Logs inserted data

        return back()->with('success', 'Place added to gallery!');
    }


}
