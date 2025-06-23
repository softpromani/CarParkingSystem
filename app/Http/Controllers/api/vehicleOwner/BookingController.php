<?php
namespace App\Http\Controllers\api\vehicleOwner;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\ParkingSlot;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function store(BookingRequest $request)
    {
        $data                     = $request->validated();
        $slot                     = ParkingSlot::find($data['slot_id']);
        $data['vehicle_owner_id'] = Vehicle::find($data['vehicle_id'])->owner_id;

        if ($slot) {
            if (Booking::isSlotBooked($data['slot_id'], $data['booking_from_time'], $data['booking_to_time'])) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Slot is already booked during the selected time.',
                ]);
            }
            if ($slot->status == 'available') {
                $booking = null; // Define variable outside closure
                DB::transaction(function () use ($data, $slot, &$booking) {
                    $booking = Booking::create([
                        'booking_no'        => Booking::newBookingNo($slot['parking_id']),
                        'parking_id'        => $slot->parking_id,
                        'slot_id'           => $data['slot_id'],
                        'vehicle_id'        => $data['vehicle_id'],
                        'vehicle_owner_id'  => $data['vehicle_owner_id'],
                        'booking_from_time' => $data['booking_from_time'],
                        'booking_to_time'   => $data['booking_to_time'],
                        'booked_by'         => auth()->id(), // if user is logged in
                    ]);
                });

                return response()->json([
                    'status'  => true,
                    'data'    => $booking,
                    'message' => 'Booking created successfully',
                ]);
            }
            return response()->json([
                'status'  => false,
                'data'    => null,
                'message' => 'Sorry This Slot is not Available more',
            ]);
        }
        return response()->json([
            'status'  => false,
            'data'    => null,
            'message' => 'Invalid Slot Selection',
        ]);
    }
}
