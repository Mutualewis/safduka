<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCofeeClassTable extends Migration
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
        -- Table structure for table `coffee_class_cc`
        --

        DROP TABLE IF EXISTS `coffee_class_cc`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `coffee_class_cc` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `cc_name` varchar(50) NOT NULL,
        `cc_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `CLASS` (`cc_name`)
        ) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `coffee_class_cc`
        --

        LOCK TABLES `coffee_class_cc` WRITE;
        /*!40000 ALTER TABLE `coffee_class_cc` DISABLE KEYS */;
        INSERT INTO `coffee_class_cc` VALUES (1,'4/+','2016-08-12 13:02:24'),(2,'1+','2016-08-12 13:02:24'),(3,'1','2016-08-12 13:02:24'),(4,'1-','2016-08-12 13:02:24'),(5,'2+','2016-08-12 13:02:24'),(6,'2','2016-08-12 13:02:24'),(7,'2-','2016-08-12 13:02:24'),(8,'3+','2016-08-12 13:02:24'),(9,'3','2016-08-12 13:02:24'),(10,'3-','2016-08-12 13:02:24'),(11,'4+','2016-08-12 13:02:24'),(12,'4','2016-08-12 13:02:24'),(13,'4-','2016-08-12 13:02:24'),(14,'5+','2016-08-12 13:02:24'),(15,'5','2016-08-12 13:02:24'),(16,'5-','2016-08-12 13:02:24'),(17,'6+','2016-08-12 13:02:24'),(18,'6','2016-08-12 13:02:24'),(19,'6-','2016-08-12 13:02:24'),(20,'7+','2016-08-12 13:02:24'),(21,'7','2016-08-12 13:02:24'),(22,'7-','2016-08-12 13:02:24'),(23,'8+','2016-08-12 13:02:24'),(24,'8','2016-08-12 13:02:24'),(25,'8-','2016-08-12 13:02:24'),(26,'9+','2016-08-12 13:02:24'),(27,'9','2016-08-12 13:02:24'),(28,'9-','2016-08-12 13:02:24'),(29,'10+','2016-08-12 13:02:24'),(30,'10','2016-08-12 13:02:24'),(31,'10-','2016-08-12 13:02:24'),(32,'11+','2016-08-12 13:02:24'),(33,'11','2016-08-12 13:02:24'),(34,'11-','2016-08-12 13:02:24'),(35,'4/+','2016-08-12 13:02:24'),(36,'4/+','2016-08-12 13:02:24'),(37,'7/+','2016-08-12 13:02:24'),(38,'5/+','2016-08-12 13:02:24'),(64,'M1','2016-08-12 13:07:22'),(65,'M2/+','2016-08-12 13:07:22'),(66,'M1-','2016-08-12 13:07:22'),(67,'M1+','2017-03-15 12:58:29');
        /*!40000 ALTER TABLE `coffee_class_cc` ENABLE KEYS */;
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
        Schema::drop('coffee_class_cc');
    }
}
