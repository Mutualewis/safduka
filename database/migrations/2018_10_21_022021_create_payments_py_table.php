<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsPyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments_py', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('py_no')->nullable();
			$table->date('py_date')->nullable();
			$table->decimal('py_amount', 18)->nullable();
			$table->integer('py_confirmedby')->nullable();
			$table->timestamps();
			$table->index(['py_confirmedby','py_no'], 'indeces');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payments_py');
	}

}
