<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function newBookingNo($parkingId)
    {
        $today = now()->format('dmy'); // DDMMYY

        // Count today's bookings for this parking_id
        $count = self::where('parking_id', $parkingId)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        $bookingSequence = str_pad($count + 1, 3, '0', STR_PAD_LEFT); // e.g., 001, 002

        return $today . $parkingId . '00' . $bookingSequence;
    }
    public static function isSlotBooked($slotId, $fromTime, $toTime)
    {
        return self::where('slot_id', $slotId)
            ->where(function ($query) use ($fromTime, $toTime) {
                $query->whereBetween('booking_from_time', [$fromTime, $toTime])
                    ->orWhereBetween('booking_to_time', [$fromTime, $toTime])
                    ->orWhere(function ($q) use ($fromTime, $toTime) {
                        $q->where('booking_from_time', '<=', $fromTime)
                            ->where('booking_to_time', '>=', $toTime);
                    });
            })
            ->exists();
    }
}
