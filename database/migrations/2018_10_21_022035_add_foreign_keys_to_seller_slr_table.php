<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSellerSlrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seller_slr', function(Blueprint $table)
		{
			$table->foreign('ctr_id', 'fk_marketing_agent_ma_country_ctr1')->references('id')->on('country_ctr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('seller_slr', function(Blueprint $table)
		{
			$table->dropForeign('fk_marketing_agent_ma_country_ctr1');
		});
	}

}
