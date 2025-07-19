<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

// Register
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        //'password' => Hash::make($request->password),
        'password' => md5($request->password),
    ]);
    Auth::login($user);
    return redirect()->route('dashboard');
    }
    public function loginForm()
    {
        return view('auth.login');
    }

    //login
    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    // dd(
    //     'Password from DB:', $user ? $user->password : 'User not found',
    //     'Password from Form (hashed):', md5($request->password)
    // );

    if ($user && $user->password === md5($request->password)) {

        Auth::login($user);
        $request->session()->regenerate();
        
        return redirect()->intended('dashboard'); 
    }

    throw ValidationException::withMessages([
        'email' => [trans('auth.failed')], 
    ])->redirectTo(route('login'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // home
    }
}
