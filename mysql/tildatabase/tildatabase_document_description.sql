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
-- Table structure for table `document_description`
--

DROP TABLE IF EXISTS `document_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_description` (
  `pk_document_description_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `associated_by` varchar(255) DEFAULT NULL,
  `associated_with_record_as` varchar(255) DEFAULT NULL,
  `association_date` date DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `document_medium` varchar(255) DEFAULT NULL,
  `document_number` int(11) DEFAULT NULL,
  `document_status` varchar(255) DEFAULT NULL,
  `document_type` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_document_description_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_description`
--

LOCK TABLES `document_description` WRITE;
/*!40000 ALTER TABLE `document_description` DISABLE KEYS */;
INSERT INTO `document_description` VALUES (1,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000124','Test av vedlegg'),(2,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000155','Test av vedlegg'),(3,NULL,'H','2002-04-18',NULL,NULL,NULL,'Fysisk arkiv',1,'B','dokument','2000220','SVAR - SØKNAD PÅ SOMMERJOBB ANN O. RAkk'),(4,NULL,'H','2002-04-18',NULL,NULL,NULL,'Fysisk arkiv',1,'B','dokument','2000221','SVAR - SØKNAD PÅ SOMMERJOBB TOM A. HAWk'),(5,NULL,'H','2002-04-18',NULL,NULL,NULL,'Fysisk arkiv',1,'B','dokument','2000225','SVAR - SØKNAD PÅ SOMMERJOBB TRUDE LUTT'),(6,NULL,'H','2002-04-18',NULL,NULL,NULL,'Fysisk arkiv',1,'B','dokument','2000226','SVAR - SØKNAD PÅ SOMMERJOBB TRUDE LUTT'),(7,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000277','TEST AV kODER PÅ BEHANDLING'),(8,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000278','ANSkAFFELSE AV NY PEIS I STUA'),(9,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000279','ANSkAFFELSE AV VAkTBIkkJE'),(10,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000282','TESTING'),(11,NULL,'H','2002-05-24',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000283','TEST'),(12,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000284','TEST AV kODER PÅ BEHANDLING'),(13,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000286','ANSkAFFELSE AV NY PEIS I STUA'),(14,NULL,'H','2002-05-30',NULL,NULL,NULL,'Fysisk arkiv',1,'F','dokument','2000288','TEST AV kODER PÅ BEHANDLING');
/*!40000 ALTER TABLE `document_description` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-26 15:48:45
