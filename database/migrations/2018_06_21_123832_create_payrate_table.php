<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates_rts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prc_id')->nullable();
            $table->integer('task')->nullable();
            $table->double('rate');
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
        Schema::drop('rates_rts');
    }
}
