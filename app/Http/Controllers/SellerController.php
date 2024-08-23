<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\User;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\SellerCategoryUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Notifications\EmailVerificationNotification;
use Cache;
use DB;

// export data
use App\Exports\SellerExport;
use App\Exports\PendingSellerExport;
use Maatwebsite\Excel\Facades\Excel;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $approved = null;
        $sellers = Seller::whereIn('user_id', function ($query) {
            $query->select('id')
                ->from(with(new User)->getTable());
        })->orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $sort_search = $request->search;
            $user_ids = User::where('user_type', 'seller')->where(function ($user) use ($sort_search) {
                $user->where('name', 'like', '%' . $sort_search . '%')->orWhere('email', 'like', '%' . $sort_search . '%');
            })->pluck('id')->toArray();
            $sellers = $sellers->where(function ($seller) use ($user_ids) {
                $seller->whereIn('user_id', $user_ids);
            });
        }
        if ($request->approved_status != null) {
            $approved = $request->approved_status;
            $sellers = $sellers->where('verification_status', $approved);
        }
        $sellers = $sellers->paginate(15);
        return view('backend.sellers.index', compact('sellers', 'sort_search', 'approved'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::where('email', $request->email)->first() != null) {
            flash(translate('Email already exists!'))->error();
            return back();
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = "seller";
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            if (get_setting('email_verification') != 1) {
                $user->email_verified_at = date('Y-m-d H:m:s');
            } else {
                $user->notify(new EmailVerificationNotification());
            }
            $user->save();

            $seller = new Seller;
            $seller->user_id = $user->id;

            if ($seller->save()) {
                $shop = new Shop;
                $shop->user_id = $user->id;
                $shop->slug = 'demo-shop-' . $user->id;
                $shop->save();

                flash(translate('Seller has been inserted successfully'))->success();
                return redirect()->route('sellers.index');
            }
        }
        flash(translate('Something went wrong'))->error();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = Seller::findOrFail(decrypt($id));
        if($seller->product_category_ids != null){
            $seller->product_category = Category::whereIn('id', json_decode($seller->product_category_ids))->pluck('name');
        }else{
            $seller->product_category = null;
        }
        if($seller->service_category_ids != null){
            $seller->service_category = Category::whereIn('id', json_decode($seller->service_category_ids))->pluck('name');
        }else{
            $seller->service_category = null;
        }
        return view('backend.sellers.show', compact('seller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = decrypt($id);
        $seller = Seller::findOrFail($id);
        $user_id = $seller->user_id;
        $user = User::findOrFail($user_id);

        $sellerData = Seller::where('user_id','=',$user_id)->first();
        $shopData = Shop::where('user_id','=',$user_id)->first();

        $productCatArr = [];
        $serviceCatArr = [];

        if($sellerData && $sellerData->product_category_ids){
            $productCatArr = explode(',',$sellerData->product_category_ids);
        }
        if($sellerData && $sellerData->service_category_ids){
            $serviceCatArr = explode(',',$sellerData->service_category_ids);
        }

        $product_category_names = Category::SelectRaw('GROUP_CONCAT(name) AS name')->whereIn('id',$productCatArr)->where(['level' => 0, 'type' => 1])->orderBy('order_level', 'ASC')->first();
        $service_category_names = Category::SelectRaw('GROUP_CONCAT(name) AS name')->whereIn('id',$serviceCatArr)->where(['level' => 0, 'type' => 2])->orderBy('order_level', 'ASC')->first();

        $sellerData["product_category_names"] = $product_category_names->name;
        $sellerData["service_category_names"] = $service_category_names->name;

        $productCategoryList = Category::Select('id', 'name')->where(['level' => 0, 'type' => 1])->orderBy('order_level', 'ASC')->get();
        $serviceCategoryList = Category::Select('id', 'name')->where(['level' => 0, 'type' => 2])->orderBy('order_level', 'ASC')->get();

        return view('backend.sellers.edit', compact('seller','user','shopData','sellerData','productCategoryList','serviceCategoryList'));
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
        $seller = Seller::findOrFail($id);
        $user = $seller->user;
        $user->name = $request->name;
        $user->email = $request->email;
        if (strlen($request->password) > 0) {
            $user->password = Hash::make($request->password);
        }
        if ($user->save()) {
            if ($seller->save()) {
                flash(translate('Seller has been updated successfully'))->success();
                return redirect()->route('sellers.index');
            }
        }

        flash(translate('Something went wrong'))->error();
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
        $seller = Seller::findOrFail($id);

        // Shop::where('user_id', $seller->user_id)->delete();

        // Product::where('user_id', $seller->user_id)->delete();

        // $orders = Order::where('user_id', $seller->user_id)->get();

        // foreach ($orders as $key => $order) {
        //     OrderDetail::where('order_id', $order->id)->delete();
        // }

        // Order::where('user_id', $seller->user_id)->delete();

        // User::destroy($seller->user->id);

        // if (Seller::destroy($id)) {
        if ($seller) {
            flash(translate('Seller has been deleted successfully'))->success();
            return redirect()->route('sellers.index');
        } else {
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function bulk_seller_delete(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $seller_id) {
                $this->destroy($seller_id);
            }
        }

        return 1;
    }

    public function show_verification_request($id)
    {
        $seller = Seller::findOrFail($id);
        return view('backend.sellers.verification', compact('seller'));
    }

    public function approve_seller($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->verification_status = 1;
        if ($seller->save()) {
            $user = User::findOrFail($seller->user_id);
            $user->is_verified = 1;
            if($user->save()){
                Cache::forget('verified_sellers_id');
                flash(translate('Seller has been approved successfully'))->success();
                return redirect()->route('sellers.index');
            }else{
                flash(translate('Something went wrong'))->error();
                return back();
            }
        }
        flash(translate('Something went wrong'))->error();
        return back();
    }

    public function reject_seller($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->verification_status = 0;
        $seller->verification_info = null;
        if ($seller->save()) {
            Cache::forget('verified_sellers_id');
            flash(translate('Seller verification request has been rejected successfully'))->success();
            return redirect()->route('sellers.index');
        }
        flash(translate('Something went wrong'))->error();
        return back();
    }

    public function payment_modal(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        return view('backend.sellers.payment_modal', compact('seller'));
    }

    public function profile_modal(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        return view('backend.sellers.profile_modal', compact('seller'));
    }


    public function login($id)
    {
        $seller = Seller::findOrFail(decrypt($id));

        $user  = $seller->user;

        auth()->login($user, true);

        return redirect()->route('dashboard');
    }

    public function ban($id)
    {
        $seller = Seller::findOrFail($id);

        if ($seller->user->banned == 1) {
            $seller->user->banned = 0;
            flash(translate('Seller has been unbanned successfully'))->success();
        } else {
            $seller->user->banned = 1;
            flash(translate('Seller has been banned successfully'))->success();
        }

        $seller->user->save();
        return back();
    }

    // Approve Seller function here
    public function updateApproved(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        $seller->verification_status = $request->status;
        if ($seller->save()) {
            $user = User::findOrFail($seller->user_id);
            $user->is_verified = $request->status;
            if($user->save()){
                Cache::forget('verified_sellers_id');
                return 1;
            }
            return 0;

        }
        return 0;
    }

    public function updateProfileData(Request $request)
    {
        $output = [];
        $id = $request->id;
        $user_id = $request->user_id;
        $form_name = $request->form_name;

        if (!$id) {
            $output = [
                'status' => false,
                "status_code" => 400,
                'msg' => 'ID required.',
                'data' => []
            ];
        } else {
            // display info update
            if($form_name=='display_info'){
                $is_exist = Shop::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    if($request->vendor_type){
                        if($request->vendor_type=='Both' || $request->vendor_type=='Product'){
                            if(!$request->product_category_ids){
                                return [
                                    'status' => false,
                                    "status_code" => 400,
                                    "msg" => "Product category required.",
                                    'data' => []
                                ];
                            }
                        }
                        if($request->vendor_type=='Both' || $request->vendor_type=='Service'){
                            if(!$request->service_category_ids){
                                return [
                                    'status' => false,
                                    "status_code" => 400,
                                    "msg" => "Service category required.",
                                    'data' => []
                                ];
                            }
                        }
                    }

                    if($request->vendor_type=='Product'){
                        $request->service_category_ids = '';
                    }
                    if($request->vendor_type=='Service'){
                        $request->product_category_ids = '';
                    }

                    $data = [
                        'name'=>$request->display_name,
                        'designation'=>$request->designation,
                        'business_description'=>$request->description
                    ];
                    $result = Shop::where('id', $id)->update($data);

                    Seller::where('user_id', $user_id)->update([
                        "vendor_type" => $request->vendor_type,
                        "product_category_ids" => $request->product_category_ids,
                        "service_category_ids" => $request->service_category_ids
                    ]);

                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // pickup address update
            if($form_name=='pickup_address'){
                $is_exist = Shop::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    $data = [
                        'pickup_address_line1'=>$request->address_line_1,
                        'pickup_address_line2'=>$request->address_line_2,
                        'pickup_pincode'=>$request->pincode,
                        'pickup_address_city'=>$request->address_city,
                    ];
                    $result = Shop::where('id', $id)->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // change password
            if($form_name=='change_password'){
                $userData = User::where('id',$user_id)->first();
                if($userData != null){
                    // if (Hash::check($request->old_password, $userData->password)) {
                        $data = [
                            'password'=> Hash::make($request->new_password)
                        ];
                        $result = User::where('id', $user_id)->update($data);
                        if ($result) {
                            $output = [
                                'status' => true,
                                "status_code" => 200,
                                'msg' => 'Password change successfully.',
                                'data' => []
                            ];
                        }else{
                            $output = [
                                'status' => false,
                                "status_code" => 400,
                                'msg' => 'Password updation failed.',
                                'data' => []
                            ];
                        }
                    // }else{
                    //     $output = [
                    //         'status' => false,
                    //         "status_code" => 400,
                    //         'msg' => 'Wrong old password.',
                    //         'data' => []
                    //     ];
                    // }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // contact details update
            if($form_name=='contact_details'){
                $is_exist = User::where('id', $id)->first();
                if($is_exist != null){
                    $data = [
                        'name'=>$request->your_name,
                        'secondary_mobile'=>$request->mobile,
                        'secondary_email'=>$request->email,
                        'landline_no'=>$request->landline,
                    ];
                    $result = User::where('id', $id)->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // bank details update
            if($form_name=='bank_details'){
                $is_exist = Seller::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    $data = [
                        'bank_acc_name'=>$request->bank_acc_name,
                        'bank_acc_no'=>$request->bank_acc_no,
                        'bank_ifsc'=>$request->bank_ifsc,
                        'bank_name'=>$request->bank_name,
                        'bank_state'=>$request->bank_state,
                        'bank_city'=>$request->bank_city,
                        'bank_branch'=>$request->bank_branch,
                    ];
                    $result = Seller::where(['id'=>$id,'user_id'=>$user_id])->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // LDC details update
            if($form_name=='ldc_details'){
                $is_exist = Seller::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    $data = [
                        'ldc_certificate_no'=>$request->ldc_certificate_no,
                        'ldc_lower_tax_rate'=>$request->ldc_lower_tax_rate,
                        'ldc_validity'=>$request->ldc_validity,
                        'ldc_amount'=>$request->ldc_amount,
                        'ldc_document'=>$request->ldc_document,
                    ];
                    $file = $request->file('ldc_document');
                    if($file && $file!=""){
                        $ext = $file->getClientOriginalExtension();
                        $ldc_document = "ldc_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$file->move($path, $ldc_document)) {
                            $ldc_document = "";
                        }
                    }else if($request->old_ldc_document){
                        $ldc_document = $request->old_ldc_document;
                    }else{
                        $ldc_document = "";
                    }
                    $data['ldc_document'] = $ldc_document;
                    $result = Seller::where(['id'=>$id,'user_id'=>$user_id])->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // Business details update
            if($form_name=='business_details'){
                $is_exist = Shop::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    $data = [
                        'business_name'=>$request->business_name,
                        'gst_no'=>$request->gst_no,
                        'tan_no'=>$request->tan_no,
                        'tan_document'=>$request->tan_document,
                        'address_proof'=>$request->address_proof,
                        'address_proof_document'=>$request->address_proof_document,
                        'signature'=>$request->signature,
                        'signature_document'=>$request->signature_document,
                        'business_type'=>$request->business_type,
                        'personal_pan'=>$request->personal_pan,
                        'business_pan'=>$request->business_pan,
                        'address_line1'=>$request->business_address_line1,
                        'address_line2'=>$request->business_address_line2,
                        'pincode'=>$request->business_pincode,
                        'state'=>$request->business_state,
                        'city'=>$request->business_city,
                    ];
                    $tan_file = $request->file('tan_document');
                    if($tan_file && $tan_file!=""){
                        $ext = $tan_file->getClientOriginalExtension();
                        $tan_document = "td_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$tan_file->move($path, $tan_document)) {
                            $tan_document = "";
                        }
                    }else if($request->old_tan_document){
                        $tan_document = $request->old_tan_document;
                    }else{
                        $tan_document = "";
                    }
                    $data['tan_document'] = $tan_document;

                    $sign_file = $request->file('signature_document');
                    if($sign_file && $sign_file!=""){
                        $ext = $sign_file->getClientOriginalExtension();
                        $signature_document = "sd_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$sign_file->move($path, $signature_document)) {
                            $signature_document = "";
                        }
                    }else if($request->old_signature_document){
                        $signature_document = $request->old_signature_document;
                    }else{
                        $signature_document = "";
                    }
                    $data['signature_document'] = $signature_document;

                    $address_file = $request->file('address_proof_document');
                    if($address_file && $address_file!=""){
                        $ext = $address_file->getClientOriginalExtension();
                        $address_proof_document = "apd_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$address_file->move($path, $address_proof_document)) {
                            $address_proof_document = "";
                        }
                    }else if($request->old_address_proof_document){
                        $address_proof_document = $request->old_address_proof_document;
                    }else{
                        $address_proof_document = "";
                    }
                    $data['address_proof_document'] = $address_proof_document;
                    $result = Shop::where(['id'=>$id,'user_id'=>$user_id])->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // Company Details update
            if($form_name=='company_details'){
                $is_exist = Shop::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    $data = [
                        'company_name'=>$request->company_name,
                        'year_of_estb'=>$request->year_of_estb,
                        'ceo_name'=>$request->ceo_name,
                        'website_url'=>$request->website_url,
                        'google'=>$request->google,
                        'facebook'=>$request->facebook,
                        'signature'=>$request->signature,
                        'instagram'=>$request->instagram,
                    ];
                    $company_file = $request->file('company_logo');
                    if($company_file && $company_file!=""){
                        $ext = $company_file->getClientOriginalExtension();
                        $company_logo = "logo_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$company_file->move($path, $company_logo)) {
                            $company_logo = "";
                        }
                    }else if($request->old_company_logo){
                        $company_logo = $request->old_company_logo;
                    }else{
                        $company_logo = "";
                    }
                    $data['company_logo'] = $company_logo;

                    // profile avtar update start
                    $avt_file = $request->file('profile_icon');
                    if($avt_file && $avt_file!=""){
                        $ext = $avt_file->getClientOriginalExtension();
                        $profile_icon = "avt_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$avt_file->move($path, $profile_icon)) {
                            $profile_icon = "";
                        }
                    }else if($request->old_profile_icon){
                        $profile_icon = $request->old_profile_icon;
                    }else{
                        $profile_icon = "";
                    }
                    $avtar['avatar_original'] = $profile_icon;
                    $result = User::where(['id'=>$user_id])->update($avtar);
                    // profile avtar update end

                    $result = Shop::where(['id'=>$id,'user_id'=>$user_id])->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // Company address update
            if($form_name=='company_address'){
                $is_exist = Shop::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    $data = [
                        'floor'=>$request->floor,
                        'address'=>$request->area,
                        'city'=>$request->city,
                        'state'=>$request->state,
                        'country'=>$request->country,
                        'pincode'=>$request->pincode,
                        'locality'=>$request->locality,
                        'landmark'=>$request->landmark,
                    ];
                    $result = Shop::where(['id'=>$id,'user_id'=>$user_id])->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }

            // Nature of Business update
            if($form_name=='nature_of_business'){
                $is_exist = Seller::where(['id'=>$id,'user_id'=>$user_id])->first();
                if($is_exist != null){
                    $data = [
                        'primary_business_type'=>$request->primary_business_type,
                        'ownership_type'=>$request->ownership_type,
                        'no_of_employee'=>$request->no_of_employee,
                        'annual_turnover'=>$request->annual_turnover,
                        'secondary_business'=>$request->secondary_business,
                    ];
                    $bcf_file = $request->file('business_card_front');
                    if($bcf_file && $bcf_file!=""){
                        $ext = $bcf_file->getClientOriginalExtension();
                        $business_card_front = "bcf_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$bcf_file->move($path, $business_card_front)) {
                            $business_card_front = "";
                        }
                    }else if($request->old_business_card_front){
                        $business_card_front = $request->old_business_card_front;
                    }else{
                        $business_card_front = "";
                    }
                    $data['business_card_front'] = $business_card_front;

                    $bcb_file = $request->file('business_card_back');
                    if($bcb_file && $bcb_file!=""){
                        $ext = $bcb_file->getClientOriginalExtension();
                        $business_card_back = "bcb_".time().".".$ext;
                        $path = public_path("/uploads/");
                        if(!$bcb_file->move($path, $business_card_back)) {
                            $business_card_back = "";
                        }
                    }else if($request->old_business_card_back){
                        $business_card_back = $request->old_business_card_back;
                    }else{
                        $business_card_back = "";
                    }
                    $data['business_card_back'] = $business_card_back;

                    $result = Seller::where(['id'=>$id,'user_id'=>$user_id])->update($data);
                    if ($result) {
                        $output = [
                            'status' => true,
                            "status_code" => 200,
                            'msg' => 'Update successfully.',
                            'data' => []
                        ];
                    }else{
                        $output = [
                            'status' => false,
                            "status_code" => 400,
                            'msg' => 'Updation failed.',
                            'data' => []
                        ];
                    }
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Invalid ID',
                        'data' => []
                    ];
                }
            }
        }
        return $output;
    }

    public function categoryRequest() {

        $requestData = SellerCategoryUpdateRequest::selectRaw("seller_category_update_requests.*,u.name as seller_name,group_concat(distinct pc.name) as product_category_names,group_concat(distinct sc.name) as service_category_names")
                ->join("users as u","u.id","=","seller_category_update_requests.user_id")
                ->leftjoin("categories as pc",function ($qry) {
                    $qry->whereRaw("FIND_IN_SET(pc.id,seller_category_update_requests.product_category_ids)");
                    $qry->where('pc.level','=',0);
                    $qry->where('pc.type','=',1);
                })
                ->leftjoin("categories as sc",function ($qry) {
                    $qry->whereRaw("FIND_IN_SET(sc.id,seller_category_update_requests.service_category_ids)");
                    $qry->where('sc.level','=',0);
                    $qry->where('sc.type','=',2);
                })
                ->where('seller_category_update_requests.status',1)
                ->groupBy('seller_category_update_requests.user_id')
                ->get();
        // return dd($requestData);
        return view('backend.sellers.category_update_request', compact('requestData'));
    }

    public function updateCategoryRequest(Request $request) {
        // return dd($request->all());
        $output = [];
        $id = decrypt($request->id);
        $categoryRequest = SellerCategoryUpdateRequest::where('id',$id)->first();
        if($categoryRequest) {
            $result = SellerCategoryUpdateRequest::where('id',$id)->update(['status'=>$request->status]);
            if($result) {
                $msg = 'Declined successfully.';
                if($request->status==2){
                    $msg = 'Approved successfully.';
                    Seller::where('user_id', $categoryRequest->user_id)->update([
                        "vendor_type" => $categoryRequest->vendor_type,
                        "product_category_ids" => $categoryRequest->product_category_ids,
                        "service_category_ids" => $categoryRequest->service_category_ids
                    ]);
                }
                $output = [
                    'status' => true,
                    "status_code" => 200,
                    'msg' => $msg,
                    'data' => []
                ];
            }else{
                $output = [
                    'status' => false,
                    "status_code" => 201,
                    'msg' => 'Failed',
                    'data' => []
                ];
            }
        } else {
            $output = [
                'status' => false,
                "status_code" => 500,
                'msg' => 'Invalid Request.',
                'data' => []
            ];
        }
        return $output;
    }

    public function get_approved_seller_data()
    {
        return Excel::download(new SellerExport, 'approved_seller.xlsx');
    }

    public function get_unapproved_seller_data()
    {
        return Excel::download(new PendingSellerExport, 'unapproved_seller.xlsx');
    }


}
