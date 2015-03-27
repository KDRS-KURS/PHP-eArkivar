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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_object`
--

LOCK TABLES `document_object` WRITE;
/*!40000 ALTER TABLE `document_object` DISABLE KEYS */;
INSERT INTO `document_object` VALUES (1,'a70d782ac564aaa72a6a092c7d14e16f59b8d16213d534e2863d9203107e83aa','SHA256','system','2011-10-11 18:36:12',123622,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,1),(2,'bafd45bcd99dd78857a6f7e28c901608b116af1e5a03f8482952734bdf15d2e2','SHA256','system','2011-10-11 18:36:23',103409,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,2),(3,'df5342dd07d87d3381bbabcae068e42138640cf34f13ba8dfee2527c981f26db','SHA256','system','2011-10-11 18:36:00',93997,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,3),(4,'126ba27c1f7b90125957926261bfc4d2761085ccb8bee85ae57db28c714ac1b9','SHA256','system','2011-10-11 18:36:35',86694,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,4),(5,'102d338d96cb97bec6d2cb2ee7c8605885c4593f9e27ac91b0337babd030e6a8','SHA256','system','2011-10-11 18:35:50',107532,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,5),(6,'b47ec1ac51cdedad9d85a913b79d0fc9f74e8b50fce3532201392c2f465799ed','SHA256','system','2011-10-11 17:49:42',130455,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,6),(7,'9be046f6fe0db6bff198993feaa9d2a8815ca87749e27e1ca5a0f36e9dd6b0ef','SHA256','system','2011-10-11 17:49:51',127639,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,7),(8,'c45429eb5be5ae24fd36e3d0f7304751522407ce3d1e85dd9e91be7d35edffcc','SHA256','system','2011-10-11 17:49:10',98453,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,8),(9,'f47d666738833880bb8f1acb0b03a198ad217e24bd940c1c3ddb65c2e4a7aea2','SHA256','system','2011-10-11 17:49:20',120445,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,9),(10,'4f71eee5ff70bc72245e47a7e17c656d18122cebf174e171c8f8eb31cea2894d','SHA256','system','2011-10-11 17:49:30',113292,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,10),(11,'675b0327a5acc7cb86ea8296e2a2301234cc0f767573c72db3094f44bb5ac002','SHA256','system','2011-10-11 18:35:11',99407,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,11),(12,'50adda92c01c7dc230a85c126a4dca9f3058952d1c4848eec66ab223a117b420','SHA256','system','2011-10-11 18:34:50',91901,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,12),(13,'6d729c8cfcb2f1c779feb593afc884024e908a050a5efd3dbbf9c339b7ac8b4e','SHA256','system','2011-10-11 18:35:00',76994,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,13),(14,'a24713e24433690789345e50bffd3115305e45e101312541116e738b9b0cfad9','SHA256','system','2011-10-11 18:35:30',87839,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,14),(15,'b7fd7e38afc9f00e45e46145815c5922a6619aacc67aaeba3fdcf8079030b4d3','SHA256','system','2011-10-11 18:35:21',90851,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,15),(16,'0144443bbd27386027d091e3e63f13335eb7c2c7cb6b3e9b74b5ae4c95b1c511','SHA256','system','2011-10-11 17:51:26',102557,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,16),(17,'d4b1b6e6a3f83349ab98d2d0fb664c616e04cde0425565a36a70854bb351018c','SHA256','system','2011-10-11 17:51:17',99157,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,17),(18,'a85182e327b38d65e9c7c0984315c3a8ce2c81d778c2d2697f707a2313895161','SHA256','system','2011-10-11 17:51:58',106856,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,18),(19,'86732cc21ddd1271207c9f67b88a6ddbbc613b72bde91945998b16fb5ca2c94e','SHA256','system','2011-10-11 17:51:49',93246,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,19),(20,'f04e6afcf5924012ff6b2f0cbe20b0c5afb60f8f7e86d268822a3ad85845d735','SHA256','system','2011-10-11 17:51:36',114636,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,20),(21,'04aa145e900b89926073dfa01a8a7880ffa52133599743f9d9273d4c2798e101','SHA256','system','2011-10-11 17:52:31',127752,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,21),(22,'1f82aca1276cf67b03227b7f6764b9d3f62aa6580f211ff5ca09aa8316aaa163','SHA256','system','2011-10-11 17:52:42',67665,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,22),(23,'10fd26e3715eab688e0fa3f1394cac1042bbbe72cc8465f9e5d34fe132b2df18','SHA256','system','2011-10-11 17:52:20',114967,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,23),(24,'239fd72954dee8e1d1701ed42fb7c5f420ea54b0904325a8b5e87f529d70b9e9','SHA256','system','2011-10-11 17:52:09',123499,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,24),(25,'2be8b42f4e02851c84fed714280d71964caea11e0d70752efd6554d32332130f','SHA256','system','2011-10-11 17:52:52',134185,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,25),(26,'1bd7b2e767024c5028405d91c8d0d1d394e9319569f5c82d542ec2bc1e80a403','SHA256','system','2011-10-11 17:50:51',81106,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,26),(27,'432acb20026cde2e1ceb9e7e971f4e56471d75b59bf64ff3ff637126c1a3468f','SHA256','system','2011-10-11 17:50:41',108730,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,27),(28,'b6ecc874c38d57c65a53910784e0fca0999605cd2691194837466f5e0e843730','SHA256','system','2011-10-11 17:50:28',106283,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,28),(29,'b074f8c7f75925bd5b4358704f01d566050c79d2b1cd56023df1ff07311d68a2','SHA256','system','2011-10-11 17:50:17',111608,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,29),(30,'e9e42d56f538a3ca86225c252997e1a6964ea0a4228592b205368f61188bae69','SHA256','system','2011-10-11 17:50:05',110922,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,30),(31,'07b3d04bb5560102790465250279995105a9a0fb16d2fb7ad0419ee2ab48bc91','SHA256','system','2011-10-11 17:53:26',75113,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,31),(32,'6a4dc51a60699fff673c5be1f29db6a041f07329487ced3f3a04a8a593867c3e','SHA256','system','2011-10-11 17:53:38',87171,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,32),(33,'e3c846922d6e1e76d9bddbf3fc5c4f17b8b1e0a8d3c531b7e6d5e21e4d1304ef','SHA256','system','2011-10-11 17:53:48',101630,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,33),(34,'fae5a6503a71e113fc7903508b1339ad5c1920a49f3993a3455ca2282a023bd2','SHA256','system','2011-10-11 17:53:14',73912,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,34),(35,'b53caaa84ffb16ab26125ffa7b8e097e423afe23d22f4b860fcd33ca93f84564','SHA256','system','2011-10-11 17:53:04',77274,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,35),(36,'4640f02358029db263bb98623d6a40574a5bbc374033fcd72baab169f39575fb','SHA256','system','2011-10-11 17:54:23',106295,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,36),(37,'803f9244285d24d47adcf6dbdad3cd2df9d83200200d426f5e3906533331329e','SHA256','system','2011-10-11 17:54:11',113745,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,37),(38,'4d790af36e657421894813d41b9963505bcd190404ecf804c4320c329345468e','SHA256','system','2011-10-11 17:54:37',82470,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,38),(39,'d2e0bec2cc9899279ea33532d0cdaf8a24d50a44c166cb8f887bae9760769299','SHA256','system','2011-10-11 17:54:01',105831,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,39),(40,'c6d13f1a15f40848fa72af4edc8099844d88161fb103d2457e703a55e735139d','SHA256','system','2011-10-11 18:31:21',110817,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,40),(41,'9fa582ba3fa9190883b7d77cdc67721824eae14acca8a083fa8544732988d282','SHA256','system','2011-10-11 18:32:46',88641,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,41),(42,'465180eae4ef90a30ab58c4cc6742c955416652516e61a5a4eb4525277a9c369','SHA256','system','2011-10-11 18:32:38',94357,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,42),(43,'8fe30fccba0551d28d54daee779b1a0e2467c7fefc63cbe6e6beba7d92c3a1c7','SHA256','system','2011-10-11 18:32:57',105849,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,43),(44,'c24cb0c9c25d0be4ed3601a2509ab78073d4c8d8eaeb53b2c8daf2b720e08e1d','SHA256','system','2011-10-11 18:32:28',111945,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,44),(45,'657302fb38f63ef707467a0acf3799800b57dfa95146c0cfe3db382bc24d34d0','SHA256','system','2011-10-11 18:32:18',86876,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,45),(46,'d127fb929c294ec0a1343ae36817272cd04dc9f7e42fd336d017b2869ac7e59a','SHA256','system','2011-10-11 18:33:32',75706,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,46),(47,'95b4b96af0d2c7eb09d22e0cdb7fded50fe7470dd10fb986ec6cd3c7ff551f28','SHA256','system','2011-10-11 18:33:08',115629,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,47),(48,'cd231c205fa6ff16523fed624fa440618ddc746a8cfcba17ad1230943c13f7e4','SHA256','system','2011-10-11 18:34:11',97384,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,48),(49,'2158af15018f6cf0333a7da8f1ee50ebd142181cb3e26e83ab7d8c0d8894e372','SHA256','system','2011-10-11 18:34:02',104254,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,49),(50,'1d896f43239ca80192320e408d1b4016c99b09e0ccdc2ef9649340a4cec98c38','SHA256','system','2011-10-11 18:33:21',116669,'pdf',NULL,NULL,NULL,'Produksjonsformat',1,NULL,50);
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

-- Dump completed on 2015-03-25 16:12:16
