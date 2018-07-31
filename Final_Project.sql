-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 04:52 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Final_Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Crime_Report`
--

CREATE TABLE IF NOT EXISTS `Crime_Report` (
  `Crime_Description` char(100) DEFAULT NULL,
  `Time` varchar(50) DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `Address_Id` int(11) DEFAULT NULL,
  `City_Id` int(11) DEFAULT NULL,
  UNIQUE KEY `Address_Id` (`Address_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Crime_Report`
--

INSERT INTO `Crime_Report` (`Crime_Description`, `Time`, `Category`, `Address_Id`, `City_Id`) VALUES
('Littering around neighborhood and stuff', '9:32 PM', 1, 100, 1),
('Jaywalking in busy street screaming that he hates the sand', '10:00 PM', 4, 101, 1),
('Walking dog without leash', '2:35 PM', 3, 102, 1),
('Plotting to take over the world', '11:55 PM', 5, 103, 1),
('Feeding junk food to police horse', '3:45 PM', 5, 104, 1),
('Egging house', '7:45 PM', 4, 105, 2),
('Stole book from library', '3:45 PM', 5, 106, 2),
('Ran stop sign', '10:59 PM', 5, 107, 2),
('Turned in Late assignment', '11:56 PM', 4, 108, 2),
('Skipped class', '2:45 PM', 3, 109, 2),
('Left lights on all night', '6:00 PM', 5, 110, 3),
('Spit gum on sidewalk', '8:50 PM', 1, 111, 3),
('Assault with pool noodle', '10:34 PM', 5, 112, 3),
('Property damage', '8:50 AM', 1, 113, 3),
('Stolen Expo markers', '7:21 AM', 1, 114, 3),
('Playing loud music', '11:33 PM', 3, 115, 4),
('Public intoxication', '7:34 PM', 5, 116, 4),
('Left water hose running all night', '12:56 AM', 1, 117, 4),
('Posting false craigslist ad', '3:45 PM', 1, 118, 4),
('Stole from own property', '8:12 PM', 3, 119, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Street_Address`
--

CREATE TABLE IF NOT EXISTS `Street_Address` (
  `Street_Address` char(50) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Zipcode` int(11) DEFAULT NULL,
  `City_Id` int(11) DEFAULT NULL,
  `Address_Id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Address_Id`),
  UNIQUE KEY `Address_Id` (`Address_Id`),
  UNIQUE KEY `Street_Address` (`Street_Address`),
  UNIQUE KEY `Latitude` (`Latitude`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Street_Address`
--

INSERT INTO `Street_Address` (`Street_Address`, `Latitude`, `Longitude`, `Zipcode`, `City_Id`, `Address_Id`) VALUES
('1507 E Alisal St', 36.672681, -121.613232, 93905, 1, 100),
('203 `Cross` Ave', 36.675443, -121.611903, 93905, 1, 101),
('344 Williams Rd', 36.677069, -121.611506, 93905, 1, 102),
('1285 1st Ave', 36.674247, -121.619287, 93905, 1, 103),
('1311 E Market St', 36.675934, -121.618386, 93905, 1, 104),
('6th Ave', 36.655349, -121.793385, 93955, 2, 105),
('5108 Monterey Rd', 36.65693, -121.800387, 93933, 2, 106),
('500 8th St', 36.659811, -121.79866, 93933, 2, 107),
('241 9th St', 36.662835, -121.80636, 93933, 2, 108),
('223 Hayes Cir', 36.671096, -121.805189, 93933, 2, 109),
('1884 Highland St', 36.616066, -121.830682, 93955, 3, 110),
('1881 Luzern St', 36.616177, -121.831368, 93955, 3, 111),
('1666 harding St', 36.610872, -121.83313, 93955, 3, 112),
('1263 Sonoma Ave', 36.606095, -121.839116, 93955, 3, 113),
('720 Trinity Avenue', 36.604517, -121.849472, 93955, 3, 114),
('100 san bernabe dr', 36.591005, -121.903808, 93940, 4, 115),
('225 soledad dr', 36.587628, -121.849472, 93940, 4, 116),
('6 Forest Knoll Road', 36.584498, -121.917092, 93940, 4, 117),
('970 Colton Street', 36.590916, -121.905137, 93940, 4, 118),
('54 Vía Ventura', 36.58807, -121.905062, 93940, 4, 119);

-- --------------------------------------------------------

--
-- Table structure for table `Town`
--

CREATE TABLE IF NOT EXISTS `Town` (
  `City_Name` char(50) DEFAULT NULL,
  `State_Name` char(50) DEFAULT NULL,
  `City_Id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`City_Id`),
  UNIQUE KEY `City_Id` (`City_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Town`
--

INSERT INTO `Town` (`City_Name`, `State_Name`, `City_Id`) VALUES
('Salinas', 'California', 1),
('Marina', 'California', 2),
('Seaside', 'California', 3),
('Monterey', 'California', 4),
('Gonzales', 'California', 5),
('Soledad', 'California', 6),
('Greenfield', 'California', 7);

-- --------------------------------------------------------

--
-- Table structure for table `User_Information`
--

CREATE TABLE IF NOT EXISTS `User_Information` (
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `User_Information`
--

INSERT INTO `User_Information` (`firstName`, `lastName`, `userName`, `userPassword`, `userId`) VALUES
('Rosco', 'Andrade', 'Good_Boy!', 'e38ad214943daad1d64c102faec29de4afe9da3d', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Crime_Report`
--
ALTER TABLE `Crime_Report`
  ADD CONSTRAINT `Crime_Report_ibfk_1` FOREIGN KEY (`Address_Id`) REFERENCES `Street_Address` (`Address_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
