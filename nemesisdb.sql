-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 05:27 PM
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
  `item_description` text NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `vote_count` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `type`, `item_name`, `item_description`, `item_price`, `item_quantity`, `goal`, `vote_count`, `timestamp`, `filename`) VALUES
(1, 'prospective', 'cake', 'cake', '12.20', 0, 20, 0, '2021-12-07 15:33:59', '/uploads/61af7ee7c74f1.jpg'),
(2, 'prospective', 'new cake', 'cake sjkadfhsjkldafh;klsdafsjkldafskldafhsjkldafhsjkdahfjk;sdalhfjklsdafhklsdahfjklsdafhsjkdafhjklsdafhsjkdalfhsjkldafhsjkdahfsjdkafhjksdafhklsdajfskldajfskldafjskldafklsdahfsjkldafhjklhkl;hkl', '2.00', 0, 5, 0, '2021-12-07 15:34:27', '/uploads/61af7f03255f9.jpg'),
(3, 'prospective', 'owl', 'owls;slajf;skldafjskldfj', '4.00', 0, 7, 0, '2021-12-07 15:38:44', '/uploads/61af8004bce60.png');

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

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `vote_to_user` (`user_id`),
  ADD KEY `vote_to_item` (`item_id`);

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

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_to_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vote_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
