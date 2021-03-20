<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->date('receiver');
            $table->time('time_receiver');
            $table->date('sender');
            $table->time('time_sender');
            $table->Integer('merchant_id')->unsigned();
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->double('price');
            $table->string('payment_type');
            $table->string('    ');
            $table->string('name_en');
            $table->Integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->Integer('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');

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
        Schema::dropIfExists('order_services');
    }
}
