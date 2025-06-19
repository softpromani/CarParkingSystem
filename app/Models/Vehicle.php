<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['registration_number', 'owner_id', 'driver_id', 'model_id', 'brand_id', 'color', 'tyre', 'type'];

}
