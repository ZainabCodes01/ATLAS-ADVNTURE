<?php

namespace App\Http\Controllers;
use App\Models\Places;
use App\Models\Categories;
use App\Models\Country;
use App\Models\Provinces;
use App\Models\City;
use App\Models\Town;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function index(){
        $places= Places::all();
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

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        Places::create($request->all());
            return redirect()->route('places.index')->with('success', 'Places created successfully.');

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
        $placess->update($data);
        return redirect()->route('places.index');
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
