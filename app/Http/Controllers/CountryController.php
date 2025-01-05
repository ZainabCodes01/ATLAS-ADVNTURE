<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries=Country::all();
        return view('countries.index', compact('countries'));
    }

    public function create(){
        $countrie=new Country();
        return view('countries.create',compact('countrie'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        Country::create($request->all());
            return redirect()->route('countries.index')->with('success', 'countries created successfully.');

    }

    public function edit($id){
        $countrie=Country::find($id);
        return view('countries.create',compact('countrie'));
    }

    public function update(Request $request, $id){
        $countrie=Country::find($id);
        $data=$request->all();
        $countrie->update($data);
        return redirect()->route('countries.index');
    }

    public function destroy($id)
        {
            $countrie = Country::find($id);
            if (!$countrie) {
                return redirect()->route('countries.index')->with('error', 'Country not found.');
            }
            $countrie->delete();
            return redirect()->route('countries.index')->with('success', 'Country deleted successfully.');
        }
}
