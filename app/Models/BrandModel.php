<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $guarded =[];

    // App\Models\BrandModel.php
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


}
