<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BulkCartCategory extends Model
{
    protected $guarded = [];
    protected $table = 'bulk_cart_categories';
    protected $fillable = ['user-id','category_id','type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}