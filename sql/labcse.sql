-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 03:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labcse`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `bill` float NOT NULL,
  `isPaid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `userId`, `month`, `bill`, `isPaid`) VALUES
(1, 13, 'January', 1650, 1),
(2, 14, 'January', 974, 1),
(3, 13, 'February', 2045, 0),
(4, 14, 'February', 1257.5, 1),
(5, 14, 'March', 530.9, 1),
(6, 16, 'January', 2071.25, 1),
(7, 15, 'January', 652.7, 1),
(8, 19, 'January', 1551.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `adminId` int(11) NOT NULL DEFAULT 0,
  `reply` text NOT NULL DEFAULT 'No reply yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `userId`, `complaint`, `adminId`, `reply`) VALUES
(4, 14, 'I can\'t pay through Bkash. What can I do?', 1, 'We are working on it. There will be a fix very soon. Thanks for your patience.'),
(5, 16, 'I think my bill is too much. Is the calculation done correctly?', 1, 'Yes our calculations are 100% correct. If you still have any doubt you can come to our office for clarification. Thank you.'),
(6, 19, 'My meter is damaged. Can you send someone to fix it as soon as possible?', 1, 'We are sending one of our technicians to your area right now. Thanks for informing us about your problem.');

-- --------------------------------------------------------

--
-- Table structure for table `meters`
--

CREATE TABLE `meters` (
  `id` int(11) NOT NULL,
  `meter` varchar(20) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meters`
--

INSERT INTO `meters` (`id`, `meter`, `userId`) VALUES
(4, 'm1', 13),
(5, 'm2', 14),
(6, 'm3', 15),
(7, 'm4', 16),
(10, 'm5', 19);

-- --------------------------------------------------------

--
-- Table structure for table `new_applications`
--

CREATE TABLE `new_applications` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_applications`
--

INSERT INTO `new_applications` (`id`, `username`, `password`) VALUES
(13, 'sabrina', '12345'),
(14, 'mahmud', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `bill` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userId`, `month`, `bill`) VALUES
(1, 13, 'January', 1650),
(2, 14, 'January', 974),
(4, 14, 'February', 1257.5),
(5, 14, 'March', 530.9),
(6, 16, 'January', 2071.25),
(7, 15, 'January', 652.7),
(8, 19, 'January', 1551.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'siam', '12345678', 1),
(3, 'rashed', '12345678', 2),
(4, 'hasan', '12345678', 4),
(13, 'afridi', '12345', 3),
(14, 'rumman', '12345', 3),
(15, 'hamid', '12345', 3),
(16, 'rofiq', '12345', 3),
(19, 'salam', '12345', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meters`
--
ALTER TABLE `meters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_applications`
--
ALTER TABLE `new_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meters`
--
ALTER TABLE `meters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `new_applications`
--
ALTER TABLE `new_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
