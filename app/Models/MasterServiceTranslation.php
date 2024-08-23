<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterServiceTranslation extends Model
{
  protected $fillable = ['service_id','name', 'lang'];
  
  public function master_service(){
      return $this->belongsTo(MasterService::class);
    }
}