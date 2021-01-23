<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->integer('driver_id');
            $table->integer('admin_id');
            $table->text('image');
            $table->integer('bill_type_id');
            $table->text('comment')->nullable();
            $table->string('price');
            $table->tinyInteger('status')->default(0)->comment('0 mean waiting , 1 accpted  , 2 refused');
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
        Schema::dropIfExists('bills');
    }
}
