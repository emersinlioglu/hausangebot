-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Jan 2016 um 22:02
-- Server Version: 5.5.36
-- PHP-Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `hausangebot`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abschlag`
--

CREATE TABLE IF NOT EXISTS `abschlag` (
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
  KEY `fk_abschlag_datenblatt1_idx` (`datenblatt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Daten für Tabelle `abschlag`
--

INSERT INTO `abschlag` (`id`, `datenblatt_id`, `name`, `kaufvertrag_prozent`, `kaufvertrag_betrag`, `kaufvertrag_angefordert`, `sonderwunsch_prozent`, `sonderwunsch_betrag`, `sonderwunsch_angefordert`, `summe`) VALUES
(1, 3, 'Abschlag 1', 8, NULL, '2016-05-02', NULL, NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Abschlag 1', 25, NULL, '2017-02-03', NULL, NULL, NULL, NULL),
(5, 1, 'Abschlag 2', 28, NULL, '2016-01-29', NULL, NULL, '2016-01-31', NULL),
(7, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 'Abschlag 5', 18.3, NULL, NULL, 96.5, NULL, NULL, NULL),
(14, 1, 'Abschlag 6', 0, NULL, NULL, 0, NULL, NULL, NULL),
(15, 1, 'Schlussrechnung', 3.5, NULL, NULL, 3.5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datenblatt`
--

CREATE TABLE IF NOT EXISTS `datenblatt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firma_id` int(10) unsigned DEFAULT NULL,
  `projekt_id` int(10) unsigned DEFAULT NULL,
  `haus_id` int(10) unsigned DEFAULT NULL,
  `nummer` int(11) DEFAULT NULL,
  `kaeufer_id` int(10) unsigned DEFAULT NULL,
  `besondere_regelungen_kaufvertrag` text,
  `sonstige_anmerkungen` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_datenblatt_haus_idx` (`haus_id`),
  KEY `fk_datenblatt_firma1_idx` (`firma_id`),
  KEY `fk_datenblatt_projekt1_idx` (`projekt_id`),
  KEY `fk_datenblatt_kaeufer1_idx` (`kaeufer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `datenblatt`
--

INSERT INTO `datenblatt` (`id`, `firma_id`, `projekt_id`, `haus_id`, `nummer`, `kaeufer_id`, `besondere_regelungen_kaufvertrag`, `sonstige_anmerkungen`) VALUES
(1, 1, 4, 1, 111, 5, 'Es sind keine Besonderheiten definiert worden!', ''),
(2, NULL, NULL, NULL, 222, 6, NULL, NULL),
(3, 1, 3, NULL, 999, 7, 'blsdkfjasldflskf\r\nsdflaksdjflaskjdf\r\nsadflskadfjasd\r\nfsadlfkj', NULL),
(4, 2, 2, 1, 11, NULL, '', ''),
(5, NULL, NULL, NULL, 123, NULL, NULL, NULL),
(6, 2, 2, 1, 12312, NULL, '', ''),
(7, 2, NULL, NULL, 111, NULL, '', ''),
(8, 1, 1, 2, 111, NULL, '', ''),
(9, 1, 1, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einheitstyp`
--

CREATE TABLE IF NOT EXISTS `einheitstyp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `einheitstyp`
--

INSERT INTO `einheitstyp` (`id`, `name`) VALUES
(1, 'Wohnung'),
(2, 'Stellplatz'),
(3, 'Lagerraum'),
(4, 'Garage');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `firma`
--

INSERT INTO `firma` (`id`, `name`, `nr`) VALUES
(1, 'ABG Immobilien GmbH & Co. KG', '3780'),
(2, 'Firma 2', '2222'),
(3, 'Firma 5', '5555');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `haus`
--

CREATE TABLE IF NOT EXISTS `haus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projekt_id` int(10) unsigned NOT NULL,
  `plz` varchar(255) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL,
  `strasse` varchar(255) DEFAULT NULL,
  `hausnr` varchar(45) DEFAULT NULL,
  `reserviert` tinyint(1) DEFAULT '0',
  `verkauft` tinyint(1) DEFAULT '0',
  `rechnung_vertrieb` tinyint(1) DEFAULT '0',
  `firma_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_haus_projekt1_idx` (`projekt_id`),
  KEY `fk_haus_firma1_idx` (`firma_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `haus`
--

INSERT INTO `haus` (`id`, `projekt_id`, `plz`, `ort`, `strasse`, `hausnr`, `reserviert`, `verkauft`, `rechnung_vertrieb`, `firma_id`) VALUES
(1, 4, '80333', 'München', 'Musterstr.', '7', 0, 1, 1, 1),
(2, 1, '989898', 'Frankfurt', 'blabla', '98', 0, 0, 0, 0),
(3, 1, '16161', 'Darmstadt', 'asdasd', '888', 0, 0, 0, 0),
(4, 1, '', '', '', '', 0, 0, 0, 0),
(5, 2, '64287', 'Darmstadt', 'Dieburger Str', '42', 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kaeufer`
--

CREATE TABLE IF NOT EXISTS `kaeufer` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `kaeufer`
--

INSERT INTO `kaeufer` (`id`, `debitor_nr`, `beurkundung_am`, `verbindliche_fertigstellung`, `uebergang_bnl`, `abnahme_se`, `abnahme_ge`, `auflassung`, `anrede`, `titel`, `vorname`, `nachname`, `strasse`, `hausnr`, `plz`, `ort`, `festnetz`, `handy`, `email`, `anrede2`, `titel2`, `vorname2`, `nachname2`) VALUES
(5, '123456', '2016-01-01', '2018-01-01', '2016-01-07', '2016-01-06', '2016-01-08', 1, 0, 'Dr.', 'Halit', 'Ciftci', 'Musterstrasse', '7', '80333', 'München', '', '', '', 1, '', '', ''),
(6, '666', '2020-02-06', NULL, NULL, NULL, NULL, 0, 0, 'nnnn', '', '', '', '', '', '', '', '', '', 0, '', '', ''),
(7, '777', NULL, NULL, NULL, NULL, NULL, 0, 0, 'ananana', '', '', '', '', '', '', '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachlass`
--

CREATE TABLE IF NOT EXISTS `nachlass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datenblatt_id` int(11) NOT NULL,
  `schreiben_vom` date DEFAULT NULL,
  `betrag` double DEFAULT NULL,
  `bemerkung` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nachlass_datenblatt1_idx` (`datenblatt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `nachlass`
--

INSERT INTO `nachlass` (`id`, `datenblatt_id`, `schreiben_vom`, `betrag`, `bemerkung`) VALUES
(1, 1, '2018-01-01', 600, 'falsche Fliesen'),
(2, 2, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL),
(5, 4, NULL, NULL, ''),
(6, 5, NULL, NULL, NULL),
(7, 6, NULL, NULL, ''),
(8, 7, NULL, NULL, ''),
(9, 1, '2019-01-02', 200, 'Schalter fehlen'),
(11, 8, NULL, NULL, ''),
(12, 9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE IF NOT EXISTS `projekt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `firma_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projekt_firma1_idx` (`firma_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`id`, `name`, `firma_id`) VALUES
(1, 'Projekt 1', 1),
(2, 'Projekt 2', 2),
(3, 'Projekt 3', 1),
(4, 'Funkkaserne', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sonderwunsch`
--

CREATE TABLE IF NOT EXISTS `sonderwunsch` (
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
  KEY `fk_sonderwunch_datenblatt1_idx` (`datenblatt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Daten für Tabelle `sonderwunsch`
--

INSERT INTO `sonderwunsch` (`id`, `datenblatt_id`, `name`, `angebot_datum`, `angebot_betrag`, `beauftragt_datum`, `beauftragt_betrag`, `rechnungsstellung_datum`, `rechnungsstellung_betrag`, `rechnungsstellung_rg_nr`) VALUES
(1, 3, 'Sond 1', '2016-11-14', 200, NULL, 100, NULL, 25, '112233'),
(2, 3, 's2', '2016-09-08', 450, NULL, 150, NULL, 89, 'g34'),
(17, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(18, 1, 'Ausbau 1', '2015-04-04', 5000, '2015-04-15', 5000, '2015-09-30', 5000, '125'),
(19, 1, 'Ausbau 1', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(20, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 'Ausstattung 1', NULL, 5000, NULL, 5000, NULL, 5000, ''),
(24, 1, 'Austattung 2', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(26, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(27, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teileigentumseinheit`
--

CREATE TABLE IF NOT EXISTS `teileigentumseinheit` (
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
  KEY `fk_teileigentumseinheit_einheitstyp1_idx` (`einheitstyp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `teileigentumseinheit`
--

INSERT INTO `teileigentumseinheit` (`id`, `haus_id`, `einheitstyp_id`, `te_nummer`, `gefoerdert`, `geschoss`, `zimmer`, `me_anteil`, `wohnflaeche`, `kaufpreis`, `kp_einheit`) VALUES
(3, 1, 1, '2', 1, 'EG', '3', '20/1000', '80', 500000, NULL),
(4, 1, 2, '120', 0, '', '', '1,25/1000', '1', 20000, NULL),
(6, 4, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 2, '121', 0, '', '', '1,25/1000', '1', 20000, NULL),
(8, 1, 3, '122', 0, '', '', '2,75/1000', '10', 10000, NULL),
(9, 1, 3, '123', 0, '', '', '2,75/1000', '10', 10000, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zaehlerstand`
--

CREATE TABLE IF NOT EXISTS `zaehlerstand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `stand` varchar(45) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `haus_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_zaehlerstand_haus1_idx` (`haus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `zaehlerstand`
--

INSERT INTO `zaehlerstand` (`id`, `name`, `stand`, `datum`, `haus_id`) VALUES
(1, 'Wasser', '5600', '2016-01-30', 1),
(5, NULL, NULL, NULL, 4),
(6, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlung`
--

CREATE TABLE IF NOT EXISTS `zahlung` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datenblatt_id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `betrag` float DEFAULT '0',
  `bemerkung` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_zahlung_datenblatt1_idx` (`datenblatt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Daten für Tabelle `zahlung`
--

INSERT INTO `zahlung` (`id`, `datenblatt_id`, `datum`, `betrag`, `bemerkung`) VALUES
(1, 1, '2018-01-01', 100000, 'Einbehalt wg.'),
(2, 1, '2019-01-02', 150000, ''),
(3, 2, '0000-00-00', 11, NULL),
(4, 2, '0000-00-00', 22, NULL),
(5, 2, '0000-00-00', 33, NULL),
(6, 2, '0000-00-00', 44, NULL),
(11, 3, '0000-00-00', 9, NULL),
(12, 3, '0000-00-00', 8, NULL),
(14, 3, '0000-00-00', 855, NULL),
(15, 3, '0000-00-00', 955, NULL),
(17, 4, NULL, 0, ''),
(18, 4, NULL, 0, ''),
(19, 4, NULL, 0, ''),
(20, 4, NULL, 0, ''),
(21, 4, NULL, 0, '');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `abschlag`
--
ALTER TABLE `abschlag`
  ADD CONSTRAINT `fk_abschlag_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
  ADD CONSTRAINT `fk_datenblatt_firma1` FOREIGN KEY (`firma_id`) REFERENCES `firma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datenblatt_haus` FOREIGN KEY (`haus_id`) REFERENCES `haus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datenblatt_kaeufer1` FOREIGN KEY (`kaeufer_id`) REFERENCES `kaeufer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_datenblatt_projekt1` FOREIGN KEY (`projekt_id`) REFERENCES `projekt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `haus`
--
ALTER TABLE `haus`
  ADD CONSTRAINT `fk_haus_projekt1` FOREIGN KEY (`projekt_id`) REFERENCES `projekt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `nachlass`
--
ALTER TABLE `nachlass`
  ADD CONSTRAINT `fk_nachlass_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `projekt`
--
ALTER TABLE `projekt`
  ADD CONSTRAINT `fk_projekt_firma1` FOREIGN KEY (`firma_id`) REFERENCES `firma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `sonderwunsch`
--
ALTER TABLE `sonderwunsch`
  ADD CONSTRAINT `fk_sonderwunch_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `teileigentumseinheit`
--
ALTER TABLE `teileigentumseinheit`
  ADD CONSTRAINT `fk_teileigentumseinheit_einheitstyp1` FOREIGN KEY (`einheitstyp_id`) REFERENCES `einheitstyp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teileigentumseinheit_haus1` FOREIGN KEY (`haus_id`) REFERENCES `haus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `zaehlerstand`
--
ALTER TABLE `zaehlerstand`
  ADD CONSTRAINT `fk_zaehlerstand_haus1` FOREIGN KEY (`haus_id`) REFERENCES `haus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `zahlung`
--
ALTER TABLE `zahlung`
  ADD CONSTRAINT `fk_zahlung_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
