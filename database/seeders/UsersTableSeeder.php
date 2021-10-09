<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'the admin user',
            'email' => 'iamadmin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123456'),
        ]);
        DB::table('users')->insert([
            'username' => 'the seller user',
            'email' => 'iamaseller@gmail.com',
            'role' => 'seller',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'username' => 'the buyer user',
            'email' => 'iamabuyer@gmail.com',
            'role' => 'buyer',
            'password' => Hash::make('password'),
        ]);
    }
}
