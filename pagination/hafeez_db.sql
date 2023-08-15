-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 09:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hafeez_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `phone`) VALUES
(1, 'John Doe', 20, '1234567890'),
(2, 'Alice Johnson', 22, '9876543210'),
(3, 'Michael Smith', 18, '5551234567'),
(4, 'Emily Brown', 21, '9998887776'),
(5, 'David Wilson', 19, '4445556667'),
(6, 'Sarah Anderson', 20, '2223334445'),
(7, 'Daniel Davis', 22, '7778889990'),
(8, 'Olivia Taylor', 19, '3334445556'),
(9, 'Matthew Thompson', 21, '8889990001'),
(10, 'Sophia Martinez', 18, '1112223334'),
(11, 'James Rodriguez', 20, '6667778889'),
(12, 'Emma Thomas', 22, '5556667778'),
(13, 'Jacob White', 19, '2223334445'),
(14, 'Mia Harris', 21, '9998887776'),
(15, 'Ethan Clark', 20, '4445556667'),
(16, 'Ava Rodriguez', 22, '2223334445'),
(17, 'Noah Anderson', 19, '7778889990'),
(18, 'Isabella Garcia', 21, '3334445556'),
(19, 'William Davis', 18, '8889990001'),
(20, 'Charlotte Thompson', 20, '1112223334'),
(21, 'Liam Wilson', 19, '6667778889'),
(22, 'Harper Anderson', 21, '5556667778'),
(23, 'Benjamin Clark', 20, '2223334445'),
(24, 'Amelia Rodriguez', 22, '9998887776'),
(25, 'Henry Davis', 19, '4445556667'),
(26, 'Evelyn Thompson', 20, '2223334445');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
