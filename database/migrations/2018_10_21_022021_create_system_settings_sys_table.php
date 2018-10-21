<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemSettingsSysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_settings_sys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sys_name', 25);
			$table->string('sys_code');
			$table->integer('sys_active')->default(0);
			$table->integer('sys_inv')->default(0);
			$table->integer('sys_py')->default(0);
			$table->integer('sys_bric')->default(0);
			$table->integer('sys_pref')->default(0);
			$table->integer('sys_war')->default(0);
			$table->integer('sys_bs')->default(0);
			$table->integer('sys_process_open')->default(0);
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
		Schema::drop('system_settings_sys');
	}

}
