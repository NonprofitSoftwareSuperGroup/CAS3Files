-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cas3database
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answerkeys`
--

DROP TABLE IF EXISTS `answerkeys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answerkeys` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `answerKeyArray` text NOT NULL,
  `course` text NOT NULL,
  `section` int(11) NOT NULL,
  `exam` text,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answerkeys`
--

LOCK TABLES `answerkeys` WRITE;
/*!40000 ALTER TABLE `answerkeys` DISABLE KEYS */;
INSERT INTO `answerkeys` VALUES (4,'a:1:{i:1;a:5:{i:1;i:0;i:2;i:1;i:3;i:1;i:4;i:0;i:5;i:0;}}','CMPT-280',1,'entry'),(5,'a:1:{i:1;a:5:{i:1;i:1;i:2;i:0;i:3;i:1;i:4;i:0;i:5;i:0;}}','CMPT-372',1,'entry');
/*!40000 ALTER TABLE `answerkeys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `graded_assessments`
--

DROP TABLE IF EXISTS `graded_assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `graded_assessments` (
  `Course` text NOT NULL,
  `Section` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  `index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `graded_assessments`
--

LOCK TABLES `graded_assessments` WRITE;
/*!40000 ALTER TABLE `graded_assessments` DISABLE KEYS */;
INSERT INTO `graded_assessments` VALUES ('CMPT 280',1,90,0),('CMPT 280',1,80,1),('CMPT 280',1,99,2),('CMPT 280',1,76,3),('CMPT 280',1,50,4),('CMPT 280',1,83,5),('CMPT 280',1,83,5),('CMPT-280',1,25,0),('CMPT-280',1,25,0),('CMPT-280',1,75,0),('CMPT-280',1,100,0),('CMPT-280',1,100,0),('CMPT-280',1,100,0),('CMPT-280',1,100,0),('CMPT-280',1,100,0),('CMPT-280',1,100,0),('CMPT-280',2,100,0),('CMPT-280',1,100,0),('CMPT-280',1,100,0),('CMPT-372',1,100,0),('CMPT-280',1,100,0);
/*!40000 ALTER TABLE `graded_assessments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `index` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index_2` (`index`),
  KEY `index` (`index`),
  KEY `index_3` (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES ('admin','adminPass',1,1),('user1','pass',0,2),('user2','1234',0,3);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(10000) NOT NULL,
  `course` varchar(10) NOT NULL,
  `section` int(10) NOT NULL,
  `exam` text NOT NULL,
  `prof` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (165,'O:8:\"Question\":10:{s:7:\"answer1\";s:10:\"sdfgsdfgsd\";s:7:\"answer2\";s:12:\"sdfgsdfgsdfg\";s:7:\"answer3\";s:10:\"sfdgsdfgsd\";s:7:\"answer4\";s:7:\"gfgsdfg\";s:7:\"answer5\";s:4:\"sdgf\";s:8:\"question\";s:3:\"sfg\";s:14:\"correctAnswers\";a:2:{i:0;s:3:\"1.2\";i:1;s:3:\"1.3\";}s:17:\"numCorrectAnswers\";i:2;s:10:\"numAnswers\";i:5;s:11:\"questionNum\";i:1;}','CMPT-280',1,'entry',''),(166,'O:8:\"Question\":10:{s:7:\"answer1\";s:7:\"asddddd\";s:7:\"answer2\";s:8:\"asdfasdf\";s:7:\"answer3\";s:4:\"dddd\";s:7:\"answer4\";s:13:\"asdfasdf safd\";s:7:\"answer5\";s:14:\"asdfs asdfasdf\";s:8:\"question\";s:6:\"asdfas\";s:14:\"correctAnswers\";a:2:{i:0;s:3:\"1.1\";i:1;s:3:\"1.3\";}s:17:\"numCorrectAnswers\";i:2;s:10:\"numAnswers\";i:5;s:11:\"questionNum\";i:1;}','CMPT-372',1,'entry','');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `index` double NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `otk` varchar(30) NOT NULL,
  `used` varchar(5) NOT NULL,
  `course` text NOT NULL,
  `Section` int(10) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (3,'pkeller@gmail.com','2810','no','CMPT-281',1),(301,'jpietrzak@gmail.com','3710','no','CMPT-371',1),(302,'sdfgsdg@sfgsg.com','4777','NO','CMPT-280',1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-26 17:14:38
