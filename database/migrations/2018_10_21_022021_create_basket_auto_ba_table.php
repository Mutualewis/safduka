<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBasketAutoBaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('basket_auto_ba', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cp_id', 45)->nullable();
			$table->string('cgrad_id', 45)->nullable();
			$table->string('bs_id', 45)->nullable();
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
		Schema::drop('basket_auto_ba');
	}

}
