<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingFacility extends Model
{
    protected $guarded = [];
    protected $appends = ['full_image'];

    public function parkings()
    {
        return $this->belongsToMany(Parking::class, 'parking_facility_maps', 'parking_facility_id', 'parking_id');
    }
    public function getFullIage()
    {
        return asset('storage' . $this->image);
    }
}
