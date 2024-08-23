<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Service;
use App\Models\ServiceCart;
use Auth;
use Session;
use Cookie;

class ServiceCartController extends Controller
{


    public function addToServiceUserCart(Request $request, $category_id = null, $brand_id = null){
        $service_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_price = $request->input('product_price');
        $service = Service::find($service_id);
        $service_carts = array();
        $data = array();

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $data['user_id'] = $user_id;
            $check_exist_service = ServiceCart::where('user_id', $user_id)->where('service_id', $service_id)->first();
            if($check_exist_service == null){
                $get_cart_service = ServiceCart::select('services.id', 'services.master_service_id')
                    ->leftJoin('services', 'service_carts.service_id', '=', 'services.id')
                    ->where('service_carts.user_id', $user_id)
                    ->first();

                if($get_cart_service != null && $service->master_service_id != $get_cart_service->master_service_id){
                    $cartItems = ServiceCart::where('user_id', Auth::user()->id)->get();
                    ServiceCart::destroy($cartItems);
                }
            }

        } else {
            if($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            $data['temp_user_id'] = $temp_user_id;
            $check_exist_service = ServiceCart::where('temp_user_id', $temp_user_id)->where('service_id', $service_id)->first();
            if($check_exist_service == null){
                $get_cart_service = ServiceCart::select('services.id', 'services.master_service_id')
                    ->leftJoin('services', 'service_carts.service_id', '=', 'services.id')
                    ->where('service_carts.temp_user_id', $temp_user_id)
                    ->first();

                if($service->master_service_id != $get_cart_service->master_service_id){
                    $cartItems = ServiceCart::where('user_id', Auth::user()->id)->get();
                    ServiceCart::destroy($cartItems);
                }
            }
        }

        if($check_exist_service == null){
            $data['service_id'] = $service->id;
            $data['owner_id'] = $service->user_id;
            $str = '';
            $tax = 0;
            $price = 0;
            $current_date_time = strtotime(date('d-m-Y H:i:s'));

            if($service->discount != null && $service->discount_start_date <= $current_date_time && $service->discount_end_date >= $current_date_time){
                $price = home_discounted_base_price($service, false);
            }else{
                $price = home_base_price($service, false);
            }

            foreach ($service->taxes as $service_tax) {
                if($service_tax->tax_type == 'percent'){
                    $tax += ($price * $service_tax->tax) / 100;
                }
                elseif($service_tax->tax_type == 'amount'){
                    $tax += $service_tax->tax;
                }
            }

            $data['quantity'] = $service->min_qty;
            $data['price'] = $price;
            $data['tax'] = $tax;
			$data['total_price'] = $service->min_qty*$price;
            $data['shipping_cost'] = 0;
            $data['product_referral_code'] = null;
            $data['cash_on_delivery'] = $service->cash_on_delivery;
            // $data['digital'] = $service->digital;

            // if($service_carts == null){
                ServiceCart::create($data);
            // }
        }

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $carts = ServiceCart::where('user_id', $user_id)->get();
            $sumcartamount = ServiceCart::where('user_id',$user_id)->sum('total_price');
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = ServiceCart::where('temp_user_id', $temp_user_id)->get();
            $sumcartamount = ServiceCart::where('temp_user_id',$temp_user_id)->sum('total_price');
        }
        return array(
            'service_cart_count' => count($carts),
            'service_sum_cart_count' => $sumcartamount,
            'service_nav_cart_view' => view('frontend.partials.servicecart')->render(),
        );

    }

    public function service_cart_list(Request $request)
    {
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            if($request->session()->get('temp_user_id')) {
                ServiceCart::where('temp_user_id', $request->session()->get('temp_user_id'))
                        ->update([
                                    'user_id' => $user_id,
                                    'temp_user_id' => null
                                ]);

                Session::forget('temp_user_id');
            }
            $service_carts = ServiceCart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $service_carts = ($temp_user_id != null) ? ServiceCart::where('temp_user_id', $temp_user_id)->get() : [] ;
        }

    //    return view('frontend.service_view_cart', compact('service_carts'));
    }

    public function deleteFromCart(Request $request){

        // if(Auth::check())
        // {
            $prod_id = $request->input('prod_id');
            // if(ServiceCart::where('id',$prod_id)->where('user_id', Auth::id())->exists())
            // {
                $cartItem = ServiceCart::where('id',$prod_id)->first();
                $cartItem->delete();
                return response()->json(['status'=>"Removed from Cart"]);
            // }
        // }
        // else
        // {
        //     return response()->json(['status' => "Login to Your Account"]);
        // }

    }

    // add to service cart function here
	public function addToServiceCart(Request $request)
    {
		//dd($request->all());
        $service = Service::find($request->id);
		//dd($service);
        $service_carts = array();
        $data = array();

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $data['user_id'] = $user_id;
            $check_exist_service = ServiceCart::where('user_id', $user_id)->where('service_id', $request->id)->first();
			// $sumcartprice = ServiceCart::where('user_id',$user_id)->sum('price');
			// $sumcarttax = ServiceCart::where('user_id',$user_id)->sum('tax');
			// $sumcartamount = $sumcartprice+$sumcarttax;
        } else {
            if($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            $data['temp_user_id'] = $temp_user_id;

            $check_exist_service = ServiceCart::where('temp_user_id', $temp_user_id)->where('service_id', $request->id)->first();
			// $sumcartprice = ServiceCart::where('temp_user_id',$temp_user_id)->sum('price');
			// $sumcarttax = ServiceCart::where('temp_user_id',$temp_user_id)->sum('tax');
			// $sumcartamount = $sumcartprice+$sumcarttax;
        }

        if($check_exist_service == null){
            $data['service_id'] = $service->id;
            $data['owner_id'] = $service->user_id;
            $str = '';
            $tax = 0;
            $price = 0;
            $current_date_time = strtotime(date('d-m-Y H:i:s'));

            if($service->discount != null && $service->discount_start_date <= $current_date_time && $service->discount_end_date >= $current_date_time){
                $price = home_discounted_base_price($service, false);
            }else{
                $price = home_base_price($service, false);
            }

            foreach ($service->taxes as $service_tax) {
                if($service_tax->tax_type == 'percent'){
                    $tax += ($price * $service_tax->tax) / 100;
                }
                elseif($service_tax->tax_type == 'amount'){
                    $tax += $service_tax->tax;
                }
            }

            $data['quantity'] = $service->min_qty;
            $data['price'] = $price;
            $data['tax'] = $tax;
			$data['total_price'] = $service->min_qty*$price;
            $data['shipping_cost'] = 0;
            $data['product_referral_code'] = null;
            $data['cash_on_delivery'] = $service->cash_on_delivery;
            // $data['digital'] = $service->digital;

            // if($service_carts == null){
                ServiceCart::create($data);
            // }
        }

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $service_carts = ServiceCart::where('user_id', $user_id)->get();
            $sumcartamount = ServiceCart::where('user_id',$user_id)->sum('total_price');
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $service_carts = ServiceCart::where('temp_user_id', $temp_user_id)->get();
            $sumcartamount = ServiceCart::where('temp_user_id',$temp_user_id)->sum('total_price');
        }


        return array(
            'status' => 1,
            'services_cart_count' => count($service_carts),
            'services_sum_cart_count' => $sumcartamount,
            'services_nav_cart_view' => view('frontend.partials.servicecart')->render(),
        );

    }
	// add to service cart function end here

    //removes services from service Cart
    public function ServiceremoveFromCart(Request $request)
    {
        ServiceCart::destroy($request->id);
        // $cartItem = ServiceCart::where('id',$request->id)->first();
        // $cartItem->delete();
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $service_carts = ServiceCart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $service_carts = ServiceCart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'service_cart_count' => count($service_carts),

            // 'service_cart_view' => view('frontend.partials.service_cart_update_ajax', compact('service_carts'))->render(),
            // 'service_nav_cart_view' => view('frontend.partials.servicecart')->render(),
        );
    }

    public function addServiceBoughtTogether(Request $request){
        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $temp_user_id = null;
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');

            if($temp_user_id == null || $temp_user_id == ""){
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
        }
        $serviceids =  $request->input('service_id', []);
        $price =  $request->input('product_price', []);
        $quantity =  1;

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $data['user_id'] = $user_id;
            $service_carts = ServiceCart::where('user_id', $user_id)->get();
            $sameProductinCart = ServiceCart::where('user_id', $user_id)->where('service_id',$request->service_id)->exists();
            $sameProductinCartQuantity = ServiceCart::where('user_id', $user_id)->where('service_id',$request->service_id)->first();
        } else {
            if($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            $data['temp_user_id'] = $temp_user_id;
            $service_carts = ServiceCart::where('temp_user_id', $temp_user_id)->get();
            $sameProductinCart = ServiceCart::where('temp_user_id', $temp_user_id)->where('service_id',$request->service_id)->exists();
            $sameProductinCartQuantity = ServiceCart::where('temp_user_id', $temp_user_id)->where('service_id',$request->service_id)->first();
        }

        if($sameProductinCart>=1){
            $results = [];
            // foreach ($request->productids as $index => $unit) {
                foreach ($request->input('service_id', []) as $key => $service_id){
                $results[] = [
                    "service_id" => $serviceids[$key],
                    "price" => $price[$key],
                    "quantity" => $quantity,
                    "temp_user_id" => $temp_user_id,
                    "user_id" => $user_id,
                    "total_price" => $quantity*$price[$key],
                    "variation" => '',
                    ];
                    $cartupdate = ServiceCart::where('service_id', $serviceids[$key])
                    ->update([
                            'quantity' => $quantity+$sameProductinCartQuantity->quantity,
                            'total_price' => $quantity+$sameProductinCartQuantity->quantity*$price[$key],
                        ]);
            }

        }else{
            $results = [];

            foreach ($request->input('service_id', []) as $key => $service_id){
                $results[] = [
                        "service_id" => $serviceids[$key],
                        "price" => $price[$key],
                        "quantity" => $quantity,
                        "temp_user_id" => $temp_user_id,
                        "user_id" => $user_id,
                        "total_price" => $quantity*$price[$key],
                        "variation" => '',
                    ];
            }
            ServiceCart::insert($results);
        }

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $service_carts = ServiceCart::where('user_id', $user_id)->get();
            $sumcartamount = ServiceCart::where('user_id',$user_id)->sum('total_price');
        } else {
            // $temp_user_id = $request->session()->get('temp_user_id');
            $service_carts = ServiceCart::where('temp_user_id', $temp_user_id)->get();
            $sumcartamount = ServiceCart::where('temp_user_id',$temp_user_id)->sum('total_price');
        }
        return array(
            // 'status' => 'Added To Cart!',
            'service_cart_count' => count($service_carts),
            'service_sum_cart_count' => $sumcartamount,
            'service_nav_cart_view' => view('frontend.partials.servicecart')->render(),
            'bought_together' => view('frontend.partials.servicebought_together')->render(),
        );

    }

    /** Used for service cart */
    public function serviceCartModal(Request $request){
        $service_carts = [];
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $service_carts =  ServiceCart::where('user_id', $user_id)->get();
        }

        $output = '<div class="addservcartscroll">';
        foreach ($service_carts as $item){
            if(isset($item->service)){
                $output .= '<div class="row py-2 border-sm-bot-wh">';
                    if ($item->service->thumbnail_img != null){
                    $output .= '<div class="col-md-3">
                            <img src="'.uploaded_asset($item->service->thumbnail_img) .'" alt="'.$item->service->name.'" class="addcartservimg">
                        </div>';
                    }else{
                        $output .= '<div class="col-md-3">
                            <img src="'. static_asset('assets/img/placeholder.jpg') .'" alt="' .$item->service->name .'" class="addcartservimg">
                        </div>';
                    }

                    $output .= '<div class="col-md-9">
                        <strong> '. $item->service->name .' </strong>
                    </div>
                </div>';
            }
        }

        $output .= '</div>';
            if($service_carts != []){
                $output .= '<div class="col-md-12 position-relative mt-2">
                    <a href="'. url('checkout/servicecheckout') .'" class="proceedquote">
                        Request A Quote
                    </a>
                    <i class="fa fa-times closebtnserv" aria-hidden="true"></i>
                </div>';
            }


        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);

    }
}
