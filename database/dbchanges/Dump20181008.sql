CREATE DATABASE  IF NOT EXISTS `ibero_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `ibero_db`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: ibero_db
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Temporary table structure for view `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!50001 DROP VIEW IF EXISTS `activities`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `activities` (
  `id` tinyint NOT NULL,
  `usr_name` tinyint NOT NULL,
  `operation` tinyint NOT NULL,
  `changes` tinyint NOT NULL,
  `ip_address` tinyint NOT NULL,
  `created_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=812926 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `allocationview`
--

DROP TABLE IF EXISTS `allocationview`;
/*!50001 DROP VIEW IF EXISTS `allocationview`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `allocationview` (
  `id` tinyint NOT NULL,
  `slid` tinyint NOT NULL,
  `stid` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `slctrid` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `ml_name` tinyint NOT NULL,
  `region` tinyint NOT NULL,
  `wrid` tinyint NOT NULL,
  `warehouse` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `slrid` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `greencomments` tinyint NOT NULL,
  `green` tinyint NOT NULL,
  `dnt` tinyint NOT NULL,
  `touch` tinyint NOT NULL,
  `prcss_name` tinyint NOT NULL,
  `qltyd_prcss_value` tinyint NOT NULL,
  `scr_name` tinyint NOT NULL,
  `qltyd_scr_value` tinyint NOT NULL,
  `cp_quality` tinyint NOT NULL,
  `rw_quality` tinyint NOT NULL,
  `final_comments` tinyint NOT NULL,
  `cbid` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `auc_price` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `invoice` tinyint NOT NULL,
  `invoice_date` tinyint NOT NULL,
  `invoice_confirmedby` tinyint NOT NULL,
  `py_no` tinyint NOT NULL,
  `payment` tinyint NOT NULL,
  `payment_date` tinyint NOT NULL,
  `payment_confirmedby` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `br_date` tinyint NOT NULL,
  `br_confirmedby` tinyint NOT NULL,
  `bsid` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `warrant_date` tinyint NOT NULL,
  `war_comments` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `rl_no` tinyint NOT NULL,
  `rl_date` tinyint NOT NULL,
  `rl_confirmedby` tinyint NOT NULL,
  `trp_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `awaiting_quality_analysis`
--

DROP TABLE IF EXISTS `awaiting_quality_analysis`;
/*!50001 DROP VIEW IF EXISTS `awaiting_quality_analysis`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `awaiting_quality_analysis` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `green` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `prcssresultsid` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bag_sizes_bgs`
--

DROP TABLE IF EXISTS `bag_sizes_bgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bag_sizes_bgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bgs_size` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `basket_auto_ba`
--

DROP TABLE IF EXISTS `basket_auto_ba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basket_auto_ba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cp_id` varchar(45) DEFAULT NULL,
  `cgrad_id` varchar(45) DEFAULT NULL,
  `bs_id` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `basket_bs`
--

DROP TABLE IF EXISTS `basket_bs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basket_bs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(10) DEFAULT NULL,
  `bs_code` varchar(45) DEFAULT NULL,
  `bs_quality` varchar(45) DEFAULT NULL,
  `bs_description` varchar(45) DEFAULT NULL,
  `bs_coffee_type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_score_type_bs_region_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_score_type_bs_region_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `batch_btc`
--

DROP TABLE IF EXISTS `batch_btc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch_btc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btc_number` int(11) DEFAULT NULL,
  `ws_id` int(11) DEFAULT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `f` (`btc_net_weight`),
  KEY `st_id_idx` (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `batchview`
--

DROP TABLE IF EXISTS `batchview`;
/*!50001 DROP VIEW IF EXISTS `batchview`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `batchview` (
  `id` tinyint NOT NULL,
  `slocid` tinyint NOT NULL,
  `btc_number` tinyint NOT NULL,
  `btc_instructed_by` tinyint NOT NULL,
  `stid` tinyint NOT NULL,
  `prc_id` tinyint NOT NULL,
  `gr_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_tare` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_name` tinyint NOT NULL,
  `btc_weight` tinyint NOT NULL,
  `btc_tare` tinyint NOT NULL,
  `btc_net_weight` tinyint NOT NULL,
  `btc_packages` tinyint NOT NULL,
  `btc_bags` tinyint NOT NULL,
  `btc_pockets` tinyint NOT NULL,
  `loc_row` tinyint NOT NULL,
  `loc_column` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `new_loc_row` tinyint NOT NULL,
  `new_loc_column` tinyint NOT NULL,
  `new_zone` tinyint NOT NULL,
  `insloc_weight` tinyint NOT NULL,
  `new_wr_name` tinyint NOT NULL,
  `reason` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `batchview_all`
--

DROP TABLE IF EXISTS `batchview_all`;
/*!50001 DROP VIEW IF EXISTS `batchview_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `batchview_all` (
  `id` tinyint NOT NULL,
  `btc_prev_id` tinyint NOT NULL,
  `slocid` tinyint NOT NULL,
  `btc_number` tinyint NOT NULL,
  `btc_ended_by` tinyint NOT NULL,
  `btc_instructed_by` tinyint NOT NULL,
  `stid` tinyint NOT NULL,
  `prc_id` tinyint NOT NULL,
  `gr_id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_tare` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_name` tinyint NOT NULL,
  `btc_weight` tinyint NOT NULL,
  `btc_tare` tinyint NOT NULL,
  `btc_net_weight` tinyint NOT NULL,
  `btc_packages` tinyint NOT NULL,
  `btc_bags` tinyint NOT NULL,
  `btc_pockets` tinyint NOT NULL,
  `loc_row` tinyint NOT NULL,
  `loc_column` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `new_loc_row` tinyint NOT NULL,
  `new_loc_column` tinyint NOT NULL,
  `new_zone` tinyint NOT NULL,
  `new_wr_name` tinyint NOT NULL,
  `reason` tinyint NOT NULL,
  `insloc_ref` tinyint NOT NULL,
  `mit_name` tinyint NOT NULL,
  `created_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `being_processed`
--

DROP TABLE IF EXISTS `being_processed`;
/*!50001 DROP VIEW IF EXISTS `being_processed`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `being_processed` (
  `id` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `bought_no_release`
--

DROP TABLE IF EXISTS `bought_no_release`;
/*!50001 DROP VIEW IF EXISTS `bought_no_release`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `bought_no_release` (
  `id` tinyint NOT NULL,
  `slid` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `slctrid` tinyint NOT NULL,
  `slr_name` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `csn_id` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `cbid` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `auc_price` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `br_date` tinyint NOT NULL,
  `bsid` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `rl_no` tinyint NOT NULL,
  `rl_date` tinyint NOT NULL,
  `war_no` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_id` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `loc_row_id` tinyint NOT NULL,
  `loc_column_id` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `btc_packages` tinyint NOT NULL,
  `slrid` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `breakdown`
--

DROP TABLE IF EXISTS `breakdown`;
/*!50001 DROP VIEW IF EXISTS `breakdown`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `breakdown` (
  `id` tinyint NOT NULL,
  `cfdid` tinyint NOT NULL,
  `stbid` tinyint NOT NULL,
  `bric_id` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `ibs_code` tinyint NOT NULL,
  `ibs_quality` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `cgrad_name` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cg_organisation` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `current_value` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `ratios` tinyint NOT NULL,
  `value_ratios` tinyint NOT NULL,
  `full_weight` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sales_weight` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `credit_number` tinyint NOT NULL,
  `cnid` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `stuffed_weight_full` tinyint NOT NULL,
  `stuffed_weight` tinyint NOT NULL,
  `stuffing_date` tinyint NOT NULL,
  `weighbridge_weight_difference` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `br_diffrential` tinyint NOT NULL,
  `sl_hedge` tinyint NOT NULL,
  `cn_confirmed_by` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `st_rejected` tinyint NOT NULL,
  `st_credited` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `sale_season` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `storage` tinyint NOT NULL,
  `bric_bags` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `breakdown_arrival`
--

DROP TABLE IF EXISTS `breakdown_arrival`;
/*!50001 DROP VIEW IF EXISTS `breakdown_arrival`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `breakdown_arrival` (
  `id` tinyint NOT NULL,
  `bric_id` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `cfd_outturn` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `ratios` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sales_weight` tinyint NOT NULL,
  `stuffed_weight` tinyint NOT NULL,
  `weighbridge_weight_difference` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `breakdown_process_results`
--

DROP TABLE IF EXISTS `breakdown_process_results`;
/*!50001 DROP VIEW IF EXISTS `breakdown_process_results`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `breakdown_process_results` (
  `id` tinyint NOT NULL,
  `bric_id` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `ratios` tinyint NOT NULL,
  `full_weight` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `gains_losses` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sales_weight` tinyint NOT NULL,
  `stuffed_weight` tinyint NOT NULL,
  `weighbridge_weight_difference` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `instruction_date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `breakdown_process_results_prep`
--

DROP TABLE IF EXISTS `breakdown_process_results_prep`;
/*!50001 DROP VIEW IF EXISTS `breakdown_process_results_prep`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `breakdown_process_results_prep` (
  `instruction_number` tinyint NOT NULL,
  `instruction_date` tinyint NOT NULL,
  `reference_name` tinyint NOT NULL,
  `other_instructions` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `results` tinyint NOT NULL,
  `balance` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `csn_id` tinyint NOT NULL,
  `cb_id` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `st_mark` tinyint NOT NULL,
  `st_name` tinyint NOT NULL,
  `prc_id` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `pr_id` tinyint NOT NULL,
  `gr_id` tinyint NOT NULL,
  `st_ref_id` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_tare` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `st_net_weight` tinyint NOT NULL,
  `st_packages` tinyint NOT NULL,
  `st_bags` tinyint NOT NULL,
  `st_pockets` tinyint NOT NULL,
  `pkg_id` tinyint NOT NULL,
  `cgrad_id` tinyint NOT NULL,
  `prt_id` tinyint NOT NULL,
  `bs_id` tinyint NOT NULL,
  `ibs_id` tinyint NOT NULL,
  `prc_price` tinyint NOT NULL,
  `br_id` tinyint NOT NULL,
  `sl_id` tinyint NOT NULL,
  `usr_id` tinyint NOT NULL,
  `st_ended_by` tinyint NOT NULL,
  `st_additional_processed` tinyint NOT NULL,
  `st_partial_delivery` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `st_disposed_by` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `breakdown_purchased`
--

DROP TABLE IF EXISTS `breakdown_purchased`;
/*!50001 DROP VIEW IF EXISTS `breakdown_purchased`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `breakdown_purchased` (
  `id` tinyint NOT NULL,
  `bric_id` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `ratios` tinyint NOT NULL,
  `full_weight` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sales_weight` tinyint NOT NULL,
  `stuffed_weight` tinyint NOT NULL,
  `weighbridge_weight_difference` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `breakdown_without_stuffed`
--

DROP TABLE IF EXISTS `breakdown_without_stuffed`;
/*!50001 DROP VIEW IF EXISTS `breakdown_without_stuffed`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `breakdown_without_stuffed` (
  `id` tinyint NOT NULL,
  `cfdid` tinyint NOT NULL,
  `stbid` tinyint NOT NULL,
  `bric_id` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `br_value` tinyint NOT NULL,
  `br_purchased_weight` tinyint NOT NULL,
  `br_price_per_fifty` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `ibs_code` tinyint NOT NULL,
  `ibs_quality` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `cgrad_name` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cg_organisation` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `current_value` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `ratios` tinyint NOT NULL,
  `value_ratios` tinyint NOT NULL,
  `full_weight` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sales_weight` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `credit_number` tinyint NOT NULL,
  `cnid` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `stuffed_weight_full` tinyint NOT NULL,
  `stuffed_weight` tinyint NOT NULL,
  `stuffing_date` tinyint NOT NULL,
  `weighbridge_weight_difference` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `br_diffrential` tinyint NOT NULL,
  `sl_hedge` tinyint NOT NULL,
  `cn_confirmed_by` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `st_rejected` tinyint NOT NULL,
  `st_credited` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `sale_season` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `storage` tinyint NOT NULL,
  `bric_bags` tinyint NOT NULL,
  `sct_description` tinyint NOT NULL,
  `shipment` tinyint NOT NULL,
  `vessel` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `ship_date` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `cg_id` tinyint NOT NULL,
  `pin` tinyint NOT NULL,
  `ctr_name` tinyint NOT NULL,
  `inv_no` tinyint NOT NULL,
  `sct_weight` tinyint NOT NULL,
  `sct_approved_weight` tinyint NOT NULL,
  `cg_code` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bric_br`
--

DROP TABLE IF EXISTS `bric_br`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bric_br` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bs_id` int(11) DEFAULT NULL,
  `cg_id` int(11) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `br_no` varchar(45) DEFAULT NULL,
  `br_date` date DEFAULT NULL,
  `br_confirmedby` varchar(45) DEFAULT NULL,
  `br_purchased_weight` int(11) DEFAULT NULL,
  `br_weight_working_progress` int(11) DEFAULT NULL,
  `br_arrival_gain` int(11) DEFAULT NULL,
  `br_arrival_loss` int(11) DEFAULT NULL,
  `br_process_gains` int(11) DEFAULT NULL,
  `br_process_loss` int(11) DEFAULT NULL,
  `br_stock_out` int(11) DEFAULT NULL,
  `br_credit_note_weight` int(11) DEFAULT NULL,
  `br_balance` int(11) DEFAULT NULL,
  `br_hedge` decimal(18,10) DEFAULT NULL,
  `br_price_per_fifty` decimal(18,10) DEFAULT NULL,
  `br_price_pounds` decimal(18,10) DEFAULT NULL,
  `br_diffrential` varchar(45) DEFAULT NULL,
  `br_value` decimal(18,10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_multiple` (`bs_id`,`br_confirmedby`),
  CONSTRAINT `fk_bs_id_br` FOREIGN KEY (`bs_id`) REFERENCES `basket_bs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2984 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `buyer_type_bt`
--

DROP TABLE IF EXISTS `buyer_type_bt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buyer_type_bt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bt_name` varchar(45) DEFAULT NULL,
  `bt_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `call_from_cf`
--

DROP TABLE IF EXISTS `call_from_cf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `call_from_cf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cf_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `certification_crt`
--

DROP TABLE IF EXISTS `certification_crt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certification_crt` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `crt_name` varchar(150) NOT NULL,
  `crt_description` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `certifications`
--

DROP TABLE IF EXISTS `certifications`;
/*!50001 DROP VIEW IF EXISTS `certifications`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `certifications` (
  `cfdid` tinyint NOT NULL,
  `crt_name` tinyint NOT NULL,
  `crt_description` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `charge_type_chty`
--

DROP TABLE IF EXISTS `charge_type_chty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charge_type_chty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chty_name` varchar(45) DEFAULT NULL,
  `chty_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `check_value_ratios`
--

DROP TABLE IF EXISTS `check_value_ratios`;
/*!50001 DROP VIEW IF EXISTS `check_value_ratios`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `check_value_ratios` (
  `id` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `ratios` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `check_weight_ratios`
--

DROP TABLE IF EXISTS `check_weight_ratios`;
/*!50001 DROP VIEW IF EXISTS `check_weight_ratios`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `check_weight_ratios` (
  `id` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `ratios` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `client_cl`
--

DROP TABLE IF EXISTS `client_cl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_cl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(50) NOT NULL,
  `cl_address` varchar(255) DEFAULT NULL,
  `cl_courier` varchar(45) DEFAULT NULL,
  `cl_telephone` varchar(45) DEFAULT NULL,
  `cl_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `coffee_buyers_cb`
--

DROP TABLE IF EXISTS `coffee_buyers_cb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_buyers_cb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bt_id` int(11) DEFAULT NULL,
  `cb_name` varchar(50) DEFAULT NULL,
  `cb_code` varchar(50) DEFAULT NULL,
  `cb_email` varchar(255) DEFAULT NULL,
  `cb_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index2` (`bt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `coffee_certification_ccrt`
--

DROP TABLE IF EXISTS `coffee_certification_ccrt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_certification_ccrt` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(10) DEFAULT NULL,
  `crt_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cfd_id` (`cfd_id`),
  KEY `crt_id` (`crt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21424 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `coffee_details_cfd`
--

DROP TABLE IF EXISTS `coffee_details_cfd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_details_cfd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `csn_id` int(10) NOT NULL,
  `ctyp_id` int(10) DEFAULT NULL,
  `sl_id` int(10) DEFAULT NULL,
  `slr_id` int(10) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `cg_id` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `cfd_lot_no` int(10) DEFAULT NULL,
  `cfd_outturn` varchar(45) DEFAULT NULL,
  `war_id` int(10) DEFAULT NULL,
  `wr_id` int(10) DEFAULT NULL,
  `ml_id` int(10) DEFAULT NULL,
  `cfd_grower_mark` varchar(45) DEFAULT NULL,
  `cgrad_id` int(10) DEFAULT NULL,
  `cfd_weight` int(10) DEFAULT NULL,
  `cfd_bags` int(10) DEFAULT NULL,
  `cfd_pockets` int(10) DEFAULT NULL,
  `cfd_dnt` int(1) unsigned zerofill DEFAULT '0',
  `cfd_ended_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_coffee_details_cfd_coffee_season_csn1_idx` (`csn_id`),
  KEY `fk_coffee_details_cfd_seller_slr_idx` (`slr_id`),
  KEY `fk_coffee_details_cfd_coffee_grade_cgr1_idx` (`cgrad_id`),
  KEY `fk_coffee_details_cfd_sale_sl1_idx` (`sl_id`),
  KEY `fk_coffee_details_cfd_coffee_type_ctyp1_idx` (`ctyp_id`),
  KEY `fk_coffee_details_cfd_warehouse_wr1_idx` (`wr_id`),
  KEY `index9` (`sl_id`),
  KEY `index10` (`cfd_outturn`),
  KEY `index` (`cfd_lot_no`,`wr_id`,`ml_id`,`cgrad_id`,`cfd_outturn`),
  CONSTRAINT `fk_coffee_details_cfd_coffee_grade_cgr1` FOREIGN KEY (`cgrad_id`) REFERENCES `coffee_grade_cgrad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_coffee_season_csn1` FOREIGN KEY (`csn_id`) REFERENCES `coffee_seasons_csn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_coffee_type_ctyp1` FOREIGN KEY (`ctyp_id`) REFERENCES `coffee_type_ctyp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_sale_sl1` FOREIGN KEY (`sl_id`) REFERENCES `sale_sl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_seller_slr` FOREIGN KEY (`slr_id`) REFERENCES `seller_slr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coffee_details_cfd_warehouse_wr1` FOREIGN KEY (`wr_id`) REFERENCES `warehouse_wr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48295 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `coffee_grade_cgrad`
--

DROP TABLE IF EXISTS `coffee_grade_cgrad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_grade_cgrad` (
  `id` int(10) NOT NULL,
  `ctr_id` int(10) DEFAULT NULL,
  `cgrad_name` varchar(50) NOT NULL,
  `cgrad_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Grade` (`cgrad_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `coffee_growers_cg`
--

DROP TABLE IF EXISTS `coffee_growers_cg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_growers_cg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gt_id` int(11) DEFAULT NULL,
  `cg_name` varchar(50) NOT NULL,
  `cg_organisation` varchar(255) DEFAULT NULL,
  `cg_code` varchar(50) NOT NULL,
  `cg_mark` varchar(45) DEFAULT NULL,
  `cg_email` varchar(45) DEFAULT NULL,
  `cg_mobile` varchar(45) DEFAULT NULL,
  `cg_postal_address` varchar(45) DEFAULT NULL,
  `cg_land_line` varchar(45) DEFAULT NULL,
  `cg_vat_number` varchar(45) DEFAULT NULL,
  `cg_kra_pin` varchar(45) DEFAULT NULL,
  `cg_physical_address` varchar(45) DEFAULT NULL,
  `cg_date_registered` varchar(45) DEFAULT NULL,
  `cg_sub_county` varchar(45) DEFAULT NULL,
  `cg_is_active` int(11) DEFAULT NULL,
  `cg_app_transaction` varchar(45) DEFAULT NULL,
  `cg_postal_town` varchar(45) DEFAULT NULL,
  `cnt_id` int(11) DEFAULT NULL,
  `rgn_id` int(11) DEFAULT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `cg_post_code` varchar(45) DEFAULT NULL,
  `cg_factory_id` varchar(45) DEFAULT NULL,
  `cg_cert` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000008 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `coffee_seasons_csn`
--

DROP TABLE IF EXISTS `coffee_seasons_csn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_seasons_csn` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `csn_season` varchar(50) NOT NULL,
  `csn_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `coffee_type_ctyp`
--

DROP TABLE IF EXISTS `coffee_type_ctyp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coffee_type_ctyp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctyp_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `combined_process_instructions`
--

DROP TABLE IF EXISTS `combined_process_instructions`;
/*!50001 DROP VIEW IF EXISTS `combined_process_instructions`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `combined_process_instructions` (
  `prsid` tinyint NOT NULL,
  `prid` tinyint NOT NULL,
  `pri_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `contract_updates_cu`
--

DROP TABLE IF EXISTS `contract_updates_cu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_updates_cu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sct_id` int(11) DEFAULT NULL,
  `usr_id` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `country_ctr`
--

DROP TABLE IF EXISTS `country_ctr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_ctr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctr_name` varchar(45) NOT NULL,
  `ctr_initial` varchar(45) DEFAULT NULL,
  `ctr_is_active` int(11) DEFAULT NULL,
  `ctr_code` varchar(45) DEFAULT NULL,
  `ctr_license` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `county_cnt`
--

DROP TABLE IF EXISTS `county_cnt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `county_cnt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) NOT NULL,
  `cnt_name` varchar(100) NOT NULL,
  `rgn_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `CountryID` (`ctr_id`),
  KEY `RegionID` (`rgn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `credit_note_cn`
--

DROP TABLE IF EXISTS `credit_note_cn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit_note_cn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cn_number` varchar(45) DEFAULT NULL,
  `cn_buyer` int(11) DEFAULT NULL,
  `cn_seller` int(11) DEFAULT NULL,
  `cn_goods` varchar(45) DEFAULT NULL,
  `cn_country` int(11) DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `cn_weight` int(11) DEFAULT NULL,
  `cn_bags` int(11) DEFAULT NULL,
  `cn_value` decimal(18,2) DEFAULT NULL,
  `cn_confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cup_score_cp`
--

DROP TABLE IF EXISTS `cup_score_cp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cup_score_cp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(10) DEFAULT NULL,
  `cp_score` varchar(45) DEFAULT NULL,
  `cp_quality` varchar(45) DEFAULT NULL,
  `cp_qualification` varchar(45) DEFAULT NULL,
  `cp_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_score_type_scrtyp_region_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_score_type_scrtyp_region_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `current_stocks`
--

DROP TABLE IF EXISTS `current_stocks`;
/*!50001 DROP VIEW IF EXISTS `current_stocks`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `current_stocks` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `Status` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `processtype` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `reference_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `pall_allocated_weight` tinyint NOT NULL,
  `pall_ratios` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `pending_process_all` tinyint NOT NULL,
  `pending_process_id` tinyint NOT NULL,
  `additional_processed` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `grn_weight` tinyint NOT NULL,
  `pr_confirmed_by` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `month` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `department_dprt`
--

DROP TABLE IF EXISTS `department_dprt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_dprt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `dprt_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `direct_sale`
--

DROP TABLE IF EXISTS `direct_sale`;
/*!50001 DROP VIEW IF EXISTS `direct_sale`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `direct_sale` (
  `id` tinyint NOT NULL,
  `slid` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `slctrid` tinyint NOT NULL,
  `ctrname` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `ml_name` tinyint NOT NULL,
  `region` tinyint NOT NULL,
  `warehouse` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `slrid` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `sl_margin` tinyint NOT NULL,
  `sltyp_id` tinyint NOT NULL,
  `purchase_confirmed` tinyint NOT NULL,
  `quality_confirmed` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `auc_price` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `fobid` tinyint NOT NULL,
  `fobprice` tinyint NOT NULL,
  `greencomments` tinyint NOT NULL,
  `green` tinyint NOT NULL,
  `dnt` tinyint NOT NULL,
  `touch` tinyint NOT NULL,
  `prcss_name` tinyint NOT NULL,
  `qltyd_prcss_value` tinyint NOT NULL,
  `scr_name` tinyint NOT NULL,
  `qltyd_scr_value` tinyint NOT NULL,
  `cp_quality` tinyint NOT NULL,
  `rw_quality` tinyint NOT NULL,
  `qualityParameterID` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `rw_score` tinyint NOT NULL,
  `cbid` tinyint NOT NULL,
  `invoice` tinyint NOT NULL,
  `inv_weight` tinyint NOT NULL,
  `invoice_date` tinyint NOT NULL,
  `invoice_confirmedby` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `bsid` tinyint NOT NULL,
  `py_no` tinyint NOT NULL,
  `payment` tinyint NOT NULL,
  `payment_date` tinyint NOT NULL,
  `payment_confirmedby` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `br_date` tinyint NOT NULL,
  `br_confirmedby` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `warrant_date` tinyint NOT NULL,
  `war_comments` tinyint NOT NULL,
  `grid` tinyint NOT NULL,
  `wrid` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `dispatch_dp`
--

DROP TABLE IF EXISTS `dispatch_dp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispatch_dp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `st_id` int(11) DEFAULT NULL,
  `sct_id` int(11) DEFAULT NULL,
  `csn_id` int(11) DEFAULT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `wb_id` int(11) DEFAULT NULL,
  `dp_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dp_confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `expected_arrival`
--

DROP TABLE IF EXISTS `expected_arrival`;
/*!50001 DROP VIEW IF EXISTS `expected_arrival`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `expected_arrival` (
  `id` tinyint NOT NULL,
  `slid` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `slctrid` tinyint NOT NULL,
  `slr_name` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `csn_id` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `green` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `cbid` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `auc_price` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `brid` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `br_date` tinyint NOT NULL,
  `bsid` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `rl_no` tinyint NOT NULL,
  `rl_date` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_id` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `loc_row_id` tinyint NOT NULL,
  `loc_column_id` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `btc_packages` tinyint NOT NULL,
  `slrid` tinyint NOT NULL,
  `prallid` tinyint NOT NULL,
  `warid` tinyint NOT NULL,
  `war_no` tinyint NOT NULL,
  `partial_delivery` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `freight_on_board_fob`
--

DROP TABLE IF EXISTS `freight_on_board_fob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freight_on_board_fob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fob_price` decimal(18,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `green`
--

DROP TABLE IF EXISTS `green`;
/*!50001 DROP VIEW IF EXISTS `green`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `green` (
  `cfdid` tinyint NOT NULL,
  `qp_parameter` tinyint NOT NULL,
  `qp_description` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `green_comments_grcm`
--

DROP TABLE IF EXISTS `green_comments_grcm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `green_comments_grcm` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(10) DEFAULT NULL,
  `qp_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_green_comments_grcm_green_type_gtyp1_idx` (`qp_id`),
  KEY `fk_green_comments_grcm_coffee_details_cfd1_idx` (`cfd_id`),
  CONSTRAINT `fk_green_comments_grcm_coffee_details_cfd1` FOREIGN KEY (`cfd_id`) REFERENCES `coffee_details_cfd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_green_comments_grcm_green_type_gtyp1` FOREIGN KEY (`qp_id`) REFERENCES `quality_parameters_qp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=422791 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `green_size`
--

DROP TABLE IF EXISTS `green_size`;
/*!50001 DROP VIEW IF EXISTS `green_size`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `green_size` (
  `count` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `qg_id` tinyint NOT NULL,
  `qp_parameter` tinyint NOT NULL,
  `qp_description` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `grn_gr`
--

DROP TABLE IF EXISTS `grn_gr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grn_gr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csn_id` int(11) DEFAULT NULL,
  `ctr_id` int(11) DEFAULT NULL,
  `wb_id` int(11) DEFAULT NULL,
  `gr_number` varchar(45) DEFAULT NULL,
  `gr_confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=843 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `grns_received_monthly`
--

DROP TABLE IF EXISTS `grns_received_monthly`;
/*!50001 DROP VIEW IF EXISTS `grns_received_monthly`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grns_received_monthly` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `Status` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `processtype` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `reference_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `weight_difference` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `pall_allocated_weight` tinyint NOT NULL,
  `pall_ratios` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `pending_process_all` tinyint NOT NULL,
  `pending_process_id` tinyint NOT NULL,
  `additional_processed` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `invoiced_weight` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `grn_gross_weight` tinyint NOT NULL,
  `pr_confirmed_by` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `month` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `grns_received_monthly_diffrence`
--

DROP TABLE IF EXISTS `grns_received_monthly_diffrence`;
/*!50001 DROP VIEW IF EXISTS `grns_received_monthly_diffrence`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grns_received_monthly_diffrence` (
  `outturn` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `expected_weight` tinyint NOT NULL,
  `weight_difference` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `grns_received_monthly_warehouse_days`
--

DROP TABLE IF EXISTS `grns_received_monthly_warehouse_days`;
/*!50001 DROP VIEW IF EXISTS `grns_received_monthly_warehouse_days`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grns_received_monthly_warehouse_days` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `wb_ticket` tinyint NOT NULL,
  `wb_delivery_number` tinyint NOT NULL,
  `wb_vehicle_plate` tinyint NOT NULL,
  `wb_weight_in` tinyint NOT NULL,
  `wb_weight_out` tinyint NOT NULL,
  `wb_time_in` tinyint NOT NULL,
  `wb_time_out` tinyint NOT NULL,
  `wb_movement_permit` tinyint NOT NULL,
  `wb_driver_name` tinyint NOT NULL,
  `wb_driver_id` tinyint NOT NULL,
  `wb_dispatch_date` tinyint NOT NULL,
  `stid` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_tare` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `st_net_weight` tinyint NOT NULL,
  `st_bags` tinyint NOT NULL,
  `st_pockets` tinyint NOT NULL,
  `crd_id` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `prc_confirmed_price` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `wr_id` tinyint NOT NULL,
  `sl_date` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `storage_days` tinyint NOT NULL,
  `storage_rate` tinyint NOT NULL,
  `storage_charges` tinyint NOT NULL,
  `handling_bag_rate` tinyint NOT NULL,
  `handling_charges` tinyint NOT NULL,
  `warrant_rate` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `grns_received_summary`
--

DROP TABLE IF EXISTS `grns_received_summary`;
/*!50001 DROP VIEW IF EXISTS `grns_received_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grns_received_summary` (
  `weight` tinyint NOT NULL,
  `expected_weight` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `weight_difference` tinyint NOT NULL,
  `percentage_weight_difference` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `grns_summary_gsm`
--

DROP TABLE IF EXISTS `grns_summary_gsm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grns_summary_gsm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gsm_season` int(11) DEFAULT NULL,
  `gsm_warehouse_from` varchar(45) DEFAULT NULL,
  `gsm_buyer` varchar(45) DEFAULT NULL,
  `gsm_month` varchar(45) DEFAULT NULL,
  `gsm_weight` int(11) DEFAULT NULL,
  `gsm_expected_weight` int(11) DEFAULT NULL,
  `gsm_weight_difference` int(11) DEFAULT NULL,
  `gsm_percentage_weight_difference` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=441870 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `grns_view`
--

DROP TABLE IF EXISTS `grns_view`;
/*!50001 DROP VIEW IF EXISTS `grns_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grns_view` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `wb_ticket` tinyint NOT NULL,
  `wb_delivery_number` tinyint NOT NULL,
  `wb_vehicle_plate` tinyint NOT NULL,
  `wb_weight_in` tinyint NOT NULL,
  `wb_weight_out` tinyint NOT NULL,
  `wb_time_in` tinyint NOT NULL,
  `wb_time_out` tinyint NOT NULL,
  `wb_movement_permit` tinyint NOT NULL,
  `wb_driver_name` tinyint NOT NULL,
  `wb_driver_id` tinyint NOT NULL,
  `wb_dispatch_date` tinyint NOT NULL,
  `stid` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_tare` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `st_net_weight` tinyint NOT NULL,
  `st_packages` tinyint NOT NULL,
  `st_bags` tinyint NOT NULL,
  `st_pockets` tinyint NOT NULL,
  `crd_id` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `prc_confirmed_price` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=636 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grower_type_gt`
--

DROP TABLE IF EXISTS `grower_type_gt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grower_type_gt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gt_name` varchar(45) DEFAULT NULL,
  `gt_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `growers_transfer`
--

DROP TABLE IF EXISTS `growers_transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `growers_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cg_id` varchar(45) DEFAULT NULL,
  `cb_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `highest_batch`
--

DROP TABLE IF EXISTS `highest_batch`;
/*!50001 DROP VIEW IF EXISTS `highest_batch`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `highest_batch` (
  `slocid` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `st_id` tinyint NOT NULL,
  `wr_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `hoopers_capacity_hp`
--

DROP TABLE IF EXISTS `hoopers_capacity_hp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoopers_capacity_hp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hp_capacity` int(11) DEFAULT NULL,
  `hp_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instructed_location_ref_ilf`
--

DROP TABLE IF EXISTS `instructed_location_ref_ilf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructed_location_ref_ilf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilf_number` varchar(45) DEFAULT NULL,
  `ilf_reason` varchar(255) DEFAULT NULL,
  `mit_id` int(11) DEFAULT NULL,
  `confirmed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1269 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `insloc_reason` varchar(255) DEFAULT NULL,
  `mit_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkx_btid_idx` (`bt_id`),
  KEY `f` (`insloc_weight`),
  CONSTRAINT `fkx_btid` FOREIGN KEY (`bt_id`) REFERENCES `batch_btc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18403 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `internal_basket_ibs`
--

DROP TABLE IF EXISTS `internal_basket_ibs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internal_basket_ibs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `ibs_code` varchar(45) DEFAULT NULL,
  `ibs_quality` varchar(45) DEFAULT NULL,
  `ibs_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoices_inv`
--

DROP TABLE IF EXISTS `invoices_inv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices_inv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(45) DEFAULT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_confirmedby` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `indx_confirmedby` (`inv_confirmedby`,`inv_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2078 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `location_loc`
--

DROP TABLE IF EXISTS `location_loc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location_loc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_id` int(11) DEFAULT NULL,
  `loc_row` varchar(45) DEFAULT NULL,
  `loc_column` varchar(45) DEFAULT NULL,
  `loc_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `long_short`
--

DROP TABLE IF EXISTS `long_short`;
/*!50001 DROP VIEW IF EXISTS `long_short`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `long_short` (
  `code` tinyint NOT NULL,
  `stock_bags` tinyint NOT NULL,
  `allocated_bags` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `bric_diff` tinyint NOT NULL,
  `stock_diff` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `long_short_internal`
--

DROP TABLE IF EXISTS `long_short_internal`;
/*!50001 DROP VIEW IF EXISTS `long_short_internal`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `long_short_internal` (
  `code` tinyint NOT NULL,
  `stock_bags` tinyint NOT NULL,
  `allocated_bags` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `bric_diff` tinyint NOT NULL,
  `stock_diff` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `long_short_internal_lsht`
--

DROP TABLE IF EXISTS `long_short_internal_lsht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `long_short_internal_lsht` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bs_quality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_bags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allocated_bags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bric_diff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_diff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `may_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `june_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `july_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `august_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `september_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `october_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `november_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `december_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `january_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `february_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `march_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `june_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `long_short_lsht`
--

DROP TABLE IF EXISTS `long_short_lsht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `long_short_lsht` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bs_quality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_bags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allocated_bags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bric_diff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_diff` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `may_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `june_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `july_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `august_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `september_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `october_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `november_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `december_2018` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `january_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `february_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `march_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `june_2019` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `lots_bought`
--

DROP TABLE IF EXISTS `lots_bought`;
/*!50001 DROP VIEW IF EXISTS `lots_bought`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `lots_bought` (
  `id` tinyint NOT NULL,
  `slid` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `slctrid` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `ml_name` tinyint NOT NULL,
  `region` tinyint NOT NULL,
  `wrid` tinyint NOT NULL,
  `warehouse` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `slrid` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `greencomments` tinyint NOT NULL,
  `dnt` tinyint NOT NULL,
  `touch` tinyint NOT NULL,
  `prcss_name` tinyint NOT NULL,
  `qltyd_prcss_value` tinyint NOT NULL,
  `scr_name` tinyint NOT NULL,
  `qltyd_scr_value` tinyint NOT NULL,
  `cp_quality` tinyint NOT NULL,
  `rw_quality` tinyint NOT NULL,
  `final_comments` tinyint NOT NULL,
  `cbid` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `auc_price` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `invoice` tinyint NOT NULL,
  `invoice_date` tinyint NOT NULL,
  `invoice_confirmedby` tinyint NOT NULL,
  `py_no` tinyint NOT NULL,
  `payment` tinyint NOT NULL,
  `payment_date` tinyint NOT NULL,
  `payment_confirmedby` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `br_date` tinyint NOT NULL,
  `br_confirmedby` tinyint NOT NULL,
  `bsid` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `warrant_date` tinyint NOT NULL,
  `war_comments` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `rl_no` tinyint NOT NULL,
  `rl_date` tinyint NOT NULL,
  `rl_confirmedby` tinyint NOT NULL,
  `trp_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `mill_ml`
--

DROP TABLE IF EXISTS `mill_ml`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mill_ml` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rgn_id` int(10) DEFAULT NULL,
  `ml_name` varchar(45) NOT NULL,
  `ml_initials` varchar(45) DEFAULT NULL,
  `ml_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_ml_region_rgn1_idx` (`rgn_id`),
  CONSTRAINT `fk_warehouse_ml_region_rgn1` FOREIGN KEY (`rgn_id`) REFERENCES `region_rgn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `mills_region`
--

DROP TABLE IF EXISTS `mills_region`;
/*!50001 DROP VIEW IF EXISTS `mills_region`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `mills_region` (
  `mlid` tinyint NOT NULL,
  `rgnid` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `rgn_name` tinyint NOT NULL,
  `rgn_description` tinyint NOT NULL,
  `ml_name` tinyint NOT NULL,
  `ml_initials` tinyint NOT NULL,
  `ml_description` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `months_mth`
--

DROP TABLE IF EXISTS `months_mth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `months_mth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mth_name` varchar(45) DEFAULT NULL,
  `mth_trading` int(11) DEFAULT NULL,
  `mth_number` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `movement_instruction_type_mit`
--

DROP TABLE IF EXISTS `movement_instruction_type_mit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movement_instruction_type_mit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mit_name` varchar(45) DEFAULT NULL,
  `mit_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2252 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `pkg_weight_export` decimal(18,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `usr_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usr_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_usr_email_index` (`usr_email`),
  KEY `password_resets_usr_token_index` (`usr_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payments_py`
--

DROP TABLE IF EXISTS `payments_py`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments_py` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `py_no` varchar(255) DEFAULT NULL,
  `py_date` date DEFAULT NULL,
  `py_amount` decimal(18,2) DEFAULT NULL,
  `py_confirmedby` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `indeces` (`py_confirmedby`,`py_no`)
) ENGINE=InnoDB AUTO_INCREMENT=384 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pre_shipment_invoice_psi`
--

DROP TABLE IF EXISTS `pre_shipment_invoice_psi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_shipment_invoice_psi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sct_id` int(11) DEFAULT NULL,
  `cg_id` int(11) DEFAULT NULL,
  `inv_no` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mlt_indx` (`sct_id`,`cg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1366 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `price_type_pt`
--

DROP TABLE IF EXISTS `price_type_pt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_type_pt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_type` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `price_units_pu`
--

DROP TABLE IF EXISTS `price_units_pu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_units_pu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pu_units` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `pall_allocated_weight` int(11) DEFAULT NULL,
  `pall_packages` int(11) DEFAULT NULL,
  `pall_processed_weight` int(11) DEFAULT NULL,
  `pall_tags` int(11) DEFAULT NULL,
  `pall_ratios` decimal(18,15) DEFAULT NULL,
  `pall_extra_processing` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pr_id_idx` (`pr_id`),
  KEY `fk_st_id_idx` (`st_id`),
  CONSTRAINT `fk_pr_id` FOREIGN KEY (`pr_id`) REFERENCES `process_pr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_st_id` FOREIGN KEY (`st_id`) REFERENCES `stock_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12204 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `process_charges_prcgs_prcgs_rate_id_foreign` (`prcgs_rate_id`),
  KEY `process_charges_prcgs_prcgs_team_id_foreign` (`prcgs_team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=791 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `process_charges_teams_pctms_prcgs_id_foreign` (`prcgs_id`),
  KEY `process_charges_teams_pctms_prcgs_team_id_foreign` (`prcgs_team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=519 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2807 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `pr_instruction_number` varchar(45) DEFAULT NULL,
  `pr_reference_name` varchar(45) DEFAULT NULL,
  `pr_weight_in` int(11) DEFAULT NULL,
  `pr_other_instructions` varchar(255) DEFAULT NULL,
  `pr_weight_processed` int(11) DEFAULT NULL,
  `pr_okay_to_process` int(11) DEFAULT NULL,
  `pr_supervisor` varchar(45) DEFAULT NULL,
  `pr_confirmed_by` int(11) DEFAULT NULL,
  `cgrad_id` int(10) DEFAULT NULL,
  `bs_id` int(10) DEFAULT NULL,
  `pr_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pr_instruction_number_UNIQUE` (`pr_instruction_number`)
) ENGINE=InnoDB AUTO_INCREMENT=1583 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `process_results_per_bric`
--

DROP TABLE IF EXISTS `process_results_per_bric`;
/*!50001 DROP VIEW IF EXISTS `process_results_per_bric`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `process_results_per_bric` (
  `id` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `internal_bs_code` tinyint NOT NULL,
  `internal_bs_quality` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `results` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `ratio` tinyint NOT NULL,
  `bric_weight` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `pr_date` tinyint NOT NULL,
  `confirmation_date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `process_results_per_bric_buyer`
--

DROP TABLE IF EXISTS `process_results_per_bric_buyer`;
/*!50001 DROP VIEW IF EXISTS `process_results_per_bric_buyer`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `process_results_per_bric_buyer` (
  `cb_name` tinyint NOT NULL,
  `total_allocated` tinyint NOT NULL,
  `results` tinyint NOT NULL,
  `diffrence` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `year` tinyint NOT NULL,
  `pr_date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
  `prt_id` int(11) DEFAULT NULL,
  `prts_weight` int(11) DEFAULT NULL,
  `prts_packages` int(11) DEFAULT NULL,
  `cgrad_id` int(10) DEFAULT NULL,
  `bs_id` int(10) DEFAULT NULL,
  `wr_id` int(11) DEFAULT NULL,
  `loc_row` varchar(45) DEFAULT NULL,
  `loc_column` varchar(45) DEFAULT NULL,
  `btc_zone` int(11) DEFAULT NULL,
  `prts_return_to_stock` int(11) DEFAULT NULL,
  `cp_id` int(11) DEFAULT NULL,
  `sqltyd_acidity` decimal(18,2) DEFAULT NULL,
  `sqltyd_body` decimal(18,2) DEFAULT NULL,
  `sqltyd_flavour` decimal(18,2) DEFAULT NULL,
  `sqltyd_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `st_id_idx` (`st_id`),
  KEY `pr_id_indx` (`pr_id`,`prt_id`,`bs_id`,`wr_id`,`cgrad_id`),
  CONSTRAINT `st_id_idx` FOREIGN KEY (`st_id`) REFERENCES `stock_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2232 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `process_results_summary`
--

DROP TABLE IF EXISTS `process_results_summary`;
/*!50001 DROP VIEW IF EXISTS `process_results_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `process_results_summary` (
  `pr_id` tinyint NOT NULL,
  `instruction_number` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `instruction_date` tinyint NOT NULL,
  `reference_name` tinyint NOT NULL,
  `other_instructions` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `results` tinyint NOT NULL,
  `balance` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `process_results_summary_per_bric`
--

DROP TABLE IF EXISTS `process_results_summary_per_bric`;
/*!50001 DROP VIEW IF EXISTS `process_results_summary_per_bric`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `process_results_summary_per_bric` (
  `outturn` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `total_allocated` tinyint NOT NULL,
  `total_results` tinyint NOT NULL,
  `total_diffrence` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `processes`
--

DROP TABLE IF EXISTS `processes`;
/*!50001 DROP VIEW IF EXISTS `processes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `processes` (
  `id` tinyint NOT NULL,
  `prt_id` tinyint NOT NULL,
  `ctrid` tinyint NOT NULL,
  `process` tinyint NOT NULL,
  `process_initial` tinyint NOT NULL,
  `process_description` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `process_instructions` tinyint NOT NULL,
  `process_other_instructions` tinyint NOT NULL,
  `result_type` tinyint NOT NULL,
  `results_initials` tinyint NOT NULL,
  `resulsts_description` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `weight_in` tinyint NOT NULL,
  `weight_out` tinyint NOT NULL,
  `packages_out` tinyint NOT NULL,
  `ibs_code` tinyint NOT NULL,
  `cgrad_name` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `sqltyd_acidity` tinyint NOT NULL,
  `sqltyd_body` tinyint NOT NULL,
  `sqltyd_flavour` tinyint NOT NULL,
  `sqltyd_description` tinyint NOT NULL,
  `pr_confirmed_by` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `loc_row` tinyint NOT NULL,
  `loc_column` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `processes_summary`
--

DROP TABLE IF EXISTS `processes_summary`;
/*!50001 DROP VIEW IF EXISTS `processes_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `processes_summary` (
  `id` tinyint NOT NULL,
  `ctrid` tinyint NOT NULL,
  `season` tinyint NOT NULL,
  `process` tinyint NOT NULL,
  `process_initial` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `pr_weight_in` tinyint NOT NULL,
  `process_description` tinyint NOT NULL,
  `process_instructions` tinyint NOT NULL,
  `process_other_instructions` tinyint NOT NULL,
  `contract_number` tinyint NOT NULL,
  `contract_description` tinyint NOT NULL,
  `contract_month` tinyint NOT NULL,
  `contract_bulk_date` tinyint NOT NULL,
  `contract_disposal` tinyint NOT NULL,
  `contract_shipment` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `year` tinyint NOT NULL,
  `process_date` tinyint NOT NULL,
  `process_confirmed_by` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `processing_group_prg`
--

DROP TABLE IF EXISTS `processing_group_prg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_group_prg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prcss_id` int(11) DEFAULT NULL,
  `prg_input_type` varchar(45) DEFAULT NULL,
  `prg_instruction` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `processing_instruction`
--

DROP TABLE IF EXISTS `processing_instruction`;
/*!50001 DROP VIEW IF EXISTS `processing_instruction`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `processing_instruction` (
  `id` tinyint NOT NULL,
  `prgid` tinyint NOT NULL,
  `prcss_id` tinyint NOT NULL,
  `prg_input_type` tinyint NOT NULL,
  `prg_instruction` tinyint NOT NULL,
  `pri_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `processing_instruction_pri`
--

DROP TABLE IF EXISTS `processing_instruction_pri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_instruction_pri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prg_id` int(11) DEFAULT NULL,
  `pri_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `processing_monthly_summary`
--

DROP TABLE IF EXISTS `processing_monthly_summary`;
/*!50001 DROP VIEW IF EXISTS `processing_monthly_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `processing_monthly_summary` (
  `cb_name` tinyint NOT NULL,
  `total_allocated` tinyint NOT NULL,
  `results` tinyint NOT NULL,
  `diffrence` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `year` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `processing_prcss`
--

DROP TABLE IF EXISTS `processing_prcss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_prcss` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `prcss_name` varchar(45) DEFAULT NULL,
  `prcss_initial` varchar(45) DEFAULT NULL,
  `prcss_description` varchar(255) DEFAULT NULL,
  `prcss_auction` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `processing_results`
--

DROP TABLE IF EXISTS `processing_results`;
/*!50001 DROP VIEW IF EXISTS `processing_results`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `processing_results` (
  `id` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `br_id` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `st_processed_id` tinyint NOT NULL,
  `st_outturn_processed` tinyint NOT NULL,
  `st_mark` tinyint NOT NULL,
  `cgrad_name` tinyint NOT NULL,
  `prc_confirmed_price` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `initial_weight` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `diff` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `created_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `processing_results_type_prt`
--

DROP TABLE IF EXISTS `processing_results_type_prt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_results_type_prt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prcss_id` int(11) DEFAULT NULL,
  `prt_name` varchar(45) DEFAULT NULL,
  `prt_initials` varchar(45) DEFAULT NULL,
  `prt_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `processing_summary_prssm`
--

DROP TABLE IF EXISTS `processing_summary_prssm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processing_summary_prssm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prssm_buyer` varchar(45) DEFAULT NULL,
  `prssm_year` varchar(45) DEFAULT NULL,
  `prssm_month` varchar(45) DEFAULT NULL,
  `prssm_total_allocated` int(11) DEFAULT NULL,
  `prssm_results` int(11) DEFAULT NULL,
  `prssm_difference` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162176 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prall_pr_id_idx` (`pbk_id`),
  KEY `fk_prall_st_id_idx` (`st_id`),
  KEY `fk_cfd_id_idx` (`cfd_id`),
  CONSTRAINT `fk_cfd_id` FOREIGN KEY (`cfd_id`) REFERENCES `coffee_details_cfd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prall_st_id` FOREIGN KEY (`st_id`) REFERENCES `stock_st` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4867 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `pbk_instruction_number` varchar(45) DEFAULT NULL,
  `pbk_reference_name` varchar(45) DEFAULT NULL,
  `pbk_weight_in` int(11) DEFAULT NULL,
  `pbk_other_instructions` varchar(255) DEFAULT NULL,
  `pbk_weight_processed` int(11) DEFAULT NULL,
  `pbk_confirmed_by` int(11) DEFAULT NULL,
  `cgrad_id` int(10) DEFAULT NULL,
  `bs_id` int(10) DEFAULT NULL,
  `pbk_date` date DEFAULT NULL,
  `prp_id` int(11) DEFAULT NULL,
  `pbk_comments` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pbk_instruction_number_UNIQUE` (`pbk_instruction_number`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `provisional_summary`
--

DROP TABLE IF EXISTS `provisional_summary`;
/*!50001 DROP VIEW IF EXISTS `provisional_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `provisional_summary` (
  `id` tinyint NOT NULL,
  `ctrid` tinyint NOT NULL,
  `season` tinyint NOT NULL,
  `process` tinyint NOT NULL,
  `process_initial` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `pr_weight_in` tinyint NOT NULL,
  `process_description` tinyint NOT NULL,
  `process_other_instructions` tinyint NOT NULL,
  `contract_number` tinyint NOT NULL,
  `contract_description` tinyint NOT NULL,
  `contract_month` tinyint NOT NULL,
  `contract_bulk_date` tinyint NOT NULL,
  `contract_disposal` tinyint NOT NULL,
  `contract_shipment` tinyint NOT NULL,
  `process_date` tinyint NOT NULL,
  `process_confirmed_by` tinyint NOT NULL,
  `prp_name` tinyint NOT NULL,
  `pbk_comments` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `provisonal_purpose_prp`
--

DROP TABLE IF EXISTS `provisonal_purpose_prp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provisonal_purpose_prp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prp_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `purchase_contract_summary`
--

DROP TABLE IF EXISTS `purchase_contract_summary`;
/*!50001 DROP VIEW IF EXISTS `purchase_contract_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `purchase_contract_summary` (
  `sl_id` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_id` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `kilos` tinyint NOT NULL,
  `costs` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `diff` tinyint NOT NULL,
  `br_bags` tinyint NOT NULL,
  `price_per_fifty` tinyint NOT NULL,
  `br_price_pounds` tinyint NOT NULL,
  `br_diffrential` tinyint NOT NULL,
  `br_value` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `purchases_prc`
--

DROP TABLE IF EXISTS `purchases_prc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases_prc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(10) DEFAULT NULL,
  `cb_id` int(10) DEFAULT NULL,
  `prc_price` decimal(18,2) DEFAULT NULL,
  `prc_confirmed_price` decimal(18,2) DEFAULT NULL,
  `prc_hedge` decimal(18,10) DEFAULT NULL,
  `prc_value` decimal(18,2) DEFAULT NULL,
  `prc_bric_value` decimal(18,2) DEFAULT NULL,
  `prc_fob_id` int(10) DEFAULT NULL,
  `sst_id` int(10) DEFAULT NULL,
  `ibs_id` int(10) DEFAULT NULL,
  `bs_id` int(10) DEFAULT NULL,
  `br_id` int(10) DEFAULT NULL,
  `prc_purchase_contract_ratio` decimal(18,10) DEFAULT NULL,
  `inv_id` int(10) DEFAULT NULL,
  `inv_weight` int(11) DEFAULT NULL,
  `inv_outturn` varchar(45) DEFAULT NULL,
  `inv_mark` varchar(45) DEFAULT NULL,
  `py_id` int(10) DEFAULT NULL,
  `war_id` int(10) DEFAULT NULL,
  `rl_id` int(10) DEFAULT NULL,
  `gr_id` int(11) DEFAULT NULL,
  `cn_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cfd_id` (`cfd_id`),
  KEY `index_multiple` (`cb_id`,`sst_id`,`bs_id`,`br_id`,`inv_id`,`py_id`,`war_id`,`rl_id`,`gr_id`,`cn_id`),
  KEY `fk_bs_id_idx` (`bs_id`),
  CONSTRAINT `fk_bs_id` FOREIGN KEY (`bs_id`) REFERENCES `basket_bs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25751 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `purchases_summary`
--

DROP TABLE IF EXISTS `purchases_summary`;
/*!50001 DROP VIEW IF EXISTS `purchases_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `purchases_summary` (
  `weight` tinyint NOT NULL,
  `slr_name` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `month` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `purchases_summary_prsm`
--

DROP TABLE IF EXISTS `purchases_summary_prsm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases_summary_prsm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prsm_csn_season` varchar(45) DEFAULT NULL,
  `prsm_seller` varchar(45) DEFAULT NULL,
  `prsm_buyer` varchar(45) DEFAULT NULL,
  `prsm_wr_name` varchar(45) DEFAULT NULL,
  `prsm_weight` int(11) DEFAULT NULL,
  `prsm_month` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=343673 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quality_analysis_type_qat`
--

DROP TABLE IF EXISTS `quality_analysis_type_qat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_analysis_type_qat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qat_name` varchar(45) DEFAULT NULL,
  `qat_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quality_groups_qg`
--

DROP TABLE IF EXISTS `quality_groups_qg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_groups_qg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `qg_name` varchar(45) DEFAULT NULL,
  `qg_remarks` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quality_parameters_qp`
--

DROP TABLE IF EXISTS `quality_parameters_qp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_parameters_qp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `qg_id` int(10) DEFAULT NULL,
  `qp_parameter` varchar(45) DEFAULT NULL,
  `qp_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `QualityGroup_Fk_idx` (`qg_id`),
  CONSTRAINT `QualityGroup_Fk` FOREIGN KEY (`qg_id`) REFERENCES `quality_groups_qg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `qualty_details_qltyd`
--

DROP TABLE IF EXISTS `qualty_details_qltyd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualty_details_qltyd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cfd_id` int(10) DEFAULT NULL,
  `prcss_id` int(10) DEFAULT NULL,
  `qltyd_prcss_value` int(10) DEFAULT NULL,
  `scr_id` int(10) DEFAULT NULL,
  `qltyd_scr_value` int(10) DEFAULT NULL,
  `cp_id` int(10) DEFAULT NULL,
  `rw_id` int(10) DEFAULT NULL,
  `qltyd_acidity` decimal(18,2) DEFAULT NULL,
  `qltyd_body` decimal(18,2) DEFAULT NULL,
  `qltyd_flavour` decimal(18,2) DEFAULT NULL,
  `qltyd_comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_qualty_details_qltyd_coffee_details_cfd1_idx` (`cfd_id`),
  KEY `fk_qualty_details_qltyd_processing_prcss1_idx` (`prcss_id`),
  KEY `fk_qualty_details_qltyd_screen_prcss1_idx` (`scr_id`),
  KEY `fk_qualty_details_qltyd_score_type_scrtyp1_idx` (`cp_id`),
  KEY `fk_qualty_details_qltyd_score_type_scrtyp2_idx` (`rw_id`),
  CONSTRAINT `fk_qualty_details_qltyd_coffee_details_cfd1` FOREIGN KEY (`cfd_id`) REFERENCES `coffee_details_cfd` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_processing_prcss1` FOREIGN KEY (`prcss_id`) REFERENCES `processing_prcss` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_quality_remarks_qrmk1` FOREIGN KEY (`scr_id`) REFERENCES `screens_scr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_score_type_scrtyp1` FOREIGN KEY (`cp_id`) REFERENCES `cup_score_cp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualty_details_qltyd_score_type_scrtyp2` FOREIGN KEY (`rw_id`) REFERENCES `raw_score_rw` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41738 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `raw_score_rw`
--

DROP TABLE IF EXISTS `raw_score_rw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raw_score_rw` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(10) DEFAULT NULL,
  `rw_score` varchar(45) DEFAULT NULL,
  `rw_quality` varchar(45) DEFAULT NULL,
  `rw_qualification` varchar(45) DEFAULT NULL,
  `rw_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_score_type_scrt_region_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_score_type_scrt_region_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `region_rgn`
--

DROP TABLE IF EXISTS `region_rgn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region_rgn` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(10) DEFAULT NULL,
  `rgn_name` varchar(45) NOT NULL,
  `rgn_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_region_rgn_country_ctr1_idx` (`ctr_id`),
  CONSTRAINT `fk_region_rgn_country_ctr1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `release`
--

DROP TABLE IF EXISTS `release`;
/*!50001 DROP VIEW IF EXISTS `release`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `release` (
  `reference_number` tinyint NOT NULL,
  `realease_instruction_number` tinyint NOT NULL,
  `previous_no` tinyint NOT NULL,
  `rl_date` tinyint NOT NULL,
  `Confirmed_By` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `release_instructions_rl`
--

DROP TABLE IF EXISTS `release_instructions_rl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `release_instructions_rl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trp_id` int(10) DEFAULT NULL,
  `rl_ref_no` varchar(45) DEFAULT NULL,
  `rl_no` varchar(45) DEFAULT NULL,
  `rl_date` date DEFAULT NULL,
  `rl_confirmedby` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `indx_trpl_id` (`trp_id`,`rl_ref_no`,`rl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=400 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Temporary table structure for view `sale_lots`
--

DROP TABLE IF EXISTS `sale_lots`;
/*!50001 DROP VIEW IF EXISTS `sale_lots`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sale_lots` (
  `id` tinyint NOT NULL,
  `slid` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `slctrid` tinyint NOT NULL,
  `ctrname` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `ml_name` tinyint NOT NULL,
  `region` tinyint NOT NULL,
  `wrid` tinyint NOT NULL,
  `warehouse` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `slrid` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `sl_margin` tinyint NOT NULL,
  `sltyp_id` tinyint NOT NULL,
  `greencomments` tinyint NOT NULL,
  `green` tinyint NOT NULL,
  `qualityParameterID` tinyint NOT NULL,
  `dnt` tinyint NOT NULL,
  `touch` tinyint NOT NULL,
  `prcss_name` tinyint NOT NULL,
  `qltyd_prcss_value` tinyint NOT NULL,
  `scr_name` tinyint NOT NULL,
  `qltyd_scr_value` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `cp_quality` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `rw_score` tinyint NOT NULL,
  `rw_quality` tinyint NOT NULL,
  `final_comments` tinyint NOT NULL,
  `cbid` tinyint NOT NULL,
  `cgid` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `auc_price` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `fobid` tinyint NOT NULL,
  `fobprice` tinyint NOT NULL,
  `invoice` tinyint NOT NULL,
  `inv_weight` tinyint NOT NULL,
  `invoice_date` tinyint NOT NULL,
  `invoice_confirmedby` tinyint NOT NULL,
  `py_no` tinyint NOT NULL,
  `payment` tinyint NOT NULL,
  `payment_date` tinyint NOT NULL,
  `payment_confirmedby` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `br_date` tinyint NOT NULL,
  `br_confirmedby` tinyint NOT NULL,
  `bsid` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `ibsid` tinyint NOT NULL,
  `ibscode` tinyint NOT NULL,
  `ibsquality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `warrant_date` tinyint NOT NULL,
  `war_comments` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `rl_no` tinyint NOT NULL,
  `rl_date` tinyint NOT NULL,
  `rl_confirmedby` tinyint NOT NULL,
  `trp_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sale_sl`
--

DROP TABLE IF EXISTS `sale_sl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_sl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(10) DEFAULT NULL,
  `csn_id` int(10) DEFAULT NULL,
  `cb_id` int(11) DEFAULT NULL,
  `sltyp_id` int(11) DEFAULT NULL,
  `sl_no` varchar(45) DEFAULT NULL,
  `sl_date` date DEFAULT NULL,
  `sl_hedge` decimal(10,3) DEFAULT NULL,
  `sl_margin` int(11) DEFAULT NULL,
  `sl_month` varchar(10) DEFAULT NULL,
  `sl_catalogue_confirmedby` varchar(45) DEFAULT NULL,
  `sl_quality_confirmedby` varchar(45) DEFAULT NULL,
  `sl_auction_confirmedby` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_sale_country_idx` (`ctr_id`),
  KEY `fk_coffee_season_idx` (`csn_id`),
  KEY `sl_no` (`sl_no`,`sltyp_id`),
  KEY `indx_multiple` (`cb_id`,`sltyp_id`,`sl_catalogue_confirmedby`,`sl_quality_confirmedby`,`sl_auction_confirmedby`),
  CONSTRAINT `fk_sale_country` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=665 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sale_status_sst`
--

DROP TABLE IF EXISTS `sale_status_sst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_status_sst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sst_name` varchar(45) DEFAULT NULL,
  `sst_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sale_type_sltyp`
--

DROP TABLE IF EXISTS `sale_type_sltyp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_type_sltyp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sltyp_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `sct_number` varchar(255) NOT NULL,
  `sct_description` varchar(255) DEFAULT NULL,
  `sct_packages` int(11) DEFAULT NULL,
  `sct_month` varchar(255) DEFAULT NULL,
  `sct_bulk_date` date DEFAULT NULL,
  `sct_disposal_date` date DEFAULT NULL,
  `sct_shipped` int(11) DEFAULT NULL,
  `bs_id` int(11) DEFAULT NULL,
  `sct_stuffed` int(11) DEFAULT NULL,
  `sct_packaging_method` int(11) DEFAULT NULL,
  `pkg_id` int(11) DEFAULT NULL,
  `yr_id` int(11) DEFAULT NULL,
  `sct_complemantary_condition` varchar(255) DEFAULT NULL,
  `sct_weight` int(11) DEFAULT NULL,
  `sct_approved_weight` int(11) DEFAULT NULL,
  `sct_start_date` date DEFAULT NULL,
  `sct_end_date` date DEFAULT NULL,
  `sct_date` date DEFAULT NULL,
  `sct_client_reference` varchar(255) DEFAULT NULL,
  `sct_user` int(11) DEFAULT NULL,
  `sct_updated_user` int(11) DEFAULT NULL,
  `sct_status` int(11) DEFAULT NULL,
  `pt_id` int(11) DEFAULT NULL,
  `bgs_id` int(11) DEFAULT NULL,
  `pu_id` int(11) DEFAULT NULL,
  `cf_id` int(11) DEFAULT NULL,
  `trm_id` int(11) DEFAULT NULL,
  `sct_cancelled` int(11) DEFAULT NULL,
  `sct_destination` varchar(45) DEFAULT NULL,
  `sct_price` int(11) DEFAULT NULL,
  `sct_bric_confirmed` int(11) DEFAULT NULL,
  `sct_shipment` int(11) DEFAULT NULL,
  `sct_coffee_type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sct_number_UNIQUE` (`sct_number`)
) ENGINE=InnoDB AUTO_INCREMENT=567 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `sales_contract_summary_per_month`
--

DROP TABLE IF EXISTS `sales_contract_summary_per_month`;
/*!50001 DROP VIEW IF EXISTS `sales_contract_summary_per_month`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sales_contract_summary_per_month` (
  `id` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `cl_id` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sct_description` tinyint NOT NULL,
  `actual_weight` tinyint NOT NULL,
  `stuffed` tinyint NOT NULL,
  `packages` tinyint NOT NULL,
  `yr_name` tinyint NOT NULL,
  `yearmonth` tinyint NOT NULL,
  `sct_month` tinyint NOT NULL,
  `mth_name` tinyint NOT NULL,
  `sct_bulk_date` tinyint NOT NULL,
  `sct_disposal_date` tinyint NOT NULL,
  `sct_shipped` tinyint NOT NULL,
  `bs_id` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `sct_stuffed` tinyint NOT NULL,
  `sct_packaging_method` tinyint NOT NULL,
  `pkg_id` tinyint NOT NULL,
  `yr_id` tinyint NOT NULL,
  `sct_complemantary_condition` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sales_contract_summary_per_month_prep`
--

DROP TABLE IF EXISTS `sales_contract_summary_per_month_prep`;
/*!50001 DROP VIEW IF EXISTS `sales_contract_summary_per_month_prep`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sales_contract_summary_per_month_prep` (
  `id` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `cl_id` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sct_description` tinyint NOT NULL,
  `packages` tinyint NOT NULL,
  `yr_name` tinyint NOT NULL,
  `yearmonth` tinyint NOT NULL,
  `sct_month` tinyint NOT NULL,
  `sct_start_date` tinyint NOT NULL,
  `mth_name` tinyint NOT NULL,
  `sct_bulk_date` tinyint NOT NULL,
  `sct_disposal_date` tinyint NOT NULL,
  `sct_shipped` tinyint NOT NULL,
  `bs_id` tinyint NOT NULL,
  `sct_stuffed` tinyint NOT NULL,
  `sct_packaging_method` tinyint NOT NULL,
  `pkg_id` tinyint NOT NULL,
  `yr_id` tinyint NOT NULL,
  `sct_complemantary_condition` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sales_contract_summary_view`
--

DROP TABLE IF EXISTS `sales_contract_summary_view`;
/*!50001 DROP VIEW IF EXISTS `sales_contract_summary_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sales_contract_summary_view` (
  `stid` tinyint NOT NULL,
  `sctid` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `sct_description` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `cl_name` tinyint NOT NULL,
  `sct_client_reference` tinyint NOT NULL,
  `sct_packages` tinyint NOT NULL,
  `contract_weight` tinyint NOT NULL,
  `sct_month` tinyint NOT NULL,
  `sct_start_date` tinyint NOT NULL,
  `sct_end_date` tinyint NOT NULL,
  `sct_date` tinyint NOT NULL,
  `stuffing_date` tinyint NOT NULL,
  `mth_name` tinyint NOT NULL,
  `year_name_new` tinyint NOT NULL,
  `mth_name_new` tinyint NOT NULL,
  `sct_disposal_date` tinyint NOT NULL,
  `pr_instruction_number` tinyint NOT NULL,
  `total_allocated` tinyint NOT NULL,
  `sct_complemantary_condition` tinyint NOT NULL,
  `stuffed_weight` tinyint NOT NULL,
  `stuffed_bags` tinyint NOT NULL,
  `stuffed_pockets` tinyint NOT NULL,
  `stuffed_packages` tinyint NOT NULL,
  `stuffed_tare` tinyint NOT NULL,
  `stuffed_gross_weight` tinyint NOT NULL,
  `packaging_method` tinyint NOT NULL,
  `pkg_name` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `user_created` tinyint NOT NULL,
  `user_updated` tinyint NOT NULL,
  `sct_cancelled` tinyint NOT NULL,
  `sct_destination` tinyint NOT NULL,
  `sct_bric_confirmed` tinyint NOT NULL,
  `sct_shipped` tinyint NOT NULL,
  `shipment` tinyint NOT NULL,
  `sct_approved_weight` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL,
  `wb_movement_permit` tinyint NOT NULL,
  `wb_vehicle_plate` tinyint NOT NULL,
  `wb_ticket` tinyint NOT NULL,
  `dp_number` tinyint NOT NULL,
  `dp_confirmed_by` tinyint NOT NULL,
  `dp_start` tinyint NOT NULL,
  `dp_end_date` tinyint NOT NULL,
  `wb_driver_name` tinyint NOT NULL,
  `wb_driver_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `screens_scr`
--

DROP TABLE IF EXISTS `screens_scr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screens_scr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `scr_name` varchar(45) DEFAULT NULL,
  `scr_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `seller_slr`
--

DROP TABLE IF EXISTS `seller_slr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seller_slr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `slr_id` int(11) DEFAULT NULL,
  `slr_code` int(11) DEFAULT NULL,
  `ctr_id` int(10) DEFAULT NULL,
  `slr_name` varchar(255) NOT NULL,
  `slr_initials` varchar(45) DEFAULT NULL,
  `slr_att` varchar(45) DEFAULT NULL,
  `slr_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_marketing_agent_ma_country_ctr1_idx` (`ctr_id`),
  CONSTRAINT `fk_marketing_agent_ma_country_ctr1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_multiple` (`st_id`,`br_id`,`stb_value`,`stb_weight`,`bs_id`,`ibs_id`,`stb_bulk_ratio`,`cb_id`,`cgr_id`,`prc_id`,`cn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=817734 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stock_location_combined`
--

DROP TABLE IF EXISTS `stock_location_combined`;
/*!50001 DROP VIEW IF EXISTS `stock_location_combined`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stock_location_combined` (
  `stid` tinyint NOT NULL,
  `prc_id` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_name` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `location` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stock_location_combined_all`
--

DROP TABLE IF EXISTS `stock_location_combined_all`;
/*!50001 DROP VIEW IF EXISTS `stock_location_combined_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stock_location_combined_all` (
  `stid` tinyint NOT NULL,
  `btid` tinyint NOT NULL,
  `btc_prev_id` tinyint NOT NULL,
  `slocid` tinyint NOT NULL,
  `prc_id` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_name` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `btc_ended_by` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `reason` tinyint NOT NULL,
  `insloc_ref` tinyint NOT NULL,
  `mit_name` tinyint NOT NULL,
  `created_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=20141 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stock_locations`
--

DROP TABLE IF EXISTS `stock_locations`;
/*!50001 DROP VIEW IF EXISTS `stock_locations`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stock_locations` (
  `id` tinyint NOT NULL,
  `slocid` tinyint NOT NULL,
  `btc_number` tinyint NOT NULL,
  `btc_instructed_by` tinyint NOT NULL,
  `stid` tinyint NOT NULL,
  `prc_id` tinyint NOT NULL,
  `gr_id` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_tare` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_name` tinyint NOT NULL,
  `btc_weight` tinyint NOT NULL,
  `btc_bags` tinyint NOT NULL,
  `btc_pockets` tinyint NOT NULL,
  `btc_tare` tinyint NOT NULL,
  `btc_net_weight` tinyint NOT NULL,
  `btc_packages` tinyint NOT NULL,
  `wrid` tinyint NOT NULL,
  `loc_rowid` tinyint NOT NULL,
  `loc_columnid` tinyint NOT NULL,
  `loc_row` tinyint NOT NULL,
  `loc_column` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `new_loc_row` tinyint NOT NULL,
  `new_loc_column` tinyint NOT NULL,
  `new_zone` tinyint NOT NULL,
  `new_wr_name` tinyint NOT NULL,
  `new_location` tinyint NOT NULL,
  `reason` tinyint NOT NULL,
  `insloc_ref` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `mit_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stock_locations_all`
--

DROP TABLE IF EXISTS `stock_locations_all`;
/*!50001 DROP VIEW IF EXISTS `stock_locations_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stock_locations_all` (
  `id` tinyint NOT NULL,
  `btc_prev_id` tinyint NOT NULL,
  `slocid` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `btc_number` tinyint NOT NULL,
  `btc_instructed_by` tinyint NOT NULL,
  `btc_ended_by` tinyint NOT NULL,
  `stid` tinyint NOT NULL,
  `prc_id` tinyint NOT NULL,
  `gr_id` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `st_tare` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_name` tinyint NOT NULL,
  `btc_weight` tinyint NOT NULL,
  `btc_bags` tinyint NOT NULL,
  `btc_pockets` tinyint NOT NULL,
  `loc_row` tinyint NOT NULL,
  `loc_column` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `new_location` tinyint NOT NULL,
  `reason` tinyint NOT NULL,
  `insloc_ref` tinyint NOT NULL,
  `mit_name` tinyint NOT NULL,
  `created_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `stock_locations_history_slh`
--

DROP TABLE IF EXISTS `stock_locations_history_slh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_locations_history_slh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stid` int(11) DEFAULT NULL,
  `prc_id` int(11) DEFAULT NULL,
  `st_dispatch_net` int(11) DEFAULT NULL,
  `st_gross` int(11) DEFAULT NULL,
  `st_moisture` int(11) DEFAULT NULL,
  `pkg_name` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `bags` int(11) DEFAULT NULL,
  `pockets` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inx_stid` (`stid`,`prc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16384 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `sqltyd_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `st_id` (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2381 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stock_received`
--

DROP TABLE IF EXISTS `stock_received`;
/*!50001 DROP VIEW IF EXISTS `stock_received`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stock_received` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `Status` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `processtype` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `reference_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `pall_allocated_weight` tinyint NOT NULL,
  `pall_ratios` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `pending_process_all` tinyint NOT NULL,
  `pending_process_id` tinyint NOT NULL,
  `additional_processed` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `grn_weight` tinyint NOT NULL,
  `pr_confirmed_by` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `month` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stock_reconcilliation`
--

DROP TABLE IF EXISTS `stock_reconcilliation`;
/*!50001 DROP VIEW IF EXISTS `stock_reconcilliation`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stock_reconcilliation` (
  `code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `purchased` tinyint NOT NULL,
  `arrival_loss_gain` tinyint NOT NULL,
  `process_loss_gain` tinyint NOT NULL,
  `shipped` tinyint NOT NULL,
  `actual` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
  `st_outturn` varchar(45) DEFAULT NULL,
  `st_mark` varchar(255) DEFAULT NULL,
  `st_name` varchar(45) DEFAULT NULL,
  `prc_id` int(11) DEFAULT NULL,
  `sts_id` int(11) NOT NULL DEFAULT '1',
  `pr_id` int(11) DEFAULT NULL,
  `gr_id` varchar(45) DEFAULT NULL,
  `st_ref_id` int(11) DEFAULT NULL,
  `st_dispatch_net` int(11) DEFAULT NULL,
  `st_gross` int(11) DEFAULT NULL,
  `st_tare` decimal(18,2) DEFAULT NULL,
  `st_moisture` decimal(18,2) DEFAULT NULL,
  `st_dispatch_date` date DEFAULT NULL,
  `st_net_weight` int(11) DEFAULT NULL,
  `st_packages` int(11) DEFAULT NULL,
  `st_bags` int(11) DEFAULT NULL,
  `st_pockets` int(11) DEFAULT NULL,
  `pkg_id` int(11) DEFAULT NULL,
  `cgrad_id` int(10) DEFAULT NULL,
  `prt_id` int(11) DEFAULT NULL,
  `bs_id` int(10) DEFAULT NULL,
  `ibs_id` int(11) DEFAULT NULL,
  `prc_price` decimal(18,10) DEFAULT NULL,
  `st_price` decimal(18,10) DEFAULT NULL,
  `st_value` decimal(18,10) DEFAULT NULL,
  `st_bric_value` decimal(18,10) DEFAULT NULL,
  `st_hedge` decimal(18,10) DEFAULT NULL,
  `st_diff` decimal(18,10) DEFAULT NULL,
  `br_id` int(10) DEFAULT NULL,
  `sl_id` int(10) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `st_ended_by` int(11) DEFAULT NULL,
  `st_quality_check` int(11) DEFAULT NULL,
  `st_rejected` varchar(45) DEFAULT NULL,
  `st_credited` int(11) DEFAULT NULL,
  `st_weight_check` int(11) DEFAULT NULL,
  `st_additional_processed` int(11) DEFAULT NULL,
  `st_partial_delivery` int(11) DEFAULT NULL,
  `sct_id` int(11) DEFAULT NULL,
  `st_disposed_by` int(11) DEFAULT NULL,
  `st_package_status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`gr_id`),
  KEY `index3` (`csn_id`),
  KEY `pr_id_idx` (`pr_id`),
  KEY `pr_id_idx11` (`pr_id`),
  KEY `prc_id_idx` (`prc_id`),
  KEY `fk_bs_id_st_idx` (`bs_id`),
  KEY `inx_outturn` (`st_outturn`),
  CONSTRAINT `prc_id` FOREIGN KEY (`prc_id`) REFERENCES `purchases_prc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9758 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stock_status_sts`
--

DROP TABLE IF EXISTS `stock_status_sts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_status_sts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sts_name` varchar(45) DEFAULT NULL,
  `sts_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stock_warehouse`
--

DROP TABLE IF EXISTS `stock_warehouse`;
/*!50001 DROP VIEW IF EXISTS `stock_warehouse`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stock_warehouse` (
  `slocid` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `st_id` tinyint NOT NULL,
  `wr_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockbreackdown`
--

DROP TABLE IF EXISTS `stockbreackdown`;
/*!50001 DROP VIEW IF EXISTS `stockbreackdown`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockbreackdown` (
  `id` tinyint NOT NULL,
  `stb_value` tinyint NOT NULL,
  `cgr_id` tinyint NOT NULL,
  `cb_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockmovement`
--

DROP TABLE IF EXISTS `stockmovement`;
/*!50001 DROP VIEW IF EXISTS `stockmovement`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockmovement` (
  `id` tinyint NOT NULL,
  `btid` tinyint NOT NULL,
  `btc_prev_id` tinyint NOT NULL,
  `slocid` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `loc_row` tinyint NOT NULL,
  `loc_column` tinyint NOT NULL,
  `btc_zone` tinyint NOT NULL,
  `previous_location` tinyint NOT NULL,
  `reason` tinyint NOT NULL,
  `insloc_ref` tinyint NOT NULL,
  `mit_name` tinyint NOT NULL,
  `btc_ended_by` tinyint NOT NULL,
  `movement_status` tinyint NOT NULL,
  `created_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockprocessedview`
--

DROP TABLE IF EXISTS `stockprocessedview`;
/*!50001 DROP VIEW IF EXISTS `stockprocessedview`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockprocessedview` (
  `id` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockprocessedview_all`
--

DROP TABLE IF EXISTS `stockprocessedview_all`;
/*!50001 DROP VIEW IF EXISTS `stockprocessedview_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockprocessedview_all` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `processtype` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `results_id` tinyint NOT NULL,
  `results_name` tinyint NOT NULL,
  `reference_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `original_weight` tinyint NOT NULL,
  `processed_weight` tinyint NOT NULL,
  `process_results_weight` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `pall_allocated_weight` tinyint NOT NULL,
  `pall_ratios` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `pending_process_all` tinyint NOT NULL,
  `additional_processed` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `grn_weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stocks_and_purchased`
--

DROP TABLE IF EXISTS `stocks_and_purchased`;
/*!50001 DROP VIEW IF EXISTS `stocks_and_purchased`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stocks_and_purchased` (
  `id` tinyint NOT NULL,
  `stock_id` tinyint NOT NULL,
  `slid` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `slr_name` tinyint NOT NULL,
  `prompt_date` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `csn_id` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `prt_name` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `packages` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `cbid` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `auc_price` tinyint NOT NULL,
  `bric` tinyint NOT NULL,
  `br_date` tinyint NOT NULL,
  `bsid` tinyint NOT NULL,
  `bric_code` tinyint NOT NULL,
  `bric_quality` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `rl_no` tinyint NOT NULL,
  `rl_date` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `bric_value` tinyint NOT NULL,
  `bric_differential` tinyint NOT NULL,
  `st_moisture` tinyint NOT NULL,
  `pkg_id` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `st_gross` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `slrid` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `purchase_date` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `prp_name` tinyint NOT NULL,
  `sct_start_date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stocks_storage_count`
--

DROP TABLE IF EXISTS `stocks_storage_count`;
/*!50001 DROP VIEW IF EXISTS `stocks_storage_count`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stocks_storage_count` (
  `id` tinyint NOT NULL,
  `cfdid` tinyint NOT NULL,
  `bs_Code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `ibs_code` tinyint NOT NULL,
  `ibs_quality` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `cgrad_name` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `current_weight` tinyint NOT NULL,
  `storage` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `br_diffrential` tinyint NOT NULL,
  `sl_hedge` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stocks_summary`
--

DROP TABLE IF EXISTS `stocks_summary`;
/*!50001 DROP VIEW IF EXISTS `stocks_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stocks_summary` (
  `weight` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `storage` tinyint NOT NULL,
  `count` tinyint NOT NULL,
  `average_storage` tinyint NOT NULL,
  `value` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `stocks_summary_ssm`
--

DROP TABLE IF EXISTS `stocks_summary_ssm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks_summary_ssm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_name` varchar(45) DEFAULT NULL,
  `ssm_buyer` varchar(45) DEFAULT NULL,
  `ssm_weight` int(11) DEFAULT NULL,
  `ssm_storage` int(11) DEFAULT NULL,
  `ssm_count` int(11) DEFAULT NULL,
  `ssm_average_storage` int(11) DEFAULT NULL,
  `ssm_value` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93728 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stockview`
--

DROP TABLE IF EXISTS `stockview`;
/*!50001 DROP VIEW IF EXISTS `stockview`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockview` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `prcssresultsid` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockview_all`
--

DROP TABLE IF EXISTS `stockview_all`;
/*!50001 DROP VIEW IF EXISTS `stockview_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockview_all` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `Status` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `processtype` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `reference_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `net_weight` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `pall_allocated_weight` tinyint NOT NULL,
  `pall_ratios` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `pending_process_all` tinyint NOT NULL,
  `pending_process_id` tinyint NOT NULL,
  `additional_processed` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `grn_weight` tinyint NOT NULL,
  `pr_confirmed_by` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `pbk_instruction_number` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockview_all_backup`
--

DROP TABLE IF EXISTS `stockview_all_backup`;
/*!50001 DROP VIEW IF EXISTS `stockview_all_backup`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockview_all_backup` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `Status` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `processtype` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `reference_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `pall_allocated_weight` tinyint NOT NULL,
  `pall_ratios` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `pending_process_all` tinyint NOT NULL,
  `pending_process_id` tinyint NOT NULL,
  `additional_processed` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `grn_weight` tinyint NOT NULL,
  `pr_confirmed_by` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `month` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockview_all_locations`
--

DROP TABLE IF EXISTS `stockview_all_locations`;
/*!50001 DROP VIEW IF EXISTS `stockview_all_locations`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockview_all_locations` (
  `id` tinyint NOT NULL,
  `slocid` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `reason` tinyint NOT NULL,
  `insloc_ref` tinyint NOT NULL,
  `mit_name` tinyint NOT NULL,
  `created_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stockview_stuffed`
--

DROP TABLE IF EXISTS `stockview_stuffed`;
/*!50001 DROP VIEW IF EXISTS `stockview_stuffed`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockview_stuffed` (
  `id` tinyint NOT NULL,
  `gr_number` tinyint NOT NULL,
  `sts_id` tinyint NOT NULL,
  `Status` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `processtype` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `process_number` tinyint NOT NULL,
  `reference_number` tinyint NOT NULL,
  `prcid` tinyint NOT NULL,
  `prcssid` tinyint NOT NULL,
  `net_weight` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `bags` tinyint NOT NULL,
  `pockets` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `csn_season` tinyint NOT NULL,
  `lot` tinyint NOT NULL,
  `outturn` tinyint NOT NULL,
  `mark` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `seller` tinyint NOT NULL,
  `cg_name` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `warehouse_from` tinyint NOT NULL,
  `grade` tinyint NOT NULL,
  `ott_weight` tinyint NOT NULL,
  `ott_bags` tinyint NOT NULL,
  `ott_pockets` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `differential` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `code` tinyint NOT NULL,
  `quality` tinyint NOT NULL,
  `warrant_no` tinyint NOT NULL,
  `cert` tinyint NOT NULL,
  `ended` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `pall_allocated_weight` tinyint NOT NULL,
  `pall_ratios` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `prcssid_all` tinyint NOT NULL,
  `pending_process_all` tinyint NOT NULL,
  `pending_process_id` tinyint NOT NULL,
  `additional_processed` tinyint NOT NULL,
  `cp_score` tinyint NOT NULL,
  `acidity` tinyint NOT NULL,
  `body` tinyint NOT NULL,
  `flavour` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `warrant_weight` tinyint NOT NULL,
  `st_dispatch_net` tinyint NOT NULL,
  `grn_weight` tinyint NOT NULL,
  `pr_confirmed_by` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `pbk_instruction_number` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `stuffing_stff`
--

DROP TABLE IF EXISTS `stuffing_stff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuffing_stff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sct_id` int(11) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
  `stff_weight_note` varchar(45) DEFAULT NULL,
  `wb_id` int(11) DEFAULT NULL,
  `shpr_id` int(11) DEFAULT NULL,
  `stff_weight` int(11) DEFAULT NULL,
  `stff_date` varchar(45) DEFAULT NULL,
  `stff_container` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fx_st` (`sct_id`,`st_id`,`wb_id`,`shpr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=734 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stuffing_summary`
--

DROP TABLE IF EXISTS `stuffing_summary`;
/*!50001 DROP VIEW IF EXISTS `stuffing_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stuffing_summary` (
  `cb_name` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `year` tinyint NOT NULL,
  `stuffing_date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `stuffing_summary_per_instruction`
--

DROP TABLE IF EXISTS `stuffing_summary_per_instruction`;
/*!50001 DROP VIEW IF EXISTS `stuffing_summary_per_instruction`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stuffing_summary_per_instruction` (
  `st_outturn` tinyint NOT NULL,
  `cb_name` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `month` tinyint NOT NULL,
  `year` tinyint NOT NULL,
  `stuffing_date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `stuffing_summary_stsm`
--

DROP TABLE IF EXISTS `stuffing_summary_stsm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuffing_summary_stsm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stsm_buyer` varchar(45) DEFAULT NULL,
  `stsm_year` int(11) DEFAULT NULL,
  `stsm_month` varchar(45) DEFAULT NULL,
  `stsm_weight` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=167868 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `stuffingview`
--

DROP TABLE IF EXISTS `stuffingview`;
/*!50001 DROP VIEW IF EXISTS `stuffingview`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stuffingview` (
  `id` tinyint NOT NULL,
  `st_id` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `stff_weight_note` tinyint NOT NULL,
  `sct_number` tinyint NOT NULL,
  `wb_id` tinyint NOT NULL,
  `wb_ticket` tinyint NOT NULL,
  `shpr_id` tinyint NOT NULL,
  `stff_weight` tinyint NOT NULL,
  `stff_date` tinyint NOT NULL,
  `stff_container` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_bric_process_results`
--

DROP TABLE IF EXISTS `sum_bric_process_results`;
/*!50001 DROP VIEW IF EXISTS `sum_bric_process_results`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_bric_process_results` (
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_bric_summary`
--

DROP TABLE IF EXISTS `sum_bric_summary`;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_bric_summary` (
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `rounded_weight` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `diff` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_bric_summary_arrival`
--

DROP TABLE IF EXISTS `sum_bric_summary_arrival`;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_arrival`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_bric_summary_arrival` (
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_bric_summary_purchased`
--

DROP TABLE IF EXISTS `sum_bric_summary_purchased`;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_purchased`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_bric_summary_purchased` (
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_bric_summary_stuffed`
--

DROP TABLE IF EXISTS `sum_bric_summary_stuffed`;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_stuffed`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_bric_summary_stuffed` (
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_bric_summary_working_progress`
--

DROP TABLE IF EXISTS `sum_bric_summary_working_progress`;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_working_progress`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_bric_summary_working_progress` (
  `br_no` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_of_sales_contract`
--

DROP TABLE IF EXISTS `sum_of_sales_contract`;
/*!50001 DROP VIEW IF EXISTS `sum_of_sales_contract`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_of_sales_contract` (
  `sct_number` tinyint NOT NULL,
  `br_no` tinyint NOT NULL,
  `st_outturn` tinyint NOT NULL,
  `total_allocated` tinyint NOT NULL,
  `total_stuffed` tinyint NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_process_allocation`
--

DROP TABLE IF EXISTS `sum_process_allocation`;
/*!50001 DROP VIEW IF EXISTS `sum_process_allocation`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_process_allocation` (
  `pr_id` tinyint NOT NULL,
  `instruction_number` tinyint NOT NULL,
  `reference_name` tinyint NOT NULL,
  `other_instructions` tinyint NOT NULL,
  `supervisor` tinyint NOT NULL,
  `tags` tinyint NOT NULL,
  `allocated_weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_code_view`
--

DROP TABLE IF EXISTS `sum_stock_code_view`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_code_view` (
  `code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `rounded_weight` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `diff` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_code_view_arrival`
--

DROP TABLE IF EXISTS `sum_stock_code_view_arrival`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_arrival`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_code_view_arrival` (
  `code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_code_view_process_results`
--

DROP TABLE IF EXISTS `sum_stock_code_view_process_results`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_process_results`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_code_view_process_results` (
  `code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_code_view_purchased`
--

DROP TABLE IF EXISTS `sum_stock_code_view_purchased`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_purchased`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_code_view_purchased` (
  `code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_code_view_stuffed`
--

DROP TABLE IF EXISTS `sum_stock_code_view_stuffed`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_stuffed`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_code_view_stuffed` (
  `code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_code_view_working_progress`
--

DROP TABLE IF EXISTS `sum_stock_code_view_working_progress`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_working_progress`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_code_view_working_progress` (
  `code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_internal_code_view`
--

DROP TABLE IF EXISTS `sum_stock_internal_code_view`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_internal_code_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_internal_code_view` (
  `code` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `ibs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL,
  `rounded_weight` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `hedge` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `diff` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_internal_code_view_working_progress`
--

DROP TABLE IF EXISTS `sum_stock_internal_code_view_working_progress`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_internal_code_view_working_progress`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_internal_code_view_working_progress` (
  `code` tinyint NOT NULL,
  `bs_code` tinyint NOT NULL,
  `bs_quality` tinyint NOT NULL,
  `ibs_quality` tinyint NOT NULL,
  `weight` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stock_item_count`
--

DROP TABLE IF EXISTS `sum_stock_item_count`;
/*!50001 DROP VIEW IF EXISTS `sum_stock_item_count`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stock_item_count` (
  `wr_name` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `storage` tinyint NOT NULL,
  `count` tinyint NOT NULL,
  `average_storage` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_stuffed_and_weighbridge`
--

DROP TABLE IF EXISTS `sum_stuffed_and_weighbridge`;
/*!50001 DROP VIEW IF EXISTS `sum_stuffed_and_weighbridge`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_stuffed_and_weighbridge` (
  `id` tinyint NOT NULL,
  `st_id` tinyint NOT NULL,
  `wb_id` tinyint NOT NULL,
  `sct_id` tinyint NOT NULL,
  `stff_date` tinyint NOT NULL,
  `stuffed_weight` tinyint NOT NULL,
  `wb_weight_out` tinyint NOT NULL,
  `wb_weight_in` tinyint NOT NULL,
  `weighbridge_weight_difference` tinyint NOT NULL,
  `wb_movement_permit` tinyint NOT NULL,
  `wb_vehicle_plate` tinyint NOT NULL,
  `wb_ticket` tinyint NOT NULL,
  `wb_driver_name` tinyint NOT NULL,
  `wb_driver_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `sum_warehouse_total`
--

DROP TABLE IF EXISTS `sum_warehouse_total`;
/*!50001 DROP VIEW IF EXISTS `sum_warehouse_total`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sum_warehouse_total` (
  `weight` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `buyer` tinyint NOT NULL,
  `value` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
-- Temporary table structure for view `tel_extensions`
--

DROP TABLE IF EXISTS `tel_extensions`;
/*!50001 DROP VIEW IF EXISTS `tel_extensions`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `tel_extensions` (
  `id` tinyint NOT NULL,
  `dprt_name` tinyint NOT NULL,
  `per_fname` tinyint NOT NULL,
  `per_sname` tinyint NOT NULL,
  `per_extension` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `temp_sale_lots`
--

DROP TABLE IF EXISTS `temp_sale_lots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_sale_lots` (
  `id` int(10) NOT NULL DEFAULT '0',
  `slid` int(10) DEFAULT NULL,
  `sale` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `slctrid` int(10) DEFAULT NULL,
  `prompt_date` date DEFAULT NULL,
  `csn_season` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ml_name` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `wrid` int(10) DEFAULT NULL,
  `warehouse` varchar(45) DEFAULT NULL,
  `lot` int(10) DEFAULT NULL,
  `outturn` varchar(45) DEFAULT NULL,
  `slrid` int(10) DEFAULT '0',
  `seller` varchar(45) DEFAULT NULL,
  `mark` varchar(45) DEFAULT NULL,
  `grade` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `bags` int(10) DEFAULT NULL,
  `pockets` int(10) DEFAULT NULL,
  `cert` text CHARACTER SET utf8,
  `hedge` decimal(10,3) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `greencomments` varchar(7) CHARACTER SET utf8 NOT NULL,
  `green` text CHARACTER SET utf8,
  `dnt` int(1) unsigned zerofill DEFAULT '0',
  `touch` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `prcss_name` varchar(45) DEFAULT NULL,
  `qltyd_prcss_value` int(10) DEFAULT NULL,
  `scr_name` varchar(45) DEFAULT NULL,
  `qltyd_scr_value` int(10) DEFAULT NULL,
  `cp_quality` varchar(45) DEFAULT NULL,
  `rw_quality` varchar(45) DEFAULT NULL,
  `final_comments` varchar(255) DEFAULT NULL,
  `cbid` int(11) DEFAULT '0',
  `buyer` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prcid` int(11) DEFAULT '0',
  `auc_price` decimal(18,2) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `invoice` varchar(45) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_confirmedby` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `py_no` varchar(45) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_confirmedby` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bric` varchar(45) DEFAULT NULL,
  `br_date` date DEFAULT NULL,
  `br_confirmedby` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bsid` int(10) DEFAULT '0',
  `code` varchar(45) DEFAULT NULL,
  `quality` varchar(45) DEFAULT NULL,
  `warrant_no` varchar(45) DEFAULT NULL,
  `warrant_weight` int(11) DEFAULT NULL,
  `warrant_date` date DEFAULT NULL,
  `war_comments` varchar(45) DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `rl_no` varchar(45) DEFAULT NULL,
  `rl_date` date DEFAULT NULL,
  `rl_confirmedby` int(11) DEFAULT NULL,
  `trp_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `thresholds_th`
--

DROP TABLE IF EXISTS `thresholds_th`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thresholds_th` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(11) DEFAULT NULL,
  `th_name` varchar(45) DEFAULT NULL,
  `th_percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trading_months_trm`
--

DROP TABLE IF EXISTS `trading_months_trm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trading_months_trm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trm_month` varchar(45) DEFAULT NULL,
  `trm_code` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `transporters_trp`
--

DROP TABLE IF EXISTS `transporters_trp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transporters_trp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctr_id` int(10) DEFAULT NULL,
  `trp_name` varchar(45) NOT NULL,
  `trp_initials` varchar(45) DEFAULT NULL,
  `trp_description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_trp_country_rgn1_idx` (`ctr_id`),
  CONSTRAINT `fk_trp_country_rgn1` FOREIGN KEY (`ctr_id`) REFERENCES `country_ctr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vessel_details_vd`
--

DROP TABLE IF EXISTS `vessel_details_vd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vessel_details_vd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sct_id` varchar(45) DEFAULT NULL,
  `vd_name` varchar(45) DEFAULT NULL,
  `vd_mark` varchar(45) DEFAULT NULL,
  `vd_ship_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warehoue_type_wrt`
--

DROP TABLE IF EXISTS `warehoue_type_wrt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehoue_type_wrt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wrt_name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warehouse_wr`
--

DROP TABLE IF EXISTS `warehouse_wr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_wr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rgn_id` int(10) DEFAULT NULL,
  `wrt_id` int(10) DEFAULT NULL,
  `wr_name` varchar(45) NOT NULL,
  `wr_initials` varchar(45) DEFAULT NULL,
  `wr_description` varchar(45) DEFAULT NULL,
  `wr_att` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_wr_region_rgn1_idx` (`rgn_id`),
  CONSTRAINT `fk_warehouse_wr_region_rgn1` FOREIGN KEY (`rgn_id`) REFERENCES `region_rgn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `warehouses_region`
--

DROP TABLE IF EXISTS `warehouses_region`;
/*!50001 DROP VIEW IF EXISTS `warehouses_region`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `warehouses_region` (
  `wrid` tinyint NOT NULL,
  `rgnid` tinyint NOT NULL,
  `ctr_id` tinyint NOT NULL,
  `rgn_name` tinyint NOT NULL,
  `rgn_description` tinyint NOT NULL,
  `wr_name` tinyint NOT NULL,
  `wrt_id` tinyint NOT NULL,
  `wr_initials` tinyint NOT NULL,
  `wr_description` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `warrants_war`
--

DROP TABLE IF EXISTS `warrants_war`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warrants_war` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `war_no` varchar(45) DEFAULT NULL,
  `war_date` date DEFAULT NULL,
  `war_weight` int(11) DEFAULT NULL,
  `war_confirmedby` varchar(45) DEFAULT NULL,
  `war_comments` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7051 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `wb_ticket` varchar(45) DEFAULT NULL,
  `wb_delivery_number` varchar(45) DEFAULT NULL,
  `wb_vehicle_plate` varchar(45) DEFAULT NULL,
  `wb_weight_in` int(11) DEFAULT NULL,
  `wb_weight_out` int(11) DEFAULT NULL,
  `wb_confirmedby` int(11) DEFAULT NULL,
  `wb_time_in` timestamp NULL DEFAULT NULL,
  `wb_time_out` timestamp NULL DEFAULT NULL,
  `wb_movement_permit` varchar(45) DEFAULT NULL,
  `wb_driver_name` varchar(45) DEFAULT NULL,
  `wb_driver_id` varchar(45) DEFAULT NULL,
  `wb_dispatch_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=890 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `weight_scales_ws`
--

DROP TABLE IF EXISTS `weight_scales_ws`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weight_scales_ws` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wr_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `years_yr`
--

DROP TABLE IF EXISTS `years_yr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `years_yr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yr_name` varchar(45) DEFAULT NULL,
  `yr_number` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'ibero_db'
--
/*!50003 DROP PROCEDURE IF EXISTS `a_r_d` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `call_all_returns` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `c_a_r` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `getConfirmedSales` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `g_c_s` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `long_short_unallocated_months_internal_procedure` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`ngeatpmfkdb`@`localhost` PROCEDURE `long_short_unallocated_months_internal_procedure`()
BEGIN
set  group_concat_max_len = 104000;
SET @sql = NULL;
SELECT
    GROUP_CONCAT(DISTINCT
    CONCAT('MAX(CASE WHEN b.id = ', id ,' THEN b.bags END) AS ', CONCAT('`', mth_name,'_', yr_name, '_', id,  '`'))
    ) INTO @sql
FROM sales_contract_summary_per_month;

SET @sql = CONCAT('SELECT a.ibs_code as code , a.ibs_code as long_code,a.ibs_quality as bs_quality, ', @sql, ' 
                   FROM internal_basket_ibs a
                   LEFT JOIN sales_contract_summary_per_month b 
                         ON a.ibs_code = b.bs_code
                   GROUP   BY a.id, a.ibs_code order by a.ibs_code ' );

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `long_short_unallocated_months_procedure` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`ngeatpmfkdb`@`localhost` PROCEDURE `long_short_unallocated_months_procedure`()
BEGIN
set  group_concat_max_len = 104000;
SET @sql = NULL;
SELECT
    GROUP_CONCAT(DISTINCT
    CONCAT('MAX(CASE WHEN b.id = ', id ,' THEN b.bags END) AS ', CONCAT('`', mth_name,'_', yr_name, '_', id,  '`'))
    ) INTO @sql
FROM sales_contract_summary_per_month;

SET @sql = CONCAT('SELECT a.bs_code as code , a.bs_code as long_code,a.bs_quality, ', @sql, ' 
                   FROM basket_bs a
                   LEFT JOIN sales_contract_summary_per_month b 
                         ON a.id = b.bs_id
                   GROUP   BY a.id, a.bs_code order by a.bs_code ' );

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `r2g` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `return_to_grower_grn` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_auctionreport` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_auctionreport_dated` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_return_to_grower` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_stock` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_stock_period` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_stock_revised` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `stock_balances` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sys_dated` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `_a_r` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `_sys_a` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `_sys_c` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `_s_b` */;
ALTER DATABASE `ibero_db` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
ALTER DATABASE `ibero_db` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

--
-- Final view structure for view `activities`
--

/*!50001 DROP TABLE IF EXISTS `activities`*/;
/*!50001 DROP VIEW IF EXISTS `activities`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `activities` AS select `log`.`id` AS `id`,`usr`.`usr_name` AS `usr_name`,substring_index(`log`.`text`,' ',1) AS `operation`,`log`.`text` AS `changes`,`log`.`ip_address` AS `ip_address`,`log`.`created_at` AS `created_at` from (`activity_log` `log` left join `users_usr` `usr` on((`usr`.`id` = `log`.`user_id`))) order by `log`.`id` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `allocationview`
--

/*!50001 DROP TABLE IF EXISTS `allocationview`*/;
/*!50001 DROP VIEW IF EXISTS `allocationview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `allocationview` AS select `cfd`.`id` AS `id`,`cfd`.`sl_id` AS `slid`,`st`.`id` AS `stid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `slctrid`,(`sl`.`sl_date` + interval 7 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`ml`.`ml_name` AS `ml_name`,`wrgn`.`rgn_name` AS `region`,`wrgn`.`wrid` AS `wrid`,`wrgn`.`wr_name` AS `warehouse`,`cfd`.`cfd_lot_no` AS `lot`,`cfd`.`cfd_outturn` AS `outturn`,`slr`.`id` AS `slrid`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,`cgrad`.`cgrad_name` AS `grade`,`cfd`.`cfd_weight` AS `weight`,`cfd`.`cfd_bags` AS `bags`,`cfd`.`cfd_pockets` AS `pockets`,`crt`.`crt_name` AS `cert`,`sl`.`sl_hedge` AS `hedge`,`sl`.`sl_month` AS `month`,if((`grcm`.`id` is not null),'Set','Not Set') AS `greencomments`,`grn`.`qp_parameter` AS `green`,`cfd`.`cfd_dnt` AS `dnt`,if((`cfd`.`cfd_dnt` = 1),'DNT',NULL) AS `touch`,`prcss`.`prcss_name` AS `prcss_name`,`qltyd`.`qltyd_prcss_value` AS `qltyd_prcss_value`,`scr`.`scr_name` AS `scr_name`,`qltyd`.`qltyd_scr_value` AS `qltyd_scr_value`,`cp`.`cp_quality` AS `cp_quality`,`rw`.`rw_quality` AS `rw_quality`,`qltyd`.`qltyd_comments` AS `final_comments`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`prc`.`prc_confirmed_price` AS `price`,`inv`.`inv_no` AS `invoice`,`inv`.`inv_date` AS `invoice_date`,`inv_usr`.`usr_name` AS `invoice_confirmedby`,`py`.`py_no` AS `py_no`,`py`.`py_amount` AS `payment`,`py`.`py_date` AS `payment_date`,`py_usr`.`usr_name` AS `payment_confirmedby`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`br_usr`.`usr_name` AS `br_confirmedby`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`war`.`war_no` AS `warrant_no`,`war`.`war_weight` AS `warrant_weight`,`war`.`war_date` AS `warrant_date`,`war`.`war_comments` AS `war_comments`,`sst`.`sst_name` AS `status`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,`rl`.`rl_confirmedby` AS `rl_confirmedby`,`trp`.`trp_name` AS `trp_name` from ((((((((((((((((((((((((((((`sale_sl` `sl` left join `coffee_details_cfd` `cfd` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `certifications` `crt` on((`crt`.`cfdid` = `cfd`.`id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `green` `grn` on((`grn`.`cfdid` = `cfd`.`id`))) left join `purchases_prc` `prc` on((`prc`.`cfd_id` = `cfd`.`id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) where (`sl`.`sltyp_id` = 1) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn` union select `cfd`.`id` AS `id`,`cfd`.`sl_id` AS `slid`,`st`.`id` AS `stid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `slctrid`,(`sl`.`sl_date` + interval 7 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`ml`.`ml_name` AS `ml_name`,`wrgn`.`rgn_name` AS `region`,`wrgn`.`wrid` AS `wrid`,`wrgn`.`wr_name` AS `warehouse`,`cfd`.`cfd_lot_no` AS `lot`,`cfd`.`cfd_outturn` AS `outturn`,`slr`.`id` AS `slrid`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,`cgrad`.`cgrad_name` AS `grade`,`cfd`.`cfd_weight` AS `weight`,`cfd`.`cfd_bags` AS `bags`,`cfd`.`cfd_pockets` AS `pockets`,`crt`.`crt_name` AS `cert`,`sl`.`sl_hedge` AS `hedge`,`sl`.`sl_month` AS `month`,if((`grcm`.`id` is not null),'Set','Not Set') AS `greencomments`,`grn`.`qp_parameter` AS `green`,`cfd`.`cfd_dnt` AS `dnt`,if((`cfd`.`cfd_dnt` = 1),'DNT',NULL) AS `touch`,`prcss`.`prcss_name` AS `prcss_name`,`qltyd`.`qltyd_prcss_value` AS `qltyd_prcss_value`,`scr`.`scr_name` AS `scr_name`,`qltyd`.`qltyd_scr_value` AS `qltyd_scr_value`,`cp`.`cp_quality` AS `cp_quality`,`rw`.`rw_quality` AS `rw_quality`,`qltyd`.`qltyd_comments` AS `final_comments`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`prc`.`prc_confirmed_price` AS `price`,`inv`.`inv_no` AS `invoice`,`inv`.`inv_date` AS `invoice_date`,`inv_usr`.`usr_name` AS `invoice_confirmedby`,`py`.`py_no` AS `py_no`,`py`.`py_amount` AS `payment`,`py`.`py_date` AS `payment_date`,`py_usr`.`usr_name` AS `payment_confirmedby`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`br_usr`.`usr_name` AS `br_confirmedby`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`war`.`war_no` AS `warrant_no`,`war`.`war_weight` AS `warrant_weight`,`war`.`war_date` AS `warrant_date`,`war`.`war_comments` AS `war_comments`,`sst`.`sst_name` AS `status`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,`rl`.`rl_confirmedby` AS `rl_confirmedby`,`trp`.`trp_name` AS `trp_name` from ((((((((((((((((((((((((((((((`stock_st` `st` left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `certifications` `crt` on((`crt`.`cfdid` = `cfd`.`id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `green` `grn` on((`grn`.`cfdid` = `cfd`.`id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) where (`st`.`st_net_weight` is not null) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `awaiting_quality_analysis`
--

/*!50001 DROP TABLE IF EXISTS `awaiting_quality_analysis`*/;
/*!50001 DROP VIEW IF EXISTS `awaiting_quality_analysis`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `awaiting_quality_analysis` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,`st`.`st_moisture` AS `st_moisture`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,`st`.`prc_id` AS `prcid`,ifnull(`pr`.`id`,`prr`.`id`) AS `prcssid`,ifnull(if((`pr`.`pr_weight_in` > `st`.`st_net_weight`),`st`.`st_net_weight`,`pr`.`pr_weight_in`),`st`.`st_net_weight`) AS `weight`,`st`.`st_bags` AS `bags`,`st`.`st_pockets` AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,group_concat(distinct `qp`.`qp_parameter` separator ', ') AS `green`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,ifnull(`prc`.`prc_confirmed_price`,format((`stb`.`stb_value` / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`)),2)) AS `price`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,group_concat(distinct `prcss`.`id` separator ',') AS `prcssid_all`,`prts`.`id` AS `prcssresultsid` from (((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((`pall`.`pr_id` = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `quality_parameters_qp` `qp` on((`qp`.`id` = `grcm`.`qp_id`))) where ((`st`.`st_net_weight` is not null) and isnull(`st`.`st_ended_by`) and (`st`.`st_outturn` is not null) and (`st`.`st_quality_check` is not null)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `batchview`
--

/*!50001 DROP TABLE IF EXISTS `batchview`*/;
/*!50001 DROP VIEW IF EXISTS `batchview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `batchview` AS select `btc`.`id` AS `id`,`sloc`.`id` AS `slocid`,`btc`.`btc_number` AS `btc_number`,`btc`.`btc_instructed_by` AS `btc_instructed_by`,`st`.`id` AS `stid`,`st`.`prc_id` AS `prc_id`,`st`.`gr_id` AS `gr_id`,`st`.`st_name` AS `name`,`cgrad`.`cgrad_name` AS `grade`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`pkg`.`pkg_name` AS `pkg_name`,`btc`.`btc_weight` AS `btc_weight`,`btc`.`btc_tare` AS `btc_tare`,`btc`.`btc_net_weight` AS `btc_net_weight`,`btc`.`btc_packages` AS `btc_packages`,`btc`.`btc_bags` AS `btc_bags`,`btc`.`btc_pockets` AS `btc_pockets`,`loc_row`.`loc_row` AS `loc_row`,`loc_column`.`loc_column` AS `loc_column`,`sloc`.`btc_zone` AS `btc_zone`,`wr`.`wr_name` AS `wr_name`,`new_loc_row`.`loc_row` AS `new_loc_row`,`new_loc_column`.`loc_column` AS `new_loc_column`,`insloc`.`btc_zone` AS `new_zone`,`insloc`.`insloc_weight` AS `insloc_weight`,`new_wr`.`wr_name` AS `new_wr_name`,`insloc`.`insloc_reason` AS `reason` from (((((((((((((`batch_btc` `btc` left join `highest_batch` `hb` on((`hb`.`id` = `btc`.`id`))) left join `stock_st` `st` on((`st`.`id` = `btc`.`st_id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_sloc` `sloc` on((`sloc`.`id` = `hb`.`slocid`))) left join `location_loc` `loc_row` on((`loc_row`.`id` = `sloc`.`loc_row_id`))) left join `location_loc` `loc_column` on((`loc_column`.`id` = `sloc`.`loc_column_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `loc_column`.`wr_id`))) left join `packaging_pkg` `pkg` on((`pkg`.`id` = `st`.`pkg_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `st`.`cgrad_id`))) left join `instructed_stock_location_insloc` `insloc` on((`insloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `new_loc_row` on((`new_loc_row`.`id` = `insloc`.`loc_row_id`))) left join `location_loc` `new_loc_column` on((`new_loc_column`.`id` = `insloc`.`loc_column_id`))) left join `warehouse_wr` `new_wr` on((`new_wr`.`id` = `new_loc_column`.`wr_id`))) where (isnull(`btc`.`btc_ended_by`) and (`st`.`id` is not null)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `batchview_all`
--

/*!50001 DROP TABLE IF EXISTS `batchview_all`*/;
/*!50001 DROP VIEW IF EXISTS `batchview_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `batchview_all` AS select `btc`.`id` AS `id`,`btc`.`btc_prev_id` AS `btc_prev_id`,`sloc`.`id` AS `slocid`,`btc`.`btc_number` AS `btc_number`,`btc`.`btc_ended_by` AS `btc_ended_by`,`btc`.`btc_instructed_by` AS `btc_instructed_by`,`st`.`id` AS `stid`,`st`.`prc_id` AS `prc_id`,`st`.`gr_id` AS `gr_id`,`st`.`st_name` AS `name`,`cgrad`.`cgrad_name` AS `grade`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`pkg`.`pkg_name` AS `pkg_name`,`btc`.`btc_weight` AS `btc_weight`,`btc`.`btc_tare` AS `btc_tare`,`btc`.`btc_net_weight` AS `btc_net_weight`,`btc`.`btc_packages` AS `btc_packages`,`btc`.`btc_bags` AS `btc_bags`,`btc`.`btc_pockets` AS `btc_pockets`,ifnull(`loc_row`.`loc_row`,0) AS `loc_row`,ifnull(`loc_column`.`loc_column`,0) AS `loc_column`,ifnull(`sloc`.`btc_zone`,0) AS `btc_zone`,`wr`.`wr_name` AS `wr_name`,`new_loc_row`.`loc_row` AS `new_loc_row`,`new_loc_column`.`loc_column` AS `new_loc_column`,`insloc`.`btc_zone` AS `new_zone`,`new_wr`.`wr_name` AS `new_wr_name`,`insloc`.`insloc_reason` AS `reason`,`insloc`.`insloc_ref` AS `insloc_ref`,`mit`.`mit_name` AS `mit_name`,date_format(`insloc`.`created_at`,'%d/%m/%Y %H:%i:%s') AS `created_at` from (((((((((((((`batch_btc` `btc` left join `stock_st` `st` on((`st`.`id` = `btc`.`st_id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_sloc` `sloc` on((`sloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `loc_row` on((`loc_row`.`id` = `sloc`.`loc_row_id`))) left join `location_loc` `loc_column` on((`loc_column`.`id` = `sloc`.`loc_column_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `loc_column`.`wr_id`))) left join `packaging_pkg` `pkg` on((`pkg`.`id` = `st`.`pkg_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `st`.`cgrad_id`))) left join `instructed_stock_location_insloc` `insloc` on((`insloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `new_loc_row` on((`new_loc_row`.`id` = `insloc`.`loc_row_id`))) left join `location_loc` `new_loc_column` on((`new_loc_column`.`id` = `insloc`.`loc_column_id`))) left join `warehouse_wr` `new_wr` on((`new_wr`.`id` = `new_loc_column`.`wr_id`))) left join `movement_instruction_type_mit` `mit` on((`mit`.`id` = `insloc`.`mit_id`))) where (`st`.`id` is not null) order by `st`.`id`,`sloc`.`id` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `being_processed`
--

/*!50001 DROP TABLE IF EXISTS `being_processed`*/;
/*!50001 DROP VIEW IF EXISTS `being_processed`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `being_processed` AS select `st`.`id` AS `id`,`st`.`sts_id` AS `sts_id`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,ifnull(if((`pr`.`pr_weight_in` > `st`.`st_net_weight`),`st`.`st_net_weight`,`pr`.`pr_weight_in`),`st`.`st_net_weight`) AS `weight`,`st`.`st_bags` AS `bags`,`st`.`st_pockets` AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`cfd`.`cfd_outturn` AS `outturn`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,`cgrad`.`cgrad_name` AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,`prc`.`prc_confirmed_price` AS `price`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`war`.`war_no` AS `warrant_no`,`crt`.`crt_name` AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location` from (((((((((((((((((((((((((((((`process_pr` `pr` left join `stock_st` `st` on((`pr`.`id` = `st`.`pr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `certifications` `crt` on((`crt`.`cfdid` = `cfd`.`id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) where (`st`.`st_net_weight` is not null) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `bought_no_release`
--

/*!50001 DROP TABLE IF EXISTS `bought_no_release`*/;
/*!50001 DROP VIEW IF EXISTS `bought_no_release`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `bought_no_release` AS select `cfd`.`id` AS `id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `slctrid`,`slr`.`slr_name` AS `slr_name`,`wr`.`wr_name` AS `wr_name`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cfd`.`csn_id` AS `csn_id`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`prc`.`inv_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`prc`.`inv_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,`cgrad`.`cgrad_name` AS `grade`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) AS `weight`,ifnull(floor((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) / 60)),`cfd`.`cfd_bags`) AS `bags`,ifnull(floor((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) % 60)),`cfd`.`cfd_pockets`) AS `pockets`,`sl`.`sl_hedge` AS `hedge`,`sl`.`sl_month` AS `month`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`prc`.`prc_confirmed_price` AS `price`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,`war`.`war_no` AS `war_no`,((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) / 50) * `prc`.`prc_confirmed_price`) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,`st`.`st_moisture` AS `st_moisture`,`st`.`pkg_id` AS `pkg_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`sloc`.`loc_row_id` AS `loc_row_id`,`sloc`.`loc_column_id` AS `loc_column_id`,`sloc`.`btc_zone` AS `btc_zone`,`gr`.`gr_number` AS `gr_number`,`btc`.`btc_packages` AS `btc_packages`,`cfd`.`slr_id` AS `slrid` from ((((((((((((((((`coffee_details_cfd` `cfd` left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `purchases_prc` `prc` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `batch_btc` `btc` on((`btc`.`st_id` = `st`.`id`))) left join `stock_location_sloc` `sloc` on((`sloc`.`bt_id` = `btc`.`id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`st`.`cb_id`,`prc`.`cb_id`)))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = ifnull(`st`.`br_id`,`prc`.`br_id`)))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) where (isnull(`prc`.`rl_id`) and isnull(`st`.`st_net_weight`) and (`cb`.`bt_id` = 1) and (`prc`.`sst_id` = 2) and isnull(`prc`.`gr_id`)) group by `cfd`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `breakdown`
--

/*!50001 DROP TABLE IF EXISTS `breakdown`*/;
/*!50001 DROP VIEW IF EXISTS `breakdown`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `breakdown` AS select `st`.`id` AS `id`,NULL AS `cfdid`,`stb`.`id` AS `stbid`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`id`,NULL) AS `bric_id`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_no`,NULL) AS `br_no`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_code`,NULL) AS `bs_code`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_quality`,NULL) AS `bs_quality`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`),`ibs`.`ibs_code`) AS `ibs_code`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`),`ibs`.`ibs_quality`) AS `ibs_quality`,`st`.`st_outturn` AS `st_outturn`,`csn`.`csn_season` AS `csn_season`,`cgrad`.`cgrad_name` AS `cgrad_name`,`cg`.`cg_name` AS `cg_name`,`cg`.`cg_organisation` AS `cg_organisation`,`cb`.`cb_name` AS `cb_name`,`st`.`st_net_weight` AS `current_weight`,`st`.`st_bric_value` AS `current_value`,`pall`.`pall_allocated_weight` AS `allocated_weight`,ifnull(sum(`stb`.`stb_bulk_ratio`),1) AS `ratios`,ifnull(sum(`stb`.`stb_value_ratio`),1) AS `value_ratios`,ifnull((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),`st`.`st_net_weight`) AS `full_weight`,ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),0) AS `weight`,`prt`.`prt_name` AS `prt_name`,`sct`.`sct_number` AS `sct_number`,`sct`.`sct_weight` AS `sales_weight`,if(isnull(`st`.`st_disposed_by`),NULL,'Stuffed') AS `status`,`cn`.`cn_number` AS `credit_number`,`cn`.`id` AS `cnid`,round((if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))) * (50 / ifnull((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),`st`.`st_net_weight`))),2) AS `price`,(ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`) AS `stuffed_weight_full`,round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0) AS `stuffed_weight`,`ssw`.`stff_date` AS `stuffing_date`,round(`ssw`.`weighbridge_weight_difference`,0) AS `weighbridge_weight_difference`,round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) AS `value`,(((round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) / (ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) / 50)) / 1.10231) - ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`)) AS `br_diffrential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `sl_hedge`,`cn`.`cn_confirmed_by` AS `cn_confirmed_by`,NULL AS `location`,`st`.`st_rejected` AS `st_rejected`,`st`.`st_credited` AS `st_credited`,upper(`sl`.`sl_no`) AS `sale`,`sl_csn`.`csn_season` AS `sale_season`,'IBERO EXPORT' AS `wr_name`,(to_days(now()) - to_days(`st`.`created_at`)) AS `storage`,`stb`.`stb_bric_bags` AS `bric_bags` from (((((((((((((((((((`stock_st` `st` left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `st`.`id`))) left join `purchases_prc` `prc` on(((`prc`.`id` = `st`.`prc_id`) and (`prc`.`sst_id` = 2)))) left join `bric_br` `br` on((`br`.`id` = ifnull(`prc`.`br_id`,`stb`.`br_id`)))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((`pr`.`id` = `prts`.`pr_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`st`.`pr_id` is not null)))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `st`.`prc_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `sl_csn` on((`sl_csn`.`id` = `sl`.`csn_id`))) left join `coffee_growers_cg` `cg` on((ifnull(ifnull(`br`.`cg_id`,`stb`.`cgr_id`),'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(ifnull(`br`.`cb_id`,`prc`.`cb_id`),ifnull(`stb`.`cb_id`,'1'))))) left join `sum_stuffed_and_weighbridge` `ssw` on(((`ssw`.`sct_id` = `sct`.`id`) and (`st`.`id` = `ssw`.`st_id`)))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `credit_note_cn` `cn` on((`cn`.`id` = `stb`.`cn_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) where (((`st`.`id` is not null) and isnull(`st`.`st_ended_by`)) or (`st`.`st_disposed_by` is not null)) group by `st`.`id`,`br`.`id`,ifnull(`prc`.`br_id`,`stb`.`br_id`),`prts`.`id` union select `cfd`.`id` AS `id`,NULL AS `cfdid`,NULL AS `stbid`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`id`,NULL) AS `bric_id`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_no`,NULL) AS `br_no`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_code`,NULL) AS `bs_code`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_quality`,NULL) AS `bs_quality`,NULL AS `ibs_code`,NULL AS `ibs_quality`,`cfd`.`cfd_outturn` AS `st_outturn`,`csn`.`csn_season` AS `csn_season`,`cgrad`.`cgrad_name` AS `cgrad_name`,`cg`.`cg_name` AS `cg_name`,`cg`.`cg_organisation` AS `cg_organisation`,`cb`.`cb_name` AS `cb_name`,`cfd`.`cfd_weight` AS `current_weight`,`prc`.`prc_bric_value` AS `current_value`,NULL AS `allocated_weight`,1 AS `ratios`,1 AS `value_ratios`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`) AS `full_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`) AS `weight`,NULL AS `prt_name`,NULL AS `sct_number`,NULL AS `sales_weight`,NULL AS `status`,NULL AS `credit_number`,NULL AS `cnid`,(round(`prc`.`prc_value`,2) / (ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`) / 50)) AS `price`,NULL AS `stuffed_weight_full`,NULL AS `stuffed_weight`,NULL AS `stff_date`,NULL AS `weighbridge_weight_difference`,round(`prc`.`prc_value`,2) AS `value`,(((round(`prc`.`prc_value`,2) / (ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`) / 50)) / 1.10231) - ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`)) AS `br_diffrential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `sl_hedge`,NULL AS `cn_confirmed_by`,NULL AS `location`,`st`.`st_rejected` AS `st_rejected`,`st`.`st_credited` AS `st_credited`,upper(`sl`.`sl_no`) AS `sale`,`sl_csn`.`csn_season` AS `sale_season`,'IBERO EXPORT' AS `wr_name`,(to_days(now()) - to_days(`st`.`created_at`)) AS `storage`,NULL AS `bric_bags` from ((((((((((((`purchases_prc` `prc` left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `sl_csn` on((`sl_csn`.`id` = `sl`.`csn_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`br`.`cb_id`,`prc`.`cb_id`)))) left join `coffee_growers_cg` `cg` on((ifnull(`br`.`cg_id`,'10000001') = `cg`.`id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `credit_note_cn` `cn` on((`cn`.`id` = `prc`.`cn_id`))) where (isnull(`prc`.`gr_id`) and (`prc`.`sst_id` = 2) and isnull(`st`.`id`) and (`cfd`.`id` is not null)) group by `cfd`.`id`,(`br`.`id` and (`prc`.`id` is not null)) union select `st`.`id` AS `id`,NULL AS `cfdid`,`stb`.`id` AS `stbid`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`id`,NULL) AS `bric_id`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_no`,NULL) AS `br_no`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_code`,NULL) AS `bs_code`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_quality`,NULL) AS `bs_quality`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`),`ibs`.`ibs_code`) AS `ibs_code`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`),`ibs`.`ibs_quality`) AS `ibs_quality`,`st`.`st_outturn` AS `st_outturn`,`csn`.`csn_season` AS `csn_season`,`cgrad`.`cgrad_name` AS `cgrad_name`,`cg`.`cg_name` AS `cg_name`,`cg`.`cg_organisation` AS `cg_organisation`,`cb`.`cb_name` AS `cb_name`,`st`.`st_net_weight` AS `current_weight`,`st`.`st_bric_value` AS `current_value`,`pall`.`pall_allocated_weight` AS `allocated_weight`,ifnull(sum(`stb`.`stb_bulk_ratio`),1) AS `ratios`,ifnull(sum(`stb`.`stb_value_ratio`),1) AS `value_ratios`,(ifnull((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),`st`.`st_net_weight`) - ifnull(round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0),0)) AS `full_weight`,(ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) - ifnull(round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0),0)) AS `weight`,`prt`.`prt_name` AS `prt_name`,`sct`.`sct_number` AS `sct_number`,NULL AS `sales_weight`,concat('work in progress','....',`pr`.`pr_instruction_number`) AS `status`,`cn`.`cn_number` AS `credit_number`,`cn`.`id` AS `cnid`,(round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) / (ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) / 50)) AS `price`,NULL AS `stuffed_weight_full`,NULL AS `stuffed_weight`,NULL AS `stff_date`,NULL AS `weighbridge_weight_difference`,round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`)),2) AS `value`,(((round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) / (ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) / 50)) / 1.10231) - ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`)) AS `br_diffrential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `sl_hedge`,`cn`.`cn_confirmed_by` AS `cn_confirmed_by`,NULL AS `location`,`st`.`st_rejected` AS `st_rejected`,`st`.`st_credited` AS `st_credited`,upper(`sl`.`sl_no`) AS `sale`,`sl_csn`.`csn_season` AS `sale_season`,'IBERO EXPORT' AS `wr_name`,(to_days(now()) - to_days(`st`.`created_at`)) AS `storage`,`stb`.`stb_bric_bags` AS `bric_bags` from (((((((((((((((((((`stock_st` `st` left join `process_results_prts` `prts` on((`prts`.`pr_id` = `st`.`pr_id`))) left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `st`.`id`))) left join `purchases_prc` `prc` on(((`prc`.`id` = `st`.`prc_id`) and (`prc`.`sst_id` = 2)))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `st`.`prc_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `sl_csn` on((`sl_csn`.`id` = `sl`.`csn_id`))) left join `bric_br` `br` on((`br`.`id` = ifnull(`prc`.`br_id`,`stb`.`br_id`)))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`pr_id` = `pr`.`id`) and (`pall`.`st_id` = `st`.`id`)))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) left join `coffee_growers_cg` `cg` on((ifnull(ifnull(`br`.`cg_id`,`stb`.`cgr_id`),'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(ifnull(`br`.`cb_id`,`prc`.`cb_id`),ifnull(`stb`.`cb_id`,'1'))))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `credit_note_cn` `cn` on((`cn`.`id` = `stb`.`cn_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `sum_stuffed_and_weighbridge` `ssw` on(((`ssw`.`sct_id` = `sct`.`id`) and (`st`.`id` = `ssw`.`st_id`)))) where ((`st`.`st_ended_by` is not null) and (`st`.`id` is not null) and isnull(`prts`.`st_id`) and isnull(`st`.`st_disposed_by`)) group by `st`.`id`,`br`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `breakdown_arrival`
--

/*!50001 DROP TABLE IF EXISTS `breakdown_arrival`*/;
/*!50001 DROP VIEW IF EXISTS `breakdown_arrival`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `breakdown_arrival` AS select `cfd`.`id` AS `id`,`br`.`id` AS `bric_id`,`br`.`br_no` AS `br_no`,`bs`.`bs_code` AS `bs_code`,`bs`.`bs_quality` AS `bs_quality`,`cfd`.`cfd_outturn` AS `cfd_outturn`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`cfd`.`cfd_weight` AS `current_weight`,NULL AS `allocated_weight`,`prc`.`prc_purchase_contract_ratio` AS `ratios`,(`st`.`st_net_weight` - ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) AS `weight`,NULL AS `prt_name`,NULL AS `sct_number`,NULL AS `sales_weight`,NULL AS `stuffed_weight`,NULL AS `weighbridge_weight_difference`,NULL AS `value`,NULL AS `status` from (((((((`purchases_prc` `prc` left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`br`.`cb_id`,`prc`.`cb_id`)))) left join `coffee_growers_cg` `cg` on((ifnull(`br`.`cg_id`,'10000001') = `cg`.`id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) where ((`prc`.`br_id` is not null) and (`prc`.`sst_id` = 2) and (`st`.`id` is not null)) group by `cfd`.`id`,(`br`.`id` and (`prc`.`id` is not null)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `breakdown_process_results`
--

/*!50001 DROP TABLE IF EXISTS `breakdown_process_results`*/;
/*!50001 DROP VIEW IF EXISTS `breakdown_process_results`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `breakdown_process_results` AS select `prep`.`id` AS `id`,`br`.`id` AS `bric_id`,`br`.`br_no` AS `br_no`,`bs`.`bs_code` AS `bs_code`,`bs`.`bs_quality` AS `bs_quality`,`prep`.`st_outturn` AS `st_outturn`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`prep`.`results` AS `current_weight`,`prep`.`allocated_weight` AS `allocated_weight`,sum(`stb`.`stb_bulk_ratio`) AS `ratios`,(`prep`.`results` * sum(`stb`.`stb_bulk_ratio`)) AS `full_weight`,round((`prep`.`results` * sum(`stb`.`stb_bulk_ratio`)),0) AS `weight`,round((`prep`.`balance` * sum(`stb`.`stb_bulk_ratio`)),0) AS `gains_losses`,NULL AS `prt_name`,`sct`.`sct_number` AS `sct_number`,`sct`.`sct_weight` AS `sales_weight`,NULL AS `stuffed_weight`,NULL AS `weighbridge_weight_difference`,NULL AS `value`,NULL AS `status`,`prep`.`instruction_date` AS `instruction_date` from ((((((`breakdown_process_results_prep` `prep` left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `prep`.`id`))) left join `bric_br` `br` on((`br`.`id` = `stb`.`br_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `prep`.`sct_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `br`.`cb_id`))) left join `coffee_growers_cg` `cg` on((ifnull(`br`.`cg_id`,'10000001') = `cg`.`id`))) group by `prep`.`id`,`br`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `breakdown_process_results_prep`
--

/*!50001 DROP TABLE IF EXISTS `breakdown_process_results_prep`*/;
/*!50001 DROP VIEW IF EXISTS `breakdown_process_results_prep`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `breakdown_process_results_prep` AS select `prs`.`instruction_number` AS `instruction_number`,`prs`.`instruction_date` AS `instruction_date`,`prs`.`reference_name` AS `reference_name`,`prs`.`other_instructions` AS `other_instructions`,`prs`.`supervisor` AS `supervisor`,`prs`.`tags` AS `tags`,`prs`.`allocated_weight` AS `allocated_weight`,`prs`.`results` AS `results`,`prs`.`balance` AS `balance`,`st`.`id` AS `id`,`st`.`ctr_id` AS `ctr_id`,`st`.`csn_id` AS `csn_id`,`st`.`cb_id` AS `cb_id`,`st`.`st_outturn` AS `st_outturn`,`st`.`st_mark` AS `st_mark`,`st`.`st_name` AS `st_name`,`st`.`prc_id` AS `prc_id`,`st`.`sts_id` AS `sts_id`,`st`.`pr_id` AS `pr_id`,`st`.`gr_id` AS `gr_id`,`st`.`st_ref_id` AS `st_ref_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`st`.`st_net_weight` AS `st_net_weight`,`st`.`st_packages` AS `st_packages`,`st`.`st_bags` AS `st_bags`,`st`.`st_pockets` AS `st_pockets`,`st`.`pkg_id` AS `pkg_id`,`st`.`cgrad_id` AS `cgrad_id`,`st`.`prt_id` AS `prt_id`,`st`.`bs_id` AS `bs_id`,`st`.`ibs_id` AS `ibs_id`,`st`.`prc_price` AS `prc_price`,`st`.`br_id` AS `br_id`,`st`.`sl_id` AS `sl_id`,`st`.`usr_id` AS `usr_id`,`st`.`st_ended_by` AS `st_ended_by`,`st`.`st_additional_processed` AS `st_additional_processed`,`st`.`st_partial_delivery` AS `st_partial_delivery`,`st`.`sct_id` AS `sct_id`,`st`.`st_disposed_by` AS `st_disposed_by`,`st`.`created_at` AS `created_at`,`st`.`updated_at` AS `updated_at` from (`process_results_summary` `prs` left join `stock_st` `st` on((`st`.`st_outturn` = `prs`.`instruction_number`))) group by `prs`.`instruction_number` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `breakdown_purchased`
--

/*!50001 DROP TABLE IF EXISTS `breakdown_purchased`*/;
/*!50001 DROP VIEW IF EXISTS `breakdown_purchased`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `breakdown_purchased` AS select `st`.`id` AS `id`,`br`.`id` AS `bric_id`,`br`.`br_no` AS `br_no`,`bs`.`bs_code` AS `bs_code`,`bs`.`bs_quality` AS `bs_quality`,`st`.`st_outturn` AS `st_outturn`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`st`.`st_net_weight` AS `current_weight`,NULL AS `allocated_weight`,sum(`stb`.`stb_bulk_ratio`) AS `ratios`,ifnull((`st`.`st_net_weight` * sum(`stb`.`stb_bulk_ratio`)),`st`.`st_net_weight`) AS `full_weight`,ifnull(round((`st`.`st_net_weight` * sum(`stb`.`stb_bulk_ratio`)),0),`st`.`st_net_weight`) AS `weight`,NULL AS `prt_name`,NULL AS `sct_number`,NULL AS `sales_weight`,NULL AS `stuffed_weight`,NULL AS `weighbridge_weight_difference`,NULL AS `value`,NULL AS `status` from (((((`stock_st` `st` left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `st`.`id`))) left join `bric_br` `br` on((`br`.`id` = `stb`.`br_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`br`.`cb_id`,1)))) left join `coffee_growers_cg` `cg` on((ifnull(`br`.`cg_id`,'10000001') = `cg`.`id`))) where ((`st`.`id` is not null) and (`st`.`sts_id` = 7)) group by `stb`.`id`,`br`.`id` union select `cfd`.`id` AS `id`,`br`.`id` AS `bric_id`,`br`.`br_no` AS `br_no`,`bs`.`bs_code` AS `bs_code`,`bs`.`bs_quality` AS `bs_quality`,`cfd`.`cfd_outturn` AS `cfd_outturn`,NULL AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`cfd`.`cfd_weight` AS `current_weight`,NULL AS `allocated_weight`,`prc`.`prc_purchase_contract_ratio` AS `ratios`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`) AS `full_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`) AS `weight`,NULL AS `prt_name`,NULL AS `sct_number`,NULL AS `sales_weight`,NULL AS `stuffed_weight`,NULL AS `weighbridge_weight_difference`,NULL AS `value`,NULL AS `status` from (((((((`purchases_prc` `prc` left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `stock_st` `st` on(((`st`.`st_outturn` = `cfd`.`cfd_outturn`) and (`st`.`cgrad_id` = `cfd`.`cgrad_id`) and (`st`.`csn_id` = `cfd`.`csn_id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`br`.`cb_id`,`prc`.`cb_id`)))) left join `coffee_growers_cg` `cg` on((ifnull(`br`.`cg_id`,'10000001') = `cg`.`id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) where ((`prc`.`gr_id` > 145) or (isnull(`prc`.`gr_id`) and (`prc`.`br_id` is not null) and (`prc`.`sst_id` = 2) and (`cfd`.`id` is not null) and (`br`.`id` is not null))) group by `cfd`.`id`,`br`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `breakdown_without_stuffed`
--

/*!50001 DROP TABLE IF EXISTS `breakdown_without_stuffed`*/;
/*!50001 DROP VIEW IF EXISTS `breakdown_without_stuffed`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `breakdown_without_stuffed` AS select `st`.`id` AS `id`,NULL AS `cfdid`,`stb`.`id` AS `stbid`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`id`,NULL) AS `bric_id`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_no`,NULL) AS `br_no`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_value`,NULL) AS `br_value`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_purchased_weight`,NULL) AS `br_purchased_weight`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_price_per_fifty`,NULL) AS `br_price_per_fifty`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_code`,NULL) AS `bs_code`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_quality`,NULL) AS `bs_quality`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`),`ibs`.`ibs_code`) AS `ibs_code`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`),`ibs`.`ibs_quality`) AS `ibs_quality`,`st`.`st_outturn` AS `st_outturn`,`csn`.`csn_season` AS `csn_season`,`cgrad`.`cgrad_name` AS `cgrad_name`,`cg`.`cg_name` AS `cg_name`,`cg`.`cg_organisation` AS `cg_organisation`,`cb`.`cb_name` AS `cb_name`,`st`.`st_net_weight` AS `current_weight`,`st`.`st_bric_value` AS `current_value`,`pall`.`pall_allocated_weight` AS `allocated_weight`,ifnull(sum(`stb`.`stb_bulk_ratio`),1) AS `ratios`,ifnull(sum(`stb`.`stb_value_ratio`),1) AS `value_ratios`,(ifnull((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),`st`.`st_net_weight`) - ifnull(round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0),0)) AS `full_weight`,(ifnull(round((`st`.`st_net_weight` * sum(`stb`.`stb_bulk_ratio`)),0),`st`.`st_net_weight`) - ifnull(round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0),0)) AS `weight`,`prt`.`prt_name` AS `prt_name`,`sct`.`sct_number` AS `sct_number`,(`sct`.`sct_packages` * 60) AS `sales_weight`,NULL AS `status`,`cn`.`cn_number` AS `credit_number`,`cn`.`id` AS `cnid`,round((if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))) * (50 / ifnull((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),`st`.`st_net_weight`))),2) AS `price`,(ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`) AS `stuffed_weight_full`,round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0) AS `stuffed_weight`,`ssw`.`stff_date` AS `stuffing_date`,round(`ssw`.`weighbridge_weight_difference`,0) AS `weighbridge_weight_difference`,round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) AS `value`,(((round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) / (ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) / 50)) / 1.10231) - ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`)) AS `br_diffrential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `sl_hedge`,`cn`.`cn_confirmed_by` AS `cn_confirmed_by`,NULL AS `location`,`st`.`st_rejected` AS `st_rejected`,`st`.`st_credited` AS `st_credited`,upper(`sl`.`sl_no`) AS `sale`,`cfd`.`cfd_lot_no` AS `lot`,`sl_csn`.`csn_season` AS `sale_season`,ifnull(`wr`.`wr_name`,'IBERO EXPORT') AS `wr_name`,(to_days(now()) - to_days(`st`.`created_at`)) AS `storage`,`stb`.`stb_bric_bags` AS `bric_bags`,`sct`.`sct_description` AS `sct_description`,`sct`.`sct_shipment` AS `shipment`,`vd`.`vd_name` AS `vessel`,`vd`.`vd_mark` AS `mark`,`vd`.`vd_ship_date` AS `ship_date`,`sct`.`id` AS `sct_id`,ifnull(`cg`.`cg_factory_id`,`cg`.`id`) AS `cg_id`,`cg_pin`.`cg_kra_pin` AS `pin`,`ctr`.`ctr_name` AS `ctr_name`,`psi`.`inv_no` AS `inv_no`,`sct`.`sct_weight` AS `sct_weight`,`sct`.`sct_approved_weight` AS `sct_approved_weight`,ifnull(`cg_pin`.`cg_code`,`cg`.`cg_code`) AS `cg_code` from (((((((((((((((((((((((((`stock_st` `st` left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `st`.`id`))) left join `purchases_prc` `prc` on(((`prc`.`id` = `st`.`prc_id`) and (`prc`.`sst_id` = 2)))) left join `bric_br` `br` on((`br`.`id` = ifnull(`prc`.`br_id`,`stb`.`br_id`)))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((`pr`.`id` = `prts`.`pr_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`st`.`pr_id` is not null)))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = ifnull(`pr`.`sct_id`,`st`.`sct_id`)))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `st`.`prc_id`))) left join `coffee_growers_cg` `cg` on((ifnull(ifnull(`br`.`cg_id`,`stb`.`cgr_id`),'10000001') = `cg`.`id`))) left join `coffee_growers_cg` `cg_pin` on((`cg_pin`.`id` = ifnull(`cg`.`cg_factory_id`,`cg`.`id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(ifnull(`br`.`cb_id`,`prc`.`cb_id`),ifnull(`stb`.`cb_id`,'1'))))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `credit_note_cn` `cn` on((`cn`.`id` = `stb`.`cn_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `sl_csn` on((`sl_csn`.`id` = `sl`.`csn_id`))) left join `vessel_details_vd` `vd` on((`vd`.`sct_id` = `sct`.`id`))) left join `country_ctr` `ctr` on((`ctr`.`id` = `st`.`ctr_id`))) left join `pre_shipment_invoice_psi` `psi` on(((`psi`.`sct_id` = `sct`.`id`) and (`psi`.`cg_id` = ifnull(`cg`.`cg_factory_id`,`cg`.`id`))))) left join `stock_warehouse` `sw` on((`sw`.`st_id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = ifnull(`sw`.`wr_id`,`cfd`.`wr_id`)))) left join `sum_stuffed_and_weighbridge` `ssw` on(((`ssw`.`sct_id` = `sct`.`id`) and (`st`.`id` = `ssw`.`st_id`)))) where ((`st`.`id` is not null) and isnull(`st`.`st_ended_by`)) group by `st`.`id`,`br`.`id`,ifnull(`prc`.`br_id`,`stb`.`br_id`),`prts`.`id` union select `cfd`.`id` AS `id`,`cfd`.`id` AS `cfdid`,NULL AS `stbid`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`id`,NULL) AS `bric_id`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_no`,NULL) AS `br_no`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_value`,NULL) AS `br_value`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_purchased_weight`,NULL) AS `br_purchased_weight`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_price_per_fifty`,NULL) AS `br_price_per_fifty`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_code`,NULL) AS `bs_code`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_quality`,NULL) AS `bs_quality`,`bs`.`bs_code` AS `ibs_code`,`bs`.`bs_quality` AS `ibs_quality`,`cfd`.`cfd_outturn` AS `st_outturn`,`csn`.`csn_season` AS `csn_season`,`cgrad`.`cgrad_name` AS `cgrad_name`,`cg`.`cg_name` AS `cg_name`,`cg`.`cg_organisation` AS `cg_organisation`,`cb`.`cb_name` AS `cb_name`,`cfd`.`cfd_weight` AS `current_weight`,ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) AS `current_value`,NULL AS `allocated_weight`,1 AS `ratios`,1 AS `value_ratios`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) AS `full_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) AS `weight`,NULL AS `prt_name`,NULL AS `sct_number`,NULL AS `sales_weight`,NULL AS `status`,`cn`.`cn_number` AS `credit_number`,`cn`.`id` AS `cnid`,(round(ifnull(`prc`.`prc_bric_value`,`st`.`st_bric_value`),2) / (ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) / 50)) AS `price`,NULL AS `stuffed_weight_full`,NULL AS `stuffed_weight`,NULL AS `stuffing_date`,NULL AS `weighbridge_weight_difference`,round(ifnull(`prc`.`prc_bric_value`,`st`.`st_bric_value`),2) AS `value`,(((round(ifnull(`prc`.`prc_bric_value`,`st`.`st_bric_value`),2) / (ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) / 50)) / 1.10231) - ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`)) AS `br_diffrential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `sl_hedge`,`cn`.`cn_confirmed_by` AS `cn_confirmed_by`,NULL AS `location`,NULL AS `st_rejected`,NULL AS `st_credited`,upper(`sl`.`sl_no`) AS `sale`,`cfd`.`cfd_lot_no` AS `lot`,`sl_csn`.`csn_season` AS `sale_season`,ifnull(`wr`.`wr_name`,'IBERO EXPORT') AS `wr_name`,(to_days(now()) - to_days(`prc`.`created_at`)) AS `storage`,NULL AS `bric_bags`,NULL AS `sct_description`,NULL AS `shipment`,NULL AS `vessel`,NULL AS `mark`,NULL AS `ship_date`,NULL AS `sct_id`,ifnull(`cg`.`cg_factory_id`,`cg`.`id`) AS `cg_id`,`cg_pin`.`cg_kra_pin` AS `pin`,`ctr`.`ctr_name` AS `ctr_name`,NULL AS `inv_no`,NULL AS `sct_weight`,NULL AS `sct_approved_weight`,ifnull(`cg_pin`.`cg_code`,`cg`.`cg_code`) AS `cg_code` from (((((((((((((((`purchases_prc` `prc` left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`br`.`cb_id`,`prc`.`cb_id`)))) left join `coffee_growers_cg` `cg` on((ifnull(`br`.`cg_id`,'10000001') = `cg`.`id`))) left join `coffee_growers_cg` `cg_pin` on((`cg_pin`.`id` = ifnull(`cg`.`cg_factory_id`,`cg`.`id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `credit_note_cn` `cn` on((`cn`.`id` = `prc`.`cn_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `sl_csn` on((`sl_csn`.`id` = `sl`.`csn_id`))) left join `country_ctr` `ctr` on((`ctr`.`id` = `sl`.`ctr_id`))) where (isnull(`prc`.`gr_id`) and (`prc`.`sst_id` = 2) and isnull(`st`.`id`) and (`cfd`.`id` is not null)) group by `cfd`.`id`,(`br`.`id` and (`prc`.`id` is not null)) union select `st`.`id` AS `id`,NULL AS `cfdid`,`stb`.`id` AS `stbid`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`id`,NULL) AS `bric_id`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_no`,NULL) AS `br_no`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_value`,NULL) AS `br_value`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_purchased_weight`,NULL) AS `br_purchased_weight`,if(isnull(`cn`.`cn_confirmed_by`),`br`.`br_price_per_fifty`,NULL) AS `br_price_per_fifty`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_code`,NULL) AS `bs_code`,if(isnull(`cn`.`cn_confirmed_by`),`bs`.`bs_quality`,NULL) AS `bs_quality`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`),`ibs`.`ibs_code`) AS `ibs_code`,if((`st`.`prc_id` is not null),ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`),`ibs`.`ibs_quality`) AS `ibs_quality`,`st`.`st_outturn` AS `st_outturn`,`csn`.`csn_season` AS `csn_season`,`cgrad`.`cgrad_name` AS `cgrad_name`,`cg`.`cg_name` AS `cg_name`,`cg`.`cg_organisation` AS `cg_organisation`,`cb`.`cb_name` AS `cb_name`,`st`.`st_net_weight` AS `current_weight`,`st`.`st_bric_value` AS `current_value`,`pall`.`pall_allocated_weight` AS `allocated_weight`,ifnull(sum(`stb`.`stb_bulk_ratio`),1) AS `ratios`,ifnull(sum(`stb`.`stb_value_ratio`),1) AS `value_ratios`,(ifnull((`st`.`st_net_weight` * sum(`stb`.`stb_bulk_ratio`)),`st`.`st_net_weight`) - ifnull(round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0),0)) AS `full_weight`,(ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) - ifnull(round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0),0)) AS `weight`,`prt`.`prt_name` AS `prt_name`,`sct`.`sct_number` AS `sct_number`,NULL AS `sales_weight`,concat('work in progress','....',`pr`.`pr_instruction_number`) AS `status`,`cn`.`cn_number` AS `credit_number`,`cn`.`id` AS `cnid`,(round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) / (ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) / 50)) AS `price`,(ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`) AS `stuffed_weight_full`,round((ifnull(sum(`stb`.`stb_bulk_ratio`),1) * `ssw`.`stuffed_weight`),0) AS `stuffed_weight`,`ssw`.`stff_date` AS `stuffing_date`,round(`ssw`.`weighbridge_weight_difference`,0) AS `weighbridge_weight_difference`,round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_bulk_ratio`),1))),2) AS `value`,(((round(if(((sum(`stb`.`stb_value`) <> '0.0000000000') and (`stb`.`stb_value` is not null)),sum(`stb`.`stb_value`),(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * ifnull(sum(`stb`.`stb_value_ratio`),1))),2) / (ifnull(round((`st`.`st_net_weight` * ifnull(sum(`stb`.`stb_bulk_ratio`),1)),0),`st`.`st_net_weight`) / 50)) / 1.10231) - ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`)) AS `br_diffrential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `sl_hedge`,`cn`.`cn_confirmed_by` AS `cn_confirmed_by`,NULL AS `location`,NULL AS `st_rejected`,NULL AS `st_credited`,upper(`sl`.`sl_no`) AS `sale`,`cfd`.`cfd_lot_no` AS `lot`,`sl_csn`.`csn_season` AS `sale_season`,ifnull(`wr`.`wr_name`,'IBERO EXPORT') AS `wr_name`,(to_days(now()) - to_days(`st`.`created_at`)) AS `storage`,`stb`.`stb_bric_bags` AS `bric_bags`,`sct`.`sct_description` AS `sct_description`,`sct`.`sct_shipment` AS `shipment`,`vd`.`vd_name` AS `vessel`,`vd`.`vd_mark` AS `mark`,`vd`.`vd_ship_date` AS `ship_date`,`sct`.`id` AS `sct_id`,ifnull(`cg`.`cg_factory_id`,`cg`.`id`) AS `cg_id`,`cg_pin`.`cg_kra_pin` AS `pin`,`ctr`.`ctr_name` AS `ctr_name`,`psi`.`inv_no` AS `inv_no`,`sct`.`sct_weight` AS `sct_weight`,`sct`.`sct_approved_weight` AS `sct_approved_weight`,ifnull(`cg_pin`.`cg_code`,`cg`.`cg_code`) AS `cg_code` from (((((((((((((((((((((((((`stock_st` `st` left join `process_results_prts` `prts` on((`prts`.`pr_id` = `st`.`pr_id`))) left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `st`.`id`))) left join `purchases_prc` `prc` on(((`prc`.`id` = `st`.`prc_id`) and (`prc`.`sst_id` = 2)))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `st`.`prc_id`))) left join `stock_warehouse` `sw` on((`sw`.`st_id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = ifnull(`sw`.`wr_id`,`cfd`.`wr_id`)))) left join `bric_br` `br` on((`br`.`id` = ifnull(`prc`.`br_id`,`stb`.`br_id`)))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`pr_id` = `pr`.`id`) and (`pall`.`st_id` = `st`.`id`)))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = ifnull(`pr`.`sct_id`,`st`.`sct_id`)))) left join `coffee_growers_cg` `cg` on((ifnull(ifnull(`br`.`cg_id`,`stb`.`cgr_id`),'10000001') = `cg`.`id`))) left join `coffee_growers_cg` `cg_pin` on((`cg_pin`.`id` = ifnull(`cg`.`cg_factory_id`,`cg`.`id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(ifnull(`br`.`cb_id`,`prc`.`cb_id`),ifnull(`stb`.`cb_id`,'1'))))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `credit_note_cn` `cn` on((`cn`.`id` = `stb`.`cn_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `sl_csn` on((`sl_csn`.`id` = `sl`.`csn_id`))) left join `vessel_details_vd` `vd` on((`vd`.`sct_id` = `sct`.`id`))) left join `country_ctr` `ctr` on((`ctr`.`id` = `st`.`ctr_id`))) left join `pre_shipment_invoice_psi` `psi` on(((`psi`.`sct_id` = `sct`.`id`) and (`psi`.`cg_id` = ifnull(`cg`.`cg_factory_id`,`cg`.`id`))))) left join `sum_stuffed_and_weighbridge` `ssw` on(((`ssw`.`sct_id` = `sct`.`id`) and (`st`.`id` = `ssw`.`st_id`)))) where ((`st`.`st_ended_by` is not null) and (`st`.`id` is not null) and isnull(`prts`.`st_id`) and isnull(`st`.`st_disposed_by`)) group by `st`.`id`,`br`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `certifications`
--

/*!50001 DROP TABLE IF EXISTS `certifications`*/;
/*!50001 DROP VIEW IF EXISTS `certifications`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `certifications` AS select `cfd`.`id` AS `cfdid`,group_concat(`crt`.`crt_name` separator ',') AS `crt_name`,max(`crt`.`crt_description`) AS `crt_description` from ((`coffee_details_cfd` `cfd` left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) group by `cfd`.`id` order by group_concat(`crt`.`crt_name` separator ',') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `check_value_ratios`
--

/*!50001 DROP TABLE IF EXISTS `check_value_ratios`*/;
/*!50001 DROP VIEW IF EXISTS `check_value_ratios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `check_value_ratios` AS select `breakdown_without_stuffed`.`id` AS `id`,`breakdown_without_stuffed`.`st_outturn` AS `st_outturn`,round(sum(`breakdown_without_stuffed`.`value_ratios`),2) AS `ratios` from `breakdown_without_stuffed` group by `breakdown_without_stuffed`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `check_weight_ratios`
--

/*!50001 DROP TABLE IF EXISTS `check_weight_ratios`*/;
/*!50001 DROP VIEW IF EXISTS `check_weight_ratios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `check_weight_ratios` AS select `breakdown_without_stuffed`.`id` AS `id`,`breakdown_without_stuffed`.`st_outturn` AS `st_outturn`,round(sum(`breakdown_without_stuffed`.`ratios`),2) AS `ratios` from `breakdown_without_stuffed` group by `breakdown_without_stuffed`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `combined_process_instructions`
--

/*!50001 DROP TABLE IF EXISTS `combined_process_instructions`*/;
/*!50001 DROP VIEW IF EXISTS `combined_process_instructions`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `combined_process_instructions` AS select `prs`.`id` AS `prsid`,`prs`.`pr_id` AS `prid`,concat(concat(`prg`.`prg_instruction`,': '),group_concat(`pri`.`pri_name` separator ',')) AS `pri_name` from ((`process_instructions_prs` `prs` left join `processing_instruction_pri` `pri` on((`pri`.`id` = `prs`.`pri_id`))) left join `processing_group_prg` `prg` on((`prg`.`id` = `pri`.`prg_id`))) group by `prs`.`pr_id` order by group_concat(`pri`.`pri_name` separator ',') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `current_stocks`
--

/*!50001 DROP TABLE IF EXISTS `current_stocks`*/;
/*!50001 DROP VIEW IF EXISTS `current_stocks`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `current_stocks` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,if((ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) is not null),'Working Progress',`sts`.`sts_name`) AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,ifnull(`prc`.`prc_confirmed_price`,format((`stb`.`stb_value` / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`)),2)) AS `price`,format(ifnull(((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 50) * `prc`.`prc_confirmed_price`),`stb`.`stb_value`),2) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month` from (((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`pr_id` = `pr`.`id`) and (`pall`.`st_id` = `st`.`id`)))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `process_results_prts` `prtss` on((`prtss`.`pr_id` = `st`.`pr_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and (`st`.`st_ended_by` is not null) and isnull(`st`.`st_additional_processed`) and isnull(`pr`.`pr_confirmed_by`) and isnull(`st`.`st_disposed_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`pr`.`id`,`pall`.`id` union select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,`st`.`st_net_weight` AS `weight`,floor((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,ifnull(`prc`.`prc_confirmed_price`,format((`stb`.`stb_value` / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`)),2)) AS `price`,format(ifnull(((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 50) * `prc`.`prc_confirmed_price`),`stb`.`stb_value`),2) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month` from ((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`pall`.`pr_id` <> 0)))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and isnull(`st`.`st_ended_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`pr`.`id`,`pall`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `direct_sale`
--

/*!50001 DROP TABLE IF EXISTS `direct_sale`*/;
/*!50001 DROP VIEW IF EXISTS `direct_sale`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `direct_sale` AS select `cfd`.`id` AS `id`,`cfd`.`sl_id` AS `slid`,upper(`sl`.`sl_no`) AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `slctrid`,`ctr`.`ctr_name` AS `ctrname`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`ml`.`ml_name` AS `ml_name`,`wrgn`.`rgn_name` AS `region`,`wrgn`.`wr_name` AS `warehouse`,`cfd`.`cfd_lot_no` AS `lot`,`cfd`.`cfd_outturn` AS `outturn`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,`cgrad`.`cgrad_name` AS `grade`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) AS `weight`,ifnull(floor((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) / 60)),`cfd`.`cfd_bags`) AS `bags`,ifnull(floor((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) % 60)),`cfd`.`cfd_pockets`) AS `pockets`,`crt`.`crt_name` AS `cert`,`slr`.`id` AS `slrid`,`sl`.`sl_hedge` AS `hedge`,`sl`.`sl_month` AS `month`,`sl`.`sl_margin` AS `sl_margin`,`sl`.`sltyp_id` AS `sltyp_id`,`sl`.`sl_auction_confirmedby` AS `purchase_confirmed`,`sl`.`sl_quality_confirmedby` AS `quality_confirmed`,`sst`.`sst_name` AS `status`,`prc`.`prc_price` AS `auc_price`,`prc`.`prc_confirmed_price` AS `price`,`prc`.`prc_fob_id` AS `fobid`,`fob`.`fob_price` AS `fobprice`,if((`grcm`.`id` is not null),'Set','Not Set') AS `greencomments`,`grn`.`qp_parameter` AS `green`,`cfd`.`cfd_dnt` AS `dnt`,if((`cfd`.`cfd_dnt` = 1),'DNT',NULL) AS `touch`,`prcss`.`prcss_name` AS `prcss_name`,`qltyd`.`qltyd_prcss_value` AS `qltyd_prcss_value`,`scr`.`scr_name` AS `scr_name`,`qltyd`.`qltyd_scr_value` AS `qltyd_scr_value`,`cp`.`cp_quality` AS `cp_quality`,`rw`.`rw_quality` AS `rw_quality`,group_concat(distinct `grcm`.`qp_id` separator ', ') AS `qualityParameterID`,ifnull(`cp`.`cp_score`,'XX') AS `cp_score`,ifnull(`rw`.`rw_score`,'XX') AS `rw_score`,`cb`.`id` AS `cbid`,`inv`.`inv_no` AS `invoice`,`prc`.`inv_weight` AS `inv_weight`,`inv`.`inv_date` AS `invoice_date`,`inv_usr`.`usr_name` AS `invoice_confirmedby`,`prc`.`id` AS `prcid`,`prc`.`bs_id` AS `bsid`,`py`.`py_no` AS `py_no`,`py`.`py_amount` AS `payment`,`py`.`py_date` AS `payment_date`,`py_usr`.`usr_name` AS `payment_confirmedby`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`br_usr`.`usr_name` AS `br_confirmedby`,`war`.`war_no` AS `warrant_no`,`war`.`war_weight` AS `warrant_weight`,`war`.`war_date` AS `warrant_date`,`war`.`war_comments` AS `war_comments`,`prc`.`gr_id` AS `grid`,`wrgn`.`wrid` AS `wrid` from (((((((((((((((((((((((((((((`sale_sl` `sl` left join `coffee_details_cfd` `cfd` on((`sl`.`id` = `cfd`.`sl_id`))) left join `country_ctr` `ctr` on((`ctr`.`id` = `sl`.`ctr_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `sl`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) join `certifications` `crt` on((`crt`.`cfdid` = `cfd`.`id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `green` `grn` on((`grn`.`cfdid` = `cfd`.`id`))) left join `purchases_prc` `prc` on((`prc`.`cfd_id` = `cfd`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) left join `freight_on_board_fob` `fob` on((`fob`.`id` = `prc`.`prc_fob_id`))) where (`sl`.`sltyp_id` = 2) group by `cfd`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `expected_arrival`
--

/*!50001 DROP TABLE IF EXISTS `expected_arrival`*/;
/*!50001 DROP VIEW IF EXISTS `expected_arrival`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `expected_arrival` AS select `cfd`.`id` AS `id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `slctrid`,`slr`.`slr_name` AS `slr_name`,`wr`.`wr_name` AS `wr_name`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cfd`.`csn_id` AS `csn_id`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`prc`.`inv_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`prc`.`inv_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,`cgrad`.`cgrad_name` AS `grade`,group_concat(distinct `qp`.`qp_parameter` separator ', ') AS `green`,if((`st`.`st_partial_delivery` is not null),(ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - `st`.`st_net_weight`),ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`))) AS `weight`,ifnull(floor((if((`st`.`st_partial_delivery` is not null),(ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - `st`.`st_net_weight`),ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`))) / 60)),`cfd`.`cfd_bags`) AS `bags`,ifnull(floor((if((`st`.`st_partial_delivery` is not null),(ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - `st`.`st_net_weight`),ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`))) % 60)),`cfd`.`cfd_pockets`) AS `pockets`,`sl`.`sl_hedge` AS `hedge`,`sl`.`sl_month` AS `month`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`prc`.`prc_confirmed_price` AS `price`,`br`.`id` AS `brid`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) / 50) * `prc`.`prc_confirmed_price`) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,`st`.`st_moisture` AS `st_moisture`,`st`.`pkg_id` AS `pkg_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`sloc`.`loc_row_id` AS `loc_row_id`,`sloc`.`loc_column_id` AS `loc_column_id`,`sloc`.`btc_zone` AS `btc_zone`,`gr`.`gr_number` AS `gr_number`,`btc`.`btc_packages` AS `btc_packages`,`cfd`.`slr_id` AS `slrid`,`prall`.`id` AS `prallid`,`war`.`id` AS `warid`,`war`.`war_no` AS `war_no`,`st`.`st_partial_delivery` AS `partial_delivery` from (((((((((((((((((((`coffee_details_cfd` `cfd` left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `purchases_prc` `prc` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `batch_btc` `btc` on((`btc`.`st_id` = `st`.`id`))) left join `stock_location_sloc` `sloc` on((`sloc`.`bt_id` = `btc`.`id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `quality_parameters_qp` `qp` on((`qp`.`id` = `grcm`.`qp_id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`st`.`cb_id`,`prc`.`cb_id`)))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = ifnull(`st`.`br_id`,`prc`.`br_id`)))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `provisional_allocation_prall` `prall` on((`prall`.`cfd_id` = `cfd`.`id`))) where ((((`prc`.`rl_id` is not null) and isnull(`st`.`st_net_weight`) and (`cb`.`bt_id` = 1) and isnull(`prc`.`gr_id`)) or (`st`.`st_partial_delivery` is not null)) and (`prc`.`sst_id` = 2)) group by `cfd`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `green`
--

/*!50001 DROP TABLE IF EXISTS `green`*/;
/*!50001 DROP VIEW IF EXISTS `green`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `green` AS select `cfd`.`id` AS `cfdid`,group_concat(`qp`.`qp_parameter` separator ', ') AS `qp_parameter`,`qp`.`qp_description` AS `qp_description` from ((`coffee_details_cfd` `cfd` left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `quality_parameters_qp` `qp` on((`qp`.`id` = `grcm`.`qp_id`))) group by `cfd`.`id` order by group_concat(`qp`.`qp_parameter` separator ', ') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `green_size`
--

/*!50001 DROP TABLE IF EXISTS `green_size`*/;
/*!50001 DROP VIEW IF EXISTS `green_size`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `green_size` AS select count(0) AS `count`,`qps`.`id` AS `id`,`qps`.`qg_id` AS `qg_id`,`qps`.`qp_parameter` AS `qp_parameter`,`qps`.`qp_description` AS `qp_description`,`qps`.`created_at` AS `created_at`,`qps`.`updated_at` AS `updated_at` from `quality_parameters_qp` `qps` where (`qps`.`qg_id` = 1) group by `qps`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `grns_received_monthly`
--

/*!50001 DROP TABLE IF EXISTS `grns_received_monthly`*/;
/*!50001 DROP VIEW IF EXISTS `grns_received_monthly`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grns_received_monthly` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,`cb`.`cb_name` AS `cb_name`,`cg`.`cg_name` AS `cg_name`,`st`.`st_net_weight` AS `weight`,(`st`.`st_net_weight` - ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`))) AS `weight_difference`,floor((`st`.`st_net_weight` / 60)) AS `bags`,(`st`.`st_net_weight` % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,ifnull(`prc`.`prc_confirmed_price`,format((`stb`.`stb_value` / `st`.`st_net_weight`),2)) AS `price`,format(ifnull(((`st`.`st_net_weight` / 50) * `prc`.`prc_confirmed_price`),`stb`.`stb_value`),2) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`prc`.`inv_weight` AS `invoiced_weight`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_gross_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month` from ((((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`pall`.`pr_id` <> 0)))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `coffee_growers_cg` `cg` on((`cg`.`id` = `br`.`cg_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`br`.`cb_id`,`st`.`cb_id`)))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and (`st`.`sts_id` = 1)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `grns_received_monthly_diffrence`
--

/*!50001 DROP TABLE IF EXISTS `grns_received_monthly_diffrence`*/;
/*!50001 DROP VIEW IF EXISTS `grns_received_monthly_diffrence`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grns_received_monthly_diffrence` AS select `grns_received_monthly`.`outturn` AS `outturn`,`grns_received_monthly`.`grade` AS `grade`,`grns_received_monthly`.`gr_number` AS `gr_number`,`grns_received_monthly`.`csn_season` AS `csn_season`,`grns_received_monthly`.`cb_name` AS `cb_name`,`grns_received_monthly`.`mark` AS `mark`,`grns_received_monthly`.`seller` AS `seller`,`grns_received_monthly`.`warehouse_from` AS `warehouse_from`,`grns_received_monthly`.`location` AS `location`,`grns_received_monthly`.`created_at` AS `created_at`,`grns_received_monthly`.`month` AS `month`,sum(`grns_received_monthly`.`weight`) AS `weight`,ifnull(`grns_received_monthly`.`warrant_weight`,ifnull(`grns_received_monthly`.`invoiced_weight`,`grns_received_monthly`.`ott_weight`)) AS `expected_weight`,(sum(`grns_received_monthly`.`weight`) - ifnull(`grns_received_monthly`.`warrant_weight`,ifnull(`grns_received_monthly`.`invoiced_weight`,`grns_received_monthly`.`ott_weight`))) AS `weight_difference` from `grns_received_monthly` group by `grns_received_monthly`.`outturn`,`grns_received_monthly`.`grade`,`grns_received_monthly`.`csn_season`,`grns_received_monthly`.`lot`,ifnull(`grns_received_monthly`.`warrant_weight`,ifnull(`grns_received_monthly`.`invoiced_weight`,`grns_received_monthly`.`ott_weight`)),`grns_received_monthly`.`cb_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `grns_received_monthly_warehouse_days`
--

/*!50001 DROP TABLE IF EXISTS `grns_received_monthly_warehouse_days`*/;
/*!50001 DROP VIEW IF EXISTS `grns_received_monthly_warehouse_days`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grns_received_monthly_warehouse_days` AS select `gr`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`wb`.`wb_ticket` AS `wb_ticket`,`wb`.`wb_delivery_number` AS `wb_delivery_number`,`wb`.`wb_vehicle_plate` AS `wb_vehicle_plate`,`wb`.`wb_weight_in` AS `wb_weight_in`,`wb`.`wb_weight_out` AS `wb_weight_out`,`wb`.`wb_time_in` AS `wb_time_in`,`wb`.`wb_time_out` AS `wb_time_out`,`wb`.`wb_movement_permit` AS `wb_movement_permit`,`wb`.`wb_driver_name` AS `wb_driver_name`,`wb`.`wb_driver_id` AS `wb_driver_id`,`wb`.`wb_dispatch_date` AS `wb_dispatch_date`,`st`.`id` AS `stid`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`st`.`st_net_weight` AS `st_net_weight`,`st`.`st_bags` AS `st_bags`,`st`.`st_pockets` AS `st_pockets`,`st`.`id` AS `crd_id`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,`cfd`.`cfd_outturn` AS `outturn`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,`cgrad`.`cgrad_name` AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,`prc`.`prc_confirmed_price` AS `prc_confirmed_price`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`war`.`war_no` AS `warrant_no`,`wr`.`wr_name` AS `wr_name`,`wr`.`id` AS `wr_id`,`sl`.`sl_date` AS `sl_date`,(`sl`.`sl_date` + interval 7 day) AS `prompt_date`,(to_days(`wb`.`wb_dispatch_date`) - to_days((`sl`.`sl_date` + interval 7 day))) AS `storage_days`,`wr_rts`.`storage_rate` AS `storage_rate`,round((((to_days(`wb`.`wb_dispatch_date`) - to_days((`sl`.`sl_date` + interval 7 day))) * `wr_rts`.`storage_rate`) * (`cfd`.`cfd_bags` + (case when (`cfd`.`cfd_pockets` > 0) then 1 else 0 end))),2) AS `storage_charges`,`wr_rts`.`handling_bag_rate` AS `handling_bag_rate`,round((`wr_rts`.`handling_bag_rate` * (`cfd`.`cfd_bags` + (case when (`cfd`.`cfd_pockets` > 0) then 1 else 0 end))),2) AS `handling_charges`,`wr_rts`.`warrant_rate` AS `warrant_rate` from ((((((((((((((((((((((((((((((`grn_gr` `gr` left join `weighbridge_wb` `wb` on((`wb`.`id` = `gr`.`wb_id`))) left join `stock_st` `st` on((`st`.`gr_id` = `gr`.`id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `wr_rates` `wr_rts` on((`wr`.`id` = `wr_rts`.`wr_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) where (`sl`.`sltyp_id` = 1) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `grns_received_summary`
--

/*!50001 DROP TABLE IF EXISTS `grns_received_summary`*/;
/*!50001 DROP VIEW IF EXISTS `grns_received_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grns_received_summary` AS select sum(`grns_received_monthly_diffrence`.`weight`) AS `weight`,sum(`grns_received_monthly_diffrence`.`expected_weight`) AS `expected_weight`,`grns_received_monthly_diffrence`.`warehouse_from` AS `warehouse_from`,`grns_received_monthly_diffrence`.`cb_name` AS `cb_name`,monthname(`grns_received_monthly_diffrence`.`created_at`) AS `month`,year(`grns_received_monthly_diffrence`.`created_at`) AS `csn_season`,sum(`grns_received_monthly_diffrence`.`weight_difference`) AS `weight_difference`,((sum(`grns_received_monthly_diffrence`.`weight_difference`) / sum(`grns_received_monthly_diffrence`.`expected_weight`)) * 100) AS `percentage_weight_difference` from `grns_received_monthly_diffrence` group by `grns_received_monthly_diffrence`.`warehouse_from`,`grns_received_monthly_diffrence`.`month`,`grns_received_monthly_diffrence`.`cb_name`,year(`grns_received_monthly_diffrence`.`created_at`) order by `grns_received_monthly_diffrence`.`created_at` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `grns_view`
--

/*!50001 DROP TABLE IF EXISTS `grns_view`*/;
/*!50001 DROP VIEW IF EXISTS `grns_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grns_view` AS select `gr`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`wb`.`wb_ticket` AS `wb_ticket`,`wb`.`wb_delivery_number` AS `wb_delivery_number`,`wb`.`wb_vehicle_plate` AS `wb_vehicle_plate`,`wb`.`wb_weight_in` AS `wb_weight_in`,`wb`.`wb_weight_out` AS `wb_weight_out`,`wb`.`wb_time_in` AS `wb_time_in`,`wb`.`wb_time_out` AS `wb_time_out`,`wb`.`wb_movement_permit` AS `wb_movement_permit`,`wb`.`wb_driver_name` AS `wb_driver_name`,`wb`.`wb_driver_id` AS `wb_driver_id`,`wb`.`wb_dispatch_date` AS `wb_dispatch_date`,`st`.`id` AS `stid`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`st`.`st_net_weight` AS `st_net_weight`,`st`.`st_packages` AS `st_packages`,`st`.`st_bags` AS `st_bags`,`st`.`st_pockets` AS `st_pockets`,`st`.`id` AS `crd_id`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,`cfd`.`cfd_outturn` AS `outturn`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,`cgrad`.`cgrad_name` AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,`prc`.`prc_confirmed_price` AS `prc_confirmed_price`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`war`.`war_no` AS `warrant_no` from ((((((((((((((((((((((((((((`grn_gr` `gr` left join `weighbridge_wb` `wb` on((`wb`.`id` = `gr`.`wb_id`))) left join `stock_st` `st` on((`st`.`gr_id` = `gr`.`id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) where (`sl`.`sltyp_id` = 1) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `highest_batch`
--

/*!50001 DROP TABLE IF EXISTS `highest_batch`*/;
/*!50001 DROP VIEW IF EXISTS `highest_batch`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `highest_batch` AS select max(`sloc`.`id`) AS `slocid`,`btc`.`id` AS `id`,`btc`.`st_id` AS `st_id`,`loc`.`wr_id` AS `wr_id` from ((`batch_btc` `btc` join `stock_location_sloc` `sloc` on((`btc`.`id` = `sloc`.`bt_id`))) left join `location_loc` `loc` on((`loc`.`id` = `sloc`.`loc_row_id`))) group by `btc`.`id` order by max(`sloc`.`id`) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `long_short`
--

/*!50001 DROP TABLE IF EXISTS `long_short`*/;
/*!50001 DROP VIEW IF EXISTS `long_short`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `long_short` AS select `sscv`.`code` AS `code`,round((`sscv`.`weight` / 60),0) AS `stock_bags`,round((`sscvwp`.`weight` / 60),0) AS `allocated_bags`,`sscv`.`value` AS `value`,round(`sscv`.`diff`,2) AS `bric_diff`,round((sum((`sap`.`weight` * `sap`.`differential`)) / sum(`sap`.`weight`)),2) AS `stock_diff` from ((`sum_stock_code_view` `sscv` left join `sum_stock_code_view_working_progress` `sscvwp` on((`sscvwp`.`code` = `sscv`.`code`))) left join `stocks_and_purchased` `sap` on((`sap`.`bric_code` = `sscv`.`code`))) group by `sscv`.`code` order by `sscv`.`code` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `long_short_internal`
--

/*!50001 DROP TABLE IF EXISTS `long_short_internal`*/;
/*!50001 DROP VIEW IF EXISTS `long_short_internal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `long_short_internal` AS select `sscv`.`code` AS `code`,round((`sscv`.`weight` / 60),0) AS `stock_bags`,round((`sscvwp`.`weight` / 60),0) AS `allocated_bags`,`sscv`.`value` AS `value`,round(`sscv`.`diff`,2) AS `bric_diff`,round((sum((`sap`.`weight` * `sap`.`differential`)) / sum(`sap`.`weight`)),2) AS `stock_diff` from ((`sum_stock_internal_code_view` `sscv` left join `sum_stock_internal_code_view_working_progress` `sscvwp` on((`sscvwp`.`code` = `sscv`.`code`))) left join `stocks_and_purchased` `sap` on((`sap`.`code` = `sscv`.`code`))) group by `sscv`.`code` order by `sscv`.`code` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `lots_bought`
--

/*!50001 DROP TABLE IF EXISTS `lots_bought`*/;
/*!50001 DROP VIEW IF EXISTS `lots_bought`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `lots_bought` AS select `cfd`.`id` AS `id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `slctrid`,(`sl`.`sl_date` + interval 7 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`ml`.`ml_name` AS `ml_name`,`wrgn`.`rgn_name` AS `region`,`wrgn`.`wrid` AS `wrid`,`wrgn`.`wr_name` AS `warehouse`,`cfd`.`cfd_lot_no` AS `lot`,`cfd`.`cfd_outturn` AS `outturn`,`slr`.`id` AS `slrid`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,`cgrad`.`cgrad_name` AS `grade`,`cfd`.`cfd_weight` AS `weight`,`cfd`.`cfd_bags` AS `bags`,`cfd`.`cfd_pockets` AS `pockets`,`sl`.`sl_hedge` AS `hedge`,`sl`.`sl_month` AS `month`,if((`grcm`.`id` is not null),'Set','Not Set') AS `greencomments`,`cfd`.`cfd_dnt` AS `dnt`,if((`cfd`.`cfd_dnt` = 1),'DNT',NULL) AS `touch`,`prcss`.`prcss_name` AS `prcss_name`,`qltyd`.`qltyd_prcss_value` AS `qltyd_prcss_value`,`scr`.`scr_name` AS `scr_name`,`qltyd`.`qltyd_scr_value` AS `qltyd_scr_value`,`cp`.`cp_quality` AS `cp_quality`,`rw`.`rw_quality` AS `rw_quality`,`qltyd`.`qltyd_comments` AS `final_comments`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`prc`.`prc_confirmed_price` AS `price`,`inv`.`inv_no` AS `invoice`,`inv`.`inv_date` AS `invoice_date`,`inv_usr`.`usr_name` AS `invoice_confirmedby`,`py`.`py_no` AS `py_no`,`py`.`py_amount` AS `payment`,`py`.`py_date` AS `payment_date`,`py_usr`.`usr_name` AS `payment_confirmedby`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`br_usr`.`usr_name` AS `br_confirmedby`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`war`.`war_no` AS `warrant_no`,`war`.`war_weight` AS `warrant_weight`,`war`.`war_date` AS `warrant_date`,`war`.`war_comments` AS `war_comments`,`sst`.`sst_name` AS `status`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,`rl`.`rl_confirmedby` AS `rl_confirmedby`,`trp`.`trp_name` AS `trp_name` from (((((((((((((((((((((((((`sale_sl` `sl` left join `coffee_details_cfd` `cfd` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `purchases_prc` `prc` on((`prc`.`cfd_id` = `cfd`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) where (`sl`.`sltyp_id` = 1) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `mills_region`
--

/*!50001 DROP TABLE IF EXISTS `mills_region`*/;
/*!50001 DROP VIEW IF EXISTS `mills_region`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `mills_region` AS select `ml`.`id` AS `mlid`,`rgn`.`id` AS `rgnid`,`rgn`.`ctr_id` AS `ctr_id`,`rgn`.`rgn_name` AS `rgn_name`,`rgn`.`rgn_description` AS `rgn_description`,`ml`.`ml_name` AS `ml_name`,`ml`.`ml_initials` AS `ml_initials`,`ml`.`ml_description` AS `ml_description` from (`mill_ml` `ml` left join `region_rgn` `rgn` on((`ml`.`rgn_id` = `rgn`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `process_results_per_bric`
--

/*!50001 DROP TABLE IF EXISTS `process_results_per_bric`*/;
/*!50001 DROP VIEW IF EXISTS `process_results_per_bric`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `process_results_per_bric` AS select `st`.`id` AS `id`,`br`.`br_no` AS `br_no`,`bs`.`bs_code` AS `bs_code`,`bs`.`bs_quality` AS `bs_quality`,`ibs`.`ibs_code` AS `internal_bs_code`,`ibs`.`ibs_quality` AS `internal_bs_quality`,`st`.`st_outturn` AS `st_outturn`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`prs`.`allocated_weight` AS `allocated_weight`,`prs`.`results` AS `results`,`st`.`st_net_weight` AS `current_weight`,`stb`.`stb_bulk_ratio` AS `ratio`,round((ifnull(`stb`.`stb_bulk_ratio`,1) * `prts`.`prts_weight`),0) AS `bric_weight`,`prt`.`prt_name` AS `prt_name`,`csn`.`csn_season` AS `csn_season`,`pr`.`pr_date` AS `pr_date`,`st`.`created_at` AS `confirmation_date` from ((((((((((((((`stock_st` `st` left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((`pr`.`id` = `prts`.`pr_id`))) left join `stock_st` `st_processed` on((`st_processed`.`pr_id` = `prts`.`pr_id`))) left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st_processed`.`id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = ifnull(`st`.`prt_id`,`st_processed`.`prt_id`)))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `pr`.`csn_id`))) left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `st`.`id`))) left join `bric_br` `br` on((`br`.`id` = `stb`.`br_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `process_results_summary` `prs` on((`prs`.`pr_id` = `pr`.`id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `coffee_growers_cg` `cg` on((ifnull(`stb`.`cgr_id`,'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`br`.`cb_id`,'1')))) where ((`st`.`usr_id` is not null) and isnull(`st`.`prc_id`) and (`st_processed`.`pr_id` is not null)) group by `st`.`id`,`prts`.`id`,`stb`.`id` order by `st`.`st_outturn` desc,`prt`.`prt_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `process_results_per_bric_buyer`
--

/*!50001 DROP TABLE IF EXISTS `process_results_per_bric_buyer`*/;
/*!50001 DROP VIEW IF EXISTS `process_results_per_bric_buyer`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `process_results_per_bric_buyer` AS select `prbs`.`cb_name` AS `cb_name`,round((`prbs`.`allocated_weight` * if((sum(`prbs`.`ratio`) > 1),1,sum(`prbs`.`ratio`))),0) AS `total_allocated`,round((`prbs`.`results` * if((sum(`prbs`.`ratio`) > 1),1,sum(`prbs`.`ratio`))),0) AS `results`,round(((`prbs`.`allocated_weight` * if((sum(`prbs`.`ratio`) > 1),1,sum(`prbs`.`ratio`))) - (`prbs`.`results` * if((sum(`prbs`.`ratio`) > 1),1,sum(`prbs`.`ratio`)))),0) AS `diffrence`,monthname(`prbs`.`pr_date`) AS `month`,year(`prbs`.`pr_date`) AS `year`,`prbs`.`pr_date` AS `pr_date` from `process_results_per_bric` `prbs` group by `prbs`.`st_outturn` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `process_results_summary`
--

/*!50001 DROP TABLE IF EXISTS `process_results_summary`*/;
/*!50001 DROP VIEW IF EXISTS `process_results_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `process_results_summary` AS select `pr`.`id` AS `pr_id`,`spa`.`instruction_number` AS `instruction_number`,`sct`.`sct_number` AS `sct_number`,date_format(`pr`.`created_at`,'%d-%m-%Y') AS `instruction_date`,`spa`.`reference_name` AS `reference_name`,`spa`.`other_instructions` AS `other_instructions`,`spa`.`supervisor` AS `supervisor`,`spa`.`tags` AS `tags`,`spa`.`allocated_weight` AS `allocated_weight`,sum(`prts`.`prts_weight`) AS `results`,(sum(`prts`.`prts_weight`) - `spa`.`allocated_weight`) AS `balance` from (((`process_pr` `pr` left join `sum_process_allocation` `spa` on((`spa`.`pr_id` = `pr`.`id`))) left join `process_results_prts` `prts` on((`prts`.`pr_id` = `pr`.`id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) where (`pr`.`pr_confirmed_by` is not null) group by `pr`.`id` order by `pr`.`pr_date`,`spa`.`instruction_number` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `process_results_summary_per_bric`
--

/*!50001 DROP TABLE IF EXISTS `process_results_summary_per_bric`*/;
/*!50001 DROP VIEW IF EXISTS `process_results_summary_per_bric`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `process_results_summary_per_bric` AS select `prpb`.`st_outturn` AS `outturn`,`prpb`.`cb_name` AS `buyer`,`prpb`.`bs_quality` AS `quality`,`prpb`.`allocated_weight` AS `total_allocated`,`prpb`.`results` AS `total_results`,(`prpb`.`allocated_weight` - `prpb`.`results`) AS `total_diffrence`,sum(`prpb`.`bric_weight`) AS `weight`,`prpb`.`pr_date` AS `date` from `process_results_per_bric` `prpb` group by `prpb`.`st_outturn`,`prpb`.`cb_name` order by `prpb`.`pr_date` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `processes`
--

/*!50001 DROP TABLE IF EXISTS `processes`*/;
/*!50001 DROP VIEW IF EXISTS `processes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `processes` AS select `pr`.`id` AS `id`,`prt`.`id` AS `prt_id`,`pr`.`ctr_id` AS `ctrid`,`prcss`.`prcss_name` AS `process`,`prcss`.`prcss_initial` AS `process_initial`,`prcss`.`prcss_description` AS `process_description`,`pr`.`pr_instruction_number` AS `process_number`,`cpi`.`pri_name` AS `process_instructions`,`pr`.`pr_other_instructions` AS `process_other_instructions`,`prt`.`prt_name` AS `result_type`,`prt`.`prt_initials` AS `results_initials`,`prt`.`prt_description` AS `resulsts_description`,`pall`.`pall_allocated_weight` AS `allocated_weight`,`pr`.`pr_weight_in` AS `weight_in`,`prts`.`prts_weight` AS `weight_out`,`prts`.`prts_packages` AS `packages_out`,`ibs`.`ibs_code` AS `ibs_code`,`cgrad`.`cgrad_name` AS `cgrad_name`,`cp`.`cp_score` AS `cp_score`,`prts`.`sqltyd_acidity` AS `sqltyd_acidity`,`prts`.`sqltyd_body` AS `sqltyd_body`,`prts`.`sqltyd_flavour` AS `sqltyd_flavour`,`prts`.`sqltyd_description` AS `sqltyd_description`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`wr`.`wr_name` AS `wr_name`,`loc_row`.`loc_row` AS `loc_row`,`loc_column`.`loc_column` AS `loc_column`,`prts`.`btc_zone` AS `btc_zone` from (((((((((((`process_pr` `pr` left join `process_allocations_pall` `pall` on((`pall`.`pr_id` = `pr`.`id`))) left join `combined_process_instructions` `cpi` on((`cpi`.`prid` = `pr`.`id`))) left join `process_results_prts` `prts` on((`prts`.`pr_id` = `pr`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `pr`.`prcss_id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `prts`.`prt_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `prts`.`wr_id`))) left join `location_loc` `loc_row` on((`loc_row`.`id` = `prts`.`loc_row`))) left join `location_loc` `loc_column` on((`loc_column`.`id` = `prts`.`loc_column`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `prts`.`cp_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `prts`.`bs_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `prts`.`cgrad_id`))) group by `pr`.`id`,`prt`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `processes_summary`
--

/*!50001 DROP TABLE IF EXISTS `processes_summary`*/;
/*!50001 DROP VIEW IF EXISTS `processes_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `processes_summary` AS select `pr`.`id` AS `id`,`pr`.`ctr_id` AS `ctrid`,`csn`.`csn_season` AS `season`,`prcss`.`prcss_name` AS `process`,`prcss`.`prcss_initial` AS `process_initial`,`pr`.`pr_instruction_number` AS `process_number`,`pr`.`pr_weight_in` AS `pr_weight_in`,`prcss`.`prcss_description` AS `process_description`,`cpi`.`pri_name` AS `process_instructions`,`pr`.`pr_other_instructions` AS `process_other_instructions`,`sct`.`sct_number` AS `contract_number`,`sct`.`sct_description` AS `contract_description`,`sct`.`sct_month` AS `contract_month`,`sct`.`sct_bulk_date` AS `contract_bulk_date`,`sct`.`sct_disposal_date` AS `contract_disposal`,`sct`.`sct_shipped` AS `contract_shipment`,ifnull(`pr`.`pr_supervisor`,'') AS `supervisor`,year(`pr`.`pr_date`) AS `year`,`pr`.`pr_date` AS `process_date`,`pr`.`pr_confirmed_by` AS `process_confirmed_by` from ((((`process_pr` `pr` left join `combined_process_instructions` `cpi` on((`cpi`.`prid` = `pr`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `pr`.`prcss_id`))) left join `coffee_seasons_csn` `csn` on((`pr`.`csn_id` = `csn`.`id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) where (`pr`.`pr_okay_to_process` is not null) order by ifnull(`pr`.`updated_at`,`pr`.`created_at`) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `processing_instruction`
--

/*!50001 DROP TABLE IF EXISTS `processing_instruction`*/;
/*!50001 DROP VIEW IF EXISTS `processing_instruction`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `processing_instruction` AS select `pri`.`id` AS `id`,`prg`.`id` AS `prgid`,`prg`.`prcss_id` AS `prcss_id`,`prg`.`prg_input_type` AS `prg_input_type`,`prg`.`prg_instruction` AS `prg_instruction`,`pri`.`pri_name` AS `pri_name` from (`processing_group_prg` `prg` left join `processing_instruction_pri` `pri` on((`prg`.`id` = `pri`.`prg_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `processing_monthly_summary`
--

/*!50001 DROP TABLE IF EXISTS `processing_monthly_summary`*/;
/*!50001 DROP VIEW IF EXISTS `processing_monthly_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `processing_monthly_summary` AS select `prsb`.`cb_name` AS `cb_name`,sum(`prsb`.`total_allocated`) AS `total_allocated`,sum(`prsb`.`results`) AS `results`,sum(`prsb`.`diffrence`) AS `diffrence`,`prsb`.`month` AS `month`,`prsb`.`year` AS `year` from `process_results_per_bric_buyer` `prsb` group by `prsb`.`month`,`prsb`.`cb_name` order by `prsb`.`pr_date` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `processing_results`
--

/*!50001 DROP TABLE IF EXISTS `processing_results`*/;
/*!50001 DROP VIEW IF EXISTS `processing_results`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `processing_results` AS select `st`.`id` AS `id`,`st`.`st_outturn` AS `st_outturn`,`st_processed`.`br_id` AS `br_id`,`br`.`br_no` AS `br_no`,`st_processed`.`id` AS `st_processed_id`,`st_processed`.`st_outturn` AS `st_outturn_processed`,`st_processed`.`st_mark` AS `st_mark`,`cgrad`.`cgrad_name` AS `cgrad_name`,`prc`.`prc_confirmed_price` AS `prc_confirmed_price`,`st`.`st_net_weight` AS `current_weight`,`st_processed`.`st_net_weight` AS `initial_weight`,`pall`.`pall_allocated_weight` AS `allocated_weight`,round((`st_processed`.`st_value` * ifnull((ifnull(`pall`.`pall_allocated_weight`,`st_processed`.`st_net_weight`) / `st_processed`.`st_net_weight`),1)),0) AS `value`,round(((`st_processed`.`st_value` * ifnull((ifnull(`pall`.`pall_allocated_weight`,`st_processed`.`st_net_weight`) / `st_processed`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st_processed`.`st_net_weight`))),0) AS `price`,round(((((`st_processed`.`st_value` * ifnull((ifnull(`pall`.`pall_allocated_weight`,`st_processed`.`st_net_weight`) / `st_processed`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st_processed`.`st_net_weight`))) / 1.10231) - `st_processed`.`st_hedge`),0) AS `diff`,round(`st_processed`.`st_hedge`,0) AS `hedge`,`prt`.`prt_name` AS `prt_name`,`csn`.`csn_season` AS `csn_season`,date_format(`prts`.`created_at`,'%d-%m-%Y') AS `date`,`prts`.`created_at` AS `created_at` from ((((((((((`stock_st` `st` left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((`pr`.`id` = `prts`.`pr_id`))) left join `process_allocations_pall` `pall` on((`pall`.`pr_id` = `pr`.`id`))) left join `stock_st` `st_processed` on((`st_processed`.`id` = `pall`.`st_id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = ifnull(`st`.`prt_id`,`st_processed`.`prt_id`)))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `pr`.`csn_id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st_processed`.`prc_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `st_processed`.`cgrad_id`))) left join `bric_br` `br` on((`st_processed`.`br_id` = `br`.`id`))) where ((`st`.`usr_id` is not null) and isnull(`st`.`prc_id`)) group by `st`.`id`,`st_processed`.`id`,`prts`.`id` order by `prts`.`created_at` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `provisional_summary`
--

/*!50001 DROP TABLE IF EXISTS `provisional_summary`*/;
/*!50001 DROP VIEW IF EXISTS `provisional_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `provisional_summary` AS select `pr`.`id` AS `id`,`pr`.`ctr_id` AS `ctrid`,`csn`.`csn_season` AS `season`,`prcss`.`prcss_name` AS `process`,`prcss`.`prcss_initial` AS `process_initial`,`pr`.`pbk_instruction_number` AS `process_number`,`pr`.`pbk_weight_in` AS `pr_weight_in`,`prcss`.`prcss_description` AS `process_description`,`pr`.`pbk_other_instructions` AS `process_other_instructions`,`sct`.`sct_number` AS `contract_number`,`sct`.`sct_description` AS `contract_description`,`sct`.`sct_month` AS `contract_month`,`sct`.`sct_bulk_date` AS `contract_bulk_date`,`sct`.`sct_disposal_date` AS `contract_disposal`,`sct`.`sct_shipped` AS `contract_shipment`,`pr`.`pbk_date` AS `process_date`,`pr`.`pbk_confirmed_by` AS `process_confirmed_by`,`prp`.`prp_name` AS `prp_name`,`pr`.`pbk_comments` AS `pbk_comments` from ((((`provisional_bulk_pbk` `pr` left join `processing_prcss` `prcss` on((`prcss`.`id` = `pr`.`prcss_id`))) left join `coffee_seasons_csn` `csn` on((`pr`.`csn_id` = `csn`.`id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) left join `provisonal_purpose_prp` `prp` on((`prp`.`id` = `pr`.`prp_id`))) order by ifnull(`pr`.`updated_at`,`pr`.`created_at`) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchase_contract_summary`
--

/*!50001 DROP TABLE IF EXISTS `purchase_contract_summary`*/;
/*!50001 DROP VIEW IF EXISTS `purchase_contract_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchase_contract_summary` AS select `cfd`.`sl_id` AS `sl_id`,`sl`.`ctr_id` AS `ctr_id`,`sl`.`sl_no` AS `sale`,`sl`.`csn_id` AS `csn_id`,`br`.`br_no` AS `bric`,`bs`.`bs_quality` AS `quality`,`bs`.`bs_code` AS `code`,`br`.`br_purchased_weight` AS `kilos`,round(((`br`.`br_price_pounds` * 1.10231) - `sl`.`sl_margin`),0) AS `costs`,round(((((`br`.`br_price_pounds` * 1.10231) - `sl`.`sl_margin`) * `br`.`br_purchased_weight`) / 50),2) AS `value`,round(`sl`.`sl_hedge`,2) AS `hedge`,round(((((`br`.`br_price_pounds` * 1.10231) - `sl`.`sl_margin`) / 1.10231) - `sl`.`sl_hedge`),2) AS `diff`,round((`br`.`br_purchased_weight` / 60),0) AS `br_bags`,round(`br`.`br_price_per_fifty`,0) AS `price_per_fifty`,round(`br`.`br_price_pounds`,2) AS `br_price_pounds`,round(`br`.`br_diffrential`,2) AS `br_diffrential`,round(`br`.`br_value`,2) AS `br_value` from ((((`purchases_prc` `prc` left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) group by `br`.`id` order by `br`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchases_summary`
--

/*!50001 DROP TABLE IF EXISTS `purchases_summary`*/;
/*!50001 DROP VIEW IF EXISTS `purchases_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchases_summary` AS select sum(`stocks_and_purchased`.`weight`) AS `weight`,`stocks_and_purchased`.`slr_name` AS `slr_name`,`stocks_and_purchased`.`csn_season` AS `csn_season`,`stocks_and_purchased`.`wr_name` AS `wr_name`,`stocks_and_purchased`.`buyer` AS `buyer`,monthname(`stocks_and_purchased`.`purchase_date`) AS `month` from `stocks_and_purchased` where ((`stocks_and_purchased`.`slr_name` is not null) and (`stocks_and_purchased`.`purchase_date` >= (now() - interval 3 month))) group by `stocks_and_purchased`.`slr_name`,`stocks_and_purchased`.`wr_name`,monthname(`stocks_and_purchased`.`purchase_date`),`stocks_and_purchased`.`buyer` order by `stocks_and_purchased`.`purchase_date` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `release`
--

/*!50001 DROP TABLE IF EXISTS `release`*/;
/*!50001 DROP VIEW IF EXISTS `release`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `release` AS select `rl`.`rl_ref_no` AS `reference_number`,`rl`.`rl_no` AS `realease_instruction_number`,right(`rl`.`rl_ref_no`,7) AS `previous_no`,`rl`.`rl_date` AS `rl_date`,`usr`.`usr_name` AS `Confirmed_By` from ((`release_instructions_rl` `rl` left join `transporters_trp` `trp` on((`rl`.`trp_id` = `trp`.`id`))) left join `users_usr` `usr` on((`usr`.`id` = `rl`.`rl_confirmedby`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sale_lots`
--

/*!50001 DROP TABLE IF EXISTS `sale_lots`*/;
/*!50001 DROP VIEW IF EXISTS `sale_lots`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sale_lots` AS select `cfd`.`id` AS `id`,`cfd`.`sl_id` AS `slid`,upper(`sl`.`sl_no`) AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `slctrid`,`ctr`.`ctr_name` AS `ctrname`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cg`.`cg_name` AS `cg_name`,`ml`.`ml_name` AS `ml_name`,`wrgn`.`rgn_name` AS `region`,`wrgn`.`wrid` AS `wrid`,`wrgn`.`wr_name` AS `warehouse`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`prc`.`inv_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,`slr`.`id` AS `slrid`,`slr`.`slr_initials` AS `seller`,ifnull(`prc`.`inv_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,`cgrad`.`cgrad_name` AS `grade`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) AS `weight`,ifnull(floor((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) / 60)),`cfd`.`cfd_bags`) AS `bags`,ifnull(floor((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) % 60)),`cfd`.`cfd_pockets`) AS `pockets`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`sl`.`sl_hedge` AS `hedge`,`sl`.`sl_month` AS `month`,`sl`.`sl_margin` AS `sl_margin`,`sl`.`sltyp_id` AS `sltyp_id`,if((`grcm`.`id` is not null),'Set','Not Set') AS `greencomments`,if((`cfd`.`cfd_dnt` = 1),'XX',group_concat(distinct `qp`.`qp_parameter` separator ', ')) AS `green`,group_concat(distinct `grcm`.`qp_id` separator ', ') AS `qualityParameterID`,`cfd`.`cfd_dnt` AS `dnt`,if((`cfd`.`cfd_dnt` = 1),'DNT',NULL) AS `touch`,`prcss`.`prcss_initial` AS `prcss_name`,`qltyd`.`qltyd_prcss_value` AS `qltyd_prcss_value`,`scr`.`scr_name` AS `scr_name`,`qltyd`.`qltyd_scr_value` AS `qltyd_scr_value`,`qltyd`.`qltyd_acidity` AS `acidity`,`qltyd`.`qltyd_body` AS `body`,`qltyd`.`qltyd_flavour` AS `flavour`,`cp`.`cp_quality` AS `cp_quality`,if((`cfd`.`cfd_dnt` = 1),'XX',`cp`.`cp_score`) AS `cp_score`,if((`cfd`.`cfd_dnt` = 1),'XX',`rw`.`rw_score`) AS `rw_score`,if((`cfd`.`cfd_dnt` = 1),'XX',`rw`.`rw_quality`) AS `rw_quality`,`qltyd`.`qltyd_comments` AS `final_comments`,`cb`.`id` AS `cbid`,`cfd`.`cg_id` AS `cgid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`prc`.`prc_confirmed_price` AS `price`,`prc`.`prc_bric_value` AS `value`,`prc`.`prc_fob_id` AS `fobid`,`fob`.`fob_price` AS `fobprice`,`inv`.`inv_no` AS `invoice`,`prc`.`inv_weight` AS `inv_weight`,`inv`.`inv_date` AS `invoice_date`,`inv_usr`.`usr_name` AS `invoice_confirmedby`,`py`.`py_no` AS `py_no`,`py`.`py_amount` AS `payment`,`py`.`py_date` AS `payment_date`,`py_usr`.`usr_name` AS `payment_confirmedby`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`br_usr`.`usr_name` AS `br_confirmedby`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `code`,`bs`.`bs_quality` AS `quality`,`ibs`.`id` AS `ibsid`,`ibs`.`ibs_code` AS `ibscode`,`ibs`.`ibs_quality` AS `ibsquality`,`war`.`war_no` AS `warrant_no`,`war`.`war_weight` AS `warrant_weight`,`war`.`war_date` AS `warrant_date`,`war`.`war_comments` AS `war_comments`,`sst`.`sst_name` AS `status`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,`rl`.`rl_confirmedby` AS `rl_confirmedby`,`trp`.`trp_name` AS `trp_name` from ((((((((((((((((((((((((((((((((`sale_sl` `sl` left join `country_ctr` `ctr` on((`ctr`.`id` = `sl`.`ctr_id`))) left join `coffee_details_cfd` `cfd` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = `cfd`.`csn_id`))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `quality_parameters_qp` `qp` on((`qp`.`id` = `grcm`.`qp_id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `purchases_prc` `prc` on((`prc`.`cfd_id` = `cfd`.`id`))) left join `coffee_growers_cg` `cg` on((`cfd`.`cg_id` = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`prc`.`bs_id`,`cfd`.`bs_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `prc`.`ibs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) left join `freight_on_board_fob` `fob` on((`fob`.`id` = `prc`.`prc_fob_id`))) where (isnull(`prc`.`gr_id`) and (`sl`.`id` >= 644) and isnull(`cfd`.`cfd_ended_by`)) group by `cfd`.`id` order by `sl`.`sl_no`,`cfd`.`cfd_lot_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_contract_summary_per_month`
--

/*!50001 DROP TABLE IF EXISTS `sales_contract_summary_per_month`*/;
/*!50001 DROP VIEW IF EXISTS `sales_contract_summary_per_month`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_contract_summary_per_month` AS select `sct`.`id` AS `id`,`sct`.`ctr_id` AS `ctr_id`,`sct`.`cl_id` AS `cl_id`,`sct`.`sct_number` AS `sct_number`,`sct`.`sct_description` AS `sct_description`,ifnull(`sct`.`packages`,0) AS `actual_weight`,round((sum(`stff`.`stff_weight`) / 60),0) AS `stuffed`,(ifnull(`sct`.`packages`,0) - round((sum(`stff`.`stff_weight`) / 60),0)) AS `packages`,ifnull(`sct`.`yr_name`,'empty') AS `yr_name`,`sct`.`yearmonth` AS `yearmonth`,ifnull(`sct`.`sct_month`,'empty') AS `sct_month`,`sct`.`mth_name` AS `mth_name`,`sct`.`sct_bulk_date` AS `sct_bulk_date`,`sct`.`sct_disposal_date` AS `sct_disposal_date`,`sct`.`sct_shipped` AS `sct_shipped`,`sct`.`bs_id` AS `bs_id`,`bs`.`bs_code` AS `bs_code`,ifnull(`sct`.`sct_stuffed`,0) AS `sct_stuffed`,`sct`.`sct_packaging_method` AS `sct_packaging_method`,`sct`.`pkg_id` AS `pkg_id`,`sct`.`yr_id` AS `yr_id`,`sct`.`sct_complemantary_condition` AS `sct_complemantary_condition`,concat('-',(ifnull(`sct`.`weight`,0) - ifnull(sum(`stff`.`stff_weight`),0))) AS `weight`,concat('-',round(((ifnull(`sct`.`weight`,0) - ifnull(sum(`stff`.`stff_weight`),0)) / 60),0)) AS `bags`,`sct`.`created_at` AS `created_at`,`sct`.`updated_at` AS `updated_at` from ((`sales_contract_summary_per_month_prep` `sct` left join `basket_bs` `bs` on((`bs`.`id` = `sct`.`bs_id`))) left join `stuffing_stff` `stff` on((`stff`.`sct_id` = `sct`.`id`))) group by `sct`.`id` order by year(`sct`.`sct_start_date`),month(`sct`.`sct_start_date`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_contract_summary_per_month_prep`
--

/*!50001 DROP TABLE IF EXISTS `sales_contract_summary_per_month_prep`*/;
/*!50001 DROP VIEW IF EXISTS `sales_contract_summary_per_month_prep`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_contract_summary_per_month_prep` AS select `sct`.`id` AS `id`,`sct`.`ctr_id` AS `ctr_id`,`sct`.`cl_id` AS `cl_id`,`sct`.`sct_number` AS `sct_number`,`sct`.`sct_description` AS `sct_description`,sum(`sct`.`sct_packages`) AS `packages`,year(`sct`.`sct_start_date`) AS `yr_name`,concat(year(`sct`.`sct_start_date`),month(`sct`.`sct_start_date`)) AS `yearmonth`,`sct`.`sct_month` AS `sct_month`,`sct`.`sct_start_date` AS `sct_start_date`,monthname(`sct`.`sct_start_date`) AS `mth_name`,`sct`.`sct_bulk_date` AS `sct_bulk_date`,`sct`.`sct_disposal_date` AS `sct_disposal_date`,`sct`.`sct_shipped` AS `sct_shipped`,`sct`.`bs_id` AS `bs_id`,`sct`.`sct_stuffed` AS `sct_stuffed`,`sct`.`sct_packaging_method` AS `sct_packaging_method`,`sct`.`pkg_id` AS `pkg_id`,`sct`.`yr_id` AS `yr_id`,`sct`.`sct_complemantary_condition` AS `sct_complemantary_condition`,sum(`sct`.`sct_weight`) AS `weight`,`sct`.`created_at` AS `created_at`,`sct`.`updated_at` AS `updated_at` from ((`sales_contract_sct` `sct` left join `months_mth` `mth` on((`mth`.`id` = `sct`.`sct_month`))) left join `years_yr` `yr` on((`yr`.`id` = `sct`.`yr_id`))) where (isnull(`sct`.`sct_stuffed`) and (`sct`.`sct_start_date` is not null) and isnull(`sct`.`sct_cancelled`)) group by month(`sct`.`sct_start_date`),year(`sct`.`sct_start_date`),`sct`.`bs_id` desc order by year(`sct`.`sct_start_date`),month(`sct`.`sct_start_date`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_contract_summary_view`
--

/*!50001 DROP TABLE IF EXISTS `sales_contract_summary_view`*/;
/*!50001 DROP VIEW IF EXISTS `sales_contract_summary_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_contract_summary_view` AS select `stres`.`id` AS `stid`,`sct`.`id` AS `sctid`,`sct`.`sct_number` AS `sct_number`,`sct`.`sct_description` AS `sct_description`,`bs`.`bs_code` AS `bs_code`,`cl`.`cl_name` AS `cl_name`,`sct`.`sct_client_reference` AS `sct_client_reference`,`sct`.`sct_packages` AS `sct_packages`,`sct`.`sct_weight` AS `contract_weight`,`sct`.`sct_month` AS `sct_month`,`sct`.`sct_start_date` AS `sct_start_date`,`sct`.`sct_end_date` AS `sct_end_date`,`sct`.`sct_date` AS `sct_date`,`ssw`.`stff_date` AS `stuffing_date`,concat(ifnull(`yr`.`yr_name`,year(`sct`.`sct_date`)),'-',`mth`.`mth_name`) AS `mth_name`,year(`sct`.`sct_start_date`) AS `year_name_new`,(monthname(`sct`.`sct_start_date`) collate utf8_unicode_ci) AS `mth_name_new`,`sct`.`sct_disposal_date` AS `sct_disposal_date`,`pr`.`pr_instruction_number` AS `pr_instruction_number`,`prs`.`allocated_weight` AS `total_allocated`,`sct`.`sct_complemantary_condition` AS `sct_complemantary_condition`,`ssw`.`stuffed_weight` AS `stuffed_weight`,floor((`ssw`.`stuffed_weight` / `bgs`.`bgs_size`)) AS `stuffed_bags`,floor((`ssw`.`stuffed_weight` % `bgs`.`bgs_size`)) AS `stuffed_pockets`,round((`ssw`.`stuffed_weight` / `bgs`.`bgs_size`),0) AS `stuffed_packages`,(round((`ssw`.`stuffed_weight` / `bgs`.`bgs_size`),0) * `pkg`.`pkg_weight_export`) AS `stuffed_tare`,(`ssw`.`stuffed_weight` + (round((`ssw`.`stuffed_weight` / `bgs`.`bgs_size`),0) * `pkg`.`pkg_weight_export`)) AS `stuffed_gross_weight`,(if((`sct`.`sct_packaging_method` = 1),'Bulk',if((`sct`.`sct_packaging_method` = 2),'Bags',NULL)) collate utf8_unicode_ci) AS `packaging_method`,`pkg`.`pkg_name` AS `pkg_name`,(if((`stres`.`st_disposed_by` is not null),'Stuffed',if((`stres`.`st_outturn` is not null),if((`ssw`.`stuffed_weight` is not null),'Awaiting Confirmation','Awaiting Stuffing'),if((`pr`.`pr_instruction_number` is not null),'Work in Progress','Awaiting Allocation'))) collate utf8_unicode_ci) AS `status`,`usr_created`.`usr_name` AS `user_created`,`usr_updated`.`usr_name` AS `user_updated`,`sct`.`sct_cancelled` AS `sct_cancelled`,`sct`.`sct_destination` AS `sct_destination`,`sct`.`sct_bric_confirmed` AS `sct_bric_confirmed`,`sct`.`sct_shipped` AS `sct_shipped`,`sct`.`sct_shipment` AS `shipment`,`sct`.`sct_approved_weight` AS `sct_approved_weight`,`sct`.`created_at` AS `created_at`,`sct`.`updated_at` AS `updated_at`,`ssw`.`wb_movement_permit` AS `wb_movement_permit`,`ssw`.`wb_vehicle_plate` AS `wb_vehicle_plate`,`ssw`.`wb_ticket` AS `wb_ticket`,`dp`.`dp_number` AS `dp_number`,`dp`.`dp_confirmed_by` AS `dp_confirmed_by`,`dp`.`created_at` AS `dp_start`,`dp`.`updated_at` AS `dp_end_date`,`ssw`.`wb_driver_name` AS `wb_driver_name`,`ssw`.`wb_driver_id` AS `wb_driver_id` from (((((((((((((((`sales_contract_sct` `sct` left join `process_pr` `pr` on((`pr`.`sct_id` = `sct`.`id`))) left join `stock_st` `st` on((`st`.`pr_id` = `pr`.`id`))) left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st`.`id`))) left join `stock_st` `stres` on((`stres`.`st_outturn` = `pr`.`pr_instruction_number`))) left join `months_mth` `mth` on((`mth`.`id` = `sct`.`sct_month`))) left join `years_yr` `yr` on((`yr`.`id` = `sct`.`yr_id`))) left join `sum_stuffed_and_weighbridge` `ssw` on(((`ssw`.`sct_id` = `sct`.`id`) and (`stres`.`id` = `ssw`.`st_id`)))) left join `process_results_summary` `prs` on((`prs`.`instruction_number` = `pr`.`pr_instruction_number`))) left join `packaging_pkg` `pkg` on((`pkg`.`id` = `sct`.`pkg_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `sct`.`bs_id`))) left join `client_cl` `cl` on((`cl`.`id` = `sct`.`cl_id`))) left join `users_usr` `usr_created` on((`usr_created`.`id` = `sct`.`sct_user`))) left join `users_usr` `usr_updated` on((`usr_updated`.`id` = `sct`.`sct_updated_user`))) left join `bag_sizes_bgs` `bgs` on((`bgs`.`id` = `sct`.`bgs_id`))) left join `dispatch_dp` `dp` on(((`dp`.`st_id` = `stres`.`id`) and (`dp`.`sct_id` = `sct`.`id`)))) where ((isnull(`pr`.`prcss_id`) or ((`pr`.`prcss_id` = 4) and (`sct`.`id` <> 1))) and isnull(`sct`.`sct_cancelled`)) group by `sct`.`id`,`pr`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_location_combined`
--

/*!50001 DROP TABLE IF EXISTS `stock_location_combined`*/;
/*!50001 DROP VIEW IF EXISTS `stock_location_combined`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_location_combined` AS select `sl`.`stid` AS `stid`,`sl`.`prc_id` AS `prc_id`,`sl`.`st_dispatch_net` AS `st_dispatch_net`,`sl`.`st_gross` AS `st_gross`,`sl`.`st_moisture` AS `st_moisture`,`sl`.`pkg_name` AS `pkg_name`,sum(`sl`.`btc_weight`) AS `weight`,sum(`sl`.`btc_bags`) AS `bags`,sum(`sl`.`btc_pockets`) AS `pockets`,group_concat(concat(`sl`.`wr_name`,'-',`sl`.`loc_row`,`sl`.`loc_column`,`sl`.`btc_zone`) separator ';') AS `location` from `stock_locations` `sl` group by `sl`.`stid` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_location_combined_all`
--

/*!50001 DROP TABLE IF EXISTS `stock_location_combined_all`*/;
/*!50001 DROP VIEW IF EXISTS `stock_location_combined_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_location_combined_all` AS select `sl`.`stid` AS `stid`,`sl`.`id` AS `btid`,`sl`.`btc_prev_id` AS `btc_prev_id`,`sl`.`slocid` AS `slocid`,`sl`.`prc_id` AS `prc_id`,`sl`.`st_dispatch_net` AS `st_dispatch_net`,`sl`.`st_gross` AS `st_gross`,`sl`.`st_moisture` AS `st_moisture`,`sl`.`pkg_name` AS `pkg_name`,`sl`.`btc_weight` AS `weight`,`sl`.`btc_bags` AS `bags`,`sl`.`btc_pockets` AS `pockets`,`sl`.`btc_ended_by` AS `btc_ended_by`,concat(`sl`.`wr_name`,'-',`sl`.`loc_row`,`sl`.`loc_column`,`sl`.`btc_zone`) AS `location`,`sl`.`reason` AS `reason`,`sl`.`insloc_ref` AS `insloc_ref`,`sl`.`mit_name` AS `mit_name`,`sl`.`created_at` AS `created_at` from `stock_locations_all` `sl` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_locations`
--

/*!50001 DROP TABLE IF EXISTS `stock_locations`*/;
/*!50001 DROP VIEW IF EXISTS `stock_locations`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_locations` AS select `btc`.`id` AS `id`,`sloc`.`id` AS `slocid`,`btc`.`btc_number` AS `btc_number`,`btc`.`btc_instructed_by` AS `btc_instructed_by`,`st`.`id` AS `stid`,`st`.`prc_id` AS `prc_id`,`st`.`gr_id` AS `gr_id`,`st`.`st_outturn` AS `outturn`,`st`.`st_name` AS `name`,ifnull(`cgrad`.`cgrad_name`,convert(`prt`.`prt_name` using utf8)) AS `grade`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`pkg`.`pkg_name` AS `pkg_name`,ifnull(`insloc`.`insloc_weight`,`btc`.`btc_net_weight`) AS `btc_weight`,floor((ifnull(`insloc`.`insloc_weight`,`btc`.`btc_net_weight`) / 60)) AS `btc_bags`,floor((ifnull(`insloc`.`insloc_weight`,`btc`.`btc_net_weight`) % 60)) AS `btc_pockets`,`btc`.`btc_tare` AS `btc_tare`,`btc`.`btc_net_weight` AS `btc_net_weight`,ifnull(`btc`.`btc_packages`,round((`btc`.`btc_net_weight` / 60),0)) AS `btc_packages`,`wr`.`id` AS `wrid`,`loc_row`.`id` AS `loc_rowid`,`loc_column`.`id` AS `loc_columnid`,`loc_row`.`loc_row` AS `loc_row`,`loc_column`.`loc_column` AS `loc_column`,`sloc`.`btc_zone` AS `btc_zone`,`wr`.`wr_name` AS `wr_name`,`new_loc_row`.`loc_row` AS `new_loc_row`,`new_loc_column`.`loc_column` AS `new_loc_column`,`insloc`.`btc_zone` AS `new_zone`,`new_wr`.`wr_name` AS `new_wr_name`,concat(max(`new_wr`.`wr_name`),'-',max(`new_loc_row`.`loc_row`),max(`new_loc_column`.`loc_column`),max(`insloc`.`btc_zone`)) AS `new_location`,`insloc`.`insloc_reason` AS `reason`,`insloc`.`insloc_ref` AS `insloc_ref`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,`mit`.`mit_name` AS `mit_name` from ((((((((((((((((((((`batch_btc` `btc` left join `highest_batch` `hb` on((`hb`.`id` = `btc`.`id`))) left join `stock_st` `st` on((`st`.`id` = `btc`.`st_id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_sloc` `sloc` on((`sloc`.`id` = `hb`.`slocid`))) left join `location_loc` `loc_row` on((`loc_row`.`id` = `sloc`.`loc_row_id`))) left join `location_loc` `loc_column` on((`loc_column`.`id` = `sloc`.`loc_column_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `loc_column`.`wr_id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `packaging_pkg` `pkg` on((`pkg`.`id` = `st`.`pkg_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `st`.`cgrad_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `instructed_stock_location_insloc` `insloc` on((`insloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `new_loc_row` on((`new_loc_row`.`id` = `insloc`.`loc_row_id`))) left join `location_loc` `new_loc_column` on((`new_loc_column`.`id` = `insloc`.`loc_column_id`))) left join `warehouse_wr` `new_wr` on((`new_wr`.`id` = `new_loc_column`.`wr_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `instructed_location_ref_ilf` `ilf` on((`ilf`.`id` = `insloc`.`ilf_id`))) left join `movement_instruction_type_mit` `mit` on((`mit`.`id` = `ilf`.`mit_id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) where (isnull(`btc`.`btc_ended_by`) and (`st`.`id` is not null)) group by `st`.`id`,`wr`.`wr_name`,`loc_row`.`loc_row`,`loc_column`.`loc_column`,`sloc`.`btc_zone`,`btc`.`id`,`insloc`.`id` union select `btc`.`id` AS `id`,`sloc`.`id` AS `slocid`,`btc`.`btc_number` AS `btc_number`,if(isnull(`inslocw`.`id`),NULL,`btc`.`btc_instructed_by`) AS `btc_instructed_by`,`st`.`id` AS `stid`,`st`.`prc_id` AS `prc_id`,`st`.`gr_id` AS `gr_id`,`st`.`st_outturn` AS `outturn`,`st`.`st_name` AS `name`,ifnull(`cgrad`.`cgrad_name`,convert(`prt`.`prt_name` using utf8)) AS `grade`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`st`.`st_tare` AS `st_tare`,`st`.`st_moisture` AS `st_moisture`,`pkg`.`pkg_name` AS `pkg_name`,(`btc`.`btc_net_weight` - sum(`insloc`.`insloc_weight`)) AS `btc_weight`,floor(((`btc`.`btc_net_weight` - sum(`insloc`.`insloc_weight`)) / 60)) AS `btc_bags`,floor(((`btc`.`btc_net_weight` - sum(`insloc`.`insloc_weight`)) % 60)) AS `btc_pockets`,`btc`.`btc_tare` AS `btc_tare`,`btc`.`btc_net_weight` AS `btc_net_weight`,ifnull(`btc`.`btc_packages`,round((`btc`.`btc_net_weight` / 60),0)) AS `btc_packages`,`wr`.`id` AS `wrid`,`loc_row`.`id` AS `loc_rowid`,`loc_column`.`id` AS `loc_columnid`,`loc_row`.`loc_row` AS `loc_row`,`loc_column`.`loc_column` AS `loc_column`,`sloc`.`btc_zone` AS `btc_zone`,`wr`.`wr_name` AS `wr_name`,`new_loc_row`.`loc_row` AS `new_loc_row`,`new_loc_column`.`loc_column` AS `new_loc_column`,`inslocw`.`btc_zone` AS `new_zone`,`new_wr`.`wr_name` AS `new_wr_name`,concat(max(`new_wr`.`wr_name`),'-',max(`new_loc_row`.`loc_row`),max(`new_loc_column`.`loc_column`),max(`insloc`.`btc_zone`)) AS `new_location`,`inslocw`.`insloc_reason` AS `reason`,`inslocw`.`insloc_ref` AS `insloc_ref`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,`mit`.`mit_name` AS `mit_name` from ((((((((((((((((((((((`batch_btc` `btc` left join `highest_batch` `hb` on((`hb`.`id` = `btc`.`id`))) left join `stock_st` `st` on((`st`.`id` = `btc`.`st_id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_sloc` `sloc` on((`sloc`.`id` = `hb`.`slocid`))) left join `location_loc` `loc_row` on((`loc_row`.`id` = `sloc`.`loc_row_id`))) left join `location_loc` `loc_column` on((`loc_column`.`id` = `sloc`.`loc_column_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `loc_column`.`wr_id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `packaging_pkg` `pkg` on((`pkg`.`id` = `st`.`pkg_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `st`.`cgrad_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `instructed_stock_location_insloc` `insloc` on((`insloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `new_loc_row` on((`new_loc_row`.`id` = `insloc`.`loc_row_id`))) left join `location_loc` `new_loc_column` on((`new_loc_column`.`id` = `insloc`.`loc_column_id`))) left join `warehouse_wr` `new_wr` on((`new_wr`.`id` = `new_loc_column`.`wr_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `instructed_location_ref_ilf` `ilf` on((`ilf`.`id` = `insloc`.`ilf_id`))) left join `movement_instruction_type_mit` `mit` on((`mit`.`id` = `ilf`.`mit_id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) left join `instructed_stock_location_insloc` `inslocw` on(((`inslocw`.`bt_id` = `btc`.`id`) and (`insloc`.`insloc_weight` = (`btc`.`btc_net_weight` - `insloc`.`insloc_weight`))))) left join `instructed_location_ref_ilf` `ilfw` on((`ilfw`.`id` = `inslocw`.`ilf_id`))) where (isnull(`btc`.`btc_ended_by`) and (`st`.`id` is not null) and (`insloc`.`id` is not null) and ((`btc`.`btc_net_weight` - `insloc`.`insloc_weight`) <> 0)) group by `st`.`id`,`wr`.`wr_name`,`loc_row`.`loc_row`,`loc_column`.`loc_column`,`sloc`.`btc_zone`,`btc`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_locations_all`
--

/*!50001 DROP TABLE IF EXISTS `stock_locations_all`*/;
/*!50001 DROP VIEW IF EXISTS `stock_locations_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_locations_all` AS select max(`batchview_all`.`id`) AS `id`,max(`batchview_all`.`btc_prev_id`) AS `btc_prev_id`,max(`batchview_all`.`slocid`) AS `slocid`,`batchview_all`.`name` AS `name`,`batchview_all`.`grade` AS `grade`,max(`batchview_all`.`btc_number`) AS `btc_number`,max(`batchview_all`.`btc_instructed_by`) AS `btc_instructed_by`,max(`batchview_all`.`btc_ended_by`) AS `btc_ended_by`,`batchview_all`.`stid` AS `stid`,`batchview_all`.`prc_id` AS `prc_id`,`batchview_all`.`gr_id` AS `gr_id`,`batchview_all`.`st_dispatch_net` AS `st_dispatch_net`,`batchview_all`.`st_gross` AS `st_gross`,`batchview_all`.`st_tare` AS `st_tare`,`batchview_all`.`st_moisture` AS `st_moisture`,`batchview_all`.`pkg_name` AS `pkg_name`,sum(`batchview_all`.`btc_weight`) AS `btc_weight`,floor((sum(`batchview_all`.`btc_weight`) / 60)) AS `btc_bags`,floor((sum(`batchview_all`.`btc_weight`) % 60)) AS `btc_pockets`,`batchview_all`.`loc_row` AS `loc_row`,`batchview_all`.`loc_column` AS `loc_column`,`batchview_all`.`btc_zone` AS `btc_zone`,`batchview_all`.`wr_name` AS `wr_name`,concat(max(`batchview_all`.`new_wr_name`),'-',max(`batchview_all`.`new_loc_row`),max(`batchview_all`.`new_loc_column`),max(`batchview_all`.`new_zone`)) AS `new_location`,`batchview_all`.`reason` AS `reason`,`batchview_all`.`insloc_ref` AS `insloc_ref`,`batchview_all`.`mit_name` AS `mit_name`,`batchview_all`.`created_at` AS `created_at` from `batchview_all` group by `batchview_all`.`stid`,`batchview_all`.`wr_name`,`batchview_all`.`loc_row`,`batchview_all`.`loc_column`,`batchview_all`.`btc_zone`,`batchview_all`.`insloc_ref` order by `batchview_all`.`name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_received`
--

/*!50001 DROP TABLE IF EXISTS `stock_received`*/;
/*!50001 DROP VIEW IF EXISTS `stock_received`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_received` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,if((`sts`.`sts_name` = 'Opening Stock'),if((ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) <> NULL),'Working Progress',`sts`.`sts_name`),`sts`.`sts_name`) AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,ifnull(`prc`.`prc_confirmed_price`,format((`stb`.`stb_value` / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`)),2)) AS `price`,format(ifnull(((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 50) * `prc`.`prc_confirmed_price`),`stb`.`stb_value`),2) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month` from ((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`pall`.`pr_id` <> 0) and (`st`.`pr_id` <> 0)))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and (`st`.`prc_id` is not null) and (`st`.`st_gross` is not null)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`pr`.`id`,`pall`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_reconcilliation`
--

/*!50001 DROP TABLE IF EXISTS `stock_reconcilliation`*/;
/*!50001 DROP VIEW IF EXISTS `stock_reconcilliation`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_reconcilliation` AS select `sscvw`.`code` AS `code`,`sscvw`.`bs_quality` AS `bs_quality`,round(`sscvw`.`weight`,0) AS `purchased`,round(`sscva`.`weight`,0) AS `arrival_loss_gain`,round(`sscvr`.`weight`,0) AS `process_loss_gain`,round(`sscvs`.`weight`,0) AS `shipped`,round(`sscv`.`weight`,0) AS `actual` from ((((`sum_stock_code_view_purchased` `sscvw` left join `sum_stock_code_view_arrival` `sscva` on((`sscvw`.`code` = `sscva`.`code`))) left join `sum_stock_code_view_process_results` `sscvr` on((`sscvw`.`code` = `sscvr`.`code`))) left join `sum_stock_code_view_stuffed` `sscvs` on((`sscvw`.`code` = `sscvs`.`code`))) left join `sum_stock_code_view` `sscv` on((`sscvw`.`code` = `sscv`.`code`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_warehouse`
--

/*!50001 DROP TABLE IF EXISTS `stock_warehouse`*/;
/*!50001 DROP VIEW IF EXISTS `stock_warehouse`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_warehouse` AS select max(`sloc`.`id`) AS `slocid`,`btc`.`id` AS `id`,`btc`.`st_id` AS `st_id`,`loc`.`wr_id` AS `wr_id` from ((`batch_btc` `btc` join `stock_location_sloc` `sloc` on((`btc`.`id` = `sloc`.`bt_id`))) left join `location_loc` `loc` on((`loc`.`id` = `sloc`.`loc_row_id`))) group by `btc`.`st_id` order by max(`sloc`.`id`) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockbreackdown`
--

/*!50001 DROP TABLE IF EXISTS `stockbreackdown`*/;
/*!50001 DROP VIEW IF EXISTS `stockbreackdown`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockbreackdown` AS select `st`.`id` AS `id`,sum(`stb`.`stb_value`) AS `stb_value`,`stb`.`cgr_id` AS `cgr_id`,ifnull(`stb`.`cb_id`,`st`.`cb_id`) AS `cb_id` from (`stock_st` `st` left join `stock_breakdown_stb` `stb` on((`stb`.`st_id` = `st`.`id`))) group by `st`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockmovement`
--

/*!50001 DROP TABLE IF EXISTS `stockmovement`*/;
/*!50001 DROP VIEW IF EXISTS `stockmovement`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockmovement` AS select `st`.`id` AS `id`,`slcb`.`btid` AS `btid`,`slcb`.`btc_prev_id` AS `btc_prev_id`,`slcb`.`slocid` AS `slocid`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,ifnull(if((`pr`.`pr_weight_in` > `st`.`st_net_weight`),`st`.`st_net_weight`,`pr`.`pr_weight_in`),`st`.`st_net_weight`) AS `weight`,`st`.`st_bags` AS `bags`,`st`.`st_pockets` AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,ifnull(`cgradst`.`cgrad_name`,`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,`prc`.`prc_confirmed_price` AS `price`,ifnull(`bsst`.`bs_code`,`bs`.`bs_code`) AS `code`,ifnull(`bsst`.`bs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,`crt`.`crt_name` AS `cert`,`st`.`st_ended_by` AS `ended`,max(`slcb`.`location`) AS `location`,`wr`.`wr_name` AS `wr_name`,`loc_row`.`loc_row` AS `loc_row`,`loc_column`.`loc_column` AS `loc_column`,`sloc`.`btc_zone` AS `btc_zone`,concat(`wr`.`wr_name`,'-',`loc_row`.`loc_row`,`loc_column`.`loc_column`,`sloc`.`btc_zone`) AS `previous_location`,`slcb`.`reason` AS `reason`,`slcb`.`insloc_ref` AS `insloc_ref`,`slcb`.`mit_name` AS `mit_name`,`slcb`.`btc_ended_by` AS `btc_ended_by`,if((`slcb`.`btc_ended_by` is not null),1,0) AS `movement_status`,`slcb`.`created_at` AS `created_at` from ((((((((((((((((((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `stock_location_combined_all` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `basket_bs` `bsst` on((`bsst`.`id` = `st`.`bs_id`))) left join `coffee_grade_cgrad` `cgradst` on((`cgradst`.`id` = `st`.`cgrad_id`))) left join `batch_btc` `btc` on((`btc`.`id` = ifnull(`slcb`.`btid`,`slcb`.`btc_prev_id`)))) left join `stock_location_sloc` `sloc` on((`sloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `loc_row` on((`loc_row`.`id` = `sloc`.`loc_row_id`))) left join `location_loc` `loc_column` on((`loc_column`.`id` = `sloc`.`loc_column_id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `loc_column`.`wr_id`))) left join `packaging_pkg` `pkg` on((`pkg`.`id` = `st`.`pkg_id`))) left join `instructed_stock_location_insloc` `insloc` on((`insloc`.`bt_id` = `btc`.`id`))) left join `location_loc` `new_loc_row` on((`new_loc_row`.`id` = `insloc`.`loc_row_id`))) left join `location_loc` `new_loc_column` on((`new_loc_column`.`id` = `insloc`.`loc_column_id`))) left join `stock_location_sloc` `new_sloc` on((`new_sloc`.`bt_id` = `insloc`.`bt_id`))) left join `warehouse_wr` `new_wr` on((`new_wr`.`id` = `new_loc_column`.`wr_id`))) left join `movement_instruction_type_mit` `mit` on((`mit`.`id` = `insloc`.`mit_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`slcb`.`slocid` order by `slcb`.`slocid` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockprocessedview`
--

/*!50001 DROP TABLE IF EXISTS `stockprocessedview`*/;
/*!50001 DROP VIEW IF EXISTS `stockprocessedview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockprocessedview` AS select `st`.`id` AS `id`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,ifnull(if((`pr`.`pr_weight_in` > `st`.`st_net_weight`),`st`.`st_net_weight`,`pr`.`pr_weight_in`),`st`.`st_net_weight`) AS `weight`,`st`.`st_bags` AS `bags`,`st`.`st_pockets` AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,`slr`.`slr_initials` AS `seller`,`cfd`.`cfd_grower_mark` AS `mark`,ifnull(`cgradst`.`cgrad_name`,`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,`prc`.`prc_confirmed_price` AS `price`,ifnull(`bsst`.`bs_code`,`bs`.`bs_code`) AS `code`,ifnull(`bsst`.`bs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,`crt`.`crt_name` AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location` from ((((((((((((((((((((((((((((((((`stock_st` `st` left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `certifications` `crt` on((`crt`.`cfdid` = `cfd`.`id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `basket_bs` `bsst` on((`bsst`.`id` = `st`.`bs_id`))) left join `coffee_grade_cgrad` `cgradst` on((`cgradst`.`id` = `st`.`cgrad_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_ended_by` is not null)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id` order by ifnull(`cgradst`.`cgrad_name`,`cgrad`.`cgrad_name`),`sl`.`sl_no`,`cfd`.`cfd_lot_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockprocessedview_all`
--

/*!50001 DROP TABLE IF EXISTS `stockprocessedview_all`*/;
/*!50001 DROP VIEW IF EXISTS `stockprocessedview_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockprocessedview_all` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,`pr`.`sct_id` AS `sct_id`,`pr`.`prcss_id` AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,`pr`.`pr_instruction_number` AS `process_number`,ifnull(`prt`.`id`,0) AS `results_id`,`prt`.`prt_name` AS `results_name`,`pr`.`pr_reference_name` AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,`st`.`st_net_weight` AS `original_weight`,`pr`.`pr_weight_processed` AS `processed_weight`,round((`pr`.`pr_weight_processed` * `pall`.`pall_ratios`),0) AS `process_results_weight`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`cgrad`.`cgrad_name` AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,`prc`.`prc_confirmed_price` AS `price`,format(((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 50) * `prc`.`prc_confirmed_price`),2) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,`ccrt`.`crt_name` AS `cert`,NULL AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,`pr`.`pr_supervisor` AS `supervisor`,`pall`.`pall_tags` AS `tags`,NULL AS `prcssid_all`,NULL AS `pending_process_all`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight` from ((((((((((((((((((((((`stock_st` `st` left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st`.`id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `certifications` `ccrt` on((`ccrt`.`cfdid` = `cfd`.`id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_results_prts` `prts` on((`pr`.`id` = `prts`.`pr_id`))) left join `processing_results_type_prt` `prt` on((ifnull(`st`.`prt_id`,`prts`.`prt_id`) = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = ifnull(`prts`.`st_id`,`st`.`id`)))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stocks_and_purchased`
--

/*!50001 DROP TABLE IF EXISTS `stocks_and_purchased`*/;
/*!50001 DROP VIEW IF EXISTS `stocks_and_purchased`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stocks_and_purchased` AS select `cfd`.`id` AS `id`,`st`.`id` AS `stock_id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,`slr`.`slr_name` AS `slr_name`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cfd`.`csn_id` AS `csn_id`,`pbk`.`id` AS `prcssid`,`pbk`.`pbk_instruction_number` AS `process_number`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,substr(ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`),1,10) AS `mark`,if((`st`.`prt_id` is not null),convert(`prt`.`prt_name` using utf8),ifnull(`cgrad`.`cgrad_name`,`cgrad`.`cgrad_name`)) AS `grade`,`prt`.`prt_name` AS `prt_name`,ifnull(`prall`.`prall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`prall`.`prall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,`st`.`st_packages` AS `packages`,(ifnull(`prall`.`prall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`)) AS `hedge`,`sl`.`sl_month` AS `month`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`st`.`prc_id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `bric_code`,`bs`.`bs_quality` AS `bric_quality`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) AS `price`,format((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)),2) AS `value`,truncate(((format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) AS `bric_value`,truncate(((format(((ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `bric_differential`,`st`.`st_moisture` AS `st_moisture`,`st`.`pkg_id` AS `pkg_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`gr`.`gr_number` AS `gr_number`,`cfd`.`slr_id` AS `slrid`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,if((`st`.`id` = `prall`.`st_id`),1,if((`cfd`.`id` = `prall`.`cfd_id`),1,NULL)) AS `ended`,`slcb`.`location` AS `location`,'IBERO EXPORT' AS `wr_name`,NULL AS `prcssid_all`,`prc`.`created_at` AS `purchase_date`,ifnull(concat('provisional bulk','....',`pbk`.`pbk_instruction_number`),'stock') AS `status`,`prp`.`prp_name` AS `prp_name`,`sct`.`sct_start_date` AS `sct_start_date` from (((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `provisional_allocation_prall` `prall` on(((`prall`.`st_id` = `st`.`id`) and (`prall`.`pbk_id` <> 0)))) left join `provisional_bulk_pbk` `pbk` on((ifnull(`prall`.`pbk_id`,`st`.`pr_id`) = `pbk`.`id`))) left join `provisonal_purpose_prp` `prp` on((`prp`.`id` = `pbk`.`prp_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pbk`.`sct_id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`st`.`cb_id`,ifnull(`prc`.`cb_id`,'1'))))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and isnull(`st`.`st_ended_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`prall`.`id` union select `cfd`.`id` AS `id`,`st`.`id` AS `stock_id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `ctr_id`,`slr`.`slr_name` AS `slr_name`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cfd`.`csn_id` AS `csn_id`,`pbk`.`id` AS `prcssid`,NULL AS `process_number`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,substr(ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`),1,10) AS `mark`,if((`st`.`prt_id` is not null),convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`prt`.`prt_name` AS `prt_name`,(`st`.`st_net_weight` - `prall`.`prall_allocated_weight`) AS `weight`,floor(((`st`.`st_net_weight` - `prall`.`prall_allocated_weight`) / 60)) AS `bags`,`st`.`st_packages` AS `packages`,((`st`.`st_net_weight` - `prall`.`prall_allocated_weight`) % 60) AS `pockets`,ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`)) AS `hedge`,`sl`.`sl_month` AS `month`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `bric_code`,`bs`.`bs_quality` AS `bric_quality`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) AS `price`,format((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)),2) AS `value`,truncate(((format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) AS `bric_value`,truncate(((format(((ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `bric_differential`,`st`.`st_moisture` AS `st_moisture`,`st`.`pkg_id` AS `pkg_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`gr`.`gr_number` AS `gr_number`,`cfd`.`slr_id` AS `slrid`,`ccrt`.`crt_name` AS `crt_name`,NULL AS `ended`,`slcb`.`location` AS `location`,'IBERO EXPORT' AS `wr_name`,NULL AS `prcssid_all`,`prc`.`created_at` AS `purchase_date`,'stock' AS `status`,NULL AS `prp_name`,NULL AS `sct_start_date` from (((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `provisional_allocation_prall` `prall` on(((`prall`.`st_id` = `st`.`id`) and (`prall`.`pbk_id` <> 0)))) left join `provisional_bulk_pbk` `pbk` on((ifnull(`prall`.`pbk_id`,`st`.`pr_id`) = `pbk`.`id`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `crt` on((`crt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `ccrt` on((`ccrt`.`id` = `crt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`st`.`cb_id`,ifnull(`prc`.`cb_id`,'1'))))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and (if(((`st`.`st_net_weight` - `prall`.`prall_allocated_weight`) > 60),(`st`.`st_net_weight` - `prall`.`prall_allocated_weight`),NULL) is not null) and isnull(`st`.`st_ended_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`),`st`.`id` union select `cfd`.`id` AS `id`,`st`.`id` AS `stock_id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `ctr_id`,`slr`.`slr_name` AS `slr_name`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cfd`.`csn_id` AS `csn_id`,`pbk`.`id` AS `prcssid`,NULL AS `process_number`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,substr(ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`),1,10) AS `mark`,if((`st`.`prt_id` is not null),convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`prt`.`prt_name` AS `prt_name`,(ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - sum(`prall`.`prall_allocated_weight`)) AS `weight`,floor(((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - sum(`prall`.`prall_allocated_weight`)) / 60)) AS `bags`,`st`.`st_packages` AS `packages`,((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - sum(`prall`.`prall_allocated_weight`)) % 60) AS `pockets`,ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`)) AS `hedge`,`sl`.`sl_month` AS `month`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `bric_code`,`bs`.`bs_quality` AS `bric_quality`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) AS `price`,format((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)),2) AS `value`,truncate(((format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) AS `bric_value`,truncate(((format(((ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `bric_differential`,`st`.`st_moisture` AS `st_moisture`,`st`.`pkg_id` AS `pkg_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`gr`.`gr_number` AS `gr_number`,`cfd`.`slr_id` AS `slrid`,`ccrt`.`crt_name` AS `crt_name`,NULL AS `ended`,`slcb`.`location` AS `location`,ifnull(`wr`.`wr_name`,'IBERO EXPORT') AS `wr_name`,NULL AS `prcssid_all`,`prc`.`created_at` AS `purchase_date`,'stock' AS `status`,NULL AS `prp_name`,NULL AS `sct_start_date` from ((((((((((((((((((((((`coffee_details_cfd` `cfd` left join `coffee_certification_ccrt` `crt` on((`crt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `ccrt` on((`ccrt`.`id` = `crt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `purchases_prc` `prc` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `provisional_allocation_prall` `prall` on(((`prall`.`cfd_id` = `cfd`.`id`) and (`prall`.`pbk_id` <> 0)))) left join `provisional_bulk_pbk` `pbk` on((ifnull(`prall`.`pbk_id`,`st`.`pr_id`) = `pbk`.`id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`st`.`cb_id`,ifnull(`prc`.`cb_id`,'1'))))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = ifnull(`st`.`br_id`,`prc`.`br_id`)))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) where ((ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) is not null) and (if(((ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - `prall`.`prall_allocated_weight`) > 60),(ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)) - `prall`.`prall_allocated_weight`),NULL) is not null) and isnull(`prc`.`gr_id`) and isnull(`st`.`st_ended_by`)) group by `cfd`.`id` union select `cfd`.`id` AS `id`,`st`.`id` AS `stock_id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,`sl`.`ctr_id` AS `ctr_id`,`slr`.`slr_name` AS `slr_name`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cfd`.`csn_id` AS `csn_id`,`pbk`.`id` AS `prcssid`,`pbk`.`pbk_instruction_number` AS `process_number`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`prc`.`inv_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,substr(ifnull(`prc`.`inv_mark`,`cfd`.`cfd_grower_mark`),1,10) AS `mark`,if((`st`.`prt_id` is not null),convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`prt`.`prt_name` AS `prt_name`,ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))) AS `weight`,ifnull(floor((ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))) / 60)),`cfd`.`cfd_bags`) AS `bags`,`st`.`st_packages` AS `packages`,ifnull(floor((ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))) % 60)),`cfd`.`cfd_pockets`) AS `pockets`,ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`)) AS `hedge`,`sl`.`sl_month` AS `month`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`prc`.`id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `bric_code`,`bs`.`bs_quality` AS `bric_quality`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) AS `price`,format((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)),2) AS `value`,truncate(((format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) AS `bric_value`,truncate(((format(((ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `bric_differential`,`st`.`st_moisture` AS `st_moisture`,`st`.`pkg_id` AS `pkg_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`gr`.`gr_number` AS `gr_number`,`cfd`.`slr_id` AS `slrid`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,if((`st`.`id` = `prall`.`st_id`),1,if((`cfd`.`id` = `prall`.`cfd_id`),1,NULL)) AS `ended`,ifnull(`slcb`.`location`,ifnull(`rl`.`rl_no`,ifnull(`wr`.`wr_name`,'Not Received'))) AS `location`,`wr`.`wr_name` AS `wr_name`,NULL AS `prcssid_all`,`prc`.`created_at` AS `purchase_date`,concat('provisional bulk','....',`pbk`.`pbk_instruction_number`) AS `status`,`prp`.`prp_name` AS `prp_name`,`sct`.`sct_start_date` AS `sct_start_date` from ((((((((((((((((((((((((`coffee_details_cfd` `cfd` left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `purchases_prc` `prc` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `stock_st` `st` on((`st`.`prc_id` = `prc`.`id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `provisional_allocation_prall` `prall` on(((`prall`.`st_id` = `st`.`id`) or ((`prall`.`cfd_id` = `cfd`.`id`) and (`prall`.`pbk_id` <> 0))))) left join `provisional_bulk_pbk` `pbk` on((ifnull(`prall`.`pbk_id`,`st`.`pr_id`) = `pbk`.`id`))) left join `provisonal_purpose_prp` `prp` on((`prp`.`id` = `pbk`.`prp_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pbk`.`sct_id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`st`.`cb_id`,ifnull(`prc`.`cb_id`,'1'))))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = ifnull(`st`.`br_id`,`prc`.`br_id`)))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) where (isnull(`st`.`st_net_weight`) and (`cb`.`bt_id` = 1) and isnull(`prc`.`gr_id`) and (`prc`.`sst_id` = 2) and isnull(`st`.`st_ended_by`)) group by `cfd`.`id` union select `cfd`.`id` AS `id`,`st`.`id` AS `stock_id`,`cfd`.`sl_id` AS `slid`,`sl`.`sl_no` AS `sale`,`sl`.`sl_date` AS `date`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,`slr`.`slr_name` AS `slr_name`,(`sl`.`sl_date` + interval 6 day) AS `prompt_date`,`csn`.`csn_season` AS `csn_season`,`cfd`.`csn_id` AS `csn_id`,ifnull(`pr`.`id`,`pbk`.`id`) AS `prcssid`,ifnull(`pr`.`pr_instruction_number`,`pbk`.`pbk_instruction_number`) AS `process_number`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,substr(ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`),1,10) AS `mark`,if((`st`.`prt_id` is not null),convert(`prt`.`prt_name` using utf8),ifnull(`cgrad`.`cgrad_name`,`cgrad`.`cgrad_name`)) AS `grade`,`prt`.`prt_name` AS `prt_name`,ifnull(`prall`.`prall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`prall`.`prall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,`st`.`st_packages` AS `packages`,(ifnull(`prall`.`prall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`)) AS `hedge`,`sl`.`sl_month` AS `month`,`cb`.`id` AS `cbid`,`cb`.`cb_name` AS `buyer`,`st`.`prc_id` AS `prcid`,`prc`.`prc_price` AS `auc_price`,`br`.`br_no` AS `bric`,`br`.`br_date` AS `br_date`,`bs`.`id` AS `bsid`,`bs`.`bs_code` AS `bric_code`,`bs`.`bs_quality` AS `bric_quality`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`rl`.`rl_no` AS `rl_no`,`rl`.`rl_date` AS `rl_date`,format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) AS `price`,format((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)),2) AS `value`,truncate(((format(((ifnull(`st`.`st_value`,`prc`.`prc_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,(ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) AS `bric_value`,truncate(((format(((ifnull(`st`.`st_bric_value`,`prc`.`prc_bric_value`) * if((`prall`.`prall_allocated_weight` is not null),(`prall`.`prall_allocated_weight` / ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))),1)) * (50 / ifnull(`prall`.`prall_allocated_weight`,ifnull(`st`.`st_net_weight`,ifnull(`war`.`war_weight`,ifnull(`prc`.`inv_weight`,`cfd`.`cfd_weight`)))))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `bric_differential`,`st`.`st_moisture` AS `st_moisture`,`st`.`pkg_id` AS `pkg_id`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `st_gross`,`gr`.`gr_number` AS `gr_number`,`cfd`.`slr_id` AS `slrid`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,if((`st`.`id` = `prall`.`st_id`),1,if((`cfd`.`id` = `prall`.`cfd_id`),1,NULL)) AS `ended`,`slcb`.`location` AS `location`,'IBERO EXPORT' AS `wr_name`,NULL AS `prcssid_all`,`prc`.`created_at` AS `purchase_date`,if(isnull(`insloc`.`id`),concat('work in progress','....',ifnull(`pr`.`pr_instruction_number`,`pbk`.`pbk_instruction_number`)),concat('instucted','....',ifnull(`pr`.`pr_instruction_number`,`pbk`.`pbk_instruction_number`))) AS `status`,NULL AS `prp_name`,`sct`.`sct_start_date` AS `sct_start_date` from (((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `process_results_prts` `prts` on((`prts`.`pr_id` = `st`.`pr_id`))) left join `purchases_prc` `prc` on(((`prc`.`id` = `st`.`prc_id`) and (`prc`.`sst_id` = 2)))) left join `provisional_allocation_prall` `prall` on(((`prall`.`st_id` = `st`.`id`) and (`prall`.`pbk_id` <> 0)))) left join `provisional_bulk_pbk` `pbk` on((ifnull(`prall`.`pbk_id`,`st`.`pr_id`) = `pbk`.`id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `sl_csn` on((`sl_csn`.`id` = `sl`.`csn_id`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `br`.`bs_id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`pr_id` = `pr`.`id`) and (`pall`.`st_id` = `st`.`id`)))) left join `processing_results_type_prt` `prt` on((`prt`.`id` = `st`.`prt_id`))) left join `sales_contract_sct` `sct` on((`sct`.`id` = `pr`.`sct_id`))) left join `coffee_growers_cg` `cg` on((ifnull(`br`.`cg_id`,'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(ifnull(`br`.`cb_id`,`prc`.`cb_id`),'1')))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `batch_btc` `btc` on((`btc`.`st_id` = `st`.`id`))) left join `instructed_stock_location_insloc` `insloc` on((`insloc`.`bt_id` = `btc`.`id`))) where ((`st`.`st_ended_by` is not null) and (`st`.`id` is not null) and isnull(`prts`.`st_id`) and isnull(`st`.`st_disposed_by`) and (`pr`.`id` is not null)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`prall`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stocks_storage_count`
--

/*!50001 DROP TABLE IF EXISTS `stocks_storage_count`*/;
/*!50001 DROP VIEW IF EXISTS `stocks_storage_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stocks_storage_count` AS select `breakdown_without_stuffed`.`id` AS `id`,`breakdown_without_stuffed`.`cfdid` AS `cfdid`,`breakdown_without_stuffed`.`bs_code` AS `bs_Code`,`breakdown_without_stuffed`.`bs_quality` AS `bs_quality`,`breakdown_without_stuffed`.`ibs_code` AS `ibs_code`,`breakdown_without_stuffed`.`ibs_quality` AS `ibs_quality`,`breakdown_without_stuffed`.`st_outturn` AS `st_outturn`,`breakdown_without_stuffed`.`csn_season` AS `csn_season`,`breakdown_without_stuffed`.`cgrad_name` AS `cgrad_name`,`breakdown_without_stuffed`.`cb_name` AS `cb_name`,`breakdown_without_stuffed`.`current_weight` AS `current_weight`,`breakdown_without_stuffed`.`storage` AS `storage`,`breakdown_without_stuffed`.`value` AS `value`,`breakdown_without_stuffed`.`br_diffrential` AS `br_diffrential`,`breakdown_without_stuffed`.`sl_hedge` AS `sl_hedge`,`breakdown_without_stuffed`.`sale` AS `sale`,`breakdown_without_stuffed`.`wr_name` AS `wr_name` from `breakdown_without_stuffed` group by ifnull(`breakdown_without_stuffed`.`cfdid`,`breakdown_without_stuffed`.`id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stocks_summary`
--

/*!50001 DROP TABLE IF EXISTS `stocks_summary`*/;
/*!50001 DROP VIEW IF EXISTS `stocks_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stocks_summary` AS select `bws`.`weight` AS `weight`,`bws`.`wr_name` AS `wr_name`,`bws`.`buyer` AS `buyer`,`ssic`.`storage` AS `storage`,`ssic`.`count` AS `count`,`ssic`.`average_storage` AS `average_storage`,`bws`.`value` AS `value` from (`sum_warehouse_total` `bws` left join `sum_stock_item_count` `ssic` on((`ssic`.`wr_name` = `bws`.`wr_name`))) group by `bws`.`buyer`,`bws`.`wr_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockview`
--

/*!50001 DROP TABLE IF EXISTS `stockview`*/;
/*!50001 DROP VIEW IF EXISTS `stockview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockview` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,`st`.`prc_id` AS `prcid`,ifnull(`pr`.`id`,`prr`.`id`) AS `prcssid`,ifnull(if((`pr`.`pr_weight_in` > `st`.`st_net_weight`),`st`.`st_net_weight`,`pr`.`pr_weight_in`),`st`.`st_net_weight`) AS `weight`,`st`.`st_bags` AS `bags`,`st`.`st_pockets` AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) AS `price`,format((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)),2) AS `value`,truncate(((format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,group_concat(distinct `prcss`.`id` separator ',') AS `prcssid_all`,`prts`.`id` AS `prcssresultsid` from (((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((`pall`.`pr_id` = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) where ((`st`.`st_net_weight` is not null) and isnull(`st`.`st_ended_by`) and (`st`.`st_outturn` is not null)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockview_all`
--

/*!50001 DROP TABLE IF EXISTS `stockview_all`*/;
/*!50001 DROP VIEW IF EXISTS `stockview_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockview_all` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,`st`.`st_net_weight` AS `net_weight`,ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) AS `price`,format((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)),2) AS `value`,truncate(((format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `hedge`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month`,`pbk`.`pbk_instruction_number` AS `pbk_instruction_number` from ((((((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`pall`.`pr_id` <> 0)))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `provisional_allocation_prall` `prall` on((`prall`.`st_id` = `st`.`id`))) left join `provisional_bulk_pbk` `pbk` on((`pbk`.`id` = `prall`.`pbk_id`))) left join `coffee_growers_cg` `cg` on((ifnull(`stb`.`cgr_id`,'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`prc`.`cb_id`,ifnull(`stb`.`cb_id`,'1'))))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and isnull(`st`.`st_quality_check`) and isnull(`st`.`st_ended_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`pr`.`id`,`pall`.`id` union select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,if((ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) is not null),'Working Progress',`sts`.`sts_name`) AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,`st`.`st_net_weight` AS `net_weight`,ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) AS `price`,format((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)),2) AS `value`,truncate(((format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `hedge`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month`,`pbk`.`pbk_instruction_number` AS `pbk_instruction_number` from (((((((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `process_results_prts` `prtss` on((`prtss`.`pr_id` = `st`.`pr_id`))) left join `provisional_allocation_prall` `prall` on((`prall`.`st_id` = `st`.`id`))) left join `provisional_bulk_pbk` `pbk` on((`pbk`.`id` = `prall`.`pbk_id`))) left join `coffee_growers_cg` `cg` on((ifnull(`stb`.`cgr_id`,'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`prc`.`cb_id`,ifnull(`stb`.`cb_id`,'1'))))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and (`st`.`st_ended_by` is not null) and isnull(`st`.`st_quality_check`) and isnull(`st`.`st_additional_processed`) and isnull(`pr`.`pr_confirmed_by`) and isnull(`st`.`st_disposed_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`pr`.`id`,`pall`.`id` union select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,`pr`.`sct_id` AS `sct_id`,`pr`.`prcss_id` AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,NULL AS `process_number`,NULL AS `reference_number`,`st`.`prc_id` AS `prcid`,NULL AS `prcssid`,`st`.`st_net_weight` AS `net_weight`,(`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) AS `weight`,floor(((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) / 60)) AS `bags`,((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,format(((`st`.`st_value` * ((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) / `st`.`st_net_weight`)) / ((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) / 50)),2) AS `price`,format((`st`.`st_value` * ((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) / `st`.`st_net_weight`)),2) AS `value`,truncate(((format(((`st`.`st_value` * ((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) / `st`.`st_net_weight`)) / ((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) / 50)),2) / 1.1023) - ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`))),2) AS `differential`,ifnull(`st`.`st_hedge`,`sl`.`sl_hedge`) AS `hedge`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,`ccrt`.`crt_name` AS `cert`,NULL AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,`pr`.`pr_supervisor` AS `supervisor`,`pall`.`pall_tags` AS `tags`,NULL AS `prcssid_all`,NULL AS `pending_process_all`,NULL AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,NULL AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month`,`pbk`.`pbk_instruction_number` AS `pbk_instruction_number` from (((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_locations_history_slh` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `certifications` `ccrt` on((`ccrt`.`cfdid` = `cfd`.`id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `provisional_allocation_prall` `prall` on((`prall`.`st_id` = `st`.`id`))) left join `provisional_bulk_pbk` `pbk` on((`pbk`.`id` = `prall`.`pbk_id`))) left join `coffee_growers_cg` `cg` on((ifnull(`stb`.`cgr_id`,'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`prc`.`cb_id`,ifnull(`stb`.`cb_id`,'1'))))) where ((`st`.`st_net_weight` is not null) and isnull(`st`.`st_quality_check`) and (`st`.`st_outturn` is not null) and isnull(`st`.`st_additional_processed`) and (if(((`st`.`st_net_weight` - `pall`.`pall_allocated_weight`) > 1),(`st`.`st_net_weight` - `pall`.`pall_allocated_weight`),NULL) is not null) and isnull(`pr`.`pr_confirmed_by`) and isnull(`st`.`st_disposed_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`),`st`.`id` having (`weight` > 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockview_all_backup`
--

/*!50001 DROP TABLE IF EXISTS `stockview_all_backup`*/;
/*!50001 DROP VIEW IF EXISTS `stockview_all_backup`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockview_all_backup` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,if((ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) is not null),'Working Progress',`sts`.`sts_name`) AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,ifnull(`prc`.`prc_confirmed_price`,format((`stb`.`stb_value` / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`)),2)) AS `price`,format(ifnull(((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 50) * `prc`.`prc_confirmed_price`),`stb`.`stb_value`),2) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month` from ((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`pall`.`pr_id` <> 0) and (`st`.`pr_id` <> 0)))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_results_prts` `prts` on((`prts`.`st_id` = `st`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and isnull(`st`.`st_additional_processed`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`pr`.`id`,`pall`.`id` union select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,`pr`.`sct_id` AS `sct_id`,`pr`.`prcss_id` AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,NULL AS `process_number`,NULL AS `reference_number`,`st`.`prc_id` AS `prcid`,NULL AS `prcssid`,(`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) AS `weight`,floor(((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) / 60)) AS `bags`,((`st`.`st_net_weight` - sum(`pall`.`pall_allocated_weight`)) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,ifnull(`prc`.`prc_confirmed_price`,format((`stb`.`stb_value` / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`)),2)) AS `price`,format(ifnull(((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 50) * `prc`.`prc_confirmed_price`),`stb`.`stb_value`),2) AS `value`,truncate(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),2) AS `differential`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,`ccrt`.`crt_name` AS `cert`,NULL AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,`pr`.`pr_supervisor` AS `supervisor`,`pall`.`pall_tags` AS `tags`,NULL AS `prcssid_all`,NULL AS `pending_process_all`,NULL AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,NULL AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month` from (((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `certifications` `ccrt` on((`ccrt`.`cfdid` = `cfd`.`id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on((`pall`.`st_id` = `st`.`id`))) left join `process_pr` `pr` on((ifnull(`pall`.`pr_id`,`st`.`pr_id`) = `pr`.`id`))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and isnull(`st`.`st_additional_processed`) and (if(((`st`.`st_net_weight` - `pall`.`pall_allocated_weight`) > 60),(`st`.`st_net_weight` - `pall`.`pall_allocated_weight`),NULL) is not null)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`),`st`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockview_all_locations`
--

/*!50001 DROP TABLE IF EXISTS `stockview_all_locations`*/;
/*!50001 DROP VIEW IF EXISTS `stockview_all_locations`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockview_all_locations` AS select `st`.`id` AS `id`,`slcb`.`slocid` AS `slocid`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `status`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,ifnull(if((`pr`.`pr_weight_in` > `st`.`st_net_weight`),`st`.`st_net_weight`,`pr`.`pr_weight_in`),`st`.`st_net_weight`) AS `weight`,`st`.`st_bags` AS `bags`,`st`.`st_pockets` AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,ifnull(`cgradst`.`cgrad_name`,`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,`prc`.`prc_confirmed_price` AS `price`,ifnull(`bsst`.`bs_code`,`bs`.`bs_code`) AS `code`,ifnull(`bsst`.`bs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,`crt`.`crt_name` AS `cert`,`st`.`st_ended_by` AS `ended`,max(`slcb`.`location`) AS `location`,`slcb`.`reason` AS `reason`,`slcb`.`insloc_ref` AS `insloc_ref`,`slcb`.`mit_name` AS `mit_name`,`slcb`.`created_at` AS `created_at` from (((((((((((((((((((((((((((((((((`stock_st` `st` left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `process_pr` `pr` on((`pr`.`id` = `st`.`pr_id`))) left join `stock_location_combined_all` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `certifications` `crt` on((`crt`.`cfdid` = `cfd`.`id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `warehouses_region` `wrgn` on((`wrgn`.`wrid` = `cfd`.`wr_id`))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = `cfd`.`cgrad_id`))) left join `mill_ml` `ml` on((`ml`.`id` = `cfd`.`ml_id`))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `green_comments_grcm` `grcm` on((`grcm`.`cfd_id` = `cfd`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `processing_prcss` `prcss` on((`prcss`.`id` = `qltyd`.`prcss_id`))) left join `screens_scr` `scr` on((`scr`.`id` = `qltyd`.`scr_id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = `qltyd`.`cp_id`))) left join `raw_score_rw` `rw` on((`rw`.`id` = `qltyd`.`rw_id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = `prc`.`cb_id`))) left join `basket_bs` `bs` on((`bs`.`id` = `prc`.`bs_id`))) left join `sale_status_sst` `sst` on((`sst`.`id` = `prc`.`sst_id`))) left join `invoices_inv` `inv` on((`inv`.`id` = `prc`.`inv_id`))) left join `users_usr` `inv_usr` on((`inv_usr`.`id` = `inv`.`inv_confirmedby`))) left join `payments_py` `py` on((`py`.`id` = `prc`.`py_id`))) left join `users_usr` `py_usr` on((`py_usr`.`id` = `py`.`py_confirmedby`))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `users_usr` `br_usr` on((`br_usr`.`id` = `br`.`br_confirmedby`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `release_instructions_rl` `rl` on((`rl`.`id` = `prc`.`rl_id`))) left join `transporters_trp` `trp` on((`trp`.`id` = `rl`.`trp_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `basket_bs` `bsst` on((`bsst`.`id` = `st`.`bs_id`))) left join `coffee_grade_cgrad` `cgradst` on((`cgradst`.`id` = `st`.`cgrad_id`))) where ((`st`.`st_net_weight` is not null) and (`st`.`st_outturn` is not null) and isnull(`st`.`st_ended_by`)) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`slcb`.`slocid` order by `slcb`.`slocid` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stockview_stuffed`
--

/*!50001 DROP TABLE IF EXISTS `stockview_stuffed`*/;
/*!50001 DROP VIEW IF EXISTS `stockview_stuffed`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockview_stuffed` AS select `st`.`id` AS `id`,`gr`.`gr_number` AS `gr_number`,`st`.`sts_id` AS `sts_id`,`sts`.`sts_name` AS `Status`,`pr`.`sct_id` AS `sct_id`,ifnull(`pr`.`prcss_id`,`pr_combined`.`prcss_id`) AS `processtype`,ifnull(`st`.`ctr_id`,`sl`.`ctr_id`) AS `ctr_id`,ifnull(`pr`.`pr_instruction_number`,`prr`.`pr_instruction_number`) AS `process_number`,ifnull(`pr`.`pr_reference_name`,`prr`.`pr_reference_name`) AS `reference_number`,`st`.`prc_id` AS `prcid`,`pr`.`id` AS `prcssid`,`st`.`st_net_weight` AS `net_weight`,ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) AS `weight`,floor((ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) / 60)) AS `bags`,(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`) % 60) AS `pockets`,`sl`.`sl_no` AS `sale`,`csn`.`csn_season` AS `csn_season`,`cfd`.`cfd_lot_no` AS `lot`,ifnull(`st`.`st_outturn`,`cfd`.`cfd_outturn`) AS `outturn`,substr(ifnull(`st`.`st_mark`,`cfd`.`cfd_grower_mark`),1,10) AS `mark`,ifnull(`st`.`st_name`,concat(`cfd`.`cfd_outturn`,`cfd`.`cfd_grower_mark`)) AS `name`,`slr`.`slr_initials` AS `seller`,`cg`.`cg_name` AS `cg_name`,`cb`.`cb_name` AS `cb_name`,`wr`.`wr_name` AS `warehouse_from`,ifnull(convert(`prt`.`prt_name` using utf8),`cgrad`.`cgrad_name`) AS `grade`,`cfd`.`cfd_weight` AS `ott_weight`,`cfd`.`cfd_bags` AS `ott_bags`,`cfd`.`cfd_pockets` AS `ott_pockets`,format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) AS `price`,format((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)),2) AS `value`,truncate(((format(((`st`.`st_value` * if((`pall`.`pall_allocated_weight` is not null),(`pall`.`pall_allocated_weight` / `st`.`st_net_weight`),1)) * (50 / ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`))),2) / 1.1023) - `st`.`st_hedge`),2) AS `differential`,ifnull(`st`.`st_hedge`,ifnull(`prc`.`prc_hedge`,`sl`.`sl_hedge`)) AS `hedge`,ifnull(`ibs`.`ibs_code`,`bs`.`bs_code`) AS `code`,ifnull(`ibs`.`ibs_quality`,`bs`.`bs_quality`) AS `quality`,`war`.`war_no` AS `warrant_no`,group_concat(distinct `crt`.`crt_name` separator ',') AS `cert`,`st`.`st_ended_by` AS `ended`,`slcb`.`location` AS `location`,`br`.`br_no` AS `br_no`,`pall`.`pall_allocated_weight` AS `pall_allocated_weight`,`pall`.`pall_ratios` AS `pall_ratios`,ifnull(`pr`.`pr_supervisor`,`pr_combined`.`pr_supervisor`) AS `supervisor`,ifnull(`pall`.`pall_tags`,`pall_combined`.`pall_tags`) AS `tags`,group_concat(distinct `prcss_combined`.`id` separator ',') AS `prcssid_all`,group_concat(distinct `pr_combined`.`pr_instruction_number` separator ',') AS `pending_process_all`,group_concat(distinct `pr_combined`.`id` separator ',') AS `pending_process_id`,`st`.`st_additional_processed` AS `additional_processed`,`cp`.`cp_score` AS `cp_score`,ifnull(`sqltyd`.`sqltyd_acidity`,`qltyd`.`qltyd_acidity`) AS `acidity`,ifnull(`sqltyd`.`sqltyd_body`,`qltyd`.`qltyd_body`) AS `body`,ifnull(`sqltyd`.`sqltyd_flavour`,`qltyd`.`qltyd_flavour`) AS `flavour`,ifnull(`sqltyd`.`sqltyd_description`,`qltyd`.`qltyd_comments`) AS `description`,`war`.`war_weight` AS `warrant_weight`,`st`.`st_dispatch_net` AS `st_dispatch_net`,`st`.`st_gross` AS `grn_weight`,`pr`.`pr_confirmed_by` AS `pr_confirmed_by`,`st`.`created_at` AS `created_at`,month(`st`.`created_at`) AS `month`,`pbk`.`pbk_instruction_number` AS `pbk_instruction_number` from (((((((((((((((((((((((((((((((((((`stock_st` `stt` left join `process_results_prts` `prts` on((`prts`.`st_id` = `stt`.`id`))) left join `process_pr` `pr` on((`prts`.`pr_id` = `pr`.`id`))) left join `stock_st` `st` on((`st`.`pr_id` = `pr`.`id`))) left join `grn_gr` `gr` on((`gr`.`id` = `st`.`gr_id`))) left join `stock_location_combined` `slcb` on((`st`.`id` = `slcb`.`stid`))) left join `purchases_prc` `prc` on((`prc`.`id` = `st`.`prc_id`))) left join `coffee_details_cfd` `cfd` on((`cfd`.`id` = `prc`.`cfd_id`))) left join `coffee_certification_ccrt` `ccrt` on((`ccrt`.`cfd_id` = `cfd`.`id`))) left join `certification_crt` `crt` on((`crt`.`id` = `ccrt`.`crt_id`))) left join `sale_sl` `sl` on((`sl`.`id` = `cfd`.`sl_id`))) left join `coffee_seasons_csn` `csn` on((`csn`.`id` = ifnull(`st`.`csn_id`,`cfd`.`csn_id`)))) left join `coffee_grade_cgrad` `cgrad` on((`cgrad`.`id` = ifnull(`st`.`cgrad_id`,`cfd`.`cgrad_id`)))) left join `seller_slr` `slr` on((`slr`.`id` = `cfd`.`slr_id`))) left join `basket_bs` `bs` on((`bs`.`id` = ifnull(`st`.`bs_id`,`prc`.`bs_id`)))) left join `bric_br` `br` on((`br`.`id` = `prc`.`br_id`))) left join `warrants_war` `war` on((`war`.`id` = `prc`.`war_id`))) left join `stock_status_sts` `sts` on((`sts`.`id` = `st`.`sts_id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`pall`.`pr_id` <> 0)))) left join `processing_prcss` `prcss` on((`pr`.`prcss_id` = `prcss`.`id`))) left join `process_allocations_pall` `pall_combined` on((`pall_combined`.`st_id` = `st`.`id`))) left join `process_pr` `pr_combined` on(((`pall_combined`.`pr_id` = `pr_combined`.`id`) and (`pr_combined`.`pr_instruction_number` <> `pr`.`pr_instruction_number`)))) left join `processing_prcss` `prcss_combined` on((`pr_combined`.`prcss_id` = `prcss_combined`.`id`))) left join `process_pr` `prr` on((`prts`.`pr_id` = `prr`.`id`))) left join `processing_prcss` `prcssr` on((`prr`.`prcss_id` = `prcssr`.`id`))) left join `processing_results_type_prt` `prt` on((`st`.`prt_id` = `prt`.`id`))) left join `stock_qualty_details_sqltyd` `sqltyd` on((`sqltyd`.`st_id` = `st`.`id`))) left join `qualty_details_qltyd` `qltyd` on((`qltyd`.`cfd_id` = `cfd`.`id`))) left join `cup_score_cp` `cp` on((`cp`.`id` = ifnull(`sqltyd`.`cp_id`,`qltyd`.`cp_id`)))) left join `internal_basket_ibs` `ibs` on((`ibs`.`id` = `st`.`ibs_id`))) left join `stockbreackdown` `stb` on((`stb`.`id` = `st`.`id`))) left join `warehouse_wr` `wr` on((`wr`.`id` = `cfd`.`wr_id`))) left join `provisional_allocation_prall` `prall` on((`prall`.`st_id` = `st`.`id`))) left join `provisional_bulk_pbk` `pbk` on((`pbk`.`id` = `prall`.`pbk_id`))) left join `coffee_growers_cg` `cg` on((ifnull(`stb`.`cgr_id`,'10000001') = `cg`.`id`))) left join `coffee_buyers_cb` `cb` on((`cb`.`id` = ifnull(`prc`.`cb_id`,ifnull(`stb`.`cb_id`,'1'))))) where (`stt`.`sct_id` is not null) group by `cfd`.`sl_id`,`cfd`.`cfd_lot_no`,`cfd`.`cfd_outturn`,`st`.`id`,`pr`.`id`,`pall`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stuffing_summary`
--

/*!50001 DROP TABLE IF EXISTS `stuffing_summary`*/;
/*!50001 DROP VIEW IF EXISTS `stuffing_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stuffing_summary` AS select `br`.`cb_name` AS `cb_name`,sum(`br`.`stuffed_weight`) AS `weight`,monthname(`br`.`stuffing_date`) AS `month`,year(`br`.`stuffing_date`) AS `year`,`br`.`stuffing_date` AS `stuffing_date` from `breakdown` `br` where (`br`.`status` = 'Stuffed') group by monthname(`br`.`stuffing_date`),year(`br`.`stuffing_date`),`br`.`cb_name` order by `br`.`stuffing_date` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stuffing_summary_per_instruction`
--

/*!50001 DROP TABLE IF EXISTS `stuffing_summary_per_instruction`*/;
/*!50001 DROP VIEW IF EXISTS `stuffing_summary_per_instruction`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stuffing_summary_per_instruction` AS select `br`.`st_outturn` AS `st_outturn`,`br`.`cb_name` AS `cb_name`,sum(`br`.`stuffed_weight`) AS `weight`,monthname(`br`.`stuffing_date`) AS `month`,year(`br`.`stuffing_date`) AS `year`,`br`.`stuffing_date` AS `stuffing_date` from `breakdown` `br` where (`br`.`status` = 'Stuffed') group by `br`.`st_outturn`,`br`.`cb_name` order by `br`.`stuffing_date` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stuffingview`
--

/*!50001 DROP TABLE IF EXISTS `stuffingview`*/;
/*!50001 DROP VIEW IF EXISTS `stuffingview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stuffingview` AS select `stff`.`id` AS `id`,`stff`.`st_id` AS `st_id`,`stff`.`sct_id` AS `sct_id`,`stff`.`stff_weight_note` AS `stff_weight_note`,`sct`.`sct_number` AS `sct_number`,`stff`.`wb_id` AS `wb_id`,`wb`.`wb_ticket` AS `wb_ticket`,`stff`.`shpr_id` AS `shpr_id`,`stff`.`stff_weight` AS `stff_weight`,`stff`.`stff_date` AS `stff_date`,`stff`.`stff_container` AS `stff_container`,`stff`.`created_at` AS `created_at`,`stff`.`updated_at` AS `updated_at` from ((`stuffing_stff` `stff` left join `sales_contract_sct` `sct` on((`sct`.`id` = `stff`.`sct_id`))) left join `weighbridge_wb` `wb` on((`wb`.`id` = `stff`.`wb_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_bric_process_results`
--

/*!50001 DROP TABLE IF EXISTS `sum_bric_process_results`*/;
/*!50001 DROP VIEW IF EXISTS `sum_bric_process_results`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_bric_process_results` AS select `breakdown_process_results`.`br_no` AS `br_no`,`breakdown_process_results`.`bs_code` AS `bs_code`,`breakdown_process_results`.`bs_quality` AS `bs_quality`,sum(`breakdown_process_results`.`full_weight`) AS `weight` from `breakdown_process_results` where (`breakdown_process_results`.`br_no` is not null) group by `breakdown_process_results`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_bric_summary`
--

/*!50001 DROP TABLE IF EXISTS `sum_bric_summary`*/;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_bric_summary` AS select ifnull(`bws`.`br_no`,0) AS `br_no`,ifnull(`bws`.`bs_code`,0) AS `bs_code`,ifnull(`bws`.`bs_quality`,NULL) AS `bs_quality`,sum(`bws`.`full_weight`) AS `weight`,sum(`bws`.`weight`) AS `rounded_weight`,sum(`bws`.`value`) AS `value`,(sum((`bws`.`full_weight` * `bws`.`sl_hedge`)) / sum(`bws`.`full_weight`)) AS `hedge`,(sum(`bws`.`value`) / (sum(`bws`.`full_weight`) / 50)) AS `price`,(((sum(`bws`.`value`) / (sum(`bws`.`full_weight`) / 50)) / 1.1023) - (sum((`bws`.`full_weight` * `bws`.`sl_hedge`)) / sum(`bws`.`full_weight`))) AS `diff` from `breakdown_without_stuffed` `bws` group by `bws`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_bric_summary_arrival`
--

/*!50001 DROP TABLE IF EXISTS `sum_bric_summary_arrival`*/;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_arrival`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_bric_summary_arrival` AS select `breakdown_arrival`.`br_no` AS `br_no`,`breakdown_arrival`.`bs_code` AS `bs_code`,`breakdown_arrival`.`bs_quality` AS `bs_quality`,sum(`breakdown_arrival`.`weight`) AS `weight` from `breakdown_arrival` where (`breakdown_arrival`.`br_no` is not null) group by `breakdown_arrival`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_bric_summary_purchased`
--

/*!50001 DROP TABLE IF EXISTS `sum_bric_summary_purchased`*/;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_purchased`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_bric_summary_purchased` AS select `breakdown_purchased`.`br_no` AS `br_no`,`breakdown_purchased`.`bs_code` AS `bs_code`,`breakdown_purchased`.`bs_quality` AS `bs_quality`,sum(`breakdown_purchased`.`full_weight`) AS `weight` from `breakdown_purchased` where (`breakdown_purchased`.`br_no` is not null) group by `breakdown_purchased`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_bric_summary_stuffed`
--

/*!50001 DROP TABLE IF EXISTS `sum_bric_summary_stuffed`*/;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_stuffed`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_bric_summary_stuffed` AS select `breakdown`.`br_no` AS `br_no`,`breakdown`.`bs_code` AS `bs_code`,`breakdown`.`bs_quality` AS `bs_quality`,sum(`breakdown`.`stuffed_weight_full`) AS `weight` from `breakdown` where ((`breakdown`.`br_no` is not null) and (`breakdown`.`status` = 'stuffed')) group by `breakdown`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_bric_summary_working_progress`
--

/*!50001 DROP TABLE IF EXISTS `sum_bric_summary_working_progress`*/;
/*!50001 DROP VIEW IF EXISTS `sum_bric_summary_working_progress`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_bric_summary_working_progress` AS select `breakdown`.`br_no` AS `br_no`,`breakdown`.`bs_code` AS `bs_code`,`breakdown`.`bs_quality` AS `bs_quality`,sum(`breakdown`.`full_weight`) AS `weight` from `breakdown` where ((`breakdown`.`br_no` is not null) and (`breakdown`.`sct_number` is not null) and (`breakdown`.`sct_number` <> 'INTERNAL') and (`breakdown`.`status` <> 'stuffed')) group by `breakdown`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_of_sales_contract`
--

/*!50001 DROP TABLE IF EXISTS `sum_of_sales_contract`*/;
/*!50001 DROP VIEW IF EXISTS `sum_of_sales_contract`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_of_sales_contract` AS select `breakdown`.`sct_number` AS `sct_number`,`breakdown`.`br_no` AS `br_no`,`breakdown`.`st_outturn` AS `st_outturn`,sum(`breakdown`.`stuffed_weight`) AS `total_allocated`,sum(`breakdown`.`stuffed_weight`) AS `total_stuffed`,`breakdown`.`status` AS `status` from `breakdown` where ((`breakdown`.`sct_number` is not null) and (`breakdown`.`sct_number` <> 'Internal')) group by `breakdown`.`br_no`,`breakdown`.`sct_number` order by `breakdown`.`sct_number`,`breakdown`.`br_no` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_process_allocation`
--

/*!50001 DROP TABLE IF EXISTS `sum_process_allocation`*/;
/*!50001 DROP VIEW IF EXISTS `sum_process_allocation`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_process_allocation` AS select `pr`.`id` AS `pr_id`,`pr`.`pr_instruction_number` AS `instruction_number`,`pr`.`pr_reference_name` AS `reference_name`,`pr`.`pr_other_instructions` AS `other_instructions`,`pr`.`pr_supervisor` AS `supervisor`,sum(`pall`.`pall_tags`) AS `tags`,sum(ifnull(`pall`.`pall_allocated_weight`,`st`.`st_net_weight`)) AS `allocated_weight` from ((`process_pr` `pr` left join `stock_st` `st` on((`st`.`pr_id` = `pr`.`id`))) left join `process_allocations_pall` `pall` on(((`pall`.`st_id` = `st`.`id`) and (`pr`.`id` = `pall`.`pr_id`)))) group by `pr`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_code_view`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_code_view`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_code_view` AS select `sbs`.`bs_code` AS `code`,`sbs`.`bs_quality` AS `bs_quality`,sum(`sbs`.`weight`) AS `weight`,round(sum(`sbs`.`weight`),0) AS `rounded_weight`,sum(`sbs`.`value`) AS `value`,(sum((`sbs`.`weight` * `sbs`.`hedge`)) / sum(`sbs`.`weight`)) AS `hedge`,(sum(`sbs`.`value`) / (sum(`sbs`.`weight`) / 50)) AS `price`,(((sum(`sbs`.`value`) / (sum(`sbs`.`weight`) / 50)) / 1.1023) - (sum((`sbs`.`weight` * `sbs`.`hedge`)) / sum(`sbs`.`weight`))) AS `diff` from `sum_bric_summary` `sbs` group by `sbs`.`bs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_code_view_arrival`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_code_view_arrival`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_arrival`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_code_view_arrival` AS select `sum_bric_summary_arrival`.`bs_code` AS `code`,`sum_bric_summary_arrival`.`bs_quality` AS `bs_quality`,sum(`sum_bric_summary_arrival`.`weight`) AS `weight` from `sum_bric_summary_arrival` group by `sum_bric_summary_arrival`.`bs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_code_view_process_results`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_code_view_process_results`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_process_results`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_code_view_process_results` AS select `sum_bric_process_results`.`bs_code` AS `code`,`sum_bric_process_results`.`bs_quality` AS `bs_quality`,sum(`sum_bric_process_results`.`weight`) AS `weight` from `sum_bric_process_results` group by `sum_bric_process_results`.`bs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_code_view_purchased`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_code_view_purchased`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_purchased`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_code_view_purchased` AS select `sum_bric_summary_purchased`.`bs_code` AS `code`,`sum_bric_summary_purchased`.`bs_quality` AS `bs_quality`,sum(`sum_bric_summary_purchased`.`weight`) AS `weight` from `sum_bric_summary_purchased` group by `sum_bric_summary_purchased`.`bs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_code_view_stuffed`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_code_view_stuffed`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_stuffed`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_code_view_stuffed` AS select `sum_bric_summary_stuffed`.`bs_code` AS `code`,`sum_bric_summary_stuffed`.`bs_quality` AS `bs_quality`,sum(`sum_bric_summary_stuffed`.`weight`) AS `weight` from `sum_bric_summary_stuffed` group by `sum_bric_summary_stuffed`.`bs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_code_view_working_progress`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_code_view_working_progress`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_code_view_working_progress`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_code_view_working_progress` AS select `sum_bric_summary_working_progress`.`bs_code` AS `code`,`sum_bric_summary_working_progress`.`bs_quality` AS `bs_quality`,sum(`sum_bric_summary_working_progress`.`weight`) AS `weight` from `sum_bric_summary_working_progress` group by `sum_bric_summary_working_progress`.`bs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_internal_code_view`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_internal_code_view`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_internal_code_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_internal_code_view` AS select ifnull(`bws`.`ibs_code`,0) AS `code`,`bws`.`bs_code` AS `bs_code`,`bws`.`bs_quality` AS `bs_quality`,ifnull(`bws`.`ibs_quality`,NULL) AS `ibs_quality`,sum(`bws`.`full_weight`) AS `weight`,sum(`bws`.`weight`) AS `rounded_weight`,sum(`bws`.`value`) AS `value`,(sum((`bws`.`full_weight` * `bws`.`sl_hedge`)) / sum(`bws`.`full_weight`)) AS `hedge`,(sum(`bws`.`value`) / (sum(`bws`.`full_weight`) / 50)) AS `price`,(((sum(`bws`.`value`) / (sum(`bws`.`full_weight`) / 50)) / 1.1023) - (sum((`bws`.`full_weight` * `bws`.`sl_hedge`)) / sum(`bws`.`full_weight`))) AS `diff` from `breakdown_without_stuffed` `bws` group by `bws`.`ibs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_internal_code_view_working_progress`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_internal_code_view_working_progress`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_internal_code_view_working_progress`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_internal_code_view_working_progress` AS select `breakdown`.`ibs_code` AS `code`,`breakdown`.`bs_code` AS `bs_code`,`breakdown`.`bs_quality` AS `bs_quality`,`breakdown`.`ibs_quality` AS `ibs_quality`,sum(`breakdown`.`full_weight`) AS `weight` from `breakdown` where ((`breakdown`.`br_no` is not null) and (`breakdown`.`sct_number` is not null) and (`breakdown`.`sct_number` <> 'INTERNAL') and (`breakdown`.`status` <> 'stuffed')) group by `breakdown`.`ibs_code` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stock_item_count`
--

/*!50001 DROP TABLE IF EXISTS `sum_stock_item_count`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stock_item_count`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stock_item_count` AS select `stocks_storage_count`.`wr_name` AS `wr_name`,`stocks_storage_count`.`cb_name` AS `buyer`,if((`stocks_storage_count`.`wr_name` = 'IBERO EXPORT'),0,sum(`stocks_storage_count`.`storage`)) AS `storage`,count(0) AS `count`,round((if((`stocks_storage_count`.`wr_name` = 'IBERO EXPORT'),0,sum(`stocks_storage_count`.`storage`)) / count(0)),0) AS `average_storage` from `stocks_storage_count` group by `stocks_storage_count`.`cb_name`,`stocks_storage_count`.`wr_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_stuffed_and_weighbridge`
--

/*!50001 DROP TABLE IF EXISTS `sum_stuffed_and_weighbridge`*/;
/*!50001 DROP VIEW IF EXISTS `sum_stuffed_and_weighbridge`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_stuffed_and_weighbridge` AS select `stff`.`id` AS `id`,`stff`.`st_id` AS `st_id`,`stff`.`wb_id` AS `wb_id`,`stff`.`sct_id` AS `sct_id`,`stff`.`stff_date` AS `stff_date`,sum(`stff`.`stff_weight`) AS `stuffed_weight`,sum(`wb`.`wb_weight_out`) AS `wb_weight_out`,sum(`wb`.`wb_weight_in`) AS `wb_weight_in`,(sum(`wb`.`wb_weight_out`) - sum(`wb`.`wb_weight_in`)) AS `weighbridge_weight_difference`,`wb`.`wb_movement_permit` AS `wb_movement_permit`,`wb`.`wb_vehicle_plate` AS `wb_vehicle_plate`,`wb`.`wb_ticket` AS `wb_ticket`,`wb`.`wb_driver_name` AS `wb_driver_name`,`wb`.`wb_driver_id` AS `wb_driver_id` from (`stuffing_stff` `stff` left join `weighbridge_wb` `wb` on((`stff`.`wb_id` = `wb`.`id`))) group by `stff`.`sct_id`,`stff`.`st_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sum_warehouse_total`
--

/*!50001 DROP TABLE IF EXISTS `sum_warehouse_total`*/;
/*!50001 DROP VIEW IF EXISTS `sum_warehouse_total`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sum_warehouse_total` AS select sum(`bws`.`weight`) AS `weight`,`bws`.`wr_name` AS `wr_name`,`bws`.`cb_name` AS `buyer`,sum(`bws`.`value`) AS `value` from `breakdown_without_stuffed` `bws` group by `bws`.`cb_name`,`bws`.`wr_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tel_extensions`
--

/*!50001 DROP TABLE IF EXISTS `tel_extensions`*/;
/*!50001 DROP VIEW IF EXISTS `tel_extensions`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tel_extensions` AS select `per`.`id` AS `id`,`dprt`.`dprt_name` AS `dprt_name`,`per`.`per_fname` AS `per_fname`,`per`.`per_sname` AS `per_sname`,`per`.`per_extension` AS `per_extension` from (`person_per` `per` left join `department_dprt` `dprt` on((`dprt`.`id` = `per`.`dprt_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `warehouses_region`
--

/*!50001 DROP TABLE IF EXISTS `warehouses_region`*/;
/*!50001 DROP VIEW IF EXISTS `warehouses_region`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ngeatpmfkdb`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `warehouses_region` AS select `wr`.`id` AS `wrid`,`rgn`.`id` AS `rgnid`,`rgn`.`ctr_id` AS `ctr_id`,`rgn`.`rgn_name` AS `rgn_name`,`rgn`.`rgn_description` AS `rgn_description`,`wr`.`wr_name` AS `wr_name`,`wr`.`wrt_id` AS `wrt_id`,`wr`.`wr_initials` AS `wr_initials`,`wr`.`wr_description` AS `wr_description` from (`warehouse_wr` `wr` left join `region_rgn` `rgn` on((`wr`.`rgn_id` = `rgn`.`id`))) where (`rgn`.`ctr_id` is not null) */;
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

-- Dump completed on 2018-10-08 16:04:33
