<?php

namespace App\Http\Controllers;
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
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'image_path' => 'required|array',
            'image_path.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $uploadedImages = [];

        foreach ($request->file('image_path') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName(); // Unique filename
            $path = 'galleries/' . $filename; // Define path inside public folder

            $image->move(public_path('galleries'), $filename); // Move to public/galleries

            $gallery = Gallery::create([
                'user_id' => Auth::id(),
                'place_id' => $request->place_id,
                'image_path' => $path, // Save the path in DB
            ]);

            $uploadedImages[] = ['path_image' => asset($path)]; // Generate full URL
        }

        return response()->json(['success' => true, 'images' => $uploadedImages]);
    }


}
