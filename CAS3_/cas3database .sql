-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2014 at 09:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cas3database`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseotkmatch`
--

CREATE TABLE IF NOT EXISTS `courseotkmatch` (
  `course` text COLLATE utf8_unicode_ci NOT NULL,
  `otk` text COLLATE utf8_unicode_ci,
  `otk2` text COLLATE utf8_unicode_ci,
  `otk3` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Used to check if OTK matches course';

--
-- Dumping data for table `courseotkmatch`
--

INSERT INTO `courseotkmatch` (`course`, `otk`, `otk2`, `otk3`) VALUES
('CMPT-280', 'ABC', 'otk2', NULL),
('CMPT-281', 'password', NULL, NULL),
('CMPT-371', 'ABC', NULL, NULL),
('CMPT-372', 'new', 'abc', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`username`, `password`) VALUES
('ben', 'pass'),
('user1', 'go');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
