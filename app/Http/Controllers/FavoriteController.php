<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FavoriteController extends Controller
{
    public function index()
{
    $favorites = Auth::user()->favorites()->with('place')->get();
    return view('profile.favorites', compact('favorites'));
}
    public function toggleFavorite(Request $request)
    {
        $user = Auth::user();
        $placeId = $request->place_id;

        // Check if already favorited
        $favorite = Favorite::where('user_id', $user->id)->where('place_id', $placeId)->first();

        if ($favorite) {
            $favorite->delete(); // Remove from favorites
            return response()->json(['status' => 'removed']);
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'place_id' => $placeId
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
