CREATE DATABASE  IF NOT EXISTS `noark5` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `noark5`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 10.20.5.46    Database: noark5
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
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `pk_file_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `document_medium` varchar(255) DEFAULT NULL,
  `file_id` varchar(255) DEFAULT NULL,
  `finalised_by` varchar(255) DEFAULT NULL,
  `finalised_date` datetime DEFAULT NULL,
  `official_title` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_class_id` bigint(20) DEFAULT NULL,
  `referenceParentFile_pk_file_id` bigint(20) DEFAULT NULL,
  `file_series_id` bigint(20) DEFAULT NULL,
  `file_storage_location_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_file_id`),
  KEY `FK_jg3towfj6hogo0phh7xcsmmnw` (`file_class_id`),
  KEY `FK_ds17k3tpeeumv6b2vyhvkq84j` (`referenceParentFile_pk_file_id`),
  KEY `FK_mev6nbnjb625v0mtgm6y3ovfs` (`file_series_id`),
  KEY `FK_f8j4tulnfbkb54aw7kun0lac3` (`file_storage_location_id`),
  CONSTRAINT `FK_ds17k3tpeeumv6b2vyhvkq84j` FOREIGN KEY (`referenceParentFile_pk_file_id`) REFERENCES `file` (`pk_file_id`),
  CONSTRAINT `FK_f8j4tulnfbkb54aw7kun0lac3` FOREIGN KEY (`file_storage_location_id`) REFERENCES `storage_location` (`pk_storage_location_id`),
  CONSTRAINT `FK_jg3towfj6hogo0phh7xcsmmnw` FOREIGN KEY (`file_class_id`) REFERENCES `class` (`pk_class_id`),
  CONSTRAINT `FK_mev6nbnjb625v0mtgm6y3ovfs` FOREIGN KEY (`file_series_id`) REFERENCES `series` (`pk_series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` VALUES (1,'system','2011-10-11 17:34:29','','',NULL,'system','2011-10-11 19:26:36',NULL,'7fdc5a5d-2874-4d34-9692-303d631961d2','File10',NULL,NULL,1,NULL),(2,'system','2011-10-11 17:33:29','','',NULL,'system','2011-10-11 19:26:36',NULL,'b5638e85-f26c-4a60-bb16-abc74d3b9512','File1',NULL,NULL,1,NULL),(3,'system','2011-10-11 17:34:22','','',NULL,'system','2011-10-11 19:26:37',NULL,'18b5f512-c780-499c-837a-0d05d4c73dcf','File9',NULL,NULL,1,NULL),(4,'system','2011-10-11 17:33:41','','',NULL,'system','2011-10-11 19:26:37',NULL,'432978ea-eded-4e20-89ae-c129a8baee20','File3',NULL,NULL,1,NULL),(5,'system','2011-10-11 17:33:47','','',NULL,'system','2011-10-11 19:26:38',NULL,'4f56bbe3-f8e3-4ba0-9015-b3d5df015179','File4',NULL,NULL,1,NULL),(6,'system','2011-10-11 17:33:35','','',NULL,'system','2011-10-11 19:26:39',NULL,'74c828ac-7834-49c5-a868-687b324b9460','File2',NULL,NULL,1,NULL),(7,'system','2011-10-11 17:33:56','','',NULL,'system','2011-10-11 19:26:39',NULL,'8fb54fff-9cda-4a0e-8602-e5da70297ffa','File5',NULL,NULL,1,NULL),(8,'system','2011-10-11 17:34:02','','',NULL,'system','2011-10-11 19:26:40',NULL,'83029702-519a-4933-aeda-89ba6cfcee2b','File6',NULL,NULL,1,NULL),(9,'system','2011-10-11 18:37:00','','',NULL,'system','2011-10-11 19:26:40',NULL,'b1f3c9f6-8147-4c8b-9bfe-e1a577b68867','File11',NULL,NULL,1,NULL),(10,'system','2011-10-11 17:34:09','','',NULL,'system','2011-10-11 19:26:43',NULL,'346eef5b-41e0-433c-80d1-ae35cbe1f867','File7',NULL,NULL,1,NULL),(11,'system','2011-10-11 18:53:41','','',NULL,'system','2011-10-11 19:26:43',NULL,'d36b1b18-f963-4092-bf13-f45b58bc32e2','File12',NULL,NULL,1,NULL),(12,'system','2011-10-11 17:34:16','','',NULL,'system','2011-10-11 19:26:44',NULL,'cd69db61-5929-45de-ad63-513b55bc56fe','File8',NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-25 16:12:12
