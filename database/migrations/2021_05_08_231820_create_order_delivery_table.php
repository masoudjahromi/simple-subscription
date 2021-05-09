<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_deliveries', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');

            $table->bigInteger('delivery_type_id')->unsigned();
            $table->foreign('delivery_type_id')->references('id')->on('delivery_types');

            $table->timestamps();

            $table->unique(['order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
