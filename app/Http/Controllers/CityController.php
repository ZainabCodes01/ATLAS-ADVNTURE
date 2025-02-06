<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Provinces;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $city = City::with('province')->get();
        return view('city.index', compact('city'));
    }

    public function create(){
        $provinces=Provinces::all();
        $citys=new City();
        return view('city.create',compact('provinces','citys'));
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

       City::create($data);
            return redirect()->route('city.index')->with('success', 'City created successfully.');
    }

    public function edit($id){
        $citys=City::find($id);
        $provinces=Provinces::all();
        return view('city.create',compact('provinces','citys'));
    }

    public function update(Request $request, $id){
        $citys=City::find($id);
        $data=$request->all();
        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('assets/img');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/assets/img/'.$file_name;
        }
        $citys->update($data);
        return redirect()->route('city.index');
    }

    public function destroy($id)
        {
            $citys = City::find($id);
            if (!$citys) {
                return redirect()->route('city.index')->with('error', 'city not found.');
            }
            $citys->delete();
            return redirect()->route('city.index')->with('success', 'city deleted successfully.');
        }
}
