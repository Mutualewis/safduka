<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingView01 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
    DB::statement("
    CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `ngeatpmfkdb`@`localhost` 
    SQL SECURITY DEFINER
VIEW `ngea_db`.`booking` AS
    SELECT 
        `bkg`.`id` AS `id`,
        `bkg`.`bkg_ref_no` AS `ref_no`,
        RIGHT(`bkg`.`bkg_ref_no`, 7) AS `previous_no`,
        `cgr`.`cgr_grower` AS `cgr_grower`,
        `cgr`.`cgr_code` AS `cgr_code`,
        `cgr`.`cgr_mark` AS `cgr_mark`,
        `agt`.`id` AS `agtid`,
        `agt`.`agt_name` AS `agt_name`,
        `bkg`.`bkg_delivery_date` AS `delivery_date`
    FROM
        ((`ngea_db`.`booking_bkg` `bkg`
        LEFT JOIN `ngea_db`.`coffee_growers_cgr` `cgr` ON ((`cgr`.`id` = `bkg`.`cgr_id`)))
        LEFT JOIN `ngea_db`.`agent_agt` `agt` ON ((`agt`.`id` = `bkg`.`agt_id`)))
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS booking');
    }
}
