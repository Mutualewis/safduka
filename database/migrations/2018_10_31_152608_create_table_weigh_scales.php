<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWeighScales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            DROP TABLE IF EXISTS `weight_note_wn`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `weight_note_wn` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `wn_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
              `ctr_id` int(11) DEFAULT NULL,
              `cgrad_id` int(11) DEFAULT NULL,
              `bs_id` int(11) DEFAULT NULL,
              `st_id` int(11) DEFAULT NULL,
              `pr_id` int(11) DEFAULT NULL,
              `pkg_id` int(11) DEFAULT NULL,
              `wn_packages` int(11) DEFAULT NULL,
              `wn_weight` int(11) DEFAULT NULL,
              `wb_id` int(11) DEFAULT NULL,
              `ws_id` int(11) DEFAULT NULL,
              `usr_id` int(11) DEFAULT NULL,
              `wn_purpose` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            /*!40101 SET character_set_client = @saved_cs_client */;

            DROP TABLE IF EXISTS `weight_scales_ws`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `weight_scales_ws` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `agt_id` int(11) DEFAULT NULL,
              `ws_station` varchar(45) DEFAULT NULL,
              `ws_equipment_number` varchar(45) DEFAULT NULL,
              `ws_baud_rate` int(11) DEFAULT NULL,
              `ws_parity` int(11) DEFAULT NULL,
              `ws_stop_bits` int(11) DEFAULT NULL,
              `ws_data_bits` int(11) DEFAULT NULL,
              `ws_port_name` varchar(45) DEFAULT NULL,
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
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
        Schema::drop('weight_note_wn');
        Schema::drop('weight_scales_ws');
    }
}
