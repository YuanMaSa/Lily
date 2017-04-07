<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('roles')->insert([
            'name' => '會員',
        ]);
        DB::table('processes')->insert([
            'method' => '低溫製程',
        ]);
        DB::table('processes')->insert([
            'method' => '日曬製程',
        ]);
        DB::table('processes')->insert([
            'method' => '熱風製程',
        ]);
        DB::table('processes')->insert([
            'method' => '其他製程',
        ]);
    }
}
