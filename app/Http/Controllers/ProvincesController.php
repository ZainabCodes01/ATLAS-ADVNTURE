<?php

namespace App\Http\Controllers;

use App\Models\Provinces;
use App\Models\Country;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    // Provinces List
    public function index()
    {
        $provinces = Provinces::with('country')->paginate(5);
        return view('provinces.index', compact('provinces'));
    }

    // Create Form
    public function create()
    {
        $countries = Country::all();
        $provincee = new Provinces(); // empty object for form
        $provinces = collect(); // blank by default
        return view('provinces.create', compact('countries','provincee','provinces'));
    }

    // Edit Form
    public function edit($id)
    {
        $provincee = Provinces::findOrFail($id);
        $countries = Country::all();
        $provinces = Provinces::where('country_id', $provincee->country_id)->get();

        return view('provinces.create', compact('countries', 'provincee', 'provinces'));
    }




public function store(Request $request){
    $data = $request->validate([
        'country_id' => 'required|exists:countries,id',
        'name'       => 'required|string|max:255',
        'img'        => 'nullable|image',
    ]);

    // Image upload
    if($request->hasFile('img')){
        $file = $request->file('img');
        $file_name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('assets/img'), $file_name);
        $data['image'] = '/assets/img/'.$file_name;
    }

    Provinces::create($data);

    return redirect()->route('provinces.index')->with('success','Province created successfully.');
}

    public function update(Request $request, $id)
    {
        $provincee = Provinces::findOrFail($id);

        $data = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name'       => 'required|string|max:255',
            'img'        => 'nullable|image'
        ]);

        if ($request->hasFile('img')) {
            if ($provincee->image && file_exists(public_path($provincee->image))) {
                unlink(public_path($provincee->image));
            }
            $file = $request->file('img');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/img'), $file_name);
            $data['image'] = '/assets/img/'.$file_name;
        } else {
            $data['image'] = $provincee->image;
        }

        $provincee->update($data);

        return redirect()->route('provinces.index')->with('success','Province updated successfully!');
    }

    // Delete Province
    public function destroy($id)
    {
        $provincee = Provinces::find($id);
        if (!$provincee) {
            return redirect()->route('provinces.index')->with('error', 'Province not found.');
        }

        if ($provincee->image && file_exists(public_path($provincee->image))) {
            unlink(public_path($provincee->image));
        }

        $provincee->delete();
        return redirect()->route('provinces.index')->with('success', 'Province deleted successfully.');
    }

    // AJAX: Get Provinces by Country
    public function getProvinces($country_id)
    {
        $provinces = Provinces::where('country_id', $country_id)->get();
        return response()->json($provinces);
    }
}
