<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoffeeCertificationCcrtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coffee_certification_ccrt', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cfd_id')->nullable()->index('cfd_id');
			$table->integer('crt_id')->nullable()->index('crt_id');
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
		Schema::drop('coffee_certification_ccrt');
	}

}
