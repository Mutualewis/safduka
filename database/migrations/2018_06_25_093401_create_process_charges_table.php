<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_charges_prcgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prcgs_instruction_no')->nullable()->unique();
            $table->integer('prcgs_rate_id');
            $table->integer('prcgs_service')->nullable();
            $table->double('prcgs_rate');
            $table->double('prcgs_total');
            $table->integer('prcgs_team_id');
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
       // Schema::drop('process_charges_prcgs');
    }
}
