<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Cart_item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function finishTransaction (Property $property) {
        Property::where('property_id', $property->property_id)->update([
            'property_status' => 'Sold'
        ]);

        return redirect('/properties')->with('success', 'Transaction completed successfully');
    }

    public function addToCart (Property $property) {
        $cartItem = new Cart_item();
        $cartItem->user_id = auth()->user()->user_id;
        $cartItem->property_id = $property->property_id;
        $cartItem->save();

        Property::where('property_id', $property->property_id)->update([
            'property_status' => 'Booked'
        ]);

        return back()->with('success', 'Property added to cart successfully');
    }

    public function removeFromCart (Property $property) {
        Cart_item::where([
            ['user_id', auth()->user()->user_id],
            ['property_id', $property->property_id]
        ])->delete();

        Property::where('property_id', $property->property_id)->update([
            'property_status' => 'Available'
        ]);

        return redirect('/cart')->with('success', 'Cart item removed successfully');
    }

    public function checkout () {
        $cart_items = Cart_item::where('user_id', auth()->user()->user_id)->get();
        foreach ($cart_items as $item) {
            Property::where('property_id', $item->property_id)->update([
                'property_status' => 'Sold'
            ]);
        }
        Cart_item::where('user_id', auth()->user()->user_id)->delete();

        return redirect('/home')->with('success', 'Checkout successfull');
    }
}
