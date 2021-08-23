<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class everyDayResetStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:everyDayResetStatus';

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
     * @return int
     */
    public function handle()
    {
        $users=User::where('status_id',2);
        foreach($users as $user){
            $user->status_id=1;
            $user->save();
        }
        return 0;
    }
}
