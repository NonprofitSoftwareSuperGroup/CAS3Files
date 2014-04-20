-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2014 at 05:47 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cas3database`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseotkmatch`
--

CREATE TABLE `courseotkmatch` (
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
('CMPT-372', 'new', 'abc', 'text'),
('CMPT-280', 'ABC', 'otk2', NULL),
('CMPT-281', 'password', NULL, NULL),
('CMPT-371', 'ABC', NULL, NULL),
('CMPT-372', 'new', 'abc', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
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

CREATE TABLE `students` (
  `index` double NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `otk` varchar(30) NOT NULL,
  `used` varchar(5) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`index`, `email`, `otk`, `used`) VALUES
(15, 'mike@aol.com', '9175', 'NO'),
(16, 'matt@aol.com', '7315', 'NO'),
(17, 'joe@aol.com', '3281', 'NO'),
(18, 'peter@aol.com', '3816', 'NO'),
(19, 'sam@aol.com', '5640', 'NO');
