<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCategoryUpdateRequest extends Model
{
    protected $fillable = [
        'user_id','vendor_type', 'product_category_ids', 'service_category_ids', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
