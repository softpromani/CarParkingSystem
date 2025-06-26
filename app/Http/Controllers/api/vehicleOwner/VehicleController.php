<?php
namespace App\Http\Controllers\api\vehicleOwner;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vehicle::where('owner_id', auth()->id())->paginate(10);
        return response()->json(['status' => true, 'data' => $data, 'message' => 'your vehicles list']);
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
    public function store(VehicleRequest $req)
    {
        $data = $req->validated(); // Always use validated()

        // Assign owner ID from auth
        $data['owner_id'] = auth()->id();
        // Handle brand_name if brand_id is not provided
        if (empty($data['brand_id']) && ! empty($data['brand_name'])) {
            $brand            = Brand::firstOrCreate(['brand_name' => $data['brand_name']]);
            $data['brand_id'] = $brand->id;
        }
        // Handle model_name if model_id is not provided
        if (empty($data['model_id']) && ! empty($data['model_name'])) {
            $model            = BrandModel::firstOrCreate(['model_name' => $data['model_name']], ['brand_id' => $data['brand_id']]);
            $data['model_id'] = $model->id;
        }

        // Remove model_name and brand_name from data if present
        unset($data['model_name'], $data['brand_name']);

        // Create the vehicle
        $vehicle = Vehicle::create($data);
        return response()->json([
            'status'  => true,
            'data'    => $vehicle,
            'message' => 'Vehicle added successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($vehicle)
    {
        $vehicle = Vehicle::find($vehicle);

        if (! $vehicle) {
            return response()->json([
                'status'  => false,
                'message' => 'Vehicle not found',
            ], 404);
        }

        return response()->json([
            'status'  => true,
            'data'    => $vehicle,
            'message' => 'Vehicle fetch successfully',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $req, Vehicle $vehicle)
    {
        $data = $req->validated();

        // Handle brand_name if brand_id is not provided
        if (empty($data['brand_id']) && ! empty($data['brand_name'])) {
            $brand            = Brand::firstOrCreate(['brand_name' => $data['brand_name']]);
            $data['brand_id'] = $brand->id;
        }

        // Handle model_name if model_id is not provided
        if (empty($data['model_id']) && ! empty($data['model_name'])) {
            $model = BrandModel::firstOrCreate(
                ['model_name' => $data['model_name']],
                ['brand_id' => $data['brand_id']]
            );
            $data['model_id'] = $model->id;
        }

        // Remove model_name and brand_name from data
        unset($data['model_name'], $data['brand_name']);

        // Update the vehicle
        $vehicle->update($data);

        return response()->json([
            'status'  => true,
            'data'    => $vehicle,
            'message' => 'Vehicle updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
