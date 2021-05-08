<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_subscriptions')->insert([
            'user_id' => 2,
            'subscription_id' => 1,
            'start_date' => (new \DateTime( '2022-08-01')),
            'next_order_date' => (new \DateTime( '2022-08-01'))->modify('20 days'),
        ]);
        DB::table('user_subscriptions')->insert([
            'user_id' => 3,
            'subscription_id' => 2,
            'start_date' => (new \DateTime( '2020-08-01')),
            'next_order_date' => (new \DateTime( '2020-08-01'))->modify('30 days'),

        ]);
        DB::table('user_subscriptions')->insert([
            'user_id' => 4,
            'subscription_id' => 3,
            'start_date' => (new \DateTime( '2021-05-14')),
            'next_order_date' => (new \DateTime( '2021-05-14'))->modify('40 days'),
        ]);
    }
}
