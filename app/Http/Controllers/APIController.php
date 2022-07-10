<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
}
