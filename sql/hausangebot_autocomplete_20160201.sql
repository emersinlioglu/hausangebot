-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: hausangebot
-- ------------------------------------------------------
-- Server version	5.1.50-community

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
-- Table structure for table `abschlag`
--

DROP TABLE IF EXISTS `abschlag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abschlag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datenblatt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `kaufvertrag_prozent` float DEFAULT NULL,
  `kaufvertrag_betrag` varchar(255) DEFAULT NULL,
  `kaufvertrag_angefordert` date DEFAULT NULL,
  `sonderwunsch_prozent` float DEFAULT NULL,
  `sonderwunsch_betrag` varchar(255) DEFAULT NULL,
  `sonderwunsch_angefordert` date DEFAULT NULL,
  `summe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_abschlag_datenblatt1_idx` (`datenblatt_id`),
  CONSTRAINT `fk_abschlag_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abschlag`
--

LOCK TABLES `abschlag` WRITE;
/*!40000 ALTER TABLE `abschlag` DISABLE KEYS */;
/*!40000 ALTER TABLE `abschlag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datenblatt`
--

DROP TABLE IF EXISTS `datenblatt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datenblatt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firma_id` int(10) unsigned DEFAULT NULL,
  `projekt_id` int(10) unsigned DEFAULT NULL,
  `haus_id` int(10) unsigned DEFAULT NULL,
  `nummer` int(11) DEFAULT NULL,
  `kaeufer_id` int(10) unsigned DEFAULT NULL,
  `besondere_regelungen_kaufvertrag` text,
  `sonstige_anmerkungen` text,
  `aktiv` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_datenblatt_haus_idx` (`haus_id`),
  KEY `fk_datenblatt_firma1_idx` (`firma_id`),
  KEY `fk_datenblatt_projekt1_idx` (`projekt_id`),
  KEY `fk_datenblatt_kaeufer1_idx` (`kaeufer_id`),
  CONSTRAINT `fk_datenblatt_firma1` FOREIGN KEY (`firma_id`) REFERENCES `firma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_datenblatt_haus` FOREIGN KEY (`haus_id`) REFERENCES `haus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_datenblatt_kaeufer1` FOREIGN KEY (`kaeufer_id`) REFERENCES `kaeufer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_datenblatt_projekt1` FOREIGN KEY (`projekt_id`) REFERENCES `projekt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datenblatt`
--

LOCK TABLES `datenblatt` WRITE;
/*!40000 ALTER TABLE `datenblatt` DISABLE KEYS */;
INSERT INTO `datenblatt` VALUES (1,NULL,NULL,NULL,NULL,8,'','',1);
/*!40000 ALTER TABLE `datenblatt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `einheitstyp`
--

DROP TABLE IF EXISTS `einheitstyp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `einheitstyp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `einheitstyp`
--

LOCK TABLES `einheitstyp` WRITE;
/*!40000 ALTER TABLE `einheitstyp` DISABLE KEYS */;
INSERT INTO `einheitstyp` VALUES (1,'Wohnung'),(2,'Stellplatz'),(3,'Lagerraum'),(4,'Garage');
/*!40000 ALTER TABLE `einheitstyp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firma`
--

DROP TABLE IF EXISTS `firma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firma` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firma`
--

LOCK TABLES `firma` WRITE;
/*!40000 ALTER TABLE `firma` DISABLE KEYS */;
INSERT INTO `firma` VALUES (1,'ABG Immobilien GmbH & Co. KG','3780'),(2,'Firma 2','2222'),(3,'Firma 5','5555');
/*!40000 ALTER TABLE `firma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `haus`
--

DROP TABLE IF EXISTS `haus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `haus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projekt_id` int(10) unsigned NOT NULL,
  `firma_id` int(10) unsigned DEFAULT NULL,
  `plz` varchar(255) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL,
  `strasse` varchar(255) DEFAULT NULL,
  `hausnr` varchar(45) DEFAULT NULL,
  `reserviert` tinyint(1) DEFAULT '0',
  `verkauft` tinyint(1) DEFAULT '0',
  `rechnung_vertrieb` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_haus_projekt1_idx` (`projekt_id`),
  KEY `fk_haus_firma1_idx` (`firma_id`),
  CONSTRAINT `fk_haus_firma1` FOREIGN KEY (`firma_id`) REFERENCES `firma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_haus_projekt1` FOREIGN KEY (`projekt_id`) REFERENCES `projekt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `haus`
--

LOCK TABLES `haus` WRITE;
/*!40000 ALTER TABLE `haus` DISABLE KEYS */;
/*!40000 ALTER TABLE `haus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kaeufer`
--

DROP TABLE IF EXISTS `kaeufer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kaeufer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `debitor_nr` varchar(255) DEFAULT NULL,
  `beurkundung_am` date DEFAULT NULL,
  `verbindliche_fertigstellung` date DEFAULT NULL,
  `uebergang_bnl` date DEFAULT NULL,
  `abnahme_se` date DEFAULT NULL,
  `abnahme_ge` date DEFAULT NULL,
  `auflassung` tinyint(1) DEFAULT '0',
  `anrede` tinyint(1) DEFAULT '0',
  `titel` varchar(255) DEFAULT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `nachname` varchar(255) DEFAULT NULL,
  `strasse` varchar(255) DEFAULT NULL,
  `hausnr` varchar(255) DEFAULT NULL,
  `plz` varchar(255) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL,
  `festnetz` varchar(255) DEFAULT NULL,
  `handy` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `anrede2` tinyint(1) DEFAULT NULL,
  `titel2` varchar(255) DEFAULT NULL,
  `vorname2` varchar(255) DEFAULT NULL,
  `nachname2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kaeufer`
--

LOCK TABLES `kaeufer` WRITE;
/*!40000 ALTER TABLE `kaeufer` DISABLE KEYS */;
INSERT INTO `kaeufer` VALUES (5,'123456','2016-01-01','2018-01-01','2016-01-07','2016-01-06','2016-01-08',1,0,'Dr.','Halit','Ciftci','Musterstrasse','7','80333','München','','','',1,'','',''),(6,'666','2020-02-06',NULL,NULL,NULL,NULL,0,0,'nnnn','','','','','','','','','',0,'','',''),(7,'777',NULL,NULL,NULL,NULL,NULL,0,0,'ananana','','','','','','','','','',0,'','',''),(8,'22233',NULL,NULL,NULL,NULL,NULL,0,1,'a','Test 233','mmm233','pupinweg233','233','233','darmstadt',NULL,NULL,'emr233@gmail.co',0,'','','');
/*!40000 ALTER TABLE `kaeufer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kunde`
--

DROP TABLE IF EXISTS `kunde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kunde` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `debitor_nr` varchar(255) DEFAULT NULL,
  `anrede` tinyint(1) DEFAULT '0',
  `titel` varchar(255) DEFAULT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `nachname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `strasse` varchar(255) DEFAULT NULL,
  `hausnr` varchar(255) DEFAULT NULL,
  `plz` varchar(255) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL,
  `festnetz` varchar(255) DEFAULT NULL,
  `handy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunde`
--

LOCK TABLES `kunde` WRITE;
/*!40000 ALTER TABLE `kunde` DISABLE KEYS */;
INSERT INTO `kunde` VALUES (1,'12300',1,'a','Test 1','mmm','emr@gmail.co','pupinweg','6','616161','darmstadt','123456789','987987987'),(2,'12311',1,'b','Test 2','aaa',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'12344',1,'c','Test 3','sss',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'12399',1,'a','Test 99','mmm 99','emr99@gmail.co','pupinweg99','699','61616199','darmstadt',NULL,NULL),(6,'22233',1,'a','Test 233','mmm233','emr233@gmail.co','pupinweg233','233','233','darmstadt',NULL,NULL);
/*!40000 ALTER TABLE `kunde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nachlass`
--

DROP TABLE IF EXISTS `nachlass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nachlass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datenblatt_id` int(11) NOT NULL,
  `schreiben_vom` date DEFAULT NULL,
  `betrag` double DEFAULT NULL,
  `bemerkung` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nachlass_datenblatt1_idx` (`datenblatt_id`),
  CONSTRAINT `fk_nachlass_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nachlass`
--

LOCK TABLES `nachlass` WRITE;
/*!40000 ALTER TABLE `nachlass` DISABLE KEYS */;
/*!40000 ALTER TABLE `nachlass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projekt`
--

DROP TABLE IF EXISTS `projekt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projekt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `firma_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projekt_firma1_idx` (`firma_id`),
  CONSTRAINT `fk_projekt_firma1` FOREIGN KEY (`firma_id`) REFERENCES `firma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projekt`
--

LOCK TABLES `projekt` WRITE;
/*!40000 ALTER TABLE `projekt` DISABLE KEYS */;
INSERT INTO `projekt` VALUES (1,'Projekt 1',1),(2,'Projekt 2',2),(3,'Projekt 3',1),(4,'Funkkaserne',1);
/*!40000 ALTER TABLE `projekt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sonderwunsch`
--

DROP TABLE IF EXISTS `sonderwunsch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sonderwunsch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datenblatt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `angebot_datum` date DEFAULT NULL,
  `angebot_betrag` double DEFAULT NULL,
  `beauftragt_datum` date DEFAULT NULL,
  `beauftragt_betrag` double DEFAULT NULL,
  `rechnungsstellung_datum` date DEFAULT NULL,
  `rechnungsstellung_betrag` double DEFAULT NULL,
  `rechnungsstellung_rg_nr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sonderwunch_datenblatt1_idx` (`datenblatt_id`),
  CONSTRAINT `fk_sonderwunch_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sonderwunsch`
--

LOCK TABLES `sonderwunsch` WRITE;
/*!40000 ALTER TABLE `sonderwunsch` DISABLE KEYS */;
/*!40000 ALTER TABLE `sonderwunsch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teileigentumseinheit`
--

DROP TABLE IF EXISTS `teileigentumseinheit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teileigentumseinheit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `haus_id` int(10) unsigned NOT NULL,
  `einheitstyp_id` int(10) unsigned NOT NULL,
  `te_nummer` varchar(255) DEFAULT NULL,
  `gefoerdert` tinyint(1) NOT NULL DEFAULT '0',
  `geschoss` varchar(45) DEFAULT NULL,
  `zimmer` varchar(45) DEFAULT NULL,
  `me_anteil` varchar(45) DEFAULT NULL,
  `wohnflaeche` varchar(45) DEFAULT NULL,
  `kaufpreis` float DEFAULT NULL,
  `kp_einheit` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teileigentumseinheit_haus1_idx` (`haus_id`),
  KEY `fk_teileigentumseinheit_einheitstyp1_idx` (`einheitstyp_id`),
  CONSTRAINT `fk_teileigentumseinheit_einheitstyp1` FOREIGN KEY (`einheitstyp_id`) REFERENCES `einheitstyp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_teileigentumseinheit_haus1` FOREIGN KEY (`haus_id`) REFERENCES `haus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teileigentumseinheit`
--

LOCK TABLES `teileigentumseinheit` WRITE;
/*!40000 ALTER TABLE `teileigentumseinheit` DISABLE KEYS */;
/*!40000 ALTER TABLE `teileigentumseinheit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zaehlerstand`
--

DROP TABLE IF EXISTS `zaehlerstand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zaehlerstand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `stand` varchar(45) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `haus_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_zaehlerstand_haus1_idx` (`haus_id`),
  CONSTRAINT `fk_zaehlerstand_haus1` FOREIGN KEY (`haus_id`) REFERENCES `haus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zaehlerstand`
--

LOCK TABLES `zaehlerstand` WRITE;
/*!40000 ALTER TABLE `zaehlerstand` DISABLE KEYS */;
/*!40000 ALTER TABLE `zaehlerstand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zahlung`
--

DROP TABLE IF EXISTS `zahlung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zahlung` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datenblatt_id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `betrag` float DEFAULT '0',
  `bemerkung` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_zahlung_datenblatt1_idx` (`datenblatt_id`),
  CONSTRAINT `fk_zahlung_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zahlung`
--

LOCK TABLES `zahlung` WRITE;
/*!40000 ALTER TABLE `zahlung` DISABLE KEYS */;
/*!40000 ALTER TABLE `zahlung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hausangebot'
--

--
-- Dumping routines for database 'hausangebot'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-01 11:36:36
