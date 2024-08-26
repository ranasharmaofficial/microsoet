<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\FlashDeal;
use App\Models\DealItem;
use App\Models\Brand;
use App\Models\Currency;
use App\Models\Product;
use App\Models\PickupPoint;
use App\Models\CustomerPackage;
use App\Models\User;
use App\Models\Seller;
use App\Models\Shop;
use App\Models\Order;
use App\Models\ServiceOrder;
use App\Models\BusinessSetting;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Customer_payment_card;
use App\Models\Category_wise_brand;
use App\Models\Enquiry;
use App\Models\Blog;
use App\Models\HomeCategorySection;
use App\Models\ProductQuoteEnquiry;
use App\Models\CallRequest;
use App\Models\RelatedProduct;
use App\Models\BoughtTogether;
use App\Models\Cart;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\ProductNotify;
use App\Models\ShippingManagementTable;
use Cookie;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\SecondEmailVerifyMailManager;
use App\Models\AffiliateConfig;
use Mail;
use Illuminate\Auth\Events\PasswordReset;
use Cache;
use DB;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

use Session;

class HomeController extends Controller
{
    private $url = 'https://apiv2.shiprocket.in/v1/external/';

    public function moveOnMasterProduct(){
        $product_lists  = Product::with('related_product', 'taxes', 'stocks', 'user')
        ->first();
        // dd($product_lists->related_product);
        $counter = 0;
        foreach($product_lists as $product_list){
            // dd($product_list->taxes);
            $update_taxes = \App\Models\ProductMaster::find($product_list->id);
            if ($product_list->taxes) {
                $product_tax = array();
                foreach ($product_list->taxes as $key => $val) {
                    $product_tax[$key]['tax_id'] = $val->tax_id;
                    $product_tax[$key]['product_id'] = $val->product_id;
                    $product_tax[$key]['tax'] = $val->tax;
                    $product_tax[$key]['tax_type'] = $val->tax_type;
                }

                // dd($update_taxes);
                $update_taxes->taxes = json_encode($product_tax);
                $update_taxes->save();
                echo "<br>Inserted";
            }else{
                $update_taxes->taxes = [];
                $update_taxes->save();
                echo "<br>Not Inserted";
            }
            $counter++;
        }
        echo "<br>".$counter;
    }

    public function sellerRegistrationSuccess(Request $request){
        return view('frontend.seller_reg_success');
    }

    public function getHeaderProductsMenu() {
        //\DB::enableQueryLog(); // Enable query log
        //product menu
        $first_product_categories = Category::select('id', 'name', 'slug', 'icon')->where('level', 0)->where('type', 1)->orderBy('order_level', 'ASC')->get();
        $res = '';
        $res .= '<a href="javascript:void(0);" id="shopid">
          Shop By Department
          <i class="fa fa-angle-down"></i>
          </a>
        <div class="top_ul">
        <ul class="departmentdks">
        <li class="buildings1a...1">
        <a href="' . url('categories') . '">
          <span class="img000">
          <img src="' . static_asset('assets_web/img/products.webp') . '" alt="" />
          </span>
          <span class="spand-line"><b>All Products</b></span>
        </a>
        </li>';
        foreach ($first_product_categories as $key => $category) {
          $res .= '<li class="' . $category->slug . '">
            <a href="' . route('cat', $category->slug) . '" class="firstnav">
              <span class="img000"><img src="' . uploaded_asset($category->icon) . '" alt="' . $category->getTranslation('name') . '"></span>
              <span class="spand-line">' . $category->getTranslation('name') . '<i class="fa fa-angle-right" aria-hidden="true"></i></span>
            </a>
          </li>';
          $res .= "<script>
              $('.top_ul ." . $category->slug . "').hover(function () {
                $('.top_ul ." . $category->slug . "').css('display', 'block');
              }, function () {
                $('.top_ul .top-megamenu.web-mega').css('display', 'none');
              });
            </script>";
        }
        $res .= '</ul>
          <div class="dpeartmens">';
          if (count($first_product_categories) > 0) {
            foreach ($first_product_categories as $key => $category) {
              $category_wise_brands = Category_wise_brand::where('category_id', $category->id)->get();
              $second_product_categories = Category::select('id', 'name', 'slug', 'icon', 'parent_id')->where('parent_id', $category->id)->where('level', 1)->orderBy('order_level', 'ASC')->get();
              $res .= '<div class="top-megamenu web-mega ' . $category->slug . '">
                <div class="megamenu megamenu2" style="background: center top rgb(255, 255, 255); display:block ; opacity:1;">
                <div class="row posrel">
                <div class="col-md-7 megamenuoverflow">
                <ul class="megamenusubs">';
              if (count($second_product_categories) > 0) {
                foreach ($second_product_categories as $key => $first_level_id) {
                  $third_product_categories = Category::select('id', 'name', 'slug', 'icon', 'parent_id')->where('parent_id', $first_level_id->id)->where('level', 2)->orderBy('order_level', 'ASC')->get();
                  //if ($first_level_id->parent_id == $category->id) {
                    $res .= '<li>
                      <a href="' . route('products.category', $first_level_id->slug) . '" class="secondnav">' . $first_level_id->getTranslation('name') . '<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        <ul class="megamenusubs231">
                        <span class="morein">More In ' . $first_level_id->getTranslation('name') . '</span>';
                    if (count($third_product_categories) > 0) {
                      foreach ($third_product_categories as $key => $second_level_id) {
                        //if ($second_level_id->parent_id == $first_level_id->id) {
                          $res .= '<li><a href="' . route('products.category', $second_level_id->slug) . '">' . $second_level_id->getTranslation('name') . '</a></li>';
                        //}
                      }
                    }
                    $res .= '</ul></li>';
                  //}
                }
              }
            $res .= '</ul>
              </div>
              <div class="col-md-5">
              <div class="divcalimmega">
                <h3>Top Brands</h3>
              <ul class="brand-menus">';
                foreach ($category_wise_brands as $key) {
                  //if ($key->category_id == $category->id) {
                    $res .= '<li><a href="' . url('category/' . $category->slug . '?brand=' . $key->brand->slug) . '"><img src="' . uploaded_asset($key->brand->logo) . '" alt=""></a></li>';
                  //}
                }
              $res .= '</ul>
                <a class="hire-team-btn" href="javascript:void(0);" target="_self">View More</a>
                </div>
                </div>
                </div>
                </div>
                </div>';

              $res .= "<script>
                $('.top_ul ." . $category->slug . "').hover(function () {
                  $('.top_ul ." . $category->slug . "').css('display', 'block');
                }, function () {
                  $('.top_ul .top-megamenu.web-mega').css('display', 'none');
                  $('.enquryfrm').css('display', 'block');
                });
              </script>";
          }
        }
        $res .= '</div></div>';
        // Your Eloquent query executed by using get()
        //dd(\DB::getQueryLog()); // Show results of log
        echo $res;
    }

    public function getHeaderServiceMenu() {
    //\DB::enableQueryLog(); // Enable query log

    //Service menu
    $first_service_categories = Category::select('id', 'name', 'slug', 'icon')->where('level', 0)->where('type', 2)->orderBy('order_level', 'ASC')->get();

    $res = '';
    $res .='<a href="javascript:void(0);" class="proserviceid">Professional Services <i class="fa fa-angle-down"></i></a><div class="top_ul pro_ul"><ul class="departmentdks">';
    if($first_service_categories != null){
        foreach ($first_service_categories as $key => $category){
        $second_service_categories = Category::select('id', 'name', 'slug', 'icon', 'parent_id')->where('parent_id', $category->id)->where('level', 1)->orderBy('order_level', 'ASC')->get();
        $res .= '<li>
        <a href="'. route('servicecat', $category->slug) .'" class="firstnav proservicelink">
            <span class="img000"><img src="'. uploaded_asset($category->icon) .'" class="NavThumbnail fl" alt="'.$category->name.'" /></span>
            <span class="spand-line">'.$category->name.'<i class="fa fa-angle-right" aria-hidden="true"></i></span>
        </a>
        <div class="professionalserv">
            <div class="top-megamenu web-mega1">
            <div class="megamenu megamenupros" style="background: center top rgb(255, 255, 255); display:block ; opacity:1;">
                <div class="row posrel">
                <div class="col-md-12 megamenuoverflow megamenuoverflow_serv">
                    <ul class="megamenusubs">';
                    if($second_service_categories != null){
                        foreach($second_service_categories as $key => $first_level_id){
                        $third_service_categories = Category::select('id', 'name', 'slug', 'icon', 'parent_id')->where('parent_id', $first_level_id->id)->where('level', 2)->orderBy('order_level', 'ASC')->get();
                        //if($first_level_id->parent_id == $category->id){
                            $res .='<li>
                            <a href="'. route('services.servicecategory', $first_level_id->slug) .'" class="secondnav">'. $first_level_id->getTranslation('name').' <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            <ul class="megamenusubs231 megamenusubs_serv231">
                            <span class="morein">More In '. $first_level_id->getTranslation('name').'</span>';
                            if(count($third_service_categories) > 0){
                            foreach($third_service_categories as $key => $second_level_id){
                                //if($second_level_id->parent_id == $first_level_id->id){
                                $res .='<li>
                                    <a href="'. route('services.servicecategory', $second_level_id->slug) .'">'.$second_level_id->getTranslation('name').'</a>
                                    </li>';
                                //}
                            }
                            }
                            $res .='</ul>
                            </li>';
                        //}
                        }
                    }
                    $res .=' </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
        </li>';
        }
    }
    $res .= '</ul></div>';
    // Your Eloquent query executed by using get()
    //dd(\DB::getQueryLog()); // Show results of log
    echo $res;
    }

    /**
     * Show the application frontend home.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories_id = json_decode(get_setting('home_categories'));

        $premium_offers = FlashDeal::where('type', '=', 'best_premium_section')
            ->where('status', 1)
            ->where('is_home', 1)
            ->get();

        foreach($premium_offers as $offer){
            $offer->dealitems = DealItem::where('deal_id', $offer->id)->take(3)->get();
        }

        $category_offers = $this->get_offer_type_data(null, 25);
        $service_offers = $this->get_offer_type_data(null, 26);
        $brand_offers = $this->get_offer_type_data(null, 27);

        $weekly_offers = $this->get_offer_type_data('weekly_section');
        $live_offers = $this->get_offer_type_data('live_section');
        $small_comodity_offers = $this->get_offer_type_data('small_comodity_section');
        // catdealitems
        $flash_deal = FlashDeal::where('status', 1)->where('featured', 1)->first();
        $just_for_you_product = filter_products(Product::orderBy('num_of_sale', 'desc'))->limit(6)->get();

        $premium_brands = json_decode(get_setting('top10_brands'));
        $top10_brands = array_splice($premium_brands, 0, 18);

        $data = [
            'get_categories_atributes' => HomeCategorySection::select('category_attribute')->groupBy('category_attribute')->orderBy('id')->get(),
            'get_sanitary_items_data' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'sanitary_items')->get(),
            'get_building_materials_data' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'building_materials')->get(),
            'get_furnishing_material_data' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'furnishing_material')->get(),
            'get_service_offered_data' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'service_offered')->get(),
            'get_service_1' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'service_1')->get(),
            'get_service_2' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'service_2')->get(),
            'get_service_3' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'service_3')->get(),
            'get_service_4' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'service_4')->get(),
            'get_service_5' => HomeCategorySection::select('slug_url','image','title')->where('category_attribute', 'service_5')->get(),

            'premium_offers' => $premium_offers,

            'category_offers' => $category_offers,
            'catdealitems' => DealItem::where('deal_id', $category_offers->id)->take(4)->get(),

            'service_offers' => $service_offers,
            'servdealitems' => DealItem::where('deal_id',$service_offers->id)->take(4)->get(),

            'brand_offers' => $brand_offers,
            'branddealitems' => DealItem::where('deal_id', $brand_offers->id)->take(4)->get(),

            'weekly_offers' => $weekly_offers,
            'woitems' => DealItem::where('deal_id',$weekly_offers->id)->take(2)->get(),

            'live_offers' => $live_offers,
            'loitems' => DealItem::where('deal_id',$live_offers->id)->take(2)->get(),

            'small_comodity_offers' => $small_comodity_offers,
            'scoitems' => DealItem::where('deal_id',$small_comodity_offers->id)->take(2)->get(),

            'flash_deal' => $flash_deal,
            'flash_deal_data' => DealItem::where('deal_id',$flash_deal->id)->take(20)->get(),

            'just_for_you_product' => $just_for_you_product,
            'brand_list' => Brand::whereIn('id', $top10_brands)->get(),

            'product_category' => Category::where('parent_id','=','0')->where('featured', 1)->where('type','1')->get(),
            'service_category' => Category::where('parent_id','=','0')->where('type','2')->get(),

            'categories' => Category::where('level', 0)->orderBy('order_level', 'desc')->get(),
            'cat_wise_brands' => Category::whereIn('id', $categories_id)->get(),
            'category_brands' => Category_wise_brand::whereIn('category_id', $categories_id)->get(),
            'allblogs' => Blog::limit(4)->get(),
        ];

        return view('frontend.index', $data);
    }

    public function callingAllCategory()
    {
        $data = Category::get();
        if ($data->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => "No Records found"
            ], 404);
        }
    }

    public function callingAllProducts()
    {
        $data = Product::get();
        if ($data->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => "No Records found"
            ], 404);
        }
    }

    public function callingAllBrands()
    {
        $data = Brand::get();
        if ($data->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => "No Records found"
            ], 404);
        }
    }

    public function homeCategoryProducts(Request $request){
        // $pro_category = Category::where('parent_id','=','0')->where('type','1')->whereIn('id', [18, 42, 92, 72, 86, 96])->get();
        $pro_category = Category::where('type', '1')->whereIn('id', [18, 34, 32,  42, 92, 72, 86, 96])->get();
        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $get_cart_product = Cart::select('product_id', 'quantity')->where('user_id', $user_id)->get();
        }else{
            $temp_user_id = $request->session()->get('temp_user_id');
            $get_cart_product = ($temp_user_id != null) ? Cart::select('product_id', 'quantity')->where('temp_user_id', $temp_user_id)->get() : [] ;
        }
        $output = '';
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));
        foreach ($pro_category as $category) {
            $output .= '<section class="product-csteogry">
            <div class="trend servoce_dops service_sections45 pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="border-bottom1 border-color-111 mt-3 mb-3">
                                <div class="sliderProductHeader">
                                    <div class="headerStripContainer">
                                        <div class="slideHeaderContain">
                                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">'. $category->name .'</h3>
                                        </div>
                                    </div>
                                    <div class="textButtonContainer">
                                        <a href="'.url('category'.'/'.$category->slug).'" class="productButtonText">See All</a>
                                    </div>
                                </div>

                                <div class="productListWrapper mt-3">
                                    <div class="productListContainer owl-carousel owl-theme product_cat_carousel_jsdgsdkjhkl">';

                                    if(Auth::user() != null) {
                                        $user_id = Auth::user()->id;
                                        $get_cart_product = Cart::select('product_id', 'quantity')->where('user_id', $user_id)->get();
                                    }else{
                                        $temp_user_id = $request->session()->get('temp_user_id');
                                        $get_cart_product = ($temp_user_id != null) ? Cart::select('product_id', 'quantity')->where('temp_user_id', $temp_user_id)->get() : [] ;
                                    }

                                    $product_lists = Product::where('category_id', $category->id)->limit(10)->get();

                                    foreach($product_lists as $key => $list){
                                        $product_lists[$key]->is_cart_product = 0;
                                        $product_lists[$key]->cart_quantity = 0;
                                        if($get_cart_product != null){
                                            foreach($get_cart_product as $cart) {
                                                if($cart->product_id == $list->id){
                                                    $product_lists[$key]->is_cart_product = 1;
                                                    $product_lists[$key]->cart_quantity = $cart->quantity;
                                                }
                                            }
                                        }
                                    }

                                    foreach ($product_lists as $item){



                                            $item->cart_quantity = 0;
                                            $totalQty = 0; // Initialize total quantity
                                            if($item->stocks){
                                                foreach ($item->stocks as $key => $stock) {
                                                    $totalQty += $stock->qty; // Accumulate total quantity
                                                }
                                            }

                                            //Cart Quantity Check
                                            // if($get_cart_product != null){
                                            //     foreach($get_cart_product as $cart) {
                                            //         if($cart->product_id == $item->id){
                                            //             $item->is_cart_product = 1;
                                            //             $item->cart_quantity = $cart->quantity;
                                            //         }
                                            //     }
                                            // }
                                        $output .= '<div class="productTypeCard item">
                                                <div class="productContainer">';
                                                if($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp &&  $item->discount_type == "percent"){
                                                    $output .= '<div class="beachs">'.$item->discount.' % Off</div>';
                                                    $discount_price = home_discounted_base_price($item, false);
                                                    $discount_show_price = home_discounted_base_price($item, true);
                                                    $original_show_price = home_base_price($item, true);

                                                }elseif($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp && $item->discount_type == "amount") {
                                                    $output .= '<div class="beachs">₹'.$item->discount.' Off</div>';
                                                    $discount_price = home_discounted_base_price($item, false);
                                                    $discount_show_price = home_discounted_base_price($item, true);
                                                    $original_show_price = home_base_price($item, true);
                                                }else{
                                                    $discount_price = home_base_price($item, false);
                                                    $discount_show_price = home_discounted_base_price($item, true);
                                                    $original_show_price = home_base_price($item, true);
                                                }
                                                $output .= '<div class="productImageContainer">
                                                    <div class="productImage">
                                                        <div class="productImageStyle">
                                                            <a href="'.route('product', $item->slug).'">
                                                                <img src="'.uploaded_asset($item->thumbnail_img).'" alt="'. $item->getTranslation('name') .'" onerror="this.onerror=null;this.src="'. static_asset('assets/img/placeholder.jpg').'";" width="140" height="140" loading="lazy">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="detailsContainer">
                                                    <div class="productETAContainer">
                                                        <div class="proETABadge">
                                                            <div style="gap: 0.125rem; align-items: center; display: flex;">
                                                                <div style="width: 11px;">
                                                                    <div style="width: 100%; height: 100%; overflow: hidden;">
                                                                        <img src="'.asset('public/assets_web/img/timer.png').'" style="width: 100%; transition-property: opacity; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 0.15s; opacity: 1; height: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div style="text-transform: uppercase; font-weight: 700; font-size: 9px; color: rgb(54, 54, 54);">
                                                                    45 mins
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="contentContainer">
                                                        <div class="titleAndVariantContainer">
                                                            <a href="'. route('product', $item->slug) .'">
                                                                <div class="productTitle">'. \Illuminate\Support\Str::limit($item->getTranslation('name'), 36, '...') .'</div>
                                                                <div class="quantity">
                                                                    <div class="proQty">'.$item->unit.'</div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="priceAndATCContainer">
                                                            <div>
                                                                <div style="color: rgb(31, 31, 31); font-weight: 600; font-size: 12px;">
                                                                    '.$discount_show_price.'
                                                                </div>
                                                                <div style="color: rgb(130, 130, 130);font-weight: 400;font-size: 12px;text-decoration-line: line-through;">
                                                                    '.$original_show_price.'
                                                                </div>
                                                            </div>';

                                                            if ($totalQty>0){
                                                            $output .= '<div class="product_data">';
                                                                if($item->is_cart_product == 1){
                                                                    $output .= '<div class="discrptions_button buddonjdk '.$item->id.' active">';
                                                                }else{
                                                                    $output .= '<div class="discrptions_button buddonjdk '.$item->id.'">';
                                                                }
                                                                    $output .='<input type="hidden" name="qty" class="qty" value="1">
                                                                    <input type="hidden" name="prod_id" class="prod_id" value="'.$item->id.'">
                                                                    <input type="hidden" name="prod_price" class="prod_price" value="'.$discount_price.'">
                                                                    <input type="hidden" name="product_name" class="product_name" value="'.$item->name.'">
                                                                    <input type="hidden" name="prod_img" class="prod_img" value="'.uploaded_asset($item->thumbnail_img).'">
                                                                    <div class="cart-add cart-add3 products_list ">
                                                                        <div class="input-group quantity_input mb-0">
                                                                            <div class="input-group w-auto justify-content-end align-items-center packageadd">
                                                                                <input type="button" value="-" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1_1 add_cart_button_minus" data-field="quantity">';
                                                                                if($item->cart_quantity >= 1){
                                                                                    $output .= '<input type="number" step="1" max="10" value="'.$item->cart_quantity.'" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">';
                                                                                }else{
                                                                                    $output .= '<input type="number" step="1" max="10" value="1" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">';
                                                                                }
                                                                                $output .= '<input type="button" value="+" class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm lh-0_1 add_cart_button_plus" data-field="quantity">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button id="btn1" class="addToCartButton addToCartUButton active">ADD</button>
                                                                </div>
                                                            </div>';
                                                            }else{
                                                            $output .= '<button class="outOfStockButton">Out Of Stock</button>';
                                                            }
                                                        $output .= '</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    $output .= '</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>';

        }

        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);
    }

    public function homeCategoryProduct(Request $request){


        $output = '';
					$pro_category = Category::where('type', '1')->whereIn('id', [2,3,40,20])->get();
					$current_timestamp = strtotime(date('Y-m-d H:i:s'));


				if(count($pro_category)>0){
					foreach($pro_category as $key => $category){

						 $output .= '<div class="title d-block py-5">
										<h2>'. $category->name .'</h2>
										<span class="title-leaf">
											<svg class="icon-width">
												<use xlink:href="../assets/svg/leaf.svg#leaf"></use>
											// </svg>
										</span>
										<p>A virtual assistant collects the products from your list rana sharma</p>
									</div>';

						$product_lists = Product::where('category_id', $category->id)->where('published', 1)->where('approved', 1)->limit(15)->get();

                    $output .= '<div class="product-border overflow-hidden wow fadeInUp">
                        <div class="product-box-slider no-arrow">';
                            if(count($product_lists)>0){
								foreach($product_lists as $item){
									$item->cart_quantity = 0;
									$totalQty = 0; // Initialize total quantity
									if($item->stocks){
										foreach ($item->stocks as $key => $stock) {
											$totalQty += $stock->qty; // Accumulate total quantity
										}
									}

									if($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp &&  $item->discount_type == "percent"){
										//$output .= '<div class="beachs">'.$item->discount.' % Off</div>';
										$discount_price = home_discounted_base_price($item, false);
										$discount_show_price = home_discounted_base_price($item, true);
										$original_show_price = home_base_price($item, true);

									}elseif($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp && $item->discount_type == "amount") {
										//$output .= '<div class="beachs">₹'.$item->discount.' Off</div>';
										$discount_price = home_discounted_base_price($item, false);
										$discount_show_price = home_discounted_base_price($item, true);
										$original_show_price = home_base_price($item, true);
									}else{
										$discount_price = home_base_price($item, false);
										$discount_show_price = home_discounted_base_price($item, true);
										$original_show_price = home_base_price($item, true);
									}

									$output .= '<div>
										<div class="row m-0">
											<div class="col-12 px-0">
												<div class="product-box">
													<div class="product-image">
														<a href="'.route('product', $item->slug).'">
															<img src="'.uploaded_asset($item->thumbnail_img).'"
																class="img-fluid blur-up lazyload" alt="">
														</a>
														<ul class="product-option">
															<li data-bs-toggle="tooltip" data-bs-placement="top"
																title="View">
																<a href="javascript:void(0)" data-bs-toggle="modal"
																	data-bs-target="#view">
																	<i data-feather="eye"></i>
																</a>
															</li>
															<li data-bs-toggle="tooltip" data-bs-placement="top"
																title="Compare">
																<a href="compare.html">
																	<i data-feather="refresh-cw"></i>
																</a>
															</li>
															<li data-bs-toggle="tooltip" data-bs-placement="top"
																title="Wishlist">
																<a href="wishlist.html" class="notifi-wishlist">
																	<i data-feather="heart"></i>
																</a>
															</li>
														</ul>
													</div>
													<div class="product-detail">
														<a href="product-left-thumbnail.html">
															<h6 class="name h-100">'. \Illuminate\Support\Str::limit($item->getTranslation('name'), 45, '...') .'
															</h6>
														</a>
														<h5 class="sold text-content">
															<span class="theme-color price"> '. $discount_show_price .'</span>
															<del> 19% Off</del>
														</h5>
														<div class="product-rating mt-sm-2 mt-1">
															<ul class="rating">
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star"></i>
																</li>
															</ul>
															<h6 class="theme-color">In Stock</h6>
														</div>
														<div class="add-to-cart-box">
															<button class="btn btn-add-cart addcart-button">Add
																<span class="add-icon">
																	<i class="fa-solid fa-plus"></i>
																</span>
															</button>
															<div class="cart_qty qty-box">
																<div class="input-group">
																	<button type="button" class="qty-left-minus"
																		data-type="minus" data-field="">
																		<i class="fa fa-minus"></i>
																	</button>
																	<input class="form-control input-number qty-input"
																		type="text" name="quantity" value="0">
																	<button type="button" class="qty-right-plus"
																		data-type="plus" data-field="">
																		<i class="fa fa-plus"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>';
								}
							}
						$output .= ' </div>
								</div>';
                    }
				}



        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);


    }



    public function get_offer_type_data($offer_type = null, $id = null){
        $data = FlashDeal::select('*');
        if($offer_type != null){
            $data = $data->where('type', '=', $offer_type);
        }
        if($id != null){
            $data = $data->where('id', $id);
        }
        $data = $data->where('status', 1)
            ->where('is_home', 1)
            ->first();
        return $data;
    }

    public function login()
    {
        // if (Auth::check()) {
        //     return redirect()->route('home');
        // }
        // if (session('temp_user_id') != null) {
        //     session()->put('url.intended',URL::previous());
        // }
        // $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();
        // return view('frontend.user_login', compact('categories'));
        return view('frontend.user_login');
    }

    public function vendorLogin()
    {
        // if (Auth::check()) {
        //     return redirect()->route('home');
        // }
        // if (session('temp_user_id') != null) {
        //     session()->put('url.intended',URL::previous());
        // }
        // $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();
        // return view('frontend.user_login', compact('categories'));
        return view('frontend.vendor_login');
    }

    public function registration(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        if ($request->has('referral_code') && addon_is_activated('affiliate_system')) {
            try {
                $affiliate_validation_time = AffiliateConfig::where('type', 'validation_time')->first();
                $cookie_minute = 30 * 24;
                if ($affiliate_validation_time) {
                    $cookie_minute = $affiliate_validation_time->value * 60;
                }

                Cookie::queue('referral_code', $request->referral_code, $cookie_minute);
                $referred_by_user = User::where('referral_code', $request->product_referral_code)->first();

                $affiliateController = new AffiliateController;
                $affiliateController->processAffiliateStats($referred_by_user->id, 1, 0, 0, 0);
            } catch (\Exception $e) {
            }
        }
        $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();
        return view('frontend.user_registration', compact('categories'));
    }

    public function cart_login(Request $request)
    {
        $user = null;
        if ($request->get('phone') != null) {
            $user = User::whereIn('user_type', ['customer', 'seller'])->where('phone', "+{$request['country_code']}{$request['phone']}")->first();
        } elseif ($request->get('email') != null) {
            $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        }

        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                if ($request->has('remember')) {
                    auth()->login($user, true);
                } else {
                    auth()->login($user, false);
                }
            } else {
                flash(translate('Invalid email or password!'))->warning();
            }
        } else {
            flash(translate('Invalid email or password!'))->warning();
        }
        return back();
    }

    public function admin_login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('frontend.admin_login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::user()->user_type == 'customer') {
            return view('frontend.user.customer.dashboard');
        } else {
            abort(404);
        }
    }

    public function profile(Request $request)
    {
        $address = Address::where('user_id', Auth::user()->id)->first();
        // dd($address);die;
        if (Auth::user()->user_type == 'delivery_boy') {
            return view('delivery_boys.frontend.profile');
        } else {
            return view('frontend.user.profile', compact('address'));
        }
    }
    public function editProfile()
    {
        return view('frontend.user.edit_profile');
    }
    public function myAddressBook()
    {
        $userid = Auth::user()->id;
        $myaddress = Address::where('user_id', $userid)->get();
        return view('frontend.user.my-addressbook', compact('myaddress'));
    }
    public function bankDetail()
    {
        return view('frontend.user.mybankdetail');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            // 'email' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:width=500,height=500',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        // dd($request);die;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'user-ava-' . time() . '.' . $extenstion;
            $file->move(public_path('uploads/user'), $filename);
        }
        //  dd($filename);die;
        $userid = Auth::user()->id;
        $name = $request->first_name . ' ' . $request->last_name;
        $upate_profile_details = User::where('id', $userid)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $name,
                'phone' => $request->phone,
                // 'email' => $request->email,
                // 'email' => $request->email,
                'gender' => $request->gender,
                'avatar' => $filename,
            ]);
        if ($upate_profile_details) {
            return redirect()->back()->with(session()->flash('alert-success', 'Profile Updated Successfully!'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }
    public function updateAddressDetails(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|min:13',
            'pin' => 'required|numeric|min:6',
            'area' => 'required',
            'house_no' => 'required',
            'user_id' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        $userid = Auth::user()->id;
        $name = $request->first_name . ' ' . $request->last_name;
        $upate_profile_details = Address::where('id', $request->id)->where('user_id', $request->user_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'house_no' => $request->house_no,
                'area' => $request->area,
                'pin' => $request->pin,
            ]);
        if ($upate_profile_details) {
            return redirect()->back()->with(session()->flash('alert-success', 'Address Updated Successfully!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }
    public function addAddress(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'phone' => 'required|numeric|min:10',
            'pin' => 'required|numeric|min:6',
            'house_no' => 'required',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address_type' => 'required',

        ]);
        $addresspost = Address::create([
            "first_name" => "$request->first_name",
            "last_name" => "$request->last_name",
            "phone" => "$request->phone",
            "pin" => "$request->pin",
            "house_no" => "$request->house_no",
            "area" => "$request->area",
            "address" => "$request->address",
            "city" => "$request->city",
            "state" => "$request->state",
            "address_type" => "$request->address_type",
            "set_default" => 1,
            "user_id" => Auth::user()->id,
        ]);
        if ($addresspost) {
            return redirect()->back()->with(session()->flash('alert-success', 'Address Added Successfully!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }
    public function managePayments()
    {
        $userid = Auth::user()->id;
        $mypaymentcard = Customer_payment_card::where('user_id', $userid)->get();
        return view('frontend.user.manage-payments', compact('mypaymentcard'));
    }

    public function addPaymentCards(Request $request)
    {
        // dd($request);
        // die;
        $request->validate([
            'credit_debit' => 'required',
            'card_no' => 'required|unique:customer_payment_cards|max:16',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
        ]);

        $addcard = Customer_payment_card::create([
            "credit_debit" => "$request->credit_debit",
            "card_no" => "$request->card_no",
            "expiry_month" => "$request->expiry_month",
            "expiry_year" => "$request->expiry_year",
            "user_id" => Auth::user()->id,
        ]);
        if ($addcard) {
            return redirect()->back()->with(session()->flash('alert-success', 'Payment Card Added Successfully!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }

    public function changePassword()
    {
        return view('frontend.user.change-password');
    }

    public function userPasswordChange(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);
        $userid = Auth::user()->id;
        $user_info = User::findOrFail($userid);

            if (password_verify($request->old_password, $user_info->password)) {

                if ($request->new_password === $request->confirm_password) {

                        $uppassdata = User::where('id', '=', $userid)
                            ->update([
                                'password' => Hash::make($request->new_password),
                            ]);
                        if ($uppassdata) {
                            return redirect()->back()->with(session()->flash('alert-success', 'Congratulations! You have successfully changed your password.'));
                        } else {
                            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
                        }
                    } else {
                        return redirect()->back()->with(session()->flash('alert-warning', 'New Password and Confirm Password not matched.'));
                    }
                } else {
                    return redirect()->back()->with(session()->flash('alert-danger', 'Please! enter correct old password.'));
                }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
    }

    public function setDefaultAddress(Request $request)
    {
        $request->validate([
            'userid' => 'required',
            'address_id' => 'required',
        ]);

        $update = Address::where('user_id', '=', $request->userid)->update(['set_default' => '0']);
        $addressid = Address::where('id', '=', $request->address_id)->where('user_id', '=', $request->userid)
            ->update([
                'set_default' => '1',
            ]);
        if ($update && $addressid) {
            return redirect()->back()->with(session()->flash('alert-success', 'Default Address Set'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
    }

    public function removeMyAddress(Request $request)
    {
        $request->validate([
            'userid' => 'required',
            'address_id' => 'required',
        ]);
        $addressdelete = Address::where('id', '=', $request->address_id)->where('user_id', '=', $request->userid)->delete();
        if ($addressdelete) {
            return redirect()->back()->with(session()->flash('alert-success', 'Address Removed Successfully'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
        }
    }

    //Address Details Get start
    public function getaddressdetails(Request $request)
    {
        $address_id = $request->post('address_id');
        $addressesss = Address::where('id', $address_id)->get()->toJson();
        return $addressesss;
    }
    public function getcategorybrands(Request $request)
    {
        $address_id = $request->post('address_id');
        $catebrabddetailsss = Category_wise_brand::where('category_id', $address_id)->get();
        foreach ($catebrabddetailsss as $cat) {
            $brand = \App\Models\Brand::find($cat->brand_id);
            $cat->brand_id = uploaded_asset($brand->logo);
            $cat->image = uploaded_asset($cat->image);
        }
        return $catebrabddetailsss;
    }

    //Address Details Get End
    public function userProfileUpdate(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->avatar_original = $request->photo;

        $seller = $user->seller;

        if ($seller) {
            $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
            $seller->bank_payment_status = $request->bank_payment_status;
            $seller->bank_name = $request->bank_name;
            $seller->bank_acc_name = $request->bank_acc_name;
            $seller->bank_acc_no = $request->bank_acc_no;
            $seller->bank_routing_no = $request->bank_routing_no;

            $seller->save();
        }

        $user->save();

        flash(translate('Your Profile has been updated successfully!'))->success();
        return back();
    }

    public function makeEnquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
            'user_type' => 'required',
        ]);

        $addcard = Enquiry::create([
            "name" => "$request->name",
            "phone" => "$request->phone",
            "email" => "$request->email",
            "message" => "$request->message",
            "user_type" => "$request->user_type",
            "page_name" => "$request->page_name",
        ]);
        if ($addcard) {
            return redirect()->back()->with(session()->flash('alert-success', 'Thank you for enquiry with us!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }

    public function flash_deal_details($slug)
    {
        $flash_deal = FlashDeal::where('slug', $slug)->first();
        // dd($flash_deal);
        if ($flash_deal != null)
            return view('frontend.flash_deal_details', compact('flash_deal'));
        else {
            abort(404);
        }
    }

    public function load_featured_section()
    {
        return view('frontend.partials.featured_products_section');
    }

    public function load_best_selling_section()
    {
        return view('frontend.partials.best_selling_section');
    }

    public function load_auction_products_section()
    {
        // if (!addon_is_activated('auction')) {
        //     return;
        // }
        // return view('auction.frontend.auction_products_section');
    }

    public function load_home_categories_section()
    {
        return view('frontend.partials.home_categories_section');
    }

    public function load_best_sellers_section()
    {
        return view('frontend.partials.best_sellers_section');
    }

    public function trackOrder(Request $request)
    {
        if ($request->has('order_code')) {
            $ocode = $request->order_code;
            if($request->type == "service"){
                $type = "service";
                $order = ServiceOrder::where('code', $request->order_code)->first();
            }else{
                $type = "product";
                $order = Order::where('code', $request->order_code)->first();
            }
            if ($order != null) {
                return view('frontend.track_order', compact('order', 'ocode', 'type'));
            }
        }
        return view('frontend.track_order');
    }

    public function product(Request $request, $slug)
    {
        $detailedProduct  = Product::with('category', 'reviews', 'brand', 'stocks', 'user', 'user.shop')
            ->where('slug', $slug)
            ->where('approved', 1)
            ->where('published', 1)
            ->first();

        if($detailedProduct){
            $current_date_time = strtotime(date('d-m-Y H:i:s'));
            $discount_price = home_discounted_base_price($detailedProduct);
            $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $base_price = home_base_price($detailedProduct);
            $filter_base_price = filter_var($base_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $save_price = $filter_base_price - $filter_discount_price;

            if($detailedProduct->discount_type == "percent"){
                $discount_type = $detailedProduct->discount .'% Off';
            }elseif($detailedProduct->discount_type == "amount") {
                $discount_type = '₹' .$detailedProduct->discount .' Flat Off';
            }else{
                $discount_type = "";
            }

            $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();
            $catid = $detailedProduct->category->id;
            $getParentid = Category::where('id','=',$catid)->first(['parent_id']);
            $get_parent_id = $getParentid->parent_id;
            $firstCatName = Category::where('id', $get_parent_id)->first();

            //Commented by AviSingh
            // $related_brands = Product::where('category_id',$catid)
            //     ->where('id', '!=', $detailedProduct->id)
            //     ->groupBy('brand_id')
            //     ->get();

            $related_brands = Product::where('category_id',$catid)
                ->where('brand_id', '!=', $detailedProduct->brand_id)
                ->groupBy('brand_id')
                ->orderBy('unit_price', 'ASC')
                ->get();

            $related_product_ids = RelatedProduct::where('product_id', $detailedProduct->id)
                ->get()
                ->pluck('items_id');

            $proRelated__products = Product::with('brand', 'stocks')
                ->whereIn('id', $related_product_ids)
                ->where('approved', 1)
                ->get();

            $bought_together_ids = BoughtTogether::where('product_id', $detailedProduct->id)
                ->get()
                ->pluck('items_id');

            if($bought_together_ids->isEmpty()){
                $boughttogether = [];
            }else{
                $boughttogether = Product::with('brand', 'stocks')
                ->whereIn('id', $bought_together_ids)
                ->where('approved', 1)
                ->get();
            }

            $related_products = filter_products(Product::where('category_id', $detailedProduct->category_id)->where('id', '!=', $detailedProduct->id))->limit(10)->get();
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $sameidCount = Cart::where('user_id', $user_id)->where('product_id',$detailedProduct->id)->get();
            } else {
                $temp_user_id = Session::get('temp_user_id');
                $sameidCount = ($temp_user_id != null) ? Cart::where('temp_user_id', $temp_user_id)->get() : [] ;

                // $sameidCount = Cart::where('temp_user_id', $temp_user_id)->where('product_id',$detailedProduct->id)->get();
            }
            $detailed_choice_options = json_decode($detailedProduct->choice_options);
            $ids = array();
            foreach($detailed_choice_options as $value){
                $ids[] = $value->attribute_id;
            }
            $attribute_type_arr = Attribute::whereIn('id', $ids)->get();
            $detailed_choice_colors = json_decode($detailedProduct->colors);
            $color_arr =  json_decode($detailedProduct->colors);
            $color_name  = Color::whereIn('code', $color_arr)->get();

            // seller details

            $seller_details = Shop::where('id', $detailedProduct->user_id)->first();
            // dd($seller_details);
            //more seller start
            // \DB::connection()->enableQueryLog();
            $more_seller_products = array();
            if ($detailedProduct->product_master_id != null) {
                $more_seller_products =  Product::select('products.id', 'products.unit_price', 'products.discount_type', 'products.discount_start_date', 'products.discount_end_date', 'shops.name as shop_name')
                    ->leftJoin('shops', 'products.user_id', '=', 'shops.user_id')
                    ->where(['products.product_master_id' => $detailedProduct->product_master_id,
                            'products.brand_id' => $detailedProduct->brand_id])
                    ->orderBy('products.unit_price', 'asc')
                    ->take(3)->get();
                // $queries = \DB::getQueryLog();
                // return $queries;
            }
            //more seller end

            if ($detailedProduct != null && $detailedProduct->published) {
                if ($detailedProduct->digital == 1) {
                    $data = [
                        'discount_price' => $discount_price,
                        'detailedProduct' => $detailedProduct,
                        'categories' => $categories
                    ];
                    return view('frontend.digital_product_details', $data);
                } else {
                    $data_array = [
                        'seller_details' => $seller_details,
                        'detailedProduct' => $detailedProduct,
                        'base_price' => $base_price,
                        'filter_base_price' => $filter_base_price,
                        'discount_price' => $discount_price,
                        'filter_discount_price' => $filter_discount_price,
                        'save_price' => $save_price,
                        'discount_type' => $discount_type,
                        'categories' => $categories,
                        'get_parent_id' => $get_parent_id,
                        'firstCatName' => $firstCatName,
                        'related_brands' => $related_brands,
                        'proRelated__products' => $proRelated__products,
                        'boughttogether' => $boughttogether,
                        'sameidCount' => $sameidCount,
                        'related_products' => $related_products,
                        'attribute_type_arr' => $attribute_type_arr,
                        'color_name' => $color_name,
                        'more_seller_products' => $more_seller_products,
                        'current_date_time' => $current_date_time,
                    ];
                        if(auth()->user() != null){
                            $data = array_merge($data_array, ['user_id' => $user_id]);
                            return view('frontend.product_details', $data);
                        }else{
                            $data = array_merge($data_array, ['temp_user_id' => $temp_user_id]);
                            return view('frontend.product_details', $data);
                        }
                }
            }
        }else{
            abort(404);
        }
    }

    //product wise bulk order list
    public function bulkOrder(Request $request, $slug) {
        $detailedProduct  = Product::with('category', 'brand', 'stocks', 'user', 'user.shop')->where('slug', $slug)->where('approved', 1)->first();
        $currency = Currency::findOrFail(get_setting('system_default_currency'))->code;

        if ($detailedProduct != null && $detailedProduct->published) {
            $photos = explode(',', $detailedProduct->photos);
            $brand_products = Product::where('category_id', $detailedProduct->category_id)->where('id', '!=', $detailedProduct->id)->groupBy('brand_id')->get();
            $bulk_product_list = Product::with('category', 'stocks')->where('category_id',$detailedProduct->category_id)->get();
            $category_list = Category::select('id', 'name')->where('parent_id', $detailedProduct->category_id)->get();
            $related_product_list = filter_products(\App\Models\Product::where('category_id', $detailedProduct->category_id)->where('id', '!=', $detailedProduct->id))->limit(10)->get();

            $data = [
                'detailedProduct' => $detailedProduct,
                'currency' => $currency,
                'photos' => $photos,
                'brand_products' => $brand_products,
                'bulk_product_list' => $bulk_product_list,
                'category_list' => $category_list,
                'related_product_list' => $related_product_list,
                'slug' => $slug,
            ];
            return view('frontend.bulk_order_details', $data);
        }
        abort(404);
    }

    // filter product bulk order list by Ajax
    public function getFilterBulkOrderData(Request $request){
        $search_keys = $request->searchKey;
        $output = '';
        $detailedProduct  = Product::where('slug', $request->slug)->where('approved', 1)->first();
        $category_list = Category::where('parent_id', $detailedProduct->category_id)
            ->get()
            ->pluck('id');
        $category_ids = $category_list->push($detailedProduct->category_id);
        // print_r($myArr);

        $query = \App\Models\Product::with('category', 'stocks');

        if($request->third_category){
            $query->where('category_id', $request->third_category);
        }else{
            $query->whereIn('category_id', $category_ids);
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

        $sr_number = 1;
        foreach($bulk_product_list as $list){
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

        return Response::json([
             'status' => true,
             'data' => $output,
             'category_ids' => $category_list,
         ], 200);
    }

    public function filter_shop($slug, $type)
    {
        $shop  = Shop::where('slug', $slug)->first();
        if ($shop != null && $type != null) {
            return view('frontend.seller_shop', compact('shop', 'type'));
        }
        abort(404);
    }

    public function all_categories(Request $request)
    {
        $categories = Category::where('level', 0)->where('type', '1')->orderBy('order_level', 'asc')->get();
        foreach($categories as $key => $category){
            $sub_category_count = \App\Models\Category::where('parent_id',$category->id)->count();
            $category->count = $sub_category_count;
        }

        return view('frontend.all_category', compact('categories'));
    }

    public function all_brands(Request $request)
    {
        $premium_brands = json_decode(get_setting('top10_brands'));
        $brand_list = Brand::whereIn('id', $premium_brands)->get();
        return view('frontend.all_brand', compact('brand_list'));
    }

    public function all_service_category(Request $request)
    {
        $servicecategories = Category::where('level', 0)->where('type', '2')->orderBy('order_level', 'asc')->get();
        foreach($servicecategories as $key => $category){
            $sub_category_count = \App\Models\Category::where('parent_id',$category->id)->count();
            $category->count = $sub_category_count;
        }
        return view('frontend.all_service_category', compact('servicecategories'));
    }

    public function show_product_upload_form(Request $request)
    {
        $seller = Auth::user()->seller;
        if (addon_is_activated('seller_subscription')) {
            if ($seller->seller_package && $seller->seller_package->product_upload_limit > $seller->user->products()->count()) {
                $categories = Category::where('parent_id', 0)
                    ->where('digital', 0)
                    ->with('childrenCategories')
                    ->get();
                return view('frontend.user.seller.product_upload', compact('categories'));
            } else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
        return view('frontend.user.seller.product_upload', compact('categories'));
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $lang = $request->lang;
        $tags = json_decode($product->tags);
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
        return view('frontend.user.seller.product_edit', compact('product', 'categories', 'tags', 'lang'));
    }

    public function seller_product_list(Request $request)
    {
        $search = null;
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 0)->orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $search = $request->search;
            $products = $products->where('name', 'like', '%' . $search . '%');
        }
        $products = $products->paginate(10);
        return view('frontend.user.seller.products', compact('products', 'search'));
    }

    public function home_settings(Request $request)
    {
        return view('home_settings.index');
    }

    public function top_10_settings(Request $request)
    {
        foreach (Category::all() as $key => $category) {
            if (is_array($request->top_categories) && in_array($category->id, $request->top_categories)) {
                $category->top = 1;
                $category->save();
            } else {
                $category->top = 0;
                $category->save();
            }
        }

        foreach (Brand::all() as $key => $brand) {
            if (is_array($request->top_brands) && in_array($brand->id, $request->top_brands)) {
                $brand->top = 1;
                $brand->save();
            } else {
                $brand->top = 0;
                $brand->save();
            }
        }

        flash(translate('Top 10 categories and brands have been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;
        $tax = 0;
        $max_limit = 0;

        if ($request->has('color')) {
            $str = $request['color'];
        }

        if (json_decode($product->choice_options) != null) {
            foreach (json_decode($product->choice_options) as $key => $choice) {
                if ($str != null) {
                    $str .= '-' . str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                } else {
                    $str .= str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                }
            }
        }

        $product_stock = $product->stocks->where('variant', $str)->first();
        $price = $product_stock->price;
        $sku = $product_stock->sku;

        if ($product->wholesale_product) {
            $wholesalePrice = $product_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();
            if ($wholesalePrice) {
                $price = $wholesalePrice->price;
            }
        }

        $quantity = $product_stock->qty;
        $max_limit = $product_stock->qty;

        if ($quantity >= 1 && $product->min_qty <= $quantity) {
            $in_stock = 1;
        } else {
            $in_stock = 0;
        }

        //Product Stock Visibility
        if ($product->stock_visibility_state == 'text') {
            if ($quantity >= 1 && $product->min_qty < $quantity) {
                $quantity = translate('In Stock');
            } else {
                $quantity = translate('Out Of Stock');
            }
        }

        //discount calculation
        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        // taxes
        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }

        $price += $tax;

        return array(
            'price' => single_price($price * $request->quantity),
            'total_price' => $price * $request->quantity,
            'sku' => $sku,
            'quantity' => $quantity,
            'digital' => $product->digital,
            'variation' => $str,
            'max_limit' => $max_limit,
            'in_stock' => $in_stock
        );
    }

    public function sellerpolicy()
    {
        return view("frontend.policies.sellerpolicy");
    }

    public function returnpolicy()
    {
        return view("frontend.policies.returnpolicy");
    }

    public function supportpolicy()
    {
        return view("frontend.policies.supportpolicy");
    }

    public function terms()
    {
        return view("frontend.policies.terms");
    }

    public function privacypolicy()
    {
        return view("frontend.policies.privacypolicy");
    }

    public function get_pick_up_points(Request $request)
    {
        $pick_up_points = PickupPoint::all();
        return view('frontend.partials.pick_up_points', compact('pick_up_points'));
    }

    public function get_category_items(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return view('frontend.partials.category_elements', compact('category'));
    }

    public function premium_package_index()
    {
        $customer_packages = CustomerPackage::all();
        return view('frontend.user.customer_packages_lists', compact('customer_packages'));
    }

    public function seller_digital_product_list(Request $request)
    {
        $products = Product::where('user_id', Auth::user()->id)->where('digital', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.user.seller.digitalproducts.products', compact('products'));
    }

    public function show_digital_product_upload_form(Request $request)
    {
        $seller = Auth::user()->seller;
        if (addon_is_activated('seller_subscription')) {
            if ($seller->seller_package && $seller->seller_package->product_upload_limit > $seller->user->products()->count()) {
                $categories = Category::where('digital', 1)->get();
                return view('frontend.user.seller.digitalproducts.product_upload', compact('categories'));
            } else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }
        $categories = Category::where('digital', 1)->get();
        return view('frontend.user.seller.digitalproducts.product_upload', compact('categories'));
    }

    public function show_digital_product_edit_form(Request $request, $id)
    {
        $categories = Category::where('digital', 1)->get();
        $lang = $request->lang;
        $product = Product::find($id);
        return view('frontend.user.seller.digitalproducts.product_edit', compact('categories', 'product', 'lang'));
    }

    // Ajax call
    public function new_verify(Request $request)
    {
        $email = $request->email;
        if (isUnique($email) == '0') {
            $response['status'] = 2;
            $response['message'] = 'Email already exists!';
            return json_encode($response);
        }

        $response = $this->send_email_change_verification_mail($request, $email);
        return json_encode($response);
    }

    // Form request
    public function update_email(Request $request)
    {
        $email = $request->email;
        if (isUnique($email)) {
            $this->send_email_change_verification_mail($request, $email);
            flash(translate('A verification mail has been sent to the mail you provided us with.'))->success();
            return back();
        }

        // <!-- flash(translate('Email already exists!'))->warning(); -->
        flash('alert-warning', 'Email already exists!');
        return back();
    }

    public function send_email_change_verification_mail($request, $email)
    {
        $response['status'] = 0;
        $response['message'] = 'Unknown';

        $verification_code = Str::random(32);

        $array['subject'] = 'Email Verification';
        $array['from'] = env('MAIL_FROM_ADDRESS');
        $array['content'] = 'Verify your account';
        $array['link'] = route('email_change.callback') . '?new_email_verificiation_code=' . $verification_code . '&email=' . $email;
        $array['sender'] = Auth::user()->name;
        $array['details'] = "Email Second";

        $user = Auth::user();
        $user->new_email_verificiation_code = $verification_code;
        $user->save();

        try {
            Mail::to($email)->queue(new SecondEmailVerifyMailManager($array));

            $response['status'] = 1;
            $response['message'] = translate("Your verification mail has been Sent to your email.");
        } catch (\Exception $e) {
            // return $e->getMessage();
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    public function email_change_callback(Request $request)
    {
        if ($request->has('new_email_verificiation_code') && $request->has('email')) {
            $verification_code_of_url_param =  $request->input('new_email_verificiation_code');
            $user = User::where('new_email_verificiation_code', $verification_code_of_url_param)->first();

            if ($user != null) {

                $user->email = $request->input('email');
                $user->new_email_verificiation_code = null;
                $user->save();

                auth()->login($user, true);

                // <!-- flash(translate('Email Changed successfully'))->success(); -->
                flash('alert-success', 'Email already exists!');
                return redirect()->route('dashboard');
            }
        }

        // <!-- flash(translate('Email was not verified. Please resend your mail!'))->error(); -->
        // flash('alert-danger', 'Email was not verified. Please resend your mail!');
        return redirect()->route('dashboard')->with(session()->flash('alert-danger', 'Email was not verified. Please resend your mail.'));
        // return redirect()->route('dashboard');
    }

    public function reset_password_with_code(Request $request)
    {
        if (($user = User::where('email', $request->email)->where('verification_code', $request->code)->first()) != null) {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                event(new PasswordReset($user));
                auth()->login($user, true);

                // flash(translate('Password updated successfully'))->success();
                flash('alert-danger', 'Password updated successfully!');


                if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            } else {
                return redirect()->route('password.request')->with(session()->flash('alert-danger', 'Password and confirm password did not match.'));
            }
        } else {
            // <!-- flash("Verification code mismatch")->error(); -->
            return redirect()->route('password.request')->with(session()->flash('alert-danger', 'Verification code mismatch.'));
        }
    }

    public function all_flash_deals()
    {
        $today = strtotime(date('Y-m-d H:i:s'));
        $data['all_flash_deals'] = FlashDeal::where('status', 1)
            ->where('start_date', "<=", $today)
            ->where('end_date', ">", $today)
            ->orderBy('created_at', 'desc')
            ->get();

        return view("frontend.flash_deal.all_flash_deal_list", $data);
    }

    public function all_seller(Request $request)
    {
        $shops = Shop::whereIn('user_id', verified_sellers_id())
            ->paginate(15);

        return view('frontend.shop_listing', compact('shops'));
    }

    public function all_coupons(Request $request)
    {
        $coupons = Coupon::where('start_date', '<=', strtotime(date('d-m-Y')))->where('end_date', '>=', strtotime(date('d-m-Y')))->paginate(15);
        return view('frontend.coupons', compact('coupons'));
    }

    public function inhouse_products(Request $request)
    {
        $products = filter_products(Product::where('added_by', 'admin'))->with('taxes')->paginate(12)->appends(request()->query());
        return view('frontend.inhouse_products', compact('products'));
    }

    public function productRequestQuote(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            // 'price_range' => 'required|numeric',
            // 'message' => 'required',
            // 'category' => 'required',
        ]);
        //    dd($request->name);
        //    die;
        $add_product_request_enquiry = ProductQuoteEnquiry::create([
            "name" => "$request->name",
            "email" => "$request->email",
            "phone" => "$request->phone",
            "price_range" => "$request->price_range",
            "message" => "$request->message",
            "category" => "$request->category",
            "type" => "$request->type",
        ]);
        if ($add_product_request_enquiry) {
            return redirect()->back()->with(session()->flash('alert-success', 'Thank you for enquiry with us!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }

    public function insertCallRequest(Request $request)
    {
        $add_product_request_enquiry = CallRequest::create([
            "name" => "$request->name",
            "email" => "$request->email",
            "mobile" => "$request->mobile",

        ]);
        response()->json(['status' => "Call Request sent successfully"]);
    }

    public function productnotifyme(Request $request)
    {
        $stock_notify = ProductNotify::create([
            "product_id" => "$request->pid",
            "user_id" => "$request->userid",
        ]);
        response()->json(['status' => "We we'll notify you when this product is back in stock!"]);
    }

    public function getcatWiseBrands()
    {
        $output = '

        <p>hi Rana sharma</p>

        ';
        return $output;
    }

    public function verifyEmail()
    {
        $data = [];
        if (session()->get('verify') != null) {
            $data = [
                'verify'=>session()->get('verify')
            ];
        }
        return view('frontend.emailverify',$data);
    }

    public function verifyOtpOfEmail(Request $request)
    {
        $output = [];
        if (session()->get('verify') != null) {
            $rules = [
                'otp' => 'required|min:6|max:6'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $output = [
                    'status' => false,
                    "status_code" => 400,
                    'msg' => 'Errors',
                    'errors' => $validator->getMessageBag()->toArray()
                ];
            } else {
                $sessionData = session()->get('verify');
                $email = $sessionData['email'];
                $session_otp = $sessionData['code'];
                $otp = $request->otp;
                $is_exist = User::where('email','=',$email)->first();
                // return dd($is_exist->toSql());
                if($is_exist != null){
                    if($is_exist->verification_code == $otp){
                        $data = [
                            'email_verified_at' => date('Y-m-d H:m:s'),
                            'verification_code' => NULL,
                            'is_verified' => 1,
                        ];
                        $result = User::where('email', $email)->update($data);
                        if($result){
                            $name = $is_exist->name;
                            $template = view('mailers.signup_successfully.signup_successfully',compact('name'));
                            $userdetails = array(
                                "mail_identifier" => "email_otp_verified",
                                "name"=>$is_exist->name,
                                "to"=>$is_exist->email,
                                "subject"=>"Registration",
                                "template"=> $template
                                // "template"=> "'.$template.'"
                            );
                            $mail = new \App\Http\Controllers\SendmailerController;
                            $mail->StoreMail($userdetails);

                            // session()->flush('verify');
                            $output = [
                                "status" => true,
                                "status_code" => 200,
                                "msg" => "Thank you! Your OTP is Verified.",
                                "data" => []
                            ];

                            $request->session()->put('user',$sessionData);
                            auth()->login($is_exist, true);
                        }else{
                            $output = [
                                "status" => false,
                                "status_code" => 500,
                                "msg" => "Something went wrong! Please try again.",
                                "data" => []
                            ];
                        }
                    }else{
                        $output = [
                            "status" => false,
                            "status_code" => 400,
                            "msg" => "Invalid OTP.",
                            "data" => []
                        ];
                    }
                }else{
                    $output = [
                        "status" => false,
                        "status_code" => 400,
                        "msg" => "Invalid Email.",
                        "data" => []
                    ];
                }
            }
        } else {
            $output = [
                "status" => false,
                "status_code" => 500,
                "msg" => "Invalid Request.",
                "data" => []
            ];
        }
        return $output;
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'login_password' => 'required',
        ]);
        $getPassword = User::where('id', Auth::user()->id)->first();
        $getPass = $getPassword->password;

        if (!Hash::check($request->login_password, $getPass)) {
            return response()->json(['success' => false, 'message' => 'Login Fail, pls check password']);
        } else {
            // return response()->json(['status'=>'2']);
            return response()->json(['success' => true, 'message' => 'Login Success!']);
        }
    }

    public function moreSeller()
    {
        return view('frontend.more_seller');
    }

    public function relatedProduct($id)
    {
        $current_date_time = strtotime(date('d-m-Y H:i:s'));
        $product = Product::find($id);
        $related_category_products = array();
        if ($product->product_master_id != null) {
            $related_category_products =  Product::where(['product_master_id' => $product->product_master_id, 'brand_id' => $product->brand_id])->orderBy('unit_price', 'asc')->get();
        }
        return view('frontend.more_seller', ['products' => $related_category_products, 'pro' => $product, 'current_date_time' => $current_date_time]);
    }

    public function getPinCodeDetails(Request $request)
    {
        $pincode = $_POST['pincode'];
        $data = file_get_contents('http://postalpincode.in/api/pincode/' . $pincode);
        $data = json_decode($data);
        if (isset($data->PostOffice['0'])) {
            $arr['city'] = $data->PostOffice['0']->Taluk;
            $arr['state'] = $data->PostOffice['0']->State;
            echo json_encode($arr);
        } else {
            echo 'no';
        }
    }

    // check delivery service availabel

    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function check_delivery_service_available(Request $request)
    {

        // dd($request->all());
        // die;
        // dd($url = $this->url . 'courier/serviceability');
        // die;

        $data_string = json_encode($request->all());
        $thisToken   =   getToken();
        $url = $this->url . 'courier/serviceability';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $thisToken . ''
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null') {
          $dataArr = json_decode($jsonObj, true);
          return $dataArr;
        }
        return false;


    }

    public function check_delivery_free_or_charge(Request $request)
    {
        $store_pincode_in_session =  $request->delivery_postcode;
        Session::put('pincode_in_session',   $store_pincode_in_session);
        session()->put('pincode_in_session', $store_pincode_in_session);

        return $pin_details = ShippingManagementTable::where('pincode', $request->delivery_postcode)->where('vendor_id', $request->vendor_id)->where('product_id', $request->product_id)->where('shipment', 'free')->count();

    }


}
