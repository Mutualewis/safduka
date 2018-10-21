<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRawScoreRwTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('raw_score_rw', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ctr_id')->nullable()->index('fk_score_type_scrt_region_rgn1_idx');
			$table->string('rw_score', 45)->nullable();
			$table->string('rw_quality', 45)->nullable();
			$table->string('rw_qualification', 45)->nullable();
			$table->string('rw_description', 45)->nullable();
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
		Schema::drop('raw_score_rw');
	}

}
