-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: ngea_db
-- ------------------------------------------------------
-- Server version	5.6.17

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
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
-- Table structure for table `coffee_growers_cg`
--

DROP TABLE IF EXISTS `coffee_growers_cg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_growers_cg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gt_id` int(11) DEFAULT NULL,
  `cg_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cg_organisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cg_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cg_mark` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_growers_cg`
--

LOCK TABLES `coffee_growers_cg` WRITE;
/*!40000 ALTER TABLE `coffee_growers_cg` DISABLE KEYS */;
/*!40000 ALTER TABLE `coffee_growers_cg` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_seasons_csn`
--

LOCK TABLES `coffee_seasons_csn` WRITE;
/*!40000 ALTER TABLE `coffee_seasons_csn` DISABLE KEYS */;
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
-- Table structure for table `green_comments_grcm`
--

DROP TABLE IF EXISTS `green_comments_grcm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `green_comments_grcm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(11) DEFAULT NULL,
  `qp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_green_comments_grcm_coffee_details_cfd1_idx` (`cfd_id`),
  KEY `fk_green_comments_grcm_green_type_gtyp1_idx` (`qp_id`),
  CONSTRAINT `fk_green_comments_grcm_coffee_details_cfd1` FOREIGN KEY (`cfd_id`) REFERENCES `coffee_details_cfd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
INSERT INTO `groupmenu_gpm` VALUES (1,4,1,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(2,4,3,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(3,4,4,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(4,4,5,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(5,4,6,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(6,4,7,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(7,4,8,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(8,4,9,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(9,4,10,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(10,4,11,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(11,4,12,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(12,4,13,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(13,4,14,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(14,4,15,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(495,4,15,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(496,4,16,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(497,4,17,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(498,4,18,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(499,4,19,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(500,4,20,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(501,4,21,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(502,4,22,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(503,4,23,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(504,4,24,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(505,4,25,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(506,4,26,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(507,4,27,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(508,4,28,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(509,4,29,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(510,4,30,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00'),(511,4,31,'[\"1\"]','2018-05-10 18:00:00','2018-05-10 18:00:00');
/*!40000 ALTER TABLE `groupmenu_gpm` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_mn`
--

LOCK TABLES `menu_mn` WRITE;
/*!40000 ALTER TABLE `menu_mn` DISABLE KEYS */;
INSERT INTO `menu_mn` VALUES (1,'Department','Add/update department','settingsdepartment',2,15,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(3,'Menu','Add/update menus','settingsmenu',2,15,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(4,'Home','View home page','home',1,0,'coffee',1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(5,'Registration','Top menu registration','registration',1,0,'user-plus',2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(6,'Users','Register users','registeruser',2,5,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(7,'UserManager','Manage users and their roles','usermanager',1,0,'users',3,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(8,'Roles','Add roles','roles',2,7,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(9,'Role User','Add users','rolesuser',2,7,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(10,'Grower Manager','Manage all growers activities','#',1,0,'file',4,'2018-10-21 03:41:54',NULL),(11,'Weighbridge','Weigh trucks','weighbridge',1,0,'truck',5,'2018-10-21 03:41:54',NULL),(12,'Quality','Quality operatins','#',1,0,'thumbs-up',6,'2018-10-21 03:41:54',NULL),(13,'Warehouse','Warehuse management','#',1,0,'building',7,'2018-10-21 03:41:54',NULL),(14,'Processing','Handle all processing','#',1,0,'star',8,'2018-10-21 03:41:54',NULL),(15,'Settings','Application settings','#',1,0,'cog',9,'2018-10-21 03:41:54',NULL),(16,'Intake Ticket - IN','Capture weight in','weighbridge',2,11,NULL,1,'2018-05-10 18:00:00','2018-05-10 18:00:00'),(17,'Intake Ticket - OUT','Capture weight out','weighbridgeout',2,11,NULL,2,'2018-05-10 18:00:00','2018-05-10 18:00:00');
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
INSERT INTO `migrations` VALUES ('2018_10_21_022021_create_activity_log_table',1),('2018_10_21_022021_create_bag_sizes_bgs_table',1),('2018_10_21_022021_create_basket_auto_ba_table',1),('2018_10_21_022021_create_basket_bs_table',1),('2018_10_21_022021_create_batch_btc_table',1),('2018_10_21_022021_create_buyer_type_bt_table',1),('2018_10_21_022021_create_certification_crt_table',1),('2018_10_21_022021_create_charge_type_chty_table',1),('2018_10_21_022021_create_charges_crg_table',1),('2018_10_21_022021_create_client_cl_table',1),('2018_10_21_022021_create_coffee_buyers_cb_table',1),('2018_10_21_022021_create_coffee_certification_ccrt_table',1),('2018_10_21_022021_create_coffee_details_cfd_table',1),('2018_10_21_022021_create_coffee_grade_cgrad_table',1),('2018_10_21_022021_create_coffee_growers_cg_table',1),('2018_10_21_022021_create_coffee_seasons_csn_table',1),('2018_10_21_022021_create_coffee_type_ctyp_table',1),('2018_10_21_022021_create_country_ctr_table',1),('2018_10_21_022021_create_county_cnt_table',1),('2018_10_21_022021_create_credit_note_cn_table',1),('2018_10_21_022021_create_cup_score_comments_cpc_table',1),('2018_10_21_022021_create_cup_score_cp_table',1),('2018_10_21_022021_create_dashboard_view_dv_table',1),('2018_10_21_022021_create_dashboard_view_perm_dvp_table',1),('2018_10_21_022021_create_department_dprt_table',1),('2018_10_21_022021_create_green_comments_grcm_table',1),('2018_10_21_022021_create_grn_gr_table',1),('2018_10_21_022021_create_grns_summary_gsm_table',1),('2018_10_21_022021_create_groupmenu_gpm_table',1),('2018_10_21_022021_create_grower_type_gt_table',1),('2018_10_21_022021_create_growers_transfer_table',1),('2018_10_21_022021_create_instructed_location_ref_ilf_table',1),('2018_10_21_022021_create_instructed_stock_location_insloc_table',1),('2018_10_21_022021_create_internal_basket_ibs_table',1),('2018_10_21_022021_create_invoices_inv_table',1),('2018_10_21_022021_create_location_loc_table',1),('2018_10_21_022021_create_menu_mn_table',1),('2018_10_21_022021_create_mill_ml_table',1),('2018_10_21_022021_create_months_mth_table',1),('2018_10_21_022021_create_movement_instruction_type_mit_table',1),('2018_10_21_022021_create_outturn_total_batch_otb_table',1),('2018_10_21_022021_create_packaging_pkg_table',1),('2018_10_21_022021_create_password_resets_table',1),('2018_10_21_022021_create_payments_py_table',1),('2018_10_21_022021_create_permission_role_table',1),('2018_10_21_022021_create_permissions_table',1),('2018_10_21_022021_create_person_per_table',1),('2018_10_21_022021_create_process_allocations_pall_table',1),('2018_10_21_022021_create_process_charges_prcgs_table',1),('2018_10_21_022021_create_process_charges_teams_pctms_table',1),('2018_10_21_022021_create_process_instructions_prs_table',1),('2018_10_21_022021_create_process_pr_table',1),('2018_10_21_022021_create_process_results_prts_table',1),('2018_10_21_022021_create_processing_group_prg_table',1),('2018_10_21_022021_create_processing_instruction_pri_table',1),('2018_10_21_022021_create_processing_prcss_table',1),('2018_10_21_022021_create_processing_results_type_prt_table',1),('2018_10_21_022021_create_processing_summary_prssm_table',1),('2018_10_21_022021_create_provisional_allocation_prall_table',1),('2018_10_21_022021_create_provisional_bulk_pbk_table',1),('2018_10_21_022021_create_provisonal_purpose_prp_table',1),('2018_10_21_022021_create_purchases_prc_table',1),('2018_10_21_022021_create_quality_analysis_type_qat_table',1),('2018_10_21_022021_create_quality_groups_qg_table',1),('2018_10_21_022021_create_quality_parameters_qp_table',1),('2018_10_21_022021_create_qualty_details_qltyd_table',1),('2018_10_21_022021_create_rates_rts_table',1),('2018_10_21_022021_create_raw_score_rw_table',1),('2018_10_21_022021_create_region_rgn_table',1),('2018_10_21_022021_create_release_instructions_rl_table',1),('2018_10_21_022021_create_role_user_table',1),('2018_10_21_022021_create_roles_table',1),('2018_10_21_022021_create_sale_sl_table',1),('2018_10_21_022021_create_sale_status_sst_table',1),('2018_10_21_022021_create_sale_type_sltyp_table',1),('2018_10_21_022021_create_sales_contract_sct_table',1),('2018_10_21_022021_create_screens_scr_table',1),('2018_10_21_022021_create_seller_slr_table',1),('2018_10_21_022021_create_stock_breakdown_stb_table',1),('2018_10_21_022021_create_stock_location_sloc_table',1),('2018_10_21_022021_create_stock_qualty_details_sqltyd_table',1),('2018_10_21_022021_create_stock_st_table',1),('2018_10_21_022021_create_stock_status_sts_table',1),('2018_10_21_022021_create_stocks_summary_ssm_table',1),('2018_10_21_022021_create_system_settings_sys_table',1),('2018_10_21_022021_create_teams_tms_table',1),('2018_10_21_022021_create_thresholds_th_table',1),('2018_10_21_022021_create_transporters_trp_table',1),('2018_10_21_022021_create_trp_rates_table',1),('2018_10_21_022021_create_users_table',1),('2018_10_21_022021_create_users_usr_table',1),('2018_10_21_022021_create_warehoue_type_wrt_table',1),('2018_10_21_022021_create_warehouse_charges_wrch_table',1),('2018_10_21_022021_create_warehouse_wr_table',1),('2018_10_21_022021_create_warrants_war_table',1),('2018_10_21_022021_create_weighbridge_wb_table',1),('2018_10_21_022021_create_wr_rates_table',1),('2018_10_21_022021_create_years_yr_table',1),('2018_10_21_022035_add_foreign_keys_to_basket_bs_table',1),('2018_10_21_022035_add_foreign_keys_to_coffee_details_cfd_table',1),('2018_10_21_022035_add_foreign_keys_to_cup_score_comments_cpc_table',1),('2018_10_21_022035_add_foreign_keys_to_cup_score_cp_table',1),('2018_10_21_022035_add_foreign_keys_to_green_comments_grcm_table',1),('2018_10_21_022035_add_foreign_keys_to_groupmenu_gpm_table',1),('2018_10_21_022035_add_foreign_keys_to_instructed_stock_location_insloc_table',1),('2018_10_21_022035_add_foreign_keys_to_mill_ml_table',1),('2018_10_21_022035_add_foreign_keys_to_permission_role_table',1),('2018_10_21_022035_add_foreign_keys_to_process_allocations_pall_table',1),('2018_10_21_022035_add_foreign_keys_to_process_charges_prcgs_table',1),('2018_10_21_022035_add_foreign_keys_to_process_charges_teams_pctms_table',1),('2018_10_21_022035_add_foreign_keys_to_process_results_prts_table',1),('2018_10_21_022035_add_foreign_keys_to_provisional_allocation_prall_table',1),('2018_10_21_022035_add_foreign_keys_to_purchases_prc_table',1),('2018_10_21_022035_add_foreign_keys_to_quality_parameters_qp_table',1),('2018_10_21_022035_add_foreign_keys_to_qualty_details_qltyd_table',1),('2018_10_21_022035_add_foreign_keys_to_raw_score_rw_table',1),('2018_10_21_022035_add_foreign_keys_to_region_rgn_table',1),('2018_10_21_022035_add_foreign_keys_to_role_user_table',1),('2018_10_21_022035_add_foreign_keys_to_sale_sl_table',1),('2018_10_21_022035_add_foreign_keys_to_seller_slr_table',1),('2018_10_21_022035_add_foreign_keys_to_stock_st_table',1),('2018_10_21_022035_add_foreign_keys_to_transporters_trp_table',1),('2018_10_21_022035_add_foreign_keys_to_warehouse_wr_table',1);
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
-- Table structure for table `weighbridge_wb`
--

DROP TABLE IF EXISTS `weighbridge_wb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weighbridge_wb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `csn_id` int(11) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `slr_id` int(11) DEFAULT NULL,
  `wb_ticket` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wb_delivery_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wb_vehicle_plate` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wb_weight_in` int(11) DEFAULT NULL,
  `wb_weight_out` int(11) DEFAULT NULL,
  `wb_confirmedby` int(11) DEFAULT NULL,
  `wb_time_in` datetime DEFAULT NULL,
  `wb_time_out` datetime DEFAULT NULL,
  `wb_movement_permit` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wb_driver_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wb_driver_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wb_dispatch_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-21 11:06:22
