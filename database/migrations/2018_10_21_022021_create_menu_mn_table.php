<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuMnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_mn', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('mn_name', 45);
			$table->string('mn_description')->nullable();
			$table->string('mn_url', 100);
			$table->integer('mn_level');
			$table->integer('mn_parent')->nullable();
			$table->string('mn_icon', 45)->nullable();
			$table->integer('mn_order');
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
		Schema::drop('menu_mn');
	}

}
