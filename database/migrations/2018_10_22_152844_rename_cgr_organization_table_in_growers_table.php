<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCgrOrganizationTableInGrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coffee_growers_cgr', function (Blueprint $table) {
            $table->renameColumn('cgr_organisation', 'cgr_organization');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coffee_growers_cgr', function (Blueprint $table) {
            $table->renameColumn('cgr_organization', 'cgr_organisation');
        });
    }
}
