-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 10:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
  `item_price` decimal(6,2) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `vote_count` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `filename` varchar(100) DEFAULT NULL,
  `previousType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `type`, `item_name`, `item_description`, `item_price`, `item_quantity`, `goal`, `vote_count`, `timestamp`, `filename`, `previousType`) VALUES
(73, 'food', 'Nutella Pizza', 'NUTELLA & BANANA ON A TOASTED NAAN PASTRY', '4.50', 12, NULL, NULL, '2021-12-12 20:38:30', '/uploads/61b65dc6069b9.png', NULL),
(74, 'discard', 'Nutella Pizza', 'NUTELLA & BANANA ON A TOASTED NAAN PASTRY', '4.50', 0, NULL, NULL, '2021-12-12 20:38:30', '/uploads/61b65dc6069b9.png', 'food'),
(75, 'food', 'Chocolate Milk Shake', 'CHOCOLATE MILKSHAKE TOPPED WITH WHIPPED CREAM', '4.50', 15, NULL, NULL, '2021-12-12 20:39:28', '/uploads/61b65e00cb4c9.png', NULL),
(76, 'discard', 'Chocolate Milk Shake', 'CHOCOLATE MILKSHAKE TOPPED WITH WHIPPED CREAM', '4.50', 0, NULL, NULL, '2021-12-12 20:39:29', '/uploads/61b65e00cb4c9.png', 'food'),
(77, 'food', 'Samosa', 'HOT FLACKY PASTRY STUFFED WITH SPICED PATATOES', '3.00', 7, NULL, NULL, '2021-12-12 20:40:00', '/uploads/61b65e20a0352.png', NULL),
(78, 'discard', 'Samosa', 'HOT FLACKY PASTRY STUFFED WITH SPICED PATATOES', '3.00', 0, NULL, NULL, '2021-12-12 20:40:00', '/uploads/61b65e20a0352.png', 'food'),
(79, 'food', 'Nachos', 'HOUSE TOASTED SERVED WITH SALSA AND 3 CHEESE TOPPING', '7.99', 14, NULL, NULL, '2021-12-12 20:40:28', '/uploads/61b65e3c1fe32.png', NULL),
(80, 'discard', 'Nachos', 'HOUSE TOASTED SERVED WITH SALSA AND 3 CHEESE TOPPING', '7.99', 0, NULL, NULL, '2021-12-12 20:40:28', '/uploads/61b65e3c1fe32.png', 'food'),
(81, 'food', 'JUMBO Hot-Dog (Original)', 'ORIGINAL HOTDOG', '2.50', 15, NULL, NULL, '2021-12-12 20:41:01', '/uploads/61b65e5de070e.png', NULL),
(82, 'discard', 'JUMBO Hot-Dog (Original)', 'ORIGINAL HOTDOG', '2.50', 0, NULL, NULL, '2021-12-12 20:41:02', '/uploads/61b65e5de070e.png', 'food'),
(83, 'food', 'JUMBO Hot-Dog (Beef)', 'ALL BEEF HOT-DOG SERVED WITH A TOASTED BUN', '2.50', 16, NULL, NULL, '2021-12-12 20:41:29', '/uploads/61b65e78f27dd.png', NULL),
(84, 'discard', 'JUMBO Hot-Dog (Beef)', 'ALL BEEF HOT-DOG SERVED WITH A TOASTED BUN', '2.50', 0, NULL, NULL, '2021-12-12 20:41:29', '/uploads/61b65e78f27dd.png', 'food'),
(85, 'food', 'Chicken Wings', 'PERFECTLY COOKED CHICKEN WINGS PAIRD WITH SPICY MAYO', '11.99', 10, NULL, NULL, '2021-12-12 20:42:02', '/uploads/61b65e9a20272.png', NULL),
(86, 'discard', 'Chicken Wings', 'PERFECTLY COOKED CHICKEN WINGS PAIRD WITH SPICY MAYO', '11.99', 0, NULL, NULL, '2021-12-12 20:42:02', '/uploads/61b65e9a20272.png', 'food'),
(87, 'food', 'Small Pizza (Cheese)', 'PERSONAL SIZED PIZZA WITH 3 CHEESE TOPPING', '3.00', 9, NULL, NULL, '2021-12-12 20:42:31', '/uploads/61b65eb72ec24.png', NULL),
(88, 'discard', 'Small Pizza (Cheese)', 'PERSONAL SIZED PIZZA WITH 3 CHEESE TOPPING', '3.00', 0, NULL, NULL, '2021-12-12 20:42:31', '/uploads/61b65eb72ec24.png', 'food'),
(89, 'food', 'Small Pizza (Pepperoni)', 'PERSONAL SIZED PIZZA WITH PEPPERONI 3 CHEESE TOPPING', '3.25', 8, NULL, NULL, '2021-12-12 20:43:01', '/uploads/61b65ed5a761e.png', NULL),
(90, 'discard', 'Small Pizza (Pepperoni)', 'PERSONAL SIZED PIZZA WITH PEPPERONI 3 CHEESE TOPPING', '3.25', 0, NULL, NULL, '2021-12-12 20:43:01', '/uploads/61b65ed5a761e.png', 'food'),
(91, 'food', 'Spinach Dip & Naan Bread', 'PERFECTLY TOASTED NAAN BREAD SERVED W/SPINATCH DIP', '7.99', 7, NULL, NULL, '2021-12-12 20:43:35', '/uploads/61b65ef78bff0.png', NULL),
(92, 'discard', 'Spinach Dip & Naan Bread', 'PERFECTLY TOASTED NAAN BREAD SERVED W/SPINATCH DIP', '7.99', 0, NULL, NULL, '2021-12-12 20:43:35', '/uploads/61b65ef78bff0.png', 'food'),
(93, 'food', 'Mango Lassi', 'FRESH BLEND OF MANGO LIKE YOU HAVE NEVER TASTED BEFORE', '2.75', 5, NULL, NULL, '2021-12-12 20:44:07', '/uploads/61b65f17723d1.png', NULL),
(94, 'discard', 'Mango Lassi', 'FRESH BLEND OF MANGO LIKE YOU HAVE NEVER TASTED BEFORE', '2.75', 0, NULL, NULL, '2021-12-12 20:44:07', '/uploads/61b65f17723d1.png', 'food'),
(95, 'food', 'Mango Lassi', 'FRESH BLEND OF MANGO LIKE YOU HAVE NEVER TASTED BEFORE', '4.75', 8, NULL, NULL, '2021-12-12 20:44:50', '/uploads/61b65f4262fd0.png', NULL),
(96, 'discard', 'Mango Lassi', 'FRESH BLEND OF MANGO LIKE YOU HAVE NEVER TASTED BEFORE', '4.75', 0, NULL, NULL, '2021-12-12 20:44:50', '/uploads/61b65f4262fd0.png', 'food'),
(97, 'food', 'Bubble Tea', 'NEMESIS BUBBLE TEA VARIOUS FLAVORS (Strawberry , mango ,taro , honeydrew , chocolate)', '5.50', 7, NULL, NULL, '2021-12-12 20:45:22', '/uploads/61b65f62be511.png', NULL),
(98, 'discard', 'Bubble Tea', 'NEMESIS BUBBLE TEA VARIOUS FLAVORS (Strawberry , mango ,taro , honeydrew , chocolate)', '5.50', 0, NULL, NULL, '2021-12-12 20:45:23', '/uploads/61b65f62be511.png', 'food'),
(99, 'food', 'Bubble Tea', 'PERSONAL SWEET MILK TEA BOBA WITH FRESHLY PREPARED TAPIOCA', '5.50', 14, NULL, NULL, '2021-12-12 20:46:02', '/uploads/61b65f8a9f16f.png', NULL),
(100, 'discard', 'Bubble Tea', 'PERSONAL SWEET MILK TEA BOBA WITH FRESHLY PREPARED TAPIOCA', '5.50', 0, NULL, NULL, '2021-12-12 20:46:02', '/uploads/61b65f8a9f16f.png', 'food'),
(101, 'food', 'Peace Tea', 'PEACE TEA 23 FL OZ', '1.25', 9, NULL, NULL, '2021-12-12 20:46:38', '/uploads/61b65fae75e8f.png', NULL),
(102, 'discard', 'Peace Tea', 'PEACE TEA 23 FL OZ', '1.25', 0, NULL, NULL, '2021-12-12 20:46:38', '/uploads/61b65fae75e8f.png', 'food'),
(103, 'food', 'Monster Energy', 'MONSTER ENERGY DRINK', '3.00', 12, NULL, NULL, '2021-12-12 20:47:04', '/uploads/61b65fc8d3a78.png', NULL),
(104, 'discard', 'Monster Energy', 'MONSTER ENERGY DRINK', '3.00', 0, NULL, NULL, '2021-12-12 20:47:05', '/uploads/61b65fc8d3a78.png', 'food'),
(105, 'food', 'Gatorade', 'GATORADE', '3.00', 12, NULL, NULL, '2021-12-12 20:47:41', '/uploads/61b65fed88232.png', NULL),
(106, 'discard', 'Gatorade', 'GATORADE', '3.00', 0, NULL, NULL, '2021-12-12 20:47:41', '/uploads/61b65fed88232.png', 'food'),
(107, 'food', 'Naked Smoothies', 'MIGHTY MANGO, GREEN MACHINE, BERRY BLAST SMOOTHIE(S), 296 ML', '3.00', 15, NULL, NULL, '2021-12-12 20:48:12', '/uploads/61b6600c8fdd2.png', NULL),
(108, 'discard', 'Naked Smoothies', 'MIGHTY MANGO, GREEN MACHINE, BERRY BLAST SMOOTHIE(S), 296 ML', '3.00', 0, NULL, NULL, '2021-12-12 20:48:12', '/uploads/61b6600c8fdd2.png', 'food'),
(109, 'food', 'Canned drinks', 'COKE, 7UP, GINGER ALE, ICE TEA', '2.00', 12, NULL, NULL, '2021-12-12 20:48:52', '/uploads/61b6603483f79.png', NULL),
(110, 'discard', 'Canned drinks', 'COKE, 7UP, GINGER ALE, ICE TEA', '2.00', 0, NULL, NULL, '2021-12-12 20:48:52', '/uploads/61b6603483f79.png', 'food'),
(111, 'food', 'Water Bottle', 'ESKA WATER', '2.00', 12, NULL, NULL, '2021-12-12 20:49:19', '/uploads/61b6604f834b7.png', NULL),
(112, 'discard', 'Water Bottle', 'ESKA WATER', '2.00', 0, NULL, NULL, '2021-12-12 20:49:19', '/uploads/61b6604f834b7.png', 'food'),
(113, 'food', 'Limited Edition - Fanta', 'LIMITED EDITION PINEAPPLE SODA', '3.00', 15, NULL, NULL, '2021-12-12 20:49:43', '/uploads/61b66067698d1.png', NULL),
(114, 'discard', 'Limited Edition - Fanta', 'LIMITED EDITION PINEAPPLE SODA', '3.00', 0, NULL, NULL, '2021-12-12 20:49:43', '/uploads/61b66067698d1.png', 'food'),
(115, 'food', 'Sweet Girl - Caramel Carrot Ch', 'LUCIOUS CHEESECAKE FILLED WITH CHUNKS OF CARROT PILED HIGH ON A GRAHAM BASE OOZING WITH OUR SPECIAL CARAMEL BLEND ON TOP', '9.00', 5, NULL, NULL, '2021-12-12 20:50:22', '/uploads/61b6608e71980.png', NULL),
(116, 'discard', 'Sweet Girl - Caramel Carrot Ch', 'LUCIOUS CHEESECAKE FILLED WITH CHUNKS OF CARROT PILED HIGH ON A GRAHAM BASE OOZING WITH OUR SPECIAL CARAMEL BLEND ON TOP', '9.00', 0, NULL, NULL, '2021-12-12 20:50:22', '/uploads/61b6608e71980.png', 'food'),
(117, 'food', 'Sweet Girl - Dulce de Leche', 'A LIGHT, CREAMY CARAMEL CHEESECAKE LACED WITH OOUR SINFULLY DELICIOUS DULCE DE LECHE FILLING SERVED IN A DEEP DISH GRAHAM CRUMB SHELL, TOPPED WITH TOFFEE CRUNCH', '9.00', 12, NULL, NULL, '2021-12-12 20:51:01', '/uploads/61b660b512144.png', NULL),
(118, 'discard', 'Sweet Girl - Dulce de Leche', 'A LIGHT, CREAMY CARAMEL CHEESECAKE LACED WITH OOUR SINFULLY DELICIOUS DULCE DE LECHE FILLING SERVED IN A DEEP DISH GRAHAM CRUMB SHELL, TOPPED WITH TOFFEE CRUNCH', '9.00', 0, NULL, NULL, '2021-12-12 20:51:01', '/uploads/61b660b512144.png', 'food'),
(119, 'food', 'Sweet Girl - Truffle Brownie', 'THE MOST DECADENT,MOST DELICIOUS FLOURLESS CHOCOLATE TRUFFLE MADE WITH RICH CARAMEL AND LOADS OF WALNUTS, ALL SET EQUALLY DECADENT FLOURLESS CHOCOLATE BASE', '8.50', 12, NULL, NULL, '2021-12-12 20:51:59', '/uploads/61b660ef3f9cf.png', NULL),
(120, 'discard', 'Sweet Girl - Truffle Brownie', 'THE MOST DECADENT,MOST DELICIOUS FLOURLESS CHOCOLATE TRUFFLE MADE WITH RICH CARAMEL AND LOADS OF WALNUTS, ALL SET EQUALLY DECADENT FLOURLESS CHOCOLATE BASE', '8.50', 0, NULL, NULL, '2021-12-12 20:51:59', '/uploads/61b660ef3f9cf.png', 'food'),
(121, 'food', 'Sweet Girl - Mud Fight', 'BROWNIE CAKE TOPPED WITH THICK CHOCOLATE FUDGE PUDDING AND COVERED IN DARK CHOCOLATE SHAVINGS', '5.50', 12, NULL, NULL, '2021-12-12 20:52:33', '/uploads/61b6611119f2e.png', NULL),
(122, 'discard', 'Sweet Girl - Mud Fight', 'BROWNIE CAKE TOPPED WITH THICK CHOCOLATE FUDGE PUDDING AND COVERED IN DARK CHOCOLATE SHAVINGS', '5.50', 0, NULL, NULL, '2021-12-12 20:52:33', '/uploads/61b6611119f2e.png', 'food'),
(123, 'food', 'Sweet Girl - Sweet&Salty Choco', 'A DECADENT DARK COCOA, ALMOND AND CARAMEL BASE FILLED WITH OUR UNIQUE DOUBLE CHOCOLATE TRUFFLE AND PERFECTLY TOPPED WITH SALTY NUTS AND CREAMY CARAMEL', '9.00', 12, NULL, NULL, '2021-12-12 20:53:28', '/uploads/61b66148e70cd.png', NULL),
(124, 'discard', 'Sweet Girl - Sweet&Salty Choco', 'A DECADENT DARK COCOA, ALMOND AND CARAMEL BASE FILLED WITH OUR UNIQUE DOUBLE CHOCOLATE TRUFFLE AND PERFECTLY TOPPED WITH SALTY NUTS AND CREAMY CARAMEL', '9.00', 0, NULL, NULL, '2021-12-12 20:53:29', '/uploads/61b66148e70cd.png', 'food'),
(125, 'food', 'Sweet Girl - Apple Cobbler Gob', 'CINAMMON BAKED APPLES, TOASTED ALMONDS, NATURAL OATS, BROWN SUGAR, AND REAL BUTTER MAKE THIS', '6.00', 12, NULL, NULL, '2021-12-12 20:53:57', '/uploads/61b66165bffcf.png', NULL),
(126, 'discard', 'Sweet Girl - Apple Cobbler Gob', 'CINAMMON BAKED APPLES, TOASTED ALMONDS, NATURAL OATS, BROWN SUGAR, AND REAL BUTTER MAKE THIS', '6.00', 0, NULL, NULL, '2021-12-12 20:53:57', '/uploads/61b66165bffcf.png', 'food'),
(127, 'food', 'Sweet Girl - Red Velvet Cake', 'Moist red velvet cake layers with a hint of raspberry, topped with our perfect blend of much loved cream cheese icing and sprinkled with a flair of lemon zest.', '9.00', 15, NULL, NULL, '2021-12-12 20:54:25', '/uploads/61b66181d6a44.png', NULL),
(128, 'discard', 'Sweet Girl - Red Velvet Cake', 'Moist red velvet cake layers with a hint of raspberry, topped with our perfect blend of much loved cream cheese icing and sprinkled with a flair of lemon zest.', '9.00', 0, NULL, NULL, '2021-12-12 20:54:26', '/uploads/61b66181d6a44.png', 'food'),
(129, 'food', 'Sweet Girl - Carrot Caramel St', 'CARROT CAKE SANDWICHED BY YUMMY CREAM CHEESE ICING AND TOPPED WITH A PERFECT BLEND OF DOUBLE CARAMEL.', '6.00', 7, NULL, NULL, '2021-12-12 20:54:59', '/uploads/61b661a37b026.png', NULL),
(130, 'discard', 'Sweet Girl - Carrot Caramel St', 'CARROT CAKE SANDWICHED BY YUMMY CREAM CHEESE ICING AND TOPPED WITH A PERFECT BLEND OF DOUBLE CARAMEL.', '6.00', 0, NULL, NULL, '2021-12-12 20:54:59', '/uploads/61b661a37b026.png', 'food'),
(131, 'food', 'Sweet Girl - Old Fashion Choco', 'OLD FASHION 3-LAYER CHOCOLATE CAKE', '9.00', 12, NULL, NULL, '2021-12-12 20:55:27', '/uploads/61b661bf6b49b.png', NULL),
(132, 'discard', 'Sweet Girl - Old Fashion Choco', 'OLD FASHION 3-LAYER CHOCOLATE CAKE', '9.00', 0, NULL, NULL, '2021-12-12 20:55:27', '/uploads/61b661bf6b49b.png', 'food'),
(133, 'food', 'Hot chocolate', 'Creamy Hot Chocolate. A combination of cocoa powder and chocolate chips make this hot chocolate extra flavorful and delicious! Ready in minutes.', '3.50', 3, NULL, NULL, '2021-12-12 20:56:04', '/uploads/61b661e4755eb.png', NULL),
(134, 'discard', 'Hot chocolate', 'Creamy Hot Chocolate. A combination of cocoa powder and chocolate chips make this hot chocolate extra flavorful and delicious! Ready in minutes.', '3.50', 0, NULL, NULL, '2021-12-12 20:56:04', '/uploads/61b661e4755eb.png', 'food'),
(135, 'food', 'Latte', 'Rich espresso balanced with steamed milk', '3.50', 12, NULL, NULL, '2021-12-12 20:56:34', '/uploads/61b66202da0c6.png', NULL),
(136, 'discard', 'Latte', 'Rich espresso balanced with steamed milk', '3.50', 0, NULL, NULL, '2021-12-12 20:56:35', '/uploads/61b66202da0c6.png', 'food'),
(137, 'food', 'black coffee', 'Black roast coffee', '2.00', 8, NULL, NULL, '2021-12-12 20:56:57', '/uploads/61b66219d876b.png', NULL),
(138, 'discard', 'black coffee', 'Black roast coffee', '2.00', 0, NULL, NULL, '2021-12-12 20:56:58', '/uploads/61b66219d876b.png', 'food'),
(139, 'food', 'Earl gray', 'Fresh, fragrant, and flavoured with distinctive notes of citrus and bergamot,', '2.50', 5, NULL, NULL, '2021-12-12 20:57:33', '/uploads/61b6623d87f98.png', NULL),
(140, 'discard', 'Earl gray', 'Fresh, fragrant, and flavoured with distinctive notes of citrus and bergamot,', '2.50', 0, NULL, NULL, '2021-12-12 20:57:33', '/uploads/61b6623d87f98.png', 'food'),
(141, 'food', 'Lemon ginger tea', 'Fresh lemon and ginger taste', '2.50', 9, NULL, NULL, '2021-12-12 20:58:36', '/uploads/61b6627cf1f20.png', NULL),
(142, 'discard', 'Lemon ginger tea', 'Fresh lemon and ginger taste', '2.50', 0, NULL, NULL, '2021-12-12 20:58:37', '/uploads/61b6627cf1f20.png', 'food'),
(143, 'food', 'Tuxedo Cake', 'rich, creamy chocolate mousse with brownie pieces in it. with a layer of vanilla/white chocolate cream mousse', '2.50', 7, NULL, NULL, '2021-12-12 20:58:59', '/uploads/61b66293b3af2.png', NULL),
(144, 'discard', 'Tuxedo Cake', 'rich, creamy chocolate mousse with brownie pieces in it. with a layer of vanilla/white chocolate cream mousse', '2.50', 0, NULL, NULL, '2021-12-12 20:58:59', '/uploads/61b66293b3af2.png', 'food'),
(145, 'food', 'Jamaican Patties', 'Perfectly Toasted Jamican Patty', '2.00', 7, NULL, NULL, '2021-12-12 20:59:28', '/uploads/61b662b0b8be6.png', NULL),
(146, 'discard', 'Jamaican Patties', 'Perfectly Toasted Jamican Patty', '2.00', 0, NULL, NULL, '2021-12-12 20:59:29', '/uploads/61b662b0b8be6.png', 'food');

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
