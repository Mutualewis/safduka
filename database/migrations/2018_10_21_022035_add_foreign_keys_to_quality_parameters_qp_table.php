<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQualityParametersQpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quality_parameters_qp', function(Blueprint $table)
		{
			$table->foreign('qg_id', 'QualityGroup_Fk')->references('id')->on('quality_groups_qg')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quality_parameters_qp', function(Blueprint $table)
		{
			$table->dropForeign('QualityGroup_Fk');
		});
	}

}
