<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStIsBulkToStockMillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_mill_st', function (Blueprint $table) {
            $table->integer('st_is_bulk')->after('st_bulked_by')->nullable()->unsigned();
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
            $table->dropColumn('st_is_bulk');
        });
    }
}
