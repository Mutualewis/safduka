<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement("
            SET FOREIGN_KEY_CHECKS=0;
            DROP TABLE IF EXISTS `dispatch_dp`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `dispatch_dp` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `wb_id` int(10) DEFAULT NULL,
              `dp_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
              `dp_confirmed_by` int(11) DEFAULT NULL,
              `created_at` timestamp NOT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `fk_wb_id_idx` (`wb_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            /*!40101 SET character_set_client = @saved_cs_client */;

            --
            -- Dumping data for table `dispatch_dp`
            --

            LOCK TABLES `dispatch_dp` WRITE;
            /*!40000 ALTER TABLE `dispatch_dp` DISABLE KEYS */;
            /*!40000 ALTER TABLE `dispatch_dp` ENABLE KEYS */;
            UNLOCK TABLES;

            --
            -- Table structure for table `material_mt`
            --

            DROP TABLE IF EXISTS `material_mt`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `material_mt` (
              `id` int(10) NOT NULL AUTO_INCREMENT,
              `mt_name` int(10) DEFAULT NULL,
              `mt_description` varchar(50) NOT NULL,
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            /*!40101 SET character_set_client = @saved_cs_client */;

            --
            -- Dumping data for table `material_mt`
            --

            LOCK TABLES `material_mt` WRITE;
            /*!40000 ALTER TABLE `material_mt` DISABLE KEYS */;
            /*!40000 ALTER TABLE `material_mt` ENABLE KEYS */;
            UNLOCK TABLES;

            --
            -- Table structure for table `stock_warehouse_st`
            --

            DROP TABLE IF EXISTS `stock_warehouse_st`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `stock_warehouse_st` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `season_id` int(11) DEFAULT NULL,
              `material_id` int(10) DEFAULT NULL,
              `grn_id` int(11) DEFAULT NULL,
              `dp_id` int(11) DEFAULT NULL,
              `st_outturn` varchar(45) DEFAULT NULL,
              `st_mark` varchar(255) DEFAULT NULL,
              `st_name` varchar(45) DEFAULT NULL,
              `sts_id` int(11) NOT NULL DEFAULT '1',
              `st_gross` int(11) DEFAULT NULL,
              `st_tare` decimal(18,2) DEFAULT NULL,
              `st_moisture` decimal(18,2) DEFAULT NULL,
              `st_dispatch_date` date DEFAULT NULL,
              `st_net_weight` int(11) DEFAULT NULL,
              `st_packages` int(11) DEFAULT NULL,
              `st_bags` int(11) DEFAULT NULL,
              `st_pockets` int(11) DEFAULT NULL,
              `pkg_id` int(11) DEFAULT NULL,
              `bs_id` int(10) DEFAULT NULL,
              `ibs_id` int(11) DEFAULT NULL,
              `usr_id` int(11) DEFAULT NULL,
              `st_ended_by` int(11) DEFAULT NULL,
              `st_quality_check` int(11) DEFAULT NULL,
              `st_rejected` varchar(45) DEFAULT NULL,
              `st_credited` int(11) DEFAULT NULL,
              `st_weight_check` int(11) DEFAULT NULL,
              `st_additional_processed` int(11) DEFAULT NULL,
              `st_partial_delivery` int(11) DEFAULT NULL,
              `st_disposed_by` int(11) DEFAULT NULL,
              `st_package_status` int(11) DEFAULT NULL,
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `fk_material_id_idx` (`material_id`),
              KEY `fk_grn_id_idx` (`grn_id`),
              KEY `fk_dispatch_id_idx` (`dp_id`),
              KEY `fk_season_id` (`season_id`),
              CONSTRAINT `fk_dispatch_id` FOREIGN KEY (`dp_id`) REFERENCES `dispatch_dp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_grn_id` FOREIGN KEY (`grn_id`) REFERENCES `grn_gr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_material_id` FOREIGN KEY (`material_id`) REFERENCES `material_mt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
              CONSTRAINT `fk_season_id` FOREIGN KEY (`season_id`) REFERENCES `coffee_seasons_csn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB AUTO_INCREMENT=9969 DEFAULT CHARSET=latin1;
            /*!40101 SET character_set_client = @saved_cs_client */;
            SET FOREIGN_KEY_CHECKS=1;
                
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dispatch_dp');
        Schema::drop('material_mt');
        Schema::drop('stock_warehouse_st');
    }
}


