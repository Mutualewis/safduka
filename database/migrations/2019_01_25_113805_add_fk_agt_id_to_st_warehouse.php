<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkAgtIdToStWarehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_warehouse_st', function (Blueprint $table) {
            $table->integer('agt_id')->unsigned()->nullable()->change();
        });
        Schema::table('stock_warehouse_st', function (Blueprint $table) {
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
        Schema::table('stock_warehouse_st', function (Blueprint $table) {
            //
        });
    }
}
