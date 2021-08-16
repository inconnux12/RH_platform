<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'admin',
            'email' => 'admin'.'@mail.com',
            'password' => Hash::make('admin'),
            'username' => 'admin',
            'role' => 1
        ],
        [
            'name' => 'rsuser',
            'email' => 'rsuser'.'@mail.com',
            'password' => Hash::make('rsuser'),
            'username' => 'rsuser',
            'role' => 2
        ],
        [
            'name' => 'rhuser',
            'email' => 'rhuser'.'@mail.com',
            'password' => Hash::make('rhuser'),
            'username' => 'rhuser',
            'role' => 3
        ],
        [
            'name' => 'user',
            'email' => 'user'.'@mail.com',
            'password' => Hash::make('user'),
            'username' => 'user',
            'role' => 4
        ]
    ]);
    }
}
