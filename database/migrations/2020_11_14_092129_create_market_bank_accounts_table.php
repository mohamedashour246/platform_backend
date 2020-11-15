<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('market_id');
            $table->string('account_owner_name');
            $table->string('bank_account_number');
            $table->string('bank_name');
            $table->string('swift_code')->nullable();
            $table->string('notes')->nullable();
            $table->string('bank_address')->nullable();
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
        Schema::dropIfExists('market_bank_accounts');
    }
}
