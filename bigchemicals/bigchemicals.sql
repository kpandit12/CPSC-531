-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2021 at 03:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigchemicals`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildinginfo`
--

DROP TABLE IF EXISTS `buildinginfo`;
CREATE TABLE IF NOT EXISTS `buildinginfo` (
  `buildingname` varchar(45) NOT NULL,
  `floor` varchar(45) NOT NULL,
  `roomno` varchar(45) NOT NULL,
  PRIMARY KEY (`buildingname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(45) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'accounting'),
(2, 'management'),
(3, 'finance'),
(4, 'construction'),
(5, 'human resource'),
(6, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `drug_test`
--

DROP TABLE IF EXISTS `drug_test`;
CREATE TABLE IF NOT EXISTS `drug_test` (
  `empid` int(10) UNSIGNED NOT NULL,
  `did` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `testName` varchar(45) NOT NULL,
  `results` varchar(200) NOT NULL,
  `comments` varchar(200) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `empid` int(10) UNSIGNED NOT NULL,
  `school` varchar(45) NOT NULL,
  `sDate` datetime NOT NULL,
  `eDate` datetime NOT NULL,
  `Degree` varchar(45) NOT NULL,
  `GPA` decimal(10,0) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empaddress`
--

DROP TABLE IF EXISTS `empaddress`;
CREATE TABLE IF NOT EXISTS `empaddress` (
  `addressId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `empid` int(10) UNSIGNED NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `zip` varchar(45) NOT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `empid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ename` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `addressid` varchar(50) NOT NULL,
  `supervisor` varchar(45) NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`empid`),
  KEY `FK_employee_1` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `ename`, `phone`, `addressid`, `supervisor`, `dept_id`) VALUES
(9, 'Test', '1234567891', 'Test21', 'Test11', 2),
(11, 'ketki12123', '1111111111', 'test', 'test', 2),
(12, 'test', '7987987987987', 'esaese', 'est', 4);

-- --------------------------------------------------------

--
-- Table structure for table `emp_access_rights`
--

DROP TABLE IF EXISTS `emp_access_rights`;
CREATE TABLE IF NOT EXISTS `emp_access_rights` (
  `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `empid` int(10) UNSIGNED NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  `buildingname` varchar(45) NOT NULL,
  `access` varchar(45) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `locationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buildingName` varchar(45) NOT NULL,
  `room_no` varchar(45) NOT NULL,
  `floor` varchar(45) NOT NULL,
  `door` varchar(45) NOT NULL,
  PRIMARY KEY (`locationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sensoractivation`
--

DROP TABLE IF EXISTS `sensoractivation`;
CREATE TABLE IF NOT EXISTS `sensoractivation` (
  `sid` int(10) UNSIGNED NOT NULL,
  `dateTime` datetime NOT NULL,
  `Direction` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sensorslist`
--

DROP TABLE IF EXISTS `sensorslist`;
CREATE TABLE IF NOT EXISTS `sensorslist` (
  `sid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sname` varchar(45) NOT NULL,
  `sactivationdate` varchar(45) NOT NULL DEFAULT '',
  `sintallationdate` varchar(45) NOT NULL,
  `dept_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensorslist`
--

INSERT INTO `sensorslist` (`sid`, `sname`, `sactivationdate`, `sintallationdate`, `dept_id`) VALUES
(1, 'sensor 1', '22-01-2021', '22-01-2021', 2),
(2, 'sensor 21', '22-01-2021', '2021-12-05', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sensor_repair_log`
--

DROP TABLE IF EXISTS `sensor_repair_log`;
CREATE TABLE IF NOT EXISTS `sensor_repair_log` (
  `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sid` varchar(45) NOT NULL,
  `technician` varchar(45) NOT NULL,
  `repair` varchar(205) NOT NULL,
  `repairDate` varchar(45) NOT NULL,
  `cause` varchar(45) NOT NULL,
  `downDate` varchar(45) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_repair_log`
--

INSERT INTO `sensor_repair_log` (`uid`, `sid`, `technician`, `repair`, `repairDate`, `cause`, `downDate`) VALUES
(2, '2', 'ketki 12', 'yes yes', '2021-12-10', 'test12', '2021-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `trackinglog`
--

DROP TABLE IF EXISTS `trackinglog`;
CREATE TABLE IF NOT EXISTS `trackinglog` (
  `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `empid` int(10) UNSIGNED NOT NULL,
  `sid` int(11) NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `FK_dailyLog_1` (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trackinglog`
--

INSERT INTO `trackinglog` (`tid`, `empid`, `sid`, `timeIn`, `timeOut`, `dept_id`) VALUES
(1, 11, 1, '21:55:00', '22:55:00', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_employee_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `trackinglog`
--
ALTER TABLE `trackinglog`
  ADD CONSTRAINT `FK_dailyLog_1` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
