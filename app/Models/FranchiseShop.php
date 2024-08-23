<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseShop extends Model
{

  protected $fillable = ['user_id'];
  protected $with = ['user'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
