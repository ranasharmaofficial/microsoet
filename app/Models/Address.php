<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['first_name','last_name','phone','area','address','pin','house_no','city','state','user_id','address_type','set_default'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}