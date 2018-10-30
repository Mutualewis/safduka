<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeliveryItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            DROP TABLE IF EXISTS `delivery_items_dit`;
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `delivery_items_dit` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `cgr_id` int(11) DEFAULT NULL,
              `agt_id` int(11) DEFAULT NULL,
              `cl_id` int(11) DEFAULT NULL,
              `it_id` int(11) DEFAULT NULL,
              `wbi_id` int(11) DEFAULT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
        Schema::drop('delivery_items_dit');
    }
}
