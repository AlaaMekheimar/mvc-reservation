-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 05:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'alaa', 'alaa@gmail.com', '123'),
(2, 'aya', 'aya@gmail.com', '333'),
(3, 'AYA', 'a@gmail.com', '1234567'),
(4, 'omniaaaa', 'omaa@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `male`
--

CREATE TABLE `male` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male`
--

INSERT INTO `male` (`id`, `title`, `description`, `price`, `img`, `admin_id`) VALUES
(21, ' Butternut Pumpkin', 'Typesetting industry lorem Lorem Ipsum is simply dummy text of the priand. ', '$10.00', 'menu-3.png', 4),
(22, ' Lasagne', ' Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices ', '$40.00 ', 'menu-2.png', 4),
(23, ' Tokusen Wagyu ', ' Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices.', ' $39.00 ', 'menu-4.png', 4),
(24, ' Olivas Rellenas', ' Avocados with crab meat, red onion, crab salad stuffed red bell pepper and green bell pepper.', ' $25.00', 'menu-5.png', 4),
(25, ' Opu Fish ', ' Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices', ' $49.00', 'menu-6.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `number_person` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `phone`, `number_person`, `date`, `time`, `message`) VALUES
(1, 'cccc', '1111111', '2-person', '2023-08-23', '08:00pm', '222222222'),
(2, 'cc', 'ww', '2-person', '2023-08-10', '011:00am', 'ww'),
(3, 'ff', 'www', '3-person', '2023-08-03', '011:00am', 'www'),
(4, 'hh', '88', '3-person', '2023-08-09', '10:00pm', 'yyyyyyyyyyy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `male`
--
ALTER TABLE `male`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `male`
--
ALTER TABLE `male`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `male`
--
ALTER TABLE `male`
  ADD CONSTRAINT `male_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
