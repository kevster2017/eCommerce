<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'kev',
            'email' => 'kev@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('password')
        ]);

        DB::table('users')->insert([
            'name' => 'mel',
            'email' => 'mel@gmail.com',
            'is_admin' => 0,
            'password' => Hash::make('password')
        ]);
    }
}
