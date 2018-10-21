<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountyCntTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('county_cnt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->index('CountryID');
			$table->string('cnt_name', 100);
			$table->integer('rgn_id')->index('RegionID');
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
		Schema::drop('county_cnt');
	}

}
