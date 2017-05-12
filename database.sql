-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: webtown
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `webtown`;

USE `webtown`;



--
-- Table structure for table `termekek`
--

DROP TABLE IF EXISTS `termekek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `termekek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `price` int(11) NOT NULL,
  `megapack` tinyint(1) DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_change_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `termekek`
--

INSERT INTO `termekek` VALUES (1,'Téliszalámi',2000,0,'2017-05-08 14:04:43','2017-05-08 14:04:43',0),(2,'Gumikacsa',3000,0,'2017-05-08 14:04:43','2017-05-08 14:04:43',0),(3,'Uborka',2800,1,'2017-05-08 14:04:43','2017-05-08 14:04:43',0),(4,'Gesztenye',1000,1,'2017-05-08 14:04:43','2017-05-08 14:04:43',0);



--
-- Table structure for table `rendelesek`
--

DROP TABLE IF EXISTS `rendelesek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rendelesek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `kiszalitasi_cim` char(255) NOT NULL,
  `termekID` int(11) NOT NULL,
  `darab` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `rendelesek_termekek_id_fk` (`termekID`),
  CONSTRAINT `rendelesek_termekek_id_fk` FOREIGN KEY (`termekID`) REFERENCES `termekek` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


-- Dump completed on 2017-05-12 15:11:06
