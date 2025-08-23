<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Places;
use App\Models\Categories;
use App\Models\Rate;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
{
    return view('admin.master.app', ['adminName' => Auth::user()->name ?? 'Admin']);
}

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalPlaces = Places::count();
        $totalRatings = Rate::count();
        $totalGalleries = Gallery::count();
        return view('admin.master.dashboard',compact('totalUsers', 'totalPlaces', 'totalRatings', 'totalGalleries'));
    }
  public function keywordSearch(Request $request)
{
    $keyword = $request->input('keyword');

    // Search for keyword in multiple fields
    $results = Places::where('name', 'LIKE', "%$keyword%")
                   ->orWhere('description', 'LIKE', "%$keyword%")
                   ->orWhereHas('category', function ($query) use ($keyword) {
                       $query->where('name', 'LIKE', "%$keyword%");
                   })
                   ->get();
    $country = $results->first()->country ?? null;


    return view('homeslider.place', compact('results', 'country'));
}
    }



