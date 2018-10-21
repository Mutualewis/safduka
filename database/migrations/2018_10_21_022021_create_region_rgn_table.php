<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionRgnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('region_rgn', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable()->index('fk_region_rgn_country_ctr1_idx');
			$table->string('rgn_name', 45);
			$table->string('rgn_description', 45)->nullable();
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
		Schema::drop('region_rgn');
	}

}
