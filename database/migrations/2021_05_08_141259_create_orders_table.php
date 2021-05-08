<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('subscription_id')->unsigned()->nullable();
            $table->foreign('subscription_id')->references('id')->on('subscriptions');

            $table->bigInteger('status_id')->unsigned()->default(\App\Constants\OrderStatusConstants::CREATED);
            $table->foreign('status_id')->references('id')->on('order_statuses');

            $table->decimal('total');

            $table->dateTime('paid_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
