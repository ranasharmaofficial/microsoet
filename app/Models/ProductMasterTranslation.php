<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMasterTranslation extends Model
{
    protected $fillable = ['product_id', 'name', 'lang'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
