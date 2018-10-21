<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualityParametersQpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quality_parameters_qp', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('qg_id')->nullable()->index('QualityGroup_Fk_idx');
			$table->string('qp_parameter', 45)->nullable();
			$table->string('qp_description', 45)->nullable();
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
		Schema::drop('quality_parameters_qp');
	}

}
