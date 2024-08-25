<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\User;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\ServiceCart;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Response;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /*protected $redirectTo = '/';*/


    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if(request()->get('query') == 'mobile_app'){
            request()->session()->put('login_from', 'mobile_app');
        }
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        if (session('login_from') == 'mobile_app') {
            return $this->mobileHandleProviderCallback($request, $provider);
        }
        try {
            if ($provider == 'twitter') {
                $user = Socialite::driver('twitter')->user();
            } else {
                $user = Socialite::driver($provider)->stateless()->user();
            }
        } catch (\Exception $e) {
            flash("Something Went wrong. Please try again.")->error();
            return redirect()->route('login');
        }

        //check if provider_id exist
        $existingUserByProviderId = User::where('provider_id', $user->id)->first();

        if ($existingUserByProviderId) {
            //proceed to login
            auth()->login($existingUserByProviderId, true);
        }
        else {
            //check if email exist
            $existingUser = User::where('email', $user->email)->where('is_verified',1)->first();

            if ($existingUser) {
                //update provider_id
                $existing_User = $existingUser;
                $existing_User->provider_id = $user->id;
                $existing_User->save();

                //proceed to login
                auth()->login($existing_User, true);
            } else {
                //create a new user
                $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->email_verified_at = date('Y-m-d Hms');
                $newUser->provider_id = $user->id;
                $newUser->save();

                //make user a customer
                $customer = new Customer;
                $customer->user_id = $newUser->id;
                $customer->save();

                //proceed to login
                auth()->login($newUser, true);
            }
        }

        if (session('temp_user_id') != null) {
            Cart::where('temp_user_id', session('temp_user_id'))
                ->update(
                    [
                        'user_id' => auth()->user()->id,
                        'temp_user_id' => null
                    ]
                );
            ServiceCart::where('temp_user_id', session('temp_user_id'))
            ->update([
                'user_id' => auth()->user()->id,
                'temp_user_id' => null
            ]);


            Session::forget('temp_user_id');
        }

        if (session('link') != null) {
            return redirect(session('link'));
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function mobileHandleProviderCallback($request, $provider)
    {
        $return_provider = '';
        $result = false;
        if($provider) {
            $return_provider = $provider;
            $result = true;
        }
        return response()->json([
            'result' => $result,
            'provider' => $return_provider
        ]);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required_without:phone',
            'phone'    => 'required_without:email',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        // Check verified User
        // $check_verified_user = \App\Models\User::where('email', $request->email)->first();
        // // dd($check_verified_user->is_verified);die;
        // if($check_verified_user != null && $check_verified_user->is_verified == 0){
        //     return redirect()->route('email-verify');
        //     // return redirect()->route('login');
        // }

        if ($request->get('phone') != null) {
            return ['phone' => "+{$request['country_code']}{$request['phone']}", 'password' => $request->get('password')];
        } elseif ($request->get('email') != null) {
            return $request->only($this->username(), 'password');
        }
    }

    /**
     * Check user's role and redirect user based on their role
     * @return
     */
    public function authenticated()
    {
        if (session('temp_user_id') != null) {
            Cart::where('temp_user_id', session('temp_user_id'))
                ->update(
                    [
                        'user_id' => auth()->user()->id,
                        'temp_user_id' => null
                    ]
                );
            ServiceCart::where('temp_user_id', session('temp_user_id'))
            ->update([
                'user_id' => auth()->user()->id,
                'temp_user_id' => null
            ]);


            Session::forget('temp_user_id');
        }

        if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff') {
            return redirect()->route('admin.dashboard');
        } else {

            if (session('link') != null) {
                return redirect(session('link'));
            } else {
                return redirect()->route('profile');
            }
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        flash(translate('Invalid login credentials'))->error();
		return redirect()->back()->with(session()->flash('alert-danger', 'Invalid login credentials!.'));
        // return back();
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function logout(Request $request)
    // {
    //     if (auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')) {
    //         $redirect_route = 'admin.login';
    //     } else {
    //         $redirect_route = 'home';
    //     }

    //     // //User's Cart Delete
    //     // if (auth()->user()) {
    //     //     Cart::where('user_id', auth()->user()->id)->delete();
    //     // }

    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     return $this->loggedOut($request) ?: redirect()->route($redirect_route);
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        // return dd($request->all());
        $output = [];
        $rules = [
            'password'=>'required',
            'email'=>'required',
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
            $email = $request->email;
            //$is_exist = User::where(['email'=>$email,'user_type'=>'customer'])->first();
            $is_exist = User::where(function ($query) use ($email) {
                                $query->where('email', $email)->where('banned',0)
                                      ->orWhere('phone', $email);
                                })->where('user_type','customer')->first();

            // return dd($is_exist);
            if($is_exist != null){
                if (Hash::check($request->password, $is_exist->password)) {
                    $output = [
                        'status' => true,
                        "status_code" => 200,
                        'msg' => 'Login successfully.',
                        'data' => []
                    ];
                    $sessionData = [
                        'user_id'=>$is_exist->id,
                        'email'=>$is_exist->email,
                        'phone'=>$is_exist->phone,
                        'user_type'=>$is_exist->user_type,
                        'name'=>$is_exist->name,
                        'first_name'=>$is_exist->first_name,
                        'last_name'=>$is_exist->last_name
                    ];
                    $request->session()->put('user',$sessionData);
                    auth()->login($is_exist, true);
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Wrong Password.',
                        'data' => []
                    ];
                }
            }else{
                $output = [
                    'status' => false,
                    "status_code" => 400,
                    'msg' => 'Wrong username. or You are banned.',
                    'data' => [
                        'result'=>$is_exist,
                        'request'=>$request->all()
                    ]
                ];
            }
        }

        // cart login redirection
        if (session('temp_user_id') != null) {
            $uri = explode('/',session('url.intended'));
            if($uri[count($uri)-1] == 'cart'){
                Cart::where('temp_user_id', session('temp_user_id'))
                    ->update([
                        'user_id' => auth()->user()->id,
                        'temp_user_id' => null
                    ]);
            }else{
                ServiceCart::where('temp_user_id', session('temp_user_id'))
                    ->update([
                        'user_id' => auth()->user()->id,
                        'temp_user_id' => null
                    ]);
            }
            Session::forget('temp_user_id');
            $output['redirectTo'] = session('url.intended');
        }

        return $output;

    }



    public function admin_login(Request $request) {
        // return dd($request->all());
        $output = [];
        $rules = [
            'password'=>'required',
            'email'=>'required|email',
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
            $email = $request->email;
            $is_exist = User::where('email', $email)->first();
            // return dd($is_exist->user_type);
            if($is_exist != null && ($is_exist->user_type == "admin" || $is_exist->user_type == "staff")){
                if (Hash::check($request->password, $is_exist->password)) {
                    $output = [
                        'status' => true,
                        "status_code" => 200,
                        'msg' => 'Login successfully.',
                        'data' => []
                    ];
                    $sessionData = [
                        'user_id'=>$is_exist->id,
                        'email'=>$is_exist->email,
                        'phone'=>$is_exist->phone,
                        'user_type'=>$is_exist->user_type,
                        'name'=>$is_exist->name,
                        'first_name'=>$is_exist->first_name,
                        'last_name'=>$is_exist->last_name
                    ];
                    $request->session()->put('admin',$sessionData);
                    auth()->login($is_exist, true);
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Wrong Password.',
                        'data' => []
                    ];
                }
            }else{
                $output = [
                    'status' => false,
                    "status_code" => 400,
                    'msg' => 'Wrong username.',
                    'data' => [
                        'result'=>$is_exist,
                        'request'=>$request->all()
                    ]
                ];
            }
        }
        return $output;

    }

    public function logout(Request $request) {
        if (auth()->user() != null) {
            if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff'){
                $request->session()->flush('admin');
                $this->redirectTo = 'admin.login';
            }else if(auth()->user()->user_type == 'customer'){
                $request->session()->flush('user');
                $this->redirectTo = 'login';
            }
            $this->guard()->logout();
        } else {
            $this->redirectTo = 'home';
        }

        return redirect()->route($this->redirectTo);
    }

    public function sendLoginOtp(Request $request)
    {
        dd("done");
        $phone = $request->input('phone');
        $verification_code = rand(1000, 9999);

        $username = 'GROWCITI';
        $number = $phone;
        $message = "Growciti: Use OTP $verification_code to Login to Your Account. DO NOT SHARE this code with anyone, Team Growciti";
        $token = 'R0pwa1dvdzdxbUM0R2kxajM2L3kwQT09';

        $response = Http::get("https://int.chatway.in/api/send-msg?username=$username&number=91$number&message=$message&token=$token");

        // dd($response);


        if ($response->successful()) {
            session(['otp' => $verification_code, 'otp_mobile' => $phone]);

            return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
        } else {
            return redirect()->with('alert-danger', 'Failed to send OTP.');
        }
    }

    public function verifyLoginOtp(Request $request){
        $phone = $request->input('phone');
        $otp = $request->input('otp');
        // $name = $request->input('name');

        // Retrieve OTP from session or database
        $storedOtp = session('otp');
        $storedMobile = session('otp_mobile');

        if ($otp == $storedOtp && $phone == $storedMobile) {
            // Check if user exists
            $cnt_user = User::where('phone', $phone)->count();

            if ($cnt_user==0) {

                $user = new User;
                $user->phone = $phone;
                $user->is_verified = 1;
                $user->email_verified_at = now();
                $user->save();

                Auth::login($user);
                // return redirect("profile")->with('alert-success', 'Login Succesfully.');
                return response()->json(['status' => true, 'message' => 'OTP VERIFIED.']);


            }else{
                $check_user_verified = User::where('phone', $phone)->where('is_verified',0)->count();
                if($check_user_verified){
                    $user = User::where('phone', $phone)->first();
                    $user->is_verified = 1;
                    $user->email_verified_at = now();
                    $user->save();
                }else{
                    $user = User::where('phone', $phone)->first();
                }
                session()->forget(['otp', 'otp_mobile']);
                Auth::login($user);

                // return redirect("profile")->with('alert-success', 'Login Succesfully.');
                return response()->json(['status' => true, 'message' => 'OTP VERIFIED.']);
            }


        } else {
            // return redirect('/login')->with('alert-danger', 'Invalid OTP');
            return response()->json(['status' => false, 'message' => 'INVALID OTP.']);
        }
    }

}
