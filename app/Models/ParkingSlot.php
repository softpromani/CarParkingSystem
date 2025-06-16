<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    protected $fillable = [
        'parking_id', 'type', 'label', 'x', 'y', 'width', 'height', 'rotation', 'status',
    ];

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
