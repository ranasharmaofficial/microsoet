<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Http;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Cookie;
use Session;
use Nexmo;
use Twilio\Rest\Client;
use DB;
use Response;

use App\SmsTemplate;

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

                // $otpController = new OTPVerificationController;
                // $otpController->send_code($user);


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

    // public function register(Request $request)
    // {
    //     $mail = new \App\Http\Controllers\SendmailerController;
    //     $mail->sendMail();

    // }

    public function register(Request $request)
    {
        $output = [];
        $isValid = 0;
        $rules = [
            'first_name'=>'required',
            'last_name'=>'required',
            // 'mobile_no'=>'required|digits:10|numeric',
            // 'email'=>'required|email',
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
            if($request->email) {
                $validator = Validator::make($request->all(), [
                    'email'=>'required|email'
                ]);
                if ($validator->fails()) {
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Errors',
                        'errors' => $validator->getMessageBag()->toArray()
                    ];
                }else{
                    $isValid = 1;
                }
            }else if($request->mobile_no) {
                $validator = Validator::make($request->all(), [
                    'mobile_no'=>'required|digits:10|numeric|unique:users,phone'
                ]);
                if ($validator->fails()) {
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Mobile Errors',
                        'errors' => $validator->getMessageBag()->toArray()
                    ];
                }else{
                    $isValid = 1;
                }
            }
        }

        if($isValid) {
            $email = "";
            $phone = "";
            $where['user_type'] = 'customer';
            if($request->email) {
                $email = $request->email;
                $where['email'] = $email;
            }
            if($request->mobile_no) {
                $phone = $request->mobile_no;
                $where['phone'] = $phone;
            }
            // $is_exist = User::where(function ($query) use($email,$phone) {
            //     $query->where('email','=',$email)
            //         ->orWhere('phone','=',$phone);
            // })->where('user_type','customer')->first();
            $is_exist = User::where($where)->first();

            if($is_exist == null){
                $verification_code = rand(111111,999999);
                $user = User::create([
                    "first_name" => "$request->first_name",
                    "last_name" => "$request->last_name",
                    "name" => "$request->first_name"." "."$request->last_name",
                    "phone" => "$phone",
                    "email" => "$email",
                    "gender" => "$request->gender",
                    "password" => Hash::make($request->password),
                    "verification_code" => $verification_code
                ]);


                // $message = "Growciti: Use OTP $verification_code to active your account. DO NOT SHARE this code with anyone, Team Growciti";
                // $token = 'UTNOVTY3eDFqNkhsRHgzSjRhOUFVZz09';
                // $response = Http::get("https://int.chatway.in/api/send-msg?username=$username&number=91$number&message=$message&token=$token");
                // Session::put('mobileotp', $verification_code);

                // $username = 'GROWCITI';
                // $device_token = 'UTNOVTY3eDFqNkhsRHgzSjRhOUFVZz09';
                // $number = $phone;
                // $message = "Growciti: Use OTP '.$verification_code.' to active your account. DO NOT SHARE this code with anyone, Team Growciti";
                // // $phones = $mobileotp;
                // $url = "https://int.chatway.in/api/send-msg";
                // $ch = curl_init($url);
                // curl_setopt($ch, CURLOPT_HEADER, 0);
                // curl_setopt($ch, CURLOPT_POST, 1);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, "username='.$username.'&number=91'.$number.'&message='.$message.'&token='.$device_token.'");
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                // $respond = curl_exec($ch);

                $username = 'GROWCITI';
                $number = $phone;
                // $otp = mt_rand(100000, 999999); // Generating a random 6-digit OTP
                $message = "Growciti: Use OTP $verification_code to active your account. DO NOT SHARE this code with anyone, Team Growciti";
                $token = 'UTNOVTY3eDFqNkhsRHgzSjRhOUFVZz09';
                $responsesss = Http::get("https://int.chatway.in/api/send-msg?username=$username&number=91$number&message=$message&token=$token");

                // $otpController = new OTPVerificationController;
                // $otpController->send_code($user);

            $sms_template   = SmsTemplate::where('identifier','phone_number_verification')->first();
            $sms_body       = $sms_template->sms_body;
            $sms_body       = str_replace('[[code]]', $user->verification_code, $sms_body);
            $template_id    = $sms_template->template_id;

            $userdata = array(
                "sms_indentifier" => "phone_number_verification",
                "sms_from"=> env('APP_NAME'),
                "sms_to"=> $user->phone,
                "sms_body"=> $sms_body,
                "template_id"=> $template_id,
                "user_id"=> $user->id,
            );
            $otpController = new OTPVerificationController;
            $otpController->store_phone_verification($user, $userdata);

                // dd($otpController->send_code($user););
                // die;

                if($user->id) {
                    $session_data = [
                        'email' => $request->email,
                        'code' => $user->verification_code
                    ];

                    // $otpController = new OTPVerificationController;
                    // $otpController->send_code($user);


                    $request->session()->put('verify', $session_data);
                    // MailController::sendRegistrationMail($request->first_name, $request->last_name, $verification_code, $request->email);

                    // $name = $request->first_name;
                    $template = view('mailers.otp_validation.otp_validation',compact('verification_code'));
                    $userdetails = array(
                        "mail_identifier" => "email_otp_verification",
                        "name"=>$request->first_name,
                        "to"=>$request->email,
                        "subject"=>"OTP for Email Verification",
                        "template"=> $template
                    );
                    $mail = new \App\Http\Controllers\SendmailerController;
                    $mail->StoreMail($userdetails);

                    $output = [
                        "status" => true,
                        "status_code" => 200,
                        "msg" => "Registration Success! An Otp has been sent to your mail. Kindly Verify",
                        "data" => [
                            'verification_code' => $verification_code
                        ]
                    ];

                    // if(!$mail)
                    // {
                    //     // dd("I am not send mail");
                    //     $output = [
                    //         "status" => true,
                    //         "status_code" => 200,
                    //         "msg" => "Something went wrong i am not able to send mail, but are register successfully",
                    //         "data" => [
                    //             'verification_code' => $verification_code
                    //         ]
                    //     ];
                    // }else{
                    //     // dd("I am send mail");
                    //     $output = [
                    //         "status" => true,
                    //         "status_code" => 200,
                    //         "msg" => "Registration Success! An Otp has been sent to your mail. Kindly Verify",
                    //         "data" => [
                    //             'verification_code' => $verification_code
                    //         ]
                    //     ];
                    // }

                }else{
                    $output = [
                        "status" => false,
                        "status_code" => 500,
                        "msg" => "Registration failed.",
                        "data" => []
                    ];
                }
            }else{
                $output = [
                    "status" => false,
                    "status_code" => 500,
                    "msg" => "Email or Phone already register.",
                    "data" => $is_exist
                ];
            }
        }else{
            $output = [
                'status' => false,
                "status_code" => 400,
                'msg' => 'Errors',
                'errors' => 'Email or Phone required'
            ];
        }

        return Response::json($output);

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

    public function store_phone_verification($user, $userdata)
    {
        // SmsUtility::storephoneVerification($user);
        // $user_mail = new \App\Utility\SmsUtility;
        // $user_mail->storephoneVerification($user);
        storeSms($user, $userdata);
    }

    public function sendOtp(Request $request)
    {
        $phone = $request->input('phone');
        $verification_code = rand(1000, 9999);

        // dd($phone);

        $username = 'GROWCITI';
        $number = $phone;
        $message = "*Growciti:* Use OTP $verification_code to activate your account. DO NOT SHARE this code with anyone, Team Growciti";
        $token = 'R0pwa1dvdzdxbUM0R2kxajM2L3kwQT09';

        $response = Http::get("https://int.chatway.in/api/send-msg?username=$username&number=91$number&message=$message&token=$token");


        if ($response->successful()) {
            session(['otp' => $verification_code, 'otp_mobile' => $phone]);
            session()->flash('message', 'OTP sent successfully.');
            session()->flash('alert-class', 'alert-success');

            return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
        } else {
            // return redirect("profile")->with('alert-danger', 'Failed to send OTP.');
            return response()->json(['success' => false, 'message' => 'Failed to send OTP.']);
        }
    }

    public function verifyOtp(Request $request)
    {
        $phone = $request->input('phone');
        $otp = $request->input('otp');
        $name = $request->input('name');

        // Retrieve OTP from session or database
        $storedOtp = session('otp');
        $storedMobile = session('otp_mobile');

        if ($otp == $storedOtp && $phone == $storedMobile) {

            $cnt_user = User::where('phone', $phone)->count();
            if($cnt_user == 0){
                $user = new User;
                $user->name = $name;
                $user->phone = $phone;
                $user->is_verified = 1;
                $user->email_verified_at = now();
                $user->save();

                if($user){
                    session()->forget(['otp', 'otp_mobile']);
                    Auth::login($user);
                    return response()->json(['success' => true, 'message' => 'Successfully Registered.']);
                }
                else {
                   return response()->json(['success' => false, 'message' => 'Invalid OTP']);
                }

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
                    return response()->json(['success' => true, 'message' => 'OTP VERIFIED']);
            }
        }else{
            return response()->json(['success' => false, 'message' => 'Invalid OTP']);
        }

    }

    public function sendVendorOtp(Request $request)
    {
        $phone = $request->input('phone');
        $verification_code = rand(1000, 9999);

        // dd($phone);

        $username = 'GROWCITI';
        $number = $phone;
        $message = "*Growciti:* Use OTP $verification_code to activate your account. DO NOT SHARE this code with anyone, Team Growciti";
        $token = 'R0pwa1dvdzdxbUM0R2kxajM2L3kwQT09';

        $response = Http::get("https://int.chatway.in/api/send-msg?username=$username&number=91$number&message=$message&token=$token");


        if ($response->successful()) {
            session(['otp' => $verification_code, 'otp_mobile' => $phone]);
            session()->flash('message', 'OTP sent successfully.');
            session()->flash('alert-class', 'alert-success');

            return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
        } else {
            // return redirect("profile")->with('alert-danger', 'Failed to send OTP.');
            return response()->json(['success' => false, 'message' => 'Failed to send OTP.']);
        }
    }

    public function verifyVendorOtp(Request $request)
    {
        $phone = $request->input('phone');
        $otp = $request->input('otp');
        $name = $request->input('name');
        $email = $request->input('email');
        $shop_name = $request->input('shop_name');
        $shop_address = $request->input('shop_address');
        $gst = $request->input('gst');

        // Retrieve OTP from session or database
        $storedOtp = session('otp');
        $storedMobile = session('otp_mobile');

        if ($otp == $storedOtp && $phone == $storedMobile) {

            $cnt_user = User::where('phone', $phone)->count();
            if($cnt_user == 0){
                $user = new User;
                $user->name = $name;
                $user->phone = $phone;
                $user->gst = $gst;
                $user->email = $email;
                $user->shop_name = $shop_name;
                $user->shop_address = $shop_address;
                $user->is_verified = 1;
                $user->user_type = 'vendor';
                $user->email_verified_at = now();
                $user->save();

                if($user){
                    session()->forget(['otp', 'otp_mobile']);
                    Auth::login($user);
                    return response()->json(['success' => true, 'message' => 'Successfully Registered.']);
                }
                else {
                   return response()->json(['success' => false, 'message' => 'Invalid OTP']);
                }

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
                    return response()->json(['success' => true, 'message' => 'OTP VERIFIED']);
            }
        }else{
            return response()->json(['success' => false, 'message' => 'Invalid OTP']);
        }

    }
}
