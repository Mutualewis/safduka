<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleableStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        DROP TABLE IF EXISTS `salable_status_selst`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `salable_status_selst` (
            `id` tinyint(5) NOT NULL AUTO_INCREMENT,
            `selst_name` varchar(50) NOT NULL,
            `selt_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            KEY `ID` (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `salable_status_selst`
        --

        LOCK TABLES `salable_status_selst` WRITE;
        /*!40000 ALTER TABLE `salable_status_selst` DISABLE KEYS */;
        INSERT INTO `salable_status_selst` VALUES (1,'Sellable','2016-08-18 04:40:52'),(2,'Not Sellable','2016-08-18 04:40:52');
        /*!40000 ALTER TABLE `salable_status_selst` ENABLE KEYS */;
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
        Schema::drop('salable_status_selst');
    }
}
