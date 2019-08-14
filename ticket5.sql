-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2013 at 06:51 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  PRIMARY KEY(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Database: `ticket`
--
CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin`(`name`,`pass`) values ('Yogita','yyy');

--
-- Table structure for table `BUS`
--


CREATE TABLE IF NOT EXISTS `rating`(
	
	`bus_no` varchar(10) NOT NULL,	
	`rating` int(5) NOT NULL,
	`email` varchar(200) NOT NULL,
	`uname` varchar(200) NOT NULL,
	FOREIGN KEY(`email`) references user(`email`)
);
--
-- Table structure for table `BUS`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `trip_code` varchar(11) NOT NULL,
  `bus_no` varchar(10) NOT NULL,
  `origin` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `no_of_seats` int(3) NOT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `cost` int(5) NOT NULL,
  `seat_layout` varchar(100) NOT NULL,
  `avail_seats` int(3) NOT NULL,
  PRIMARY KEY(`trip_code`)
);


--
-- Table structure for table `BOARD`
--
CREATE TABLE IF NOT EXISTS `board`(
`trip_code` varchar(30) NOT NULL,
`board` varchar(30) NOT NULL,
`btime` time NOT NULL,
FOREIGN KEY (`trip_code`) REFERENCES bus(`trip_code`) on delete cascade
);


--
-- Table structure for table `PASSENGER`
--

CREATE TABLE IF NOT EXISTS `passenger`(
  `pnr` int(3) ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `age_cat` varchar(15),
  `gender` varchar(6) NOT NULL,
  `trip_code` varchar(11) NOT NULL,
  `seat_no` int(2) NOT NULL,
  `board_point` varchar(30) NOT NULL,
  PRIMARY KEY(`pnr`),
  FOREIGN KEY (`trip_code`) REFERENCES bus(`trip_code`) ON DELETE CASCADE
);







/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

