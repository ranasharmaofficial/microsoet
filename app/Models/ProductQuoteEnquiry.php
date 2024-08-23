<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuoteEnquiry extends Model
{
    protected $fillable=['name','email','phone','price_range','message','category','type'];
     
   
}