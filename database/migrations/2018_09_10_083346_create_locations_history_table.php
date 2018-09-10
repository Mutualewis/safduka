<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_locations_history_slh', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stid');
            $table->integer('prc_id')->nullable();
            $table->integer('st_dispatch_net')->nullable();
            $table->integer('st_gross')->nullable();
            $table->integer('st_moisture')->nullable();
            $table->string('pkg_name')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('bags')->nullable();
            $table->integer('pockets')->nullable();
            $table->string('location')->nullable();
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
        Schema::drop('stock_locations_history_slh');
    }
}
