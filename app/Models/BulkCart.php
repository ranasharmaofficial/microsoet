<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BulkCart extends Model
{
    protected $guarded = [];
    protected $table = 'bulk_carts';
    protected $fillable = ['product_id','address_id','price','total_price','tax','shipping_cost','discount','product_referral_code','coupon_code','coupon_applied','quantity','user_id','temp_user_id','owner_id','variation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
         return $this->belongsTo(Product::class);
        //return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}