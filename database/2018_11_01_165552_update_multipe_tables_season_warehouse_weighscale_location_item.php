<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMultipeTablesSeasonWarehouseWeighscaleLocationItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            DROP TABLE IF EXISTS `coffee_seasons_csn`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `coffee_seasons_csn` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `csn_season` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
              `csn_active` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            /*!40101 SET character_set_client = @saved_cs_client */;


            DROP TABLE IF EXISTS `items_it`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `items_it` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `it_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            /*!40101 SET character_set_client = @saved_cs_client */;


            DROP TABLE IF EXISTS `location_loc`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `location_loc` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `agt_id` int(11) DEFAULT NULL,
              `loc_row` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
              `loc_column` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
              `loc_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            /*!40101 SET character_set_client = @saved_cs_client */;

            DROP TABLE IF EXISTS `warehouse_wr`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `warehouse_wr` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `rgn_id` int(11) DEFAULT NULL,
              `wrt_id` int(11) DEFAULT NULL,
              `wr_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
              `wr_initials` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
              `wr_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
              `wr_attention` varchar(75) CHARACTER SET utf8 DEFAULT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `fk_warehouse_wr_region_rgn1_idx` (`rgn_id`),
              CONSTRAINT `fk_warehouse_wr_region_rgn1` FOREIGN KEY (`rgn_id`) REFERENCES `region_rgn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
        //
    }
}
