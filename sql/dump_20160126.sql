-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Jan 2016 um 22:08
-- Server-Version: 10.1.8-MariaDB
-- PHP-Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hausangebot`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abschlag`
--

CREATE TABLE `abschlag` (
  `id` int(10) UNSIGNED NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `kaufvertrag_prozent` float DEFAULT NULL,
  `kaufvertrag_betrag` varchar(255) DEFAULT NULL,
  `kaufvertrag_angefordert` date DEFAULT NULL,
  `sonderwunsch_prozent` float DEFAULT NULL,
  `sonderwunsch_betrag` varchar(255) DEFAULT NULL,
  `sonderwunsch_angefordert` date DEFAULT NULL,
  `summe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `abschlag`
--

INSERT INTO `abschlag` (`id`, `datenblatt_id`, `name`, `kaufvertrag_prozent`, `kaufvertrag_betrag`, `kaufvertrag_angefordert`, `sonderwunsch_prozent`, `sonderwunsch_betrag`, `sonderwunsch_angefordert`, `summe`) VALUES
(1, 3, 'Abschlag 1', 8, NULL, '2016-05-02', NULL, NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'z1', 20, NULL, '2016-01-28', NULL, NULL, '2016-01-30', NULL),
(5, 1, '', 50, NULL, '2016-01-29', 50, NULL, '2016-01-31', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datenblatt`
--

CREATE TABLE `datenblatt` (
  `id` int(11) NOT NULL,
  `firma_id` int(10) UNSIGNED DEFAULT NULL,
  `projekt_id` int(10) UNSIGNED DEFAULT NULL,
  `haus_id` int(10) UNSIGNED DEFAULT NULL,
  `nummer` int(11) DEFAULT NULL,
  `kaeufer_id` int(10) UNSIGNED DEFAULT NULL,
  `besondere_regelungen_kaufvertrag` text,
  `sonstige_anmerkungen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `datenblatt`
--

INSERT INTO `datenblatt` (`id`, `firma_id`, `projekt_id`, `haus_id`, `nummer`, `kaeufer_id`, `besondere_regelungen_kaufvertrag`, `sonstige_anmerkungen`) VALUES
(1, 2, 2, 1, 111, 5, '', ''),
(2, NULL, NULL, NULL, 222, 6, NULL, NULL),
(3, 1, 3, NULL, 999, 7, 'blsdkfjasldflskf\r\nsdflaksdjflaskjdf\r\nsadflskadfjasd\r\nfsadlfkj', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einheitstyp`
--

CREATE TABLE `einheitstyp` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `einheitstyp`
--

INSERT INTO `einheitstyp` (`id`, `name`) VALUES
(1, 'Haus'),
(2, 'Parkplatz'),
(3, 'Sonstiges');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `firma`
--

CREATE TABLE `firma` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `firma`
--

INSERT INTO `firma` (`id`, `name`, `nr`) VALUES
(1, 'Firma 1', '1111'),
(2, 'Firma 2', '2222'),
(3, 'Firma 5', '5555');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `haus`
--

CREATE TABLE `haus` (
  `id` int(10) UNSIGNED NOT NULL,
  `projekt_id` int(10) UNSIGNED NOT NULL,
  `plz` varchar(255) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL,
  `strasse` varchar(255) DEFAULT NULL,
  `hausnr` varchar(45) DEFAULT NULL,
  `reserviert` tinyint(1) DEFAULT '0',
  `verkauft` tinyint(1) DEFAULT '0',
  `rechnung_vertrieb` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `haus`
--

INSERT INTO `haus` (`id`, `projekt_id`, `plz`, `ort`, `strasse`, `hausnr`, `reserviert`, `verkauft`, `rechnung_vertrieb`) VALUES
(1, 2, '611611', 'Musterstadt', 'Musterstr.', '21', 0, 0, 0),
(2, 1, '989898', 'Frankfurt', 'blabla', '98', 0, 0, 0),
(3, 1, '16161', 'Darmstadt', 'asdasd', '888', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kaeufer`
--

CREATE TABLE `kaeufer` (
  `id` int(10) UNSIGNED NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kaeufer`
--

INSERT INTO `kaeufer` (`id`, `debitor_nr`, `beurkundung_am`, `verbindliche_fertigstellung`, `uebergang_bnl`, `abnahme_se`, `abnahme_ge`, `auflassung`, `anrede`, `titel`, `vorname`, `nachname`, `strasse`, `hausnr`, `plz`, `ort`, `festnetz`, `handy`, `email`, `anrede2`, `titel2`, `vorname2`, `nachname2`) VALUES
(5, '', '2016-01-04', '2016-01-05', '2016-01-07', '2016-01-06', '2016-01-08', 1, 0, 'Dr.', 'Erdal', 'Mersinlioglu', 'Pupinweg ', '6', '1616616', 'Trabzon', NULL, NULL, NULL, 1, 'Dr.', 'Zeynep', 'Mersinlioglu'),
(6, '', '2020-02-06', NULL, NULL, NULL, NULL, 0, 0, 'nnnn', '', '', '', '', '', '', NULL, NULL, NULL, 0, '', '', ''),
(7, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 'ananana', '', '', '', '', '', '', NULL, NULL, NULL, 0, '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachlass`
--

CREATE TABLE `nachlass` (
  `id` int(10) UNSIGNED NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `schreiben_vom` date DEFAULT NULL,
  `betrag` double DEFAULT NULL,
  `bemerkung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachlass`
--

INSERT INTO `nachlass` (`id`, `datenblatt_id`, `schreiben_vom`, `betrag`, `bemerkung`) VALUES
(1, 1, '2016-01-11', 100, 'blablablablabla'),
(2, 2, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE `projekt` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `firma_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`id`, `name`, `firma_id`) VALUES
(1, 'Projekt 1', 1),
(2, 'Projekt 2', 2),
(3, 'Projekt 3', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sonderwunsch`
--

CREATE TABLE `sonderwunsch` (
  `id` int(10) UNSIGNED NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `angebot_datum` date DEFAULT NULL,
  `angebot_betrag` double DEFAULT NULL,
  `beauftragt_datum` date DEFAULT NULL,
  `beauftragt_betrag` double DEFAULT NULL,
  `rechnungsstellung_datum` date DEFAULT NULL,
  `rechnungsstellung_betrag` double DEFAULT NULL,
  `rechnungsstellung_rg_nr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `sonderwunsch`
--

INSERT INTO `sonderwunsch` (`id`, `datenblatt_id`, `name`, `angebot_datum`, `angebot_betrag`, `beauftragt_datum`, `beauftragt_betrag`, `rechnungsstellung_datum`, `rechnungsstellung_betrag`, `rechnungsstellung_rg_nr`) VALUES
(1, 3, 'Sond 1', '2016-11-14', 200, NULL, 100, NULL, 25, '112233'),
(2, 3, 's2', '2016-09-08', 450, NULL, 150, NULL, 89, 'g34'),
(17, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(18, 1, 'aaa', '2016-01-31', NULL, '2016-01-30', 1000, '2016-01-29', 2000, ''),
(19, 1, 'sss', '2016-01-13', NULL, '2016-01-14', NULL, '2016-01-15', 1000, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teileigentumseinheit`
--

CREATE TABLE `teileigentumseinheit` (
  `id` int(10) UNSIGNED NOT NULL,
  `haus_id` int(10) UNSIGNED NOT NULL,
  `einheitstyp_id` int(10) UNSIGNED NOT NULL,
  `te_nummer` varchar(255) DEFAULT NULL,
  `gefoerdert` tinyint(1) NOT NULL DEFAULT '0',
  `geschoss` varchar(45) DEFAULT NULL,
  `zimmer` varchar(45) DEFAULT NULL,
  `me_anteil` varchar(45) DEFAULT NULL,
  `wohnflaeche` varchar(45) DEFAULT NULL,
  `kaufpreis` float DEFAULT NULL,
  `kp_einheit` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `teileigentumseinheit`
--

INSERT INTO `teileigentumseinheit` (`id`, `haus_id`, `einheitstyp_id`, `te_nummer`, `gefoerdert`, `geschoss`, `zimmer`, `me_anteil`, `wohnflaeche`, `kaufpreis`, `kp_einheit`) VALUES
(3, 1, 1, '111', 0, '222', '333', '444', '555', 666, 7777),
(4, 1, 2, '345435', 0, '2342', '234', '23', '4234', 2342, 34234);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zaehlerstand`
--

CREATE TABLE `zaehlerstand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `stand` varchar(45) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `haus_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `zaehlerstand`
--

INSERT INTO `zaehlerstand` (`id`, `name`, `stand`, `datum`, `haus_id`) VALUES
(1, 'Wasser', '5600', '2016-01-30', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlung`
--

CREATE TABLE `zahlung` (
  `id` int(10) UNSIGNED NOT NULL,
  `datenblatt_id` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `betrag` float DEFAULT '0',
  `bemerkung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `zahlung`
--

INSERT INTO `zahlung` (`id`, `datenblatt_id`, `datum`, `betrag`, `bemerkung`) VALUES
(1, 1, '2016-01-20', 111, 'aaa'),
(2, 1, '2016-01-24', 222, 'sss'),
(3, 2, '0000-00-00', 11, NULL),
(4, 2, '0000-00-00', 22, NULL),
(5, 2, '0000-00-00', 33, NULL),
(6, 2, '0000-00-00', 44, NULL),
(9, 1, '2016-01-29', 3333, 'ddd'),
(11, 3, '0000-00-00', 9, NULL),
(12, 3, '0000-00-00', 8, NULL),
(14, 3, '0000-00-00', 855, NULL),
(15, 3, '0000-00-00', 955, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abschlag`
--
ALTER TABLE `abschlag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_abschlag_datenblatt1_idx` (`datenblatt_id`);

--
-- Indizes für die Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_datenblatt_haus_idx` (`haus_id`),
  ADD KEY `fk_datenblatt_firma1_idx` (`firma_id`),
  ADD KEY `fk_datenblatt_projekt1_idx` (`projekt_id`),
  ADD KEY `fk_datenblatt_kaeufer1_idx` (`kaeufer_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_haus_projekt1_idx` (`projekt_id`);

--
-- Indizes für die Tabelle `kaeufer`
--
ALTER TABLE `kaeufer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `nachlass`
--
ALTER TABLE `nachlass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nachlass_datenblatt1_idx` (`datenblatt_id`);

--
-- Indizes für die Tabelle `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projekt_firma1_idx` (`firma_id`);

--
-- Indizes für die Tabelle `sonderwunsch`
--
ALTER TABLE `sonderwunsch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sonderwunch_datenblatt1_idx` (`datenblatt_id`);

--
-- Indizes für die Tabelle `teileigentumseinheit`
--
ALTER TABLE `teileigentumseinheit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teileigentumseinheit_haus1_idx` (`haus_id`),
  ADD KEY `fk_teileigentumseinheit_einheitstyp1_idx` (`einheitstyp_id`);

--
-- Indizes für die Tabelle `zaehlerstand`
--
ALTER TABLE `zaehlerstand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zaehlerstand_haus1_idx` (`haus_id`);

--
-- Indizes für die Tabelle `zahlung`
--
ALTER TABLE `zahlung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zahlung_datenblatt1_idx` (`datenblatt_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abschlag`
--
ALTER TABLE `abschlag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `datenblatt`
--
ALTER TABLE `datenblatt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `einheitstyp`
--
ALTER TABLE `einheitstyp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `firma`
--
ALTER TABLE `firma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `haus`
--
ALTER TABLE `haus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `kaeufer`
--
ALTER TABLE `kaeufer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `nachlass`
--
ALTER TABLE `nachlass`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `projekt`
--
ALTER TABLE `projekt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `sonderwunsch`
--
ALTER TABLE `sonderwunsch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT für Tabelle `teileigentumseinheit`
--
ALTER TABLE `teileigentumseinheit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `zaehlerstand`
--
ALTER TABLE `zaehlerstand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `zahlung`
--
ALTER TABLE `zahlung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
