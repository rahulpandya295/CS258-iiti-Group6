-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 01:20 PM
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
-- Table structure for table `scxr`
--

CREATE TABLE IF NOT EXISTS `scxr` (
  `id` varchar(30) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `mpoint` double NOT NULL,
  `info` varchar(200) NOT NULL,
  `sic_code` varchar(30) NOT NULL,
  `Stable` enum('0','1') NOT NULL,
  `AirSensitive` enum('0','1') NOT NULL,
  `MoistureSensitive` enum('0','1') NOT NULL,
  `IR` enum('0','1') NOT NULL,
  `NMR` enum('0','1') NOT NULL,
  `MassSpectrum` enum('0','1') NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scxr`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
