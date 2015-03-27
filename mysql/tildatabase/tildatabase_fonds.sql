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
-- Table structure for table `fonds`
--

DROP TABLE IF EXISTS `fonds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonds` (
  `pk_fonds_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `document_medium` varchar(255) DEFAULT NULL,
  `finalised_by` varchar(255) DEFAULT NULL,
  `finalised_date` datetime DEFAULT NULL,
  `fonds_status` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `referenceParentFonds_pk_fonds_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_fonds_id`),
  KEY `FK_69j163vt6680of6dbgvs2pi5k` (`referenceParentFonds_pk_fonds_id`),
  CONSTRAINT `FK_69j163vt6680of6dbgvs2pi5k` FOREIGN KEY (`referenceParentFonds_pk_fonds_id`) REFERENCES `fonds` (`pk_fonds_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonds`
--

LOCK TABLES `fonds` WRITE;
/*!40000 ALTER TABLE `fonds` DISABLE KEYS */;
INSERT INTO `fonds` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'EARKIV','Arkiv for eArkiv-prosjektet',NULL),(2,NULL,NULL,'Registeret er organisert på gårds- og bruksnummer',NULL,NULL,NULL,NULL,'EIENDOM','Eiendomsregister',NULL),(3,NULL,NULL,'For saker lagret i emnearkivet',NULL,NULL,NULL,NULL,'FELLES','Fellesarkiv',NULL),(4,NULL,NULL,'For saker der arkivdel ikke er satt',NULL,NULL,NULL,NULL,'HA','Hovedarkiv',NULL),(5,NULL,NULL,'Registeret er organisert på lønnsnummer',NULL,NULL,NULL,NULL,'PERSONAL','Personalmapper',NULL),(6,NULL,NULL,'Registeret er organisert på gårds- og bruksnummer',NULL,NULL,NULL,NULL,'UTVALG','Utvalgsarkiv',NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'XXXXXXXXXX','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',NULL),(8,'system','2011-10-11 17:32:44','Subfonds5','Elektronisk arkiv','system','2011-10-11 19:26:36','Avsluttet','29743769-edf4-46f5-be47-51a0167fbfeb','Subfonds5',NULL),(9,'system','2011-10-11 17:32:44','Subfonds5','Elektronisk arkiv','system','2011-10-11 19:26:36','Avsluttet','29743769-edf4-46f5-be47-51a0167fbfeb','Subfonds5',NULL),(10,'system','2011-10-11 17:32:44','Subfonds5','Elektronisk arkiv','system','2011-10-11 19:26:36','Avsluttet','29743769-edf4-46f5-be47-51a0167fbfeb','Subfonds5',NULL),(11,'system','2011-10-11 17:32:44','Subfonds5','Elektronisk arkiv','system','2011-10-11 19:26:36','Avsluttet','29743769-edf4-46f5-be47-51a0167fbfeb','Subfonds5',NULL),(12,'system','2011-10-11 17:32:44','Subfonds5','Elektronisk arkiv','system','2011-10-11 19:26:36','Avsluttet','29713769-edf4-46f5-be47-51a0167fbfeb','Subfonds5',NULL);
/*!40000 ALTER TABLE `fonds` ENABLE KEYS */;
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
