<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaceImage;
use App\Models\Places;
class PlaceImageController extends Controller
{
    public function index()
    {
        $placeimage = PlaceImage::with('place')->get();
        return view('placeimage.index', compact('placeimage'));
    }

    // Show the form for creating new images
    public function create()
    {
        $places = Places::all();
        $image=new PlaceImage();
        return view('placeimage.create', compact('places','image'));
    }

    // Store multiple images in storage
    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        $data=$request->all();

        if($request->hasFile('image_paths')){
           $file=$request->file('image_paths');
           $dest=public_path('assets/img/thumbnials/image_paths');
            $file_name=time().'_'. $file->getClientOriginalName();
           $file->move($dest,$file_name);
           $data['image_path']='/assets/img/thumbnails/image_paths/'.$file_name;
       }

        return redirect()->route('placeimage.index')->with('success', 'Images uploaded successfully!');
    }
    public function edit($id)
    {
        $image = PlaceImage::findOrFail($id);
        $places = Places::all();
        return view('images.create', compact('image', 'places'));
    }

    public function update(Request $request)
    {
        $image=PlaceImage::find($id);
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        $data=$request->all();

        if($request->hasFile('image_paths')){
           $file=$request->file('image_paths');
           $dest=public_path('assets/img/thumbnials/image_paths');
            $file_name=time().'_'. $file->getClientOriginalName();
           $file->move($dest,$file_name);
           $data['image_path']='/assets/img/thumbnails/image_paths/'.$file_name;
       }

        return redirect()->route('placeimage.index')->with('success', 'Images uploaded successfully!');
    }

        public function destroy($id)
        {
            $image = PlaceImage::find($id);
            if (!$image) {
                return redirect()->route('placeimage.index')->with('error', 'Places not found.');
            }
            $image->delete();
            return redirect()->route('placeimage.index')->with('success', 'Places deleted successfully.');
        }
        public function show($id)
    {
        $image = PlaceImage::with('place')->findOrFail($id); // Fetch image with related Place

        return view('placeimage.show', compact('image')); // Pass the data to the view
    }
 }
