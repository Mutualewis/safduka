<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_note_wn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wn_number')->nullable();            
            $table->integer('ctr_id')->nullable();
            $table->integer('cgrad_id')->nullable();
            $table->integer('bs_id')->nullable();
            $table->integer('ctr_id')->nullable();
            $table->integer('st_id')->nullable();
            $table->integer('pr_id')->nullable();
            $table->integer('pkg_id')->nullable();
            $table->integer('wn_packages')->nullable();
            $table->integer('wn_weight')->nullable();
            $table->integer('wb_id')->nullable();
            $table->integer('ws_id')->nullable();
            $table->integer('usr_id')->nullable();
            $table->string('wn_purpose')->nullable();            
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
        Schema::drop('weight_note_wn');
    }
}
