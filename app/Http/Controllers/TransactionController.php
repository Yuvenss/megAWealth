<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
}
