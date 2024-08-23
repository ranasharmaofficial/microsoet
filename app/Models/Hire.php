<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'city',
        'apply_post',
        'enrollment_types',
        'photo',
        'message',
        
        
    ];
    
}