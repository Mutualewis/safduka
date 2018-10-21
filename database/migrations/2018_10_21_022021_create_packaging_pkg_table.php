<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackagingPkgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('packaging_pkg', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('pkg_name', 45)->nullable();
			$table->string('pkg_description', 45)->nullable();
			$table->decimal('pkg_weight', 18)->nullable();
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
		Schema::drop('packaging_pkg');
	}

}
