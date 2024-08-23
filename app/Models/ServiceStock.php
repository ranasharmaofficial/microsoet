<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceStock extends Model
{
    protected $fillable = ['service_id', 'qty', 'price'];
    //
    public function service(){
    	return $this->belongsTo(Service::class);
    }

    public function wholesalePrices() {
        return $this->hasMany(WholesalePrice::class);
    }
}