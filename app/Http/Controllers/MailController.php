<?php

namespace App\Http\Controllers;
use App\Mail\RegistrationVerifyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public static function sendRegistrationMail($fname, $lname, $verificationcode, $email){
        $data = [
            'fname' => $fname,
            'lname' => $lname,
            'verification_code' => $verificationcode,
        ];
        Mail::to($email)->send(new RegistrationVerifyMail($data));
    }
}