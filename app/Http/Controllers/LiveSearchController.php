<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Search;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Service;
use App\Models\ServiceCart;
use App\Models\Category;
use App\Models\FlashDeal;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Shop;
use App\Models\Attribute;
use App\Models\AttributeCategory;
use App\Utility\CategoryUtility;
use Auth;

class LiveSearchController extends Controller
{
   
    public function index(Request $request, $category_id = null, $brand_id = null)
    {
        $url = url()->full();
        $slugs = explode ("/", $url);
        
        $latestslug = $slugs [(count ($slugs) - 1)];
        $query = $request->keyword;
        $type = $request->type;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;
        $attributes = Attribute::all();
        $selected_attribute_values = array();
        $first_five_color = Color::orderBy('id', 'desc')->limit(5)->get();
        $colors = Color::all();
        $selected_color = null;

        $conditions = ['published' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        if($type == "Service"){
            $products = Service::where($conditions);
        }else{
            $products = Product::where($conditions);
        }

        if($category_id != null){
            $category_ids = CategoryUtility::children_ids($category_id);
            $category_ids[] = $category_id;

            $products->whereIn('category_id', $category_ids);

            $attribute_ids = AttributeCategory::whereIn('category_id', $category_ids)->pluck('attribute_id')->toArray();
            $attributes = Attribute::whereIn('id', $attribute_ids)->get();
        }

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);

            if($type == "Product"){
                $products->where(function ($q) use ($query){
                    // foreach (explode(' ', trim($query)) as $word) {
                        // dd($query);
                        $q->where('name', 'like', $query.'%')->orWhere('tags', 'like', $query.'%');
                                $q->orWhereHas('product_translations', function($q) use ($query){
                                    $q->where('name', 'like', $query.'%');
                                });
                    // }
                });
            }else{
                $products->where(function ($q) use ($query){
                    // foreach (explode(' ', trim($query)) as $word) {
                        // dd($query);
                        $q->where('name', 'like', $query.'%')->orWhere('tags', 'like', $query.'%');
                                $q->orWhereHas('service_translations', function($q) use ($query){
                                    $q->where('name', 'like', $query.'%');
                                });
                    // }
                });
            }
        } 

        $products = filter_products($products)->with('taxes')->paginate(12)->appends(request()->query());
        // dd($products);
		$categories = Category::where('level', 0);
        if($type == "Service"){
            $categories->where('type','2');
        }else{
            $categories->where('type','1');
        }
        $categories->orderBy('order_level', 'asc')->get();

		$first_brands = Brand::orderBy('name', 'ASC')->take(5)->get();
		$allbrands = Brand::orderBy('name', 'ASC')->skip(5)->take(PHP_INT_MAX)->get();
		$catName = Category::where('id', $category_id)->first();
        
        return view('frontend.search_product_listing', compact('catName','first_brands','allbrands','first_five_color','categories','products', 'query', 'type', 'category_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attribute_values', 'colors', 'selected_color', 'latestslug'));
    }
    
    public function get_search_filtered_products(Request $request )
    {
        $output = '';
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));
        $pageNumber = $request->page;
        $query = $request->keyword;


        $conditions = ['is_top_product' => 0, 'published' => 1];

        $product_list = Product::where($conditions);

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $product_list->where(function ($q) use ($query){
                // foreach (explode(' ', trim($query)) as $word) {
                    $q->where('name', 'like', '%'.$query.'%')->orWhere('tags', 'like', '%'.$query.'%')->orWhereHas('product_translations', function($q) use ($query){
                        $q->where('name', 'like', '%'.$query.'%');
                    });
                // }
            });
        }

        if($request->has('brand')) {
            $brand_ids = Brand::whereIn('slug', $request->brand)->get()->pluck('id');
            $product_list->whereIn('brand_id', $brand_ids);
        }

        if($request->has('color')) {
            $product_list->whereIn('colors', $request->color);
        }
        
        if($request->has('attribute')) {
            $selected_attribute_values = $request->attribute;
            foreach ($selected_attribute_values as $key => $value) {
                $str = '"'.$value.'"';
                $product_list->orWhere('choice_options', 'like', '%'.$str.'%');
            }
        }
        
        if($request->min_price != null && $request->max_price != null){
            $product_list->where('unit_price', '>=', $request->min_price)->where('unit_price', '<=', $request->max_price);
        }

        switch ($request->sort_by) {
            case 'newest':
                $product_list->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $product_list->orderBy('created_at', 'asc');
                break;
            case 'price-asc':
                $product_list->orderBy('unit_price', 'asc');
                break;
            case 'price-desc':
                $product_list->orderBy('unit_price', 'desc');
                break;
            default:
                $product_list->orderBy('id', 'desc');
                break;
        }
       
        $product_list = $product_list->paginate(20, ['*'], 'page', $pageNumber);

        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $get_cart_product = Cart::select('product_id', 'quantity')->where('user_id', $user_id)->get();
        }else{
            $temp_user_id = $request->session()->get('temp_user_id');
            $get_cart_product = Cart::select('product_id', 'quantity')->where('temp_user_id', $temp_user_id)->get();
        }

        foreach($product_list as $list){
            if($get_cart_product != null){
                foreach($get_cart_product as $cart) {
                    if($cart->product_id == $list->id){
                        $list->is_cart_product = 1;
                        $list->cart_quantity = $cart->quantity;
                    }else{
                        $list->is_cart_product = 0;
                        $list->cart_quantity = 0;
                    }
                }
            }else{
                $list->is_cart_product = 0;
                $list->cart_quantity = 0;
            }  
        }

        if($product_list != null){
			foreach($product_list as $row){
			    $img  = uploaded_asset($row->thumbnail_img);

                $discount_price = home_discounted_base_price($row);
                // $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qty = 0;  foreach ($row->stocks as $key => $stock) { $qty += $stock->qty; } 
                $output .= '<div class="grid-item col-md-3 col-cat-box">
                    <div class="product-box h-auto pb-3 product_data">';  
                        if($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp &&  $row->discount_type == "percent"){
                            $output .= '<div class="beachs">'.$row->discount.' % Off</div>'; 
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);

                        }elseif($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp && $row->discount_type == "amount") {
                            $output .= '<div class="beachs">₹'.$row->discount.' Off</div>';
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);
                        }else{
                            $discount_price = home_base_price($row, false);  
                            $discount_show_price = home_base_price($row, true);; 
                            $original_show_price = '';
                        }
                        
                        $output .= '<a href="'.route('product', $row->slug).'"><img src="'.$img.'" alt="'.$row->name.'" onerror="this.onerror=null;this.src='.static_asset('assets/img/placeholder.jpg').';"></a>';
                        
                        if($row->brand_id != null){
                            $output .= '<div class="discrptions">
                                                <div class="companyname">'.$row->brand->name.'</div>
                                        </div>';
                        }
                        
                        $output .= '<div class="discrptions">
                            <a href="'.route('product', $row->slug).'">
                                <h5 class="desclist">'.$row->name.'</h5>
                            </a>
                            <h6>'.$discount_show_price.' <strike>' . $original_show_price .'</strike></h6>
                        </div>';

                        if($row->is_cart_product == 1){
                            $output .= '<div class="discrptions_button buddonjdk '.$row->id.' active">';
                        }else{
                            $output .= '<div class="discrptions_button buddonjdk '.$row->id.'">';
                        }

                        $output .= '<input type="hidden" value="'.$row->id.'" class="prod_id">
                            <input type="hidden" value="'.$discount_price.'" class="prod_price">
							<input type="hidden" value="'.$row->name.'" class="prod_name">
							<input type="hidden" value="'.$img.'" class="prod_img">';
                            if($qty>0){
                                $output .= '<button id="btn1" type="button" class="btn cart active cart_buttons3 addToCartUButton"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="name">Add to cart</span> </button>
                                <div class="cart-add cart-add3 products_list ">
                                    <div class="input-group quantity_input mb-0">
                                        <div class="input-group w-auto justify-content-end align-items-center packageadd">
                                            
                                            <input type="button" value="-" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1_1 add_cart_button_minus" data-field="quantity" ';
                                            
                                            if($row->cart_quantity >= 1){
                                                $output .= '><input type="number" step="1" max="10" value="'.$row->cart_quantity.'" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">';
                                            }else{
                                                $output .= 'disabled><input type="number" step="1" max="10" value="1" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">';
                                            }
                                            $output .= '<input type="button" value="+" class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm lh-0_1 add_cart_button_plus" data-field="quantity">
                                            <a href="'.url('cart').'"> <h6 class="cart_buttons cart_icons1"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h6></a>
                                        </div>
                                    </div>
                                </div>							
							    <button class="buttonbuynow productBuyNow"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;Buy Now</button>';
                            }else{
                                $output .= '<button class="outofstock">&nbsp;&nbsp;Out&nbsp;of&nbsp;Stock</button><button class="buttonbuynow productBuyNow" disabled style="opacity:0.6;"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;Buy Now</button>';
                            }
							$output .= '</div>         
                    </div>
                </div>';
			}
            $output .= '<div>' .$product_list->render(). '</div>';

		}

		return Response::json([
            // 'product_list' => $product_list,
            'request' => $request,
            'status' => true,
            'data' => $output
        ], 200);

    }

    // Used for service list through Ajax
    public function get_search_filtered_services(Request $request)
    {
        $output = '';
        $brand_data = '';
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));
        $pageNumber = $request->page;
        $query = $request->keyword;

        $conditions = ['approved' => 1, 'published' => 1];

        $product_list = Service::where($conditions);

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $product_list->where(function ($q) use ($query){
                // foreach (explode(' ', trim($query)) as $word) {
                    $q->where('name', 'like', '%'.$query.'%')->orWhere('tags', 'like', '%'.$query.'%')->orWhereHas('service_translations', function($q) use ($query){
                        $q->where('name', 'like', '%'.$query.'%');
                    });
                // }
            });
        }

        if($request->has('brand')) {
            $brand_ids = Brand::whereIn('slug', $request->brand)->get()->pluck('id');
            $product_list->whereIn('brand_id', $brand_ids);
        }

        if($request->has('color')) {
            $product_list->whereIn('colors', $request->color);
        }
        
        if($request->has('attribute')) {
            $selected_attribute_values = $request->attribute;
            foreach ($selected_attribute_values as $key => $value) {
                $str = '"'.$value.'"';
                $product_list->orWhere('choice_options', 'like', '%'.$str.'%');
            }
        }
        
        if($request->min_price != null && $request->max_price != null){
            $product_list->where('unit_price', '>=', $request->min_price)->where('unit_price', '<=', $request->max_price);
        }

        switch ($request->sort_by) {
            case 'newest':
                $product_list->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $product_list->orderBy('created_at', 'asc');
                break;
            case 'price-asc':
                $product_list->orderBy('unit_price', 'asc');
                break;
            case 'price-desc':
                $product_list->orderBy('unit_price', 'desc');
                break;
            default:
                $product_list->orderBy('id', 'desc');
                break;
        }
       
        $product_lists = $product_list->paginate(20, ['*'], 'page', $pageNumber);

        // if(Auth::user() != null) {
        //     $user_id = Auth::user()->id;
        //     $get_cart_product = ServiceCart::select('service_id', 'quantity')->where('user_id', $user_id)->get();
        // }else{
        //     $temp_user_id = $request->session()->get('temp_user_id');
        //     $get_cart_product = ($temp_user_id != null) ? ServiceCart::select('service_id', 'quantity')->where('temp_user_id', $temp_user_id)->get() : [] ;
        // }

        // foreach($product_lists as $key => $list){
        //     $product_lists[$key]->is_cart_product = 0;
        //     if($get_cart_product != null){
        //         foreach($get_cart_product as $cart) {
        //             if($cart->service_id == $list->id){
        //                 $product_lists[$key]->is_cart_product = 1;
        //             }
        //         }
        //     } 
        // }

        if($product_lists != null){
			foreach($product_lists as $row){
			    $img  = uploaded_asset($row->thumbnail_img);
                // $discount_price = home_discounted_base_price($row);
                // $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qty = 0;  foreach ($row->stocks as $key => $stock) { $qty += $stock->qty; } 

                $output .= '<div class="col-md-4 col-sm-6 product_data">
                <div class="product-box services">';
                    
                    $output .= '<a href="'.route('service', $row->slug).'">    
                        <div class="ser-prd-img position-relative">';
                        if($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp &&  $row->discount_type == "percent"){
                            $output .= '<div class="beachs2  position-absolute"><p>'.$row->discount.' % Off</p></div>'; 
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);

                        }elseif($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp && $row->discount_type == "amount") {
                            $output .= '<div class="beachs2  position-absolute"><p>₹'.$row->discount.' Off</p></div>';
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);
                        }else{
                            $discount_price = home_base_price($row, false);  
                            $discount_show_price = home_base_price($row, true);; 
                            $original_show_price = '';
                        }

                        $output .= '<div class="beach3  position-absolute">
                                <p>'.$discount_show_price.'  Per Sq. Ft.</p>
                            </div>
                            <img src="'.$img.'" alt="'.$row->name.'">
                        </div>
                    </a>
                    <div class="discrptions">
                        <a href="'.route('service', $row->slug).'">
                            <h5> '.$row->name.'</h5>
                        </a>
                        <h6> '.$row->user->shop->name.' <span> '.$row->user->shop->city.', '.$row->user->shop->state.'</span></h6>
                    </div>
                    <input type="hidden" value="'.$row->id.'" class="prod_id">                
                    <input type="hidden" value="'.$discount_price.'" class="prod_price">
            		<input type="hidden" value="'.$row->name.'" class="serv_prod_name">
                    <input type="hidden" value="'.$img.'" class="serv_prod_img">
                    <input type="hidden" value="1" class="input-number">
                    <ul class="item-amenities d-flex item-amenities-with-icons">
                        <li class="h-beds"><span class="hz-figure">'.$row->total_employee.' <i class="fa fa-users" aria-hidden="true"></i></span> Employee</li>
                        <li class="h-baths border-left border-right"><span class="hz-figure">'.$row->total_projects.'+ <i class="fa fa-file-image" aria-hidden="true"></i></span> No. Of Projects</li>
                        <li class="h-area"><span class="hz-figure">'.$discount_show_price.' </span> Per sq ft </li>
                    </ul>
                    <div class="border-bottom d-flex1">';
                    if(Auth::user() != null){
                        $output .= '<button type="button" class="addserviceaquote quoteModal" data-id="'.$row->id.'">Get A Quote</button>
                        <a class="buttonbuynow askpricebtn askPriceModal" data-id="'.$row->id.'">  Ask Price</a>';
                    } else{ 
                        $output .= '<a href="'.url('login').'" class="addserviceaquote"> Get A Quote </a>
                        <a href="'.url('login').'" class="buttonbuynow askpricebtn"> Ask Price </a>';  
                    }
                    $output .= '</div>';
                    $output .= '<div class="item-footer clearfix">
                                    <div class="item-author">
                                        <i class="fa fa-user mr-1"></i>
                                        Working Exp.
                                    </div>
                                    <div class="item-date">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        '.$row->working_exp.' years +
                                    </div>
                                </div>
                            </div>
                        </div>'; 
              
			}

            $output .= '<div>' .$product_lists->render(). '</div>
            <script>
            $(".addservicebtn").click(function () {
            $(".addservicebtn").hide();
            $(".shortlistedbtn").show();
            });
            </script>';
		}
        
        // $data = [
        //    'output' => $output,
        //    'product_listing' => $product_lists,
        // ];

		return Response::json([
            // 'product_lists' => $product_lists,
            'status' => true,
            'data' => $output,
        ], 200);

    }
    
    public function listing(Request $request)
    {
        return $this->index($request);
    }

    public function listingByCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->index($request, $category->id);
        }
        abort(404);
    }

    public function listingByBrand(Request $request, $brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        if ($brand != null) {
            return $this->index($request, null, $brand->id);
        }
        abort(404);
    }

    //Suggestional Search
    public function ajax_search(Request $request)
    {
        $keywords = array();
        $query = $request->search;
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$query.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $query) !== false){
                    if(sizeof($keywords) > 5){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::query());

        $products = $products->where('published', 1)
                        ->where(function ($q) use ($query){
                            foreach (explode(' ', trim($query)) as $word) {
                                $q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%')->orWhereHas('product_translations', function($q) use ($word){
                                    $q->where('name', 'like', '%'.$word.'%');
                                });
                            }
                        })
                    ->get();

        $categories = Category::where('name', 'like', '%'.$query.'%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$query.'%')->get()->take(3);

        if(sizeof($keywords)>0 || sizeof($categories)>0 || sizeof($products)>0 || sizeof($shops) >0){
            return view('frontend.partials.search_content', compact('products', 'categories', 'keywords', 'shops'));
        }
        return '0';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search = Search::where('query', $request->keyword)->first();
        if($search != null){
            $search->count = $search->count + 1;
            $search->save();
        }
        else{
            $search = new Search;
            $search->query = $request->keyword;
            $search->save();
        }
    }
}