<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manage_real_estates.manageRealEstates', [
            'title' => 'Manage Real Estates',
            'active' => 'manage real estates',
            'properties' => Property::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_real_estates.addProperty', [
            'title' => 'Add Real Estate',
            'active' => 'manage real estate'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sales' => 'required|not_in:0',
            'type' => 'required|not_in:0',
            'price' => 'required|numeric|min:0',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|file|max:10240',
        ]);

        $property = new Property();
        $property->property_id = Str::uuid();
        $property->property_sales_type = $request->sales;
        $property->property_type = $request->type;
        $property->property_price = $request->price;
        $property->property_address = $request->location;
        $property->property_status = 'Available';
        $property->property_image = $request->file('image')->store('property-pict');
        $property->save();

        return redirect('/properties')->with('success', 'Property added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('admin.manage_real_estates.updateProperty', [
            'title' => 'Update Real Estate',
            'active' => 'manage real estate',
            'property' => $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'sales' => 'required',
            'type' => 'required',
            'price' => 'required|numeric|min:0',
            'location' => 'required',
        ]);

        Property::where('property_id', $property->property_id)->update([
            'property_sales_type' => $request->sales,
            'property_type' => $request->type,
            'property_price' => $request->price,
            'property_address' => $request->location,
        ]);

        return redirect('/properties')->with('success', 'Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        Storage::delete($property->property_image);

        Transaction::where('property_id', $property->property_id)->delete();

        Property::destroy($property->property_id);

        return redirect('/properties')->with('success', 'Property deleted successfully');
    }
}
