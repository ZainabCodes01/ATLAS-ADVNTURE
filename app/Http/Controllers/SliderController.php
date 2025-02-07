<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
         return view('slider.index', compact('sliders'));
    }
    public function create(){
        $slider=new Slider();
        return view('slider.create', compact('slider'));
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

       Slider::create($data);
            return redirect()->route('slider.index')->with('success', 'Slider created successfully.');
    }
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('slider.create', compact('slider'));
    }
    public function update(Request $request, $id){
        $slider=Slider::findOrFail($id);
        $data=$request->all();
        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('assets/img');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/assets/img/'.$file_name;
        }
        $slider->update($data);
        return redirect()->route('slider.index');
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('slider.index')->with('error', 'Slider not found.');
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
//     public function updatePriority(Request $request, $id)
// {
//     // Validate input
//     $request->validate([
//         'priority' => 'required|integer|min:1|max:5',
//     ]);

//     // Find the slider by ID
//     $slider = Slider::findOrFail($id);

//     // Update priority
//     $slider->priority = $request->priority;
//     $slider->save();

//     // Redirect back with success message
//     return back()->with('success', 'Priority updated successfully!');
// }


}
