<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQualtyDetailsQltydTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('qualty_details_qltyd', function(Blueprint $table)
		{
			$table->foreign('cfd_id', 'fk_qualty_details_qltyd_coffee_details_cfd1')->references('id')->on('coffee_details_cfd')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('prcss_id', 'fk_qualty_details_qltyd_processing_prcss1')->references('id')->on('processing_prcss')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('scr_id', 'fk_qualty_details_qltyd_quality_remarks_qrmk1')->references('id')->on('screens_scr')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('cp_id', 'fk_qualty_details_qltyd_score_type_scrtyp1')->references('id')->on('cup_score_comments_cpc')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('rw_id', 'fk_qualty_details_qltyd_score_type_scrtyp2')->references('id')->on('raw_score_rw')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('qualty_details_qltyd', function(Blueprint $table)
		{
			$table->dropForeign('fk_qualty_details_qltyd_coffee_details_cfd1');
			$table->dropForeign('fk_qualty_details_qltyd_processing_prcss1');
			$table->dropForeign('fk_qualty_details_qltyd_quality_remarks_qrmk1');
			$table->dropForeign('fk_qualty_details_qltyd_score_type_scrtyp1');
			$table->dropForeign('fk_qualty_details_qltyd_score_type_scrtyp2');
		});
	}

}
