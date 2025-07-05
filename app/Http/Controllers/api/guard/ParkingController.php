<?php
namespace App\Http\Controllers\api\guard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\BookingInvoice;
use App\Models\Parking;
use App\Models\ParkingSlot;
use App\Models\Vehicle;
use DB;
use Illuminate\Http\Request;
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

    // book now
      public function book_parking(BookingRequest $request)
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
    // parking Bookings
    public function parking_bookings(Request $request)
    {
        $booking = Booking::query();
        $booking->where('parking_id', auth()->user()->guardParkingId());
        $data = $booking->latest()->paginate(20);
        return response()->json([
            'status'  => true,
            'data'    => $data,
            'message' => 'Booking List',
        ]);
    }

    // pay for bookings
    public function pay_invoice(Request $request){
        $data=$request->validate([
            'invoice_id'=>'required|exists:booking_invoices,id',
            'paid_amount'=>'required|decimal:2'
        ]);
        $res=BookingInvoice::find($data['invoice_id']);
        if($res->status=='paid'){
            return response()->json(['status'=>true,'data'=>$res,'message'=>'Invoice is already Paid']);
        }
        $res->update(['paid_amount'=>$data['paid_amount'],'status'=>'paid','payment_mode'=>'offline','collect_by'=>auth()->id()]);
        return response()->json([
            'status'=>true,
            'data'=>$res,
            'message'=>'Invoice paid sucessfully'
        ]);
    }
}
