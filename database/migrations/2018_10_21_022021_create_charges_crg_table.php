<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChargesCrgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('charges_crg', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('prc_id')->nullable();
			$table->integer('chty_id')->nullable();
			$table->integer('crg_amount')->nullable();
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
		Schema::drop('charges_crg');
	}

}
