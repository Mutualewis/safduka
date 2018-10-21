<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBasketBsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('basket_bs', function(Blueprint $table)
		{
			$table->foreign('ctr_id', 'fk_score_type_bs_region_rgn1')->references('id')->on('country_ctr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('basket_bs', function(Blueprint $table)
		{
			$table->dropForeign('fk_score_type_bs_region_rgn1');
		});
	}

}
