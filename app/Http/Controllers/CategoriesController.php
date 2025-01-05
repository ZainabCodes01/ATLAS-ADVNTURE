<?php

namespace App\Http\Controllers;


use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Categories::all();
        return view('categories.index', compact('categories'));
    }

    public function create(){
        $categorie=new Categories();
        return view('categories.create',compact('categorie'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'deacripton'=>'nullable|string',
        ]);
        Categories::create($request->all());
            return redirect()->route('categories.index')->with('success', 'Categories created successfully.');

    }

    public function edit($id){
        $categorie=Categories::find($id);
        return view('categories.create',compact('categorie'));
    }

    public function update(Request $request, $id){
        $categorie=Categories::find($id);
        $data=$request->all();
        $categorie->update($data);
        return redirect()->route('categories.index');
       // return redirect()->route('categories.index')->with('success', 'Categories created successfully.');
    }

    public function destroy($id)
    {
        // Find the category by its ID
        $categorie = Categories::find($id);

        // Check if the category exists
        if (!$categorie) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        // Delete the category
        $categorie->delete();

        // Redirect back with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

}
