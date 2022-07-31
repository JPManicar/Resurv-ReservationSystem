-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 04:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resurvdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(5) NOT NULL,
  `reserv_id` int(5) NOT NULL,
  `table_id` int(5) NOT NULL,
  `order_set` int(5) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_table`
--

CREATE TABLE `reservation_table` (
  `resurv_id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `table_id` int(10) DEFAULT NULL,
  `num_guests` int(11) NOT NULL,
  `resurv_date` date NOT NULL,
  `resurv_time` time NOT NULL,
  `pre_order_menu` int(5) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation_table`
--

INSERT INTO `reservation_table` (`resurv_id`, `user_id`, `first_name`, `last_name`, `table_id`, `num_guests`, `resurv_date`, `resurv_time`, `pre_order_menu`, `comment`) VALUES
(12, 1, 'Cheszali', 'Erestain', 2, 6, '2022-07-30', '13:58:00', NULL, 'extra cheese'),
(16, 1, 'Josiah Mark', 'Palillo', 3, 4, '2022-08-04', '17:28:00', 3, ''),
(20, 1, 'Juan Paolo', 'Manicar', 1, 4, '2022-08-30', '19:24:00', 2, 'Hello'),
(24, 1, 'Juan Paolo', 'Manicar', 4, 2, '2022-07-30', '20:03:00', NULL, 'owo'),
(26, 1, 'Juan Paolo', 'Manicar', 6, 2, '2022-08-04', '02:16:00', NULL, ''),
(28, 1, 'Juan Paolo', 'Manicar', 4, 3, '2022-07-30', '21:48:00', NULL, ''),
(33, 1, 'Juan Paolo', 'Manicar', 4, 2, '2022-08-30', '13:00:00', 2, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `table_table`
--

CREATE TABLE `table_table` (
  `table_id` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_of_seats` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_table`
--

INSERT INTO `table_table` (`table_id`, `status`, `no_of_seats`) VALUES
(1, 'Reserved', 2),
(2, 'Available', 4),
(3, 'Reserved', 10),
(4, 'Available', 4),
(5, 'Reserved', 8),
(6, 'Available', 4),
(7, 'Available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `password`, `user_email`, `user_type`) VALUES
(1, 'adminUser_JP', 'adminPassword', 'jpmanicar@gmail.com', 'admin'),
(3, 'ChellyErestain', 'password', 'chelly@gmail.com', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reservation_table`
--
ALTER TABLE `reservation_table`
  ADD PRIMARY KEY (`resurv_id`);

--
-- Indexes for table `table_table`
--
ALTER TABLE `table_table`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_table`
--
ALTER TABLE `reservation_table`
  MODIFY `resurv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
