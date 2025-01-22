<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaceImage;
use App\Models\Places;
class PlaceImageController extends Controller
{
    public function index(int $id=null)
    {
        $places=Places::find($id);

        return view('placeimage.index', compact('places'));
    }
    public function create($id)
{
    $places = Places::find($id);
    if (!$places) {
        return redirect()->back()->with('error', 'Place not found.');
    }

    return view('your-view-name', compact('place'));
}

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp'
        ]);
        $places= Places::find($id);
        if($files = $request->file('images')){
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $filename  = time(). '.' .$extension;
                $path = "uploads/placeimage/";
                $file->move($path,$filename);
                $imagedata[] = [
                    'place_id' => $places->id ?? null,
                    'image_path' =>$path.$filename,
                ];
            }
        }
        PlaceImage::insert($imagedata);
        return redirect()->back()->with('success', 'Image uploaded successfully');
    }
}
