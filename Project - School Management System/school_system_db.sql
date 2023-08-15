-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 04:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_table`
--

CREATE TABLE `employee_salary_table` (
  `employee_salary_id` int(11) NOT NULL,
  `employee_salary_amount` char(10) NOT NULL,
  `employee_salary_submit_date` date NOT NULL,
  `employee_salary_description` char(250) DEFAULT NULL,
  `employee_id_fk` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary_table`
--

INSERT INTO `employee_salary_table` (`employee_salary_id`, `employee_salary_amount`, `employee_salary_submit_date`, `employee_salary_description`, `employee_id_fk`) VALUES
(5, '5,000', '2018-01-01', '13123123', '8'),
(6, '2,000', '2018-01-23', '', '8'),
(8, '5,000', '2018-04-13', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `employee_id` int(11) NOT NULL,
  `employee_name` char(50) NOT NULL,
  `employee_father_name` char(50) NOT NULL,
  `employee_gender` char(50) NOT NULL,
  `employee_job_title` char(50) NOT NULL,
  `employee_salary` char(10) NOT NULL,
  `employee_date_of_birth` date NOT NULL,
  `employee_date_of_joining` date NOT NULL,
  `employee_father_cnic` char(50) NOT NULL,
  `employee_contact_number` char(50) DEFAULT NULL,
  `employee_address` char(50) DEFAULT NULL,
  `employee_status` char(50) DEFAULT 'Continue',
  `employee_description` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`employee_id`, `employee_name`, `employee_father_name`, `employee_gender`, `employee_job_title`, `employee_salary`, `employee_date_of_birth`, `employee_date_of_joining`, `employee_father_cnic`, `employee_contact_number`, `employee_address`, `employee_status`, `employee_description`) VALUES
(5, 'Hafeez', 'Ghulam Sarwar', 'Male', 'Teacher', '5,000', '1999-01-04', '2018-01-04', '12313 - 1231231 - 2', '', '', 'Leave', ''),
(9, 'Noman', 'GS', 'Male', 'Accountant', '5,000', '1996-01-04', '2018-01-10', '22222 - 2222222 - 2', '222 - 2222222', 'Loco Shed', 'Continue', NULL),
(10, 'Ali', 'M. Ali', 'Male', 'Accountant', '5,000', '1994-07-17', '2018-04-13', '12312 - 3123123 - 1', '', '', 'Continue', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `user_email` char(25) NOT NULL,
  `user_password` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `user_email`, `user_password`) VALUES
(1, 'qazihafeez2013@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `patty_cash_table`
--

CREATE TABLE `patty_cash_table` (
  `patty_cash_id` int(11) NOT NULL,
  `patty_cash_amount` char(10) NOT NULL,
  `patty_cash_date` date NOT NULL,
  `patty_cash_description` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patty_cash_table`
--

INSERT INTO `patty_cash_table` (`patty_cash_id`, `patty_cash_amount`, `patty_cash_date`, `patty_cash_description`) VALUES
(9, '2,000', '2018-01-18', ''),
(10, '200', '2018-01-18', ''),
(13, '100', '2018-04-13', 'Pens');

-- --------------------------------------------------------

--
-- Table structure for table `student_fess_table`
--

CREATE TABLE `student_fess_table` (
  `student_fess_id` int(11) NOT NULL,
  `student_fess_type` char(100) NOT NULL,
  `student_fess_amount` char(10) NOT NULL,
  `student_fess_start_date` date NOT NULL,
  `student_fess_end_date` date NOT NULL,
  `student_fess_submit_date` date NOT NULL,
  `student_fess_description` char(250) DEFAULT NULL,
  `student_id_fk` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fess_table`
--

INSERT INTO `student_fess_table` (`student_fess_id`, `student_fess_type`, `student_fess_amount`, `student_fess_start_date`, `student_fess_end_date`, `student_fess_submit_date`, `student_fess_description`, `student_id_fk`) VALUES
(5, 'Final Exam,', '500', '2018-05-05', '2018-05-15', '2018-05-10', '', '8'),
(7, 'Monthly,', '2,000', '2018-01-16', '2018-02-12', '2018-02-03', '', '7'),
(8, 'Monthly,', '500', '2018-03-13', '2018-04-13', '2018-04-09', '', '10');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `student_name` char(50) NOT NULL,
  `student_father_name` char(50) NOT NULL,
  `student_gender` char(10) NOT NULL,
  `student_class` char(10) NOT NULL,
  `student_date_of_birth` date NOT NULL,
  `student_date_of_admission` date NOT NULL,
  `student_father_cnic` char(20) NOT NULL,
  `student_contact_number` char(15) DEFAULT NULL,
  `student_address` char(250) DEFAULT NULL,
  `student_status` char(50) DEFAULT 'Continue',
  `student_description` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_id`, `student_name`, `student_father_name`, `student_gender`, `student_class`, `student_date_of_birth`, `student_date_of_admission`, `student_father_cnic`, `student_contact_number`, `student_address`, `student_status`, `student_description`) VALUES
(7, 'Reya', 'Lal Chand', 'Female', 'Two', '1994-05-24', '2018-01-05', '22222 - 2222222 - 2', '', 'Sukkur', 'Continue', NULL),
(8, 'Fatima', 'Zahid Hussain', 'Female', 'Three', '1995-10-15', '2018-01-15', '44444 - 4444444 - 4', '333 - 3333333', 'Rohri', 'Continue', ''),
(10, 'Usman', 'A Gaffar', 'Male', 'Five', '2008-01-10', '2018-01-02', '22222 - 2222222 - 2', '', '', 'Pass', ''),
(11, 'Abdul Hadi', 'Abdul Rauf', 'Male', 'Four', '2012-01-18', '2018-01-02', '22222 - 2222222 - 2', '', '', 'Leave', ''),
(12, 'Usman', 'Ghaffar', 'Male', 'Two', '2008-01-17', '2018-01-10', '22222 - 2222222 - 2', '222 - 2222222', '', 'Continue', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `time_table_class_table`
--

CREATE TABLE `time_table_class_table` (
  `time_table_class_id` int(11) NOT NULL,
  `total_rows` char(10) DEFAULT NULL,
  `row_1_cell_1` char(50) DEFAULT NULL,
  `row_1_cell_2` char(50) DEFAULT NULL,
  `row_1_cell_3` char(50) DEFAULT NULL,
  `row_1_cell_4` char(50) DEFAULT NULL,
  `row_1_cell_5` char(50) DEFAULT NULL,
  `row_1_cell_6` char(50) DEFAULT NULL,
  `row_1_cell_7` char(50) DEFAULT NULL,
  `row_2_cell_1` char(50) DEFAULT NULL,
  `row_2_cell_2` char(50) DEFAULT NULL,
  `row_2_cell_3` char(50) DEFAULT NULL,
  `row_2_cell_4` char(50) DEFAULT NULL,
  `row_2_cell_5` char(50) DEFAULT NULL,
  `row_2_cell_6` char(50) DEFAULT NULL,
  `row_2_cell_7` char(50) DEFAULT NULL,
  `row_3_cell_1` char(50) DEFAULT NULL,
  `row_3_cell_2` char(50) DEFAULT NULL,
  `row_3_cell_3` char(50) DEFAULT NULL,
  `row_3_cell_4` char(50) DEFAULT NULL,
  `row_3_cell_5` char(50) DEFAULT NULL,
  `row_3_cell_6` char(50) DEFAULT NULL,
  `row_3_cell_7` char(50) DEFAULT NULL,
  `row_6_cell_1` char(50) DEFAULT NULL,
  `row_6_cell_2` char(50) DEFAULT NULL,
  `row_6_cell_3` char(50) DEFAULT NULL,
  `row_6_cell_4` char(50) DEFAULT NULL,
  `row_6_cell_5` char(50) DEFAULT NULL,
  `row_6_cell_6` char(50) DEFAULT NULL,
  `row_6_cell_7` char(50) DEFAULT NULL,
  `row_7_cell_1` char(50) DEFAULT NULL,
  `row_7_cell_2` char(50) DEFAULT NULL,
  `row_7_cell_3` char(50) DEFAULT NULL,
  `row_7_cell_4` char(50) DEFAULT NULL,
  `row_7_cell_5` char(50) DEFAULT NULL,
  `row_7_cell_6` char(50) DEFAULT NULL,
  `row_7_cell_7` char(50) DEFAULT NULL,
  `row_8_cell_1` char(50) DEFAULT NULL,
  `row_8_cell_2` char(50) DEFAULT NULL,
  `row_8_cell_3` char(50) DEFAULT NULL,
  `row_8_cell_4` char(50) DEFAULT NULL,
  `row_8_cell_5` char(50) DEFAULT NULL,
  `row_8_cell_6` char(50) DEFAULT NULL,
  `row_8_cell_7` char(50) DEFAULT NULL,
  `row_11_cell_1` char(50) DEFAULT NULL,
  `row_11_cell_2` char(50) DEFAULT NULL,
  `row_11_cell_3` char(50) DEFAULT NULL,
  `row_11_cell_4` char(50) DEFAULT NULL,
  `row_11_cell_5` char(50) DEFAULT NULL,
  `row_11_cell_6` char(50) DEFAULT NULL,
  `row_11_cell_7` char(50) DEFAULT NULL,
  `row_12_cell_1` char(50) DEFAULT NULL,
  `row_12_cell_2` char(50) DEFAULT NULL,
  `row_12_cell_3` char(50) DEFAULT NULL,
  `row_12_cell_4` char(50) DEFAULT NULL,
  `row_12_cell_5` char(50) DEFAULT NULL,
  `row_12_cell_6` char(50) DEFAULT NULL,
  `row_12_cell_7` char(50) DEFAULT NULL,
  `row_13_cell_1` char(50) DEFAULT NULL,
  `row_13_cell_2` char(50) DEFAULT NULL,
  `row_13_cell_3` char(50) DEFAULT NULL,
  `row_13_cell_4` char(50) DEFAULT NULL,
  `row_13_cell_5` char(50) DEFAULT NULL,
  `row_13_cell_6` char(50) DEFAULT NULL,
  `row_13_cell_7` char(50) DEFAULT NULL,
  `row_16_cell_1` char(50) DEFAULT NULL,
  `row_16_cell_2` char(50) DEFAULT NULL,
  `row_16_cell_3` char(50) DEFAULT NULL,
  `row_16_cell_4` char(50) DEFAULT NULL,
  `row_16_cell_5` char(50) DEFAULT NULL,
  `row_16_cell_6` char(50) DEFAULT NULL,
  `row_16_cell_7` char(50) DEFAULT NULL,
  `row_17_cell_1` char(50) DEFAULT NULL,
  `row_17_cell_2` char(50) DEFAULT NULL,
  `row_17_cell_3` char(50) DEFAULT NULL,
  `row_17_cell_4` char(50) DEFAULT NULL,
  `row_17_cell_5` char(50) DEFAULT NULL,
  `row_17_cell_6` char(50) DEFAULT NULL,
  `row_17_cell_7` char(50) DEFAULT NULL,
  `row_18_cell_1` char(50) DEFAULT NULL,
  `row_18_cell_2` char(50) DEFAULT NULL,
  `row_18_cell_3` char(50) DEFAULT NULL,
  `row_18_cell_4` char(50) DEFAULT NULL,
  `row_18_cell_5` char(50) DEFAULT NULL,
  `row_18_cell_6` char(50) DEFAULT NULL,
  `row_18_cell_7` char(50) DEFAULT NULL,
  `row_21_cell_1` char(50) DEFAULT NULL,
  `row_21_cell_2` char(50) DEFAULT NULL,
  `row_21_cell_3` char(50) DEFAULT NULL,
  `row_21_cell_4` char(50) DEFAULT NULL,
  `row_21_cell_5` char(50) DEFAULT NULL,
  `row_21_cell_6` char(50) DEFAULT NULL,
  `row_21_cell_7` char(50) DEFAULT NULL,
  `row_22_cell_1` char(50) DEFAULT NULL,
  `row_22_cell_2` char(50) DEFAULT NULL,
  `row_22_cell_3` char(50) DEFAULT NULL,
  `row_22_cell_4` char(50) DEFAULT NULL,
  `row_22_cell_5` char(50) DEFAULT NULL,
  `row_22_cell_6` char(50) DEFAULT NULL,
  `row_22_cell_7` char(50) DEFAULT NULL,
  `row_23_cell_1` char(50) DEFAULT NULL,
  `row_23_cell_2` char(50) DEFAULT NULL,
  `row_23_cell_3` char(50) DEFAULT NULL,
  `row_23_cell_4` char(50) DEFAULT NULL,
  `row_23_cell_5` char(50) DEFAULT NULL,
  `row_23_cell_6` char(50) DEFAULT NULL,
  `row_23_cell_7` char(50) DEFAULT NULL,
  `row_26_cell_1` char(50) DEFAULT NULL,
  `row_26_cell_2` char(50) DEFAULT NULL,
  `row_26_cell_3` char(50) DEFAULT NULL,
  `row_26_cell_4` char(50) DEFAULT NULL,
  `row_26_cell_5` char(50) DEFAULT NULL,
  `row_26_cell_6` char(50) DEFAULT NULL,
  `row_26_cell_7` char(50) DEFAULT NULL,
  `row_27_cell_1` char(50) DEFAULT NULL,
  `row_27_cell_2` char(50) DEFAULT NULL,
  `row_27_cell_3` char(50) DEFAULT NULL,
  `row_27_cell_4` char(50) DEFAULT NULL,
  `row_27_cell_5` char(50) DEFAULT NULL,
  `row_27_cell_6` char(50) DEFAULT NULL,
  `row_27_cell_7` char(50) DEFAULT NULL,
  `row_28_cell_1` char(50) DEFAULT NULL,
  `row_28_cell_2` char(50) DEFAULT NULL,
  `row_28_cell_3` char(50) DEFAULT NULL,
  `row_28_cell_4` char(50) DEFAULT NULL,
  `row_28_cell_5` char(50) DEFAULT NULL,
  `row_28_cell_6` char(50) DEFAULT NULL,
  `row_28_cell_7` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_table_class_table`
--

INSERT INTO `time_table_class_table` (`time_table_class_id`, `total_rows`, `row_1_cell_1`, `row_1_cell_2`, `row_1_cell_3`, `row_1_cell_4`, `row_1_cell_5`, `row_1_cell_6`, `row_1_cell_7`, `row_2_cell_1`, `row_2_cell_2`, `row_2_cell_3`, `row_2_cell_4`, `row_2_cell_5`, `row_2_cell_6`, `row_2_cell_7`, `row_3_cell_1`, `row_3_cell_2`, `row_3_cell_3`, `row_3_cell_4`, `row_3_cell_5`, `row_3_cell_6`, `row_3_cell_7`, `row_6_cell_1`, `row_6_cell_2`, `row_6_cell_3`, `row_6_cell_4`, `row_6_cell_5`, `row_6_cell_6`, `row_6_cell_7`, `row_7_cell_1`, `row_7_cell_2`, `row_7_cell_3`, `row_7_cell_4`, `row_7_cell_5`, `row_7_cell_6`, `row_7_cell_7`, `row_8_cell_1`, `row_8_cell_2`, `row_8_cell_3`, `row_8_cell_4`, `row_8_cell_5`, `row_8_cell_6`, `row_8_cell_7`, `row_11_cell_1`, `row_11_cell_2`, `row_11_cell_3`, `row_11_cell_4`, `row_11_cell_5`, `row_11_cell_6`, `row_11_cell_7`, `row_12_cell_1`, `row_12_cell_2`, `row_12_cell_3`, `row_12_cell_4`, `row_12_cell_5`, `row_12_cell_6`, `row_12_cell_7`, `row_13_cell_1`, `row_13_cell_2`, `row_13_cell_3`, `row_13_cell_4`, `row_13_cell_5`, `row_13_cell_6`, `row_13_cell_7`, `row_16_cell_1`, `row_16_cell_2`, `row_16_cell_3`, `row_16_cell_4`, `row_16_cell_5`, `row_16_cell_6`, `row_16_cell_7`, `row_17_cell_1`, `row_17_cell_2`, `row_17_cell_3`, `row_17_cell_4`, `row_17_cell_5`, `row_17_cell_6`, `row_17_cell_7`, `row_18_cell_1`, `row_18_cell_2`, `row_18_cell_3`, `row_18_cell_4`, `row_18_cell_5`, `row_18_cell_6`, `row_18_cell_7`, `row_21_cell_1`, `row_21_cell_2`, `row_21_cell_3`, `row_21_cell_4`, `row_21_cell_5`, `row_21_cell_6`, `row_21_cell_7`, `row_22_cell_1`, `row_22_cell_2`, `row_22_cell_3`, `row_22_cell_4`, `row_22_cell_5`, `row_22_cell_6`, `row_22_cell_7`, `row_23_cell_1`, `row_23_cell_2`, `row_23_cell_3`, `row_23_cell_4`, `row_23_cell_5`, `row_23_cell_6`, `row_23_cell_7`, `row_26_cell_1`, `row_26_cell_2`, `row_26_cell_3`, `row_26_cell_4`, `row_26_cell_5`, `row_26_cell_6`, `row_26_cell_7`, `row_27_cell_1`, `row_27_cell_2`, `row_27_cell_3`, `row_27_cell_4`, `row_27_cell_5`, `row_27_cell_6`, `row_27_cell_7`, `row_28_cell_1`, `row_28_cell_2`, `row_28_cell_3`, `row_28_cell_4`, `row_28_cell_5`, `row_28_cell_6`, `row_28_cell_7`) VALUES
(1, '4', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'English', 'Math', 'Physics', 'Computer', '', '', '', 'Ali', 'Usman', 'Jabbar', 'Hafeez', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'English', 'Math', 'Physics', 'Computer', '', '', '', 'Ali', 'Usman', 'Jabbar', 'Hafeez', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'Urdu', 'Sindhi', 'Math', 'English', '', '', '', 'Fazal', 'M.', 'Usman', 'Ali', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'Urdu', 'Sindhi', 'Math', 'English', '', '', '', 'Fazal', 'M.', 'Usman', 'Ali', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'Islamiat', 'Urdu', 'Sindhi', 'Computer', '', '', '', 'Abdul', 'Fazal', 'M.', 'Hafeez', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'English', 'Computer', 'Math', 'Sindhi', '', '', '', 'Ali', 'Hafeez', 'Usman', 'M.', '', '', ''),
(2, '5', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Math', 'Sindhi', 'Physics', 'Computer', '', '', 'Ali', 'Usman', 'M. Umar', 'Jabbar', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Math', 'Sindhi', 'Physics', 'Computer', '', '', 'Ali', 'Usman', 'M. Umar', 'Jabbar', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Math', 'Sindhi', 'Physics', 'Computer', '', '', 'Ali', 'Usman', 'M. Umar', 'Jabbar', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Math', 'Sindhi', 'Physics', 'Computer', '', '', 'Ali', 'Usman', 'M. Umar', 'Jabbar', 'Computer', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'Islamiat', 'Sindhi', 'Urdu', 'Computer', '', '', '', 'Fazal', 'M. Umar', 'Usman', 'Hafeez', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Math', 'Sindhi', 'Computer', 'Islamiat', '', '', 'Ali', 'Usman', 'M. Umar', 'Hafeez', 'Fazal', '', ''),
(3, '5', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Computer', 'Islamiat', 'Urdu', 'Sindhi', '', '', 'Ali', 'Hafeez', 'Fazal', 'M. Umar', 'Usman', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Computer', 'Islamiat', 'Urdu', 'Sindhi', '', '', 'Ali', 'Hafeez', 'Fazal', 'M. Umar', 'Usman', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Computer', 'Islamiat', 'Urdu', 'Sindhi', '', '', 'Ali', 'Hafeez', 'Fazal', 'M. Umar', 'Usman', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Computer', 'Islamiat', 'Urdu', 'Sindhi', '', '', 'Ali', 'Hafeez', 'Fazal', 'M. Umar', 'Usman', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'English', 'Computer', 'Islamiat', 'Urdu', '', '', '', 'Ali', 'Hafeez', 'Fazal', 'M. Umar', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Computer', 'Islamiat', 'Urdu', 'Sindhi', '', '', 'Ali', 'Hafeez', 'Fazal', 'M. Umar', 'Usman', '', ''),
(4, '5', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Noman', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Noman', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Noman', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Noman', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'English', 'Urdu', 'Sindhi', 'Math', '', '', '', 'Ali', 'Usman', 'Noman', 'Fazal', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Noman', 'Fazal', 'Hafeez', '', ''),
(5, '5', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Ali', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Ali', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Ali', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Ali', 'Fazal', 'Hafeez', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '', '', '', 'Islamiat', 'Urdu', 'Sindhi', 'Computer', '', '', '', 'Hayder', 'Usman', '', 'Hafeez', '', '', '', '8:00 to 9:00', '9:00 to 10:00', '10:00 to 11:00', '11:00 to 12:00', '12:00 to 1:00', '', '', 'English', 'Urdu', 'Sindhi', 'Math', 'Computer', '', '', 'Ali', 'Usman', 'Ali', 'Fazal', 'Hafeez', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_salary_table`
--
ALTER TABLE `employee_salary_table`
  ADD PRIMARY KEY (`employee_salary_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patty_cash_table`
--
ALTER TABLE `patty_cash_table`
  ADD PRIMARY KEY (`patty_cash_id`);

--
-- Indexes for table `student_fess_table`
--
ALTER TABLE `student_fess_table`
  ADD PRIMARY KEY (`student_fess_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `time_table_class_table`
--
ALTER TABLE `time_table_class_table`
  ADD PRIMARY KEY (`time_table_class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_salary_table`
--
ALTER TABLE `employee_salary_table`
  MODIFY `employee_salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `patty_cash_table`
--
ALTER TABLE `patty_cash_table`
  MODIFY `patty_cash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `student_fess_table`
--
ALTER TABLE `student_fess_table`
  MODIFY `student_fess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
