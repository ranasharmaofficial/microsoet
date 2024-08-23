<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    // use HasFactory;
    public function pro(){
    	return $this->hasMany(Product::class);
    }
    public function flash_deal_products()
    {
        return $this->hasMany(FlashDealProduct::class);
    }
}