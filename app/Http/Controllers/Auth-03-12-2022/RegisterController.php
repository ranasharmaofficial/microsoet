<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\BusinessSetting;
use App\OtpConfiguration;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OTPVerificationController;
use App\Http\Controllers\MailController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Cookie;
use Session;
use Nexmo;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $customer = new Customer;
            $customer->user_id = $user->id;
            $customer->save();
        }
        else {
            if (addon_is_activated('otp_system')){
                $user = User::create([
                    'name' => $data['name'],
                    'phone' => '+'.$data['country_code'].$data['phone'],
                    'password' => Hash::make($data['password']),
                    'verification_code' => rand(100000, 999999)
                ]);

                $customer = new Customer;
                $customer->user_id = $user->id;
                $customer->save();

                $otpController = new OTPVerificationController;
                $otpController->send_code($user);
            }
        }
        
        if(session('temp_user_id') != null){
            // dd('i am from register');
            
        }

        if(Cookie::has('referral_code')){
            $referral_code = Cookie::get('referral_code');
            $referred_by_user = User::where('referral_code', $referral_code)->first();
            if($referred_by_user != null){
                $user->referred_by = $referred_by_user->id;
                $user->save();
            }
        }

        return $user;
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile_no'=>'required|digits:10|numeric',
            'email'=>'required|email',
        ]);
		// $verificationcode = rand(111111,999999);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $exist_user = User::where('email', $request->email)->first();
            if($exist_user != null && $exist_user->is_verified == 0){
                $email_verification = BusinessSetting::where('type', 'email_verification')->first();
                if($email_verification->value == 1){
                    $veri_code = User::where('email',$request->email)->first();
                    $veri_code = $veri_code->verification_code;
                    $request->session()->put('user_email', $request->email);
                    $request->session()->put('ver_code', $veri_code);
                    
                    MailController::sendRegistrationMail($request->first_name, $request->last_name, $veri_code, $request->email);
                    // $user->email_verified_at = date('Y-m-d H:m:s');
                    // $user->save();
                    // flash(translate('Registration successful.'))->success();
                    return redirect('email-verify')->with(session()->flash('alert-success', 'Registered Customer! An Otp has been sent to your mail. Kindly Verify'));
				}
			}elseif($exist_user != null && $exist_user->is_verified == 1){
				return redirect()->back()->with(session()->flash('alert-danger', 'Email or Phone already register.'));
			}	
        }else {
            flash(translate('Please fill valid Email'));
            return back();
        }

        $this->validator($request->all())->validate();
        // $name = $request->first_name.' '.$request->last_name;
        $name = $request->first_name.' '.$request->last_name;
        // $name = "Prince kr";
        // dd($name);
        // die;
        $verificationcode = 123456;
        // $verificationcode = rand(111111,999999);
        $user = User::create([
            "first_name" => "$request->first_name",
            "name" => $name,
            "last_name" => "$request->last_name",
            "phone" => "$request->mobile_no",
            "email" => "$request->email",
            "verification_code" => "$verificationcode",
            "gender" => "$request->gender",
            "password" => Hash::make($request->password)
        ]);
        // $user = User::create(request(['first_name','name','last_name','phone', 'email','gender', 'password']));
        
        // $user = $this->create($request->all());
        // dd($user);
        // die;

        // $this->guard()->login($user);

        if($user->email != null){
            if(BusinessSetting::where('type', 'email_verification')->first()->value != 1){
                $request->session()->put('user_email', $request->email);
                $request->session()->put('ver_code', $verificationcode);
                // MailController::sendRegistrationMail($request->first_name, $request->last_name, $verificationcode, $request->email);
                // $user->email_verified_at = date('Y-m-d H:m:s');
                // $user->save();
                // flash(translate('Registration successful.'))->success();
                return redirect('email-verify');
            }
            else {
                event(new Registered($user));
                flash(translate('Registration successful. Please verify your email.'))->success();
            }
        }

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    

    protected function registered(Request $request, $user)
    {
        if ($user->email == null) {
            return redirect()->route('verification');
        }elseif(session('link') != null){
            return redirect(session('link'));
        }else {
            return redirect()->route('home');
        }
    }
}