-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 01:04 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siclab`
--

-- --------------------------------------------------------

--
-- Table structure for table `msrf`
--

CREATE TABLE IF NOT EXISTS `msrf` (
  `id` varchar(30) NOT NULL,
  `scode` varchar(30) NOT NULL,
  `rgroup` varchar(30) NOT NULL,
  `hazard` varchar(200) NOT NULL,
  `mweight` double NOT NULL,
  `mformula` varchar(30) NOT NULL,
  `HRMS` enum('0','1') NOT NULL,
  `ESI_MS` enum('0','1') NOT NULL,
  `CH3CN` enum('0','1') NOT NULL,
  `MeOH` enum('0','1') NOT NULL,
  `CHCl3` enum('0','1') NOT NULL,
  `IPA` enum('0','1') NOT NULL,
  `H20` enum('0','1') NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msrf`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
