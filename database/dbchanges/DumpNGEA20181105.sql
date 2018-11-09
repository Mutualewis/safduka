-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: ngea_db
-- ------------------------------------------------------
-- Server version	5.7.23

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
CREATE DATABASE ngea_db;

USE ngea_db;
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
) ENGINE=InnoDB AUTO_INCREMENT=1117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,1,'Inserted menu information for menu booking url booking level 2 user 1','::1','2018-10-22 12:52:17','2018-10-22 12:52:17'),(2,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(3,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(4,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(5,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(6,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(7,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(8,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(9,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(10,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(11,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(12,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(13,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(14,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(15,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(16,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(17,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(18,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(19,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(20,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(21,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(22,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(23,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(24,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(25,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(26,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(27,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(28,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(29,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-24 06:22:54','2018-10-24 06:22:54'),(30,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(31,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(32,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(33,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(34,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(35,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(36,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(37,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(38,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(39,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(40,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(41,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(42,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(43,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(44,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(45,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(46,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(47,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(48,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(49,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(50,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(51,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(52,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(53,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(54,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(55,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(56,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(57,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-24 06:27:53','2018-10-24 06:27:53'),(58,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(59,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(60,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(61,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(62,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(63,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(64,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(65,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(66,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(67,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(68,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(69,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(70,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(71,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(72,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(73,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(74,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(75,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(76,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(77,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(78,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(79,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(80,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(81,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(82,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(83,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(84,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(85,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(86,1,'Inserted grower certification details for grower id1928 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(87,1,'Inserted grower certification details for grower id1928 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(88,1,'Inserted grower certification details for grower id1928 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(89,1,'Inserted grower certification details for grower id1928 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(90,1,'Inserted grower certification details for grower id77 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(91,1,'Inserted grower certification details for grower id102 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(92,1,'Inserted grower certification details for grower id102 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(93,1,'Inserted grower certification details for grower id102 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(94,1,'Inserted grower certification details for grower id102 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(95,1,'Inserted grower certification details for grower id79 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(96,1,'Inserted grower certification details for grower id79 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(97,1,'Inserted grower certification details for grower id79 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(98,1,'Inserted grower certification details for grower id79 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(99,1,'Inserted grower certification details for grower id61 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(100,1,'Inserted grower certification details for grower id61 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(101,1,'Inserted grower certification details for grower id61 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(102,1,'Inserted grower certification details for grower id61 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(103,1,'Inserted grower certification details for grower id45 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(104,1,'Inserted grower certification details for grower id45 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(105,1,'Inserted grower certification details for grower id45 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(106,1,'Inserted grower certification details for grower id45 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(107,1,'Inserted grower certification details for grower id2543 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(108,1,'Inserted grower certification details for grower id2543 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(109,1,'Inserted grower certification details for grower id29 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(110,1,'Inserted grower certification details for grower id29 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(111,1,'Inserted grower certification details for grower id29 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(112,1,'Inserted grower certification details for grower id29 cert id 6','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(113,1,'Inserted grower certification details for grower id1796 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(114,1,'Inserted grower certification details for grower id205 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(115,1,'Inserted grower certification details for grower id206 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(116,1,'Inserted grower certification details for grower id207 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(117,1,'Inserted grower certification details for grower id208 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(118,1,'Inserted grower certification details for grower id209 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(119,1,'Inserted grower certification details for grower id210 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(120,1,'Inserted grower certification details for grower id211 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(121,1,'Inserted grower certification details for grower id212 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(122,1,'Inserted grower certification details for grower id213 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(123,1,'Inserted grower certification details for grower id214 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(124,1,'Inserted grower certification details for grower id215 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(125,1,'Inserted grower certification details for grower id216 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(126,1,'Inserted grower certification details for grower id217 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(127,1,'Inserted grower certification details for grower id2057 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(128,1,'Inserted grower certification details for grower id227 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(129,1,'Inserted grower certification details for grower id227 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(130,1,'Inserted grower certification details for grower id229 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(131,1,'Inserted grower certification details for grower id229 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(132,1,'Inserted grower certification details for grower id230 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(133,1,'Inserted grower certification details for grower id230 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(134,1,'Inserted grower certification details for grower id1963 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(135,1,'Inserted grower certification details for grower id1964 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(136,1,'Inserted grower certification details for grower id1965 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(137,1,'Inserted grower certification details for grower id1966 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(138,1,'Inserted grower certification details for grower id1967 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(139,1,'Inserted grower certification details for grower id237 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(140,1,'Inserted grower certification details for grower id244 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(141,1,'Inserted grower certification details for grower id2105 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(142,1,'Inserted grower certification details for grower id2106 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(143,1,'Inserted grower certification details for grower id2107 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(144,1,'Inserted grower certification details for grower id2108 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(145,1,'Inserted grower certification details for grower id2109 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(146,1,'Inserted grower certification details for grower id2110 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(147,1,'Inserted grower certification details for grower id2110 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(148,1,'Inserted grower certification details for grower id2174 cert id 2','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(149,1,'Inserted grower certification details for grower id259 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(150,1,'Inserted grower certification details for grower id260 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(151,1,'Inserted grower certification details for grower id261 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(152,1,'Inserted grower certification details for grower id262 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(153,1,'Inserted grower certification details for grower id263 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(154,1,'Inserted grower certification details for grower id264 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(155,1,'Inserted grower certification details for grower id265 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(156,1,'Inserted grower certification details for grower id266 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(157,1,'Inserted grower certification details for grower id267 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(158,1,'Inserted grower certification details for grower id268 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(159,1,'Inserted grower certification details for grower id269 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(160,1,'Inserted grower certification details for grower id270 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(161,1,'Inserted grower certification details for grower id246 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(162,1,'Inserted grower certification details for grower id247 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(163,1,'Inserted grower certification details for grower id248 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(164,1,'Inserted grower certification details for grower id249 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(165,1,'Inserted grower certification details for grower id250 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(166,1,'Inserted grower certification details for grower id251 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(167,1,'Inserted grower certification details for grower id252 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(168,1,'Inserted grower certification details for grower id253 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(169,1,'Inserted grower certification details for grower id254 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(170,1,'Inserted grower certification details for grower id255 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(171,1,'Inserted grower certification details for grower id256 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(172,1,'Inserted grower certification details for grower id257 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(173,1,'Inserted grower certification details for grower id258 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(174,1,'Inserted grower certification details for grower id2075 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(175,1,'Inserted grower certification details for grower id2083 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(176,1,'Inserted grower certification details for grower id271 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(177,1,'Inserted grower certification details for grower id272 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(178,1,'Inserted grower certification details for grower id273 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(179,1,'Inserted grower certification details for grower id274 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(180,1,'Inserted grower certification details for grower id275 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(181,1,'Inserted grower certification details for grower id276 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(182,1,'Inserted grower certification details for grower id277 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(183,1,'Inserted grower certification details for grower id278 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(184,1,'Inserted grower certification details for grower id279 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(185,1,'Inserted grower certification details for grower id280 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(186,1,'Inserted grower certification details for grower id283 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(187,1,'Inserted grower certification details for grower id284 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(188,1,'Inserted grower certification details for grower id285 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(189,1,'Inserted grower certification details for grower id1884 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(190,1,'Inserted grower certification details for grower id1885 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(191,1,'Inserted grower certification details for grower id315 cert id 3','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(192,1,'Inserted grower certification details for grower id315 cert id 4','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(193,1,'Inserted grower certification details for grower id319 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(194,1,'Inserted grower certification details for grower id320 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(195,1,'Inserted grower certification details for grower id321 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(196,1,'Inserted grower certification details for grower id1809 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(197,1,'Inserted grower certification details for grower id1810 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(198,1,'Inserted grower certification details for grower id1811 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(199,1,'Inserted grower certification details for grower id1812 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(200,1,'Inserted grower certification details for grower id327 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(201,1,'Inserted grower certification details for grower id328 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(202,1,'Inserted grower certification details for grower id329 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(203,1,'Inserted grower certification details for grower id1815 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(204,1,'Inserted grower certification details for grower id1816 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(205,1,'Inserted grower certification details for grower id1817 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(206,1,'Inserted grower certification details for grower id330 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(207,1,'Inserted grower certification details for grower id331 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(208,1,'Inserted grower certification details for grower id332 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(209,1,'Inserted grower certification details for grower id333 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(210,1,'Inserted grower certification details for grower id334 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(211,1,'Inserted grower certification details for grower id335 cert id 5','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(212,1,'Uploaded grower details user1','::1','2018-10-24 09:49:18','2018-10-24 09:49:18'),(213,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(214,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(215,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(216,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(217,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(218,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(219,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(220,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(221,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(222,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(223,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(224,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(225,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(226,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(227,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(228,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(229,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(230,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(231,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(232,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(233,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(234,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(235,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(236,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(237,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(238,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(239,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(240,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(241,1,'Inserted grower certification details for grower id1928 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(242,1,'Inserted grower certification details for grower id1928 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(243,1,'Inserted grower certification details for grower id1928 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(244,1,'Inserted grower certification details for grower id1928 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(245,1,'Inserted grower certification details for grower id77 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(246,1,'Inserted grower certification details for grower id102 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(247,1,'Inserted grower certification details for grower id102 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(248,1,'Inserted grower certification details for grower id102 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(249,1,'Inserted grower certification details for grower id102 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(250,1,'Inserted grower certification details for grower id79 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(251,1,'Inserted grower certification details for grower id79 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(252,1,'Inserted grower certification details for grower id79 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(253,1,'Inserted grower certification details for grower id79 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(254,1,'Inserted grower certification details for grower id61 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(255,1,'Inserted grower certification details for grower id61 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(256,1,'Inserted grower certification details for grower id61 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(257,1,'Inserted grower certification details for grower id61 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(258,1,'Inserted grower certification details for grower id45 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(259,1,'Inserted grower certification details for grower id45 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(260,1,'Inserted grower certification details for grower id45 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(261,1,'Inserted grower certification details for grower id45 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(262,1,'Inserted grower certification details for grower id2543 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(263,1,'Inserted grower certification details for grower id2543 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(264,1,'Inserted grower certification details for grower id29 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(265,1,'Inserted grower certification details for grower id29 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(266,1,'Inserted grower certification details for grower id29 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(267,1,'Inserted grower certification details for grower id29 cert id 6','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(268,1,'Inserted grower certification details for grower id1796 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(269,1,'Inserted grower certification details for grower id205 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(270,1,'Inserted grower certification details for grower id206 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(271,1,'Inserted grower certification details for grower id207 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(272,1,'Inserted grower certification details for grower id208 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(273,1,'Inserted grower certification details for grower id209 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(274,1,'Inserted grower certification details for grower id210 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(275,1,'Inserted grower certification details for grower id211 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(276,1,'Inserted grower certification details for grower id212 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(277,1,'Inserted grower certification details for grower id213 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(278,1,'Inserted grower certification details for grower id214 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(279,1,'Inserted grower certification details for grower id215 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(280,1,'Inserted grower certification details for grower id216 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(281,1,'Inserted grower certification details for grower id217 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(282,1,'Inserted grower certification details for grower id2057 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(283,1,'Inserted grower certification details for grower id227 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(284,1,'Inserted grower certification details for grower id227 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(285,1,'Inserted grower certification details for grower id229 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(286,1,'Inserted grower certification details for grower id229 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(287,1,'Inserted grower certification details for grower id230 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(288,1,'Inserted grower certification details for grower id230 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(289,1,'Inserted grower certification details for grower id1963 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(290,1,'Inserted grower certification details for grower id1964 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(291,1,'Inserted grower certification details for grower id1965 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(292,1,'Inserted grower certification details for grower id1966 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(293,1,'Inserted grower certification details for grower id1967 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(294,1,'Inserted grower certification details for grower id237 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(295,1,'Inserted grower certification details for grower id244 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(296,1,'Inserted grower certification details for grower id2105 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(297,1,'Inserted grower certification details for grower id2106 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(298,1,'Inserted grower certification details for grower id2107 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(299,1,'Inserted grower certification details for grower id2108 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(300,1,'Inserted grower certification details for grower id2109 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(301,1,'Inserted grower certification details for grower id2110 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(302,1,'Inserted grower certification details for grower id2110 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(303,1,'Inserted grower certification details for grower id2174 cert id 2','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(304,1,'Inserted grower certification details for grower id259 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(305,1,'Inserted grower certification details for grower id260 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(306,1,'Inserted grower certification details for grower id261 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(307,1,'Inserted grower certification details for grower id262 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(308,1,'Inserted grower certification details for grower id263 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(309,1,'Inserted grower certification details for grower id264 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(310,1,'Inserted grower certification details for grower id265 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(311,1,'Inserted grower certification details for grower id266 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(312,1,'Inserted grower certification details for grower id267 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(313,1,'Inserted grower certification details for grower id268 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(314,1,'Inserted grower certification details for grower id269 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(315,1,'Inserted grower certification details for grower id270 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(316,1,'Inserted grower certification details for grower id246 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(317,1,'Inserted grower certification details for grower id247 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(318,1,'Inserted grower certification details for grower id248 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(319,1,'Inserted grower certification details for grower id249 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(320,1,'Inserted grower certification details for grower id250 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(321,1,'Inserted grower certification details for grower id251 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(322,1,'Inserted grower certification details for grower id252 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(323,1,'Inserted grower certification details for grower id253 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(324,1,'Inserted grower certification details for grower id254 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(325,1,'Inserted grower certification details for grower id255 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(326,1,'Inserted grower certification details for grower id256 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(327,1,'Inserted grower certification details for grower id257 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(328,1,'Inserted grower certification details for grower id258 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(329,1,'Inserted grower certification details for grower id2075 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(330,1,'Inserted grower certification details for grower id2083 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(331,1,'Inserted grower certification details for grower id271 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(332,1,'Inserted grower certification details for grower id272 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(333,1,'Inserted grower certification details for grower id273 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(334,1,'Inserted grower certification details for grower id274 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(335,1,'Inserted grower certification details for grower id275 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(336,1,'Inserted grower certification details for grower id276 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(337,1,'Inserted grower certification details for grower id277 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(338,1,'Inserted grower certification details for grower id278 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(339,1,'Inserted grower certification details for grower id279 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(340,1,'Inserted grower certification details for grower id280 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(341,1,'Inserted grower certification details for grower id283 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(342,1,'Inserted grower certification details for grower id284 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(343,1,'Inserted grower certification details for grower id285 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(344,1,'Inserted grower certification details for grower id1884 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(345,1,'Inserted grower certification details for grower id1885 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(346,1,'Inserted grower certification details for grower id315 cert id 3','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(347,1,'Inserted grower certification details for grower id315 cert id 4','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(348,1,'Inserted grower certification details for grower id319 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(349,1,'Inserted grower certification details for grower id320 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(350,1,'Inserted grower certification details for grower id321 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(351,1,'Inserted grower certification details for grower id1809 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(352,1,'Inserted grower certification details for grower id1810 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(353,1,'Inserted grower certification details for grower id1811 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(354,1,'Inserted grower certification details for grower id1812 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(355,1,'Inserted grower certification details for grower id327 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(356,1,'Inserted grower certification details for grower id328 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(357,1,'Inserted grower certification details for grower id329 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(358,1,'Inserted grower certification details for grower id1815 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(359,1,'Inserted grower certification details for grower id1816 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(360,1,'Inserted grower certification details for grower id1817 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(361,1,'Inserted grower certification details for grower id330 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(362,1,'Inserted grower certification details for grower id331 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(363,1,'Inserted grower certification details for grower id332 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(364,1,'Inserted grower certification details for grower id333 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(365,1,'Inserted grower certification details for grower id334 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(366,1,'Inserted grower certification details for grower id335 cert id 5','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(367,1,'Uploaded grower details user1','::1','2018-10-24 09:50:20','2018-10-24 09:50:20'),(368,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(369,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(370,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(371,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(372,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(373,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(374,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(375,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(376,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(377,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(378,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(379,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(380,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(381,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(382,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(383,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(384,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(385,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(386,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(387,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(388,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(389,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(390,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(391,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(392,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(393,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(394,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(395,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(396,1,'Inserted grower certification details for grower id1928 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(397,1,'Inserted grower certification details for grower id1928 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(398,1,'Inserted grower certification details for grower id1928 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(399,1,'Inserted grower certification details for grower id1928 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(400,1,'Inserted grower certification details for grower id77 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(401,1,'Inserted grower certification details for grower id102 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(402,1,'Inserted grower certification details for grower id102 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(403,1,'Inserted grower certification details for grower id102 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(404,1,'Inserted grower certification details for grower id102 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(405,1,'Inserted grower certification details for grower id79 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(406,1,'Inserted grower certification details for grower id79 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(407,1,'Inserted grower certification details for grower id79 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(408,1,'Inserted grower certification details for grower id79 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(409,1,'Inserted grower certification details for grower id61 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(410,1,'Inserted grower certification details for grower id61 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(411,1,'Inserted grower certification details for grower id61 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(412,1,'Inserted grower certification details for grower id61 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(413,1,'Inserted grower certification details for grower id45 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(414,1,'Inserted grower certification details for grower id45 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(415,1,'Inserted grower certification details for grower id45 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(416,1,'Inserted grower certification details for grower id45 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(417,1,'Inserted grower certification details for grower id2543 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(418,1,'Inserted grower certification details for grower id2543 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(419,1,'Inserted grower certification details for grower id29 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(420,1,'Inserted grower certification details for grower id29 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(421,1,'Inserted grower certification details for grower id29 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(422,1,'Inserted grower certification details for grower id29 cert id 6','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(423,1,'Inserted grower certification details for grower id1796 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(424,1,'Inserted grower certification details for grower id205 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(425,1,'Inserted grower certification details for grower id206 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(426,1,'Inserted grower certification details for grower id207 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(427,1,'Inserted grower certification details for grower id208 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(428,1,'Inserted grower certification details for grower id209 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(429,1,'Inserted grower certification details for grower id210 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(430,1,'Inserted grower certification details for grower id211 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(431,1,'Inserted grower certification details for grower id212 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(432,1,'Inserted grower certification details for grower id213 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(433,1,'Inserted grower certification details for grower id214 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(434,1,'Inserted grower certification details for grower id215 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(435,1,'Inserted grower certification details for grower id216 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(436,1,'Inserted grower certification details for grower id217 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(437,1,'Inserted grower certification details for grower id2057 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(438,1,'Inserted grower certification details for grower id227 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(439,1,'Inserted grower certification details for grower id227 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(440,1,'Inserted grower certification details for grower id229 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(441,1,'Inserted grower certification details for grower id229 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(442,1,'Inserted grower certification details for grower id230 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(443,1,'Inserted grower certification details for grower id230 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(444,1,'Inserted grower certification details for grower id1963 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(445,1,'Inserted grower certification details for grower id1964 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(446,1,'Inserted grower certification details for grower id1965 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(447,1,'Inserted grower certification details for grower id1966 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(448,1,'Inserted grower certification details for grower id1967 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(449,1,'Inserted grower certification details for grower id237 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(450,1,'Inserted grower certification details for grower id244 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(451,1,'Inserted grower certification details for grower id2105 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(452,1,'Inserted grower certification details for grower id2106 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(453,1,'Inserted grower certification details for grower id2107 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(454,1,'Inserted grower certification details for grower id2108 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(455,1,'Inserted grower certification details for grower id2109 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(456,1,'Inserted grower certification details for grower id2110 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(457,1,'Inserted grower certification details for grower id2110 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(458,1,'Inserted grower certification details for grower id2174 cert id 2','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(459,1,'Inserted grower certification details for grower id259 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(460,1,'Inserted grower certification details for grower id260 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(461,1,'Inserted grower certification details for grower id261 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(462,1,'Inserted grower certification details for grower id262 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(463,1,'Inserted grower certification details for grower id263 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(464,1,'Inserted grower certification details for grower id264 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(465,1,'Inserted grower certification details for grower id265 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(466,1,'Inserted grower certification details for grower id266 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(467,1,'Inserted grower certification details for grower id267 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(468,1,'Inserted grower certification details for grower id268 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(469,1,'Inserted grower certification details for grower id269 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(470,1,'Inserted grower certification details for grower id270 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(471,1,'Inserted grower certification details for grower id246 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(472,1,'Inserted grower certification details for grower id247 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(473,1,'Inserted grower certification details for grower id248 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(474,1,'Inserted grower certification details for grower id249 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(475,1,'Inserted grower certification details for grower id250 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(476,1,'Inserted grower certification details for grower id251 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(477,1,'Inserted grower certification details for grower id252 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(478,1,'Inserted grower certification details for grower id253 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(479,1,'Inserted grower certification details for grower id254 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(480,1,'Inserted grower certification details for grower id255 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(481,1,'Inserted grower certification details for grower id256 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(482,1,'Inserted grower certification details for grower id257 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(483,1,'Inserted grower certification details for grower id258 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(484,1,'Inserted grower certification details for grower id2075 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(485,1,'Inserted grower certification details for grower id2083 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(486,1,'Inserted grower certification details for grower id271 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(487,1,'Inserted grower certification details for grower id272 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(488,1,'Inserted grower certification details for grower id273 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(489,1,'Inserted grower certification details for grower id274 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(490,1,'Inserted grower certification details for grower id275 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(491,1,'Inserted grower certification details for grower id276 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(492,1,'Inserted grower certification details for grower id277 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(493,1,'Inserted grower certification details for grower id278 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(494,1,'Inserted grower certification details for grower id279 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(495,1,'Inserted grower certification details for grower id280 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(496,1,'Inserted grower certification details for grower id283 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(497,1,'Inserted grower certification details for grower id284 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(498,1,'Inserted grower certification details for grower id285 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(499,1,'Inserted grower certification details for grower id1884 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(500,1,'Inserted grower certification details for grower id1885 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(501,1,'Inserted grower certification details for grower id315 cert id 3','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(502,1,'Inserted grower certification details for grower id315 cert id 4','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(503,1,'Inserted grower certification details for grower id319 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(504,1,'Inserted grower certification details for grower id320 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(505,1,'Inserted grower certification details for grower id321 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(506,1,'Inserted grower certification details for grower id1809 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(507,1,'Inserted grower certification details for grower id1810 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(508,1,'Inserted grower certification details for grower id1811 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(509,1,'Inserted grower certification details for grower id1812 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(510,1,'Inserted grower certification details for grower id327 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(511,1,'Inserted grower certification details for grower id328 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(512,1,'Inserted grower certification details for grower id329 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(513,1,'Inserted grower certification details for grower id1815 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(514,1,'Inserted grower certification details for grower id1816 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(515,1,'Inserted grower certification details for grower id1817 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(516,1,'Inserted grower certification details for grower id330 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(517,1,'Inserted grower certification details for grower id331 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(518,1,'Inserted grower certification details for grower id332 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(519,1,'Inserted grower certification details for grower id333 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(520,1,'Inserted grower certification details for grower id334 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(521,1,'Inserted grower certification details for grower id335 cert id 5','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(522,1,'Uploaded grower details user1','::1','2018-10-24 09:51:54','2018-10-24 09:51:54'),(523,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(524,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(525,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(526,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(527,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(528,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(529,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(530,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(531,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(532,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(533,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(534,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(535,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(536,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(537,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(538,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(539,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(540,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(541,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(542,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(543,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(544,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(545,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(546,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(547,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(548,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(549,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(550,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(551,1,'Inserted grower certification details for grower id1928 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(552,1,'Inserted grower certification details for grower id1928 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(553,1,'Inserted grower certification details for grower id1928 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(554,1,'Inserted grower certification details for grower id1928 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(555,1,'Inserted grower certification details for grower id77 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(556,1,'Inserted grower certification details for grower id102 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(557,1,'Inserted grower certification details for grower id102 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(558,1,'Inserted grower certification details for grower id102 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(559,1,'Inserted grower certification details for grower id102 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(560,1,'Inserted grower certification details for grower id79 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(561,1,'Inserted grower certification details for grower id79 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(562,1,'Inserted grower certification details for grower id79 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(563,1,'Inserted grower certification details for grower id79 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(564,1,'Inserted grower certification details for grower id61 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(565,1,'Inserted grower certification details for grower id61 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(566,1,'Inserted grower certification details for grower id61 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(567,1,'Inserted grower certification details for grower id61 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(568,1,'Inserted grower certification details for grower id45 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(569,1,'Inserted grower certification details for grower id45 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(570,1,'Inserted grower certification details for grower id45 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(571,1,'Inserted grower certification details for grower id45 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(572,1,'Inserted grower certification details for grower id2543 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(573,1,'Inserted grower certification details for grower id2543 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(574,1,'Inserted grower certification details for grower id29 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(575,1,'Inserted grower certification details for grower id29 cert id 4','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(576,1,'Inserted grower certification details for grower id29 cert id 3','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(577,1,'Inserted grower certification details for grower id29 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(578,1,'Inserted grower certification details for grower id1796 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(579,1,'Inserted grower certification details for grower id205 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(580,1,'Inserted grower certification details for grower id205 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(581,1,'Inserted grower certification details for grower id206 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(582,1,'Inserted grower certification details for grower id206 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(583,1,'Inserted grower certification details for grower id207 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(584,1,'Inserted grower certification details for grower id207 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(585,1,'Inserted grower certification details for grower id208 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(586,1,'Inserted grower certification details for grower id208 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(587,1,'Inserted grower certification details for grower id209 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(588,1,'Inserted grower certification details for grower id209 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(589,1,'Inserted grower certification details for grower id210 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(590,1,'Inserted grower certification details for grower id211 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(591,1,'Inserted grower certification details for grower id211 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(592,1,'Inserted grower certification details for grower id212 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(593,1,'Inserted grower certification details for grower id213 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(594,1,'Inserted grower certification details for grower id213 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(595,1,'Inserted grower certification details for grower id214 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(596,1,'Inserted grower certification details for grower id215 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(597,1,'Inserted grower certification details for grower id216 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(598,1,'Inserted grower certification details for grower id217 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(599,1,'Inserted grower certification details for grower id2057 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(600,1,'Inserted grower certification details for grower id2057 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(601,1,'Inserted grower certification details for grower id2058 cert id 6','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(602,1,'Inserted grower certification details for grower id227 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(603,1,'Inserted grower certification details for grower id227 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(604,1,'Inserted grower certification details for grower id229 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(605,1,'Inserted grower certification details for grower id229 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(606,1,'Inserted grower certification details for grower id230 cert id 2','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(607,1,'Inserted grower certification details for grower id230 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(608,1,'Inserted grower certification details for grower id1963 cert id 5','::1','2018-10-24 10:08:46','2018-10-24 10:08:46'),(609,1,'Inserted grower certification details for grower id1963 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(610,1,'Inserted grower certification details for grower id1964 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(611,1,'Inserted grower certification details for grower id1964 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(612,1,'Inserted grower certification details for grower id1965 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(613,1,'Inserted grower certification details for grower id1965 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(614,1,'Inserted grower certification details for grower id1966 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(615,1,'Inserted grower certification details for grower id1966 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(616,1,'Inserted grower certification details for grower id1967 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(617,1,'Inserted grower certification details for grower id1967 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(618,1,'Inserted grower certification details for grower id237 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(619,1,'Inserted grower certification details for grower id244 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(620,1,'Inserted grower certification details for grower id2105 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(621,1,'Inserted grower certification details for grower id2106 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(622,1,'Inserted grower certification details for grower id2107 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(623,1,'Inserted grower certification details for grower id2108 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(624,1,'Inserted grower certification details for grower id2109 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(625,1,'Inserted grower certification details for grower id2110 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(626,1,'Inserted grower certification details for grower id2110 cert id 2','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(627,1,'Inserted grower certification details for grower id2174 cert id 2','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(628,1,'Inserted grower certification details for grower id259 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(629,1,'Inserted grower certification details for grower id259 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(630,1,'Inserted grower certification details for grower id260 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(631,1,'Inserted grower certification details for grower id260 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(632,1,'Inserted grower certification details for grower id261 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(633,1,'Inserted grower certification details for grower id261 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(634,1,'Inserted grower certification details for grower id262 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(635,1,'Inserted grower certification details for grower id262 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(636,1,'Inserted grower certification details for grower id263 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(637,1,'Inserted grower certification details for grower id264 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(638,1,'Inserted grower certification details for grower id265 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(639,1,'Inserted grower certification details for grower id265 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(640,1,'Inserted grower certification details for grower id266 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(641,1,'Inserted grower certification details for grower id266 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(642,1,'Inserted grower certification details for grower id267 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(643,1,'Inserted grower certification details for grower id267 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(644,1,'Inserted grower certification details for grower id268 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(645,1,'Inserted grower certification details for grower id268 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(646,1,'Inserted grower certification details for grower id269 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(647,1,'Inserted grower certification details for grower id269 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(648,1,'Inserted grower certification details for grower id270 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(649,1,'Inserted grower certification details for grower id270 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(650,1,'Inserted grower certification details for grower id246 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(651,1,'Inserted grower certification details for grower id246 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(652,1,'Inserted grower certification details for grower id247 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(653,1,'Inserted grower certification details for grower id247 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(654,1,'Inserted grower certification details for grower id248 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(655,1,'Inserted grower certification details for grower id248 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(656,1,'Inserted grower certification details for grower id249 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(657,1,'Inserted grower certification details for grower id249 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(658,1,'Inserted grower certification details for grower id250 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(659,1,'Inserted grower certification details for grower id250 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(660,1,'Inserted grower certification details for grower id251 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(661,1,'Inserted grower certification details for grower id251 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(662,1,'Inserted grower certification details for grower id252 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(663,1,'Inserted grower certification details for grower id252 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(664,1,'Inserted grower certification details for grower id253 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(665,1,'Inserted grower certification details for grower id253 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(666,1,'Inserted grower certification details for grower id254 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(667,1,'Inserted grower certification details for grower id254 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(668,1,'Inserted grower certification details for grower id255 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(669,1,'Inserted grower certification details for grower id255 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(670,1,'Inserted grower certification details for grower id256 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(671,1,'Inserted grower certification details for grower id256 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(672,1,'Inserted grower certification details for grower id257 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(673,1,'Inserted grower certification details for grower id257 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(674,1,'Inserted grower certification details for grower id258 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(675,1,'Inserted grower certification details for grower id258 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(676,1,'Inserted grower certification details for grower id2075 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(677,1,'Inserted grower certification details for grower id2083 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(678,1,'Inserted grower certification details for grower id271 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(679,1,'Inserted grower certification details for grower id272 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(680,1,'Inserted grower certification details for grower id273 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(681,1,'Inserted grower certification details for grower id274 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(682,1,'Inserted grower certification details for grower id275 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(683,1,'Inserted grower certification details for grower id276 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(684,1,'Inserted grower certification details for grower id277 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(685,1,'Inserted grower certification details for grower id278 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(686,1,'Inserted grower certification details for grower id279 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(687,1,'Inserted grower certification details for grower id280 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(688,1,'Inserted grower certification details for grower id283 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(689,1,'Inserted grower certification details for grower id284 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(690,1,'Inserted grower certification details for grower id285 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(691,1,'Inserted grower certification details for grower id1884 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(692,1,'Inserted grower certification details for grower id1885 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(693,1,'Inserted grower certification details for grower id315 cert id 3','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(694,1,'Inserted grower certification details for grower id315 cert id 4','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(695,1,'Inserted grower certification details for grower id319 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(696,1,'Inserted grower certification details for grower id320 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(697,1,'Inserted grower certification details for grower id321 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(698,1,'Inserted grower certification details for grower id1809 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(699,1,'Inserted grower certification details for grower id1810 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(700,1,'Inserted grower certification details for grower id1811 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(701,1,'Inserted grower certification details for grower id1812 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(702,1,'Inserted grower certification details for grower id327 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(703,1,'Inserted grower certification details for grower id328 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(704,1,'Inserted grower certification details for grower id329 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(705,1,'Inserted grower certification details for grower id1815 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(706,1,'Inserted grower certification details for grower id1816 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(707,1,'Inserted grower certification details for grower id1817 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(708,1,'Inserted grower certification details for grower id330 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(709,1,'Inserted grower certification details for grower id331 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(710,1,'Inserted grower certification details for grower id332 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(711,1,'Inserted grower certification details for grower id333 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(712,1,'Inserted grower certification details for grower id334 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(713,1,'Inserted grower certification details for grower id335 cert id 5','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(714,1,'Inserted grower certification details for grower id2568 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(715,1,'Inserted grower certification details for grower id2569 cert id 6','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(716,1,'Uploaded grower details user1','::1','2018-10-24 10:08:47','2018-10-24 10:08:47'),(717,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(718,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(719,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(720,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(721,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(722,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(723,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(724,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(725,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(726,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(727,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(728,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(729,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(730,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(731,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(732,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(733,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(734,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(735,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(736,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(737,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(738,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(739,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(740,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(741,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(742,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(743,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(744,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(745,1,'Inserted grower certification details for grower id1928 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(746,1,'Inserted grower certification details for grower id1928 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(747,1,'Inserted grower certification details for grower id1928 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(748,1,'Inserted grower certification details for grower id1928 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(749,1,'Inserted grower certification details for grower id77 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(750,1,'Inserted grower certification details for grower id102 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(751,1,'Inserted grower certification details for grower id102 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(752,1,'Inserted grower certification details for grower id102 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(753,1,'Inserted grower certification details for grower id102 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(754,1,'Inserted grower certification details for grower id79 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(755,1,'Inserted grower certification details for grower id79 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(756,1,'Inserted grower certification details for grower id79 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(757,1,'Inserted grower certification details for grower id79 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(758,1,'Inserted grower certification details for grower id61 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(759,1,'Inserted grower certification details for grower id61 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(760,1,'Inserted grower certification details for grower id61 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(761,1,'Inserted grower certification details for grower id61 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(762,1,'Inserted grower certification details for grower id45 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(763,1,'Inserted grower certification details for grower id45 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(764,1,'Inserted grower certification details for grower id45 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(765,1,'Inserted grower certification details for grower id45 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(766,1,'Inserted grower certification details for grower id2543 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(767,1,'Inserted grower certification details for grower id2543 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(768,1,'Inserted grower certification details for grower id29 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(769,1,'Inserted grower certification details for grower id29 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(770,1,'Inserted grower certification details for grower id29 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(771,1,'Inserted grower certification details for grower id29 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(772,1,'Inserted grower certification details for grower id1796 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(773,1,'Inserted grower certification details for grower id205 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(774,1,'Inserted grower certification details for grower id205 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(775,1,'Inserted grower certification details for grower id206 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(776,1,'Inserted grower certification details for grower id206 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(777,1,'Inserted grower certification details for grower id207 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(778,1,'Inserted grower certification details for grower id207 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(779,1,'Inserted grower certification details for grower id208 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(780,1,'Inserted grower certification details for grower id208 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(781,1,'Inserted grower certification details for grower id209 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(782,1,'Inserted grower certification details for grower id209 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(783,1,'Inserted grower certification details for grower id210 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(784,1,'Inserted grower certification details for grower id211 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(785,1,'Inserted grower certification details for grower id211 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(786,1,'Inserted grower certification details for grower id212 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(787,1,'Inserted grower certification details for grower id213 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(788,1,'Inserted grower certification details for grower id213 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(789,1,'Inserted grower certification details for grower id214 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(790,1,'Inserted grower certification details for grower id215 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(791,1,'Inserted grower certification details for grower id216 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(792,1,'Inserted grower certification details for grower id217 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(793,1,'Inserted grower certification details for grower id2057 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(794,1,'Inserted grower certification details for grower id2057 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(795,1,'Inserted grower certification details for grower id2058 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(796,1,'Inserted grower certification details for grower id227 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(797,1,'Inserted grower certification details for grower id227 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(798,1,'Inserted grower certification details for grower id229 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(799,1,'Inserted grower certification details for grower id229 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(800,1,'Inserted grower certification details for grower id230 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(801,1,'Inserted grower certification details for grower id230 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(802,1,'Inserted grower certification details for grower id1963 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(803,1,'Inserted grower certification details for grower id1963 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(804,1,'Inserted grower certification details for grower id1964 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(805,1,'Inserted grower certification details for grower id1964 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(806,1,'Inserted grower certification details for grower id1965 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(807,1,'Inserted grower certification details for grower id1965 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(808,1,'Inserted grower certification details for grower id1966 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(809,1,'Inserted grower certification details for grower id1966 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(810,1,'Inserted grower certification details for grower id1967 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(811,1,'Inserted grower certification details for grower id1967 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(812,1,'Inserted grower certification details for grower id237 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(813,1,'Inserted grower certification details for grower id244 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(814,1,'Inserted grower certification details for grower id2105 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(815,1,'Inserted grower certification details for grower id2106 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(816,1,'Inserted grower certification details for grower id2107 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(817,1,'Inserted grower certification details for grower id2108 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(818,1,'Inserted grower certification details for grower id2109 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(819,1,'Inserted grower certification details for grower id2110 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(820,1,'Inserted grower certification details for grower id2110 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(821,1,'Inserted grower certification details for grower id2174 cert id 2','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(822,1,'Inserted grower certification details for grower id259 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(823,1,'Inserted grower certification details for grower id259 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(824,1,'Inserted grower certification details for grower id260 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(825,1,'Inserted grower certification details for grower id260 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(826,1,'Inserted grower certification details for grower id261 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(827,1,'Inserted grower certification details for grower id261 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(828,1,'Inserted grower certification details for grower id262 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(829,1,'Inserted grower certification details for grower id262 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(830,1,'Inserted grower certification details for grower id263 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(831,1,'Inserted grower certification details for grower id264 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(832,1,'Inserted grower certification details for grower id265 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(833,1,'Inserted grower certification details for grower id265 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(834,1,'Inserted grower certification details for grower id266 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(835,1,'Inserted grower certification details for grower id266 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(836,1,'Inserted grower certification details for grower id267 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(837,1,'Inserted grower certification details for grower id267 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(838,1,'Inserted grower certification details for grower id268 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(839,1,'Inserted grower certification details for grower id268 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(840,1,'Inserted grower certification details for grower id269 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(841,1,'Inserted grower certification details for grower id269 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(842,1,'Inserted grower certification details for grower id270 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(843,1,'Inserted grower certification details for grower id270 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(844,1,'Inserted grower certification details for grower id246 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(845,1,'Inserted grower certification details for grower id246 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(846,1,'Inserted grower certification details for grower id247 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(847,1,'Inserted grower certification details for grower id247 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(848,1,'Inserted grower certification details for grower id248 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(849,1,'Inserted grower certification details for grower id248 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(850,1,'Inserted grower certification details for grower id249 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(851,1,'Inserted grower certification details for grower id249 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(852,1,'Inserted grower certification details for grower id250 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(853,1,'Inserted grower certification details for grower id250 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(854,1,'Inserted grower certification details for grower id251 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(855,1,'Inserted grower certification details for grower id251 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(856,1,'Inserted grower certification details for grower id252 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(857,1,'Inserted grower certification details for grower id252 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(858,1,'Inserted grower certification details for grower id253 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(859,1,'Inserted grower certification details for grower id253 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(860,1,'Inserted grower certification details for grower id254 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(861,1,'Inserted grower certification details for grower id254 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(862,1,'Inserted grower certification details for grower id255 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(863,1,'Inserted grower certification details for grower id255 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(864,1,'Inserted grower certification details for grower id256 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(865,1,'Inserted grower certification details for grower id256 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(866,1,'Inserted grower certification details for grower id257 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(867,1,'Inserted grower certification details for grower id257 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(868,1,'Inserted grower certification details for grower id258 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(869,1,'Inserted grower certification details for grower id258 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(870,1,'Inserted grower certification details for grower id2075 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(871,1,'Inserted grower certification details for grower id2083 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(872,1,'Inserted grower certification details for grower id271 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(873,1,'Inserted grower certification details for grower id272 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(874,1,'Inserted grower certification details for grower id273 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(875,1,'Inserted grower certification details for grower id274 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(876,1,'Inserted grower certification details for grower id275 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(877,1,'Inserted grower certification details for grower id276 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(878,1,'Inserted grower certification details for grower id277 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(879,1,'Inserted grower certification details for grower id278 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(880,1,'Inserted grower certification details for grower id279 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(881,1,'Inserted grower certification details for grower id280 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(882,1,'Inserted grower certification details for grower id283 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(883,1,'Inserted grower certification details for grower id284 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(884,1,'Inserted grower certification details for grower id285 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(885,1,'Inserted grower certification details for grower id1884 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(886,1,'Inserted grower certification details for grower id1885 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(887,1,'Inserted grower certification details for grower id315 cert id 3','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(888,1,'Inserted grower certification details for grower id315 cert id 4','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(889,1,'Inserted grower certification details for grower id319 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(890,1,'Inserted grower certification details for grower id320 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(891,1,'Inserted grower certification details for grower id321 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(892,1,'Inserted grower certification details for grower id1809 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(893,1,'Inserted grower certification details for grower id1810 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(894,1,'Inserted grower certification details for grower id1811 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(895,1,'Inserted grower certification details for grower id1812 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(896,1,'Inserted grower certification details for grower id327 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(897,1,'Inserted grower certification details for grower id328 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(898,1,'Inserted grower certification details for grower id329 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(899,1,'Inserted grower certification details for grower id1815 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(900,1,'Inserted grower certification details for grower id1816 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(901,1,'Inserted grower certification details for grower id1817 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(902,1,'Inserted grower certification details for grower id330 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(903,1,'Inserted grower certification details for grower id331 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(904,1,'Inserted grower certification details for grower id332 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(905,1,'Inserted grower certification details for grower id333 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(906,1,'Inserted grower certification details for grower id334 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(907,1,'Inserted grower certification details for grower id335 cert id 5','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(908,1,'Inserted grower certification details for grower id2568 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(909,1,'Inserted grower certification details for grower id2569 cert id 6','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(910,1,'Uploaded grower details user1','::1','2018-10-24 10:09:39','2018-10-24 10:09:39'),(911,1,'Updated Booking NKG-0000001 Agent = Java Nairobi Grower = AKIMA Delivery Date = 2018-10-24','::1','2018-10-24 12:01:08','2018-10-24 12:01:08'),(912,1,'Inserted menu information for menu growers url settingsgrowers level 2 user 1','::1','2018-10-25 06:04:08','2018-10-25 06:04:08'),(913,1,'Inserted grower certification details for grower id92 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(914,1,'Inserted grower certification details for grower id92 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(915,1,'Inserted grower certification details for grower id92 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(916,1,'Inserted grower certification details for grower id92 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(917,1,'Inserted grower certification details for grower id87 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(918,1,'Inserted grower certification details for grower id87 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(919,1,'Inserted grower certification details for grower id87 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(920,1,'Inserted grower certification details for grower id87 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(921,1,'Inserted grower certification details for grower id76 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(922,1,'Inserted grower certification details for grower id76 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(923,1,'Inserted grower certification details for grower id76 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(924,1,'Inserted grower certification details for grower id76 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(925,1,'Inserted grower certification details for grower id59 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(926,1,'Inserted grower certification details for grower id59 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(927,1,'Inserted grower certification details for grower id59 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(928,1,'Inserted grower certification details for grower id59 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(929,1,'Inserted grower certification details for grower id39 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(930,1,'Inserted grower certification details for grower id39 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(931,1,'Inserted grower certification details for grower id39 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(932,1,'Inserted grower certification details for grower id39 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(933,1,'Inserted grower certification details for grower id1862 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(934,1,'Inserted grower certification details for grower id1862 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(935,1,'Inserted grower certification details for grower id1862 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(936,1,'Inserted grower certification details for grower id1862 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(937,1,'Inserted grower certification details for grower id72 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(938,1,'Inserted grower certification details for grower id72 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(939,1,'Inserted grower certification details for grower id72 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(940,1,'Inserted grower certification details for grower id72 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(941,1,'Inserted grower certification details for grower id1928 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(942,1,'Inserted grower certification details for grower id1928 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(943,1,'Inserted grower certification details for grower id1928 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(944,1,'Inserted grower certification details for grower id1928 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(945,1,'Inserted grower certification details for grower id77 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(946,1,'Inserted grower certification details for grower id102 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(947,1,'Inserted grower certification details for grower id102 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(948,1,'Inserted grower certification details for grower id102 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(949,1,'Inserted grower certification details for grower id102 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(950,1,'Inserted grower certification details for grower id79 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(951,1,'Inserted grower certification details for grower id79 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(952,1,'Inserted grower certification details for grower id79 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(953,1,'Inserted grower certification details for grower id79 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(954,1,'Inserted grower certification details for grower id61 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(955,1,'Inserted grower certification details for grower id61 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(956,1,'Inserted grower certification details for grower id61 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(957,1,'Inserted grower certification details for grower id61 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(958,1,'Inserted grower certification details for grower id45 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(959,1,'Inserted grower certification details for grower id45 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(960,1,'Inserted grower certification details for grower id45 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(961,1,'Inserted grower certification details for grower id45 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(962,1,'Inserted grower certification details for grower id2543 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(963,1,'Inserted grower certification details for grower id2543 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(964,1,'Inserted grower certification details for grower id29 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(965,1,'Inserted grower certification details for grower id29 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(966,1,'Inserted grower certification details for grower id29 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(967,1,'Inserted grower certification details for grower id29 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(968,1,'Inserted grower certification details for grower id1796 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(969,1,'Inserted grower certification details for grower id210 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(970,1,'Inserted grower certification details for grower id212 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(971,1,'Inserted grower certification details for grower id214 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(972,1,'Inserted grower certification details for grower id215 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(973,1,'Inserted grower certification details for grower id216 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(974,1,'Inserted grower certification details for grower id217 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(975,1,'Inserted grower certification details for grower id2057 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(976,1,'Inserted grower certification details for grower id2057 cert id 6','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(977,1,'Inserted grower certification details for grower id227 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(978,1,'Inserted grower certification details for grower id227 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(979,1,'Inserted grower certification details for grower id229 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(980,1,'Inserted grower certification details for grower id229 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(981,1,'Inserted grower certification details for grower id230 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(982,1,'Inserted grower certification details for grower id230 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(983,1,'Inserted grower certification details for grower id237 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(984,1,'Inserted grower certification details for grower id244 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(985,1,'Inserted grower certification details for grower id2105 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(986,1,'Inserted grower certification details for grower id2106 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(987,1,'Inserted grower certification details for grower id2107 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(988,1,'Inserted grower certification details for grower id2108 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(989,1,'Inserted grower certification details for grower id2109 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(990,1,'Inserted grower certification details for grower id2110 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(991,1,'Inserted grower certification details for grower id2110 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(992,1,'Inserted grower certification details for grower id2174 cert id 2','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(993,1,'Inserted grower certification details for grower id263 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(994,1,'Inserted grower certification details for grower id264 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(995,1,'Inserted grower certification details for grower id2075 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(996,1,'Inserted grower certification details for grower id2083 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(997,1,'Inserted grower certification details for grower id271 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(998,1,'Inserted grower certification details for grower id272 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(999,1,'Inserted grower certification details for grower id273 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1000,1,'Inserted grower certification details for grower id274 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1001,1,'Inserted grower certification details for grower id275 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1002,1,'Inserted grower certification details for grower id276 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1003,1,'Inserted grower certification details for grower id277 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1004,1,'Inserted grower certification details for grower id278 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1005,1,'Inserted grower certification details for grower id279 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1006,1,'Inserted grower certification details for grower id280 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1007,1,'Inserted grower certification details for grower id283 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1008,1,'Inserted grower certification details for grower id284 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1009,1,'Inserted grower certification details for grower id285 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1010,1,'Inserted grower certification details for grower id1884 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1011,1,'Inserted grower certification details for grower id1885 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1012,1,'Inserted grower certification details for grower id315 cert id 3','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1013,1,'Inserted grower certification details for grower id315 cert id 4','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1014,1,'Inserted grower certification details for grower id319 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1015,1,'Inserted grower certification details for grower id320 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1016,1,'Inserted grower certification details for grower id321 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1017,1,'Inserted grower certification details for grower id1809 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1018,1,'Inserted grower certification details for grower id1810 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1019,1,'Inserted grower certification details for grower id1811 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1020,1,'Inserted grower certification details for grower id1812 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1021,1,'Inserted grower certification details for grower id327 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1022,1,'Inserted grower certification details for grower id328 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1023,1,'Inserted grower certification details for grower id329 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1024,1,'Inserted grower certification details for grower id1815 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1025,1,'Inserted grower certification details for grower id1816 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1026,1,'Inserted grower certification details for grower id1817 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1027,1,'Inserted grower certification details for grower id330 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1028,1,'Inserted grower certification details for grower id331 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1029,1,'Inserted grower certification details for grower id332 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1030,1,'Inserted grower certification details for grower id333 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1031,1,'Inserted grower certification details for grower id334 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1032,1,'Inserted grower certification details for grower id335 cert id 5','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1033,1,'Uploaded grower details user1','::1','2018-10-25 06:05:44','2018-10-25 06:05:44'),(1034,1,'Added Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:27:59','2018-10-25 09:27:59'),(1035,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:41:17','2018-10-25 09:41:17'),(1036,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:42:12','2018-10-25 09:42:12'),(1037,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:43:35','2018-10-25 09:43:35'),(1038,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:44:11','2018-10-25 09:44:11'),(1039,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:44:57','2018-10-25 09:44:57'),(1040,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:45:00','2018-10-25 09:45:00'),(1041,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:45:02','2018-10-25 09:45:02'),(1042,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:45:29','2018-10-25 09:45:29'),(1043,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:47:17','2018-10-25 09:47:17'),(1044,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:47:29','2018-10-25 09:47:29'),(1045,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = CRI AZANIA Delivery Date = 2018-10-25','::1','2018-10-25 09:50:02','2018-10-25 09:50:02'),(1046,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 2018-10-25','::1','2018-10-25 11:32:50','2018-10-25 11:32:50'),(1047,1,'Updated Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 2018-10-25','::1','2018-10-25 11:32:56','2018-10-25 11:32:56'),(1048,1,'Searched for Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 2018-10-25','::1','2018-10-25 11:39:44','2018-10-25 11:39:44'),(1049,1,'Added Booking Item for Booking NKG-0000001 Delivery = P1 Bags = 20','::1','2018-10-25 11:39:55','2018-10-25 11:39:55'),(1050,1,'Added Booking Item for Booking NKG-0000001 Delivery = P3 Bags = 40','::1','2018-10-25 11:40:02','2018-10-25 11:40:02'),(1051,1,'Searched for Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 2018-10-25','::1','2018-10-25 11:41:27','2018-10-25 11:41:27'),(1052,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:41:33','2018-10-25 11:41:33'),(1053,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:42:48','2018-10-25 11:42:48'),(1054,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:43:49','2018-10-25 11:43:49'),(1055,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:50:00','2018-10-25 11:50:00'),(1056,1,'Searched for Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 2018-10-25','::1','2018-10-25 11:55:31','2018-10-25 11:55:31'),(1057,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:55:43','2018-10-25 11:55:43'),(1058,1,'Searched for Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 2018-10-25','::1','2018-10-25 11:56:54','2018-10-25 11:56:54'),(1059,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:57:04','2018-10-25 11:57:04'),(1060,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:57:44','2018-10-25 11:57:44'),(1061,1,'Printed Booking NKG-0000001 Agent = Tropical Farm Management Grower = AKIMA Delivery Date = 25 Thu Oct 2018','::1','2018-10-25 11:58:17','2018-10-25 11:58:17'),(1062,1,'Added arrival quality for st_id9969 with parchment quality 119','::1','2018-10-31 13:49:54','2018-10-31 13:49:54'),(1063,1,'Updated arrival quality for st_id9969 with parchment quality 119','::1','2018-10-31 13:52:39','2018-10-31 13:52:39'),(1064,1,'Added arrival quality for st_id9970 with parchment quality 116','::1','2018-10-31 13:52:50','2018-10-31 13:52:50'),(1065,1,'Updated arrival quality for st_id9969 with parchment quality 115','::1','2018-11-01 11:45:14','2018-11-01 11:45:14'),(1066,1,'Updated arrival quality for st_id9970 with parchment quality 121','::1','2018-11-01 11:45:18','2018-11-01 11:45:18'),(1067,1,'Added arrival quality for st_id9971 with parchment quality 119','::1','2018-11-01 11:45:22','2018-11-01 11:45:22'),(1068,1,'Added arrival quality for st_id9972 with parchment quality 118','::1','2018-11-01 11:45:28','2018-11-01 11:45:28'),(1069,1,'Added arrival quality for st_id9973 with parchment quality 118','::1','2018-11-01 11:45:33','2018-11-01 11:45:33'),(1070,1,'Added arrival quality for st_id9974 with parchment quality 120','::1','2018-11-01 11:45:37','2018-11-01 11:45:37'),(1071,1,'Added arrival quality for st_id9975 with parchment quality 113','::1','2018-11-01 11:45:43','2018-11-01 11:45:43'),(1072,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:44:25','2018-11-02 06:44:25'),(1073,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:44:25','2018-11-02 06:44:25'),(1074,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:45:01','2018-11-02 06:45:01'),(1075,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:45:01','2018-11-02 06:45:01'),(1076,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:45:01','2018-11-02 06:45:01'),(1077,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:45:01','2018-11-02 06:45:01'),(1078,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:45:08','2018-11-02 06:45:08'),(1079,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:45:08','2018-11-02 06:45:08'),(1080,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:45:08','2018-11-02 06:45:08'),(1081,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:45:08','2018-11-02 06:45:08'),(1082,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:45:13','2018-11-02 06:45:13'),(1083,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:45:13','2018-11-02 06:45:13'),(1084,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:45:13','2018-11-02 06:45:13'),(1085,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:45:13','2018-11-02 06:45:13'),(1086,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:45:15','2018-11-02 06:45:15'),(1087,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:45:15','2018-11-02 06:45:15'),(1088,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:45:15','2018-11-02 06:45:15'),(1089,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:45:15','2018-11-02 06:45:15'),(1090,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:45:19','2018-11-02 06:45:19'),(1091,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:45:19','2018-11-02 06:45:19'),(1092,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:45:19','2018-11-02 06:45:19'),(1093,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:45:19','2018-11-02 06:45:19'),(1094,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:46:35','2018-11-02 06:46:35'),(1095,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:46:35','2018-11-02 06:46:35'),(1096,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:46:35','2018-11-02 06:46:35'),(1097,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:46:35','2018-11-02 06:46:35'),(1098,1,'Updated quality for st_id9969 with rw_quality  comments test','::1','2018-11-02 06:47:22','2018-11-02 06:47:22'),(1099,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:47:22','2018-11-02 06:47:22'),(1100,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:47:22','2018-11-02 06:47:22'),(1101,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:47:22','2018-11-02 06:47:22'),(1102,1,'Updated quality for st_id9969 with rw_quality  comments test','::1','2018-11-02 06:48:49','2018-11-02 06:48:49'),(1103,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:48:49','2018-11-02 06:48:49'),(1104,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:48:49','2018-11-02 06:48:49'),(1105,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:48:49','2018-11-02 06:48:49'),(1106,1,'Updated quality for st_id9970 with rw_quality  comments ','::1','2018-11-02 06:48:52','2018-11-02 06:48:52'),(1107,1,'Updated quality for st_id9971 with rw_quality  comments ','::1','2018-11-02 06:48:56','2018-11-02 06:48:56'),(1108,1,'Updated quality for st_id9972 with rw_quality  comments ','::1','2018-11-02 06:48:58','2018-11-02 06:48:58'),(1109,1,'Updated quality for st_id9973 with rw_quality  comments ','::1','2018-11-02 06:49:00','2018-11-02 06:49:00'),(1110,1,'Updated quality for st_id9974 with rw_quality  comments ','::1','2018-11-02 06:49:02','2018-11-02 06:49:02'),(1111,1,'Updated quality for st_id9975 with rw_quality  comments ','::1','2018-11-02 06:49:04','2018-11-02 06:49:04'),(1112,1,'Updated quality for st_id9969 with rw_quality 86 comments test','::1','2018-11-02 06:54:21','2018-11-02 06:54:21'),(1113,1,'Added Quality For Coffee ID 9969 with quality ID 4','::1','2018-11-02 06:54:21','2018-11-02 06:54:21'),(1114,1,'Added Quality For Coffee ID 9969 with quality ID 33','::1','2018-11-02 06:54:21','2018-11-02 06:54:21'),(1115,1,'Added Quality For Coffee ID 9969 with quality ID 89','::1','2018-11-02 06:54:21','2018-11-02 06:54:21'),(1116,1,'Updated arrival quality for st_id9969 with parchment quality 116','::1','2018-11-05 08:44:22','2018-11-05 08:44:22');
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `agent_agt_agtc_id_foreign` (`agtc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_agt`
--

LOCK TABLES `agent_agt` WRITE;
/*!40000 ALTER TABLE `agent_agt` DISABLE KEYS */;
INSERT INTO `agent_agt` VALUES (1,2,'Tropical Farm Management','TFM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(2,1,'NKG Cofee Mills','NKG','2016-11-01 06:56:53','2016-11-01 06:56:54'),(3,4,'SDV Warehouse','SDV','2016-11-01 06:56:53','2016-11-01 06:56:54'),(4,4,'NKG Warehouse',' NKG','2016-11-01 06:56:53','2016-11-01 06:56:54'),(5,4,'Java Nairobi','JAV','2016-11-01 06:56:53','2016-11-01 06:56:54'),(6,3,'Ibero Kenya Ltd','IBK','2016-11-01 06:56:53','2016-11-01 06:56:54'),(7,3,'SMS','SMS','2016-11-01 06:56:53','2016-11-01 06:56:54'),(8,3,'CMS','CMS','2016-11-01 06:56:53','2016-11-01 06:56:54'),(9,1,'Gusii','GS','2016-11-01 06:56:53','2016-11-01 06:56:54'),(10,1,'Lecom Coffee Mill','LECM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(11,1,'Kofinaf Coffee Mills','KFCM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(12,1,'Sasini Coffee Mills','SCM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(13,1,'Kenya Cooperative Millers','KCCM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(14,1,'Central Kenya Coffee Mills','CKM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(15,1,'Thika Coffee Mills','TCM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(16,1,'Nyambene Coffee Mills','NCM','2016-11-01 06:56:53','2016-11-01 06:56:54'),(17,1,'Kipkelion Coffee Mills','KK','2016-11-01 06:56:53','2016-11-01 06:56:54'),(18,3,'ECTP','13','2016-11-01 06:56:53','2016-11-01 06:56:54'),(19,3,'Rashid Moledina','21','2016-11-01 06:56:53','2016-11-01 06:56:54'),(20,3,'Sangana','24','2016-11-01 06:56:53','2016-11-01 06:56:54'),(21,3,'Taylor Winch','74','2016-11-01 06:56:53','2016-11-01 06:56:54'),(22,3,'Louis Dreyfus Company Kenya Limited','40','2016-11-01 06:56:53','2016-11-01 06:56:54'),(23,3,'Kyandu Trading','42','2016-11-01 06:56:53','2016-11-01 06:56:54'),(24,3,'Delafarm Trading','43','2016-11-01 06:56:53','2016-11-01 06:56:54'),(25,3,'Servicoff Ltd','47','2016-11-01 06:56:53','2016-11-01 06:56:54'),(26,3,'Alanwood Ltd','51','2016-11-01 06:56:53','2016-11-01 06:56:54'),(27,3,'Diamond Coffee','52','2016-11-01 06:56:53','2016-11-01 06:56:54'),(28,3,'Kenyacof Ltd','54','2016-11-01 06:56:53','2016-11-01 06:56:54'),(29,3,'Sondhi Trading','62','2016-11-01 06:56:53','2016-11-01 06:56:54'),(30,3,'Rejitek Coffee','67','2016-11-01 06:56:53','2016-11-01 06:56:54'),(31,3,'C. Dorman Ltd','78','2016-11-01 06:56:53','2016-11-01 06:56:54'),(32,3,'ATC','26','2016-11-01 06:56:53','2016-11-01 06:56:54'),(33,3,'Global Afrea','5','2016-11-01 06:56:53','2016-11-01 06:56:54'),(34,3,'Faina','8','2016-11-01 06:56:53','2016-11-01 06:56:54'),(35,3,'NB Java','16','2016-11-01 06:56:53','2016-11-01 06:56:54'),(36,3,'Kenya Nut','17','2016-11-01 06:56:53','2016-11-01 06:56:54'),(37,3,'Vam Dyke','18','2016-11-01 06:56:53','2016-11-01 06:56:54'),(38,3,'Africof','19','2016-11-01 06:56:53','2016-11-01 06:56:54'),(39,3,'Ruwan Coffee','30','2016-11-01 06:56:53','2016-11-01 06:56:54'),(40,3,'Goldrock INT\'L','31','2016-11-01 06:56:53','2016-11-01 06:56:54'),(41,3,'Msa Coffee','34','2016-11-01 06:56:53','2016-11-01 06:56:54'),(42,3,'Jowam','44','2016-11-01 06:56:53','2016-11-01 06:56:54'),(43,3,'E.A.G.','48','2016-11-01 06:56:53','2016-11-01 06:56:54'),(44,3,'Kimani Coffee','49','2016-11-01 06:56:53','2016-11-01 06:56:54'),(45,3,'S.M.H.','50','2016-11-01 06:56:53','2016-11-01 06:56:54'),(46,3,'Gibbs','55','2016-11-01 06:56:53','2016-11-01 06:56:54'),(47,3,'Mumbi Coffee','56','2016-11-01 06:56:53','2016-11-01 06:56:54'),(48,3,'Rockbern EQ.','58','2016-11-01 06:56:53','2016-11-01 06:56:54'),(49,3,'Merali Dewji','60','2016-11-01 06:56:53','2016-11-01 06:56:54'),(50,3,'M.A. Panju','63','2016-11-01 06:56:53','2016-11-01 06:56:54'),(51,3,'Coffee Exporters','64','2016-11-01 06:56:53','2016-11-01 06:56:54'),(52,3,'ETC','76','2016-11-01 06:56:53','2016-11-01 06:56:54'),(53,3,'Star Coffee','68','2016-11-01 06:56:53','2016-11-01 06:56:54'),(54,3,'Betco Coffee Company','69','2016-11-01 06:56:53','2016-11-01 06:56:54'),(55,3,'Gilmart LTD','36','2016-11-01 06:56:53','2016-11-01 06:56:54'),(56,3,'Josra Coffee CO. LTD','65','2016-11-01 06:56:53','2016-11-01 06:56:54'),(57,3,'BRIC','BRIC','2016-11-01 06:56:53','2016-11-01 06:56:54'),(58,3,'PECLEX','4','2016-11-01 06:56:53','2016-11-01 06:56:54'),(59,3,'Royal Coffee Inc','66','2016-11-01 06:56:53','2016-11-01 06:56:54'),(60,1,'Rumukia Farmers Mill','RF','2016-11-01 06:56:53','2016-11-01 06:56:54'),(61,3,'INTERNATIONAL BEVERAGES  LTD','33','2016-11-01 06:56:53','2016-11-01 06:56:54'),(62,3,'AFRICA GOLD COFFEE','15','2016-11-01 06:56:53','2016-11-01 06:56:54'),(63,3,'PREMIER FORTUNE','32','2016-11-01 06:56:53','2016-11-01 06:56:54'),(64,3,'VAVA VITALE','100','2016-11-01 06:56:53','2016-11-01 06:56:54'),(65,3,'ALCAFFE','101','2016-11-01 06:56:53','2016-11-01 06:56:54'),(66,3,'PROSPECTS','105','2016-11-01 06:56:53','2016-11-01 06:56:54'),(67,3,'KUTTUM LTD','61','2016-11-01 06:56:53','2016-11-01 06:56:54'),(68,3,'MUMBI COFFEE MERCHANTS','57','2016-11-01 06:56:53','2016-11-01 06:56:54'),(69,3,'SOCADEC','102','2016-11-01 06:56:53','2016-11-01 06:56:54'),(70,3,'Commodity Broker CHG GmbH','103','2016-11-01 06:56:53','2016-11-01 06:56:54'),(71,3,'Messers Commodituy Broker CHG Gmbh','106','2016-11-01 06:56:53','2016-11-01 06:56:54'),(72,3,'Coffee Domain PTE lTD','107','2016-11-01 06:56:53','2016-11-01 06:56:54'),(73,3,'Socadec SA','108','2016-11-01 06:56:53','2016-11-01 06:56:54'),(74,3,'EAGLE CROWN','109','2016-11-01 06:56:53','2016-11-01 06:56:54'),(75,3,'SCHLUTERS','110','2016-11-01 06:56:53','2016-11-01 06:56:54'),(76,3,'SUCAFINA SA','200','2016-11-01 06:56:53','2016-11-01 06:56:54'),(77,1,'Mbumi Coffee Mills','MCM','2017-02-20 08:37:10','2017-02-20 08:37:10');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_category_agtc`
--

LOCK TABLES `agent_category_agtc` WRITE;
/*!40000 ALTER TABLE `agent_category_agtc` DISABLE KEYS */;
INSERT INTO `agent_category_agtc` VALUES (1,'Millers','2016-11-01 06:56:54','2016-11-01 06:56:55'),(2,'Marketing Agents','2016-11-01 06:56:54','2016-11-01 06:56:55'),(3,'Dealers','2016-11-01 06:56:54','2016-11-01 06:56:55'),(4,'Warehouses','2016-11-01 06:56:54','2016-11-01 06:56:55');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket_bs`
--

LOCK TABLES `basket_bs` WRITE;
/*!40000 ALTER TABLE `basket_bs` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_btc`
--

LOCK TABLES `batch_btc` WRITE;
/*!40000 ALTER TABLE `batch_btc` DISABLE KEYS */;
/*!40000 ALTER TABLE `batch_btc` ENABLE KEYS */;
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
 1 AS `cgr_id`,
 1 AS `cgr_grower`,
 1 AS `cgr_code`,
 1 AS `cgr_mark`,
 1 AS `agt_id`,
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
  KEY `booking_bkg_cgr_id_foreign` (`cgr_id`),
  KEY `booking_bkg_agt_id_foreign` (`agt_id`),
  KEY `booking_bkg_wbi_id_foreign` (`wbi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_bkg`
--

LOCK TABLES `booking_bkg` WRITE;
/*!40000 ALTER TABLE `booking_bkg` DISABLE KEYS */;
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
  KEY `booking_items_bki_pty_id_foreign` (`pty_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_items_bki`
--

LOCK TABLES `booking_items_bki` WRITE;
/*!40000 ALTER TABLE `booking_items_bki` DISABLE KEYS */;
INSERT INTO `booking_items_bki` VALUES (1,1,1,'2018-10-25 11:39:55','2018-10-25 11:39:55',20),(2,1,3,'2018-10-25 11:40:02','2018-10-25 11:40:02',40);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certification_crt`
--

LOCK TABLES `certification_crt` WRITE;
/*!40000 ALTER TABLE `certification_crt` DISABLE KEYS */;
INSERT INTO `certification_crt` VALUES (2,'RA','RAINFOREST ALLIANCE','2016-11-23 04:44:48','2016-11-23 04:44:49'),(3,'4C','4CS','2017-04-11 05:34:25','2016-11-23 04:44:49'),(4,'UTZ','UTZ CERTIFIED','2016-11-23 04:44:48','2016-11-23 04:44:49'),(5,'FLO','FLO FAIRTRADE','2016-11-23 04:44:48','2016-11-23 04:44:49'),(6,'CAFE','STARBUCKS','2017-02-27 12:21:46','2016-11-23 04:44:49'),(7,'ORGANIC','IMO-ORGANIC','2016-11-23 04:44:48','2016-11-23 04:44:49'),(8,'AAA','NESPRESSO','2016-11-23 04:44:48','2016-11-23 04:44:49');
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
  `cgr_pin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2738 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_growers_cgr`
--

LOCK TABLES `coffee_growers_cgr` WRITE;
/*!40000 ALTER TABLE `coffee_growers_cgr` DISABLE KEYS */;
INSERT INTO `coffee_growers_cgr` VALUES (1,4,'Bulk (Many Growers)','BULK','','BULK','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,0,'NULL','NULL','',NULL,NULL,'NULL'),(11,4,'GITANJO','Agnes Wairimu G Njoroge','','GITANJO/AB0591','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(12,4,'AKIMA','Emmanuel Njuguna Wanyoike','','AKIMA/AA0589A','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(13,4,'CRI AZANIA','Coffee Research Institute','','AZANIA/AC0058','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','2460','',NULL,NULL,'NULL'),(14,4,'BERCO','Theophilus A Mwangi','','BERCO/AG0034','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(15,4,'BULINJA','Zablon Wasike Lukorito','','BULINJA/EB0070','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(16,4,'BWASIA','Francis Nyongesa Nyisia','','BWASIA/CB0632','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(17,4,'CCS','Christopher Sang','','CCS/CB0585','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(18,4,'CHANIA BRIDGE','Chania Bridge Estate','','CHANIA BRIDGE/AB0008','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(19,4,'CIA GATEMBEI','Daniel Kuria Gatembei','','CIA GATEMBEI/AA0871','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(20,4,'CRI KISII','Coffee Research Institute','','CRI KISII/EB0001','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','2460','',NULL,NULL,'NULL'),(21,4,'CRI KITALE','Coffee Research Institute','','CRI KITALE/CB0466','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','2460','',NULL,NULL,'NULL'),(22,4,'CRI KORU','Coffee Research Institute','','CRI KORU/CG0015','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',35,4,1,'232','2460','',NULL,NULL,'NULL'),(23,4,'CRI MARIENE','Coffee Research Institute','','CRI MARIENE/BB0001','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','2460','',NULL,NULL,'NULL'),(24,4,'DANKAE','David Kaguongo Gitatha','','DANKAE/AA0754','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(26,4,'DONCHA','Douglas N Changare','','DONCHA/AB0452','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(27,4,'E M SONS','Cyrus Wanjohi Njeru','','E M SONS/AJ0283','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(28,4,'ELALY','Elaly Nasamdu Wambati','','ELALY/CB0067','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(29,4,'ENDEBESS','Endebess Estate','','ENDEBESS/CB0023','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',22,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(30,4,'FEROMA','Felistas Ngina Magugu','','FEROMA/AA0642','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(31,4,'FOREST-IN','Anne Wanjiru Ngaii','','FOREST-IN/AA0849','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(32,4,'GATHIRU','Central Kenya Ltd','','GATHIRU/AB0056','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(33,4,'GATITHI','Moses Njoroge Chege','','GATITHI/AA0203','NULL','725219832','NULL','NULL','NULL','NULL','NULL','1',1,'NULL','RUIRU',22,1,1,'NULL','NULL','',NULL,NULL,'NULL'),(34,4,'GATOME','wilson Waithaka Gitau','','GATOME/AA0029','NULL','724834857','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','RUIRU',22,1,1,'NULL','NULL','',NULL,NULL,'NULL'),(35,4,'GITERU','Mary Wanjiku Ndirangu','','GITERU/CB0573','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(36,4,'GITURI','Gaiten Kahehura','','GITURI/AB0642','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(37,4,'HEGA','Henry Sammy Gachigua','','HEGA/CB0460','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(38,4,'HIGHLANDS','Phinius Ngari Nyaga','','HIGHLANDS/AJ0055','NULL','722279183','NULL','NULL','NULL','NULL','NULL','1',1,'NULL','NULL',0,1,1,'NULL','NULL','',NULL,NULL,'NULL'),(39,4,'IRIGITHATHI','Kangema Farmlands Ltd','','IRIGITHATHI/AB0044','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',1,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(40,4,'ISHIGA','Ishmael Gatuna','','ISHIGA/CB0603','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(41,4,'CRI JACARANDA','Coffee Research Institute','','JACARANDA/AC0012','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','2460','',NULL,NULL,'NULL'),(42,4,'JAMUKA','James Muturi Kabaru','','JAMUKA/AB0113','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(43,4,'JOSTER','Joseph Nduati Murugami','','JOSTER/AA0390B','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(44,4,'JOWAKI','Jowaki Estate','','JOWAKI/AB0252','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(45,4,'JUNGLE','Keremara Ltd','','JUNGLE/AG0008','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',1,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(46,4,'KABATI','Bernard Wachai Njoroge','','KABATI/AB0673','NULL','NULL','NULL','NULL','NULL','NULL','NULL','2',1,'NULL','NULL',21,1,1,'NULL','NULL','',NULL,NULL,'NULL'),(47,4,'KAGUNYA','Timothy Gitau Gacheha','','KAGUNYA/AA0333C','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(48,4,'KAHATA','Kahata Estates Ltd','','KAHATA/AA0247','mburukahata@gmail.com','723311078','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'10','NULL','',NULL,NULL,'NULL'),(49,4,'KAIRICHI','Gakuru Gakuraru','','KAIRICHI/AB0641','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(50,4,'KAMATHIA','James Mburu Muiruri','','KAMATHIA/CB0608','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(51,4,'KAMBIRIRIA','Joseph Kamau Muchiri','','KAMBIRIRIA/CB0508','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(52,4,'KAMWEA','Francis Nyagah Kamwea','','KAMWEA/BD0045','NULL','720782211','325','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',14,10,1,'NULL','NULL','',NULL,NULL,'NULL'),(53,4,'KANYORA','Paul Wainaina Kariuki','','KANYORA/AA0387','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(54,4,'KARIRU','Paul Gathiaka Kimani','','KARIRU/AA0481','NULL','702464857','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(55,4,'KARUNGURU','Karunguru Plantations','','KARUNGURU/AC0014','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(56,4,'KAWA','Isaac Kariri Gacheha','','KAWA/AA0333E','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(57,4,'KAYS ESTATE','Kays Investments Ltd','','KAYS ESTATE /AC0084','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(58,4,'KIBUNGA','Eliphas Njera Gacoki','','KIBUNGA/AJ0134','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(59,4,'KIGANDA','Magana Holdings Ltd','','KIGANDA/AB0034','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',1,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(60,4,'KIGUTHA','Kigutha Farmers Kenya Ltd','','KIGUTHA/AA0045','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NAIROBI',22,1,1,'NULL','NULL','',NULL,NULL,'NULL'),(61,4,'KIHURI ESTATE','Kihuri Estate','','KIHURI ESTATE/AG0004','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',22,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(62,4,'KIMUNYE','Cyrus Kabira','','KIMUNYE/AJ0254','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(63,4,'KINGS','James Kamau Kimani and Peter Kimani Kamau','','KINGS/AA0867','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(64,4,'KIRANGA','Danson Gichuki Njeru','','KIRANGA/AJ0444','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(65,4,'KIRIGA','Kiriga Coffee Estate','','KIRIGA/AB0001','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(66,4,'PGNN','Peter G N Nganga','','PGNN /AA0279B','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(67,4,'KISUKE GREEN','Samson Kisuke','','KISUKE GREEN/BF0199','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(68,4,'KIUMU','Gabriel Mburu Maina','','KIUMU/AB1976','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(69,4,'KIVATI','Mary Wambui Kibe','','KIVATI/AJ0008','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(70,4,'KUIRERA','Samson Kimari Mirara','','KUIRERA/CB0645','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(71,4,'KUNGU WAWERU','Kungu wa Waweru','','KUNGU WAWERU/AA0876','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(72,4,'KWA NYOKA','Deep River Estates Ltd','','KWA NYOKA/AB0246','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',1,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(73,4,'KWONA MBEE','Kennedy Mutuku','','KWONA MBEE/BF0104A','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(74,4,'KYANDU','Samuel Kyanui Ndavi','','KYANDU/BF0081','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(75,4,'LISURA','Kin-Est Co  Ltd','','LISURA/AA0068','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(76,4,'MACHURE','Machure Estate','','MACHURE/AB0019','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',1,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(77,4,'MAGUMU','Magumu Plantations Ltd','','MAGUMU/AC0042','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','4C',NULL,NULL,'NULL'),(78,4,'JUMWA','Julius Mwangi Maingi','','JUMWA/AB0552B','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(79,4,'MAJI MZURI','Kamiti FCS Ltd','','MAJI MZURI/AE0019','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',1,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(80,4,'MAKWA','Chania Mwahota Ikai','','MAKWA/AB0020','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(81,4,'MANGU','Kirathe Ltd','','MANGU/AB0028','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(82,4,'MANZA','Joseph Musyoka Manyunza','','MANZA/BF0158','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(83,4,'MARMU','Stephen Uimbia Muritu','','MARMU/AB0528','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(84,4,'MATHONDA','Joseph Murigi Kanyoige','','MATHONDA/AA0298A','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(85,4,'MAWIKO','Elizabeth Waithira Ngeru','','MAWIKO/AB0146A','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(86,4,'MICHWE','Stephen Waithaka Muitah','','MICHWE/AA0226C','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(87,4,'MIHANDO','Kigio Group Co Ltd','','MIHANDO/AB0002','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',1,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(88,4,'MONDORO','Lucas Kamau Muriu','','MONDORO/AA0515D','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(89,4,'MONGALIA DIARY LTD','Mongalia Dairy Ltd','','MONGALIA DIARY LTD/AD0012','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(90,4,'MUBUTHI','Jacob Githinji Gichihi','','MUBUTHI/CB0605','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(91,4,'MUGI','Mugi Estate(Erustus Nguyo Gitonga)','','MUGI/AG0121','mugifp@gmail.com','721905884','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',35,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(92,4,'MUHUGU','Muhugu','','MUHUGU/AA0050','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NAIROBI',22,1,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(93,4,'MUKIMWA','Henry Wamugo Nyaga','','MUKIMWA/BD0105','NULL','727075262','1053','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',14,10,1,'NULL','NULL','',NULL,NULL,'NULL'),(94,4,'NGAMUKUMBU','James Mbinda Mutie','','NGAMUKUMBU/BF0212','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(95,4,'MUTEMBA','MUTEMBA','','MUTEMBA/AA0359B','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(96,4,'MUTOO','Francis W Muhia','','MUTOO/AA0314C','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(97,4,'MUTUAMBURI','Karanja Gathuri','','MUTUAMBURI/AA0334','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(98,4,'MWANDANI','Martin Mutua Mweu','','MWANDANI/BF0169','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(99,4,'MWANIA THIYA','Samuel Njuguna Kanyiri','','MWANIA THIYA/AB0514A','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(100,4,'MWANJO','Patrick Kanyi Mwanili','','MWANJO/AA0648','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(101,4,'MWIWA FARM','Samuel Mwirigi Wainaina','','MWIWA FARM/AA0267A','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(102,4,'NCHENGO','Henkin Ltd','','NCHENGO/AC0065','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',22,0,1,'NULL','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NULL'),(103,4,'NDARACA','John Mbugua Murugami','','NDARACA/AA0390A','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(104,4,'NDARUGU PLANTATION','Ndarugu Plantations','','NDARUGU/AB0039','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(105,4,'NEW PILLION','New Pillion','','NEW PILLION/AC0037','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(106,4,'NGERU','Michael Kairu Ngeru','','NGERU/CB0639','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(107,4,'NGUNGU','Ngungu Growers Co Ltd','','NGUNGU/AJ0233','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(108,4,'NICO','Paul Wanjui','','NICO/AA0331','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(109,4,'NJOMIWA','Michael Njoroge Mwangi','','NJOMIWA/AB0347','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(110,4,'NJUJOS','Peter Njuguna Gachau','','NJUJOS/AB0718','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(111,4,'NYAKIO','Nyakio Coffee Estate','','NYAKIO/AB0015','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(112,4,'NYALA ESTATE','Kamiti Properties','','NYALA ESTATE/AA0065','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(113,4,'NYAROCHE','Philip Omamo','','NYAROCHE/CC0052','NULL','725057313','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',42,3,1,'NULL','NULL','',NULL,NULL,'NULL'),(114,4,'ONENKI','Nancy Waithira Njoroge','','ONENKI/AA0789','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(115,4,'PHILMAR','Philip M Kimani','','PHILMAR/AJ0447','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(116,4,'RAMROK','Leonard Kago Kariuki','','RAMROK/AJ0333','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(117,4,'CRI RUKERA','Coffee Research Institute','','CRI RUKERA/AC0031','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','2460','',NULL,NULL,'NULL'),(118,4,'RUWAWA','Ruth Wambui Wairimu','','RUWAWA/AA0870','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(119,4,'SESEVANIA','Gabriel Kaara Gitahi','','SESEVANIA/CB0462','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(120,4,'SOGOMO','Philip Sogomo Cheruiyot','','SOGOMO/CB0530','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(121,4,'STOVER','George Onzere','','STOVER/CB0644','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(122,4,'SUNBELT','Latifah Sulel Babuh','','SUNBELT/CB0646','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(123,4,'SUNUGA','Susan Nungari Gachui','','SUNUGA/AA0819','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(124,4,'SWANI','Swani Coffee Est Ltd','','SWANI/AD0019','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(125,4,'TEREMUKA','Chania Mwahota Ikai','','TEREMUKA/CA0057','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(126,4,'THETA','Akiba Properties Ltd','','THETA/AC0004','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(127,4,'THIGUKU','George Muriuki Kariu','','THIGUKU /AJ0391','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(128,4,'TIMKA','Timothy Kariuki Ngugi','','TIMKA/AA0732','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(129,4,'TULEL','Beatrice M Hicks','','TULEL/CB0584','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(130,4,'TWIN RIVER 1','John Mbuthia Kamau','','TWIN RIVER 1/AF0017','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(131,4,'TWIN RIVER 2','John Mbuthia Kamau','','TWIN RIVER 2/AB0259','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(132,4,'UTHATANI','Stephen Muatha Maingi','','UTHATANI/BF0051','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(133,4,'WAGUTHU','Waguthu Farmers Ltd','','WAGUTHU/AC0039','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(134,4,'WAMUGURE','Paul Ndungu Mambo','','WAMUGURE/AB0422','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(135,4,'WANAMBUKO','Dishon Wanambuko Waliaula','','WANAMBUKO/DB0036','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',39,6,1,'NULL','NULL','',NULL,NULL,'NULL'),(136,4,'WANDEKEI(Muhuti)','Esther Gachabi Munjiri','','WANDEKEI(Muhuti)/CB0593','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(137,4,'WANJU','Daniel Njuguna Kabari','','WANJU/CB0594','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(138,4,'WANYANGI','Mark Karanja Mbatia','','WANYANGI/AB0197C','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(139,4,'WEKHONYE','Kevin Magero Gumo','','WEKHONYE/CB0637','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(140,4,'WERIMBA','Samuel Phinehas Njue Nyagah','','WERIMBA/BD0047','NULL','720848006','262','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',14,10,1,'NULL','NULL','',NULL,NULL,'NULL'),(141,4,'WONDERLAND','Isaac Chege Gachau','','WONDERLAND/AA0836','NULL','727089705','NULL','NULL','NULL','NULL','NULL','1',1,'NULL','THIKA',0,1,1,'1000','NULL','',NULL,NULL,'NULL'),(142,4,'YADINI','Yadini Holdings Ltd','','YADINI/AC0027','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','NULL','',NULL,NULL,'NULL'),(152,2,'GATHAGE FCS','GATHAGE F. C. SOC. LTD.','','GATHAGE FCS/XAA12','NULL','NULL','391','NULL','NULL','NULL','NULL','NULL',1,'NULL','RUIRU',0,0,1,'232','152','',NULL,NULL,'NULL'),(153,3,'GATHAGE','GATHAGE F. C. SOC. LTD.','','GATHAGE/XAA12F01','NULL','NULL','391','NULL','NULL','NULL','NULL','NULL',1,'NULL','RUIRU',0,0,1,'232','152','',NULL,NULL,'NULL'),(154,3,'NEMBU','GATHAGE F. C. SOC. LTD.','','NEMBU/XAA12F02','NULL','NULL','391','NULL','NULL','NULL','NULL','NULL',1,'NULL','RUIRU',0,0,1,'232','152','',NULL,NULL,'NULL'),(155,2,'GATUNYU KIGIO FCS','GATUNYU KIGIO F.C.S. LTD.','','GATUNYU KIGIO FCS/XAB40','gayunykigio@yahoo.com','722602105','1184','NULL','NULL','NULL','2015-07-21 00:00:00','NULL',1,'NULL','THIKA',0,0,1,'1000','155','',NULL,NULL,'NULL'),(156,3,'MUCHAI','GATUNYU KIGIO F.C.S. LTD.','','MUCHAI/XAB40F01','NULL','NULL','1184','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','155','',NULL,NULL,'NULL'),(157,3,'GAKURARI','GATUNYU KIGIO F.C.S. LTD.','','GAKURARI/XAB40F02','NULL','NULL','1184','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','155','',NULL,NULL,'NULL'),(158,3,'GICHAMURI','GATUNYU KIGIO F.C.S. LTD.','','GICHAMURI/XAB40F03','NULL','NULL','1184','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','155','',NULL,NULL,'NULL'),(159,3,'WAMBARU','GATUNYU KIGIO F.C.S. LTD.','','WAMBARU /XAB40F04','NULL','NULL','1184','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','155','',NULL,NULL,'NULL'),(160,2,'MUHARA FCS','MUHARA F.C.SOC. LTD.','','MUHARA FCS/XAA17','NULL','NULL','345','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','160','',NULL,NULL,'NULL'),(161,3,'MAGOMANO','MUHARA F.C.SOC. LTD.','','MAGOMANO/XAA17F01','NULL','NULL','345','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','160','',NULL,NULL,'NULL'),(162,3,'MUTHIGA','MUHARA F.C.SOC. LTD.','','MUTHIGA/XAA17F02','NULL','NULL','345','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','160','',NULL,NULL,'NULL'),(163,2,'NEW GATANGA FCS','NEW GATANGA F.C.S. LTD.','','NEW GATANGA FCS/XAB43','NULL','NULL','353','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','163','',NULL,NULL,'NULL'),(164,3,'KIAMA','NEW GATANGA F.C.S. LTD.','','KIAMA/XAB43F01','NULL','NULL','353','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','163','',NULL,NULL,'NULL'),(165,3,'MUKURWE','NEW GATANGA F.C.S. LTD.','','MUKURWE/XAB43F02','NULL','NULL','353','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','163','',NULL,NULL,'NULL'),(166,3,'GATHANJI','NEW GATANGA F.C.S. LTD.','','GATHANJI/XAB43F03','NULL','NULL','353','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','163','',NULL,NULL,'NULL'),(167,3,'KIHARIKA','NEW GATANGA F.C.S. LTD.','','KIHARIKA/XAB43F04','NULL','NULL','353','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','163','',NULL,NULL,'NULL'),(168,2,'RITHO FCS','RITHO F.C.S. LTD.','','RITHO FCS/XAA20','rithocoffee@gmail.com','729276826','685','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','168','',NULL,NULL,'NULL'),(169,3,'HANDEGE','RITHO F.C.S. LTD.','','HANDEGE/XAA20F01','rithocoffee@gmail.com','729276826','685','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','168','',NULL,NULL,'NULL'),(170,3,'WAMUGUMA','RITHO F.C.S. LTD.','','WAMUGUMA/XAA20F02','rithocoffee@gmail.com','729276826','685','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','168','',NULL,NULL,'NA'),(171,2,'THIKAGIKI FCS','THIKAGIKI F.C.S. LTD.','','THIKAGIKI FCS/XAB41','NULL','NULL','1124','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','171','',NULL,NULL,'NULL'),(172,3,'THITHI','THIKAGIKI F.C.S. LTD.','','THITHI/XAB41F01','NULL','NULL','1124','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','171','',NULL,NULL,'NULL'),(173,3,'KIRIANI','THIKAGIKI F.C.S. LTD.','','KIRIANI/XAB41F02','NULL','NULL','1124','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','171','',NULL,NULL,'NULL'),(174,3,'GITIRI','THIKAGIKI F.C.S. LTD.','','GITIRI/XAB41F03','NULL','NULL','1124','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','171','',NULL,NULL,'NULL'),(175,3,'KAHUNYO','THIKAGIKI F.C.S. LTD.','','KAHUNYO/XAB41F04','NULL','NULL','1124','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','171','',NULL,NULL,'NULL'),(176,2,'THIRIRIKA FCS','THIRIRIKA F. C. SOC.','','THIRIRIKA FCS/XAA25','NULL','NULL','781','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','176','',NULL,NULL,'NULL'),(177,3,'KIGANJO','THIRIRIKA F. C. SOC.','','KIGANJO/XAA25F01','NULL','NULL','781','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','176','',NULL,NULL,'NULL'),(178,3,'GITHEMBE','THIRIRIKA F. C. SOC.','','GITHEMBE/XAA25F02','NULL','NULL','781','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','176','',NULL,NULL,'NULL'),(179,3,'NDUNDU','THIRIRIKA F. C. SOC.','','NDUNDU/XAA25F03','NULL','NULL','781','NULL','NULL','NULL','NULL','NULL',1,'NULL','GATUNDU',0,0,1,'1030','176','',NULL,NULL,'NULL'),(180,2,'GIKIUGA FCS','GIKIUGA  F. C. SOC. LTD.','','GIKIUGA FCS/XAB58','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','180','',NULL,NULL,'NULL'),(181,3,'GIKIUGA','GIKIUGA  F. C. SOC. LTD.','','GIKIUGA/XAB58F01','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','180','',NULL,NULL,'NULL'),(182,2,'KANDARA FCS','KANDARA C.G.C.S.LTD','','KANDARA FCS/XAB06','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(183,3,'GAKARARA','KANDARA C.G.C.S.LTD','','GAKARARA/XAB06F01','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(184,3,'KAGUTHI','KANDARA C.G.C.S.LTD','','KAGUTHI/XAB06F02','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(185,3,'MUNGARIA','KANDARA C.G.C.S.LTD','','MUNGARIA/XAB06F03','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(186,3,'KIRANGA','KANDARA C.G.C.S.LTD','','KIRANGA/XAB06F04','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(187,3,'NGARARIA','KANDARA C.G.C.S.LTD','','NGARARIA/XAB06F05','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(188,3,'NDIARAINI','KANDARA C.G.C.S.LTD','','NDIARAINI/XAB06F06','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(189,3,'GAKUI','KANDARA C.G.C.S.LTD','','GAKUI/XAB06F07','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(190,3,'GATHIGA','GATHIGA C.G.C.S.LTD','','GATHIGA/XAB94F01','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','2060','',NULL,NULL,'NULL'),(191,3,'GITOROBO','KANDARA C.G.C.S.LTD','','GITOROBO/XAB06F09','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(192,3,'RURIGI-RWA THEE','KANDARA C.G.C.S.LTD','','RURIGI-RWA THEE/XAB06F10','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(193,3,'KIAMANDE','KANDARA C.G.C.S.LTD','','KIAMANDE/XAB06F11','NULL','NULL','177','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','182','',NULL,NULL,'NULL'),(194,2,'KIORU FCS','KIORU F. C. SOC. LTD.','','KIORU FCS/XAB75','NULL','NULL','1788','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','194','',NULL,NULL,'NULL'),(195,3,'KIORU','KIORU F. C. SOC. LTD.','','KIORU/XAB75F01','NULL','NULL','1788','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','194','',NULL,NULL,'NULL'),(196,2,'THANGA-INI FCS','THANGA-INI C.G.C.S.LTD','','THANGA-INI FCS/XAB20','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(197,3,'THANGAINI','THANGA-INI C.G.C.S.LTD','','THANGAINI/XAB20F01','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(198,3,'KARIANI','THANGA-INI C.G.C.S.LTD','','KARIANI/XAB20F02','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(199,3,'GIKOMORA','THANGA-INI C.G.C.S.LTD','','GIKOMORA/XAB20F03','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(200,3,'GITHIMA THANGA','THANGA-INI C.G.C.S.LTD','','GITHIMA/XAB20F04','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(201,3,'MATHAREINI','THANGA-INI C.G.C.S.LTD','','MATHAREINI/XAB20F05','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(202,3,'KIIRIANGORO','THANGA-INI C.G.C.S.LTD','','KIIRIANGORO/XAB20F06','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(203,3,'NGUKU','THANGA-INI C.G.C.S.LTD','','NGUKU/XAB20F07','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(204,3,'GITUGU THANGA','THANGA-INI C.G.C.S.LTD','','GITUGU/XAB20F08','NULL','NULL','58','NULL','NULL','NULL','NULL','NULL',1,'NULL','MARAGUA',0,0,1,'10205','196','',NULL,NULL,'NULL'),(205,2,'IYEGO FCS','IYEGO C.G.C. SOC. LTD.','','IYEGO FCS/XAB13','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',22,0,1,'10202','205',',',NULL,NULL,'NULL'),(206,3,'IYEGO','IYEGO C.G.C. SOC. LTD.','','IYEGO/XAB13F01','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',51,0,1,'10202','205',',',NULL,NULL,'NULL'),(207,3,'MUNUNGA','IYEGO C.G.C. SOC. LTD.','','MUNUNGA/XAB13F02','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',22,0,1,'10202','205',',',NULL,NULL,'NULL'),(208,3,'GATUBU','IYEGO C.G.C. SOC. LTD.','','GATUBU/XAB13F03','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',22,0,1,'10202','205',',',NULL,NULL,'NULL'),(209,3,'MARIMIRA','IYEGO C.G.C. SOC. LTD.','','MARIMIRA/XAB13F04','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',22,0,1,'10202','205',',',NULL,NULL,'NULL'),(210,3,'KABIRUINI','IYEGO C.G.C. SOC. LTD.','','KABIRUINI/XAB13F05','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',0,0,1,'10202','205','FLO',NULL,NULL,'NULL'),(211,3,'WATUHA','IYEGO C.G.C. SOC. LTD.','','WATUHA/XAB13F06','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',22,0,1,'10202','205',',',NULL,NULL,'NULL'),(212,3,'GATHIMA','IYEGO C.G.C. SOC. LTD.','','GATHIMA/XAB13F07','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',0,0,1,'10202','205','FLO',NULL,NULL,'NULL'),(213,3,'GITURA','IYEGO C.G.C. SOC. LTD.','','GITURA/XAB13F08','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',22,0,1,'10202','205',',',NULL,NULL,'NULL'),(214,3,'KIAIRATHE','IYEGO C.G.C. SOC. LTD.','','KIAIRATHE/XAB13F09','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',0,0,1,'10202','205','FLO',NULL,NULL,'NULL'),(215,3,'THANGATHI-IYEGO','IYEGO C.G.C. SOC. LTD.','','THANGATHI-IYEGO/XAB13F10','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',0,0,1,'10202','205','FLO',NULL,NULL,'NULL'),(216,3,'NYAKAHURA','IYEGO C.G.C. SOC. LTD.','','NYAKAHURA/XAB13F11','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',0,0,1,'10202','205','FLO',NULL,NULL,'NULL'),(217,3,'KIRANGANO','IYEGO C.G.C. SOC. LTD.','','KIRANGANO/XAB13F12','NULL','NULL','25','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGEMA',0,0,1,'10202','205','FLO',NULL,NULL,'NULL'),(218,2,'AGUTHI FCS','AGUTHI FARMERS CO-OP. SOC. LTD.','','AGUTHI FCS/XAC55','NULL','NULL','12439','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','218','',NULL,NULL,'NULL'),(219,3,'KAGUMO','AGUTHI FARMERS CO-OP. SOC. LTD.','','KAGUMO/XAC55F01','NULL','NULL','12439','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','218','',NULL,NULL,'NULL'),(220,3,'MUNGARIA','AGUTHI FARMERS CO-OP. SOC. LTD.','','MUNGARIA/XAC55F02','NULL','NULL','12439','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','218','',NULL,NULL,'NULL'),(221,3,'THANGEINI','AGUTHI FARMERS CO-OP. SOC. LTD.','','THANGEINI/XAC55F03','NULL','NULL','12439','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','218','',NULL,NULL,'NULL'),(222,3,'GAKII CENTRAL','AGUTHI FARMERS CO-OP. SOC. LTD.','','GAKII CENTRAL/XAC55F04','NULL','NULL','12439','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','218','',NULL,NULL,'NULL'),(223,3,'GITITU','AGUTHI FARMERS CO-OP. SOC. LTD.','','GITITU/XAC55F05','NULL','NULL','12439','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','218','',NULL,NULL,'NULL'),(224,2,'GAKUYU FCS','GAKUYU F. C. SOC. LTD.','','GAKUYU FCS/XAC07','NULL','NULL','566','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',19,0,1,'10101','224','',NULL,NULL,'NULL'),(225,3,'NDIMA-INI','GAKUYU F. C. SOC. LTD.','','NDIMA-INI/XAC07F01','NULL','NULL','566','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','224','',NULL,NULL,'NULL'),(226,3,'KIRIGU','GAKUYU F. C. SOC. LTD.','','KIRIGU/XAC07F03','NULL','NULL','566','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','224','',NULL,NULL,'NULL'),(227,2,'GIKANDA FCS','GIKANDA F.C.S. LTD.','','GIKANDA FCS/XAC09','NULL','NULL','1518','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',45,0,1,'10101','227','RA,FLO',NULL,NULL,'NULL'),(228,3,'GICHATHA-INI','GIKANDA F.C.S. LTD.','','GICHATHA-INI/XAC09F01','NULL','NULL','1518','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','227','',NULL,NULL,'NULL'),(229,3,'NDARO-INI','GIKANDA F.C.S. LTD.','','NDARO-INI/XAC09F02','NULL','NULL','1518','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',45,0,1,'10101','227','RA,FLO',NULL,NULL,'NULL'),(230,3,'KANGOCHO','GIKANDA F.C.S. LTD.','','KANGOCHO/XAC09F03','NULL','NULL','1518','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',45,0,1,'10101','227','RA,FLO',NULL,NULL,'NULL'),(231,2,'NEW GIKARU FCS','NEW GIKARU C. G. C. SOC. LTD.','','NEW GIKARU FCS/XAC40','NULL','NULL','771','NULL','NULL','NULL','NULL','NULL',1,'NULL','MUKURWE-INI',0,0,1,'10103','231','',NULL,NULL,'NULL'),(232,3,'ICHAMARA','NEW GIKARU C. G. C. SOC. LTD.','','ICHAMARA/XAC40F01','NULL','NULL','771','NULL','NULL','NULL','NULL','NULL',1,'NULL','MUKURWE-INI',0,0,1,'10103','231','',NULL,NULL,'NULL'),(233,3,'THANGATHI-NEW GIKARU','NEW GIKARU C. G. C. SOC. LTD.','','THANGATHI-NEW GIKARU/XAC40F02','NULL','NULL','771','NULL','NULL','NULL','NULL','NULL',1,'NULL','MUKURWE-INI',0,0,1,'10103','231','',NULL,NULL,'NULL'),(234,3,'MUTWEWATHI','NEW GIKARU C. G. C. SOC. LTD.','','MUTWEWATHI/XAC40F03','NULL','NULL','771','NULL','NULL','NULL','NULL','NULL',1,'NULL','MUKURWE-INI',0,0,1,'10103','231','',NULL,NULL,'NULL'),(235,3,'KAHURO','NEW GIKARU C. G. C. SOC. LTD.','','KAHURO/XAC40F04','NULL','NULL','771','NULL','NULL','NULL','NULL','NULL',1,'NULL','MUKURWE-INI',0,0,1,'10103','231','',NULL,NULL,'NULL'),(236,3,'KIUU','NEW GIKARU C. G. C. SOC. LTD.','','KIUU/XAC40F05','NULL','NULL','771','NULL','NULL','NULL','NULL','NULL',1,'NULL','MUKURWE-INI',0,0,1,'10103','231','',NULL,NULL,'NULL'),(237,2,'MUTHEKA FCS','MUTHEKA F.C.S. LTD.','','MUTHEKA FCS/XAC56','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',22,0,1,'10100','237','FLO',NULL,NULL,'NULL'),(238,3,'CHORONGI','MUTHEKA F.C.S. LTD.','','CHORONGI/XAC56F01','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','237','',NULL,NULL,'NULL'),(239,3,'KAIGURI','MUTHEKA F.C.S. LTD.','','KAIGURI/XAC56F02','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','237','',NULL,NULL,'NULL'),(240,3,'KAMUYU','MUTHEKA F.C.S. LTD.','','KAMUYU/XAC56F03','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','237','',NULL,NULL,'NULL'),(241,3,'KIANDU','MUTHEKA F.C.S. LTD.','','KIANDU/XAC56F04','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','237','',NULL,NULL,'NULL'),(242,3,'KIGWANDI','MUTHEKA F.C.S. LTD.','','KIGWANDI/XAC56F05','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','237','',NULL,NULL,'NULL'),(243,3,'KIHUYO','MUTHEKA F.C.S. LTD.','','KIHUYO/XAC56F06','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',0,0,1,'10100','237','',NULL,NULL,'NULL'),(244,3,'MUTHUA-INI','MUTHEKA F.C.S. LTD.','','MUTHUA-INI/XAC56F07','NULL','NULL','1703','NULL','NULL','NULL','NULL','NULL',1,'NULL','NYERI',19,0,1,'10100','237','FLO',NULL,NULL,'NULL'),(245,2,'RUTUMA FCS','RUTUMA  F.C.S. LTD.','','RUTUMA FCS/XAC61','NULL','NULL','1935','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','245','',NULL,NULL,'NULL'),(246,2,'BARAGWI FCS','BARAGWI F.C. SOC. LTD.','','BARAGWI FCS/XAD03','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(247,3,'MUCHAGARA','BARAGWI F.C. SOC. LTD.','','MUCHAGARA/XAD03F01','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(248,3,'KAGONGO','BARAGWI F.C. SOC. LTD.','','KAGONGO/XAD03F02','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(249,3,'RUAMBITI','BARAGWI F.C. SOC. LTD.','','RUAMBITI/XAD03F03','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(250,3,'KARUMANDI','BARAGWI F.C. SOC. LTD.','','KARUMANDI/XAD03F04','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(251,3,'NYANJA','BARAGWI F.C. SOC. LTD.','','NYANJA/XAD03F05','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(252,3,'KIANYAGA','BARAGWI F.C. SOC. LTD.','','KIANYAGA/XAD03F06','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(253,3,'GUAMA','BARAGWI F.C. SOC. LTD.','','GUAMA/XAD03F07','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(254,3,'GACHAMI','BARAGWI F.C. SOC. LTD.','','GACHAMI/XAD03F08','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(255,3,'KIANJIRU','BARAGWI F.C. SOC. LTD.','','KIANJIRU/XAD03F09','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(256,3,'KARIRU','BARAGWI F.C. SOC. LTD.','','KARIRU/XAD03F10','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(257,3,'GITHIURURI','BARAGWI F.C. SOC. LTD.','','GITHIURURI/XAD03F11','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(258,3,'THIMU','BARAGWI F.C. SOC. LTD.','','THIMU/XAD03F12','NULL','NULL','9','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','246',',',NULL,NULL,'NULL'),(259,2,'KABARE FCS','KABARE F.C. SOC. LTD.','','KABARE FCS/XAD02','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(260,3,'KIRINGA','KABARE F.C. SOC. LTD.','','KIRINGA/XAD02F01','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(261,3,'KONYU','KABARE F.C. SOC. LTD.','','KONYU/XAD02F02','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(262,3,'KARANI','KABARE F.C. SOC. LTD.','','KARANI/XAD02F03','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(263,3,'KIANGOMBE','KABARE F.C. SOC. LTD.','','KIANGOMBE/XAD02F04','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259','FLO',NULL,NULL,'NULL'),(264,3,'KABOYO','KABARE F.C. SOC. LTD.','','KABOYO/XAD02F05','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',0,0,1,'10300','259','FLO',NULL,NULL,'NULL'),(265,3,'MUKURE','KABARE F.C. SOC. LTD.','','MUKURE /XAD02F06','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(266,3,'MUKENGERIA','KABARE F.C. SOC. LTD.','','MUKENGERIA/XAD02F07','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(267,3,'KIMANDI','KABARE F.C. SOC. LTD.','','KIMANDI/XAD02F08','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(268,3,'KATHATA','KABARE F.C. SOC. LTD.','','KATHATA/XAD02F09','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(269,3,'KIANGOTHE','KABARE F.C. SOC. LTD.','','KIANGOTHE/XAD02F10','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(270,3,'KIAMICIRI','KABARE F.C. SOC. LTD.','','KIAMICIRI/XAD02F11','NULL','NULL','59','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',20,0,1,'10300','259',',',NULL,NULL,'NULL'),(271,2,'KIBIRIGWI FCS','KIBIRIGWI F.C. SOC. LTD.','','KIBIRIGWI FCS/XAD07','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(272,3,'RAGATI','KIBIRIGWI F.C. SOC. LTD.','','RAGATI/XAD07F01','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(273,3,'NGUGUINI','KIBIRIGWI F.C. SOC. LTD.','','NGUNGUINI/XAD07F02','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(274,3,'MUKANGU','KIBIRIGWI F.C. SOC. LTD.','','MUKANGU/XAD07F03','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(275,3,'KIANGAI','KIBIRIGWI F.C. SOC. LTD.','','KIANGAI/XAD07F04','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(276,3,'KIBINGOTI','KIBIRIGWI F.C. SOC. LTD.','','KIBINGOTI/XAD07F05','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(277,3,'THUNGURI','KIBIRIGWI F.C. SOC. LTD.','','THUNGURI /XAD07F06','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(278,3,'KIANJEGE','KIBIRIGWI F.C. SOC. LTD.','','KIANJEGE/XAD07F07','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(279,3,'CHEMA','KIBIRIGWI F.C. SOC. LTD.','','CHEMA/XAD07F08','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(280,3,'KIBIRIGWI','KIBIRIGWI F.C. SOC. LTD.','','KIBIRIGWI/XAD07F09','NULL','NULL','31','NULL','NULL','NULL','NULL','NULL',1,'NULL','KARATINA',0,0,1,'10101','271','FLO',NULL,NULL,'NULL'),(281,2,'KIBURI FCS','KIBURI F. C. S. LTD.','','KIBURI FCS/XAD12','NULL','NULL','46','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',0,0,1,'10300','281','',NULL,NULL,'NULL'),(282,3,'KIBURI','KIBURI F. C. S. LTD.','','KIBURI/XAD12F01','NULL','NULL','46','NULL','NULL','NULL','NULL','NULL',1,'NULL','KERUGOYA',0,0,1,'10300','281','',NULL,NULL,'NULL'),(283,2,'NGIRIAMBU FCS','NGIRIAMBU F. C. SOC. LTD.','','NGIRIAMBU FCS/XAD19','NULL','NULL','218','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',0,0,1,'10301','283','FLO',NULL,NULL,'NULL'),(284,3,'KIRI','NGIRIAMBU F. C. SOC. LTD.','','KIRI/XAD19F01','NULL','NULL','218','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',0,0,1,'10301','283','FLO',NULL,NULL,'NULL'),(285,3,'KEGWA','NGIRIAMBU F. C. SOC. LTD.','','KEGWA/XAD19F02','NULL','NULL','218','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',48,0,1,'10301','283','FLO',NULL,NULL,'NULL'),(286,2,'THIRIKWA FCS','THIRIKWA F. C. SOC. LTD.','','THIRIKWA FCS/XAD16','NULL','NULL','359','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','286','',NULL,NULL,'NULL'),(287,3,'GAKUYU-INI','THIRIKWA F. C. SOC. LTD.','','GAKUYU-INI/XAD16F01','NULL','NULL','359','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIANYAGA',22,0,1,'10301','286','',NULL,NULL,'NULL'),(288,2,'MUKUNE FCS','MUKUNE F. C. SOC. LTD.','','MUKUNE FCS/XBB22','NULL','NULL','2146','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','288','',NULL,NULL,'NULL'),(289,3,'MICHOGOMONE','MUKUNE F. C. SOC. LTD.','','MICHOGOMONE/XBB22F01','NULL','NULL','2146','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','288','',NULL,NULL,'NULL'),(290,3,'GAKUNGUGU','MUKUNE F. C. SOC. LTD.','','GAKUNGUGU/XBB22F02','NULL','NULL','2146','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','288','',NULL,NULL,'NULL'),(291,3,'NKARINE','MUKUNE F. C. SOC. LTD.','','NKARINE/XBB22F03','NULL','NULL','2146','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','288','',NULL,NULL,'NULL'),(292,3,'MWITUMURA','MUKUNE F. C. SOC. LTD.','','MWITUMURA/XBB22F04','NULL','NULL','2146','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','288','',NULL,NULL,'NULL'),(293,2,'KIANJURI FCS','KIANJURI F.C. SOC. LTD.','','KIANJURI FCS/XBB05','NULL','NULL','2899','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','293','',NULL,NULL,'NULL'),(294,3,'GACHIEGE','KIANJURI F.C. SOC. LTD.','','GACHIEGE/XBB05F01','NULL','NULL','2899','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','293','',NULL,NULL,'NULL'),(295,3,'GITUGU KIANJURI','KIANJURI F.C. SOC. LTD.','','GITUGU/XBB05F02','NULL','NULL','2899','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','293','',NULL,NULL,'NULL'),(296,3,'ITHIMA','KIANJURI F.C. SOC. LTD.','','ITHIMA/XBB05F03','NULL','NULL','2899','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','293','',NULL,NULL,'NULL'),(297,3,'KIAMIRIRU','KIANJURI F.C. SOC. LTD.','','KIAMIRIRU/XBB05F04','NULL','NULL','2899','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','293','',NULL,NULL,'NULL'),(298,3,'NGONYI','KIANJURI F.C. SOC. LTD.','','NGONYI/XBB05F05','NULL','NULL','2899','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','293','',NULL,NULL,'NULL'),(299,3,'NTHUNGU','KIANJURI F.C. SOC. LTD.','','NTHUNGU/XBB05F06','NULL','NULL','2899','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','293','',NULL,NULL,'NULL'),(300,2,'KATHERI FCS','KATHERI F.C. SOC. LTD.','','KATHERI FCS/XBB04','NULL','NULL','6','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','300','',NULL,NULL,'NULL'),(301,3,'GICHUGENE','KATHERI F.C. SOC. LTD.','','GICHUGENE/XBB04F01','NULL','NULL','6','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','300','',NULL,NULL,'NULL'),(302,3,'KINJO','KATHERI F.C. SOC. LTD.','','KINJO/XBB04F02','NULL','NULL','6','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','300','',NULL,NULL,'NULL'),(303,3,'RIIJI','KATHERI F.C. SOC. LTD.','','RIIJI/XBB04F03','NULL','NULL','6','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','300','',NULL,NULL,'NULL'),(304,3,'KIJIJONE','KATHERI F.C. SOC. LTD.','','KIJIJONE/XBB04F04','NULL','NULL','6','NULL','NULL','NULL','NULL','NULL',1,'NULL','MERU',0,0,1,'60200','300','',NULL,NULL,'NULL'),(305,2,'KAGURU FCS','KAGURU F. C. SOC. LTD.','','KAGURU FCS/XBB30','NULL','NULL','692','NULL','NULL','NULL','NULL','NULL',1,'NULL','NKUBU',0,0,1,'60202','305','',NULL,NULL,'NULL'),(306,3,'KAGURU','KAGURU F. C. SOC. LTD.','','KAGURU/XBB30F01','NULL','NULL','692','NULL','NULL','NULL','NULL','NULL',1,'NULL','NKUBU',0,0,1,'60202','305','',NULL,NULL,'NULL'),(307,2,'THIMA FCS','THIMA F. C. SOC. LTD.','','THIMA FCS/XBC28','NULL','NULL','121','NULL','NULL','NULL','NULL','NULL',1,'NULL','CHOGORIA',0,0,1,'60401','307','',NULL,NULL,'NULL'),(308,3,'MAARA','THIMA F. C. SOC. LTD.','','MAARA/XBC28F01','NULL','NULL','121','NULL','NULL','NULL','NULL','NULL',1,'NULL','CHOGORIA',0,0,1,'60401','307','',NULL,NULL,'NULL'),(309,3,'THIGAA','THIMA F. C. SOC. LTD.','','THIGAA/XBC28F02','NULL','NULL','121','NULL','NULL','NULL','NULL','NULL',1,'NULL','CHOGORIA',0,0,1,'60401','307','',NULL,NULL,'NULL'),(310,2,'THAMBANA FCS','THAMBANA F.C. SOC. LTD.','','THAMBANA FCS/XBD05','NULL','721692608','1401','NULL','NULL','NULL','NULL','NULL',1,'NULL','EMBU',14,10,1,'60100','310','',NULL,NULL,'NULL'),(311,3,'KATHIMA','THAMBANA F.C. SOC. LTD.','','KATHIMA/XBD05F01','NULL','721692608','1401','NULL','NULL','NULL','NULL','NULL',1,'NULL','EMBU',14,10,1,'60100','310','',NULL,NULL,'NULL'),(312,3,'KIUNGU','THAMBANA F.C. SOC. LTD.','','KIUNGU/XBD05F02','NULL','721692608','1401','NULL','NULL','NULL','NULL','NULL',1,'NULL','EMBU',14,10,1,'60100','310','',NULL,NULL,'NULL'),(313,3,'MIKIMBI','THAMBANA F.C. SOC. LTD.','','MIKIMBI/XBD05F03','NULL','721692608','1401','NULL','NULL','NULL','NULL','NULL',1,'NULL','EMBU',14,10,1,'60100','310','',NULL,NULL,'NULL'),(314,2,'MURAMUKI FCS','MURAMUKI F. C. SOC. LTD.','','MURAMUKI FCS/XBD25','NULL','723622939','21','NULL','NULL','NULL','NULL','NULL',1,'NULL','EMBU',51,5,1,'60100','314','',NULL,NULL,'NULL'),(315,3,'KATHANGARIRI','MURAMUKI F. C. SOC. LTD.','','KATHANGARIRI/XBD25F01','NULL','NULL','21','NULL','NULL','NULL','NULL','NULL',1,'NULL','EMBU',51,5,1,'60100','314','4C,UTZ',NULL,NULL,'NULL'),(318,2,'KIKIMA FCS','KIKIMA F.C.S. LTD','','KIKIMA FCS/XBE04','info.kikima@gmail.com','736729462','4','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIKIMA',0,0,1,'90125','318','',NULL,NULL,'NA'),(319,2,'MUPUTI FCS','MUPUTI F.C.S. LTD','','MUPUTI FCS/XBE07','NULL','NULL','85','NULL','NULL','NULL','NULL','NULL',1,'NULL','MACHAKOS',0,0,1,'90100','319','FLO',NULL,NULL,'NULL'),(320,3,'MUPUTI','MUPUTI F.C.S. LTD','','MUPUTI/XBE07F01','NULL','NULL','85','NULL','NULL','NULL','NULL','NULL',1,'NULL','MACHAKOS',0,0,1,'90100','319','FLO',NULL,NULL,'NULL'),(321,2,'KAKUYUNI FCS','KAKUYUNI F.C.S. LTD','','KAKUYUNI FCS/XBE08','NULL','NULL','1050','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGUNDO',0,0,1,'90115','321','FLO',NULL,NULL,'NULL'),(322,2,'MBILINI FCS','MBILINI C.G.C.S. LTD','','MBILINI FCS/XBE10','NULL','NULL','1030','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGUNDO',0,0,1,'90115','322','',NULL,NULL,'NULL'),(323,3,'MBILINI','MBILINI C.G.C.S. LTD','','MBILINI/XBE10F01','NULL','NULL','1030','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGUNDO',0,0,1,'90115','322','',NULL,NULL,'NULL'),(324,3,'KIKAMBUANI','MBILINI C.G.C.S. LTD','','KIKAMBUANI/XBE10F02','NULL','NULL','1030','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGUNDO',0,0,1,'90115','322','',NULL,NULL,'NULL'),(325,3,'UNYUANI','MBILINI C.G.C.S. LTD','','UNYUANI/XBE10F03','NULL','NULL','1030','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGUNDO',0,0,1,'90115','322','',NULL,NULL,'NULL'),(326,3,'UKANGA UTUNE','MBILINI C.G.C.S. LTD','','UKANGA UTUNE/XBE10F04','NULL','NULL','1030','NULL','NULL','NULL','NULL','NULL',1,'NULL','KANGUNDO',0,0,1,'90115','322','',NULL,NULL,'NULL'),(327,2,'KINGOTI FCS','KINGOTI F. C. SOC. LTD.','','KINGOTI FCS/XBE21','NULL','NULL','491','NULL','NULL','NULL','NULL','NULL',1,'NULL','TALA',0,0,1,'90131','327','FLO',NULL,NULL,'NULL'),(328,3,'KALALA','KINGOTI F. C. SOC. LTD.','','KALALA/XBE21F01','NULL','NULL','491','NULL','NULL','NULL','NULL','NULL',1,'NULL','TALA',0,0,1,'90131','327','FLO',NULL,NULL,'NULL'),(329,3,'KAKULUTUINI','KINGOTI F. C. SOC. LTD.','','KAKULUTUINI/XBE21F02','NULL','NULL','491','NULL','NULL','NULL','NULL','NULL',1,'NULL','TALA',0,0,1,'90131','327','FLO',NULL,NULL,'NULL'),(330,2,'MUKUYUNI FCS','MUKUYUNI F. C. SOC. LTD.','','MUKUYUNI FCS/XBE28','NULL','NULL','50','NULL','NULL','NULL','NULL','NULL',1,'NULL','KAVIANI',0,0,1,'90107','330','FLO',NULL,NULL,'NULL'),(331,3,'MUKUYUNI','MUKUYUNI F. C. SOC. LTD.','','MUKUYUNI/XBE28F01','NULL','NULL','50','NULL','NULL','NULL','NULL','NULL',1,'NULL','KAVIANI',0,0,1,'90107','330','FLO',NULL,NULL,'NULL'),(332,2,'KWA-KIINYU  FCS','KWA-KIINYU F. C. SOC. LTD.','','KWA-KIINYU  FCS/XBE31','NULL','NULL','84','NULL','NULL','NULL','NULL','NULL',1,'NULL','KATHIANI',0,0,1,'90105','332','FLO',NULL,NULL,'NULL'),(333,3,'KWA-KIINYU','KWA-KIINYU F. C. SOC. LTD.','','KWA-KIINYU/XBE31F01','NULL','NULL','84','NULL','NULL','NULL','NULL','NULL',1,'NULL','KATHIANI',0,0,1,'90105','332','FLO',NULL,NULL,'NULL'),(334,2,'MISAKWANI FCS','MISAKWANI  F.C. SOC. LTD.','','MISAKWANI FCS/XBE34','NULL','NULL','2241','NULL','NULL','NULL','NULL','NULL',1,'NULL','MACHAKOS',0,0,1,'90100','334','FLO',NULL,NULL,'NULL'),(335,3,'MISAKWANI','MISAKWANI  F.C. SOC. LTD.','','MISAKWANI/XBE34F01','NULL','NULL','2241','NULL','NULL','NULL','NULL','NULL',1,'NULL','MACHAKOS',0,0,1,'90100','334','FLO',NULL,NULL,'NULL'),(336,2,'KAMUTHANGA FCS','KAMUTHANGA C. G. C. SOC. LTD.','','KAMUTHANGA FCS/XBE36','NULL','NULL','91','NULL','NULL','NULL','NULL','NULL',1,'NULL','MACHAKOS',0,0,1,'90100','336','',NULL,NULL,'NULL'),(337,3,'KAMUTHANGA','KAMUTHANGA C. G. C. SOC. LTD.','','KAMUTHANGA/XBE36F01','NULL','NULL','91','NULL','NULL','NULL','NULL','NULL',1,'NULL','MACHAKOS',0,0,1,'90100','336','',NULL,NULL,'NULL'),(338,2,'KIREMBA FCS','KIREMBA F.C.S. LTD.','','KIREMBA FCS/XCA09','NULL','NULL','145','NULL','NULL','NULL','NULL','NULL',1,'NULL','BAHATI',0,0,1,'20113','338','',NULL,NULL,'NULL'),(339,3,'KIREMBA','KIREMBA F.C.S. LTD.','','KIREMBA/XCA09F01','NULL','NULL','145','NULL','NULL','NULL','NULL','NULL',1,'NULL','BAHATI',0,0,1,'20113','338','',NULL,NULL,'NULL'),(340,2,'KIMOLOGIT FCS','KIMOLOGIT FARMERS CO-OP. SOC.','','KIMOLOGIT FCS/XCE06','NULL','NULL','72','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIPKELION',35,4,1,'20202','340','',NULL,NULL,'NULL'),(341,3,'KIMOLOGIT','KIMOLOGIT FARMERS CO-OP. SOC.','','KIMOLOGIT/XCE06F01','NULL','NULL','72','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIPKELION',35,4,1,'20202','340','',NULL,NULL,'NULL'),(342,2,'CHEPNORIO FCS','CHEPNORIO F. CO-OP. S. LTD','','CHEPNORIO FCS/XCE07','NULL','727694103','64','NULL','NULL','NULL','NULL','NULL',1,'NULL','FORT TERNAN',35,4,1,'20209','342','',NULL,NULL,'NULL'),(343,3,'CHEPNORIO','CHEPNORIO F. CO-OP. S. LTD','','CHEPNORIO/XCE07F01','NULL','727694103','64','NULL','NULL','NULL','NULL','NULL',1,'NULL','FORT TERNAN',35,4,1,'20209','342','',NULL,NULL,'NULL'),(344,2,'KOISAGAT FCS','KOISAGAT F. CO-OP. SOC. LTD.','','KOISAGAT FCS/XCE32','NULL','NULL','21','NULL','NULL','NULL','NULL','NULL',1,'NULL','FORT-TERNAN',35,4,1,'20209','344','',NULL,NULL,'NULL'),(345,3,'KOISAGAT','KOISAGAT F. CO-OP. SOC. LTD.','','KOISAGAT/XCE32F01','NULL','NULL','21','NULL','NULL','NULL','NULL','NULL',1,'NULL','FORT-TERNAN',35,4,1,'20209','344','',NULL,NULL,'NULL'),(346,2,'KASHEEN FCS','KASHEEN F.C.S. LTD.','','KASHEEN FCS/XCE55','NULL','NULL','23','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIPKELION',35,4,1,'20202','346','',NULL,NULL,'NULL'),(347,3,'KASHEEN','KASHEEN F.C.S. LTD.','','KASHEEN/XCE55F01','NULL','NULL','23','NULL','NULL','NULL','NULL','NULL',1,'NULL','KIPKELION',35,4,1,'20202','346','',NULL,NULL,'NULL'),(348,2,'KAPKURONGO FCS','KAPKURUNGO F.C. SOC. LTD.','','KAPKURUNGO FCS/XDA19','NULL','NULL','19','NULL','NULL','NULL','NULL','NULL',1,'NULL','CHEPTAIS',39,6,1,'50201','348','',NULL,NULL,'NULL'),(349,3,'KAPKURONGO','KAPKURUNGO F.C. SOC. LTD.','','KAPKURUNGO/XDA19F01','NULL','NULL','19','NULL','NULL','NULL','NULL','NULL',1,'NULL','CHEPTAIS',39,6,1,'50201','348','',NULL,NULL,'NULL'),(350,2,'SIRISIA FCS','SIRISIA F.C. SOC. LTD.','','SIRISIA FCS/XDA25','NULL','NULL','2','NULL','NULL','NULL','NULL','NULL',1,'NULL','SIRISIA',39,6,1,'50208','350','',NULL,NULL,'NULL'),(351,3,'SIRISIA','SIRISIA F.C. SOC. LTD.','','SIRISIA/XDA25F01','NULL','NULL','2','NULL','NULL','NULL','NULL','NULL',1,'NULL','SIRISIA',39,6,1,'50208','350','',NULL,NULL,'NULL'),(352,2,'MAYEKWE FCS','MAYEKWE F.C. SOC. LTD.','','MAYEKWE FCS/XDA20','NULL','724971475','152','NULL','NULL','NULL','NULL','1',1,'NULL','CHEPTAIS',39,6,1,'50201','352','',NULL,NULL,'NULL'),(353,3,'MAYEKWE','MAYEKWE F.C. SOC. LTD.','','MAYEKWE/XDA20F01','NULL','NULL','152','NULL','NULL','NULL','NULL','1',1,'NULL','CHEPTAIS',39,6,1,'50219','352','',NULL,NULL,'NULL'),(354,2,'AYORO FCS','AYORO F.C.S. LTD','','AYORO FCS/XEB11','NULL','NULL','10','NULL','NULL','NULL','NULL','NULL',1,'NULL','OYUGIS',0,0,1,'40222','354','',NULL,NULL,'NULL'),(1764,3,'BUCHENGE','BUCHENGE FCS LTD','','BUCHENGE/XCE31F01','NA','NA','259','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','KERICHO',35,4,1,'0','1974','',NULL,NULL,'NA'),(1765,3,'BURGEI EUT','BURGEI EUT FCS LTD','','BURGEI EUT/XCE15F01','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','FORT TERNAN',35,4,1,'0','1976','',NULL,NULL,'NA'),(1767,3,'CHERARA','CHERARA FCS LTD','','CHERARA/XCE41F01','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','NA',35,4,1,'0','1977','',NULL,NULL,'NA'),(1768,3,'CHILCHILA','CHILCHILA FCS LTD','','CHILCHILA/XCE45F01','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','FORTE TERNAN',35,4,1,'0','1978','',NULL,NULL,'NA'),(1769,3,'KABNGETUNY FCS','KAPNGETUNY FCS LTD','','KAPNGETUNY/XCE05','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','FORT TENAN',35,4,1,'0','1769','',NULL,NULL,'NA'),(1770,3,'KAPIAS','KAPIAS  FCS LTD','','KAPIAS/XCE57CF01','NA','726418236','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',0,'NULL','KORU',35,4,1,'0','2587','',NULL,NULL,'NA'),(1771,3,'SUGUT','SUGUT FCS LTD','','SUGUT/XCE57BF01','NA','726418236','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','KORU',35,4,1,'0','2584','',NULL,NULL,'NA'),(1774,3,'KICHAWIR','KICHAWIR FCS LTD','','KICHAWIR/XCE38F01','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','NA',35,4,1,'0','1986','',NULL,NULL,'NA'),(1779,2,'MENET','MENET','','MENET/CBZA32','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','NA',35,4,1,'0','NULL','',NULL,NULL,'NA'),(1780,3,'RORET','RORET FCS LTD','','RORET/XCE25F01','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'0','1988','',NULL,NULL,'NA'),(1781,3,'SERENG','SERENG FCS LTD','','SERENG/XCE37F01','NA','720970509','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'0','1989','',NULL,NULL,'NA'),(1782,3,'SIWOT','SIWOT FCS LTD','','SIWOT/XCE29F01','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',0,'NULL','NA',35,4,1,'0','1991','',NULL,NULL,'NA'),(1783,3,'SOYMINGIN 1','SOYMINGIN MULTI PURPOSE','','SOYMIGIN 1/XCE21F01','NA','NA','NA','NULL','NULL','NULL','2015-06-30 00:00:00','1',1,'NULL','KIPKELION',35,4,1,'0','1788','',NULL,NULL,'NA'),(1787,4,'PENTA TANCOM','PENTA TANCOM LTD','','PENTA TANCOM/AB0502','NA','NA','NA','NULL','NULL','NULL','NULL','2',1,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1788,2,'SOYMINGIN FCS','SOYMINGIN MULTI PURPOSE','','SOYMINGIN/XCE21','NA','NA','NA','NULL','NULL','NULL','2015-07-01 00:00:00','1',1,'NULL','NA',35,4,1,'0','1788','',NULL,NULL,'NA'),(1791,3,'TORSOGEK','TORSOGEK FCS LTD','','TORSOGEK/XCE04F01','NA','720464406','NA','NULL','NULL','NULL','2015-07-01 00:00:00','1',1,'NULL','NA',35,4,1,'0','1993','',NULL,NULL,'NA'),(1792,3,'TUYABET','TUYABET  FCS LTD','','TUIYABET/XCE11F01','NA','NA','NA','NULL','NULL','NULL','2015-07-01 00:00:00','1',1,'NULL','NA',35,4,1,'0','1994','',NULL,NULL,'NA'),(1793,3,'KAPLUSO','KIMOLOGIT FARMERS CO-OP. SOC.','','KAPLUSO/XCE06F03','NA','NA','NA','NULL','NULL','0','2015-07-01 00:00:00','1',1,'NULL','NA',35,4,1,'0','340','',NULL,NULL,'NA'),(1794,3,'SIRET','KIMOLOGIT FARMERS CO-OP. SOC.','','SIRET/XCE06F02','72','NA','NA','NULL','NULL','NULL','2015-07-01 00:00:00','1',1,'NULL','KIPKELION',35,4,1,'0','340','',NULL,NULL,'NA'),(1795,3,'LALEM','LALEM FCS','','LALEM/F01','NA','NA','NA','NULL','NULL','NULL','2015-07-01 00:00:00','1',1,'NULL','NA',35,4,1,'0','NULL','',NULL,NULL,'NA'),(1796,6,'KIPKELION','KIPKELION','','KIPKELION','NA','NA','NA','NULL','NULL','NULL','2015-07-01 00:00:00','1',1,'NULL','NA',35,4,1,'0','NULL','FLO',NULL,NULL,'NA'),(1799,3,'KIMUGUL','KIMUGUL FCS LTD','','KIMUGUL/XCE56F01','NA','NA','NA','NULL','NULL','NULL','2015-07-02 00:00:00','1',1,'NULL','NA',35,4,1,'0','1987','',NULL,NULL,'NA'),(1800,3,'KAPKULUBEN','KAPKULUBEN FCS LTD','','KAPKULUBEN MAIN/XCE57AF01','NA','726418236','NA','NULL','NULL','NULL','2015-07-02 00:00:00','1',1,'NULL','KORU',35,4,1,'0','1985','',NULL,NULL,'NA'),(1801,1,'SIRWO','SIRWO ENTERPRISES LTD','','SIRWO /CB0650','kittony@kittony.com','722131761','NA','NULL','NULL','NULL','2015-07-02 00:00:00','1',1,'NULL','NA',26,4,1,'0','NULL','',NULL,NULL,'NA'),(1802,2,'TROPICAL','TFMK OLD DB CS','','TROPICAL','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','2',0,'NULL','NA',47,1,1,'0','NULL','',NULL,NULL,'NA'),(1803,3,'KIKIMA','KIKIMA F.C.S. LTD','','KIKIMA/XBE04F01','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','318','',NULL,NULL,'NA'),(1804,3,'NZAINI','KIKIMA F.C.S. LTD','','NZAINI/XBE04F02','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','318','',NULL,NULL,'NA'),(1805,3,'UTANGWA','KIKIMA F.C.S. LTD','','UTANGWA/XBE04F03','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','318','',NULL,NULL,'NA'),(1806,3,'MULIMA','KIKIMA F.C.S. LTD','','MULIMA/XBE04F04','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','318','',NULL,NULL,'NA'),(1807,3,'KYUU','KIKIMA F.C.S. LTD','','KYUU/XBE04F05','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','318','',NULL,NULL,'NA'),(1808,3,'UVUU','KIKIMA F.C.S. LTD','','UVUU/XBE04F06','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',0,'NULL','NA',47,1,1,'0','318','',NULL,NULL,'NA'),(1809,3,'KAKUYUNI','KAKUYUNI F.C.S. LTD','','KAKUYUNI /XBE08F01','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','321','FLO',NULL,NULL,'NA'),(1810,3,'KWAKITHAMA','KAKUYUNI F.C.S. LTD','','KWAKITHAMA/XBE08F03','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','321','FLO',NULL,NULL,'NA'),(1811,3,'MUUSINI','KAKUYUNI F.C.S. LTD','','MUUSINI/XBE08F04','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','321','FLO',NULL,NULL,'NA'),(1812,3,'KWAKITOTHYA','KAKUYUNI F.C.S. LTD','','KWAKITOTHYA/XBE08F05','NA','NA','NA','NULL','NULL','NULL','2015-07-03 00:00:00','1',1,'NULL','NA',47,1,1,'0','321','FLO',NULL,NULL,'NA'),(1815,2,'KAWETHEI FCS','KAWETHEI FCS LTD','','KAWETHEI FCS/XBE24','NA','NA','1699','NULL','NULL','NULL','2015-07-03 00:00:00','1',0,'NULL','KANGUNDO',47,5,1,'90115','1815','FLO',NULL,NULL,'NA'),(1816,3,'KITONGI','KAWETHEI FCS LTD','','KITONGI/XBE24F01','NA','NA','1699','NULL','NULL','NULL','2015-07-06 00:00:00','1',0,'NULL','kangundo',47,5,1,'90115','1815','FLO',NULL,NULL,'NA'),(1817,3,'KIKALU','KAWETHEI FCS LTD','','KIKALU/XBE24F02','NA','NA','1699','NULL','NULL','NULL','2015-07-06 00:00:00','1',0,'NULL','kangundo',47,5,1,'90115','1815','FLO',NULL,NULL,'NA'),(1818,2,'NGUMUTI','KAKUYUNI F.C.S. LTD','','NGUMUTI/XBE08F02','NO','NO','NO','NULL','NULL','NULL','2015-07-09 00:00:00','1',1,'NULL','NO',48,5,1,'NULL','321','',NULL,NULL,'NO'),(1820,2,'BASIME YONGA','BASIME YONGA','','BASIME YONGA/DB0064','NO','NO','NO','NULL','NULL','NULL','2015-07-09 00:00:00','1',1,'NULL','NULL',39,6,1,'NULL','NULL','',NULL,NULL,'NO'),(1822,2,'MUTHITHI FCS','MUTHITHI FCS','','MUTHITHI FCS/XAB91','NA','NA','NA','NULL','NULL','NULL','2015-07-09 00:00:00','1',1,'NULL','NA',49,5,1,'0','1822','',NULL,NULL,'NA'),(1823,2,'3G\'S C.G.C.S','3G`S C.G.C.S  LTD','','3G\'S C.G.C.S/XAA23','NA','NA','186','NULL','NULL','NULL','2015-07-10 00:00:00','2',1,'NULL','THIKA',22,1,1,'1004','1823','',NULL,NULL,'NA'),(1824,3,'GITHOMBOKONI','3G`S C.G.C.S  LTD','','GITHOMBOKONI/XAA23F01','NA','NA','186','NULL','NULL','NULL','2015-07-10 00:00:00','2',1,'NULL','THIKA',22,1,1,'1004','1823','',NULL,NULL,'NA'),(1825,3,'GATHAITHI','3G`S C.G.C.S  LTD','','GATHAITHI/XAA23F02','NA','NA','186','NULL','NULL','NULL','2015-07-10 00:00:00','2',1,'NULL','KANJUKI',22,1,1,'1004','1823','',NULL,NULL,'NA'),(1826,3,'GATEI','3G`S C.G.C.S  LTD','','GATEI/XAA23F03','NA','NA','186','NULL','NULL','NULL','2015-07-10 00:00:00','2',1,'NULL','KANJUKI',22,1,1,'1004','1823','',NULL,NULL,'NA'),(1827,1,'KIBIRGEN','JOHN B KICHWEN','','KIBIRGEN/CF0005','jkichwen@yahoo.com; jkichwen.jk69@gmail.com','721820747','NA','NULL','NULL','NULL','2015-07-16 00:00:00','1',1,'NULL','NA',29,4,1,'0','NULL','',NULL,NULL,'NA'),(1828,3,'GATUNE','MUTHITHI FCS','','GATUNE/XAB91F03','NA','NA','0','NULL','NULL','NULL','2015-07-16 00:00:00','1',1,'NULL','NA',22,1,1,'0','1822','',NULL,NULL,'NA'),(1829,3,'NJORA','MUTHITHI FCS','','NJORA/XAB91F01','NA','NA','NA','NULL','NULL','NULL','2015-07-16 00:00:00','1',1,'NULL','NA',22,1,1,'0','1822','',NULL,NULL,'NA'),(1830,3,'KAMUGI','MUTHITHI FCS','','KAMUGI/XAB91F02','NA','NA','NA','NULL','NULL','NULL','2015-07-16 00:00:00','1',1,'NULL','NA',22,1,1,'0','1822','',NULL,NULL,'NA'),(1831,4,'MULAKI','MULAKI','','MULAKI/AA0021','NA','724615700','NA','NULL','NULL','NULL','2015-07-16 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1832,4,'GREYSTONE','GREYSTONE FARM MANAGEMENT','','GREYSTONE/AB0708','Bbeth.mungai@gmail.com','708084836','64551','NULL','NULL','NULL','2015-07-16 00:00:00','1',1,'NULL','NAIROBI',47,15,1,'620','NULL','',NULL,NULL,'N/A'),(1833,4,'KIHINGO','KIHINGO ESTATE','','KIHINGO/CB0590','N/A','721241589','90','NULL','NULL','NULL','2015-07-16 00:00:00','1',1,'NULL','KIMININI',26,6,1,'1000','NULL','',NULL,NULL,'N/A'),(1834,1,'KIMMOS','KIMOSS ESTATE','','KIMMOS/CB515','NULL','0','NULL','NULL','NULL','NULL','2015-07-16 00:00:00','1',0,'NULL','NULL',26,4,1,'NULL','NULL','',NULL,NULL,'N/A'),(1835,4,'NDOME','NDOME ESTATE','','NDOME/AB0498','NULL','720708141','21','NULL','NULL','NULL','2015-07-16 00:00:00','1',0,'NULL','KENOL',22,1,1,'100','NULL','',NULL,NULL,'NULL'),(1836,1,'THEGI','SAMUEL NJENGA BORO','','THEGI/AC0069','NA','717603457','407','NULL','NULL','NULL','2015-07-17 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1837,1,'MBIRIAI','ROBERT NJOKA MUTHARA','','MBIRIAI/BD0001','NA','0700 873558','1217','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','EMBU',49,10,1,'0','NULL','',NULL,NULL,'NA'),(1838,1,'GOSHEN','STEPHEN MUNDERU NJOROGE','','GOSHEN/AB0512','smunderu@yahoo.com','0722 457152','135','NULL','NULL','NULL','2015-07-17 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1839,1,'TENE RAYS','DAVID MUNENGE WATENE','','TENE RAYS/AB0725','doublesights@yahoo.com','0733 919024','4845','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','NAIROBI',47,1,1,'0','NULL','',NULL,NULL,'NA'),(1840,1,'NGEKENYA','ANTHONY NJENGA MWANIKI','','NGEKENYA/AC0072','NA','0722 791780','1304','NULL','NULL','NULL','2015-07-17 00:00:00','2',0,'NULL','THIKA',22,1,1,'1000','NULL','',NULL,NULL,'NA'),(1841,1,'JOWANJO','JOSEPH WAWERU NJOROGE','','JOWANJO/CB0526','NA','NA','NA','NULL','NULL','NULL','2015-07-17 00:00:00','3',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1842,1,'MITAMBO 1','GERTRUDE AWINY','','MITAMBO 1/CB0553','NA','NA','807','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','kisumu',26,4,1,'0','NULL','',NULL,NULL,'NA'),(1843,2,'RIASUTA FCS','RIASUTA F.C.S. LTD','','RIASUTA FCS/XEA22','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1843','',NULL,NULL,'NA'),(1844,3,'RIASUTA','RIASUTA F.C.S. LTD','','RIASUTA/XEA22F01','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1843','',NULL,NULL,'NA'),(1845,3,'ORIENYO','RIASUTA F.C.S. LTD','','ORIENYO/XEA22F02','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1843','',NULL,NULL,'NA'),(1846,3,'NYAGETONKONO','RIASUTA F.C.S. LTD','','NYAGETONKONO/XEA22F03','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1843','',NULL,NULL,'NA'),(1847,1,'SIMBAUTI','KISII FARMERS UNION','','SIMBAUTI/EB0005','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','NULL','',NULL,NULL,'NA'),(1848,2,'GIRANGO FCS','GIRANGO F.C.S. LTD','','GIRANGO FCS/XEA19','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1848','',NULL,NULL,'NA'),(1849,3,'GIRANGO','GIRANGO F.C.S. LTD','','GIRANGO/XEA19F01','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1848','',NULL,NULL,'NA'),(1850,2,'MOGONGA FCS','MOGONGA F.C. SOC. LTD.','','MOGONGA FCS/XEA02','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1850','',NULL,NULL,'NA'),(1851,3,'MOGONGA','MOGONGA F.C. SOC. LTD.','','MOGONGA/XEA02F01','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1850','',NULL,NULL,'NA'),(1852,3,'MAGENA','MOGONGA F.C. SOC. LTD.','','MAGENA/XEA02F02','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1850','',NULL,NULL,'NA'),(1853,3,'NYAMONYO','MOGONGA F.C. SOC. LTD.','','NYAMONYO/XEA02F03','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1850','',NULL,NULL,'NA'),(1854,3,'ENKURONGO','MOGONGA F.C. SOC. LTD.','','ENKURONGO/XEA02F04','NA','NA','35','NULL','NULL','NULL','2015-07-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1850','',NULL,NULL,'NA'),(1855,2,'NYAMARABE FCS','NYAMARAMBE F.C.S. LTD','','NYAMARABE FCS/XEA21','na','NA','35','NULL','NULL','NULL','2015-07-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1855','',NULL,NULL,'NA'),(1856,3,'NYAMARAMBE MAIN','NYAMARAMBE F.C.S. LTD','','NYAMARAMBE MAIN/XEA21F01','na','NA','35','NULL','NULL','NULL','2015-07-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1855','',NULL,NULL,'NA'),(1857,3,'MOSACHE','NYAMARAMBE F.C.S. LTD','','MOSACHE/XEA21F02','na','NA','35','NULL','NULL','NULL','2015-07-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1855','',NULL,NULL,'NA'),(1858,3,'NYAKORERE','NYAMARAMBE F.C.S. LTD','','NYAKORERE/XEA21F03','na','NA','35','NULL','NULL','NULL','2015-07-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1855','',NULL,NULL,'NA'),(1859,2,'KABUBONI FCS','KABUBONI F.C.S. LTD','','KABUBONI FCS/XBC40','na','NA','3','NULL','NULL','NULL','2015-07-20 00:00:00','1',0,'NULL','CHUKA',49,1,1,'60405','1859','',NULL,NULL,'NA'),(1860,3,'KATHIGUNI','KABUBONI F.C.S. LTD','','KATHIGUNI/XBC40F01','na','NA','3','NULL','NULL','NULL','2015-07-20 00:00:00','1',0,'NULL','CHUKA',49,1,1,'60405','1859','',NULL,NULL,'NA'),(1862,4,'GITHAKA','ALLAN NJORENGE AND ELIXABETH','','GITHAKA/AB0234','na','722997537','NA','NULL','NULL','NULL','2015-07-21 00:00:00','1',0,'NULL','NA',1,0,11,'0','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NA'),(1863,1,'MUENDO','PAUL MUENDO MUTHOKA','','MUENDO/BF0180','na','NA','NA','NULL','NULL','NULL','2015-07-22 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1864,1,'MUTINDA','MUTINDA','','MUTINDA/BF0209','na','NA','NA','NULL','NULL','NULL','2015-07-22 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1865,1,'THIRU','JULIUS MWANGI','','THIRU/AB0187','na','0722 815895','1386','NULL','NULL','NULL','2015-07-22 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1866,1,'MATIMBEI','MR & MRS KIHANYA','','MATIMBEI/AC0009A','na','0721 498536','79','NULL','NULL','NULL','2015-07-22 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1867,1,'VENDELA','FLAVIAN MUSYOKI WAMBUA','','VENDELA/BF0218','na','733669297','1532','NULL','NULL','NULL','2015-07-22 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1868,1,'MUKA','JOSHUA MUTUA IMENYI','','MUKA/BF0149','na','728657624','1262','NULL','NULL','NULL','2015-07-22 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1869,1,'MUU-INI','MUU-INI','','MUU-INI/AB0152','na','0726 293136','206','NULL','NULL','NULL','2015-07-22 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1870,1,'LEONID GATE','LEONID GATE','','LEONID GATE/AB0729','na','0716 485828','742','NULL','NULL','NULL','2015-07-22 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1871,2,'KIANG\'ONDU FCS','KIANG\'ONDU F. C. SOC. LTD.','','KIANG\'ONDU FCS/XBC21','na','NA','795','NULL','NULL','NULL','2015-07-23 00:00:00','1',0,'NULL','CHUKA',49,1,1,'6040','1871','',NULL,NULL,'NA'),(1872,3,'TUNGU','KIANG\'ONDU F. C. SOC. LTD.','','TUNGU/XBC21F01','na','NA','795','NULL','NULL','NULL','2015-07-23 00:00:00','1',0,'NULL','CHUKA',49,1,1,'6040','1871','',NULL,NULL,'NA'),(1873,3,'KIBUMBU','KIANG\'ONDU F. C. SOC. LTD.','','KIBUMBU/XBC21F02','na','NA','795','NULL','NULL','NULL','2015-07-23 00:00:00','1',0,'NULL','CHUKA',49,1,1,'6040','1871','',NULL,NULL,'NA'),(1876,2,'GAKERO FCS','GAKERO F.C.S. LTD','','GAKERO FCS/XEA25','na','NA','35','NULL','NULL','NULL','2015-07-31 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1876','',NULL,NULL,'NA'),(1877,3,'GAKERO','GAKERO F.C.S. LTD','','GAKERO/XEA25F01','na','NA','35','NULL','NULL','NULL','2015-07-31 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1876','',NULL,NULL,'NA'),(1878,3,'ITABAGO','GAKERO F.C.S. LTD','','ITABAGO/XEA25F02','na','NA','35','NULL','NULL','NULL','2015-07-31 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1876','',NULL,NULL,'NA'),(1879,3,'KEBEGE','GAKERO F.C.S. LTD','','KEBEGE/XEA25F03','na','NA','35','NULL','NULL','NULL','2015-07-31 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1876','',NULL,NULL,'NA'),(1880,2,'GIKURWA FCS','GIKURWA F.C.S LTD','','GIKURWA FCS/XBB72','na','NA','285','NULL','NULL','NULL','2015-08-03 00:00:00','1',0,'NULL','IGOJI',49,1,1,'60402','1880','',NULL,NULL,'NA'),(1881,3,'KUIRI','GIKURWA F.C.S LTD','','KUIRI/XBB72F01','na','NA','285','NULL','NULL','NULL','2015-08-03 00:00:00','1',0,'NULL','IGOJI',49,1,1,'60402','1880','',NULL,NULL,'NA'),(1882,3,'GIKUI','GIKURWA F.C.S LTD','','GIKUI/XBB72F02','na','NA','285','NULL','NULL','NULL','2015-08-03 00:00:00','1',0,'NULL','IGOJI',49,1,1,'60402','1880','',NULL,NULL,'NA'),(1883,3,'RWARENE','GIKURWA F.C.S LTD','','RWARENE/XBB72F03','na','NA','285','NULL','NULL','NULL','2015-08-03 00:00:00','1',0,'NULL','IGOJI',49,1,1,'60402','1880','',NULL,NULL,'NA'),(1884,2,'RIANJAGI FCS','RIANJAGI F.C.SOC LTD','','RIANJAGI FCS/XBD17','rianjagi2005@yahoo.com','0712 974793','214','NULL','NULL','NULL','2015-08-04 00:00:00','1',0,'NULL','EMBU',51,5,1,'60100','1884','FLO',NULL,NULL,'NA'),(1885,3,'RIANJAGI','RIANJAGI F.C.SOC LTD','','RIANJAGI/XBD17F01','rianjagi2005@yahoo.com','0712 974793','214','NULL','NULL','NULL','2015-08-04 00:00:00','1',0,'NULL','EMBU',51,5,1,'60100','1884','FLO',NULL,NULL,'NA'),(1886,1,'GITHATU','GITHATU','','GITHATU/AB0461','na','0722 626317','927','NULL','NULL','NULL','2015-08-04 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1887,1,'KABBINGU','KABBINGU','','KABBINGU/AB0469','na','0722 644308','1105','NULL','NULL','NULL','2015-08-04 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1888,1,'KATANGINI','JOHN MULWA','','KATANGINI/BF0080','na','0733 515573','62267','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','NAIROBI',47,1,1,'0','NULL','',NULL,NULL,'NA'),(1889,1,'MASUMBA','VICTOR K MBITHI','','MASUMBA/BF0056','na','NA','1845','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','NA',48,5,1,'0','1889','',NULL,NULL,'NA'),(1890,1,'KALIKO','JOSPHAT WAMBUA KIVEKE','','KALIKO/BF0054','na','0733 617508','69','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','TALA',48,1,1,'0','NULL','',NULL,NULL,'NA'),(1891,1,'MAWIZENI','DAVID KYELE KILONZO','','MAWIZENI/BF0167','na','na','426','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1892,1,'KEMWA','BENSON K KIRIMI','','KEMWA/BB0069','na','0721 926186','16','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1893,1,'MBURUGU','JOHN N M MBURUGU','','MBURUGU/BB0202C','na','NA','22','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1894,1,'NYANTURO','EUSTUS KIRUGA','','NYANTURO/BB0075','na','NA','180','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1895,1,'KIMANGWI','WYCLIFFEE MBURUGU','','KIMANGWI/BB0002B','na','0724 664154','22','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1896,1,'YAIGI','CHARLES NG\'ANG\'A','','YAIGI/AB0477','na','0721 720102','2381','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1897,1,'LIWANI','MORRIS NJUGUNA KURIA','','LIWANI/CA0214','na','0714 974937','20','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','NAKURU',32,1,1,'20128','NULL','',NULL,NULL,'NA'),(1898,1,'BEJOY','BENARD KIMANI MAINA','','BEJOY/AB0380','na','0720 779218','55403','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','NAIROBI',47,1,1,'0','NULL','',NULL,NULL,'NA'),(1899,1,'GINTU','JOHN GITONGA KIANDA','','GINTU/BB0065','na','NA','106','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1900,1,'GINBLY','GINSON MUTURA NKAABU','','GINBLY/BB0095','na','NA','NA','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','NA',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1901,1,'NKONDI','BEATRICE NKUNU ELIPHAS','','NKONDI/BB0002','na','NA','22','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1902,1,'MUKIMA','GEORGE UKU MUKIMA','','MUKIMA/BF0118','na','NA','1248','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1903,2,'NTHIMBIRI FCS','NTHIMBIRI F. C. SOC. LTD.','','NTHIMBIRI FCS/XBB42','nthimbirifcs@yahoo.com','NA','1528','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1903','',NULL,NULL,'NA'),(1904,3,'NTHIMBIRI','NTHIMBIRI F. C. SOC. LTD.','','NTHIMBIRI/XBB42F01','nthimbirifcs@yahoo.com','NA','1528','NULL','NULL','NULL','2015-08-05 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1903','',NULL,NULL,'NA'),(1905,2,'KENYENYA FCS','KENYENYA F.C.SOC. LTD.','','KENYENYA FCS/XEA17','na','NA','35','NULL','NULL','NULL','2015-08-07 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1905','',NULL,NULL,'NA'),(1906,3,'KENYENYA','KENYENYA F.C.SOC. LTD.','','KENYENYA/XEA17F01','na','NA','35','NULL','NULL','NULL','2015-08-07 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1905','',NULL,NULL,'NA'),(1907,3,'NYABIOTO','KENYENYA F.C.SOC. LTD.','','NYABIOTO/XEA17F02','na','NA','35','NULL','NULL','NULL','2015-08-07 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1905','',NULL,NULL,'NA'),(1908,3,'OMOGUMO','KENYENYA F.C.SOC. LTD.','','OMOGUMO/XEA17F03','na','NA','35','NULL','NULL','NULL','2015-08-07 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1905','',NULL,NULL,'NA'),(1909,3,'EBURI','KENYENYA F.C.SOC. LTD.','','EBURI/XEA17F04','na','NA','35','NULL','NULL','NULL','2015-08-07 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1905','',NULL,NULL,'NA'),(1910,3,'BORABU','KENYENYA F.C.SOC. LTD.','','BORABU/XEA17F05','na','NA','35','NULL','NULL','NULL','2015-08-07 00:00:00','1',0,'NULL','KISII',45,3,1,'0','1905','',NULL,NULL,'NA'),(1911,1,'NGERE','SIMON NJOROGE NGERE','','NGERE/AB0650','na','0722 957670','89','NULL','NULL','NULL','2015-08-12 00:00:00','1',0,'NULL','KENOL',21,1,1,'0','NULL','',NULL,NULL,'NA'),(1912,1,'TWIN HILL','TWIN HILL','','TWIN HILL/CA0214A','na','0714 974937','20','NULL','NULL','NULL','2015-08-12 00:00:00','1',0,'NULL','SOLAI',32,1,1,'0','NULL','',NULL,NULL,'NA'),(1913,4,'KIYONAMA ENTERPRISES','KIYONAMA ENTERPRISES','','KIYONAMA ENTERPRISES/AB0191','na','0733 466950','NA','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','NA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(1914,1,'ITETANI','NZIOKI NDOLO','','ITETANI/BF0050','na','0720 561304','315','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1915,1,'KITHITO','KITHITO','','KITHITO/BF0147','na','0708 911037','7816','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','VIWANDANI',48,1,1,'507','NULL','',NULL,NULL,'NA'),(1916,1,'MUTHEMBWA','DAVID WAMBUA MUTHEMBWA','','MUTHEMBWA/BF0140','na','0721 617635','1312','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','KANGUNDO',48,1,1,'0','NULL','',NULL,NULL,'NA'),(1917,1,'ITUKA TENE','MARTIN MUINDI','','ITUKA TENE/BF0104','mosweet32@yahoo.com','725133432','1229','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','KANGUNDO',48,1,1,'0','NULL','',NULL,NULL,'NA'),(1918,1,'KIOMO','JOHN MULI WAMBUA','','KIOMO/BF0154','na','0718 614787','1179','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','KANGUNDO',48,1,1,'0','NULL','',NULL,NULL,'NA'),(1919,1,'KITHINI','DAVID KYALO MUTISO','','KITHINI/BF0142','na','0719 711481','255','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','TALA',48,5,1,'90131','NULL','',NULL,NULL,'NA'),(1920,1,'MALAKI','EDWARD MARIGI','','MALAKI/AA0855','na','0727 113862','NA','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1921,1,'NTHIKE','BARNABAS MUTISYA','','NTHIKE/BF0139','na','0715 521122','1152','NULL','NULL','NULL','2015-08-19 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1922,1,'FRANZOH','NZIOKI MBUVA','','FRANZOH/BF0156','na','0736 636053','1179','NULL','NULL','NULL','2015-08-24 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1923,1,'KANYENJE','JONAH MWARAGE GACHERU','','KANYENJE/AA0276','jonagacheru@gmail.com','0722 859461','NA','NULL','NULL','NULL','2015-08-24 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1924,1,'KILO','WILLY WAMBUA MUEMA','','KILO/BF0215','na','0736 514374','NA','NULL','NULL','NULL','2015-08-24 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1925,1,'HILL SLOPES','HILL SLOPES','','HILL SLOPES/BF0206','na','NA','1014','NULL','NULL','NULL','2015-08-24 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1926,1,'KIVANGULI','KIVANGULI','','KIVANGULI/BF0046','na','0733 479096','NA','NULL','NULL','NULL','2015-08-24 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1927,1,'VALLEY VIEW','VALLEY VIEW','','VALLEY VIEW/BF0132','na','0724 411926','1122','NULL','NULL','NULL','2015-08-24 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1928,4,'MUTHAITE','GICHEHA FARMS LTD','','MUTHAITE/AC0003','na','NA','236','NULL','NULL','NULL','2015-08-24 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','RA,4C,UTZ,CAFE',NULL,NULL,'NA'),(1929,2,'KIRUGUI FCS','KIRUGUI F. C. SOC. LTD.','','KIRUGUI FCS/XBB62','na','NA','1653','NULL','NULL','NULL','2015-08-26 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1929','',NULL,NULL,'NA'),(1930,3,'KAUGI','KIRUGUI F. C. SOC. LTD.','','KAUGI/XBB62F01','na','NA','1653','NULL','NULL','NULL','2015-08-26 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1929','',NULL,NULL,'NA'),(1931,2,'AMUKUI FCS','AMUKUI F. C. SOC. LTD.','','AMUKUI FCS/XBA30','na','NA','2375','NULL','NULL','NULL','2015-08-26 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1931','',NULL,NULL,'NA'),(1932,3,'AMUKUI','AMUKUI F. C. SOC. LTD.','','AMUKUI/XBA30F01','na','NA','2375','NULL','NULL','NULL','2015-08-26 00:00:00','1',0,'NULL','MERU',49,1,1,'0','1931','',NULL,NULL,'NA'),(1933,1,'NDAMONI','JOHN NDAMBUKI MUILU','','NDAMONI/BF0192','na','NA','NA','NULL','NULL','NULL','2015-08-31 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1934,2,'KIMABOLE FCS','KIMABOLE F.C.SOC LTD','','KIMABOLE FCS/XDA02','kimabolefcs@gmail.com','NA','69','NULL','NULL','NULL','2015-08-31 00:00:00','1',0,'NULL','SIRISIA',26,6,1,'0','1934','',NULL,NULL,'NA'),(1935,3,'KIMABOLE','KIMABOLE F.C.SOC LTD','','KIMABOLE/XDA02F02','kimabolefcs@gmail.com','NA','69','NULL','NULL','NULL','2015-08-31 00:00:00','1',0,'NULL','SIRISIA',26,6,1,'0','1934','',NULL,NULL,'NA'),(1936,1,'TURA FARM','JOEL N MBUGUA','','TURA FARM/AE0048','na','0733 757046','47922','NULL','NULL','NULL','2015-08-31 00:00:00','1',1,'NULL','NAIROBI',47,1,1,'0','NULL','',NULL,NULL,'NA'),(1937,1,'KIAMUGIRI','ZACHARY NJUE','','KIAMUGIRI/BC0020','na','NA','NA','NULL','NULL','NULL','2015-08-31 00:00:00','1',0,'NULL','NA',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1938,1,'NDITHE','BENADICT MWANIKI','','NDITHE/BF0150','na','NA','NA','NULL','NULL','NULL','2015-08-31 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1939,1,'KAPLABA','KIPNGENO ARAP NGENY','','KAPLABA/C10019','na','NA','73193','NULL','NULL','NULL','2015-09-09 00:00:00','1',0,'NULL','NAIROBI',47,1,1,'0','NULL','',NULL,NULL,'NA'),(1940,1,'ALI HAKIM','HELIDA LUBANGA','','ALI HAKIM/CH0028','alihakimestates@yahoo.com','0725 828605','10','NULL','NULL','NULL','2015-09-09 00:00:00','1',0,'NULL','KORU',35,4,1,'0','NULL','',NULL,NULL,'NA'),(1941,2,'3K FCS','3K FCS','','3K FCS/XBA32','na','NA','22','NULL','NULL','NULL','2015-09-09 00:00:00','1',0,'NULL','KIANJAI',49,1,1,'60602','1941','',NULL,NULL,'NA'),(1942,3,'KIMACHIA','KIMACHIA F. C. SOC. LTD.','','KIMACHIA/XBA32F01','na','NA','22','NULL','NULL','NULL','2015-09-09 00:00:00','1',0,'NULL','KIANJAI',49,1,1,'60602','1942','',NULL,NULL,'NA'),(1943,2,'MARIARA FCS','MARIARA F. C. SOC. LTD.','','MARIARA FCS/XBB10','na','NA','6','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1943','',NULL,NULL,'NA'),(1944,3,'GITHONGO','MARIARA F. C. SOC. LTD.','','GITHONGO/XBB10F01','na','NA','6','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1943','',NULL,NULL,'NA'),(1945,3,'KAGUMA','MARIARA F. C. SOC. LTD.','','KAGUMA/XBB10F02','na','NA','6','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1943','',NULL,NULL,'NA'),(1946,3,'KARUGWA','MARIARA F. C. SOC. LTD.','','KARUGWA/XBB10F03','na','NA','6','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1943','',NULL,NULL,'NA'),(1947,3,'MBWINJERU','MARIARA F. C. SOC. LTD.','','MBWINJERU/XBB10F04','na','NA','6','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','MERU',49,1,1,'60200','1943','',NULL,NULL,'NA'),(1948,1,'KYANDANI','JAMES SAMSON MUTISYA','','KYANDANI/KYANDANI','na','na','1074','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1949,1,'MAKIMA ELI','JAMES KITAKA MUTUA','','MAKIMA ELI/BF0152','na','0721 878551','3113','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(1950,1,'MUTARAHO','MARY WANJIKU GIKONYO','','MUTARAHO/AB0363','na','0720 534472','667','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1951,1,'KIRWIRWA','SILAS M\'RINJIRU M\'MBUI','','KIRWIRWA/BB0026','na','0712 541268','52','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1952,1,'DUMU','JOSEPH NDUNG\'U MWANGI','','DUMU/AB0550','na','0721 290451','1492','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1953,1,'GITUJA','JEPSON KARAU M\'MUTHARA','','GITUJA/BC0125','na','0710 674977','73626','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1954,1,'KAMIGURU','FREDRICK MUGAMBI','','KAMIGURU/BB0048','na','na','46','NULL','NULL','NULL','2015-09-11 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(1955,1,'NJOSAWA','SAMUEL NJOROGE WANYOIKE','','NJOSAWA/AB0705','na','0723 604547','987','NULL','NULL','NULL','2015-09-11 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(1956,3,'RUTHAGATI','RUTUMA  F.C.S. LTD.','','RUTHAGATI/XAC61F01','na','0','NA','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',19,1,1,'0','245','',NULL,NULL,'NA'),(1957,3,'KARIE','RUTUMA  F.C.S. LTD.','','KARIE /XAC61F02','na','0','NA','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','KARATINA',19,1,1,'0','245','',NULL,NULL,'NA'),(1958,3,'MARUA','RUTUMA  F.C.S. LTD.','','MARUA/XAC61F03','na','0','NA','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',19,1,1,'0','245','',NULL,NULL,'NA'),(1959,3,'NGANDU','RUTUMA  F.C.S. LTD.','','NGANDU/XAC61F04','na','0','NA','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',19,1,1,'0','245','',NULL,NULL,'NA'),(1960,3,'GITHIMA RUTUMA','RUTUMA  F.C.S. LTD.','','GITHIMA/XAC61F05','na','0','NA','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',19,1,1,'0','245','',NULL,NULL,'NA'),(1961,3,'KIANJOGU','RUTUMA  F.C.S. LTD.','','KIANJOGU/XAC61F06','na','0','NA','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',19,1,1,'0','245','',NULL,NULL,'NA'),(1962,3,'NDURUTU','RUTUMA  F.C.S. LTD.','','NDURUTU/XAC61F07','na','NA','NA','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',19,1,1,'0','245','',NULL,NULL,'NA'),(1963,2,'BARICHU FCS','BARICHU F.C.S. LTD.','','BARICHU F.C.S/XAC13','NULL','NA','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','KARATINA',19,1,1,'0','1963',',',NULL,NULL,'NULL'),(1964,3,'KARATINA','BARICHU F.C.S. LTD.','','KARATINA/XAC13F01','na','na','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','KARATINA',19,1,1,'0','1963',',',NULL,NULL,'NA'),(1965,3,'KARINDUNDU','BARICHU F.C.S. LTD.','','KARINDUNDU/XAC13F02','na','na','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','KARATINA',19,1,1,'0','1963',',',NULL,NULL,'NA'),(1966,3,'GATURIRI','BARICHU F.C.S. LTD.','','GATURIRI/XAC13F03','na','na','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','KARATINA',19,1,1,'0','1963',',',NULL,NULL,'NA'),(1967,3,'GATOMBOYA','BARICHU F.C.S. LTD.','','GATOMBOYA/XAC13F04','na','na','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','KARATINA',19,1,1,'0','1963',',',NULL,NULL,'NA'),(1971,1,'MASUMBA-A','MASUMBA','','MASUMBA-A/BF0056A','na','0','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',48,5,1,'0','1889','',NULL,NULL,'0'),(1972,1,'MASUMBA-B','MASUMBA','','MASUMBA-B/BF0056B','na','0','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',48,5,1,'0','1889','',NULL,NULL,'NA'),(1973,1,'MASUMBA-C','MASUMBA','','MASUMBA-C/BF0056C','na','NA','1845','NULL','NULL','NULL','2015-09-15 00:00:00','1',0,'NULL','NA',48,5,1,'0','1889','',NULL,NULL,'NA'),(1974,2,'BUCHENGE FCS','BUCHENGE FCS LTD','','BUCHENGE FCS/XCE31','na','NA','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','KERICHO',35,4,1,'259','1974','',NULL,NULL,'NA'),(1976,2,'BURGEI EUT FCS','BURGEI EUT FCS LTD','','BURGEI EUT FCS/XCE15','na','21','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','KERICHO',35,4,1,'0','1976','',NULL,NULL,'NA'),(1977,2,'CHERARA FCS','CHERARA FCS LTD','','CHERARA FCS/XCE41','na','na','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'0','1977','',NULL,NULL,'NA'),(1978,2,'CHILCHILA FCS','CHILCHILA FCS LTD','','CHILCHILA FCS/XCE45','na','na','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','FORTE TERNAN',35,4,1,'38','1978','',NULL,NULL,'NA'),(1985,2,'KAPKULUBEN FCS','KAPKULUBEN FCS LTD','','KAPKULUBEN FCS/XCE57A','na','726418236','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','KORU',35,4,1,'0','1985','',NULL,NULL,'NA'),(1986,2,'KICHAWIR FCS','KICHAWIR FCS LTD','','KICHAWIR FCS/XCE38','na','NA','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','KERICHO',35,4,1,'0','1986','',NULL,NULL,'NA'),(1987,2,'KIMUGUL FCS','KIMUGUL FCS LTD','','KIMUGUL FCS/XCE56','na','NA','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','NA',35,4,1,'0','1987','',NULL,NULL,'NA'),(1988,2,'RORET FCS','RORET FCS LTD','','RORET FCS/XCE25','na','na','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','KIPKELION',35,4,1,'0','1988','',NULL,NULL,'NA'),(1989,2,'SERENG FCS','SERENG FCS LTD','','SERENG FCS/XCE37','na','720970509','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'0','1989','',NULL,NULL,'NA'),(1991,2,'SIWOT FCS','SIWOT FCS LTD','','SIWOT FCS/XCE29','na','na','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'0','1991','',NULL,NULL,'NA'),(1992,3,'SOYMINGIN 2','SOYMINGIN MULTI PURPOSE','','SOYMINGIN 2/XCE21F02','na','na','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',2,'NULL','NA',35,5,1,'0','1788','',NULL,NULL,'NA'),(1993,2,'TORSOGEK FCS','TORSOGEK FCS LTD','','TORSOGEK FCS/XCE04','na','720464406','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','KERICHO',35,4,1,'2085','1993','',NULL,NULL,'NA'),(1994,2,'TUYABET FCS','TUYABET  FCS LTD','','TUYABET FCS/XCE11','na','na','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',0,'NULL','KERICHO',35,4,1,'0','1994','',NULL,NULL,'NA'),(1999,1,'MUNANDA','MAGDALINE MUTHONI MWANGI','','MUNANDA/AA0331B','na','NA','6506','NULL','NULL','NULL','2015-09-21 00:00:00','1',0,'NULL','NAIROBI',47,1,1,'0','NULL','',NULL,NULL,'NA'),(2000,1,'KIUGU-INI','RUTH WAMBUI','','KIUGU-INI/AA0331A','na','728','16','NULL','NULL','NULL','2015-09-21 00:00:00','2',0,'NULL','KANYONI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2001,1,'MUTONGA','FRANCIS MAINA WAWERU','','MUTONGA/AG0275','na','0722 713578','NA','NULL','NULL','NULL','2015-09-21 00:00:00','1',0,'NULL','NA',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2002,1,'SIMBA','KABORO SIMBA','','SIMBA/AJ0023','na','NA','NA','NULL','NULL','NULL','2015-09-21 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2003,1,'GRACE','JOHN MWENJA KINYANJUI','','GRACE/AB0694B','na','0715 859533','146','NULL','NULL','NULL','2015-09-23 00:00:00','2',0,'NULL','KANJUKU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2004,1,'WILBU','JANE WARIGIA MBURU','','WILBU/AB0159','na','0725 928063','599','NULL','NULL','NULL','2015-09-23 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2005,1,'GREEN HILLS','JONATHAN MWEU NDONYE','','GREEN HILLS/BF0128','na','0729 490231','1330','NULL','NULL','NULL','2015-09-25 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2006,1,'WANGARI','HENRY KARIUKI NJUGUNA','','WANGARI','na','0725 005684','NA','NULL','NULL','NULL','2015-09-28 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2007,1,'GITHAMBIA','NDUNG\'U KAHUI','','GITHAMBIA/AB0425','na','0728 073154','1854','NULL','NULL','NULL','2015-09-28 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2008,1,'KIRIA-INI JANE','JANE NJOROGE','','KIRIA-INI/AB0134','na','0724 815809','375','NULL','NULL','NULL','2015-09-28 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2009,1,'NDAKUTHA','MARCLUS NJIRU','','NDAKUTHA/AJ0439','na','0722 884083','322','NULL','NULL','NULL','2015-09-28 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2010,1,'KIMUNDIRO','SAMUEL ND\'UNGU','','KIMUNDIRO/AA0333A','na','0722 835355','1757','NULL','NULL','NULL','2015-09-28 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2011,1,'GATURUMO','SAMUEL N KAHOYA','','GATURUMO/AB0255','na','0722 287768','695','NULL','NULL','NULL','2015-09-28 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2012,1,'MUIYORO','JOHN DANIEL MUIYORO','','MUIYORO/AB0207','na','0722 535536','1477','NULL','NULL','NULL','2015-09-30 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2013,1,'KIBARI','AMOS MWENDA MBERIA','','KIBARI/BB0096','na','0722 840154','14','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','NKUBU',49,1,1,'0','NULL','',NULL,NULL,'NA'),(2014,1,'DOCHI','CHRISTOPHER KIOKO','','DOCHI/BF0101','na','0722 821214','319957','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2015,2,'RWAIKAMBA FCS','RWAIKAMBA F.C.SOC LTD','','RWAIKAMBA FCS/XAB34','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2016,3,'NGUTU','RWAIKAMBA F.C.SOC LTD','','NGUTU/XAB34F01','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2017,3,'KIAWANDUMA','RWAIKAMBA F.C.SOC LTD','','KIAWANDUMA/XAB34F02','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2018,3,'KAHIRIGA','RWAIKAMBA F.C.SOC LTD','','KAHIRIGA/XAB34F03','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2019,3,'KAHETE','RWAIKAMBA F.C.SOC LTD','','KAHETE/XAB34F04','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2020,3,'KAGUMO','RWAIKAMBA F.C.SOC LTD','','KAGUMO/XAB34F05','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2021,3,'KARUYA','RWAIKAMBA F.C.SOC LTD','','KARUYA/XAB34F06','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2022,3,'KANJAHI','RWAIKAMBA F.C.SOC LTD','','KANJAHI/XAB34F07','na','na','37','NULL','NULL','NULL','2015-09-30 00:00:00','1',0,'NULL','GITUGI',21,1,1,'10209','2015','',NULL,NULL,'NA'),(2023,1,'RIAMBUI','KABUI KARABA','','RIAMBUI/AB0379','na','0700 286044','379','NULL','NULL','NULL','2015-09-30 00:00:00','2',0,'NULL','KANJUKU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2024,1,'SAKIGA','SAMUEL KIMUNYA','','SAKIGA/AB0571','na','0723 908173','90','NULL','NULL','NULL','2015-09-30 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2025,1,'KITHATANI','SOLOMON KYATHA WAMBUA','','KITHATANI/BF0162','na','NA','1099','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2026,1,'WADINGA','DANIEL MUINDE MATHEKA','','WADINGA/BF0061','na','NA','91','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2027,1,'KAMENE FAMILY','SHADRACK NTHIWA & F.N MUSAU','','KAMENE FAMILY/BF0153','na','NA','1179','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2028,1,'NGAU','GABRIEL NGAU KIOKO','','NGAU/BF0210','na','NA','90','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KATHIANI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2029,1,'KALAA','MARTIN KISUKE KAVUU','','KALAA/BF0159','na','NA','1474','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2030,1,'SINAI','JOSPHAT MUINDE NGENGYA','','SINAI/BF0125','na','NA','5253','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2031,1,'KITHUNGUINI','PETER MUTISO MBITHI','','KITHUNGUINI/BF0085','na','NA','50','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2032,1,'MUKUMA','DIANNAH MAKAU','','MUKUMA/BF0093','na','NA','1610','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2033,1,'UTUMONI','THERESIA MBATHA NDOLO','','UTUMONI/BF0172','na','NA','1515','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2034,1,'ULAANI','JOHN N MUSILU','','ULAANI/BF0022','na','NA','519','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2035,1,'NDOTE','GIDEON MUSYOKA NZIOKI','','NDOTE/BF0182','na','NA','1041','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2036,1,'KAMUTHENYA','ANTHONY KASIMU KAVALI','','KAMUTHENYA/BF0198','na','NA','1418','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2037,1,'MULEWA','FREDDIE M. MUSILU','','MULEWA/BF0120','na','NA','1030','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2038,1,'NDANU','BEATRICE NGINA','','NDANU/BF0108A','na','NA','1027','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2039,1,'NDENDWA','DANIEL MUIA KIMATU','','NDENDWA/BF0174','na','NA','1083','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2040,1,'OSLABEMU','RICHARD M. MUTISO','','OSLABEMU/BF0151','na','NA','1152','NULL','NULL','NULL','2015-10-01 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2041,2,'NKG SWEEPINGS','NKG','','NKG','NA','NA','NA','NULL','NULL','NULL','2015-10-08 00:00:00','2',1,'NULL','NULL',47,1,1,'0','NULL','',NULL,NULL,'NA'),(2042,4,'MUTHITHI PLANTATIONS','MUTHITHI PLANTATIONS CO.LTD','','MUTHITHI PLANTATIONS/AA0048','smkabetu@gmail.com','NA','197','NULL','NULL','NULL','2015-10-08 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2043,1,'GITACHU','JOSEPH G THIGA','','GITACHU/AE0045','na','0721 351944','69939','NULL','NULL','NULL','2015-10-09 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2046,3,'NEW CHESIKAKI','NEW CHESIKAKI F.C.S LTD','','NEW CHESIKAKI','na','na','193','NULL','NULL','NULL','2015-10-14 00:00:00','1',0,'NULL','BUNGOMA',39,6,1,'50200','2046','',NULL,NULL,'NA'),(2047,1,'CIEMES','CHARLES MUSEMBI MAUNDU','','CIEMES/BF0087','na','0722 309495','60373','NULL','NULL','NULL','2015-10-14 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2048,1,'MANGO HILLS','BENJAMIN M MUTUA','','MANGO HILLS/BF0105','na','na','21683','NULL','NULL','NULL','2015-10-15 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2049,2,'MARANI FCS','MARANI F.C.SOC LTD','','MARANI FCS/XEA08','na','na','35','NULL','NULL','NULL','2015-10-30 00:00:00','1',0,'NULL','KISII',45,6,1,'0','2049','',NULL,NULL,'NA'),(2050,3,'MARANI','MARANI F.C.SOC LTD','','MARANI/XEA08F01','na','na','35','NULL','NULL','NULL','2015-10-30 00:00:00','1',0,'NULL','KISII',45,6,1,'0','2049','',NULL,NULL,'NA'),(2051,3,'NYABONGE','MARANI F.C.SOC LTD','','NYABONGE/XEA08F02','na','na','35','NULL','NULL','NULL','2015-10-30 00:00:00','1',0,'NULL','KISII',45,6,1,'0','2049','',NULL,NULL,'NA'),(2052,3,'NYANCHOGU','MARANI F.C.SOC LTD','','NYANCHOGU/XEA08F03','na','na','35','NULL','NULL','NULL','2015-10-30 00:00:00','1',0,'NULL','KISII',45,6,1,'0','2049','',NULL,NULL,'NA'),(2053,3,'RIGOMA','MARANI F.C.SOC LTD','','RIGOMA/XEA08F04','na','na','35','NULL','NULL','NULL','2015-10-30 00:00:00','1',0,'NULL','KISII',45,6,1,'0','2049','',NULL,NULL,'NA'),(2054,1,'KITHANGAINI','NICHOLAS NJERU NJAGI','','KITHANGAINI/BF0164','na','NA','1790','NULL','NULL','NULL','2015-11-03 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2055,3,'EGETONTO','MAGWAGWA F.C.SOC LTD','','EGETONTO FCS','NULL','0','NULL','NULL','NULL','NULL','2015-11-12 00:00:00','1',0,'NULL','NULL',1,4,1,'NULL','2607','',NULL,NULL,'NULL'),(2056,3,'MAGWAGWA','MAGWAGWA F.C.SOC LTD','','MAGWAGWA','NULL','0','NULL','NULL','NULL','NULL','2015-11-12 00:00:00','1',0,'NULL','NULL',45,4,1,'NULL','2607','',NULL,NULL,'NULL'),(2057,2,'KAGANDA FCS','KAGANDA F.C.SOC LTD','','KAGANDA FCS/XAB45','na','NA','271','NULL','NULL','NULL','2015-11-13 00:00:00','1',0,'NULL','KAHURO',21,1,1,'10201','2057','RA,CAFE',NULL,NULL,'NA'),(2058,3,'KAGANDA','KAGANDA F.C.SOC LTD','','KAGANDA/XAB45F01','na','NA','271','NULL','NULL','NULL','2015-11-13 00:00:00','1',0,'NULL','KAHURO',21,1,1,'10201','2057','0',NULL,NULL,'NA'),(2059,1,'KERUMBE','STEPHEN MOGENI','','KERUMBE/EB0002','na','NA','12','NULL','NULL','NULL','2015-11-18 00:00:00','1',0,'NULL','KISII',45,3,1,'0','NULL','',NULL,NULL,'NA'),(2060,2,'GATHIGA FCS','GATHIGA C.G.C.S.LTD','','GATHIGA FCS/XAB94','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','THIKA',0,0,1,'1000','2060','',NULL,NULL,'NULL'),(2061,2,'NYAMONYA  FCS','NYAMONYA FCS LTD','','NYAMONYA FCS','n/a','N/A','N/A','NULL','NULL','NULL','2015-12-02 00:00:00','1',0,'NULL','KISII',45,6,1,'0','2061','',NULL,NULL,'N/A'),(2062,3,'NYAMONYA','NYAMONYA FCS LTD','','NYAMONYA','n/a','N/A','0','NULL','NULL','NULL','2015-12-02 00:00:00','1',0,'NULL','N/A',45,6,1,'0','2061','',NULL,NULL,'N/A'),(2063,3,'MOTONTO','NYAMONYA FCS LTD','','MOTONTO','n/a','N/A','0','NULL','NULL','NULL','2015-12-02 00:00:00','1',0,'NULL','N/A',45,6,1,'0','2061','',NULL,NULL,'N/A'),(2064,3,'NYAGANCHA','NYAMONYA FCS LTD','','NYAGANCHA','n/a','N/A','0','NULL','NULL','NULL','2015-12-02 00:00:00','1',0,'NULL','N/A',45,6,1,'0','2061','',NULL,NULL,'N/A'),(2065,2,'NYABOMITE FCS','NYABOMITE F.C.SOC LTD','','NYABOMITE FCS/XEA14','n/a','N/A','0','NULL','NULL','NULL','2015-12-01 00:00:00','1',0,'NULL','N/A',45,6,1,'0','2065','',NULL,NULL,'N/A'),(2066,3,'NYANSANGIO','NYABOMITE F.C.SOC LTD','','NYANSANGIO/XEA14F04','n/a','N/A','0','NULL','NULL','NULL','2015-12-01 00:00:00','1',0,'NULL','N/A',45,6,1,'0','2065','',NULL,NULL,'N/A'),(2067,1,'LELGOTET','EZEKIEL BARNGETUNY','','LELGOTET/CF0020','na','723577785','5','NULL','NULL','NULL','2015-12-03 00:00:00','1',0,'NULL','SONGOR',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2068,1,'JOE JANE','JOEL GACHEMA MURITU','','JOE JANE/AB0626','na','0720 928832','12','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','GITUAMBA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2069,1,'KARURAA','ALOISE IRERI','','KARURAA/BD0117','na','721414353','7349','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','NAIROBI',49,5,1,'0','NULL','',NULL,NULL,'NA'),(2070,1,'MUITHERERO','ANTHONY WANDUI','','MUITHERERO/AB0446','na','724891755','790','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2072,1,'SAMGEN','SAMUEL BORO','','SAMGEN/AC0069A','na','717603457','407','NULL','NULL','NULL','2015-12-04 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2073,1,'MBUTII','NGARI MWANGI','','MBUTII/AJ0110','na','na','NA','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2074,1,'KARIMURI','RACHEL WAITHERA KAMAU','','KARIMURI/AB0133','na','722327348','641','NULL','NULL','NULL','2015-12-04 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2075,2,'MWIRUA FCS','MWIRUA F.C.SOC LTD','','MWIRUA FCS/XAD06','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','FLO',NULL,NULL,'NA'),(2076,3,'KIRIAINI','MWIRUA F.C.SOC LTD','','KIRIAINI/XAD06F01','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','',NULL,NULL,'NA'),(2077,3,'MITONDO','MWIRUA F.C.SOC LTD','','MITONDO/XAD06F02','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','',NULL,NULL,'NA'),(2078,3,'GATUYA','MWIRUA F.C.SOC LTD','','GATUYA/XAD06F03','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','',NULL,NULL,'NA'),(2079,3,'GATHAMBI','MWIRUA F.C.SOC LTD','','GATHAMBI/XAD06F04','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','',NULL,NULL,'NA'),(2080,3,'KIARAGANA','MWIRUA F.C.SOC LTD','','KIARAGANA/XAD06F05','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','',NULL,NULL,'NA'),(2081,3,'KIAMBWE','MWIRUA F.C.SOC LTD','','KIAMBWE/XAD06F06','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','',NULL,NULL,'NA'),(2082,3,'RWAMUTHAMBI','MWIRUA F.C.SOC LTD','','RWAMUTHAMBI/XAD06F07','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','',NULL,NULL,'NA'),(2083,3,'RIAKIANIA','MWIRUA F.C.SOC LTD','','RIAKIANIA/XAD06F08','mwiruafcs@yahoo.com','NA','10','NULL','NULL','NULL','2015-12-04 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','2075','FLO',NULL,NULL,'NA'),(2084,2,'NYAMOSONGO FCS','NYAMOSONGO F.C.SOC LTD','','NYAMOSONGO FCS/XEA29','na','NA','35','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2084','',NULL,NULL,'NA'),(2085,3,'NYANSONGO','NYAMOSONGO F.C.SOC LTD','','NYANSONGO/XEA29F01','na','NA','35','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2084','',NULL,NULL,'NA'),(2086,3,'NYAMOKENYE','NYAMOSONGO F.C.SOC LTD','','NYAMOKENYE/XEA29F02','na','NA','35','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2084','',NULL,NULL,'NA'),(2087,1,'CHEPKOSA','MAGERER LANG\'AT','','CHEPKOSA/ZA0032','na','NA','NA','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','NA',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2088,2,'NYAGUTA FCS','NYAGUTA F.C.SOC LTD','','NYAGUTA FCS/XEA15','na','NA','35','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2088','',NULL,NULL,'NA'),(2089,3,'NYAGUTA','NYAGUTA F.C.SOC LTD','','NYAGUTA/XEA15F01','na','NA','35','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2088','',NULL,NULL,'NA'),(2090,3,'NYABOTERERE','NYAGUTA F.C.SOC LTD','','NYABOTERERE/XEA15F02','na','NA','35','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2088','',NULL,NULL,'NA'),(2092,1,'NYANDE','JAMES N NDEGWA','','NYANDE/AG0088','na','721312411','596','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','NYERI',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2093,1,'NZUMA','SIMON MUSYOKI MULWA','','NZUMA/BF0190','na','na','531','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2094,1,'KUMBURI','KENNETH IRERI MIGUONGO','','KUMBURI/AJ0054B','na','na','997','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','EMBU',49,5,1,'0','NULL','',NULL,NULL,'NA'),(2095,1,'FRAMWA','MONICA WANJIRU MWANGI','','FRAMWA/AB0268','na','0727 318689','79','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KANDARA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2096,2,'NEW NGARIAMA FCS','NEW NGARIAMA F.C.SOC LTD','','NEW NGARIAMA FCS/XAD13','newngariama@yahoo.com','na','357','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KIANYAGA',20,1,1,'10301','2096','',NULL,NULL,'NA'),(2097,3,'KAINAMUI','NEW NGARIAMA F.C.SOC LTD','','KAINAMUI/XAD13F01','newngariama@yahoo.com','na','357','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KIANYAGA',20,1,1,'10301','2096','',NULL,NULL,'NA'),(2098,3,'KAMWANGI','NEW NGARIAMA F.C.SOC LTD','','KAMWANGI/XAD13F02','newngariama@yahoo.com','na','357','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','KIANYAGA',20,1,1,'10301','2096','',NULL,NULL,'NA'),(2099,2,'RUNG\'ETO FCS','RUNG\'ETO F.C.SOC LTD','','RUNG\'ETO FCS/XAD14','na','na','2445','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','EMBU',20,1,1,'60100','2099','0',NULL,NULL,'NA'),(2100,3,'KII','RUNG\'ETO F.C.SOC LTD','','KII/XAD14F01','na','na','2445','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','EMBU',20,1,1,'60100','2099','0',NULL,NULL,'NA'),(2101,3,'KARIMIKUI','RUNG\'ETO F.C.SOC LTD','','KARIMIKUI/XAD14F02','na','na','2445','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','EMBU',20,1,1,'60100','2099','0',NULL,NULL,'NA'),(2102,3,'KIANGOI','RUNG\'ETO F.C.SOC LTD','','KIANGOI/XAD14F03','na','na','2445','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','EMBU',20,1,1,'60100','2099','0',NULL,NULL,'NA'),(2103,2,'KITHUNGURURU FCS','KITHUNGURURU F.C.SOC LTD','','KITHUNGURURU FCS/XBD24','na','NA','576','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','EMBU',49,5,1,'60100','2103','',NULL,NULL,'NA'),(2104,3,'KITHUNGURURU','KITHUNGURURU F.C.SOC LTD','','KITHUNGURURU/XBD24F01','na','NA','576','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','EMBU',49,5,1,'60100','2103','',NULL,NULL,'NA'),(2105,2,'RUTHAKA FCS','RUTHAKA F.C.SOC LTD','','RUTHAKA FCS/XAC58','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','FLO',NULL,NULL,'NA'),(2106,3,'RUARAI','RUTHAKA F.C.SOC LTD','','RUARAI/XAC58F01','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','FLO',NULL,NULL,'NA'),(2107,3,'KAMUCHUNI','RUTHAKA F.C.SOC LTD','','KAMUCHUNI/XAC58F02','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','FLO',NULL,NULL,'NA'),(2108,3,'NDUMA','RUTHAKA F.C.SOC LTD','','NDUMA/XAC58F03','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','FLO',NULL,NULL,'NA'),(2109,3,'MUTHUTHUINI','RUTHAKA F.C.SOC LTD','','MUTHUTHUINI/XAC58F04','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','FLO',NULL,NULL,'NA'),(2110,3,'MUKUI','RUTHAKA F.C.SOC LTD','','MUKUI/XAC58F05','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','RA,FLO',NULL,NULL,'NA'),(2111,3,'KIBUTIO','RUTHAKA F.C.SOC LTD','','KIBUTIO/XAC58F06','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','',NULL,NULL,'NA'),(2112,3,'KARABA','RUTHAKA F.C.SOC LTD','','KARABA/XAC58F07','na','NA','129','NULL','NULL','NULL','2015-12-10 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2105','',NULL,NULL,'NA'),(2113,2,'IYABE FCS','IYABE FCS LTD','','IYABE FCS/XEA27','na','NA','NA','NULL','NULL','NULL','2015-12-16 00:00:00','1',0,'NULL','O',45,6,1,'0','2113','',NULL,NULL,'N/A'),(2114,3,'KEBACHA','IYABE FCS LTD','','KEBACHA/XEA27F02','na','NA','0','NULL','NULL','NULL','2015-12-16 00:00:00','1',0,'NULL','NA',45,3,1,'0','2113','',NULL,NULL,'NA'),(2115,3,'IYABE','IYABE FCS LTD','','IYABE/XEA27F01','na','NA','NA','NULL','NULL','NULL','2015-12-16 00:00:00','1',0,'NULL','NA',45,3,1,'0','2113','',NULL,NULL,'NA'),(2116,2,'NYOSIA FCS','NYOSIA F.C. SOC. LTD.','','NYOSIA/XEA04','na','NA','0','NULL','NULL','NULL','2015-12-16 00:00:00','1',0,'NULL','NA',45,3,1,'0','2116','',NULL,NULL,'NA'),(2117,3,'NYOSIA','NYOSIA F.C. SOC. LTD.','','NYOSIA/XEA004F01','na','NA','0','NULL','NULL','NULL','2015-12-16 00:00:00','1',0,'NULL','NA',45,3,1,'0','2116','',NULL,NULL,'NA'),(2119,3,'KIOGE','NYABOMITE F.C.SOC LTD','','KIOGE/XEA014F03','na','na','0','NULL','NULL','NULL','2015-12-18 00:00:00','1',0,'NULL','NA',45,3,1,'0','2065','',NULL,NULL,'NA'),(2120,4,'DEDAN KIMATHI','DEDAN KIMATHI UNIVERSITY','','DEDAN KIMATHI UNIVERSITY/AG0009','john.gathirwa@dkut.ac.ke','NA','657','NULL','NULL','NULL','2015-12-23 00:00:00','1',0,'NULL','NYERI',19,1,1,'10100','NULL','',NULL,NULL,'NA'),(2121,1,'KIRIA-INI TERESIAH','TERESIAH WAITHERA','','KIRIA-INI/AB0134A','na','726153877','NA','NULL','NULL','NULL','2015-12-23 00:00:00','1',0,'NULL','NA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2122,3,'NDUNDA','KITHUNGURURU F.C.SOC LTD','','NDUNDU/XBD24F02','na','NA','0','NULL','NULL','NULL','2015-12-09 00:00:00','1',0,'NULL','NA',49,5,1,'0','2103','',NULL,NULL,'NA'),(2123,1,'NGETHU FARM','JANET MUTHONI MBURU','','NGETHU/AB0212','na','720421023','0','NULL','NULL','NULL','2015-12-28 00:00:00','1',0,'NULL','NA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2124,1,'IRIMA 2','DANIEL KURIA WAWERU','','IRIMA 2/AA0466','na','720242738','NA','NULL','NULL','NULL','2015-12-18 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2125,1,'KIRIGU FARM','DAVID WAGICIU MAKUMI','','KIRIGU FARM/AA0516A','na','721525242','29','NULL','NULL','NULL','2015-12-29 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2126,1,'NJIHIA','FRANCIS KAMAU NJIHIA','','NJIHIA/AA0360','na','722465397','7121','NULL','NULL','NULL','2015-12-29 00:00:00','1',0,'NULL','NAKURU',32,4,1,'0','NULL','',NULL,NULL,'NA'),(2127,1,'BETHAMBU','BENJAMIN THAGICU','','BETHAMBU/CA0264','na','723993932','145','NULL','NULL','NULL','2015-12-29 00:00:00','1',0,'NULL','BAHATI',32,4,1,'0','NULL','',NULL,NULL,'NA'),(2128,1,'NEMA','JOSEPH KIBE MACHARIA','','NEMA/AA0817','na','722964546','90','NULL','NULL','NULL','2015-12-29 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2129,1,'GIFTED','MOSES KAMURA NGANGA','','GIFTED/AA0426A','na','NA','24','NULL','NULL','NULL','2015-12-29 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2130,1,'MATIGI','FRANCIS EPHANTUS MATIGI','','MATIGI/AJ0940','na','NA','145','NULL','NULL','NULL','2015-12-29 00:00:00','1',0,'NULL','KAHUHIA',20,1,1,'10206','NULL','',NULL,NULL,'NA'),(2131,1,'GIATHETU','MARGARET NJERI MUKUNGA','','GIATHETU/AA309','na','727977047','226','NULL','NULL','NULL','2016-01-04 00:00:00','17',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2132,1,'KAKU','GEOFFREY KANJA KURIA','','KAKU/AA0478C','na','725075584','301','NULL','NULL','NULL','2015-12-30 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2133,1,'STEVE','STEPHEN KINYANJUI KIMANI','','STEVE/AA0822','NULL','721803480','32989','NULL','NULL','NULL','2016-01-04 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'600','NULL','',NULL,NULL,'NA'),(2135,1,'THREE KEI','JAMLECK GACHANJA KAMAU','','THREE KEI/AA320C','na','726731035','1082','NULL','NULL','NULL','2016-01-04 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2136,2,'KIOMOONCHA FCS','KIOMOONCHA F.C.SOC LTD','','KIOMOONCHA FCS/XEA16','na','na','35','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2136','',NULL,NULL,'NA'),(2137,3,'KIOMOONCHA MAIN','KIOMOONCHA F.C.SOC LTD','','KIOMOONCHA MAIN/XEA16F01','na','na','35','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2136','',NULL,NULL,'NA'),(2138,3,'SIEKA','KIOMOONCHA F.C.SOC LTD','','SIEKA/XEA16F02','na','na','35','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2136','',NULL,NULL,'NA'),(2139,3,'NYAGOTO','KIOMOONCHA F.C.SOC LTD','','NYAGOTO/XEA16F03','na','na','35','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2136','',NULL,NULL,'NA'),(2140,3,'NYAMAGOMA','KIOMOONCHA F.C.SOC LTD','','NYAMAGOMA/XEA16F04','na','na','35','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2136','',NULL,NULL,'NA'),(2141,2,'NYATURUBO FCS','NYATURUBO F.C.SOC LTD','','NYATURUBO FCS/XEA03','na','NA','35','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2141','',NULL,NULL,'NA'),(2142,3,'NYATURUBO MAIN','NYATURUBO F.C.SOC LTD','','NYATURUBO MAIN/XEA03F01','na','NA','35','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2141','',NULL,NULL,'NA'),(2143,3,'AYORO','AYORO F.C.S. LTD','','AYORO/XEB11F01','na','714254180','10','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','OYUGIS',52,5,1,'40222','354','',NULL,NULL,'NA'),(2144,1,'LESAN','CHEPKWONY MARINDANY','','LESAN/CH0024','na','na','72','NULL','NULL','NULL','2016-01-06 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2145,1,'MANOTI','JARED SINDIGA','','MANOTI /EB0055','na','na','58','NULL','NULL','NULL','2016-01-07 00:00:00','1',0,'NULL','OGEMBO',45,3,1,'0','NULL','',NULL,NULL,'NA'),(2146,1,'KIRIOR','KIPTORUS ARAP KIRIOR','','KIRIOR/CF0043','na','0722 755609','66','NULL','NULL','NULL','2016-01-14 00:00:00','1',0,'NULL','KERICHO',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2147,2,'RUMUKIA FCS','RUMUKIA F.C.SOC LTD','','RUMUKIA FCS/XAC59','rumukia@wananchi.com','061 60009','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2148,3,'KAGUNYU','RUMUKIA F.C.SOC LTD','','KAGUNYU/XAC59F01','rumukia@wananchi.com','061 60009','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2149,3,'GATURA','RUMUKIA F.C.SOC LTD','','GATURA/XAC59F02','rumukia@wananchi.com','na','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2150,3,'THUNGURI','RUMUKIA F.C.SOC LTD','','THUNGURI/XAC59F03','rumukia@wananchi.com','na','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2151,3,'MAGANJO','RUMUKIA F.C.SOC LTD','','MAGANJO/XAC59F04','rumukia@wananchi.com','na','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2152,3,'KIAWAMURURU','RUMUKIA F.C.SOC LTD','','KIAWAMURURU/XAC59F05','rumukia@wananchi.com','na','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2153,3,'TAMBAYA','RUMUKIA F.C.SOC LTD','','TAMBAYA/XAC59F06','rumukia@wananchi.com','na','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2154,3,'GAIKUNDO','RUMUKIA F.C.SOC LTD','','GAIKUNDO/XAC59F07','rumukia@wananchi.com','na','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2155,3,'NDIAINI','RUMUKIA F.C.SOC LTD','','NDIAINI/XAC59F08','rumukia@wananchi.com','na','61','NULL','NULL','NULL','2016-01-15 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','2147','',NULL,NULL,'NA'),(2156,2,'KEMERA FCS','KEMERA F.C.SOC LTD','','KEMERA FCS/XEA06','na','NA','35','NULL','NULL','NULL','2016-01-18 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2156','',NULL,NULL,'NA'),(2157,3,'KEMERA','KEMERA F.C.SOC LTD','','KEMERA/XEA06F01','na','NA','35','NULL','NULL','NULL','2016-01-18 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2156','',NULL,NULL,'NA'),(2158,3,'GESONGO','KEMERA F.C.SOC LTD','','GESONGO/XEA06F02','na','NA','35','NULL','NULL','NULL','2016-01-18 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2156','',NULL,NULL,'NA'),(2159,2,'MOBAMBA FCS','MOBAMBA F.C.SOC LTD','','MOBAMBA FCS/XEA10','na','NA','35','NULL','NULL','NULL','2016-01-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2159','',NULL,NULL,'NA'),(2160,3,'MOBAMBA','MOBAMBA F.C.SOC LTD','','MOBAMBA/XEA10F01','na','NA','35','NULL','NULL','NULL','2016-01-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2159','',NULL,NULL,'NA'),(2161,3,'MASONGO','MOBAMBA F.C.SOC LTD','','MASONGO/XEA10F02','na','NA','35','NULL','NULL','NULL','2016-01-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2159','',NULL,NULL,'NA'),(2162,3,'MOSASA','MOBAMBA F.C.SOC LTD','','MOSASA/XEA10F03','na','NA','35','NULL','NULL','NULL','2016-01-20 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2159','',NULL,NULL,'NA'),(2163,2,'TOROTON FCS','TOROTON F.C.SOC LTD','','TOROTON FCS/XCF18','na','NA','152','NULL','NULL','NULL','2016-01-20 00:00:00','1',0,'NULL','SONGHOR',29,4,1,'40110','2163','',NULL,NULL,'NA'),(2164,3,'TOROTON','TOROTON F.C.SOC LTD','','TOROTON/XCF18F01','na','NA','152','NULL','NULL','NULL','2016-01-20 00:00:00','1',0,'NULL','SONGHOR',29,4,1,'40110','2163','',NULL,NULL,'NA'),(2165,2,'MARUMI FCS','MARUMI F.C.SOC LTD','','MARUMI FCS/XAB52','na','NA','361','NULL','NULL','NULL','2016-01-22 00:00:00','1',0,'NULL','KIGUMO',21,1,1,'10203','2165','',NULL,NULL,'NA'),(2166,3,'MARUMI','MARUMI F.C.SOC LTD','','MARUMI/XAB52F01','na','NA','361','NULL','NULL','NULL','2016-01-22 00:00:00','1',0,'NULL','KIGUMO',21,1,1,'10203','2165','',NULL,NULL,'NA'),(2167,3,'IRIGUINI','MARUMI F.C.SOC LTD','','IRIGUINI/XAB52F02','na','NA','361','NULL','NULL','NULL','2016-01-22 00:00:00','1',0,'NULL','KIGUMO',21,1,1,'10203','2165','',NULL,NULL,'NA'),(2168,3,'MARIIRA','MARUMI F.C.SOC LTD','','MARIIRA/XAB52F03','na','NA','361','NULL','NULL','NULL','2016-01-22 00:00:00','1',0,'NULL','KIGUMO',21,1,1,'10203','2165','',NULL,NULL,'NA'),(2169,2,'KAMACHUNGWA FCS','KAMACHUNGWA F.C.SOC.LTD','','KAMACHUNGWA/KAMACHUNGWA','NA','NA','NULL','NULL','NULL','NULL','NULL','1',1,'NULL','KIPKELION',35,4,1,'NULL','NULL','',NULL,NULL,'NA'),(2170,2,'TEKANGU FCS','TEKANGU F.C.SOC LTD','','TEKANGU FCS/XAC60','tekangu@gmail.com','NA','1941','NULL','NULL','NULL','2016-01-27 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2170','',NULL,NULL,'NA'),(2172,3,'KAMACHUNGWA','KAMACHUNGWA F.C.SOC.LTD','','KAMACHUNGWA/F01','NA','NA','NULL','NULL','NULL','NULL','NULL','1',1,'NULL','KIPKELION',35,4,1,'NULL','2169','',NULL,NULL,'NA'),(2173,3,'TEGU','TEKANGU F.C.SOC LTD','','TEGU/XAC60F01','tekangu@gmail.com','NA','1941','NULL','NULL','NULL','2016-01-27 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2170','',NULL,NULL,'NA'),(2174,3,'KAROGOTO','TEKANGU F.C.SOC LTD','','KAROGOTO/XAC60F02','tekangu@gmail.com','NA','1941','NULL','NULL','NULL','2016-01-27 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2170','RA',NULL,NULL,'NA'),(2175,3,'NGUNGURU','TEKANGU F.C.SOC LTD','','NGUNGURU/XAC60F03','tekangu@gmail.com','NA','1941','NULL','NULL','NULL','2016-01-27 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2170','',NULL,NULL,'NA'),(2176,3,'WAKAMATA','TEKANGU F.C.SOC LTD','','WAKAMATA/XAC60F04','tekangu@gmail.com','NA','1941','NULL','NULL','NULL','2016-01-27 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2170','',NULL,NULL,'NA'),(2177,3,'NYANGOKO','NYABOMITE F.C.SOC LTD','','NYANGOKO/XEA14F02','na','NA','35','NULL','NULL','NULL','2016-01-29 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2065','',NULL,NULL,'NA'),(2178,2,'KENYORO FCS','KENYORO F.C.SOC LTD','','KENYORO FCS/XEA12','na','NA','35','NULL','NULL','NULL','2016-01-29 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2178','',NULL,NULL,'NA'),(2179,3,'KENYORO','KENYORO F.C.SOC LTD','','KENYORO/XEA12F01','na','NA','35','NULL','NULL','NULL','2016-01-29 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2178','',NULL,NULL,'NA'),(2180,3,'GESUGURI','KENYORO F.C.SOC LTD','','GESUGURI/XEAF02','na','NA','35','NULL','NULL','NULL','2016-01-29 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2178','',NULL,NULL,'NA'),(2181,3,'NYAMAGUNDO','KENYORO F.C.SOC LTD','','NYAMAGUNDO/XEA12F03','na','NA','35','NULL','NULL','NULL','2016-01-29 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2178','',NULL,NULL,'NA'),(2182,3,'GESEBE','KENYORO F.C.SOC LTD','','GESEBE/XEAF04','na','NA','35','NULL','NULL','NULL','2016-01-29 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2178','',NULL,NULL,'NA'),(2185,2,'NYAMBUNDE FCS','NYAMBUNDE F.C.SOC LTD','','NYAMBUNDE FCS/XEA23','na','NA','35','NULL','NULL','NULL','2016-02-03 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2185','',NULL,NULL,'NA'),(2186,3,'NYAMBUNDE','NYAMBUNDE F.C.SOC LTD','','NYAMBUNDE/XEA23F01','na','NA','35','NULL','NULL','NULL','2016-02-03 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2185','',NULL,NULL,'NA'),(2187,3,'KIONYO','NYAMBUNDE F.C.SOC LTD','','KIONYO/XEA23F02','na','NA','35','NULL','NULL','NULL','2016-02-03 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2185','',NULL,NULL,'NA'),(2188,3,'KABOSI','NYATURUBO F.C.SOC LTD','','KABOSI/XEA03F02','na','NA','35','NULL','NULL','NULL','2016-02-08 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2141','',NULL,NULL,'NA'),(2189,1,'MUTUKU','JOHN MUTUKU MWALILI','','MUTUKU/BF0205','na','NA','1050','NULL','NULL','NULL','2016-02-08 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2190,2,'KIANGAGWA FCS','KIANGAGWA F.C.SOC LTD','','KIANGAGWA FCS/XBD09','kiangagwafcs@yahoo.com','NA','24','NULL','NULL','NULL','2016-02-10 00:00:00','1',0,'NULL','RUNYENJES',51,5,1,'60103','2190','',NULL,NULL,'NA'),(2191,3,'NJERURI','KIANGAGWA F.C.SOC LTD','','NJERURI/XBD09F01','kiangagwafcs@yahoo.com','NA','24','NULL','NULL','NULL','2016-02-10 00:00:00','1',0,'NULL','RUNYENJES',51,5,1,'60103','2190','',NULL,NULL,'NA'),(2192,3,'IVURORI','KIANGAGWA F.C.SOC LTD','','IVURORI/XBD09F02','kiangagwafcs@yahoo.com','NA','24','NULL','NULL','NULL','2016-02-10 00:00:00','1',0,'NULL','RUNYENJES',51,5,1,'60103','2190','',NULL,NULL,'NA'),(2193,3,'MURURIRI','KIANGAGWA F.C.SOC LTD','','MURURIRI/XBD09F03','kiangagwafcs@yahoo.com','NA','24','NULL','NULL','NULL','2016-02-10 00:00:00','1',0,'NULL','RUNYENJES',51,5,1,'60103','2190','',NULL,NULL,'NA'),(2194,1,'KIVOO','TIMOTHY .N. TAI','','KIVOO/BD0121','njagitai@gmail.com','NA','669','NULL','NULL','NULL','2016-02-10 00:00:00','1',0,'NULL','EMBU',51,5,1,'0','NULL','',NULL,NULL,'NA'),(2195,1,'KAMAVINDI','MARTIN MBATURE','','KAMAVINDI/BD0034','na','NA','1638','NULL','NULL','NULL','2016-02-15 00:00:00','1',0,'NULL','EMBU',51,5,1,'0','NULL','',NULL,NULL,'NA'),(2196,2,'NYACHENGE FCS','NYACHENGE F.C.SOC LTD','','NYACHENGE FCS/XEA20','na','NA','35','NULL','NULL','NULL','2016-02-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2196','',NULL,NULL,'NA'),(2197,3,'NYACHENGE','NYACHENGE F.C.SOC LTD','','NYACHENGE/XEA20F01','na','NA','35','NULL','NULL','NULL','2016-02-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2196','',NULL,NULL,'NA'),(2198,3,'IRINGA','NYACHENGE F.C.SOC LTD','','IRINGA/XEA20F02','na','NA','35','NULL','NULL','NULL','2016-02-17 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2196','',NULL,NULL,'NA'),(2200,1,'BEN-DO','BERNARD MUINDI','','BEN-DO/BF0201','na','NA','1014','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2201,1,'MWANYANI','PIUS MUTINDA MBITI','','MWANYANI/BF0217','na','NA','1438','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2202,1,'NDAKI','NDAMBUKI KILOLO','','NDAKI/BF0194','na','NA','1099','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2203,1,'MONSAM','SAMMY KIOKO KISOI','','MONSAM/BF0119','na','NA','735','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','ATHI RIVER',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2204,2,'SENGANI FCS','SENGANI F.C.SOC LTD','','SENGANI FCS/XBE17','na','NA','477','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','TALA',48,5,1,'0','2204','',NULL,NULL,'NA'),(2205,3,'KYAWAA','SENGANI F.C.SOC LTD','','KYAWAA/XBE17F01','na','NA','477','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','TALA',48,5,1,'0','2204','',NULL,NULL,'NA'),(2206,3,'KITHAAYONI','SENGANI F.C.SOC LTD','','KITHAAYONI/XBE17F02','na','NA','477','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','TALA',48,5,1,'0','2204','',NULL,NULL,'NA'),(2207,1,'WAITA','MICHAEL MUTHINI KIILU','','WAITA/BF0196','na','NA','1014','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2208,1,'RAVERO','RAPHAEL MAINGA','','RAVERO/BF0238','na','NA','1030','NULL','NULL','NULL','2016-02-19 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2209,1,'MAKAMU','FRANCIS MAINA NDUGIRE','','MAKAMU/AG0290','na','NA','1321','NULL','NULL','NULL','2016-02-22 00:00:00','1',0,'NULL','NYERI',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2210,1,'IVORY','KENNETH MIGUONGO','','IVORY/AJ0054A','johnnjeru63@gmail.com','735689751','997','NULL','NULL','NULL','2016-02-24 00:00:00','1',0,'NULL','EMBU',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2211,1,'NGARUTUA','PETERSON MUTHATHAI','','NGARUTUA/BD0039','na','NA','NA','NULL','NULL','NULL','2016-02-24 00:00:00','1',0,'NULL','NA',51,5,1,'0','NULL','',NULL,NULL,'NA'),(2212,1,'SOLOWA','SOLOWA','','SOLOWA/CB0657','na','na','NA','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','NA',45,3,1,'0','NULL','',NULL,NULL,'NA'),(2213,1,'MATOMOKO','FREDRICK MUCHIRI KARANJA','','MATOMOKO/CB0621','na','na','NA','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','NA',26,4,1,'0','NULL','',NULL,NULL,'NA'),(2214,1,'KISETO','HARRY MANYONYI TSYAMBA','','KISETO/CB0512','na','na','455','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','KITALE',26,4,1,'30200','NULL','',NULL,NULL,'NA'),(2215,1,'NABANGALA','HELLEN NABANGALA','','NABANGALA/CB0628','na','na','1239','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','KITALE',26,4,1,'0','NULL','',NULL,NULL,'NA'),(2216,1,'WANJIMWA','WANJIMWA','','WANJIMWA/AB0719','na','na','218','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','KANJUKU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2217,1,'GICHEHA','FRANCIS CHEGE KIMANI','','GICHEHA/AA0456C','na','0728 123303','10','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2219,1,'MUITHIRANDU','STEPHEN MACHARIA','','MUITHIRANDU/AB0472','na','NA','124','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','KANJUKU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2220,1,'EMBWAGA','EMBWAGA','','EMBWAGA/CBZA0007','na','NA','NA','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','NA',26,4,1,'0','NULL','',NULL,NULL,'NA'),(2221,1,'KIHARI','KIHARI KITALE','','KIHARI/CB0630','na','NA','745','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','KITALE',26,4,1,'30200','NULL','',NULL,NULL,'NA'),(2222,1,'NDURUMA','NDURUMA KITALE','','NDURUMA/CB0588','na','NA','2488','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','KITALE',26,4,1,'0','NULL','',NULL,NULL,'NA'),(2223,1,'RUGURU','JULIUS KIMANI','','RUGURU/AB0698','na','NA','1894','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2224,1,'WAGIKUNGU','SOSPETER MURIMI','','WAGIKUNGU/AJ0362','na','NA','963','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','KIRINYAGA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2225,1,'WILELI','WILELI KITALE','','WILELI/CB0656','na','NA','NA','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','NA',26,4,1,'0','NULL','',NULL,NULL,'NA'),(2226,1,'BENWAYS','BENWAYS','','BENWAYS/CB0539','na','NA','NA','NULL','NULL','NULL','2016-03-04 00:00:00','1',0,'NULL','NA',26,4,1,'0','NULL','',NULL,NULL,'NA'),(2227,2,'ISUKHA IVUGWI FCS','ISUKHA IVUGWI F.C.SOC LTD','','ISUKHA IVUGWI FCS/XDB0017B','na','NA','81','NULL','NULL','NULL','2016-03-11 00:00:00','1',0,'NULL','ILEHO',37,6,1,'50111','2227','',NULL,NULL,'NA'),(2228,3,'ISUKHA IVUGWI','ISUKHA IVUGWI F.C.SOC LTD','','ISUKHA IVUGWI/XDB0017BF01','na','NA','81','NULL','NULL','NULL','2016-03-11 00:00:00','1',0,'NULL','ILEHO',37,6,1,'50111','2227','',NULL,NULL,'NA'),(2229,1,'N.J. KINYA','JOHN KINYAJUI','','N.J. KINYA/AA0794','na','722518661','NA','NULL','NULL','NULL','2016-03-11 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2230,2,'SICHEI FCS','SICHEI F.C.SOC LTD','','SICHEI FCS/XDA41','na','NA','338','NULL','NULL','NULL','2016-03-11 00:00:00','1',0,'NULL','CHWELE',39,6,1,'50202','2230','',NULL,NULL,'NA'),(2231,3,'SICHEI','SICHEI F.C.SOC LTD','','SICHEI/XDA41F01','na','NA','338','NULL','NULL','NULL','2016-03-11 00:00:00','1',0,'NULL','CHWELE',39,1,1,'50202','2230','',NULL,NULL,'NA'),(2232,2,'POIYWEK FCS','POIYWEK F.C.SOC LTD','','POIYWEK FCS/XCE19','na','NA','1290','NULL','NULL','NULL','2016-03-14 00:00:00','1',0,'NULL','KERICHO',35,4,1,'0','2232','',NULL,NULL,'NA'),(2233,3,'POIYWEK','POIYWEK F.C.SOC LTD','','POIYWEK/XCE19F01','na','NA','1290','NULL','NULL','NULL','2016-03-14 00:00:00','1',0,'NULL','KERICHO',35,4,1,'0','2232','',NULL,NULL,'NA'),(2234,1,'KABORA','KABORA ESTATE','','KABORA/CB0564','na','na','NA','NULL','NULL','NULL','2016-03-14 00:00:00','1',0,'NULL','NA',39,6,1,'0','NULL','',NULL,NULL,'NA'),(2235,1,'MUNJOKI','STANLEY KINYUA MUTURI','','MUNJOKI/AJ0404','na','722438556','NA','NULL','NULL','NULL','2016-03-14 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2236,1,'PACA','PACA ESTATE','','PACA/CB0654','na','na','NA','NULL','NULL','NULL','2016-03-14 00:00:00','1',0,'NULL','NA',39,6,1,'0','NULL','',NULL,NULL,'NA'),(2237,1,'WIKI','KIMEU','','WIKI/BF0193','na','na','1233','NULL','NULL','NULL','2016-03-14 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2238,1,'KAROMBO','BENSON MURIMI','','KAROMBO/AJ0362A','na','na','963','NULL','NULL','NULL','2016-03-14 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'10300','NULL','',NULL,NULL,'NA'),(2239,4,'MUKINDURI ESTATE','PETER KIMANI','','MUKINDURI/AA0195','pemkim3@yahoo.co.uk','na','45504','NULL','NULL','NULL','2016-03-16 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2240,1,'NJEMU','SIMON NYAGA NJERU','','NJEMU/AJ0430','na','NA','771','NULL','NULL','NULL','2016-03-16 00:00:00','1',0,'NULL','EMBU',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2241,1,'OSINDI','NJIHIA HOLDINGS LTD','','OSINDI/CA0131','na','NA','7121','NULL','NULL','NULL','2016-03-16 00:00:00','1',0,'NULL','NAKURU',32,1,1,'0','NULL','',NULL,NULL,'NA'),(2242,2,'KARIA FCS','KARIA F.C.SOC LTD','','KARIA FCS/XBB27','na','NA','509','NULL','NULL','NULL','2016-03-18 00:00:00','1',0,'NULL','CHOGORIA',49,5,1,'60401','2242','',NULL,NULL,'NA'),(2243,3,'KARIA MAIN','KARIA F.C.SOC LTD','','KARIA MAIN/XBB27F01','na','NA','509','NULL','NULL','NULL','2016-03-18 00:00:00','1',0,'NULL','CHOGORIA',49,5,1,'60401','2242','',NULL,NULL,'NA'),(2244,1,'MBAO','BEATRICE BILIKA LIRU','','MBAO/CB0494','na','na','NA','NULL','NULL','NULL','2016-03-21 00:00:00','1',0,'NULL','NA',35,6,1,'0','NULL','',NULL,NULL,'NA'),(2245,2,'CHENJENI FCS','CHENJENI F.C.SOC LTD','','CHENJENI FCS/XDA38','na','na','192','NULL','NULL','NULL','2016-03-21 00:00:00','1',0,'NULL','CHWELE',39,4,1,'50202','2245','',NULL,NULL,'NA'),(2246,3,'CHENJENI','CHENJENI F.C.SOC LTD','','CHENJENI/XDA38F01','na','na','192','NULL','NULL','NULL','2016-03-21 00:00:00','1',0,'NULL','CHWELE',39,4,1,'50202','2245','',NULL,NULL,'NA'),(2247,1,'MUREMI','MUREMI ESTATE','','MUREMI/AG0126','gabriel.gathitu@xrxtechnologies.co.ke','722518038','NA','NULL','NULL','NULL','2016-03-21 00:00:00','1',0,'NULL','NYERI',19,1,1,'10100','NULL','',NULL,NULL,'NA'),(2248,1,'CAPACITY BERRIES FARM','JOSEPH K. KAMU','','CAPACITY BERRIES FARM/CB0579','na','na','434','NULL','NULL','NULL','2016-03-21 00:00:00','1',0,'NULL','KITALE',35,4,1,'30200','NULL','',NULL,NULL,'NA'),(2250,1,'MUTERO','ALVANS MUTERO','','MUTERO/AJ0054','na','na','NA','NULL','NULL','NULL','2016-03-21 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2251,2,'SAOSET FCS','SAOSET F.C.SOC LTD','','SAOSET FCS/ZA32','na','NA','NA','NULL','NULL','NULL','2016-03-23 00:00:00','1',0,'NULL','NA',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2252,3,'SAOSET','SAOSET F.C.SOC LTD','','SAOSET/ZA32F01','na','NA','NA','NULL','NULL','NULL','2016-03-23 00:00:00','1',0,'NULL','NA',35,4,1,'0','2251','',NULL,NULL,'NA'),(2253,1,'MWAMOIGE','MWAMOIGE ESTATE','','MWAMOIGE/EB0026','na','NA','NA','NULL','NULL','NULL','2016-03-24 00:00:00','1',0,'NULL','NA',45,3,1,'0','NULL','',NULL,NULL,'NA'),(2254,1,'KAPTEBESWET','KAPTEBESWET ESTATE','','KAPTEBESWET/C10024','na','NA','NA','NULL','NULL','NULL','2016-03-24 00:00:00','1',0,'NULL','NA',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2255,1,'WANJOGU','JOSEPH KARANJA WANGETHA','','WANJOGU/AI0047B','na','0722 947720','472','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2256,1,'KAMOTHO','KAMOTHO ESTATE','','KAMOTHO/AA0219','na','na','NA','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2257,1,'MUNYAMBU','BETH WANJIRU GITAU','','MUNYAMBU/AA0320E','na','na','1756','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2258,1,'MIIA','DAVID KAHOYA','','MIIA/AB0201','na','na','1825','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2259,1,'FRAM','FRANCIS MUIGAI','','FRAM/AA0266B','na','na','179','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2260,1,'KIMATA','BENJAMIN MWANGI NJOROGE','','KIMATA/AB0177','na','na','1897','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2261,1,'BERRY FIELD','DANCAN KARIUKI','','BERRY FIELD/AA0506B','na','0722 862087','1070','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'MA'),(2262,1,'NGUNJIRI','STEPHEN MUCHIRI','','NGUNJIRI/AB0119B','na','0722 959446','1154','NULL','NULL','NULL','2016-03-29 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2263,1,'NYAPAO','NYAPAO ESTATE','','NYAPAO/EB0037','na','NA','NA','NULL','NULL','NULL','2016-04-04 00:00:00','1',0,'NULL','NA',45,3,1,'0','NULL','',NULL,NULL,'NA'),(2264,1,'MUHIKA COFFEE & DAIRY','DAVID MUHIKA MUTAHI','','MUHIKA COFFEE & DAIRY/AG0305','dmmutahi@yahoo.com','722901814','232','NULL','NULL','NULL','2016-04-11 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'10103','NULL','',NULL,NULL,'NA'),(2265,2,'KAPSARA FCS','KAPSARA F.C.SOC LTD','','KAPSARA FCS/XCI26','na','na','NA','NULL','NULL','NULL','2016-04-14 00:00:00','1',0,'NULL','NA',26,6,1,'0','2265','',NULL,NULL,'NA'),(2266,3,'KAPSARA','KAPSARA F.C.SOC LTD','','KAPSARA/XCI26F01','na','na','NA','NULL','NULL','NULL','2016-04-14 00:00:00','1',0,'NULL','NA',26,6,1,'0','2265','',NULL,NULL,'NA'),(2267,2,'BALIMI FCS','BALIMI F.C.SOC LTD','','BALIMI FCS/CBZA07','na','na','NA','NULL','NULL','NULL','2016-04-14 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2268,3,'BALIMI','BALIMI F.C.SOC LTD','','BALIMI/CBZA07F01','na','na','NA','NULL','NULL','NULL','2016-04-14 00:00:00','1',0,'NULL','NA',26,6,1,'0','2267','',NULL,NULL,'NA'),(2269,1,'KAMBI','PATRICK KAMAU NGANGA','','KAMBI/AA0279A','na','na','1771','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2270,1,'STEMUH','STEPHEN MUIRURI WAMBUI','','STEMUH/AB0117E','na','na','49','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2271,2,'CHERIBO FCS','CHERIBO F.C.SOC LTD','','CHERIBO FCS/XCE00','na','NA','NA','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','NA',35,4,1,'0','2271','',NULL,NULL,'NA'),(2272,3,'CHERIBO','CHERIBO F.C.SOC LTD','','CHERIBO/XCE00F01','na','NA','NA','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','NA',35,4,1,'0','2271','',NULL,NULL,'NA'),(2273,1,'KERICHO COUNTY','KERICHO COUNTY','','KERICHO COUNTY/CI0027','na','NA','NA','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','NA',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2275,1,'MULWET','MULWET ESTATE','','MULWET/CBZA0032','na','NA','NA','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','NA',35,4,1,'0','NULL','',NULL,NULL,'NA'),(2276,1,'WAITARA','MOSES KIRABA','','WAITARA/AA0470C','na','NA','1430','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2277,1,'MULINGA LTD','JOHN ETEMESI','','MULINGA LTD/CB0430','na','NA','25','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','KITALE',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2279,1,'IRENGE','FRANCIS PETER IRENGE','','IRENGE/AB0496','na','713961143','1322','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2282,1,'SEKITE','GEORGE RUTO','','SEKITE/CB0445','na','NA','NA','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2283,1,'MWENJO','VINCENT MWENDA','','MWENJO/AB0424','na','NA','77','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','GITUAMBA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2284,1,'KIEV','EVANS KITUYI','','KIEV/CDZA0007','na','NA','NA','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2285,1,'KIREKA','FAITH WAITHIRA','','KIREKA/CB0428','na','NA','NA','NULL','NULL','NULL','2016-04-18 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2286,1,'MWENYU','SIMON NDURA GITAU','','MWENYU/AA0620A','na','na','53','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','KAGWE',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2287,1,'MUIRI-INI','HUMPREY NJOROGE MUITA','','MUIRI-INI/AA0226H','na','na','151','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2288,1,'RUSI','GRACE WANGARI NJOKA','','RUSI/AA0033','na','722603539','85791','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','KAMITI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2289,1,'LAKINDA','LAWRENCE KINYUNGU','','LAKINDA/AB0450A','na','727900319','1770','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2291,1,'MUKUMBU','WANGUI GATHURI','','MUKUMBU/AA0334A','na','na','749','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2292,1,'MAKARA','CHARLES KAMAU','','MAKARA/ZA0009','na','na','47','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','SOLAI',32,4,1,'20128','NULL','',NULL,NULL,'NA'),(2293,1,'NJERI','NJERI ESTATE','','NJERI/ZA0009A','na','na','NA','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','NA',32,4,1,'0','NULL','',NULL,NULL,'NA'),(2294,1,'BENGUN','BEN NJENGA WAINAINA','','BENGUN/CA0219','na','na','2053','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','SOLAI',32,4,1,'0','NULL','',NULL,NULL,'NA'),(2295,1,'JUWAN','JULIUS WAINAINA NJOROGE','','JUWAN/CA0248','na','na','37','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','SOLAI',32,4,1,'0','NULL','',NULL,NULL,'NA'),(2296,1,'GAKIAMA','DAVID MWAURA NDURUHU','','GAKIAMA/AB0475','na','na','6','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2297,1,'JAGAKIM','JAMES GACHUNJI KIMANI','','JAGAKIM/AA0856','na','na','352','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2298,1,'MAYFLO','MARY WAMBUI GACHEHA','','MAYFLO/AA0333F','na','722835355','1757','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2299,1,'AMUKUKU','AMUKUKU ESTATE','','AMUKUKU/AA0302A','na','na','32','NULL','NULL','NULL','2016-04-20 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2300,1,'KIMATHA','JOSEPH KIMANI','','KIMATHA/AA0716','na','726370042','58','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','KANJUKU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2301,1,'NGAMBA','NGAMBA ESTATE','','NGAMBA/AJ0218','na','722391638','NA','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2302,2,'KAMBIRI FCS','KAMBIRI C.G.SOC','','KAMBIRI FCS/XDB17','na','722345355','43','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','KAMBIRI',35,6,1,'0','2302','',NULL,NULL,'NA'),(2303,3,'KAMBIRI','KAMBIRI C.G.SOC','','KAMBIRI/XDB17F02','na','722345355','43','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','KAMBIRI',35,6,1,'0','2302','',NULL,NULL,'NA'),(2304,1,'GATHURAKU','ROBERT MACHARIA','','GATHURAKU/AB0240','na','na','NA','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2305,1,'GICHUGI','RICHARD WAITHAKA','','GICHUGI/AG0117','na','na','NA','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','NA',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2306,1,'WAKABURA','MARY WAMBUI','','WAKABURA/AA0333','na','na','1757','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2307,1,'RANJO','RACHEAL WANJIKU NJOROGE','','RANJO/AA0825','na','724622916','52','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2308,1,'MUGO','SAMUEL KAMANDE MUGO','','MUGO/AA0254','na','725941334','162','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2309,1,'SAKIWA','SAMUEL KIARIE NGATA','','SAKIWA/AA0402A','na','na','90','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2310,1,'NDUTA','FRANCIS KARIUKI NJIHIA','','NDUTA/AA0429','na','721939816','24','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2311,1,'EVAN','EVANS KIBUU NG\'ANG\'A','','EVAN/AA0426B','na','na','1414','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2312,1,'MANASE','MANASE COFFEE','','MANASE/CB0640','na','na','NA','NULL','NULL','NULL','2016-04-21 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2313,1,'COFEWAYS','COFEWAYS ESTATE','','COFEWAYS/AJ0075','jnmwendia@yahoo.com','na','NA','NULL','NULL','NULL','2016-05-05 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2314,1,'GREEN FARM ESTATE','GREEN FARM ESTATE','','GREEN FARM/AB0521','na','722590481','60753','NULL','NULL','NULL','2016-05-05 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2315,1,'MWAI','MWAI FARM','','MWAI/AA0363','na','na','179','NULL','NULL','NULL','2016-05-05 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2316,1,'GAITHANWA','GAITHANWA ESTATE','','GAITHANWA/AB0161','na','na','22','NULL','NULL','NULL','2016-05-05 00:00:00','1',0,'NULL','NGEWA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2318,1,'GATHERU','MBUGUA MWATHA SIMON','','GATHERU/AA0522','na','722748987','398','NULL','NULL','NULL','2016-05-05 00:00:00','1',0,'NULL','GITHUNGURI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2320,1,'NYANZU','SIMON NJOROGE NGUGI','','NYANZU/CA0255','na','na','67','NULL','NULL','NULL','2016-05-05 00:00:00','1',0,'NULL','NAKURU',32,6,1,'20128','NULL','',NULL,NULL,'NA'),(2321,1,'MUITO','SAMUEL MAINA GICHOHI','','MUITO/AB0119C','na','722974142','360','NULL','NULL','NULL','2016-05-05 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2323,1,'BOMETT','BOMETT ESTATE','','BOMETT/ZA0009D','bbomett@yahoo.com','718391722','573','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NAKURU',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2326,1,'KAHIGA-INI','KAHIGA-INI ESTATE','','KAHIGA-INI/AA0333B','na','716878407','1757','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2327,1,'KIANJAGA','JOHN KINYANJUI NJAGA','','KIANJAGA/AB0315','na','NA','621','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2328,1,'MATHINGIRA','MATHINGIRA ESTATE','','MATHINGIRA/CB0473','na','NA','3818','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','KITALE',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2329,1,'NJETURI','NJETURI ESTATE','','NJETURI/AB0669','na','721756407','1415','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2330,1,'NGUNYI','NGUNYI ESTATE','','NGUNYI/CB0597','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2331,1,'ITOTIA','ITOTIA ESTATE','','ITOTIA/AB0081B','na','NA','189','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2332,1,'GUANTAI','HARON GUANTAI JOSEPH','','GUANTAI/BB0097','na','721805128','45','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','KANYAKINE',49,1,1,'0','NULL','',NULL,NULL,'NA'),(2333,1,'MUTUGUA','MUTUGUA ESTATE','','MUTUGUA/CA0215','na','727011795','32047','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NAIROBI',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2334,1,'KAGA','KAGA ESTATE','','KAGA/AB0601','na','724864966','1485','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2335,1,'GATHUTHU','GATHUTHU ESTATE','','GATHUTHU/AB0539','na','722320250','54','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2336,1,'MALEMO','MALEMO COFFEE','','MALEMO/CBZA007','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2337,1,'WILKAN','WILKAN COFFEE','','WILKAN/CBZA007B','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2338,1,'SACA','SACA COFFEE','','SACA/CBZA007C','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2339,1,'KIMOSO','KIMOSO COFFEE','','KIMOSO/CBZA007D','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2340,1,'JEWAKI','JEWAKI COFFEE','','JEWAKI/CB0658','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2341,1,'TIMOTHY','TIMOTHY COFFEE','','TIMOTHY/CBZA007E','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2342,1,'DOMIWA','DOMIWA FARM','','DOMIWA/AB0360','na','722978034','2','NULL','NULL','NULL','2016-05-11 00:00:00','2',0,'NULL','GITUAMBA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2343,1,'UVALINI','UVALINI COFFEE','','UVALINI/BF0233','na','NA','1107','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2345,1,'PAVE','PAVE COFFEE','','PAVE/CBZA0007B','na','NA','NA','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2346,1,'SIMBA MTOTO','SIMBA MTOTO COFFEE','','SIMBA MTOTO/CB0542','na','NA','1917','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','KITALE',26,6,1,'30200','NULL','',NULL,NULL,'NA'),(2347,1,'STOVER','STOVER COFFEE','','STOVER/CBZA007F','na','NA','90','NULL','NULL','NULL','2016-05-11 00:00:00','1',0,'NULL','KIMININI',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2348,1,'MUKIRA','RICHARD WAITHAKA MUKIRA','','MUKIRA/AG0243','wamukira@yahoo.com','na','35','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','OTHAYA',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2349,1,'SULULU','RICHARD SULULU MUTUKA','','SULULU','na','na','98','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','KITALE',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2350,1,'GITHINJI','GITHINJI FARM','','GITHINJI/ZA0009B','na','736470527','64','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','NAKURU',32,4,1,'0','NULL','',NULL,NULL,'NA'),(2351,1,'KIMORORI','KIMORORI FARM','','KIMORORI/AA0550','na','721665181','581','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','VILLAGE MARKET',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2352,1,'PHILWA','PHILWA FARM','','PHILWA/CBZA0007C','na','na','NA','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2353,1,'KAM','KAM FARM','','KAM/AB0272','na','729324425','15','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','KANDARA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2354,1,'KINDI','KINDI FARM','','KINDI/AA0361','na','714946298','244','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2355,1,'KAMUKO','KARU NGIGE KAMAU','','KAMUKO/CB0461','na','na','1455','NULL','NULL','NULL','2016-05-16 00:00:00','1',0,'NULL','KITALE',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2356,1,'KUHIUHA','KUHIUHA ESTATE','','KUHIUHA/AB0693','na','727765973','490','NULL','NULL','NULL','2016-06-06 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2357,1,'MUNYANDU','MUNYANDU FARM','','MUNYANDU/AB0103','na','716855584','149','NULL','NULL','NULL','2016-06-14 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2358,1,'MERCY','MERCY FARM','','MERCY/AA0877','na','733616296','130','NULL','NULL','NULL','2016-06-14 00:00:00','1',0,'NULL','NGEWA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2359,1,'MUGUTHA','MUGUTHA FARM','','MUGUTHA/AA0359C','na','733415768','100','NULL','NULL','NULL','2016-06-14 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2360,1,'NAMWA','JOSEPH KASSAM MWANIKI','','NAMWA/AJ0404','na','0792 865392','64','NULL','NULL','NULL','2016-07-29 00:00:00','1',0,'NULL','KERUGOYA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2361,1,'SABOIGO','SABOIGO FARM','','SABOIGO/EB0034','na','NA','NA','NULL','NULL','NULL','2016-08-03 00:00:00','1',0,'NULL','KISII',45,3,1,'0','NULL','',NULL,NULL,'NA'),(2362,1,'CHANGAI','DAKAGI HOLDING LTD','','CHANGAI/AE0003','na','na','52251','NULL','NULL','NULL','2016-08-10 00:00:00','1',0,'NULL','NAIROBI',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2363,2,'TENDELYANI FCS','TENDELYANI F.C.SOC LTD','','TENDELYANI FCS/XBE26','na','NA','113','NULL','NULL','NULL','2016-08-10 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'90100','2363','',NULL,NULL,'NA'),(2364,3,'TENDELYANI','TENDELYANI F.C.SOC LTD','','TENDELYANI/XBE26F01','na','NA','113','NULL','NULL','NULL','2016-08-10 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'90100','2363','',NULL,NULL,'NA'),(2365,1,'JUHUDI','JUHUDI FARM','','JUHUDI/BF0080A','na','na','66267','NULL','NULL','NULL','2016-08-11 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2366,1,'TIMUA','BENSON NZIOKA MUTHIAN','','TIMUA/BF0244','rensonmuthiani@gmail.com','725910003','1152','NULL','NULL','NULL','2016-08-11 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2367,1,'WOODVALE','BONIFACE MWANGANGI','','WOODVALE/BF0257','na','na','247','NULL','NULL','NULL','2016-08-15 00:00:00','1',0,'NULL','KIKIMA',48,5,1,'90125','NULL','',NULL,NULL,'NA'),(2368,1,'KUMA','KUMA FARM','','KUMA/AB0579','na','0723 665657','9','NULL','NULL','NULL','2016-08-22 00:00:00','1',0,'NULL','KANJUKU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2369,1,'MUUMONI','MUUMONI FARM','','MUUMONI/BF0059','na','na','NA','NULL','NULL','NULL','2016-08-22 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2370,1,'JAMII','WILSON MACHARIA','','JAMII/AJ0081','na','0722 313963','938','NULL','NULL','NULL','2016-08-22 00:00:00','1',0,'NULL','EMBU',20,5,1,'0','NULL','',NULL,NULL,'NA'),(2371,2,'RUGI FCS','RUGI F.C.SOC LTD','','RUGI FCS/XAC57','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2372,3,'MIHUTI','RUGI F.C.SOC LTD','','MIHUTI/XAC57F01','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2373,3,'IGUTUA','RUGI F.C.SOC LTD','','IGUTUA/XAC57F02','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2374,3,'GIATHUGU','RUGI F.C.SOC LTD','','GIATHUGU/XAC57F03','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2375,3,'MWERU','RUGI F.C.SOC LTD','','MWERU/XAC57F04','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2376,3,'KANYIRIRI','RUGI F.C.SOC LTD','','KANYIRIRI/XAC57F05','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2377,3,'GUMBA','RUGI F.C.SOC LTD','','GUMBA/XAC57F06','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWEI-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2378,3,'MUTITU','RUGI F.C.SOC LTD','','MUTITU/XAC57F07','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2379,3,'KARUNDU','RUGI F.C.SOC LTD','','KARUNDU/XAC57F08','na','NA','152','NULL','NULL','NULL','2016-08-24 00:00:00','1',0,'NULL','MUKURWE-INI',19,1,1,'0','2371','',NULL,NULL,'NA'),(2380,1,'BAHATI BLUE','ALKIVIADIS CHARITATORS','','BAHATI BLUE/CA0210','alkis@bahatiblue.com','na','233','NULL','NULL','NULL','2016-08-29 00:00:00','1',0,'NULL','NAKURU',32,1,1,'0','NULL','',NULL,NULL,'NA'),(2381,1,'EXAVIR','JANE MUSEMBI MUA','','EXAVIR/BF0188','na','na','199','NULL','NULL','NULL','2016-09-13 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2382,2,'KIFCO FCS','KIFCO F.C.SOC LTD','','KIFCO FCS/CA0009','na','na','7253','NULL','NULL','NULL','2016-09-19 00:00:00','1',0,'NULL','NAKURU',32,4,1,'0','NULL','',NULL,NULL,'NA'),(2383,3,'KIREMBA KIFCO','KIFCO F.C.SOC LTD','','KIREMBA KIFCO/CA0009F01','na','na','7253','NULL','NULL','NULL','2016-09-19 00:00:00','1',0,'NULL','NAKURU',32,4,1,'0','2382','',NULL,NULL,'NA'),(2384,1,'IIANI','JOHN KILOLO MANGELI','','IIANI/BF0197','na','NA','18510','NULL','NULL','NULL','2016-09-22 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2385,2,'NYAMACHE FCS','NYAMACHE F.C.SOC LTD','','NYAMACHE FCS/XEA24','na','NA','35','NULL','NULL','NULL','2016-10-05 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2385','',NULL,NULL,'NA'),(2386,3,'NYAMACHE','NYAMACHE F.C.SOC LTD','','NYAMACHE/XEA24F01','na','NA','35','NULL','NULL','NULL','2016-10-05 00:00:00','1',0,'NULL','KISII',45,3,1,'0','2385','',NULL,NULL,'NA'),(2387,1,'KIMUA','PAUL MUTHOKA KUMBU','','KIMUA/BF0222','na','na','1325','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2389,1,'MWINZI','JOSEPH MWINZI MASIKA','','MWINZI/BF0231','na','na','1074','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2391,1,'NGUTALICE','JOSEPH KIIO NGUTA','','NGUTALICE/BF0103','na','na','1570','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2392,1,'MASEWANI','PAUL MUTINDA MUNYAO','','MASEWANI/BF0102','na','na','1070','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2394,1,'KITHANGAI','JOHN NZOMO KIOKO','','KITHANGAI/BF0152A','na','na','1012','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2395,1,'NGUI','NGUI NTHEI','','NGUI/BF0122','na','na','1022','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2396,1,'KIKAATINI','JOHN WAMBUA MUSYIMI','','KIKAATINI/BF0055','na','na','230','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2397,1,'KYANDA','STEPHEN MUTUKU MUTUNGA','','KYANDA/BF0171','na','na','1030','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2398,1,'DAMARIS','DAMARIS MBAIKA MUTISYA','','DAMARIS/BF0183A','na','na','1030','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2399,1,'MBAIROSE','STEPHEN MBAI MWALILI','','MBAIROSE/BF0263','na','na','483','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2400,1,'KITHOI','DAVID NTHENGE MBWIKA','','KITHOI/BF0248','na','na','1030','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2401,1,'MBILI','JOHN MWAKA KYALO','','MBILI/BF0184','na','na','1030','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2402,1,'REGINAH','REGINA MUNYIVA MUTUA','','REGINAH/BF0099D','na','na','1070','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','MUISUNI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2403,1,'KIVUTINI','JOSEPH MUTISYA NENE','','KIVUTINI/BF0183','na','na','1030','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2404,1,'WANDII','JONATHAN NZUKI MAKAU','','WANDII/BF0203','na','na','699','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2405,1,'TIMONAH','RAPHAEL N KILONZO','','TIMONAH/BF0260','na','na','1155','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2406,1,'MAKAU','MAKAU MUTANIA','','MAKAU/BF0099C','na','na','1070','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2407,1,'MENYU','NICHOLAS MUNYAO MUTUKU','','MENYU/BF0077','na','na','266','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2408,1,'PRETORIA','JUSTUS KAVITA MUTUKU','','PRETORIA/BF0108B','na','na','1027','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2410,1,'JUSTINE','JUSTINE MUTINDA MUTANIA','','JUSTINE/BF0099B','na','na','1070','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2411,1,'KITOSYO','ANDREW KITOSYO','','KITOSYO/BF0219','na','na','1010','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2412,1,'KITHANZE','MUTANIA MUETI','','KITHANZE/BF0099','na','na','1380','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2413,1,'MUNYIVA','MUNYIVA REUBEN','','MUNYIVA/BF0191','91','na','1113','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'90115','NULL','',NULL,NULL,'NA'),(2414,1,'KITHUMUONI','JOHN MUSAU KIMATU','','KITHUMUONI/BF0230','na','na','NA','NULL','NULL','NULL','2016-10-10 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2415,1,'KIONAMA','JOSEPH GITHITHU MBURU','','KIONAMA/AB0107','na','na','NA','NULL','NULL','NULL','2016-10-14 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2416,2,'KAMIWA FCS','KAMIWA F.C.SOC LTD','','KAMIWA FCS','NULL','0','8','NULL','NULL','NULL','2016-10-21 00:00:00','1',0,'NULL','FORT TENAN',29,4,1,'NULL','2416','',NULL,NULL,'NULL'),(2417,3,'KOKWET','KAMIWA F.C.SOC LTD','','KOKWET/XCE02F01','NULL','0','8','NULL','NULL','NULL','2016-10-21 00:00:00','1',0,'NULL','FORT TENAN',29,4,1,'NULL','2416','',NULL,NULL,'NULL'),(2418,3,'BURUTU','KAMIWA F.C.SOC LTD','','BURUTU/XCE02F02','NULL','0','8','NULL','NULL','NULL','2016-10-21 00:00:00','1',0,'NULL','FORT TENAN',29,4,1,'NULL','2416','',NULL,NULL,'NULL'),(2419,3,'TEGAT','KAMIWA F.C.SOC LTD','','TEGAT/XCE02F03','NULL','0','8','NULL','NULL','NULL','2016-10-21 00:00:00','1',0,'NULL','FORT TENAN',29,4,1,'NULL','2416','',NULL,NULL,'NULL'),(2420,2,'KITHANGATHINI FCS','KITHANGATHINI F.C.SOC LTD','','KITHANGATHINI FCS/XBE02','na','na','44','NULL','NULL','NULL','2016-10-25 00:00:00','1',0,'NULL','NUNGUNI',48,5,1,'0','2420','',NULL,NULL,'NA'),(2421,3,'KITHANGATHINI','KITHANGATHINI F.C.SOC LTD','','KITHANGATHINI/XBE02F01','na','na','44','NULL','NULL','NULL','2016-10-25 00:00:00','1',0,'NULL','NUNGUNI',48,5,1,'0','2420','',NULL,NULL,'NA'),(2422,3,'NDIANI','KITHANGATHINI F.C.SOC LTD','','NDIANI/XBE02F05','na','na','44','NULL','NULL','NULL','2016-10-25 00:00:00','1',0,'NULL','NUNGUNI',48,5,1,'0','2420','',NULL,NULL,'NA'),(2423,2,'ITHAENI FCS','ITHAENI F.C.SOC LTD','','ITHAENI FCS/XBE29','na','na','2114','NULL','NULL','NULL','2016-10-25 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'NULL','2423','',NULL,NULL,'NA'),(2424,3,'ITHAENI','ITHAENI F.C.SOC LTD','','ITHAENI/XBE29F01','na','na','2114','NULL','NULL','NULL','2016-10-25 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','2423','',NULL,NULL,'NA'),(2425,3,'KWA-LONGO','KITHANGATHINI F.C.SOC LTD','','KWA-LONGO/XBE02F02','na','na','44','NULL','NULL','NULL','2016-10-25 00:00:00','1',0,'NULL','NUNGUNI',48,5,1,'0','2420','',NULL,NULL,'NA'),(2426,2,'KAMACHARIA FCS','KAMACHARIA F.C.SOC LTD','','KAMACHARIA FCS/XAB36','info.kamacharia@gmail.com','0718 820544','267','NULL','NULL','NULL','2016-11-08 00:00:00','1',0,'NULL','KIRIA-INI',21,1,1,'10204','2426','',NULL,NULL,'NA'),(2427,3,'KAGUMOINI-KAMACHARIA','KAMACHARIA F.C.SOC LTD','','KAGUMOINI-KAMACHARIA/XAB36F01','info.kamacharia@gmail.com','0718 8210544','267','NULL','NULL','NULL','2016-11-08 00:00:00','1',0,'NULL','KIRIA-INI',21,1,1,'10204','2426','',NULL,NULL,'NA'),(2428,3,'RIAKIBERU','KAMACHARIA F.C.SOC LTD','','RIAKIBERU/XAB36F02','info.kamacharia@gmail.com','0718 820544','267','NULL','NULL','NULL','2016-11-08 00:00:00','1',0,'NULL','KIRIA-INI',21,1,1,'10204','2426','',NULL,NULL,'NA'),(2429,3,'WAHUNDURA','KAMACHARIA F.C.SOC LTD','','WAHUNDURA/XAB36F03','info.kamacharia@gmail.com','0718 820544','267','NULL','NULL','NULL','2016-11-08 00:00:00','1',0,'NULL','KIRIA-INI',21,1,1,'10204','2426','',NULL,NULL,'NA'),(2430,3,'KARUGIRO','KAMACHARIA F.C.SOC LTD','','KARUGIRO/XAB36F04','info.kamacharia@gmail.com','0718 820544','267','NULL','NULL','NULL','2016-11-08 00:00:00','1',0,'NULL','KIRIA-INI',21,1,1,'10204','2426','',NULL,NULL,'NA'),(2431,1,'KAMATUTA','LYDIA MWIKALI SHADRACK','','KAMATUTA/BF0131','na','NA','1033','NULL','NULL','NULL','2016-11-09 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2432,1,'KIVAI','GEOFFREY M WAMBUA','','KIVAI/BF0131A','na','NA','1033','NULL','NULL','NULL','2016-11-09 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2433,1,'RANZO','RAPHAEL MWEU NZOMO','','RANZO/BF0211','na','NA','1070','NULL','NULL','NULL','2016-11-09 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2434,1,'KASOI','MARTIN KISOI MUSEMBI','','KASOI/BF0232','na','NA','1070','NULL','NULL','NULL','2016-11-09 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2435,1,'THUNGU','THUNGU FARM','','THUNGU/AB0717','na','721176671','41','NULL','NULL','NULL','2016-11-17 00:00:00','1',0,'NULL','MURANGA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2436,1,'CHARTER','CHARTER FARM','','CHARTER/AC0100','na','0722 220001','1','NULL','NULL','NULL','2016-11-17 00:00:00','1',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2438,2,'GESONSO FCS','GESONSO F.C.SOC LTD','','GESONSO FCS/XEA37','na','NA','NA','NULL','NULL','NULL','2016-11-17 00:00:00','1',0,'NULL','NA',45,3,1,'0','2438','',NULL,NULL,'NA'),(2439,3,'GESONSO','GESONSO F.C.SOC LTD','','GESONSO/XEA37F01','na','NA','NA','NULL','NULL','NULL','2016-11-17 00:00:00','1',0,'NULL','NA',45,3,1,'0','2438','',NULL,NULL,'NA'),(2440,1,'THITHI FARM','THITHI FARM','','THITHI FARM/AB0516','na','0722 830234','1351','NULL','NULL','NULL','2016-11-25 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2441,2,'SOMBO FCS','SOMBO F.C.SOC LTD','','SOMBO FCS/XCE17','na','na','45','NULL','NULL','NULL','2016-11-28 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'20209','2441','',NULL,NULL,'NA'),(2442,3,'SOMBO','SOMBO F.C.SOC LTD','','SOMBO/XCE17F01','na','na','45','NULL','NULL','NULL','2016-11-28 00:00:00','1',0,'NULL','FORT TERNAN',35,4,1,'20209','2441','',NULL,NULL,'NA'),(2443,4,'RIARA','RIARA ESTATE','','RIARA/AA0063','na','na','149','NULL','NULL','NULL','2016-12-05 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2444,1,'KAPKENER FCS','KAPKENER F.C.SOC LTD','','KAPKENER FCS/XCE0060A','na','na','NA','NULL','NULL','NULL','2017-01-11 00:00:00','1',0,'NULL','NA',45,3,1,'0','2444','',NULL,NULL,'NA'),(2445,2,'KAPTAGAS FCS','KAPTAGAS F.C.SOC LTD','','XCE0060/KAPTAGAS','na','na','NA','NULL','NULL','NULL','2017-01-11 00:00:00','1',0,'NULL','NA',45,3,1,'0','2445','',NULL,NULL,'NA'),(2446,1,'BRANS','BRANS FARM','','EB0021/BRANS','na','NA','NA','NULL','NULL','NULL','2017-01-12 00:00:00','1',0,'NULL','NA',45,3,1,'0','NULL','',NULL,NULL,'NA'),(2447,3,'TULWAPMOI','KAMIWA F.C.SOC LTD','','TULWAPMOI/XCE02F04','na','NA','8','NULL','NULL','NULL','2017-01-12 00:00:00','1',0,'NULL','FORT TERNAN',29,4,1,'0','2416','',NULL,NULL,'NA'),(2449,1,'LUCY ABONGO','LUCY RUGURU ABONGO','','LUCY ABONGO/ZA0032A','na','na','NA','NULL','NULL','NULL','2017-01-20 00:00:00','1',0,'NULL','NA',32,1,1,'0','NULL','',NULL,NULL,'NA'),(2450,2,'LEBEKWEN FCS','LEBEKWEN F.C.SOC LTD','','LEBEKWEN FCS/XCE065','na','NA','NA','NULL','NULL','NULL','2017-01-20 00:00:00','1',0,'NULL','NA',29,4,1,'0','2450','',NULL,NULL,'NA'),(2451,3,'LEBEKWEN','LEBEKWEN F.C.SOC LTD','','LEBEKWEN/XCE65F01','na','NA','NA','NULL','NULL','NULL','2017-01-20 00:00:00','1',0,'NULL','NA',29,4,1,'0','2450','',NULL,NULL,'NA'),(2452,1,'KAVALYA','RONALD NGALA MWANIA','','KAVALYA/BF0261','na','NA','1022','NULL','NULL','NULL','2017-01-27 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2453,1,'NANGUNDA','NANGUNDA FARM','','NANGUNDA/CBZA007G','na','720060781','NA','NULL','NULL','NULL','2017-01-30 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2454,1,'NAKHANG\'OMA','NAKHANG\'OMA FARM','','NAKHANG\'OMA/CB0596','na','712734839','40','NULL','NULL','NULL','2017-01-30 00:00:00','1',0,'NULL','KIMININI',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2455,1,'MUDETE','MUDETE FARM','','MUDETE/CBZA0007H','na','na','NA','NULL','NULL','NULL','2017-01-30 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2456,1,'JAMUK','JAMUK FARM','','JAMUK/CBZA0007I','na','na','NA','NULL','NULL','NULL','2017-01-30 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2457,1,'PHIMWA','PHIMWA FARM','','PHIMWA/CBZA0007J','na','723769793','NA','NULL','NULL','NULL','2017-01-30 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2458,1,'CHEPTENGET','CHEPTENGET FARM','','CHEPTENGET/CB0616','na','na','NA','NULL','NULL','NULL','2017-01-30 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2459,6,'GITATA','MBUMI COFFEE MILLS','','GITATA','na','na','NA','NULL','NULL','NULL','2017-02-02 00:00:00','1',0,'NULL','NA',29,6,1,'0','NULL','',NULL,NULL,'NA'),(2460,2,'CRI','Coffee Research Institute','','CRI/CRI','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',1,'NULL','NULL',0,0,1,'NULL','2460','',NULL,NULL,'NULL'),(2461,1,'ITHARE-INI','ITHARE-INI FARM','','ITHARE-INI/AA0334C','na','0723 301420','749','NULL','NULL','NULL','2017-02-06 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2462,1,'MIMA','MIMA FARM','','MIMA/AB0696','na','NA','NA','NULL','NULL','NULL','2017-02-08 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2463,1,'NJOGA INVESTMENT','NJOGA INVESTMENT LTD','','NJOGA INVESTMENT /AJ0002','na','NA','NA','NULL','NULL','NULL','2017-02-08 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2464,1,'IYADI','IYADI COFFEE','','IYADI','na','na','NA','NULL','NULL','NULL','2017-02-09 00:00:00','1',0,'NULL','NA',37,6,1,'0','NULL','',NULL,NULL,'NA'),(2465,1,'JAKA','JAKA COFFEE','','JAKA/CBZA007H','na','na','NA','NULL','NULL','NULL','2017-02-09 00:00:00','1',0,'NULL','NA',29,4,1,'0','NULL','',NULL,NULL,'NA'),(2466,1,'JOSENG','JOSENG FARM','','JOSENG/AB0007','na','na','NA','NULL','NULL','NULL','2017-02-09 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2468,1,'KIAMBIRIRIA','KIAMBIRIRIA FARM','','KIAMBIRIRIA/CB0508','na','721357416','745','NULL','NULL','NULL','2017-02-09 00:00:00','1',0,'NULL','KITALE',29,6,1,'30200','NULL','',NULL,NULL,'NA'),(2469,1,'KAMUSINGA','KAMUSINGA ESTATE','','KAMUSINGA/DB0072','na','0724 326321','469','NULL','NULL','NULL','2017-02-13 00:00:00','1',0,'NULL','KIMILILI',29,6,1,'0','NULL','',NULL,NULL,'NA'),(2470,1,'WAGIKA','WAGIKA FARM','','WAGIKA/CA0263','na','704034928','401','NULL','NULL','NULL','2017-02-24 00:00:00','1',0,'NULL','KISII',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2471,2,'KOCHOLWO FCS','KOCHOLWO F.C.SOC LTD','','KOCHOLWO FCS/XCD05','na','na','NA','NULL','NULL','NULL','2017-02-27 00:00:00','1',0,'NULL','NA',29,6,1,'0','2471','',NULL,NULL,'NA'),(2472,3,'KOCHOLWO','KOCHOLWO F.C.SOC LTD','','KOCHOLWO/XCD05F01','na','na','NA','NULL','NULL','NULL','2017-02-27 00:00:00','1',0,'NULL','NA',29,6,1,'0','2471','',NULL,NULL,'NA'),(2473,1,'PETAN','PETAN COFFEE','','PETAN/CBZA007I','na','710381301','NA','NULL','NULL','NULL','2017-03-02 00:00:00','1',0,'NULL','NA',30,6,1,'0','NULL','',NULL,NULL,'NA'),(2474,1,'NABABA','NABABA FARM','','NABABA/CB0544','na','NA','NA','NULL','NULL','NULL','2017-03-02 00:00:00','1',0,'NULL','NA',29,6,1,'0','NULL','',NULL,NULL,'NA'),(2475,1,'NGACHI','NGACHI FARM','','NGACHI/CBZA007J','na','722293038','NA','NULL','NULL','NULL','2017-03-02 00:00:00','1',0,'NULL','NA',35,6,1,'0','NULL','',NULL,NULL,'NA'),(2476,1,'KAMUGIRI','NG\'ANG\'A GITHEI','','KAMUGIRI/AA0426','na','na','1414','NULL','NULL','NULL','2017-03-10 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2477,2,'MASARE FCS','MASARE F.C.SOC LTD','','MASARE FCS/XCE53','na','NA','85','NULL','NULL','NULL','2017-03-17 00:00:00','1',0,'NULL','BOMET',39,6,1,'0','2477','',NULL,NULL,'NA'),(2478,3,'MASARE','MASARE F.C.SOC LTD','','MASARE/XCE53F01','na','NA','85','NULL','NULL','NULL','2017-03-17 00:00:00','1',0,'NULL','BOMET',39,6,1,'0','2477','',NULL,NULL,'NA'),(2479,1,'FRIENDS','FRIENDS FARM','','FRIENDS/CBZA007K','na','NA','745','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','KITALE',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2480,1,'RIMO','RIMO FARM','','RIMO/CB0436','na','NA','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2481,1,'JUKIWA','JUKIWA FARM','','JUKIWA/AB0540','na','724701546','1417','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2482,1,'JOWABU','JOWABU FARM','','JOWABU/AA0080A','wagacha1967w@gmail.com','NA','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2483,1,'GEOMARY','GEOMARY FARM','','GEOMARY/CBZA007L','na','NA','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2484,1,'DOLPHINE','DOLPHINE FARM','','DOLPHINE/CBZA007M','na','NA','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',22,6,1,'0','NULL','',NULL,NULL,'NA'),(2485,1,'ENG','ENG ESTATE','','ENG/AJ0456','na','NA','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2486,1,'MWENDIA','MWENDIA FARM','','MWENDIA/AJ0029','na','NA','1679','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','EMBU',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2487,1,'JOKANGU','JOKANGU FARM','','JOKANGU/CA0265','na','723683861','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2488,1,'GATARWA','GATARWA FARM','','GATARWA/AA0720','na','NA','21','NULL','NULL','NULL','2017-03-24 00:00:00','2',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2489,1,'DANIEL','DANIEL FARM','','DANIEL/AA0882','na','NA','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2490,1,'OKAMA','OKAMA FARM','','OKAMA/CBZA007N','na','NA','NA','NULL','NULL','NULL','2017-03-24 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2491,1,'MUBIRA','STEPHEN KING\'ANG\'I MUBIRA','','MUBIRA/AA0153','na','0723 440063','23075','NULL','NULL','NULL','2017-03-29 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2492,1,'WAMA','WAMA ESTATE','','WAMA/CA0232','na','na','NA','NULL','NULL','NULL','2017-03-31 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2493,1,'APACHE','APACHE FARM','','APACHE/CBZA007P','na','na','NA','NULL','NULL','NULL','2017-03-31 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2494,1,'WANYA','WANYA ESTATE','','WANYA/BD0115','0','0','0','NULL','NULL','NULL','2017-04-20 00:00:00','NULL',0,'NULL','0',51,1,1,'0','NULL','',NULL,NULL,'0'),(2495,1,'EDMOS','EDNA C BORE','','EDMOS/CB0477','0','0','0','NULL','NULL','NULL','2017-04-21 00:00:00','NULL',0,'NULL','0',26,4,1,'0','NULL','',NULL,NULL,'0'),(2496,1,'WATHANA','CLEMENT KIOI MUIRURI','','WATHANA/AB0384','0','0','0','NULL','NULL','NULL','2017-04-21 00:00:00','1',0,'NULL','0',21,1,1,'0','NULL','',NULL,NULL,'0'),(2497,1,'NJAU','CATHERINE MUTHANJI KARIUKI','','NJAU/AA338','0','0','0','NULL','NULL','NULL','2017-04-21 00:00:00','1',0,'NULL','0',22,1,1,'0','NULL','',NULL,NULL,'0'),(2498,1,'LAKE BASIN AUTHORITY','LAKE BASIN AUTHORITY','','LAKE BASIN AUTHORITY/CBZA007Q','na','na','NA','NULL','NULL','NULL','2017-04-21 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2499,1,'MBAGARA','MBAGARA FARM','','MBAGARA/AB0344','na','728949553','68','NULL','NULL','NULL','2017-04-21 00:00:00','1',0,'NULL','GATUKUYU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2500,1,'KANJOKI FARM','JAME THUKU MWANGI','','KANJOKI FARM/AB0559A','0','0','0','NULL','NULL','NULL','2017-04-24 00:00:00','1',0,'NULL','0',22,1,1,'0','NULL','',NULL,NULL,'0'),(2501,1,'KAWANJIKU FARM','DAVID MBUTI NDEKEI','','KAWANJIKU FARM/AA03800','0','0','0','NULL','NULL','NULL','2017-04-24 00:00:00','1',0,'NULL','0',22,1,1,'0','NULL','',NULL,NULL,'0'),(2502,1,'GATHENGE ESTATE','PETER WAMUGUNDA','','GATHENGE/AB0586','0','0','0','NULL','NULL','NULL','2017-04-24 00:00:00','1',0,'NULL','0',21,1,1,'0','NULL','',NULL,NULL,'0'),(2503,1,'MIRIRA','JOHN MWANGI','','MIRIRA/AB0219','na','722965128','NA','NULL','NULL','NULL','2017-05-03 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2504,4,'KWA MATINGI','KWA MATINGI ESTATE','','KWA MATINGI/XBE23','na','711354846','549','NULL','NULL','NULL','2017-05-11 00:00:00','1',0,'NULL','TALA',48,5,1,'0','2504','',NULL,NULL,'NA'),(2508,1,'KIMASO','KIMASO FARM','','KIMASO/CBZA007R','na','na','NA','NULL','NULL','NULL','2017-05-12 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2509,1,'EDEN','EDEN FARM','','EDEN/CBZA007S','na','na','NA','NULL','NULL','NULL','2017-05-12 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2510,1,'MAGANJO FARM','MAGANJO FARM','','MAGANJO FARM/AA0786','na','NA','NA','NULL','NULL','NULL','2017-05-29 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2511,2,'KIMASIAN FCS','KIMASIAN FCS LTD','','KIMASIAN/XCE23','0','0','0','NULL','NULL','NULL','2017-06-22 00:00:00','1',0,'NULL','FORT-TENAN',29,4,1,'0','2511','',NULL,NULL,'0'),(2512,3,'KIMASIAN','KIMASIAN FCS LTD','','KIMASIAN/XCE23F01','0','0','0','NULL','NULL','NULL','2017-06-22 00:00:00','1',0,'NULL','FORT-TENAN',29,4,1,'0','2511','',NULL,NULL,'0'),(2513,4,'TRI-STAR PLANTATIONS LTD','ASHWIN PUNJALAL BID','','TRI-STAR PLANTATIONS LTD/AB0254','sales@citygeneral.co.ke','725495051','958','NULL','NULL','NULL','2017-07-06 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2514,1,'MUKAMBI','MUKAMBI FARM','','MUKAMBI/AA0456','na','na','NA','NULL','NULL','NULL','2017-07-21 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2515,1,'WAGATONYE','WAGATONYE FARM','','WAGATONYE/AA0546','na','723736513','161','NULL','NULL','NULL','2017-07-21 00:00:00','1',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2516,2,'MUISUNI FCS','MUISUNI F.C.SOC LTD','','MUISUNI FCS/XBE09','na','na','1070','NULL','NULL','NULL','2017-07-26 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'90115','2516','',NULL,NULL,'NA'),(2517,3,'MUISUNI MAIN','MUISUNI F.C.SOC LTD','','MUISUNI MAIN/XBE09FO1','na','na','1070','NULL','NULL','NULL','2017-07-26 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'90115','2516','',NULL,NULL,'NA'),(2518,3,'MAVINDU','MUISUNI F.C.SOC LTD','','MAVINDU/XBE09F02','na','na','1070','NULL','NULL','NULL','2017-07-26 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'90115','2516','',NULL,NULL,'NA'),(2519,3,'KWAMANGU','MUISUNI F.C.SOC LTD','','KWAMANGU/XBE09FO3','na','na','1070','NULL','NULL','NULL','2017-07-26 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'90115','2516','',NULL,NULL,'NA'),(2520,1,'ARASA','ARASA ESTATE','','ARASA/EB0033','na','NA','NA','NULL','NULL','NULL','2017-07-28 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2521,1,'KUNI','KUNI ESTATE','','KUNI/AA0196A','na','722921195','NA','NULL','NULL','NULL','2017-08-02 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2522,1,'NDUAMBA','NDUAMBA FARM','','NDUAMBA/AA0252D','na','NA','179','NULL','NULL','NULL','2017-08-17 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2523,1,'4 NSE FARM','4 NSE FARM','','4 NSE FARM/AB0694','na','727693709','1770','NULL','NULL','NULL','2017-08-18 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2524,1,'WAKANYIRA','WAKANYIRA FARM','','WAKANYIRA/AA0363B','na','na','NA','NULL','NULL','NULL','2017-08-23 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2525,1,'SLOPES','SLOPES FARM','','SLOPES/BF0133','na','0728 075102','1122','NULL','NULL','NULL','2017-08-28 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2526,1,'REMEKI','REMEKI FARM','','REMEKI/AA0516','na','715631979','48','NULL','NULL','NULL','2017-08-28 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2528,1,'KARAU','KARAU FARM','','KARAU/AA0456B','na','na','NA','NULL','NULL','NULL','2017-08-28 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2529,1,'MUCHOMBA','MUCHOMBA FARM','','MUCHOMBA','na','739376804','NA','NULL','NULL','NULL','2017-08-30 00:00:00','1',0,'NULL','NA',49,1,1,'0','NULL','',NULL,NULL,'NA'),(2530,1,'WAN','WAN FARM','','WAN/AA0196B','na','na','NA','NULL','NULL','NULL','2017-08-30 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2531,1,'TIMSKA','TIMSKA FARM','','TIMSKA/AB0104B','na','na','NA','NULL','NULL','NULL','2017-08-30 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2532,2,'NEMBURE FCS','NEMBURE F.C.SOC LTD','','NEMBURE FCS/XBD15','na','na','842','NULL','NULL','NULL','2017-08-31 00:00:00','1',0,'NULL','EMBU',51,5,1,'60100','2532','',NULL,NULL,'NA'),(2533,3,'MIRUNDI','NEMBURE F.C.SOC LTD','','MIRUNDI /XBD15F01','na','na','942','NULL','NULL','NULL','2017-08-31 00:00:00','1',0,'NULL','EMBU',51,5,1,'60100','2532','',NULL,NULL,'NA'),(2534,3,'GATUNDURI','NEMBURE F.C.SOC LTD','','GATUNDURI/XBD15F02','na','na','942','NULL','NULL','NULL','2017-08-31 00:00:00','1',0,'NULL','EMBU',51,5,1,'60100','2532','',NULL,NULL,'NA'),(2535,3,'KIHUMBU','NEMBURE F.C.SOC LTD','','KIHUMBU/XBDF03','na','na','942','NULL','NULL','NULL','2017-08-31 00:00:00','1',0,'NULL','EMBU',51,5,1,'60100','2532','',NULL,NULL,'NA'),(2536,1,'NDUKI','JOHN NDUNGU MAINA','','NDUKI/AA0916','na','na','179','NULL','NULL','NULL','2017-08-31 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2537,1,'MITI FARM','MITI FARM','','MITI FARM/AA0514','na','na','NA','NULL','NULL','NULL','2017-08-31 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2538,2,'KARIUA FCS','KARIUA F.C.SOC LTD','','KARIUA FCS/XAB92','na','NA','406','NULL','NULL','NULL','2017-09-04 00:00:00','1',0,'NULL','THIKA',21,1,1,'0','2538','',NULL,NULL,'NA'),(2539,3,'NEW IRERA','KARIUA F.C.SOC LTD','','NEW IRERA/XAB92F01','na','NA','406','NULL','NULL','NULL','2017-09-04 00:00:00','1',0,'NULL','THIKA',21,1,1,'0','2538','',NULL,NULL,'NA'),(2540,3,'MUTHERU','KARIUA F.C.SOC LTD','','MUTHERU/XAB92F02','na','NA','406','NULL','NULL','NULL','2017-09-04 00:00:00','1',0,'NULL','THIKA',21,1,1,'0','2538','',NULL,NULL,'NA'),(2541,3,'MUTITU KARIUA','KARIUA F.C.SOC LTD','','MUTITU KARIUA/XAB92F03','na','NA','406','NULL','NULL','NULL','2017-09-04 00:00:00','1',0,'NULL','THIKA',21,1,1,'0','2538','',NULL,NULL,'NA'),(2542,3,'GITHAITI','KARIUA F.C.SOC LTD','','GITHAITI/XAB92F04','na','NA','406','NULL','NULL','NULL','2017-09-04 00:00:00','1',0,'NULL','THIKA',21,1,1,'0','2538','',NULL,NULL,'NA'),(2543,1,'PEARLESS','PEARLESS FARM','','PEARLESS/AG0017','na','na','NA','NULL','NULL','NULL','2017-09-06 00:00:00','1',0,'NULL','NA',19,1,1,'0','NULL','RA,CAFE',NULL,NULL,'NA'),(2544,1,'NKUMARI','NAMAN KAILIBI MEME','','NKUMARI/BA0008','na','na','2351','NULL','NULL','NULL','2017-09-06 00:00:00','1',0,'NULL','MERU',49,1,1,'0','NULL','',NULL,NULL,'NA'),(2545,1,'NYANGWETA','NYANGWETA FARM','','NYANGWETA/EB0011','na','NA','NA','NULL','NULL','NULL','2017-09-11 00:00:00','1',0,'NULL','NA',26,4,1,'0','NULL','',NULL,NULL,'NA'),(2546,1,'WAKONYO','WAKONYO FARM','','WAKONYO/AB0451','na','na','NA','NULL','NULL','NULL','2017-09-18 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2547,1,'KIAWAMATU','SAMUEL NJOROGE','','KIAWAMATU/AA0665','na','na','301','NULL','NULL','NULL','2017-09-18 00:00:00','17',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2548,1,'VISTA','GEORGE MUNGAI GICHIA','','VISTA/AB0088G','na','na','3570','NULL','NULL','NULL','2017-09-18 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2549,1,'KADAM','DANIEL KAMU MBURU','','KADAM/AA0721','na','734636292','579','NULL','NULL','NULL','2017-09-18 00:00:00','2',0,'NULL','GATUNDU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2550,2,'NEW KIRIMIRI FCS','NEW KIRIMIRI F.C.SOC LTD','','NEW KIRIMIRI FCS/XBD26','newkirimirifcs@yahoo.com','na','82','NULL','NULL','NULL','2017-09-22 00:00:00','1',0,'NULL','RUNYENJES',51,5,1,'60103','2550','',NULL,NULL,'NA'),(2551,3,'NEW KIRIMIRI','NEW KIRIMIRI F.C.SOC LTD','','NEW KIRIMIRI/XBD26F01','newkirimirifcs@yahoo.com','na','82','NULL','NULL','NULL','2017-09-22 00:00:00','1',0,'NULL','RUNYENJES',51,5,1,'60103','2550','',NULL,NULL,'NA'),(2552,1,'BLUE HILLS','JOHN NZIOKA MANTHI','','BLUE HILLS/BF0280','na','NA','NA','NULL','NULL','NULL','2017-09-25 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2553,1,'WAKIM','ANN WANJIKU NDUATI','','WAKIM/AA0298E','na','726092374','1228','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2554,1,'MURO','GEORGE WAIRERA MATHUKIA','','MURO/AA0436','na','721630799','87','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','NGEWA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2555,2,'MUGAGA FCS','MUGAGA F.C.SOC LTD','','MUGAGA FCS/XAC64','na','NA','1665','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2555','',NULL,NULL,'NA'),(2556,3,'KAGUMOINI-MUGAGA','MUGAGA F.C.SOC LTD','','KAGUMOINI-MUGAGA/XAC64F01','na','NA','1665','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2555','',NULL,NULL,'NA'),(2557,3,'KIAMABARA','MUGAGA F.C.SOC LTD','','KIAMABARA/XAC64F02','na','NA','1665','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2555','',NULL,NULL,'NA'),(2558,3,'KIENI','MUGAGA F.C.SOC LTD','','KIENI/XAC64F03','na','NA','1665','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2555','',NULL,NULL,'NA'),(2559,3,'GATHUGU','MUGAGA F.C.SOC LTD','','GATHUGU/XAC64F04','na','NA','1665','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2555','',NULL,NULL,'NA'),(2560,3,'GATINA','MUGAGA F.C.SOC LTD','','GATINA/XAC64F05','na','NA','1665','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','KARATINA',19,1,1,'10101','2555','',NULL,NULL,'NA'),(2561,4,'KIAMBU MWITUMBERIA','KIAMBU MWITUMBERIA 1971 LTD','','KIAMBU MWITUMBERIA/AE0007','na','NA','31908','NULL','NULL','NULL','2017-09-29 00:00:00','1',0,'NULL','NGARA',47,1,1,'0','NULL','',NULL,NULL,'NA'),(2562,4,'RIOKI','RIOKI ESTATE CO(1970) LTD','','RIOKI/AA0004','na','na','231','NULL','NULL','NULL','2017-10-02 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2563,1,'MARCELLIN','MARCELLIN NJOROGE MURUTHI','','MARCELLIN/AB0484','na','na','49','NULL','NULL','NULL','2017-10-09 00:00:00','1',0,'NULL','MURANGA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2564,2,'EAKA FCS','EAKA F.C.SOC LTD','','EAKA FCS/XEA05','na','NA','35','NULL','NULL','NULL','2017-10-16 00:00:00','1',0,'NULL','KISII',26,3,1,'0','2564','',NULL,NULL,'NA'),(2565,3,'EAKA MAIN','EAKA F.C.SOC LTD','','EAKA MAIN/XEA05F01','na','NA','35','NULL','NULL','NULL','2017-10-16 00:00:00','1',0,'NULL','KISII',26,3,1,'0','2564','',NULL,NULL,'NA'),(2566,3,'NYAKENIMO','EAKA F.C.SOC LTD','','NYAKENIMO/XEA05F02','na','NA','35','NULL','NULL','NULL','2017-10-16 00:00:00','1',0,'NULL','KISII',26,3,1,'0','2564','',NULL,NULL,'NA'),(2567,3,'MABARIRI','EAKA F.C.SOC LTD','','MABARIRI/XEA05F03','na','NA','35','NULL','NULL','NULL','2017-10-16 00:00:00','1',0,'NULL','KISII',26,3,1,'0','2564','',NULL,NULL,'NA'),(2568,2,'KIKAI FCS','KIKAI F.C.SOC LTD','','KIKAI FCS/XDA23','kikaifcs@yahoo.com','na','136','NULL','NULL','NULL','2017-10-16 00:00:00','1',0,'NULL','CHWELE',39,6,1,'50202','2568','0',NULL,NULL,'NA'),(2569,3,'KIKAI','KIKAI F.C.SOC LTD','','KIKAI/XDA23F01','kikaifcs@yahoo.com','na','136','NULL','NULL','NULL','2017-10-16 00:00:00','1',0,'NULL','CHWELE',39,6,1,'50202','2568','0',NULL,NULL,'NA'),(2570,1,'KIGUONGO','PAUL KIGUONGO KANG\'ETHE','','KIGUONGO/AA0601','na','na','NA','NULL','NULL','NULL','2017-10-19 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2571,1,'SUPER GIBS LTD','SUPER GIBS FARM','','SUPER GIBS LTD/AJ0591','na','na','NA','NULL','NULL','NULL','2017-10-19 00:00:00','1',0,'NULL','NA',20,1,1,'0','NULL','',NULL,NULL,'NA'),(2572,1,'SIMON CHEGE','SIMON CHEGE NDUNGU','','SIMON CHEGE/AB021401','na','na','1067','NULL','NULL','NULL','2017-10-19 00:00:00','1',0,'NULL','MURANGA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2573,1,'MWAMATI','MWAMATI FARM','','MWAMATI/AA0915','na','na','NA','NULL','NULL','NULL','2017-10-19 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2574,1,'KIMEMIA','TIMOTHY KIMEMIA NJOROGE','','KIMEMIA/AA0913','na','na','169','NULL','NULL','NULL','2017-10-19 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2575,1,'EDWARD','EDWARD MACHARIA','','EDWARD/AA0911','na','na','24','NULL','NULL','NULL','2017-10-19 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2576,1,'DAWAKA','DANIEL KARANU WANJIKU','','DAWAKA/AA0754D','na','na','90','NULL','NULL','NULL','2017-11-01 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2577,1,'BIDII  YAKE','BIDII YAKE FARM','','BIDII  YAKE/BF0213','francismutiso89@gmail.com','NA','83','NULL','NULL','NULL','2017-11-02 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2578,2,'KYAUME FCS','KYAUME F.C.SOC LTD','','KYAUME FCS/XBE22','na','NA','592','NULL','NULL','NULL','2017-11-02 00:00:00','1',0,'NULL','TALA',48,5,1,'0','2578','',NULL,NULL,'NA'),(2579,3,'KYAMWOLE','KYAUME F.C.SOC LTD','','KYAMWOLE/XBE22F01','na','NA','592','NULL','NULL','NULL','2017-11-02 00:00:00','1',0,'NULL','TALA',48,5,1,'0','2578','',NULL,NULL,'NA'),(2580,3,'KATINE','KYAUME F.C.SOC LTD','','KATINE/XBE22F02','na','NA','592','NULL','NULL','NULL','2017-11-02 00:00:00','1',0,'NULL','TALA',48,5,1,'0','2578','',NULL,NULL,'NA'),(2581,3,'NYAMIOMU','RIASUTA F.C.S. LTD','','NYAMIOMU/XEA22F04','na','NA','35','NULL','NULL','NULL','2017-11-06 00:00:00','1',0,'NULL','KISII',45,6,1,'0','1843','',NULL,NULL,'NA'),(2582,3,'KAMOTOS','KAMIWA F.C.SOC LTD','','KAMOTOS/XCE02F05','na','NA','NA','NULL','NULL','NULL','2017-11-22 00:00:00','1',0,'NULL','NA',35,4,1,'0','2416','',NULL,NULL,'NA'),(2583,3,'KIMUGUL SUGUT','SUGUT FCS LTD','','KIMUGULSUGUT/XCE57BF02','NA','726418236','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',1,'NULL','KORU',35,4,1,'0','2584','',NULL,NULL,'NA'),(2584,2,'SUGUT FCS','SUGUT FCS LTD','','SUGUT/XCE57B','NA','726418236','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',1,'NULL','KORU',35,4,1,'NULL','2584','',NULL,NULL,'NA'),(2585,3,'CHOMISIAN','KAPIAS  FCS LTD','','CHOMISIAN/XCE57CF02','NA','726418236','NA','NULL','NULL','NULL','2015-09-16 00:00:00','1',1,'NULL','KORU',35,4,1,'NULL','2587','',NULL,NULL,'NA'),(2586,3,'KAMAUA','KAPIAS  FCS LTD','','KAMAUA/XCE57CF03','NULL','NULL','NULL','NULL','NULL','NULL','2015-09-16 00:00:00','1',1,'NULL','KORU',35,4,1,'NULL','2587','',NULL,NULL,'NULL'),(2587,2,'KAPIAS FCS','KAPIAS  FCS LTD','','KAPIAS/XCE57C','NULL','NULL','NULL','NULL','NULL','NULL','2015-09-16 00:00:00','1',1,'NULL','KORU',35,4,1,'NULL','2587','',NULL,NULL,'NULL'),(2588,1,'PENDEZA','PENDEZA FARM','','PENDEZA/EB0030','na','NA','NA','NULL','NULL','NULL','2017-11-30 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2589,1,'GACHIRU','JAMES GAKURU NGOBIA','','GACHIRU/AG0283','gachiruestate.ngobia@gmail.com','na','1387','NULL','NULL','NULL','2017-12-01 00:00:00','1',0,'NULL','NYERI',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2590,1,'CHALLEM','HELLEN WOTHAYA WERU','','CHALLEM/AG0261','na','na','584','NULL','NULL','NULL','2017-12-01 00:00:00','1',0,'NULL','NYERI',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2591,1,'JOKIMU','JOKIMU FARM','','JOKIMU/AA0108','na','na','NA','NULL','NULL','NULL','2017-12-04 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2592,1,'SIMBA GUSII','SIMBA FARM','','SIMBA/EB0062','na','NA','NA','NULL','NULL','NULL','2017-12-07 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2593,1,'SAMUTET','SAMUTET FARM','','SAMUTET/CBZA0032B','na','NA','NA','NULL','NULL','NULL','2017-12-11 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2594,1,'CIANJAMBI','CIANJAMBI FARM','','CIANJAMBI/AA0808','na','na','NA','NULL','NULL','NULL','2017-12-11 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2595,1,'GREEN VALLEY','GREEN VALLEY FARM','','GREEN VALLEY/AB0740','na','na','NA','NULL','NULL','NULL','2017-12-11 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2596,1,'SPIKE','SPIKE FARM','','SPIKE/AA0910','na','na','NA','NULL','NULL','NULL','2017-12-11 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2598,1,'WAKONYO B','PAUL NJUGUNA KABUBI','','WAKONYO B/AA0547','na','na','30291','NULL','NULL','NULL','2017-12-19 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2601,1,'MWATHI','MWATHI FARM','','MWATHI/AA0837A','na','729825935','NA','NULL','NULL','NULL','2018-01-12 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2602,1,'KWAGIL','KWAGIL FARM','','KWAGIL/CBZA007T','na','na','NA','NULL','NULL','NULL','2018-01-12 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2603,1,'1','ANDREW NG\'ANG\'A GATEMBEI','','TRUE/AA0924','na','na','78','NULL','NULL','NULL','2018-01-17 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2604,1,'ROKOFI','SAMUEL GITAU NDURA','','ROKOFI/AA0926','na','na','53','NULL','NULL','NULL','2018-01-19 00:00:00','1',0,'NULL','KAGWE',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2605,1,'KASUBI','KASUBI FARM','','KASUBI/AA0914','na','NA','NA','NULL','NULL','NULL','2018-01-22 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2606,1,'WAMIKEY','NDU THUO','','WAMIKEY/AA0031','na','na','46994','NULL','NULL','NULL','2018-02-09 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2607,2,'MAGWAGWA FCS','MAGWAGWA F.C.SOC LTD','','MAGWAGWA FCS/XEA26','na','NA','NA','NULL','NULL','NULL','2018-02-12 00:00:00','1',0,'NULL','NA',26,6,1,'0','2607','',NULL,NULL,'NA'),(2608,3,'IGARE','MAGWAGWA F.C.SOC LTD','','IGARE/XEA26F02','na','NA','NA','NULL','NULL','NULL','2018-02-12 00:00:00','1',0,'NULL','NA',26,6,1,'0','2607','',NULL,NULL,'NA'),(2609,1,'ALROOD','ALROOD ESTATE','','ALROOD/CBZ007U','na','NA','NA','NULL','NULL','NULL','2018-02-12 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2610,1,'NAHASHON','NAHASHON ESTATE','','NAHASHON/CB0442','na','NA','NA','NULL','NULL','NULL','2018-02-12 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2611,1,'MUCHIRI FARM','DAVID KARANJA WANJIKU','','MUCHIRI FARM/AA0231','na','724122948','509','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2612,1,'KIANGOMBE ESTATE','STEPHENE WAHINYA GATHU','','KIANGOMBE ESTATE/AA0806','na','na','1199','NULL','NULL','NULL','2018-02-19 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2614,1,'NGUMIRI','TERESIAH WAMBUI MIRINGU','','NGUMIRI/AA0641','na','na','NA','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2615,1,'AKABUEI','AKABUEI FARM','','AKABUEI/CA0270','na','na','NA','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2617,1,'JKAMAU','JKAMAU FARM','','JKAMAU/ZA0009C','na','NA','NA','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2618,1,'KIVUNJA','SAMUEL NJUGUNA MBURU','','KIVUNJA/AA0852','na','NA','29','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','GATHUGU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2619,1,'RECI','PAUL KARANI NGUMI','','RECI/AA0295C','na','NA','3083','NULL','NULL','NULL','2018-02-19 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2620,4,'KIGARI','ST MARYS KIGARI TEACHERS COLLEGE','','KIGARI/BD0132','na','NA','NA','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','NA',51,5,1,'0','NULL','',NULL,NULL,'NA'),(2621,1,'OMWANSA','OMWANSA ESTATE','','OMWANSA/EB0067','na','NA','NA','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2622,1,'REROTUS','REROTUS ESTATE','','REROTUS/EB0069','na','NA','NA','NULL','NULL','NULL','2018-02-19 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2623,1,'NGIGE','NGIGE FARM','','NGIGE/AA0356','na','726661029','178','NULL','NULL','NULL','2018-03-08 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2624,1,'MARIIENE','MARIIENE FARM','','MARIIENE/AG0297','georgemkiguta46@gmail.com','701003358','NA','NULL','NULL','NULL','2018-03-08 00:00:00','1',0,'NULL','NA',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2625,1,'HANDU','GEOFFREY NGUMBA','','HANDU/AA0895','na','na','36','NULL','NULL','NULL','2018-03-08 00:00:00','1',0,'NULL','GATHUNGU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2626,1,'MATUNDA-ORCHARDS','SIMEON MUIRU MUNGAI','','MATUNDA-ORCHARDS/CB0671','na','na','1804','NULL','NULL','NULL','2018-03-08 00:00:00','1',0,'NULL','KITALE',26,6,1,'30200','NULL','',NULL,NULL,'NA'),(2627,1,'GEOCAR','GEOCAR FARM','','GEOCAR/CBZA007U','na','na','NA','NULL','NULL','NULL','2018-03-08 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2628,1,'JOMI','JOHN NJUGUNA NGUMI','','JOMI/AA0295A','na','720621590','83','NULL','NULL','NULL','2018-03-08 00:00:00','1',0,'NULL','GATHUNGU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2629,1,'KIANGA','KIANGA FARM','','KIANGA/AA0426C','na','NA','NA','NULL','NULL','NULL','2018-03-08 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2631,1,'WANN','DAVID WAINAINA KIBURI','','WANN/AB0196B','na','na','78','NULL','NULL','NULL','2018-03-09 00:00:00','17',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2632,1,'MUCHATHA','JOSEPH KINUTHIA MUGI','','MUCHATHA/CBZA007V','na','na','NA','NULL','NULL','NULL','2018-03-15 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2633,1,'KAWANJIRU','MWANGI GITHII','','KAWANJIRU/AB0420','na','na','NA','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2634,1,'WAITI','FRANCIS MUIGAI WAITI','','WAITI/AA0861','na','na','NA','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2635,1,'KAMWANA','SAMUEL NJENGA','','KAMWANA/AA0295B','na','na','NA','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2636,1,'GATHINI','JAMES KUNGU NGATA','','GATHINI/AA0748','na','711170044','31710','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2637,1,'KIAMACORA','DANIEL KIMANI NGUMI','','KIAMACORA/AA0295','na','722295162','409','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2638,1,'WANINI','SAMUEL MACHII NJOROGE','','WANINI/AA0534','na','na','NA','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2639,1,'CHEMU','PETER CHEGE MUIGAI','','CHEMU/AA0861A','na','na','NA','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2640,1,'GATHATHI','KINYANJUI KAMAU MUTURI','','GATHATHI/AA0610','na','722107185','90','NULL','NULL','NULL','2018-03-16 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2641,1,'MORETHI','MORETHI FARM','','MORETHI/AB0087B','na','na','NA','NULL','NULL','NULL','2018-03-23 00:00:00','1',0,'NULL','NA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2643,1,'ISAMWERA','ISAMWERA FARM','','ISAMWERA/EB0070A','na','NA','NA','NULL','NULL','NULL','2018-03-26 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2644,1,'MUHUTI','MUHUTI FARM','','MUHUTI/AA0201A','na','725512020','794','NULL','NULL','NULL','2018-03-28 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2645,1,'MWANIK','MWANIK FARM','','MWANIK/CBZA007W','na','na','NA','NULL','NULL','NULL','2018-03-29 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2646,1,'IGEGO','IGEGO FARM','','IGEGO/AA0827','na','0728 256643','15','NULL','NULL','NULL','2018-04-09 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2647,1,'GEOPET','PETER NGUCA NJENGA','','GEOPET/CA0269','na','na','12670','NULL','NULL','NULL','2018-04-09 00:00:00','1',0,'NULL','NAKURU',32,1,1,'20100','NULL','',NULL,NULL,'NA'),(2648,1,'NGIRITI','STEPHEN NGUMBA WAINAINA','','NGIRITI/AA0267','na','na','179','NULL','NULL','NULL','2018-04-09 00:00:00','1',0,'NULL','KIAMBU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2649,1,'BOMA','BONIFACE NJUGUNA KIMANI','','BOMA/AA0645A','na','na','490','NULL','NULL','NULL','2018-04-09 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2650,1,'KIREMA','KIREMA FARM','','KIREMA/AA0965','na','0721 255156','226','NULL','NULL','NULL','2018-04-09 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2651,1,'WEMA','MOSES KIPKOECH TOO','','WEMA/CI0041','na','na','78','NULL','NULL','NULL','2018-04-09 00:00:00','1',0,'NULL','FORT-TERNAN',35,6,1,'0','NULL','',NULL,NULL,'NA'),(2652,1,'JULIANA','JULIANA FARM','','JULIANA/AA0905','na','722795215','1505','NULL','NULL','NULL','2018-04-13 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2653,1,'NGOGA','NGOGA FARM','','NGOGA/AB0146','na','723070609','1028','NULL','NULL','NULL','2018-04-13 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2654,1,'GITAU','JAMES GITAU NJOROGE','','GITAU/AA0256D','na','NA','279','NULL','NULL','NULL','2018-04-13 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2655,1,'MEKA','MEKA FARM','','MEKA/AB0179','na','733672078','NA','NULL','NULL','NULL','2018-04-16 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2656,1,'WIDESURF','WIDESURF FARM','','WIDESURF/AA0887','na','na','NA','NULL','NULL','NULL','2018-04-25 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2657,2,'NEW MITAMBONI FCS','NEW MITAMBONI F.C.SOC LTD','','NEW MITAMBONI FCS/XBE06','na','na','28','NULL','NULL','NULL','2018-04-25 00:00:00','1',0,'NULL','MITAMBONI',48,5,1,'90104','2657','',NULL,NULL,'NA'),(2658,3,'KALUA','NEW MITAMBONI F.C.SOC LTD','','KALUA/XBE06F01','na','na','28','NULL','NULL','NULL','2018-04-25 00:00:00','1',0,'NULL','MITAMBONI',48,5,1,'90104','2657','',NULL,NULL,'NA'),(2659,3,'UMANTHI','NEW MITAMBONI F.C.SOC LTD','','UMANTHI/XBE06F02','na','na','28','NULL','NULL','NULL','2018-04-25 00:00:00','1',0,'NULL','MITAMBONI',48,5,1,'90104','2657','',NULL,NULL,'NA'),(2660,3,'KITHIMA','NEW MITAMBONI F.C.SOC LTD','','KITHIMA/XBE06F03','na','na','28','NULL','NULL','NULL','2018-04-25 00:00:00','1',0,'NULL','MITAMBONI',48,5,1,'90104','2657','',NULL,NULL,'NA'),(2661,3,'MBEE','NEW MITAMBONI F.C.SOC LTD','','MBEE/XBE06F04','na','na','28','NULL','NULL','NULL','2018-04-25 00:00:00','1',0,'NULL','MITAMBONI',48,5,1,'90104','2657','',NULL,NULL,'NA'),(2662,3,'UTOONI','NEW MITAMBONI F.C.SOC LTD','','UTOONI/XBE06F05','na','na','28','NULL','NULL','NULL','2018-04-25 00:00:00','1',0,'NULL','MITAMBONI',48,5,1,'90104','2657','',NULL,NULL,'NA'),(2663,1,'EL-SHADDAI','EL-SHADDAI FARM','','EL-SHADDAI/AB0723','na','722715204','619','NULL','NULL','NULL','2018-04-26 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2664,1,'AMWAI','AMWAI FARM','','AMWAI/AA0258A','na','na','NA','NULL','NULL','NULL','2018-04-26 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2665,1,'JELKA','JELKA FARM','','JELKA/CB0076','na','na','NA','NULL','NULL','NULL','2018-04-27 00:00:00','1',0,'NULL','NA',26,6,1,'0','NULL','',NULL,NULL,'NA'),(2666,1,'JOHNESTHER','JOHNESHER FARM','','JOHNESTHER/AA0925','na','na','NA','NULL','NULL','NULL','2018-04-30 00:00:00','2',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2667,1,'GITURU','GITURU FARM','','GITURU/AG0313','na','725594430','NA','NULL','NULL','NULL','2018-05-03 00:00:00','1',0,'NULL','NA',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2668,1,'GAKUMO','GAKUMO FARM','','GAKUMO/AA0707','na','na','NA','NULL','NULL','NULL','2018-05-03 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2669,1,'GACIBI','GACIBI ESTATE','','GACIBI/AB0032','na','na','NA','NULL','NULL','NULL','2018-07-25 00:00:00','2',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2670,1,'KARANGI','KARANGI ESTATE','','KARANGI/AC0026','na','na','NA','NULL','NULL','NULL','2018-07-30 00:00:00','18',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2671,1,'PARADISE FARM','JANE WAMBUI KARANJA','','PARADISE FARM/AB0041D','NULL','0','53104 NAIROBI','NULL','NULL','NULL','2018-06-11 00:00:00','18',0,'NULL','KIAMBU',22,1,1,'200','NULL','',NULL,NULL,'0'),(2672,1,'KWA SENGA','NATHANIEL MULWA SENGA','','KWA SENGA/BF0109','na','na','61269','NULL','NULL','NULL','2018-08-01 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2673,2,'MUTUMA FCS','MUTUMA F.C.SOC LTD','','MUTUMA FCS/XBA35','na','na','20','NULL','NULL','NULL','2018-08-03 00:00:00','1',0,'NULL','MIKINDURI',49,5,1,'60607','2673','',NULL,NULL,'NA'),(2674,3,'ABONDEI','MUTUMA F.C.SOC LTD','','ABONDEI/XBA35F01','na','na','20','NULL','NULL','NULL','2018-08-03 00:00:00','1',0,'NULL','MIKINDURI',49,5,1,'60607','2673','',NULL,NULL,'NA'),(2675,3,'ANTUAMBURI','MUTUMA F.C.SOC LTD','','ANTUAMBURI/XBA35F02','na','na','20','NULL','NULL','NULL','2018-08-03 00:00:00','1',0,'NULL','MIKINDURI',49,5,1,'0','2673','',NULL,NULL,'NA'),(2676,3,'KIIRI  MUTUMA','MUTUMA F.C.SOC LTD','','KIIRI  MUTUMA/XBA35F03','na','na','20','NULL','NULL','NULL','2018-08-03 00:00:00','1',0,'NULL','MIKINDURI',49,5,1,'0','2673','',NULL,NULL,'NA'),(2677,1,'WANJIHIA FARM','MICHAEL WAMUNYU KARIUKI','','WANJIHIA FARM/AA0429D','0','721939816','24','NULL','NULL','NULL','2018-08-13 00:00:00','17',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NULL'),(2678,1,'MWAITU','MARCEL T ULANGA WAMBUA','','MWAITU/BF0216','na','na','NA','NULL','NULL','NULL','2018-08-16 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2679,1,'KYAKATULU','GEORGE MUTUKU NYUMU','','KYAKATULU/BF0243','na','na','190','NULL','NULL','NULL','2018-08-16 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2680,1,'KYANGU','DAVID NZIOKI NGULI','','KYANGU/BF0299','na','na','53','NULL','NULL','NULL','2018-08-16 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2681,1,'NJEMU FARM','GEORGE MUCHERU MWANGI','','NJEMU GEORGE/CA0256','na','NA','7235','NULL','NULL','NULL','2018-08-17 00:00:00','1',0,'NULL','NAKURU',32,1,1,'0','NULL','',NULL,NULL,'NA'),(2682,1,'KANDERE','JOSEPH NJUGUNA','','KANDERE/AB0226','na','NA','NA','NULL','NULL','NULL','2018-08-17 00:00:00','1',0,'NULL','NA',21,1,1,'0','NULL','',NULL,NULL,'NA'),(2683,1,'JUSTUS MAZINI','JUSTUS MOGENI','','JUSTUS MAZINI/ZA0024','na','na','842','NULL','NULL','NULL','2018-08-30 00:00:00','1',0,'NULL','NYAMIRA',46,6,1,'0','NULL','',NULL,NULL,'NA'),(2684,1,'K-NAMI','NYAMBURI ALFRED','','K-NAMI/EB0038','na','na','842','NULL','NULL','NULL','2018-08-30 00:00:00','1',0,'NULL','NYAMIRA',46,6,1,'0','NULL','',NULL,NULL,'NA'),(2685,1,'EVAMO','EVAMO FARM','','EVAMO/EB0075','na','NA','NA','NULL','NULL','NULL','2018-09-05 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2686,1,'RICHARDSON','RICHARDSON ESTATE','','RICHARDSON/EB0081','na','NA','NA','NULL','NULL','NULL','2018-09-05 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2687,1,'ONDIEKI','ONDIEKI FARM','','ONDIEKI/EB0048','na','NA','NA','NULL','NULL','NULL','2018-09-05 00:00:00','1',0,'NULL','NA',45,6,1,'0','NULL','',NULL,NULL,'NA'),(2688,1,'OILYCREEK','CAXTON MBURU','','OILYCREEK/AC0064B','na','na','64572','NULL','NULL','NULL','2018-09-06 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'620','NULL','',NULL,NULL,'NA'),(2689,1,'MWANGI FARM','DENNIS KIKIU NJUGUNA','','MWANGI FARM/AA0265','na','NA','NA','NULL','NULL','NULL','2018-09-07 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2690,3,'ORENCHO','NYAMARAMBE F.C.S. LTD','','ORENCHO/XEA21F04','na','NA','35','NULL','NULL','NULL','2018-09-12 00:00:00','1',0,'NULL','KISII',45,6,1,'0','1855','',NULL,NULL,'NA'),(2691,1,'PRIELMI','PRIELMI FARM','','PRIELMI/AA0838','na','723559184','90','NULL','NULL','NULL','2018-09-12 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2692,1,'BARAKA KIHEO','ANASTACIA WANJIRU NJARARUHI','','BARAKA KIHEO/AB0685','na','na','944','NULL','NULL','NULL','2018-09-13 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2693,1,'CRESENT BEVERAGES','CRESENT BEVERAGES FARM','','CRESENT BEVERAGES/BF0276','na','na','NA','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','NA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2694,1,'SAVATIA','BENARD KYALO NZAU','','SAVATIA/BF0291','na','na','62267','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','NAIROBI',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2695,1,'LYNDI','ISAAC MULWA MUTHIANI','','LYNDI/BF0076','na','na','1027','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','TALA',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2697,1,'MUTHIO','MUTHIO MASIKA','','MUTHIO/BF0231B','na','na','1074','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2698,1,'ITUNI','HENRY MUNYAO KYAKA','','ITUNI/BF0175','na','na','1438','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2699,1,'KAWAUNI','SHADRACK KIVUVA KITUKU','','KAWAUNI/BF0282','na','na','1030','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KITWII',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2700,1,'MWEU','JOHN IMENYI MWEU','','MWEU/BF0149B','na','na','83','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','MACHAKOS',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2701,1,'NDIVO','PIUS MBEU NDIVO','','NDIVO/BF0302','na','na','1262','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2703,1,'MULI FARM','JOSEPH MULI IMENYI','','MULI/BF0149A','na','na','1262','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2704,1,'MUSYOKI','MUSYOKI MUTISYA','','MUSYOKI/BF0149C','na','na','1262','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2705,1,'NGUUMO','CHARLES MUTUA KILONZO','','NGUUMO/BF0265','na','na','1070','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2706,1,'NZUKI','WILLIAM NZUKI MAKAU','','NZUKI/BF0149D','na','na','1262','NULL','NULL','NULL','2018-09-13 00:00:00','1',0,'NULL','KANGUNDO',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2707,1,'NGURUNGA','JOSPHAT  N MWANGI','','NGURUNGA/AA0023','na','NA','56301','NULL','NULL','NULL','2018-09-20 00:00:00','1',0,'NULL','NAIROBI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2708,1,'KAVEKE','JONATHAN MUTHAMA ULANGA','','KAVEKE/BF0283','na','NA','1070','NULL','NULL','NULL','2018-09-24 00:00:00','1',0,'NULL','KITWII',48,5,1,'0','NULL','',NULL,NULL,'NA'),(2709,3,'MUSOA','KIKIMA F.C.S. LTD','','MUSOA/XBE04F07','na','NA','4','NULL','NULL','NULL','2018-09-26 00:00:00','1',0,'NULL','90125',48,5,1,'0','318','',NULL,NULL,'NA'),(2710,1,'JOEDIAH','JOSEPH KARUGA IGAMBA','','JOEDIAH/AA0936','na','na','48','NULL','NULL','NULL','2018-09-28 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2711,1,'GATIMBI','FREDRICK M\'MBUTURA N\'MAINGI','','GATIMBI/BB0050','na','NA','NA','NULL','NULL','NULL','2018-10-01 00:00:00','1',0,'NULL','NA',49,5,1,'0','NULL','',NULL,NULL,'NA'),(2712,1,'BRAMEN','FRED KURIA GACHIGUA','','BRAMEN/AB0670','na','NA','6081','NULL','NULL','NULL','2018-10-01 00:00:00','1',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2713,1,'GICHINGA','GICHINGA FARM','','GICHINGA/AC0075','na','na','NA','NULL','NULL','NULL','2018-10-01 00:00:00','1',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2714,1,'COURTYARD','PATRICIA NYAMBURA KAGERA','','COURTYARD/AB0683','na','NA','907','NULL','NULL','NULL','2018-10-03 00:00:00','2',0,'NULL','THIKA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2715,1,'BARAKA A','CHRISTOPHER M GITAU','','BARAKA A/AA0767A','na','na','899','NULL','NULL','NULL','2018-10-04 00:00:00','17',0,'NULL','GITHUNGURI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2716,1,'BARAKA B','PETER GITAU CHEGE','','BARAKA B/AA0767B','na','na','899','NULL','NULL','NULL','2018-10-04 00:00:00','17',0,'NULL','GITHUNGURI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2717,1,'SIMWIKA','SIMON MAINA KAMUIRU','','SIMWIKA/AA0424B','na','NA','171','NULL','NULL','NULL','2018-10-08 00:00:00','3',0,'NULL','RUIRU',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2718,2,'KOMOTHAI FCS','KOMOTHAI C.G.C.S LTD','','KOMOTHAI FCS/XAA03','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2719,3,'RIAKAHARA','KOMOTHAI C.G.C.S LTD','','RIAKAHARA/XAA03F01','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2720,3,'GATHIRUINI','KOMOTHAI C.G.C.S LTD','','GATHIRUINI/XAA03F02','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2721,3,'BARIKONGO','KOMOTHAI C.G.C.S LTD','','BARIKONGO/XAA03F03','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2722,3,'KAGWANJA','KOMOTHAI C.G.C.S LTD','','KAGWANJA/XAA03F04','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2723,3,'KIRURA','KOMOTHAI C.G.C.S LTD','','KIRURA/XAA03F05','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2724,3,'KOROKORO','KOMOTHAI C.G.C.S LTD','','KOROKORO/XAA03F06','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2725,3,'GITHONGO KOMO','KOMOTHAI C.G.C.S LTD','','GITHONGO/XAA03F07','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2726,3,'THIURURI','KOMOTHAI C.G.C.S LTD','','THIURURI/XAA03F08','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2727,3,'KAIBU','KOMOTHAI C.G.C.S LTD','','KAIBU/XAA03F09','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2728,3,'NEW THUITA','KOMOTHAI C.G.C.S LTD','','NEW THUITA/XAA03F10','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2729,3,'KANAKE','KOMOTHAI C.G.C.S LTD','','KANAKE/XAA03F11','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2730,3,'GATUYU','KOMOTHAI C.G.C.S LTD','','GATUYU/XAA03F12','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2731,3,'KAMUCHEGE','KOMOTHAI C.G.C.S LTD','','KAMUCHEGE/XAA03F13','na','na','276','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','RUIRU',22,1,1,'0','2718','',NULL,NULL,'NA'),(2732,1,'GIAKA','GIAKA FARM','','GIAKA/AA0767','na','0722 921906','899','NULL','NULL','NULL','2018-10-11 00:00:00','17',0,'NULL','GITHUNGURI',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2733,1,'SUNNYDALE','SUNNYDALE FARM','','SUNNYDALE/AB0041C','na','na','NA','NULL','NULL','NULL','2018-10-11 00:00:00','18',0,'NULL','NA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2734,1,'LENA','LYDIAH WAMAITHA NJOROGE','','LENA/AA0757A','na','na','104','NULL','NULL','NULL','2018-10-11 00:00:00','17',0,'NULL','NGEWA',22,1,1,'0','NULL','',NULL,NULL,'NA'),(2735,1,'EVAS','ROSEMARY KITHIRA MURORIA','','EVAS/AG0264','na','na','31','NULL','NULL','NULL','2018-10-11 00:00:00','1',0,'NULL','KARATINA',19,1,1,'0','NULL','',NULL,NULL,'NA'),(2736,2,'SIBUMBA FCS','SIBUMBA F.C.SOC LTD','','SIBUMBA FCS/XDA21','na','na','264','NULL','NULL','NULL','2018-10-12 00:00:00','1',0,'NULL','CHWELE',39,6,1,'50202','2736','',NULL,NULL,'NA'),(2737,3,'SIBUMBA','SIBUMBA F.C.SOC LTD','','SIBUMBA/XDA21F01','na','na','264','NULL','NULL','NULL','2018-10-12 00:00:00','1',0,'NULL','CHWELE',39,6,1,'50202','2736','',NULL,NULL,'NA');
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
  `csn_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_seasons_csn`
--

LOCK TABLES `coffee_seasons_csn` WRITE;
/*!40000 ALTER TABLE `coffee_seasons_csn` DISABLE KEYS */;
INSERT INTO `coffee_seasons_csn` VALUES (1,'2014/2015','2016-08-11 08:10:07'),(2,'2015/2016','2016-08-11 08:10:07'),(3,'2016/2017','2016-10-05 13:18:55'),(4,'2017/2018','2017-10-04 05:23:14'),(5,'2018/2019','2018-10-03 05:49:44');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_items_dit`
--

LOCK TABLES `delivery_items_dit` WRITE;
/*!40000 ALTER TABLE `delivery_items_dit` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `green_comments_grcm`
--

LOCK TABLES `green_comments_grcm` WRITE;
/*!40000 ALTER TABLE `green_comments_grcm` DISABLE KEYS */;
INSERT INTO `green_comments_grcm` VALUES (26,NULL,4,NULL,NULL,9969),(27,NULL,33,NULL,NULL,9969),(28,NULL,89,NULL,NULL,9969);
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
  `ctr_id` int(11) DEFAULT NULL,
  `wb_id` int(11) DEFAULT NULL,
  `gr_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gr_confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grn_gr`
--

LOCK TABLES `grn_gr` WRITE;
/*!40000 ALTER TABLE `grn_gr` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupmenu_gpm`
--

LOCK TABLES `groupmenu_gpm` WRITE;
/*!40000 ALTER TABLE `groupmenu_gpm` DISABLE KEYS */;
INSERT INTO `groupmenu_gpm` VALUES (1,4,1,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(2,4,3,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(3,4,4,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(4,4,5,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(5,4,6,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(6,4,7,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(7,4,8,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(8,4,9,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(9,4,10,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(10,4,11,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(11,4,12,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(12,4,13,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(13,4,14,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(14,4,15,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(495,4,15,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(496,4,16,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(497,4,17,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(498,4,18,'[\"1\",\"2\",\"4\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(499,4,19,'[\"1\",\"2\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(500,4,20,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(501,4,21,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(502,4,22,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(503,4,23,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(504,4,24,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(505,4,25,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(506,4,26,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(507,4,27,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(508,4,28,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(509,4,29,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(510,4,30,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(511,4,31,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00');
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
  PRIMARY KEY (`id`),
  KEY `grower_certifications_cgr_id_foreign` (`cgr_id`),
  KEY `grower_certifications_crt_id_foreign` (`crt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=314 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grower_certifications`
--

LOCK TABLES `grower_certifications` WRITE;
/*!40000 ALTER TABLE `grower_certifications` DISABLE KEYS */;
INSERT INTO `grower_certifications` VALUES (1,92,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(2,92,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(3,92,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(4,92,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(5,87,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(6,87,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(7,87,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(8,87,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(9,76,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(10,76,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(11,76,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(12,76,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(13,59,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(14,59,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(15,59,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(16,59,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(17,39,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(18,39,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(19,39,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(20,39,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(21,1862,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(22,1862,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(23,1862,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(24,1862,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(25,72,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(26,72,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(27,72,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(28,72,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(29,1928,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(30,1928,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(31,1928,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(32,1928,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(33,77,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(34,102,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(35,102,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(36,102,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(37,102,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(38,79,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(39,79,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(40,79,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(41,79,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(42,61,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(43,61,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(44,61,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(45,61,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(46,45,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(47,45,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(48,45,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(49,45,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(50,2543,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(51,2543,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(52,29,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(53,29,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(54,29,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(55,29,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(56,1796,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(57,205,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(58,205,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(59,206,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(60,206,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(61,207,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(62,207,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(63,208,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(64,208,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(65,209,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(66,209,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(67,210,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(68,211,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(69,211,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(70,212,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(71,213,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(72,213,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(73,214,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(74,215,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(75,216,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(76,217,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(77,2057,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(78,2057,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(79,2058,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(80,227,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(81,227,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(82,229,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(83,229,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(84,230,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(85,230,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(86,1963,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(87,1963,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(88,1964,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(89,1964,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(90,1965,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(91,1965,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(92,1966,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(93,1966,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(94,1967,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(95,1967,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(96,237,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(97,244,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(98,2105,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(99,2106,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(100,2107,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(101,2108,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(102,2109,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(103,2110,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(104,2110,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(105,2174,2,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(106,259,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(107,259,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(108,260,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(109,260,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(110,261,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(111,261,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(112,262,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(113,262,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(114,263,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(115,264,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(116,265,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(117,265,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(118,266,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(119,266,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(120,267,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(121,267,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(122,268,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(123,268,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(124,269,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(125,269,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(126,270,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(127,270,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(128,246,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(129,246,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(130,247,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(131,247,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(132,248,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(133,248,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(134,249,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(135,249,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(136,250,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(137,250,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(138,251,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(139,251,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(140,252,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(141,252,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(142,253,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(143,253,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(144,254,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(145,254,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(146,255,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(147,255,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(148,256,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(149,256,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(150,257,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(151,257,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(152,258,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(153,258,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(154,2075,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(155,2083,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(156,271,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(157,272,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(158,273,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(159,274,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(160,275,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(161,276,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(162,277,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(163,278,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(164,279,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(165,280,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(166,283,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(167,284,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(168,285,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(169,1884,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(170,1885,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(171,315,3,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(172,315,4,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(173,319,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(174,320,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(175,321,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(176,1809,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(177,1810,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(178,1811,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(179,1812,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(180,327,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(181,328,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(182,329,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(183,1815,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(184,1816,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(185,1817,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(186,330,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(187,331,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(188,332,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(189,333,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(190,334,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(191,335,5,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(192,2568,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(193,2569,6,'2018-10-24 10:09:39','2018-10-24 10:09:39'),(194,92,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(195,92,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(196,92,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(197,92,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(198,87,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(199,87,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(200,87,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(201,87,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(202,76,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(203,76,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(204,76,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(205,76,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(206,59,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(207,59,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(208,59,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(209,59,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(210,39,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(211,39,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(212,39,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(213,39,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(214,1862,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(215,1862,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(216,1862,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(217,1862,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(218,72,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(219,72,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(220,72,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(221,72,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(222,1928,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(223,1928,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(224,1928,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(225,1928,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(226,77,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(227,102,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(228,102,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(229,102,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(230,102,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(231,79,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(232,79,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(233,79,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(234,79,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(235,61,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(236,61,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(237,61,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(238,61,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(239,45,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(240,45,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(241,45,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(242,45,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(243,2543,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(244,2543,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(245,29,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(246,29,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(247,29,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(248,29,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(249,1796,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(250,210,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(251,212,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(252,214,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(253,215,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(254,216,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(255,217,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(256,2057,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(257,2057,6,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(258,227,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(259,227,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(260,229,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(261,229,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(262,230,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(263,230,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(264,237,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(265,244,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(266,2105,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(267,2106,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(268,2107,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(269,2108,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(270,2109,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(271,2110,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(272,2110,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(273,2174,2,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(274,263,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(275,264,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(276,2075,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(277,2083,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(278,271,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(279,272,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(280,273,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(281,274,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(282,275,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(283,276,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(284,277,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(285,278,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(286,279,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(287,280,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(288,283,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(289,284,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(290,285,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(291,1884,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(292,1885,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(293,315,3,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(294,315,4,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(295,319,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(296,320,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(297,321,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(298,1809,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(299,1810,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(300,1811,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(301,1812,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(302,327,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(303,328,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(304,329,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(305,1815,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(306,1816,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(307,1817,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(308,330,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(309,331,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(310,332,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(311,333,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(312,334,5,'2018-10-25 06:05:44','2018-10-25 06:05:44'),(313,335,5,'2018-10-25 06:05:44','2018-10-25 06:05:44');
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
  `it_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `it_client_table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_it`
--

LOCK TABLES `items_it` WRITE;
/*!40000 ALTER TABLE `items_it` DISABLE KEYS */;
/*!40000 ALTER TABLE `items_it` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location_loc`
--

DROP TABLE IF EXISTS `location_loc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location_loc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_id` int(11) DEFAULT NULL,
  `loc_row` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loc_column` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loc_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location_loc`
--

LOCK TABLES `location_loc` WRITE;
/*!40000 ALTER TABLE `location_loc` DISABLE KEYS */;
/*!40000 ALTER TABLE `location_loc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `MaterialID` int(11) NOT NULL AUTO_INCREMENT,
  `MaterialName` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `CleanOrUnmilled` char(1) DEFAULT NULL,
  `MbuniOrPerchment` char(1) DEFAULT NULL,
  `MinClassInMainCataloque` int(11) DEFAULT NULL,
  `CreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Value` int(11) DEFAULT NULL,
  `MiscValue` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaterialID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'P1','Parchment firsts ','P','P',0,'2015-04-23 06:22:42',28,NULL),(2,'P2','Parchment seconds ','P','P',0,'2015-04-23 06:22:42',27,NULL),(3,'P3','Parchment thirds ','P','P',0,'2015-04-23 06:22:42',25,NULL),(4,'PL','Parchment lights ','P','P',0,'2015-04-23 06:22:42',25,NULL),(5,'MBUNI','Unhulled dry cherry mbuni','P','M',0,'2015-04-23 06:22:42',24,NULL),(6,'AA','AA clean','C','P',1,'2015-04-23 06:22:42',7,13),(7,'AB','AB clean','C','P',1,'2015-04-23 06:22:42',4,10),(8,'TT','TT clean','C','P',1,'2015-04-23 06:22:42',2,8),(9,'C','C clean','C','P',1,'2015-04-23 06:22:42',3,9),(10,'T','T clean','C','P',1,'2015-04-23 06:22:42',1,7),(11,'PB','PB clean','C','P',1,'2015-04-23 06:22:42',5,11),(12,'E','E clean','C','P',1,'2015-04-23 06:22:42',6,12),(13,'HE','Hulled Ears','C','P',0,'2015-04-23 06:22:42',8,6),(14,'MH','Mbuni Heavy','C','M',0,'2015-04-23 06:22:42',14,15),(15,'ML','Mbuni Light','C','M',0,'2015-04-23 06:22:42',15,14),(20,'SB','Sorted Beans','C','P',0,'2015-04-23 06:22:42',13,1),(21,'UG','Ungraded Coffee','C','P',0,'2015-04-23 06:22:42',9,5),(22,'UG1','Ungraded Coffee 1','C','P',0,'2015-04-23 06:22:42',10,4),(23,'UG2','Ungraded Coffee 2','C','P',0,'2015-04-23 06:22:42',11,3),(24,'UG3','Ungraded Coffee 3','C','P',0,'2015-04-23 06:22:42',12,2),(25,'ESTATE CURED','Estate Cured ','C','M',0,'2015-04-23 06:22:42',16,NULL),(32,'NCE SWEEPINGS','Sweepings','C','P',0,'2015-04-23 06:22:42',17,NULL),(34,'QUALITY PARCHMENT SWEEPINGS','Sweepings','P','P',0,'2015-06-18 12:01:02',18,NULL),(35,'MILL CLEAN SWEEPINGS','Sweepings','C','P',0,'2015-06-18 12:01:02',19,NULL),(36,'WAREHOUSE SWEEPINGS','Sweepings','C','P',0,'2015-06-18 12:01:02',20,NULL),(37,'QUALITY CLEAN SWEEPINGS','Sweepings','C','P',0,'2015-06-18 12:01:02',21,NULL),(38,'CHIPPY AND PODS','Sweepings','C','P',0,'2015-06-18 12:02:33',22,NULL),(39,'MILL PARCHMENT SWEEPINGS','Sweepings','P','P',0,'2015-06-18 12:02:33',23,NULL),(40,'SB',NULL,'C','P',NULL,'2015-09-18 08:46:31',24,NULL),(41,'ML1',NULL,'C','P',0,'2016-05-06 13:38:36',25,NULL),(42,'ML2',NULL,'C','M',0,'2016-05-06 13:38:43',26,NULL);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_mn`
--

LOCK TABLES `menu_mn` WRITE;
/*!40000 ALTER TABLE `menu_mn` DISABLE KEYS */;
INSERT INTO `menu_mn` VALUES (1,'Department','Add/update department','settingsdepartment',2,15,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(3,'Menu','Add/update menus','settingsmenu',2,15,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(4,'Home','View home page','home',1,0,'coffee',1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(5,'Registration','Top menu registration','registration',1,0,'user-plus',2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(6,'Users','Register users','registeruser',2,5,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(7,'UserManager','Manage users and their roles','usermanager',1,0,'users',3,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(8,'Roles','Add roles','roles',2,7,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(9,'Role User','Add users','rolesuser',2,7,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(10,'Service/ Customer Relation','Manage all growers activities','#',1,0,'file',4,'2018-10-21 03:41:54',NULL),(11,'Weighbridge','Weigh trucks','weighbridge',1,0,'truck',5,'2018-10-21 03:41:54',NULL),(12,'Quality','Quality operatins','#',1,0,'thumbs-up',6,'2018-10-21 03:41:54',NULL),(13,'Warehouse','Warehuse management','#',1,0,'building',7,'2018-10-21 03:41:54',NULL),(14,'Processing','Handle all processing','#',1,0,'star',8,'2018-10-21 03:41:54',NULL),(15,'Settings','Application settings','#',1,0,'cog',9,'2018-10-21 03:41:54',NULL),(16,'Intake Ticket - IN','Capture weight in','weighbridge',2,11,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(17,'Intake Ticket - OUT','Capture weight out','weighbridgeout',2,11,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(18,'booking',NULL,'booking',2,10,'ca',1,'2018-10-22 12:52:17',NULL),(19,'growers',NULL,'settingsgrowers',2,10,'calculator',2,'2018-10-25 06:04:08',NULL);
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
INSERT INTO `migrations` VALUES ('2018_10_22_081111_create_booking_table',1),('2018_10_22_084243_create_booking_items_table',1),('2018_10_22_084727_create_partchment_table',1),('2018_10_22_085114_add_fk_pty_to_bki_table',1),('2018_10_22_085431_create_contract_type_table',1),('2018_10_22_085708_create_terms_table',1),('2018_10_22_090029_create_service_contract_sct_table',1),('2018_10_22_090551_create_sct_contract_terms_terms_table',1),('2018_10_22_144438_create_booking_view',2),('2018_10_22_145833_rename_columns_in_growers_table',2),('2018_10_22_150321_rename_coffee_growers_table_in_growers_table',3),('2018_10_22_151117_create_agent_agt_table',4),('2018_10_22_152446_create_booking_view01',5),('2018_10_22_152844_rename_cgr_organization_table_in_growers_table',6),('2018_10_24_060307_add_pin_column_to_growers_table',7),('2018_10_24_073547_create_grower_certifications_table',8),('2018_10_24_150924_create_booking_items_view',9),('2018_10_24_151523_create_saleable_status',10),('2018_10_25_083946_create_cofee_class_table',11),('2018_10_24_112303_create_parking_lots_table',12),('2018_10_24_112422_create_items_table',12),('2018_10_24_113202_rename_weighbridge_table',12),('2018_10_24_115105_create_weighbridge_table',12),('2018_10_24_144203_rename_weighbridge_info_columns',12),('2018_10_25_084947_create_milling_status_mst_table',12),('2018_10_26_121253_create_quality_tables',13),('2018_10_24_172133_add_weighbridge_info_id',14),('2018_10_30_130601_update_weighbridge_table',15),('2018_10_30_141658_create_table_delivery_items',15),('2018_10_30_163830_create_table_outturn_number_settings',15),('2018_10_31_090345_add_quality_fields_to_qualty_details_qltyd_table',15),('2018_10_31_102812_add_st_ids_to_green_comments_grcm_table',15),('2018_10_31_103317_add_parchment_to_qualty_details_qltyd_table',15),('2018_10_31_104019_create_cup_comments_table',15),('2018_10_31_105724_create_roast_comments_table',16),('2018_10_31_161645_add_dont_to_qualty_details_qltyd_table',17);
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
) ENGINE=InnoDB AUTO_INCREMENT=6235 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packaging_pkg`
--

LOCK TABLES `packaging_pkg` WRITE;
/*!40000 ALTER TABLE `packaging_pkg` DISABLE KEYS */;
/*!40000 ALTER TABLE `packaging_pkg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parchment_type_pty`
--

DROP TABLE IF EXISTS `parchment_type_pty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parchment_type_pty` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `pty_name` varchar(50) NOT NULL,
  `pty_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parchment_type_pty`
--

LOCK TABLES `parchment_type_pty` WRITE;
/*!40000 ALTER TABLE `parchment_type_pty` DISABLE KEYS */;
INSERT INTO `parchment_type_pty` VALUES (1,'P1','2016-08-12 03:58:23'),(2,'P2','2016-08-12 03:59:22'),(3,'P3','2016-08-12 03:59:22'),(4,'PL','2016-08-12 03:59:22'),(5,'MBUNI','2016-08-12 03:59:22'),(6,'ESTATE CURED','2016-09-16 05:09:55'),(7,'CLEAN','2016-09-16 05:48:56');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking_lots_pl`
--

LOCK TABLES `parking_lots_pl` WRITE;
/*!40000 ALTER TABLE `parking_lots_pl` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_charges_prcgs`
--

LOCK TABLES `process_charges_prcgs` WRITE;
/*!40000 ALTER TABLE `process_charges_prcgs` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=62464 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_analysis_type_qat`
--

LOCK TABLES `quality_analysis_type_qat` WRITE;
/*!40000 ALTER TABLE `quality_analysis_type_qat` DISABLE KEYS */;
INSERT INTO `quality_analysis_type_qat` VALUES (1,'Green',NULL,'2017-02-06 05:55:12','2017-02-06 05:55:12'),(2,'Screen',NULL,'2017-02-06 05:55:12','2017-02-06 05:55:12'),(3,'Cup',NULL,'2017-02-06 05:55:12','2017-02-06 05:55:12');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_groups_qg`
--

LOCK TABLES `quality_groups_qg` WRITE;
/*!40000 ALTER TABLE `quality_groups_qg` DISABLE KEYS */;
INSERT INTO `quality_groups_qg` VALUES (1,'Green Size',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(2,'Green Colour',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(3,'Green Defects',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(4,'Roast Type',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(5,'Roast  Centre Cut',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(6,'Roast Defects',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(7,'Cup Acidity',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(8,'Cup  Body',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(9,'Cup Taints',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(10,'Cup  Flavor/Aroma',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(11,'Cup  Quality',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(12,'Overal Class',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(13,'Parchment',NULL,NULL,NULL),(14,'Parchment Screens',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_parameters_qp`
--

LOCK TABLES `quality_parameters_qp` WRITE;
/*!40000 ALTER TABLE `quality_parameters_qp` DISABLE KEYS */;
INSERT INTO `quality_parameters_qp` VALUES (1,1,'Bold (Very)',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(2,1,'Bold',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(3,1,'Medium Bold',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(4,1,'Medium',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(5,1,'Small',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(6,1,'Very Small',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(7,2,'Bluish',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(8,2,'Brownish',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(9,2,'Brownish Green',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(10,2,'Brownish Gray Green',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(11,2,'Greenish',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(12,2,'Greyish Green',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(13,2,'Greyish Blue',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(14,3,'Coated (Heavily)',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(15,3,'Coated',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(16,3,'Coated(Slighlty)',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(17,3,'Sours',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(18,3,'Stinkers',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(19,3,'Insect Damaged(Severe)',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(20,3,'Insect Damaged',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(21,3,'Diseased',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(22,3,'Unevenly Dried',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(23,3,'Green Water Damages',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(24,3,'Ambers',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(25,3,'Shrivelled',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(26,3,'Ragged',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(27,3,'Immatures',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(28,3,'Pulper Damages',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(29,3,'Blacks',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(30,4,'Brilliant',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(31,4,'Bright',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(32,4,'Ordinary',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(33,2,'Dullish',NULL,'2017-02-28 07:51:49','2016-11-23 04:44:49'),(34,4,'Dull',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(35,5,'White',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(36,5,'Normal',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(37,5,'Brownish',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(38,6,'Open',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(39,6,'Softs',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(40,6,'Pales',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(41,7,'Pointed',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(42,7,'Medium',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(43,7,'Light Medium',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(44,7,'Light',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(45,7,'Lacking',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(46,7,'Very Light',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(47,7,'Sharp',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(48,8,'Full',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(49,8,'Medium',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(50,8,'Light',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(51,8,'Lacking',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(52,8,'Harsh',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(54,9,'Earthy',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(55,9,'Grassy',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(56,9,'Musty',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(57,9,'Sourish',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(58,9,'Woody',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(59,9,'Fermented Slightly',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(60,9,'Fermented',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(61,9,'Fermented Strongly',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(62,9,'Onion',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(63,9,'Foul',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(64,10,'Floral',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(65,10,'Spicy',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(66,10,'Fruity',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(67,10,'Roasted Nuts',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(68,10,'Chocholate',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(69,10,'Lemon',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(70,10,'BlackCurrent',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(71,10,'Vanilla',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(72,10,'Honeyed',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(73,10,'Butter',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(74,11,'Fair To Good',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(75,11,'Fully FAQ',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(76,11,'FAQ Minus',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(77,11,'Grinder Plus',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(78,11,'Grinder',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(79,11,'Low Grinder',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(80,11,'Mbuni Clean',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(81,1,'Medium Mixed',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(83,2,'Whitish',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(84,2,'Dullish Green',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(85,3,'Foxy',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(86,11,'FAQ',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(87,11,'Mbuni Unclean',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(88,8,'Light Medium',NULL,'2016-11-23 04:44:48','2016-11-23 04:44:49'),(89,3,'Few pods','For milled coffee','2016-11-23 04:44:48','2016-11-23 04:44:49'),(90,3,'Slight Unevenly dried','Green coffee','2016-11-23 04:44:48','2016-11-23 04:44:49'),(91,3,'Many ambers','Green coffee','2016-11-23 04:44:48','2016-11-23 04:44:49'),(92,3,'Few ambers','Green coffee','2016-11-23 04:44:48','2016-11-23 04:44:49'),(93,3,'Odd Sour','Green Coffee','2016-11-23 04:44:48','2016-11-23 04:44:49'),(94,3,'Ears',NULL,'2017-02-28 11:48:50',NULL),(95,2,'Greyish',NULL,'2017-02-28 11:52:50',NULL),(96,3,'Semi-Stinkers',NULL,'2017-03-01 05:53:56',NULL),(97,3,'Stones',NULL,'2017-03-01 06:30:44',NULL),(98,3,'Pods',NULL,'2017-03-01 13:57:54',NULL),(99,3,'Broken',NULL,'2017-03-02 07:24:08',NULL),(100,3,'Parchment',NULL,'2017-03-06 07:00:16',NULL),(101,3,'Maize',NULL,'2017-03-08 09:39:50',NULL),(102,3,'Skins',NULL,'2017-03-09 07:23:55',NULL),(103,3,'Whitish Beans',NULL,'2017-03-09 08:23:28',NULL),(104,3,'Odd Stinkers',NULL,'2017-03-13 07:54:16',NULL),(105,3,'Odd Blacks',NULL,'2017-04-12 07:55:16',NULL),(106,3,'Odd Pods',NULL,'2017-04-12 07:55:20',NULL),(107,3,'Faded',NULL,'2017-05-03 08:36:20',NULL),(108,3,'Fading',NULL,'2017-05-03 08:36:20',NULL),(109,2,'Yellowish','Yellowish','2018-08-08 08:40:31',NULL),(110,2,'Yellowish Green','Yellowish Green','2018-08-08 08:40:53',NULL),(111,2,'Yellowish Brown','Yellowish Brown','2018-08-08 08:41:24',NULL),(112,3,'Foreign Matter','Foreign Matter','2018-08-08 08:41:54',NULL),(113,13,'Creamy',NULL,NULL,NULL),(114,13,'Underdried',NULL,NULL,NULL),(115,13,'Brownish',NULL,NULL,NULL),(116,13,'Dehusked',NULL,NULL,NULL),(117,13,'Fully Brownish',NULL,NULL,NULL),(118,13,'Many Open',NULL,NULL,NULL),(119,13,'Brownish Tinge',NULL,NULL,NULL),(120,13,'Pods',NULL,NULL,NULL),(121,13,'Creamy mixed/Brownish tinge',NULL,NULL,NULL),(122,13,'Unevenly Dry',NULL,NULL,NULL),(123,13,'Dirty',NULL,NULL,NULL);
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
  `st_mill_id` int(11) DEFAULT NULL,
  `st_wr_id` int(11) DEFAULT NULL,
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
  `dont` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_qualty_details_qltyd_coffee_details_cfd1_idx` (`st_mill_id`),
  KEY `fk_qualty_details_qltyd_processing_prcss1_idx` (`prcss_id`),
  KEY `fk_qualty_details_qltyd_screen_prcss1_idx` (`scr_id`),
  KEY `fk_qualty_details_qltyd_score_type_scrtyp1_idx` (`cp_id`),
  KEY `fk_qualty_details_qltyd_score_type_scrtyp2_idx` (`rw_id`),
  CONSTRAINT `fk_qualty_details_qltyd_processing_prcss1` FOREIGN KEY (`prcss_id`) REFERENCES `processing_prcss` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_quality_remarks_qrmk1` FOREIGN KEY (`scr_id`) REFERENCES `screens_scr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_score_type_scrtyp2` FOREIGN KEY (`rw_id`) REFERENCES `raw_score_rw` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_st_mill_id` FOREIGN KEY (`st_mill_id`) REFERENCES `stock_mill_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualty_details_qltyd`
--

LOCK TABLES `qualty_details_qltyd` WRITE;
/*!40000 ALTER TABLE `qualty_details_qltyd` DISABLE KEYS */;
INSERT INTO `qualty_details_qltyd` VALUES (4,9969,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,86,NULL,NULL,NULL,NULL,NULL,NULL,NULL,116,NULL),(5,9970,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,121,NULL),(6,9971,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,119,NULL),(7,9972,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,118,NULL),(8,9973,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,118,NULL),(9,9974,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,120,NULL),(10,9975,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,113,NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates_rts`
--

LOCK TABLES `rates_rts` WRITE;
/*!40000 ALTER TABLE `rates_rts` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region_rgn`
--

LOCK TABLES `region_rgn` WRITE;
/*!40000 ALTER TABLE `region_rgn` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  KEY `sct_contract_terms_sctt_term_id_foreign` (`term_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  PRIMARY KEY (`id`),
  KEY `service_contract_sct_cgr_id_foreign` (`cgr_id`),
  KEY `service_contract_sct_ct_id_foreign` (`ct_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`bt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_location_sloc`
--

LOCK TABLES `stock_location_sloc` WRITE;
/*!40000 ALTER TABLE `stock_location_sloc` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_location_sloc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_mill_st`
--

DROP TABLE IF EXISTS `stock_mill_st`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_mill_st` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csn_id` int(11) DEFAULT NULL,
  `material_id` int(10) DEFAULT NULL,
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
  KEY `fk_material_id_idx` (`material_id`),
  KEY `fk_grn_id_idx` (`grn_id`),
  KEY `fk_dispatch_id_idx` (`dp_id`),
  KEY `fk_season_id` (`csn_id`),
  CONSTRAINT `fk_dispatch_id` FOREIGN KEY (`dp_id`) REFERENCES `dispatch_dp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grn_id` FOREIGN KEY (`grn_id`) REFERENCES `grn_gr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_material_id` FOREIGN KEY (`material_id`) REFERENCES `material_mt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_season_id` FOREIGN KEY (`csn_id`) REFERENCES `coffee_seasons_csn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10788 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_mill_st`
--

LOCK TABLES `stock_mill_st` WRITE;
/*!40000 ALTER TABLE `stock_mill_st` DISABLE KEYS */;
INSERT INTO `stock_mill_st` VALUES (9969,2,NULL,3,462,NULL,NULL,'35NG0003','MGR3212',NULL,1,NULL,NULL,NULL,NULL,188,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9970,2,NULL,4,462,NULL,NULL,'35NG0002','MGR3212',NULL,1,NULL,NULL,NULL,NULL,890,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9971,2,NULL,1,462,NULL,NULL,'35NG0001','MGR3212',NULL,1,NULL,NULL,NULL,NULL,1359,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9972,2,NULL,2,453,NULL,NULL,'36NG0002','MGR3214',NULL,1,NULL,NULL,NULL,NULL,31,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9973,2,NULL,1,453,NULL,NULL,'36NG0001','MGR3214',NULL,1,NULL,NULL,NULL,NULL,150,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9974,2,NULL,5,453,NULL,NULL,'36NG0003','MGR3214',NULL,1,NULL,NULL,NULL,NULL,224,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9975,2,NULL,4,669,NULL,NULL,'35NG4002','MGR3215',NULL,1,NULL,NULL,NULL,NULL,11243,NULL,187,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9976,2,NULL,5,669,NULL,NULL,'35NG4003','MGR3215',NULL,1,NULL,NULL,NULL,NULL,15127,NULL,340,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9977,2,NULL,3,669,NULL,NULL,'35NG4004','MGR3215',NULL,1,NULL,NULL,NULL,NULL,7449,NULL,186,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9978,2,NULL,5,126,NULL,NULL,'15NG0187','MGR3216',NULL,1,NULL,NULL,NULL,NULL,780,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9979,2,NULL,4,800,NULL,NULL,'17NG0157','MGR2313',NULL,1,NULL,NULL,NULL,NULL,3620,NULL,113,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9980,2,NULL,1,852,NULL,NULL,'36NG0011','MGR3219/20',NULL,1,NULL,NULL,NULL,NULL,5931,NULL,145,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9981,2,NULL,1,399,NULL,NULL,'36NG0009','MGR3222',NULL,1,NULL,NULL,NULL,NULL,947,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9982,2,NULL,2,399,NULL,NULL,'36NG0013','MGR3222',NULL,1,NULL,NULL,NULL,NULL,31,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9983,2,NULL,1,53,NULL,NULL,'36NG0006','MGR3223',NULL,1,NULL,NULL,NULL,NULL,70,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9984,2,NULL,5,53,NULL,NULL,'36NG0008','MGR3223',NULL,1,NULL,NULL,NULL,NULL,343,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9985,2,NULL,3,53,NULL,NULL,'36NG0007','MGR3223',NULL,1,NULL,NULL,NULL,NULL,14,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9986,2,NULL,1,724,NULL,NULL,'36NG0012','MGR3224/25',NULL,1,NULL,NULL,NULL,NULL,15424,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9987,2,NULL,4,637,NULL,NULL,'36NG0005','MGR3227',NULL,1,NULL,NULL,NULL,NULL,2893,NULL,80,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9988,2,NULL,1,637,NULL,NULL,'36NG0004','MGR3227',NULL,1,NULL,NULL,NULL,NULL,9167,NULL,183,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9989,2,NULL,1,453,NULL,NULL,'36NG0014','MGR3226',NULL,1,NULL,NULL,NULL,NULL,247,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9990,2,NULL,1,109,NULL,NULL,'37NG0006','MGR3228',NULL,1,NULL,NULL,NULL,NULL,1194,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9991,2,NULL,1,236,NULL,NULL,'37NG0010','MGR3229',NULL,1,NULL,NULL,NULL,NULL,4534,NULL,91,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9992,2,NULL,3,665,NULL,NULL,'37NG0009','MGR3230',NULL,1,NULL,NULL,NULL,NULL,408,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9993,2,NULL,1,665,NULL,NULL,'37NG0008','MGR3230',NULL,1,NULL,NULL,NULL,NULL,2501,NULL,47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9994,2,NULL,1,38,NULL,NULL,'38NG0013','MGR3231/33',NULL,1,NULL,NULL,NULL,NULL,15310,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9995,2,NULL,3,665,NULL,NULL,'38NG0004','MGR3234',NULL,1,NULL,NULL,NULL,NULL,1841,NULL,45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9996,2,NULL,1,665,NULL,NULL,'38NG0003','MGR3234',NULL,1,NULL,NULL,NULL,NULL,1946,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9997,2,NULL,3,109,NULL,NULL,'38NG0002','MGR3235',NULL,1,NULL,NULL,NULL,NULL,92,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9998,2,NULL,1,236,NULL,NULL,'38NG0005','MGR3236',NULL,1,NULL,NULL,NULL,NULL,249,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(9999,2,NULL,1,724,NULL,NULL,'38NG0012','MGR3238/41',NULL,1,NULL,NULL,NULL,NULL,16516,NULL,320,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10000,2,NULL,1,687,NULL,NULL,'38NG0009','MGR3239/42',NULL,1,NULL,NULL,NULL,NULL,18055,NULL,346,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10001,2,NULL,1,584,NULL,NULL,'38NG0007','MGR3243',NULL,1,NULL,NULL,NULL,NULL,1859,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10002,2,NULL,4,468,NULL,NULL,'38NG0010','MGR3244/46',NULL,1,NULL,NULL,NULL,NULL,14908,NULL,400,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10003,2,NULL,4,584,NULL,NULL,'38NG0008','MGR3245',NULL,1,NULL,NULL,NULL,NULL,960,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10004,2,NULL,5,14,NULL,NULL,'22NG0074','MGR2890',NULL,1,NULL,NULL,NULL,NULL,183,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10005,2,NULL,1,511,NULL,NULL,'39NG0001','MGR3247',NULL,1,NULL,NULL,NULL,NULL,10407,NULL,202,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10006,2,NULL,4,511,NULL,NULL,'39NG0009','MGR3248',NULL,1,NULL,NULL,NULL,NULL,8051,NULL,220,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10007,2,NULL,1,582,NULL,NULL,'39NG0005','MGR3250',NULL,1,NULL,NULL,NULL,NULL,1898,NULL,39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10008,2,NULL,3,461,NULL,NULL,'39NG0004','MGR3249',NULL,1,NULL,NULL,NULL,NULL,258,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10009,2,NULL,1,461,NULL,NULL,'39NG0003','MGR3249',NULL,1,NULL,NULL,NULL,NULL,2098,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10010,2,NULL,1,852,NULL,NULL,'39NG0010','MGR3252',NULL,1,NULL,NULL,NULL,NULL,5440,NULL,125,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10011,2,NULL,1,852,NULL,NULL,'39NG0010','MGR3251',NULL,1,NULL,NULL,NULL,NULL,1344,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10012,2,NULL,1,839,NULL,NULL,'39NG0002','MGR3253',NULL,1,NULL,NULL,NULL,NULL,10380,NULL,201,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10013,2,NULL,3,637,NULL,NULL,'39NG0007','MGR3254',NULL,1,NULL,NULL,NULL,NULL,1435,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10014,2,NULL,1,637,NULL,NULL,'39NG0008','MGR3254',NULL,1,NULL,NULL,NULL,NULL,11108,NULL,220,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10015,2,NULL,1,392,NULL,NULL,'39NG0011','MGR3255',NULL,1,NULL,NULL,NULL,NULL,1198,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10016,2,NULL,1,392,NULL,NULL,'39NG0012','MGR3255',NULL,1,NULL,NULL,NULL,NULL,380,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10017,2,NULL,1,852,NULL,NULL,'39NG0010','MGR3256',NULL,1,NULL,NULL,NULL,NULL,1308,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10018,2,NULL,1,453,NULL,NULL,'40NG0007','MGR 3258',NULL,1,NULL,NULL,NULL,NULL,179,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10019,2,NULL,2,453,NULL,NULL,'40NG0008','MGR3258',NULL,1,NULL,NULL,NULL,NULL,34,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10020,2,NULL,1,160,NULL,NULL,'40NG0002','MGR3259',NULL,1,NULL,NULL,NULL,NULL,4572,NULL,90,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10021,2,NULL,1,160,NULL,NULL,'40NG0002','MGR3260',NULL,1,NULL,NULL,NULL,NULL,1043,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10022,2,NULL,2,160,NULL,NULL,'40NG0003','MGR3260',NULL,1,NULL,NULL,NULL,NULL,515,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10023,2,NULL,3,160,NULL,NULL,'40NG0004','MGR3260',NULL,1,NULL,NULL,NULL,NULL,803,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10024,2,NULL,4,160,NULL,NULL,'40NG0015','MGR3260',NULL,1,NULL,NULL,NULL,NULL,528,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10025,2,NULL,1,724,NULL,NULL,'40NG0011','MGR3262',NULL,1,NULL,NULL,NULL,NULL,8496,NULL,165,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10026,2,NULL,1,724,NULL,NULL,'40NG0011','MGR3263',NULL,1,NULL,NULL,NULL,NULL,8496,NULL,165,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10027,2,NULL,1,274,NULL,NULL,'40NG0010','MGR3266',NULL,1,NULL,NULL,NULL,NULL,10361,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10028,2,NULL,1,392,NULL,NULL,'40NG0012','MGR3267',NULL,1,NULL,NULL,NULL,NULL,334,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10029,2,NULL,1,392,NULL,NULL,'40NG0013','MGR3267',NULL,1,NULL,NULL,NULL,NULL,1155,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10030,2,NULL,1,464,NULL,NULL,'40NG0006','MGR3265',NULL,1,NULL,NULL,NULL,NULL,12366,NULL,250,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10031,2,NULL,1,464,NULL,NULL,'40NG0006','MGR3268',NULL,1,NULL,NULL,NULL,NULL,12367,NULL,250,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10032,2,NULL,1,623,NULL,NULL,'41NG0008','MGR3269',NULL,1,NULL,NULL,NULL,NULL,788,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10033,2,NULL,1,236,NULL,NULL,'41NG0003','MGR3270',NULL,1,NULL,NULL,NULL,NULL,2263,NULL,45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10034,2,NULL,3,236,NULL,NULL,'41NG0006','MGR3271',NULL,1,NULL,NULL,NULL,NULL,1370,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10035,2,NULL,1,236,NULL,NULL,'41NG0005','MGR3271',NULL,1,NULL,NULL,NULL,NULL,1487,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10036,2,NULL,3,236,NULL,NULL,'41NG0002','MGR3272',NULL,1,NULL,NULL,NULL,NULL,525,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10037,2,NULL,1,236,NULL,NULL,'41NG0001','MGR3272',NULL,1,NULL,NULL,NULL,NULL,2762,NULL,51,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10038,2,NULL,1,458,NULL,NULL,'42NG0001','MGR3273',NULL,1,NULL,NULL,NULL,NULL,7832,NULL,151,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10039,2,NULL,1,38,NULL,NULL,'41NG0014','MGR3274',NULL,1,NULL,NULL,NULL,NULL,10076,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10040,2,NULL,1,820,NULL,NULL,'38NG0011','MGR3275',NULL,1,NULL,NULL,NULL,NULL,4279,NULL,90,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10041,2,NULL,1,458,NULL,NULL,'42NG0001','MGR3276',NULL,1,NULL,NULL,NULL,NULL,7744,NULL,149,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10042,2,NULL,3,38,NULL,NULL,'41NG0015','MGR3277',NULL,1,NULL,NULL,NULL,NULL,9723,NULL,215,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10043,2,NULL,4,511,NULL,NULL,'41NG0011','MGR3278',NULL,1,NULL,NULL,NULL,NULL,8295,NULL,227,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10044,2,NULL,1,138,NULL,NULL,'41NG0010','MGR3279',NULL,1,NULL,NULL,NULL,NULL,8517,NULL,165,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10045,2,NULL,1,610,NULL,NULL,'40NG0001','MGR3280',NULL,1,NULL,NULL,NULL,NULL,12592,NULL,250,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10046,2,NULL,1,610,NULL,NULL,'40NG0001','MGR3281',NULL,1,NULL,NULL,NULL,NULL,12495,NULL,250,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10047,2,NULL,1,138,NULL,NULL,'41NG0010','MGR3282',NULL,1,NULL,NULL,NULL,NULL,8238,NULL,165,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10048,2,NULL,4,38,NULL,NULL,'41NG0022','MGR3283',NULL,1,NULL,NULL,NULL,NULL,8027,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10049,2,NULL,1,687,NULL,NULL,'41NG0012','MGR3284',NULL,1,NULL,NULL,NULL,NULL,10340,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10050,2,NULL,1,578,NULL,NULL,'41NG0018','MGR3285',NULL,1,NULL,NULL,NULL,NULL,10202,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10051,2,NULL,1,578,NULL,NULL,'41NG0018','MGR3286',NULL,1,NULL,NULL,NULL,NULL,7627,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10052,2,NULL,1,464,NULL,NULL,'41NG0017','MGR3287',NULL,1,NULL,NULL,NULL,NULL,11310,NULL,238,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10053,2,NULL,1,556,NULL,NULL,'41NG0019','MGR3288',NULL,1,NULL,NULL,NULL,NULL,9498,NULL,167,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10054,2,NULL,1,556,NULL,NULL,'41NG0019','MGR3289',NULL,1,NULL,NULL,NULL,NULL,797,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10055,2,NULL,1,852,NULL,NULL,'41NG0020','MGR3290',NULL,1,NULL,NULL,NULL,NULL,1315,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10056,2,NULL,1,852,NULL,NULL,'41NG0020','MGR3291',NULL,1,NULL,NULL,NULL,NULL,5239,NULL,120,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10057,2,NULL,1,578,NULL,NULL,'41NG0018','MGR3292',NULL,1,NULL,NULL,NULL,NULL,7674,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10058,2,NULL,1,687,NULL,NULL,'41NG0012','MGR3293',NULL,1,NULL,NULL,NULL,NULL,7331,NULL,142,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10059,2,NULL,1,350,NULL,NULL,'41NG0021','MGR3294',NULL,1,NULL,NULL,NULL,NULL,15443,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10060,2,NULL,3,858,NULL,NULL,'42NG0012','MGR3295',NULL,1,NULL,NULL,NULL,NULL,1095,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10061,2,NULL,1,858,NULL,NULL,'42NG0011','MGR3295',NULL,1,NULL,NULL,NULL,NULL,5199,NULL,98,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10062,2,NULL,1,537,NULL,NULL,'42NG0002','MGR3296',NULL,1,NULL,NULL,NULL,NULL,5171,NULL,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10063,2,NULL,1,537,NULL,NULL,'42NG0002','MGR3297',NULL,1,NULL,NULL,NULL,NULL,8100,NULL,156,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10064,2,NULL,1,537,NULL,NULL,'42NG0002','MGR3298',NULL,1,NULL,NULL,NULL,NULL,5187,NULL,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10065,2,NULL,3,461,NULL,NULL,'42NG0023','MGR3299',NULL,1,NULL,NULL,NULL,NULL,973,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10066,2,NULL,1,461,NULL,NULL,'42NG0022','MGR3299',NULL,1,NULL,NULL,NULL,NULL,2113,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10067,2,NULL,1,461,NULL,NULL,'42NG0024','MGR3300',NULL,1,NULL,NULL,NULL,NULL,2210,NULL,45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10068,2,NULL,3,461,NULL,NULL,'42NG0025','MGR3300',NULL,1,NULL,NULL,NULL,NULL,587,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10069,2,NULL,1,169,NULL,NULL,'42NG0036','MGR3301',NULL,1,NULL,NULL,NULL,NULL,12660,NULL,250,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10070,2,NULL,1,840,NULL,NULL,'42NG0041','MGR3302',NULL,1,NULL,NULL,NULL,NULL,11490,NULL,223,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10071,2,NULL,1,169,NULL,NULL,'42NG0036','MGR3302',NULL,1,NULL,NULL,NULL,NULL,13327,NULL,261,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10072,2,NULL,4,236,NULL,NULL,'42NG0016','MGR3306',NULL,1,NULL,NULL,NULL,NULL,840,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10073,2,NULL,1,236,NULL,NULL,'42NG0015','MGR3306',NULL,1,NULL,NULL,NULL,NULL,1380,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10074,2,NULL,1,537,NULL,NULL,'42NG0002','MGR3307',NULL,1,NULL,NULL,NULL,NULL,7999,NULL,155,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10075,2,NULL,3,304,NULL,NULL,'42NG0028','MGR3308',NULL,1,NULL,NULL,NULL,NULL,1836,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10076,2,NULL,2,304,NULL,NULL,'42NG0027','MGR3308',NULL,1,NULL,NULL,NULL,NULL,3132,NULL,60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10077,2,NULL,1,304,NULL,NULL,'42NG0026','MGR3308',NULL,1,NULL,NULL,NULL,NULL,3160,NULL,60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10078,2,NULL,1,820,NULL,NULL,'42NG0009','MGR3309',NULL,1,NULL,NULL,NULL,NULL,845,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10079,2,NULL,1,840,NULL,NULL,'42NG0041','MGR3311',NULL,1,NULL,NULL,NULL,NULL,10193,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10080,2,NULL,1,820,NULL,NULL,'42NG0009','MGR3320',NULL,1,NULL,NULL,NULL,NULL,543,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10081,2,NULL,1,840,NULL,NULL,'42NG0041','MGR3316',NULL,1,NULL,NULL,NULL,NULL,1550,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10082,2,NULL,1,840,NULL,NULL,'42NG0041','MGR3315',NULL,1,NULL,NULL,NULL,NULL,2656,NULL,52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10083,2,NULL,4,840,NULL,NULL,'42NG3002','MGR3315',NULL,1,NULL,NULL,NULL,NULL,7917,NULL,130,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10084,2,NULL,4,304,NULL,NULL,'42NG0031','MGR3318',NULL,1,NULL,NULL,NULL,NULL,1518,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10085,2,NULL,2,304,NULL,NULL,'42NG0030','MGR3318',NULL,1,NULL,NULL,NULL,NULL,2201,NULL,40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10086,2,NULL,3,304,NULL,NULL,'42NG0054','MGR3318',NULL,1,NULL,NULL,NULL,NULL,1513,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10087,2,NULL,1,304,NULL,NULL,'42NG0029','MGR3318',NULL,1,NULL,NULL,NULL,NULL,3417,NULL,61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10088,2,NULL,1,820,NULL,NULL,'42NG0009','MGR3319',NULL,1,NULL,NULL,NULL,NULL,950,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10089,2,NULL,3,274,NULL,NULL,'42NG0051','MGR3317',NULL,1,NULL,NULL,NULL,NULL,2474,NULL,67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10090,2,NULL,1,274,NULL,NULL,'42NG0050','MGR3317',NULL,1,NULL,NULL,NULL,NULL,1900,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10091,2,NULL,2,274,NULL,NULL,'42NG0035','MGR3317',NULL,1,NULL,NULL,NULL,NULL,5805,NULL,113,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10092,2,NULL,1,556,NULL,NULL,'42NG0017','MGR3315',NULL,1,NULL,NULL,NULL,NULL,858,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10093,2,NULL,1,556,NULL,NULL,'42NG0017','MGR3312',NULL,1,NULL,NULL,NULL,NULL,9946,NULL,170,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10094,2,NULL,1,453,NULL,NULL,'42NG0045','MGR3313',NULL,1,NULL,NULL,NULL,NULL,25,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10095,2,NULL,5,453,NULL,NULL,'42NG0046','MGR3313',NULL,1,NULL,NULL,NULL,NULL,187,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10096,2,NULL,3,839,NULL,NULL,'42NG3003','MGR3321',NULL,1,NULL,NULL,NULL,NULL,10267,NULL,201,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10097,2,NULL,1,458,NULL,NULL,'42NG0003','MGR3326',NULL,1,NULL,NULL,NULL,NULL,7789,NULL,149,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10098,2,NULL,1,501,NULL,NULL,'42NG0044','MGR3324',NULL,1,NULL,NULL,NULL,NULL,1518,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10099,2,NULL,1,501,NULL,NULL,'42NG0065','MGR3324',NULL,1,NULL,NULL,NULL,NULL,653,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10100,2,NULL,3,501,NULL,NULL,'42NG0064','MGR3324',NULL,1,NULL,NULL,NULL,NULL,45,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10101,2,NULL,2,501,NULL,NULL,'42NG0063','MGR3324',NULL,1,NULL,NULL,NULL,NULL,293,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10102,2,NULL,4,501,NULL,NULL,'42NG0062','MGR3325',NULL,1,NULL,NULL,NULL,NULL,173,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10103,2,NULL,2,501,NULL,NULL,'42NG0061','MGR3325',NULL,1,NULL,NULL,NULL,NULL,185,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10104,2,NULL,1,501,NULL,NULL,'42NG0043','MGR3325',NULL,1,NULL,NULL,NULL,NULL,912,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10105,2,NULL,5,298,NULL,NULL,'42NG0059','MGR3323',NULL,1,NULL,NULL,NULL,NULL,348,NULL,916,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10106,2,NULL,4,298,NULL,NULL,'42NG0021','MGR3323',NULL,1,NULL,NULL,NULL,NULL,916,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10107,2,NULL,3,298,NULL,NULL,'42NG0020','MGR3323',NULL,1,NULL,NULL,NULL,NULL,1164,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10108,2,NULL,2,298,NULL,NULL,'42NG0019','MGR3323',NULL,1,NULL,NULL,NULL,NULL,1887,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10109,2,NULL,1,298,NULL,NULL,'42NG0018','MGR3323',NULL,1,NULL,NULL,NULL,NULL,3414,NULL,66,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10110,2,NULL,1,458,NULL,NULL,'42NG0003','MGR3322',NULL,1,NULL,NULL,NULL,NULL,7819,NULL,151,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10111,2,NULL,3,177,NULL,NULL,'42NG0072','MGR3330',NULL,1,NULL,NULL,NULL,NULL,196,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10112,2,NULL,2,177,NULL,NULL,'42NG0071','MGR3330',NULL,1,NULL,NULL,NULL,NULL,91,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10113,2,NULL,1,177,NULL,NULL,'42NG0037','MGR3330',NULL,1,NULL,NULL,NULL,NULL,757,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10114,2,NULL,1,716,NULL,NULL,'42NG0038','MGR3329',NULL,1,NULL,NULL,NULL,NULL,1563,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10115,2,NULL,2,716,NULL,NULL,'42NG0069','MGR3329',NULL,1,NULL,NULL,NULL,NULL,180,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10116,2,NULL,3,716,NULL,NULL,'42NG0070','MGR3329',NULL,1,NULL,NULL,NULL,NULL,41,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10117,2,NULL,1,292,NULL,NULL,'42NG0039','MGR3328',NULL,1,NULL,NULL,NULL,NULL,475,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10118,2,NULL,3,292,NULL,NULL,'42NG0068','MGR3328',NULL,1,NULL,NULL,NULL,NULL,231,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10119,2,NULL,1,195,NULL,NULL,'42NG0066','MGR3327',NULL,1,NULL,NULL,NULL,NULL,148,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10120,2,NULL,2,195,NULL,NULL,'42NG0067','MGR3327',NULL,1,NULL,NULL,NULL,NULL,22,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10121,2,NULL,4,468,NULL,NULL,'42NG0049','MGR3331',NULL,1,NULL,NULL,NULL,NULL,2192,NULL,60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10122,2,NULL,1,468,NULL,NULL,'42NG0047','MGR3331',NULL,1,NULL,NULL,NULL,NULL,8542,NULL,171,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10123,2,NULL,1,350,NULL,NULL,'41NG0021','MGR3332',NULL,1,NULL,NULL,NULL,NULL,15385,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10124,2,NULL,1,464,NULL,NULL,'42NG0052','MGR3333',NULL,1,NULL,NULL,NULL,NULL,10494,NULL,212,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10125,2,NULL,3,852,NULL,NULL,'42NG0060','M',NULL,1,NULL,NULL,NULL,NULL,1137,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10126,2,NULL,1,440,NULL,NULL,'42NG0058','MGR3335',NULL,1,NULL,NULL,NULL,NULL,9958,NULL,191,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10127,2,NULL,1,462,NULL,NULL,'42NG0055','MGR3336',NULL,1,NULL,NULL,NULL,NULL,6179,NULL,145,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10128,2,NULL,1,92,NULL,NULL,'43NG0006','MGR3337',NULL,1,NULL,NULL,NULL,NULL,371,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10129,2,NULL,4,92,NULL,NULL,'43NG0009','MGR3337',NULL,1,NULL,NULL,NULL,NULL,461,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10130,2,NULL,2,92,NULL,NULL,'43NG0007','MGR3337',NULL,1,NULL,NULL,NULL,NULL,105,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10131,2,NULL,3,92,NULL,NULL,'43NG0008','MGR3337',NULL,1,NULL,NULL,NULL,NULL,335,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10132,2,NULL,4,637,NULL,NULL,'42NG0034','MGR3340',NULL,1,NULL,NULL,NULL,NULL,3902,NULL,110,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10133,2,NULL,3,637,NULL,NULL,'42NG0033','MGR3340',NULL,1,NULL,NULL,NULL,NULL,2961,NULL,66,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10134,2,NULL,1,637,NULL,NULL,'42NG0032','MGR3340',NULL,1,NULL,NULL,NULL,NULL,4604,NULL,94,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10135,2,NULL,3,852,NULL,NULL,'42NG0060','MGR3343',NULL,1,NULL,NULL,NULL,NULL,1225,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10136,2,NULL,3,852,NULL,NULL,'42NG0060','MGR3344',NULL,1,NULL,NULL,NULL,NULL,4916,NULL,141,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10137,2,NULL,4,468,NULL,NULL,'42NG0049','MGR3345',NULL,1,NULL,NULL,NULL,NULL,4929,NULL,134,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10138,2,NULL,3,468,NULL,NULL,'42NG0048','MGR3345',NULL,1,NULL,NULL,NULL,NULL,5150,NULL,123,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10139,2,NULL,1,462,NULL,NULL,'42NG0055','MGR3346',NULL,1,NULL,NULL,NULL,NULL,437,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10140,2,NULL,4,462,NULL,NULL,'42NG0056','MGR3346',NULL,1,NULL,NULL,NULL,NULL,3502,NULL,106,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10141,2,NULL,3,858,NULL,NULL,'42NG0014','MGR3347',NULL,1,NULL,NULL,NULL,NULL,964,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10142,2,NULL,1,858,NULL,NULL,'42NG0013','MGR3347',NULL,1,NULL,NULL,NULL,NULL,4317,NULL,81,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10143,2,NULL,1,236,NULL,NULL,'43NG0010','MGR3348',NULL,1,NULL,NULL,NULL,NULL,127,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10144,2,NULL,3,236,NULL,NULL,'43NG0011','MGR3348',NULL,1,NULL,NULL,NULL,NULL,1508,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10145,2,NULL,1,152,NULL,NULL,'43NG0037','MGR3349',NULL,1,NULL,NULL,NULL,NULL,3603,NULL,70,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10146,2,NULL,2,128,NULL,NULL,'43NG0038','MGR3350',NULL,1,NULL,NULL,NULL,NULL,724,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10147,2,NULL,1,128,NULL,NULL,'43NG0039','MGR3350',NULL,1,NULL,NULL,NULL,NULL,4832,NULL,94,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10148,2,NULL,3,583,NULL,NULL,'43NG0013','MGR3351',NULL,1,NULL,NULL,NULL,NULL,182,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10149,2,NULL,1,583,NULL,NULL,'43NG0012','MGR3351',NULL,1,NULL,NULL,NULL,NULL,1275,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10150,2,NULL,1,583,NULL,NULL,'43NG0014','MGR3352',NULL,1,NULL,NULL,NULL,NULL,524,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10151,2,NULL,1,93,NULL,NULL,'43NG0040','MGR3353',NULL,1,NULL,NULL,NULL,NULL,3911,NULL,81,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10152,2,NULL,3,583,NULL,NULL,'43NG0015','MGR3352',NULL,1,NULL,NULL,NULL,NULL,299,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10153,2,NULL,1,440,NULL,NULL,'43NG0031','MGR3357',NULL,1,NULL,NULL,NULL,NULL,10031,NULL,192,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10154,2,NULL,1,440,NULL,NULL,'43NG0031','MGR3358',NULL,1,NULL,NULL,NULL,NULL,9058,NULL,174,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10155,2,NULL,3,687,NULL,NULL,'43NG0030','MGR3370',NULL,1,NULL,NULL,NULL,NULL,7080,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10156,2,NULL,1,687,NULL,NULL,'43NG0029','MGR3370',NULL,1,NULL,NULL,NULL,NULL,2592,NULL,50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10157,2,NULL,1,138,NULL,NULL,'43NG0017','MGR3369',NULL,1,NULL,NULL,NULL,NULL,8772,NULL,169,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10158,2,NULL,2,556,NULL,NULL,'43NG0052','MGR3368',NULL,1,NULL,NULL,NULL,NULL,767,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10159,2,NULL,1,556,NULL,NULL,'43NG0043','MGR3367',NULL,1,NULL,NULL,NULL,NULL,10904,NULL,198,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10160,2,NULL,1,556,NULL,NULL,'43NG0043','MGR3366',NULL,1,NULL,NULL,NULL,NULL,9414,NULL,167,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10161,2,NULL,2,359,NULL,NULL,'43NG0050','MGR3364',NULL,1,NULL,NULL,NULL,NULL,2373,NULL,50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10162,2,NULL,1,359,NULL,NULL,'43NG0028','MGR3364',NULL,1,NULL,NULL,NULL,NULL,7431,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10163,2,NULL,4,537,NULL,NULL,'43NG0036','MGR3363',NULL,1,NULL,NULL,NULL,NULL,4705,NULL,132,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10164,2,NULL,1,350,NULL,NULL,'43NG0041','MGR3362',NULL,1,NULL,NULL,NULL,NULL,15393,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10165,2,NULL,1,687,NULL,NULL,'43NG0029','MGR3361',NULL,1,NULL,NULL,NULL,NULL,10558,NULL,203,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10166,2,NULL,1,138,NULL,NULL,'43NG0017','MGR3360',NULL,1,NULL,NULL,NULL,NULL,8706,NULL,169,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10167,2,NULL,4,537,NULL,NULL,'43NG0036','MGR3359',NULL,1,NULL,NULL,NULL,NULL,5034,NULL,140,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10168,2,NULL,1,552,NULL,NULL,'44NG0091','MGR3383',NULL,1,NULL,NULL,NULL,NULL,534,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10169,2,NULL,4,552,NULL,NULL,'43NG0045','MGR3383',NULL,1,NULL,NULL,NULL,NULL,119,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10170,2,NULL,1,594,NULL,NULL,'43NG0032','MGR3382',NULL,1,NULL,NULL,NULL,NULL,655,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10171,2,NULL,2,594,NULL,NULL,'43NG0033','MGR3382',NULL,1,NULL,NULL,NULL,NULL,90,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10172,2,NULL,3,594,NULL,NULL,'43NG0034','MGR3382',NULL,1,NULL,NULL,NULL,NULL,52,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10173,2,NULL,3,807,NULL,NULL,'43NG0055','MGR3380',NULL,1,NULL,NULL,NULL,NULL,83,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10174,2,NULL,2,807,NULL,NULL,'43NG0057','MGR3380',NULL,1,NULL,NULL,NULL,NULL,748,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10175,2,NULL,2,807,NULL,NULL,'43NG0056','MGR3380',NULL,1,NULL,NULL,NULL,NULL,507,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10176,2,NULL,1,807,NULL,NULL,'43NG0058','MGR3380',NULL,1,NULL,NULL,NULL,NULL,1506,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10177,2,NULL,3,359,NULL,NULL,'43NG0053','MGR3379',NULL,1,NULL,NULL,NULL,NULL,448,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10178,2,NULL,2,359,NULL,NULL,'43NG0054','MGR3379',NULL,1,NULL,NULL,NULL,NULL,1044,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10179,2,NULL,1,359,NULL,NULL,'43NG0016','MGR3379',NULL,1,NULL,NULL,NULL,NULL,3593,NULL,75,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10180,2,NULL,1,609,NULL,NULL,'43NG0059','MGR3381',NULL,1,NULL,NULL,NULL,NULL,193,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10181,2,NULL,4,609,NULL,NULL,'43NG0061','MGR3381',NULL,1,NULL,NULL,NULL,NULL,38,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10182,2,NULL,5,609,NULL,NULL,'43NG0060','MGR3381',NULL,1,NULL,NULL,NULL,NULL,17,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10183,2,NULL,4,610,NULL,NULL,'43NG0025','MGR3375',NULL,1,NULL,NULL,NULL,NULL,10092,NULL,281,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10184,2,NULL,4,610,NULL,NULL,'43NG0025','MGR3376',NULL,1,NULL,NULL,NULL,NULL,9640,NULL,275,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10185,2,NULL,1,511,NULL,NULL,'43NG0051','MGR3374',NULL,1,NULL,NULL,NULL,NULL,8740,NULL,170,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10186,2,NULL,3,163,NULL,NULL,'43NG0022','MGR3372',NULL,1,NULL,NULL,NULL,NULL,931,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10187,2,NULL,1,163,NULL,NULL,'43NG0021','MGR3372',NULL,1,NULL,NULL,NULL,NULL,4127,NULL,80,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10188,2,NULL,1,138,NULL,NULL,'43NG0017','MGR3373',NULL,1,NULL,NULL,NULL,NULL,8379,NULL,162,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10189,2,NULL,3,858,NULL,NULL,'43NG0024','MGR3371',NULL,1,NULL,NULL,NULL,NULL,256,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10190,2,NULL,1,858,NULL,NULL,'43NG0023','MGR3371',NULL,1,NULL,NULL,NULL,NULL,6080,NULL,115,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10191,2,NULL,5,594,NULL,NULL,'43NG0035','MGR3382',NULL,1,NULL,NULL,NULL,NULL,966,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10192,2,NULL,4,128,NULL,NULL,'44NG0113','MGR3391',NULL,1,NULL,NULL,NULL,NULL,1959,NULL,59,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10193,2,NULL,3,128,NULL,NULL,'44NG0114','MGR3391',NULL,1,NULL,NULL,NULL,NULL,1639,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10194,2,NULL,2,128,NULL,NULL,'44NG0115','MGR3391',NULL,1,NULL,NULL,NULL,NULL,702,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10195,2,NULL,1,128,NULL,NULL,'44NG0116','MGR3391',NULL,1,NULL,NULL,NULL,NULL,298,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10196,2,NULL,1,143,NULL,NULL,'44NG0006','MGR3390',NULL,1,NULL,NULL,NULL,NULL,2880,NULL,58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10197,2,NULL,3,852,NULL,NULL,'42NG0060','MGR3385',NULL,1,NULL,NULL,NULL,NULL,1254,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10198,2,NULL,4,462,NULL,NULL,'44NG0019','MGR3389',NULL,1,NULL,NULL,NULL,NULL,1114,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10199,2,NULL,1,462,NULL,NULL,'44NG0018','MGR3389',NULL,1,NULL,NULL,NULL,NULL,1837,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10200,2,NULL,5,399,NULL,NULL,'44NG0107','MGR3388',NULL,1,NULL,NULL,NULL,NULL,90,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10201,2,NULL,1,169,NULL,NULL,'44NG0042','MGR3387',NULL,1,NULL,NULL,NULL,NULL,15453,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10202,2,NULL,1,93,NULL,NULL,'44NG0091','MGR3386',NULL,1,NULL,NULL,NULL,NULL,755,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10203,2,NULL,2,93,NULL,NULL,'44NG0092','MGR3386',NULL,1,NULL,NULL,NULL,NULL,452,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10204,2,NULL,3,93,NULL,NULL,'44NG0093','MGR3386',NULL,1,NULL,NULL,NULL,NULL,800,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10205,2,NULL,5,93,NULL,NULL,'44NG0094','MGR3386',NULL,1,NULL,NULL,NULL,NULL,486,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10206,2,NULL,4,185,NULL,NULL,'44NG0034','MGR3392',NULL,1,NULL,NULL,NULL,NULL,1662,NULL,54,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10207,2,NULL,3,185,NULL,NULL,'44NG0033','MGR3392',NULL,1,NULL,NULL,NULL,NULL,1670,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10208,2,NULL,2,185,NULL,NULL,'44NG0031','MGR3392',NULL,1,NULL,NULL,NULL,NULL,1069,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10209,2,NULL,2,185,NULL,NULL,'44NG0022','MGR3393',NULL,1,NULL,NULL,NULL,NULL,249,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10210,2,NULL,1,185,NULL,NULL,'44NG0021','MGR3393',NULL,1,NULL,NULL,NULL,NULL,826,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10211,2,NULL,1,185,NULL,NULL,'44NG0027','MGR3396',NULL,1,NULL,NULL,NULL,NULL,1368,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10212,2,NULL,3,185,NULL,NULL,'44NG0028','MGR3396',NULL,1,NULL,NULL,NULL,NULL,453,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10213,2,NULL,4,185,NULL,NULL,'44NG0029','MGR3396',NULL,1,NULL,NULL,NULL,NULL,59,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10214,2,NULL,1,185,NULL,NULL,'44NG0035','MGR3395',NULL,1,NULL,NULL,NULL,NULL,1671,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10215,2,NULL,1,185,NULL,NULL,'44NG0036','MGR3395',NULL,1,NULL,NULL,NULL,NULL,408,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10216,2,NULL,3,185,NULL,NULL,'44NG0037','MGR3395',NULL,1,NULL,NULL,NULL,NULL,277,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10217,2,NULL,4,185,NULL,NULL,'44NG0038','MGR3395',NULL,1,NULL,NULL,NULL,NULL,182,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10218,2,NULL,3,185,NULL,NULL,'44NG0026','MGR3394',NULL,1,NULL,NULL,NULL,NULL,352,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10219,2,NULL,2,185,NULL,NULL,'44NG0025','MGR3394',NULL,1,NULL,NULL,NULL,NULL,171,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10220,2,NULL,1,185,NULL,NULL,'44NG0024','MGR3394',NULL,1,NULL,NULL,NULL,NULL,722,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10221,2,NULL,1,185,NULL,NULL,'44NG0030','MGR3392',NULL,1,NULL,NULL,NULL,NULL,4654,NULL,95,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10222,2,NULL,4,37,NULL,NULL,'44NG0005','MGR3415',NULL,1,NULL,NULL,NULL,NULL,1897,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10223,2,NULL,3,37,NULL,NULL,'44NG0004','MGR3415',NULL,1,NULL,NULL,NULL,NULL,961,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10224,2,NULL,1,37,NULL,NULL,'44NG0003','MGR3415',NULL,1,NULL,NULL,NULL,NULL,1546,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10225,2,NULL,1,401,NULL,NULL,'44NG0045','MGR3411',NULL,1,NULL,NULL,NULL,NULL,15400,NULL,307,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10226,2,NULL,1,401,NULL,NULL,'44NG0045','MGR3412',NULL,1,NULL,NULL,NULL,NULL,1777,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10227,2,NULL,4,401,NULL,NULL,'44NG0047','MGR3412',NULL,1,NULL,NULL,NULL,NULL,12004,NULL,313,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10228,2,NULL,4,511,NULL,NULL,'44NG0083','MGR3413',NULL,1,NULL,NULL,NULL,NULL,2285,NULL,63,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10229,2,NULL,3,511,NULL,NULL,'44NG0082','MGR3413',NULL,1,NULL,NULL,NULL,NULL,4818,NULL,117,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10230,2,NULL,1,236,NULL,NULL,'44NG0049','MGR3410',NULL,1,NULL,NULL,NULL,NULL,10971,NULL,220,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10231,2,NULL,1,634,NULL,NULL,'44NG0090','MGR3408',NULL,1,NULL,NULL,NULL,NULL,1244,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10232,2,NULL,1,92,NULL,NULL,'44NG0058','MGR3403',NULL,1,NULL,NULL,NULL,NULL,307,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10233,2,NULL,2,92,NULL,NULL,'44NG0059','MGR3403',NULL,1,NULL,NULL,NULL,NULL,96,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10234,2,NULL,3,92,NULL,NULL,'44NG0060','MGR3403',NULL,1,NULL,NULL,NULL,NULL,136,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10235,2,NULL,1,236,NULL,NULL,'44NG0049','MGR3409',NULL,1,NULL,NULL,NULL,NULL,1490,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10236,2,NULL,1,569,NULL,NULL,'44NG0014','MGR3402',NULL,1,NULL,NULL,NULL,NULL,91,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10237,2,NULL,5,569,NULL,NULL,'44NG0017','MGR3402',NULL,1,NULL,NULL,NULL,NULL,190,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10238,2,NULL,2,569,NULL,NULL,'44NG0015','MGR3402',NULL,1,NULL,NULL,NULL,NULL,29,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10239,2,NULL,1,582,NULL,NULL,'44NG0080','MGR3399',NULL,1,NULL,NULL,NULL,NULL,200,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10240,2,NULL,3,582,NULL,NULL,'44NG0120','MGR3399',NULL,1,NULL,NULL,NULL,NULL,72,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10241,2,NULL,3,461,NULL,NULL,'44NG0121','MGR3400',NULL,1,NULL,NULL,NULL,NULL,289,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10242,2,NULL,1,461,NULL,NULL,'44NG0079','MGR3400',NULL,1,NULL,NULL,NULL,NULL,4113,NULL,82,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10243,2,NULL,1,37,NULL,NULL,'44NG0002','MGR3398',NULL,1,NULL,NULL,NULL,NULL,8032,NULL,161,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10244,2,NULL,1,37,NULL,NULL,'44NG0003','MGR3398',NULL,1,NULL,NULL,NULL,NULL,3008,NULL,61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10245,2,NULL,3,464,NULL,NULL,'44NG0041','MGR3423',NULL,1,NULL,NULL,NULL,NULL,6280,NULL,167,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10246,2,NULL,1,464,NULL,NULL,'44NG0040','MGR3423',NULL,1,NULL,NULL,NULL,NULL,3683,NULL,77,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10247,2,NULL,1,350,NULL,NULL,'43NG0041','MGR3421',NULL,1,NULL,NULL,NULL,NULL,15333,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10248,2,NULL,1,126,NULL,NULL,'44NG0043','MGR3422',NULL,1,NULL,NULL,NULL,NULL,669,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10249,2,NULL,5,126,NULL,NULL,'44NG0136','MGR3422',NULL,1,NULL,NULL,NULL,NULL,25,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10250,2,NULL,4,126,NULL,NULL,'44NG0137','MGR3422',NULL,1,NULL,NULL,NULL,NULL,94,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10251,2,NULL,3,126,NULL,NULL,'44NG0135','MGR3422',NULL,1,NULL,NULL,NULL,NULL,136,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10252,2,NULL,2,64,NULL,NULL,'44NG0009','MGR3416',NULL,1,NULL,NULL,NULL,NULL,30,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10253,2,NULL,5,64,NULL,NULL,'44NG0010','MGR3416',NULL,1,NULL,NULL,NULL,NULL,37,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10254,2,NULL,1,64,NULL,NULL,'44NG0008','MGR3416',NULL,1,NULL,NULL,NULL,NULL,313,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10255,2,NULL,4,138,NULL,NULL,'44NG0020','MGR3417',NULL,1,NULL,NULL,NULL,NULL,8196,NULL,221,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10256,2,NULL,4,138,NULL,NULL,'44NG0020','MGR3424',NULL,1,NULL,NULL,NULL,NULL,7704,NULL,219,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10257,2,NULL,4,821,NULL,NULL,'44NG0069','MGR3441',NULL,1,NULL,NULL,NULL,NULL,688,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10258,2,NULL,3,821,NULL,NULL,'44NG0070','MGR3441',NULL,1,NULL,NULL,NULL,NULL,134,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10259,2,NULL,1,821,NULL,NULL,'44NG0145','MGR3441',NULL,1,NULL,NULL,NULL,NULL,735,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10260,2,NULL,1,821,NULL,NULL,'44NG0068','MGR3441',NULL,1,NULL,NULL,NULL,NULL,3704,NULL,74,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10261,2,NULL,1,148,NULL,NULL,'44NG0071','MGR3442',NULL,1,NULL,NULL,NULL,NULL,642,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10262,2,NULL,1,148,NULL,NULL,'44NG0072','MGR3442',NULL,1,NULL,NULL,NULL,NULL,2632,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10263,2,NULL,3,148,NULL,NULL,'44NG0073','MGR3442',NULL,1,NULL,NULL,NULL,NULL,194,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10264,2,NULL,4,148,NULL,NULL,'44NG0074','MGR3442',NULL,1,NULL,NULL,NULL,NULL,662,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10265,2,NULL,2,224,NULL,NULL,'44NG0066','MGR3440',NULL,1,NULL,NULL,NULL,NULL,451,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10266,2,NULL,4,224,NULL,NULL,'44NG0067','MGR3440',NULL,1,NULL,NULL,NULL,NULL,648,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10267,2,NULL,1,224,NULL,NULL,'44NG0144','MGR3440',NULL,1,NULL,NULL,NULL,NULL,4645,NULL,92,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10268,2,NULL,2,401,NULL,NULL,'44NG0076','MGR3439',NULL,1,NULL,NULL,NULL,NULL,734,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10269,2,NULL,3,401,NULL,NULL,'44NG0077','MGR3439',NULL,1,NULL,NULL,NULL,NULL,121,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10270,2,NULL,4,401,NULL,NULL,'44NG0078','MGR3439',NULL,1,NULL,NULL,NULL,NULL,959,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10271,2,NULL,1,401,NULL,NULL,'44NG0075','MGR3439',NULL,1,NULL,NULL,NULL,NULL,5888,NULL,115,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10272,2,NULL,1,835,NULL,NULL,'44NG0130','MGR3433',NULL,1,NULL,NULL,NULL,NULL,4097,NULL,86,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10273,2,NULL,3,835,NULL,NULL,'44NG0131','MGR3433',NULL,1,NULL,NULL,NULL,NULL,536,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10274,2,NULL,4,835,NULL,NULL,'44NG0132','MGR3433',NULL,1,NULL,NULL,NULL,NULL,1688,NULL,52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10275,2,NULL,2,610,NULL,NULL,'44NG0119','MGR3432',NULL,1,NULL,NULL,NULL,NULL,1766,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10276,2,NULL,1,610,NULL,NULL,'44NG0117','MGR3432',NULL,1,NULL,NULL,NULL,NULL,9593,NULL,187,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10277,2,NULL,2,610,NULL,NULL,'44NG0119','MGR3430',NULL,1,NULL,NULL,NULL,NULL,3923,NULL,77,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10278,2,NULL,3,610,NULL,NULL,'44NG0118','MGR3430',NULL,1,NULL,NULL,NULL,NULL,6428,NULL,155,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10279,2,NULL,2,537,NULL,NULL,'44NG0039','MGR3426',NULL,1,NULL,NULL,NULL,NULL,5138,NULL,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10280,2,NULL,2,537,NULL,NULL,'44NG0039','MGR3429',NULL,1,NULL,NULL,NULL,NULL,2725,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10281,2,NULL,5,373,NULL,NULL,'44NG0124','MGR3428',NULL,1,NULL,NULL,NULL,NULL,695,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10282,2,NULL,3,373,NULL,NULL,'44NG0123','MGR3428',NULL,1,NULL,NULL,NULL,NULL,547,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10283,2,NULL,1,468,NULL,NULL,'45NG0001','MGR3427',NULL,1,NULL,NULL,NULL,NULL,10209,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10284,2,NULL,3,468,NULL,NULL,'45NG0003','MGR3427',NULL,1,NULL,NULL,NULL,NULL,413,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10285,2,NULL,1,440,NULL,NULL,'44NG0125','MGR3443',NULL,1,NULL,NULL,NULL,NULL,10002,NULL,192,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10286,2,NULL,1,440,NULL,NULL,'44NG0125','MGR3444',NULL,1,NULL,NULL,NULL,NULL,10276,NULL,197,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10287,2,NULL,4,637,NULL,NULL,'44NG0084','MGR3445',NULL,1,NULL,NULL,NULL,NULL,7751,NULL,209,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10288,2,NULL,1,637,NULL,NULL,'44NG0086','MGR3445',NULL,1,NULL,NULL,NULL,NULL,207,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10289,2,NULL,3,637,NULL,NULL,'44NG0085','MGR3445',NULL,1,NULL,NULL,NULL,NULL,496,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10290,2,NULL,3,468,NULL,NULL,'45NG0003','MGR3446',NULL,1,NULL,NULL,NULL,NULL,2493,NULL,60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10291,2,NULL,1,468,NULL,NULL,'45NG0001','MGR3446',NULL,1,NULL,NULL,NULL,NULL,4891,NULL,96,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10292,2,NULL,1,468,NULL,NULL,'45NG0002','MGR3446',NULL,1,NULL,NULL,NULL,NULL,3272,NULL,65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10293,2,NULL,2,57,NULL,NULL,'44NG0109','MGR3447',NULL,1,NULL,NULL,NULL,NULL,1827,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10294,2,NULL,1,57,NULL,NULL,'44NG0108','MGR3447',NULL,1,NULL,NULL,NULL,NULL,5350,NULL,105,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10295,2,NULL,1,401,NULL,NULL,'44NG0095','MGR3460',NULL,1,NULL,NULL,NULL,NULL,604,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10296,2,NULL,4,401,NULL,NULL,'44NG0159','MGR3460',NULL,1,NULL,NULL,NULL,NULL,69,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10297,2,NULL,1,350,NULL,NULL,'44NG0134','MGR3459',NULL,1,NULL,NULL,NULL,NULL,15361,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10298,2,NULL,1,1025,NULL,NULL,'44NG0152','MGR3456',NULL,1,NULL,NULL,NULL,NULL,209,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10299,2,NULL,1,419,NULL,NULL,'44NG0156','MGR3458',NULL,1,NULL,NULL,NULL,NULL,294,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10300,2,NULL,3,419,NULL,NULL,'44NG0158','MGR3458',NULL,1,NULL,NULL,NULL,NULL,66,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10301,2,NULL,1,419,NULL,NULL,'44NG0051','MGR3458',NULL,1,NULL,NULL,NULL,NULL,457,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10302,2,NULL,1,177,NULL,NULL,'44NG0048','MGR3457',NULL,1,NULL,NULL,NULL,NULL,554,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10303,2,NULL,4,177,NULL,NULL,'44NG0154','MGR3457',NULL,1,NULL,NULL,NULL,NULL,242,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10304,2,NULL,2,177,NULL,NULL,'44NG0153','MGR3457',NULL,1,NULL,NULL,NULL,NULL,22,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10305,2,NULL,5,177,NULL,NULL,'44NG0155','MGR3457',NULL,1,NULL,NULL,NULL,NULL,223,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10306,2,NULL,1,858,NULL,NULL,'44NG0138','MGR3454',NULL,1,NULL,NULL,NULL,NULL,5105,NULL,99,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10307,2,NULL,3,858,NULL,NULL,'44NG0139','MGR3454',NULL,1,NULL,NULL,NULL,NULL,1858,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10308,2,NULL,1,469,NULL,NULL,'44NG0112','MGR3453',NULL,1,NULL,NULL,NULL,NULL,1928,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10309,2,NULL,1,163,NULL,NULL,'44NG0140','MGR3452',NULL,1,NULL,NULL,NULL,NULL,1987,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10310,2,NULL,2,163,NULL,NULL,'44NG0157','MGR3452',NULL,1,NULL,NULL,NULL,NULL,642,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10311,2,NULL,3,163,NULL,NULL,'44NG0141','MGR3452',NULL,1,NULL,NULL,NULL,NULL,74,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10312,2,NULL,3,468,NULL,NULL,'45NG0003','MGR3450',NULL,1,NULL,NULL,NULL,NULL,9778,NULL,236,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10313,2,NULL,1,1024,NULL,NULL,'44NG0001','MGR3451',NULL,1,NULL,NULL,NULL,NULL,194,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10314,2,NULL,3,1024,NULL,NULL,'44NG0151','MGR3451',NULL,1,NULL,NULL,NULL,NULL,34,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10315,2,NULL,5,497,NULL,NULL,'44NG0150','MGR3449',NULL,1,NULL,NULL,NULL,NULL,96,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10316,2,NULL,2,497,NULL,NULL,'44NG0127','MGR3449',NULL,1,NULL,NULL,NULL,NULL,657,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10317,2,NULL,1,497,NULL,NULL,'44NG0126','MGR3449',NULL,1,NULL,NULL,NULL,NULL,4607,NULL,73,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10318,2,NULL,1,236,NULL,NULL,'44NG0142','MGR3448',NULL,1,NULL,NULL,NULL,NULL,1315,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10319,2,NULL,3,401,NULL,NULL,'44NG0046','MGR3462',NULL,1,NULL,NULL,NULL,NULL,9976,NULL,206,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10320,2,NULL,1,401,NULL,NULL,'44NG0045','MGR3462',NULL,1,NULL,NULL,NULL,NULL,5699,NULL,114,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10321,2,NULL,4,497,NULL,NULL,'44NG0128','MGR3449',NULL,1,NULL,NULL,NULL,NULL,896,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10322,2,NULL,1,820,NULL,NULL,'45NG0053','MGR3466',NULL,1,NULL,NULL,NULL,NULL,5770,NULL,120,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10323,2,NULL,1,169,NULL,NULL,'45NG0092','MGR3465/67',NULL,1,NULL,NULL,NULL,NULL,21916,NULL,427,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10324,2,NULL,5,845,NULL,NULL,'44NG0111','MGR3463',NULL,1,NULL,NULL,NULL,NULL,2801,NULL,62,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10325,2,NULL,2,845,NULL,NULL,'45NG0049','MGR3463',NULL,1,NULL,NULL,NULL,NULL,428,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10326,2,NULL,1,845,NULL,NULL,'44NG0110','MGR3463',NULL,1,NULL,NULL,NULL,NULL,1491,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10327,2,NULL,1,185,NULL,NULL,'45NG0009','MGR3473',NULL,1,NULL,NULL,NULL,NULL,1226,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10328,2,NULL,2,185,NULL,NULL,'45NG0010','MGR3473',NULL,1,NULL,NULL,NULL,NULL,297,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10329,2,NULL,3,185,NULL,NULL,'45NG0011','MGR3473',NULL,1,NULL,NULL,NULL,NULL,902,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10330,2,NULL,4,185,NULL,NULL,'45NG0012','MGR3473',NULL,1,NULL,NULL,NULL,NULL,252,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10331,2,NULL,1,185,NULL,NULL,'45NG0025','MGR3472',NULL,1,NULL,NULL,NULL,NULL,379,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10332,2,NULL,2,185,NULL,NULL,'45NG0026','MGR3472',NULL,1,NULL,NULL,NULL,NULL,312,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10333,2,NULL,4,185,NULL,NULL,'45NG0027','MGR3472',NULL,1,NULL,NULL,NULL,NULL,394,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10334,2,NULL,1,185,NULL,NULL,'45NG0013','MGR3471',NULL,1,NULL,NULL,NULL,NULL,1838,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10335,2,NULL,4,185,NULL,NULL,'45NG0015','MGR3471',NULL,1,NULL,NULL,NULL,NULL,947,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10336,2,NULL,3,185,NULL,NULL,'45NG0014','MGR3471',NULL,1,NULL,NULL,NULL,NULL,95,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10337,2,NULL,1,185,NULL,NULL,'45NG0022','MGR3470',NULL,1,NULL,NULL,NULL,NULL,83,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10338,2,NULL,2,185,NULL,NULL,'45NG0023','MGR3470',NULL,1,NULL,NULL,NULL,NULL,43,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10339,2,NULL,3,185,NULL,NULL,'45NG0024','MGR3470',NULL,1,NULL,NULL,NULL,NULL,60,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10340,2,NULL,1,185,NULL,NULL,'45NG0016','MGR3469',NULL,1,NULL,NULL,NULL,NULL,658,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10341,2,NULL,2,185,NULL,NULL,'45NG0017','MGR3469',NULL,1,NULL,NULL,NULL,NULL,158,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10342,2,NULL,3,185,NULL,NULL,'45NG0018','MGR3469',NULL,1,NULL,NULL,NULL,NULL,205,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10343,2,NULL,4,185,NULL,NULL,'45NG0019','MGR3469',NULL,1,NULL,NULL,NULL,NULL,147,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10344,2,NULL,4,185,NULL,NULL,'45NG0021','MGR3468',NULL,1,NULL,NULL,NULL,NULL,195,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10345,2,NULL,1,185,NULL,NULL,'45NG0020','MGR3468',NULL,1,NULL,NULL,NULL,NULL,57,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10346,2,NULL,1,169,NULL,NULL,'45NG0091','MGR3464/67',NULL,1,NULL,NULL,NULL,NULL,25221,NULL,493,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10347,2,NULL,1,1026,NULL,NULL,'45NG0055','MGR3481',NULL,1,NULL,NULL,NULL,NULL,147,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10348,2,NULL,5,1026,NULL,NULL,'45NG0056','MGR3481',NULL,1,NULL,NULL,NULL,NULL,181,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10349,2,NULL,1,634,NULL,NULL,'45NG0077','MGR3479',NULL,1,NULL,NULL,NULL,NULL,657,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10350,2,NULL,4,634,NULL,NULL,'45NG0079','MGR3479',NULL,1,NULL,NULL,NULL,NULL,937,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10351,2,NULL,3,634,NULL,NULL,'45NG0078','MGR3479',NULL,1,NULL,NULL,NULL,NULL,1201,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10352,2,NULL,4,634,NULL,NULL,'45NG0076','MGR3478',NULL,1,NULL,NULL,NULL,NULL,1701,NULL,45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10353,2,NULL,4,634,NULL,NULL,'45NG0083','MGR3480',NULL,1,NULL,NULL,NULL,NULL,398,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10354,2,NULL,3,634,NULL,NULL,'45NG0082','MGR3480',NULL,1,NULL,NULL,NULL,NULL,754,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10355,2,NULL,3,634,NULL,NULL,'45NG0081','MGR3477',NULL,1,NULL,NULL,NULL,NULL,667,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10356,2,NULL,1,634,NULL,NULL,'45NG0080','MGR3477',NULL,1,NULL,NULL,NULL,NULL,3711,NULL,72,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10357,2,NULL,1,359,NULL,NULL,'45NG0054','MGR3476',NULL,1,NULL,NULL,NULL,NULL,1683,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10358,2,NULL,3,359,NULL,NULL,'45NG0104','MGR3476',NULL,1,NULL,NULL,NULL,NULL,6134,NULL,165,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10359,2,NULL,1,138,NULL,NULL,'45NG0029','MGR3492',NULL,1,NULL,NULL,NULL,NULL,7889,NULL,154,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10360,2,NULL,3,431,NULL,NULL,'45NG0033','MGR3488',NULL,1,NULL,NULL,NULL,NULL,981,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10361,2,NULL,1,431,NULL,NULL,'45NG0032','MGR3488',NULL,1,NULL,NULL,NULL,NULL,2642,NULL,57,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10362,2,NULL,4,464,NULL,NULL,'45NG0031','MGR3490',NULL,1,NULL,NULL,NULL,NULL,7896,NULL,276,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10363,2,NULL,1,58,NULL,NULL,'45NG0069','MGR3491',NULL,1,NULL,NULL,NULL,NULL,7177,NULL,141,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10364,2,NULL,1,822,NULL,NULL,'45NG0084','MGR3489',NULL,1,NULL,NULL,NULL,NULL,252,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10365,2,NULL,3,493,NULL,NULL,'45NG0072','MGR3487',NULL,1,NULL,NULL,NULL,NULL,471,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10366,2,NULL,5,493,NULL,NULL,'45NG0073','MGR3487',NULL,1,NULL,NULL,NULL,NULL,766,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10367,2,NULL,1,493,NULL,NULL,'45NG0071','MGR3487',NULL,1,NULL,NULL,NULL,NULL,2202,NULL,47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10368,2,NULL,4,687,NULL,NULL,'45NG0036','MGR3486',NULL,1,NULL,NULL,NULL,NULL,1880,NULL,50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10369,2,NULL,1,687,NULL,NULL,'45NG0034','MGR3486',NULL,1,NULL,NULL,NULL,NULL,7748,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10370,2,NULL,1,138,NULL,NULL,'45NG0029','MGR3484',NULL,1,NULL,NULL,NULL,NULL,8263,NULL,160,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10371,2,NULL,1,429,NULL,NULL,'45NG0051','MGR3482',NULL,1,NULL,NULL,NULL,NULL,400,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10372,2,NULL,2,429,NULL,NULL,'45NG0050','MGR3482',NULL,1,NULL,NULL,NULL,NULL,165,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10373,2,NULL,5,429,NULL,NULL,'45NG0052','MGR3482',NULL,1,NULL,NULL,NULL,NULL,86,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10374,2,NULL,3,687,NULL,NULL,'45NG0035','MGR3493',NULL,1,NULL,NULL,NULL,NULL,9058,NULL,213,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10375,2,NULL,2,359,NULL,NULL,'45NG0119','MGR3506',NULL,1,NULL,NULL,NULL,NULL,38,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10376,2,NULL,1,807,NULL,NULL,'45NG0008','MGR3506',NULL,1,NULL,NULL,NULL,NULL,90,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10377,2,NULL,3,359,NULL,NULL,'45NG0120','MGR3506',NULL,1,NULL,NULL,NULL,NULL,1057,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10378,2,NULL,4,687,NULL,NULL,'45NG0036','MGR3494',NULL,1,NULL,NULL,NULL,NULL,8401,NULL,225,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10379,2,NULL,4,359,NULL,NULL,'45NG0117','MGR3499',NULL,1,NULL,NULL,NULL,NULL,577,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10380,2,NULL,2,359,NULL,NULL,'45NG0116','MGR3499',NULL,1,NULL,NULL,NULL,NULL,201,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10381,2,NULL,1,501,NULL,NULL,'45NG0108','MGR3498',NULL,1,NULL,NULL,NULL,NULL,775,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10382,2,NULL,4,501,NULL,NULL,'45NG0115','MGR3498',NULL,1,NULL,NULL,NULL,NULL,168,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10383,2,NULL,1,661,NULL,NULL,'45NG0037','MGR3495',NULL,1,NULL,NULL,NULL,NULL,619,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10384,2,NULL,3,661,NULL,NULL,'45NG0039','MGR3495',NULL,1,NULL,NULL,NULL,NULL,397,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10385,2,NULL,4,661,NULL,NULL,'45NG0040','MGR3495',NULL,1,NULL,NULL,NULL,NULL,323,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10386,2,NULL,2,661,NULL,NULL,'45NG0038','MGR3495',NULL,1,NULL,NULL,NULL,NULL,190,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10387,2,NULL,4,661,NULL,NULL,'45NG0048','MGR3496',NULL,1,NULL,NULL,NULL,NULL,801,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10388,2,NULL,3,661,NULL,NULL,'45NG0047','MGR3496',NULL,1,NULL,NULL,NULL,NULL,880,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10389,2,NULL,2,661,NULL,NULL,'45NG0046','MGR3496',NULL,1,NULL,NULL,NULL,NULL,701,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10390,2,NULL,1,661,NULL,NULL,'45NG0045','MGR3496',NULL,1,NULL,NULL,NULL,NULL,1504,NULL,32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10391,2,NULL,1,661,NULL,NULL,'45NG0041','MGR3497',NULL,1,NULL,NULL,NULL,NULL,551,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10392,2,NULL,2,661,NULL,NULL,'45NG0042','MGR3497',NULL,1,NULL,NULL,NULL,NULL,301,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10393,2,NULL,3,661,NULL,NULL,'45NG0043','MGR3497',NULL,1,NULL,NULL,NULL,NULL,615,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10394,2,NULL,4,661,NULL,NULL,'45NG0044','MGR3497',NULL,1,NULL,NULL,NULL,NULL,526,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10395,2,NULL,4,687,NULL,NULL,'45NG0036','MGR3504',NULL,1,NULL,NULL,NULL,NULL,7889,NULL,211,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10396,2,NULL,5,875,NULL,NULL,'45NG0107','MGR3503',NULL,1,NULL,NULL,NULL,NULL,79,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10397,2,NULL,1,875,NULL,NULL,'45NG0105','MGR3503',NULL,1,NULL,NULL,NULL,NULL,745,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10398,2,NULL,5,786,NULL,NULL,'45NG0114','MGR3500',NULL,1,NULL,NULL,NULL,NULL,41,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10399,2,NULL,1,786,NULL,NULL,'45NG0113','MGR3500',NULL,1,NULL,NULL,NULL,NULL,271,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10400,2,NULL,1,13,NULL,NULL,'45NG0109','MGR3501',NULL,1,NULL,NULL,NULL,NULL,6992,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10401,2,NULL,1,13,NULL,NULL,'45NG0109','MGR3507',NULL,1,NULL,NULL,NULL,NULL,7501,NULL,160,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10402,2,NULL,1,458,NULL,NULL,'45NG0057','MGR3511',NULL,1,NULL,NULL,NULL,NULL,7995,NULL,155,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10403,2,NULL,1,594,NULL,NULL,'45NG0118','MGR3510',NULL,1,NULL,NULL,NULL,NULL,802,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10404,2,NULL,3,113,NULL,NULL,'45NG0059','MGR3512',NULL,1,NULL,NULL,NULL,NULL,1244,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10405,2,NULL,4,113,NULL,NULL,'45NG0060','MGR3512',NULL,1,NULL,NULL,NULL,NULL,653,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10406,2,NULL,4,687,NULL,NULL,'45NG0036','MGR3513',NULL,1,NULL,NULL,NULL,NULL,4752,NULL,127,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10407,2,NULL,1,440,NULL,NULL,'45NG0085','MGR3516',NULL,1,NULL,NULL,NULL,NULL,15598,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10408,2,NULL,1,458,NULL,NULL,'45NG0057','MGR3518',NULL,1,NULL,NULL,NULL,NULL,3080,NULL,60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10409,2,NULL,3,440,NULL,NULL,'45NG0086','MGR3517',NULL,1,NULL,NULL,NULL,NULL,9425,NULL,224,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10410,2,NULL,1,440,NULL,NULL,'45NG0085','MGR3517',NULL,1,NULL,NULL,NULL,NULL,2176,NULL,43,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10411,2,NULL,1,113,NULL,NULL,'45NG0058','MGR3514',NULL,1,NULL,NULL,NULL,NULL,4840,NULL,94,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10412,2,NULL,1,13,NULL,NULL,'45NG0109','MGR3519',NULL,1,NULL,NULL,NULL,NULL,7791,NULL,160,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10413,2,NULL,1,359,NULL,NULL,'46NG0003','MGR3522',NULL,1,NULL,NULL,NULL,NULL,1853,NULL,39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10414,2,NULL,4,13,NULL,NULL,'45NG0111','MGR3523',NULL,1,NULL,NULL,NULL,NULL,6780,NULL,177,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10415,2,NULL,3,827,NULL,NULL,'46NG0006','MGR3521',NULL,1,NULL,NULL,NULL,NULL,23,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10416,2,NULL,2,827,NULL,NULL,'46NG0005','MGR3521',NULL,1,NULL,NULL,NULL,NULL,28,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10417,2,NULL,1,827,NULL,NULL,'46NG0004','MGR3521',NULL,1,NULL,NULL,NULL,NULL,405,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10418,2,NULL,1,625,NULL,NULL,'46NG0025','MGR3531',NULL,1,NULL,NULL,NULL,NULL,393,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10419,2,NULL,4,625,NULL,NULL,'46NG0061','MGR3531',NULL,1,NULL,NULL,NULL,NULL,251,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10420,2,NULL,2,625,NULL,NULL,'46NG0060','MGR3531',NULL,1,NULL,NULL,NULL,NULL,236,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10421,2,NULL,2,586,NULL,NULL,'46NG0062','MGR3532',NULL,1,NULL,NULL,NULL,NULL,801,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10422,2,NULL,3,586,NULL,NULL,'46NG0063','MGR3532',NULL,1,NULL,NULL,NULL,NULL,1196,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10423,2,NULL,4,586,NULL,NULL,'46NG0064','MGR3532',NULL,1,NULL,NULL,NULL,NULL,1217,NULL,31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10424,2,NULL,3,236,NULL,NULL,'46NG0058','MGR3533',NULL,1,NULL,NULL,NULL,NULL,104,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10425,2,NULL,1,236,NULL,NULL,'46NG0027','MGR3533',NULL,1,NULL,NULL,NULL,NULL,436,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10426,2,NULL,4,236,NULL,NULL,'46NG0059','MGR3533',NULL,1,NULL,NULL,NULL,NULL,79,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10427,2,NULL,1,178,NULL,NULL,'46NG0003','MGR3541',NULL,1,NULL,NULL,NULL,NULL,220,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10428,2,NULL,2,178,NULL,NULL,'46NG0054','MGR3541',NULL,1,NULL,NULL,NULL,NULL,1252,NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10429,2,NULL,2,746,NULL,NULL,'46NG0055','MGR3529',NULL,1,NULL,NULL,NULL,NULL,209,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10430,2,NULL,3,746,NULL,NULL,'46NG0056','MGR3529',NULL,1,NULL,NULL,NULL,NULL,119,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10431,2,NULL,4,746,NULL,NULL,'46NG0057','MGR3529',NULL,1,NULL,NULL,NULL,NULL,247,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10432,2,NULL,1,746,NULL,NULL,'46NG0024','MGR3529',NULL,1,NULL,NULL,NULL,NULL,832,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10433,2,NULL,1,550,NULL,NULL,'46NG0065','MGR3535',NULL,1,NULL,NULL,NULL,NULL,102,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10434,2,NULL,2,550,NULL,NULL,'46NG0066','MGR3535',NULL,1,NULL,NULL,NULL,NULL,90,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10435,2,NULL,3,550,NULL,NULL,'46NG0067','MGR3535',NULL,1,NULL,NULL,NULL,NULL,45,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10436,2,NULL,4,550,NULL,NULL,'46NG0068','MGR3535',NULL,1,NULL,NULL,NULL,NULL,74,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10437,2,NULL,3,799,NULL,NULL,'45NG0088','MGR3537',NULL,1,NULL,NULL,NULL,NULL,442,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10438,2,NULL,1,799,NULL,NULL,'45NG0087','MGR3537',NULL,1,NULL,NULL,NULL,NULL,551,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10439,2,NULL,1,236,NULL,NULL,'46NG0042','MGR3528',NULL,1,NULL,NULL,NULL,NULL,140,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10440,2,NULL,5,236,NULL,NULL,'46NG0043','MGR3528',NULL,1,NULL,NULL,NULL,NULL,127,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10441,2,NULL,3,138,NULL,NULL,'46NG0001','MGR3527',NULL,1,NULL,NULL,NULL,NULL,7316,NULL,176,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10442,2,NULL,1,588,NULL,NULL,'46NG0035','MGR3526',NULL,1,NULL,NULL,NULL,NULL,1097,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10443,2,NULL,3,588,NULL,NULL,'46NG0045','MGR3526',NULL,1,NULL,NULL,NULL,NULL,152,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10444,2,NULL,2,588,NULL,NULL,'46NG0044','MGR3526',NULL,1,NULL,NULL,NULL,NULL,96,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10445,2,NULL,5,588,NULL,NULL,'46NG0046','MGR3526',NULL,1,NULL,NULL,NULL,NULL,44,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10446,2,NULL,5,13,NULL,NULL,'45NG0112','MGR3525',NULL,1,NULL,NULL,NULL,NULL,3494,NULL,94,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10447,2,NULL,3,138,NULL,NULL,'46NG0001','MGR3524',NULL,1,NULL,NULL,NULL,NULL,7503,NULL,179,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10448,2,NULL,1,800,NULL,NULL,'45NG0089','MGR3539',NULL,1,NULL,NULL,NULL,NULL,701,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10449,2,NULL,2,800,NULL,NULL,'45NG0090','MGR3539',NULL,1,NULL,NULL,NULL,NULL,82,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10450,2,NULL,3,800,NULL,NULL,'45NG0121','MGR3539',NULL,1,NULL,NULL,NULL,NULL,57,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10451,2,NULL,4,800,NULL,NULL,'45NG0122','MGR3539',NULL,1,NULL,NULL,NULL,NULL,56,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10452,2,NULL,1,412,NULL,NULL,'44NG0099','MGR3552',NULL,1,NULL,NULL,NULL,NULL,46,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10453,2,NULL,5,504,NULL,NULL,'44NG0098','MGR3551',NULL,1,NULL,NULL,NULL,NULL,358,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10454,2,NULL,3,504,NULL,NULL,'44NG0097','MGR3551',NULL,1,NULL,NULL,NULL,NULL,194,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10455,2,NULL,1,504,NULL,NULL,'44NG0096','MGR3551',NULL,1,NULL,NULL,NULL,NULL,1545,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10456,2,NULL,5,162,NULL,NULL,'46NG0074','MGR3548',NULL,1,NULL,NULL,NULL,NULL,312,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10457,2,NULL,1,412,NULL,NULL,'44NG0099','MGR3546',NULL,1,NULL,NULL,NULL,NULL,927,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10458,2,NULL,2,412,NULL,NULL,'44NG0100','MGR3546',NULL,1,NULL,NULL,NULL,NULL,45,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10459,2,NULL,4,412,NULL,NULL,'44NG0101','MGR3546',NULL,1,NULL,NULL,NULL,NULL,32,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10460,2,NULL,3,412,NULL,NULL,'46NG0082','MGR3546',NULL,1,NULL,NULL,NULL,NULL,132,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10461,2,NULL,3,670,NULL,NULL,'46NG0079','MGR3550',NULL,1,NULL,NULL,NULL,NULL,80,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10462,2,NULL,5,670,NULL,NULL,'46NG0080','MGR3550',NULL,1,NULL,NULL,NULL,NULL,125,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10463,2,NULL,1,670,NULL,NULL,'46NG0078','MGR3550',NULL,1,NULL,NULL,NULL,NULL,392,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10464,2,NULL,1,707,NULL,NULL,'44NG0102','MGR3547',NULL,1,NULL,NULL,NULL,NULL,233,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10465,2,NULL,3,707,NULL,NULL,'44NG0103','MGR3547',NULL,1,NULL,NULL,NULL,NULL,53,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10466,2,NULL,5,707,NULL,NULL,'46NG0083','MGR3547',NULL,1,NULL,NULL,NULL,NULL,49,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10467,2,NULL,1,132,NULL,NULL,'46NG0070','MGR3544',NULL,1,NULL,NULL,NULL,NULL,328,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10468,2,NULL,2,132,NULL,NULL,'46NG0071','MGR3544',NULL,1,NULL,NULL,NULL,NULL,93,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10469,2,NULL,3,132,NULL,NULL,'46NG0072','MGR3544',NULL,1,NULL,NULL,NULL,NULL,80,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10470,2,NULL,5,132,NULL,NULL,'46NG0073','MGR3514',NULL,1,NULL,NULL,NULL,NULL,82,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10471,2,NULL,3,92,NULL,NULL,'46NG0012','MGR3540',NULL,1,NULL,NULL,NULL,NULL,92,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10472,2,NULL,1,92,NULL,NULL,'46NG0010','MGR3540',NULL,1,NULL,NULL,NULL,NULL,387,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10473,2,NULL,4,92,NULL,NULL,'46NG0013','MGR3540',NULL,1,NULL,NULL,NULL,NULL,501,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10474,2,NULL,4,530,NULL,NULL,'45NG0102','MGR3553',NULL,1,NULL,NULL,NULL,NULL,1807,NULL,44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10475,2,NULL,2,530,NULL,NULL,'45NG0100','MGR3553',NULL,1,NULL,NULL,NULL,NULL,1189,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10476,2,NULL,4,119,NULL,NULL,'46NG0090','MGR3555',NULL,1,NULL,NULL,NULL,NULL,742,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10477,2,NULL,2,119,NULL,NULL,'45NG0096','MGR3555',NULL,1,NULL,NULL,NULL,NULL,424,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10478,2,NULL,5,89,NULL,NULL,'46NG0093','MGR3556',NULL,1,NULL,NULL,NULL,NULL,374,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10479,2,NULL,4,89,NULL,NULL,'45NG0095','MGR3556',NULL,1,NULL,NULL,NULL,NULL,1047,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10480,2,NULL,2,89,NULL,NULL,'45NG0093','MGR3556',NULL,1,NULL,NULL,NULL,NULL,738,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10481,2,NULL,4,350,NULL,NULL,'46NG0053','MGR3557',NULL,1,NULL,NULL,NULL,NULL,3729,NULL,105,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10482,2,NULL,1,350,NULL,NULL,'46NG0052','MGR3557',NULL,1,NULL,NULL,NULL,NULL,9884,NULL,195,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10483,2,NULL,2,1027,NULL,NULL,'46NG0094','MGR3558',NULL,1,NULL,NULL,NULL,NULL,2359,NULL,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10484,2,NULL,1,1027,NULL,NULL,'46NG0051','MGR3558',NULL,1,NULL,NULL,NULL,NULL,4747,NULL,92,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10485,2,NULL,1,1028,NULL,NULL,'46NG0050','MGR3559',NULL,1,NULL,NULL,NULL,NULL,993,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10486,2,NULL,4,1028,NULL,NULL,'46NG0097','MGR3559',NULL,1,NULL,NULL,NULL,NULL,276,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10487,2,NULL,3,1028,NULL,NULL,'46NG0096','MGR3559',NULL,1,NULL,NULL,NULL,NULL,278,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10488,2,NULL,2,1028,NULL,NULL,'46NG0095','MGR3559',NULL,1,NULL,NULL,NULL,NULL,239,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10489,2,NULL,4,440,NULL,NULL,'46NG0047','MGR3564',NULL,1,NULL,NULL,NULL,NULL,10775,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10490,2,NULL,4,138,NULL,NULL,'46NG0002','MGR3563',NULL,1,NULL,NULL,NULL,NULL,8464,NULL,230,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10491,2,NULL,4,440,NULL,NULL,'46NG0047','MGR3562',NULL,1,NULL,NULL,NULL,NULL,11005,NULL,310,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10492,2,NULL,4,138,NULL,NULL,'46NG0002','MGR3561',NULL,1,NULL,NULL,NULL,NULL,8462,NULL,230,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10493,2,NULL,4,578,NULL,NULL,'46NG0048','MGR3577',NULL,1,NULL,NULL,NULL,NULL,10797,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10494,2,NULL,4,158,NULL,NULL,'46NG0009','MGR3578',NULL,1,NULL,NULL,NULL,NULL,178,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10495,2,NULL,5,158,NULL,NULL,'46NG0008','MGR3578',NULL,1,NULL,NULL,NULL,NULL,235,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10496,2,NULL,1,158,NULL,NULL,'46NG0007','MGR3578',NULL,1,NULL,NULL,NULL,NULL,747,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10497,2,NULL,1,169,NULL,NULL,'46NG0037','MGR3576',NULL,1,NULL,NULL,NULL,NULL,10603,NULL,210,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10498,2,NULL,1,140,NULL,NULL,'46NG0084','MGR3573',NULL,1,NULL,NULL,NULL,NULL,1559,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10499,2,NULL,1,201,NULL,NULL,'46NG0040','MGR3574',NULL,1,NULL,NULL,NULL,NULL,779,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10500,2,NULL,2,201,NULL,NULL,'46NG0041','MGR3574',NULL,1,NULL,NULL,NULL,NULL,293,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10501,2,NULL,3,578,NULL,NULL,'46NG0049','MGR3572',NULL,1,NULL,NULL,NULL,NULL,6139,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10502,2,NULL,4,578,NULL,NULL,'46NG0048','MGR3568',NULL,1,NULL,NULL,NULL,NULL,10807,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10503,2,NULL,1,215,NULL,NULL,'46NG0023','MGR3571',NULL,1,NULL,NULL,NULL,NULL,378,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10504,2,NULL,1,299,NULL,NULL,'46NG0022','MGR3570',NULL,1,NULL,NULL,NULL,NULL,156,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10505,2,NULL,1,222,NULL,NULL,'46NG0021','MGR3569',NULL,1,NULL,NULL,NULL,NULL,162,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10506,2,NULL,4,138,NULL,NULL,'46NG0002','MGR3566',NULL,1,NULL,NULL,NULL,NULL,7840,NULL,214,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10507,2,NULL,1,350,NULL,NULL,'44NG0134','MGR3567',NULL,1,NULL,NULL,NULL,NULL,14577,NULL,293,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10508,2,NULL,3,578,NULL,NULL,'46NG0049','MGR3579',NULL,1,NULL,NULL,NULL,NULL,6160,NULL,150,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10509,2,NULL,4,468,NULL,NULL,'46NG0089','MGR3580',NULL,1,NULL,NULL,NULL,NULL,8813,NULL,241,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10510,2,NULL,1,140,NULL,NULL,'46NG0084','MGR3581',NULL,1,NULL,NULL,NULL,NULL,1110,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10511,2,NULL,2,140,NULL,NULL,'46NG0085','MGR3581',NULL,1,NULL,NULL,NULL,NULL,386,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10512,2,NULL,1,468,NULL,NULL,'46NG0087','MGR3584',NULL,1,NULL,NULL,NULL,NULL,10252,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10513,2,NULL,4,468,NULL,NULL,'46NG0089','MGR3582',NULL,1,NULL,NULL,NULL,NULL,4478,NULL,121,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10514,2,NULL,1,468,NULL,NULL,'46NG0088','MGR3582',NULL,1,NULL,NULL,NULL,NULL,4142,NULL,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10515,2,NULL,1,468,NULL,NULL,'46NG0087','MGR3582',NULL,1,NULL,NULL,NULL,NULL,710,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10516,2,NULL,1,399,NULL,NULL,'43NG0042','MGR3586',NULL,1,NULL,NULL,NULL,NULL,3385,NULL,69,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10517,2,NULL,1,373,NULL,NULL,'44NG0122','MGR3585',NULL,1,NULL,NULL,NULL,NULL,1615,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10518,2,NULL,1,820,NULL,NULL,'47NG0034','MGR3590',NULL,1,NULL,NULL,NULL,NULL,276,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10519,2,NULL,5,820,NULL,NULL,'47NG0033','MGR3590',NULL,1,NULL,NULL,NULL,NULL,135,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10520,2,NULL,4,483,NULL,NULL,'47NG0014','MGR3588',NULL,1,NULL,NULL,NULL,NULL,495,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10521,2,NULL,3,483,NULL,NULL,'47NG0013','MGR3588',NULL,1,NULL,NULL,NULL,NULL,554,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10522,2,NULL,2,483,NULL,NULL,'47NG0012','MGR3588',NULL,1,NULL,NULL,NULL,NULL,711,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10523,2,NULL,1,483,NULL,NULL,'47NG0011','MGR3588',NULL,1,NULL,NULL,NULL,NULL,5908,NULL,111,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10524,2,NULL,1,170,NULL,NULL,'47NG0015','MGR3589',NULL,1,NULL,NULL,NULL,NULL,790,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10525,2,NULL,2,170,NULL,NULL,'47NG0016','MGR3589',NULL,1,NULL,NULL,NULL,NULL,155,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10526,2,NULL,3,483,NULL,NULL,'47NG0017','MGR3589',NULL,1,NULL,NULL,NULL,NULL,133,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10527,2,NULL,4,1027,NULL,NULL,'47NG0003','MGR3587',NULL,1,NULL,NULL,NULL,NULL,1341,NULL,46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10528,2,NULL,3,1027,NULL,NULL,'47NG0002','MGR3587',NULL,1,NULL,NULL,NULL,NULL,1151,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10529,2,NULL,2,1027,NULL,NULL,'46NG0098','MGR3587',NULL,1,NULL,NULL,NULL,NULL,95,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10530,2,NULL,1,1027,NULL,NULL,'47NG0024','MGR3587',NULL,1,NULL,NULL,NULL,NULL,197,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10531,2,NULL,1,594,NULL,NULL,'47NG0020','MGR3591',NULL,1,NULL,NULL,NULL,NULL,855,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10532,2,NULL,4,458,NULL,NULL,'47NG0004','MGR3593',NULL,1,NULL,NULL,NULL,NULL,7937,NULL,215,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10533,2,NULL,4,440,NULL,NULL,'47NG0022','MGR3597',NULL,1,NULL,NULL,NULL,NULL,8009,NULL,250,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10534,2,NULL,1,440,NULL,NULL,'47NG0041','MGR3598',NULL,1,NULL,NULL,NULL,NULL,53,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10535,2,NULL,3,440,NULL,NULL,'47NG0021','MGR3598',NULL,1,NULL,NULL,NULL,NULL,11683,NULL,300,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10536,2,NULL,3,440,NULL,NULL,'47NG0021','MGR3597',NULL,1,NULL,NULL,NULL,NULL,1760,NULL,50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10537,2,NULL,4,458,NULL,NULL,'47NG0004','MGR3599',NULL,1,NULL,NULL,NULL,NULL,7631,NULL,209,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10538,2,NULL,1,607,NULL,NULL,'47NG0045','MGR3605',NULL,1,NULL,NULL,NULL,NULL,380,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10539,2,NULL,4,607,NULL,NULL,'47NG0047','MGR3605',NULL,1,NULL,NULL,NULL,NULL,37,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10540,2,NULL,5,607,NULL,NULL,'47NG0049','MGR3605',NULL,1,NULL,NULL,NULL,NULL,27,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10541,2,NULL,1,878,NULL,NULL,'47NG0031','MGR3604',NULL,1,NULL,NULL,NULL,NULL,821,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10542,2,NULL,1,236,NULL,NULL,'47NG0010','MGR3603',NULL,1,NULL,NULL,NULL,NULL,446,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10543,2,NULL,3,236,NULL,NULL,'47NG0043','MGR3603',NULL,1,NULL,NULL,NULL,NULL,2158,NULL,58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10544,2,NULL,2,236,NULL,NULL,'47NG0044','MGR3603',NULL,1,NULL,NULL,NULL,NULL,1072,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10545,2,NULL,4,458,NULL,NULL,'47NG0004','MGR3600',NULL,1,NULL,NULL,NULL,NULL,7568,NULL,206,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10546,2,NULL,1,468,NULL,NULL,'47NG0029','MGR3615',NULL,1,NULL,NULL,NULL,NULL,10135,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10547,2,NULL,3,458,NULL,NULL,'47NG0048','MGR3614',NULL,1,NULL,NULL,NULL,NULL,8866,NULL,213,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10548,2,NULL,3,458,NULL,NULL,'47NG0048','MGR3613',NULL,1,NULL,NULL,NULL,NULL,697,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10549,2,NULL,4,169,NULL,NULL,'47NG0018','MGR3612',NULL,1,NULL,NULL,NULL,NULL,6082,NULL,167,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10550,2,NULL,4,169,NULL,NULL,'47NG0053','MGR3612',NULL,1,NULL,NULL,NULL,NULL,5778,NULL,159,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10551,2,NULL,4,169,NULL,NULL,'47NG0018','MGR3611',NULL,1,NULL,NULL,NULL,NULL,12048,NULL,333,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10552,2,NULL,3,141,NULL,NULL,'47NG0040','MGR3606',NULL,1,NULL,NULL,NULL,NULL,1343,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10553,2,NULL,3,351,NULL,NULL,'47NG0038','MGR3607',NULL,1,NULL,NULL,NULL,NULL,1705,NULL,47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10554,2,NULL,1,351,NULL,NULL,'47NG0037','MGR3607',NULL,1,NULL,NULL,NULL,NULL,6250,NULL,125,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10555,2,NULL,3,141,NULL,NULL,'47NG0040','MGR3608',NULL,1,NULL,NULL,NULL,NULL,745,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10556,2,NULL,1,141,NULL,NULL,'47NG0039','MGR3608',NULL,1,NULL,NULL,NULL,NULL,2604,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10557,2,NULL,3,589,NULL,NULL,'47NG0027','MGR3610',NULL,1,NULL,NULL,NULL,NULL,221,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10558,2,NULL,5,589,NULL,NULL,'47NG0028','MGR3610',NULL,1,NULL,NULL,NULL,NULL,117,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10559,2,NULL,2,589,NULL,NULL,'47NG0026','MGR3610',NULL,1,NULL,NULL,NULL,NULL,219,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10560,2,NULL,1,589,NULL,NULL,'47NG0025','MGR3610',NULL,1,NULL,NULL,NULL,NULL,1339,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10561,2,NULL,3,627,NULL,NULL,'47NG0052','MGR3609',NULL,1,NULL,NULL,NULL,NULL,770,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10562,2,NULL,1,627,NULL,NULL,'47NG0036','MGR3609',NULL,1,NULL,NULL,NULL,NULL,4878,NULL,101,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10563,2,NULL,5,8,NULL,NULL,'47NG0009','MGR3618',NULL,1,NULL,NULL,NULL,NULL,3188,NULL,74,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10564,2,NULL,3,8,NULL,NULL,'47NG0008','MGR3618',NULL,1,NULL,NULL,NULL,NULL,7435,NULL,183,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10565,2,NULL,2,8,NULL,NULL,'47NG0007','MGR3618',NULL,1,NULL,NULL,NULL,NULL,632,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10566,2,NULL,1,8,NULL,NULL,'47NG0006','MGR3618',NULL,1,NULL,NULL,NULL,NULL,14838,NULL,285,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10567,2,NULL,4,169,NULL,NULL,'47NG0053','MGR3617',NULL,1,NULL,NULL,NULL,NULL,11326,NULL,313,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10568,2,NULL,4,468,NULL,NULL,'47NG0030','MGR3620',NULL,1,NULL,NULL,NULL,NULL,3800,NULL,104,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10569,2,NULL,1,468,NULL,NULL,'47NG0029','MGR3619',NULL,1,NULL,NULL,NULL,NULL,6400,NULL,126,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10570,2,NULL,4,468,NULL,NULL,'47NG0030','MGR3620',NULL,1,NULL,NULL,NULL,NULL,6985,NULL,190,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10571,2,NULL,1,392,NULL,NULL,'45NG0061','MGR3621',NULL,1,NULL,NULL,NULL,NULL,697,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10572,2,NULL,2,392,NULL,NULL,'45NG0062','MGR3621',NULL,1,NULL,NULL,NULL,NULL,345,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10573,2,NULL,3,392,NULL,NULL,'45NG0063','MGR3621',NULL,1,NULL,NULL,NULL,NULL,382,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10574,2,NULL,4,392,NULL,NULL,'45NG0064','MGR3621',NULL,1,NULL,NULL,NULL,NULL,612,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10575,2,NULL,2,392,NULL,NULL,'45NG0065','MGR3621',NULL,1,NULL,NULL,NULL,NULL,671,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10576,2,NULL,2,392,NULL,NULL,'45NG0066','MGR3621',NULL,1,NULL,NULL,NULL,NULL,1095,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10577,2,NULL,3,392,NULL,NULL,'45NG0067','MGR3621',NULL,1,NULL,NULL,NULL,NULL,535,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10578,2,NULL,4,392,NULL,NULL,'45NG0068','MGR3621',NULL,1,NULL,NULL,NULL,NULL,631,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10579,2,NULL,1,852,NULL,NULL,'47NG0050','GRN3623',NULL,1,NULL,NULL,NULL,NULL,2973,NULL,74,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10580,2,NULL,3,852,NULL,NULL,'47NG0054','MGR3623',NULL,1,NULL,NULL,NULL,NULL,281,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10581,2,NULL,3,852,NULL,NULL,'47NG0051','MGR3623',NULL,1,NULL,NULL,NULL,NULL,617,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10582,2,NULL,4,350,NULL,NULL,'48NG0017','MGR3629',NULL,1,NULL,NULL,NULL,NULL,9872,NULL,276,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10583,2,NULL,1,548,NULL,NULL,'48NG0044','MGR3628',NULL,1,NULL,NULL,NULL,NULL,9927,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10584,2,NULL,4,201,NULL,NULL,'48NG0015','MGR3627',NULL,1,NULL,NULL,NULL,NULL,59,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10585,2,NULL,1,201,NULL,NULL,'48NG0013','MGR3627',NULL,1,NULL,NULL,NULL,NULL,732,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10586,2,NULL,5,201,NULL,NULL,'48NG0016','MGR3627',NULL,1,NULL,NULL,NULL,NULL,176,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10587,2,NULL,3,201,NULL,NULL,'48NG0014','MGR3627',NULL,1,NULL,NULL,NULL,NULL,221,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10588,2,NULL,1,401,NULL,NULL,'48NG0032','MGR3626',NULL,1,NULL,NULL,NULL,NULL,1016,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10589,2,NULL,4,350,NULL,NULL,'48NG0017','MGR3625',NULL,1,NULL,NULL,NULL,NULL,11862,NULL,331,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10590,2,NULL,5,435,NULL,NULL,'46NG0081','MGR3624',NULL,1,NULL,NULL,NULL,NULL,344,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10591,2,NULL,1,235,NULL,NULL,'48NG0006','MGR3635',NULL,1,NULL,NULL,NULL,NULL,677,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10592,2,NULL,2,235,NULL,NULL,'48NG0064','MGR3635',NULL,1,NULL,NULL,NULL,NULL,164,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10593,2,NULL,5,235,NULL,NULL,'48NG0065','MGR3635',NULL,1,NULL,NULL,NULL,NULL,102,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10594,2,NULL,1,177,NULL,NULL,'48NG0009','MGR3636',NULL,1,NULL,NULL,NULL,NULL,100,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10595,2,NULL,5,177,NULL,NULL,'48NG0066','MGR3636',NULL,1,NULL,NULL,NULL,NULL,23,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10596,2,NULL,4,177,NULL,NULL,'48NG0010','MGR3636',NULL,1,NULL,NULL,NULL,NULL,88,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10597,3,NULL,1,180,NULL,NULL,'48NG0007','MGR3637',NULL,1,NULL,NULL,NULL,NULL,128,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10598,2,NULL,5,180,NULL,NULL,'48NG0063','MGR3637',NULL,1,NULL,NULL,NULL,NULL,51,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10599,2,NULL,1,180,NULL,NULL,'48NG0060','MGR3637',NULL,1,NULL,NULL,NULL,NULL,83,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10600,2,NULL,5,180,NULL,NULL,'48NG0062','MGR3637',NULL,1,NULL,NULL,NULL,NULL,44,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10601,2,NULL,1,180,NULL,NULL,'48NG0061','MGR3637',NULL,1,NULL,NULL,NULL,NULL,306,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10602,2,NULL,5,180,NULL,NULL,'48NG0059','MGR3637',NULL,1,NULL,NULL,NULL,NULL,79,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10603,2,NULL,4,180,NULL,NULL,'48NG0058','MGR3637',NULL,1,NULL,NULL,NULL,NULL,13,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10604,2,NULL,3,180,NULL,NULL,'48NG0008','MGR3637',NULL,1,NULL,NULL,NULL,NULL,36,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10605,2,NULL,4,622,NULL,NULL,'48NG0070','MGR3638',NULL,1,NULL,NULL,NULL,NULL,38,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10606,2,NULL,2,622,NULL,NULL,'48NG0069','MGR3638',NULL,1,NULL,NULL,NULL,NULL,38,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10607,2,NULL,1,622,NULL,NULL,'48NG0068','MGR3638',NULL,1,NULL,NULL,NULL,NULL,448,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10608,2,NULL,1,445,NULL,NULL,'48NG0004','MGR3639',NULL,1,NULL,NULL,NULL,NULL,139,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10609,2,NULL,3,445,NULL,NULL,'48NG0005','MGR3639',NULL,1,NULL,NULL,NULL,NULL,10,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10610,2,NULL,5,445,NULL,NULL,'48NG0067','MGR3639',NULL,1,NULL,NULL,NULL,NULL,78,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10611,2,NULL,2,99,NULL,NULL,'48NG0021','MGR3640',NULL,1,NULL,NULL,NULL,NULL,1025,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10612,2,NULL,4,99,NULL,NULL,'48NG0023','MGR3640',NULL,1,NULL,NULL,NULL,NULL,1794,NULL,48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10613,2,NULL,3,99,NULL,NULL,'48NG0022','MGR3640',NULL,1,NULL,NULL,NULL,NULL,958,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10614,2,NULL,1,99,NULL,NULL,'48NG0020','MGR3640',NULL,1,NULL,NULL,NULL,NULL,4940,NULL,97,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10615,2,NULL,1,401,NULL,NULL,'48NG0050','MGR3633',NULL,1,NULL,NULL,NULL,NULL,338,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10616,2,NULL,5,663,NULL,NULL,'48NG0003','MGR3632',NULL,1,NULL,NULL,NULL,NULL,76,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10617,2,NULL,1,663,NULL,NULL,'48NG0001','MGR3632',NULL,1,NULL,NULL,NULL,NULL,335,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10618,2,NULL,4,663,NULL,NULL,'48NG0056','MGR3632',NULL,1,NULL,NULL,NULL,NULL,53,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10619,2,NULL,1,612,NULL,NULL,'48NG0033','MGR3631',NULL,1,NULL,NULL,NULL,NULL,618,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10620,2,NULL,2,612,NULL,NULL,'48NG0034','MGR3631',NULL,1,NULL,NULL,NULL,NULL,336,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10621,2,NULL,3,612,NULL,NULL,'48NG0035','MGR3631',NULL,1,NULL,NULL,NULL,NULL,389,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10622,2,NULL,4,612,NULL,NULL,'48NG0036','MGR3631',NULL,1,NULL,NULL,NULL,NULL,459,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10623,2,NULL,5,612,NULL,NULL,'48NG0037','MGR3631',NULL,1,NULL,NULL,NULL,NULL,263,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10624,2,NULL,5,350,NULL,NULL,'48NG0018','MGR3630',NULL,1,NULL,NULL,NULL,NULL,6104,NULL,162,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10625,2,NULL,1,72,NULL,NULL,'48NG0051','MGR3644',NULL,1,NULL,NULL,NULL,NULL,1101,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10626,2,NULL,4,75,NULL,NULL,'48NG0054','MGR3641',NULL,1,NULL,NULL,NULL,NULL,169,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10627,2,NULL,3,75,NULL,NULL,'48NG0053','MGR3641',NULL,1,NULL,NULL,NULL,NULL,87,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10628,2,NULL,1,75,NULL,NULL,'48NG0052','MGR3641',NULL,1,NULL,NULL,NULL,NULL,448,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10629,2,NULL,5,75,NULL,NULL,'48NG0055','MGR3541',NULL,1,NULL,NULL,NULL,NULL,37,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10630,2,NULL,5,37,NULL,NULL,'48NG0042','MGR3642',NULL,1,NULL,NULL,NULL,NULL,3427,NULL,84,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10631,2,NULL,5,37,NULL,NULL,'48NG0075','MGR3642',NULL,1,NULL,NULL,NULL,NULL,276,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10632,2,NULL,1,37,NULL,NULL,'48NG0072','MGR3642',NULL,1,NULL,NULL,NULL,NULL,224,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10633,2,NULL,3,37,NULL,NULL,'48NG0073','MGR3642',NULL,1,NULL,NULL,NULL,NULL,83,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10634,2,NULL,4,37,NULL,NULL,'48NG0074','MGR3642',NULL,1,NULL,NULL,NULL,NULL,189,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10635,2,NULL,1,81,NULL,NULL,'48NG0048','MGR3654',NULL,1,NULL,NULL,NULL,NULL,180,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10636,2,NULL,4,81,NULL,NULL,'48NG0076','MGR3645',NULL,1,NULL,NULL,NULL,NULL,60,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10637,2,NULL,5,81,NULL,NULL,'48NG0049','MGR3645',NULL,1,NULL,NULL,NULL,NULL,279,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10638,2,NULL,2,57,NULL,NULL,'48NG0025','MGR3652',NULL,1,NULL,NULL,NULL,NULL,1282,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10639,2,NULL,1,57,NULL,NULL,'48NG0024','MGR3652',NULL,1,NULL,NULL,NULL,NULL,5848,NULL,115,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10640,2,NULL,1,143,NULL,NULL,'48NG0077','MGR3651',NULL,1,NULL,NULL,NULL,NULL,90,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10641,2,NULL,3,143,NULL,NULL,'48NG0078','MGR3651',NULL,1,NULL,NULL,NULL,NULL,1178,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10642,2,NULL,1,584,NULL,NULL,'48NG0046','MGR3650',NULL,1,NULL,NULL,NULL,NULL,1265,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10643,2,NULL,3,584,NULL,NULL,'48NG0047','MGR3650',NULL,1,NULL,NULL,NULL,NULL,824,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10644,2,NULL,1,724,NULL,NULL,'48NG0039','MGR3648',NULL,1,NULL,NULL,NULL,NULL,8108,NULL,157,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10645,2,NULL,3,724,NULL,NULL,'48NG0040','MGR3649',NULL,1,NULL,NULL,NULL,NULL,7503,NULL,180,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10646,2,NULL,1,724,NULL,NULL,'48NG0039','MGR3647',NULL,1,NULL,NULL,NULL,NULL,3317,NULL,64,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10647,2,NULL,2,169,NULL,NULL,'48NG0019','MGR3646',NULL,1,NULL,NULL,NULL,NULL,14892,NULL,293,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10648,2,NULL,6,724,NULL,NULL,'48NG3001','MGR3647',NULL,1,NULL,NULL,NULL,NULL,1357,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10649,2,NULL,6,724,NULL,NULL,'48NG3002','MGR3653',NULL,1,NULL,NULL,NULL,NULL,2599,NULL,42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10650,2,NULL,6,724,NULL,NULL,'48NG3002','MGR3654',NULL,1,NULL,NULL,NULL,NULL,6591,NULL,106,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10651,2,NULL,1,101,NULL,NULL,'49NG0009','MGR3659',NULL,1,NULL,NULL,NULL,NULL,2048,NULL,40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10652,2,NULL,2,101,NULL,NULL,'49NG0010','MGR3659',NULL,1,NULL,NULL,NULL,NULL,439,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10653,2,NULL,3,101,NULL,NULL,'49NG0012','MGR3659',NULL,1,NULL,NULL,NULL,NULL,445,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10654,2,NULL,1,753,NULL,NULL,'49NG0006','MGR3658',NULL,1,NULL,NULL,NULL,NULL,3830,NULL,76,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10655,2,NULL,2,753,NULL,NULL,'49NG0007','MGR3658',NULL,1,NULL,NULL,NULL,NULL,404,NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10656,2,NULL,3,753,NULL,NULL,'49NG0008','MGR3658',NULL,1,NULL,NULL,NULL,NULL,684,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10657,2,NULL,1,331,NULL,NULL,'49NG0013','MGR3657',NULL,1,NULL,NULL,NULL,NULL,1921,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10658,2,NULL,2,331,NULL,NULL,'49NG0014','MGR3657',NULL,1,NULL,NULL,NULL,NULL,43,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10659,2,NULL,3,331,NULL,NULL,'49NG0015','MGR3657',NULL,1,NULL,NULL,NULL,NULL,515,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10660,2,NULL,1,748,NULL,NULL,'49NG0002','MGR3655',NULL,1,NULL,NULL,NULL,NULL,3458,NULL,73,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10661,2,NULL,2,748,NULL,NULL,'49NG0003','MGR3655',NULL,1,NULL,NULL,NULL,NULL,386,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10662,2,NULL,5,748,NULL,NULL,'49NG0005','MGR3655',NULL,1,NULL,NULL,NULL,NULL,481,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10663,2,NULL,4,748,NULL,NULL,'49NG0004','MGR3655',NULL,1,NULL,NULL,NULL,NULL,1771,NULL,57,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10664,2,NULL,1,58,NULL,NULL,'49NG0001','MGR3656',NULL,1,NULL,NULL,NULL,NULL,389,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10665,2,NULL,1,90,NULL,NULL,'49NG0029','MGR3661',NULL,1,NULL,NULL,NULL,NULL,724,NULL,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10666,2,NULL,4,90,NULL,NULL,'49NG0036','MGR3661',NULL,1,NULL,NULL,NULL,NULL,287,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10667,2,NULL,2,90,NULL,NULL,'49NG0035','MGR3661',NULL,1,NULL,NULL,NULL,NULL,181,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10668,2,NULL,1,90,NULL,NULL,'49NG0028','MGR3660',NULL,1,NULL,NULL,NULL,NULL,4898,NULL,107,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10669,2,NULL,3,627,NULL,NULL,'49NG0031','MGR3662',NULL,1,NULL,NULL,NULL,NULL,468,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10670,2,NULL,1,627,NULL,NULL,'49NG0030','MGR3662',NULL,1,NULL,NULL,NULL,NULL,1330,NULL,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10671,2,NULL,1,617,NULL,NULL,'42NG0008','MGR3304',NULL,1,NULL,NULL,NULL,NULL,1113,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10672,2,NULL,1,617,NULL,NULL,'42NG0008','MGR3310',NULL,1,NULL,NULL,NULL,NULL,9730,NULL,175,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10673,2,NULL,4,3,NULL,NULL,'43NG0005','MGR338',NULL,1,NULL,NULL,NULL,NULL,280,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10674,2,NULL,1,3,NULL,NULL,'43NG0004','MGR3338',NULL,1,NULL,NULL,NULL,NULL,1205,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10675,2,NULL,1,3,NULL,NULL,'42NG0057','MGR3341',NULL,1,NULL,NULL,NULL,NULL,438,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10676,2,NULL,3,3,NULL,NULL,'43NG0002','MGR3341',NULL,1,NULL,NULL,NULL,NULL,100,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10677,2,NULL,2,3,NULL,NULL,'43NG0001','MGR3341',NULL,1,NULL,NULL,NULL,NULL,122,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10678,2,NULL,4,3,NULL,NULL,'43NG0003','MGR3341',NULL,1,NULL,NULL,NULL,NULL,171,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10679,2,NULL,1,617,NULL,NULL,'43NG0026','MGR3355',NULL,1,NULL,NULL,NULL,NULL,1128,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10680,2,NULL,1,617,NULL,NULL,'43NG0026','MGR3356',NULL,1,NULL,NULL,NULL,NULL,9835,NULL,175,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10681,2,NULL,1,617,NULL,NULL,'43NG0027','MGR3378',NULL,1,NULL,NULL,NULL,NULL,9871,NULL,175,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10682,2,NULL,1,617,NULL,NULL,'43NG0027','MGR3377',NULL,1,NULL,NULL,NULL,NULL,1126,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10683,2,NULL,2,37,NULL,NULL,'44NG0129','MGR3415',NULL,1,NULL,NULL,NULL,NULL,1202,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10684,2,NULL,1,3,NULL,NULL,'44NG0062','MGR3404',NULL,1,NULL,NULL,NULL,NULL,1254,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10685,2,NULL,2,3,NULL,NULL,'44NG0063','MGR3404',NULL,1,NULL,NULL,NULL,NULL,48,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10686,2,NULL,3,3,NULL,NULL,'44NG0064','MGR3404',NULL,1,NULL,NULL,NULL,NULL,35,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10687,2,NULL,4,3,NULL,NULL,'44NG0065','MGR3404',NULL,1,NULL,NULL,NULL,NULL,71,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10688,2,NULL,1,3,NULL,NULL,'44NG0054','MGR3405',NULL,1,NULL,NULL,NULL,NULL,1790,NULL,35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10689,2,NULL,4,3,NULL,NULL,'44NG0057','MGR3405',NULL,1,NULL,NULL,NULL,NULL,1638,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10690,2,NULL,1,617,NULL,NULL,'44NG0044','MGR3420',NULL,1,NULL,NULL,NULL,NULL,9786,NULL,175,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10691,2,NULL,1,617,NULL,NULL,'44NG0044','MGR3419',NULL,1,NULL,NULL,NULL,NULL,1174,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10692,2,NULL,1,110,NULL,NULL,'43NG0047','MGR3418',NULL,1,NULL,NULL,NULL,NULL,8484,NULL,160,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10693,2,NULL,1,110,NULL,NULL,'43NG0049','MGR3425',NULL,1,NULL,NULL,NULL,NULL,8534,NULL,162,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10694,2,NULL,1,110,NULL,NULL,'44NG0148','MGR3436',NULL,1,NULL,NULL,NULL,NULL,50,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10695,2,NULL,2,110,NULL,NULL,'44NG0147','MGR3436',NULL,1,NULL,NULL,NULL,NULL,960,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10696,2,NULL,1,110,NULL,NULL,'43NG0046','MGR3437',NULL,1,NULL,NULL,NULL,NULL,3019,NULL,58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10697,2,NULL,2,110,NULL,NULL,'44NG0149','MGR3437',NULL,1,NULL,NULL,NULL,NULL,220,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10698,2,NULL,1,110,NULL,NULL,'44NG0146','MGR3438',NULL,1,NULL,NULL,NULL,NULL,1775,NULL,33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10699,2,NULL,1,110,NULL,NULL,'43NG0048','MGR3434',NULL,1,NULL,NULL,NULL,NULL,2557,NULL,50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10700,2,NULL,1,617,NULL,NULL,'45NG0028','MGR3475',NULL,1,NULL,NULL,NULL,NULL,9447,NULL,168,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10701,2,NULL,1,617,NULL,NULL,'45NG0028','MGR3474',NULL,1,NULL,NULL,NULL,NULL,1122,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10702,2,NULL,1,617,NULL,NULL,'45NG0103','MGR3508',NULL,1,NULL,NULL,NULL,NULL,1127,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10703,2,NULL,1,617,NULL,NULL,'45NG0103','MGR3509',NULL,1,NULL,NULL,NULL,NULL,13925,NULL,250,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10704,2,NULL,1,371,NULL,NULL,'46NG0075','MGR3549',NULL,1,NULL,NULL,NULL,NULL,474,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10705,2,NULL,5,371,NULL,NULL,'46NG0077','MGR3549',NULL,1,NULL,NULL,NULL,NULL,46,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10706,2,NULL,3,371,NULL,NULL,'46NG0076','MGR3549',NULL,1,NULL,NULL,NULL,NULL,34,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10707,2,NULL,4,3,NULL,NULL,'46NG0017','MGR3543',NULL,1,NULL,NULL,NULL,NULL,155,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10708,2,NULL,1,3,NULL,NULL,'46NG0014','MGR3543',NULL,1,NULL,NULL,NULL,NULL,887,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10709,2,NULL,2,3,NULL,NULL,'46NG0015','MGR3543',NULL,1,NULL,NULL,NULL,NULL,247,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10710,2,NULL,3,3,NULL,NULL,'46NG0016','MGR3543',NULL,1,NULL,NULL,NULL,NULL,873,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10711,2,NULL,4,3,NULL,NULL,'46NG0020','MGR3545',NULL,1,NULL,NULL,NULL,NULL,31,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10712,2,NULL,2,3,NULL,NULL,'46NG0019','MGR3545',NULL,1,NULL,NULL,NULL,NULL,45,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10713,2,NULL,1,3,NULL,NULL,'46NG0018','MGR3545',NULL,1,NULL,NULL,NULL,NULL,153,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10714,2,NULL,3,110,NULL,NULL,'45NG0101','MGR3553',NULL,1,NULL,NULL,NULL,NULL,434,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10715,2,NULL,1,110,NULL,NULL,'45NG0098','MGR3554',NULL,1,NULL,NULL,NULL,NULL,401,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10716,2,NULL,5,110,NULL,NULL,'46NG0091','MGR3555',NULL,1,NULL,NULL,NULL,NULL,198,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10717,2,NULL,3,110,NULL,NULL,'45NG0097','MGR3555',NULL,1,NULL,NULL,NULL,NULL,636,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10718,2,NULL,3,110,NULL,NULL,'45NG0094','MGR3556',NULL,1,NULL,NULL,NULL,NULL,633,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10719,2,NULL,1,110,NULL,NULL,'46NG0092','MGR3556',NULL,1,NULL,NULL,NULL,NULL,151,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10720,2,NULL,1,617,NULL,NULL,'46NG0069','MGR3575',NULL,1,NULL,NULL,NULL,NULL,7998,NULL,147,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10721,2,NULL,3,617,NULL,NULL,'47NG0023','MGR3592',NULL,1,NULL,NULL,NULL,NULL,7480,NULL,196,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10722,2,NULL,1,1029,NULL,NULL,'47NG0005','MGR3594',NULL,1,NULL,NULL,NULL,NULL,8078,NULL,180,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10723,2,NULL,3,617,NULL,NULL,'47NG0023','MGR3595',NULL,1,NULL,NULL,NULL,NULL,5051,NULL,134,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10724,2,NULL,2,617,NULL,NULL,'47NG0035','MGR3602',NULL,1,NULL,NULL,NULL,NULL,797,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10725,2,NULL,2,617,NULL,NULL,'47NG0035','MGR3601',NULL,1,NULL,NULL,NULL,NULL,9131,NULL,170,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10726,2,NULL,1,1030,NULL,NULL,'48NG0011','MGR3634',NULL,1,NULL,NULL,NULL,NULL,634,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10727,2,NULL,3,1030,NULL,NULL,'48NG0012','MGR3634',NULL,1,NULL,NULL,NULL,NULL,33,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10728,2,NULL,2,1030,NULL,NULL,'48NG0057','MGR3634',NULL,1,NULL,NULL,NULL,NULL,57,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10729,2,NULL,5,542,NULL,NULL,'48NG0038','MGR3643',NULL,1,NULL,NULL,NULL,NULL,153,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10730,2,NULL,1,17,NULL,NULL,'49NG0040','MGR3670',NULL,1,NULL,NULL,NULL,NULL,3630,NULL,71,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10731,2,NULL,1,17,NULL,NULL,'49NG0039','MGR3669',NULL,1,NULL,NULL,NULL,NULL,2749,NULL,54,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10732,2,NULL,1,17,NULL,NULL,'49NG0038','MGR3668',NULL,1,NULL,NULL,NULL,NULL,3350,NULL,66,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10733,2,NULL,5,8,NULL,NULL,'49NG0037','MGR3667',NULL,1,NULL,NULL,NULL,NULL,9266,NULL,214,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10734,2,NULL,3,468,NULL,NULL,'49NG0033','MGR3666',NULL,1,NULL,NULL,NULL,NULL,8306,NULL,200,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10735,2,NULL,3,468,NULL,NULL,'49NG0033','MGR3664',NULL,1,NULL,NULL,NULL,NULL,5255,NULL,127,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10736,2,NULL,1,468,NULL,NULL,'49NG0032','MGR3665',NULL,1,NULL,NULL,NULL,NULL,4117,NULL,82,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10737,2,NULL,2,60,NULL,NULL,'49NG0018','MGR3671',NULL,1,NULL,NULL,NULL,NULL,1318,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10738,2,NULL,4,60,NULL,NULL,'49NG0041','MGR3671',NULL,1,NULL,NULL,NULL,NULL,150,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10739,2,NULL,1,199,NULL,NULL,'50NG0006','MGR3677',NULL,1,NULL,NULL,NULL,NULL,44,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10740,2,NULL,1,60,NULL,NULL,'49NG0017','MGR3671',NULL,1,NULL,NULL,NULL,NULL,5227,NULL,102,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10741,2,NULL,2,199,NULL,NULL,'50NG0009','MGR3676',NULL,1,NULL,NULL,NULL,NULL,1125,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10742,2,NULL,3,199,NULL,NULL,'50NG0013','MGR3675',NULL,1,NULL,NULL,NULL,NULL,597,NULL,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10743,2,NULL,2,199,NULL,NULL,'50NG0012','MGR3675',NULL,1,NULL,NULL,NULL,NULL,289,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10744,2,NULL,1,199,NULL,NULL,'50NG0011','MGR3675',NULL,1,NULL,NULL,NULL,NULL,1912,NULL,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10745,2,NULL,3,199,NULL,NULL,'50NG0007','MGR3674',NULL,1,NULL,NULL,NULL,NULL,1303,NULL,34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10746,2,NULL,1,199,NULL,NULL,'50NG0006','MGR3674',NULL,1,NULL,NULL,NULL,NULL,4197,NULL,86,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10747,2,NULL,3,199,NULL,NULL,'50NG0005','MGR3673',NULL,1,NULL,NULL,NULL,NULL,2224,NULL,67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10748,2,NULL,1,199,NULL,NULL,'50NG0004','MGR3673',NULL,1,NULL,NULL,NULL,NULL,6515,NULL,134,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10749,2,NULL,3,878,NULL,NULL,'50NG0001','MGR3672',NULL,1,NULL,NULL,NULL,NULL,193,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10750,2,NULL,4,878,NULL,NULL,'50NG0002','MGR3672',NULL,1,NULL,NULL,NULL,NULL,66,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10751,2,NULL,5,878,NULL,NULL,'50NG0003','MGR3672',NULL,1,NULL,NULL,NULL,NULL,352,NULL,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10752,2,NULL,4,60,NULL,NULL,'49NG0020','MGR3680',NULL,1,NULL,NULL,NULL,NULL,2757,NULL,71,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10753,2,NULL,3,60,NULL,NULL,'49NG0019','MGR3680',NULL,1,NULL,NULL,NULL,NULL,4057,NULL,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10754,2,NULL,4,468,NULL,NULL,'49NG0034','MGR3664',NULL,1,NULL,NULL,NULL,NULL,2915,NULL,80,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10755,2,NULL,3,468,NULL,NULL,'49NG0033','MGR3664',NULL,1,NULL,NULL,NULL,NULL,6482,NULL,157,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10756,2,NULL,5,274,NULL,NULL,'49NG3001','MGR3663',NULL,1,NULL,NULL,NULL,NULL,2504,NULL,41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10757,2,NULL,3,199,NULL,NULL,'50NG0010','MGR3676',NULL,1,NULL,NULL,NULL,NULL,818,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10758,2,NULL,1,578,NULL,NULL,'50NG0044','MGR3681',NULL,1,NULL,NULL,NULL,NULL,20178,NULL,336,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10759,2,NULL,1,578,NULL,NULL,'50NG0019','MGR3681',NULL,1,NULL,NULL,NULL,NULL,20594,NULL,343,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10760,2,NULL,1,806,NULL,NULL,'50NG0079','MGR3687',NULL,1,NULL,NULL,NULL,NULL,234,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10761,2,NULL,2,806,NULL,NULL,'50NG0080','MGR3687',NULL,1,NULL,NULL,NULL,NULL,38,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10762,2,NULL,3,806,NULL,NULL,'50NG0081','MGR3687',NULL,1,NULL,NULL,NULL,NULL,103,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10763,2,NULL,3,128,NULL,NULL,'50NG0087','MGR3688',NULL,1,NULL,NULL,NULL,NULL,228,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10764,2,NULL,2,128,NULL,NULL,'50NG0086','MGR3688',NULL,1,NULL,NULL,NULL,NULL,43,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10765,2,NULL,1,128,NULL,NULL,'50NG0085','MGR3688',NULL,1,NULL,NULL,NULL,NULL,187,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10766,2,NULL,1,151,NULL,NULL,'50NG0082','MGR3689',NULL,1,NULL,NULL,NULL,NULL,270,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10767,2,NULL,3,151,NULL,NULL,'50NG0084','MGR3689',NULL,1,NULL,NULL,NULL,NULL,59,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10768,2,NULL,2,151,NULL,NULL,'50NG0083','MGR3689',NULL,1,NULL,NULL,NULL,NULL,101,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10769,2,NULL,3,143,NULL,NULL,'50NG0090','MGR3690',NULL,1,NULL,NULL,NULL,NULL,58,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10770,2,NULL,1,143,NULL,NULL,'50NG0088','MGR3690',NULL,1,NULL,NULL,NULL,NULL,80,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10771,2,NULL,2,143,NULL,NULL,'50NG0089','MGR3690',NULL,1,NULL,NULL,NULL,NULL,49,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10772,2,NULL,1,318,NULL,NULL,'50NG0008','MGR3676',NULL,1,NULL,NULL,NULL,NULL,2653,NULL,52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10773,2,NULL,3,858,NULL,NULL,'50NG0075','MGR3681',NULL,1,NULL,NULL,NULL,NULL,270,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10774,2,NULL,2,858,NULL,NULL,'50NG0074','MGR3681',NULL,1,NULL,NULL,NULL,NULL,664,NULL,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10775,2,NULL,1,858,NULL,NULL,'50NG0073','MGR3691',NULL,1,NULL,NULL,NULL,NULL,949,NULL,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10776,2,NULL,3,163,NULL,NULL,'50NG0072','MGR3692',NULL,1,NULL,NULL,NULL,NULL,130,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10777,2,NULL,1,163,NULL,NULL,'50NG0071','MGR3692',NULL,1,NULL,NULL,NULL,NULL,583,NULL,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10778,2,NULL,4,617,NULL,NULL,'50NG0070','MGR3698',NULL,1,NULL,NULL,NULL,NULL,859,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10779,2,NULL,1,734,NULL,NULL,'50NG0038','MGR3700',NULL,1,NULL,NULL,NULL,NULL,3122,NULL,60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10780,2,NULL,2,734,NULL,NULL,'50NG0039','MGR3700',NULL,1,NULL,NULL,NULL,NULL,222,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10781,2,NULL,4,617,NULL,NULL,'50NG0070','MGR3699',NULL,1,NULL,NULL,NULL,NULL,1584,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10782,2,NULL,1,610,NULL,NULL,'50NG0014','MGR3697',NULL,1,NULL,NULL,NULL,NULL,1427,NULL,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10783,2,NULL,3,610,NULL,NULL,'50NG0015','MGR3697',NULL,1,NULL,NULL,NULL,NULL,1509,NULL,36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10784,2,NULL,4,610,NULL,NULL,'50NG0016','MGR3697',NULL,1,NULL,NULL,NULL,NULL,968,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10785,2,NULL,5,610,NULL,NULL,'50NG0017','MGR3697',NULL,1,NULL,NULL,NULL,NULL,1820,NULL,51,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10786,2,NULL,1,548,NULL,NULL,'50NG0076','MGR3696',NULL,1,NULL,NULL,NULL,NULL,1111,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL),(10787,2,NULL,3,548,NULL,NULL,'50NG0077','MGR3696',NULL,1,NULL,NULL,NULL,NULL,1105,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-10-30 12:27:38',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams_tms`
--

LOCK TABLES `teams_tms` WRITE;
/*!40000 ALTER TABLE `teams_tms` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `ctr_id` int(11) DEFAULT NULL,
  `th_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `th_percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thresholds_th`
--

LOCK TABLES `thresholds_th` WRITE;
/*!40000 ALTER TABLE `thresholds_th` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transporters_trp`
--

LOCK TABLES `transporters_trp` WRITE;
/*!40000 ALTER TABLE `transporters_trp` DISABLE KEYS */;
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
INSERT INTO `users_usr` VALUES (1,1,'Admin','Admin','$2y$10$xEJ7EpsXxaHsdC1HtbZkV.X1S08F5OyJRt7RE.jBZhGb4s0kdxLPe',1,1,'TeDI4OFUsadDTyjzpIeBvmCp9ya0zrznxGvmszF6vPhWT7vPR1xNcK9DqnV4','2016-08-09 07:30:19','2018-10-06 09:39:04');
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wr_attention` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_wr_region_rgn1_idx` (`rgn_id`),
  CONSTRAINT `fk_warehouse_wr_region_rgn1` FOREIGN KEY (`rgn_id`) REFERENCES `region_rgn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_wr`
--

LOCK TABLES `warehouse_wr` WRITE;
/*!40000 ALTER TABLE `warehouse_wr` DISABLE KEYS */;
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
  `wb_id` int(10) unsigned NOT NULL,
  `pl_id` int(10) unsigned NOT NULL,
  `wbi_document_unit` int(10) unsigned NOT NULL,
  `wbi_document_quantity` int(10) unsigned NOT NULL,
  `wbi_representative_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wbi_representative_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weighbridge_info_wbi`
--

LOCK TABLES `weighbridge_info_wbi` WRITE;
/*!40000 ALTER TABLE `weighbridge_info_wbi` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weighbridge_wb`
--

LOCK TABLES `weighbridge_wb` WRITE;
/*!40000 ALTER TABLE `weighbridge_wb` DISABLE KEYS */;
/*!40000 ALTER TABLE `weighbridge_wb` ENABLE KEYS */;
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
/*!50003 DROP PROCEDURE IF EXISTS `a_r_d` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `a_r_d`(IN date1  varchar(255),IN date2 varchar(255))
BEGIN
DROP  TABLE if exists temp_auctionrep;
CREATE  TABLE temp_auctionrep
SELECT 
    cs.Year as SaleYear,
    a.SaleNumber,
    a.SaleDate,
    a.PromptDate,
    s.LotNo,
    o.OutturnNo,
    m.MaterialName as Grade,
    s.Bags,
    s.Pkts,
    s.WeightSold Weight,
    w.WarrantNo,
    b.AgentName as Buyer,
    s.SaleAmount AS Rate,
    s.TotalAmount AS Procceds,
    ss.StatusName as SaleStatus
FROM
    saledetails s
    JOIN auctionsale   a on a.AuctionSaleId=s.AuctionSaleId
    JOIN coffeeseason  cs on cs.SeasonID = a.SeasonID
    JOIN grn_outturns  o  on o.grnOutturnID = s.OutturnGradeId
    JOIN material m on m.MaterialID = o.GradeID
    LEFT OUTER JOIN warranted_coffee w on w.grnOutturnID = o.grnOutturnID
    LEFT OUTER join salestatus ss on ss.SaleStatusId = s.SaleStatusId
    
    join agent b  on b.AgentId = s.BuyerID WHERE s.CreatedOn BETWEEN date1 AND date2;

SELECT * FROM temp_auctionrep;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `call_all_returns` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `call_all_returns`(IN SaleID INT(255))
BEGIN
call return_to_grower_grn();
call r2g(SaleID);
DELETE FROM tmp03;
INSERT INTO tmp03 SELECT  * FROM  temp13 where AuctionSaleID = SaleID UNION SELECT * FROM grn2 where AuctionSaleID = SaleID ;

SELECT * FROM tmp03;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `c_a_r` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `c_a_r`(IN SaleID INT(255))
BEGIN

call return_to_grower_grn();
call r2g(SaleID);
DELETE FROM tmp03;

INSERT INTO tmp03 SELECT * FROM grn2 g where AuctionSaleID = SaleID  UNION SELECT  * FROM  temp13 
#where AuctionSaleID = SaleID 
;
#GROUP BY g.ID ;
#INSERT INTO tmp03 SELECT  * FROM  temp13 where AuctionSaleID = SaleID UNION SELECT * FROM grn2 where AuctionSaleID = SaleID ;

SELECT * FROM tmp03 GROUP BY ID, OutturnNo, Grade;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getConfirmedSales` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getConfirmedSales`(IN SaleID INT(255))
BEGIN
  DROP table IF exists cf_temp001;
CREATE TABLE cf_temp001 SELECT gr.MaterialID,
    grn.MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight) Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),
            1) AS CleanBulkPercer,
    gro.GrowerMark,
    fact.GrowerMark as Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
     LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    OutturnBulkID IS NULL
        AND wc.WarrantID IS NULL
        AND t.AuctionSaleID = SaleID 
UNION ALL SELECT 
    gr.MaterialID,
    mill.AgentId MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight) Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),
            1) AS CleanBulkPercer,
    gro.GrowerMark,
      fact.GrowerMark as Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
      LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    t.AuctionSaleID = SaleID
GROUP BY wc.WarrantID 

UNION SELECT 
    gr.MaterialID,
    mill.AgentId MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
     IFNULL(wc.WarrantedWeight, g.Weight) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) * g.Weight Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
     IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) AS CleanBulkPercer,
    gro.GrowerMark,
      fact.GrowerMark as Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND((IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) * g1.Weight/50)* s.SaleAmount,2) AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g.OutturnBulkID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
      LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
      warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    t.AuctionSaleID = SaleID;

    DELETE FROM  Process01;
INSERT INTO Process01 SELECT
    NULL as ProcessID,
    GRNOutturn,
    GRNOutturn OutturnNo,
    CleanOT BulkOutturn,
    Grade,
    Season,
    bags,
    Pkts,
    Weight,
    CleanBulkPercer,
    GrowerMark,
    Class,
    Auction,
    AuctionSaleId,
    Rate,
    LotNo,
    Buyer,
    TotalAmount,
    Weight GradeWeight,
    Weight MSGradeWeight,
    Status,
    p,
    DeliveryDate,
    ROUND((Weight / 50) * Rate, 5) AS Procceds

    
    FROM
    cf_temp001;
SELECT 
    *
FROM
    Process01;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `g_c_s` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `g_c_s`(IN SaleID INT(255))
BEGIN
  DROP table IF exists cf_temp001;
CREATE TABLE cf_temp001 SELECT gr.MaterialID,
    grn.MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight) Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),
            1) AS CleanBulkPercer,
    gro.GrowerMark,
    fact.GrowerMark as Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
     LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    OutturnBulkID IS NULL
        AND wc.WarrantID IS NULL
        AND t.AuctionSaleID = SaleID 
UNION ALL SELECT 
    gr.MaterialID,
    mill.AgentId MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight) Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),
            1) AS CleanBulkPercer,
    gro.GrowerMark,
      fact.GrowerMark as Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
      LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    t.AuctionSaleID = SaleID
GROUP BY wc.WarrantID 

UNION SELECT 
    gr.MaterialID,
    mill.AgentId MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
     IFNULL(wc.WarrantedWeight, g.Weight) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) * g.Weight Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
     IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) AS CleanBulkPercer,
    gro.GrowerMark,
      fact.GrowerMark as Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND((IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) * g1.Weight/50)* s.SaleAmount,2) AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g.OutturnBulkID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
      LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
      warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    t.AuctionSaleID = SaleID;

    DELETE FROM  Process01;
INSERT INTO Process01 SELECT
    NULL as ProcessID,
    GRNOutturn,
    GRNOutturn OutturnNo,
    CleanOT BulkOutturn,
    Grade,
    Season,
    bags,
    Pkts,
    Weight,
    CleanBulkPercer,
    GrowerMark,
    Class,
    Auction,
    AuctionSaleId,
    Rate,
    LotNo,
    Buyer,
    TotalAmount,
    Weight GradeWeight,
    Weight MSGradeWeight,
    Status,
    p,
    DeliveryDate,
    ROUND((Weight / 50) * Rate, 5) AS Procceds

    
    FROM
    cf_temp001;
SELECT 
    *
FROM
    Process01;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `r2g` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `r2g`(IN SaleID INT(255))
BEGIN
DROP TEMPORARY table IF exists r1;
    CREATE TEMPORARY TABLE r1
	(r1id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    
	INDEX cmpd_key (MaterialID, WarrantID, GRNOutturn, Grade, OutturnMark))
    
    
	SELECT 
    #Added
	s.id,
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
  wc.bags,
    wc.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate,
    #Added
    g.OutturnMark
    
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null AND  t.AuctionSaleID = SaleID
    
    
    UNION  ALL 
    	SELECT 
	#Added
	s.id,        
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
      wc.bags,
    wc.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate,
    #Added
    g.OutturnMark
    
      
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
  WHERE   t.AuctionSaleID = SaleID
   GROUP BY wc.WarrantID

UNION
 
 SELECT 
	#Added
	s.id,
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
     wc.bags,
    wc.Pkts,
	#addedded the percentage to calculate the split lots
    IFNULL(g.Weight, 1)  *  IFNULL(wc.Percentage, 1) / IFNULL(g1.GrossWeight, g1.Weight) * g1.Weight Weight,
   #IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, g1.Weight) * g1.Weight Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, g1.Weight),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, g1.Weight) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate,
              #Added
              IFNULL(g.OutturnMark,g1.OutturnMark)
              
                  

         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID
    
WHERE      t.AuctionSaleID = SaleID;
                      
 DROP TEMPORARY table IF exists r2;
 CREATE TEMPORARY TABLE r2
 	(r2id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    
	INDEX cmpd_key (PBulkOutturn, MSGrade, CoffeeTypeID, OutturnMark))
    
     SELECT     o.GrowerID,g.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
       ROUND(o.BulkPercentage/o.BulkPercentage) as Percent, IFNULL(ROUND(og.PercentageOfGradeBulk /og.PercentageOfGradeBulk),1) as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason,o.bags,o.Pkts, o.OutturnMark
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            #added season
            WHERE (o.CoffeeTypeID <> 9) 
            #AND cn.Year = ANY (SELECT Year FROM agency.coffeeseason WHERE SeasonID = ANY(SELECT SeasonID FROM auctionsale WHERE AuctionSaleId = SaleID)) 
			union all
            
             SELECT   o.GrowerID,g.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,ifnull(o1.OutturnNo,o.OutturnNo) as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,ROUND(o.BulkPercentage/o.BulkPercentage) as Percent, ifnull(og.PercentageOfGradeBulk,1) as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason,o.bags,o.Pkts, IFNULL(o1.OutturnMark,o.OutturnMark)
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
			LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            
            WHERE o.CoffeeTypeID = 9
            #AND cn.Year = ANY (SELECT Year FROM agency.coffeeseason WHERE SeasonID = ANY(SELECT SeasonID FROM auctionsale WHERE AuctionSaleId = SaleID));
			;
	DROP table IF exists temp13;
CREATE TABLE temp13 SELECT 
    #NULL AS ID,
	#Added
	g.id AS ID,
    g.GRNOutturn,
    IFNULL(o.OutturnNo, GRNOutturn) AS OutturnNo,
    o.PBulkOutturn AS BulkOutturn,
    g.Grade,
    o.OSeason Season,
    ROUND(g.weight * o.p) / 60 Bags,
    ROUND(g.weight * o.p) % 69 Pkts,
    g.Weight,
    g.CleanBulkPercer,
    #modified
    o.Grower AS GrowerMark,
    #g.GrowerMark AS GrowerMark,
    o.Factory AS Factory,
    g.Class,
    g.Auction,
    g.AuctionSaleId,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    g.weight * o.p AS GradeWeight,
    o.GradeWeight MSGradeWeight , 
    IFNULL(g.Status, 'Held') AS Status,
    g.p,
    g.DeliveryDate,
    o.CoffeeTypeID,
    ROUND(g.weight * IFNULL(o.p, 1) / 50 * g.Rate,
            2) AS Procceds,
          0 cbk,
   0 crf,
   0 krb,
   0 council,

        ROUND(g.weight * IFNULL(o.p, 1) / 50 * g.Rate * 0.001,
            2) auction_comm,
    ROUND(g.weight * IFNULL(o.p, 1) / 50 * g.Rate * 0.0175,
            2) ma_comm,
    ROUND(
	       (g.weight * IFNULL(o.p, 1) / 50 * g.Rate) - ( (g.weight * IFNULL(o.p, 1) / 50 * g.Rate * 0.001) + (g.weight * IFNULL(o.p, 1) / 50 * g.Rate * 0.0175))
	    ,2) NetProcceds FROM
    r1 g,
    r2 o
WHERE
    g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade
         AND o.CoffeeTypeID <> 2
         AND o.OutturnMark = g.OutturnMark;
         #AND o.OSeason = g.Season;

        END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `return_to_grower_grn` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `return_to_grower_grn`()
BEGIN
  DROP table IF exists grn1;
CREATE TABLE grn1 
	SELECT 
	#Added
	s.id,
    gr.MaterialID,
    grn.MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    wc.bags,
    wc.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight) Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),
            1) AS CleanBulkPercer,
    gro.GrowerMark,
    fact.GrowerMark AS Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    OutturnBulkID IS NULL
        AND wc.WarrantID IS NULL
        AND (grn.MillerID = 12 OR grn.MillerID = 13) 
UNION ALL SELECT 
	#Added
	s.id,
    gr.MaterialID,
    mill.AgentId MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    wc.bags,
    wc.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight) Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),
            1) AS CleanBulkPercer,
    gro.GrowerMark,
    fact.GrowerMark AS Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    (g.cleanTypeID = 5 OR g.cleanTypeID = 8) 
GROUP BY wc.WarrantID 
UNION ALL SELECT 
	#Added
	s.id,
    gr.MaterialID,
    mill.AgentId MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    wc.bags,
    wc.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight) *  IFNULL(wc.Percentage, 1) Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),
            1) AS CleanBulkPercer,
    gro.GrowerMark,
    fact.GrowerMark AS Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    (grn.MillerID = 12 OR grn.MillerID = 13)
GROUP BY wc.WarrantID 
UNION SELECT 
	#Added
	s.id,
    gr.MaterialID,
    mill.AgentId MillerID,
    mill.AgentName AS Miller,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight, g.Weight)  *  IFNULL(wc.Percentage, 1) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) * g.Weight Weight,
    grn.GrossWeight AS Gross,
    grn.CoffeeTypeId,
    grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, wc.WarrantedWeight),2) AS CleanBulkPercer,
    gro.GrowerMark,
    fact.GrowerMark AS Factory,
    ma.Class,
    t.SaleNumber AS Auction,
    t.AuctionSaleId,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.GrossWeight, wc.WarrantedWeight) * s.TotalAmount,
            2) AS Value,
    wc.Percentage AS p,
    CONCAT(s.LotNo, t.SaleNumber) SaleLot,
    grn.DeliveryDate
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.OutturnBulkID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    agent mill ON mill.AgentId = grn.MillerID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    grower fact ON fact.GrowerId = gro.FactoryID
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
        LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID
WHERE
    (grn.MillerID = 12 OR grn.MillerID = 13);
    DROP table IF exists grn2;
CREATE TABLE grn2 
	SELECT
	#Added
	#NULL AS ID,
	id AS ID,
    GRNOutturn,
    GRNOutturn OutturnNo,
    CleanOT BulkOutturn,
    Grade,
    Season,
    bags,
    Pkts,
    Weight,
    CleanBulkPercer,
    GrowerMark,
    Factory,
    Class,
    Auction,
    AuctionSaleId,
    Rate,
    LotNo,
    Buyer,
    TotalAmount,
    Weight GradeWeight,
    Weight MsGradeWeight,
    Status,
    p,
    DeliveryDate,
    CoffeeTypeID,
    ROUND((Weight / 50) * Rate, 2) AS Procceds,
    0 cbk,
    0 crf,
    0 krb,
    0 AS council,
    ROUND((Weight / 50 * Rate) * 0.001, 2) auction_comm,
    ROUND((Weight / 50 * Rate) * 0.0175, 2) ma_comm,
    ROUND((Weight / 50 * Rate) - ((Weight / 50 * Rate * 0.01) + (Weight / 50 * Rate * 0.0175)),2) AS NetProcceds FROM
    grn1;
  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_auctionreport` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_auctionreport`(IN SeasonID  INT(255),IN SaleID INT(255))
BEGIN
DROP  TABLE if exists temp_auctionrep;
CREATE  TABLE temp_auctionrep
SELECT 
    cs.Year as SaleYear,
    a.SaleNumber,
    a.SaleDate,
    a.PromptDate,
    s.LotNo,
    o.OutturnNo,
    m.MaterialName as Grade,
    s.Bags,
    s.Pkts,
    s.WeightSold Weight,
    w.WarrantNo,
    b.AgentName as Buyer,
    s.SaleAmount AS Rate,
    s.TotalAmount AS Procceds,
    ss.StatusName as SaleStatus
FROM
    saledetails s
    JOIN auctionsale   a on a.AuctionSaleId=s.AuctionSaleId
    JOIN coffeeseason  cs on cs.SeasonID = a.SeasonID
    JOIN grn_outturns  o  on o.grnOutturnID = s.OutturnGradeId
    JOIN material m on m.MaterialID = o.GradeID
    LEFT OUTER JOIN warranted_coffee w on w.grnOutturnID = o.grnOutturnID
    LEFT OUTER join salestatus ss on ss.SaleStatusId = s.SaleStatusId
    join agent b  on b.AgentId = s.BuyerID WHERE a.SeasonID = SeasonID AND a.AuctionSaleId = SaleID; 

SELECT * FROM temp_auctionrep;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_auctionreport_dated` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_auctionreport_dated`(IN date1  varchar(255),IN date2 varchar(255))
BEGIN
DROP  TABLE if exists temp_auctionrep;
CREATE  TABLE temp_auctionrep
SELECT 
    cs.Year as SaleYear,
    a.SaleNumber,
    a.SaleDate,
    a.PromptDate,
    s.LotNo,
    o.OutturnNo,
    m.MaterialName as Grade,
    s.Bags,
    s.Pkts,
    s.WeightSold Weight,
    w.WarrantNo,
    b.AgentName as Buyer,
    s.SaleAmount AS Rate,
    s.TotalAmount AS Procceds,
    ss.StatusName as SaleStatus
FROM
    saledetails s
    JOIN auctionsale   a on a.AuctionSaleId=s.AuctionSaleId
    JOIN coffeeseason  cs on cs.SeasonID = a.SeasonID
    JOIN grn_outturns  o  on o.grnOutturnID = s.OutturnGradeId
    JOIN material m on m.MaterialID = o.GradeID
    LEFT OUTER JOIN warranted_coffee w on w.grnOutturnID = o.grnOutturnID
    LEFT OUTER join salestatus ss on ss.SaleStatusId = s.SaleStatusId
    
    join agent b  on b.AgentId = s.BuyerID WHERE s.CreatedOn BETWEEN date1 AND date2;

SELECT * FROM temp_auctionrep;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_return_to_grower` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_return_to_grower`()
begin
		
    DROP TEMPORARY table IF exists a_;
    CREATE TEMPORARY TABLE a_
	    	 
 SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    t.AuctionSaleId
    
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        INNER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
   warranted_coffee wc ON wc.WarrantID = s.WarrantID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null AND  (s.SaleStatusId =4 OR s.SaleStatusId =7)
    
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    t.AuctionSaleId
 
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        INNER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
     WHERE  (s.SaleStatusId =4 OR s.SaleStatusId =7)
   
   GROUP BY wc.WarrantID

UNION ALL 
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
            t.AuctionSaleId
        
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
      INNER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
    
    WHERE (s.SaleStatusId =4 OR s.SaleStatusId =7);

    
                    
 DROP TEMPORARY table IF exists b_;
 CREATE TEMPORARY TABLE b_
 
   	    	   SELECT 
    cn.Year AS Season,
    o1.OutturnNo AS PBulkOutturn,
    t.MaterialName AS OutturnType,
    o.OutturnNo StraightOutturn,
    m.MaterialName AS MSgrade,
    ROUND(o.GrossPWeight, 0) AS Gross,
    o.Nweight AS net,
    o.BulkPercentage as Percent,
	ROUND(og.Weight) AS GradeWeight,
	IFNULL(f.GrowerName, g.GrowerName) AS Society,
    g.GrowerName Factory,
    o.GrowerID,
    f.GrowerID as SocietyID,
    o.CoffeeTypeID,
    o.OutturnMark,
    o.SeasonID
FROM
    outturns o
        LEFT OUTER JOIN
    outturns o1 ON o.BulkOutturnNo = o1.OutturnID
        LEFT OUTER JOIN
    outturngrades og ON og.OutturnID = o.OutturnID
        LEFT JOIN
    material m ON m.MaterialID = og.MaterialID
        LEFT JOIN
    grower g ON g.GrowerId = o.GrowerID
        LEFT JOIN
    grower f ON f.GrowerId = g.FactoryID
        LEFT JOIN
    cleantype c ON c.cleanTypeID = o.CoffeeTypeID
        LEFT JOIN
    material t ON t.MaterialID = o.MaterialID
        LEFT JOIN
    coffeeseason cn ON cn.SeasonID = o.SeasonID
     
   
WHERE
    o.CoffeeTypeID = 9 
UNION ALL SELECT 
    cn.Year AS Season,
    o1.OutturnNo AS PBulkOutturn,
    t.MaterialName AS OutturnType,
    o.OutturnNo StraightOutturn,
    m.MaterialName AS MSgrade,
    ROUND(o.GrossPWeight, 0) AS Gross,
    o.Nweight AS net,
       ROUND(o.BulkPercentage, 1) AS Percent,
    ROUND(og.Weight) AS GradeWeight,
   	IFNULL(f.GrowerName, g.GrowerName) AS Society,
	g.GrowerName Factory,
    o.GrowerID,
    f.GrowerID as SocietyID,
    o.CoffeeTypeID,
    o.OutturnMark,
    o.SeasonID
FROM
    outturns o
        LEFT OUTER JOIN
    outturns o1 ON o.BulkOutturnNo = o1.OutturnID
        LEFT OUTER JOIN
    outturngrades og ON og.OutturnID = o.OutturnID
        LEFT JOIN
    material m ON m.MaterialID = og.MaterialID
        LEFT JOIN
    grower g ON g.GrowerId = o.GrowerID
        LEFT JOIN
    grower f ON f.GrowerId = g.FactoryID
        LEFT JOIN
    cleantype c ON c.cleanTypeID = o.CoffeeTypeID
        LEFT JOIN
    material t ON t.MaterialID = o.MaterialID
        LEFT JOIN
    coffeeseason cn ON cn.SeasonID = o.SeasonID
      
    
WHERE
    o.CoffeeTypeID <> 9;  

			
	DROP   table IF exists return2grower_;
CREATE TABLE return2grower_ SELECT o.CoffeeTypeID,
    o.OutturnMark,
    g.AuctionSaleId,
    o.SeasonID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.StraightOutturn, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.Season,
    o.Society AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    IFNULL(g.Weight, o.GradeWeight) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,
            2) AS Procceds,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,
            2) CBK_Ad_Valorem,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,
            2) CFR,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.0175,
            2) MA_Comm,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.001,
            2) Auction_Comm,
    ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.008,2) KRB_Cess,
    ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.008,2)  Council_Cess,
    ROUND(
ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2)
-
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
-			
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2) 
-
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.0175,2)
 -
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.001,2)
-
 (ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.008,2))
-
(ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.002,2)),2)
    
    AS Net_Procceds FROM
    a_ g
        LEFT OUTER JOIN
    b_ o ON g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade;
SELECT 
    *
FROM
    return2grower_ where CoffeeTypeID <> 2 order by Grade asc

;
         end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_stock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_stock`(IN Season VARCHAR(255))
begin
	
       DROP TEMPORARY table IF exists grn_;
    CREATE TEMPORARY TABLE grn_
	SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null
    
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
   GROUP BY wc.WarrantID

UNION
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID ;

                      
 DROP TEMPORARY table IF exists outturns_;
 CREATE TEMPORARY TABLE outturns_
 
   	   SELECT   o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,o1.OutturnNo as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,o.BulkPercentage as Percent, og.PercentageOfGradeBulk as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
               LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID = 9
            
            union ALL
            
            
     SELECT     o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
        round(o.BulkPercentage,1) as Percent, og.PercentageOfGradeBulk as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID <> 9 ;
			
	DROP   table IF exists stock_;
CREATE TABLE stock_ SELECT
   g.MaterialID,
    g.p,
    o.CoffeeTypeID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.OutturnNo, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.OSeason,
    o.Grower AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    o.GradeWeight AS MSGradeWeightOLD,
    g.DeliveryDate,
    g.DeliveryDate DeliveryDate1,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10)))) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
	ROUND(ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50,2) * g.Rate,2) AS Procceds FROM
    grn_ g
        LEFT OUTER JOIN
    outturns_ o ON g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade  AND o.OSeason = Season;
         Select * from stock_   where CoffeeTypeID <> 2    order by Grade asc;
		
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_stock_period` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_stock_period`(IN date1 datetime ,IN date2 datetime )
begin
	
       DROP TEMPORARY table IF exists grn_;
    CREATE TEMPORARY TABLE grn_
	SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null
    
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
   GROUP BY wc.WarrantID

UNION
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID ;

                      
 DROP TEMPORARY table IF exists outturns_;
 CREATE TEMPORARY TABLE outturns_
 
   	   SELECT   o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,o1.OutturnNo as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,o.BulkPercentage as Percent, og.PercentageOfGradeBulk as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
               LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID = 9
            
            union ALL
            
            
     SELECT     o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
        round(o.BulkPercentage,1) as Percent, og.PercentageOfGradeBulk as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID <> 9 ;
			
	DROP   table IF exists stock_;
CREATE TABLE stock_ SELECT
   g.MaterialID,
    g.p,
    o.CoffeeTypeID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.OutturnNo, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.OSeason,
    o.Grower AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    o.GradeWeight AS MSGradeWeightOLD,
    g.DeliveryDate,
    g.DeliveryDate DeliveryDate1,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10)))) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
	ROUND(ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50,2) * g.Rate,2) AS Procceds FROM
    grn_ g
        LEFT OUTER JOIN
    outturns_ o ON g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade   AND g.DeliveryDate BETWEEN date1 AND date2;
         Select * from stock_   where CoffeeTypeID <> 2    order by Grade asc;
		
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_stock_revised` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_stock_revised`(IN Season VARCHAR(255),IN GrowerID INT)
begin
	
       DROP TEMPORARY table IF exists grn_;
    CREATE TEMPORARY TABLE grn_
	SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null
    
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
   GROUP BY wc.WarrantID

UNION
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID ;

                      
 DROP TEMPORARY table IF exists outturns_;
 CREATE TEMPORARY TABLE outturns_
 
   	   SELECT   o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,o1.OutturnNo as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,o.BulkPercentage as Percent, og.PercentageOfGradeBulk as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
               LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID = 9
            
            union ALL
            
            
     SELECT     o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
        round(o.BulkPercentage,1) as Percent, og.PercentageOfGradeBulk as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID <> 9 ;
			
	DROP   table IF exists stock_;
CREATE TABLE stock_ SELECT
   g.MaterialID,
    g.p,
    o.CoffeeTypeID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.OutturnNo, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.OSeason,
    o.Grower AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    o.GradeWeight AS MSGradeWeightOLD,
    g.DeliveryDate,
    g.DeliveryDate DeliveryDate1,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10)))) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
	ROUND(ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50,2) * g.Rate,2) AS Procceds FROM
    grn_ g
        LEFT OUTER JOIN
    outturns_ o ON g.GRNOutturn = o.PBulkOutturn 
        AND g.Grade = o.MSGrade  AND o.OSeason = Season AND  o.GrowerId = GrowerID;
         Select * from stock_   where CoffeeTypeID <> 2    order by Grade asc;
		
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `stock_balances` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `stock_balances`()
begin
	
	DROP TEMPORARY table IF exists grn_;
    CREATE TEMPORARY TABLE grn_
	SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null
    
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
   GROUP BY wc.WarrantID

UNION
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID ;

                      
 DROP TEMPORARY table IF exists outturns_;
 CREATE TEMPORARY TABLE outturns_
 
   	   SELECT   o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,o1.OutturnNo as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,o.BulkPercentage as Percent, og.PercentageOfGradeBulk as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
               LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID = 9
            
            union ALL
            
            
     SELECT     o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
        round(o.BulkPercentage,1) as Percent, og.PercentageOfGradeBulk as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID <> 9 ;
			
	DROP   table IF exists stock_;
CREATE TABLE stock_ SELECT g.MaterialID,
    g.p,
    o.CoffeeTypeID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.OutturnNo, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.OSeason,
    o.Grower AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    o.GradeWeight AS MSGradeWeightOLD,
    g.DeliveryDate,
    g.DeliveryDate DeliveryDate1,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10)))) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
    ROUND(ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50,2) * g.Rate,2) AS Procceds FROM
    grn_ g
        LEFT OUTER JOIN
    outturns_ o ON g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade
        AND o.OSeason = Season
        AND g.Status IS NULL limit 300;
SELECT 
    *
FROM
    stock_
WHERE
    CoffeeTypeID <> 2
ORDER BY Grade ASC ;
		
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sys_dated` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sys_dated`(IN date1 datetime ,IN date2 datetime,IN GrowerID INT )
begin
	
       DROP TEMPORARY table IF exists grn_;
       #addedd outturn mark to separate with season
    CREATE TEMPORARY TABLE grn_
	SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate,
    g.OutturnMark
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null 
    #added
	#and sn.Year = Season 
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate,
    g.OutturnMark
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
         LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId   
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID  
    #addedd this
    
    
		#LEFT OUTER JOIN
    #warranted_coffee wc ON wc.WarrantID = s.WarrantID 

    #saledetails s ON wc.WarrantID = s.WarrantID
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass

    
	#added
    WHERE 
    #sn.Year = Season 
    #AND 
    wc.WarrantID = ifnull(s.WarrantID,wc.WarrantID)  
    #added
    #and wc.WarrantID = s.WarrantID
   #change group by for mbuni purpose
   GROUP BY wc.WarrantID
   #GROUP BY s.LotNo, Grade
	
UNION
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate,
	g.OutturnMark
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
		#added this
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID 
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
     #  LEFT OUTER JOIN
    #warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID 
    #added
    #WHERE sn.Year = Season 
    ;
    
      
  
 DROP TEMPORARY table IF exists outturns_;
 CREATE TEMPORARY TABLE outturns_
 
   	   SELECT   o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,o1.OutturnNo as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,o.BulkPercentage as Percent, og.PercentageOfGradeBulk as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason, o1.OutturnMark
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
               LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID = 9 AND (o.GrowerID = GrowerID or f.GrowerID  = GrowerID) 
            
            union ALL
            
            
     SELECT     o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
        round(o.BulkPercentage,1) as Percent, og.PercentageOfGradeBulk as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason, o.OutturnMark
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID <> 9 AND (o.GrowerID = GrowerID or f.GrowerID  = GrowerID)  ;
			
	DROP   table IF exists stock_;
CREATE TABLE stock_ SELECT
   g.MaterialID,
    g.p,
    o.CoffeeTypeID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.OutturnNo, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.OSeason,
    o.Grower AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    o.GradeWeight AS MSGradeWeightOLD,
    g.DeliveryDate,
    g.DeliveryDate DeliveryDate1,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10)))) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
	ROUND(ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50,2) * g.Rate,2) AS Procceds FROM
    grn_ g
        LEFT OUTER JOIN
    outturns_ o ON o.OutturnMark = g.OutturnMark AND g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade   AND g.DeliveryDate BETWEEN date1 AND date2;
         Select * from stock_   where CoffeeTypeID <> 2    order by Grade asc;
		
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `_a_r` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `_a_r`(IN SeasonID  INT(255),IN SaleID INT(255))
BEGIN
DROP  TABLE if exists temp_auctionrep;
CREATE  TABLE temp_auctionrep
SELECT 
    cs.Year as SaleYear,
    a.SaleNumber,
    a.SaleDate,
    a.PromptDate,
    s.LotNo,
    o.OutturnNo,
    m.MaterialName as Grade,
    s.Bags,
    s.Pkts,
    s.WeightSold Weight,
    w.WarrantNo,
    b.AgentName as Buyer,
    s.SaleAmount AS Rate,
    s.TotalAmount AS Procceds,
    ss.StatusName as SaleStatus
FROM
    saledetails s
    JOIN auctionsale   a on a.AuctionSaleId=s.AuctionSaleId
    JOIN coffeeseason  cs on cs.SeasonID = a.SeasonID
    JOIN grn_outturns  o  on o.grnOutturnID = s.OutturnGradeId
    JOIN material m on m.MaterialID = o.GradeID
    LEFT OUTER JOIN warranted_coffee w on w.grnOutturnID = o.grnOutturnID
    LEFT OUTER join salestatus ss on ss.SaleStatusId = s.SaleStatusId
    join agent b  on b.AgentId = s.BuyerID WHERE a.SeasonID = SeasonID AND a.AuctionSaleId = SaleID; 

SELECT * FROM temp_auctionrep;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `_sys_a` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `_sys_a`(IN Season VARCHAR(255),IN GrowerID INT)
begin
	
       DROP TEMPORARY table IF exists grn_;
       #addedd outturn mark to separate with season
    CREATE TEMPORARY TABLE grn_
	SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate,
    g.OutturnMark
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null 
    #added
	#and sn.Year = Season 
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate,
    g.OutturnMark
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
         LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId   
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID  
    #addedd this
    
    
		#LEFT OUTER JOIN
    #warranted_coffee wc ON wc.WarrantID = s.WarrantID 

    #saledetails s ON wc.WarrantID = s.WarrantID
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass

    
	#added
    WHERE 
    #sn.Year = Season 
    #AND 
    wc.WarrantID = ifnull(s.WarrantID,wc.WarrantID)  
    #added
    #and wc.WarrantID = s.WarrantID
   #change group by for mbuni purpose
   GROUP BY wc.WarrantID
   #GROUP BY s.LotNo, Grade
	
UNION
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate,
	g.OutturnMark
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
		#added this
        LEFT OUTER JOIN
    warranted_coffee wc ON wc.WarrantID = s.WarrantID 
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
     #  LEFT OUTER JOIN
    #warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID 
    #added
    #WHERE sn.Year = Season 
    ;
    
      
  

                      
 DROP TEMPORARY table IF exists outturns_;
 CREATE TEMPORARY TABLE outturns_
		#addedd outturn mark to separate with season
   	   SELECT   o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,o1.OutturnNo as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,o.BulkPercentage as Percent, og.PercentageOfGradeBulk as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason, o1.OutturnMark
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
               LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID =  9 AND (o.GrowerID = GrowerID or f.GrowerID  = GrowerID) 
            #added
            AND cn.Year = Season 
            
            union ALL
            
            #addedd outturn mark to separate with season
     SELECT     o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
        round(o.BulkPercentage,1) as Percent, og.PercentageOfGradeBulk as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason, o.OutturnMark
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID <> 9 AND (o.GrowerID = GrowerID or f.GrowerID  = GrowerID)  
            #added
            AND cn.Year = Season;
			
	DROP   table IF exists stock_;
CREATE TABLE stock_ SELECT
   g.MaterialID,
    g.p,
    o.CoffeeTypeID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.OutturnNo, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.OSeason,
    o.Grower AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    o.GradeWeight AS MSGradeWeightOLD,
    g.DeliveryDate,
    g.DeliveryDate DeliveryDate1,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10)))) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
	ROUND(ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50,2) * g.Rate,2) AS Procceds FROM
    grn_ g
        LEFT OUTER JOIN
        #addedd outturn mark to separate with season
    outturns_ o ON o.OutturnMark = g.OutturnMark AND g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade  AND o.OSeason = Season;
         Select * from stock_   where CoffeeTypeID <> 2   order by Grade asc;
		
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `_sys_c` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `_sys_c`()
begin
		
    DROP TEMPORARY table IF exists a_;
    CREATE TEMPORARY TABLE a_
	    	 
 SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    t.AuctionSaleId
    
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        INNER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
   warranted_coffee wc ON wc.WarrantID = s.WarrantID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null AND  (s.SaleStatusId =4 OR s.SaleStatusId =7)
    
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    t.AuctionSaleId
 
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        INNER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
     WHERE  (s.SaleStatusId =4 OR s.SaleStatusId =7)
   
   GROUP BY wc.WarrantID

UNION ALL 
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
            t.AuctionSaleId
        
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
      INNER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
     warranted_coffee wc ON wc.WarrantID = s.WarrantID
    
    WHERE (s.SaleStatusId =4 OR s.SaleStatusId =7);

    
                    
 DROP TEMPORARY table IF exists b_;
 CREATE TEMPORARY TABLE b_
 
   	    	   SELECT 
    cn.Year AS Season,
    o1.OutturnNo AS PBulkOutturn,
    t.MaterialName AS OutturnType,
    o.OutturnNo StraightOutturn,
    m.MaterialName AS MSgrade,
    ROUND(o.GrossPWeight, 0) AS Gross,
    o.Nweight AS net,
    o.BulkPercentage as Percent,
	ROUND(og.Weight) AS GradeWeight,
	IFNULL(f.GrowerName, g.GrowerName) AS Society,
    g.GrowerName Factory,
    o.GrowerID,
    f.GrowerID as SocietyID,
    o.CoffeeTypeID,
    o.OutturnMark,
    o.SeasonID
FROM
    outturns o
        LEFT OUTER JOIN
    outturns o1 ON o.BulkOutturnNo = o1.OutturnID
        LEFT OUTER JOIN
    outturngrades og ON og.OutturnID = o.OutturnID
        LEFT JOIN
    material m ON m.MaterialID = og.MaterialID
        LEFT JOIN
    grower g ON g.GrowerId = o.GrowerID
        LEFT JOIN
    grower f ON f.GrowerId = g.FactoryID
        LEFT JOIN
    cleantype c ON c.cleanTypeID = o.CoffeeTypeID
        LEFT JOIN
    material t ON t.MaterialID = o.MaterialID
        LEFT JOIN
    coffeeseason cn ON cn.SeasonID = o.SeasonID
     
   
WHERE
    o.CoffeeTypeID = 9 
UNION ALL SELECT 
    cn.Year AS Season,
    o1.OutturnNo AS PBulkOutturn,
    t.MaterialName AS OutturnType,
    o.OutturnNo StraightOutturn,
    m.MaterialName AS MSgrade,
    ROUND(o.GrossPWeight, 0) AS Gross,
    o.Nweight AS net,
       ROUND(o.BulkPercentage, 1) AS Percent,
    ROUND(og.Weight) AS GradeWeight,
   	IFNULL(f.GrowerName, g.GrowerName) AS Society,
	g.GrowerName Factory,
    o.GrowerID,
    f.GrowerID as SocietyID,
    o.CoffeeTypeID,
    o.OutturnMark,
    o.SeasonID
FROM
    outturns o
        LEFT OUTER JOIN
    outturns o1 ON o.BulkOutturnNo = o1.OutturnID
        LEFT OUTER JOIN
    outturngrades og ON og.OutturnID = o.OutturnID
        LEFT JOIN
    material m ON m.MaterialID = og.MaterialID
        LEFT JOIN
    grower g ON g.GrowerId = o.GrowerID
        LEFT JOIN
    grower f ON f.GrowerId = g.FactoryID
        LEFT JOIN
    cleantype c ON c.cleanTypeID = o.CoffeeTypeID
        LEFT JOIN
    material t ON t.MaterialID = o.MaterialID
        LEFT JOIN
    coffeeseason cn ON cn.SeasonID = o.SeasonID
      
    
WHERE
    o.CoffeeTypeID <> 9;  

			
	DROP   table IF exists return2grower_;
CREATE TABLE return2grower_ SELECT o.CoffeeTypeID,
    o.OutturnMark,
    g.AuctionSaleId,
    o.SeasonID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.StraightOutturn, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.Season,
    o.Society AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    IFNULL(g.Weight, o.GradeWeight) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,
            2) AS Procceds,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,
            2) CBK_Ad_Valorem,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,
            2) CFR,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.0175,
            2) MA_Comm,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.001,
            2) Auction_Comm,
    ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.008,2) KRB_Cess,
    ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.008,2)  Council_Cess,
    ROUND(
ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2)
-
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
-			
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2) 
-
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.0175,2)
 -
 ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.001,2)
-
 (ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.008,2))
-
(ROUND((ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate,2) 
    - (ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.01,2)
    - ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50 * g.Rate * 0.02,2))) * 0.002,2)),2)
    
    AS Net_Procceds FROM
    a_ g
        LEFT OUTER JOIN
    b_ o ON g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade;
SELECT 
    *
FROM
    return2grower_ where CoffeeTypeID <> 2 order by Grade asc

;
         end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `_s_b` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `_s_b`()
begin
	
	DROP TEMPORARY table IF exists grn_;
    CREATE TEMPORARY TABLE grn_
	SELECT 
    gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
WHERE
    OutturnBulkID IS NULL  and wc.WarrantID is null
    
    
    UNION  ALL 
    	SELECT 
	gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    IFNULL(wc.WarrantedWeight,g.Weight) Weight,
	grn.GrossWeight AS Gross,
    grn.NetWeight AS net,
    IFNULL(FLOOR((IFNULL(g.Weight, 1) / IFNULL(g.Weight, 1))),1) AS CleanBulkPercer,
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    s.TotalAmount AS Value,
    wc.Percentage as p,
    CONCAT(s.LotNo,t.SaleNumber) SaleLot,
    grn.DeliveryDate
   
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        LEFT OUTER JOIN
    saledetails s ON g.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
      LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
      LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID
   
   GROUP BY wc.WarrantID

UNION
 
 SELECT 
 gr.MaterialID,
    wc.WarrantID,
    gro.GrowerId,
    g.OutturnNo GRNOutturn,
    g1.OutturnNo AS CleanOT,
    gr.MaterialName Grade,
    sn.Year AS Season,
    g.bags,
    g.Pkts,
    FLOOR(g1.Weight / g.Weight * g.Weight) AS Weight,
    grn.GrossWeight AS Gross,
     grn.NetWeight AS net,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1),
            2) AS CleanBulkPercer,
   
    gro.GrowerMark,
    ma.Class,
    t.SaleNumber AS Auction,
    s.SaleAmount AS Rate,
    y.SaleType,
    s.LotNo,
    a.AgentName AS Buyer,
    s.TotalAmount,
    st.StatusName AS Status,
    ROUND(IFNULL(g.Weight, 1) / IFNULL(g1.Weight, 1) * s.TotalAmount,
            2) AS Value,
            wc.Percentage as p,
             CONCAT(s.LotNo,t.SaleNumber) SaleLot,
              grn.DeliveryDate
         
FROM
    grn_outturns g
        LEFT OUTER JOIN
    material gr ON gr.MaterialID = g.GradeID
        JOIN
    grn_outturns g1 ON g1.grnOutturnID = g.OutturnBulkID
        LEFT OUTER JOIN
    saledetails s ON g1.grnOutturnID = s.OutturnGradeId
        LEFT OUTER JOIN
    salestatus st ON st.SaleStatusId = s.SaleStatusId
        LEFT OUTER JOIN
    agent a ON s.BuyerID = a.AgentId
        LEFT OUTER JOIN
    auctionsale t ON s.AuctionSaleId = t.AuctionSaleId
        LEFT OUTER JOIN
    grn_main grn ON grn.grnID = g.GRNID
        LEFT OUTER JOIN
    grower gro ON gro.GrowerId = grn.GrowerId
        LEFT OUTER JOIN
    coffeeseason sn ON sn.SeasonID = g.SeasonID
        LEFT OUTER JOIN
    saletype y ON y.SaleTypeID = s.SaleType
       LEFT OUTER JOIN
    qualityclass ma ON ma.classID = g.MaClass
       LEFT OUTER JOIN
    warranted_coffee wc ON wc.grnOutturnID = g.grnOutturnID ;

                      
 DROP TEMPORARY table IF exists outturns_;
 CREATE TEMPORARY TABLE outturns_
 
   	   SELECT   o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID, t.MaterialName as OutturnType,c.Description as CoffeeType,IFNULL(f.GrowerName,g.GrowerName) as Factory ,g.GrowerName Grower, o.OutturnNo ,o1.OutturnNo as PBulkOutturn,
		  round(o.GrossPWeight,0) as Gross,o.Nweight as Net,o.BulkPercentage as Percent, og.PercentageOfGradeBulk as p,
          ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
       FROM 
 outturns o LEFT OUTER JOIN outturns o1 on   o.BulkOutturnNo = o1.OutturnID
            LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
               LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID = 9
            
            union ALL
            
            
     SELECT     o.GrowerID,f.GrowerID as SocietyID,o.CoffeeTypeID,t.MaterialName as OutturnType,c.Description as CoffeeType ,IFNULL(f.GrowerName,g.GrowerName) as Factory,g.GrowerName Grower, o.OutturnNo,o.OutturnNo as PBulkOutturn ,round(o.GrossPWeight,0) as Gross,o.Nweight as Net,
        round(o.BulkPercentage,1) as Percent, og.PercentageOfGradeBulk as p, ROUND(og.Weight) as GradeWeight, m.MaterialName AS MSgrade,o.CreatedOn as PostDate,cn.Year as OSeason
         
FROM        outturns o  LEFT OUTER JOIN outturngrades og ON  og.OutturnID = o.OutturnID
		    LEFT JOIN material m ON m.MaterialID = og.MaterialID
			LEFT JOIN grower g ON  g.GrowerId = o.GrowerID 
		    LEFT JOIN grower f ON  f.GrowerId = g.FactoryID 
			LEFT JOIN cleantype c ON  c.cleanTypeID = o.CoffeeTypeID 
            LEFT JOIN material t ON t.MaterialID = o.MaterialID
            LEFT JOIN  coffeeseason cn ON cn.SeasonID = o.SeasonID
            WHERE o.CoffeeTypeID <> 9 ;
			
	DROP   table IF exists stock_;
CREATE TABLE stock_ SELECT g.MaterialID,
    g.p,
    o.CoffeeTypeID,
    o.SocietyID,
    o.GrowerId,
    g.GRNOutturn AS GrnOT,
    g.CleanOT,
    IFNULL(o.OutturnNo, GRNOutturn) AS MSStraightOT,
    o.PBulkOutturn AS MSBulkOT,
    g.Grade,
    g.Class,
    g.Weight,
    g.bags,
    g.Pkts,
    o.OSeason,
    o.Grower AS GrowerMark,
    o.Factory,
    g.Auction,
    g.Rate,
    g.LotNo,
    g.Buyer,
    g.TotalAmount,
    IFNULL(o.OutturnType, g.Grade) AS OutturnType,
    o.Gross,
    o.GradeWeight AS MSGradeWeightOLD,
    g.DeliveryDate,
    g.DeliveryDate DeliveryDate1,
    ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),
                    (g.Weight * IFNULL(g.p, 10)))) AS MSGradeWeight,
    o.Percent,
    g.CleanBulkPercer,
    IFNULL(g.Status, 'Held') AS Status,
    ROUND(ROUND(IFNULL(o.GradeWeight * IFNULL(g.p, 1),(g.Weight * IFNULL(g.p, 10))) / 50,2) * g.Rate,2) AS Procceds FROM
    grn_ g
        LEFT OUTER JOIN
    outturns_ o ON g.GRNOutturn = o.PBulkOutturn
        AND g.Grade = o.MSGrade
        AND o.OSeason = Season
        AND g.Status IS NULL limit 300;
SELECT 
    *
FROM
    stock_
WHERE
    CoffeeTypeID <> 2
ORDER BY Grade ASC ;
		
  end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `booking`
--

/*!50001 DROP VIEW IF EXISTS `booking`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `booking` AS select `bkg`.`id` AS `id`,`bkg`.`bkg_ref_no` AS `ref_no`,right(`bkg`.`bkg_ref_no`,7) AS `previous_no`,`cgr`.`id` AS `cgr_id`,`cgr`.`cgr_grower` AS `cgr_grower`,`cgr`.`cgr_code` AS `cgr_code`,`cgr`.`cgr_mark` AS `cgr_mark`,`agt`.`id` AS `agt_id`,`agt`.`agt_name` AS `agt_name`,`bkg`.`bkg_delivery_date` AS `delivery_date` from ((`booking_bkg` `bkg` left join `coffee_growers_cgr` `cgr` on((`cgr`.`id` = `bkg`.`cgr_id`))) left join `agent_agt` `agt` on((`agt`.`id` = `bkg`.`agt_id`))) */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-05 15:24:34
