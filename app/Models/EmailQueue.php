<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailQueue extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_identifier',
        'mail_from',
        'mail_to',
        'mail_subject',
        'mail_body'
    ];
}
