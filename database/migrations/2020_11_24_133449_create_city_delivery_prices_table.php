<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityDeliveryPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_delivery_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('from_city');
            $table->integer('to_city');
            $table->double('price' , 8 , 2);
            $table->integer('admin_id');
            $table->integer('market_id')->nullable();
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
        Schema::dropIfExists('city_delivery_prices');
    }
}
