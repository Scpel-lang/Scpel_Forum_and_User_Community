-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2024 at 06:51 AM
-- Server version: 10.4.32-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phrunsys_scpel_community`
--

-- --------------------------------------------------------

--
-- Table structure for table `scpel_forum`
--

CREATE TABLE `scpel_forum` (
  `ID` int(11) NOT NULL,
  `SCPEL_USER_ID` int(11) DEFAULT NULL,
  `USER_NAME` text DEFAULT NULL,
  `USER_EMAIL` text DEFAULT NULL,
  `SUBJECT` text NOT NULL,
  `MESSAGE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scpel_forum`
--

INSERT INTO `scpel_forum` (`ID`, `SCPEL_USER_ID`, `USER_NAME`, `USER_EMAIL`, `SUBJECT`, `MESSAGE`) VALUES
(1, NULL, 'Fidele K', 'itfidele@gmail.com', 'Scpel', 'some text here '),
(2, NULL, 'FRancis', 'phrunsys@scpel.org', 'Hello', '> some text here \r\n\r\nHow are you'),
(3, NULL, 'Hrllo', 'phrunsys@cognospheredynamics.com', 'Hbbdddb', '> > some text here \r\n\r\nHow are youhdhdhd'),
(4, NULL, 'PE', 'phrunsys@scpel.org', 'sdasda', 'adasdasd'),
(5, NULL, 'Phrunsys Emmasson ', 'phrunsys@scpel.org', 'VPS5 Monthly plan canceled without refund!', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `scpel_forum_replies`
--

CREATE TABLE `scpel_forum_replies` (
  `ID` int(11) NOT NULL,
  `FORUM_ID` int(11) DEFAULT NULL,
  `SCPEL_USER_ID` int(11) DEFAULT NULL,
  `USER_NAME` text DEFAULT NULL,
  `USER_EMAIL` text DEFAULT NULL,
  `SUBJECT` text NOT NULL,
  `MESSAGE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scpel_users`
--

CREATE TABLE `scpel_users` (
  `ID` int(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `EMAIL` text NOT NULL,
  `PASSWORD` text NOT NULL,
  `LAST_LOGIN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scpel_forum`
--
ALTER TABLE `scpel_forum`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `scpel_forum_replies`
--
ALTER TABLE `scpel_forum_replies`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USER_NAME` (`USER_NAME`) USING HASH;

--
-- Indexes for table `scpel_users`
--
ALTER TABLE `scpel_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scpel_forum`
--
ALTER TABLE `scpel_forum`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scpel_forum_replies`
--
ALTER TABLE `scpel_forum_replies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scpel_users`
--
ALTER TABLE `scpel_users`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
