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
  `document_description_record_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_document_description_id`),
  KEY `fk_name` (`document_description_record_id`),
  CONSTRAINT `document_description_ibfk_1` FOREIGN KEY (`document_description_record_id`) REFERENCES `record` (`pk_record_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_description`
--

LOCK TABLES `document_description` WRITE;
/*!40000 ALTER TABLE `document_description` DISABLE KEYS */;
INSERT INTO `document_description` VALUES (1,'system\'1','Vedlegg','2011-10-11','system','2011-10-11 18:36:12','0208',NULL,1,'Dokumentet er ferdigstilt','application/pdf','9f088e1a-d090-4215-be0a-836ce4c497a0','0208',NULL),(2,'system\'2','Vedlegg','2011-10-11','system','2011-10-11 18:36:23','0209',NULL,1,'Dokumentet er ferdigstilt','application/pdf','e565e297-8249-4471-95e9-b30d47196378','0209',NULL),(3,'system\'3','Vedlegg','2011-10-11','system','2011-10-11 18:36:00','0207',NULL,1,'Dokumentet er ferdigstilt','application/pdf','20a3b62e-1431-46e4-83fc-258cffa94020','0207',NULL),(4,'system\'4','Vedlegg','2011-10-11','system','2011-10-11 18:36:35','0210',NULL,1,'Dokumentet er ferdigstilt','application/pdf','2746b618-b3c1-4668-8921-bd493f4637fa','0210',NULL),(5,'system\'5','Vedlegg','2011-10-11','system','2011-10-11 18:35:50','0206',NULL,1,'Dokumentet er ferdigstilt','application/pdf','c35b9e64-b83a-4254-b932-8e55ce0a7505','0206',NULL),(6,'system\'6','Vedlegg','2011-10-11','system','2011-10-11 17:49:42','0164',NULL,1,'Dokumentet er ferdigstilt','application/pdf','e5ab7751-dd0b-4d95-a402-30a7acd5ce88','0164',NULL),(7,'system\'7','Vedlegg','2011-10-11','system','2011-10-11 17:49:51','0165',NULL,1,'Dokumentet er ferdigstilt','application/pdf','c3d07270-98a9-4bee-a6d1-ee1bb1e544bc','0165',NULL),(8,'system\'8','Vedlegg','2011-10-11','system','2011-10-11 17:49:10','0161',NULL,1,'Dokumentet er ferdigstilt','application/pdf','4907c78b-fc25-40a8-a957-efca1f3359fb','0161',NULL),(9,'system\'9','Vedlegg','2011-10-11','system','2011-10-11 17:49:20','0162',NULL,1,'Dokumentet er ferdigstilt','application/pdf','9d4b858d-4a28-46a7-a363-0fa58efd611d','0162',NULL),(10,'system\'10','Vedlegg','2011-10-11','system','2011-10-11 17:49:30','0163',NULL,1,'Dokumentet er ferdigstilt','application/pdf','48cccbeb-d700-46d5-977a-647f832caf98','0163',NULL),(11,'system\'11','Vedlegg','2011-10-11','system','2011-10-11 18:35:11','0203',NULL,1,'Dokumentet er ferdigstilt','application/pdf','0282d31d-6a0f-4fb5-b027-b89d2f34b121','0203',NULL),(12,'system\'12','Vedlegg','2011-10-11','system','2011-10-11 18:34:50','0201',NULL,1,'Dokumentet er ferdigstilt','application/pdf','2304a4f0-b765-4be7-a620-a795866bd084','0201',NULL),(13,'system\'13','Vedlegg','2011-10-11','system','2011-10-11 18:35:00','0202',NULL,1,'Dokumentet er ferdigstilt','application/pdf','f97c8684-7da1-4d5f-96ac-0fdbcf233fd1','0202',NULL),(14,'system\'14','Vedlegg','2011-10-11','system','2011-10-11 18:35:30','0205',NULL,1,'Dokumentet er ferdigstilt','application/pdf','f4bc0d89-48b6-4c52-a149-10074f24e01c','0205',NULL),(15,'system\'15','Vedlegg','2011-10-11','system','2011-10-11 18:35:21','0204',NULL,1,'Dokumentet er ferdigstilt','application/pdf','87c4c78c-8370-4649-9e16-3b0bb5866563','0204',NULL),(16,'system\'16','Vedlegg','2011-10-11','system','2011-10-11 17:51:26','0172',NULL,1,'Dokumentet er ferdigstilt','application/pdf','c0411f76-7d44-4fdc-bba9-0d6aa61f7557','0172',NULL),(17,'system\'17','Vedlegg','2011-10-11','system','2011-10-11 17:51:17','0171',NULL,1,'Dokumentet er ferdigstilt','application/pdf','f37eff2f-96a1-478a-a2a8-1abb5038c40a','0171',NULL),(18,'system\'18','Vedlegg','2011-10-11','system','2011-10-11 17:51:58','0175',NULL,1,'Dokumentet er ferdigstilt','application/pdf','503dfa9c-da1e-4146-ab26-b79f4bebf113','0175',NULL),(19,'system\'19','Vedlegg','2011-10-11','system','2011-10-11 17:51:49','0174',NULL,1,'Dokumentet er ferdigstilt','application/pdf','c4b9586d-672b-4781-b4b2-988717f19e57','0174',NULL),(20,'system\'20','Vedlegg','2011-10-11','system','2011-10-11 17:51:36','0173',NULL,1,'Dokumentet er ferdigstilt','application/pdf','e1235f8b-3276-4964-aa08-12a6f97990d5','0173',NULL),(21,'system\'21','Vedlegg','2011-10-11','system','2011-10-11 17:52:31','0178',NULL,1,'Dokumentet er ferdigstilt','application/pdf','b4bc49be-af51-412f-811f-8c19213806df','0178',NULL),(22,'system\'22','Vedlegg','2011-10-11','system','2011-10-11 17:52:42','0179',NULL,1,'Dokumentet er ferdigstilt','application/pdf','1da6e5db-2c2d-4756-ac87-0757b0a3a07c','0179',NULL),(23,'system\'23','Vedlegg','2011-10-11','system','2011-10-11 17:52:20','0177',NULL,1,'Dokumentet er ferdigstilt','application/pdf','585e65be-f5df-4dfc-9c05-41707322348b','0177',NULL),(24,'system\'24','Vedlegg','2011-10-11','system','2011-10-11 17:52:09','0176',NULL,1,'Dokumentet er ferdigstilt','application/pdf','8f5e3d9e-6c3e-4768-8603-613aeee01a26','0176',NULL),(25,'system\'25','Vedlegg','2011-10-11','system','2011-10-11 17:52:52','0180',NULL,1,'Dokumentet er ferdigstilt','application/pdf','0cd8683f-b58e-49e4-8c10-8c4ec7c36903','0180',NULL),(26,'system\'26','Vedlegg','2011-10-11','system','2011-10-11 17:50:51','0170',NULL,1,'Dokumentet er ferdigstilt','application/pdf','f068c9c6-6d1e-4229-874e-634280993340','0170',NULL),(27,'system\'27','Vedlegg','2011-10-11','system','2011-10-11 17:50:41','0169',NULL,1,'Dokumentet er ferdigstilt','application/pdf','2fa53b7f-8f66-4372-b501-7b52cc881d5b','0169',NULL),(28,'system\'28','Vedlegg','2011-10-11','system','2011-10-11 17:50:28','0168',NULL,1,'Dokumentet er ferdigstilt','application/pdf','105f898b-9af1-4957-978c-92bc8f848243','0168',NULL),(29,'system\'29','Vedlegg','2011-10-11','system','2011-10-11 17:50:17','0167',NULL,1,'Dokumentet er ferdigstilt','application/pdf','f17170ff-807d-402b-95c7-d9a02709565a','0167',NULL),(30,'system\'30','Vedlegg','2011-10-11','system','2011-10-11 17:50:05','0166',NULL,1,'Dokumentet er ferdigstilt','application/pdf','2927a4b5-9b61-4043-8ddd-fe6dc2da6d61','0166',NULL),(31,'system\'31','Vedlegg','2011-10-11','system','2011-10-11 17:53:26','0183',NULL,1,'Dokumentet er ferdigstilt','application/pdf','a14c1a69-b2b3-4f63-9d10-8921a9ca06e7','0183',NULL),(32,'system\'32','Vedlegg','2011-10-11','system','2011-10-11 17:53:38','0184',NULL,1,'Dokumentet er ferdigstilt','application/pdf','cbe0f755-410c-41d1-9cf1-ede0b14c2228','0184',NULL),(33,'system\'33','Vedlegg','2011-10-11','system','2011-10-11 17:53:48','0185',NULL,1,'Dokumentet er ferdigstilt','application/pdf','f4b9a6da-9f29-4bda-bbdb-cf5100ad77e5','0185',NULL),(34,'system\'34','Vedlegg','2011-10-11','system','2011-10-11 17:53:14','0182',NULL,1,'Dokumentet er ferdigstilt','application/pdf','4e1b554c-dcc7-4b89-820f-7a8e0c44a672','0182',NULL),(35,'system\'35','Vedlegg','2011-10-11','system','2011-10-11 17:53:04','0181',NULL,1,'Dokumentet er ferdigstilt','application/pdf','de01097f-03d1-4032-b787-8062264ecf17','0181',NULL),(36,'system\'36','Vedlegg','2011-10-11','system','2011-10-11 17:54:23','0188',NULL,1,'Dokumentet er ferdigstilt','application/pdf','a59a99aa-73a0-4bc2-bd92-ab21f41dcd47','0188',NULL),(37,'system\'37','Vedlegg','2011-10-11','system','2011-10-11 17:54:11','0187',NULL,1,'Dokumentet er ferdigstilt','application/pdf','a3330604-5fdb-4b38-a4ba-eae66040fceb','0187',NULL),(38,'system\'38','Vedlegg','2011-10-11','system','2011-10-11 17:54:37','0189',NULL,1,'Dokumentet er ferdigstilt','application/pdf','13a7de08-8a35-4c31-861e-c61543d80786','0189',NULL),(39,'system\'39','Vedlegg','2011-10-11','system','2011-10-11 17:54:01','0186',NULL,1,'Dokumentet er ferdigstilt','application/pdf','88763a5b-319a-413c-91b7-73169f956aa0','0186',NULL),(40,'system\'40','Vedlegg','2011-10-11','system','2011-10-11 18:31:21','0190',NULL,1,'Dokumentet er ferdigstilt','application/pdf','6d6f3fc4-0d34-4162-a6dc-daa9dc47c2b6','0190',NULL),(41,'system\'41','Vedlegg','2011-10-11','system','2011-10-11 18:32:46','0194',NULL,1,'Dokumentet er ferdigstilt','application/pdf','1a36c873-07e8-43bd-9d1c-6a3b13a3c2be','0194',NULL),(42,'system\'42','Vedlegg','2011-10-11','system','2011-10-11 18:32:38','0193',NULL,1,'Dokumentet er ferdigstilt','application/pdf','9a0ca5b3-cccc-498d-906e-a74666c5c473','0193',NULL),(43,'system\'43','Vedlegg','2011-10-11','system','2011-10-11 18:32:57','0195',NULL,1,'Dokumentet er ferdigstilt','application/pdf','8e49f45b-ee96-44d8-897e-bff9e4283c76','0195',NULL),(44,'system\'44','Vedlegg','2011-10-11','system','2011-10-11 18:32:28','0192',NULL,1,'Dokumentet er ferdigstilt','application/pdf','729f797c-1b06-4149-847f-057e84c62668','0192',NULL),(45,'system\'45','Vedlegg','2011-10-11','system','2011-10-11 18:32:18','0191',NULL,1,'Dokumentet er ferdigstilt','application/pdf','c6e5bace-337a-4b03-9d97-0b79d838ad2f','0191',NULL),(46,'system\'46','Vedlegg','2011-10-11','system','2011-10-11 18:33:32','0198',NULL,1,'Dokumentet er ferdigstilt','application/pdf','e958264b-b1cf-4090-90b8-60adeade0002','0198',NULL),(47,'system\'47','Vedlegg','2011-10-11','system','2011-10-11 18:33:08','0196',NULL,1,'Dokumentet er ferdigstilt','application/pdf','a9a5b21a-f8e1-4158-945e-b52b678c99a3','0196',NULL),(48,'system\'48','Vedlegg','2011-10-11','system','2011-10-11 18:34:11','0200',NULL,1,'Dokumentet er ferdigstilt','application/pdf','79a2d4fd-6638-4e74-bf4b-e48d3d97d121','0200',NULL),(49,'system\'49','Vedlegg','2011-10-11','system','2011-10-11 18:34:02','0199',NULL,1,'Dokumentet er ferdigstilt','application/pdf','f89e5030-13c5-497d-af14-2b2b5f71774e','0199',NULL),(50,'system\'50','Vedlegg','2011-10-11','system','2011-10-11 18:33:21','0197',NULL,1,'Dokumentet er ferdigstilt','application/pdf','42bc6f68-269b-48b1-86ac-45b6e98fdb35','0197',NULL);
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

-- Dump completed on 2015-03-25 16:12:12
