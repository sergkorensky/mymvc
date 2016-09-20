-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: cat
-- ------------------------------------------------------
-- Server version	5.1.73-0ubuntu0.10.04.1

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
-- Table structure for table `atr`
--

DROP TABLE IF EXISTS `atr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atr`
--

LOCK TABLES `atr` WRITE;
/*!40000 ALTER TABLE `atr` DISABLE KEYS */;
INSERT INTO `atr` VALUES (3,'ÑˆÐ¸Ñ€Ð¸Ð½Ð°'),(6,'Ð¦Ð²ÐµÑ‚'),(4,'Ð²Ñ‹ÑÐ¾Ñ‚Ð°'),(1,'Ð´Ð»Ð¸Ð½Ð°'),(7,'Ð¾Ð±ÑŠÐµÐ¼'),(5,'Ð’ÐµÑ');
/*!40000 ALTER TABLE `atr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cur`
--

DROP TABLE IF EXISTS `cur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kod` varchar(16) NOT NULL,
  `kurs` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kod` (`kod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cur`
--

LOCK TABLES `cur` WRITE;
/*!40000 ALTER TABLE `cur` DISABLE KEYS */;
INSERT INTO `cur` VALUES (1,'Rub','1.00'),(2,'Usd','64.00'),(3,'Evr','74.00'),(4,'lpound','100.00'),(5,'Gr','3.00');
/*!40000 ALTER TABLE `cur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'milk','32.00','images/1/milk-028.jpg'),(2,'Ð¡Ñ‹Ñ€','385.00','images/2/Cheese_limburger_edit.jpg'),(3,'ÐœÐ°ÑÐ»Ð¾','57.00','images/3/product_challenge_butter_hero2.png'),(4,'ÐœÑ‹Ð»Ð¾','12.00','images/4/soap-dove.jpg'),(5,'Ð¢ÐµÑ‚Ñ€Ð°Ð´ÑŒ','12.80','images/5/hooligan_book-big.png');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_has_atr`
--

DROP TABLE IF EXISTS `item_has_atr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_has_atr` (
  `item_id` int(10) unsigned NOT NULL,
  `atr_id` int(10) unsigned NOT NULL,
  `val` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`,`atr_id`),
  KEY `fk_item_has_atr` (`atr_id`),
  CONSTRAINT `fk_item_has_atr` FOREIGN KEY (`atr_id`) REFERENCES `atr` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `item_has_atr_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_has_atr`
--

LOCK TABLES `item_has_atr` WRITE;
/*!40000 ALTER TABLE `item_has_atr` DISABLE KEYS */;
INSERT INTO `item_has_atr` VALUES (4,3,'3 cm'),(4,5,'0.2 kg'),(4,6,'blue');
/*!40000 ALTER TABLE `item_has_atr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-20 14:22:41
