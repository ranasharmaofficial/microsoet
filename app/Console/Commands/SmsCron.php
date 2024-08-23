<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SmsQueue;
class SmsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendsms:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send every 5 minutes sms to all the users.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $sms_list = SmsQueue::select('*')
            ->where('status', 0)
            ->orderBy('id', 'asc')->take(10)->get();
        foreach ($sms_list as $sms)
        {
            // $user_mail = new \App\Http\Controllers\SendmailerController;
            // $user_mail->SendMails($mail);
            sendTextMessage($sms);
        }
        $this->info('Sms Updated and Sent.');
    }
}
