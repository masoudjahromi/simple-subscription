<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            'name' => 'CREATED',
            'description' => 'order has been created.',
        ]);
        DB::table('order_statuses')->insert([
            'name' => 'PROCESSING',
            'description' => 'order is processing in the payment page.',
        ]);
        DB::table('order_statuses')->insert([
            'name' => 'FAILED',
            'description' => 'order has been failed.',
        ]);
        DB::table('order_statuses')->insert([
            'name' => 'PAID',
            'description' => 'order has been paid.',
        ]);
    }
}
