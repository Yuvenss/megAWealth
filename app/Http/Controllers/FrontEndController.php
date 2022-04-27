<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home () {
        return view('home', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }

    public function aboutUs () {
        return view('aboutUs', [
            'title' => 'About Us',
            'active' => 'aboutUs'
        ]);
    }
}
