<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbkResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        DROP TABLE IF EXISTS `provisional_bulk_results_pbrts`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `provisional_bulk_results_pbrts` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `pr_id` int(11) DEFAULT NULL,
          `st_wr_id` int(11) DEFAULT NULL,
          `cfd_id` int(11) DEFAULT NULL,
          `prt_id` int(11) DEFAULT NULL,
          `prts_weight` int(11) DEFAULT NULL,
          `prts_packages` int(11) DEFAULT NULL,
          `cgrad_id` int(11) DEFAULT NULL,
          `bs_id` int(11) DEFAULT NULL,
          `wr_id` int(11) DEFAULT NULL,
          `loc_row` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
          `loc_column` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
          `btc_zone` int(11) DEFAULT NULL,
          `prts_return_to_stock` int(11) DEFAULT NULL,
          `cp_id` int(11) DEFAULT NULL,
          `sqltyd_acidity` decimal(18,2) DEFAULT NULL,
          `sqltyd_body` decimal(18,2) DEFAULT NULL,
          `sqltyd_flavour` decimal(18,2) DEFAULT NULL,
          `sqltyd_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`),
          KEY `st_idx` (`st_wr_id`),
          CONSTRAINT `st_wr_idx` FOREIGN KEY (`st_wr_id`) REFERENCES `stock_warehouse_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;
        
        --
        -- Dumping data for table `provisional_bulk_results_pbrts`
        --
        
        LOCK TABLES `provisional_bulk_results_pbrts` WRITE;
        /*!40000 ALTER TABLE `provisional_bulk_results_pbrts` DISABLE KEYS */;
        /*!40000 ALTER TABLE `provisional_bulk_results_pbrts` ENABLE KEYS */;
        UNLOCK TABLES;
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

