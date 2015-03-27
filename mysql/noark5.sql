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
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `pk_author_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `basic_record`
--

DROP TABLE IF EXISTS `basic_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basic_record` (
  `description` varchar(255) DEFAULT NULL,
  `document_medium` varchar(255) DEFAULT NULL,
  `official_title` varchar(255) DEFAULT NULL,
  `record_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `pk_record_id` bigint(20) NOT NULL,
  `basic_record_storage_location_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_record_id`),
  KEY `FK_g96oqw59su7166i6g08cnmwji` (`basic_record_storage_location_id`),
  CONSTRAINT `FK_9nt606ggdatigd6bg90jolb47` FOREIGN KEY (`pk_record_id`) REFERENCES `record` (`pk_record_id`),
  CONSTRAINT `FK_g96oqw59su7166i6g08cnmwji` FOREIGN KEY (`basic_record_storage_location_id`) REFERENCES `storage_location` (`pk_storage_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `basic_record_author`
--

DROP TABLE IF EXISTS `basic_record_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basic_record_author` (
  `f_pk_record_id` bigint(20) NOT NULL,
  `f_pk_author_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_record_id`,`f_pk_author_id`),
  KEY `FK_835hb1s246lu5wc5xm9qbyd1a` (`f_pk_author_id`),
  CONSTRAINT `FK_835hb1s246lu5wc5xm9qbyd1a` FOREIGN KEY (`f_pk_author_id`) REFERENCES `author` (`pk_author_id`),
  CONSTRAINT `FK_bdw33670xtc6wm739fk265hrl` FOREIGN KEY (`f_pk_record_id`) REFERENCES `basic_record` (`pk_record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `case_file`
--

DROP TABLE IF EXISTS `case_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `case_file` (
  `administrative_unit` varchar(255) DEFAULT NULL,
  `case_date` date DEFAULT NULL,
  `case_responsible` varchar(255) DEFAULT NULL,
  `case_sequence_number` int(11) DEFAULT NULL,
  `case_status` varchar(255) DEFAULT NULL,
  `case_year` int(11) DEFAULT NULL,
  `loaned_date` date DEFAULT NULL,
  `loaned_to` varchar(255) DEFAULT NULL,
  `records_management_unit` varchar(255) DEFAULT NULL,
  `pk_file_id` bigint(20) NOT NULL,
  PRIMARY KEY (`pk_file_id`),
  CONSTRAINT `FK_g47wtxorxl7j6m1mrogttdfrm` FOREIGN KEY (`pk_file_id`) REFERENCES `file` (`pk_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `pk_class_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `class_id` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `finalised_by` varchar(255) DEFAULT NULL,
  `finalised_date` datetime DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `class_classification_system_id` bigint(20) DEFAULT NULL,
  `referenceParentClass_pk_class_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_class_id`),
  KEY `FK_ioj5qccl0jo845h0uhrm5qcd` (`class_classification_system_id`),
  KEY `FK_egwgq8bcju5flcydew3418wpt` (`referenceParentClass_pk_class_id`),
  CONSTRAINT `FK_egwgq8bcju5flcydew3418wpt` FOREIGN KEY (`referenceParentClass_pk_class_id`) REFERENCES `class` (`pk_class_id`),
  CONSTRAINT `FK_ioj5qccl0jo845h0uhrm5qcd` FOREIGN KEY (`class_classification_system_id`) REFERENCES `classification_system` (`pk_classification_system_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `class_keyword`
--

DROP TABLE IF EXISTS `class_keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_keyword` (
  `f_pk_class_id` bigint(20) NOT NULL,
  `f_pk_keyword_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_class_id`,`f_pk_keyword_id`),
  KEY `FK_44ctxyw8vb14tj21c0gli7owb` (`f_pk_keyword_id`),
  CONSTRAINT `FK_44ctxyw8vb14tj21c0gli7owb` FOREIGN KEY (`f_pk_keyword_id`) REFERENCES `keyword` (`pk_keyword_id`),
  CONSTRAINT `FK_fs5h14d1bnjtdnu05hu13dyhb` FOREIGN KEY (`f_pk_class_id`) REFERENCES `class` (`pk_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `file_keyword`
--

DROP TABLE IF EXISTS `file_keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_keyword` (
  `f_pk_file_id` bigint(20) NOT NULL,
  `f_pk_keyword_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_file_id`,`f_pk_keyword_id`),
  KEY `FK_hepfbx70j9a7xujqoghy9pky0` (`f_pk_keyword_id`),
  CONSTRAINT `FK_djsmi2iqhsk1ttm36805u3jd4` FOREIGN KEY (`f_pk_file_id`) REFERENCES `file` (`pk_file_id`),
  CONSTRAINT `FK_hepfbx70j9a7xujqoghy9pky0` FOREIGN KEY (`f_pk_keyword_id`) REFERENCES `keyword` (`pk_keyword_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fonds_creator`
--

DROP TABLE IF EXISTS `fonds_creator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonds_creator` (
  `pk_fonds_creator_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `fonds_creator_id` varchar(255) DEFAULT NULL,
  `fonds_creator_name` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_fonds_creator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fonds_fonds_creator`
--

DROP TABLE IF EXISTS `fonds_fonds_creator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonds_fonds_creator` (
  `f_pk_fonds_id` bigint(20) NOT NULL,
  `f_pk_fonds_creator_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_fonds_id`,`f_pk_fonds_creator_id`),
  KEY `FK_ndv4f8bwhnedu2lmjx8sd2r6a` (`f_pk_fonds_creator_id`),
  CONSTRAINT `FK_dtllhm65kwg374alxrclrmowt` FOREIGN KEY (`f_pk_fonds_id`) REFERENCES `fonds` (`pk_fonds_id`),
  CONSTRAINT `FK_ndv4f8bwhnedu2lmjx8sd2r6a` FOREIGN KEY (`f_pk_fonds_creator_id`) REFERENCES `fonds_creator` (`pk_fonds_creator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fonds_storage_location`
--

DROP TABLE IF EXISTS `fonds_storage_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonds_storage_location` (
  `f_pk_fonds_id` bigint(20) NOT NULL,
  `f_pk_storage_location_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_fonds_id`,`f_pk_storage_location_id`),
  KEY `FK_b8lamxy5eknhgom6xac41o2jj` (`f_pk_storage_location_id`),
  CONSTRAINT `FK_3aiibmj3n5v1n05fu28vvn9i8` FOREIGN KEY (`f_pk_fonds_id`) REFERENCES `fonds` (`pk_fonds_id`),
  CONSTRAINT `FK_b8lamxy5eknhgom6xac41o2jj` FOREIGN KEY (`f_pk_storage_location_id`) REFERENCES `storage_location` (`pk_storage_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `keyword`
--

DROP TABLE IF EXISTS `keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keyword` (
  `pk_keyword_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_keyword_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `record_document_description`
--

DROP TABLE IF EXISTS `record_document_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record_document_description` (
  `f_pk_record_id` bigint(20) NOT NULL,
  `f_pk_document_description_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_record_id`,`f_pk_document_description_id`),
  KEY `FK_r0hy921ma48snafsxnetwb9e9` (`f_pk_document_description_id`),
  CONSTRAINT `FK_6v3m892ounp8wmy05c5k1fdc6` FOREIGN KEY (`f_pk_record_id`) REFERENCES `record` (`pk_record_id`),
  CONSTRAINT `FK_r0hy921ma48snafsxnetwb9e9` FOREIGN KEY (`f_pk_document_description_id`) REFERENCES `document_description` (`pk_document_description_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `series` (
  `pk_series_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `document_medium` varchar(255) DEFAULT NULL,
  `finalised_by` varchar(255) DEFAULT NULL,
  `finalised_date` datetime DEFAULT NULL,
  `series_end_date` date DEFAULT NULL,
  `series_start_date` date DEFAULT NULL,
  `series_status` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `series_classification_system_id` bigint(20) DEFAULT NULL,
  `series_fonds_id` bigint(20) DEFAULT NULL,
  `referencePrecursor_pk_series_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pk_series_id`),
  KEY `FK_qhmw1aeoq6mq0wobtm5d3aecv` (`series_classification_system_id`),
  KEY `FK_v5nro1qnoc347s71g7nb377d` (`series_fonds_id`),
  KEY `FK_aumb1f1ai9kogu04uk9rtb1tc` (`referencePrecursor_pk_series_id`),
  CONSTRAINT `FK_aumb1f1ai9kogu04uk9rtb1tc` FOREIGN KEY (`referencePrecursor_pk_series_id`) REFERENCES `series` (`pk_series_id`),
  CONSTRAINT `FK_qhmw1aeoq6mq0wobtm5d3aecv` FOREIGN KEY (`series_classification_system_id`) REFERENCES `classification_system` (`pk_classification_system_id`),
  CONSTRAINT `FK_v5nro1qnoc347s71g7nb377d` FOREIGN KEY (`series_fonds_id`) REFERENCES `fonds` (`pk_fonds_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `series_storage_location`
--

DROP TABLE IF EXISTS `series_storage_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `series_storage_location` (
  `f_pk_series_id` bigint(20) NOT NULL,
  `f_pk_storage_location_id` bigint(20) NOT NULL,
  PRIMARY KEY (`f_pk_series_id`,`f_pk_storage_location_id`),
  KEY `FK_1cxgpinao62w6hmu6xelftib4` (`f_pk_storage_location_id`),
  CONSTRAINT `FK_1cxgpinao62w6hmu6xelftib4` FOREIGN KEY (`f_pk_storage_location_id`) REFERENCES `storage_location` (`pk_storage_location_id`),
  CONSTRAINT `FK_e6y1df2n7dk4fy21yp72jk483` FOREIGN KEY (`f_pk_series_id`) REFERENCES `series` (`pk_series_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `storage_location`
--

DROP TABLE IF EXISTS `storage_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage_location` (
  `pk_storage_location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `storage_location` varchar(255) DEFAULT NULL,
  `system_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_storage_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-25 16:12:40
