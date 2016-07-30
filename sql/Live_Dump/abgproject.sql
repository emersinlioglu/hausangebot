-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 16. Apr 2016 um 16:29
-- Server Version: 5.5.47-0+deb8u1
-- PHP-Version: 5.6.19-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `abgproject`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abschlag`
--

CREATE TABLE IF NOT EXISTS `abschlag` (
`id` int(10) unsigned NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `kaufvertrag_prozent` float DEFAULT NULL,
  `kaufvertrag_betrag` varchar(255) DEFAULT NULL,
  `kaufvertrag_angefordert` date DEFAULT NULL,
  `sonderwunsch_prozent` float DEFAULT NULL,
  `sonderwunsch_betrag` varchar(255) DEFAULT NULL,
  `sonderwunsch_angefordert` date DEFAULT NULL,
  `summe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `abschlag`
--

INSERT INTO `abschlag` (`id`, `datenblatt_id`, `name`, `kaufvertrag_prozent`, `kaufvertrag_betrag`, `kaufvertrag_angefordert`, `sonderwunsch_prozent`, `sonderwunsch_betrag`, `sonderwunsch_angefordert`, `summe`) VALUES
(29, 12, 'Abschlag 1', 25, NULL, '2016-04-06', NULL, NULL, NULL, NULL),
(30, 12, 'Abschlag 2', 28, NULL, '2016-04-08', NULL, NULL, NULL, NULL),
(31, 12, 'Abschlag 3', 16.8, NULL, '2016-04-08', NULL, NULL, NULL, NULL),
(32, 12, 'Abschlag 4', 8.4, NULL, '2016-04-18', NULL, NULL, NULL, NULL),
(33, 12, 'Abschlag 5', 18.3, NULL, '2016-04-19', 96.5, NULL, NULL, NULL),
(34, 12, 'Schlussrechnung', 3.5, NULL, '2016-04-20', 3.5, NULL, NULL, NULL),
(98, 22, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 22, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 22, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 22, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 22, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 22, 'Abschlag 6', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 22, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 26, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 26, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 26, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 26, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 26, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 26, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 27, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 27, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 27, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 27, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 27, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 27, 'Abschlag 6', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 27, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 28, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 28, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 28, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 28, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 28, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 28, 'Abschlag 6', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 28, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 29, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 29, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 29, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 29, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 29, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 29, 'Abschlag 6', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 29, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 30, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 30, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 30, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 30, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 30, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 30, 'Abschlag 6', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 30, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 31, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 31, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 31, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 31, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 31, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 31, 'Abschlag 6', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 31, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 33, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 33, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 33, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 33, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 33, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 33, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 34, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 34, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 34, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 34, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 34, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 34, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 35, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 35, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 35, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 35, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 35, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 35, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 36, 'Abschlag 1', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 36, 'Abschlag 2', 28, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 36, 'Abschlag 3', 16.8, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 36, 'Abschlag 4', 8.4, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 36, 'Abschlag 5', 18.3, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 36, 'Schlussrechnung', 3.5, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datenblatt`
--

CREATE TABLE IF NOT EXISTS `datenblatt` (
`id` int(11) NOT NULL,
  `firma_id` int(10) unsigned DEFAULT NULL,
  `projekt_id` int(10) unsigned DEFAULT NULL,
  `haus_id` int(10) unsigned DEFAULT NULL,
  `nummer` int(11) DEFAULT NULL,
  `kaeufer_id` int(10) unsigned DEFAULT NULL,
  `besondere_regelungen_kaufvertrag` text,
  `sonstige_anmerkungen` text,
  `aktiv` tinyint(1) DEFAULT '0',
  `beurkundung_am` date DEFAULT NULL,
  `verbindliche_fertigstellung` date DEFAULT NULL,
  `uebergang_bnl` date DEFAULT NULL,
  `abnahme_se` date DEFAULT NULL,
  `abnahme_ge` date DEFAULT NULL,
  `auflassung` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `datenblatt`
--

INSERT INTO `datenblatt` (`id`, `firma_id`, `projekt_id`, `haus_id`, `nummer`, `kaeufer_id`, `besondere_regelungen_kaufvertrag`, `sonstige_anmerkungen`, `aktiv`, `beurkundung_am`, `verbindliche_fertigstellung`, `uebergang_bnl`, `abnahme_se`, `abnahme_ge`, `auflassung`) VALUES
(12, 2, 5, 59, NULL, 13, 'Käufer möchte alle Rechnungen vorap per E-Mail erhalten ', '', 1, '2016-03-23', '2018-05-15', '2018-02-06', '2018-06-13', '2018-06-28', 1),
(22, 2, 5, 93, NULL, 8, '', '', 1, NULL, NULL, NULL, NULL, NULL, 0),
(26, 2, 5, 48, NULL, 14, '', '', 1, '2016-03-24', NULL, NULL, NULL, NULL, 0),
(27, 2, 5, 20, NULL, 15, 'Bitte Zahlungensanforderungen vorab per E-Mail versenden!', '', 1, '2016-04-01', NULL, NULL, NULL, NULL, 0),
(28, 2, 5, 61, NULL, 11, '', '', 1, '2016-04-01', NULL, NULL, NULL, NULL, 0),
(29, 2, 5, 45, NULL, 16, '', '', 1, '2016-04-01', NULL, NULL, NULL, NULL, 0),
(30, 2, 5, 60, NULL, 17, '', '', 1, '2016-04-04', NULL, NULL, NULL, NULL, 0),
(31, 2, 5, 74, NULL, 21, '', '', 1, '2016-04-07', NULL, NULL, NULL, NULL, 0),
(33, 2, 5, 16, NULL, 18, '', '', 1, '2016-04-07', NULL, NULL, NULL, NULL, 0),
(34, 2, 5, 82, NULL, 24, '', '', 1, '2016-04-12', NULL, NULL, NULL, NULL, 0),
(35, 2, 5, 25, NULL, 22, '', '', 1, '2016-04-11', NULL, NULL, NULL, NULL, 0),
(36, 2, 5, 77, NULL, 23, '', '', 1, '2016-04-11', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einheitstyp`
--

CREATE TABLE IF NOT EXISTS `einheitstyp` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `einheit` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `einheitstyp`
--

INSERT INTO `einheitstyp` (`id`, `name`, `einheit`) VALUES
(1, 'Wohnung', 'm2'),
(2, 'Stellplatz', 'Stck.'),
(3, 'Lagerraum', 'm2'),
(4, 'Garage', 'm2'),
(5, 'Außenstellplatz', 'Stück'),
(6, 'Keller', 'm2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `firma`
--

INSERT INTO `firma` (`id`, `name`, `nr`) VALUES
(2, 'ABG Allgemeine Bauträgergesellschaft mbH & Co. Objekt Max-Bill-Str. KG', '335');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `haus`
--

CREATE TABLE IF NOT EXISTS `haus` (
`id` int(10) unsigned NOT NULL,
  `projekt_id` int(10) unsigned DEFAULT NULL,
  `firma_id` int(10) unsigned DEFAULT NULL,
  `plz` varchar(255) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL,
  `strasse` varchar(255) DEFAULT NULL,
  `hausnr` varchar(45) DEFAULT NULL,
  `reserviert` tinyint(1) DEFAULT '0',
  `verkauft` tinyint(1) DEFAULT '0',
  `rechnung_vertrieb` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `haus`
--

INSERT INTO `haus` (`id`, `projekt_id`, `firma_id`, `plz`, `ort`, `strasse`, `hausnr`, `reserviert`, `verkauft`, `rechnung_vertrieb`) VALUES
(8, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(11, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(12, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(14, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(15, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(16, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(17, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(18, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(19, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 0, 0),
(20, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(21, 5, 2, '', '', '', '', 1, 0, 0),
(22, 5, 2, '', '', '', '', 1, 0, 0),
(23, 5, 2, '', '', '', '', 0, 0, 0),
(24, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(25, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 0),
(26, 5, 2, '80807', 'München', 'Max-Bill-Straße ', '', 1, 0, 0),
(27, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(28, 5, 2, '', '', '', '', 1, 0, 0),
(29, 5, 2, '', '', '', '', 0, 0, 0),
(30, 5, 2, '', '', '', '', 0, 0, 0),
(31, 5, 2, '', '', '', '', 1, 0, 0),
(32, 5, 2, '', '', '', '', 0, 0, 0),
(33, 5, 2, '', '', '', '', 1, 0, 0),
(34, 5, 2, '', '', '', '', 0, 0, 0),
(35, 5, 2, '', '', '', '', 1, 0, 0),
(36, 5, 2, '', '', '', '', 1, 0, 0),
(37, 5, 2, '', '', '', '', 0, 0, 0),
(38, 5, 2, '', '', '', '', 1, 0, 0),
(39, 5, 2, '', '', '', '', 0, 0, 0),
(40, 5, 2, '', '', '', '', 0, 0, 0),
(41, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(42, 5, 2, '', '', '', '', 1, 0, 0),
(43, 5, 2, '', '', '', '', 1, 0, 0),
(45, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(46, 5, 2, '', '', '', '', 0, 0, 0),
(47, 5, 2, '', '', '', '', 1, 0, 0),
(48, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(50, 5, 2, '', '', '', '', 1, 0, 0),
(51, 5, 2, '', '', '', '', 1, 0, 0),
(54, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(57, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(58, 5, 2, '', '', '', '', 1, 0, 0),
(59, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(60, 5, 2, '80807', 'München', 'Max-Bill-Straße ', '', 0, 1, 1),
(61, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(62, 5, 2, '', '', '', '', 1, 0, 0),
(63, 5, 2, '80807', 'München', 'Max-Bill-Straße ', '', 0, 1, 1),
(64, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(65, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(66, 5, 2, '', '', '', '', 0, 0, 0),
(67, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(68, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(70, 5, 2, '', '', '', '', 1, 0, 0),
(71, 5, 2, '', '', '', '', 0, 0, 0),
(73, 5, 2, '', '', '', '', 0, 0, 0),
(74, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 1),
(76, 5, 2, '', '', '', '', 0, 0, 0),
(77, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 0),
(78, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0),
(79, 5, 2, '', '', '', '', 1, 0, 0),
(80, 5, 2, '', '', '', '', 0, 0, 0),
(81, 5, 2, '80807', 'München', 'Max-Bill-Straße ', '', 1, 0, 0),
(82, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 0, 1, 0),
(84, 5, 2, '', '', '', '', 1, 0, 0),
(85, 5, 2, '', '', '', '', 1, 0, 0),
(86, 5, 2, '', '', '', '', 1, 0, 0),
(87, 5, 2, '', '', '', '', 1, 0, 0),
(88, 5, 2, '', '', '', '', 1, 0, 0),
(89, 5, 2, '', '', '', '', 1, 0, 0),
(90, 5, 2, '', '', '', '', 1, 0, 0),
(91, 5, 2, '', '', '', '', 1, 0, 0),
(93, 5, 2, '80807', 'München', 'Max-Bill-Straße', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kaeufer`
--

CREATE TABLE IF NOT EXISTS `kaeufer` (
`id` int(10) unsigned NOT NULL,
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
  `nachname2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kaeufer`
--

INSERT INTO `kaeufer` (`id`, `debitor_nr`, `beurkundung_am`, `verbindliche_fertigstellung`, `uebergang_bnl`, `abnahme_se`, `abnahme_ge`, `auflassung`, `anrede`, `titel`, `vorname`, `nachname`, `strasse`, `hausnr`, `plz`, `ort`, `festnetz`, `handy`, `email`, `anrede2`, `titel2`, `vorname2`, `nachname2`) VALUES
(8, '123456', '2015-01-01', '2018-01-01', '2018-01-01', '2018-01-01', '2018-01-01', 1, 0, 'Dr', 'Karl', 'Mustermann', 'Muster Str.', '7', '80333', 'München', '08924-226', '0123456078', 'karl.muster@tlin.de', NULL, '', '', ''),
(11, '635045', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Giovanni', 'Minniti', 'Rohrer Höhe ', '62', '70565', 'Stuttgart', '', '0151/20577808', 'minniti@t-online.de', NULL, '', '', ''),
(13, '635043', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Guillermo', 'Benedicto', 'Otl-Aicher-Straße ', '44', '80807', 'München', '', '0176/38758050', 'antrueba43@gmail.com', 1, '', 'Ana', 'Trueba'),
(14, '635037', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Josef', 'Lechner', 'Fürstbach ', '1', '84416', 'Taufkirchen', '', '01721083883', 'lechner.josef@web.de', 1, '', 'Angela', 'Lechner'),
(15, '635009', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Patrick ', 'Rauschecker', 'Neubrunnenstraße ', '31/43', 'CH-8050', 'Zürich', '', '01722506354', 'patrick.rauschecker@gmail.com', NULL, '', '', ''),
(16, '635034', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Giovanni', 'Minniti', 'Rohrer Höhe ', '62', '70565', 'Stuttgart', '', '015120577808', 'minniti@t-online.de', 1, '', 'Beatrice', 'Minniti'),
(17, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 'Dr. ', 'Hartmut ', 'Müller', 'Parkweg ', '12', '45768', 'Marl', '', '', 'hm.marl@t-online.de', NULL, '', '', ''),
(18, '', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Florian', 'Fecht', 'Kunigundenstraße ', '63', '80805', 'München', '', '0176/21993953', 'sarah.fecht@gmx.de', 1, '', 'Sarah', 'Fecht'),
(19, '', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Walter', 'Kuffner', 'Heisenbergstraße ', '3', '80937', 'München', '', '0173/2150355', 'wjkuffner@arcor.de', 1, '', 'Rosamunde', 'Pongartz-Kuffner'),
(20, '', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Stefan ', 'Wiedemann', 'Otl-Aicher-Straße ', '52', '80807', 'München', '', '0176/63418353', 'stefan.wiedemann@campusm21.de', 1, '', 'Nicole', 'Wiedemann'),
(21, '', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Martin', 'Straubinger', 'Georg-Elser-Weg ', '5', '85221', 'Dachau ', '', '0170/2432920', 'martin.straubinger@mail.de', 1, '', 'Christiane', 'Straubinger'),
(22, '', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Klaus ', 'Merkel', 'Spitzerstraße ', '22', '80939', 'München', '', '0174/7695743', 'merkel@irt.de', 1, '', 'Elisabeth', 'Merkel'),
(23, '', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 'Viktor ', 'Willmar', 'Buchäckerstraße ', '1', '80339', 'Chieming', '', '', 'dr.astrid.scheuerer@dr-willmar.de', NULL, '', '', ''),
(24, '', NULL, NULL, NULL, NULL, NULL, 0, 1, '', 'Petra', 'Romeike', 'Bgm-Weger-Weg ', '9', '82140', 'Olching', '', '08142/2847219', 'petra-romeike@gmx.de', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
`id` int(10) unsigned NOT NULL,
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
  `handy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`id`, `debitor_nr`, `anrede`, `titel`, `vorname`, `nachname`, `email`, `strasse`, `hausnr`, `plz`, `ort`, `festnetz`, `handy`) VALUES
(1, '12300', 1, 'a', 'Test 1', 'mmm', 'emr@gmail.co', 'pupinweg', '6', '616161', 'darmstadt', '123456789', '987987987'),
(2, '12311', 1, 'b', 'Test 2', 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '12344', 1, 'c', 'Test 3', 'sss', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '12399', 1, 'a', 'Test 99', 'mmm 99', 'emr99@gmail.co', 'pupinweg99', '699', '61616199', 'darmstadt', NULL, NULL),
(6, '22233', 1, 'a', 'Test 233', 'mmm233', 'emr233@gmail.co', 'pupinweg233', '233', '233', 'darmstadt', NULL, NULL),
(7, '', 0, '', '', '', '', '', '', '', '', NULL, NULL),
(8, '123456', 0, 'Dr', 'Karl', 'Mustermann', 'karl.muster@tlin.de', 'Muster Str.', '7', '80333', 'München', NULL, NULL),
(9, '635043', NULL, '', '', '', '', '', '', '', '', '', ''),
(10, '99999', 0, 'Dr', 'Karl', 'Mustermann', 'karl.muster@tlin.de', 'Muster Str.', '7', '80333', 'München', '', ''),
(11, '635045', NULL, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachlass`
--

CREATE TABLE IF NOT EXISTS `nachlass` (
`id` int(10) unsigned NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `schreiben_vom` date DEFAULT NULL,
  `betrag` double DEFAULT NULL,
  `bemerkung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachlass`
--

INSERT INTO `nachlass` (`id`, `datenblatt_id`, `schreiben_vom`, `betrag`, `bemerkung`) VALUES
(2, 12, '2016-04-12', 850, 'falsche Fliesen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE IF NOT EXISTS `projekt` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `firma_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`id`, `name`, `firma_id`) VALUES
(5, 'Parkcubes', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sonderwunsch`
--

CREATE TABLE IF NOT EXISTS `sonderwunsch` (
`id` int(10) unsigned NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `angebot_datum` date DEFAULT NULL,
  `angebot_betrag` double DEFAULT NULL,
  `beauftragt_datum` date DEFAULT NULL,
  `beauftragt_betrag` double DEFAULT NULL,
  `rechnungsstellung_datum` date DEFAULT NULL,
  `rechnungsstellung_betrag` double DEFAULT NULL,
  `rechnungsstellung_rg_nr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `sonderwunsch`
--

INSERT INTO `sonderwunsch` (`id`, `datenblatt_id`, `name`, `angebot_datum`, `angebot_betrag`, `beauftragt_datum`, `beauftragt_betrag`, `rechnungsstellung_datum`, `rechnungsstellung_betrag`, `rechnungsstellung_rg_nr`) VALUES
(2, 12, 'Ausbau', '2016-03-30', 20000, '2016-04-08', 20000, '2016-04-12', 20000, '043');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teileigentumseinheit`
--

CREATE TABLE IF NOT EXISTS `teileigentumseinheit` (
`id` int(10) unsigned NOT NULL,
  `haus_id` int(10) unsigned NOT NULL,
  `einheitstyp_id` int(10) unsigned NOT NULL,
  `te_nummer` varchar(255) DEFAULT NULL,
  `gefoerdert` tinyint(1) NOT NULL DEFAULT '0',
  `geschoss` varchar(45) DEFAULT NULL,
  `zimmer` varchar(45) DEFAULT NULL,
  `me_anteil` varchar(45) DEFAULT NULL,
  `wohnflaeche` varchar(45) DEFAULT NULL,
  `kaufpreis` float DEFAULT NULL,
  `kp_einheit` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `teileigentumseinheit`
--

INSERT INTO `teileigentumseinheit` (`id`, `haus_id`, `einheitstyp_id`, `te_nummer`, `gefoerdert`, `geschoss`, `zimmer`, `me_anteil`, `wohnflaeche`, `kaufpreis`, `kp_einheit`) VALUES
(37, 11, 1, '10', 0, '2 OG', '3', '12,60', '79,13', 545000, 6898.73),
(38, 12, 1, '1', 1, 'EG', '4', '16,76', '105,30', 342225, 3259.29),
(43, 14, 1, '3', 1, 'EG', '3', '16,50', '103,62', 336765, 0),
(44, 16, 1, '8', 0, '2 OG ', '4', '17,19', '107,97', 729000, 6813.08),
(45, 17, 1, '5', 0, '1 OG', '2', '9,39', '58,96', 399000, 6879.31),
(46, 18, 1, '4', 1, '1 OG ', '4', '16,75', '105,18', 341835, 3255.57),
(47, 19, 1, '6', 0, '1 OG', '3', '13,09', '82,25', 556000, 6780.49),
(48, 8, 1, '2', 0, 'EG', '1', '6,10', '38,34', 259000, 0),
(49, 15, 1, '7', 1, '1 OG', '3', '13,99', '87,86', 285545, 3282.13),
(50, 20, 1, '9', 0, '2 OG', '2', '9,21', '57,88', 408000, 7157.89),
(51, 21, 1, '11', 1, '2 OG', '3', '14,01', '87,99', 285968, 3286.99),
(52, 23, 1, '12', 0, '3 OG', '4', '17,19', '107,97', 743000, 6943.93),
(53, 24, 1, '13', 0, '3 OG', '2', '9,21', '57,83', 412000, 7228.07),
(54, 25, 1, '14', 0, '3 OG', '3', '12,60', '79,13', 553000, 0),
(55, 22, 1, '15', 1, '3 OG', '3', '13,99', '87,86', 285545, 0),
(56, 26, 1, '16', 0, 'DG', '4', '19,15', '120,31', 883500, 7325),
(57, 27, 1, '17', 0, 'DG', '4', '22,96', '144,14', 1055000, 0),
(58, 28, 1, '18', 1, 'EG ', '3', '14,11', '88,63', 288048, 0),
(59, 29, 1, '19', 0, 'EG', '1', '8,77', '55,08', 374000, 6800),
(60, 30, 1, '20', 0, 'EG', '1', '7,59', '47,68', 329000, 7000),
(61, 31, 1, '21', 1, '1 OG', '4', '16,97', '106,59', 346418, 0),
(62, 32, 1, '22', 0, '1 OG', '3', '15,43', '96,90', 658000, 0),
(63, 33, 1, '23', 1, '1 OG ', '3', '12,58', '79,02', 256815, 3250.82),
(64, 34, 1, '28', 0, '3 OG', '3', '14,95', '93,91', 648000, 6967.74),
(65, 36, 1, '24', 1, '2 OG', '4', '16,96', '106,52', 346190, 0),
(66, 37, 1, '25', 0, '2 OG', '3', '15,10', '94,82', 654000, 0),
(67, 38, 1, '26', 1, '2 OG', '3', '12,56', '78,92', 256490, 0),
(68, 39, 1, '27', 0, '3 OG', '4', '17,47', '109,71', 745000, 6834.86),
(69, 35, 1, '29', 1, '3 OG', '3', '12,58', '79,02', 256815, 3250.82),
(70, 40, 1, '30', 0, '4 OG ', '4', '17,47', '109,71 ', 759000, 0),
(71, 41, 1, '31', 0, '4 OG', '3', '14,40', '90,45', 629000, 6988.89),
(72, 42, 1, '32', 1, '4 OG', '3', '12,56', '78,92', 256490, 0),
(73, 43, 1, '33', 0, 'DG', '4', '17,09', '107,36', 775000, 0),
(74, 45, 1, '34', 0, 'DG', '3', '19,52', '122,60', 894000, 0),
(75, 46, 1, '35', 0, 'EG', '4', '18,04', '113,32', 749000, 6628.32),
(76, 47, 1, '36', 0, 'EG', '2', '9,63', '60,50', 415000, 0),
(77, 48, 1, '37', 0, 'EG', '1', '6,38', '40,06', 275000, 6875),
(79, 50, 1, '38', 1, 'EG', '3', '12,88', '80,93', 263023, 0),
(80, 51, 1, '39', 1, '1 OG', '4', '17,45', '109,62', 727000, 0),
(82, 54, 1, '40', 0, '1 OG', '2', '9,48', '59,56', 405000, 0),
(85, 57, 1, '41', 0, '1 OG', '2', '8,60', '54,03', 369000, 0),
(86, 58, 1, '42', 1, '1 OG', '3', '12,80', '80,40', 261300, 0),
(87, 59, 1, '43', 0, '2 OG', '4', '17,49', '109,89', 739000, 0),
(88, 60, 1, '44', 0, '2 OG', '2', '9,13', '57,32', 399000, 0),
(89, 61, 1, '45', 0, '2 OG', '2', '8,60', '54,03', 379000, 7018.52),
(90, 62, 1, '46', 1, '2 OG', '3', '12,80', '80,39', 261268, 3265.85),
(91, 63, 1, '47', 0, '3 OG', '4', '17,05', '107,12', 737000, 0),
(92, 64, 1, '48', 0, ' OG', '2', '9,63', '60,48', 427000, 0),
(93, 65, 1, '49', 0, '3 OG', '2', '8,26', '51,88', 369000, 0),
(94, 66, 1, '50', 0, '3 OG', '50', '13,18', '82,79', 569000, 0),
(95, 67, 1, '51', 0, 'DG ', '3', '19,28', '121,12', 885000, 0),
(96, 68, 1, '52', 0, 'DG', '4', '16,95', '106,47', 775000, 7311.32),
(98, 70, 1, '53', 0, 'EG', '4', '18,57', '116,65', 775000, 6681.03),
(99, 71, 1, '54', 0, 'EG', '3', '15,70', '98,61', 659000, 0),
(100, 73, 1, '55', 0, 'EG', '3', '13,46', '84,53', 567000, 0),
(101, 74, 1, '56', 0, '1 OG', '4', '18,30', '114,95', 749000, 6570.18),
(102, 76, 1, '57', 0, '1 OG', '3', '14,87', '93,42', 628000, 6752.69),
(103, 77, 1, '58', 0, '1 OG', '3', '13,86', '87,06', 587000, 0),
(104, 78, 1, '59', 0, '2 OG', '4', '18,43', '115,79', 779000, 6773.91),
(105, 79, 1, '60', 0, '2', '3', '14,31', '89,87', 623000, 7000),
(106, 80, 1, '61', 0, '2 OG', '3', '13,86', '87,06', 604000, 0),
(107, 81, 1, '62', 0, 'DG', '3', '17,75', '111,50', 827000, 0),
(108, 82, 1, '63', 0, 'DG', '3', '20,76', '130,43', 967000, 0),
(110, 84, 2, '95', 0, '', '', '1,5', '', 28000, 0),
(111, 85, 2, '74', 0, '', '', '1,5', '', 28000, 0),
(112, 86, 2, '80', 0, '', '', '1,5', '', 28000, 0),
(114, 88, 1, '110', 0, '', '', '1,5', '', 28000, 0),
(115, 89, 1, '89', 0, '', '', '1,5', '', 28000, 0),
(116, 90, 4, '81', 0, '', '', '1,5', '', 28000, NULL),
(117, 91, 1, '86', 0, '', '', '1,5', '', NULL, NULL),
(119, 59, 2, '104', 0, '', '', '1,5', '', 28000, NULL),
(120, 61, 2, '110', 0, '', '', '1,5', '', 28000, NULL),
(121, 82, 2, '75', 0, '', '', '1,5', '', 28000, NULL),
(122, 82, 2, '76', 0, '', '', '1,5', '', 28000, NULL),
(123, 48, 2, '85', 0, '', '', '1,5', '', 28000, NULL),
(124, 45, 2, '111', 0, '', '', '1,5', '', 28000, NULL),
(125, 20, 2, '89', 0, '', '', '1,5', '', 28000, NULL),
(126, 60, 2, '95', 0, '', '', '1,5', '', 28000, NULL),
(127, 27, 2, '86', 0, '', '', '1,5', '', 28000, NULL),
(128, 74, 2, '80', 0, '', '', '1,5', '', 28000, NULL),
(129, 77, 2, '74', 0, '', '', '1,5', '', 28000, NULL),
(130, 57, 2, '81', 0, '', '', '', '1,5', 28000, NULL),
(132, 81, 2, '83', 0, '', '', '1,5', '', 28000, NULL),
(133, 81, 1, '84', 0, '', '', '1,5', '', 28000, NULL),
(134, 16, 2, '125', 0, '', '', '1,5', '', 28000, NULL),
(135, 25, 2, '90', 0, '', '', '1,5', '', 28000, NULL),
(136, 54, 2, '101', 0, '', '', '1,5', '', 28000, NULL),
(137, 65, 2, '100', 0, '', '', '1,5', '', 28000, NULL),
(138, 11, 2, '70', 0, '', '', '1,5', '', 28000, NULL),
(139, 93, 1, '', 0, '', '', '', '', 0, NULL),
(140, 41, 2, '93', 0, '', '', '1,5', '', 28000, NULL),
(141, 64, 2, '94', 0, '', '', '1,5', '', 28000, NULL),
(142, 67, 2, '117', 0, '', '', '1,5', '', NULL, NULL),
(143, 63, 2, '92', 0, '', '', '1,5', '', 28000, NULL),
(144, 24, 2, '123', 0, '', '', '1,5', '', 28000, NULL),
(145, 87, 2, '104', 0, '', '', '', '', NULL, NULL),
(146, 26, 2, '121', 0, '', '', '1,5', '', 28000, NULL),
(147, 26, 2, '122', 0, '', '', '1,5', '', 28000, NULL),
(148, 78, 2, '68', 0, '', '', '1,5', '', 28000, NULL),
(149, 78, 2, '69', 0, '', '', '1,5', '', 28800, NULL),
(150, 78, 3, '132', 0, '', '', '', '', 13000, NULL),
(155, 68, 2, '68', 0, '', '', '1,5', '', 28000, NULL),
(156, 68, 2, '69', 0, '', '', '1,5', '', 28000, NULL),
(158, 68, 3, '132', 0, '', '', '15,40', '', 13000, NULL),
(159, 8, 2, '124', 0, '', '', '1,5', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zaehlerstand`
--

CREATE TABLE IF NOT EXISTS `zaehlerstand` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `nummer` varchar(45) DEFAULT NULL,
  `stand` varchar(45) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `haus_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `zaehlerstand`
--

INSERT INTO `zaehlerstand` (`id`, `name`, `nummer`, `stand`, `datum`, `haus_id`) VALUES
(26, '', '', '', NULL, 8),
(27, '', '', '', NULL, 12),
(28, '', '', '', NULL, 63),
(29, 'Strom ', '06042839', '3,1', '2016-04-07', 59),
(32, 'Kaltwasser/WC', '56534455', '0,547', '2016-04-07', 59),
(33, 'Warmwasser/Küche', '57557855', '0,040', '2016-04-07', 59),
(34, 'Heizung', '52540933', '0,016', '2016-04-07', 59);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlung`
--

CREATE TABLE IF NOT EXISTS `zahlung` (
`id` int(10) unsigned NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `betrag` float DEFAULT '0',
  `bemerkung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `zahlung`
--

INSERT INTO `zahlung` (`id`, `datenblatt_id`, `datum`, `betrag`, `bemerkung`) VALUES
(3, 12, '2016-04-08', 191750, ''),
(4, 12, '2016-04-12', 214760, '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abschlag`
--
ALTER TABLE `abschlag`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_abschlag_datenblatt1_idx` (`datenblatt_id`);

--
-- Indizes für die Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_datenblatt_haus_idx` (`haus_id`), ADD KEY `fk_datenblatt_firma1_idx` (`firma_id`), ADD KEY `fk_datenblatt_projekt1_idx` (`projekt_id`), ADD KEY `fk_datenblatt_kaeufer1_idx` (`kaeufer_id`);

--
-- Indizes für die Tabelle `einheitstyp`
--
ALTER TABLE `einheitstyp`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `firma`
--
ALTER TABLE `firma`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `haus`
--
ALTER TABLE `haus`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_haus_projekt1_idx` (`projekt_id`), ADD KEY `fk_haus_firma1_idx` (`firma_id`);

--
-- Indizes für die Tabelle `kaeufer`
--
ALTER TABLE `kaeufer`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `nachlass`
--
ALTER TABLE `nachlass`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_nachlass_datenblatt1_idx` (`datenblatt_id`);

--
-- Indizes für die Tabelle `projekt`
--
ALTER TABLE `projekt`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_projekt_firma1_idx` (`firma_id`);

--
-- Indizes für die Tabelle `sonderwunsch`
--
ALTER TABLE `sonderwunsch`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_sonderwunch_datenblatt1_idx` (`datenblatt_id`);

--
-- Indizes für die Tabelle `teileigentumseinheit`
--
ALTER TABLE `teileigentumseinheit`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_teileigentumseinheit_haus1_idx` (`haus_id`), ADD KEY `fk_teileigentumseinheit_einheitstyp1_idx` (`einheitstyp_id`);

--
-- Indizes für die Tabelle `zaehlerstand`
--
ALTER TABLE `zaehlerstand`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_zaehlerstand_haus1_idx` (`haus_id`);

--
-- Indizes für die Tabelle `zahlung`
--
ALTER TABLE `zahlung`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_zahlung_datenblatt1_idx` (`datenblatt_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abschlag`
--
ALTER TABLE `abschlag`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT für Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT für Tabelle `einheitstyp`
--
ALTER TABLE `einheitstyp`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `firma`
--
ALTER TABLE `firma`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `haus`
--
ALTER TABLE `haus`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT für Tabelle `kaeufer`
--
ALTER TABLE `kaeufer`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `nachlass`
--
ALTER TABLE `nachlass`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `projekt`
--
ALTER TABLE `projekt`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `sonderwunsch`
--
ALTER TABLE `sonderwunsch`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `teileigentumseinheit`
--
ALTER TABLE `teileigentumseinheit`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT für Tabelle `zaehlerstand`
--
ALTER TABLE `zaehlerstand`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT für Tabelle `zahlung`
--
ALTER TABLE `zahlung`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `abschlag`
--
ALTER TABLE `abschlag`
ADD CONSTRAINT `fk_abschlag_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
ADD CONSTRAINT `fk_haus_firma1` FOREIGN KEY (`firma_id`) REFERENCES `firma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_haus_projekt1` FOREIGN KEY (`projekt_id`) REFERENCES `projekt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `nachlass`
--
ALTER TABLE `nachlass`
ADD CONSTRAINT `fk_nachlass_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `projekt`
--
ALTER TABLE `projekt`
ADD CONSTRAINT `fk_projekt_firma1` FOREIGN KEY (`firma_id`) REFERENCES `firma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `sonderwunsch`
--
ALTER TABLE `sonderwunsch`
ADD CONSTRAINT `fk_sonderwunch_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
ADD CONSTRAINT `fk_zahlung_datenblatt1` FOREIGN KEY (`datenblatt_id`) REFERENCES `datenblatt` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
