<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStMillStWrToPallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provisional_allocation_prall', function (Blueprint $table) {
            $table->integer('st_mill_id')->after('st_id')->nullable();
            $table->integer('st_wr_id')->after('st_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provisional_allocation_prall', function (Blueprint $table) {
            $table->dropColumn('st_mill_id');
            $table->dropColumn('st_wr_id');
        });
    }
}
