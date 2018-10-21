<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoffeeBuyersCbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffee_buyers_cb', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bt_id')->nullable()->index('index2');
			$table->string('cb_name', 50);
			$table->string('cb_code', 50);
			$table->string('cb_email')->nullable();
			$table->timestamp('cb_date_added')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coffee_buyers_cb');
	}

}
