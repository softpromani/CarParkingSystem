<?php
namespace App\Http\Controllers\api\vehicleOwner;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\PayInvoiceRequest;
use App\Models\Booking;
use App\Models\BookingInvoice;
use App\Models\ParkingSlot;
use App\Models\Vehicle;
use App\Models\WalletHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $query = Booking::with(['parking', 'vehicle', 'invoice'])
            ->where('vehicle_owner_id', auth()->id());

        // Optional filters
        if ($request->filled('parking_id')) {
            $query->where('parking_id', $request->parking_id);
        }

        if ($request->filled('vehicle_id')) {
            $query->where('vehicle_id', $request->vehicle_id);
        }

        $data = $query->paginate(10)->withQueryString();

        return response()->json([
            'status'  => true,
            'data'    => $data,
            'message' => 'Your Booking List',
        ]);
    }

    public function pay(PayInvoiceRequest $req)
    {
        $data = $req->validated();
        $inv  = BookingInvoice::find($req->invoice_id);
        switch ($req->payment_mode) {
            case 'online':
                $inv->payment_mode   = 'online';
                $inv->paid_amount    = $req->amount;
                $inv->transaction_no = $req->transaction_no;
                $inv->status         = 'paid';
                return $inv->update();
            case 'wallet':
                return $this->walletPay($inv, $data);
            default:
                abort(404);
        }
    }
    private function walletPay(BookingInvoice $inv, array $data)
    {
        if (auth()->user()->wallet_amount >= $inv['amount_to_pay']) {
            DB::transaction(function () use ($inv, $data) {
                WalletHistory::create([
                    'user_id'        => auth()->id(),
                    'type'           => 'debit',
                    'amount'         => $inv['amount_to_pay'],
                    'payment_method' => 'wallet',
                    'note'           => 'charge for parking',
                ]);
                $inv->payment_mode   = 'wallet';
                $inv->paid_amount    = $inv->amount_to_pay;
                $inv->transaction_no = $inv->booking_id;
                $inv->status         = 'paid';
                $inv->is_submitted_to_admin=true;
                $inv->submitted_at=Carbon::now();
                $inv->update();
            });
            return response()->json(['status' => true, 'message' => 'Invoice Paid successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Insufficient balance in your wallet']);
        }
    }

}
