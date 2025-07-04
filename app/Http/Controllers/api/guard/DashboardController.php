<?php
namespace App\Http\Controllers\api\guard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ParkingSlot;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $bookings                     = Booking::where('parking_id', auth()->user()->guardParkingId())->whereDate('booking_from_time', Carbon::today())->get();
        $data['bookings']             = $bookings;
        $data['today_bookings_count'] = $bookings->count();
        $data['available_slot']       = ParkingSlot::where('parking_id', auth()->user()->guardParkingId())->where('status', 'available')->count();
        return response()->json(['status' => true, 'data' => $data, 'message' => 'Your Parking Booking List fetch successfully']);

    }

    public function profile()
    {
        $data = User::with(['parking'])->find(auth()->id());
        return response()->json(['status' => true, 'data' => $data, 'message' => 'Guard Profile Fetch successfully']);

    }
}
