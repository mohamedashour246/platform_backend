<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToBranchesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('branches', function (Blueprint $table) {
				$table->string('street_name');
				$table->integer('building_type_id');
				$table->string('floor_number')->nullable();
				$table->string('apratment_number')->nullable();
				$table->string('building_number')->nullable();
				$table->string('avenue_number')->nullable();
				$table->string('place_number')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('branches', function (Blueprint $table) {
				$table->dropColumn('street_name');
				$table->dropColumn('building_type_id');
				$table->dropColumn('floor_number');
				$table->dropColumn('apratment_number');
				$table->dropColumn('building_number');
				$table->dropColumn('avenue_number');
				$table->dropColumn('place_number');
			});
	}
}
