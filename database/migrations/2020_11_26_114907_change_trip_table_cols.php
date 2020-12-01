<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTripTableCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn('customer_type');
            $table->dropColumn('customer_address_id');
            $table->json('customer_address_details');
            $table->text('bill_image')->nullable();
            $table->text('order_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->enum('customer_type' , ['user'  , 'non_user']);
            $table->integer('customer_address_id');
            $table->dropColumn('customer_address_details');
            $table->dropColumn('bill_image');
            $table->dropColumn('order_image');
        });
    }
}
