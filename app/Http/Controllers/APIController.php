<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class APIController extends Controller
{
    public function registerUser (Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,user_email',
            'password' => 'required|min:8',
        ]);

        $user = new User;
        $user->user_id = Str::uuid();
        $user->user_name = $request->name;
        $user->user_email = $request->email;
        $user->user_password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'Register Success',
        ]);
    }

    public function loginUser (Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt([
            'user_email' => $request->email,
            'password' => $request->password,
            'is_admin' => false
        ])) {
            if ($request->remember) {
                Cookie::queue('LoginEmail', $request->input('email'), 5);
                Cookie::queue('LoginPassword', $request->input('password'), 5);
            } else {
                Cookie::queue(Cookie::forget('LoginEmail'));
                Cookie::queue(Cookie::forget('LoginPassword'));
            }

            return response()->json([
                'status' => 'Login Sucessful',
                'token' => Auth::user()->createToken('API')->accessToken,
            ]);
        }

        return response()->json([
            'status' => 'Login Failed',
        ]);
    }
}
