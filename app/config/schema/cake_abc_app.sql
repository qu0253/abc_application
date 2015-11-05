-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2013 at 03:28 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake_abc_app`
--
CREATE DATABASE IF NOT EXISTS `cake_abc_app` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cake_abc_app`;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=177 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(162, 150, NULL, NULL, 'admin_get_role_controller_permission', 146, 147),
(161, 150, NULL, NULL, 'admin_deny_all_controllers', 144, 145),
(160, 150, NULL, NULL, 'admin_grant_all_controllers', 142, 143),
(159, 150, NULL, NULL, 'admin_clear_user_specific_permissions', 140, 141),
(158, 150, NULL, NULL, 'admin_empty_permissions', 138, 139),
(157, 150, NULL, NULL, 'admin_user_permissions', 136, 137),
(156, 150, NULL, NULL, 'admin_role_permissions', 134, 135),
(155, 150, NULL, NULL, 'admin_ajax_role_permissions', 132, 133),
(154, 150, NULL, NULL, 'admin_update_user_role', 130, 131),
(153, 150, NULL, NULL, 'admin_users', 128, 129),
(152, 150, NULL, NULL, 'admin_check', 126, 127),
(151, 150, NULL, NULL, 'admin_index', 124, 125),
(150, 144, NULL, NULL, 'Aros', 123, 160),
(149, 145, NULL, NULL, 'download', 120, 121),
(148, 145, NULL, NULL, 'admin_build_acl', 118, 119),
(147, 145, NULL, NULL, 'admin_empty_acos', 116, 117),
(146, 145, NULL, NULL, 'admin_index', 114, 115),
(145, 144, NULL, NULL, 'Acos', 113, 122),
(144, 96, NULL, NULL, 'Acl', 112, 161),
(143, 124, NULL, NULL, 'download', 101, 102),
(142, 124, NULL, NULL, 'logout', 99, 100),
(141, 124, NULL, NULL, 'login', 97, 98),
(140, 124, NULL, NULL, 'admin_deleteAll', 95, 96),
(139, 124, NULL, NULL, 'admin_actionAll', 93, 94),
(138, 124, NULL, NULL, 'admin_delete', 91, 92),
(137, 124, NULL, NULL, 'admin_copy', 89, 90),
(136, 124, NULL, NULL, 'admin_edit', 87, 88),
(135, 124, NULL, NULL, 'admin_add', 85, 86),
(134, 124, NULL, NULL, 'admin_view', 83, 84),
(133, 124, NULL, NULL, 'admin_index', 81, 82),
(132, 124, NULL, NULL, 'deleteAll', 79, 80),
(131, 124, NULL, NULL, 'actionAll', 77, 78),
(130, 124, NULL, NULL, 'delete', 75, 76),
(129, 124, NULL, NULL, 'copy', 73, 74),
(128, 124, NULL, NULL, 'edit', 71, 72),
(127, 124, NULL, NULL, 'add', 69, 70),
(126, 124, NULL, NULL, 'view', 67, 68),
(125, 124, NULL, NULL, 'index', 65, 66),
(124, 96, NULL, NULL, 'Users', 64, 111),
(123, 106, NULL, NULL, 'download', 53, 54),
(122, 106, NULL, NULL, 'admin_deleteAll', 51, 52),
(121, 106, NULL, NULL, 'admin_actionAll', 49, 50),
(120, 106, NULL, NULL, 'admin_delete', 47, 48),
(119, 106, NULL, NULL, 'admin_copy', 45, 46),
(118, 106, NULL, NULL, 'admin_edit', 43, 44),
(117, 106, NULL, NULL, 'admin_add', 41, 42),
(116, 106, NULL, NULL, 'admin_view', 39, 40),
(115, 106, NULL, NULL, 'admin_index', 37, 38),
(114, 106, NULL, NULL, 'deleteAll', 35, 36),
(113, 106, NULL, NULL, 'actionAll', 33, 34),
(112, 106, NULL, NULL, 'delete', 31, 32),
(111, 106, NULL, NULL, 'copy', 29, 30),
(110, 106, NULL, NULL, 'edit', 27, 28),
(109, 106, NULL, NULL, 'add', 25, 26),
(108, 106, NULL, NULL, 'view', 23, 24),
(107, 106, NULL, NULL, 'index', 21, 22),
(106, 96, NULL, NULL, 'Roles', 20, 63),
(105, 99, NULL, NULL, 'download', 17, 18),
(104, 99, NULL, NULL, 'ajaxGetContent', 15, 16),
(103, 99, NULL, NULL, 'auth_admin', 13, 14),
(102, 99, NULL, NULL, 'index', 11, 12),
(101, 99, NULL, NULL, 'display_session_message', 9, 10),
(100, 99, NULL, NULL, 'showpage', 7, 8),
(99, 96, NULL, NULL, 'DynamicPages', 6, 19),
(98, 97, NULL, NULL, 'download', 3, 4),
(97, 96, NULL, NULL, 'App', 2, 5),
(96, NULL, NULL, NULL, 'controllers', 1, 162),
(163, 150, NULL, NULL, 'admin_grant_role_permission', 148, 149),
(164, 150, NULL, NULL, 'admin_deny_role_permission', 150, 151),
(165, 150, NULL, NULL, 'admin_get_user_controller_permission', 152, 153),
(166, 150, NULL, NULL, 'admin_grant_user_permission', 154, 155),
(167, 150, NULL, NULL, 'admin_deny_user_permission', 156, 157),
(168, 150, NULL, NULL, 'download', 158, 159),
(169, 106, NULL, NULL, 'deactivateAll', 55, 56),
(170, 106, NULL, NULL, 'activateAll', 57, 58),
(171, 106, NULL, NULL, 'admin_deactivateAll', 59, 60),
(172, 106, NULL, NULL, 'admin_activateAll', 61, 62),
(173, 124, NULL, NULL, 'deactivateAll', 103, 104),
(174, 124, NULL, NULL, 'activateAll', 105, 106),
(175, 124, NULL, NULL, 'admin_deactivateAll', 107, 108),
(176, 124, NULL, NULL, 'admin_activateAll', 109, 110);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, 'administrators', 1, 4),
(2, 1, 'User', 1, 'amitgandhi23@gmail.com', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(2, 1, 96, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'administrators', '2011-07-19 14:49:44', '2011-07-19 14:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `status`, `created`, `modified`, `role_id`) VALUES
(1, 'amitgandhi23@gmail.com', 'Amit', 'Gandhi', '90bdce1f0868fbd17b497c72b8ffd48ee4852318', 1, '0000-00-00 00:00:00', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
