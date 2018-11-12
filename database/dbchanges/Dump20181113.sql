-- MySQL dump 10.13  Distrib 5.7.20-19, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: ngea_db
-- ------------------------------------------------------
-- Server version	5.7.20-19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 11:38:30','2018-10-30 11:38:30'),(2,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 11:38:56','2018-10-30 11:38:56'),(3,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 11:39:53','2018-10-30 11:39:53'),(4,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 12:56:44','2018-10-30 12:56:44'),(5,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 12:57:43','2018-10-30 12:57:43'),(6,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 12:58:21','2018-10-30 12:58:21'),(7,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 12:58:33','2018-10-30 12:58:33'),(8,1,'Updated weighbridge information with ticket no. 0000001 date 2018-10-30 confirmed by 1 weight in 1000','192.168.7.216','2018-10-30 12:58:44','2018-10-30 12:58:44'),(9,1,'Inserted Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 18:39:15','2018-11-01 18:39:15'),(10,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 18:39:39','2018-11-01 18:39:39'),(11,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 18:45:56','2018-11-01 18:45:56'),(12,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:35:36','2018-11-01 19:35:36'),(13,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:37:51','2018-11-01 19:37:51'),(14,1,'Inserted Stock information with stid1 grn_id 1 dispatch_kilograms  delivery_kilograms  moisture 3 packaging 1','192.168.222.1','2018-11-01 19:37:51','2018-11-01 19:37:51'),(15,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:42:04','2018-11-01 19:42:04'),(16,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:42:42','2018-11-01 19:42:42'),(17,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:43:04','2018-11-01 19:43:04'),(18,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:43:23','2018-11-01 19:43:23'),(19,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:44:06','2018-11-01 19:44:06'),(20,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:45:19','2018-11-01 19:45:19'),(21,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:46:29','2018-11-01 19:46:29'),(22,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:46:55','2018-11-01 19:46:55'),(23,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:48:49','2018-11-01 19:48:49'),(24,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:49:50','2018-11-01 19:49:50'),(25,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:51:29','2018-11-01 19:51:29'),(26,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:52:09','2018-11-01 19:52:09'),(27,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 19:52:50','2018-11-01 19:52:50'),(28,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:07:43','2018-11-01 20:07:43'),(29,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:08:13','2018-11-01 20:08:13'),(30,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:08:53','2018-11-01 20:08:53'),(31,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:17:06','2018-11-01 20:17:06'),(32,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:17:28','2018-11-01 20:17:28'),(33,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:21:19','2018-11-01 20:21:19'),(34,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:22:22','2018-11-01 20:22:22'),(35,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:22:53','2018-11-01 20:22:53'),(36,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:22:59','2018-11-01 20:22:59'),(37,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:23:51','2018-11-01 20:23:51'),(38,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:24:36','2018-11-01 20:24:36'),(39,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:25:29','2018-11-01 20:25:29'),(40,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:25:50','2018-11-01 20:25:50'),(41,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:26:55','2018-11-01 20:26:55'),(42,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:27:49','2018-11-01 20:27:49'),(43,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:28:22','2018-11-01 20:28:22'),(44,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:28:52','2018-11-01 20:28:52'),(45,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:29:04','2018-11-01 20:29:04'),(46,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:29:47','2018-11-01 20:29:47'),(47,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:30:38','2018-11-01 20:30:38'),(48,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:31:12','2018-11-01 20:31:12'),(49,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:31:41','2018-11-01 20:31:41'),(50,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:32:50','2018-11-01 20:32:50'),(51,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:33:26','2018-11-01 20:33:26'),(52,1,'Updated Grn information with grn_id 1 ctr_id  wbi_id 1grn_number0000001','192.168.222.1','2018-11-01 20:33:48','2018-11-01 20:33:48'),(53,1,'Inserted Batch information with btid 1 batch_kilograms  bags -1 pockets -10 stid  btc_tare 10.8 btc_net_weight -10.8','192.168.222.1','2018-11-01 20:43:44','2018-11-01 20:43:44'),(54,1,'Inserted StockLocation information with bt_id 1 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:43:44','2018-11-01 20:43:44'),(55,1,'Inserted Batch information with btid 2 batch_kilograms  bags -1 pockets -10 stid  btc_tare 10.8 btc_net_weight -10.8','192.168.222.1','2018-11-01 20:45:54','2018-11-01 20:45:54'),(56,1,'Inserted StockLocation information with bt_id 2 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:45:54','2018-11-01 20:45:54'),(57,1,'Inserted Batch information with btid 3 batch_kilograms 0 bags -1 pockets -21 stid  btc_tare 21.6 btc_net_weight -21.8','192.168.222.1','2018-11-01 20:46:34','2018-11-01 20:46:34'),(58,1,'Inserted StockLocation information with bt_id 3 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:46:35','2018-11-01 20:46:35'),(59,1,'Inserted Batch information with btid 4 batch_kilograms 0 bags -1 pockets -32 stid  btc_tare 32.4 btc_net_weight -32.8','192.168.222.1','2018-11-01 20:47:35','2018-11-01 20:47:35'),(60,1,'Inserted StockLocation information with bt_id 4 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:47:35','2018-11-01 20:47:35'),(61,1,'Inserted Batch information with btid 5 batch_kilograms 0 bags -1 pockets -43 stid  btc_tare 43.2 btc_net_weight -43.8','192.168.222.1','2018-11-01 20:47:55','2018-11-01 20:47:55'),(62,1,'Inserted StockLocation information with bt_id 5 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:47:55','2018-11-01 20:47:55'),(63,1,'Inserted Batch information with btid 6 batch_kilograms 0 bags -1 pockets -54 stid  btc_tare 54 btc_net_weight -54.8','192.168.222.1','2018-11-01 20:48:39','2018-11-01 20:48:39'),(64,1,'Inserted StockLocation information with bt_id 6 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:48:39','2018-11-01 20:48:39'),(65,1,'Inserted Batch information with btid 7 batch_kilograms  bags -1 pockets -10 stid 1 btc_tare 10.8 btc_net_weight -10.8','192.168.222.1','2018-11-01 20:50:42','2018-11-01 20:50:42'),(66,1,'Inserted StockLocation information with bt_id 7 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:50:42','2018-11-01 20:50:42'),(67,1,'Inserted Batch information with btid 8 batch_kilograms 0 bags -1 pockets -21 stid 1 btc_tare 21.6 btc_net_weight -21.8','192.168.222.1','2018-11-01 20:51:11','2018-11-01 20:51:11'),(68,1,'Inserted StockLocation information with bt_id 8 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:51:11','2018-11-01 20:51:11'),(69,1,'Inserted Batch information with btid 9 batch_kilograms  bags -1 pockets -10 stid 1 btc_tare 10.8 btc_net_weight -10.8','192.168.222.1','2018-11-01 20:55:35','2018-11-01 20:55:35'),(70,1,'Inserted StockLocation information with bt_id 9 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:55:35','2018-11-01 20:55:35'),(71,1,'Inserted Batch information with btid 10 batch_kilograms 0 bags -1 pockets -21 stid 1 btc_tare 21.6 btc_net_weight -21.8','192.168.222.1','2018-11-01 20:56:36','2018-11-01 20:56:36'),(72,1,'Inserted StockLocation information with bt_id 10 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:56:36','2018-11-01 20:56:36'),(73,1,'Inserted Batch information with btid 11 batch_kilograms 0 bags -1 pockets -32 stid 1 btc_tare 32.4 btc_net_weight -32.8','192.168.222.1','2018-11-01 20:56:50','2018-11-01 20:56:50'),(74,1,'Inserted StockLocation information with bt_id 11 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:56:50','2018-11-01 20:56:50'),(75,1,'Inserted Batch information with btid 12 batch_kilograms 0 bags -1 pockets -43 stid 1 btc_tare 43.2 btc_net_weight -43.8','192.168.222.1','2018-11-01 20:57:02','2018-11-01 20:57:02'),(76,1,'Inserted StockLocation information with bt_id 12 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:57:02','2018-11-01 20:57:02'),(77,1,'Inserted Batch information with btid 13 batch_kilograms 0 bags -1 pockets -54 stid 1 btc_tare 54 btc_net_weight -54.8','192.168.222.1','2018-11-01 20:57:44','2018-11-01 20:57:44'),(78,1,'Inserted StockLocation information with bt_id 13 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:57:44','2018-11-01 20:57:44'),(79,1,'Inserted Batch information with btid 14 batch_kilograms 0 bags -2 pockets -5 stid 1 btc_tare 64.8 btc_net_weight -65.8','192.168.222.1','2018-11-01 20:58:20','2018-11-01 20:58:20'),(80,1,'Inserted StockLocation information with bt_id 14 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:58:20','2018-11-01 20:58:20'),(81,1,'Inserted Batch information with btid 15 batch_kilograms  bags -1 pockets -10 stid 1 btc_tare 10.8 btc_net_weight -10.8','192.168.222.1','2018-11-01 20:59:53','2018-11-01 20:59:53'),(82,1,'Inserted StockLocation information with bt_id 15 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 20:59:53','2018-11-01 20:59:53'),(83,1,'Inserted Batch information with btid 16 batch_kilograms 0 bags -1 pockets -21 stid 1 btc_tare 21.6 btc_net_weight -21.8','192.168.222.1','2018-11-01 21:00:08','2018-11-01 21:00:08'),(84,1,'Inserted StockLocation information with bt_id 16 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:00:08','2018-11-01 21:00:08'),(85,1,'Inserted Batch information with btid 17 batch_kilograms 0 bags -1 pockets -32 stid 1 btc_tare 32.4 btc_net_weight -32.8','192.168.222.1','2018-11-01 21:00:49','2018-11-01 21:00:49'),(86,1,'Inserted StockLocation information with bt_id 17 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:00:49','2018-11-01 21:00:49'),(87,1,'Inserted Batch information with btid 18 batch_kilograms 0 bags -1 pockets -43 stid 1 btc_tare 43.2 btc_net_weight -43.8','192.168.222.1','2018-11-01 21:02:09','2018-11-01 21:02:09'),(88,1,'Inserted StockLocation information with bt_id 18 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:02:09','2018-11-01 21:02:09'),(89,1,'Inserted Batch information with btid 19 batch_kilograms 0 bags -1 pockets -54 stid 1 btc_tare 54 btc_net_weight -54.8','192.168.222.1','2018-11-01 21:03:07','2018-11-01 21:03:07'),(90,1,'Inserted StockLocation information with bt_id 19 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:03:07','2018-11-01 21:03:07'),(91,1,'Inserted Batch information with btid 20 batch_kilograms 0 bags -2 pockets -5 stid 1 btc_tare 64.8 btc_net_weight -65.8','192.168.222.1','2018-11-01 21:03:15','2018-11-01 21:03:15'),(92,1,'Inserted StockLocation information with bt_id 20 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:03:15','2018-11-01 21:03:15'),(93,1,'Inserted Batch information with btid 21 batch_kilograms 0 bags -2 pockets -16 stid 1 btc_tare 75.6 btc_net_weight -76.8','192.168.222.1','2018-11-01 21:03:48','2018-11-01 21:03:48'),(94,1,'Inserted StockLocation information with bt_id 21 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:03:48','2018-11-01 21:03:48'),(95,1,'Inserted Batch information with btid 22 batch_kilograms 0 bags -2 pockets -27 stid 1 btc_tare 86.4 btc_net_weight -87.8','192.168.222.1','2018-11-01 21:06:00','2018-11-01 21:06:00'),(96,1,'Inserted StockLocation information with bt_id 22 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:06:00','2018-11-01 21:06:00'),(97,1,'Inserted Batch information with btid 23 batch_kilograms 0 bags -2 pockets -38 stid 1 btc_tare 97.2 btc_net_weight -98.8','192.168.222.1','2018-11-01 21:06:13','2018-11-01 21:06:13'),(98,1,'Inserted StockLocation information with bt_id 23 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:06:13','2018-11-01 21:06:13'),(99,1,'Inserted Batch information with btid 24 batch_kilograms 0 bags -2 pockets -49 stid 1 btc_tare 108 btc_net_weight -109.8','192.168.222.1','2018-11-01 21:06:20','2018-11-01 21:06:20'),(100,1,'Inserted StockLocation information with bt_id 24 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:06:20','2018-11-01 21:06:20'),(101,1,'Inserted Batch information with btid 25 batch_kilograms 0 bags -3 pockets 0 stid 1 btc_tare 118.8 btc_net_weight -120.8','192.168.222.1','2018-11-01 21:07:03','2018-11-01 21:07:03'),(102,1,'Inserted StockLocation information with bt_id 25 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:07:03','2018-11-01 21:07:03'),(103,1,'Inserted Batch information with btid 26 batch_kilograms 100 bags -1 pockets -31 stid 1 btc_tare 129.6 btc_net_weight -31.8','192.168.222.1','2018-11-01 21:07:41','2018-11-01 21:07:41'),(104,1,'Inserted StockLocation information with bt_id 26 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:07:41','2018-11-01 21:07:41'),(105,1,'Inserted Batch information with btid 27 batch_kilograms 100 bags 1 pockets 29 stid 1 btc_tare 10.8 btc_net_weight 89.2','192.168.222.1','2018-11-01 21:08:13','2018-11-01 21:08:13'),(106,1,'Inserted StockLocation information with bt_id 27 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:08:13','2018-11-01 21:08:13'),(107,1,'Inserted Batch information with btid 28 batch_kilograms 200 bags 2 pockets 58 stid 1 btc_tare 21.6 btc_net_weight 178.2','192.168.222.1','2018-11-01 21:17:39','2018-11-01 21:17:39'),(108,1,'Inserted StockLocation information with bt_id 28 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:17:39','2018-11-01 21:17:39'),(109,1,'Inserted Batch information with btid 29 batch_kilograms 300 bags 4 pockets 27 stid 1 btc_tare 32.4 btc_net_weight 267.2','192.168.222.1','2018-11-01 21:18:45','2018-11-01 21:18:45'),(110,1,'Inserted StockLocation information with bt_id 29 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:18:45','2018-11-01 21:18:45'),(111,1,'Inserted Batch information with btid 30 batch_kilograms 400 bags 5 pockets 56 stid 1 btc_tare 43.2 btc_net_weight 356.2','192.168.222.1','2018-11-01 21:21:03','2018-11-01 21:21:03'),(112,1,'Inserted StockLocation information with bt_id 30 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-01 21:21:03','2018-11-01 21:21:03'),(113,1,'Inserted Grn information with grn_id 2 ctr_id  wbi_id 1grn_number0000002','192.168.7.216','2018-11-07 14:49:55','2018-11-07 14:49:55'),(114,1,'Updated Grn information with grn_id 2 ctr_id  wbi_id 1grn_number0000002','192.168.7.216','2018-11-07 14:51:09','2018-11-07 14:51:09'),(115,1,'Updated Grn information with grn_id 2 ctr_id  wbi_id 1grn_number0000002','192.168.7.216','2018-11-07 14:52:13','2018-11-07 14:52:13'),(116,1,'Updated Grn information with grn_id 2 ctr_id  wbi_id 1grn_number0000002','192.168.7.216','2018-11-07 14:53:18','2018-11-07 14:53:18'),(117,1,'Updated Grn information with grn_id 2 ctr_id  wbi_id 1grn_number0000002','192.168.7.216','2018-11-07 14:53:28','2018-11-07 14:53:28'),(118,1,'Inserted Grn information with grn_id 3 ctr_id 1 wbi_id 1grn_number0000002','192.168.7.216','2018-11-07 15:02:09','2018-11-07 15:02:09'),(119,1,'Updated Grn information with grn_id 3 ctr_id 1 wbi_id 1grn_number0000002','192.168.7.216','2018-11-07 15:04:56','2018-11-07 15:04:56'),(120,1,'Inserted Grn information with grn_id 4 ctr_id 1 wbi_id 1grn_number0000003','192.168.7.216','2018-11-07 15:05:36','2018-11-07 15:05:36'),(121,1,'Inserted Grn information with grn_id 5 ctr_id 1 wbi_id 1grn_number0000004','192.168.7.216','2018-11-07 15:05:53','2018-11-07 15:05:53'),(122,1,'Inserted Stock information with stid2 grn_id 5 dispatch_kilograms  delivery_kilograms  moisture  packaging 1','192.168.7.216','2018-11-07 15:05:53','2018-11-07 15:05:53'),(123,1,'Updated Grn information with grn_id 5 ctr_id 1 wbi_id 1grn_number0000004','192.168.7.216','2018-11-07 15:06:14','2018-11-07 15:06:14'),(124,1,'Inserted Batch information with btid 31 batch_kilograms 500 bags 7 pockets 25 stid 1 btc_tare 54 btc_net_weight 445.2','192.168.7.216','2018-11-09 13:20:54','2018-11-09 13:20:54'),(125,1,'Inserted Batch information with btid 32 batch_kilograms 600 bags 8 pockets 54 stid 1 btc_tare 64.8 btc_net_weight 534.2','192.168.7.216','2018-11-09 13:21:01','2018-11-09 13:21:01'),(126,1,'Inserted Batch information with btid 33 batch_kilograms 700 bags 10 pockets 23 stid 1 btc_tare 75.6 btc_net_weight 623.2','192.168.7.216','2018-11-09 13:21:41','2018-11-09 13:21:41'),(127,1,'Inserted StockLocation information with bt_id 33 locrowid 2 loccolid 2 zone 1','192.168.7.216','2018-11-09 13:21:41','2018-11-09 13:21:41'),(128,1,'Inserted Batch information with btid 34 batch_kilograms 800 bags 11 pockets 52 stid 1 btc_tare 86.4 btc_net_weight 712.2','192.168.7.216','2018-11-09 13:21:48','2018-11-09 13:21:48'),(129,1,'Inserted StockLocation information with bt_id 34 locrowid 2 loccolid 2 zone 1','192.168.7.216','2018-11-09 13:21:48','2018-11-09 13:21:48'),(130,1,'Inserted Batch information with btid 35 batch_kilograms 900 bags 13 pockets 21 stid 1 btc_tare 97.2 btc_net_weight 801.2','192.168.7.216','2018-11-09 13:27:22','2018-11-09 13:27:22'),(131,1,'Inserted StockLocation information with bt_id 35 locrowid 2 loccolid 2 zone 1','192.168.7.216','2018-11-09 13:27:22','2018-11-09 13:27:22'),(132,1,'Inserted Batch information with btid 36 batch_kilograms 100 bags 1 pockets 38 stid 3 btc_tare 1.8 btc_net_weight 98.2','192.168.7.216','2018-11-09 13:59:11','2018-11-09 13:59:11'),(133,1,'Inserted StockLocation information with bt_id 36 locrowid 2 loccolid 2 zone 2','192.168.7.216','2018-11-09 13:59:11','2018-11-09 13:59:11'),(134,1,'Inserted Batch information with btid 37 batch_kilograms 200 bags 3 pockets 16 stid 3 btc_tare 3.6 btc_net_weight 196.2','192.168.7.216','2018-11-09 13:59:15','2018-11-09 13:59:15'),(135,1,'Inserted StockLocation information with bt_id 37 locrowid 1 loccolid 2 zone 1','192.168.7.216','2018-11-09 13:59:15','2018-11-09 13:59:15'),(136,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.7.216','2018-11-09 14:00:24','2018-11-09 14:00:24'),(137,1,'Inserted Stock information with stid4 grn_id 1 dispatch_kilograms  delivery_kilograms  moisture  packaging ','192.168.7.216','2018-11-09 14:00:24','2018-11-09 14:00:24'),(138,1,'Inserted Batch information with btid 38 batch_kilograms 800 bags 12 pockets 3 stid 1 btc_tare 75.6 btc_net_weight 723','192.168.222.1','2018-11-10 21:12:52','2018-11-10 21:12:52'),(139,1,'Inserted StockLocation information with bt_id 38 locrowid 2 loccolid 2 zone 1','192.168.222.1','2018-11-10 21:12:52','2018-11-10 21:12:52'),(140,1,'Inserted Batch information with btid 39 batch_kilograms 300 bags 4 pockets 56 stid 3 btc_tare 3.6 btc_net_weight 296','192.168.222.1','2018-11-10 21:18:21','2018-11-10 21:18:21'),(141,1,'Inserted StockLocation information with bt_id 39 locrowid 3 loccolid 4 zone 1','192.168.222.1','2018-11-10 21:18:21','2018-11-10 21:18:21'),(142,1,'Inserted Batch information with btid 40 batch_kilograms 900 bags 13 pockets 43 stid 1 btc_tare 75.6 btc_net_weight 823','192.168.222.1','2018-11-10 21:32:14','2018-11-10 21:32:14'),(143,1,'Inserted StockLocation information with bt_id 40 locrowid 4 loccolid 2 zone 1','192.168.222.1','2018-11-10 21:32:14','2018-11-10 21:32:14'),(144,1,'Inserted Batch information with btid 41 batch_kilograms 100 bags 1 pockets 40 stid 5 btc_tare 0 btc_net_weight 100','192.168.222.1','2018-11-10 22:02:05','2018-11-10 22:02:05'),(145,1,'Inserted StockLocation information with bt_id 41 locrowid 3 loccolid 2 zone 1','192.168.222.1','2018-11-10 22:02:05','2018-11-10 22:02:05'),(146,1,'Inserted Batch information with btid 42 batch_kilograms 200 bags 3 pockets 20 stid 5 btc_tare 0 btc_net_weight 200','192.168.222.1','2018-11-10 22:06:21','2018-11-10 22:06:21'),(147,1,'Inserted StockLocation information with bt_id 42 locrowid 2 loccolid 2 zone 1','192.168.222.1','2018-11-10 22:06:21','2018-11-10 22:06:21'),(148,1,'Inserted Batch information with btid 43 batch_kilograms 300 bags 4 pockets 58 stid 5 btc_tare 1.8 btc_net_weight 298.2','192.168.222.1','2018-11-10 22:08:39','2018-11-10 22:08:39'),(149,1,'Inserted StockLocation information with bt_id 43 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-10 22:08:39','2018-11-10 22:08:39'),(150,1,'Inserted Batch information with btid 44 batch_kilograms 200 bags 3 pockets 7 stid 1 btc_tare 12.6 btc_net_weight 187.2','192.168.222.1','2018-11-10 22:47:37','2018-11-10 22:47:37'),(151,1,'Inserted StockLocation information with bt_id 44 locrowid 3 loccolid 3 zone 1','192.168.222.1','2018-11-10 22:47:37','2018-11-10 22:47:37'),(152,1,'Inserted Batch information with btid 45 batch_kilograms 200 bags 3 pockets 18 stid 5 btc_tare 1.8 btc_net_weight 198.2','192.168.222.1','2018-11-10 22:55:53','2018-11-10 22:55:53'),(153,1,'Inserted StockLocation information with bt_id 45 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-10 22:55:53','2018-11-10 22:55:53'),(154,1,'Inserted Batch information with btid 46 batch_kilograms 200 bags 3 pockets 9 stid 1 btc_tare 10.8 btc_net_weight 189','192.168.222.1','2018-11-10 22:57:49','2018-11-10 22:57:49'),(155,1,'Inserted StockLocation information with bt_id 46 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-10 22:57:49','2018-11-10 22:57:49'),(156,1,'Inserted Batch information with btid 47 batch_kilograms 300 bags 4 pockets 47 stid 1 btc_tare 12.8 btc_net_weight 287','192.168.222.1','2018-11-10 23:01:17','2018-11-10 23:01:17'),(157,1,'Inserted StockLocation information with bt_id 47 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-10 23:01:17','2018-11-10 23:01:17'),(158,1,'Inserted Batch information with btid 48 batch_kilograms 200 bags 3 pockets 7 stid 1 btc_tare 12.8 btc_net_weight 187','192.168.222.1','2018-11-10 23:34:45','2018-11-10 23:34:45'),(159,1,'Inserted StockLocation information with bt_id 48 locrowid 1 loccolid 1 zone 2','192.168.222.1','2018-11-10 23:34:45','2018-11-10 23:34:45'),(160,1,'Inserted Batch information with btid 49 batch_kilograms 300 bags 4 pockets 45 stid 1 btc_tare 14.8 btc_net_weight 285','192.168.222.1','2018-11-10 23:39:30','2018-11-10 23:39:30'),(161,1,'Inserted StockLocation information with bt_id 49 locrowid 3 loccolid 1 zone 1','192.168.222.1','2018-11-10 23:39:30','2018-11-10 23:39:30'),(162,1,'Inserted Batch information with btid 51 batch_kilograms 100 bags 1 pockets 38 stid 5 btc_tare 2 btc_net_weight 98','192.168.222.1','2018-11-10 23:46:02','2018-11-10 23:46:02'),(163,1,'Inserted StockLocation information with bt_id 51 locrowid 1 loccolid 2 zone 1','192.168.222.1','2018-11-10 23:46:02','2018-11-10 23:46:02'),(164,1,'Inserted Batch information with btid 52 batch_kilograms 200 bags 3 pockets 16 stid 5 btc_tare 4 btc_net_weight 196','192.168.222.1','2018-11-10 23:46:34','2018-11-10 23:46:34'),(165,1,'Inserted StockLocation information with bt_id 52 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-10 23:46:34','2018-11-10 23:46:34'),(166,1,'Inserted Batch information with btid 53 batch_kilograms 100 bags 1 pockets 38 stid 1 btc_tare 2 btc_net_weight 98','192.168.222.1','2018-11-11 00:04:24','2018-11-11 00:04:24'),(167,1,'Inserted StockLocation information with bt_id 53 locrowid 1 loccolid 2 zone 1','192.168.222.1','2018-11-11 00:04:24','2018-11-11 00:04:24'),(168,1,'Inserted Batch information with btid 54 batch_kilograms 100 bags 1 pockets 38 stid 1 btc_tare 1.8 btc_net_weight 98.2','192.168.222.1','2018-11-11 00:06:46','2018-11-11 00:06:46'),(169,1,'Inserted StockLocation information with bt_id 54 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-11 00:06:46','2018-11-11 00:06:46'),(170,1,'Inserted Batch information with btid 55 batch_kilograms 200 bags 3 pockets 16 stid 1 btc_tare 3.6 btc_net_weight 196.2','192.168.222.1','2018-11-11 00:08:05','2018-11-11 00:08:05'),(171,1,'Inserted StockLocation information with bt_id 55 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-11 00:08:05','2018-11-11 00:08:05'),(172,1,'Inserted Batch information with btid 56 batch_kilograms 300 bags 4 pockets 54 stid 1 btc_tare 5.4 btc_net_weight 294.2','192.168.222.1','2018-11-11 00:08:12','2018-11-11 00:08:12'),(173,1,'Inserted StockLocation information with bt_id 56 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-11 00:08:12','2018-11-11 00:08:12'),(174,1,'Inserted Batch information with btid 57 batch_kilograms 100 bags 1 pockets 38 stid 5 btc_tare 1.8 btc_net_weight 98.2','192.168.222.1','2018-11-11 00:08:55','2018-11-11 00:08:55'),(175,1,'Inserted StockLocation information with bt_id 57 locrowid 1 loccolid 1 zone 1','192.168.222.1','2018-11-11 00:08:55','2018-11-11 00:08:55'),(176,1,'Inserted Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:11:13','2018-11-11 00:11:13'),(177,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:11:51','2018-11-11 00:11:51'),(178,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:14:47','2018-11-11 00:14:47'),(179,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:14:59','2018-11-11 00:14:59'),(180,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:15:46','2018-11-11 00:15:46'),(181,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:16:52','2018-11-11 00:16:52'),(182,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:19:55','2018-11-11 00:19:55'),(183,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:20:32','2018-11-11 00:20:32'),(184,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:21:53','2018-11-11 00:21:53'),(185,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:22:56','2018-11-11 00:22:56'),(186,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:23:04','2018-11-11 00:23:04'),(187,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:23:10','2018-11-11 00:23:10'),(188,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:23:36','2018-11-11 00:23:36'),(189,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:24:06','2018-11-11 00:24:06'),(190,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:25:16','2018-11-11 00:25:16'),(191,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:28:01','2018-11-11 00:28:01'),(192,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:28:05','2018-11-11 00:28:05'),(193,1,'Updated Grn information with grn_id 6 ctr_id undefined wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:30:34','2018-11-11 00:30:34'),(194,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:30:54','2018-11-11 00:30:54'),(195,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:30:59','2018-11-11 00:30:59'),(196,1,'Updated process rate information for instruction 0000001 service Handover(Ksh 6 on GDN & 6 ON GRN) team 1 process charge 36 with rate 6 bags 6 user 1','192.168.222.1','2018-11-11 00:31:00','2018-11-11 00:31:00'),(197,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:31:18','2018-11-11 00:31:18'),(198,1,'Updated process rate information for instruction 0000001 service Handover(Ksh 6 on GDN & 6 ON GRN) team 1 process charge 36 with rate 6 bags 6 user 1','192.168.222.1','2018-11-11 00:31:18','2018-11-11 00:31:18'),(199,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:32:05','2018-11-11 00:32:05'),(200,1,'Updated process rate information for instruction 0000001 service Handover(Ksh 6 on GDN & 6 ON GRN) team 1 process charge 36 with rate 6 bags 6 user 1','192.168.222.1','2018-11-11 00:32:05','2018-11-11 00:32:05'),(201,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.222.1','2018-11-11 00:32:11','2018-11-11 00:32:11'),(202,1,'Updated process rate information for instruction 0000001 service Handover(Ksh 6 on GDN & 6 ON GRN) team 1 process charge 36 with rate 6 bags 6 user 1','192.168.222.1','2018-11-11 00:32:11','2018-11-11 00:32:11'),(203,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.7.216','2018-11-12 06:48:42','2018-11-12 06:48:42'),(204,1,'Inserted Grn information with grn_id 7 ctr_id 1 wbi_id 1grn_number0000001','192.168.7.216','2018-11-12 06:57:47','2018-11-12 06:57:47'),(205,1,'Inserted Batch information with btid 58 batch_kilograms 100 bags 1 pockets 38 stid 10788 btc_tare 2 btc_net_weight 98','192.168.7.216','2018-11-12 09:48:26','2018-11-12 09:48:26'),(206,1,'Inserted StockLocation information with bt_id 58 locrowid 1 loccolid 2 zone 1','192.168.7.216','2018-11-12 09:48:26','2018-11-12 09:48:26'),(207,1,'Inserted Batch information with btid 59 batch_kilograms 200 bags 3 pockets 16 stid 10788 btc_tare 4 btc_net_weight 196','192.168.7.216','2018-11-12 09:48:55','2018-11-12 09:48:55'),(208,1,'Inserted StockLocation information with bt_id 59 locrowid 2 loccolid 2 zone 1','192.168.7.216','2018-11-12 09:48:55','2018-11-12 09:48:55'),(209,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.7.216','2018-11-12 09:49:08','2018-11-12 09:49:08'),(210,1,'Updated Grn information with grn_id 1 ctr_id 1 wbi_id 1grn_number0000001','192.168.7.216','2018-11-12 09:49:19','2018-11-12 09:49:19'),(211,1,'Updated process rate information for instruction 0000001 service Bulk Blowing Full team 2 process charge 102 with rate 17 bags 6 user 1','192.168.7.216','2018-11-12 09:49:19','2018-11-12 09:49:19');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_agt`
--

DROP TABLE IF EXISTS `agent_agt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_agt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agtc_id` int(10) unsigned NOT NULL,
  `agt_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agt_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agt_att` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `agent_agt_agtc_id_foreign` (`agtc_id`),
  CONSTRAINT `agent_agt_agtc_id_foreign` FOREIGN KEY (`agtc_id`) REFERENCES `agent_category_agtc` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_agt`
--

LOCK TABLES `agent_agt` WRITE;
/*!40000 ALTER TABLE `agent_agt` DISABLE KEYS */;
INSERT INTO `agent_agt` VALUES (1,1,'NKG MILL','NG',NULL,'2018-10-24 14:18:58','2018-10-31 11:59:43'),(2,4,'GREEN WAREHOUSE','NG',NULL,'2018-11-12 06:46:38','2018-11-12 06:46:38'),(3,4,'EXPORT GREEN WAREHOUSE','NG',NULL,'2018-11-12 06:46:38','2018-11-12 06:46:38');
/*!40000 ALTER TABLE `agent_agt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_category_agtc`
--

DROP TABLE IF EXISTS `agent_category_agtc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_category_agtc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agtc_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_category_agtc`
--

LOCK TABLES `agent_category_agtc` WRITE;
/*!40000 ALTER TABLE `agent_category_agtc` DISABLE KEYS */;
INSERT INTO `agent_category_agtc` VALUES (1,'Miller','2018-10-24 14:18:32',NULL),(4,'Warehouse','2018-10-31 11:59:15','2018-10-31 11:59:15');
/*!40000 ALTER TABLE `agent_category_agtc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `analysis_categories_acat`
--

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
INSERT INTO `analysis_categories_acat` VALUES (1,'SC18(AA,TT,E) percentage','2016-08-12 10:36:22'),(2,'SC16(AB,TT,B) percentage','2016-08-12 10:36:22'),(3,'SC14(C,T,B) percentage','2016-08-12 10:36:22'),(4,'(T,HE,SB) percentage','2016-08-12 10:36:22'),(5,'Mbuni percentage','2016-08-12 10:36:22'),(6,'SC18(AA,TT,E) class','2016-08-12 10:36:22'),(7,'SC16(AB,TT,B) class','2016-08-12 10:36:22'),(8,'SC14(C,T,B) class','2016-08-12 10:36:22'),(9,'(T,HE,SB) class','2016-08-12 10:36:22'),(10,'Mbuni class','2016-08-12 10:36:22');
/*!40000 ALTER TABLE `analysis_categories_acat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bag_sizes_bgs`
--

DROP TABLE IF EXISTS `bag_sizes_bgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bag_sizes_bgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bgs_size` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bag_sizes_bgs`
--

LOCK TABLES `bag_sizes_bgs` WRITE;
/*!40000 ALTER TABLE `bag_sizes_bgs` DISABLE KEYS */;
/*!40000 ALTER TABLE `bag_sizes_bgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basket_auto_ba`
--

DROP TABLE IF EXISTS `basket_auto_ba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basket_auto_ba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cp_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgrad_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bs_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket_auto_ba`
--

LOCK TABLES `basket_auto_ba` WRITE;
/*!40000 ALTER TABLE `basket_auto_ba` DISABLE KEYS */;
/*!40000 ALTER TABLE `basket_auto_ba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basket_bs`
--

DROP TABLE IF EXISTS `basket_bs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basket_bs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `bs_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bs_quality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bs_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bs_coffee_type` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_score_type_bs_region_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_score_type_bs_region_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket_bs`
--

LOCK TABLES `basket_bs` WRITE;
/*!40000 ALTER TABLE `basket_bs` DISABLE KEYS */;
INSERT INTO `basket_bs` VALUES (1,1,'10040','AB/PB PLUS',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(2,1,'10060','AA FAQ',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(3,1,'10070','AB/PB FAQ',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(4,1,'10084','C FAQ',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(5,1,'10090','AA MINUS',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(6,1,'10100','AB/PB MINUS',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(7,1,'10115','C MINUS',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(8,1,'10130','GRINDER',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(9,1,'10140','MH',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(10,1,'10310','AA/AB/PB PLUS CERTIFIED',NULL,1,'2017-01-26 12:41:23','2017-01-26 12:41:23'),(11,1,'10020','AB/PB TOP',NULL,1,'2017-03-03 05:56:54','2017-03-03 05:56:54'),(12,1,'10015','AA PLUS CERTIFIED',NULL,1,'2017-03-03 05:57:20','2017-03-03 05:57:20'),(13,1,'10030','AA PLUS',NULL,1,'2017-03-03 05:58:16','2017-03-03 05:58:16'),(14,1,'10045','ABC CERTIFIED',NULL,1,'2017-03-03 06:11:14','2017-03-03 06:11:14'),(15,1,'10055','C PLUS',NULL,1,'2017-03-03 06:11:50','2017-03-03 06:11:50'),(16,1,'10080','ABC FAQ',NULL,1,'2017-03-03 06:12:47','2017-03-03 06:12:47'),(17,1,'10110','ABC MINUS',NULL,1,'2017-03-03 06:13:47','2017-03-03 06:13:47'),(18,1,'10120','GRINDER PLUS',NULL,1,'2017-03-03 06:14:20','2017-03-03 06:14:20'),(19,1,'10135','GRINDER MINUS',NULL,1,'2017-03-03 06:15:00','2017-03-03 06:15:00'),(20,1,'10137','GRINDER CERTIFIED',NULL,1,'2017-03-03 06:15:45','2017-03-03 06:15:45'),(21,1,'10025','GRINDER - H CLASS',NULL,1,'2017-03-03 06:16:25','2017-03-03 06:16:25'),(22,1,'10150','ML',NULL,1,'2017-03-03 06:16:54','2017-03-03 06:16:54'),(23,1,'10260','UGI HP MIXED',NULL,1,'2017-03-03 06:17:39','2017-03-03 06:17:39'),(24,1,'10262','UG2 HP BLACK',NULL,1,'2017-03-03 06:18:02','2017-03-03 06:18:02'),(25,1,'10264','UG3 GT LIGHT',NULL,1,'2017-03-03 06:19:00','2017-03-03 06:19:00'),(26,1,'10010','AA TOP',NULL,1,'2017-03-06 12:24:40','2017-03-06 12:24:40'),(27,1,'10050 ','ABC Plus',NULL,1,'2018-01-31 07:52:06','2018-01-31 07:52:06'),(28,1,'0','Not Set',NULL,1,'2018-04-06 13:06:53','2018-04-06 13:06:53'),(29,1,'10261','UG 1 Plus','UG 1 Plus',1,'2018-10-17 13:14:28','2018-10-17 13:14:28');
/*!40000 ALTER TABLE `basket_bs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_btc`
--

DROP TABLE IF EXISTS `batch_btc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch_btc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btc_number` int(11) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
  `ws_id` int(11) DEFAULT NULL,
  `btc_weight` int(11) DEFAULT NULL,
  `btc_tare` decimal(18,2) DEFAULT NULL,
  `btc_net_weight` int(11) DEFAULT NULL,
  `btc_packages` int(11) DEFAULT NULL,
  `btc_bags` int(11) DEFAULT NULL,
  `btc_pockets` int(11) DEFAULT NULL,
  `otb_id` int(11) DEFAULT NULL,
  `btc_prev_id` int(11) DEFAULT NULL,
  `btc_instructed_by` int(11) DEFAULT NULL,
  `btc_ended_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `st_id_idx` (`st_id`),
  KEY `f` (`btc_net_weight`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_btc`
--

LOCK TABLES `batch_btc` WRITE;
/*!40000 ALTER TABLE `batch_btc` DISABLE KEYS */;
INSERT INTO `batch_btc` VALUES (36,NULL,3,10,100,1.80,98,2,1,38,NULL,NULL,NULL,NULL,NULL,NULL),(37,NULL,3,10,100,1.80,98,2,1,38,NULL,NULL,NULL,NULL,NULL,NULL),(39,NULL,3,10,100,0.00,100,NULL,1,40,NULL,NULL,NULL,NULL,NULL,NULL),(55,NULL,1,3,100,1.80,98,2,1,38,NULL,NULL,NULL,NULL,NULL,NULL),(56,NULL,1,3,100,1.80,98,2,1,38,NULL,NULL,NULL,NULL,NULL,NULL),(57,NULL,5,10,100,1.80,98,2,1,38,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `batch_btc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_mill_btc`
--

DROP TABLE IF EXISTS `batch_mill_btc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch_mill_btc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btc_number` int(11) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
  `ws_id` int(11) DEFAULT NULL,
  `btc_weight` int(11) DEFAULT NULL,
  `btc_tare` decimal(18,2) DEFAULT NULL,
  `btc_net_weight` int(11) DEFAULT NULL,
  `btc_packages` int(11) DEFAULT NULL,
  `btc_bags` int(11) DEFAULT NULL,
  `btc_pockets` int(11) DEFAULT NULL,
  `otb_id` int(11) DEFAULT NULL,
  `btc_prev_id` int(11) DEFAULT NULL,
  `btc_instructed_by` int(11) DEFAULT NULL,
  `btc_ended_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `st_id_idx` (`st_id`),
  KEY `f` (`btc_net_weight`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_mill_btc`
--

LOCK TABLES `batch_mill_btc` WRITE;
/*!40000 ALTER TABLE `batch_mill_btc` DISABLE KEYS */;
INSERT INTO `batch_mill_btc` VALUES (58,NULL,10788,8,100,2.00,98,2,1,38,NULL,NULL,NULL,NULL,NULL,NULL),(59,NULL,10788,7,100,2.00,98,2,1,38,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `batch_mill_btc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!50001 DROP VIEW IF EXISTS `booking`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `booking` AS SELECT 
 1 AS `id`,
 1 AS `ref_no`,
 1 AS `previous_no`,
 1 AS `cgr_grower`,
 1 AS `cgr_code`,
 1 AS `cgr_mark`,
 1 AS `agtid`,
 1 AS `agt_name`,
 1 AS `delivery_date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `booking_bkg`
--

DROP TABLE IF EXISTS `booking_bkg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking_bkg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bkg_ref_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cgr_id` int(10) unsigned NOT NULL,
  `bkg_delivery_date` date NOT NULL,
  `bkg_validity_date` date DEFAULT NULL,
  `bkg_sample_received` tinyint(4) NOT NULL DEFAULT '0',
  `bkg_remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agt_id` int(10) unsigned NOT NULL,
  `wbi_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_bkg_agt_id_foreign` (`agt_id`),
  CONSTRAINT `booking_bkg_agt_id_foreign` FOREIGN KEY (`agt_id`) REFERENCES `agent_agt` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_bkg`
--

LOCK TABLES `booking_bkg` WRITE;
/*!40000 ALTER TABLE `booking_bkg` DISABLE KEYS */;
INSERT INTO `booking_bkg` VALUES (3,'10001',1,'2018-10-10',NULL,0,NULL,'2018-10-24 14:19:18','2018-10-24 14:19:18',2,0);
/*!40000 ALTER TABLE `booking_bkg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `booking_items`
--

DROP TABLE IF EXISTS `booking_items`;
/*!50001 DROP VIEW IF EXISTS `booking_items`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `booking_items` AS SELECT 
 1 AS `id`,
 1 AS `bkgid`,
 1 AS `ref_no`,
 1 AS `pty_name`,
 1 AS `bags`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `booking_items_bki`
--

DROP TABLE IF EXISTS `booking_items_bki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking_items_bki` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bkg_id` int(10) unsigned NOT NULL,
  `pty_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `bki_bags` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_items_bki_bkg_id_foreign` (`bkg_id`),
  KEY `booking_items_bki_pty_id_foreign` (`pty_id`),
  CONSTRAINT `booking_items_bki_bkg_id_foreign` FOREIGN KEY (`bkg_id`) REFERENCES `booking_bkg` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `booking_items_bki_pty_id_foreign` FOREIGN KEY (`pty_id`) REFERENCES `parchment_type_pty` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_items_bki`
--

LOCK TABLES `booking_items_bki` WRITE;
/*!40000 ALTER TABLE `booking_items_bki` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking_items_bki` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buyer_type_bt`
--

DROP TABLE IF EXISTS `buyer_type_bt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buyer_type_bt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bt_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bt_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buyer_type_bt`
--

LOCK TABLES `buyer_type_bt` WRITE;
/*!40000 ALTER TABLE `buyer_type_bt` DISABLE KEYS */;
/*!40000 ALTER TABLE `buyer_type_bt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certification_crt`
--

DROP TABLE IF EXISTS `certification_crt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certification_crt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crt_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `crt_description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certification_crt`
--

LOCK TABLES `certification_crt` WRITE;
/*!40000 ALTER TABLE `certification_crt` DISABLE KEYS */;
/*!40000 ALTER TABLE `certification_crt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charge_type_chty`
--

DROP TABLE IF EXISTS `charge_type_chty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charge_type_chty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chty_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chty_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charge_type_chty`
--

LOCK TABLES `charge_type_chty` WRITE;
/*!40000 ALTER TABLE `charge_type_chty` DISABLE KEYS */;
/*!40000 ALTER TABLE `charge_type_chty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charges_crg`
--

DROP TABLE IF EXISTS `charges_crg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charges_crg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prc_id` int(11) DEFAULT NULL,
  `chty_id` int(11) DEFAULT NULL,
  `crg_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charges_crg`
--

LOCK TABLES `charges_crg` WRITE;
/*!40000 ALTER TABLE `charges_crg` DISABLE KEYS */;
/*!40000 ALTER TABLE `charges_crg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_cl`
--

DROP TABLE IF EXISTS `client_cl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_cl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cl_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cl_courier` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cl_telephone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cl_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_cl`
--

LOCK TABLES `client_cl` WRITE;
/*!40000 ALTER TABLE `client_cl` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_cl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_buyers_cb`
--

DROP TABLE IF EXISTS `coffee_buyers_cb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_buyers_cb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bt_id` int(11) DEFAULT NULL,
  `cb_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cb_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cb_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cb_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index2` (`bt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_buyers_cb`
--

LOCK TABLES `coffee_buyers_cb` WRITE;
/*!40000 ALTER TABLE `coffee_buyers_cb` DISABLE KEYS */;
/*!40000 ALTER TABLE `coffee_buyers_cb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_certification_ccrt`
--

DROP TABLE IF EXISTS `coffee_certification_ccrt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_certification_ccrt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(11) DEFAULT NULL,
  `crt_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cfd_id` (`cfd_id`),
  KEY `crt_id` (`crt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_certification_ccrt`
--

LOCK TABLES `coffee_certification_ccrt` WRITE;
/*!40000 ALTER TABLE `coffee_certification_ccrt` DISABLE KEYS */;
/*!40000 ALTER TABLE `coffee_certification_ccrt` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `coffee_class_cc` VALUES (1,'4/+','2016-08-12 10:02:24'),(2,'1+','2016-08-12 10:02:24'),(3,'1','2016-08-12 10:02:24'),(4,'1-','2016-08-12 10:02:24'),(5,'2+','2016-08-12 10:02:24'),(6,'2','2016-08-12 10:02:24'),(7,'2-','2016-08-12 10:02:24'),(8,'3+','2016-08-12 10:02:24'),(9,'3','2016-08-12 10:02:24'),(10,'3-','2016-08-12 10:02:24'),(11,'4+','2016-08-12 10:02:24'),(12,'4','2016-08-12 10:02:24'),(13,'4-','2016-08-12 10:02:24'),(14,'5+','2016-08-12 10:02:24'),(15,'5','2016-08-12 10:02:24'),(16,'5-','2016-08-12 10:02:24'),(17,'6+','2016-08-12 10:02:24'),(18,'6','2016-08-12 10:02:24'),(19,'6-','2016-08-12 10:02:24'),(20,'7+','2016-08-12 10:02:24'),(21,'7','2016-08-12 10:02:24'),(22,'7-','2016-08-12 10:02:24'),(23,'8+','2016-08-12 10:02:24'),(24,'8','2016-08-12 10:02:24'),(25,'8-','2016-08-12 10:02:24'),(26,'9+','2016-08-12 10:02:24'),(27,'9','2016-08-12 10:02:24'),(28,'9-','2016-08-12 10:02:24'),(29,'10+','2016-08-12 10:02:24'),(30,'10','2016-08-12 10:02:24'),(31,'10-','2016-08-12 10:02:24'),(32,'11+','2016-08-12 10:02:24'),(33,'11','2016-08-12 10:02:24'),(34,'11-','2016-08-12 10:02:24'),(35,'4/+','2016-08-12 10:02:24'),(36,'4/+','2016-08-12 10:02:24'),(37,'7/+','2016-08-12 10:02:24'),(38,'5/+','2016-08-12 10:02:24'),(64,'M1','2016-08-12 10:07:22'),(65,'M2/+','2016-08-12 10:07:22'),(66,'M1-','2016-08-12 10:07:22'),(67,'M1+','2017-03-15 09:58:29');
/*!40000 ALTER TABLE `coffee_class_cc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_details_cfd`
--

DROP TABLE IF EXISTS `coffee_details_cfd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_details_cfd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csn_id` int(11) NOT NULL,
  `ctyp_id` int(11) DEFAULT NULL,
  `sl_id` int(11) DEFAULT NULL,
  `slr_id` int(11) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `cg_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `ibs_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `cfd_additional_processed` int(11) DEFAULT NULL,
  `sct_id` int(11) DEFAULT NULL,
  `cfd_lot_no` int(11) DEFAULT NULL,
  `cfd_outturn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `war_id` int(11) DEFAULT NULL,
  `wr_id` int(11) DEFAULT NULL,
  `ml_id` int(11) DEFAULT NULL,
  `cfd_grower_mark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgrad_id` int(11) DEFAULT NULL,
  `cfd_weight` int(11) DEFAULT NULL,
  `cfd_bags` int(11) DEFAULT NULL,
  `cfd_pockets` int(11) DEFAULT NULL,
  `cfd_dnt` int(10) unsigned DEFAULT '0',
  `cfd_ended_by` int(11) DEFAULT NULL,
  `cfd_withdrawn_from` int(11) DEFAULT NULL,
  `cfd_lot_withdrawn_from` int(10) unsigned DEFAULT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `prt_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index` (`cfd_lot_no`,`wr_id`,`ml_id`,`cgrad_id`,`cfd_outturn`),
  KEY `fk_coffee_details_cfd_coffee_season_csn1_idx` (`csn_id`),
  KEY `fk_coffee_details_cfd_coffee_type_ctyp1_idx` (`ctyp_id`),
  KEY `index9` (`sl_id`),
  KEY `fk_coffee_details_cfd_seller_slr_idx` (`slr_id`),
  KEY `index10` (`cfd_outturn`),
  KEY `fk_coffee_details_cfd_warehouse_wr1_idx` (`wr_id`),
  KEY `fk_coffee_details_cfd_coffee_grade_cgr1_idx` (`cgrad_id`),
  CONSTRAINT `fk_coffee_details_cfd_coffee_grade_cgr1` FOREIGN KEY (`cgrad_id`) REFERENCES `coffee_grade_cgrad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_coffee_season_csn1` FOREIGN KEY (`csn_id`) REFERENCES `coffee_seasons_csn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_coffee_type_ctyp1` FOREIGN KEY (`ctyp_id`) REFERENCES `coffee_type_ctyp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_sale_sl1` FOREIGN KEY (`sl_id`) REFERENCES `sale_sl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_seller_slr` FOREIGN KEY (`slr_id`) REFERENCES `seller_slr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_warehouse_wr1` FOREIGN KEY (`wr_id`) REFERENCES `warehouse_wr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_details_cfd`
--

LOCK TABLES `coffee_details_cfd` WRITE;
/*!40000 ALTER TABLE `coffee_details_cfd` DISABLE KEYS */;
/*!40000 ALTER TABLE `coffee_details_cfd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_grade_cgrad`
--

DROP TABLE IF EXISTS `coffee_grade_cgrad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_grade_cgrad` (
  `id` int(11) NOT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `cgrad_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cgrad_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Grade` (`cgrad_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_grade_cgrad`
--

LOCK TABLES `coffee_grade_cgrad` WRITE;
/*!40000 ALTER TABLE `coffee_grade_cgrad` DISABLE KEYS */;
/*!40000 ALTER TABLE `coffee_grade_cgrad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_growers_cgr`
--

DROP TABLE IF EXISTS `coffee_growers_cgr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_growers_cgr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gt_id` int(11) DEFAULT NULL,
  `cgr_grower` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cgr_organization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgr_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cgr_mark` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_mobile` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_postal_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_land_line` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_vat_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_physical_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_date_registered` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_sub_county` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_is_active` int(11) DEFAULT NULL,
  `cg_app_transaction` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_postal_town` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnt_id` int(11) DEFAULT NULL,
  `rgn_id` int(11) DEFAULT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `cg_post_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_factory_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_cert` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cgr_pin` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_growers_cgr`
--

LOCK TABLES `coffee_growers_cgr` WRITE;
/*!40000 ALTER TABLE `coffee_growers_cgr` DISABLE KEYS */;
INSERT INTO `coffee_growers_cgr` VALUES (1,4,'Bulk (Many Growers)','BULK','BULK','BULK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,'1'),(11,4,'GITANJO','Agnes Wairimu G Njoroge','AB0591','GITANJO/AB0591',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,'2'),(12,4,'AKIMA','Emmanuel Njuguna Wanyoike','AA0589A','AKIMA/AA0589A',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,'3'),(13,4,'CRI AZANIA','Coffee Research Institute','AC0058','AZANIA/AC0058',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,'2460',NULL,'2017-09-21 05:00:00',NULL,'4'),(14,4,'BERCO','Theophilus A Mwangi','AG0034','BERCO/AG0034',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,NULL),(15,4,'BULINJA','Zablon Wasike Lukorito','EB0070','BULINJA/EB0070',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,NULL),(16,4,'BWASIA','Francis Nyongesa Nyisia','CB0632','BWASIA/CB0632',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,NULL),(17,4,'CCS','Christopher Sang','CB0585','CCS/CB0585',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,NULL),(18,4,'CHANIA BRIDGE','Chania Bridge Estate','AB0008','CHANIA BRIDGE/AB0008',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,NULL),(19,4,'CIA GATEMBEI','Daniel Kuria Gatembei','AA0871','CIA GATEMBEI/AA0871',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-21 05:00:00',NULL,NULL),(20,4,'CRI KISII','Coffee Research Institute','EB0001','CRI KISII/EB0001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,'2460',NULL,'2017-09-21 05:00:00',NULL,NULL);
/*!40000 ALTER TABLE `coffee_growers_cgr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_seasons_csn`
--

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

--
-- Dumping data for table `coffee_seasons_csn`
--

LOCK TABLES `coffee_seasons_csn` WRITE;
/*!40000 ALTER TABLE `coffee_seasons_csn` DISABLE KEYS */;
INSERT INTO `coffee_seasons_csn` VALUES (1,'2017/2018',NULL,NULL,NULL),(2,'2018/2019','1',NULL,NULL);
/*!40000 ALTER TABLE `coffee_seasons_csn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_type_ctyp`
--

DROP TABLE IF EXISTS `coffee_type_ctyp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_type_ctyp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctyp_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_type_ctyp`
--

LOCK TABLES `coffee_type_ctyp` WRITE;
/*!40000 ALTER TABLE `coffee_type_ctyp` DISABLE KEYS */;
/*!40000 ALTER TABLE `coffee_type_ctyp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contract_type_ct`
--

DROP TABLE IF EXISTS `contract_type_ct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_type_ct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ct_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ct_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contract_type_ct`
--

LOCK TABLES `contract_type_ct` WRITE;
/*!40000 ALTER TABLE `contract_type_ct` DISABLE KEYS */;
/*!40000 ALTER TABLE `contract_type_ct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_ctr`
--

DROP TABLE IF EXISTS `country_ctr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_ctr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ctr_initial` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctr_is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_ctr`
--

LOCK TABLES `country_ctr` WRITE;
/*!40000 ALTER TABLE `country_ctr` DISABLE KEYS */;
INSERT INTO `country_ctr` VALUES (1,'Kenya','KE',NULL,NULL,NULL),(2,'Tanzania','TZ',NULL,NULL,NULL);
/*!40000 ALTER TABLE `country_ctr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `county_cnt`
--

DROP TABLE IF EXISTS `county_cnt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `county_cnt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) NOT NULL,
  `cnt_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rgn_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `CountryID` (`ctr_id`),
  KEY `RegionID` (`rgn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `county_cnt`
--

LOCK TABLES `county_cnt` WRITE;
/*!40000 ALTER TABLE `county_cnt` DISABLE KEYS */;
/*!40000 ALTER TABLE `county_cnt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit_note_cn`
--

DROP TABLE IF EXISTS `credit_note_cn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_note_cn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cn_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cn_buyer` int(11) DEFAULT NULL,
  `cn_seller` int(11) DEFAULT NULL,
  `cn_goods` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cn_country` int(11) DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `cn_weight` int(11) DEFAULT NULL,
  `cn_bags` int(11) DEFAULT NULL,
  `cn_value` decimal(18,2) DEFAULT NULL,
  `cn_confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit_note_cn`
--

LOCK TABLES `credit_note_cn` WRITE;
/*!40000 ALTER TABLE `credit_note_cn` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_note_cn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cup_comments`
--

DROP TABLE IF EXISTS `cup_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cup_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `st_mill_id` int(10) unsigned DEFAULT NULL,
  `st_wr_id` int(10) unsigned DEFAULT NULL,
  `qp_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cup_comments`
--

LOCK TABLES `cup_comments` WRITE;
/*!40000 ALTER TABLE `cup_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `cup_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cup_score_comments_cpc`
--

DROP TABLE IF EXISTS `cup_score_comments_cpc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cup_score_comments_cpc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `cp_score` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_quality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_qualification` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_score_type_scrtyp_region_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_score_type_scrtyp_region_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cup_score_comments_cpc`
--

LOCK TABLES `cup_score_comments_cpc` WRITE;
/*!40000 ALTER TABLE `cup_score_comments_cpc` DISABLE KEYS */;
/*!40000 ALTER TABLE `cup_score_comments_cpc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cup_score_cp`
--

DROP TABLE IF EXISTS `cup_score_cp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cup_score_cp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `cp_score` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_quality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_qualification` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_score_type_scrtyp_region_rgn2_idx` (`ctr_id`),
  CONSTRAINT `fk_score_type_scrtyp_region_rgn2` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cup_score_cp`
--

LOCK TABLES `cup_score_cp` WRITE;
/*!40000 ALTER TABLE `cup_score_cp` DISABLE KEYS */;
/*!40000 ALTER TABLE `cup_score_cp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard_view_dv`
--

DROP TABLE IF EXISTS `dashboard_view_dv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboard_view_dv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dv_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard_view_dv`
--

LOCK TABLES `dashboard_view_dv` WRITE;
/*!40000 ALTER TABLE `dashboard_view_dv` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_view_dv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard_view_perm_dvp`
--

DROP TABLE IF EXISTS `dashboard_view_perm_dvp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboard_view_perm_dvp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dv_id` int(11) DEFAULT NULL,
  `dprt_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard_view_perm_dvp`
--

LOCK TABLES `dashboard_view_perm_dvp` WRITE;
/*!40000 ALTER TABLE `dashboard_view_perm_dvp` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_view_perm_dvp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_items_dit`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_items_dit`
--

LOCK TABLES `delivery_items_dit` WRITE;
/*!40000 ALTER TABLE `delivery_items_dit` DISABLE KEYS */;
INSERT INTO `delivery_items_dit` VALUES (1,14,NULL,NULL,1,1,NULL,'2018-10-30 12:58:44');
/*!40000 ALTER TABLE `delivery_items_dit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_dprt`
--

DROP TABLE IF EXISTS `department_dprt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_dprt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `dprt_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_dprt`
--

LOCK TABLES `department_dprt` WRITE;
/*!40000 ALTER TABLE `department_dprt` DISABLE KEYS */;
INSERT INTO `department_dprt` VALUES (1,2,'MANAGEMENT','2016-10-17 08:19:27','0000-00-00 00:00:00'),(2,2,'MEETING ROOMS','2016-10-17 08:19:27','0000-00-00 00:00:00'),(3,2,'HR & ADMIN','2016-10-17 08:19:27','0000-00-00 00:00:00'),(4,2,'IT','2016-10-17 08:19:27','0000-00-00 00:00:00'),(5,2,'TRADING/SHIPPING','2016-10-17 08:19:27','0000-00-00 00:00:00'),(6,2,'QUALITY','2016-10-17 08:19:27','0000-00-00 00:00:00'),(7,2,'AGRONOMY','2016-10-17 08:19:27','0000-00-00 00:00:00'),(8,2,'SUPPLIES','2016-10-17 08:19:27','0000-00-00 00:00:00'),(9,2,'MARKETING','2016-10-17 08:19:27','0000-00-00 00:00:00'),(10,2,'WAREHOUSE','2016-10-17 08:19:27','0000-00-00 00:00:00'),(11,2,'MILL','2016-10-17 08:19:27','0000-00-00 00:00:00'),(12,2,'WEIGH BRIDGE','2016-10-17 08:19:27','0000-00-00 00:00:00'),(13,2,'PROJECTS','2016-10-17 08:19:27','0000-00-00 00:00:00'),(14,2,'FINANCE/ACCOUNTS','2016-10-17 08:19:27','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `department_dprt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispatch_dp`
--

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
-- Table structure for table `green_comments_grcm`
--

DROP TABLE IF EXISTS `green_comments_grcm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `green_comments_grcm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st_wr_id` int(11) DEFAULT NULL,
  `qp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `st_mill_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_green_comments_grcm_coffee_details_cfd1_idx` (`st_wr_id`),
  KEY `fk_green_comments_grcm_green_type_gtyp1_idx` (`qp_id`),
  CONSTRAINT `fk_green_comments_grcm_coffee_details_cfd1` FOREIGN KEY (`st_wr_id`) REFERENCES `coffee_details_cfd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_green_comments_grcm_green_type_gtyp1` FOREIGN KEY (`qp_id`) REFERENCES `quality_parameters_qp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `green_comments_grcm`
--

LOCK TABLES `green_comments_grcm` WRITE;
/*!40000 ALTER TABLE `green_comments_grcm` DISABLE KEYS */;
/*!40000 ALTER TABLE `green_comments_grcm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grn_gr`
--

DROP TABLE IF EXISTS `grn_gr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grn_gr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csn_id` int(11) DEFAULT NULL,
  `agt_id` int(11) DEFAULT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `wbi_id` int(11) DEFAULT NULL,
  `cgr_id` int(11) DEFAULT NULL,
  `it_id` int(11) DEFAULT NULL,
  `milled_by` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `miller_id` int(11) DEFAULT NULL,
  `gr_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gr_confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grn_gr`
--

LOCK TABLES `grn_gr` WRITE;
/*!40000 ALTER TABLE `grn_gr` DISABLE KEYS */;
INSERT INTO `grn_gr` VALUES (1,1,2,1,1,1,1,'',1,'0000001',1,NULL,'2018-11-12 09:49:19'),(2,2,1,1,1,1,1,'',1,'0000001',NULL,NULL,'2018-11-07 14:53:28');
/*!40000 ALTER TABLE `grn_gr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grns_summary_gsm`
--

DROP TABLE IF EXISTS `grns_summary_gsm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grns_summary_gsm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gsm_season` int(11) DEFAULT NULL,
  `gsm_warehouse_from` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gsm_buyer` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gsm_month` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gsm_weight` int(11) DEFAULT NULL,
  `gsm_expected_weight` int(11) DEFAULT NULL,
  `gsm_weight_difference` int(11) DEFAULT NULL,
  `gsm_percentage_weight_difference` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grns_summary_gsm`
--

LOCK TABLES `grns_summary_gsm` WRITE;
/*!40000 ALTER TABLE `grns_summary_gsm` DISABLE KEYS */;
/*!40000 ALTER TABLE `grns_summary_gsm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupmenu_gpm`
--

DROP TABLE IF EXISTS `groupmenu_gpm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupmenu_gpm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dprt_id` int(11) NOT NULL,
  `mn_id` int(11) NOT NULL,
  `rl_ids` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_menu_idx_idx` (`mn_id`),
  KEY `fk_dprt_idx_idx` (`dprt_id`),
  CONSTRAINT `fk_dprt_idx` FOREIGN KEY (`dprt_id`) REFERENCES `department_dprt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_idx` FOREIGN KEY (`mn_id`) REFERENCES `menu_mn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=519 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupmenu_gpm`
--

LOCK TABLES `groupmenu_gpm` WRITE;
/*!40000 ALTER TABLE `groupmenu_gpm` DISABLE KEYS */;
INSERT INTO `groupmenu_gpm` VALUES (1,4,1,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(2,4,3,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(3,4,4,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(4,4,5,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(5,4,6,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(6,4,7,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(7,4,8,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(8,4,9,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(9,4,10,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(10,4,11,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(11,4,12,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(12,4,13,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(13,4,14,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(14,4,15,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(495,4,15,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(496,4,16,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(497,4,17,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(498,4,18,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(499,4,19,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(500,4,20,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(501,4,21,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(502,4,22,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(503,4,23,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(504,4,24,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(505,4,25,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(506,4,26,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(507,4,27,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(508,4,28,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(509,4,29,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(510,4,30,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(511,4,31,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(512,4,146,'[\"1\"]','2018-10-30 06:12:56','2018-10-30 06:12:56'),(513,4,147,'[\"1\"]','2018-10-30 06:12:56','2018-10-30 06:12:56'),(514,4,148,'[\"1\"]','2018-10-30 06:12:56','2018-10-30 06:12:56'),(515,4,149,'[\"2\"]','2018-10-30 06:12:56','2018-10-30 06:12:56'),(516,4,150,'[\"1\"]','2018-10-30 06:12:56','2018-10-30 06:12:56'),(517,4,151,'[\"2\"]','2018-10-30 06:12:56','2018-10-30 06:12:56'),(518,4,152,'[\"1\"]','2018-10-30 06:12:56','2018-10-30 06:12:56');
/*!40000 ALTER TABLE `groupmenu_gpm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grower_certifications`
--

DROP TABLE IF EXISTS `grower_certifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grower_certifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cgr_id` int(10) unsigned NOT NULL,
  `crt_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grower_certifications`
--

LOCK TABLES `grower_certifications` WRITE;
/*!40000 ALTER TABLE `grower_certifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `grower_certifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grower_type_gt`
--

DROP TABLE IF EXISTS `grower_type_gt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grower_type_gt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gt_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gt_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grower_type_gt`
--

LOCK TABLES `grower_type_gt` WRITE;
/*!40000 ALTER TABLE `grower_type_gt` DISABLE KEYS */;
/*!40000 ALTER TABLE `grower_type_gt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `growers_transfer`
--

DROP TABLE IF EXISTS `growers_transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `growers_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cg_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cb_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `growers_transfer`
--

LOCK TABLES `growers_transfer` WRITE;
/*!40000 ALTER TABLE `growers_transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `growers_transfer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `highest_batch`
--

DROP TABLE IF EXISTS `highest_batch`;
/*!50001 DROP VIEW IF EXISTS `highest_batch`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `highest_batch` AS SELECT 
 1 AS `slocid`,
 1 AS `id`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `instructed_location_ref_ilf`
--

DROP TABLE IF EXISTS `instructed_location_ref_ilf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructed_location_ref_ilf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilf_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ilf_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mit_id` int(11) DEFAULT NULL,
  `confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructed_location_ref_ilf`
--

LOCK TABLES `instructed_location_ref_ilf` WRITE;
/*!40000 ALTER TABLE `instructed_location_ref_ilf` DISABLE KEYS */;
/*!40000 ALTER TABLE `instructed_location_ref_ilf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructed_stock_location_insloc`
--

DROP TABLE IF EXISTS `instructed_stock_location_insloc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructed_stock_location_insloc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilf_id` int(11) DEFAULT NULL,
  `insloc_ref` int(11) DEFAULT NULL,
  `bt_id` int(11) DEFAULT NULL,
  `loc_row_id` int(11) DEFAULT NULL,
  `loc_column_id` int(11) DEFAULT NULL,
  `btc_zone` int(11) DEFAULT NULL,
  `insloc_weight` int(11) DEFAULT NULL,
  `insloc_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mit_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkx_btid_idx` (`bt_id`),
  KEY `f` (`insloc_weight`),
  CONSTRAINT `fkx_btid` FOREIGN KEY (`bt_id`) REFERENCES `batch_btc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructed_stock_location_insloc`
--

LOCK TABLES `instructed_stock_location_insloc` WRITE;
/*!40000 ALTER TABLE `instructed_stock_location_insloc` DISABLE KEYS */;
/*!40000 ALTER TABLE `instructed_stock_location_insloc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internal_basket_ibs`
--

DROP TABLE IF EXISTS `internal_basket_ibs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internal_basket_ibs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `ibs_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ibs_quality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ibs_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ibs_coffee_type` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internal_basket_ibs`
--

LOCK TABLES `internal_basket_ibs` WRITE;
/*!40000 ALTER TABLE `internal_basket_ibs` DISABLE KEYS */;
/*!40000 ALTER TABLE `internal_basket_ibs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices_inv`
--

DROP TABLE IF EXISTS `invoices_inv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices_inv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_confirmedby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_confirmedby` (`inv_confirmedby`,`inv_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices_inv`
--

LOCK TABLES `invoices_inv` WRITE;
/*!40000 ALTER TABLE `invoices_inv` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices_inv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_it`
--

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

--
-- Dumping data for table `items_it`
--

LOCK TABLES `items_it` WRITE;
/*!40000 ALTER TABLE `items_it` DISABLE KEYS */;
INSERT INTO `items_it` VALUES (1,'Parchment','2018-10-24 14:43:07','2018-10-24 14:43:07'),(2,'Estate Cured','2018-10-24 14:43:07','2018-10-24 14:43:07'),(3,'Clean','2018-10-24 14:43:07','2018-10-24 14:43:07'),(4,'Sweeping','2018-10-30 08:07:52','2018-10-30 08:07:52'),(5,'Green','2018-10-30 20:30:33','2018-10-30 20:30:33'),(6,'Husk','2018-10-30 20:30:33','2018-10-30 20:30:33'),(7,'Parchment Bulk','2018-10-30 21:35:48','2018-10-30 21:35:48'),(8,'Clean Bulk','2018-10-30 21:35:48','2018-10-30 21:35:48');
/*!40000 ALTER TABLE `items_it` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_material_itm`
--

DROP TABLE IF EXISTS `items_material_itm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_material_itm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `it_id` int(11) DEFAULT NULL,
  `mt_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_material_itm`
--

LOCK TABLES `items_material_itm` WRITE;
/*!40000 ALTER TABLE `items_material_itm` DISABLE KEYS */;
INSERT INTO `items_material_itm` VALUES (1,1,1,'2018-11-09 08:20:53',NULL),(2,2,1,'2018-11-09 08:20:53',NULL),(3,4,1,'2018-11-09 08:20:53',NULL),(4,7,1,'2018-11-09 08:20:53',NULL),(5,1,2,'2018-11-09 08:20:53',NULL),(6,2,2,'2018-11-09 08:20:53',NULL),(7,4,2,'2018-11-09 08:20:53',NULL),(8,7,2,'2018-11-09 08:20:53',NULL),(9,1,3,'2018-11-09 08:20:53',NULL),(10,2,3,'2018-11-09 08:20:53',NULL),(11,4,3,'2018-11-09 08:20:53',NULL),(12,7,3,'2018-11-09 08:20:53',NULL),(13,1,4,'2018-11-09 08:20:53',NULL),(14,2,4,'2018-11-09 08:20:53',NULL),(15,4,4,'2018-11-09 08:20:53',NULL),(16,7,4,'2018-11-09 08:20:53',NULL),(17,3,5,'2018-11-09 08:20:53',NULL),(18,4,5,'2018-11-09 08:20:53',NULL),(19,8,5,'2018-11-09 08:20:53',NULL),(20,3,6,'2018-11-09 08:20:53',NULL),(21,4,6,'2018-11-09 08:20:53',NULL),(22,8,6,'2018-11-09 08:20:53',NULL),(23,3,7,'2018-11-09 08:20:53',NULL),(24,4,7,'2018-11-09 08:20:53',NULL),(25,8,7,'2018-11-09 08:20:53',NULL);
/*!40000 ALTER TABLE `items_material_itm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location_loc`
--

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

--
-- Dumping data for table `location_loc`
--

LOCK TABLES `location_loc` WRITE;
/*!40000 ALTER TABLE `location_loc` DISABLE KEYS */;
INSERT INTO `location_loc` VALUES (1,1,'A','1',NULL,NULL,NULL),(2,1,'B','2',NULL,NULL,NULL),(3,1,'C','3',NULL,NULL,NULL),(4,1,'D','4',NULL,NULL,NULL);
/*!40000 ALTER TABLE `location_loc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_mt`
--

DROP TABLE IF EXISTS `material_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_mt` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mt_name` varchar(50) DEFAULT NULL,
  `mt_description` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_mt`
--

LOCK TABLES `material_mt` WRITE;
/*!40000 ALTER TABLE `material_mt` DISABLE KEYS */;
INSERT INTO `material_mt` VALUES (1,'P1','','2018-10-30 20:57:12',NULL),(2,'P2','','2018-10-30 20:57:12',NULL),(3,'PL','','2018-10-30 20:57:12',NULL),(4,'MBUNI','','2018-10-30 20:57:12',NULL),(5,'AA','','2018-10-30 20:57:12',NULL),(6,'AB','','2018-10-30 20:57:12',NULL),(7,'C','','2018-10-30 20:57:12',NULL);
/*!40000 ALTER TABLE `material_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_mn`
--

DROP TABLE IF EXISTS `menu_mn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_mn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mn_name` varchar(45) NOT NULL,
  `mn_description` varchar(255) DEFAULT NULL,
  `mn_url` varchar(100) NOT NULL,
  `mn_level` int(11) NOT NULL,
  `mn_parent` int(11) DEFAULT NULL,
  `mn_icon` varchar(45) DEFAULT NULL,
  `mn_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_mn`
--

LOCK TABLES `menu_mn` WRITE;
/*!40000 ALTER TABLE `menu_mn` DISABLE KEYS */;
INSERT INTO `menu_mn` VALUES (1,'Department','Add/update department','settingsdepartment',2,15,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(3,'Menu','Add/update menus','settingsmenu',2,15,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(4,'Home','View home page','home',1,0,'coffee',1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(5,'Registration','Top menu registration','registration',1,0,'user-plus',2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(6,'Users','Register users','registeruser',2,5,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(7,'UserManager','Manage users and their roles','usermanager',1,0,'users',3,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(8,'Roles','Add roles','roles',2,7,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(9,'Role User','Add users','rolesuser',2,7,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(10,'Grower Manager','Manage all growers activities','#',1,0,'file',4,'2018-10-21 03:41:54',NULL),(11,'Arrival','Weigh trucks','weighbridge',1,0,'truck',5,'2018-10-21 03:41:54',NULL),(12,'Quality','Quality operatins','#',1,0,'thumbs-up',6,'2018-10-21 03:41:54',NULL),(13,'Warehouse','Warehuse management','#',1,0,'building',7,'2018-10-21 03:41:54',NULL),(14,'Processing','Handle all processing','#',1,0,'star',8,'2018-10-21 03:41:54',NULL),(15,'Settings','Application settings','#',1,0,'cog',9,'2018-10-21 03:41:54',NULL),(16,'Intake Ticket - IN','Capture weight in','weighbridge',2,11,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(17,'Intake Ticket - OUT','Capture weight out','weighbridgeout',2,11,NULL,3,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(146,'GRNS Tablet ','Receive coffee and update grns ','arrivalinformationgrns',2,11,NULL,2,'2018-10-25 08:30:02',NULL),(147,'GRNS Desktop','Receive coffee and update grns ','arrivalinformation',2,11,NULL,2,'2018-05-10 21:00:00','2018-05-10 21:00:00'),(148,'Generate Warrants','Generate Warrants','arrivalqualityinformationlist',2,13,NULL,3,'2018-05-10 21:00:00','2018-05-10 21:00:00'),(149,'Weight Note','Weighing coffee in the warehouse','weighnote',2,13,NULL,4,'2018-10-05 09:09:31',NULL),(150,'Movement Individual','Issue individual movement instruction','movementindividual',2,13,NULL,5,'2018-07-26 14:33:18',NULL),(151,'Movement Instruction','Issue movement instruction','movementspecial',2,13,NULL,6,'2018-05-10 21:00:00','2018-05-10 21:00:00'),(152,'Confirm Movement','Confirm movement','movementconfirmation',2,13,NULL,7,'2018-05-10 21:00:00','2018-05-10 21:00:00');
/*!40000 ALTER TABLE `menu_mn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2018_10_21_022021_create_activity_log_table',1),('2018_10_21_022021_create_bag_sizes_bgs_table',1),('2018_10_21_022021_create_basket_auto_ba_table',1),('2018_10_21_022021_create_basket_bs_table',1),('2018_10_21_022021_create_batch_btc_table',1),('2018_10_21_022021_create_buyer_type_bt_table',1),('2018_10_21_022021_create_certification_crt_table',1),('2018_10_21_022021_create_charge_type_chty_table',1),('2018_10_21_022021_create_charges_crg_table',1),('2018_10_21_022021_create_client_cl_table',1),('2018_10_21_022021_create_coffee_buyers_cb_table',1),('2018_10_21_022021_create_coffee_certification_ccrt_table',1),('2018_10_21_022021_create_coffee_details_cfd_table',1),('2018_10_21_022021_create_coffee_grade_cgrad_table',1),('2018_10_21_022021_create_coffee_growers_cg_table',1),('2018_10_21_022021_create_coffee_seasons_csn_table',1),('2018_10_21_022021_create_coffee_type_ctyp_table',1),('2018_10_21_022021_create_country_ctr_table',1),('2018_10_21_022021_create_county_cnt_table',1),('2018_10_21_022021_create_credit_note_cn_table',1),('2018_10_21_022021_create_cup_score_comments_cpc_table',1),('2018_10_21_022021_create_cup_score_cp_table',1),('2018_10_21_022021_create_dashboard_view_dv_table',1),('2018_10_21_022021_create_dashboard_view_perm_dvp_table',1),('2018_10_21_022021_create_department_dprt_table',1),('2018_10_21_022021_create_green_comments_grcm_table',1),('2018_10_21_022021_create_grn_gr_table',1),('2018_10_21_022021_create_grns_summary_gsm_table',1),('2018_10_21_022021_create_groupmenu_gpm_table',1),('2018_10_21_022021_create_grower_type_gt_table',1),('2018_10_21_022021_create_growers_transfer_table',1),('2018_10_21_022021_create_instructed_location_ref_ilf_table',1),('2018_10_21_022021_create_instructed_stock_location_insloc_table',1),('2018_10_21_022021_create_internal_basket_ibs_table',1),('2018_10_21_022021_create_invoices_inv_table',1),('2018_10_21_022021_create_location_loc_table',1),('2018_10_21_022021_create_menu_mn_table',1),('2018_10_21_022021_create_mill_ml_table',1),('2018_10_21_022021_create_months_mth_table',1),('2018_10_21_022021_create_movement_instruction_type_mit_table',1),('2018_10_21_022021_create_outturn_total_batch_otb_table',1),('2018_10_21_022021_create_packaging_pkg_table',1),('2018_10_21_022021_create_password_resets_table',1),('2018_10_21_022021_create_payments_py_table',1),('2018_10_21_022021_create_permission_role_table',1),('2018_10_21_022021_create_permissions_table',1),('2018_10_21_022021_create_person_per_table',1),('2018_10_21_022021_create_process_allocations_pall_table',1),('2018_10_21_022021_create_process_charges_prcgs_table',1),('2018_10_21_022021_create_process_charges_teams_pctms_table',1),('2018_10_21_022021_create_process_instructions_prs_table',1),('2018_10_21_022021_create_process_pr_table',1),('2018_10_21_022021_create_process_results_prts_table',1),('2018_10_21_022021_create_processing_group_prg_table',1),('2018_10_21_022021_create_processing_instruction_pri_table',1),('2018_10_21_022021_create_processing_prcss_table',1),('2018_10_21_022021_create_processing_results_type_prt_table',1),('2018_10_21_022021_create_processing_summary_prssm_table',1),('2018_10_21_022021_create_provisional_allocation_prall_table',1),('2018_10_21_022021_create_provisional_bulk_pbk_table',1),('2018_10_21_022021_create_provisonal_purpose_prp_table',1),('2018_10_21_022021_create_purchases_prc_table',1),('2018_10_21_022021_create_quality_analysis_type_qat_table',1),('2018_10_21_022021_create_quality_groups_qg_table',1),('2018_10_21_022021_create_quality_parameters_qp_table',1),('2018_10_21_022021_create_qualty_details_qltyd_table',1),('2018_10_21_022021_create_rates_rts_table',1),('2018_10_21_022021_create_raw_score_rw_table',1),('2018_10_21_022021_create_region_rgn_table',1),('2018_10_21_022021_create_release_instructions_rl_table',1),('2018_10_21_022021_create_role_user_table',1),('2018_10_21_022021_create_roles_table',1),('2018_10_21_022021_create_sale_sl_table',1),('2018_10_21_022021_create_sale_status_sst_table',1),('2018_10_21_022021_create_sale_type_sltyp_table',1),('2018_10_21_022021_create_sales_contract_sct_table',1),('2018_10_21_022021_create_screens_scr_table',1),('2018_10_21_022021_create_seller_slr_table',1),('2018_10_21_022021_create_stock_breakdown_stb_table',1),('2018_10_21_022021_create_stock_location_sloc_table',1),('2018_10_21_022021_create_stock_qualty_details_sqltyd_table',1),('2018_10_21_022021_create_stock_st_table',1),('2018_10_21_022021_create_stock_status_sts_table',1),('2018_10_21_022021_create_stocks_summary_ssm_table',1),('2018_10_21_022021_create_system_settings_sys_table',1),('2018_10_21_022021_create_teams_tms_table',1),('2018_10_21_022021_create_thresholds_th_table',1),('2018_10_21_022021_create_transporters_trp_table',1),('2018_10_21_022021_create_trp_rates_table',1),('2018_10_21_022021_create_users_table',1),('2018_10_21_022021_create_users_usr_table',1),('2018_10_21_022021_create_warehoue_type_wrt_table',1),('2018_10_21_022021_create_warehouse_charges_wrch_table',1),('2018_10_21_022021_create_warehouse_wr_table',1),('2018_10_21_022021_create_warrants_war_table',1),('2018_10_21_022021_create_weighbridge_wb_table',1),('2018_10_21_022021_create_wr_rates_table',1),('2018_10_21_022021_create_years_yr_table',1),('2018_10_21_022035_add_foreign_keys_to_basket_bs_table',1),('2018_10_21_022035_add_foreign_keys_to_coffee_details_cfd_table',1),('2018_10_21_022035_add_foreign_keys_to_cup_score_comments_cpc_table',1),('2018_10_21_022035_add_foreign_keys_to_cup_score_cp_table',1),('2018_10_21_022035_add_foreign_keys_to_green_comments_grcm_table',1),('2018_10_21_022035_add_foreign_keys_to_groupmenu_gpm_table',1),('2018_10_21_022035_add_foreign_keys_to_instructed_stock_location_insloc_table',1),('2018_10_21_022035_add_foreign_keys_to_mill_ml_table',1),('2018_10_21_022035_add_foreign_keys_to_permission_role_table',1),('2018_10_21_022035_add_foreign_keys_to_process_allocations_pall_table',1),('2018_10_21_022035_add_foreign_keys_to_process_charges_prcgs_table',1),('2018_10_21_022035_add_foreign_keys_to_process_charges_teams_pctms_table',1),('2018_10_21_022035_add_foreign_keys_to_process_results_prts_table',1),('2018_10_21_022035_add_foreign_keys_to_provisional_allocation_prall_table',1),('2018_10_21_022035_add_foreign_keys_to_purchases_prc_table',1),('2018_10_21_022035_add_foreign_keys_to_quality_parameters_qp_table',1),('2018_10_21_022035_add_foreign_keys_to_qualty_details_qltyd_table',1),('2018_10_21_022035_add_foreign_keys_to_raw_score_rw_table',1),('2018_10_21_022035_add_foreign_keys_to_region_rgn_table',1),('2018_10_21_022035_add_foreign_keys_to_role_user_table',1),('2018_10_21_022035_add_foreign_keys_to_sale_sl_table',1),('2018_10_21_022035_add_foreign_keys_to_seller_slr_table',1),('2018_10_21_022035_add_foreign_keys_to_stock_st_table',1),('2018_10_21_022035_add_foreign_keys_to_transporters_trp_table',1),('2018_10_21_022035_add_foreign_keys_to_warehouse_wr_table',1),('2018_10_22_081111_create_booking_table',2),('2018_10_22_084243_create_booking_items_table',2),('2018_10_22_084727_create_partchment_table',2),('2018_10_22_085114_add_fk_pty_to_bki_table',2),('2018_10_22_085431_create_contract_type_table',2),('2018_10_22_085708_create_terms_table',2),('2018_10_22_090029_create_service_contract_sct_table',3),('2018_10_22_090551_create_sct_contract_terms_terms_table',3),('2018_10_22_144438_create_booking_view',3),('2018_10_22_145833_rename_columns_in_growers_table',4),('2018_10_22_150321_rename_coffee_growers_table_in_growers_table',4),('2018_10_22_151117_create_agent_agt_table',4),('2018_10_22_152446_create_booking_view01',4),('2018_10_22_152844_rename_cgr_organization_table_in_growers_table',4),('2018_10_24_112303_create_parking_lots_table',4),('2018_10_24_112422_create_items_table',4),('2018_10_24_113202_rename_weighbridge_table',4),('2018_10_24_115105_create_weighbridge_table',5),('2018_10_24_144203_rename_weighbridge_info_columns',6),('2018_10_24_060307_add_pin_column_to_growers_table',7),('2018_10_24_073547_create_grower_certifications_table',8),('2018_10_24_150924_create_booking_items_view',9),('2018_10_24_151523_create_saleable_status',9),('2018_10_24_172133_add_weighbridge_info_id',10),('2018_10_25_083946_create_cofee_class_table',10),('2018_10_25_084947_create_milling_status_mst_table',10),('2018_10_26_121253_create_quality_tables',11),('2018_10_30_091712_create_stock_warehouse_table',12),('2018_10_30_130601_update_weighbridge_table',13),('2018_10_30_141658_create_table_delivery_items',14),('2018_10_26_051503_create_table_otturns_settings',15),('2018_10_30_163830_create_table_outturn_number_settings',15),('2018_10_31_090345_add_quality_fields_to_qualty_details_qltyd_table',15),('2018_10_31_102812_add_st_ids_to_green_comments_grcm_table',15),('2018_10_31_103317_add_parchment_to_qualty_details_qltyd_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mill_ml`
--

DROP TABLE IF EXISTS `mill_ml`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mill_ml` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rgn_id` int(11) DEFAULT NULL,
  `ml_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ml_initials` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ml_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_ml_region_rgn1_idx` (`rgn_id`),
  CONSTRAINT `fk_warehouse_ml_region_rgn1` FOREIGN KEY (`rgn_id`) REFERENCES `region_rgn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mill_ml`
--

LOCK TABLES `mill_ml` WRITE;
/*!40000 ALTER TABLE `mill_ml` DISABLE KEYS */;
/*!40000 ALTER TABLE `mill_ml` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `milling_status_mst` VALUES (1,'Unmilled','2016-08-12 04:11:40'),(2,'Milled','2016-08-12 04:11:40');
/*!40000 ALTER TABLE `milling_status_mst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `months_mth`
--

DROP TABLE IF EXISTS `months_mth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `months_mth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mth_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mth_trading` int(11) DEFAULT NULL,
  `mth_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `months_mth`
--

LOCK TABLES `months_mth` WRITE;
/*!40000 ALTER TABLE `months_mth` DISABLE KEYS */;
/*!40000 ALTER TABLE `months_mth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movement_instruction_type_mit`
--

DROP TABLE IF EXISTS `movement_instruction_type_mit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movement_instruction_type_mit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mit_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mit_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movement_instruction_type_mit`
--

LOCK TABLES `movement_instruction_type_mit` WRITE;
/*!40000 ALTER TABLE `movement_instruction_type_mit` DISABLE KEYS */;
/*!40000 ALTER TABLE `movement_instruction_type_mit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outturn_number_settings_ons`
--

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

--
-- Dumping data for table `outturn_number_settings_ons`
--

LOCK TABLES `outturn_number_settings_ons` WRITE;
/*!40000 ALTER TABLE `outturn_number_settings_ons` DISABLE KEYS */;
INSERT INTO `outturn_number_settings_ons` VALUES (1,1,'GRN','RAW',0,0,3,'05','12','2018-10-30 16:10:51','2018-10-30 16:10:51'),(2,2,'GRN','CLEAN',3,0,3,'01',NULL,'2018-10-30 16:10:51','2018-10-30 16:10:51'),(3,7,'BULKING','RAW',1,0,3,'01',NULL,'2018-10-30 16:10:51','2018-10-30 16:10:51'),(4,8,'BULKING','CLEAN',2,0,3,'01',NULL,'2018-10-30 16:10:51','2018-10-30 16:10:51'),(5,4,'SWEEPINGS','RAW AND CLEEN',4,0,3,'01',NULL,'2018-10-30 16:10:51','2018-10-30 16:10:51');
/*!40000 ALTER TABLE `outturn_number_settings_ons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outturn_quality_oqlty`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outturn_quality_oqlty`
--

LOCK TABLES `outturn_quality_oqlty` WRITE;
/*!40000 ALTER TABLE `outturn_quality_oqlty` DISABLE KEYS */;
/*!40000 ALTER TABLE `outturn_quality_oqlty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outturn_total_batch_otb`
--

DROP TABLE IF EXISTS `outturn_total_batch_otb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outturn_total_batch_otb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `otb_weight` int(11) DEFAULT NULL,
  `otb_confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outturn_total_batch_otb`
--

LOCK TABLES `outturn_total_batch_otb` WRITE;
/*!40000 ALTER TABLE `outturn_total_batch_otb` DISABLE KEYS */;
/*!40000 ALTER TABLE `outturn_total_batch_otb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packaging_pkg`
--

DROP TABLE IF EXISTS `packaging_pkg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packaging_pkg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pkg_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pkg_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pkg_weight` decimal(18,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packaging_pkg`
--

LOCK TABLES `packaging_pkg` WRITE;
/*!40000 ALTER TABLE `packaging_pkg` DISABLE KEYS */;
INSERT INTO `packaging_pkg` VALUES (1,'SISAL','The fiber made from the sisal plant, used esp',1.00,NULL,NULL),(2,'JUTE','Rough fiber made from the stems of a tropical',0.90,NULL,NULL),(3,'ECOTACT',NULL,0.10,NULL,NULL),(4,'GRAIN PRO',NULL,0.10,NULL,NULL),(5,'VACUUM',NULL,1.10,NULL,NULL),(7,'30 KGS',NULL,0.00,NULL,NULL),(8,'SISAL + ECOTAT',NULL,1.10,NULL,NULL),(9,'SISAL + GRAIN PRO',NULL,1.10,NULL,NULL),(10,'JUTE + ECOTAT',NULL,0.90,NULL,NULL),(11,'JUTE + GRAIN PRO',NULL,0.90,NULL,NULL);
/*!40000 ALTER TABLE `packaging_pkg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parchment_type_pty`
--

DROP TABLE IF EXISTS `parchment_type_pty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parchment_type_pty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pty_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pty_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parchment_type_pty`
--

LOCK TABLES `parchment_type_pty` WRITE;
/*!40000 ALTER TABLE `parchment_type_pty` DISABLE KEYS */;
INSERT INTO `parchment_type_pty` VALUES (1,'P1','2018-10-30 20:55:45'),(2,'P2','2018-10-30 20:55:45'),(3,'PL','2018-10-30 20:55:45'),(4,'MBUNI','2018-10-30 20:55:45');
/*!40000 ALTER TABLE `parchment_type_pty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking_lots_pl`
--

DROP TABLE IF EXISTS `parking_lots_pl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parking_lots_pl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pl_lot_no` int(10) unsigned NOT NULL,
  `pl_availability` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking_lots_pl`
--

LOCK TABLES `parking_lots_pl` WRITE;
/*!40000 ALTER TABLE `parking_lots_pl` DISABLE KEYS */;
INSERT INTO `parking_lots_pl` VALUES (1,1,0,'2018-10-24 14:09:10','2018-10-24 14:09:10'),(2,2,0,'2018-10-24 14:09:10','2018-10-30 12:58:44'),(3,3,0,'2018-10-24 14:09:10','2018-10-24 14:09:10');
/*!40000 ALTER TABLE `parking_lots_pl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `usr_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usr_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_usr_email_index` (`usr_email`),
  KEY `password_resets_usr_token_index` (`usr_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments_py`
--

DROP TABLE IF EXISTS `payments_py`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments_py` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `py_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `py_date` date DEFAULT NULL,
  `py_amount` decimal(18,2) DEFAULT NULL,
  `py_confirmedby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `indeces` (`py_confirmedby`,`py_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments_py`
--

LOCK TABLES `payments_py` WRITE;
/*!40000 ALTER TABLE `payments_py` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments_py` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person_per`
--

DROP TABLE IF EXISTS `person_per`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person_per` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dprt_id` int(11) DEFAULT NULL,
  `rgn_id` int(11) DEFAULT NULL,
  `per_fname` varchar(45) DEFAULT NULL,
  `per_sname` varchar(45) DEFAULT NULL,
  `per_email` varchar(255) DEFAULT NULL,
  `per_extension` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person_per`
--

LOCK TABLES `person_per` WRITE;
/*!40000 ALTER TABLE `person_per` DISABLE KEYS */;
INSERT INTO `person_per` VALUES (1,4,NULL,'Admin','Admin',NULL,NULL,'2018-07-10 07:12:19',NULL);
/*!40000 ALTER TABLE `person_per` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process_allocations_pall`
--

DROP TABLE IF EXISTS `process_allocations_pall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `process_allocations_pall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_id` int(11) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
  `cfd_id` int(11) DEFAULT NULL,
  `pall_allocated_weight` int(11) DEFAULT NULL,
  `pall_packages` int(11) DEFAULT NULL,
  `pall_processed_weight` int(11) DEFAULT NULL,
  `pall_tags` int(11) DEFAULT NULL,
  `pall_ratios` decimal(18,15) DEFAULT NULL,
  `pall_extra_processing` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pr_id_idx` (`pr_id`),
  KEY `fk_st_id_idx` (`st_id`),
  CONSTRAINT `fk_pr_id` FOREIGN KEY (`pr_id`) REFERENCES `process_pr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_st_id` FOREIGN KEY (`st_id`) REFERENCES `stock_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_allocations_pall`
--

LOCK TABLES `process_allocations_pall` WRITE;
/*!40000 ALTER TABLE `process_allocations_pall` DISABLE KEYS */;
/*!40000 ALTER TABLE `process_allocations_pall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process_charges_prcgs`
--

DROP TABLE IF EXISTS `process_charges_prcgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `process_charges_prcgs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prcgs_instruction_no` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prcgs_rate_id` int(10) unsigned NOT NULL,
  `prcgs_service` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prcgs_rate` decimal(8,2) NOT NULL,
  `prcgs_total` decimal(8,2) NOT NULL,
  `prcgs_team_id` int(10) unsigned DEFAULT NULL,
  `bags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ref_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `process_charges_prcgs_prcgs_rate_id_foreign` (`prcgs_rate_id`),
  KEY `process_charges_prcgs_prcgs_team_id_foreign` (`prcgs_team_id`),
  CONSTRAINT `process_charges_prcgs_prcgs_rate_id_foreign` FOREIGN KEY (`prcgs_rate_id`) REFERENCES `rates_rts` (`id`),
  CONSTRAINT `process_charges_prcgs_prcgs_team_id_foreign` FOREIGN KEY (`prcgs_team_id`) REFERENCES `teams_tms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_charges_prcgs`
--

LOCK TABLES `process_charges_prcgs` WRITE;
/*!40000 ALTER TABLE `process_charges_prcgs` DISABLE KEYS */;
INSERT INTO `process_charges_prcgs` VALUES (1,'0000001',13,'Handover(Ksh 6 on GDN & 6 ON GRN)',6.00,36.00,1,'6',NULL,NULL,'2018-11-11 00:32:11'),(2,'0000001',2,'Bulk Blowing Full',17.00,102.00,2,'6',NULL,NULL,'2018-11-12 09:49:19');
/*!40000 ALTER TABLE `process_charges_prcgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process_charges_teams_pctms`
--

DROP TABLE IF EXISTS `process_charges_teams_pctms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `process_charges_teams_pctms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prcgs_id` int(10) unsigned NOT NULL,
  `prcgs_team_id` int(10) unsigned NOT NULL,
  `bags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `process_charges_teams_pctms_prcgs_id_foreign` (`prcgs_id`),
  KEY `process_charges_teams_pctms_prcgs_team_id_foreign` (`prcgs_team_id`),
  CONSTRAINT `process_charges_teams_pctms_prcgs_id_foreign` FOREIGN KEY (`prcgs_id`) REFERENCES `process_charges_prcgs` (`id`),
  CONSTRAINT `process_charges_teams_pctms_prcgs_team_id_foreign` FOREIGN KEY (`prcgs_team_id`) REFERENCES `teams_tms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_charges_teams_pctms`
--

LOCK TABLES `process_charges_teams_pctms` WRITE;
/*!40000 ALTER TABLE `process_charges_teams_pctms` DISABLE KEYS */;
/*!40000 ALTER TABLE `process_charges_teams_pctms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process_instructions_prs`
--

DROP TABLE IF EXISTS `process_instructions_prs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `process_instructions_prs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_id` int(11) DEFAULT NULL,
  `pri_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_instructions_prs`
--

LOCK TABLES `process_instructions_prs` WRITE;
/*!40000 ALTER TABLE `process_instructions_prs` DISABLE KEYS */;
/*!40000 ALTER TABLE `process_instructions_prs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process_pr`
--

DROP TABLE IF EXISTS `process_pr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `process_pr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `csn_id` int(11) DEFAULT NULL,
  `sct_id` int(11) DEFAULT NULL,
  `prcss_id` int(11) DEFAULT NULL,
  `pr_instruction_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_reference_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_weight_in` int(11) DEFAULT NULL,
  `pr_other_instructions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_weight_processed` int(11) DEFAULT NULL,
  `pr_okay_to_process` int(11) DEFAULT NULL,
  `pr_supervisor` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_confirmed_by` int(11) DEFAULT NULL,
  `cgrad_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `pr_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pr_instruction_number_UNIQUE` (`pr_instruction_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_pr`
--

LOCK TABLES `process_pr` WRITE;
/*!40000 ALTER TABLE `process_pr` DISABLE KEYS */;
/*!40000 ALTER TABLE `process_pr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process_results_prts`
--

DROP TABLE IF EXISTS `process_results_prts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `process_results_prts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_id` int(11) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
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
  KEY `st_id_idx` (`st_id`),
  CONSTRAINT `st_id_idx` FOREIGN KEY (`st_id`) REFERENCES `stock_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_results_prts`
--

LOCK TABLES `process_results_prts` WRITE;
/*!40000 ALTER TABLE `process_results_prts` DISABLE KEYS */;
/*!40000 ALTER TABLE `process_results_prts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processing_group_prg`
--

DROP TABLE IF EXISTS `processing_group_prg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_group_prg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prcss_id` int(11) DEFAULT NULL,
  `prg_input_type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prg_instruction` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processing_group_prg`
--

LOCK TABLES `processing_group_prg` WRITE;
/*!40000 ALTER TABLE `processing_group_prg` DISABLE KEYS */;
/*!40000 ALTER TABLE `processing_group_prg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processing_instruction_pri`
--

DROP TABLE IF EXISTS `processing_instruction_pri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_instruction_pri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prg_id` int(11) DEFAULT NULL,
  `pri_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processing_instruction_pri`
--

LOCK TABLES `processing_instruction_pri` WRITE;
/*!40000 ALTER TABLE `processing_instruction_pri` DISABLE KEYS */;
/*!40000 ALTER TABLE `processing_instruction_pri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processing_prcss`
--

DROP TABLE IF EXISTS `processing_prcss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_prcss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prcss_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prcss_initial` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prcss_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prcss_auction` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processing_prcss`
--

LOCK TABLES `processing_prcss` WRITE;
/*!40000 ALTER TABLE `processing_prcss` DISABLE KEYS */;
/*!40000 ALTER TABLE `processing_prcss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processing_results_type_prt`
--

DROP TABLE IF EXISTS `processing_results_type_prt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_results_type_prt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prcss_id` int(11) DEFAULT NULL,
  `prt_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prt_initials` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prt_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processing_results_type_prt`
--

LOCK TABLES `processing_results_type_prt` WRITE;
/*!40000 ALTER TABLE `processing_results_type_prt` DISABLE KEYS */;
/*!40000 ALTER TABLE `processing_results_type_prt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processing_summary_prssm`
--

DROP TABLE IF EXISTS `processing_summary_prssm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_summary_prssm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prssm_buyer` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prssm_year` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prssm_month` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prssm_total_allocated` int(11) DEFAULT NULL,
  `prssm_results` int(11) DEFAULT NULL,
  `prssm_difference` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processing_summary_prssm`
--

LOCK TABLES `processing_summary_prssm` WRITE;
/*!40000 ALTER TABLE `processing_summary_prssm` DISABLE KEYS */;
/*!40000 ALTER TABLE `processing_summary_prssm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provisional_allocation_prall`
--

DROP TABLE IF EXISTS `provisional_allocation_prall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provisional_allocation_prall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pbk_id` int(11) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
  `cfd_id` int(11) DEFAULT NULL,
  `prall_allocated_weight` int(11) DEFAULT NULL,
  `prall_packages` int(11) DEFAULT NULL,
  `prall_processed_weight` int(11) DEFAULT NULL,
  `prall_ratios` decimal(18,15) DEFAULT NULL,
  `prall_extra_processing` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prall_pr_id_idx` (`pbk_id`),
  KEY `fk_prall_st_id_idx` (`st_id`),
  KEY `fk_cfd_id_idx` (`cfd_id`),
  CONSTRAINT `fk_cfd_id` FOREIGN KEY (`cfd_id`) REFERENCES `coffee_details_cfd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prall_st_id` FOREIGN KEY (`st_id`) REFERENCES `stock_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provisional_allocation_prall`
--

LOCK TABLES `provisional_allocation_prall` WRITE;
/*!40000 ALTER TABLE `provisional_allocation_prall` DISABLE KEYS */;
/*!40000 ALTER TABLE `provisional_allocation_prall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provisional_bulk_pbk`
--

DROP TABLE IF EXISTS `provisional_bulk_pbk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provisional_bulk_pbk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `csn_id` int(11) DEFAULT NULL,
  `sct_id` int(11) DEFAULT NULL,
  `prcss_id` int(11) DEFAULT NULL,
  `pbk_instruction_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pbk_reference_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pbk_weight_in` int(11) DEFAULT NULL,
  `pbk_other_instructions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pbk_weight_processed` int(11) DEFAULT NULL,
  `pbk_confirmed_by` int(11) DEFAULT NULL,
  `cgrad_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `pbk_date` date DEFAULT NULL,
  `prp_id` int(11) DEFAULT NULL,
  `pbk_comments` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pbk_instruction_number_UNIQUE` (`pbk_instruction_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provisional_bulk_pbk`
--

LOCK TABLES `provisional_bulk_pbk` WRITE;
/*!40000 ALTER TABLE `provisional_bulk_pbk` DISABLE KEYS */;
/*!40000 ALTER TABLE `provisional_bulk_pbk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provisonal_purpose_prp`
--

DROP TABLE IF EXISTS `provisonal_purpose_prp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provisonal_purpose_prp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prp_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provisonal_purpose_prp`
--

LOCK TABLES `provisonal_purpose_prp` WRITE;
/*!40000 ALTER TABLE `provisonal_purpose_prp` DISABLE KEYS */;
/*!40000 ALTER TABLE `provisonal_purpose_prp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases_prc`
--

DROP TABLE IF EXISTS `purchases_prc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases_prc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(11) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `prc_price` decimal(18,2) DEFAULT NULL,
  `prc_confirmed_price` decimal(18,2) DEFAULT NULL,
  `prc_hedge` decimal(18,10) DEFAULT NULL,
  `prc_value` decimal(18,2) DEFAULT NULL,
  `prc_bric_value` decimal(18,2) DEFAULT NULL,
  `prc_fob_id` int(11) DEFAULT NULL,
  `sst_id` int(11) DEFAULT NULL,
  `ibs_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `br_id` int(11) DEFAULT NULL,
  `prc_purchase_contract_ratio` decimal(18,10) DEFAULT NULL,
  `inv_id` int(11) DEFAULT NULL,
  `inv_weight` int(11) DEFAULT NULL,
  `inv_outturn` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inv_mark` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `py_id` int(11) DEFAULT NULL,
  `war_id` int(11) DEFAULT NULL,
  `rl_id` int(11) DEFAULT NULL,
  `gr_id` int(11) DEFAULT NULL,
  `cn_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_multiple` (`cb_id`,`sst_id`,`bs_id`,`br_id`,`inv_id`,`py_id`,`war_id`,`rl_id`,`gr_id`,`cn_id`),
  KEY `cfd_id` (`cfd_id`),
  KEY `fk_bs_id_idx` (`bs_id`),
  CONSTRAINT `fk_bs_id` FOREIGN KEY (`bs_id`) REFERENCES `basket_bs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases_prc`
--

LOCK TABLES `purchases_prc` WRITE;
/*!40000 ALTER TABLE `purchases_prc` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases_prc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality_analysis_qanl`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_analysis_qanl`
--

LOCK TABLES `quality_analysis_qanl` WRITE;
/*!40000 ALTER TABLE `quality_analysis_qanl` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_analysis_qanl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality_analysis_type_qat`
--

DROP TABLE IF EXISTS `quality_analysis_type_qat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_analysis_type_qat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qat_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qat_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_analysis_type_qat`
--

LOCK TABLES `quality_analysis_type_qat` WRITE;
/*!40000 ALTER TABLE `quality_analysis_type_qat` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_analysis_type_qat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality_groups_qg`
--

DROP TABLE IF EXISTS `quality_groups_qg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_groups_qg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qg_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qg_remarks` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_groups_qg`
--

LOCK TABLES `quality_groups_qg` WRITE;
/*!40000 ALTER TABLE `quality_groups_qg` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_groups_qg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality_parameters_qp`
--

DROP TABLE IF EXISTS `quality_parameters_qp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_parameters_qp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qg_id` int(11) DEFAULT NULL,
  `qp_parameter` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qp_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `QualityGroup_Fk_idx` (`qg_id`),
  CONSTRAINT `QualityGroup_Fk` FOREIGN KEY (`qg_id`) REFERENCES `quality_groups_qg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_parameters_qp`
--

LOCK TABLES `quality_parameters_qp` WRITE;
/*!40000 ALTER TABLE `quality_parameters_qp` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_parameters_qp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualty_details_qltyd`
--

DROP TABLE IF EXISTS `qualty_details_qltyd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualty_details_qltyd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(11) DEFAULT NULL,
  `prcss_id` int(11) DEFAULT NULL,
  `qltyd_prcss_value` int(11) DEFAULT NULL,
  `scr_id` int(11) DEFAULT NULL,
  `qltyd_scr_value` int(11) DEFAULT NULL,
  `cp_id` int(11) DEFAULT NULL,
  `cps_id` int(11) DEFAULT NULL,
  `rw_id` int(11) DEFAULT NULL,
  `qltyd_acidity` decimal(18,2) DEFAULT NULL,
  `qltyd_body` decimal(18,2) DEFAULT NULL,
  `qltyd_flavour` decimal(18,2) DEFAULT NULL,
  `qltyd_comments` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rw_class` int(10) unsigned DEFAULT NULL,
  `rw_quality` int(10) unsigned DEFAULT NULL,
  `roast_class` int(10) unsigned DEFAULT NULL,
  `roast_quality` int(10) unsigned DEFAULT NULL,
  `cup_class` int(10) unsigned DEFAULT NULL,
  `cup_quality` int(10) unsigned DEFAULT NULL,
  `overall_class` int(10) unsigned DEFAULT NULL,
  `overall_comments` int(10) unsigned DEFAULT NULL,
  `cupped_by` int(10) unsigned DEFAULT NULL,
  `pct_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_qualty_details_qltyd_coffee_details_cfd1_idx` (`cfd_id`),
  KEY `fk_qualty_details_qltyd_processing_prcss1_idx` (`prcss_id`),
  KEY `fk_qualty_details_qltyd_screen_prcss1_idx` (`scr_id`),
  KEY `fk_qualty_details_qltyd_score_type_scrtyp1_idx` (`cp_id`),
  KEY `fk_qualty_details_qltyd_score_type_scrtyp2_idx` (`rw_id`),
  CONSTRAINT `fk_qualty_details_qltyd_coffee_details_cfd1` FOREIGN KEY (`cfd_id`) REFERENCES `coffee_details_cfd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_processing_prcss1` FOREIGN KEY (`prcss_id`) REFERENCES `processing_prcss` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_quality_remarks_qrmk1` FOREIGN KEY (`scr_id`) REFERENCES `screens_scr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_score_type_scrtyp1` FOREIGN KEY (`cp_id`) REFERENCES `cup_score_comments_cpc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_score_type_scrtyp2` FOREIGN KEY (`rw_id`) REFERENCES `raw_score_rw` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualty_details_qltyd`
--

LOCK TABLES `qualty_details_qltyd` WRITE;
/*!40000 ALTER TABLE `qualty_details_qltyd` DISABLE KEYS */;
/*!40000 ALTER TABLE `qualty_details_qltyd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates_rts`
--

DROP TABLE IF EXISTS `rates_rts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates_rts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prc_id` int(11) DEFAULT NULL,
  `service` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` double NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `bagsize` double NOT NULL,
  `date_ended` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates_rts`
--

LOCK TABLES `rates_rts` WRITE;
/*!40000 ALTER TABLE `rates_rts` DISABLE KEYS */;
INSERT INTO `rates_rts` VALUES (1,NULL,'KDI Bulk Hopper and Bag off',17.5,1,0,NULL,NULL,NULL),(2,NULL,'Bulk Blowing Full',17,1,0,NULL,NULL,NULL),(3,NULL,'KGT Full',19.5,1,0,NULL,NULL,NULL),(4,NULL,'KGR Full',19.5,1,0,NULL,NULL,NULL),(5,NULL,'KCS Full',19.5,1,0,NULL,NULL,NULL),(6,NULL,'KIB Bulk Full',19.5,1,0,NULL,NULL,NULL),(7,NULL,'KIB Bulk Bag Off and Stacking only',10,1,0,NULL,NULL,NULL),(8,NULL,'KCS Bag Off and stacking only',10,1,0,NULL,NULL,NULL),(9,NULL,'Grain Pro/Ecotact Mixed Box And Stacking',23,1,0,NULL,NULL,NULL),(10,NULL,'Grain Pro and Taggings by bulking(Silo Bag-off & Stacking)',21.5,1,0,NULL,NULL,NULL),(11,NULL,'Loading Containers Only',8,1,0,NULL,NULL,NULL),(12,NULL,'Loading TRucks in or Out 100%(Offloading and Loading)',8,1,0,NULL,NULL,NULL),(13,NULL,'Handover(Ksh 6 on GDN & 6 ON GRN)',6,1,0,NULL,NULL,NULL),(14,NULL,'Feeding Silos Only',9.5,1,0,NULL,NULL,NULL),(15,NULL,'Handling and standardizing Ex-Office Coffee to Green Warehouse',12,1,0,NULL,NULL,NULL),(16,NULL,'Manual Bulking and Stacking',31,1,0,NULL,NULL,NULL),(17,NULL,'Restacking',6,1,0,NULL,NULL,NULL),(18,NULL,'Retagging',12,1,0,NULL,NULL,NULL),(19,NULL,'Standardizing',12,1,0,NULL,NULL,NULL),(20,NULL,'Vacuum Packaging all inclusive per box',34,1,0,NULL,NULL,NULL),(21,NULL,'Bag Off and palletizing',8,1,0,NULL,NULL,NULL),(22,NULL,'Repassing Full',17.5,1,0,NULL,NULL,NULL),(23,NULL,'Internal Transfer(5@ way)',10,1,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `rates_rts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raw_score_rw`
--

DROP TABLE IF EXISTS `raw_score_rw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raw_score_rw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `rw_score` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rw_quality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rw_qualification` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rw_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_score_type_scrt_region_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_score_type_scrt_region_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raw_score_rw`
--

LOCK TABLES `raw_score_rw` WRITE;
/*!40000 ALTER TABLE `raw_score_rw` DISABLE KEYS */;
/*!40000 ALTER TABLE `raw_score_rw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region_rgn`
--

DROP TABLE IF EXISTS `region_rgn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region_rgn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `rgn_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `rgn_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_region_rgn_country_ctr1_idx` (`ctr_id`),
  CONSTRAINT `fk_region_rgn_country_ctr1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region_rgn`
--

LOCK TABLES `region_rgn` WRITE;
/*!40000 ALTER TABLE `region_rgn` DISABLE KEYS */;
INSERT INTO `region_rgn` VALUES (1,1,'Ruiru','Head Office',NULL,NULL);
/*!40000 ALTER TABLE `region_rgn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `release_instructions_rl`
--

DROP TABLE IF EXISTS `release_instructions_rl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `release_instructions_rl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trp_id` int(11) DEFAULT NULL,
  `trp_assigned_at` datetime DEFAULT NULL,
  `rl_ref_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rl_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rl_date` date DEFAULT NULL,
  `rl_confirmedby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rl_warehouseto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_trpl_id` (`trp_id`,`rl_ref_no`,`rl_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `release_instructions_rl`
--

LOCK TABLES `release_instructions_rl` WRITE;
/*!40000 ALTER TABLE `release_instructions_rl` DISABLE KEYS */;
/*!40000 ALTER TABLE `release_instructions_rl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roast_comments`
--

DROP TABLE IF EXISTS `roast_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roast_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `st_mill_id` int(10) unsigned DEFAULT NULL,
  `st_wr_id` int(10) unsigned DEFAULT NULL,
  `qp_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roast_comments`
--

LOCK TABLES `roast_comments` WRITE;
/*!40000 ALTER TABLE `roast_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `roast_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign_idx` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users_usr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'owner','Project Owner','Developer','2016-11-09 07:34:31',NULL),(2,'admin','Project Admin','Overall Admin','2016-11-09 07:34:31',NULL),(3,'supervisor','Project Supervisor','Department Heads','2016-11-09 07:34:31',NULL),(4,'intaker','Intaker','Performs intake operations','2016-11-09 07:34:31',NULL),(5,'readonly','Read Only','Read Only',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salable_status_selst`
--

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
INSERT INTO `salable_status_selst` VALUES (1,'Sellable','2016-08-18 01:40:52'),(2,'Not Sellable','2016-08-18 01:40:52');
/*!40000 ALTER TABLE `salable_status_selst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_sl`
--

DROP TABLE IF EXISTS `sale_sl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_sl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `csn_id` int(11) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `sltyp_id` int(11) DEFAULT NULL,
  `sl_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl_date` date DEFAULT NULL,
  `sl_hedge` decimal(10,3) DEFAULT NULL,
  `sl_margin` int(11) DEFAULT NULL,
  `sl_month` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl_coffee_type` int(11) DEFAULT NULL,
  `sl_catalogue_confirmedby` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl_quality_confirmedby` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl_auction_confirmedby` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sl_no` (`sl_no`,`sltyp_id`),
  KEY `indx_multiple` (`cb_id`,`sltyp_id`,`sl_catalogue_confirmedby`,`sl_quality_confirmedby`,`sl_auction_confirmedby`),
  KEY `fk_sale_country_idx` (`ctr_id`),
  KEY `fk_coffee_season_idx` (`csn_id`),
  CONSTRAINT `fk_sale_country` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_sl`
--

LOCK TABLES `sale_sl` WRITE;
/*!40000 ALTER TABLE `sale_sl` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_sl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_status_sst`
--

DROP TABLE IF EXISTS `sale_status_sst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_status_sst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sst_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sst_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_status_sst`
--

LOCK TABLES `sale_status_sst` WRITE;
/*!40000 ALTER TABLE `sale_status_sst` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_status_sst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_type_sltyp`
--

DROP TABLE IF EXISTS `sale_type_sltyp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_type_sltyp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sltyp_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_type_sltyp`
--

LOCK TABLES `sale_type_sltyp` WRITE;
/*!40000 ALTER TABLE `sale_type_sltyp` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_type_sltyp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_contract_sct`
--

DROP TABLE IF EXISTS `sales_contract_sct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_contract_sct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `cl_id` int(11) DEFAULT NULL,
  `sct_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sct_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sct_packages` int(11) DEFAULT NULL,
  `sct_month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sct_bulk_date` date DEFAULT NULL,
  `sct_disposal_date` date DEFAULT NULL,
  `sct_shipped` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `sct_stuffed` int(11) DEFAULT NULL,
  `sct_packaging_method` int(11) DEFAULT NULL,
  `pkg_id` int(11) DEFAULT NULL,
  `yr_id` int(11) DEFAULT NULL,
  `sct_complemantary_condition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sct_weight` int(11) DEFAULT NULL,
  `sct_approved_weight` int(11) DEFAULT NULL,
  `sct_start_date` date DEFAULT NULL,
  `sct_end_date` date DEFAULT NULL,
  `sct_date` date DEFAULT NULL,
  `sct_client_reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sct_user` int(11) DEFAULT NULL,
  `sct_updated_user` int(11) DEFAULT NULL,
  `sct_status` int(11) DEFAULT NULL,
  `pt_id` int(11) DEFAULT NULL,
  `bgs_id` int(11) DEFAULT NULL,
  `pu_id` int(11) DEFAULT NULL,
  `cf_id` int(11) DEFAULT NULL,
  `trm_id` int(11) DEFAULT NULL,
  `sct_cancelled` int(11) DEFAULT NULL,
  `sct_destination` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sct_price` int(11) DEFAULT NULL,
  `sct_bric_confirmed` int(11) DEFAULT NULL,
  `sct_shipment` int(11) DEFAULT NULL,
  `sct_coffee_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sct_number_UNIQUE` (`sct_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_contract_sct`
--

LOCK TABLES `sales_contract_sct` WRITE;
/*!40000 ALTER TABLE `sales_contract_sct` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_contract_sct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screens_scr`
--

DROP TABLE IF EXISTS `screens_scr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screens_scr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scr_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scr_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screens_scr`
--

LOCK TABLES `screens_scr` WRITE;
/*!40000 ALTER TABLE `screens_scr` DISABLE KEYS */;
/*!40000 ALTER TABLE `screens_scr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sct_contract_terms_sctt`
--

DROP TABLE IF EXISTS `sct_contract_terms_sctt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sct_contract_terms_sctt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sct_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sct_contract_terms_sctt_sct_id_foreign` (`sct_id`),
  KEY `sct_contract_terms_sctt_term_id_foreign` (`term_id`),
  CONSTRAINT `sct_contract_terms_sctt_sct_id_foreign` FOREIGN KEY (`sct_id`) REFERENCES `service_contract_sct` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `sct_contract_terms_sctt_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms_tms` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sct_contract_terms_sctt`
--

LOCK TABLES `sct_contract_terms_sctt` WRITE;
/*!40000 ALTER TABLE `sct_contract_terms_sctt` DISABLE KEYS */;
/*!40000 ALTER TABLE `sct_contract_terms_sctt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller_slr`
--

DROP TABLE IF EXISTS `seller_slr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seller_slr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slr_id` int(11) DEFAULT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `slr_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `slr_initials` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slr_att` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slr_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_marketing_agent_ma_country_ctr1_idx` (`ctr_id`),
  CONSTRAINT `fk_marketing_agent_ma_country_ctr1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller_slr`
--

LOCK TABLES `seller_slr` WRITE;
/*!40000 ALTER TABLE `seller_slr` DISABLE KEYS */;
/*!40000 ALTER TABLE `seller_slr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_contract_sct`
--

DROP TABLE IF EXISTS `service_contract_sct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_contract_sct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sct_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cgr_id` int(10) unsigned NOT NULL,
  `sct_date` date NOT NULL,
  `sct_from_date` date NOT NULL,
  `sct_to_date` date NOT NULL,
  `ct_id` int(10) unsigned NOT NULL,
  `other_details` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `upload_path` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_contract_sct`
--

LOCK TABLES `service_contract_sct` WRITE;
/*!40000 ALTER TABLE `service_contract_sct` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_contract_sct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_breakdown_stb`
--

DROP TABLE IF EXISTS `stock_breakdown_stb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_breakdown_stb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) DEFAULT NULL,
  `br_id` int(11) DEFAULT NULL,
  `stb_weight` int(11) DEFAULT NULL,
  `stb_value` decimal(18,10) DEFAULT NULL,
  `stb_hedge` decimal(18,10) DEFAULT NULL,
  `stb_bric_bags` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `ibs_id` int(11) DEFAULT NULL,
  `stb_bulk_ratio` decimal(18,10) DEFAULT NULL,
  `stb_value_ratio` decimal(18,10) DEFAULT NULL,
  `stb_purchase_contract_ratio` decimal(18,10) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `cgr_id` int(11) DEFAULT NULL,
  `prc_id` int(11) DEFAULT NULL,
  `cn_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_multiple` (`st_id`,`br_id`,`stb_value`,`stb_weight`,`bs_id`,`ibs_id`,`stb_bulk_ratio`,`cb_id`,`cgr_id`,`prc_id`,`cn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_breakdown_stb`
--

LOCK TABLES `stock_breakdown_stb` WRITE;
/*!40000 ALTER TABLE `stock_breakdown_stb` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_breakdown_stb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_location_batch_sloc`
--

DROP TABLE IF EXISTS `stock_location_batch_sloc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_location_batch_sloc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bt_id` int(11) DEFAULT NULL,
  `loc_row_id` int(11) DEFAULT NULL,
  `loc_column_id` int(11) DEFAULT NULL,
  `btc_zone` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`bt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_location_batch_sloc`
--

LOCK TABLES `stock_location_batch_sloc` WRITE;
/*!40000 ALTER TABLE `stock_location_batch_sloc` DISABLE KEYS */;
INSERT INTO `stock_location_batch_sloc` VALUES (23,58,1,2,1,'2018-11-12 09:48:26',NULL),(24,59,2,2,1,'2018-11-12 09:48:55',NULL);
/*!40000 ALTER TABLE `stock_location_batch_sloc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_location_sloc`
--

DROP TABLE IF EXISTS `stock_location_sloc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_location_sloc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bt_id` int(11) DEFAULT NULL,
  `loc_row_id` int(11) DEFAULT NULL,
  `loc_column_id` int(11) DEFAULT NULL,
  `btc_zone` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`bt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_location_sloc`
--

LOCK TABLES `stock_location_sloc` WRITE;
/*!40000 ALTER TABLE `stock_location_sloc` DISABLE KEYS */;
INSERT INTO `stock_location_sloc` VALUES (2,36,2,2,2,'2018-11-09 13:59:11',NULL),(3,37,1,2,1,'2018-11-09 13:59:15',NULL),(5,39,3,4,1,'2018-11-10 21:18:21',NULL),(20,55,1,1,1,'2018-11-11 00:08:05',NULL),(21,56,1,1,1,'2018-11-11 00:08:12',NULL),(22,57,1,1,1,'2018-11-11 00:08:55',NULL);
/*!40000 ALTER TABLE `stock_location_sloc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `stock_locations`
--

DROP TABLE IF EXISTS `stock_locations`;
/*!50001 DROP VIEW IF EXISTS `stock_locations`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `stock_locations` AS SELECT 
 1 AS `id`,
 1 AS `slocid`,
 1 AS `btc_number`,
 1 AS `btc_instructed_by`,
 1 AS `stid`,
 1 AS `prc_id`,
 1 AS `gr_id`,
 1 AS `name`,
 1 AS `grade`,
 1 AS `st_dispatch_net`,
 1 AS `st_gross`,
 1 AS `st_tare`,
 1 AS `st_moisture`,
 1 AS `pkg_name`,
 1 AS `btc_weight`,
 1 AS `btc_bags`,
 1 AS `btc_pockets`,
 1 AS `btc_tare`,
 1 AS `btc_net_weight`,
 1 AS `btc_packages`,
 1 AS `wrid`,
 1 AS `loc_rowid`,
 1 AS `loc_columnid`,
 1 AS `loc_row`,
 1 AS `loc_column`,
 1 AS `btc_zone`,
 1 AS `wr_name`,
 1 AS `new_loc_row`,
 1 AS `new_loc_column`,
 1 AS `new_zone`,
 1 AS `new_wr_name`,
 1 AS `new_location`,
 1 AS `reason`,
 1 AS `insloc_ref`,
 1 AS `code`,
 1 AS `mit_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `stock_mill_st`
--

DROP TABLE IF EXISTS `stock_mill_st`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_mill_st` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csn_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `mt_id` int(10) DEFAULT NULL,
  `pty_id` int(11) DEFAULT NULL,
  `cgr_id` int(11) DEFAULT NULL,
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
  KEY `fk_material_id_idx_idx` (`mt_id`),
  KEY `fk_grn_id_idx_idx` (`grn_id`),
  KEY `fk_dispatch_id_idx_idx` (`dp_id`),
  KEY `fk_season_id_idx` (`csn_id`),
  CONSTRAINT `fk_dispatch_id_idx` FOREIGN KEY (`dp_id`) REFERENCES `dispatch_dp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grn_id_idx` FOREIGN KEY (`grn_id`) REFERENCES `grn_gr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_material_id_idx` FOREIGN KEY (`mt_id`) REFERENCES `material_mt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seasons_id` FOREIGN KEY (`csn_id`) REFERENCES `coffee_seasons_csn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10789 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_mill_st`
--

LOCK TABLES `stock_mill_st` WRITE;
/*!40000 ALTER TABLE `stock_mill_st` DISABLE KEYS */;
INSERT INTO `stock_mill_st` VALUES (10788,2,1,1,1,NULL,2,NULL,'07NG0001','07NG0001/2',NULL,1,200,4.00,2.00,NULL,196,4,3,16,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-12 09:05:27','2018-11-12 09:48:55');
/*!40000 ALTER TABLE `stock_mill_st` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_qualty_details_sqltyd`
--

DROP TABLE IF EXISTS `stock_qualty_details_sqltyd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_qualty_details_sqltyd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) DEFAULT NULL,
  `cp_id` int(11) DEFAULT NULL,
  `sqltyd_acidity` decimal(18,2) DEFAULT NULL,
  `sqltyd_body` decimal(18,2) DEFAULT NULL,
  `sqltyd_flavour` decimal(18,2) DEFAULT NULL,
  `sqltyd_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `st_id` (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_qualty_details_sqltyd`
--

LOCK TABLES `stock_qualty_details_sqltyd` WRITE;
/*!40000 ALTER TABLE `stock_qualty_details_sqltyd` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_qualty_details_sqltyd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_st`
--

DROP TABLE IF EXISTS `stock_st`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_st` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `csn_id` int(11) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `st_outturn` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_coffee_type` int(11) DEFAULT NULL,
  `st_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prc_id` int(11) DEFAULT NULL,
  `sts_id` int(11) NOT NULL DEFAULT '1',
  `pr_id` int(11) DEFAULT NULL,
  `gr_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_ref_id` int(11) DEFAULT NULL,
  `st_dispatch_net` int(11) DEFAULT NULL,
  `st_gross` int(11) DEFAULT NULL,
  `st_tare` decimal(18,2) DEFAULT NULL,
  `st_moisture` decimal(18,2) DEFAULT NULL,
  `st_net_weight` int(11) DEFAULT NULL,
  `st_packages` int(11) DEFAULT NULL,
  `st_bags` int(11) DEFAULT NULL,
  `st_pockets` int(11) DEFAULT NULL,
  `pkg_id` int(11) DEFAULT NULL,
  `cgrad_id` int(11) DEFAULT NULL,
  `prt_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `ibs_id` int(11) DEFAULT NULL,
  `prc_price` decimal(18,10) DEFAULT NULL,
  `st_price` decimal(18,10) DEFAULT NULL,
  `st_value` decimal(18,10) DEFAULT NULL,
  `st_bric_value` decimal(18,10) DEFAULT NULL,
  `st_hedge` decimal(18,10) DEFAULT NULL,
  `st_diff` decimal(18,10) DEFAULT NULL,
  `br_id` int(11) DEFAULT NULL,
  `sl_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `st_ended_by` int(11) DEFAULT NULL,
  `st_quality_check` int(11) DEFAULT NULL,
  `st_rejected` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_credited` int(11) DEFAULT NULL,
  `st_weight_check` int(11) DEFAULT NULL,
  `st_additional_processed` int(11) DEFAULT NULL,
  `st_partial_delivery` int(11) DEFAULT NULL,
  `sct_id` int(11) DEFAULT NULL,
  `st_disposed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index3` (`csn_id`),
  KEY `prc_id_idx` (`prc_id`),
  KEY `pr_id_idx11` (`pr_id`),
  KEY `index2` (`gr_id`),
  KEY `fk_bs_id_st_idx` (`bs_id`),
  CONSTRAINT `prc_id` FOREIGN KEY (`prc_id`) REFERENCES `purchases_prc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_st`
--

LOCK TABLES `stock_st` WRITE;
/*!40000 ALTER TABLE `stock_st` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_st` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_status_sts`
--

DROP TABLE IF EXISTS `stock_status_sts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_status_sts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sts_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sts_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_status_sts`
--

LOCK TABLES `stock_status_sts` WRITE;
/*!40000 ALTER TABLE `stock_status_sts` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_status_sts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_warehouse_st`
--

DROP TABLE IF EXISTS `stock_warehouse_st`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_warehouse_st` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csn_id` int(11) DEFAULT NULL,
  `agt_id` int(11) DEFAULT NULL,
  `mt_id` int(10) DEFAULT NULL,
  `grn_id` int(11) DEFAULT NULL,
  `dp_id` int(11) DEFAULT NULL,
  `st_outturn` varchar(45) DEFAULT NULL,
  `st_mark` varchar(255) DEFAULT NULL,
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
  `warehouse_id` int(11) DEFAULT NULL,
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
  KEY `fk_material_id_idx` (`mt_id`),
  KEY `fk_grn_id_idx` (`grn_id`),
  KEY `fk_dispatch_id_idx` (`dp_id`),
  KEY `fk_season_id` (`csn_id`),
  CONSTRAINT `fk_dispatch_id` FOREIGN KEY (`dp_id`) REFERENCES `dispatch_dp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grn_id` FOREIGN KEY (`grn_id`) REFERENCES `grn_gr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_material_id` FOREIGN KEY (`mt_id`) REFERENCES `material_mt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_season_id` FOREIGN KEY (`csn_id`) REFERENCES `coffee_seasons_csn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_warehouse_st`
--

LOCK TABLES `stock_warehouse_st` WRITE;
/*!40000 ALTER TABLE `stock_warehouse_st` DISABLE KEYS */;
INSERT INTO `stock_warehouse_st` VALUES (1,2,4,5,1,NULL,'05NG0023','05NG0023/2',1,200,3.60,2.00,NULL,196,4,3,16,2,2,7,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-01 19:37:51','2018-11-11 00:08:18'),(5,2,NULL,6,1,NULL,'05NG0023','05NG0023/2',1,100,1.80,2.00,NULL,98,2,1,38,2,5,5,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-10 22:01:23','2018-11-11 00:08:55');
/*!40000 ALTER TABLE `stock_warehouse_st` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks_summary_ssm`
--

DROP TABLE IF EXISTS `stocks_summary_ssm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks_summary_ssm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssm_buyer` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssm_weight` int(11) DEFAULT NULL,
  `ssm_storage` int(11) DEFAULT NULL,
  `ssm_count` int(11) DEFAULT NULL,
  `ssm_average_storage` int(11) DEFAULT NULL,
  `ssm_value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks_summary_ssm`
--

LOCK TABLES `stocks_summary_ssm` WRITE;
/*!40000 ALTER TABLE `stocks_summary_ssm` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocks_summary_ssm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_settings_sys`
--

DROP TABLE IF EXISTS `system_settings_sys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_settings_sys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sys_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sys_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sys_active` int(11) NOT NULL DEFAULT '0',
  `sys_inv` int(11) NOT NULL DEFAULT '0',
  `sys_py` int(11) NOT NULL DEFAULT '0',
  `sys_bric` int(11) NOT NULL DEFAULT '0',
  `sys_pref` int(11) NOT NULL DEFAULT '0',
  `sys_war` int(11) NOT NULL DEFAULT '0',
  `sys_bs` int(11) NOT NULL DEFAULT '0',
  `sys_process_open` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_settings_sys`
--

LOCK TABLES `system_settings_sys` WRITE;
/*!40000 ALTER TABLE `system_settings_sys` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_settings_sys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams_tms`
--

DROP TABLE IF EXISTS `teams_tms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams_tms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tms_serviceprovider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tms_grpname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams_tms`
--

LOCK TABLES `teams_tms` WRITE;
/*!40000 ALTER TABLE `teams_tms` DISABLE KEYS */;
INSERT INTO `teams_tms` VALUES (1,'Cyka','Group 1',NULL,NULL),(2,'Cyka','Group 2',NULL,NULL),(3,'Cyka','Group 3',NULL,NULL),(4,'Cyka','Group 4',NULL,NULL),(5,'Cyka','Group 5',NULL,NULL),(6,'Cyka','Group 6',NULL,NULL),(7,'Cyka','Group 7',NULL,NULL);
/*!40000 ALTER TABLE `teams_tms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terms_tms`
--

DROP TABLE IF EXISTS `terms_tms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terms_tms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tms_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tms_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms_tms`
--

LOCK TABLES `terms_tms` WRITE;
/*!40000 ALTER TABLE `terms_tms` DISABLE KEYS */;
/*!40000 ALTER TABLE `terms_tms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thresholds_th`
--

DROP TABLE IF EXISTS `thresholds_th`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thresholds_th` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `it_id` int(11) DEFAULT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `th_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `th_percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thresholds_th`
--

LOCK TABLES `thresholds_th` WRITE;
/*!40000 ALTER TABLE `thresholds_th` DISABLE KEYS */;
INSERT INTO `thresholds_th` VALUES (1,1,1,'Moisture',12,NULL,NULL),(2,2,1,'Moisture',12,NULL,NULL),(3,3,1,'Moisture',12,NULL,NULL);
/*!40000 ALTER TABLE `thresholds_th` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transporters_trp`
--

DROP TABLE IF EXISTS `transporters_trp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transporters_trp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `trp_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `trp_initials` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trp_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_trp_country_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_trp_country_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transporters_trp`
--

LOCK TABLES `transporters_trp` WRITE;
/*!40000 ALTER TABLE `transporters_trp` DISABLE KEYS */;
INSERT INTO `transporters_trp` VALUES (1,1,'Jars Transporters Limited','Jars',NULL,'2017-01-04 07:31:43','2017-01-04 07:31:43'),(2,1,'Internal','Internal',NULL,'2017-05-02 07:51:25','2017-05-02 07:51:25'),(3,1,'Minah Enterprise','Minah',NULL,'2018-04-11 12:12:38','2018-04-11 12:12:38'),(5,1,'Barke Enterprises Ltd','Barke','','2018-09-11 13:31:14','2018-09-11 13:31:14');
/*!40000 ALTER TABLE `transporters_trp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trp_rates`
--

DROP TABLE IF EXISTS `trp_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trp_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wr_id` int(11) DEFAULT NULL,
  `trp_id` int(11) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `date_ended` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trp_rates`
--

LOCK TABLES `trp_rates` WRITE;
/*!40000 ALTER TABLE `trp_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `trp_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_usr`
--

DROP TABLE IF EXISTS `users_usr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_usr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_id` int(11) DEFAULT NULL,
  `usr_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usr_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `usr_edit_privilage` tinyint(1) NOT NULL,
  `usr_active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_usr_usr_email_unique` (`usr_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_usr`
--

LOCK TABLES `users_usr` WRITE;
/*!40000 ALTER TABLE `users_usr` DISABLE KEYS */;
INSERT INTO `users_usr` VALUES (1,1,'Admin','Admin','$2y$10$xEJ7EpsXxaHsdC1HtbZkV.X1S08F5OyJRt7RE.jBZhGb4s0kdxLPe',1,1,'nJRf4ExwmQ965EhaLFBfbgUHX14U4aAnq25YhMg7AukGdRYb2kFivVb3XD5z','2016-08-09 07:30:19','2018-10-30 14:29:39');
/*!40000 ALTER TABLE `users_usr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehoue_type_wrt`
--

DROP TABLE IF EXISTS `warehoue_type_wrt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehoue_type_wrt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wrt_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehoue_type_wrt`
--

LOCK TABLES `warehoue_type_wrt` WRITE;
/*!40000 ALTER TABLE `warehoue_type_wrt` DISABLE KEYS */;
/*!40000 ALTER TABLE `warehoue_type_wrt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_charges_wrch`
--

DROP TABLE IF EXISTS `warehouse_charges_wrch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_charges_wrch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_id` int(11) DEFAULT NULL,
  `chty_id` int(11) DEFAULT NULL,
  `chty_rate` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_charges_wrch`
--

LOCK TABLES `warehouse_charges_wrch` WRITE;
/*!40000 ALTER TABLE `warehouse_charges_wrch` DISABLE KEYS */;
/*!40000 ALTER TABLE `warehouse_charges_wrch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_wr`
--

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

--
-- Dumping data for table `warehouse_wr`
--

LOCK TABLES `warehouse_wr` WRITE;
/*!40000 ALTER TABLE `warehouse_wr` DISABLE KEYS */;
INSERT INTO `warehouse_wr` VALUES (37,1,2,'NKG KENYA','NKG','NKG','Jane','2016-11-30 11:32:16','2016-11-30 11:32:16'),(38,1,2,'BOLLORE','SDV','SDV','Jackie','2017-01-26 08:27:30','2017-01-26 08:27:30'),(39,1,2,'CAFE LOGISTICS','CL','CLL',NULL,'2017-01-26 08:27:30','2017-01-26 08:27:30'),(40,1,2,'KENBELT','KB','KB','Mutune','2017-01-26 08:27:30','2017-01-26 08:27:30'),(41,1,2,'CENTRAL KENYA COFFEE MILL','CK','CK',NULL,'2017-01-26 08:27:30','2017-01-26 08:27:30'),(42,1,2,'KOFINAF COFFEE MILL','KF','KF',NULL,'2017-01-26 08:27:30','2017-01-26 08:27:30'),(43,1,2,'THIKA COFFEE MILLS','TCM','TCM','Joan','2017-05-08 07:44:05','2017-05-08 07:44:05'),(44,1,1,'NKG MILL EXPORT ','ME','ME',NULL,'2017-06-02 06:50:19','2017-06-02 06:50:19'),(45,1,1,'IBERO EXPORT','IE','IE',NULL,'2017-08-23 12:49:31','2017-08-23 12:49:31'),(46,1,2,'OTHER',NULL,NULL,NULL,'2018-02-19 08:07:40','2018-02-19 08:07:40'),(47,1,2,'CMS','CMS',NULL,NULL,'2018-03-27 06:49:50','2018-03-27 06:49:50'),(48,1,2,'TATU CITY COFFEE PARK','TCCP',NULL,'Wekesa','2018-04-04 11:59:29','2018-04-04 11:59:29');
/*!40000 ALTER TABLE `warehouse_wr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warrants_war`
--

DROP TABLE IF EXISTS `warrants_war`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warrants_war` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `war_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `war_date` date DEFAULT NULL,
  `war_weight` int(11) DEFAULT NULL,
  `war_confirmedby` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `war_comments` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warrants_war`
--

LOCK TABLES `warrants_war` WRITE;
/*!40000 ALTER TABLE `warrants_war` DISABLE KEYS */;
/*!40000 ALTER TABLE `warrants_war` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weighbridge_info_wbi`
--

DROP TABLE IF EXISTS `weighbridge_info_wbi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weighbridge_info_wbi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `csn_id` int(11) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `slr_id` int(11) DEFAULT NULL,
  `wbi_ticket` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wbi_delivery_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wbi_vehicle_plate` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wbi_weight_in` int(11) DEFAULT NULL,
  `wbi_weight_out` int(11) DEFAULT NULL,
  `wbi_confirmedby` int(11) DEFAULT NULL,
  `wbi_time_in` datetime DEFAULT NULL,
  `wbi_time_out` datetime DEFAULT NULL,
  `wbi_movement_permit` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wbi_driver_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wbi_driver_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wbi_dispatch_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rgn_id` int(10) unsigned NOT NULL,
  `bkg_id` int(10) unsigned NOT NULL,
  `trp_id` int(10) unsigned NOT NULL,
  `wbi_representative_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wbi_representative_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pl_id` int(10) DEFAULT NULL,
  `wb_id` int(10) DEFAULT NULL,
  `wbi_document_unit` int(10) DEFAULT NULL,
  `wbi_document_quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weighbridge_info_wbi`
--

LOCK TABLES `weighbridge_info_wbi` WRITE;
/*!40000 ALTER TABLE `weighbridge_info_wbi` DISABLE KEYS */;
INSERT INTO `weighbridge_info_wbi` VALUES (1,NULL,NULL,NULL,NULL,'0000001','123456','KCQ 771S',1000,NULL,1,'2018-11-12 14:35:00',NULL,'123456','MIKE PETER','123456','2018-10-30',NULL,'2018-10-30 12:58:44',1,3,1,'Lewis','122222',2,1,27,1300);
/*!40000 ALTER TABLE `weighbridge_info_wbi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weighbridge_wb`
--

DROP TABLE IF EXISTS `weighbridge_wb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weighbridge_wb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rgn_id` int(10) unsigned NOT NULL,
  `wb_number` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weighbridge_wb`
--

LOCK TABLES `weighbridge_wb` WRITE;
/*!40000 ALTER TABLE `weighbridge_wb` DISABLE KEYS */;
INSERT INTO `weighbridge_wb` VALUES (1,1,1,'2018-10-30 09:13:26','2018-10-30 09:13:26');
/*!40000 ALTER TABLE `weighbridge_wb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weight_note_wn`
--

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

--
-- Dumping data for table `weight_note_wn`
--

LOCK TABLES `weight_note_wn` WRITE;
/*!40000 ALTER TABLE `weight_note_wn` DISABLE KEYS */;
INSERT INTO `weight_note_wn` VALUES (2,'0000001',1,19,17,NULL,993,2,4,249,904,8,29,'SPRING VALLEY DISPATCH.','2018-10-16 12:25:13','2018-10-16 12:26:46'),(3,'0000002',1,1,2,NULL,1416,2,4,242,904,8,29,'SPRING VALLEY DISPATCH.','2018-10-16 12:34:47','2018-10-16 12:36:09'),(4,'0000003',1,NULL,NULL,NULL,1589,9,160,9772,0,8,29,'stuffing SI2049','2018-10-16 15:34:54','2018-10-16 15:34:54'),(5,'0000004',1,NULL,NULL,NULL,1589,9,160,9779,0,7,29,'stuffing  si2049','2018-10-16 16:36:03','2018-10-16 16:36:03'),(6,'0000005',1,13,9,NULL,1329,2,120,7310,906,8,11,'DISPATCH TO BOLLORE.','2018-10-17 06:12:26','2018-10-17 06:13:02'),(7,'0000006',1,13,9,NULL,1329,2,65,3962,906,5,11,'DISPATCH TO BOLLORE.','2018-10-17 06:25:55','2018-10-17 06:29:30'),(8,'0000007',1,13,9,NULL,1329,2,120,7310,913,8,11,'DISPATCH TO BOLLORE.','2018-10-17 14:14:05','2018-10-17 14:14:32'),(9,'0000008',1,13,9,NULL,1329,2,65,3960,913,5,11,'DISPATCH TO BOLLORE.','2018-10-17 14:28:46','2018-10-17 14:29:10'),(10,'0000009',1,14,22,NULL,1379,2,125,7571,916,5,11,'DISPATCH TO BOLLORE.','2018-10-18 09:39:16','2018-10-18 09:53:19'),(11,'0000010',1,NULL,NULL,NULL,1379,2,125,7585,916,8,11,'DISPATCH TO BOLLORE.','2018-10-18 09:54:43','2018-10-18 09:54:43'),(12,'0000011',1,2,0,NULL,1537,2,160,9722,918,8,29,'STUFFING.','2018-10-18 11:57:01','2018-10-18 11:57:43'),(13,'0000012',1,NULL,NULL,NULL,1537,2,160,9718,918,8,29,'STUFFING.','2018-10-18 12:58:24','2018-10-18 12:58:24'),(14,'0000013',1,NULL,NULL,NULL,1521,2,180,10952,1,8,29,'bulking','2018-10-19 08:19:51','2018-10-19 08:19:51'),(15,'0000014',1,NULL,NULL,NULL,1521,2,180,10964,1,7,29,'BULKIING','2018-10-19 09:00:45','2018-10-19 09:00:45'),(16,'0000015',1,NULL,NULL,NULL,1521,2,180,10956,0,8,29,'bulking','2018-10-19 11:21:19','2018-10-19 11:21:19'),(17,'0000016',1,NULL,NULL,NULL,1521,2,185,10991,0,8,29,'bulking','2018-10-19 13:09:44','2018-10-19 13:09:44'),(20,'0000017',1,NULL,NULL,NULL,1375,2,125,7619,922,7,5,'COLOUR SORTING AT BOLLORE','2018-10-22 06:13:29','2018-10-22 06:13:29'),(21,'0000018',1,NULL,NULL,9061,NULL,2,125,7620,922,8,5,'COLOUR SORTING AT BOLLORE','2018-10-22 06:34:18','2018-10-22 06:34:18'),(22,'0000019',1,0,0,9061,NULL,2,125,7592,923,7,5,'COLOUR SORTING  AT BOLLORE','2018-10-22 07:32:22','2018-10-22 07:32:29'),(23,'0000020',1,NULL,NULL,9061,NULL,2,127,7738,923,8,5,'COLOUR SORTING AT BOLLORE','2018-10-22 07:51:14','2018-10-22 07:51:14'),(24,'0000021',1,NULL,NULL,9061,NULL,2,127,7738,924,8,5,'COLOUR SORTING AT BOLLORE','2018-10-22 11:45:23','2018-10-22 11:45:23'),(25,'0000022',1,NULL,NULL,9061,NULL,2,123,7503,924,7,5,'COLOUR SORTING AT BOLLORE','2018-10-22 11:58:49','2018-10-22 11:58:49'),(26,'0000023',1,NULL,NULL,9061,NULL,2,135,8207,925,8,5,'COLOUR SORTING AT BOLLORE','2018-10-23 06:33:09','2018-10-23 06:33:09'),(27,'0000024',1,NULL,NULL,9061,NULL,2,50,3038,0,8,5,'COLOUR SORTING AT BOLLORE','2018-10-23 07:22:02','2018-10-23 07:22:02'),(28,'0000025',1,NULL,NULL,NULL,1558,2,200,12160,1,7,5,'BULKING','2018-10-23 07:30:10','2018-10-23 07:30:10'),(29,'0000026',1,NULL,NULL,9061,NULL,2,127,7742,926,8,5,'COLOUR SORTING AT BOLLORE','2018-10-23 07:52:28','2018-10-23 07:52:28'),(30,'0000027',1,NULL,NULL,9061,NULL,2,70,4269,926,8,5,'COLOUR SORTING AT BOLLORE','2018-10-23 08:32:48','2018-10-23 08:32:48'),(31,'0000028',1,NULL,NULL,NULL,1558,2,160,9735,1,7,5,'bulking','2018-10-23 08:48:27','2018-10-23 08:48:27'),(32,'0000029',1,NULL,NULL,7482,NULL,2,53,3216,926,8,5,'COLOUR SORTING AT BOLLORE','2018-10-23 09:10:07','2018-10-23 09:10:07'),(33,'0000030',1,NULL,NULL,NULL,1558,2,200,12159,1,8,29,'bulking','2018-10-23 10:04:06','2018-10-23 10:04:06'),(35,'0000031',1,NULL,NULL,7482,NULL,2,159,9672,927,7,5,'COLOUR SORTING AT BOLLORE','2018-10-23 11:21:21','2018-10-23 11:21:21'),(36,'0000032',1,NULL,NULL,9060,NULL,2,5,303,928,8,5,'LOADING SPRING VALLEY','2018-10-23 12:12:23','2018-10-23 12:12:23'),(37,'0000033',1,NULL,NULL,7482,NULL,2,159,9689,927,7,5,'COLOUR SORTING AT BOLLORE','2018-10-23 12:15:55','2018-10-23 12:15:55'),(38,'0000034',1,NULL,NULL,5254,NULL,2,3,183,928,7,5,'LOADING SPRING VALLEY','2018-10-23 12:35:04','2018-10-23 12:35:04'),(39,'0000035',1,NULL,NULL,NULL,1558,2,160,9732,1,8,5,'BULKING','2018-10-23 12:54:37','2018-10-23 12:54:37'),(40,'0000036',1,NULL,NULL,7482,NULL,2,92,5596,927,7,5,'COLOUR SORTING AT BOLLORE','2018-10-23 12:58:10','2018-10-23 12:58:10'),(41,'0000037',1,NULL,NULL,NULL,1558,2,200,12165,1,8,5,'bulking','2018-10-23 14:22:56','2018-10-23 14:22:56'),(42,'0000038',1,2,0,NULL,1558,2,200,12165,1,8,5,'bulking kdi 1475','2018-10-23 14:51:39','2018-10-23 14:56:52'),(43,'0000039',1,NULL,NULL,NULL,1558,2,200,12180,1,7,29,'bulking','2018-10-24 05:56:46','2018-10-24 05:56:46'),(44,'0000040',1,NULL,NULL,NULL,1080,2,120,7304,934,8,11,'DISPATCHING TO BOLLORE.','2018-10-24 08:07:04','2018-10-24 08:07:04'),(45,'0000041',1,NULL,NULL,NULL,1080,2,65,3954,934,8,11,'DISPATCHING TO BOLLORE.','2018-10-24 08:36:22','2018-10-24 08:36:22'),(46,'0000042',1,NULL,NULL,NULL,1558,2,172,9799,1,8,11,'bulking','2018-10-24 09:18:41','2018-10-24 09:18:41'),(47,'0000043',1,NULL,NULL,7482,NULL,2,125,7633,935,7,11,'bollore for cs','2018-10-24 11:42:49','2018-10-24 11:42:49'),(48,'0000044',1,NULL,NULL,7482,NULL,2,125,7614,935,8,11,'COLOUR SORTING AT BOLLORE','2018-10-24 11:53:10','2018-10-24 11:53:10'),(49,'0000045',1,13,9,NULL,1080,2,148,9021,936,8,11,'DISPATCHING TO BOLLORE.','2018-10-25 07:07:05','2018-10-25 07:07:42'),(50,'0000046',1,13,9,NULL,1080,2,102,6221,936,5,11,'DISPATCHING TO BOLLORE.','2018-10-25 07:18:38','2018-10-25 07:19:20'),(51,'0000047',1,0,0,NULL,1599,2,200,12194,1,7,11,'bulking','2018-10-25 08:40:47','2018-10-25 08:41:46'),(52,'0000048',1,13,9,NULL,1080,2,125,7617,937,8,11,'DISPATCHING TO BOLLORE.','2018-10-25 09:08:33','2018-10-25 09:23:08'),(53,'0000049',1,13,9,NULL,1080,2,125,7611,937,8,11,'DISPATCHING TO BOLLORE.','2018-10-25 09:51:48','2018-10-25 09:57:45'),(54,'0000050',1,2,0,NULL,1623,2,160,9727,1,5,11,'STUFFING.','2018-10-25 10:13:42','2018-10-25 10:14:11'),(55,'0000051',1,NULL,NULL,NULL,1623,2,160,9721,1,8,11,'STUFFING.','2018-10-25 10:25:09','2018-10-25 10:25:09'),(56,'0000052',1,NULL,NULL,NULL,1599,2,200,12195,1,8,11,'bulking','2018-10-25 11:44:45','2018-10-25 11:44:45'),(57,'0000053',1,13,9,NULL,1080,2,125,7617,938,5,11,'DISPATCHING TO BOLLORE.','2018-10-25 11:59:10','2018-10-25 11:59:47'),(58,'0000054',1,13,9,NULL,1080,2,70,4187,938,5,11,'DISPATCHING TO BOLLORE.','2018-10-25 12:48:19','2018-10-25 12:48:51'),(59,'0000055',1,NULL,NULL,NULL,1599,2,164,9906,1,8,11,'BULKING','2018-10-25 13:00:26','2018-10-25 13:00:26'),(60,'0000056',1,13,9,NULL,1375,2,56,3416,938,7,11,'DISPATCHING TO BOLLORE.','2018-10-25 13:30:27','2018-10-25 13:31:14'),(61,'0000057',1,NULL,NULL,NULL,1525,2,200,12154,1,8,29,'stuffing','2018-10-25 13:54:43','2018-10-25 13:54:43'),(62,'0000058',1,13,0,9061,NULL,2,125,7595,939,5,11,'DISPATCHING TO BOLLORE.','2018-10-25 14:10:00','2018-10-25 14:10:22'),(63,'0000059',1,NULL,NULL,9061,NULL,2,125,0,939,0,11,'DISPATCHING TO BOLLORE.','2018-10-25 14:23:15','2018-10-25 14:23:15'),(64,'0000060',1,NULL,NULL,NULL,1525,2,120,7285,1,8,11,'stuffing SI2062','2018-10-25 14:35:24','2018-10-25 14:35:24'),(65,'0000061',1,13,9,NULL,1375,2,125,7621,939,5,11,'DISPATCHING TO BOLLORE.','2018-10-25 14:51:05','2018-10-25 14:51:48'),(66,'0000062',1,13,9,NULL,1375,2,133,8107,940,8,11,'DISPATCHING TO BOLLORE.','2018-10-25 15:23:26','2018-10-25 15:24:15'),(67,'0000063',1,13,9,NULL,1375,2,117,7126,940,5,11,'DISPATCHING TO BOLLORE.','2018-10-25 15:40:01','2018-10-25 15:40:34');
/*!40000 ALTER TABLE `weight_note_wn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weight_scales_ws`
--

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

--
-- Dumping data for table `weight_scales_ws`
--

LOCK TABLES `weight_scales_ws` WRITE;
/*!40000 ALTER TABLE `weight_scales_ws` DISABLE KEYS */;
INSERT INTO `weight_scales_ws` VALUES (7,1,'7','St 7/Dini Argeo 1',9600,0,1,8,'COM1','2018-11-12 09:12:35',NULL),(8,1,'7','St 7/Dini Argeo 2',9600,0,1,8,'COM8','2018-11-12 09:12:35',NULL),(10,1,'1','Test Indicator',9600,0,1,8,'COM8','2018-11-12 09:12:35','2018-08-09 11:32:36');
/*!40000 ALTER TABLE `weight_scales_ws` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wr_rates`
--

DROP TABLE IF EXISTS `wr_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wr_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wr_id` int(11) DEFAULT NULL,
  `storage_rate` double DEFAULT NULL,
  `handling_bag_rate` double DEFAULT NULL,
  `warrant_rate` double DEFAULT NULL,
  `date_ended` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wr_rates`
--

LOCK TABLES `wr_rates` WRITE;
/*!40000 ALTER TABLE `wr_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `wr_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `years_yr`
--

DROP TABLE IF EXISTS `years_yr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `years_yr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yr_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yr_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `years_yr`
--

LOCK TABLES `years_yr` WRITE;
/*!40000 ALTER TABLE `years_yr` DISABLE KEYS */;
/*!40000 ALTER TABLE `years_yr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ngea_db'
--

--
-- Dumping routines for database 'ngea_db'
--

--
-- Final view structure for view `booking`
--

/*!50001 DROP VIEW IF EXISTS `booking`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `booking` AS select `bkg`.`id` AS `id`,`bkg`.`bkg_ref_no` AS `ref_no`,right(`bkg`.`bkg_ref_no`,7) AS `previous_no`,`cgr`.`cgr_grower` AS `cgr_grower`,`cgr`.`cgr_code` AS `cgr_code`,`cgr`.`cgr_mark` AS `cgr_mark`,`agt`.`id` AS `agtid`,`agt`.`agt_name` AS `agt_name`,`bkg`.`bkg_delivery_date` AS `delivery_date` from ((`booking_bkg` `bkg` left join `coffee_growers_cgr` `cgr` on((`cgr`.`id` = `bkg`.`cgr_id`))) left join `agent_agt` `agt` on((`agt`.`id` = `bkg`.`agt_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `booking_items`
--

/*!50001 DROP VIEW IF EXISTS `booking_items`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `booking_items` AS select `bki`.`id` AS `id`,`bkg`.`id` AS `bkgid`,`bkg`.`bkg_ref_no` AS `ref_no`,`pty`.`pty_name` AS `pty_name`,`bki`.`bki_bags` AS `bags` from ((`booking_items_bki` `bki` left join `booking_bkg` `bkg` on((`bkg`.`id` = `bki`.`bkg_id`))) left join `parchment_type_pty` `pty` on((`pty`.`id` = `bki`.`pty_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `highest_batch`
--

/*!50001 DROP VIEW IF EXISTS `highest_batch`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `highest_batch` AS select max(`sloc`.`id`) AS `slocid`,`btc`.`id` AS `id` from (`batch_btc` `btc` join `stock_location_sloc` `sloc` on((`btc`.`id` = `sloc`.`bt_id`))) group by `btc`.`id` order by max(`sloc`.`id`) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_locations`
--

/*!50001 DROP VIEW IF EXISTS `stock_locations`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_locations` AS select `btc`.`id` AS `id`,`sloc`.`id` AS `slocid`,`btc`.`btc_number` AS `btc_number`,`btc`.`btc_instructed_by` AS `btc_instructed_by`,`st`.`id` AS `stid`,`st`.`prc_id` AS `prc_id`,`st`.`gr_id` AS `gr_id`,`st`.`st_name` AS `name`,ifnull(`cgrad`.`cgrad_name`,convert(`prt`.`prt_name` using utf8)) AS `grade`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`pkg`.`pkg_name` AS `pkg_name`,ifnull(`insloc`.`insloc_weight`,`btc`.`btc_net_weight`) AS `btc_weight`,floor((ifnull(`insloc`.`insloc_weight`,`btc`.`btc_net_weight`) / 60)) AS `btc_bags`,floor((ifnull(`insloc`.`insloc_weight`,`btc`.`btc_net_weight`) % 60)) AS `btc_pockets`,`btc`.`btc_tare` AS `btc_tare`,`btc`.`btc_net_weight` AS `btc_net_weight`,`btc`.`btc_packages` AS `btc_packages`,`wr`.`id` AS `wrid`,`loc_row`.`id` AS `loc_rowid`,`loc_column`.`id` AS `loc_columnid`,`loc_row`.`loc_row` AS `loc_row`,`loc_column`.`loc_column` AS `loc_column`,`sloc`.`btc_zone` AS `btc_zone`,`wr`.`wr_name` AS `wr_name`,`new_loc_row`.`loc_row` AS `new_loc_row`,`new_loc_column`.`loc_column` AS `new_loc_column`,`insloc`.`btc_zone` AS `new_zone`,`new_wr`.`wr_name` AS `new_wr_name`,concat(max(`new_wr`.`wr_name`),'-',max(`new_loc_row`.`loc_row`),max(`new_loc_column`.`loc_column`),max(`insloc`.`btc_zone`)) AS `new_location`,`insloc`.`insloc_reason` AS `reason`,`insloc`.`insloc_ref` AS `insloc_ref`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,`mit`.`mit_name` AS `mit_name` from ((((((((((((((((((((`batch_btc` `btc` left join `highest_batch` `hb` on((`hb`.`id` = `btc`.`id`))) left join `stock_st` `st` on((`st`.`id` = `btc`.`st_id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_sloc` `sloc` on((`sloc`.`id` = `hb`.`slocid`))) left join `location_loc` `loc_row` on((`loc_row`.`id` = `sloc`.`loc_row_id`))) left join `location_loc` `loc_column` on((`loc_column`.`id` = `sloc`.`loc_column_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `loc_column`.`agt_id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `packaging_pkg` `pkg` on((`pkg`.`id` = `st`.`pkg_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `st`.`cgrad_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `instructed_stock_location_insloc` `insloc` on((`insloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `new_loc_row` on((`new_loc_row`.`id` = `insloc`.`loc_row_id`))) left join `location_loc` `new_loc_column` on((`new_loc_column`.`id` = `insloc`.`loc_column_id`))) left join `warehouse_wr` `new_wr` on((`new_wr`.`id` = `new_loc_column`.`agt_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `instructed_location_ref_ilf` `ilf` on((`ilf`.`id` = `insloc`.`ilf_id`))) left join `movement_instruction_type_mit` `mit` on((`mit`.`id` = `ilf`.`mit_id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) where (isnull(`btc`.`btc_ended_by`) and (`st`.`id` is not null)) group by `st`.`id`,`wr`.`wr_name`,`loc_row`.`loc_row`,`loc_column`.`loc_column`,`sloc`.`btc_zone`,`btc`.`id` order by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`),`st`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-12 12:51:47
