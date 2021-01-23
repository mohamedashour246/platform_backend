<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('content_ar');
            $table->text('content_en');
            $table->integer('merchant_id');
            $table->tinyInteger('seen' )->comment('1 and 0 , 0 means not , 1 mean yes ');
            $table->tinyInteger('user_id')->comment('who send this notification to merchant');
            $table->enum('send_type'  , ['admin'  , 'merchant' ] );
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
        Schema::dropIfExists('merchant_notifications');
    }
}
