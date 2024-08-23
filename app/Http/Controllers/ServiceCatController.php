<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Category_wise_brand;
use App\Models\Category_wise_offer;

class ServiceCatController extends Controller
{
    public function ServiceSubCatbyCat($catslug){
        $subcategories = Category::where('slug', $catslug)->first();
        $getCatId = $subcategories->id;

        $firstFiveSubcat = Category::where('parent_id','=',$getCatId)->orderBy('order_level', 'asc')->limit(5)->get();
        $exceptFiveSubcat = Category::where('parent_id','=',$getCatId)->orderBy('order_level', 'asc')->take(PHP_INT_MAX)->skip(5)->get();

        $data = [
            'subcategories' => $subcategories,
            'getCatId' => $getCatId,
            'servicecategories' => Category::where('type', 2)->where('parent_id', 0)->orderBy('order_level', 'ASC')->get(),
            'subcatlist' => Category::where('parent_id','=',$getCatId)->orderBy('order_level', 'ASC')->get( ),
            'firstFiveSubcat' => $firstFiveSubcat,
            'exceptFiveSubcat' => $exceptFiveSubcat,
            'catwisebrands' => Category_wise_brand::where('category_id','=',$getCatId)->get(),
            'catwiseoffers' => Category_wise_offer::where('category_id','=',$getCatId)->get(),
        ];
        return view('frontend.service_sub_category', $data);
    }


}