<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountryCtrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country_ctr', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ctr_name', 45);
			$table->string('ctr_initial', 45)->nullable();
			$table->integer('ctr_is_active')->nullable();
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
		Schema::drop('country_ctr');
	}

}
