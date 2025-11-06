-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2025 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contact_time` time DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `age`, `phone`, `website`, `gender`, `hobbies`, `country`, `birthdate`, `contact_time`, `file`, `message`, `status`) VALUES
(1, 'subhash', 'subhash2933x', 'karadiyashubhash@gamil.com', 21, '9023772127', 'https:example.com', 'Male', 'Reading, Music', 'India', '2004-08-25', '10:44:00', 'adiyogi-lord-shiva-7680x4320-14420.png', 'my name is subhash', 'Active'),
(2, 'user1', 'user@123', 'user1@gamil.com', 21, '9023772127', 'https:user1.com', 'Male', 'Reading', 'USA', '2010-07-23', '12:48:00', 'adiyogi-lord-shiva-7680x4320-14420.png', 'my name is user1', 'Pending'),
(4, 'user2', 'USER22123', 'user2@gamil.com', 19, '9023772131', 'https:user2.com', 'Female', 'Music, Sports', 'Canada', '2001-05-27', '13:17:00', 'adiyogi-lord-shiva-7680x4320-14420.png', 'my name is user2', 'Active'),
(5, 'subhash', 'subhash2933x', 'karadiyashubhash@gamil.com', 21, '9023772127', 'https:example.com', 'Male', 'Reading, Music', 'India', '2004-08-25', '10:44:00', 'adiyogi-lord-shiva-7680x4320-14420.png', 'my name is subhash', 'Pending'),
(9, 'user3', 'user3@123', 'user3@gmail.com', 25, '9977457654', 'https:user3.com', 'Male', 'Music', 'USA', '2013-06-28', '13:07:00', 'KOLORO_1662003834407.jpg', 'my name is user3', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
