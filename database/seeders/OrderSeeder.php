<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 2,
            'subscription_id' => 1,
            'status_id' => 3,
            'total' => 50,
            'paid_date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('orders')->insert([
            'user_id' => 1,
            'subscription_id' => null,
            'status_id' => 4,
            'total' => 100,
            'paid_date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('orders')->insert([
            'user_id' => 3,
            'subscription_id' => 2,
            'status_id' => 4,
            'total' => 10,
            'paid_date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('orders')->insert([
            'user_id' => 2,
            'subscription_id' => null,
            'status_id' => 4,
            'total' => 20,
            'paid_date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('orders')->insert([
            'user_id' => 4,
            'subscription_id' => 3,
            'status_id' => 1,
            'total' => 30,
            'paid_date' => null,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
