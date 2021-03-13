<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('uername');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->enum('type'  , ['employee' ,  'superadmin'] );
            $table->tinyInteger('active')->default(1)->comment('which this user allowd to login and use his account or not');
            $table->text('image')->nullable();
            $table->text('notes')->nullable();
            $table->integer('added_by')->nullable();
            $table->enum('added_by_type' , ['administration'  , 'merchant_owner' , 'employee' ] )->comment('who added this merchant Administration is the delvarina owners , merchant owner is the owner of the marktes , employee is the employee on the markte ');
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
        Schema::dropIfExists('merchants');
    }
}
