<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingItemsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('booking_items_bki', function (Blueprint $table) {
            $table->integer('bki_bags');
        });

    DB::statement("
    CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `ngeatpmfkdb`@`localhost` 
    SQL SECURITY DEFINER
VIEW `booking_items` AS
    SELECT 
        `bki`.`id` AS `id`,
        `bkg`.`id` AS `bkgid`,
        `bkg`.`bkg_ref_no` AS `ref_no`,
        `pty`.`pty_name` AS `pty_name`,
        `bki`.`bki_bags` AS `bags`
    FROM
        ((`booking_items_bki` `bki`
        LEFT JOIN `booking_bkg` `bkg` ON ((`bkg`.`id` = `bki`.`bkg_id`)))
        LEFT JOIN `parchment_type_pty` `pty` ON ((`pty`.`id` = `bki`.`pty_id`)))
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS booking_items');
    }
}
