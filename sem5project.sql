-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2019 at 10:57 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sem5project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `Appointid` int(11) NOT NULL AUTO_INCREMENT,
  `Appoint_time` varchar(20) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `serviceid` int(11) DEFAULT NULL,
  `Workerid` int(11) DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_reviewed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Appointid`),
  KEY `userid` (`userid`),
  KEY `serviceid` (`serviceid`),
  KEY `Workerid` (`Workerid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointid`, `Appoint_time`, `userid`, `serviceid`, `Workerid`, `is_completed`, `is_reviewed`) VALUES
(3, '10/23/2019 4:05 PM', 1, 2, 1, 1, 1),
(17, '10/25/2019 10:05 AM', 12, 1, 3, 1, 1),
(6, '10/25/2019 6:19 AM', 11, 2, 1, 1, 1),
(7, '10/24/2019 6:32 AM', 12, 2, 1, 1, 1),
(8, '10/24/2019 7:40 AM', 13, 1, 3, 1, 1),
(9, '10/23/2019 4:05 PM', 11, 1, 2, 0, 0),
(10, '10/23/2019 11:40 AM', 1, 1, 3, 1, 1),
(12, '10/31/2019 12:06 PM', 11, 1, 3, 1, 1),
(13, '10/30/2019 3:15 PM', 1, 1, 2, 1, 0),
(18, '10/22/2019 11:51 AM', 1, 1, 2, 0, 0),
(15, '10/28/2019 9:45 AM', 1, 1, 3, 1, 1),
(16, '10/25/2019 9:51 AM', 15, 2, 1, 1, 1),
(19, '10/10/2019 12:37 PM', 12, 1, 2, 1, 0),
(20, '10/31/2019 1:54 PM', 17, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `Q1` int(11) DEFAULT NULL,
  `Q2` int(11) DEFAULT NULL,
  `Q3` int(11) DEFAULT NULL,
  `Q4` int(11) DEFAULT NULL,
  `Workerid` int(11) DEFAULT NULL,
  `appointmentid` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `Workerid` (`Workerid`),
  KEY `appointmentid` (`appointmentid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rid`, `Q1`, `Q2`, `Q3`, `Q4`, `Workerid`, `appointmentid`) VALUES
(2, 4, 4, 4, 5, 1, 11),
(3, 4, 4, 4, 4, 1, 6),
(5, 5, 5, 5, 5, 3, 8),
(12, 4, 3, 4, 3, 3, 10),
(13, 5, 4, 4, 5, 1, 7),
(14, 3, 3, 3, 3, 3, 15),
(15, 5, 5, 5, 5, 1, 16),
(16, 5, 5, 5, 5, 3, 17),
(17, 2, 2, 2, 2, 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `Serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `charge` int(11) DEFAULT NULL,
  PRIMARY KEY (`Serviceid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Serviceid`, `Name`, `category`, `charge`) VALUES
(1, 'Electrical', 'Electrical', 250),
(2, 'Plumbing', 'Plumbing', 300);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Userid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `AreaCode` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Userid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Userid`, `Name`, `Address`, `Email`, `Phone`, `AreaCode`, `username`, `password`) VALUES
(1, 'Parth Shah', 'A6-10/1 LIC Colony, Borivali west', 'chinmay.deo7@yahoo.com', '09869042952', '1234', 'parth', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'Nirav Jain', 'dadar', 'nirav@gmail.com', '1233432634', '1234', 'nirav', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'Nishant nimabare', 'Jogeshwari', 'nishany@gamil.com', '784516', '1420', 'nishant', '81dc9bdb52d04dc20036dbd8313ed055'),
(16, 'Chinmay Deo', 'A6-10/1 LIC Colony, Borivali west', 'chinmay.deo7@yahoo.com', '389561247', '5678', 'chinmay', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, 'Test', 'Flat 206,Purvadeep Coop Housing Society,Opp Bhagwati Hospital,Borivali west,Mumbai-400103', 'test@gmail.com', '09029226009', '986', 'test', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'John Doe', 'A6-10/1 LIC Colony, Borivali west', 'chinmay.deo7@yahoo.com', '09869042952', '986', 'root', 'c20ad4d76fe97759aa27a0c99bff6710'),
(13, 'Manav Shah', 'Flat 206,Purvadeep Coop Housing Society,Opp Bhagwati Hospital,Borivali west,Mumbai-400103', 'manav@gmail.com', '142365987', '7894', 'manav', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'Neel Vasani', 'Mumbai', 'neel@gmail.com', '123456789', '123', 'neel', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'Chinmay Khamkar', 'Andheri', 'khamkar@gmail.com', '456789123', '4566', 'khamkar', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
CREATE TABLE IF NOT EXISTS `worker` (
  `Name` varchar(255) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Workerid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `Rating` float DEFAULT '3.5',
  `AreaCode` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Workerid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`Name`, `Phone`, `Workerid`, `category`, `Rating`, `AreaCode`, `username`, `password`) VALUES
('Rajesh Gada', '123456789', 1, 'Plumbing', 4.4375, '400092', 'rajesh', '81dc9bdb52d04dc20036dbd8313ed055'),
('Rahul Sharma', '902922600', 2, 'Electrical', 3.5, '1234', 'rahul', '81dc9bdb52d04dc20036dbd8313ed055'),
('Sandip Shah', '9869208526', 3, 'Electrical', 3.7, '1234', 'sandip', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
