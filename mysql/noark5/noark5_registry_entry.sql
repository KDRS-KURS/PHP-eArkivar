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
-- Table structure for table `registry_entry`
--

DROP TABLE IF EXISTS `registry_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registry_entry` (
  `document_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `freedom_assessment_date` date DEFAULT NULL,
  `loaned_date` date DEFAULT NULL,
  `loaned_to` datetime DEFAULT NULL,
  `number_of_attachments` int(11) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `record_date` date DEFAULT NULL,
  `record_sequence_number` int(11) DEFAULT NULL,
  `record_status` varchar(255) DEFAULT NULL,
  `record_year` int(11) DEFAULT NULL,
  `records_management_unit` varchar(255) DEFAULT NULL,
  `registry_entry_number` int(11) DEFAULT NULL,
  `registry_entry_type` varchar(255) DEFAULT NULL,
  `sent_date` datetime DEFAULT NULL,
  `pk_record_id` bigint(20) NOT NULL,
  PRIMARY KEY (`pk_record_id`),
  CONSTRAINT `FK_kwxomo0c0yos5mbe81lfd86ua` FOREIGN KEY (`pk_record_id`) REFERENCES `basic_record` (`pk_record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registry_entry`
--

LOCK TABLES `registry_entry` WRITE;
/*!40000 ALTER TABLE `registry_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `registry_entry` ENABLE KEYS */;
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
