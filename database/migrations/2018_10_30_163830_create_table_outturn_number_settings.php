<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOutturnNumberSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            DROP TABLE IF EXISTS `outturn_number_settings_ons`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `outturn_number_settings_ons` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `it_id` int(10) DEFAULT NULL,
              `ons_transactin_type` varchar(45) DEFAULT NULL,
              `ons_item_phase` varchar(45) DEFAULT NULL,
              `ons_prefix` int(11) DEFAULT NULL,
              `ons_padding_character` int(11) DEFAULT NULL,
              `ons_length` int(11) DEFAULT NULL,
              `ons_previous_week` varchar(45) DEFAULT NULL,
              `ons_previous_number` varchar(45) DEFAULT NULL,
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
            /*!40101 SET character_set_client = @saved_cs_client */;
        ");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('outturn_number_settings_ons');
    }
}
