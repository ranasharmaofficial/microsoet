<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $with = ['category_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $category_translation = $this->category_translations->where('lang', $lang)->first();
        return $category_translation != null ? $category_translation->$field : $this->$field;
    }

    public function category_translations(){
    	return $this->hasMany(CategoryTranslation::class);
    }

    public function products(){
    	return $this->hasMany(Product::class);
    }

    public function getProductCount(){
        $category_id_array = [];
        if($this->level == 0){
            $second_category_ids = $this->categories->pluck('id');
            $third_category_ids = Category::whereIn('parent_id', $second_category_ids)->get()->pluck('id');
            $category_id_array = Arr::collapse([$second_category_ids, $third_category_ids]);
        }elseif($this->level == 1){
            $category_id_array = Category::where('parent_id', $this->id)->get()->pluck('id');
            $category_id_array[] = $this->id;
          }elseif($this->level == 2){
            $category_id_array[] = $this->id;
          }
        $category_count = Product::whereIn('category_id', $category_id_array)->where('approved', 1)->where('published', 1)->count();
        return $category_count;
    }

    public function getServiceCount(){
        $category_id_array = [];
        if($this->level == 0){
            $second_category_ids = $this->categories->pluck('id');
            $third_category_ids = Category::whereIn('parent_id', $second_category_ids)->get()->pluck('id');
            $category_id_array = Arr::collapse([$second_category_ids, $third_category_ids]);
        }elseif($this->level == 1){
            $category_id_array = Category::where('parent_id', $this->id)->get()->pluck('id');
            $category_id_array[] = $this->id;
          }elseif($this->level == 2){
            $category_id_array[] = $this->id;
          }
        $category_count = Service::whereIn('category_id', $category_id_array)->where('approved', 1)->where('published', 1)->count();
        return $category_count;
    }

    public function classified_products(){
    	return $this->hasMany(CustomerProduct::class);
    }

    public function activeCategories()
    {
        return $this->hasMany(Category::class, 'id', '');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}
