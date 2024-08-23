<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Category;
use App\Models\Category_wise_brand;
use App\Models\Brand;
use App\Models\BulkCart;
use App\Models\BulkCartCategory;
use Auth;
use Response;
use Illuminate\Support\Arr;

class BulkWebController extends Controller
{
    //All bulk order list 
    public function bulkOrderAllIndex(Request $request) {
        $currency = Currency::findOrFail(get_setting('system_default_currency'))->code;
        $parent_categories = Category::select('id', 'name', 'icon')->where('parent_id', 0)->where('type', 1)->get();
        
        $data = [
            'counter' => 1,
            'currency' => $currency,
            'parent_categories' => $parent_categories,
        ];
        return view('frontend.bulk_order.bulk_order_all', $data);
        
    }

    // filter product bulk order list by Ajax
    public function getFilterAllBulkOrderData(Request $request){
        $search_keys = $request->searchKey;
        $all_third_category_list = [];

        $query = Product::with('category', 'stocks');
        if($request->first_category){
            // $all_second_category_list = Category::with('childrenCategories')
            //     ->where('parent_id', $request->first_category)
            //     ->get()->pluck('id');
            // $all_third_category_list = Category::with('childrenCategories')
            //     ->whereIn('parent_id', $all_second_category_list)
            //     ->get()->pluck('id');

            // $all_category_list = Arr::collapse([$all_second_category_list, $all_third_category_list]);

            // $query->whereIn('category_id', $all_category_list);

            if($request->second_category != null){
                $all_third_category_list = Category::with('childrenCategories')
                    ->where('parent_id', $request->second_category)
                    ->get()->pluck('id');
                $all_third_category_list[] = (int)$request->second_category;
                $query->whereIn('category_id', $all_third_category_list);
            }
            
            if($request->third_category){
                $query->where('category_id', $request->third_category);
            }
            
            if($request->brand){
                $query->where('brand_id', $request->brand);
            }

            if($search_keys != null){
                $query->where(function ($q) use ($search_keys){
                    foreach (explode(' ', trim($search_keys)) as $word) {
                        $q->where('name', 'like', '%'.$word.'%');
                    }
                });
            }
            
            switch ($request->sort_by) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'price-asc':
                    $query->orderBy('unit_price', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('unit_price', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'desc');
                break;
            }
            
            $bulk_product_list = $query->get();

            // get category wise brands, Used on product list page @Avinash
            $get_filter_brand = $bulk_product_list->pluck('brand_id')->unique();
        }else{
            $get_filter_brand = [];
            $bulk_product_list = [];
        }

        
        $data = [
            'get_filter_brand' => $get_filter_brand,
            'filter_brand_data' => $this->setBrandListHtml($get_filter_brand),
            'products' => $this->setProductListHtml($bulk_product_list),
        ];

         return Response::json([
             'status' => true,
             'data' => $data,
         ], 200);
    }

    // return Second category list in html format
    public function setSecondCategoyListHtml(Request $request){
        $second_categories = Category::select('id', 'name')
            ->where('parent_id', $request->first_category)
            ->orderBy('order_level', 'ASC')
            ->get();

        $output = '<option value="">Sub Category</option>';
        foreach($second_categories as $category){
            $output .= '<option value="'.$category->id.'">'.$category->name.'</option>';
        }

        // $brand_list = $this->setBrandListHtml($request->first_category);
        return Response::json([
            'status' => true,
            'second_ctegory_list' => $output,
            // 'brand_list' => $brand_list,
        ], 200);
    }

    // return Third category list in html format
    public function setThirdCategoyListHtml(Request $request){
        $third_categories = Category::select('id', 'name')
            ->where('parent_id', $request->second_category)
            ->orderBy('order_level', 'ASC')
            ->get();
        $output = '<option value="">Third Category</option>';
        foreach($third_categories as $category){
            $output .= '<option value="'.$category->id.'">'.$category->name.'</option>';
        }
        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);
    }

    // return Brand list in html format
    public function setBrandListHtml($brand_ids){
        $brands = Brand::select('id', 'name')->whereIn('id', $brand_ids)->orderBy('name', 'ASC')->get();
        
        $output = '<option value="">Brand</option>';
        foreach($brands as $brand){
            $output .= '<option value="'.$brand->id.'">'.$brand->name.'</option>';
        }
        return $output;
    }

    // return Product list in html format
    public function setProductListHtml($product_list){
        $output = '';
        $sr_number = 1;
        foreach($product_list as $list){
            $output .= '<tr>
                <td>'.$sr_number++.' 
                    <input type="hidden" id="product_discount_price" value="'.home_discounted_base_price($list, false).'">
                </td>
                <td>
                    <input type="checkbox" value="'.$list->id.'"
                        name="product_id[]" data-id="'.$list->id.'"
                        class="product_id" id="boxselect">
                    <img src="'.uploaded_asset($list->thumbnail_img).'"
                        onclick="openModal();" class="img01 hover-shadow">
                </td>
                <td id="product_name">'.$list->name.'</td>
                <td id="price">'.home_base_price($list, false).'
                    <input type="hidden" name="price[]"
                        value="'.home_base_price($list, false).'">
                </td>
                <td id="discount">'.$list->discount.' </td>
                <td id="gst"> </td>
                <td>
                    <input id="txtp" onkeypress="return isNumberKey(event)"
                        class="ttype text-center" name="quantity[]" value="0"
                        type="text" disabled>
                </td>
                <td>
                    <input id="txttotle" name="ert"
                        class="totle background-white border text-center"
                        type="text" value="0" disabled>
                </td>
            </tr>';
        }
        return $output;
    }

    public function addToAllBulkCart(Request $request){
        // dd($request);
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $product_id =  $request->input('product_id', []);
            $price =  $request->input('price', []);
            $quantity =  $request->input('quantity', []);
            $category_id =  $request->input('category');
            $types =  $request->input('types');
            
            $check_exist_category = BulkCartCategory::where('user_id', $user_id)
            ->where('type', $types)
            ->where('category_id', $category_id)
            ->first();
            
            if($check_exist_category == null){
                $insertCartCategory = new BulkCartCategory();
                $insertCartCategory->user_id = $user_id;
                $insertCartCategory->category_id = $category_id;
                $insertCartCategory->type = $types;
                $insertCartCategory->save();

                $bulk_cart_category_id = $insertCartCategory->id;
            }else{
                $bulk_cart_category_id = $check_exist_category->id;
            }
            
            $results = [];
            foreach ($request->product_id as $key => $unit) {
                $check_cart_product = BulkCart::where('types', $types)
                ->where('user_id', $user_id)
                ->where('category_id', $category_id)
                ->where('product_id', $unit)
                ->first();
    
                if($check_cart_product != null){
                    $new_quantity = $quantity[$key];
                    $cart_quantity = $check_cart_product->quantity;
                    $total_quantity = (int)$new_quantity + (int)$cart_quantity;
                    $check_cart_product->quantity = $total_quantity;
                    $check_cart_product->category_id = $category_id;
                    $check_cart_product->types = $types;
                    $check_cart_product->save();
                }else{
                    $results[] = [
                        "bulk_cart_category_id" => $bulk_cart_category_id,
                        "product_id" => $product_id[$key],
                        "price" => $price[$key],
                        "quantity" => $quantity[$key],
                        "category_id" => $category_id,
                        "types" => $types,
                        "user_id" => $user_id,
                        "variation" => '',
                    ];     
                }   
            }
            BulkCart::insert($results);      
            return redirect('all_bulkorder')->with(session()->flash('alert-success', 'Bulk Products Added to cart!'));    
        }else{
            return view('frontend.user_login');
        }
    }

}