<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailQueue;
use App\Models\SmsQueue;

class SmsQueueList extends Controller
{
    //

    public function sms_list()
    {
    	$sms_list = SmsQueue::paginate(40);
        return view('backend.sms_list.sms_list',compact('sms_list'));
    }

    public function email_list()
    {
    	$email_list = EmailQueue::paginate(40);
        // dd($email_list);
        return view('backend.sms_list.email_list',compact('email_list'));
    }


}
