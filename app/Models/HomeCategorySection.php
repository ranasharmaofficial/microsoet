<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCategorySection extends Model
{
    
    protected $fillable = ['category_attribute','title','image','slug_url'];
    use HasFactory;
}
