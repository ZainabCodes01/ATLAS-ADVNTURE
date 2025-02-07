<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomesliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('priority_order', 'asc')->get();
        return view('homeslider.index', compact('sliders'));
    }

}
