<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualtyDetailsQltydTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualty_details_qltyd', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cfd_id')->nullable()->index('fk_qualty_details_qltyd_coffee_details_cfd1_idx');
			$table->integer('prcss_id')->nullable()->index('fk_qualty_details_qltyd_processing_prcss1_idx');
			$table->integer('qltyd_prcss_value')->nullable();
			$table->integer('scr_id')->nullable()->index('fk_qualty_details_qltyd_screen_prcss1_idx');
			$table->integer('qltyd_scr_value')->nullable();
			$table->integer('cp_id')->nullable()->index('fk_qualty_details_qltyd_score_type_scrtyp1_idx');
			$table->integer('cps_id')->nullable();
			$table->integer('rw_id')->nullable()->index('fk_qualty_details_qltyd_score_type_scrtyp2_idx');
			$table->decimal('qltyd_acidity', 18)->nullable();
			$table->decimal('qltyd_body', 18)->nullable();
			$table->decimal('qltyd_flavour', 18)->nullable();
			$table->string('qltyd_comments')->nullable();
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
		Schema::drop('qualty_details_qltyd');
	}

}
