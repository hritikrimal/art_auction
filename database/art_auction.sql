-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 07:19 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `artproduct`
--

CREATE TABLE `artproduct` (
  `id` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Shipping_status` varchar(255) DEFAULT NULL,
  `Size` varchar(255) DEFAULT NULL,
  `Classification` varchar(255) DEFAULT NULL,
  `Artist` varchar(255) DEFAULT NULL,
  `ArtType` varchar(255) DEFAULT NULL,
  `ArtMedium` varchar(255) DEFAULT NULL,
  `Dimension` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `ArtProduce` date DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artproduct`
--

INSERT INTO `artproduct` (`id`, `User_id`, `Title`, `Image`, `Status`, `Shipping_status`, `Size`, `Classification`, `Artist`, `ArtType`, `ArtMedium`, `Dimension`, `Price`, `ArtProduce`, `StartDate`, `StartTime`, `EndDate`, `EndTime`, `Description`) VALUES
(18, 11, 'Culpa id praesentium', 'uploads/1.avif', 'sold', 'processing', 'Large', 'animal', 'Uriel Mcdaniel', 'Carvings', 'pewter', 'In in ipsam et non o', '695.00', '2023-09-03', '2023-09-22', '13:14:00', '2023-09-22', '17:55:00', 'Harum sunt ut odit t'),
(19, 11, 'Labore aliquid neces', 'uploads/2.jpg', 'available', 'processing', 'Medium', 'still life', 'Ferris Valentine', 'Drawings', 'watercolour', 'Et enim ab tempor fa', '688.00', '2001-01-06', '2023-09-22', '22:10:00', '2023-09-25', '22:09:00', 'Delectus autem dist'),
(20, 12, 'Reprehenderit doloru', 'uploads/3.avif', 'available', 'processing', 'Large', 'still life', 'Eric Hudson', 'Drawings', 'oil', 'Vitae eos nihil dolo', '148.00', '1977-12-08', '2023-09-22', '21:35:00', '2023-09-22', '15:55:00', 'Dolorem voluptatem u');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `bid_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `bid_amount`, `status`) VALUES
(20, 10, 18, '1000.00', 'processing'),
(21, 13, 18, '1500.00', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usertype`, `status`, `username`, `firstname`, `lastname`, `email`, `address`, `password`, `CreationDate`) VALUES
(9, 'admin', 'active', 'admin', 'Acton', 'Ratliff', 'xyditahi@mailinator.com', 'Et enim sapiente vol', 'admin', '2023-09-22 11:46:05'),
(10, 'Buyer', 'active', 'bipina', 'Veda', 'Carver', 'tiqoj@mailinator.com', 'Anim qui labore ut q', 'bipina', '2023-09-22 11:53:46'),
(11, 'Seller', 'active', 'alok', 'Alok', 'Olson', 'xisene@mailinator.com', 'Labore earum dolores', 'alok', '2023-09-22 11:58:19'),
(12, 'Seller', 'active', 'kailash', 'Kailash', 'Hopkins', 'gymagyr@mailinator.com', 'Consequatur molesti', 'kailash', '2023-09-22 12:00:52'),
(13, 'Buyer', 'active', 'om', 'Om', 'Mack', 'cycilefo@mailinator.com', 'Corporis in perspici', 'om', '2023-09-22 12:00:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artproduct`
--
ALTER TABLE `artproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artproduct_ibfk_1` (`User_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_1` (`user_id`),
  ADD KEY `order_ibfk_2` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artproduct`
--
ALTER TABLE `artproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `artproduct`
--
ALTER TABLE `artproduct`
  ADD CONSTRAINT `artproduct_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `artproduct` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
