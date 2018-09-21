<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterChangeColumnTypesToProcessChargesPrcgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('process_charges_prcgs', function (Blueprint $table) {
            //
            $table->string('prcgs_service', 75)->change();
            $table->decimal('prcgs_rate', 8,2)->change();
            $table->decimal('prcgs_total', 8, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('process_charges_prcgs', function (Blueprint $table) {
            //
        });
    }
}
