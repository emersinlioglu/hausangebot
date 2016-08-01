ALTER TABLE `projekt` 
	DROP COLUMN `role`;

ALTER TABLE `projekt`
	ADD COLUMN `creator_user_id` INT(10) UNSIGNED NOT NULL AFTER `firma_id`;

UPDATE `projekt` SET `creator_user_id`=1 WHERE 1;

ALTER TABLE `datenblatt`
	ADD COLUMN `creator_user_id` INT UNSIGNED NOT NULL AFTER `auflassung`;

UPDATE `datenblatt` SET `creator_user_id`=1 WHERE 1;

ALTER TABLE `haus`
	ADD COLUMN `creator_user_id` INT UNSIGNED NOT NULL AFTER `tenummer`;

UPDATE `haus` SET `creator_user_id`=1 WHERE 1;


CREATE TABLE `projekt_user` (
	`projekt_id` INT UNSIGNED NOT NULL,
	`user_id` INT UNSIGNED NOT NULL
)
	COMMENT='Project user assignments'
	COLLATE='utf8_general_ci'
	ENGINE=InnoDB;



-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Aug 2016 um 23:04
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
-- Tabellenstruktur für Tabelle `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('betreuung_mitarbeiter', '6', 1470084713),
('buchhaltung_leitung', '5', 1470084655),
('buchhaltung_mitarbeiter', '4', 1470084671),
('rechtsabteilung_leitung', '7', 1470084751),
('rechtsabteilung_mitarbeiter', '8', 1470084837),
('vertrieb_abg', '9', 1470084883),
('vertrieb_extern', '10', 1470084967);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'assignRolesToUsers'),
('Admin', 'changeOwnPassword'),
('Admin', 'changeUserPassword'),
('Admin', 'createUsers'),
('Admin', 'deleteUsers'),
('Admin', 'editUsers'),
('Admin', 'viewUsers'),
('assignRolesToUsers', '/user-management/user-permission/set'),
('assignRolesToUsers', '/user-management/user-permission/set-roles'),
('assignRolesToUsers', 'viewUserRoles'),
('assignRolesToUsers', 'viewUsers'),
('betreuung_mitarbeiter', 'viewall'),
('buchhaltung_leitung', 'changeOwnPassword'),
('buchhaltung_leitung', 'viewall'),
('buchhaltung_mitarbeiter', 'viewUsers'),
('changeOwnPassword', '/user-management/auth/change-own-password'),
('changeUserPassword', '/user-management/user/change-password'),
('changeUserPassword', 'viewUsers'),
('createUsers', '/user-management/user/create'),
('createUsers', 'viewUsers'),
('deleteUsers', '/user-management/user/bulk-delete'),
('deleteUsers', '/user-management/user/delete'),
('deleteUsers', 'viewUsers'),
('editUserEmail', 'viewUserEmail'),
('editUsers', '/user-management/user/bulk-activate'),
('editUsers', '/user-management/user/bulk-deactivate'),
('editUsers', '/user-management/user/update'),
('editUsers', 'viewUsers'),
('facility_management', 'viewall'),
('rechtsabteilung_leitung', 'viewall'),
('vertrieb_abg', 'viewall'),
('viewall', '//index'),
('viewall', '/abschlag/*'),
('viewall', '/datenblatt/*'),
('viewall', '/firma/*'),
('viewall', '/haus/*'),
('viewall', '/hausfilter/*'),
('viewall', '/kaeufer/*'),
('viewall', '/kunde/*'),
('viewall', '/nachlass/*'),
('viewall', '/projekt/*'),
('viewall', '/site/*'),
('viewall', '/teileigentumseinheit/*'),
('viewall', '/zahlung/*'),
('viewall', 'viewUserEmail'),
('viewall', 'viewUserRoles'),
('viewUsers', '/projekt/*'),
('viewUsers', 'viewall'),
('viewVisitLog', '/user-management/user-visit-log/grid-page-size'),
('viewVisitLog', '/user-management/user-visit-log/index'),
('viewVisitLog', '/user-management/user-visit-log/view');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item_group`
--

CREATE TABLE `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_item_group`
--

INSERT INTO `auth_item_group` (`code`, `name`, `created_at`, `updated_at`) VALUES
('userCommonPermissions', 'User common permission', 1467393899, 1467418368),
('userManagement', 'User management', 1467393899, 1467393899);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `superadmin` smallint(6) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(15) DEFAULT NULL,
  `bind_to_ip` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `confirmation_token`, `status`, `superadmin`, `created_at`, `updated_at`, `registration_ip`, `bind_to_ip`, `email`, `email_confirmed`) VALUES
(1, 'superadmin', 'Bc4mLXv91briehYdYqXzVoDPpBk7ToGh', '$2y$13$X3aFPTPABGeA9je9H6YSY.K/i1TECGXHE/An7HL5h4oF2EYsyRoyq', NULL, 1, 1, 1467393898, 1467393898, NULL, NULL, NULL, 0),
(2, 'erdal', 'Dus_ThXs9JZVNL1CkyRPKbPmqpgjhphC', '$2y$13$ZPXmqnf5H09kMQPO9P5PqeajzyNamx0EJ/JeOKsw5YICyftgXyJKa', NULL, 1, 0, 1467398588, 1467398588, '127.0.0.1', '', 'erdal.mersinlioglu@gmail.com', 1),
(3, 'halit', '4BWG-Ads2Kvb26Q78nBPBHA-gJRsoNsx', '$2y$13$2VXv2pdxTl6ENwy46CGBTu541z1RpvRxBzuGE/LSZQ1WkfE6z2Gfy', NULL, 1, 0, 1467398809, 1467398809, '127.0.0.1', '', 'halit.ciftci@gmail.com', 1),
(4, 'naglic', '1Rk4h1efzS5Kw30lkGGgiT7zl4axEXAt', '$2y$13$deDkh22NdMpBF1jWN41HteNyIyE6Bx3OBuERnwOddIeGAqrVLi1lO', NULL, 1, 0, 1470084565, 1470084565, '127.0.0.1', '', 'naglic@gmail.com', 1),
(5, 'biebel', 'NWa2AkOM3F3c7GGTnFfcOU_INbLCO3QT', '$2y$13$Xk/gsXfkfClFAbFTOjbFS.I9wQvSMbb/aZTwwrmwnvU1372Ifirci', NULL, 1, 0, 1470084597, 1470084611, '127.0.0.1', '', 'biebel@gmail.com', 1),
(6, 'schmautzer', '0ADpz2rSyV5CrM8w0WJVFjjVdST2u4Uq', '$2y$13$j9t3YcLZ6gl1ODN0qA05xexZi.NAaUfPxkLwSajCWxpH2ZXOnjfky', NULL, 1, 0, 1470084701, 1470084701, '127.0.0.1', '', 'schmautzer@gmail.com', 1),
(7, 'kresin', 't7lROCUOaedggY0k2GUxGLKh8zQ6dat9', '$2y$13$YyHHqiLuuKdxyvs9MiYIKejjfPbKzmhMmtPlRdguyR1/te.zSnZ2C', NULL, 1, 0, 1470084741, 1470084741, '127.0.0.1', '', 'kresin@gmail.com', 1),
(8, 'bollinger', 'QWHSgGiQWzpzHEXUBIhIbY1AT4EU1SEB', '$2y$13$JrjBgwr61P/BHtnyOU5nkey9NjB7nkabBM4RbfYp2wVCoLGu1tdDS', NULL, 1, 0, 1470084828, 1470084828, '127.0.0.1', '', 'bollinger@gmail.com', 1),
(9, 'oppermann', 'h-vYAfG4Hg33Ij37nRcf0YILbuAFxHSU', '$2y$13$a7HVdTyPpQl4jbGAHZk1YOrPaUv7BPKb52qjq5cVvT1pcTm/927GO', NULL, 1, 0, 1470084874, 1470084874, '127.0.0.1', '', 'oppermann@gmail.com', 1),
(10, 'vetrieb_extern', 'TXU7GpXMCr5x0znwu25RVNCH9d-NZhNN', '$2y$13$8qXxuo5x5BguLKDK6PP1a.651W68UzB6MZ/dx7mPwF45GMNwBSnKG', NULL, 1, 0, 1470084924, 1470084924, '127.0.0.1', '', 'vetrieb_extern@gmail.com', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_visit_log`
--

CREATE TABLE `user_visit_log` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` char(2) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user_visit_log`
--

INSERT INTO `user_visit_log` (`id`, `token`, `ip`, `language`, `user_agent`, `user_id`, `visit_time`, `browser`, `os`) VALUES
(1, '5776a9036349b', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1, 1467394307, 'Chrome', 'Windows'),
(2, '5776ab0bb830d', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1, 1467394827, 'Chrome', 'Windows'),
(3, '5776acb3aebae', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1, 1467395251, 'Chrome', 'Windows'),
(4, '5776af8dabfbf', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1, 1467395981, 'Chrome', 'Windows'),
(5, '5776bae3a0fe6', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 2, 1467398883, 'Firefox', 'Windows'),
(6, '57793ade7f7aa', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1, 1467562718, 'Chrome', 'Windows'),
(7, '5779492625e6c', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko', 3, 1467566374, 'Internet Explorer', 'Windows'),
(8, '577966ec263fa', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1, 1467573996, 'Chrome', 'Windows'),
(9, '57797b60128ec', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 2, 1467579232, 'Firefox', 'Windows'),
(10, '57797b7f0ce30', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0', 2, 1467579263, 'Firefox', 'Windows'),
(11, '578549e4c9975', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 2, 1468352996, 'Firefox', 'Windows'),
(12, '578549ed7b57e', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 3, 1468353005, 'Firefox', 'Windows'),
(13, '57854a21d994a', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 2, 1468353057, 'Firefox', 'Windows'),
(14, '57854acbaae12', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 3, 1468353227, 'Firefox', 'Windows'),
(15, '57854ad64017e', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 2, 1468353238, 'Firefox', 'Windows'),
(16, '5785525a14283', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 3, 1468355162, 'Firefox', 'Windows'),
(17, '578554a9d1d12', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 2, 1468355753, 'Firefox', 'Windows'),
(18, '578554b4612bd', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 3, 1468355764, 'Firefox', 'Windows'),
(19, '578bd391a492a', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1, 1468781457, 'Chrome', 'Windows'),
(20, '5793d41eb76a1', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1, 1469305886, 'Chrome', 'Windows'),
(21, '579c7ae5695cd', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1, 1469872869, 'Chrome', 'Windows'),
(22, '579ca32249cdd', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 2, 1469883170, 'Chrome', 'Windows'),
(23, '579ca701c879a', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1, 1469884161, 'Firefox', 'Windows'),
(24, '579caa690064b', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 3, 1469885033, 'Firefox', 'Windows'),
(25, '579fb3f05392a', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1, 1470084080, 'Firefox', 'Windows'),
(26, '579fb8e64b909', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 9, 1470085350, 'Chrome', 'Windows');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indizes für die Tabelle `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`),
  ADD KEY `fk_auth_item_group_code` (`group_code`);

--
-- Indizes für die Tabelle `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indizes für die Tabelle `auth_item_group`
--
ALTER TABLE `auth_item_group`
  ADD PRIMARY KEY (`code`);

--
-- Indizes für die Tabelle `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `user_visit_log`
--
ALTER TABLE `user_visit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_auth_item_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `user_visit_log`
--
ALTER TABLE `user_visit_log`
  ADD CONSTRAINT `user_visit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
