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
        DB::table('zones')->insert([
            [
                'zone_name' => 'Zone 01',
            ],
            [
                'zone_name' => 'Zone 02',
            ],
            [
                'zone_name' => 'Zone 03',
            ],
            [
                'zone_name' => 'Zone 04',
            ],
            [
                'zone_name' => 'Zone 05',
            ],
            [
                'zone_name' => 'Zone 06',
            ]
        ]);
        DB::table('statuses')->insert([
            [
                'status'=>1,
                'status_title' => 'absent',
            ],
            [
                'status'=>2,
                'status_title' => 'present',
            ],
            [
                'status'=>3,
                'status_title' => 'congé',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name'=>'admin',
                'email'=>'admin@mail.com',
                'password'=>Hash::make('admin'),
                'role'=>1,
                'user_adrs'=>'123 rue alger',
                'username'=>'admin',
                'zone_id'=>1,
                
            ],
            [
                'name'=>'rsuser',
                'email'=>'rsuser@mail.com',
                'password'=>Hash::make('rsuser'),
                'role'=>2,
                'user_adrs'=>'123 rue alger',
                'username'=>'rsuser',
                'zone_id'=>1,
            ],
            [
                'name'=>'rhuser',
                'email'=>'rhuser@mail.com',
                'password'=>Hash::make('rhuser'),
                'role'=>3,
                'user_adrs'=>'123 rue alger',
                'username'=>'rhuser',
                'zone_id'=>1,
            ],
            [
                'name'=>'user',
                'email'=>'user@mail.com',
                'password'=>Hash::make('user'),
                'role'=>4,
                'user_adrs'=>'123 rue alger',
                'username'=>'user',
                'zone_id'=>1,
            ],
        ]);
        DB::table('postes')->insert([
            [
                'poste_title' => 'administrateur',
                'user_id'=>1
            ],
            [
                'poste_title' => 'chef de service',
                'user_id'=>2
            ],
            [
                'poste_title' => 'responsable resource humaine',
                'user_id'=>3
            ],
            [
                'poste_title' => 'fonctionnaire',
                'user_id'=>4
            ],
        ]);
    } 
}
