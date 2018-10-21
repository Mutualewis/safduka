<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoffeeGradeCgradTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffee_grade_cgrad', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('ctr_id')->nullable();
			$table->string('cgrad_name', 50)->index('Grade');
			$table->timestamp('cgrad_date_added')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coffee_grade_cgrad');
	}

}
