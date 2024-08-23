<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{

    // protected $fillable = [
    //     'user_id','vendor_type', 'product_category_ids', 'service_category_ids', 'status'
    // ];
    protected $fillable = ['user_id'];
    protected $with = ['user_id', 'user', 'user.shop'];

  public function user(){
  	return $this->belongsTo(User::class);
  }

  public function payments(){
  	return $this->hasMany(Payment::class);
  }


}
