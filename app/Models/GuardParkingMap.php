<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuardParkingMap extends Model
{
    protected $guarded =[];

    function user()
    {

        return $this->belongsTo(User::class,'guard_id');

    }

        function parking()
        
    {

        return $this->belongsTo(Parking::class,'parking_id');

    }
}
