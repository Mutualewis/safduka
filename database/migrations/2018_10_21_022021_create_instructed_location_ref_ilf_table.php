<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstructedLocationRefIlfTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructed_location_ref_ilf', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ilf_number', 45)->nullable();
			$table->string('ilf_reason')->nullable();
			$table->integer('mit_id')->nullable();
			$table->integer('confirmed_by')->nullable();
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
		Schema::drop('instructed_location_ref_ilf');
	}

}
