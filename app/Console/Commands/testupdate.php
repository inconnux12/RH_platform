<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class testupdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update number of vecation in user db each minute';

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
        $user=User::find(1);
        $user->conge_nbr=(int)$user->conge_nbr+1;
        $user->save();
        return 0;
    }
}
