<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmailQueue;

class MailJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';
    protected $signature = 'sendmail:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '‘Send every minutes email to all the users';

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
        $mail_list = EmailQueue::select('*')
            ->where('status', 0)
            ->orderBy('id', 'asc')->take(10)->get();
        foreach ($mail_list as $mail)
        {
            $user_mail = new \App\Http\Controllers\SendmailerController;
            $user_mail->SendMails($mail);  
        }
        $this->info('Mail Update has been send successfully');
    }
}
