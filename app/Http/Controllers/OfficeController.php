<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manage_company.manageCompany',[
            'title' => 'Manage Company',
            'active' => 'manage company',
            'offices' => Office::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_company.addOffice', [
            'title' => 'Add Office',
            'active' => 'manage company'
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
            'name' => 'required|max:255',
            'address' => 'required',
            'contact' => 'required|max:255',
            'phone' => 'required|max:15',
            'image' => 'required|image|mimes:jpeg,png,jpg|file|max:10240',
        ]);

        $office = new Office();
        $office->office_id = Str::uuid();
        $office->office_name = $request->name;
        $office->office_address = $request->address;
        $office->office_contact_name = $request->contact;
        $office->office_phone_num = $request->phone;
        $office->office_image = $request->file('image')->store('office-pict');
        $office->save();

        return redirect('/offices')->with('success', 'Office Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('admin.manage_company.updateOffice', [
            'title' => 'Update Office',
            'active' => 'manage company',
            'office' => $office
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'contact' => 'required|max:255',
            'phone' => 'required|max:15',
        ]);

        Office::where('office_id', $office->office_id)->update([
            'office_name' => $request->name,
            'office_address' => $request->address,
            'office_contact_name' => $request->contact,
            'office_phone_num' => $request->phone,
        ]);

        return redirect('/offices')->with('success', 'Office Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        Storage::delete($office->office_image);

        Office::destroy($office->office_id);

        return redirect('/offices')->with('success', 'Office Deleted Successfully!!');
    }
}
