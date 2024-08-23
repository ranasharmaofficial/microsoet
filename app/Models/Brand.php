<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Support\Arr;

class Brand extends Model
{

  protected $with = ['brand_translations'];

  public function getTranslation($field = '', $lang = false){
      $lang = $lang == false ? App::getLocale() : $lang;
      $brand_translation = $this->brand_translations->where('lang', $lang)->first();
      return $brand_translation != null ? $brand_translation->$field : $this->$field;
  }

  public function brand_translations(){
    return $this->hasMany(BrandTranslation::class);
  }

  public function products(){
    return $this->hasMany(Product::class);
  }

  public function services(){
    return $this->hasMany(Service::class);
  }

  //Used for category and brand wise product count
  public function categoryWiseProducts($category_id, $level){
    $category_id_array = [];
    if($level == 0){
        $second_category_ids = Category::where('parent_id', $category_id)->get()->pluck('id');
        $third_category_ids = Category::whereIn('parent_id', $second_category_ids)->get()->pluck('id');
        $category_id_array = Arr::collapse([$second_category_ids, $third_category_ids]);
    }elseif($level == 1){
      $category_id_array = Category::where('parent_id', $category_id)->get()->pluck('id');
      $category_id_array[] = $category_id;
    }elseif($level == 2){
      $category_id_array[] = $category_id;
    } 
    $product_count = $this->products->whereIn('category_id', $category_id_array)->where('approved', 1)->where('published', 1)->count();
    return $product_count;
  }
  
   //Used for category and brand wise product count
   public function categoryWiseServiceCount($category_id, $level){
    $category_id_array = [];
    if($level == 0){
        $second_category_ids = Category::where('parent_id', $category_id)->get()->pluck('id');
        $third_category_ids = Category::whereIn('parent_id', $second_category_ids)->get()->pluck('id');
        $category_id_array = Arr::collapse([$second_category_ids, $third_category_ids]);
    }elseif($level == 1){
      $category_id_array = Category::where('parent_id', $category_id)->get()->pluck('id');
      $category_id_array[] = $category_id;
    }elseif($level == 2){
      $category_id_array[] = $category_id;
    } 
    $service_count = $this->services->whereIn('category_id', $category_id_array)->where('approved', 1)->where('published', 1)->count();
    return $service_count;
  }

}
