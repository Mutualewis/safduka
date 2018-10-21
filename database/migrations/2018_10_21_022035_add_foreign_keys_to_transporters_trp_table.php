<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransportersTrpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transporters_trp', function(Blueprint $table)
		{
			$table->foreign('ctr_id', 'fk_trp_country_rgn1')->references('id')->on('country_ctr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transporters_trp', function(Blueprint $table)
		{
			$table->dropForeign('fk_trp_country_rgn1');
		});
	}

}
