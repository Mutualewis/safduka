<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRegionRgnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('region_rgn', function(Blueprint $table)
		{
			$table->foreign('ctr_id', 'fk_region_rgn_country_ctr1')->references('id')->on('country_ctr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('region_rgn', function(Blueprint $table)
		{
			$table->dropForeign('fk_region_rgn_country_ctr1');
		});
	}

}
