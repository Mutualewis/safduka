<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMilledByToStockMillStTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_mill_st', function (Blueprint $table) {
            $table->integer('milling_confirmed_by')->after('st_ended_by')->nullable();
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
            $table->dropColumn('milling_confirmed_by');
        });
    }
}
