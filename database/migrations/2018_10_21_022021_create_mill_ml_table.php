<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMillMlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mill_ml', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('rgn_id')->nullable()->index('fk_warehouse_ml_region_rgn1_idx');
			$table->string('ml_name', 45);
			$table->string('ml_initials', 45)->nullable();
			$table->string('ml_description', 45)->nullable();
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
		Schema::drop('mill_ml');
	}

}
