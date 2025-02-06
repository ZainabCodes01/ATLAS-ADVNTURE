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
        $data=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('assets/img');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/assets/img/'.$file_name;
        }

       Town::create($data);
            return redirect()->route('town.index')->with('success', 'Town created successfully.');
    }
    public function edit($id){
        $city=City::all();
        $towns=Town::find($id);
        return view('town.create',compact('city','towns'));
    }

    public function update(Request $request, $id){
        $towns=Town::find($id);
        $data=$request->all();
        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('assets/img');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/assets/img/'.$file_name;
        }
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
