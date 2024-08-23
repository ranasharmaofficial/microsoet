<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;
use App;
class MasterService extends Model
{
    protected $fillable = [
        'name', 'added_by', 'user_id', 'category_id', 'brand_id', 'video_provider', 'video_link', 'unit_price',
        'purchase_price', 'unit', 'slug', 'colors', 'choice_options', 'variations', 'thumbnail_img', 'meta_title', 'meta_description', 'broucher', 'service_video'
    ];

    protected $with = ['service_translations', 'taxes'];

    public function getTranslation($field = '', $lang = false) {
        $lang = $lang == false ? App::getLocale() : $lang;
        $service_translations = $this->service_translations->where('lang', $lang)->first();
        return $service_translations != null ? $service_translations->$field : $this->$field;
    }

    public function service_translations() {
        return $this->hasMany(MasterServiceTranslation::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orderDetails() {
        return $this->hasMany(ServiceOrderDetail::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    public function taxes() {
        return $this->hasMany(MasterServiceTax::class);
    }

}