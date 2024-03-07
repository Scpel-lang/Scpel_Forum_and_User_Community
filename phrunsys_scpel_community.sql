-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 11:39 AM
-- Server version: 8.0.36
-- PHP Version: 8.3.3

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
-- Table structure for table `Scpel_Threads`
--

CREATE TABLE `Scpel_Threads` (
  `ThreadID` int NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `UserID` int DEFAULT NULL,
  `ParentThreadID` int DEFAULT NULL,
  `Slug` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Scpel_Users`
--

CREATE TABLE `Scpel_Users` (
  `UserID` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `RegistrationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Scpel_Threads`
--
ALTER TABLE `Scpel_Threads`
  ADD PRIMARY KEY (`ThreadID`),
  ADD UNIQUE KEY `Slug` (`Slug`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ParentThreadID` (`ParentThreadID`);

--
-- Indexes for table `Scpel_Users`
--
ALTER TABLE `Scpel_Users`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Scpel_Threads`
--
ALTER TABLE `Scpel_Threads`
  ADD CONSTRAINT `scpel_threads_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Scpel_Users` (`UserID`),
  ADD CONSTRAINT `scpel_threads_ibfk_2` FOREIGN KEY (`ParentThreadID`) REFERENCES `Scpel_Threads` (`ThreadID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
