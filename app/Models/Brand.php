<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   protected $guarded =[];

   // App\Models\Model.php


// App\Models\Model.php
public function models()
{
    return $this->hasMany(BrandModel::class, 'brand_id');
}


}
