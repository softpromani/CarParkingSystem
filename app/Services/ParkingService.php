<?php
namespace App\Services;

use App\Models\Booking;
use App\Models\ParkingSlot;
use Illuminate\Support\Facades\DB;

class ParkingService
{
    /**
     * Mark a vehicle as parked-in.
     */
    public function parkIn(int $bookingId, string $userby): bool | string
    {
        return DB::transaction(function () use ($bookingId, $userby) {
            $booking = Booking::find($bookingId);
            if (! $booking) {
                return 'Booking not found.';
            }
            switch ($userby) {
                case 'owner':if ($booking->vehicle_owner_id != auth()->id()) {
                        return 'you are not eligible to park this vehicle';
                    }break;

            }
            if ($booking->park_in_time) {
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
    public function parkOut(int $bookingId): bool | string
    {
        return DB::transaction(function () use ($bookingId) {
            $booking = Booking::find($bookingId);

            if (! $booking) {
                return 'Booking not found.';
            }

            if (! $booking->park_in_time) {
                return 'Vehicle not yet parked in.';
            }

            if ($booking->park_out_time) {
                return 'Vehicle already parked out.';
            }

            $booking->park_out_time = now();
            $booking->save();

            // Free the slot
            ParkingSlot::where('id', $booking->slot_id)->update(['status' => 'available']);

            return true;
        });
    }
}
