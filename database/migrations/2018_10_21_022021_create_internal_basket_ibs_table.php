<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInternalBasketIbsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('internal_basket_ibs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable();
			$table->string('ibs_code', 45)->nullable();
			$table->string('ibs_quality', 45)->nullable();
			$table->string('ibs_description', 45)->nullable();
			$table->integer('ibs_coffee_type')->default(1);
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
		Schema::drop('internal_basket_ibs');
	}

}
