<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $fillable = ['registration_number', 'owner_id', 'driver_id', 'model_id', 'brand_id', 'color', 'tyre', 'type'];
    protected $with=['brnad_model','brand'];
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function brand_model(): BelongsTo
    {
        return $this->belongsTo(BrandModel::class, 'model_id');
    }

}
