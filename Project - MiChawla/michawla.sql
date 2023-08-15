-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 11:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `michawla`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `amount`) VALUES
(1, 21422);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `fathername` text NOT NULL,
  `contactnumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `fathername`, `contactnumber`) VALUES
(18, 'Ameet kumar', 'Ram chand', '03342701350'),
(19, 'Akshay kumar', 'Late Haresh kumar', '03332463000'),
(20, 'Haresh kumar', 'Lajpat rai', '03337366133'),
(21, 'Jagdesh Kumar ', 'Sudham Chand', '03337369100'),
(22, 'Vinod Kumar', 'Gurmukh Dass', '03337361143'),
(23, 'Om ', 'Dewan Lal', ''),
(24, 'Jeewat Ram Bhatia', '', ''),
(25, 'Ravi Kumar', 'Nand Lal', ''),
(26, 'Mukand Lal', 'Ramesh Lal', ''),
(28, 'Parshotam Lal', 'Bhagwan Dass', ''),
(29, 'Vijay Kumar', 'Lal Chand', ''),
(30, 'Raj Kumar', 'Dasi Ram', ''),
(31, 'Hashmat Rai ', 'Gurdass Mal', ''),
(32, 'Mukesh Kumar', 'Bheman Dass', ''),
(33, 'Pretam Dass', 'Bhajan Lal', ''),
(34, 'Pretam Dass ', 'Bhajan Lal', ''),
(35, 'Ashok Kumar', 'Bheman Dass', ''),
(41, 'Vishamber Lal', 'Nanik Ram', '03337369100'),
(45, 'Vishamber Lal', 'Nanik Ram', '03337369100'),
(46, 'Vishamber Lal', 'Nanik Ram', '03337369100');

-- --------------------------------------------------------

--
-- Table structure for table `dailyentery`
--

CREATE TABLE `dailyentery` (
  `id` int(11) NOT NULL,
  `lotteryid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `amount` text NOT NULL,
  `employeeid` int(11) NOT NULL,
  `paymenttype` text NOT NULL,
  `bankcode` text NOT NULL,
  `checknumber` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyentery`
--

INSERT INTO `dailyentery` (`id`, `lotteryid`, `clientid`, `amount`, `employeeid`, `paymenttype`, `bankcode`, `checknumber`, `date`) VALUES
(108, 5, 25, '1200', 2, 'Cash', '0', 0, '10-Jul-2017'),
(109, 5, 21, '12800', 2, 'Bank', 'HBL', 121, '10-Jul-2017'),
(110, 5, 24, '1200', 2, 'Cash', '0', 0, '10-Jul-2017'),
(111, 5, 30, '2000', 2, 'Cash', '0', 0, '10-Jul-2017'),
(112, 5, 29, '2000', 2, 'Cash', '0', 0, '11-Jul-2017'),
(113, 5, 29, '2222', 2, 'Bank', 'ssss', 5555, '11-Jul-2017');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `userType` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `userType`, `password`, `status`) VALUES
(1, 'Mehandr', 'Admin', '258963', 'Open'),
(2, 'Avinash', 'Employee', '123456', 'Open'),
(3, 'Vishamber Lal', 'Employee', '2222', 'Open'),
(4, 'Vishal', 'Employee', '12345', 'Open'),
(5, 'Vishal Katria', 'Employee', '123', 'Open'),
(6, 'Vishamber', 'Admin', '123456', 'Open'),
(7, 'Saleem', 'Employee', '123', 'Open'),
(8, 'Mahendar Chawla', 'Super Admin', 'M@123456', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `lottery`
--

CREATE TABLE `lottery` (
  `id` int(11) NOT NULL,
  `loteryName` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `startingDate` varchar(50) DEFAULT NULL,
  `endingDate` varchar(50) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lottery`
--

INSERT INTO `lottery` (`id`, `loteryName`, `amount`, `startingDate`, `endingDate`, `status`) VALUES
(5, 'a 10', 1000000, '2017-02-10', '2018-10-10', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `lotterymember`
--

CREATE TABLE `lotterymember` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `lotteryid` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lotterymember`
--

INSERT INTO `lotterymember` (`id`, `memberid`, `lotteryid`, `type`) VALUES
(41, 18, 5, 'Full'),
(42, 19, 5, 'Full'),
(43, 20, 5, 'Full'),
(44, 21, 5, 'Full'),
(45, 22, 5, 'Full'),
(46, 23, 5, 'Full'),
(47, 24, 5, 'Full'),
(48, 25, 5, 'Full'),
(49, 26, 5, 'Full'),
(51, 28, 5, 'Full'),
(52, 29, 5, 'Full'),
(53, 30, 5, 'Full'),
(54, 31, 5, 'Full'),
(55, 32, 5, 'Full'),
(56, 33, 5, 'Full'),
(57, 34, 5, 'Full'),
(58, 35, 5, 'Full'),
(64, 41, 5, 'Full'),
(68, 45, 5, 'Full'),
(69, 46, 5, 'Full');

-- --------------------------------------------------------

--
-- Table structure for table `lotteryprofit`
--

CREATE TABLE `lotteryprofit` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `lotteryid` int(11) NOT NULL,
  `profit` double NOT NULL,
  `date` text NOT NULL,
  `wakeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lotteryprofit`
--

INSERT INTO `lotteryprofit` (`id`, `memberid`, `lotteryid`, `profit`, `date`, `wakeid`) VALUES
(163, 18, 5, 500, '05-Jul-2017', 30),
(164, 19, 5, 500, '05-Jul-2017', 30),
(165, 20, 5, 500, '05-Jul-2017', 30),
(166, 21, 5, 500, '05-Jul-2017', 30),
(167, 22, 5, 500, '05-Jul-2017', 30),
(168, 23, 5, 500, '05-Jul-2017', 30),
(169, 24, 5, 500, '05-Jul-2017', 30),
(170, 25, 5, 500, '05-Jul-2017', 30),
(171, 26, 5, 500, '05-Jul-2017', 30),
(172, 28, 5, 500, '05-Jul-2017', 30),
(173, 29, 5, 500, '05-Jul-2017', 30),
(174, 30, 5, 500, '05-Jul-2017', 30),
(175, 31, 5, 500, '05-Jul-2017', 30),
(176, 32, 5, 500, '05-Jul-2017', 30),
(177, 33, 5, 500, '05-Jul-2017', 30),
(178, 34, 5, 500, '05-Jul-2017', 30),
(179, 35, 5, 500, '05-Jul-2017', 30),
(180, 41, 5, 500, '05-Jul-2017', 30),
(181, 45, 5, 500, '05-Jul-2017', 30),
(182, 46, 5, 500, '05-Jul-2017', 30);

-- --------------------------------------------------------

--
-- Table structure for table `lotterywake`
--

CREATE TABLE `lotterywake` (
  `id` int(11) NOT NULL,
  `lotteryid` int(11) NOT NULL,
  `wakeamount` double NOT NULL,
  `admincommsion` double NOT NULL,
  `wakedate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lotterywake`
--

INSERT INTO `lotterywake` (`id`, `lotteryid`, `wakeamount`, `admincommsion`, `wakedate`) VALUES
(30, 5, 12000, 2000, '05-Jul-2017');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `id` int(11) NOT NULL,
  `lottteryid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `paymentype` text NOT NULL,
  `amount` double NOT NULL,
  `banknumber` int(11) NOT NULL,
  `checknumber` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wakemember`
--

CREATE TABLE `wakemember` (
  `id` int(11) NOT NULL,
  `walkid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `perce` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wakemember`
--

INSERT INTO `wakemember` (`id`, `walkid`, `memberid`, `perce`) VALUES
(5, 29, 19, 35),
(7, 30, 18, 25),
(8, 30, 28, 75);

-- --------------------------------------------------------

--
-- Table structure for table `walkpaymnet`
--

CREATE TABLE `walkpaymnet` (
  `id` int(11) NOT NULL,
  `lotteryid` int(11) NOT NULL,
  `walkid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date` text NOT NULL,
  `type` text NOT NULL,
  `bankname` text NOT NULL,
  `checknumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walkpaymnet`
--

INSERT INTO `walkpaymnet` (`id`, `lotteryid`, `walkid`, `memberid`, `amount`, `date`, `type`, `bankname`, `checknumber`) VALUES
(16, 5, 30, 18, 12000, '05-Jul-2017', 'Cash', '  ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyentery`
--
ALTER TABLE `dailyentery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lotterymember`
--
ALTER TABLE `lotterymember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lotteryprofit`
--
ALTER TABLE `lotteryprofit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lotterywake`
--
ALTER TABLE `lotterywake`
  ADD PRIMARY KEY (`id`,`lotteryid`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wakemember`
--
ALTER TABLE `wakemember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walkpaymnet`
--
ALTER TABLE `walkpaymnet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `dailyentery`
--
ALTER TABLE `dailyentery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lottery`
--
ALTER TABLE `lottery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lotterymember`
--
ALTER TABLE `lotterymember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `lotteryprofit`
--
ALTER TABLE `lotteryprofit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `lotterywake`
--
ALTER TABLE `lotterywake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wakemember`
--
ALTER TABLE `wakemember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `walkpaymnet`
--
ALTER TABLE `walkpaymnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
