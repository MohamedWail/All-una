<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Mobile',
            'name_ar' => 'موبيل',
            'path_of_image' => 'https://source.unsplash.com/user/c_v_r',
        ]);
    }
}
