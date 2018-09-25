<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_dp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('st_id')->nullable();
            $table->integer('sct_id')->nullable();
            $table->integer('csn_id')->nullable();
            $table->integer('ctr_id')->nullable();
            $table->integer('wb_id')->nullable();
            $table->string('dp_number')->nullable();            
            $table->integer('dp_confirmed_by')->nullable();
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
        Schema::drop('dispatch_dp');
    }
}
