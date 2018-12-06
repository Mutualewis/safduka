<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulkColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_warehouse_st', function (Blueprint $table) {
            $table->integer('st_bulked_by')->after('st_ended_by')->nullable()->unsigned();
            $table->integer('st_bulk_id')->after('st_bulked_by')->nullable()->unsigned();
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
        Schema::table('stock_warehouse_st', function (Blueprint $table) {
            $table->dropColumn('st_bulk_id');
            $table->dropColumn('st_bulked_by');
            $table->dropColumn('st_is_bulk');
        });
    }
}
