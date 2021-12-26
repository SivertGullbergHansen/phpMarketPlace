-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 11:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `itemownerships`
--

CREATE TABLE `itemownerships` (
  `itemOwnershipID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ownershipCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `previousOwnerIDs` varchar(256) NOT NULL,
  `ownershipChangeDate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(256) NOT NULL,
  `introduced` date NOT NULL DEFAULT current_timestamp(),
  `imageURL` varchar(255) NOT NULL,
  `Type` enum('Weapon','Wearable','Effect','Texture') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `listeditems`
--

CREATE TABLE `listeditems` (
  `ID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `price` float NOT NULL,
  `sellerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `currency` float NOT NULL,
  `picture` varchar(256) NOT NULL DEFAULT 'img/avatar/default.png',
  `session_hash` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itemownerships`
--
ALTER TABLE `itemownerships`
  ADD PRIMARY KEY (`itemOwnershipID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `itemID` (`itemID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `listeditems`
--
ALTER TABLE `listeditems`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ItemID` (`itemID`),
  ADD KEY `UserID` (`sellerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemownerships`
--
ALTER TABLE `itemownerships`
  MODIFY `itemOwnershipID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listeditems`
--
ALTER TABLE `listeditems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemownerships`
--
ALTER TABLE `itemownerships`
  ADD CONSTRAINT `itemownerships_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `itemownerships_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `items` (`ID`);

--
-- Constraints for table `listeditems`
--
ALTER TABLE `listeditems`
  ADD CONSTRAINT `ItemID` FOREIGN KEY (`itemID`) REFERENCES `items` (`ID`),
  ADD CONSTRAINT `UserID` FOREIGN KEY (`sellerID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
