<?php

namespace App\Http\Controllers;
use App\Models\Town;
use App\Models\City;
use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index(){
        $town = Town::with('city')->get();
        return view('town.index', compact('town'));
    }

    public function create(){
        $city=City::all();
        $towns=new Town();
        return view('town.create',compact('city','towns'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        Town::create($request->all());
            return redirect()->route('town.index')->with('success', 'Towns created successfully.');

    }

    public function edit($id){
        $city=City::all();
        $towns=Town::find($id);
        return view('town.create',compact('city','towns'));
    }

    public function update(Request $request, $id){
        $towns=Town::find($id);
        $data=$request->all();
        $towns->update($data);
        return redirect()->route('town.index');
    }

    public function destroy($id)
        {
            $towns = Town::find($id);
            if (!$towns) {
                return redirect()->route('town.index')->with('error', 'town not found.');
            }
            $towns->delete();
            return redirect()->route('town.index')->with('success', 'Town deleted successfully.');
        }

}
