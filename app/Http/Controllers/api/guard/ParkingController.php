<?php
namespace App\Http\Controllers\api\guard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Parking;
use App\Models\Vehicle;
use Request;

class ParkingController extends Controller
{
    public function slots(Request $request)
    {
        $data = $request->validate([
            'registration_number' => ['required', 'regex:/^(BP|BG|BT|CD|DPR|G|RBP)-[1-9]-[A-Z]\d{1,4}$/'],
            'tyre'                => 'required|integer',
            'type'                => 'required|in:car,bike,heavy-vehicle',
            'booking_from_time'   => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:' . now()->format('Y-m-d H:i:s'),
            ],

            'booking_to_time'     => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:booking_from_time',
            ],
        ]);
        $vehicle = Vehicle::firstOrCreate(['registration_number' => $data['registration_number'], ['type' => $data['type'], 'tyre' => $data['tyre']]]);
        $slots   = Parking::find(auth()->user()->guardParkingId())->slots;
        if ($slots->isNotEmpty()) {
            $slots->transform(function ($slot) use ($data) {
                $slot->current_status = Booking::isSlotBooked(
                    $slot->id,
                    $data['booking_from_time'],
                    $data['booking_to_time']
                ) ? 'booked' : 'available';
                return $slot;
            });
            return response()->json([
                'status'  => true,
                'data'    => ['slots' => $slots, 'vehicle' => $vehicle],
                'message' => 'slots available',
            ]);
        }
        return response()->json([
            'status'  => false,
            'message' => 'No Slots Available',
        ]);
    }
}
