<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;

class BulkOrder extends Model
{
    protected $fillable = ['delivery_status'];
    
    public function BulkorderDetails()
    {
        return $this->hasMany(BulkOrderDetail::class);
        
    }
    
    public function Address()
    {
        // return $this->hasMany(Address::class);
        return $this->belongsTo(Address::class, 'address_id','id');
    }

    public function refund_requests()
    {
        return $this->hasMany(RefundRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->hasOne(Shop::class, 'user_id', 'seller_id');
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }

    public function affiliate_log()
    {
        return $this->hasMany(AffiliateLog::class);
    }

    public function club_point()
    {
        return $this->hasMany(ClubPoint::class);
    }

    public function delivery_boy()
    {
        return $this->belongsTo(User::class, 'assign_delivery_boy', 'id');
    }

    public function proxy_cart_reference_id()
    {
        return $this->hasMany(ProxyPayment::class)->select('reference_id');
    }
}