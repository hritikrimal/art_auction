-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 09:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `AdminRegdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `UserName`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'admin', '2023-08-27 17:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblartist`
--

CREATE TABLE `tblartist` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartist`
--

INSERT INTO `tblartist` (`ID`, `Name`, `Email`, `PhoneNumber`, `CreationDate`) VALUES
(5, 'Hritik Rimal', 'daya@mailinator.com', '+1 (541) 967-2843', '2023-08-27 19:48:25'),
(6, 'Hyatt Burris', 'rymusexet@mailinator.com', '+1 (443) 894-2782', '2023-08-28 07:30:16'),
(7, 'Indira Simmons', 'nufipero@mailinator.com', '+1 (774) 828-2613', '2023-08-28 07:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblartmedium`
--

CREATE TABLE `tblartmedium` (
  `ID` int(11) NOT NULL,
  `ArtMedium` varchar(255) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartmedium`
--

INSERT INTO `tblartmedium` (`ID`, `ArtMedium`, `CreationDate`) VALUES
(2, 'Oil', '2023-08-28 04:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblartproduct`
--

CREATE TABLE `tblartproduct` (
  `ID` int(11) NOT NULL,
  `Title` varchar(225) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Classification` varchar(255) DEFAULT NULL,
  `Artist_id` int(11) DEFAULT NULL,
  `ArtType_id` int(11) DEFAULT NULL,
  `ArtMedium_id` int(11) DEFAULT NULL,
  `Dimension` varchar(50) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `ArtProduce` date NOT NULL,
  `Description` text,
  `StartDate` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartproduct`
--

INSERT INTO `tblartproduct` (`ID`, `Title`, `Image`, `Size`, `Classification`, `Artist_id`, `ArtType_id`, `ArtMedium_id`, `Dimension`, `Price`, `ArtProduce`, `Description`, `StartDate`, `StartTime`, `EndDate`, `EndTime`) VALUES
(66, 'Officia mollit repel', 'uploads/Screenshot (4).png', 'Large', 'still life', 5, 5, 2, 'Id sed dolor laboris', '238.00', '1976-09-06', 'Saepe laborum Delen', '1998-07-06', '09:21:00', '2023-09-13', '04:27:00'),
(67, 'Sed qui tempore vol', 'uploads/Screenshot (8).png', 'Large', 'still life', 6, 5, 2, 'Adipisci ea sit quia', '430.00', '1994-09-01', 'Ea dolore dolores si', '2002-03-21', '21:02:00', '2023-09-18', '08:21:00'),
(68, 'Fugiat adipisci ut c', 'uploads/Screenshot (5).png', 'Medium', 'animal', 7, 1, 2, 'Autem tempora fugiat', '846.00', '2008-08-25', 'Consequatur suscipit', '1986-11-25', '10:54:00', '2023-09-11', '11:14:00'),
(71, 'Veniam recusandae ', 'uploads/Screenshot (9).png', 'Medium', 'animal', 6, 5, 2, 'Debitis rem aspernat', '827.00', '2005-02-14', 'Repellendus Volupta', '2018-09-24', '15:43:00', '2023-09-11', '01:29:00'),
(74, 'Est incidunt in rei', 'uploads/Screenshot (154).png', 'Small', 'landscape', 6, 5, 2, 'Totam nostrud ad cup', '11.00', '2022-11-06', 'Fugiat cum amet mi', '2002-11-15', '14:32:00', '2016-08-23', '17:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblarttype`
--

CREATE TABLE `tblarttype` (
  `ID` int(11) NOT NULL,
  `ArtType` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarttype`
--

INSERT INTO `tblarttype` (`ID`, `ArtType`, `CreationDate`) VALUES
(1, 'Sculptures', '2023-08-27 19:57:07'),
(5, 'Panting', '2023-08-27 20:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `classification`, `firstname`, `lastname`, `email`, `address`, `password`, `CreationDate`) VALUES
(2, 'Buyer', 'Galena', 'Hogan', 'tifulifu@mailinator.com', 'Corrupti quam quide', '12', '2023-09-10 19:23:16'),
(6, 'Buyer', 'Deirdre', 'Cash', 'desivoly@mailinator.com', 'Qui non facilis ipsu', '123', '2023-09-10 19:30:37'),
(7, 'Buyer', 'Bryar', 'Olsen', 'kyhexojedu@mailinator.com', 'Officia nobis volupt', '147', '2023-09-10 19:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartist`
--
ALTER TABLE `tblartist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartmedium`
--
ALTER TABLE `tblartmedium`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartproduct`
--
ALTER TABLE `tblartproduct`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Artist_id` (`Artist_id`),
  ADD KEY `ArtType_id` (`ArtType_id`),
  ADD KEY `ArtMedium_id` (`ArtMedium_id`);

--
-- Indexes for table `tblarttype`
--
ALTER TABLE `tblarttype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblartist`
--
ALTER TABLE `tblartist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblartmedium`
--
ALTER TABLE `tblartmedium`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblartproduct`
--
ALTER TABLE `tblartproduct`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tblarttype`
--
ALTER TABLE `tblarttype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblartproduct`
--
ALTER TABLE `tblartproduct`
  ADD CONSTRAINT `tblartproduct_ibfk_1` FOREIGN KEY (`Artist_id`) REFERENCES `tblartist` (`ID`),
  ADD CONSTRAINT `tblartproduct_ibfk_2` FOREIGN KEY (`ArtType_id`) REFERENCES `tblarttype` (`ID`),
  ADD CONSTRAINT `tblartproduct_ibfk_3` FOREIGN KEY (`ArtMedium_id`) REFERENCES `tblartmedium` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
