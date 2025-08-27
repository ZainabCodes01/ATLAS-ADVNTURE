<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


     protected function authenticated(Request $request, $user)
    {
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('homeslider');
     }

     public function login(Request $request)
{
    // Validation
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'password.required' => 'Password is required.',
    ]);



    // Authentication logic
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->intended('/');
    } else {
        return back()->withErrors([
            'email' => 'The provided email do not match our records.',
            'password' => 'The provided password do not match our records.',
        ]);
    }
}
 protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:users',
            function ($attribute, $value, $fail) {
                // ✅ Email domain check
                if (!checkdnsrr(substr(strrchr($value, "@"), 1), "MX")) {
                    $fail("This email domain does not exist. Please enter a valid email.");
                }
            },
        ],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}



}
