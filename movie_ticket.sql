-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2022 at 02:08 PM
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
-- Database: `movie_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_timestamp`) VALUES
(5, 'action', '2022-11-01 12:22:56'),
(6, 'horror', '2022-11-01 12:23:02'),
(7, 'fantasy', '2022-11-02 12:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(10) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `movie_desc` varchar(250) NOT NULL,
  `movie_file` varchar(100) NOT NULL,
  `movie_type` int(1) NOT NULL,
  `movie_status` int(1) NOT NULL DEFAULT 1,
  `movie_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_desc`, `movie_file`, `movie_type`, `movie_status`, `movie_timestamp`) VALUES
(8, 'Batman', 'batmannnnnnnnnnn', '122382500.png', 5, 1, '2022-11-01 13:45:28'),
(9, 'Aquaman', 'Aquamanssss', '961315144.png', 5, 1, '2022-11-02 12:20:51'),
(10, 'BlackAdam', 'awdadwadwadadwad', '1156219696.png', 5, 1, '2022-11-02 12:30:49'),
(11, 'Sonic', 'ฟ้าาาาาาาาา', '1480723429.jpg', 7, 1, '2022-11-02 12:31:07'),
(12, 'Itewon Class', 'korea series', '1168704901.jpg', 5, 1, '2022-11-02 12:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(10) NOT NULL,
  `or_ownid` int(10) NOT NULL,
  `or_showtime` int(10) NOT NULL,
  `or_status` int(10) NOT NULL,
  `or_timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `or_ownid`, `or_showtime`, `or_status`, `or_timestamp`) VALUES
(1, 1, 4, 0, '2022-11-02 13:04:41'),
(2, 1, 5, 0, '2022-11-02 13:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `sh_id` int(10) NOT NULL,
  `sh_movieid` int(10) NOT NULL,
  `sh_time` varchar(100) NOT NULL,
  `sh_status` int(1) NOT NULL DEFAULT 1,
  `sh_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`sh_id`, `sh_movieid`, `sh_time`, `sh_status`, `sh_timestamp`) VALUES
(3, 8, '07:41', 1, '2022-11-02 12:41:11'),
(4, 8, '00:41', 1, '2022-11-02 12:41:14'),
(5, 11, '07:45', 1, '2022-11-02 12:41:22'),
(6, 11, '12:45', 1, '2022-11-02 12:41:25'),
(7, 10, '01:41', 1, '2022-11-02 12:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_timestamp`) VALUES
(1, 'tdev', '1234', '2022-10-31 12:12:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `movie_type` (`movie_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `or_ownid` (`or_ownid`,`or_showtime`),
  ADD KEY `or_showtime` (`or_showtime`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`sh_id`),
  ADD KEY `sh_movieid` (`sh_movieid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `sh_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`movie_type`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`or_showtime`) REFERENCES `showtime` (`sh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`or_ownid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `showtime_ibfk_1` FOREIGN KEY (`sh_movieid`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
