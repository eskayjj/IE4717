-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 11:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studyfuel`
--
CREATE DATABASE IF NOT EXISTS `studyfuel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `studyfuel`;

-- --------------------------------------------------------

--
-- Table structure for table `canteen`
--

DROP TABLE IF EXISTS `canteen`;
CREATE TABLE `canteen` (
  `canteen_id` int(11) NOT NULL,
  `canteen` varchar(255) NOT NULL,
  `image_path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `canteen`
--

INSERT INTO `canteen` (`canteen_id`, `canteen`, `image_path`) VALUES
(1, 'Canteen 1', 'canteen1.jpg'),
(2, 'Canteen 2', 'canteen2.webp'),
(3, 'Canteen 9', 'canteen9.jpg'),
(4, 'Canteen 11', 'canteen11.jpg'),
(5, 'Canteen 14', 'canteen14.jpg'),
(6, 'Canteen 16', 'canteen16.png'),
(7, 'Tamarind Canteen', 'tamarind.jpg'),
(8, 'Cresent Canteen', 'crespion.jpg'),
(9, 'Fine Foods Canteen', 'southspine.jpg'),
(10, 'Koufu', 'northspine.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `name_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `subject` longtext NOT NULL,
  `name` longtext NOT NULL,
  `email_address` longtext NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `feedback_input` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `canteen_id` int(11) NOT NULL,
  `food_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `image_path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `canteen_id`, `food_name`, `description`, `price`, `rank`, `image_path`) VALUES
(1, 1, 'Pepperoni Pizza', 'Pepperoni pizza from Domino\'s', 10.00, 12, 'pepperonipizza.avif'),
(2, 1, 'Hawaiian Pizza', 'Hawaiian pizza from Domino\'s', 12.50, 3, 'hawaiianpizza.avif'),
(3, 2, 'Roasted Chicken Rice', 'Roasted chicken paired with fragrant, seasoned rice, infused with a blend of herbs and spices', 5.50, 0, 'chickenrice.jpg'),
(4, 2, 'Bibimbap', 'A bowl of rice topped with namul and gochujang sauce, mixed with an assortment of fresh vegetables and an egg', 7.20, 0, 'bibimbap.jpg'),
(5, 3, 'Aglio Olio', 'Linguine, perfectly coated in a luxurious blend of olive oil, garlic, and red pepper flakes, topped with parmesan cheese', 9.00, 0, 'aglioolio.jpg'),
(6, 3, 'Ayam Penyet', 'Fried chicken served with rice, sambal, slices of cucumbers, fried tofu, and tempeh', 6.30, 0, 'ayampenyet.jpg'),
(7, 4, 'Baked Rice', 'Rice with slices of chicken ham, layered with a thick coat of cheese', 7.60, 0, 'bakedrice.jpg'),
(8, 4, 'Beef Burger', 'Served on a soft toasted bun, enjoy a juicy and flavorful beef patty ground beef mixed with various seasonings such as salt, pepper and fresh herbs', 7.00, 0, 'beefburger.jpeg'),
(9, 5, 'Chicken Chop', 'Grilled chicken served with a side of crinkle cut french fries and fresh coleslaw', 8.50, 0, 'chickenchop.jpg'),
(10, 5, 'Fish & Chips', 'A combination of crispy fried cod fish and perfectly cooked chips', 10.40, 0, 'fishnchips.jpg'),
(11, 6, 'Gimbap', 'Bite sized slices of rice, wrapped in seaweed with spam, carrots and cucumber', 6.90, 0, 'gimbap.jpg'),
(12, 6, 'Egg Gravy Hor Fun', 'Wide noodles cooked with silky smooth egg gravy, topped with a mixture of fish slices and calamari', 5.00, 0, 'horfun.jpg'),
(13, 7, 'Laksa', 'Thick rice noodles with fresh prawns and fishcakes, prepared with a rich and spicy coconut soup', 4.50, 0, 'laksa.jpg'),
(14, 7, 'Nasi Briyani', 'A fragrant and flavorful rice dish infused with a blend of various spices, served with tender and succulent chicken', 8.00, 0, 'nasibriyani.jpg'),
(15, 8, 'Pork Chop Egg Fried Rice', 'Fragrant egg fried rice served with tender pork chops', 7.00, 0, 'porkchopfr.jpg'),
(16, 8, 'Prata', 'Soft and crisp flatbread, served with chicken curry', 2.00, 0, 'prata.jpg'),
(17, 9, 'Salmon Donburi', 'Steamed Japanese rice topped with fresh sashimi-grade salmon, briny salmon roe, and crispy nori seaweed', 12.50, 0, 'salmondonburi.jpg'),
(18, 9, 'Tempura Udon', 'Golden crispy shrimp and vegetable tempura served over thick cut noodles', 9.80, 0, 'tempuraudon.jpg'),
(19, 10, 'Tom Yum Soup', 'Spicy soup with a tinge of sourness, filled with fresh prawns and squid', 6.70, 0, 'tomyum.jpg'),
(20, 10, 'Xiao Long Bao', 'Small Chinese steamed buns, wrapped in a layer of thin dumpling skin filled with a flavourful broth and juicy minced pork', 6.00, 0, 'xlb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `name`, `contact_number`, `delivery_address`, `role`) VALUES
(1, 'admin', 'admin@admin.com', 'b03ddf3ca2e714a6548e7495e2a03f5e824eaac9837cd7f159c67b90fb4b7342', 'admin', 'admin', 'admin', 'admin'),
(2, 'testing02', 'testing02@test.com', 'b03ddf3ca2e714a6548e7495e2a03f5e824eaac9837cd7f159c67b90fb4b7342', 'testtwo', '98765432', 'test', 'user'),
(10, 'testing03', 'testing03@test.com', 'b03ddf3ca2e714a6548e7495e2a03f5e824eaac9837cd7f159c67b90fb4b7342', '', '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canteen`
--
ALTER TABLE `canteen`
  ADD PRIMARY KEY (`canteen_id`),
  ADD UNIQUE KEY `canteen_name` (`canteen`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `FK_user_id` (`name_id`),
  ADD KEY `FK_food_id` (`food_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `canteen_id` (`canteen_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_user` (`username`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canteen`
--
ALTER TABLE `canteen`
  MODIFY `canteen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_food_id` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`name_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `canteen_id` FOREIGN KEY (`canteen_id`) REFERENCES `canteen` (`canteen_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
