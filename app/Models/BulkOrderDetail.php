<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BulkOrderDetail extends Model
{
    protected $fillable = ['bulk_order_id','delivery_status','product_id','price','tax','quantity','variation'];
    public function order()
    {
        return $this->belongsTo(BulkOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }

    public function refund_request()
    {
        return $this->hasOne(RefundRequest::class);
    }

    public function affiliate_log()
    {
        return $this->hasMany(AffiliateLog::class);
    }
}