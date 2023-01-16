<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //新規入力
        DB::table('accounts')->insert([
            'user_name' => 'akamine',
            'pass' => 'pass'
        ]);

        //新規入力
        DB::table('accounts')->insert([
            'user_name' => 'tsumatani',
            'pass' => 'pass'
        ]);

        //新規入力
        DB::table('accounts')->insert([
            'user_name' => 'hosomi',
            'pass' => 'pass'
        ]);

        //新規入力
        DB::table('accounts')->insert([
            'user_name' => 'yuge',
            'pass' => 'pass'
        ]);
    }
}
