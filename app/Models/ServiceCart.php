<?php

namespace App\Models;
use App\Models\User;
use App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class ServiceCart extends Model
{
    protected $guarded = [];
    protected $table = 'service_carts';
    protected $fillable = ['address_id','price','total_price','tax','shipping_cost','discount','product_referral_code','coupon_code','coupon_applied','quantity','user_id','temp_user_id','owner_id','service_id','variation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
         return $this->belongsTo(Service::class);
        //return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}