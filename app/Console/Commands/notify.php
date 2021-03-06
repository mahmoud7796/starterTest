<?php

namespace App\Console\Commands;

use App\Mail\notifyEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send emails to all users';

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
    public function handle()
    {//pluck('email')->toArray()
       $emails = User::pluck('email')->toArray();
        foreach($emails as $email){
            $content = ['title'=>'programing', 'subject'=>'php Laravel notify email test'];
            Mail::To($email)->send(new notifyEmail($content));

        }

    }
}
