<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('admin_id');
            $table->integer('market_id');
            $table->integer('branch_id');
            $table->integer('driver_id');
            $table->string('order_price')->nullable();
            $table->string('delivery_price')->nullable();
            $table->integer('payment_method_id');
            $table->dateTime('delivery_date_to_customer')->comment('Delivery date to the customer');
            $table->dateTime('receipt_date_from_market')->comment('The date of receipt from the store');
            $table->text('notes')->nullable();
            $table->tinyInteger('seen')->default(0)->comment('0 means did not seen yet , 1 mean seen indeed');
            $table->tinyInteger('paid')->default(0)->comment('0 means not paid  , 1 means paid indeed');
            $table->integer('status_id');
            $table->integer('error_id');
            $table->enum('customer_type' , ['user'  , 'non_user']);
            $table->integer('customer_address_id');
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
        Schema::dropIfExists('trips');
    }
}
