<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $park = Parking::select(['id', 'name', 'image', 'address']); // Fields match karo
            return DataTables::of($park)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    $imageUrl = asset('storage/' . $row->image);
                    return '<img src="' . $imageUrl . '" alt="Image" width="60" height="60" style="object-fit: cover;">';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('admin.parking.edit', $row->id) . '" class="btn btn-sm btn-warning"> <i class="bi bi-pencil-square"></i></a>
                        <button onclick="deleteUser(' . $row->id . ')" class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i></button>';
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('admin.parking.index');
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

        return response()->json([
            'status' => true,
            'message' => "User deleted Successfully!"
        ]);
    }
}
