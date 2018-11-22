<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameWeighbridgeInfoColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::table('weighbridge_info_wbi', function (Blueprint $table) {
            $table->renameColumn('wb_ticket', 'wbi_ticket' );
            $table->renameColumn('wb_vehicle_plate', 'wbi_vehicle_plate');
            $table->renameColumn('wb_weight_in', 'wbi_weight_in');
            $table->renameColumn('wb_weight_out', 'wbi_weight_out');
            $table->renameColumn('wb_delivery_number', 'wbi_delivery_number');
            $table->renameColumn('wb_confirmedby', 'wbi_confirmedby');
            $table->renameColumn('wb_time_in', 'wbi_time_in');
            $table->renameColumn('wb_time_out', 'wbi_time_out');
            $table->renameColumn('wb_movement_permit', 'wbi_movement_permit');
            $table->renameColumn('wb_driver_name', 'wbi_driver_name');
            $table->renameColumn('wb_driver_id', 'wbi_driver_id');
            $table->renameColumn('wb_dispatch_date', 'wbi_dispatch_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weighbridge_info_wbi', function (Blueprint $table) {
            $table->renameColumn('wbi_ticket', 'wb_ticket' );
            $table->renameColumn('wbi_vehicle_plate', 'wb_vehicle_plate');
            $table->renameColumn('wbi_weight_in', 'wb_weight_in');
            $table->renameColumn('wbi_weight_out', 'wb_weight_out');
            $table->renameColumn('wbi_date', 'wb_date');
            $table->renameColumn('wbi_confirmedby', 'wb_confirmedby');
            $table->renameColumn('wbi_time_in', 'wb_time_in');
            $table->renameColumn('wbi_time_out', 'wb_time_out');
            $table->renameColumn('wbi_movement_permit', 'wb_movement_permit');
            $table->renameColumn('wbi_driver_name', 'wb_driver_name');
            $table->renameColumn('wbi_driver_id', 'wb_driver_id');
            $table->renameColumn('wbi_dispatch_date', 'wb_dispatch_date');
        });
    }
}
