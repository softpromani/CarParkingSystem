<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $guarded =[];

    public function facilities()
{
    return $this->belongsToMany(ParkingFacility::class, 'parking_facility_maps', 'parking_id', 'parking_facility_id');
}

}
