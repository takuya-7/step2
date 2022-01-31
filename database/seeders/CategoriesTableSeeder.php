<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            ['name' => 'IT','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => '学習','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => '語学','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'ビジネス','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'スポーツ','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'ライフスタイル','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'その他','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}
