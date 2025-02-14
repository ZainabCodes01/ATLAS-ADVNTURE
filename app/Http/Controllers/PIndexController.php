<?php

namespace App\Http\Controllers;
use App\Models\Places;
use App\Models\Categories;
use Illuminate\Http\Request;

class PIndexController extends Controller
{
    public function pindex(Request $request)

    {
        $categoryId = $request->input('category_id');
        $keyWord = $request->input('place');

        $places = Places::orderBy('id');
        if($categoryId && $categoryId !=null){
            $places->where('category_id', $categoryId);
        }
        if($keyWord && $keyWord !=null){
            $places->where('name', 'LIKE', "%$keyWord%")
            ->orWhere('description', 'LIKE', "%$keyWord%")
            // ->orWhereHas('category', function ($query) use ($keyWord) {
            //     $query->where('name', 'LIKE', "%$keyWord%");
            // })
            ;
        }
        $places=$places->get();



        return view('pindex', compact('places'));
    }
    public function show($id)
    {
        // Fetch place and its images
        if (!$places) {
            abort(404, 'Place not found.');
        }

        return view('place-details', compact('places'));
    }
}
