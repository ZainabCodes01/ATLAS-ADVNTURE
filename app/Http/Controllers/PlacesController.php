<?php

namespace App\Http\Controllers;
use App\Models\Places;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function index(){
        $places= Places::all();
        return view('places.index', compact('places'));
    }

    public function create(){
        $placess=new Places();
        return view('places.create',compact('placess'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        Places::create($request->all());
            return redirect()->route('places.index')->with('success', 'Places created successfully.');

    }

    public function edit($id){
        $placess=Places::find($id);
        return view('places.create',compact('placess'));
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
