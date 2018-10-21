<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrowersTransferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('growers_transfer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cg_id', 45)->nullable();
			$table->string('cb_id', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('growers_transfer');
	}

}
