<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoopersCapacityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoopers_capacity_hp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hp_capacity')->nullable();
            $table->string('hp_description')->nullable();            
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
        Schema::drop('hoopers_capacity_hp');
    }
}
