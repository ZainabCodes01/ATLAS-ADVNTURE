<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validation rules for registration
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            // ✅ yahan sahi likh diya hai (array ke andar alag alag rules)
            'email'    => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required'     => 'Please enter your full name.',
            'name.regex'        => 'The name may only contain letters and spaces.',
            'email.required'    => 'Email is required.',
            'email.email'       => 'Please enter a valid email address.',
            'email.unique'      => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 8 characters.',
            'password.confirmed'=> 'Passwords do not match.',
        ]);
    }

    /**
     * Create new user
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
