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
        $placess=new Places();
        return view('places.create',compact('categories','countries','provinces','city','town','placess'));
    }

     public function store(Request $request)
        {
            // $validated = $request->validate([
            //     'name' => 'required|string|max:255',
            //     'description' => 'nullable|string',
            //     'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            //     'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            // ]);
            // Save the place
        //     $place = Places::create([
        //         'name' => $validated['name'],
        //         'description' => $validated['description'],
        //         'location' => $request->location,
        //         'thumbnail' => $request->file('thumbnail')
        //             ? $request->file('thumbnail')->store('thumbnails', 'public')
        //             : null,
        //     ]);
        //     // Save the images
        //     if ($request->hasFile('images')) {
        //         foreach ($request->file('images') as $image) {
        //             $path = $image->store('placeimages', 'public');
        //             $place->images()->create(['image_path' => $path]);
        //         }
        //     }
        //     return redirect()->route('places.index')->with('success', 'Places created successfully.');
        // }


        $data=$request->all();

        if($request->hasFile('thumbnails')){
           $file=$request->file('thumbnails');
           $dest=public_path('assets/img/thumbnails');
            $file_name=time().'_'. $file->getClientOriginalName();
           $file->move($dest,$file_name);
           $data['thumbnail']='/assets/img/thumbnails/'.$file_name;
       }

       $data=$request->all();

       if($request->hasFile('images[]')){
          $file=$request->file('images[]');
          $dest=public_path('assets/img/thumbnails/images[]');
           $file_name=time().'_'. $file->getClientOriginalName();
          $file->move($dest,$file_name);
          $data['images']='/assets/img/thumbnails/images[]/'.$file_name;
      }
      Places::create($data);
           return redirect()->route('places.index')->with('success', 'Places created successfully.');



        // Validate the incoming data (Place and Images)
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'description' => 'required|string',
//             'images' => 'required|array',  // We expect an array of images
//             'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
//         ]);

//         // Step 1: Create the Place record (save details to the places table)
//         $place = Place::create([
//             'name' => $request->input('name'),
//             'description' => $request->input('description'),
//         ]);

//         // Step 2: Loop through the images and save each one in the place_images table
//         if ($request->has('images')) {
//             foreach ($request->file('images') as $image) {
//                 // Store the image file (you can use the storage path, e.g., 'public/images')
//                 $imagePath = $image->store('public/images');

//                 // Save each image in the place_images table and associate it with the place
//                 PlaceImage::create([
//                     'place_id' => $place->id, // Associate the image with the created place
// 'image_path' => $imagePath, // Store the image path
//                 ]);
//             }
//         }

//         // Step 3: Return a response (maybe redirect or show success message)
//         return redirect()->route('places.index')->with('success', 'Place and images saved successfully!');
}


    public function edit($id){
        $categories=Categories::all();
        $countries=Country::all();
        $provinces=Provinces::all();
        $city=City::all();
        $town=Town::all();
        $placess=Places::find($id);
        return view('places.create',compact('categories','countries','provinces','city','town','placess'));
    }

    public function update(Request $request, $id){
        $placess=Places::find($id);
        $data=$request->all();

        if($request->hasFile('thumbnails')){
            $file=$request->file('thumbnails');
            $dest=public_path('assets/img/thumbnails');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['thumbnail']='/assets/img/thumbnails/'.$file_name;
        }
        if($request->hasFile('images[]')){
            $file=$request->file('images[]');
            $dest=public_path('assets/img/thumbnails/ images[]');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['images']='/assets/img/thumbnails/images[]/'.$file_name;
        }


       Places::create($data);
            return redirect()->route('places.index')->with('success', 'Places created successfully.');
       // $data=$request->all();
        //$placess->update($data);
        //return redirect()->route('places.index');
    }

    public function destroy($id)
        {
            $placess = Places::find($id);
            if (!$placess) {
                return redirect()->route('places.index')->with('error', 'Places not found.');
            }
            $placess->delete();
            return redirect()->route('places.index')->with('success', 'Places deleted successfully.');
        }
}
