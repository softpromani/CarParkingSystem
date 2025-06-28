<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $guarded = [];
    protected $appends = ['full_image'];

    public function facilities()
    {
        return $this->belongsToMany(ParkingFacility::class, 'parking_facility_maps', 'parking_id', 'parking_facility_id');
    }
    public function slots()
    {
        return $this->hasMany(ParkingSlot::class, 'parking_id');
    }
    public function getFullImageAttribute()
    {
        return asset('storage/' . $this->image);
    }

}
