<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_wise_offer extends Model
{
    protected $fillable = ['category_id','banner','slug_url'];
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
