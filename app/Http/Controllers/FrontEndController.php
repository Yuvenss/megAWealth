<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function home () {
        return view('home', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }

    public function aboutUs () {
        return view('userAndGuest.aboutUs', [
            'title' => 'About Us',
            'active' => 'aboutUs',
            'offices' => Office::paginate(5)
        ]);
    }

    public function rent () {
        return view('userAndGuest.rent', [
            'title' => 'Rent Page',
            'active' => 'rent'
        ]);
    }

    public function buy () {
        return view('userAndGuest.buy', [
            'title' => 'Buy Page',
            'active' => 'buy'
        ]);
    }
}
