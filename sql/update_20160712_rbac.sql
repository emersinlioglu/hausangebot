alter table `projekt` 
    add column `role` VARCHAR(128) NOT NULL;

update `projekt` 
    set role = 'bghessen';

    -- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jul 2016 um 23:49
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

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('bghessen', '2', 1467398772),
('bnbayern', '3', 1467398815);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
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
('bghessen', 1, 'Benutzergruppe Hessen', NULL, NULL, 1467396689, 1467398650, NULL),
('bindUserToIp', 2, 'Bind user to IP', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('bnbayern', 1, 'Benutzergruppe Bayern', NULL, NULL, 1467398743, 1467398743, NULL),
('changeOwnPassword', 2, 'Change own password', NULL, NULL, 1467393899, 1467393899, 'userCommonPermissions'),
('changeUserPassword', 2, 'Change user password', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('commonPermission', 2, 'Common permission', NULL, NULL, 1467393898, 1467393898, NULL),
('createUsers', 2, 'Create users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('deleteUsers', 2, 'Delete users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('editUserEmail', 2, 'Edit user email', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('editUsers', 2, 'Edit users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewall', 2, 'Alles ansehen', NULL, NULL, 1467399139, 1467579678, 'userCommonPermissions'),
('viewRegistrationIp', 2, 'View registration IP', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewUserEmail', 2, 'View user email', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewUserRoles', 2, 'View user roles', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewUsers', 2, 'View users', NULL, NULL, 1467393899, 1467393899, 'userManagement'),
('viewVisitLog', 2, 'View visit log', NULL, NULL, 1467393899, 1467393899, 'userManagement');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
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
('bghessen', 'changeOwnPassword'),
('bghessen', 'viewall'),
('bnbayern', 'viewUsers'),
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

DROP TABLE IF EXISTS `auth_item_group`;
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

DROP TABLE IF EXISTS `auth_rule`;
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

DROP TABLE IF EXISTS `user`;
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
(3, 'halit', '4BWG-Ads2Kvb26Q78nBPBHA-gJRsoNsx', '$2y$13$2VXv2pdxTl6ENwy46CGBTu541z1RpvRxBzuGE/LSZQ1WkfE6z2Gfy', NULL, 1, 0, 1467398809, 1467398809, '127.0.0.1', '', 'halit.ciftci@gmail.com', 1);

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
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
