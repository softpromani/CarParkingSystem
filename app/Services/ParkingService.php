<?php
namespace App\Services;

use App\Models\Booking;
use App\Models\BookingInvoice;
use App\Models\ParkingSlot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ParkingService
{
    /**
     * Mark a vehicle as parked-in.
     */
    public function parkIn(int $bookingId, int $parkingId, string $userby): bool | string
    {
        return DB::transaction(function () use ($bookingId, $parkingId, $userby) {
            $booking = Booking::find($bookingId);
            if (! $booking) {
                return 'Booking not found.';
            }
            switch ($userby) {
                case 'owner':if ($booking->vehicle_owner_id != auth()->id()) {
                        return 'you are not eligible to park this vehicle';
                    }break;
                case 'guard':if ($booking->parking_id != auth()->user()->guardParkingId()) {
                        return 'you are not eligible to park this vehicle';
                    }
            }
            if ($booking->parking_id != $parkingId) {
                return 'Booking not valid for this Parking';
            }
            if ($booking->park_in) {
                return 'Vehicle already parked in.';
            }

            $booking->park_in    = now();
            $booking->park_in_by = auth()->id();
            $booking->save();

            // Optionally update the slot status
            ParkingSlot::where('id', $booking->slot_id)->update(['status' => 'booked']);

            return true;
        });
    }

    /**
     * Mark a vehicle as parked-out.
     */
    public function parkOut(int $bookingId, int $parkingId, string $userby): string | array
    {
        return DB::transaction(function () use ($bookingId, $parkingId, $userby) {
            $booking = Booking::find($bookingId);
             switch ($userby) {
                case 'owner':if ($booking->vehicle_owner_id != auth()->id()) {
                        return 'you are not eligible to park this vehicle';
                    }break;
                case 'guard':if ($booking->parking_id != auth()->user()->guardParkingId()) {
                        return 'you are not eligible to park this vehicle';
                    }
            }

            if (! $booking) {
                return 'Booking not found.';
            }
            if ($booking->parking_id != $parkingId) {
                return 'Booking not valid for this Parking';
            }
            if (! $booking->park_in) {
                return 'Vehicle not yet parked in.';
            }

            if ($booking->park_out) {
                return 'Vehicle already parked out.';
            }
            $parkIn                     = Carbon::parse($booking->park_in); // e.g., '2025-06-17 10:00:00'
            $parkOut                    = Carbon::parse(now());             // e.g., '2025-06-17 12:30:00'
            $durationInMinutes          = $parkIn->diffInMinutes($parkOut);
            $booking->park_out          = now();
            $booking->park_out_by       = auth()->id();
            $booking->total_parked_time = $durationInMinutes;
            $booking->status            = 'completed';
            $booking->save();
            $fare                   = $this->fareCalculation($booking);
            $booking->total_charge  = $fare['total_fare'];
            $booking->price_breakup = $fare;
            $booking->save();
            // Free the slot
            ParkingSlot::where('id', $booking->slot_id)->update(['status' => 'available']);
            $invoice = BookingInvoice::create(
                [
                    'booking_id'    => $booking->id,
                    'amount'        => $booking->total_charge,
                    'amount_to_pay' => $booking->total_charge,

                ]
            );
            return ['parking_time' => $durationInMinutes, 'amount' => $fare['total_fare'], 'fare_breakup' => $fare, 'invoice_id' => $invoice->id];
        });
    }

    private function fareCalculation(Booking $booking)
    {
        $vehicleType = $booking->vehicle?->type;
        $parking     = $booking->parking;
        // Determine base price
        $parkingCharge = match ($vehicleType) {
            'car' => $parking->car_price,
            'bike' => $parking->motorcycle_price,
            'heavy-vehicle' => $parking->heavy_vehicle_price,
            default => 0,
        };
        // Get charge unit in minutes
        $chargeUnitMinutes = $parking->charge_unit;
        // Total parked duration in minutes
        $totalMinutes = $booking->total_parked_time;

        // Calculate how many units fit in total minutes (round up)
        $units = (int) ceil($totalMinutes / $chargeUnitMinutes);
        // Final price
        $totalCharge = $units * $parkingCharge;

        return ['total_fare' => $totalCharge, 'fine' => 0.00, 'tax' => 0.00, 'fare' => $totalCharge];
    }
}
