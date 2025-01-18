<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaceImage;
use App\Models\Places;
class PlaceImageController extends Controller
{
    public function index(){
        //$placeimages=PlaceImage::all();
        $placeimages = PlaceImage::with('places');  // Replace with actual data retrieval logic

        return view('placeimages.index', compact('placeimages'));
     }
     public function create(){
        $places=Places::all();
     $place=new PlaceImage();
     return view('placeimages.create',compact('places','place'));
 }
     public function store(Request $request)
 {
     $request->validate([
         'name' => 'required',
         'description' => 'required',
         'latitude' => 'required|numeric',
         'longitude' => 'required|numeric',
         'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
     ]);

     // Create a new place
     $place = PlaceImage::create($request->only(['name', 'description', 'latitude', 'longitude']));

     // Handle multiple images
     if ($request->hasFile('images')) {
         foreach ($request->file('images') as $image) {
             $path = $image->store('place', 'public'); // Save to storage/app/public/places
             $place->images()->create(['image_path' => $path]);
         }
     }

     return redirect()->route('placeimages.index')->with('success', 'Place created successfully with images.');
 }
     public function edit($id){
        $places=Places::all();
         $place=PlaceImage::find($id);
         return view('placeimages.create',compact('places','place'));
     }
     public function update(Request $request, $id){
         $place=PlaceImage::find($id);
         $data=$request->all();

         if($request->hasFile('thumbnails')){
             $file=$request->file('thumbnails');
             $dest=public_path('assets/img/thumbnails/image_path');
             $file_name=time().'_'. $file->getClientOriginalName();
             $file->move($dest,$file_name);
             $data['image_paths']='/assets/img/thumbnails/image_path/'.$file_name;
         }

        PlaceImage::create($data);
             return redirect()->route('placeimages.index')->with('success', 'Places created successfully.');
        // $data=$request->all();
         //$placess->update($data);
         //return redirect()->route('places.index');
     }

     public function destroy($id)
         {
             $place = PlaceImage::find($id);
             if (!$place) {
                 return redirect()->route('placeimages.index')->with('error', 'Places not found.');
             }
             $place->delete();
             return redirect()->route('placeimages.index')->with('success', 'Places deleted successfully.');
         }

 }
