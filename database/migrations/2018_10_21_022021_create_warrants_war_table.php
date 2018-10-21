<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWarrantsWarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warrants_war', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('war_no', 45)->nullable();
			$table->date('war_date')->nullable();
			$table->integer('war_weight')->nullable();
			$table->string('war_confirmedby', 45)->nullable();
			$table->string('war_comments', 45)->nullable();
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
		Schema::drop('warrants_war');
	}

}
