<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchisePincode extends Model
{
    protected $fillable = ['franchise_id','pincode','state','city','address','taluk','status'];

    
}