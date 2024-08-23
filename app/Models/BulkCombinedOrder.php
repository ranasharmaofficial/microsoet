<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;

class BulkCombinedOrder extends Model
{
    public function orders(){
    	return $this->hasMany(BulkOrder::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}