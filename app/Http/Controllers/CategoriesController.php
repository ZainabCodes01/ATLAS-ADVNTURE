<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Categories::paginate(4);
        return view('categories.index', compact('categories'));
    }

    public function create(){
        $category=new Categories();
        return view('categories.create',compact('category'));
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

           // 👇 Slug generate karo yahan
               $data['slug'] = \Str::slug($request->name); // name se slug banayenge

          Categories::create($data);
               return redirect()->route('categories.index')->with('success', 'Category created successfully.');
           }



    public function edit($id){
        $category=Categories::find($id);
        return view('categories.create',compact('category'));
    }

    public function update(Request $request,$id){
        $category=Categories::find($id);
        $data=$request->all();
        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('assets/img');
            $file_name=time().'_'. $file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/assets/img/'.$file_name;
        }
        $category->update($data);
        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        $category = Categories::find($id);
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function show($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();
    return view('homeslider.show', compact('category'));
}


}
