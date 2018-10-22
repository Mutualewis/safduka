<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentAgtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_agt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agtc_id')->unsigned();
            $table->string('agt_name');
            $table->string('agt_code');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

        Schema::create('agent_category_agtc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agtc_name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });

        Schema::table('agent_agt', function (Blueprint $table) {
            //
            $table->foreign('agtc_id')->references('id')->on('agent_category_agtc')->onDelete('restrict')->onUpdate('cascade');
        });
        Schema::table('booking_bkg', function (Blueprint $table) {
            //
            $table->integer('agt_id')->unsigned();
        });
        Schema::table('booking_bkg', function (Blueprint $table) {
            //
            $table->foreign('agt_id')->references('id')->on('agent_agt')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agent_agt');
    }
}
