<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart_item;
use App\Models\Property;

class FrontEndController extends Controller
{
    public function home () {
        return view('home', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }

    private function preSearch () {
        $search = array_map('trim', explode(',', request('search')));
        $filters = array();
        $filters['address'] = '';
        if(request('sales_type')) {
            $filters['sales_type'] = request('sales_type');
            foreach ($search as $item) {
                if(strcasecmp($item, 'House') == 0) {
                    $filters['type'] = 'House';
                } else if (strcasecmp($item, 'Apartment') == 0) {
                    $filters['type'] = 'Apartment';
                } else {
                    $filters['address'] .= ' '.$item;
                }
            }
        } else {
            foreach ($search as $item) {
                if(strcasecmp($item, 'House') == 0) {
                    $filters['type'] = 'House';
                } else if (strcasecmp($item, 'Apartment') == 0) {
                    $filters['type'] = 'Apartment';
                } else if (strcasecmp($item, 'Rent') == 0) {
                    $filters['sales_type'] = 'Rent';
                } else if (strcasecmp($item, 'Buy') == 0) {
                    $filters['sales_type'] = 'Sale';
                } else {
                    $filters['address'] .= ' '.$item;
                }
            }
        }
        if (empty($filters['address'])) {
            unset($filters['address']);
        } else {
            $filters['address'] = trim($filters['address']);
        }
        return $filters;
    }

    public function search () {
        if (empty(request('search'))) {
            return back();
        }
        $filters = $this->preSearch();
        return view('search', [
            'title' => 'Search Results',
            'active' => '',
            'properties' => Property::filter($filters)->paginate(4)->withQueryString()
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
            'active' => 'rent',
            'properties' => Property::where([
                ['property_sales_type', 'Rent'],
                ['property_status', 'Available']
            ])->paginate(4)
        ]);
    }

    public function buy () {
        return view('userAndGuest.buy', [
            'title' => 'Buy Page',
            'active' => 'buy',
            'properties' => Property::where([
                ['property_sales_type', 'Sale'],
                ['property_status', 'Available']
            ])->paginate(4)
        ]);
    }

    public function cart () {
        return view('user.cart', [
            'title' => 'Cart',
            'active' => 'cart',
            'cartItems' => Cart_item::where('user_id', auth()->user()->user_id)->paginate(4)
        ]);
    }
}
