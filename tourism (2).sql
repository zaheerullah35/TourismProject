-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 12:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `tourId` int(11) NOT NULL,
  `seats` int(5) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookId`, `userId`, `tourId`, `seats`, `createdOn`, `updatedOn`) VALUES
(12, 10, 37, 10, '2020-10-16 14:05:45', '2020-10-16 14:05:45'),
(14, 10, 41, 11, '2020-10-16 14:05:58', '2020-10-16 14:05:58'),
(15, 10, 42, 55, '2020-10-16 14:06:06', '2020-10-16 14:06:06'),
(22, 21, 42, 55, '2020-10-16 14:06:06', '2020-10-16 14:06:06'),
(23, 21, 42, 55, '2020-10-16 14:06:06', '2020-10-16 14:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tourId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `placename` varchar(50) NOT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `seats` int(5) NOT NULL,
  `details` text NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tourId`, `userId`, `placename`, `departure`, `arrival`, `seats`, `details`, `createdOn`, `updatedOn`) VALUES
(36, 2, 'gilgit', '2020-10-12 23:34:00', '2020-10-24 23:34:00', 1, 'few', '2020-10-12 18:34:45', '2020-10-14 07:12:45'),
(37, 2, 'skardu', '2020-10-16 23:36:00', '2020-10-17 23:36:00', 4, 'few', '2020-10-12 18:36:31', '2020-10-12 18:36:31'),
(39, 2, 'lahore', '2020-10-07 00:11:00', '2020-10-17 00:11:00', 25, 'hiace with food', '2020-10-12 19:11:58', '2020-10-12 19:11:58'),
(41, 1, 'rawalpindi', '2020-10-16 01:43:00', '2020-10-24 01:43:00', 5, 'hiace with food', '2020-10-12 20:43:22', '2020-10-12 20:43:22'),
(42, 1, 'karachi', '2020-10-16 03:18:00', '2020-10-17 03:18:00', 33, 'high quality fuel', '2020-10-12 22:18:58', '2020-10-12 22:18:58'),
(43, 2, 'karachi', '2020-10-17 19:16:00', '2020-10-31 19:16:00', 1222, 'high quality fuel', '2020-10-16 14:17:04', '2020-10-16 14:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `createdOn`, `updatedOn`, `password`) VALUES
(2, 'zaheer@gmail.com', '2020-10-09 20:27:54', '2020-10-09 20:27:54', 'zaheer'),
(4, 'zaryab@gmail.com', '2020-10-09 22:32:27', '2020-10-09 22:32:27', 'pakistan'),
(23, 'shampi@gmail.com', '2020-10-14 11:13:58', '2020-10-14 11:13:58', 'shampi'),
(46, 'kami@gmail.com', '2020-10-15 18:11:54', '2020-10-15 18:11:54', 'kami');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `userId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `userType` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userId`, `id`, `firstName`, `lastName`, `phone`, `gender`, `userType`, `createdOn`, `updatedOn`) VALUES
(1, 4, 'zaryab', 'hussain', '03405404708', 'male', 0, '2020-10-11 20:33:59', '2020-10-11 20:33:59'),
(2, 2, 'zaheer', 'ullah', '03405404444', 'male', 0, '2020-10-11 20:33:59', '2020-10-11 20:33:59'),
(10, 23, 'shampi', 'daddi', '03214465656', 'male', 1, '2020-10-14 11:14:22', '2020-10-14 11:14:22'),
(21, 46, 'kamran', 'safdar', '03125121547', 'male', 1, '2020-10-15 18:11:54', '2020-10-15 18:11:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `userId_fk` (`userId`),
  ADD KEY `tourId_fk` (`tourId`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tourId`),
  ADD KEY `userId_fk` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `id_fk` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tourId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_profile` (`userId`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`tourId`) REFERENCES `tour` (`tourId`);

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_profile` (`userId`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
