<?php
namespace App\Http\Controllers\api\vehicleOwner;

use App\Http\Controllers\Controller;
use App\Models\Parking;

class ParkingController extends Controller
{
    public function list()
    {
        $data = Parking::get();
        if ($data->isNotEmpty()) {
            return response()->json([
                'status'  => true,
                'data'    => $data,
                'message' => 'Parking List Fetch',
            ]);
        } else {
            return response()->json(['status' => false, 'message' => 'No Parking Available in your area']);
        }

    }
    public function slots($parkingId)
    {
        $slots = Parking::find($parkingId)->slots;
        if ($slots->isNotEmpty()) {
            return response()->json([
                'status'  => true,
                'data'    => $slots,
                'message' => 'slots available',
            ]);
        }
        return response()->json([
            'status'  => false,
            'message' => 'No Slots Available',
        ]);
    }
}
