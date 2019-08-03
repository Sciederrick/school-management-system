-- MySQL dump 10.16  Distrib 10.1.40-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: school_venue_management_system
-- ------------------------------------------------------
-- Server version	10.1.40-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `classrep`
--

DROP TABLE IF EXISTS `classrep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classrep` (
  `reg_no` varchar(15) NOT NULL,
  `cohort` varchar(30) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `active` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`cohort`),
  UNIQUE KEY `cohort` (`cohort`),
  UNIQUE KEY `cohort_2` (`cohort`),
  UNIQUE KEY `reg_no` (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classrep`
--

LOCK TABLES `classrep` WRITE;
/*!40000 ALTER TABLE `classrep` DISABLE KEYS */;
INSERT INTO `classrep` VALUES ('ACS/39/17','ACS3.2','Ashley Josphine','josphine@gmail.com',NULL,'Josphine8','1'),('sysadmin/01/17','admin','Shawn Lesley','lesley@gmail.com','0733895478','Lesley2277','1'),('AST/02/19','AST1.1','Ashley Vannes','alshleyt@gmail.com','0788963245','Ashley2019','0'),('AST/03/18','AST1.2','Layla White','leyla@gmail.com',NULL,'LeylaWhite2277','0'),('BSC/01/17','BSC3.2','Lawrence Munene','munene@gmail.com',NULL,'Munene8','1'),('COM/15/19','CS1.2','Loise Lane','loise@gmail.com','0733456789','Loise2245678','1'),('COM/15/17','CS3.2','Derrick Mbarani','derrickmbarani@gmail.com',NULL,'Derrick8','1'),('COM/18/15','CS4.1','Avril Lavine','avril@gmail.com',NULL,'Avril2277','0'),('EDU/01/18','EDU3.2','Layla sid','layla@gmail.com','0722598647','LaylaSid1236','0'),('EDU/01/17','EDU4.1','Hiley Oliech','hiley@gmail.com',NULL,'Hiley22345','0'),('EDU/11/19','EDU4.2','lavine k','lavine@gmail.com','0785963258','Lavine234567y','0'),('MED/15/17','MED1.1','Dalphine','daplphine@gmail.com','0722897452','Daphone23456','0'),('MIC/19/17','MIC3.2','Yusta Wairimu','yusta@gmail.com','0719825621','Yusta2018','1'),('TLE/05/17','TLE3.2','Javis Ochieng','javis@gmail.com','0785963147','Javis2022','0');
/*!40000 ALTER TABLE `classrep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cohort`
--

DROP TABLE IF EXISTS `cohort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cohort` (
  `cohort` varchar(30) NOT NULL,
  `reg_no` varchar(15) NOT NULL,
  `no_of_students` int(11) DEFAULT NULL,
  `courses_enrolled` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cohort`),
  UNIQUE KEY `reg_no` (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cohort`
--

LOCK TABLES `cohort` WRITE;
/*!40000 ALTER TABLE `cohort` DISABLE KEYS */;
INSERT INTO `cohort` VALUES ('ACS3.2','ACS/39/17',30,'ACS305,ACS307E,ACS302,MAT317,STA305,STA321,COM318'),('BSC3.2','BSC/01/17',67,'CHE317,CHE319,CHE321,CHE320,CHE316,CHE318,COM310'),('CS3.2','COM/15/17',47,'COM323E,COM326,COM321,COM320,COM313,COM324E');
/*!40000 ALTER TABLE `cohort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactus` (
  `contactus_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reg_no` varchar(15) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `response` text,
  PRIMARY KEY (`contactus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES (1,'21:33:17','2019-05-07','COM/15/17','0743709788','derrickmbarani@gmail.com','trial001','trial 001'),(2,'15:12:51','2019-05-15','COM/15/17','0789456123','eric@gmail.com','bdgdfdf','fdgdfd'),(3,'15:14:42','2019-05-15','sysadmin/01/17','0789456123','eric@gmail.com','bdgdfdf',NULL),(4,'15:14:45','2019-05-15','sysadmin/01/17','0789456123','eric@gmail.com','bdgdfdf',NULL),(5,'15:16:30','2019-05-15','sysadmin/01/17','0789456123','eric@gmail.com','bdgdfdf',NULL),(6,'15:16:31','2019-05-15','sysadmin/01/17','0789456123','eric@gmail.com','bdgdfdf',NULL),(7,'15:16:31','2019-05-15','sysadmin/01/17','0789456123','eric@gmail.com','bdgdfdf',NULL),(8,'15:16:31','2019-05-15','sysadmin/01/17','0789456123','eric@gmail.com','bdgdfdf',NULL),(9,'13:45:47','2019-06-07','COM/15/17','0714030365','derrick@gmail.com','dfdfdfdf','trying out the modal'),(10,'13:46:00','2019-06-07','COM/15/17','0714030365','derrick@gmail.com','dfdfdfdf','yep'),(11,'13:51:36','2019-06-07','COM/15/17','0714030365','derrick@gmail.com','dfdfdfdf',NULL),(12,'13:51:47','2019-06-07','COM/15/17','0714030365','derrick@gmail.com','dfdfdfdf',NULL),(13,'12:50:46','2019-06-10','sysadmin/01/17','0743709788','derrickmbarani@gmail.com','I am not able to access your services',NULL),(14,'12:51:50','2019-06-10','COM/15/17','0722303834','derrickmbarani@gmail.com','I am not able to access your services',NULL),(15,'13:01:49','2019-06-10','COM/15/17','0776276523','derrickmbarani@gmail.com','I am not able to access your services','Sorry, we will handle it as soon as possible'),(16,'02:12:33','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(17,'02:14:24','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(18,'02:18:03','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(19,'02:20:41','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(20,'02:21:14','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(21,'02:21:41','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(22,'02:23:37','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(23,'02:24:01','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(24,'02:24:28','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(25,'02:24:52','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(26,'02:26:39','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(27,'02:27:10','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(28,'02:27:42','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(29,'02:28:37','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(30,'02:29:16','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(31,'02:29:37','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(32,'02:29:55','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(33,'02:30:24','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(34,'02:30:55','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(35,'02:31:23','2019-06-18','COM/15/17','0755968231','derrickmbarani@gmail.com','Testing',NULL),(36,'00:03:15','2019-06-28','COM/15/17','0743709788','derrickmbarani@gmail.com','hey',NULL),(37,'15:34:21','2019-06-28','COM/15/17','0789456759','derrickmbarani@gmail.com','Hello, Derrick From Venue Booking System',NULL),(38,'20:06:34','2019-06-28','COM/15/17','0713734543','derrickmbarani@gmail.com','Trying out php mailer',NULL),(39,'20:08:59','2019-06-28','COM/15/17','0722598647','derrickmbarani@gmail.com','kk',NULL),(40,'01:18:13','2019-07-02','COM/15/17','0743709788','derrickmbarani@gmail.com','Hi, did you go through my complaint',NULL),(41,'12:13:55','2019-07-04','COM/15/17','0743709788','derrickmbarani@gmail.com','Hi',NULL),(42,'15:27:01','2019-07-04','COM/15/17','0743709788','derrickmbarani@gmail.com','hey ',NULL),(43,'16:53:05','2019-07-04','COM/15/17','0713734543','derrickmbarani@gmail.com','Hi cant access services',NULL),(44,'21:11:27','2019-07-07','COM/15/17','0713734543','derrickmbarani@gmail.com','Trial 34',NULL);
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `cohort` varchar(255) DEFAULT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `lecturers` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `contact` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('d','','d','d','d','2'),(NULL,'COM110','introduction to computer and computing','Dr.John Tarus','computer science','721330170'),(NULL,'COM113','mathematics for computer science1',NULL,'statistics and computer science','723900006'),(NULL,'COM313','electonics2','Mr.Cherop','computer science','725570164'),(NULL,'COM320','digital system design','Mr.Kiprop E.','computer science','720250396'),(NULL,'COM324E','microelectronics','Mr.Cherop','computer science','725570164'),(NULL,'COM326','software development','Mr.Kiprop E.,Mr.Elkanah R','computer science','720250396'),(NULL,'IRD100','communication skills1','Mr.kitui Lusweti','human resource','720306214'),(NULL,'IRD101','quantitative skills1','Ms.Kitur,Ms.Lily Siele','human resource',NULL),(NULL,'MAT110','basic calculus','Ms.Musundi','mathematics and physics','717745787'),(NULL,'PHY110','basic physics1',NULL,'mathematics and physics','702115965');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('booked','free') DEFAULT NULL,
  `venue_id` varchar(15) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `day_of_week` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `cohort` varchar(255) DEFAULT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`timetable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
INSERT INTO `timetable` VALUES (1,'booked','SR18','biological','monday','11:00-13:00','CS3.2','COM323E'),(2,'free','LR3','biological','tuesday','11:00-13:00','',''),(3,'booked','DC','biological','tuesday','13:00-15:00','CS3.2','COM323E'),(4,'booked','COMLAB','biological','tuesday','15:00-17:00','CS3.2','COM321'),(5,'free','AH1','biological','wednesday','13:00-15:00','AST1.1','MAT110'),(6,'booked','SR18','biological','wednesday','17:00-19:00','CS3.2','COM323E'),(7,'booked','SR18','biological','thursday','07:00-10:00','CS3.2','COM323E'),(8,'booked','SR18','biological','thursday','10:00-13:00','CS3.2','COM323E'),(9,'booked','COMLAB','biological','thursday','13:00-15:00','CS3.2','COM323E'),(10,'booked','SR22','biological','thursday','17:00-19:00','CS3.2','COM321'),(11,'booked','SR18','biological','friday','07:00-09:00','CS3.2','COM323E'),(12,'booked','LR3','biological','friday','17:00-19:00','CS3.2','COM323E'),(13,'booked','COMLAB','biological','monday','07:00-09:00','CS3.2','COM323E'),(14,'booked','SR1','biological','monday','09:00-11:00','CS3.2',''),(15,'booked','SR1','biological','tuesday','07:00-09:00','CS3.2','COM323E'),(16,'free','LR1','biological','tuesday','09:00-11:00','',''),(17,'free','COMLAB','biological','tuesday','11:00-13:00','',''),(18,'booked','COMLAB','biological','wednesday','07:00-09:00','CS3.2','COM323E'),(19,'free','SR2','biological','thursday','07:00-09:00','CS3.2','COM321'),(20,'booked','SR2','biological','thursday','11:00-13:00','CS3.2','COM326'),(21,'booked','DC','biological','friday','09:00-11:00','CS3.2','COM323E'),(22,'booked','LR3','biological','friday','11:00-13:00','CS3.2','COM324E'),(23,'free','COMLAB','biological','friday','17:00-19:00','',''),(24,'booked','SR18','biological','monday','09:00-11:00','BSC3.2,BSE3.2,BAE3.2','MAT311'),(25,'booked','LR3','biological','monday','13:00-15:00','BSC3.2,BSE3.2,BAE3.2','MAT313'),(26,'booked','LR3','biological','monday','17:00-19:00','BSC3.2,BSE3.2,BAE3.2','MAT319'),(27,'booked','LR3','biological','tuesday','07:00-09:00','BSC3.2','MAT316'),(28,'booked','SR26','biological','tuesday','11:00-13:00','BSC3.2,BSE3.2','MAT320'),(29,'booked','SR22','biological','wednesday','07:00-09:00','BSC3.2,BSE3.2,BAE3.2','MAT319'),(30,'booked','SR3','biological','wednesday','09:00-11:00','BSC3.2','PHY314'),(31,'booked','DC','biological','wednesday','11:00-13:00','BSC3.2,BSE3.2,BAE3.2','MAT313'),(32,'booked','SR18','biological','wednesday','13:00-15:00','BSC3.2,BSE3.2,BAE3.2','MAT312'),(33,'booked','SR22','biological','wednesday','17:00-19:00','BSC3.2','COM310'),(34,'booked','LR3','biological','thursday','07:00-09:00','BSC3.2','MAT316'),(35,'booked','PHY/CHE LAB','biological','thursday','16:00-19:00','BSC3.2','PHY314'),(36,'booked','SR22','biological','friday','09:00-11:00','BSC3.2,BSE3.2,BAE3.2','MAT312'),(37,'booked','SR3','biological','friday','11:00-13:00','BSC3.2,BSE3.2','MAT320'),(38,'booked','AH1','biological','friday','15:00-17:00','BSC3.2,BSE3.2,BAE3.2','MAT311'),(39,'booked','SR18','biological','friday','17:00-19:00','BSC3.2','COM310'),(40,'booked','DC','biological','monday','09:00-11:00','ACS3.2','ACS305'),(41,'booked','LR3','biological','monday','11:00-13:00','ACS3.2','ACS307E'),(42,'booked','LR3','biological','monday','15:00-17:00','ACS3.2','ACS302'),(43,'booked','DC','biological','monday','17:00-19:00','AST3.2,ACS3.2','MAT317'),(44,'booked','AH1','biological','tuesday','17:00-19:00','ACS3.2','STA305'),(45,'booked','DC','biological','wednesday','09:00-11:00','ACS3.2','STA321'),(46,'booked','SR3','biological','wednesday','11:00-13:00','ACS3.2','ACS307E'),(47,'booked','DC','biological','wednesday','13:00-15:00','ACS3.2','MAT317'),(48,'booked','SR22','biological','wednesday','15:00-17:00','CS3.2','COM323'),(49,'booked','LR3','biological','thursday','11:00-13:00','ACS3.2','ACS302'),(50,'booked','DC','biological','thursday','13:00-15:00','ACS3.2','ACS305'),(51,'booked','DC','biological','thursday','17:00-19:00','ACS3.2','STA305'),(52,'booked','AH1','biological','friday','07:00-09:00','ACS3.2','STA321'),(53,'booked','SR18','biological','friday','15:00-17:00','CS3.2','COM330');
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `transaction_type` enum('book','release') DEFAULT NULL,
  `reg_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,'SR22','10:41:31','2019-04-30','book','COM/15/17'),(2,'SR18','09:20:58','2019-05-13','book','COM/15/17'),(3,'SR18','03:11:13','2019-05-15','book','COM/15/17'),(4,'SR18','03:11:34','2019-05-15','release','COM/15/17'),(5,'SR18','12:38:01','2019-05-23','book','COM/15/17'),(6,'COMLAB','12:47:37','2019-05-27','book','COM/15/17'),(7,'COMLAB','12:48:46','2019-05-27','release','COM/15/17'),(8,'COMLAB','12:48:59','2019-05-27','book','COM/15/17'),(9,'SR1','12:52:10','2019-05-27','book','COM/15/17'),(10,'COMLAB','12:55:48','2019-05-27','release','COM/15/17'),(11,'COMLAB','12:56:01','2019-05-27','book','COM/15/17'),(12,'COMLAB','12:56:37','2019-05-27','release','COM/15/17'),(13,'LR3','03:14:45','2019-06-09','book','COM/15/17'),(14,'SR18','05:03:04','2019-06-10','book','COM/15/17'),(15,'COMLAB','05:04:59','2019-06-10','book','COM/15/17'),(16,'SR18','02:16:35','2019-06-15','book','COM/15/17'),(17,'DC','04:20:16','2019-06-18','book','COM/15/17'),(18,'COMLAB','04:22:03','2019-06-18','book','COM/15/17'),(19,'SR1','04:22:54','2019-06-18','book','COM/15/17'),(20,'LR1','03:49:17','2019-06-18','book','COM/15/17'),(21,'COMLAB','02:41:28','2019-06-20','book','COM/15/17'),(22,'COMLAB','02:41:28','2019-06-20','book','COM/15/17'),(23,'COMLAB','02:41:49','2019-06-20','book','COM/15/17'),(24,'COMLAB','02:41:50','2019-06-20','book','COM/15/17'),(25,'COMLAB','02:42:07','2019-06-20','book','COM/15/17'),(26,'COMLAB','02:42:07','2019-06-20','book','COM/15/17'),(27,'COMLAB','02:42:30','2019-06-20','book','COM/15/17'),(28,'COMLAB','02:42:31','2019-06-20','book','COM/15/17'),(29,'COMLAB','02:49:25','2019-06-20','book','COM/15/17'),(30,'COMLAB','02:51:35','2019-06-20','book','COM/15/17'),(31,'COMLAB','02:51:58','2019-06-20','release','COM/15/17'),(32,'COMLAB','03:57:28','2019-06-23','book','COM/15/17'),(33,'COMLAB','03:57:36','2019-06-23','book','COM/15/17'),(34,'COMLAB','12:58:23','2019-06-24','release','COM/15/17'),(35,'COMLAB','03:52:19','2019-06-24','book','COM/15/17'),(36,'COMLAB','03:52:26','2019-06-24','book','COM/15/17'),(37,'COMLAB','03:52:40','2019-06-24','book','COM/15/17'),(38,'SR18','03:58:20','2019-06-24','release','COM/15/17'),(39,'SR18','04:01:08','2019-06-24','book','COM/15/17'),(40,'SR18','04:01:13','2019-06-24','book','COM/15/17'),(41,'SR18','04:41:28','2019-06-24','release','COM/15/17'),(42,'SR18','05:10:26','2019-06-24','book','COM/15/17'),(43,'COMLAB','01:26:04','2019-06-25','book','COM/15/17'),(44,'COMLAB','01:26:19','2019-06-25','book','COM/15/17'),(45,'COMLAB','01:26:41','2019-06-25','release','COM/15/17'),(46,'COMLAB','02:28:32','2019-06-25','book','COM/15/17'),(47,'LR3','04:03:42','2019-06-25','release','COM/15/17'),(48,'COMLAB','10:01:03','2019-06-27','book','COM/15/17'),(49,'COMLAB','10:01:11','2019-06-27','book','COM/15/17'),(50,'DC','03:55:13','2019-06-28','release','COM/15/17'),(51,'LR3','11:22:36','2019-07-01','book','COM/15/17'),(52,'LR3','11:22:42','2019-07-01','book','COM/15/17'),(53,'LR3','11:23:43','2019-07-01','release','COM/15/17'),(54,'LR3','01:23:56','2019-07-01','book','COM/15/17'),(55,'LR3','01:24:03','2019-07-01','book','COM/15/17'),(56,'SR18','08:31:52','2019-07-01','book','COM/15/17'),(57,'SR18','08:32:00','2019-07-01','book','COM/15/17'),(58,'SR22','09:42:05','2019-07-01','book','COM/15/17'),(59,'SR22','09:46:25','2019-07-01','book','COM/15/17'),(60,'SR18','09:47:19','2019-07-01','release','COM/15/17'),(61,'SR18','10:45:55','2019-07-01','release','COM/15/17'),(62,'SR18','10:49:29','2019-07-01','book','COM/15/17'),(63,'SR18','10:49:47','2019-07-01','release','COM/15/17'),(64,'SR18','10:49:54','2019-07-01','book','COM/15/17'),(65,'SR18','10:52:48','2019-07-01','book','COM/15/17'),(66,'SR18','10:53:04','2019-07-01','release','COM/15/17'),(67,'SR18','10:53:12','2019-07-01','book','COM/15/17'),(68,'SR18','10:54:46','2019-07-01','book','COM/15/17'),(69,'SR18','10:54:55','2019-07-01','release','COM/15/17'),(70,'SR18','10:55:02','2019-07-01','book','COM/15/17'),(71,'SR18','10:55:51','2019-07-01','release','COM/15/17'),(72,'SR18','10:55:59','2019-07-01','book','COM/15/17'),(73,'SR18','10:56:06','2019-07-01','book','COM/15/17'),(74,'SR18','10:58:59','2019-07-01','release','COM/15/17'),(75,'SR18','10:59:49','2019-07-01','release','COM/15/17'),(76,'SR18','11:01:44','2019-07-01','release','COM/15/17'),(77,'SR18','11:01:58','2019-07-01','book','COM/15/17'),(78,'SR18','11:06:51','2019-07-01','release','COM/15/17'),(79,'SR18','11:06:59','2019-07-01','book','COM/15/17'),(80,'SR18','11:08:42','2019-07-01','release','COM/15/17'),(81,'SR18','11:11:34','2019-07-01','book','COM/15/17'),(82,'SR18','11:11:51','2019-07-01','book','COM/15/17'),(83,'SR18','11:12:18','2019-07-01','book','COM/15/17'),(84,'SR18','11:12:32','2019-07-01','release','COM/15/17'),(85,'SR18','11:12:40','2019-07-01','book','COM/15/17'),(86,'SR18','11:14:07','2019-07-01','release','COM/15/17'),(87,'SR18','11:14:14','2019-07-01','book','COM/15/17'),(88,'LR3','11:16:30','2019-07-01','book','COM/15/17'),(89,'LR3','11:17:23','2019-07-01','release','COM/15/17'),(90,'LR3','11:17:29','2019-07-01','book','COM/15/17'),(91,'SR18','11:25:18','2019-07-01','release','COM/15/17'),(92,'COMLAB','11:46:12','2019-07-01','release','COM/15/17'),(93,'SR18','11:48:29','2019-07-01','book','COM/15/17'),(94,'SR18','11:48:35','2019-07-01','book','COM/15/17'),(95,'SR18','11:51:06','2019-07-01','book','COM/15/17'),(96,'SR18','11:51:35','2019-07-01','release','COM/15/17'),(97,'SR18','11:57:51','2019-07-01','book','COM/15/17'),(98,'SR18','11:57:56','2019-07-01','book','COM/15/17'),(99,'SR18','11:58:16','2019-07-01','release','COM/15/17'),(100,'SR18','11:58:25','2019-07-01','book','COM/15/17'),(101,'SR18','11:58:31','2019-07-01','book','COM/15/17'),(102,'SR18','11:58:37','2019-07-01','book','COM/15/17'),(103,'SR18','12:00:48','2019-07-02','book','COM/15/17'),(104,'LR1','12:02:32','2019-07-02','release','COM/15/17'),(105,'LR1','12:02:41','2019-07-02','book','COM/15/17'),(106,'LR1','12:02:46','2019-07-02','book','COM/15/17'),(107,'LR1','12:02:51','2019-07-02','book','COM/15/17'),(108,'LR1','12:08:44','2019-07-02','book','COM/15/17'),(109,'LR1','12:08:50','2019-07-02','book','COM/15/17'),(110,'SR1','12:08:57','2019-07-02','release','COM/15/17'),(111,'SR1','12:09:07','2019-07-02','book','COM/15/17'),(112,'SR1','12:09:12','2019-07-02','book','COM/15/17'),(113,'SR1','12:14:58','2019-07-02','book','COM/15/17'),(114,'SR1','12:18:10','2019-07-02','book','COM/15/17'),(115,'SR1','12:18:16','2019-07-02','book','COM/15/17'),(116,'SR1','12:19:28','2019-07-02','book','COM/15/17'),(117,'SR1','12:19:37','2019-07-02','book','COM/15/17'),(118,'SR1','12:19:46','2019-07-02','release','COM/15/17'),(119,'SR1','12:19:54','2019-07-02','book','COM/15/17'),(120,'SR1','12:19:59','2019-07-02','book','COM/15/17'),(121,'SR1','12:21:45','2019-07-02','book','COM/15/17'),(122,'SR1','12:25:33','2019-07-02','book','COM/15/17'),(123,'SR1','12:25:40','2019-07-02','release','COM/15/17'),(124,'SR1','12:26:26','2019-07-02','book','COM/15/17'),(125,'SR1','12:26:32','2019-07-02','book','COM/15/17'),(126,'SR1','12:26:39','2019-07-02','release','COM/15/17'),(127,'SR1','12:27:37','2019-07-02','book','COM/15/17'),(128,'SR1','12:27:42','2019-07-02','book','COM/15/17'),(129,'SR1','12:28:51','2019-07-02','book','COM/15/17'),(130,'SR1','12:28:58','2019-07-02','release','COM/15/17'),(131,'SR1','12:29:08','2019-07-02','book','COM/15/17'),(132,'SR1','12:29:13','2019-07-02','book','COM/15/17'),(133,'SR1','12:30:13','2019-07-02','book','COM/15/17'),(134,'SR1','12:30:19','2019-07-02','book','COM/15/17'),(135,'SR1','12:30:45','2019-07-02','book','COM/15/17'),(136,'SR1','12:30:49','2019-07-02','release','COM/15/17'),(137,'SR1','12:33:16','2019-07-02','book','COM/15/17'),(138,'SR1','12:33:21','2019-07-02','book','COM/15/17'),(139,'SR1','12:34:07','2019-07-02','book','COM/15/17'),(140,'SR1','12:34:13','2019-07-02','release','COM/15/17'),(141,'SR1','12:34:46','2019-07-02','book','COM/15/17'),(142,'SR1','12:34:55','2019-07-02','book','COM/15/17'),(143,'SR1','12:53:06','2019-07-02','release','COM/15/17'),(144,'SR1','12:53:16','2019-07-02','book','COM/15/17'),(145,'SR1','12:53:21','2019-07-02','book','COM/15/17'),(146,'SR1','12:53:30','2019-07-02','book','COM/15/17'),(147,'SR1','01:01:25','2019-07-02','book','COM/15/17'),(148,'SR1','01:01:40','2019-07-02','release','COM/15/17'),(149,'SR1','01:01:49','2019-07-02','book','COM/15/17'),(150,'LR1','01:10:09','2019-07-02','release','COM/15/17'),(151,'LR1','01:14:06','2019-07-02','book','COM/15/17'),(152,'SR1','01:28:28','2019-07-02','release','COM/15/17'),(153,'LR1','01:29:27','2019-07-02','release','COM/15/17'),(154,'SR1','12:12:54','2019-07-04','book','COM/15/17'),(155,'SR1','12:13:07','2019-07-04','release','COM/15/17'),(156,'SR22','04:50:29','2019-07-04','release','COM/15/17'),(157,'SR22','04:50:56','2019-07-04','book','COM/15/17'),(158,'COMLAB','05:15:51','2019-07-20','book','COM/15/17'),(159,'SR1','05:59:41','2019-07-20','book','COM/15/17'),(160,'LR3','06:00:39','2019-07-20','release','COM/15/17'),(161,'SR1','06:03:31','2019-07-20','release','COM/15/17'),(162,'SR18','08:16:11','2019-07-20','book','COM/15/17'),(163,'SR1','09:39:21','2019-07-20','book','COM/15/17'),(164,'SR1','09:43:44','2019-07-20','release','COM/15/17'),(165,'SR1','03:48:52','2019-07-21','book','COM/15/17'),(166,'COMLAB','03:49:20','2019-07-21','release','COM/15/17'),(167,'COMLAB','07:17:22','2019-07-22','release','COM/15/17'),(168,'COMLAB','07:19:10','2019-07-22','book','COM/15/17'),(169,'DC','04:42:53','2019-07-26','book','COM/15/17');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venue` (
  `venue_id` varchar(15) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venue`
--

LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` VALUES ('COMLAB','biological',40),('DC','biological',80),('LR1','biological',60),('LR3','biological',60),('SR1','biological',50),('SR17','kesses',150),('SR18','kesses',150),('SR22','kesses',150),('SR26','biological',40),('SR3','biological',50);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_timetable`
--

DROP TABLE IF EXISTS `view_timetable`;
/*!50001 DROP VIEW IF EXISTS `view_timetable`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_timetable` (
  `timetable_id` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `venue_id` tinyint NOT NULL,
  `school` tinyint NOT NULL,
  `day_of_week` tinyint NOT NULL,
  `duration` tinyint NOT NULL,
  `cohort` tinyint NOT NULL,
  `course_code` tinyint NOT NULL,
  `capacity` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_timetable`
--

/*!50001 DROP TABLE IF EXISTS `view_timetable`*/;
/*!50001 DROP VIEW IF EXISTS `view_timetable`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_timetable` AS select `timetable`.`timetable_id` AS `timetable_id`,`timetable`.`status` AS `status`,`timetable`.`venue_id` AS `venue_id`,`timetable`.`school` AS `school`,`timetable`.`day_of_week` AS `day_of_week`,`timetable`.`duration` AS `duration`,`timetable`.`cohort` AS `cohort`,`timetable`.`course_code` AS `course_code`,`venue`.`capacity` AS `capacity` from (`timetable` join `venue`) where (`timetable`.`venue_id` = `venue`.`venue_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-03 18:12:01
