<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wr_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wr_id')->nullable();
            $table->double('storage_rate')->nullable();
            $table->double('handling_bag_rate')->nullable();
            $table->double('warrant_rate')->nullable();
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
        Schema::drop('wr_rates');
    }
}
