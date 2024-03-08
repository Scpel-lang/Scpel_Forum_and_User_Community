-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2024 at 11:39 PM
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
  `Name` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `UserID` int DEFAULT NULL,
  `ParentThreadID` int DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Scpel_Threads`
--

INSERT INTO `Scpel_Threads` (`ThreadID`, `Email`, `Name`, `Subject`, `Message`, `UserID`, `ParentThreadID`, `createdAt`, `updatedAt`) VALUES
(1, 'itfidele@gmail.com', 'Fidele', 'Scpel programming what is it ?', 'i&#039;m a winner', NULL, NULL, '2024-03-07 21:11:16', '2024-03-07 21:11:16'),
(2, 'itfidele@gmail.com', 'Fidele', 'Scpel programming what is it ?', 'i&#039;m a winner', NULL, NULL, '2024-03-07 21:12:48', '2024-03-07 21:12:48'),
(3, 'fidele@gmail.com', 'Fidele2', 'Is D programming friendly for beginners?', 'Birakaze wallah', NULL, NULL, '2024-03-07 21:14:58', '2024-03-07 21:14:58'),
(4, 'parfait@gmail.com', 'bimeze gute', 'Is D programming friendly for beginners?', 'asdasdasdas', NULL, NULL, '2024-03-07 21:19:09', '2024-03-07 21:19:09'),
(5, 'fidele@gmail.com', 'bimeze gute', 'iuytrewq', 'asdasdasd', NULL, NULL, '2024-03-07 21:19:47', '2024-03-07 21:19:47'),
(6, 'itfidele@gmail.com', 'bimeze gute', '56789', 'asdasdsds', NULL, NULL, '2024-03-07 21:20:35', '2024-03-07 21:20:35'),
(7, 'itfidele@gmail.com', 'bimeze gute', '56789', 'asdasdasd', NULL, NULL, '2024-03-07 21:21:39', '2024-03-07 21:21:39'),
(8, 'owner202303@gmail.com', 'Destin', 'Birakaze wallah bi ndanje', 'Bino birakaze', NULL, NULL, '2024-03-07 21:41:04', '2024-03-07 21:41:04'),
(9, 'Ibintu ni ndange', 'Ibintu ni ndange', 'Ibintu ni ndange', 'Ibintu ni ndange', NULL, NULL, '2024-03-08 00:19:01', '2024-03-08 00:19:01');

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
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ParentThreadID` (`ParentThreadID`);

--
-- Indexes for table `Scpel_Users`
--
ALTER TABLE `Scpel_Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Scpel_Threads`
--
ALTER TABLE `Scpel_Threads`
  MODIFY `ThreadID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Scpel_Users`
--
ALTER TABLE `Scpel_Users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
