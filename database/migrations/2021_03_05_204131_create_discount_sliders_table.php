<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('image');
            $table->string('expire');
            $table->string('barcode')->nullable();
            $table->integer('count_use');
            $table->string('repeatation');
            $table->string('free_shipping')->nullable();
            $table->integer('value_discount');
            $table->string('discount_type');
            $table->integer('min_cost');
            $table->string('status_slider');
            $table->string('current_status');
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
        Schema::dropIfExists('discount_sliders');
    }
}
