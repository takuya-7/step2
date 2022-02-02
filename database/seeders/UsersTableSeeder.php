<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            ['email' => 'a@a.a', 'password' => bcrypt('aaaaaaaa'), 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}
