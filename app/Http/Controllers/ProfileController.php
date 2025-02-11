<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
   {
    $user = Auth::user();
    $favorites = $user->favorites; // Assuming a relationship exists
    return view('profile.index', compact('user', 'favorites'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete old image from public folder if exists
            if ($user->profile_image && file_exists(public_path('profile_images/' . $user->profile_image))) {
                unlink(public_path('profile_images/' . $user->profile_image));
            }

            // Save new image in public/profile_images
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profile_images'), $imageName);

            $user->profile_image = $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}
