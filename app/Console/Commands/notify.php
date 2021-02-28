<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

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
    {
       $emails = User::Email();
        foreach($emails as $email){

        }

    }
}
