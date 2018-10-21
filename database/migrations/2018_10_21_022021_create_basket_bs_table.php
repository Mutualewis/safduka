<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBasketBsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('basket_bs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable()->index('fk_score_type_bs_region_rgn1_idx');
			$table->string('bs_code', 45)->nullable();
			$table->string('bs_quality', 45)->nullable();
			$table->string('bs_description', 45)->nullable();
			$table->integer('bs_coffee_type')->default(1);
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
		Schema::drop('basket_bs');
	}

}
