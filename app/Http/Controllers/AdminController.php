<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Places;
use App\Models\Rate;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    return view('admin.master.dashboard', ['adminName' => Auth::user()->name ?? 'Admin']);
}

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalPlaces = Places::count();
        $totalRatings = Rate::count();
        $totalGalleries = Gallery::count();
        return view('admin.master.dashboard',compact('totalUsers', 'totalPlaces', 'totalRatings', 'totalGalleries'));
    }


}
