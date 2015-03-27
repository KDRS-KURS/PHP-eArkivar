CREATE DATABASE  IF NOT EXISTS `tildatabase` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tildatabase`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 10.20.5.46    Database: tildatabase
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `document_object`
--

DROP TABLE IF EXISTS `document_object`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_object` (
  `pk_document_object_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `checksum` varchar(255) DEFAULT NULL,
  `checksum_algorithm` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  `format_details` varchar(255) DEFAULT NULL,
  `reference_document_file` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `variant_format` varchar(255) DEFAULT NULL,
  `version_number` int(11) DEFAULT NULL,
  `document_object_document_description_id` bigint(20) DEFAULT NULL,
  `document_object_record_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_document_object_id`),
  KEY `FK_aba1hp827by6kyok9n414d3mc` (`document_object_document_description_id`),
  KEY `FK_5kuiyhjyuk258f5worsunftd` (`document_object_record_id`),
  CONSTRAINT `FK_5kuiyhjyuk258f5worsunftd` FOREIGN KEY (`document_object_record_id`) REFERENCES `record` (`pk_record_id`),
  CONSTRAINT `FK_aba1hp827by6kyok9n414d3mc` FOREIGN KEY (`document_object_document_description_id`) REFERENCES `document_description` (`pk_document_description_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_object`
--

LOCK TABLES `document_object` WRITE;
/*!40000 ALTER TABLE `document_object` DISABLE KEYS */;
INSERT INTO `document_object` VALUES (1,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\290.PDF',NULL,'A',1,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\285.PDF',NULL,'A',2,NULL,NULL),(3,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\248.PDF',NULL,'A',1,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\301.PDF',NULL,'A',1,NULL,NULL),(5,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\294.PDF',NULL,'A',1,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\293.PDF',NULL,'A',1,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\278.PDF',NULL,'A',3,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\300.PDF',NULL,'A',1,NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\296.PDF',NULL,'A',1,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,'RA-PDF',NULL,'\\Dokumenter001\\298.PDF',NULL,'A',1,NULL,NULL);
/*!40000 ALTER TABLE `document_object` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-26 15:48:49
