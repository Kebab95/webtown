-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: webtown
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Current Database: `webtown`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `webtown` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `webtown`;

--
-- Table structure for table `rendelesek`
--

DROP TABLE IF EXISTS `rendelesek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rendelesek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `termekID` int(11) NOT NULL,
  `darab` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rendelesek`
--

LOCK TABLES `rendelesek` WRITE;
/*!40000 ALTER TABLE `rendelesek` DISABLE KEYS */;
INSERT INTO `rendelesek` VALUES (1,'asd',1,10,20000,'2017-05-10 20:49:34'),(2,'asd',2,4,12000,'2017-05-10 20:49:34'),(3,'asd',3,1,2800,'2017-05-10 20:49:34'),(4,'asd',4,30,18000,'2017-05-10 20:49:34'),(5,'qweqwe',1,10,20000,'2017-05-10 20:53:06'),(6,'qweqwe',2,4,12000,'2017-05-10 20:53:06'),(7,'qweqwe',3,1,2800,'2017-05-10 20:53:06'),(8,'qweqwe',4,30,18000,'2017-05-10 20:53:06'),(9,'valami',1,1,2000,'2017-05-10 20:54:51'),(10,'valami',2,1,3000,'2017-05-10 20:54:51'),(11,'valami',3,1,2800,'2017-05-10 20:54:51'),(12,'valami',4,1,1000,'2017-05-10 20:54:51'),(13,'ergtergdf',1,1,2000,'2017-05-10 20:55:46'),(14,'ergtergdf',2,1,3000,'2017-05-10 20:55:46'),(15,'ergtergdf',3,1,2800,'2017-05-10 20:55:46'),(16,'ergtergdf',4,1,1000,'2017-05-10 20:55:46'),(17,'rebrebrb',1,1,2000,'2017-05-10 20:56:24'),(18,'rebrebrb',2,1,3000,'2017-05-10 20:56:24'),(19,'rebrebrb',3,1,2800,'2017-05-10 20:56:24'),(20,'rebrebrb',4,1,1000,'2017-05-10 20:56:24');
/*!40000 ALTER TABLE `rendelesek` ENABLE KEYS */;
UNLOCK TABLES;

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

LOCK TABLES `termekek` WRITE;
/*!40000 ALTER TABLE `termekek` DISABLE KEYS */;

/*!40000 ALTER TABLE `termekek` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-11  0:22:44
