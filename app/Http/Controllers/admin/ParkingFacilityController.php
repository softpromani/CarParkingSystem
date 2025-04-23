<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ParkingFacility;
use Illuminate\Http\Request;

class ParkingFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkings = ParkingFacility::all();
        return view('admin.parking-facility', compact('parkings'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        // Store image in 'public/brand'
        $path = $request->file('image')->store('parking', 'public');

        ParkingFacility::create([
            'name' => $validated['name'],
            'image' => $path,
        ]);

        toast('Parking Facility Created Successfully!', 'success');
        return redirect()->route('admin.parking-facility.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parking = ParkingFacility::findOrFail($id); // ✅ This is one record
        $parkings = ParkingFacility::all();          // ✅ This is the full list

        return view('admin.parking-facility', compact('parking', 'parkings'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $parking = ParkingFacility::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old file if exists
            if ($parking->image && \Storage::disk('public')->exists(path: $parking->image)) {
                \Storage::disk('public')->delete($parking->image);
            }

            // Store new image
            $path = $request->file('image')->store('parking', 'public');
            $parking->image = $path;
        }

        $parking->name = $validated['name'];
        $parking->save();

        toast('Parking Facility Updated Successfully!', 'success');
        return redirect()->route('admin.parking-facility.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parking = ParkingFacility::findOrFail($id);

        if ($parking->image && \Storage::disk('public')->exists($parking->image)) {
            \Storage::disk('public')->delete($parking->image);
        }

        $parking->delete();

        toast('Parking Facility Deleted Successfully!', 'success');
        return redirect()->route('admin.parking-facility.index');
    }
}
