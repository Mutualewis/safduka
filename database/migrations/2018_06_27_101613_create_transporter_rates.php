<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransporterRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trp_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wr_id')->nullable();
            $table->integer('trp_id')->nullable();
            $table->double('rate')->nullable();
            $table->dateTime('date_ended')->nullable();
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
        Schema::drop('trp_rates');
    }
}
