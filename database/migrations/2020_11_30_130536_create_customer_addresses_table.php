<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->integer('governorate_id');
            $table->integer('city_id');
            $table->string('street_name');
            $table->integer('building_type_id');
            $table->string('floor_number')->nullable();
            $table->string('apratment_number')->nullable();
            $table->string('building_number')->nullable();
            $table->string('avenue_number')->nullable();
            $table->string('place_number')->nullable();
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
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
        Schema::dropIfExists('customer_addresses');
    }
}
