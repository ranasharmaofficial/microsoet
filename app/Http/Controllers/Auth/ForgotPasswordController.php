<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use App\Mail\SecondEmailVerifyMailManager;
use App\Utility\SmsUtility;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use DB;
use Response;
use Session;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return view('auth.passwords.forgot_password');
    }

    public function send_password_reset_link(Request $request)
    {
        // return dd($request->all());
        $output = [];
        $rules = [
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
            $is_exist = User::where(['email'=>$email,'user_type'=>'customer'])->first();
            if($is_exist != null){
                $keyData = [
                    'key'=>'ebb_'.Str::random(32),
                    'link_send_at'=>time()
                ];
                $key = encrypt($keyData);
                $id = encrypt($is_exist->id);
                $url = url('reset_password?key='.$key.'&auth='.$id);
                /* start update forgot_password_key */
                $data = [
                    'forgot_password_key'=>$keyData['key']
                ];
                User::where('id', $is_exist->id)->update($data);

                $template = view('mailers.password_reset.password_reset',compact('url'));
                $template_data = array(
                    "mail_identifier" => "send_password_reset_link_to_customer",
                    "to"=> $is_exist->email,
                    "name"=> $is_exist->name,
                    "subject"=> translate('Reset Password'),
                    "template"=> $template,
                );

                $user_mail = new \App\Http\Controllers\SendmailerController;
                $user_mail->StoreMail($template_data);

                /* end update forgot_password_key */
                $output = [
                    'status' => true,
                    "status_code" => 200,
                    'msg' => 'Password reset link send successfully.',
                    'data' => [
                        'url'=>$url
                    ]
                ];
            }else{
                $output = [
                    'status' => false,
                    "status_code" => 400,
                    'msg' => 'Email does not exists.',
                    'data' => []
                ];
            }
        }
        return $output;
    }

    public function reset_password(Request $request)
    {
        $is_verified = 0;
        if($request->auth && $request->key ) {
            $auth = decrypt($request->auth);
            $key = decrypt($request->key);
            if(is_numeric($auth) && is_array($key)) {
                if($key['key'] && $key['link_send_at']){
                    $timeInterval = time() - $key['link_send_at'];
                    if($timeInterval < 86400000){
                        $userData = User::findOrFail($auth);
                        if($key['key'] == $userData->forgot_password_key) {
                            $is_verified = 1;
                        }
                    }
                }
            }
        }

        if(!$is_verified) {
            return redirect('/login');
        }
        return view('auth.passwords.reset_password');
    }

    public function reset_password_auth(Request $request)
    {
        // return dd($request->all());
        $output = [];
        $rules = [
            'password'=>'required',
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
            $auth = decrypt($request->auth);
            $key = decrypt($request->key);
            $is_verified = 0;
            // 86400000 milisecond ( 24 HR ) for link expire

            if($auth && is_numeric($auth) && $key && is_array($key)) {
                if($key['key'] && $key['link_send_at']){
                    $timeInterval = time() - $key['link_send_at'];
                    if($timeInterval < 86400000){
                        $userData = User::findOrFail($auth);
                        if($key['key'] == $userData->forgot_password_key) {
                            $is_verified = 1;
                        }
                    }
                }
            }

            if($is_verified) {
                $data = [
                    'forgot_password_key'=>'',
                    'password'=> Hash::make($request->password)
                ];
                $result = User::where('id', $auth)->update($data);
                if ($result) {
                    $output = [
                        'status' => true,
                        "status_code" => 200,
                        'msg' => 'Password reset successfully.',
                        'data' => []
                    ];
                }else{
                    $output = [
                        'status' => false,
                        "status_code" => 400,
                        'msg' => 'Password reset failed.',
                        'data' => []
                    ];
                }
            }else{
                $output = [
                    'status' => false,
                    "status_code" => 400,
                    'msg' => 'Errors',
                    'errors' => 'Invalid request.'
                ];
            }
        }
        return $output;
    }

    // old function
    public function sendResetLinkEmail(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->email)->first();
            $email_in_session = Session::put('email_in_session', $request->email);
            if ($user != null) {
                $user->verification_code = 123456;
                // $user->verification_code = rand(100000,999999);
                $user->save();

                $array['view'] = 'emails.verification';
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['subject'] = translate('Password Reset');
                $array['content'] = translate('Verification Code is  ').$user->verification_code;

                // Mail::to($user->email)->queue(new SecondEmailVerifyMailManager($array));

                return view('auth.passwords.reset');
            }
            else {
                // flash(translate('No account exists with this email'))->error();
                // flash('alert-danger', 'No account exists with this email!');
                return redirect()->back()->with(session()->flash('alert-danger', 'NO account exists with this email!.'));
                // return back();
            }
        }
        else{
            $user = User::where('phone', $request->email)->first();
            if ($user != null) {
                $user->verification_code = rand(100000,999999);
                $user->save();
                SmsUtility::password_reset($user);
                return view('otp_systems.frontend.auth.passwords.reset_with_phone');
            }
            else {
                // flash(translate('No account exists with this phone number'))->error();
                flash('alert-danger', 'No account exists with this phone number!');
                return back();
            }
        }
    }
}