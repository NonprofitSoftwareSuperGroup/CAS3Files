-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2014 at 10:25 PM
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
-- Table structure for table `answerkeys`
--

CREATE TABLE IF NOT EXISTS `answerkeys` (
  `answerkeyarray` varchar(1000) NOT NULL,
  `course` varchar(15) NOT NULL,
  `section` int(2) NOT NULL,
  `exam` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerkeys`
--

INSERT INTO `answerkeys` (`answerkeyarray`, `course`, `section`, `exam`) VALUES
('a:1:{i:1;a:5:{i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}}', 'CMPT-280', 1, 'entry');

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
('user1', 'pastword');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(10000) NOT NULL,
  `course` varchar(10) NOT NULL,
  `section` int(10) NOT NULL,
  `exam` text NOT NULL,
  `prof` text NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`index`, `question`, `course`, `section`, `exam`, `prof`) VALUES
(35, 'O:8:"Question":10:{s:7:"answer1";s:7:"sdfgfdg";s:7:"answer2";s:5:"dfdff";s:7:"answer3";s:4:"gggg";s:7:"answer4";s:5:"hhhhh";s:7:"answer5";s:9:"ggggggggg";s:8:"question";s:3:"qqq";s:14:"correctAnswers";a:1:{i:0;s:3:"1.5";}s:17:"numCorrectAnswers";i:1;s:10:"numAnswers";i:5;s:11:"questionNum";i:1;}', 'CMPT-372', 1, 'entry', 'ben'),
(36, 'O:8:"Question":10:{s:7:"answer1";s:5:"ggggg";s:7:"answer2";s:5:"hhhhh";s:7:"answer3";s:3:"jjj";s:7:"answer4";s:9:"jjtytjtyj";s:7:"answer5";s:8:"dfghdfgh";s:8:"question";s:4:"dddd";s:14:"correctAnswers";a:1:{i:0;s:3:"1.4";}s:17:"numCorrectAnswers";i:1;s:10:"numAnswers";i:5;s:11:"questionNum";i:1;}', 'CMPT-280', 1, 'entry', 'ben'),
(37, 'O:8:"Question":10:{s:7:"answer1";s:5:"ggggg";s:7:"answer2";s:5:"hhhhh";s:7:"answer3";s:3:"jjj";s:7:"answer4";s:9:"jjtytjtyj";s:7:"answer5";s:8:"dfghdfgh";s:8:"question";s:4:"dddd";s:14:"correctAnswers";a:1:{i:0;s:3:"1.4";}s:17:"numCorrectAnswers";i:1;s:10:"numAnswers";i:5;s:11:"questionNum";i:1;}', 'CMPT-280', 1, 'entry', 'ben'),
(38, 'O:8:"Question":10:{s:7:"answer1";s:5:"ggggg";s:7:"answer2";s:5:"hhhhh";s:7:"answer3";s:3:"jjj";s:7:"answer4";s:9:"jjtytjtyj";s:7:"answer5";s:8:"dfghdfgh";s:8:"question";s:4:"dddd";s:14:"correctAnswers";a:1:{i:0;s:3:"1.4";}s:17:"numCorrectAnswers";i:1;s:10:"numAnswers";i:5;s:11:"questionNum";i:1;}', 'CMPT-280', 1, 'entry', 'ben'),
(39, 'O:8:"Question":10:{s:7:"answer1";s:7:"sdfgfds";s:7:"answer2";s:4:"gggg";s:7:"answer3";s:3:"ddd";s:7:"answer4";s:3:"sss";s:7:"answer5";s:4:"aaaa";s:8:"question";s:4:"sdfd";s:14:"correctAnswers";a:1:{i:0;s:3:"1.5";}s:17:"numCorrectAnswers";i:1;s:10:"numAnswers";i:5;s:11:"questionNum";i:1;}', 'CMPT-281', 1, 'entry', 'ben');

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
  `exam` text NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`index`, `email`, `otk`, `course`, `Section`, `exam`) VALUES
(24, 'kellerp2@mail.montclair.edu', '8448', 'CMPT-280', 3, 'exit'),
(25, 'kellerp2@mail.montclair.edu', '1907', 'CMPT-280', 2, 'entry'),
(26, 'kellerp2@mail.montclair.edu', '7679', 'CMPT-280', 2, 'exit'),
(27, 'kellerp2@mail.montclair.edu', '1626', 'CMPT-371', 3, 'entry'),
(28, 'kellerp2@mail.montclair.edu', '9568', 'CMPT-371', 3, 'exit'),
(29, 'kellerp2@mail.montclair.edu', '8405', 'CMPT-280', 1, 'entry'),
(30, 'kellerp2@mail.montclair.edu', '8278', 'CMPT-372', 1, 'entry'),
(31, 'kellerp2@mail.montclair.edu', '9678', 'CMPT-280', 1, 'entry'),
(32, 'kellerp2@mail.montclair.edu', '9587', 'CMPT-280', 1, 'entry'),
(33, 'kellerp2@mail.montclair.edu', '5378', 'CMPT-372', 1, 'entry'),
(34, 'kellerp2@mail.montclair.edu', '5766', 'CMPT-280', 1, 'entry'),
(35, 'kellerp2@mail.montclair.edu', '2774', 'CMPT-281', 1, 'entry');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
