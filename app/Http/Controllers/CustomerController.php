<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Franchise;
use App\Models\FranchiseShop;
use App\Models\FranchisePincode;
// export data
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Artisan;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
            if($request->search!=null & $request->filter!=null)
            {
                $users = User::where('user_type', 'customer')->where('email_verified_at', '!=', null)->orderBy('created_at', 'desc');
            }
            else{
                $users = User::where('user_type', 'customer')->where('email_verified_at', '!=', null);
            }

        if ($request->has('search')){
            $sort_search = $request->search;
            $users->where(function ($q) use ($sort_search){
                $q->where('name', 'like', '%'.$sort_search.'%')->orWhere('email', 'like', '%'.$sort_search.'%');
            });
        }

        if ($request->has('filter')){
            $sort_search = $request->filter;
            // dd($request->filter);
            // die;
            if($request->filter=='ascending')
            {
                $users->orderBy('created_at', 'asc');
            }
            else if($request->filter=='descending')
            {
                $users->orderBy('created_at', 'desc');
            }


        }


        $users = $users->paginate(15);
        return view('backend.customer.customers.index', compact('users', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name'          => 'required',
            'last_name'          => 'required',
            'gender'          => 'required',
            'email'         => 'required|unique:users|email',
            'phone'         => 'required|unique:users',
        ]);

        $response['status'] = 'Error';

        $user = User::create([
            "name" => "$request->first_name.' '.$request->last_name",
            "first_name" => "$request->first_name",
            "last_name" => "$request->last_name",
            "email" => "$request->email",
            "phone" => "$request->phone",
            "gender" => "$request->gender"
        ]);

        // $user = User::create($request->all());

        $customer = new Customer;

        $customer->user_id = $user->id;
        $customer->save();

        if (isset($user->id)) {
            $html = '';
            $html .= '<option value="">
                        '. translate("Walk In Customer") .'
                    </option>';
            foreach(Customer::all() as $key => $customer){
                if ($customer->user) {
                    $html .= '<option value="'.$customer->user->id.'" data-contact="'.$customer->user->email.'">
                                '.$customer->user->name.'
                            </option>';
                }
            }

            $response['status'] = 'Success';
            $response['html'] = $html;
        }

        echo json_encode($response);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        flash(translate('Customer has been deleted successfully'))->success();
        return redirect()->route('customers.index');
    }

    public function bulk_customer_delete(Request $request) {
        if($request->id) {
            foreach ($request->id as $customer_id) {
                $this->destroy($customer_id);
            }
        }

        return 1;
    }

    public function login($id)
    {
        $user = User::findOrFail(decrypt($id));

        auth()->login($user, true);

        return redirect()->route('dashboard');
    }

    public function ban($id) {
        $user = User::findOrFail(decrypt($id));

        if($user->banned == 1) {
            $user->banned = 0;
            flash(translate('Customer UnBanned Successfully'))->success();
        } else {
            $user->banned = 1;
            flash(translate('Customer Banned Successfully'))->success();
        }

        $user->save();

        return back();
    }

    public function get_user_data()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function getCustomerAddress($id)
    {
        $user_details = User::findOrFail($id);

        $customer_address = Address::where('user_id',$id)->get();
        return view('backend.customer.customers.customer_address', compact('user_details', 'customer_address'));
    }


    /** franchise list */

    public function franchise_list(Request $request)
    {
        $sort_search = null;
            if($request->search!=null & $request->filter!=null)
            {
                $users = User::where('user_type', 'franchise')->where('email_verified_at', '!=', null)->orderBy('created_at', 'desc');
            }
            else{
                $users = User::where('user_type', 'franchise')->where('email_verified_at', '!=', null);
            }

        if ($request->has('search')){
            $sort_search = $request->search;
            $users->where(function ($q) use ($sort_search){
                $q->where('name', 'like', '%'.$sort_search.'%')->orWhere('email', 'like', '%'.$sort_search.'%')->orWhere('phone', 'like', '%'.$sort_search.'%');
            });
        }

        if ($request->has('filter')){
            $sort_search = $request->filter;
            // dd($request->filter);
            // die;
            if($request->filter=='ascending')
            {
                $users->orderBy('created_at', 'asc');
            }
            else if($request->filter=='descending')
            {
                $users->orderBy('created_at', 'desc');
            }


        }


        $users = $users->paginate(15);
        return view('backend.customer.franchise.index', compact('users', 'sort_search'));
    }

    public function franchise_add(){
        return view('backend.customer.franchise.add');
    }

    public function saveFranchise(Request $request){
        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'password' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
        ]);

            $franchise = new User;
            $franchise->name = $request->name;
            $franchise->state = $request->state;
            $franchise->city = $request->city;
            $franchise->postal_code = $request->postal_code;
            $franchise->phone = $request->phone;
            $franchise->email = $request->email;
            $franchise->password = $request->password;
            $franchise->email_verified_at = now();
            $franchise->user_type = 'franchise';
            $franchise->is_verified = 1;
            $franchise->save();
            // dd($franchise->id);

                $seller = Franchise::create([
                    "user_id" => $franchise->id,
                    // "vendor_type" => $request->vendor_type,
                    // "product_category_ids" => $request->product_category_ids,
                    // "service_category_ids" => $request->service_category_ids
                ]);

                $shop = FranchiseShop::create([
                    "user_id" => $franchise->id,
                    "name" => $request->shop_name,
                    // "address_type" => $request->address_type,
                    // "address" => $request->address,
                    // "landmark" => $request->landmark?$request->landmark:'',
                    // "locality" => $request->locality?$request->locality:'',
                    "city" => $request->city,
                    "state" => $request->state,
                    "pincode" => $request->postal_code,
                    "phone" => $request->phone?$request->phone:'',
                    // "alternate_phone" => $request->alternate_phone?$request->alternate_phone:''
                ]);

                if($seller->id && $shop->id){
                    DB::commit();
                    // dd("Commited");
                }else{
                    // dd("Rollback");
                    DB::rollback();
                }



            flash(translate('Franchise details saved successfully'))->success();
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            return back();

    }

    public function franchisePinCode($id)
    {
        $user_details = User::findOrFail($id);
        $franchise_pin_codes = FranchisePincode::where('franchise_id',$id)->paginate(100);
        return view('backend.customer.franchise.franchise_pin_code', compact('user_details', 'franchise_pin_codes'));
    }

    public function franchise_pincodeStore(Request $request){
        $request->validate([
            'pincode' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'franchise_id' => 'required',
        ]);

        $franchise_pin = new FranchisePincode;
        $franchise_pin->pincode = $request->pincode;
        $franchise_pin->country = $request->country;
        $franchise_pin->state = $request->state;
        $franchise_pin->city = $request->city;
        $franchise_pin->franchise_id = $request->franchise_id;
        $franchise_pin->save();

        flash(translate('Pincode saved successfully'))->success();
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        return back();

    }


}
