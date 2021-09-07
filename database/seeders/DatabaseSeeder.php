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
        /* DB::table('users')->insert([
            [
                'poste_title' => 'comptable',
            ],
            [
                'poste_title' => 'agent',
            ],
            [
                'poste_title' => 'fonctionnaire',
            ],
            [
                'poste_title' => 'administrateur',
            ],
        ]);
        DB::table('postes')->insert([
        [
            'poste_title' => 'comptable',
        ],
        [
            'poste_title' => 'agent',
        ],
        [
            'poste_title' => 'fonctionnaire',
        ],
        [
            'poste_title' => 'administrateur',
        ],
    ]);*/
    } 
}
