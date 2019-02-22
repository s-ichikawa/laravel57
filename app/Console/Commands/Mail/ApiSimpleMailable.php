<?php

namespace App\Console\Commands\Mail;

use Illuminate\Console\Command;

class ApiSimpleMailable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendgrid:mail-api-simple-mailable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        \Mail::to(env('AUTHOR_EMAIL'), 'tester')->send(new \App\Mail\ApiSimpleMailable());
    }
}
