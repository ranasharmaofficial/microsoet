<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceTax;
use App\Models\ServiceStock;
use App\Models\ServiceTranslation;
use App\Models\Category;
use App\Models\AttributeValue;
use App\Models\Color;
use App\Models\User;
use App\Models\ServiceBoughtTogether;
use App\Models\RelatedService;
use App\Models\ServiceCart;
use App\Models\Attribute;
use App\Models\Address;
use App\Models\ServiceOtherInfo;
use App\Models\ServiceEnquiry;
use Auth;
use Carbon\Carbon;
use Combinations;
use Illuminate\Support\Str;
use Artisan;
use Cache;
use Cookie;
use Illuminate\Support\Facades\Session;
use DB;
use Response;

class ServiceWebController extends Controller
{

    // public function staticDetails(){
        // return view('frontend.services.service_details');
    // }
	
	public function categoryStaticDetails()
    {
        return view('frontend.services.cat_details');
    }
	// service details code start here 
    public function service(Request $request, $slug)
    {
        $detailedService  = Service::with('category', 'brand', 'stocks', 'user', 'user.shop')
            ->where('slug', $slug)
            ->where('approved', 1)
            ->where('published', 1)
            ->first();
            // dd($detailedService); 
        if ($detailedService != null && $detailedService->published) {
            $current_date_time = strtotime(date('d-m-Y H:i:s'));
            $discount_price = home_discounted_base_price($detailedService);
            $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $base_price = home_base_price($detailedService);
            $filter_base_price = filter_var($base_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $save_price = $filter_base_price - $filter_discount_price;

            if($detailedService->discount_type == "percent"){
                $discount_type = $detailedService->discount .'% Off'; 
            }elseif($detailedService->discount_type == "amount") {
                $discount_type = '₹' .$detailedService->discount .' Flat Off';
            }else{
                $discount_type = "";
            }

            $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();
            $catid = $detailedService->category->id; 
            $getParentid = Category::where('id','=',$catid)->first(['parent_id']); 
            $get_parent_id = $getParentid->parent_id; 
            $firstCatName = Category::where('id', $get_parent_id)->first();
            $related_categories = Category::where('parent_id', $get_parent_id)->get();

            $related_brands = Service::where('category_id',$catid)
                ->where('id', '!=', $detailedService->id)
                ->groupBy('brand_id')
                ->get();
            // dd($related_brands);
            
            $related_service_ids = RelatedService::where('service_id', $detailedService->id)
                ->get()
                ->pluck('items_id');

            $service_other_infos = ServiceOtherInfo::where('service_id', $detailedService->id)
                ->get();

            $service_related_ = Service::with('brand', 'stocks')
                ->whereIn('id', $related_service_ids)
                ->where('approved', 1)
                ->get();

            $bought_together_ids = ServiceBoughtTogether::where('service_id', $detailedService->id)
                ->get()
                ->pluck('items_id');

            if($bought_together_ids->isEmpty()){
                $boughttogether = [];
            }else{
                $boughttogether = Service::with('brand', 'stocks')
                ->whereIn('id', $bought_together_ids)
                ->where('approved', 1)
                ->get();
            }

            $related_services = filter_products(Service::where('category_id', $detailedService->category_id)->where('id', '!=', $detailedService->id))->limit(10)->get();
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $sameidCount = ServiceCart::where('user_id', $user_id)->where('service_id',$detailedService->id)->get();
            } else {
                $temp_user_id = Session::get('temp_user_id');
                $sameidCount = ($temp_user_id != null) ? ServiceCart::where('temp_user_id', $temp_user_id)->get() : [] ;
            }
            $detailed_choice_options = json_decode($detailedService->choice_options);
            $ids = array();
            foreach($detailed_choice_options as $value){
                $ids[] = $value->attribute_id;
            }
            $attribute_type_arr = Attribute::whereIn('id', $ids)->get();
            $detailed_choice_colors = json_decode($detailedService->colors);
            $color_arr =  json_decode($detailedService->colors);
            $color_name  = Color::whereIn('code', $color_arr)->get();
            
            //more seller start
            \DB::connection()->enableQueryLog();
            $more_seller_services = array();
            if ($detailedService->master_service_id != null) {
                $more_seller_services =  Service::select('services.*', 'shops.name as shop_name')
                    ->leftJoin('shops', 'services.user_id', '=', 'shops.user_id')
                    ->where('services.master_service_id', $detailedService->master_service_id)
                    ->orderBy('services.unit_price', 'asc')
                    ->take(3)->get();
                $queries = \DB::getQueryLog();
                // return $queries;
            }
            //more seller end

            $data_array = [
                'detailedService' => $detailedService,
                'base_price' => $base_price,
                'filter_base_price' => $filter_base_price,
                'discount_price' => $discount_price,
                'filter_discount_price' => $filter_discount_price,
                'save_price' => $save_price,
                'discount_type' => $discount_type,
                'categories' => $categories,
                'get_parent_id' => $get_parent_id,
                'firstCatName' => $firstCatName,
                'related_categories' => $related_categories,
                'service_other_infos' => $service_other_infos,
                'related_brands' => $related_brands,
                'service_related_' => $service_related_,
                'boughttogether' => $boughttogether,
                'sameidCount' => $sameidCount,
                'related_services' => $related_services,
                'attribute_type_arr' => $attribute_type_arr,
                'color_name' => $color_name,
                'current_date_time' => $current_date_time,
                'more_seller_services' => $more_seller_services,
            ];

            if(auth()->user() != null){
                $data = array_merge($data_array, ['user_id' => $user_id]);
                return view('frontend.services.service_details', $data);
            }else{
                $data = array_merge($data_array, ['temp_user_id' => $temp_user_id]);
                return view('frontend.services.service_details', $data);
            }
        }
        abort(404);
    }
	// service details code end here 
	
	// variant price function start here
	public function service_variant_price(Request $request)
    {
        $service = Service::find($request->id);
        $str = '';
        $quantity = 0;
        $tax = 0;
        $max_limit = 0;

        if ($request->has('color')) {
            $str = $request['color'];
        }

        if (json_decode($service->choice_options) != null) {
            foreach (json_decode($service->choice_options) as $key => $choice) {
                if ($str != null) {
                    $str .= '-' . str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                } else {
                    $str .= str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                }
            }
        }

        $service_stock = $service->stocks->where('variant', $str)->first();
        $price = $service_stock->price;
        $sku = $service_stock->sku;

        if ($service->wholesale_product) {
            $wholesalePrice = $service_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();
            if ($wholesalePrice) {
                $price = $wholesalePrice->price;
            }
        }

        $quantity = $service_stock->qty;
        $max_limit = $service_stock->qty;

        if ($quantity >= 1 && $service->min_qty <= $quantity) {
            $in_stock = 1;
        } else {
            $in_stock = 0;
        }

        //service Stock Visibility
        if ($service->stock_visibility_state == 'text') {
            if ($quantity >= 1 && $service->min_qty < $quantity) {
                $quantity = translate('In Stock');
            } else {
                $quantity = translate('Out Of Stock');
            }
        }

        //discount calculation
        $discount_applicable = false;

        if ($service->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $service->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $service->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($service->discount_type == 'percent') {
                $price -= ($price * $service->discount) / 100;
            } elseif ($service->discount_type == 'amount') {
                $price -= $service->discount;
            }
        }

        // taxes
        foreach ($service->taxes as $service_tax) {
            if ($service_tax->tax_type == 'percent') {
                $tax += ($price * $service_tax->tax) / 100;
            } elseif ($service_tax->tax_type == 'amount') {
                $tax += $service_tax->tax;
            }
        }

        $price += $tax;

        return array(
            'price' => single_price($price * $request->quantity),
            'total_price' => $price * $request->quantity,
            'sku' => $sku,
            'quantity' => $quantity,
            'digital' => $service->digital,
            'variation' => $str,
            'max_limit' => $max_limit,
            'in_stock' => $in_stock
        );
    }
	// variant price function end here
	
	public function get_service_shipping_info(Request $request)
    {
		$addressCount = Address::where('user_id', Auth::user()->id)->count();
		$serivice_carts = Cart::where('user_id', Auth::user()->id)->get();
			if ($serivice_carts && count($serivice_carts) > 0) {
				$categories = Category::all();
				return view('frontend.service_shipping_info', compact('categories', 'serivice_carts','addressCount'));
			}
			flash(translate('Your service cart is empty'))->success();
			return back();
	}

    public function insertServiceEnquiry(Request $request)
    {
        $shippingAddress = [];
        if ($request->address != null) {
           $shippingAddress['name']         = $request->name;
           $shippingAddress['address']      = $request->address;
           $shippingAddress['area']         = $request->area;
           $shippingAddress['city']         = $request->city;
           $shippingAddress['state']        = $request->state;
           $shippingAddress['locality']     = $request->locality;
           $shippingAddress['landmark']     = $request->landmark;
           $shippingAddress['postal_code']  = $request->pincode;
        }

        $insert_service_enquiry = ServiceEnquiry::create([
			"user_id" => Auth::user()->id,
			"service_id" => $request->service_id,
			"service_name" => $request->service_name,
			"category_id" => $request->category_id,
			"vendor_id" => $request->vendor_id,
            "nature_work" => $request->nature_work,
            "location" => json_encode($shippingAddress),
            "phone" => $request->alt_phone,
            "additional_info" => $request->additional_requirement,
        ]);

        if ($insert_service_enquiry) {
            return redirect()->back()->with(session()->flash('alert-success', 'Thank you for enquiry with us!.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
    }

    public function moreSellerService($id)
    {
        $current_date_time = strtotime(date('d-m-Y H:i:s'));
        $service = Service::find($id);
        $related_category_services = array();
        if ($service->master_service_id != null) {
            $related_category_services =  Service::where(['master_service_id' => $service->master_service_id])->orderBy('unit_price', 'asc')->get();
        }
        return view('frontend.services.more_seller_service', ['services' => $related_category_services, 'service' => $service, 'current_date_time' => $current_date_time]);
    }
    
}