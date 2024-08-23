<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailQueue;
use Carbon\Carbon;

class SendmailerController extends Controller
{
    // Check Mail template on browser
    public function checkMailTemplate(){
        $verification_code = "123456";
        // return view('mailers.order_delivered.order_delivered',compact('verification_code'));
        // return view('mailers.order_cancellation.order_cancellation',compact('verification_code'));
        // return view('mailers.out_of_delivery.out_of_delivery',compact('verification_code'));
        // return view('mailers.order_shipped.order_shipped',compact('verification_code'));
        // return view('mailers.order_successfully_return.order_successfully_return',compact('verification_code'));
        // return view('mailers.order_cancellation.order_cancellation',compact('verification_code'));
        // return view('mailers.engagement_feedback.feedback',compact('verification_code'));
        return view('mailers.customer_service.customer_service',compact('verification_code'));
    }

    // Send mail function
    public function StoreMail($data)
    {
        try {
            $store_mail = new EmailQueue();
            $store_mail->mail_identifier =  $data['mail_identifier'];
            $store_mail->mail_from =  env("PROMOTIONAL_MAIL");
            $store_mail->mail_to =  $data['to'];
            $store_mail->mail_subject =  $data['subject'];
            $store_mail->mail_body =  $data['template'];
            $store_mail->save();

            return true;

        } catch (Exception $e) {
            //return false;
            echo 'Caught exception : '. $e->getMessage() ."\n";
            dd("Excception");
        }
    }

    public function UpdateMail($id, $status, $respons_code=null, $error_msg=null){
        $mail = EmailQueue::findOrFail($id);
        $mail->status = $status;
        $mail->send_at = Carbon::now()->toDateTimeString();
        $mail->response_id = $respons_code;
        $mail->error_msg = $error_msg;
        $mail->save();
        return true;
    }

    // Send mail function
    public function SendMails($data)
    {
        // dd($data->mail_body);
        if(isset($data->mail_body)){
            $email_html =  $data->mail_body;      
        }else{
            $email_html = '';
        }  

        $apiKey = env('MAIL_PASSWORD');    
        // dd($apiKey);
        // dd(env("PROMOTIONAL_MAIL"));
        $email = new \SendGrid\Mail\Mail();

        //Remove these two line when testing is done
        $data['to'] = "avinash@orrish.com";
        $data['name'] = "Avinash Singh";
        // $email->setFrom($data->mail_from, "Ebuildbazar1");
        $email->setFrom("promotions@ebuildbazaar.in", "Ebuildbazar1");
        $email->setSubject($data->mail_subject);
        // $email->addTo("$data->mail_to");
        $email->addTo($data['to']);

        $email->addContent(
            "text/html", $email_html
        );
        
        $sendgrid = new \SendGrid($apiKey);
        try {
            $response = $sendgrid->send($email);
            if($response){
                $this->UpdateMail($data->id, 2, $response->statusCode());
                return true;
            }
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
            // dd("Ok");
        } catch (Exception $e) {
            $this->UpdateMail($data->id, 3, null, $e->getMessage());
            return true;
            // echo 'Caught exception : '. $e->getMessage() ."\n";
            // dd("Excception");
        }
    }

    // Send test mail 
    public function sendMail()
    {
        $value = "123456";
        $template = view('mailers.password_reset.password_reset',compact('value'));
        $userdetails = array(
            "name"=>"Avi Singh",
            "to"=>"avinash.orrish@gmail.com",
            "subject"=>"Testing Mail",
            "template"=> "'.$template.'"
        );

        $this->SendMails($userdetails);
    }
}
