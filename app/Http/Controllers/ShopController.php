<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Seller;
use App\Models\Category;
use App\Models\BusinessSetting;
use Auth;
use Hash;
use App\Notifications\EmailVerificationNotification;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('user', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Auth::user()->shop;
        return view('frontend.user.seller.shop', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->user_type == 'admin'){
            flash(translate('Admin can not be a seller'))->error();
            return back();
        }
        else{
            $data = [
                'product_categories' => Category::Select('id', 'name')
                    ->where([
                        'level' => 0,
                        'type' => 1,
                    ])
                    ->orderBy('order_level', 'ASC')
                    ->get(),

                'service_categories' => Category::Select('id', 'name')
                    ->where([
                        'level' => 0,
                        'type' => 2,
                    ])
                    ->orderBy('order_level', 'ASC')
                    ->get(),
            ];
            return view('frontend.seller_form', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_old(Request $request)
    {
        $user = null;
        if(!Auth::check()){
            if(User::where('email', $request->email)->first() != null){
                // flash(translate('Email already exists!'))->error();
                return redirect()->back()->with(session()->flash('alert-danger', 'Email already exists!.'));
                return back();
            }
            if($request->password == $request->password_confirmation){
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->user_type = "seller";
                $user->password = Hash::make($request->password);
                $user->save();
            }
            else{
                // flash(translate('Sorry! Password did not match.'))->error();
                return redirect()->back()->with(session()->flash('alert-danger', 'Sorry! Password did not match!.'));
                return back();
            }
        }
        else{
            $user = Auth::user();
            if($user->customer != null){
                $user->customer->delete();
            }
            $user->user_type = "seller";
            $user->save();
        }
        
        $seller = new Seller;
        $seller->user_id = $user->id;
        $seller->save();

        if(Shop::where('user_id', $user->id)->first() == null){
            $shop = new Shop;
            $shop->user_id = $user->id;
            $shop->name = $request->name;
            $shop->address = $request->address;
            $shop->slug = preg_replace('/\s+/', '-', $request->name).'-'.$shop->id;

            if($shop->save()){
                // auth()->login($user, false);
                if(BusinessSetting::where('type', 'email_verification')->first()->value != 1){
                    $user->email_verified_at = date('Y-m-d H:m:s');
                    $user->save();
                }
                else {
                    $user->notify(new EmailVerificationNotification());
                }

                flash(translate('Your Shop has been created successfully!'))->success();
                return redirect()->route('shops.index');
            }
            else{
                $seller->delete();
                $user->user_type == 'customer';
                $user->save();
            }
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'phone' => 'required|numeric|digits:10|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required',
            'vendor_type' => 'required',
            'gender' => 'required'
        ]);
		
        if($request->password == $request->password_confirmation){
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->name = $request->first_name .' '.$request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->user_type = "seller";
            $user->password = Hash::make($request->password);
            $user->save();
			
			$seller = new Seller;
			$seller->user_id = $user->id;
            $seller->vendor_type = $request->vendor_type;
            $seller->product_category_ids = json_encode($request->product_category_ids);
            $seller->service_category_ids = json_encode($request->service_category_ids);
			$seller->save();
			
			$shop = new Shop;
            $shop->user_id = $user->id;
            $shop->name = $request->shop_name;
            $shop->address = $request->shop_address;
            $shop->address = $request->shop_address;
            $shop->slug = preg_replace('/\s+/', '-', $request->shop_name).'-'.$shop->id;
			$shop->save();
			
			return redirect('seller_register_success');
		}
        else{
             return redirect()->back()->with(session()->flash('alert-danger', 'Sorry! Password did not match!.'));
            return back();
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shop = Shop::find($id);
        if($request->has('name') && $request->has('address')){
            if ($request->has('shipping_cost')) {
                $shop->shipping_cost = $request->shipping_cost;
            } 
            $shop->name             = $request->name;
            $shop->address          = $request->address;
            $shop->phone            = $request->phone;
            $shop->slug             = preg_replace('/\s+/', '-', $request->name).'-'.$shop->id;
            $shop->meta_title       = $request->meta_title;
            $shop->meta_description = $request->meta_description;
            $shop->logo             = $request->logo;
        }

        if($request->has('delivery_pickup_longitude') && 
            $request->has('delivery_pickup_latitude')) {
            $shop->delivery_pickup_longitude    = $request->delivery_pickup_longitude;
            $shop->delivery_pickup_latitude     = $request->delivery_pickup_latitude;
        }

        elseif($request->has('facebook') || $request->has('google') || $request->has('twitter') || $request->has('youtube') || $request->has('instagram')){
            $shop->facebook = $request->facebook;
            $shop->google = $request->google;
            $shop->twitter = $request->twitter;
            $shop->youtube = $request->youtube;
        }

        else{
            $shop->sliders = $request->sliders;
        }

        if($shop->save()){
            flash(translate('Your Shop has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verify_form(Request $request)
    {
        if(Auth::user()->seller->verification_info == null){
            $shop = Auth::user()->shop;
            return view('frontend.user.seller.verify_form', compact('shop'));
        }
        else {
            flash(translate('Sorry! You have sent verification request already.'))->error();
            return back();
        }
    }

    public function verify_form_store(Request $request)
    {
        $data = array();
        $i = 0;
        foreach (json_decode(BusinessSetting::where('type', 'verification_form')->first()->value) as $key => $element) {
            $item = array();
            if ($element->type == 'text') {
                $item['type'] = 'text';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i];
            }
            elseif ($element->type == 'select' || $element->type == 'radio') {
                $item['type'] = 'select';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i];
            }
            elseif ($element->type == 'multi_select') {
                $item['type'] = 'multi_select';
                $item['label'] = $element->label;
                $item['value'] = json_encode($request['element_'.$i]);
            }
            elseif ($element->type == 'file') {
                $item['type'] = 'file';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i]->store('uploads/verification_form');
            }
            array_push($data, $item);
            $i++;
        }
        $seller = Auth::user()->seller;
        $seller->verification_info = json_encode($data);
        if($seller->save()){
            flash(translate('Your shop verification request has been submitted successfully!'))->success();
            return redirect()->route('dashboard');
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }
}
