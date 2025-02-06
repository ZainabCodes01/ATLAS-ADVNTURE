<?php

namespace App\Http\Controllers;
use App\Models\Provinces;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProvincesController extends Controller
{
    public function index(){
       $provinces = Provinces::with('country')->get();
        return view('provinces.index', compact('provinces'));
    }

    public function create(){
        $countries = Country::all();
        $provincee=new Provinces();
        return view('provinces.create', compact('countries','provincee'));
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

       Provinces::create($data);
            return redirect()->route('provinces.index')->with('success', 'Province created successfully.');
    }

    public function edit($id)
{
    $provincee = Provinces::findOrFail($id);
    $countries = Country::all();
    return view('provinces.create', compact('countries', 'provincee'));
}


public function update(Request $request, $id){
    $provincee=Provinces::find($id);
    $data=$request->all();
    if($request->hasFile('img')){
        $file=$request->file('img');
        $dest=public_path('assets/img');
        $file_name=time().'_'. $file->getClientOriginalName();
        $file->move($dest,$file_name);
        $data['image']='/assets/img/'.$file_name;
    }
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
