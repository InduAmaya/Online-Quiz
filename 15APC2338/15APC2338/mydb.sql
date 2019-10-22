-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 09:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aID` int(10) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `ansID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`aID`, `answer`, `ansID`) VALUES
(1, 'Modem', 1),
(2, 'Gateway', 1),
(3, 'Monitor', 1),
(4, 'Peripheral', 1),
(5, 'HTTP', 2),
(6, 'TELNET', 2),
(7, 'UTP', 2),
(8, 'FTP', 2),
(9, 'HTTP', 3),
(10, 'WWW', 3),
(11, 'TCP/IP', 3),
(12, 'FTP', 3),
(13, 'Application Layer', 4),
(14, 'Transport Layer', 4),
(15, 'Network Layer', 4),
(16, 'Data Link Layer', 4),
(17, 'Social Network', 5),
(18, 'Search Engine', 5),
(19, 'Router', 5),
(20, 'Search Page', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` varchar(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `UserName`, `Password`, `Email`) VALUES
('', 'ama', 'd8e6e1405e607479c1ce78791f76a05cb6dc01fa', 'amayahewavithana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qID` varchar(10) NOT NULL,
  `question` varchar(150) NOT NULL,
  `ansID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qID`, `question`, `ansID`) VALUES
('1', 'What is the equipment needed to allow home computers to connect to the Internet?', 1),
('2', 'A user can get files from another computer on the Internet using,', 8),
('3', 'What is the communication protocol used by Internet?', 11),
('4', 'TCP is a commonly used protocol at,', 14),
('5', 'Website which is used to search other websites by typing a keyword is,', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`,`Email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
