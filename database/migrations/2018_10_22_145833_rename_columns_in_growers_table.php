<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsInGrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coffee_growers_cg', function (Blueprint $table) {
            $table->renameColumn('cg_name', 'cgr_grower');
            $table->renameColumn('cg_organisation', 'cgr_organisation');
            $table->renameColumn('cg_code', 'cgr_code');
            $table->renameColumn('cg_mark', 'cgr_mark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coffee_growers_cg', function (Blueprint $table) {
            $table->renameColumn('cgr_grower', 'cg_name' );
            $table->renameColumn('cgr_organisation', 'cg_organisation');
            $table->renameColumn('cgr_code', 'cg_code');
            $table->renameColumn('cgr_mark', 'cg_mark');
        });
    }
}
