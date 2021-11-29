-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 06:32 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nemesisdb`
--
CREATE DATABASE IF NOT EXISTS `nemesisdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nemesisdb`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` text DEFAULT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `vote_count` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `filename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `type`, `item_name`, `item_description`, `item_price`, `item_quantity`, `goal`, `vote_count`, `timestamp`, `filename`) VALUES
(1, 'shopping', 'asdf', 'asfd', '1.00', 1, NULL, NULL, '2021-11-28 00:50:44', ''),
(2, 'shopping', 'chips', 'ketchup chips', '1234.00', 6, NULL, NULL, '2021-11-28 00:56:18', ''),
(3, 'shopping', 'asdf', 'asdf', '2.00', 2, NULL, NULL, '2021-11-28 01:06:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password_hash` text NOT NULL,
  `role` varchar(8) NOT NULL,
  `fullname` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `role`, `fullname`, `email`) VALUES
(22, 'Admin1', '$2y$10$Ywu9.ydY0vQtr8Qc6CfmveZX9grj2yLVsIjCqqLx/oj0fCsFXMrGm', 'admin', 'Shaundel Celestin', 'alihsz2002@gmail.com'),
(23, 'Admin2', '$2y$10$28MuL.4OA1X6LGguJNDVmufDb/xXeVuZT083YZnjpHZ4lw5fL2m2K', 'admin', 'Raymond Marshall', 'ray@gmail.com'),
(24, 'a', '$2y$10$6aEgMCi6Atxk1wgITJln.uk.VlmkTnuhXm4AkNVDJy7Uei4zgV8nS', 'customer', NULL, 'a@a.gov'),
(25, 'asd', '$2y$10$CKGJu6BEjFoLiAGF.B3cme6ptsyuYWRxOWhe3WmO.RANS9box5UiW', 'customer', NULL, 'b@b.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
