<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use App\Models\Provinces;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $city = City::with('province')->paginate(4);
        return view('city.index', compact('city'));
    }

    public function create(){
        $countries = Country::all();   // ✅ countries load karo
        $provinces = Provinces::all(); // agar chahiye to
        $citys = new City();
        return view('city.create', compact('countries','provinces','citys'));
    }

    public function store(Request $request){
        $data = $request->all();

        if($request->hasFile('img')){
            $file = $request->file('img');
            $dest = public_path('assets/img');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image'] = '/assets/img/'.$file_name;
        }

        City::create($data);
        return redirect()->route('city.index')->with('success', 'City created successfully.');
    }

    public function edit($id){
        $citys = City::findOrFail($id); // ✅ City ko find karo
        $countries = Country::all();    // ✅ dropdown ke liye countries bhejo
        $provinces = Provinces::all();  // ✅ optional
        return view('city.create', compact('countries','provinces','citys'));
    }

    public function update(Request $request, $id)
{
    $city = City::findOrFail($id);

    // All form fields
    $data = $request->all();

    // Handle Image
    if ($request->hasFile('img')) {
        if ($city->image && file_exists(public_path($city->image))) {
            unlink(public_path($city->image));
        }

        $file = $request->file('img');
        $dest = public_path('assets/img');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move($dest, $file_name);
        $data['image'] = '/assets/img/' . $file_name;
    } else {
        $data['image'] = $city->image; // keep old image
    }

    // Handle Flag (if cities ke liye zaroorat hai)
    if ($request->hasFile('flg')) {
        if ($city->flag && file_exists(public_path($city->flag))) {
            unlink(public_path($city->flag));
        }

        $file = $request->file('flg');
        $dest = public_path('assets/flg');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move($dest, $file_name);
        $data['flag'] = '/assets/flg/' . $file_name;
    } else {
        $data['flag'] = $city->flag;
    }

    // Update record
    $city->update($data);

    return redirect()->route('city.index')->with('success', 'City updated successfully.');
}


    public function destroy($id)
    {
        $citys = City::find($id);
        if (!$citys) {
            return redirect()->route('city.index')->with('error', 'City not found.');
        }
        $citys->delete();
        return redirect()->route('city.index')->with('success', 'City deleted successfully.');
    }

    public function getProvinces($country_id)
    {
        $provincee = Provinces::where('country_id', $country_id)->get();
        return response()->json($provincee);
    }

    public function getCities($province_id)
    {
        $citys = City::where('province_id', $province_id)->get();
        return response()->json($citys);
    }
}
