<?php

namespace App\Utility;

use App\Models\OtpConfiguration;
use App\Utility\MimoUtility;
use Twilio\Rest\Client;

class SendSMSUtility
{
    public static function sendSMS($to, $from, $text, $template_id)
    {
        if (OtpConfiguration::where('type', 'twillo')->first()->value == 1) {
            $sid = env("TWILIO_SID"); // Your Account SID from www.twilio.com/console
            $token = env("TWILIO_AUTH_TOKEN"); // Your Auth Token from www.twilio.com/console

            $client = new Client($sid, $token);
            try {
                $client->messages->create(
                    $to, // Text this number
                    array(
                        'from' => env('VALID_TWILLO_NUMBER'), // From a valid Twilio number
                        'body' => $text
                    )
                );
            } catch (\Exception $e) {

            }

        } elseif (OtpConfiguration::where('type', 'gupshup')->first()->value == 1){
            $curl = curl_init();
            $post_fields = array();
            $post_fields["method"] = "sendMessage";
            $post_fields["send_to"] = $to;
            $post_fields["msg"] = $text;
            $post_fields["msg_type"] = "TEXT";
            $post_fields["userid"] = env('GUPSHUP_USER_ID');
            $post_fields["password"] = env('GUPSHUP_PASSWORD');
            $post_fields["auth_scheme"] = "PLAIN";
            $post_fields["format"] = "JSON";
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://enterprise.smsgupshup.com/GatewayAPI/rest",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_fields
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }

        }
        return true;
    }


}
