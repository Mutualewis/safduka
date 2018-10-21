<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualityAnalysisTypeQatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quality_analysis_type_qat', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('qat_name', 45)->nullable();
			$table->string('qat_description', 45)->nullable();
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
		Schema::drop('quality_analysis_type_qat');
	}

}
