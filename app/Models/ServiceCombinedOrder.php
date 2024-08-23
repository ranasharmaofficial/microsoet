<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCombinedOrder extends Model
{
    public function orders(){
    	return $this->hasMany(ServiceOrder::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}