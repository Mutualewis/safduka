<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSellerSlrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seller_slr', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('slr_id')->nullable();
			$table->integer('ctr_id')->nullable()->index('fk_marketing_agent_ma_country_ctr1_idx');
			$table->string('slr_name', 45);
			$table->string('slr_initials', 45)->nullable();
			$table->string('slr_att', 45)->nullable();
			$table->string('slr_description', 45)->nullable();
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
		Schema::drop('seller_slr');
	}

}
