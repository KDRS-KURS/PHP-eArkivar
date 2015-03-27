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
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `pk_record_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `archived_by` varchar(255) DEFAULT NULL,
  `archived_date` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `record_class_id` bigint(20) DEFAULT NULL,
  `record_file_id` bigint(20) DEFAULT NULL,
  `record_series_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_record_id`),
  KEY `FK_odsb9ljaukssypinqx83w83o7` (`record_class_id`),
  KEY `FK_kdme5gs8menoxnfpohba1ql7c` (`record_file_id`),
  KEY `FK_n2qfgleytsst1qa75pajmxwfc` (`record_series_id`),
  CONSTRAINT `FK_kdme5gs8menoxnfpohba1ql7c` FOREIGN KEY (`record_file_id`) REFERENCES `file` (`pk_file_id`),
  CONSTRAINT `FK_n2qfgleytsst1qa75pajmxwfc` FOREIGN KEY (`record_series_id`) REFERENCES `series` (`pk_series_id`),
  CONSTRAINT `FK_odsb9ljaukssypinqx83w83o7` FOREIGN KEY (`record_class_id`) REFERENCES `class` (`pk_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES (1,'system','2011-10-11 19:26:36','system','2011-10-11 17:39:51','18a94c90-2d89-41fd-8b0d-0c24317cc589',NULL,1,NULL),(2,'system','2011-10-11 19:26:36','system','2011-10-11 17:40:03','68f08d11-6796-409a-96da-1b403b406549',NULL,1,NULL),(3,'system','2011-10-11 19:26:36','system','2011-10-11 17:39:44','abe90af6-5858-4472-8e8f-a4e9c0099628',NULL,1,NULL),(4,'system','2011-10-11 19:26:36','system','2011-10-11 17:43:29','ba293aa9-6eb6-4f0e-8829-03ee82d95c3e',NULL,1,NULL),(5,'system','2011-10-11 19:26:36','system','2011-10-11 17:39:37','3d4b83b3-ad3a-4eed-9964-0647fa7ab790',NULL,1,NULL),(6,'system','2011-10-11 19:26:37','system','2011-10-11 17:34:59','c3d86e16-9a70-48b6-bec8-aed27b483e86',NULL,2,NULL),(7,'system','2011-10-11 19:26:37','system','2011-10-11 17:35:05','70efc42c-d1af-4326-9dfd-4c823be0a6e1',NULL,2,NULL),(8,'system','2011-10-11 19:26:37','system','2011-10-11 17:34:38','adb72850-837e-4f97-91f3-4374ecfd7491',NULL,2,NULL),(9,'system','2011-10-11 19:26:37','system','2011-10-11 17:34:45','7bfeea2d-acf9-470b-a591-08ea30b85b0f',NULL,2,NULL),(10,'system','2011-10-11 19:26:37','system','2011-10-11 17:34:53','0cf640ca-4928-4d45-850f-9585f04c9e56',NULL,2,NULL),(11,'system','2011-10-11 19:26:37','system','2011-10-11 17:39:16','7a129a6f-a990-4424-89d2-8945e5859ff0',NULL,3,NULL),(12,'system','2011-10-11 19:26:37','system','2011-10-11 17:39:05','dc3381e4-9f1d-493f-9a69-a66903a0dea8',NULL,3,NULL),(13,'system','2011-10-11 19:26:37','system','2011-10-11 17:39:10','3be6bd40-cc8a-4694-8f91-b0c61827cf14',NULL,3,NULL),(14,'system','2011-10-11 19:26:37','system','2011-10-11 17:39:29','009e95e9-d12e-49f5-a3c1-bde05fba1f4f',NULL,3,NULL),(15,'system','2011-10-11 19:26:37','system','2011-10-11 17:39:22','379a6e0f-e2e3-49f3-a2bd-e0a913788d88',NULL,3,NULL),(16,'system','2011-10-11 19:26:38','system','2011-10-11 17:35:50','baffe63d-354a-405f-9b0d-135bee4a113f',NULL,4,NULL),(17,'system','2011-10-11 19:26:38','system','2011-10-11 17:35:44','d741dd93-9dab-4e6c-a874-a9d1654f1033',NULL,4,NULL),(18,'system','2011-10-11 19:26:38','system','2011-10-11 17:36:08','b0c1d434-6afb-4cd9-8924-4f721cf97303',NULL,4,NULL),(19,'system','2011-10-11 19:26:38','system','2011-10-11 17:36:02','2c7ea559-03c6-45e1-b930-05b457dc42e5',NULL,4,NULL),(20,'system','2011-10-11 19:26:38','system','2011-10-11 17:35:56','517d06b7-ed83-482f-8f55-dc934a4957a1',NULL,4,NULL),(21,'system','2011-10-11 19:26:38','system','2011-10-11 17:36:27','159d8150-3b40-404a-b489-1e3f117fa35d',NULL,5,NULL),(22,'system','2011-10-11 19:26:38','system','2011-10-11 17:36:32','8ec1271a-47ef-44b5-a57a-7776b7753689',NULL,5,NULL),(23,'system','2011-10-11 19:26:38','system','2011-10-11 17:36:21','6ad7da06-e311-403e-8fd7-8a2c9e09f251',NULL,5,NULL),(24,'system','2011-10-11 19:26:39','system','2011-10-11 17:36:16','7978e7f3-aae7-4e96-b3e2-9435bcb161ea',NULL,5,NULL),(25,'system','2011-10-11 19:26:39','system','2011-10-11 17:36:39','4d85b9a7-9186-472b-9086-463e7de9ddd5',NULL,5,NULL),(26,'system','2011-10-11 19:26:39','system','2011-10-11 17:35:36','9e2cf47e-d06d-43a5-812f-5ac3c5350f51',NULL,6,NULL),(27,'system','2011-10-11 19:26:39','system','2011-10-11 17:35:30','959f4f26-83d8-4dd7-8ba4-e09a5752814e',NULL,6,NULL),(28,'system','2011-10-11 19:26:39','system','2011-10-11 17:35:23','e66a1864-1331-498c-b3e5-67921d55c7aa',NULL,6,NULL),(29,'system','2011-10-11 19:26:39','system','2011-10-11 17:35:16','da9b5210-9faf-440f-98ef-2d3745a553d4',NULL,6,NULL),(30,'system','2011-10-11 19:26:39','system','2011-10-11 17:35:11','3ced1df6-5953-47b4-82cb-7a3896b770f4',NULL,6,NULL),(31,'system','2011-10-11 19:26:39','system','2011-10-11 17:36:58','31ee43ed-bae1-4518-ada3-5209b2f0baf3',NULL,7,NULL),(32,'system','2011-10-11 19:26:40','system','2011-10-11 17:37:04','a9ba9427-4e32-4ce9-8175-716eb04f55d3',NULL,7,NULL),(33,'system','2011-10-11 19:26:40','system','2011-10-11 17:37:09','eb1265c5-0d98-4687-8bbb-6c81eb9df95b',NULL,7,NULL),(34,'system','2011-10-11 19:26:40','system','2011-10-11 17:36:52','76f8bc86-e5ec-4cd1-939a-d8ac67730eed',NULL,7,NULL),(35,'system','2011-10-11 19:26:40','system','2011-10-11 17:36:46','0a7a9c5a-f39a-43f4-a531-8fe6344c2188',NULL,7,NULL),(36,'system','2011-10-11 19:26:40','system','2011-10-11 17:37:29','bf1dfa10-243a-4a7c-9904-89ec9325cca0',NULL,8,NULL),(37,'system','2011-10-11 19:26:40','system','2011-10-11 17:37:23','72a5a27f-862e-478d-ba0f-e9c806b92f68',NULL,8,NULL),(38,'system','2011-10-11 19:26:40','system','2011-10-11 17:37:36','d1d94b3e-d14a-40a2-ba03-5b1ee96786d9',NULL,8,NULL),(39,'system','2011-10-11 19:26:40','system','2011-10-11 17:37:15','e833bb39-80c0-49ae-893b-ef07ec6ad41b',NULL,8,NULL),(40,'system','2011-10-11 19:26:40','system','2011-10-11 17:37:42','66e647a6-bc39-4f0b-8300-c3d8d59ad456',NULL,8,NULL),(41,'system','2011-10-11 19:26:43','system','2011-10-11 17:38:10','21ea6142-98bf-468a-b812-eb09364eb78a',NULL,10,NULL),(42,'system','2011-10-11 19:26:43','system','2011-10-11 17:38:02','42011d16-2986-44a1-8295-5dff61e189fd',NULL,10,NULL),(43,'system','2011-10-11 19:26:43','system','2011-10-11 17:38:15','ec469ea3-b839-4814-97a5-d84b94ac33c1',NULL,10,NULL),(44,'system','2011-10-11 19:26:43','system','2011-10-11 17:37:57','d4ebbd89-bf64-4353-9076-3a724816adfb',NULL,10,NULL),(45,'system','2011-10-11 19:26:43','system','2011-10-11 17:37:52','8f19f1ae-c60b-4eeb-a504-e13a02fc08ef',NULL,10,NULL),(46,'system','2011-10-11 19:26:44','system','2011-10-11 17:38:32','23573483-876e-4888-8405-c912ff2b2253',NULL,12,NULL),(47,'system','2011-10-11 19:26:44','system','2011-10-11 17:38:22','c9db24f8-8ed9-43ca-b122-b7b5f27748e4',NULL,12,NULL),(48,'system','2011-10-11 19:26:44','system','2011-10-11 17:38:45','40353754-9e34-41c4-9037-3f9fd4868de3',NULL,12,NULL),(49,'system','2011-10-11 19:26:44','system','2011-10-11 17:38:38','cf89f8f2-2f87-48a9-a3e5-b27e339897c9',NULL,12,NULL),(50,'system','2011-10-11 19:26:44','system','2011-10-11 17:38:28','ca2e7ae9-88a7-48f1-bb14-ce5b5dc9f298',NULL,12,NULL);
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-25 16:12:15
