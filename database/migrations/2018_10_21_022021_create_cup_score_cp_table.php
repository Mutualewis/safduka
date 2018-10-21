<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCupScoreCpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cup_score_cp', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable()->index('fk_score_type_scrtyp_region_rgn2_idx');
			$table->string('cp_score', 45)->nullable();
			$table->string('cp_quality', 45)->nullable();
			$table->string('cp_qualification', 45)->nullable();
			$table->string('cp_description', 45)->nullable();
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
		Schema::drop('cup_score_cp');
	}

}
