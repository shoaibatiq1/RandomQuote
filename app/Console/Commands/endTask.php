<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Auth;
use App\Task;

class endTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:end';  

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A user task will be updated';

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
        echo 'hellossss';
    }
}
