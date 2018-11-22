<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMillingStatusMstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        --
        -- Table structure for table `milling_status_mst`
        --
        
        DROP TABLE IF EXISTS `milling_status_mst`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `milling_status_mst` (
          `id` tinyint(5) NOT NULL AUTO_INCREMENT,
          `mst_name` varchar(50) NOT NULL,
          `mst_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
        /*!40101 SET character_set_client = @saved_cs_client */;
        
        --
        -- Dumping data for table `milling_status_mst`
        --
        
        LOCK TABLES `milling_status_mst` WRITE;
        /*!40000 ALTER TABLE `milling_status_mst` DISABLE KEYS */;
        INSERT INTO `milling_status_mst` VALUES (1,'Unmilled','2016-08-12 07:11:40'),(2,'Milled','2016-08-12 07:11:40');
        /*!40000 ALTER TABLE `milling_status_mst` ENABLE KEYS */;
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
        Schema::drop('milling_status_mst');
    }
}
