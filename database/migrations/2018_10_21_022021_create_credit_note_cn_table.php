<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreditNoteCnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_note_cn', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cn_number', 45)->nullable();
			$table->integer('cn_buyer')->nullable();
			$table->integer('cn_seller')->nullable();
			$table->string('cn_goods', 45)->nullable();
			$table->integer('cn_country')->nullable();
			$table->date('cn_date')->nullable();
			$table->integer('cn_weight')->nullable();
			$table->integer('cn_bags')->nullable();
			$table->decimal('cn_value', 18)->nullable();
			$table->integer('cn_confirmed_by')->nullable();
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
		Schema::drop('credit_note_cn');
	}

}
