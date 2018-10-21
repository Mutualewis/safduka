<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrowerTypeGtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grower_type_gt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('gt_name', 45)->nullable();
			$table->string('gt_description')->nullable();
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
		Schema::drop('grower_type_gt');
	}

}
