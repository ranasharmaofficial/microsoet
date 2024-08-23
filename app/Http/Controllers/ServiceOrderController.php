<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OTPVerificationController;
use Illuminate\Http\Request;
use Response;
use App\Models\Service;
use App\Models\ServiceCart;
use App\Models\ServiceOrder;
use App\Models\ServiceCombinedOrder;
use App\Models\ServiceOrderDetail;
use App\Models\ServiceEnquiry;
use App\Models\Address;
use App\Models\CommissionHistory;
use App\Models\Color;
use App\Models\CouponUsage;
use App\Models\Coupon;
use App\OtpConfiguration;
use App\Models\User;
use App\Models\BusinessSetting;
use App\Models\SmsTemplate;
use Auth;
use Session;
use DB;
use Mail;
use App\Mail\InvoiceEmailManager;
use App\Utility\NotificationUtility;
use App\Utility\SmsUtility;


class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $orders = DB::table('service_orders')
            ->orderBy('id', 'desc')
            //->join('order_details', 'orders.id', '=', 'order_details.service_order_id')
            ->where('seller_id', Auth::user()->id)
            ->select('orders.id')
            ->distinct();

        if ($request->payment_status != null) {
            $orders = $orders->where('payment_status', $request->payment_status);
            $payment_status = $request->payment_status;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }

        $orders = $orders->paginate(15);

        foreach ($orders as $key => $value) {
            $order = \App\Models\ServiceOrder::find($value->id);
            $order->viewed = 1;
            $order->save();
        }

        return view('frontend.user.seller.orders', compact('orders', 'payment_status', 'delivery_status', 'sort_search'));
    }

    /** All Orders list in admin panel by @AviSingh */ 
    public function all_orders(Request $request)
    {
        $date = $request->date;
        $sort_search = null;
        $delivery_status = null;

        $orders =ServiceOrder::orderBy('id', 'desc');
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $orders = $orders->paginate(15);
        return view('backend.sales.service_orders.index', compact('orders', 'sort_search', 'delivery_status', 'date'));
    }

    /** Show service order details on admin panel by @AviSingh */
    public function all_orders_show($id)
    {
        $order =ServiceOrder::findOrFail(decrypt($id));
        $order_shipping_address = json_decode($order->shipping_address);
        $delivery_boys = User::where('city', $order_shipping_address->city)
            ->where('user_type', 'delivery_boy')
            ->get();

        return view('backend.sales.service_orders.show', compact('order', 'delivery_boys'));
    }


    // Seller Orders
    public function seller_orders(Request $request)
    {
        $date = $request->date;
        $seller_id = $request->seller_id;
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $admin_user_id = User::where('user_type', 'admin')->first()->id;
        $orders =ServiceOrder::orderBy('code', 'desc')
            ->where('orders.seller_id', '!=', $admin_user_id);

        if ($request->payment_type != null) {
            $orders = $orders->where('payment_status', $request->payment_type);
            $payment_status = $request->payment_type;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($date != null) {
            $orders = $orders->whereDate('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        if ($seller_id) {
            $orders = $orders->where('seller_id', $seller_id);
        }

        $orders = $orders->paginate(15);
        return view('backend.sales.seller_orders.index', compact('orders', 'payment_status', 'delivery_status', 'sort_search', 'admin_user_id', 'seller_id', 'date'));
    }

    public function seller_orders_show($id)
    {
        $order =ServiceOrder::findOrFail(decrypt($id));
        $order->viewed = 1;
        $order->save();
        return view('backend.sales.seller_orders.show', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function ServicePayOnDelivery(Request $request)
    {
        request()->validate([
            'address_id' => 'required',
            'property_type' => 'required',
            // 'common_lables' => 'required',
            // 'common_value' => 'required',
            'additional_requirement' => 'required',
        ],
        [
            'address_id.required' => 'Please select/add new address first.',
        ]);

       $service_carts = ServiceCart::where('user_id', Auth::user()->id)->get();
		if ($service_carts->isEmpty()) {
            flash(translate('Your service cart is empty'))->warning();
            return redirect()->route('home');
        }
        $address_id = $request->input('address_id');
        $address = Address::where('id', $address_id)->first();
        // $address = Address::where('id', $carts[0]['address_id'])->first();
        $shippingAddress = [];
        if ($address != null) {
           $shippingAddress['name']         = $address->first_name.' '.$address->last_name;
           $shippingAddress['address']      = $address->address;
           $shippingAddress['area']         = $address->area;
           $shippingAddress['state']        = $address->state;
           $shippingAddress['city']        = $address->city;
           $shippingAddress['postal_code'] = $address->pin;
           $shippingAddress['phone']       = $address->phone;
            // if ($address->latitude || $address->longitude) {
            //     $shippingAddress['lat_lang'] = $address->latitude . ',' . $address->longitude;
            // }
        }

        
        $service_combined_order = new ServiceCombinedOrder;
        $service_combined_order->user_id = Auth::user()->id;
        $service_combined_order->shipping_address = json_encode($shippingAddress);
        $service_combined_order->save();

        $common_info = [];
        if($request->common_lables != null){
            $common_value = $request->common_value;
            foreach($request->common_lables AS $key=>$value){
                $common_info[$value] = $common_value[$key];
            }
        }

        $service_services = array();
        foreach ($service_carts as $cartItem){
            $service_ids = array();
            $service = $cartItem->service;
            if($service != null){
                if(isset($service_services[$service->user_id])){
                    $service_ids = $service_services[$service->user_id];
                }
                array_push($service_ids, $cartItem);
                $service_services[$service->user_id] = $service_ids;
            }
        }

        foreach ($service_services as $seller_product) {
            $order = new ServiceOrder;
            $order->service_combined_order_id = $service_combined_order->id;
            $order->user_id = Auth::user()->id;

            $order->service_type = $request->property_type;
            $order->common_info = json_encode($common_info);
            $order->additional_info = $request->additional_requirement;

            $order->shipping_address = $service_combined_order->shipping_address;

            $order->payment_type = $request->payment_option;
            $order->delivery_viewed = '0';
            $order->payment_status_viewed = '0';
            $order->code = date('Ymd-His') . rand(10, 99);
            $order->date = strtotime('now');
            $order->save();

            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            $coupon_discount = 0;

            //Order Details Storing
            foreach ($seller_product as $cartItem) {
               $service = Service::find($cartItem['service_id']);

                $subtotal += $cartItem['price'] * $cartItem['quantity'];
                $tax += $cartItem['tax'] * $cartItem['quantity'];
                $coupon_discount += $cartItem['discount'];
				
				if($cartItem['variation']!=='')
				{
					$product_variation = $cartItem['variation'];

					// $product_stock =$service->stocks->where('variant', $product_variation)->first();
					//if ($cartItem['quantity'] > $product_stock->qty) {
					//	flash(translate('The requested quantity is not available for ') .$service->getTranslation('name'))->warning();
						// $order->delete();
						// return redirect()->route('servicecart')->send();
					// } 
				}
				else{
					$product_variation='';
				}
                $order_detail = new ServiceOrderDetail;
                $order_detail->service_order_id = $order->id;
                $order_detail->seller_id =$service->user_id;
                $order_detail->service_id =$service->id;
                $order_detail->variation = $product_variation;
                $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                $order_detail->tax = $cartItem['tax'] * $cartItem['quantity'];
                $order_detail->shipping_type = $cartItem['shipping_type'];
                $order_detail->product_referral_code = $cartItem['product_referral_code'];
                $order_detail->shipping_cost = $cartItem['shipping_cost'];

                $shipping += $order_detail->shipping_cost;

                if ($cartItem['shipping_type'] == 'pickup_point') {
                    $order_detail->pickup_point_id = $cartItem['pickup_point'];
                }
                //End of storing shipping cost

                $order_detail->quantity = $cartItem['quantity'];
                $order_detail->save();

               $service->num_of_sale += $cartItem['quantity'];
               $service->save();

                $order->seller_id =$service->user_id;

                if ($service->added_by == 'seller' &&$service->user->seller != null){
                    $seller =$service->user->seller;
                    $seller->num_of_sale += $cartItem['quantity'];
                    $seller->save();
                }

                
            }

            $order->grand_total = $subtotal + $tax + $shipping;

            if ($seller_product[0]->coupon_code != null) {
                // if (Session::has('club_point')) {
                //     $order->club_point = Session::get('club_point');
                // }
                $order->coupon_discount = $coupon_discount;
                $order->grand_total -= $coupon_discount;

                $coupon_usage = new CouponUsage;
                $coupon_usage->user_id = Auth::user()->id;
                $coupon_usage->coupon_id = Coupon::where('code', $seller_product[0]->coupon_code)->first()->id;
                $coupon_usage->save();
            }

            $service_combined_order->grand_total += $order->grand_total;

            $order->save();
        }

        $service_combined_order->save();
        $cartItems = ServiceCart::where('user_id', Auth::user()->id)->get();
        ServiceCart::destroy($cartItems);
        $request->session()->put('service_combined_order', $service_combined_order->id);
        return redirect('service/purchase_history')->with(session()->flash('alert-success', 'Service Order Placed Successfully!'));
    }


    /**
     * placed single service order by quotation
     * created by @AviSingh
     */
    public function ServiceOrderQuotation(Request $request){
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
           $shippingAddress['phone']        = $request->alt_phone;
        }

        $service_combined_order = new ServiceCombinedOrder;
        $service_combined_order->user_id = Auth::user()->id;
        $service_combined_order->shipping_address = json_encode($shippingAddress);
        $service_combined_order->save();

        $common_info = [];
        if($request->common_lables != null){
            $common_value = $request->common_value;
            foreach($request->common_lables AS $key=>$value){
                $common_info[$value] = $common_value[$key];
            }
        }


        // $service_services = array();
        // foreach ($service_carts as $cartItem){
        //     $service_ids = array();
        //     $service = $cartItem->service;
        //     if($service != null){
        //         if(isset($service_services[$service->user_id])){
        //             $service_ids = $service_services[$service->user_id];
        //         }
        //         array_push($service_ids, $cartItem);
        //         $service_services[$service->user_id] = $service_ids;
        //     }
        // }

        // foreach ($service_services as $seller_product) {
            $order = new ServiceOrder;
            $order->service_combined_order_id = $service_combined_order->id;
            $order->user_id = Auth::user()->id;

            $order->service_type = $request->nature_work;
            $order->common_info = json_encode($common_info);
            $order->additional_info = $request->additional_requirement;

            $order->shipping_address = $service_combined_order->shipping_address;

            // $order->payment_type = $request->payment_option;
            $order->delivery_viewed = '0';
            $order->payment_status_viewed = '0';
            $order->code = date('Ymd-His') . rand(10, 99);
            $order->date = strtotime('now');
            $order->save();

            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            $coupon_discount = 0;

            //Order Details Storing
            // foreach ($seller_product as $cartItem) {
            $service = Service::find($request->service_id);

            $subtotal += (int)$request->price * (int)$request->quantity;
            $tax += (int)$service->tax * (int)$request->quantity;
            $coupon_discount += $request->discount;
            
            if($request['variation']!==''){
                $product_variation = $request['variation'];
            }else{
                $product_variation='';
            }

            $order_detail = new ServiceOrderDetail;
            $order_detail->service_order_id = $order->id;
            $order_detail->seller_id = $service->user_id;
            $order_detail->service_id =$service->id;
            $order_detail->variation = $product_variation;
            $order_detail->price = (int)$request['price'] * (int)$request['quantity'];
            $order_detail->tax = (int)$service['tax'] * (int)$request['quantity'];
            // $order_detail->shipping_type = $cartItem['shipping_type'];
            // $order_detail->product_referral_code = $cartItem['product_referral_code'];
            // $order_detail->shipping_cost = $request['shipping_cost'];

            $shipping += $order_detail->shipping_cost;
            //End of storing shipping cost

            $order_detail->quantity = $request['quantity'];
            $order_detail->save();

            $service->num_of_sale += $request['quantity'];
            $service->save();

            $order->seller_id =$service->user_id;

            if ($service->added_by == 'seller' && $service->user->seller != null){
                $seller =$service->user->seller;
                $seller->num_of_sale += $request['quantity'];
                $seller->save();
            }
            $order->grand_total = $subtotal + $tax + $shipping;
            $service_combined_order->grand_total += $order->grand_total;
            $order->save();

        $service_combined_order->save();
        
        // New order place Mail sent to user
        $order_template = view('mailers.customer_service.customer_service',compact('order'));
        $user_data = array(
            "mail_identifier" => "service_order_placed_to_customer",
            "to"=> $order->user->email,
            "name"=> $order->user->name,
            "subject"=> translate('A new service order has been placed') . ' - ' . $order->code,
            "template"=> $order_template,
        );
        $user_mail = new \App\Http\Controllers\SendmailerController;
        $user_mail->StoreMail($user_data);
        
        // New order place mail sent to vendor
        $vendor_detail = User::select('id', 'name', 'email')->where('id', $service->user_id)->first();
        $vendor_data = array(
            "mail_identifier" => "service_order_placed_to_vendor",
            "to"=> $vendor_detail->email,
            "name"=> $vendor_detail->name,
            "subject"=> translate('A new service order has been placed') . ' - ' . $order->code,
            "template"=> $order_template,
        );
        $vendor_mail = new \App\Http\Controllers\SendmailerController;
        $vendor_mail->StoreMail($vendor_data);
        
        $request->session()->put('service_combined_order', $service_combined_order->id);
        return redirect('service/purchase_history')->with(session()->flash('alert-success', 'Service Order Placed Successfully!'));
    }

     /**
     * get single service details for quotation
     * created by @AviSingh
     */
    public function servicemodalDetails(Request $request){
        $service_id = $request->service_id;
        $detailedService = Service::find($service_id);

        $output =   '<div class="col-md-12">
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                            <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">
                                <strong>Get A Quotation</strong> for '.$detailedService->category->name .'
                                
                            </h3>
                            <div class="deals">
                                <hr>
                            </div>
                        </div>

                        <input type="hidden" name="service_id" value="'. $detailedService->id .'">
                        <input type="hidden" name="service_name" value="'. $detailedService->name .'">
                        <input type="hidden" name="category_id" value="'. $detailedService->category_id .'">
                        <input type="hidden" name="vendor_id" value="'. $detailedService->user_id .'">
                        <input type="hidden" name="quantity" value="1">';

                        if($detailedService->discount != null && $detailedService->discount_start_date <= $current_date_time && $detailedService->discount_end_date >= $current_date_time){
                            $output .= '<input type="hidden" name="price" value="'.home_discounted_base_price($detailedService, false).'">';
                        }
                        else{
                            $output .= '<input type="hidden" name="price" value="'. home_base_price($detailedService, false).'">';
                        }
                        
                            
                        $output .= '<div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 askalertlft">
                            <img src="'.uploaded_asset($detailedService->thumbnail_img).'" alt="">
                            <h3>'. $detailedService->name .'</h3>
                            <p class="soldbytxt"><span>Sold By -</span>'.$detailedService->user->shop->name.'</p>
                            <p class="contype">
                                    <span>Short Description: '. trim($detailedService->short_description) .'</span>
                                    <span>No. Of Projects Completed: More than '.$detailedService->total_projects.'</span>
                                    <span>Service Location/City: '.$detailedService->user->shop->city.'</span>
                                    <span>Professional Assistance: As per requirement</span>
                            </p>
                        </div>
                        
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                            <div class="main-parenttttttT row scroll-modal">

                                <div class="js-form-message form-group">
                                    <label class="formpoplabel">Nature of work</label>
                                    <div class="ginput_container ginput_container_checkbox">
                                        <input type="text" name="nature_work" class="form-control empty" value="'.$detailedService->category->name.'" placeholder="Nature of work" readonly>
                                    </div>
                                </div>';
                                
                                if($detailedService->category->is_form_field){
                                    foreach (explode(",",$detailedService->category->form_fields) as $field){
                                        $output .= '<div class="js-form-message form-group col-md-6" style="position:relative;">
                                        <label class="formpoplabel">'.$field.'</label>
                                        <input type="text" name="common_lables[]" value="'.$field.'" class="form-control empty" placeholder="Common Lables" required readonly>
                                        <input type="text" name="common_value[]" value="" class="form-control empty" placeholder="'.$field.'" required>
                                        </div>';
                                    }
                                }
                            
                                $output .= '<div class="js-form-message form-group border-bottom">
                                    <label class="formpoplabel">Enter You Service Location</label>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Name</label>
                                    <input type="text" name="name" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Name" required>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Locality</label>
                                    <input type="text" name="locality" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Locality" required>
                                </div>
                    
                                <div class="js-form-message form-group">
                                    <label class="formpoplabel">Address</label>
                                    <textarea name="address" required class="form-control textareas" placeholder="Address (Area and Street)"></textarea>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">City</label>
                                    <input type="text" name="city" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="City" required>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6" style="position:relative;">
                                    <i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                    <label class="formpoplabel">State</label>
                                    <select class="form-control" name="state" id="state" required>
                                        <option value="">---Select State---</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </div>

                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Landmark</label>
                                    <input type="text" name="landmark" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Landmark (Optional)" >
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Pincode</label>
                                    <input type="text" maxlength="6" oninput="numberOnly(this.id);" name="pincode" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Pincode" id="pincode" required>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Alternate Phone No. (Optional)</label>
                                    <input type="text" maxlength="10" oninput="numberOnly(this.id);" id="alt_phone" name="alt_phone" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Alternate Phone No. (Optional)" >
                                </div>

                                <div class="js-form-message form-group">
                                    <label class="formpoplabel">Additional requirement</label>
                                    <textarea name="additional_requirement" class="form-control textareas h-200" placeholder="Additional requirement" required></textarea>
                                </div>
                            </div>
                                
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="btn-box">
                                        <button type="submit" class="addto">
                                        Submit
                                        <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                            <path d="M1,5 L11,5"></path>
                                            <polyline points="8 1 12 5 8 9"></polyline>
                                        </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>   
                        </div>  
                        </div>  
                    </div>';
        

        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);

    }

    /**
     * get single service details for ask price 
     * created by @AviSingh
     */
    public function serviceAskPriceModal(Request $request){
        $service_id = $request->service_id;
        $detailedService = Service::find($service_id);

        $output =   '<div class="col-md-12">
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                            <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">
                                <strong>Ask Price</strong> by adding a few details of your requirement
                                
                            </h3>
                            <div class="deals">
                                <hr>
                            </div>
                        </div>

                        <input type="hidden" name="service_id" value="'. $detailedService->id .'">
                        <input type="hidden" name="service_name" value="'. $detailedService->name .'">
                        <input type="hidden" name="category_id" value="'. $detailedService->category_id .'">
                        <input type="hidden" name="vendor_id" value="'. $detailedService->user_id .'">';

                        if($detailedService->discount != null && $detailedService->discount_start_date <= $current_date_time && $detailedService->discount_end_date >= $current_date_time){
                            $output .= '<input type="hidden" name="price" value="'.home_discounted_base_price($detailedService, false).'">';
                        }
                        else{
                            $output .= '<input type="hidden" name="price" value="'. home_base_price($detailedService, false).'">';
                        }
                        
                            
                        $output .= '<div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 askalertlft">
                            <img src="'.uploaded_asset($detailedService->thumbnail_img).'" alt="">
                            <h3>'. $detailedService->name .'</h3>
                            <p class="soldbytxt"><span>Sold By -</span>'.$detailedService->user->shop->name.'</p>
                            <p class="contype">
                                    <span>Short Description: '. trim($detailedService->short_description) .'</span>
                                    <span>No. Of Projects Completed: More than '.$detailedService->total_projects.'</span>
                                    <span>Service Location/City: '.$detailedService->user->shop->city.'</span>
                                    <span>Professional Assistance: As per requirement</span>
                            </p>
                        </div>
                        
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                            <div class="main-parenttttttT row scroll-modal">

                                <div class="js-form-message form-group">
                                    <label class="formpoplabel">Nature of work</label>
                                    <div class="ginput_container ginput_container_checkbox">
                                        <input type="text" name="nature_work" class="form-control empty" value="'.$detailedService->category->name.'" placeholder="Nature of work" readonly>
                                    </div>
                                </div>
                                
                                <div class="js-form-message form-group border-bottom">
                                    <label class="formpoplabel">Enter You Service Location</label>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Name</label>
                                    <input type="text" name="name" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Name" required>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Locality</label>
                                    <input type="text" name="locality" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Locality" required>
                                </div>
                    
                                <div class="js-form-message form-group">
                                    <label class="formpoplabel">Address</label>
                                    <textarea name="address" required class="form-control textareas" placeholder="Address (Area and Street)"></textarea>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">City</label>
                                    <input type="text" name="city" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="City" required>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6" style="position:relative;">
                                    <i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                    <label class="formpoplabel">State</label>
                                    <select class="form-control" name="state" id="state" required>
                                        <option value="">---Select State---</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </div>

                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Landmark</label>
                                    <input type="text" name="landmark" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Landmark (Optional)" >
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Pincode</label>
                                    <input type="text" maxlength="6" oninput="numberOnly(this.id);" id="pincode1" name="pincode" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Pincode" required>
                                </div>
                    
                                <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Alternate Phone No. (Optional)</label>
                                    <input type="text" maxlength="10" oninput="numberOnly(this.id);" id="alt_phone1" name="alt_phone" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Alternate Phone No. (Optional)" >
                                </div>

                                <div class="js-form-message form-group">
                                    <label class="formpoplabel">Additional requirement</label>
                                    <textarea name="additional_requirement" class="form-control textareas h-200" placeholder="Additional requirement" required></textarea>
                                </div>
                            </div>
                                
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="btn-box">
                                        <button type="submit" class="addto">
                                        Submit
                                        <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                            <path d="M1,5 L11,5"></path>
                                            <polyline points="8 1 12 5 8 9"></polyline>
                                        </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>   
                        </div>  
                        </div>  
                    </div>';
        

        return Response::json([
            'status' => true,
            'data' => $output,
        ], 200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $ordercancel = ServiceOrder::where('id', $id)
        //     ->update([
        //             'delivery_status' => 'cancelled',
        //         ]);

        $ordercancel = ServiceOrderDetail::where('id', $id)
            ->update([
                    'delivery_status' => 'cancelled',
                ]);
								
        if($ordercancel){
			return redirect()->back()->with(session()->flash('alert-danger', 'Order has been cancelled successfully!.'));
		}
		return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!.'));
    }

    public function bulk_order_delete(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $order_id) {
                $this->destroy($order_id);
            }
        }

        return 1;
    }

    public function order_details(Request $request)
    {
        $order =ServiceOrder::findOrFail($request->service_order_id);
        $order->save();
        return view('frontend.user.seller.order_details_seller', compact('order'));
    }

    public function update_delivery_status(Request $request)
    {
        $order =ServiceOrder::findOrFail($request->service_order_id);       
        if (Auth::user()->user_type == 'seller') {
            foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail) {
                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();

                if ($request->status == 'cancelled') {
                    $variant = $orderDetail->variation;
                    if ($orderDetail->variation == null) {
                        $variant = '';
                    }

                    $product_stock = ServiceStock::where('service_id', $orderDetail->service_id)
                        ->where('variant', $variant)
                        ->first();

                    if ($product_stock != null) {
                        $product_stock->qty += $orderDetail->quantity;
                        $product_stock->save();
                    }
                }
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {

                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();

                if ($request->status == 'cancelled') {
                    $variant = $orderDetail->variation;
                    if ($orderDetail->variation == null) {
                        $variant = '';
                    }

                    $product_stock = ServiceStock::where('service_id', $orderDetail->service_id)
                        ->where('variant', $variant)
                        ->first();

                    if ($product_stock != null) {
                        $product_stock->qty += $orderDetail->quantity;
                        $product_stock->save();
                    }
                }

            }
        }
        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'delivery_status_change')->first()->status == 1) {
            try {
                SmsUtility::delivery_status_change(json_decode($order->shipping_address)->phone, $order);
            } catch (\Exception $e) {

            }
        }

        //sends Notifications to user
        NotificationUtility::sendNotification($order, $request->status);
        if (get_setting('google_firebase') == 1 && $order->user->device_token != null) {
            $request->device_token = $order->user->device_token;
            $request->title = "Order updated !";
            $status = str_replace("_", "", $order->delivery_status);
            $request->text = " Your order {$order->code} has been {$status}";

            $request->type = "order";
            $request->id = $order->id;
            $request->user_id = $order->user->id;

            NotificationUtility::sendFirebaseNotification($request);
        }

        return 1;
    }

    public function update_item_status(Request $request)
    {
        // dd($request->all());
        $order = OrderDetail::findOrFail($request->item_id);
        $order->delivery_status = $request->update_item_status;
        $order->save();
        flash(translate('Order Items status has been updated!'))->success();
        return redirect()->back();
    }

    public function update_tracking_code(Request $request) {
            $order =ServiceOrder::findOrFail($request->service_order_id);
            $order->tracking_code = $request->tracking_code;
            $order->save();

            return 1;
    }

    public function update_payment_status(Request $request)
    {
        $order =ServiceOrder::findOrFail($request->service_order_id);
        $order->payment_status_viewed = '0';
        $order->save();

        if (Auth::user()->user_type == 'seller') {
            foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }

        $status = 'paid';
        foreach ($order->orderDetails as $key => $orderDetail) {
            if ($orderDetail->payment_status != 'paid') {
                $status = 'unpaid';
            }
        }
        $order->payment_status = $status;
        $order->save();


        if ($order->payment_status == 'paid' && $order->commission_calculated == 0) {
            calculateCommissionAffilationClubPoint($order);
        }

        //sends Notifications to user
        NotificationUtility::sendNotification($order, $request->status);
        if (get_setting('google_firebase') == 1 && $order->user->device_token != null) {
            $request->device_token = $order->user->device_token;
            $request->title = "Order updated !";
            $status = str_replace("_", "", $order->payment_status);
            $request->text = " Your order {$order->code} has been {$status}";

            $request->type = "order";
            $request->id = $order->id;
            $request->user_id = $order->user->id;

            NotificationUtility::sendFirebaseNotification($request);
        }


        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'payment_status_change')->first()->status == 1) {
            try {
                SmsUtility::payment_status_change(json_decode($order->shipping_address)->phone, $order);
            } catch (\Exception $e) {

            }
        }
        return 1;
    }

    public function serviceQuotationRequest(Request $request)
    {
        $date = $request->date;
        $sort_search = null;
        $delivery_status = null;

        $service_quote_req =ServiceEnquiry::orderBy('id', 'desc');
        if ($request->has('search')) {
            $sort_search = $request->search;
            $service_quote_req = $service_quote_req->where('service_id', 'like', '%' . $sort_search . '%');
        }
        // if ($request->delivery_status != null) {
        //     $service_quote_req = $service_quote_req->where('delivery_status', $request->delivery_status);
        //     $delivery_status = $request->delivery_status;
        // }
        // if ($date != null) {
        //     $service_quote_req = $service_quote_req->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        // }
        $service_quote_req = $service_quote_req->paginate(15);
        return view('backend.sales.service_orders.service_quote_request', compact('service_quote_req', 'sort_search'));
    }

    public function quotedestroy($id)
    {
        $quote_request = ServiceEnquiry::where('id', $id)->delete();
            // ->update([
            //         'delivery_status' => 'cancelled',
            //     ]);
								
        if($quote_request){
			return redirect()->back()->with(session()->flash('alert-danger', 'Deleted successfully!.'));
		}
		return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!.'));
    }

   
}