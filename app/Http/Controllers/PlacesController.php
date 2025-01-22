<?php

namespace App\Http\Controllers;
use App\Models\Places;
use App\Models\PlaceImage;
use App\Models\Categories;
use App\Models\Country;
use App\Models\Provinces;
use App\Models\City;
use App\Models\Town;

use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function index(){
        $places = Places::with(['images','category', 'country', 'province', 'city', 'town'])->get();

        return view('places.index', compact('places'));
    }

    public function create(){
        $categories=Categories::all();
        $countries=Country::all();
        $provinces=Provinces::all();
        $city=City::all();
        $town=Town::all();
        $placesc=new Places();
        return view('places.create',compact('categories','countries','provinces','city','town','placesc'));
    }

     public function store(Request $request)
        {
        $data=$request->all();
        if($request->hasFile('thumbnails')){
           $file=$request->file('thumbnails');
           $dest=public_path('assets/img/thumbnails');
            $file_name=time().'_'. $file->getClientOriginalName();
           $file->move($dest,$file_name);
           $data['thumbnail']='/assets/img/thumbnails/'.$file_name;
       }
     Places::create($data);
           return redirect()->route('places.index')->with('success', 'Places created successfully.');



        // // Validate the incoming data (Place and Images)
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'images' => 'required|array',  // We expect an array of images
        // ]);

        // // Step 1: Create the Place record (save details to the places table)
        // $places = Places::create([
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     'images'=>$request->input('images'),
        // ]);

        // // Step 2: Loop through the images and save each one in the place_images table
        // if ($request->has('images')) {
        //     foreach ($request->file('images') as $image) {
        //         // Store the image file (you can use the storage path, e.g., 'public/images')
        //         $imagePath = $image->store('public/images');

        //         // Save each image in the place_images table and associate it with the place
        //         PlaceImage::create([
        //             'place_id' => $place->id, // Associate the image with the created place
        //              'image_path' => $imagePath, // Store the image path
        //         ]);
        //     }
        // }

        // // Step 3: Return a response (maybe redirect or show success message)
        // return redirect()->route('places.index')->with('success', 'Place and images saved successfully!');
}


    public function edit($id){
        $categories=Categories::all();
        $countries=Country::all();
        $provinces=Provinces::all();
        $city=City::all();
        $town=Town::all();
        $placesc=Places::find($id);
        return view('places.create',compact('categories','countries','provinces','city','town','placesc'));
    }

    public function update(Request $request, $id){
        $placesc=Places::find($id);
        $data=$request->all();

        if($request->hasFile('thumbnails')){
            $file=$request->file('thumbnails');
            $dest=public_path('assets/img/thumbnails');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['thumbnail']='/assets/img/thumbnails/'.$file_name;
        }

        $placesc->update($data);
        return redirect()->route('places.index');
       // $data=$request->all();
        //$placess->update($data);
        //return redirect()->route('places.index');
    }

    public function show($id)
{
    // Yahan data fetch karein agar zarurat ho
    $places = Places::findOrFail($id); // Model ka istimaal karein agar zarurat ho

    return view('places.show', compact('places'));
}

    public function destroy($id)
        {
            $placesc = Places::find($id);
            if (!$placesc) {
                return redirect()->route('places.index')->with('error', 'Places not found.');
            }
            $placesc->delete();
            return redirect()->route('places.index')->with('success', 'Places deleted successfully.');
        }
}
