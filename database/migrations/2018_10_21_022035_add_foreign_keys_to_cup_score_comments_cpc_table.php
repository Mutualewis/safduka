<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCupScoreCommentsCpcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cup_score_comments_cpc', function(Blueprint $table)
		{
			$table->foreign('ctr_id', 'fk_score_type_scrtyp_region_rgn1')->references('id')->on('country_ctr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cup_score_comments_cpc', function(Blueprint $table)
		{
			$table->dropForeign('fk_score_type_scrtyp_region_rgn1');
		});
	}

}
