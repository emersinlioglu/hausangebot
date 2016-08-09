ALTER TABLE `projekt` 
	DROP COLUMN `role`;

ALTER TABLE `projekt`
	ADD COLUMN `creator_user_id` INT(10) UNSIGNED NOT NULL AFTER `firma_id`;

UPDATE `projekt` SET `creator_user_id`=1 WHERE 1;

ALTER TABLE `datenblatt`
	ADD COLUMN `creator_user_id` INT UNSIGNED NOT NULL AFTER `auflassung`;

UPDATE `datenblatt` SET `creator_user_id`=1 WHERE 1;

ALTER TABLE `haus`
	ADD COLUMN `creator_user_id` INT UNSIGNED NOT NULL AFTER `rechnung_vertrieb`;

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
-- Erstellungszeit: 09. Aug 2016 um 01:32
-- Server-Version: 10.1.8-MariaDB
-- PHP-Version: 5.5.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('betreuung_mitarbeiter', '6', 1470084713),
('buchhaltung_leitung', '5', 1470084655),
('buchhaltung_mitarbeiter', '11', 1470696742),
('buchhaltung_mitarbeiter', '4', 1470084671),
('rechtsabteilung_leitung', '7', 1470084751),
('rechtsabteilung_mitarbeiter', '8', 1470084837),
('vertrieb_abg', '9', 1470084883),
('vertrieb_extern', '10', 1470084967);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  KEY `fk_auth_item_group_code` (`group_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`) VALUES
('/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//controller', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//crud', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//extension', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//form', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//model', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('//module', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/abschlag/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/abschlag/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/abschlag/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/abschlag/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/abschlag/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/abschlag/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/asset/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/asset/compress', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/asset/template', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/default/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/default/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/rbac/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/rbac/create', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/rbac/delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/rbac/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/rbac/update', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/auth/rbac/view', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/cache/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/cache/flush', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/cache/flush-all', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/cache/flush-schema', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/cache/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/datecontrol/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datecontrol/parse/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datecontrol/parse/convert', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/addabschlag', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/addnachlass', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/addsonderwunsch', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/addzahlung', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/autocompletekunden', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/deleteabschlag', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/deletenachlass', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/deletesonderwunsch', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/deletezahlung', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/pdf', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/report', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/subcat', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/datenblatt/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/debug/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/debug/default/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/debug/default/db-explain', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/debug/default/download-mail', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/debug/default/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/debug/default/toolbar', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/debug/default/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/einheitstyp/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/einheitstyp/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/einheitstyp/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/einheitstyp/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/einheitstyp/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/einheitstyp/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/error/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/error/error-handler', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/filter/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/filter/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/filter/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/filter/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/filter/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/filter/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/firma/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/firma/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/firma/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/firma/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/firma/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/firma/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/fixture/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/fixture/load', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/fixture/unload', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gii/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gii/default/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gii/default/action', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gii/default/diff', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gii/default/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gii/default/preview', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gii/default/view', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/gridview/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/gridview/export/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/gridview/export/download', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/addteileigentumseinheit', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/addzaehlerstand', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/deleteteileigentumseinheit', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/deletezaehlerstand', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/projekte', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/haus/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/hausfilter/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/hausfilter/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/hausfilter/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/hausfilter/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/hausfilter/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/hausfilter/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/hello/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/hello/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/help/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/help/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/kaeufer/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kaeufer/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kaeufer/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kaeufer/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kaeufer/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kaeufer/updatedates', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kaeufer/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kunde/*', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kunde/create', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kunde/delete', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kunde/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kunde/update', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/kunde/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/message/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/message/config', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/message/extract', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/create', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/down', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/history', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/mark', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/new', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/redo', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/to', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/migrate/up', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/nachlass/*', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/nachlass/create', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/nachlass/delete', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/nachlass/index', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/nachlass/update', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/nachlass/view', 3, NULL, NULL, NULL, 1467418877, 1467418877, NULL),
('/projekt/*', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/projekt/create', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/projekt/delete', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/projekt/index', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/projekt/update', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/projekt/view', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/*', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/about', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/captcha', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/contact', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/error', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/index', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/login', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/site/logout', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/teileigentumseinheit/*', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/teileigentumseinheit/create', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/teileigentumseinheit/delete', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/teileigentumseinheit/index', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/teileigentumseinheit/update', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/teileigentumseinheit/view', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/user-management/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/bulk-activate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/bulk-deactivate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/bulk-delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/create', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/grid-page-size', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/grid-sort', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/toggle-attribute', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/update', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth-item-group/view', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/captcha', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/change-own-password', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/confirm-email', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/confirm-email-receive', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/confirm-registration-email', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/login', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/logout', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/password-recovery', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/password-recovery-receive', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/auth/registration', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/bulk-activate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/bulk-deactivate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/bulk-delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/create', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/grid-page-size', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/grid-sort', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/refresh-routes', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/set-child-permissions', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/set-child-routes', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/toggle-attribute', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/update', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/permission/view', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/bulk-activate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/bulk-deactivate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/bulk-delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/create', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/grid-page-size', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/grid-sort', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/set-child-permissions', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/set-child-roles', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/toggle-attribute', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/update', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/role/view', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-permission/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-permission/set', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-permission/set-roles', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/bulk-activate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/bulk-deactivate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/bulk-delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/create', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/grid-page-size', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/grid-sort', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/toggle-attribute', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/update', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user-visit-log/view', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/*', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/bulk-activate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/bulk-deactivate', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/bulk-delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/change-password', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/create', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/delete', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/grid-page-size', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/grid-sort', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/index', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/toggle-attribute', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/update', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/user-management/user/view', 3, NULL, NULL, NULL, 1467393899, 1467393899, NULL),
('/zahlung/*', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/zahlung/create', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/zahlung/delete', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/zahlung/index', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/zahlung/update', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('/zahlung/view', 3, NULL, NULL, NULL, 1467418876, 1467418876, NULL),
('Admin', 1, 'Admin', NULL, NULL, 1467393899, 1467393899, NULL),
('assignRolesToUsers', 2, 'Assign roles to users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('betreuung_mitarbeiter', 1, 'Betreuung Mitarbeiter', NULL, NULL, 1470084205, 1470085064, NULL),
('bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('buchhaltung_leitung', 1, 'Buchhaltung Leitung', NULL, NULL, 1467396689, 1470084175, NULL),
('buchhaltung_mitarbeiter', 1, 'Buchhaltung Mitarbeiter', NULL, NULL, 1467398743, 1470084119, NULL),
('changeOwnPassword', 2, 'Change own password', NULL, NULL, 1467393899, 1467393899, 'userCommonPermissions'),
('changeUserPassword', 2, 'Change user password', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('commonPermission', 2, 'Common permission', NULL, NULL, 1467393898, 1467393898, NULL),
('createUsers', 2, 'Create users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('deleteUsers', 2, 'Delete users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('editUserEmail', 2, 'Edit user email', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('editUsers', 2, 'Edit users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('export', 2, 'Export/Serienbrief', NULL, NULL, 1470162749, 1470162749, 'userCommonPermissions'),
('facility_management', 1, 'Facility Management', NULL, NULL, 1470084310, 1470085039, NULL),
('read_company', 2, 'Lesen: Firmen', NULL, NULL, 1470164373, 1470164373, 'userCommonPermissions'),
('read_countinformation', 2, 'Lesen: Zählerstand Angaben', NULL, NULL, 1470163171, 1470164186, 'userCommonPermissions'),
('read_customer', 2, 'Lesen: Käufer', NULL, NULL, 1470163048, 1470164266, 'userCommonPermissions'),
('read_datasheets', 2, 'Lesen: Datenblätter', NULL, NULL, 1470163004, 1470164283, 'userCommonPermissions'),
('read_ownership', 2, 'Lesen: Teileigentumseinheiten', NULL, NULL, 1470163106, 1470164242, 'userCommonPermissions'),
('read_projects', 2, 'Lesen: Projekte', NULL, NULL, 1470163270, 1470164162, 'userCommonPermissions'),
('rechtsabteilung_leitung', 1, 'Rechtsabteilung Leitung', NULL, NULL, 1470084255, 1470084255, NULL),
('rechtsabteilung_mitarbeiter', 1, 'Rechtsabteilung Mitarbeiter', NULL, NULL, 1470084784, 1470084784, NULL),
('report', 2, 'Berichte', NULL, NULL, 1470165215, 1470165215, 'userCommonPermissions'),
('settings', 2, 'Einstellungen', NULL, NULL, 1470162952, 1470162952, 'userCommonPermissions'),
('vertrieb_abg', 1, 'Vertrieb ABG', NULL, NULL, 1470084285, 1470084285, NULL),
('vertrieb_extern', 1, 'Vertrieb Extern', NULL, NULL, 1470084955, 1470084955, NULL),
('viewall', 2, 'Alles ansehen', NULL, NULL, 1467399139, 1467579678, 'userCommonPermissions'),
('viewRegistrationIp', 2, 'View registration IP', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewUserEmail', 2, 'View user email', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewUserRoles', 2, 'View user roles', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewUsers', 2, 'View users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewVisitLog', 2, 'View visit log', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('write_company', 2, 'Schreiben: Firmen', NULL, NULL, 1470164422, 1470164422, 'userCommonPermissions'),
('write_countinformation', 2, 'Schreiben:  Zählerstand Angaben', NULL, NULL, 1470164479, 1470164479, 'userCommonPermissions'),
('write_customer', 2, 'Schreiben: Käufer', NULL, NULL, 1470164591, 1470164591, 'userCommonPermissions'),
('write_datasheets', 2, 'Schreiben: Datenblätter', NULL, NULL, 1470164637, 1470164637, 'userCommonPermissions'),
('write_ownership', 2, 'Schreiben: Teileigentumseinheiten', NULL, NULL, 1470164532, 1470164532, 'userCommonPermissions'),
('write_projects', 2, 'Schreiben: Projekte', NULL, NULL, 1470164330, 1470164330, 'userCommonPermissions');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
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
('betreuung_mitarbeiter', 'changeOwnPassword'),
('betreuung_mitarbeiter', 'export'),
('betreuung_mitarbeiter', 'read_company'),
('betreuung_mitarbeiter', 'read_countinformation'),
('betreuung_mitarbeiter', 'read_customer'),
('betreuung_mitarbeiter', 'read_datasheets'),
('betreuung_mitarbeiter', 'read_ownership'),
('betreuung_mitarbeiter', 'read_projects'),
('betreuung_mitarbeiter', 'report'),
('betreuung_mitarbeiter', 'settings'),
('betreuung_mitarbeiter', 'viewall'),
('betreuung_mitarbeiter', 'write_company'),
('betreuung_mitarbeiter', 'write_countinformation'),
('betreuung_mitarbeiter', 'write_customer'),
('betreuung_mitarbeiter', 'write_datasheets'),
('betreuung_mitarbeiter', 'write_ownership'),
('betreuung_mitarbeiter', 'write_projects'),
('buchhaltung_leitung', 'changeOwnPassword'),
('buchhaltung_leitung', 'viewall'),
('buchhaltung_mitarbeiter', 'viewUsers'),
('buchhaltung_mitarbeiter', 'write_datasheets'),
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
('export', '/datenblatt/pdf'),
('export', '/datenblatt/report'),
('export', '/gridview/export/*'),
('export', '/gridview/export/download'),
('facility_management', 'viewall'),
('read_company', '/firma/index'),
('read_customer', '/kaeufer/index'),
('read_datasheets', '/datenblatt/index'),
('read_ownership', '/teileigentumseinheit/index'),
('read_projects', '/projekt/index'),
('rechtsabteilung_leitung', 'read_company'),
('rechtsabteilung_leitung', 'read_countinformation'),
('rechtsabteilung_leitung', 'read_customer'),
('rechtsabteilung_leitung', 'read_datasheets'),
('rechtsabteilung_leitung', 'read_ownership'),
('rechtsabteilung_leitung', 'read_projects'),
('rechtsabteilung_leitung', 'report'),
('rechtsabteilung_leitung', 'settings'),
('rechtsabteilung_leitung', 'viewall'),
('vertrieb_abg', 'viewall'),
('vertrieb_extern', 'read_company'),
('vertrieb_extern', 'read_countinformation'),
('vertrieb_extern', 'read_customer'),
('vertrieb_extern', 'read_datasheets'),
('vertrieb_extern', 'read_ownership'),
('vertrieb_extern', 'read_projects'),
('vertrieb_extern', 'report'),
('vertrieb_extern', 'viewall'),
('vertrieb_extern', 'write_customer'),
('viewall', '//index'),
('viewall', '/abschlag/index'),
('viewall', '/abschlag/view'),
('viewall', '/datenblatt/index'),
('viewall', '/datenblatt/pdf'),
('viewall', '/datenblatt/view'),
('viewall', '/einheitstyp/index'),
('viewall', '/einheitstyp/view'),
('viewall', '/firma/index'),
('viewall', '/firma/view'),
('viewall', '/haus/index'),
('viewall', '/haus/view'),
('viewall', '/kaeufer/index'),
('viewall', '/kaeufer/view'),
('viewall', '/kunde/index'),
('viewall', '/kunde/view'),
('viewall', '/nachlass/index'),
('viewall', '/nachlass/view'),
('viewall', '/projekt/index'),
('viewall', '/projekt/view'),
('viewall', '/site/*'),
('viewall', '/site/about'),
('viewall', '/site/captcha'),
('viewall', '/site/contact'),
('viewall', '/site/error'),
('viewall', '/site/index'),
('viewall', '/site/login'),
('viewall', '/site/logout'),
('viewall', '/teileigentumseinheit/index'),
('viewall', '/teileigentumseinheit/view'),
('viewall', '/user-management/auth/*'),
('viewall', '/zahlung/index'),
('viewall', '/zahlung/view'),
('viewall', 'viewUserEmail'),
('viewall', 'viewUserRoles'),
('viewUsers', '/projekt/*'),
('viewUsers', 'viewall'),
('viewVisitLog', '/user-management/user-visit-log/grid-page-size'),
('viewVisitLog', '/user-management/user-visit-log/index'),
('viewVisitLog', '/user-management/user-visit-log/view'),
('write_company', '/firma/*'),
('write_ownership', '/haus/*'),
('write_ownership', '/teileigentumseinheit/*'),
('write_projects', '/haus/projekte'),
('write_projects', '/projekt/*');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item_group`
--

DROP TABLE IF EXISTS `auth_item_group`;
CREATE TABLE IF NOT EXISTS `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
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

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `email_confirmed` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
(10, 'vetrieb_extern', 'TXU7GpXMCr5x0znwu25RVNCH9d-NZhNN', '$2y$13$8qXxuo5x5BguLKDK6PP1a.651W68UzB6MZ/dx7mPwF45GMNwBSnKG', NULL, 1, 0, 1470084924, 1470084924, '127.0.0.1', '', 'vetrieb_extern@gmail.com', 1),
(11, 'test', 'gISofiSrrf9IRNCQj-kGWHjsQ07gllWB', '$2y$13$ft6V.U8kl7Xi1U746YfxdOM54TOdukHAYziZyroyAz1.PKrC1r6hy', NULL, 1, 0, 1470696727, 1470696727, '127.0.0.1', '', 'test@test.com', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_visit_log`
--

DROP TABLE IF EXISTS `user_visit_log`;
CREATE TABLE IF NOT EXISTS `user_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` char(2) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  `browser` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
(26, '579fb8e64b909', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 9, 1470085350, 'Chrome', 'Windows'),
(27, '57a0dfe04fc76', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 2, 1470160864, 'Chrome', 'Windows'),
(28, '57a0dfee12ef9', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1, 1470160878, 'Chrome', 'Windows'),
(29, '57a0e4dc9f200', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 7, 1470162140, 'Firefox', 'Windows'),
(30, '57a1035c7d976', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 6, 1470169948, 'Firefox', 'Windows'),
(31, '57a90beea27e8', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 10, 1470696430, 'Firefox', 'Windows'),
(32, '57a90d55e1199', '127.0.0.1', 'de', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 11, 1470696789, 'Firefox', 'Windows');

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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
