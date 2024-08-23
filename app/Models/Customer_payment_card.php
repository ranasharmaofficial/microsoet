<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_payment_card extends Model
{
    protected $fillable = [
        'user_id','credit_debit','card_no','expiry_month','expiry_year'
      ];
    use HasFactory;
}
