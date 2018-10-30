<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        DROP TABLE IF EXISTS `outturn_quality_oqlty`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `outturn_quality_oqlty` (
          `id` int(15) NOT NULL AUTO_INCREMENT,
          `qtyp_id` tinyint(5) NOT NULL COMMENT 'qtyp_id ',
          `oqlty_outturn_id` int(50) DEFAULT NULL,
          `cc_id` int(10) DEFAULT NULL,
          `ct_id` tinyint(5) DEFAULT NULL,
          `oqlty_moisture` decimal(4,1) DEFAULT NULL,
          `oqlty_milling_loss` decimal(4,1) DEFAULT NULL,
          `oqlty_remarks` varchar(255) DEFAULT NULL,
          `oqlty_aqr_serial` varchar(50) DEFAULT NULL,
          `oqlty_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`)
          
        ) ENGINE=InnoDB AUTO_INCREMENT=6235 DEFAULT CHARSET=utf8;
        /*!40101 SET character_set_client = @saved_cs_client */;


        DROP TABLE IF EXISTS `analysis_categories_acat`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `analysis_categories_acat` (
          `id` tinyint(5) NOT NULL AUTO_INCREMENT,
          `acat_name` varchar(50) DEFAULT NULL,
          `acat_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `analysis_categories_acat`
        --

        LOCK TABLES `analysis_categories_acat` WRITE;
        /*!40000 ALTER TABLE `analysis_categories_acat` DISABLE KEYS */;
        INSERT INTO `analysis_categories_acat` VALUES (1,'SC18(AA,TT,E) percentage','2016-08-12 13:36:22'),(2,'SC16(AB,TT,B) percentage','2016-08-12 13:36:22'),(3,'SC14(C,T,B) percentage','2016-08-12 13:36:22'),(4,'(T,HE,SB) percentage','2016-08-12 13:36:22'),(5,'Mbuni percentage','2016-08-12 13:36:22'),(6,'SC18(AA,TT,E) class','2016-08-12 13:36:22'),(7,'SC16(AB,TT,B) class','2016-08-12 13:36:22'),(8,'SC14(C,T,B) class','2016-08-12 13:36:22'),(9,'(T,HE,SB) class','2016-08-12 13:36:22'),(10,'Mbuni class','2016-08-12 13:36:22');
        /*!40000 ALTER TABLE `analysis_categories_acat` ENABLE KEYS */;
        UNLOCK TABLES;

        DROP TABLE IF EXISTS `quality_analysis_qanl`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `quality_analysis_qanl` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `acat_id` tinyint(5) DEFAULT NULL,
          `oqlty_id` int(15) DEFAULT NULL,
          `qanl_value` varchar(50) DEFAULT NULL,
          `qanl_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`)
        
        ) ENGINE=InnoDB AUTO_INCREMENT=62464 DEFAULT CHARSET=utf8;
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
        Schema::drop('quality_analysis_qanl');
        Schema::drop('analysis_categories_acat');
        Schema::drop('outturn_quality_oqlty');
    }
}
