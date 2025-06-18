<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\ParkingFacility;
use App\Models\ParkingSection;
use App\Models\ParkingSlot;
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
                        <button onclick="deleteUser(' . $row->id . ')" class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i></button>
                        <a href="' . route('admin.parking.slot', $row->id) . '" class="btn"><i class="fa-solid fa-square-parking fa-2x"></i></a>';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.parking.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users          = User::all();
        $parkings       = ParkingFacility::all();
        $parkingSection = ParkingSection::all();
        return view('admin.parking.create', compact('users', 'parkings', 'parkingSection'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'             => 'required|exists:users,id',
            'name'                => 'nullable|string|max:255',
            'address'             => 'nullable|string|max:255',
            'description'         => 'nullable|string|max:1000',
            'car_price'           => 'nullable|numeric',
            'motorcycle_price'    => 'nullable|numeric',
            'heavy_vehicle_price' => 'nullable|numeric',
            'latitude'            => 'nullable|string',
            'longitude'           => 'nullable|string',
            'charge_unit'         => 'nullable|numeric',
            'created_by'          => 'nullable|string',
            'image'               => 'nullable',

        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('parking', 'public');
        }

        // Save parking data
        $parking = Parking::create([
            'user_id'             => $validated['user_id'],
            'name'                => $validated['name'],
            'address'             => $validated['address'],
            'description'         => $validated['description'],
            'car_price'           => $validated['car_price'],
            'heavy_vehicle_price' => $validated['heavy_vehicle_price'],
            'motorcycle_price'    => $validated['motorcycle_price'],
            'latitude'            => $validated['latitude'],
            'longitude'           => $validated['longitude'],
            'charge_unit'         => $validated['charge_unit'],
            'image'               => $imagePath,

        ]);

        $parking->facilities()->attach($request->parking_facility_id);

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
        $parkings = ParkingFacility::all(); // correct this line

        $editparking = Parking::findOrFail($id);
        $users       = User::all();

        return view('admin.parking.create', compact('parkings', 'editparking', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parking $parking)
    {
        $validated = $request->validate([
            'user_id'          => 'required|exists:users,id',
            'name'             => 'nullable|string|max:255',
            'address'          => 'nullable|string|max:255',
            'description'      => 'nullable|string|max:1000',
            'car_price'        => 'nullable|numeric',
            'motorcycle_price' => 'nullable|numeric',
            'latitude'         => 'nullable|string',
            'longitude'        => 'nullable|string',
            'charge_unit'      => 'nullable|numeric',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($parking->image && Storage::disk('public')->exists($parking->image)) {
                Storage::disk('public')->delete($parking->image);
            }

            // Upload new image
            $imagePath          = $request->file('image')->store('parking', 'public');
            $validated['image'] = $imagePath;
        }

        // Update parking data
        $parking->update([
            'user_id'          => $validated['user_id'],
            'name'             => $validated['name'],
            'address'          => $validated['address'],
            'description'      => $validated['description'],
            'car_price'        => $validated['car_price'],
            'motorcycle_price' => $validated['motorcycle_price'],
            'latitude'         => $validated['latitude'],
            'longitude'        => $validated['longitude'],
            'charge_unit'      => $validated['charge_unit'],
            'image'            => $validated['image'] ?? $parking->image, // Keep old if not changed
        ]);

        $parking->facilities()->sync($request->parking_facility_id);

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

        $parking->facilities()->detach();

        // Delete the record
        $parking->delete();

        return response()->json([
            'status'  => true,
            'message' => "User deleted Successfully!",
        ]);
    }

    public function parkingSlot($parkingId)
    {
        $parking = Parking::findorFail($parkingId);
        $slots   = $parking->slots;
        return view('admin.parking.space', compact('parking', 'slots'));
    }
    public function parkingSlotSave(Request $request)
    {
        $data = $request->validate([
            'parking_id'  => 'required|exists:parkings,id',
            'layout_data' => 'required|string',
        ]);
        $slots = collect(json_decode($data['layout_data'], true));
        ParkingSlot::where('parking_id', $data['parking_id'])->delete();
        foreach ($slots as $item) {
            ParkingSlot::create([
                'parking_id' => $data['parking_id'],
                'type'       => $item['type'],
                'label'      => $item['label'],
                'x'          => $item['x'],
                'y'          => $item['y'],
                'width'      => $item['width'],
                'height'     => $item['height'],
                'rotation'   => $item['rotation'],
                'status'     => in_array($item['type'], ['car', 'bike', 'heavy']) ? 'available' : 'reserved',
            ]);
        }
        return back()->with('success', 'Layout saved successfully.');
    }

}
