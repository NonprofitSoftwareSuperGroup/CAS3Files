-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2014 at 01:38 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cas3database`
--
CREATE DATABASE IF NOT EXISTS `cas3database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cas3database`;

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
('user1', 'go'),
('ben', 'pass'),
('user1', 'go'),
('ben', 'pass'),
('user1', 'go');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(10000) NOT NULL,
  `course` varchar(10) NOT NULL,
  `section` int(10) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`index`, `question`, `course`, `section`) VALUES
(1, 'O:8:"Question":7:{s:7:"answer1";s:1:"A";s:7:"answer2";s:1:"B";s:7:"answer3";s:1:"C";s:7:"answer4";s:1:"D";s:8:"question";s:8:"Question";s:14:"correctAnswers";a:1:{i:0;s:3:"1.2";}s:17:"numCorrectAnswers";i:1;}', 'CMPT-280', 1),
(2, 'O:8:"Question":7:{s:7:"answer1";s:2:"a1";s:7:"answer2";s:2:"b1";s:7:"answer3";s:2:"c2";s:7:"answer4";s:2:"d3";s:8:"question";s:10:"Question 2";s:14:"correctAnswers";a:2:{i:0;s:3:"1.3";i:1;s:3:"1.4";}s:17:"numCorrectAnswers";i:2;}', 'CMPT-280', 3),
(3, 'O:8:"Question":7:{s:7:"answer1";s:12:"who the fuck";s:7:"answer2";s:14:"where the fuck";s:7:"answer3";s:12:"why the fuck";s:7:"answer4";s:13:"fuck the fuck";s:8:"question";s:5:"Fuck?";s:14:"correctAnswers";a:4:{i:0;s:3:"1.1";i:1;s:3:"1.2";i:2;s:3:"1.3";i:3;s:3:"1.4";}s:17:"numCorrectAnswers";i:4;}', 'CMPT-371', 4),
(4, 'O:8:"Question":7:{s:7:"answer1";s:7:"keanen ";s:7:"answer2";s:4:"kell";s:7:"answer3";s:4:"matt";s:7:"answer4";s:10:"some nigga";s:8:"question";s:22:"Who loves orange soda?";s:14:"correctAnswers";a:1:{i:0;s:3:"2.1";}s:17:"numCorrectAnswers";i:1;}', 'CMPT-371', 4),
(5, 'O:8:"Question":7:{s:7:"answer1";s:3:"gay";s:7:"answer2";s:5:"alien";s:7:"answer3";s:4:"fast";s:7:"answer4";s:6:"jewish";s:8:"question";s:10:"Benham is?";s:14:"correctAnswers";a:3:{i:0;s:3:"3.1";i:1;s:3:"3.2";i:2;s:3:"3.4";}s:17:"numCorrectAnswers";i:3;}', 'CMPT-371', 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `index` double NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `otk` varchar(30) NOT NULL,
  `course` text NOT NULL,
  `Section` int(10) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`index`, `email`, `otk`, `course`, `Section`) VALUES
(15, 'mike@aol.com', '9175', 'CMPT-280', 2),
(16, 'matt@aol.com', '7315', 'CMPT-281', 4),
(17, 'joe@aol.com', '3281', 'CMPT-280', 2),
(18, 'peter@aol.com', '3816', 'CMPT-371', 2),
(19, 'sam@aol.com', '5640', 'CMPT-372', 1),
(20, 'iridebmxnj@aol.com', '1395', '', 0),
(21, '44@fuckmail.IhateMSU.com', '5506', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Table structure for table `graded_assessments`
--

CREATE TABLE IF NOT EXISTS `graded_assessments` (
  `Course` text NOT NULL,
  `Section` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  `index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graded_assessments`
--

INSERT INTO `graded_assessments` (`Course`, `Section`, `Grade`, `index`) VALUES
('CMPT 280', 1, 90, 0),
('CMPT 280', 1, 80, 1),
('CMPT 280', 1, 99, 2),
('CMPT 280', 1, 76, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;