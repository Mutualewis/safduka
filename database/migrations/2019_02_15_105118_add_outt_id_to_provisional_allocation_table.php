<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOuttIdToProvisionalAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provisional_allocation_prall', function (Blueprint $table) {
            $table->integer('outt_id')->unsigned()->after('st_mill_id')->nullable();
        });
        Schema::table('process_results_prts', function (Blueprint $table) {
            $table->integer('outt_id')->unsigned()->after('st_mill_id')->nullable();
        });
        Schema::table('process_allocations_pall', function (Blueprint $table) {
            $table->integer('outt_id')->unsigned()->after('st_mill_id')->nullable();
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
            $table->dropColumn('outt_id');
        });
        Schema::table('process_results_prts', function (Blueprint $table) {
            $table->dropColumn('outt_id');
        });
        Schema::table('process_allocations_pall', function (Blueprint $table) {
            $table->dropColumn('outt_id');
        });
    }
}
