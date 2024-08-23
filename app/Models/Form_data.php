<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_data extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'phone_no',
        'email',
        'message',
        'form_type',
    ];
}