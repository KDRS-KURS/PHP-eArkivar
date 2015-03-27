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
-- Table structure for table `basic_record_keyword`
--

DROP TABLE IF EXISTS `basic_record_keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basic_record_keyword` (
  `f_pk_record_id` bigint(20) NOT NULL,
  `f_pk_keyword_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_record_id`,`f_pk_keyword_id`),
  KEY `FK_67fayx2bwyhpa4twfxwayrork` (`f_pk_keyword_id`),
  CONSTRAINT `FK_67fayx2bwyhpa4twfxwayrork` FOREIGN KEY (`f_pk_keyword_id`) REFERENCES `keyword` (`pk_keyword_id`),
  CONSTRAINT `FK_f67pekutp3xvgph6kca4jsi3l` FOREIGN KEY (`f_pk_record_id`) REFERENCES `basic_record` (`pk_record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basic_record_keyword`
--

LOCK TABLES `basic_record_keyword` WRITE;
/*!40000 ALTER TABLE `basic_record_keyword` DISABLE KEYS */;
/*!40000 ALTER TABLE `basic_record_keyword` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-26 15:48:43
