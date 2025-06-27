<?php
namespace App\Http\Controllers\api\vehicleOwner;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParkInOutRequest;
use App\Models\Booking;
use App\Models\Parking;
use App\Services\ParkingService;
use Illuminate\Http\Request;

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
    public function slots(Request $request)
    {
        $data = $request->validate([
            'parking_id'        => 'required|exists:parkings,id',
            'booking_from_time' => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:' . now()->format('Y-m-d H:i:s'),
            ],

            'booking_to_time'   => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:booking_from_time',
            ],
        ]);
        $slots = Parking::find($data['parking_id'])->slots;
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
                'data'    => $slots,
                'message' => 'slots available',
            ]);
        }
        return response()->json([
            'status'  => false,
            'message' => 'No Slots Available',
        ]);
    }

    public function park_in_out(ParkInOutRequest $parkInOutRequest, ParkingService $service)
    {
        if (Booking::find($parkInOutRequest->booking_id)->park_in) {
            $result = $service->parkOut($parkInOutRequest->booking_id, $parkInOutRequest->parking_id, $parkInOutRequest->user_by);

            return is_string($result)
            ? response()->json(['status' => false, 'message' => $result])
            : response()->json(['status' => true, 'message' => 'Park-out successful', 'data' => $result]);
        }

        $result = $service->parkIn($parkInOutRequest->booking_id, $parkInOutRequest->parking_id, $parkInOutRequest->user_by);

        return is_string($result)
        ? response()->json(['status' => false, 'message' => $result])
        : response()->json(['status' => true, 'message' => 'Park-in successful']);

    }
    public function parking_show($parkingId)
    {
        return response()->json([
            'status'  => true,
            'data'    => Parking::with(['facilities'])->withCount(['slots'])->find($parkingId),
            'message' => 'Parking Detail Fetch',
        ]);
    }
}
