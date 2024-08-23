<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Category_wise_brand;
use App\Models\Category_wise_offer;

class CatController extends Controller
{
    public function subCatbyCat($catslug){
        $subcategories = Category::where('slug', $catslug)->first();
        $getCatId = $subcategories->id;
        
        $Subcategory_list = Category::where('parent_id','=',$getCatId)->orderBy('order_level', 'asc')->get();
        // $exceptFiveSubcat = Category::where('parent_id','=',$getCatId)->orderBy('order_level', 'asc')->take(PHP_INT_MAX)->skip(5)->get();

        $categories = Category::where('type', 1)->where('parent_id', 0)->orderBy('order_level', 'ASC')->get();
        foreach($categories as $category){
            $category->sub_category_count = Category::where('parent_id','=',$category->id)->count();
        }

        $data = [
            'subcategories' => $subcategories,
            'getCatId' => $getCatId,
            'categories' => $categories,
            'subcatlist' => Category::where('parent_id','=',$getCatId)->orderBy('order_level', 'ASC')->get( ),
            'Subcategory_list' => $Subcategory_list,
            // 'exceptFiveSubcat' => $exceptFiveSubcat,
            'catwisebrands' => Category_wise_brand::where('category_id','=',$getCatId)->get(),
            'catwiseoffers' => Category_wise_offer::where('category_id','=',$getCatId)->get(),
        ];
        return view('frontend.sub_category', $data);
    }


}