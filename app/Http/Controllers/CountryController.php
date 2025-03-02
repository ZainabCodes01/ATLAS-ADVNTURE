<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries=Country::all();
        $countries=Country::paginate(3);
        return view('countries.index', compact('countries'));
    }

    public function create(){
        $countrie=new Country();
        return view('countries.create',compact('countrie'));
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



       if($request->hasFile('flg')){
        $file=$request->file('flg');
        $dest=public_path('assets/flg');
        $file_name=time().'_'. $file->getClientOriginalName();
        $file->move($dest,$file_name);
        $data['flag']='/assets/flg/'.$file_name;
    }
        $countries=Country::create($data);
        return redirect()->route('countries.index')->with('success', 'Country created successfully.');
    }


    public function edit($id){
        $countrie=Country::find($id);
        return view('countries.create',compact('countrie'));
    }

    public function update(Request $request, $id){
        $countrie=Country::find($id);
        $data=$request->all();
        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('assets/img');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/assets/img/'.$file_name;
        }
        if($request->hasFile('flg')){
            $file = $request->file('flg');
            $dest = public_path('assets/flg');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move($dest, $file_name);
            $data['flag'] = '/assets/flg/' . $file_name;
        }
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
