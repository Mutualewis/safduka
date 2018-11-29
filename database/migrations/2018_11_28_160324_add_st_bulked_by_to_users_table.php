<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStBulkedByToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_mill_st', function (Blueprint $table) {
            //
            //$table->integer('st_bulked_by')->nullable();
        
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
          //  $table->dropColumn('st_bulked_by');
        });
    }
}
