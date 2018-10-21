<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthsMthTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('months_mth', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('mth_name', 45)->nullable();
			$table->integer('mth_trading')->nullable();
			$table->integer('mth_number')->nullable();
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
		Schema::drop('months_mth');
	}

}
