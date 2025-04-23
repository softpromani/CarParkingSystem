<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkings = Parking::all();
        return view('admin.parking.index', compact('parkings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.parking.create', compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'           => 'required|exists:users,id',
            'name'              => 'nullable|string|max:255',
            'address'           => 'nullable|string|max:255',
            'description'       => 'nullable|string|max:1000',
            'car_count'         => 'nullable|integer',
            'motorcycle_count'  => 'nullable|integer',
            'car_price'         => 'nullable|numeric',
            'motorcycle_price'  => 'nullable|numeric',
            'latitude'          => 'nullable|string',
            'longitude'         => 'nullable|string',
            'created_by'        => 'nullable|string',
            'image'        => 'nullable',

        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('parking', 'public');
        }



        // Save parking data
        Parking::create([
            'user_id'           => $validated['user_id'],
            'name'              => $validated['name'],
            'address'           => $validated['address'],
            'description'       => $validated['description'],
            'car_count'         => $validated['car_count'],
            'motorcycle_count'  => $validated['motorcycle_count'],
            'totalspace_count'  => $validated['car_count'],
            'car_price'         => $validated['car_price'],
            'motorcycle_price'  => $validated['motorcycle_price'],
            'latitude'          => $validated['latitude'],
            'longitude'         => $validated['longitude'],
            'image' => $imagePath,

        ]);



        toast('Parking Created Successfully!', 'success');
        return redirect()->route('admin.parking.index');
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
        $parkings = Parking::all(); // correct this line
        $editparking = Parking::findOrFail($id);
        $users = User::all();

        return view('admin.parking.create', compact('parkings', 'editparking', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parking $parking)
    {
        $validated = $request->validate([
            'user_id'           => 'required|exists:users,id',
            'name'              => 'nullable|string|max:255',
            'address'           => 'nullable|string|max:255',
            'description'       => 'nullable|string|max:1000',
            'car_count'         => 'nullable|integer',
            'motorcycle_count'  => 'nullable|integer',
            'car_price'         => 'nullable|numeric',
            'motorcycle_price'  => 'nullable|numeric',
            'latitude'          => 'nullable|string',
            'longitude'         => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($parking->image && Storage::disk('public')->exists($parking->image)) {
                Storage::disk('public')->delete($parking->image);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('parking', 'public');
            $validated['image'] = $imagePath;
        }

        // Update parking data
        $parking->update([
            'user_id'           => $validated['user_id'],
            'name'              => $validated['name'],
            'address'           => $validated['address'],
            'description'       => $validated['description'],
            'car_count'         => $validated['car_count'],
            'motorcycle_count'  => $validated['motorcycle_count'],
            'totalspace_count'  => $validated['car_count'],
            'car_price'         => $validated['car_price'],
            'motorcycle_price'  => $validated['motorcycle_price'],
            'latitude'          => $validated['latitude'],
            'longitude'         => $validated['longitude'],
            'image'             => $validated['image'] ?? $parking->image, // Keep old if not changed
        ]);

        toast('Parking Updated Successfully!', 'success');
        return redirect()->route('admin.parking.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $parking = Parking::findOrFail($id);
        if ($parking->image && Storage::disk('public')->exists($parking->image)) {
            Storage::disk('public')->delete($parking->image);
        }

        // Delete the record
        $parking->delete();

        toast('Parking Deleted Successfully!', 'success');
        return redirect()->route('admin.parking.index');
    }
}
