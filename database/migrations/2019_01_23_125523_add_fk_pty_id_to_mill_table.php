<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkPtyIdToMillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_mill_st', function (Blueprint $table) {
            $table->integer('pty_id')->unsigned()->nullable()->change();
           
        });
        Schema::table('stock_mill_st', function (Blueprint $table) {
            
            $table->foreign('pty_id')->references('id')->on('parchment_type_pty')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_mill_st', function (Blueprint $table) {
            $table->integer('pty_id', 11)->change();
            
        });
    }
}
