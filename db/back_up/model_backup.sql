-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: greenic_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.12-MariaDB

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
-- Table structure for table `greenic_activity_type`
--

DROP TABLE IF EXISTS `greenic_activity_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_activity_type` (
  `activity_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`activity_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_admin`
--

DROP TABLE IF EXISTS `greenic_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) NOT NULL,
  `admin_level` int(11) NOT NULL,
  `admin_member_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_username_UNIQUE` (`admin_username`),
  KEY `fk_greenic_admin_greenic_member1_idx` (`admin_member_id`),
  CONSTRAINT `fk_greenic_admin_greenic_member1` FOREIGN KEY (`admin_member_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_article`
--

DROP TABLE IF EXISTS `greenic_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_headline` varchar(600) NOT NULL,
  `article_content` text NOT NULL,
  `article_view` int(11) NOT NULL DEFAULT '0',
  `article_member_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `fk_greenic_article_greenic_member1_idx` (`article_member_id`),
  CONSTRAINT `fk_greenic_article_greenic_member1` FOREIGN KEY (`article_member_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_category`
--

DROP TABLE IF EXISTS `greenic_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(256) NOT NULL,
  `category_description` varchar(256) NOT NULL,
  `category_project_type_id` int(11) NOT NULL,
  `category_master_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `fk_greenic_category_greenic_project_type1_idx` (`category_project_type_id`),
  KEY `fk_greenic_category_greenic_category1_idx` (`category_master_id`),
  CONSTRAINT `fk_greenic_category_greenic_category1` FOREIGN KEY (`category_master_id`) REFERENCES `greenic_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_category_greenic_project_type1` FOREIGN KEY (`category_project_type_id`) REFERENCES `greenic_project_type` (`project_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `greenic_category_view`
--

DROP TABLE IF EXISTS `greenic_category_view`;
/*!50001 DROP VIEW IF EXISTS `greenic_category_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `greenic_category_view` AS SELECT 
 1 AS `category_id`,
 1 AS `category_name`,
 1 AS `category_master_id`,
 1 AS `category_master_name`,
 1 AS `category_description`,
 1 AS `category_project_type_id`,
 1 AS `project_type_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `greenic_chat`
--

DROP TABLE IF EXISTS `greenic_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_sender_id` int(11) NOT NULL,
  `chat_receiver_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `chat_sendtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chat_seentime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`chat_id`),
  KEY `fk_greenic_chat_greenic_member1_idx` (`chat_sender_id`),
  KEY `fk_greenic_chat_greenic_member2_idx` (`chat_receiver_id`),
  CONSTRAINT `fk_greenic_chat_greenic_member1` FOREIGN KEY (`chat_sender_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_chat_greenic_member2` FOREIGN KEY (`chat_receiver_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_district`
--

DROP TABLE IF EXISTS `greenic_district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_district` (
  `district_id` int(5) NOT NULL AUTO_INCREMENT,
  `district_code` varchar(4) DEFAULT NULL,
  `district_name` varchar(150) DEFAULT NULL,
  `district_geo_id` int(5) DEFAULT NULL,
  `district_province_id` int(5) NOT NULL,
  PRIMARY KEY (`district_id`),
  KEY `fk_greenic_district_greenic_province1_idx` (`district_province_id`),
  CONSTRAINT `fk_greenic_district_greenic_province1` FOREIGN KEY (`district_province_id`) REFERENCES `greenic_province` (`province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_farm`
--

DROP TABLE IF EXISTS `greenic_farm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_farm` (
  `farm_id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_name` varchar(300) NOT NULL,
  `farm_province` varchar(256) NOT NULL,
  `farm_district` varchar(256) NOT NULL,
  `farm_sub_district` varchar(200) DEFAULT NULL,
  `farm_address` varchar(600) NOT NULL,
  `farm_member_id` int(11) NOT NULL,
  `farm_status_id` int(11) NOT NULL,
  PRIMARY KEY (`farm_id`),
  KEY `fk_greenic_farm_greenic_member1_idx` (`farm_member_id`),
  KEY `fk_greenic_farm_greenic_status1_idx` (`farm_status_id`),
  CONSTRAINT `fk_greenic_farm_greenic_member1` FOREIGN KEY (`farm_member_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_farm_greenic_status1` FOREIGN KEY (`farm_status_id`) REFERENCES `greenic_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `greenic_farm_view`
--

DROP TABLE IF EXISTS `greenic_farm_view`;
/*!50001 DROP VIEW IF EXISTS `greenic_farm_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `greenic_farm_view` AS SELECT 
 1 AS `farm_id`,
 1 AS `farm_name`,
 1 AS `farm_province`,
 1 AS `farm_district`,
 1 AS `farm_sub_district`,
 1 AS `farm_address`,
 1 AS `farm_member_id`,
 1 AS `farm_status_id`,
 1 AS `member_id`,
 1 AS `member_email`,
 1 AS `member_firstname`,
 1 AS `member_lastname`,
 1 AS `member_password`,
 1 AS `member_img_path`,
 1 AS `member_address`,
 1 AS `member_province`,
 1 AS `member_district`,
 1 AS `member_sub_district`,
 1 AS `member_token`,
 1 AS `member_regis_time`,
 1 AS `member_verify_time`,
 1 AS `member_type_id`,
 1 AS `member_status_id`,
 1 AS `member_status_name`,
 1 AS `member_type_name`,
 1 AS `farm_status_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `greenic_follow`
--

DROP TABLE IF EXISTS `greenic_follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `follow_member_id` int(11) NOT NULL,
  `follow_project_id` int(11) DEFAULT NULL,
  `follow_farm_id` int(11) DEFAULT NULL,
  `follow_farmer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `fk_greenic_follow_greenic_member1_idx` (`follow_member_id`),
  KEY `fk_greenic_follow_greenic_project1_idx` (`follow_project_id`),
  KEY `fk_greenic_follow_greenic_farm1_idx` (`follow_farm_id`),
  KEY `fk_greenic_follow_greenic_member2_idx` (`follow_farmer_id`),
  CONSTRAINT `fk_greenic_follow_greenic_farm1` FOREIGN KEY (`follow_farm_id`) REFERENCES `greenic_farm` (`farm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_follow_greenic_member1` FOREIGN KEY (`follow_member_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_follow_greenic_member2` FOREIGN KEY (`follow_farmer_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_follow_greenic_project1` FOREIGN KEY (`follow_project_id`) REFERENCES `greenic_project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_member`
--

DROP TABLE IF EXISTS `greenic_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_email` varchar(100) NOT NULL,
  `member_firstname` varchar(200) NOT NULL,
  `member_lastname` varchar(200) DEFAULT NULL,
  `member_password` varchar(512) NOT NULL,
  `member_img_path` varchar(512) DEFAULT NULL,
  `member_address` varchar(400) DEFAULT NULL,
  `member_province` varchar(300) DEFAULT NULL,
  `member_district` varchar(300) DEFAULT NULL,
  `member_sub_district` varchar(300) DEFAULT NULL,
  `member_token` varchar(512) DEFAULT NULL,
  `member_regis_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_verify_time` timestamp NULL DEFAULT NULL,
  `member_type_id` int(11) NOT NULL,
  `member_status_id` int(11) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_email_UNIQUE` (`member_email`),
  KEY `fk_greenic_member_greenic_member_type2_idx` (`member_type_id`),
  KEY `fk_greenic_member_greenic_status1_idx` (`member_status_id`),
  CONSTRAINT `fk_greenic_member_greenic_member_type2` FOREIGN KEY (`member_type_id`) REFERENCES `greenic_member_type` (`member_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_member_greenic_status1` FOREIGN KEY (`member_status_id`) REFERENCES `greenic_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_member_type`
--

DROP TABLE IF EXISTS `greenic_member_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_member_type` (
  `member_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`member_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `greenic_member_view`
--

DROP TABLE IF EXISTS `greenic_member_view`;
/*!50001 DROP VIEW IF EXISTS `greenic_member_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `greenic_member_view` AS SELECT 
 1 AS `member_id`,
 1 AS `member_email`,
 1 AS `member_firstname`,
 1 AS `member_lastname`,
 1 AS `member_password`,
 1 AS `member_img_path`,
 1 AS `member_address`,
 1 AS `member_province`,
 1 AS `member_district`,
 1 AS `member_sub_district`,
 1 AS `member_token`,
 1 AS `member_regis_time`,
 1 AS `member_verify_time`,
 1 AS `member_type_id`,
 1 AS `member_status_id`,
 1 AS `member_status_name`,
 1 AS `member_type_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `greenic_notification`
--

DROP TABLE IF EXISTS `greenic_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `noticfication_message` varchar(300) DEFAULT NULL,
  `notification_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notification_notice` tinyint(2) NOT NULL,
  `notification_member_id` int(11) NOT NULL,
  `notification_project_id` int(11) DEFAULT NULL,
  `notification_project_post_id` int(11) DEFAULT NULL,
  `notification_activity_type_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `fk_greenic_notification_greenic_member1_idx` (`notification_member_id`),
  KEY `fk_greenic_notification_greenic_project1_idx` (`notification_project_id`),
  KEY `fk_greenic_notification_greenic_activity_type1_idx` (`notification_activity_type_id`),
  KEY `fk_greenic_notification_greenic_project_post1_idx` (`notification_project_post_id`),
  CONSTRAINT `fk_greenic_notification_greenic_activity_type1` FOREIGN KEY (`notification_activity_type_id`) REFERENCES `greenic_activity_type` (`activity_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_notification_greenic_member1` FOREIGN KEY (`notification_member_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_notification_greenic_project1` FOREIGN KEY (`notification_project_id`) REFERENCES `greenic_project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_notification_greenic_project_post1` FOREIGN KEY (`notification_project_post_id`) REFERENCES `greenic_project_post` (`project_post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_product_shipment`
--

DROP TABLE IF EXISTS `greenic_product_shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_product_shipment` (
  `product_shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_shipment_project_id` int(11) NOT NULL,
  `product_shipment_shipment_id` int(11) NOT NULL,
  PRIMARY KEY (`product_shipment_id`),
  KEY `fk_greenic_product_shipment_greenic_project1_idx` (`product_shipment_project_id`),
  KEY `fk_greenic_product_shipment_greenic_shipment1_idx` (`product_shipment_shipment_id`),
  CONSTRAINT `fk_greenic_product_shipment_greenic_project1` FOREIGN KEY (`product_shipment_project_id`) REFERENCES `greenic_project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_product_shipment_greenic_shipment1` FOREIGN KEY (`product_shipment_shipment_id`) REFERENCES `greenic_shipment` (`shipment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_project`
--

DROP TABLE IF EXISTS `greenic_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(300) NOT NULL,
  `project_detail` text NOT NULL,
  `project_location` varchar(500) DEFAULT NULL,
  `project_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_startdate` datetime DEFAULT NULL,
  `project_enddate` datetime DEFAULT NULL,
  `project_selldate` datetime DEFAULT NULL,
  `project_quantity` float DEFAULT '0',
  `project_ppu` float DEFAULT '0',
  `project_lowest_order` float DEFAULT '0',
  `project_cover_image_path` varchar(512) DEFAULT NULL,
  `project_view` int(11) DEFAULT '0',
  `project_category_id` int(11) NOT NULL,
  `project_farm_id` int(11) NOT NULL,
  `project_status_id` int(11) NOT NULL,
  `project_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `fk_greenic_project_greenic_category1_idx` (`project_category_id`),
  KEY `fk_greenic_project_greenic_farm1_idx` (`project_farm_id`),
  KEY `fk_greenic_project_greenic_status1_idx` (`project_status_id`),
  KEY `fk_greenic_project_greenic_unit1_idx` (`project_unit_id`),
  CONSTRAINT `fk_greenic_project_greenic_category1` FOREIGN KEY (`project_category_id`) REFERENCES `greenic_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_project_greenic_farm1` FOREIGN KEY (`project_farm_id`) REFERENCES `greenic_farm` (`farm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_project_greenic_status1` FOREIGN KEY (`project_status_id`) REFERENCES `greenic_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_project_greenic_unit1` FOREIGN KEY (`project_unit_id`) REFERENCES `greenic_unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_project_post`
--

DROP TABLE IF EXISTS `greenic_project_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_project_post` (
  `project_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_post_caption` varchar(500) NOT NULL,
  `project_post_detail` varchar(500) DEFAULT NULL,
  `project_post_image` varchar(512) NOT NULL,
  `project_post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_post_project_id` int(11) NOT NULL,
  PRIMARY KEY (`project_post_id`),
  KEY `fk_greenic_project_post_greenic_project1_idx` (`project_post_project_id`),
  CONSTRAINT `fk_greenic_project_post_greenic_project1` FOREIGN KEY (`project_post_project_id`) REFERENCES `greenic_project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_project_type`
--

DROP TABLE IF EXISTS `greenic_project_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_project_type` (
  `project_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_type_name` varchar(256) NOT NULL,
  PRIMARY KEY (`project_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `greenic_project_view`
--

DROP TABLE IF EXISTS `greenic_project_view`;
/*!50001 DROP VIEW IF EXISTS `greenic_project_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `greenic_project_view` AS SELECT 
 1 AS `project_id`,
 1 AS `project_name`,
 1 AS `project_detail`,
 1 AS `project_location`,
 1 AS `project_time`,
 1 AS `project_startdate`,
 1 AS `project_enddate`,
 1 AS `project_selldate`,
 1 AS `project_quantity`,
 1 AS `project_ppu`,
 1 AS `project_lowest_order`,
 1 AS `project_cover_image_path`,
 1 AS `project_view`,
 1 AS `project_category_id`,
 1 AS `project_farm_id`,
 1 AS `project_status_id`,
 1 AS `project_unit_id`,
 1 AS `category_id`,
 1 AS `category_name`,
 1 AS `category_master_id`,
 1 AS `category_master_name`,
 1 AS `category_description`,
 1 AS `category_project_type_id`,
 1 AS `project_type_name`,
 1 AS `farm_id`,
 1 AS `farm_name`,
 1 AS `farm_province`,
 1 AS `farm_district`,
 1 AS `farm_sub_district`,
 1 AS `farm_address`,
 1 AS `farm_member_id`,
 1 AS `farm_status_id`,
 1 AS `member_id`,
 1 AS `member_email`,
 1 AS `member_firstname`,
 1 AS `member_lastname`,
 1 AS `member_password`,
 1 AS `member_img_path`,
 1 AS `member_address`,
 1 AS `member_province`,
 1 AS `member_district`,
 1 AS `member_sub_district`,
 1 AS `member_token`,
 1 AS `member_regis_time`,
 1 AS `member_verify_time`,
 1 AS `member_type_id`,
 1 AS `member_status_id`,
 1 AS `member_status_name`,
 1 AS `member_type_name`,
 1 AS `farm_status_name`,
 1 AS `project_unit_name`,
 1 AS `project_status_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `greenic_province`
--

DROP TABLE IF EXISTS `greenic_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_province` (
  `province_id` int(5) NOT NULL AUTO_INCREMENT,
  `province_code` varchar(2) DEFAULT NULL,
  `province_name` varchar(150) DEFAULT NULL,
  `province_geo_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_review`
--

DROP TABLE IF EXISTS `greenic_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_rate` int(11) NOT NULL,
  `review_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_buydate` datetime NOT NULL,
  `review_comment` varchar(600) DEFAULT NULL,
  `review_member_id` int(11) NOT NULL,
  `review_project_id` int(11) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `fk_greenic_review_greenic_member1_idx` (`review_member_id`),
  KEY `fk_greenic_review_greenic_project1_idx` (`review_project_id`),
  CONSTRAINT `fk_greenic_review_greenic_member1` FOREIGN KEY (`review_member_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_review_greenic_project1` FOREIGN KEY (`review_project_id`) REFERENCES `greenic_project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_shipment`
--

DROP TABLE IF EXISTS `greenic_shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_shipment` (
  `shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_name` varchar(200) NOT NULL,
  PRIMARY KEY (`shipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_status`
--

DROP TABLE IF EXISTS `greenic_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(100) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_sub_district`
--

DROP TABLE IF EXISTS `greenic_sub_district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_sub_district` (
  `sub_district_id` int(5) NOT NULL,
  `sub_district_code` varchar(6) DEFAULT NULL,
  `sub_district_name` varchar(150) DEFAULT NULL,
  `sub_district_district_id` int(5) NOT NULL,
  `sub_district_province_id` int(5) NOT NULL,
  `sub_district_geo_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`sub_district_id`),
  KEY `fk_greenic_sub_district_greenic_province1_idx` (`sub_district_province_id`),
  KEY `fk_greenic_sub_district_greenic_district1_idx` (`sub_district_district_id`),
  CONSTRAINT `fk_greenic_sub_district_greenic_district1` FOREIGN KEY (`sub_district_district_id`) REFERENCES `greenic_district` (`district_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_sub_district_greenic_province1` FOREIGN KEY (`sub_district_province_id`) REFERENCES `greenic_province` (`province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_unit`
--

DROP TABLE IF EXISTS `greenic_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(60) NOT NULL,
  `unit_order` int(11) DEFAULT '1',
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `greenic_vote_review`
--

DROP TABLE IF EXISTS `greenic_vote_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenic_vote_review` (
  `vote_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_review_agree` tinyint(2) NOT NULL,
  `vote_review_member_id` int(11) NOT NULL,
  `vote_review_review_id` int(11) NOT NULL,
  PRIMARY KEY (`vote_review_id`),
  KEY `fk_greenic_vote_review_greenic_member1_idx` (`vote_review_member_id`),
  KEY `fk_greenic_vote_review_greenic_review1_idx` (`vote_review_review_id`),
  CONSTRAINT `fk_greenic_vote_review_greenic_member1` FOREIGN KEY (`vote_review_member_id`) REFERENCES `greenic_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_greenic_vote_review_greenic_review1` FOREIGN KEY (`vote_review_review_id`) REFERENCES `greenic_review` (`review_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `greenic_category_view`
--

/*!50001 DROP VIEW IF EXISTS `greenic_category_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `greenic_category_view` AS select `category`.`category_id` AS `category_id`,`category`.`category_name` AS `category_name`,`master_category`.`category_id` AS `category_master_id`,`master_category`.`category_name` AS `category_master_name`,`category`.`category_description` AS `category_description`,`category`.`category_project_type_id` AS `category_project_type_id`,`project_type`.`project_type_name` AS `project_type_name` from ((`greenic_category` `category` left join `greenic_category` `master_category` on((`category`.`category_master_id` = `master_category`.`category_id`))) join `greenic_project_type` `project_type` on((`project_type`.`project_type_id` = `category`.`category_project_type_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `greenic_farm_view`
--

/*!50001 DROP VIEW IF EXISTS `greenic_farm_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `greenic_farm_view` AS select `farm`.`farm_id` AS `farm_id`,`farm`.`farm_name` AS `farm_name`,`farm`.`farm_province` AS `farm_province`,`farm`.`farm_district` AS `farm_district`,`farm`.`farm_sub_district` AS `farm_sub_district`,`farm`.`farm_address` AS `farm_address`,`farm`.`farm_member_id` AS `farm_member_id`,`farm`.`farm_status_id` AS `farm_status_id`,`member`.`member_id` AS `member_id`,`member`.`member_email` AS `member_email`,`member`.`member_firstname` AS `member_firstname`,`member`.`member_lastname` AS `member_lastname`,`member`.`member_password` AS `member_password`,`member`.`member_img_path` AS `member_img_path`,`member`.`member_address` AS `member_address`,`member`.`member_province` AS `member_province`,`member`.`member_district` AS `member_district`,`member`.`member_sub_district` AS `member_sub_district`,`member`.`member_token` AS `member_token`,`member`.`member_regis_time` AS `member_regis_time`,`member`.`member_verify_time` AS `member_verify_time`,`member`.`member_type_id` AS `member_type_id`,`member`.`member_status_id` AS `member_status_id`,`member`.`member_status_name` AS `member_status_name`,`member`.`member_type_name` AS `member_type_name`,`state`.`status_name` AS `farm_status_name` from ((`greenic_farm` `farm` join `greenic_member_view` `member` on((`member`.`member_id` = `farm`.`farm_member_id`))) join `greenic_status` `state` on((`state`.`status_id` = `farm`.`farm_status_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `greenic_member_view`
--

/*!50001 DROP VIEW IF EXISTS `greenic_member_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `greenic_member_view` AS select `member`.`member_id` AS `member_id`,`member`.`member_email` AS `member_email`,`member`.`member_firstname` AS `member_firstname`,`member`.`member_lastname` AS `member_lastname`,`member`.`member_password` AS `member_password`,`member`.`member_img_path` AS `member_img_path`,`member`.`member_address` AS `member_address`,`member`.`member_province` AS `member_province`,`member`.`member_district` AS `member_district`,`member`.`member_sub_district` AS `member_sub_district`,`member`.`member_token` AS `member_token`,`member`.`member_regis_time` AS `member_regis_time`,`member`.`member_verify_time` AS `member_verify_time`,`member`.`member_type_id` AS `member_type_id`,`member`.`member_status_id` AS `member_status_id`,`state`.`status_name` AS `member_status_name`,`member_type`.`member_type_name` AS `member_type_name` from ((`greenic_member` `member` join `greenic_status` `state` on((`state`.`status_id` = `member`.`member_status_id`))) join `greenic_member_type` `member_type` on((`member_type`.`member_type_id` = `member`.`member_type_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `greenic_project_view`
--

/*!50001 DROP VIEW IF EXISTS `greenic_project_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `greenic_project_view` AS select `project`.`project_id` AS `project_id`,`project`.`project_name` AS `project_name`,`project`.`project_detail` AS `project_detail`,`project`.`project_location` AS `project_location`,`project`.`project_time` AS `project_time`,`project`.`project_startdate` AS `project_startdate`,`project`.`project_enddate` AS `project_enddate`,`project`.`project_selldate` AS `project_selldate`,`project`.`project_quantity` AS `project_quantity`,`project`.`project_ppu` AS `project_ppu`,`project`.`project_lowest_order` AS `project_lowest_order`,`project`.`project_cover_image_path` AS `project_cover_image_path`,`project`.`project_view` AS `project_view`,`project`.`project_category_id` AS `project_category_id`,`project`.`project_farm_id` AS `project_farm_id`,`project`.`project_status_id` AS `project_status_id`,`project`.`project_unit_id` AS `project_unit_id`,`category`.`category_id` AS `category_id`,`category`.`category_name` AS `category_name`,`category`.`category_master_id` AS `category_master_id`,`category`.`category_master_name` AS `category_master_name`,`category`.`category_description` AS `category_description`,`category`.`category_project_type_id` AS `category_project_type_id`,`category`.`project_type_name` AS `project_type_name`,`farm`.`farm_id` AS `farm_id`,`farm`.`farm_name` AS `farm_name`,`farm`.`farm_province` AS `farm_province`,`farm`.`farm_district` AS `farm_district`,`farm`.`farm_sub_district` AS `farm_sub_district`,`farm`.`farm_address` AS `farm_address`,`farm`.`farm_member_id` AS `farm_member_id`,`farm`.`farm_status_id` AS `farm_status_id`,`farm`.`member_id` AS `member_id`,`farm`.`member_email` AS `member_email`,`farm`.`member_firstname` AS `member_firstname`,`farm`.`member_lastname` AS `member_lastname`,`farm`.`member_password` AS `member_password`,`farm`.`member_img_path` AS `member_img_path`,`farm`.`member_address` AS `member_address`,`farm`.`member_province` AS `member_province`,`farm`.`member_district` AS `member_district`,`farm`.`member_sub_district` AS `member_sub_district`,`farm`.`member_token` AS `member_token`,`farm`.`member_regis_time` AS `member_regis_time`,`farm`.`member_verify_time` AS `member_verify_time`,`farm`.`member_type_id` AS `member_type_id`,`farm`.`member_status_id` AS `member_status_id`,`farm`.`member_status_name` AS `member_status_name`,`farm`.`member_type_name` AS `member_type_name`,`farm`.`farm_status_name` AS `farm_status_name`,`unit`.`unit_name` AS `project_unit_name`,`greenic_status`.`status_name` AS `project_status_name` from ((((`greenic_project` `project` join `greenic_category_view` `category` on((`category`.`category_id` = `project`.`project_category_id`))) join `greenic_farm_view` `farm` on((`farm`.`farm_id` = `project`.`project_farm_id`))) join `greenic_unit` `unit` on((`unit`.`unit_id` = `project`.`project_unit_id`))) join `greenic_status` on((`greenic_status`.`status_id` = `project`.`project_status_id`))) */;
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

-- Dump completed on 2016-09-05 21:46:01
