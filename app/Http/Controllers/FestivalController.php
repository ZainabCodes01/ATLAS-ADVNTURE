<?php

namespace App\Http\Controllers;
use App\Models\Festival;
use App\Models\Places;

use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function index(){
        $festival = Festival::with('place')->get();
         return view('festival.index', compact('festival'));
    }
    public function create(){
        $places = Places::all();
        $festivals=new Festival();
        return view('festival.create', compact('places','festivals'));
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

       Festival::create($data);
            return redirect()->route('festival.index')->with('success', 'Festival created successfully.');
    }
    public function edit($id)
    {
        $festivals = Festival::findOrFail($id);
        $places = Places::all();
        return view('festival.create', compact('places', 'festival'));
    }
    public function update(Request $request, $id){
        $festival=Festival::find($id);
        $data=$request->all();
        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('assets/img');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/assets/img/'.$file_name;
        }
        $festivals->update($data);
        return redirect()->route('festival.index');
    }
    public function destroy($id)
    {
        $festivals = Festival::find($id);
        if (!$festivals) {
            return redirect()->route('festival.index')->with('error', 'Festival not found.');
        }
        $festivals->delete();
        return redirect()->route('festival.index')->with('success', 'Festival deleted successfully.');
    }



}
