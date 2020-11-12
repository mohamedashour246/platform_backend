<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->commnt('drvier name');
            $table->string('code');
            $table->string('phone');
            $table->string('username')->comment('driver username which uses it to login in');
            $table->string('password');
            $table->integer('admin_id');
            $table->integer('country_id');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('available')->default(1);
            $table->text('notes')->nullable();
            $table->text('image')->nullable();
            $table->time('working_start_time');
            $table->time('working_end_time');
            $table->integer('bounce');
            $table->string('car_number');
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
        Schema::dropIfExists('drivers');
    }
}
