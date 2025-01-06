<?php

namespace App\Http\Controllers;
use App\Models\Provinces;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    public function index(){
        $provinces= Provinces::all();
        return view('provinces.index', compact('provinces'));
    }

    public function create(){
        $provincee=new Provinces();
        return view('provinces.create',compact('provincee'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        Provinces::create($request->all());
            return redirect()->route('provinces.index')->with('success', 'provinces created successfully.');

    }

    public function edit($id){
        $provincee=Provinces::find($id);
        return view('provinces.create',compact('provincee'));
    }

    public function update(Request $request, $id){
        $provincee=Provinces::find($id);
        $data=$request->all();
        $provincee->update($data);
        return redirect()->route('provinces.index');
    }

    public function destroy($id)
        {
            $provincee = Provinces::find($id);
            if (!$provincee) {
                return redirect()->route('provinces.index')->with('error', 'Province not found.');
            }
            $provincee->delete();
            return redirect()->route('provinces.index')->with('success', 'Province deleted successfully.');
        }
}
