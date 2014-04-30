-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2014 at 09:33 PM
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
('user1', 'go'),
('ben', 'pass'),
('user1', 'go');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `index` double NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `otk` varchar(30) NOT NULL,
  `used` varchar(5) NOT NULL,
  `course` text NOT NULL,
  `section` int(11) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`index`, `email`, `otk`, `used`, `course`, `section`) VALUES
(15, 'mike@aol.com', '9175', 'NO', 'CMPT-280', 1),
(16, 'matt@aol.com', '7315', 'NO', 'CMPT-281', 2),
(17, 'joe@aol.com', '3281', 'NO', 'CMPT-280', 1),
(18, 'peter@aol.com', '3816', 'NO', 'CMPT-371', 1),
(19, 'sam@aol.com', '5640', 'NO', 'CMPT-372', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
