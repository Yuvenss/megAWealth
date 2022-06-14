<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function registerPageUser ()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function loginPageUser ()
    {
        return view('login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function loginPageAdmin () {
        return view('login', [
            'title' => 'Login Admin',
            'active' => '',
            'admin' => true
        ]);
    }

    public function registerUser (Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,user_email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User;
        $user->user_id = Str::uuid();
        $user->user_name = $request->name;
        $user->user_email = $request->email;
        $user->user_password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Registration Successful!! Please Login');
    }

    public function loginUser (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // $rememberMe = (!empty($request->remember_me)) ? true : false;

        if (Auth::attempt([
            'user_email' => $request->email,
            'password' => $request->password,
            'is_admin' => false
        ])) {
            if ($request->remember) {
                Cookie::queue('LoginEmail', $request->input('email'), 5);
                Cookie::queue('LoginPassword', $request->input('password'), 5);
            }
            $request->session()->regenerate();
            Auth::login(Auth::user()/*, $rememberMe*/);
            return redirect()->intended('/home');
        }

        return back()->with('error', 'Login Failed!!');
    }

    public function loginAdmin (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt([
            'user_email' => $request->email,
            'password' => $request->password,
            'is_admin' => true
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('error', 'Login Failed!!');
    }

    public function logoutUser (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function logoutAdmin (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginAdmin');
    }
}
