<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomesliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('priority_order', 'asc')->get();
        $categories = Categories::all();
        return view('homeslider.index', compact('sliders'));
    }

}
