<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEnquiry extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'vendor_id', 'service_id', 'service_name', 'category_id', 'nature_work', 'property_type', 'location', 'gst', 'additional_info'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
