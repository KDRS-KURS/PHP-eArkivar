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
-- Table structure for table `classification_system`
--

DROP TABLE IF EXISTS `classification_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classification_system` (
  `pk_classification_system_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `classification_type` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `finalised_by` varchar(255) DEFAULT NULL,
  `finalised_date` datetime DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_classification_system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classification_system`
--

LOCK TABLES `classification_system` WRITE;
/*!40000 ALTER TABLE `classification_system` DISABLE KEYS */;
INSERT INTO `classification_system` VALUES (1,NULL,'tsodring',NULL,NULL,NULL,NULL,'a5f65a7a-f310-45dc-9714-dc874a953df4','Kryssreferanse'),(2,NULL,'tsodring',NULL,NULL,NULL,NULL,'e8a91821-2219-4fef-ae6a-7f8e23be7aab','Fagklasse'),(3,NULL,'tsodring',NULL,NULL,NULL,NULL,'1640fdeb-1dc7-4e07-9c3f-e11e0744c7aa','Fellesklasse'),(4,NULL,'tsodring','1990-01-01 00:00:00',NULL,NULL,'2029-01-01 00:00:00','2906c0b9-fa06-4ed4-81f7-a75bc87f0580','Gårds og bruksnummer'),(5,NULL,'tsodring','2002-01-01 00:00:00',NULL,NULL,'2002-06-01 00:00:00','6ef576c0-d14e-42d2-b8c9-303619c1fdcd','Personalarkiv'),(6,NULL,'tsodring',NULL,NULL,NULL,NULL,'aa7237e6-3677-4dea-aa63-5a8d1c0001f4','Tilleggskode'),(7,NULL,'tsodring','1998-01-01 00:00:00',NULL,NULL,'2029-01-01 00:00:00','fa4f8879-1ee1-4d34-86ad-dcffe8590f37','Møtedokumenter fra utvalg'),(8,NULL,'tsodring',NULL,NULL,NULL,NULL,'d6dd7867-281c-42d9-8baf-1a1a06295147','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'),(9,NULL,'tsodring',NULL,NULL,NULL,NULL,'2a495b6d-2664-4f4d-bd60-6a932ffe2b8d','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
/*!40000 ALTER TABLE `classification_system` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-26 15:48:46
