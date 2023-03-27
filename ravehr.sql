-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 11:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ravehr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `name`, `username`, `password`, `phone`, `address`, `gender`) VALUES
(1, 'John Doe', 'jdee', '6f29e5eb394b50c72b341bea4c881981', '+2348012345678', 'Abuja, Nigeria', 'Male'),
(3, 'Margo William', 'margow', '25d55ad283aa400af464c76d713c07ad', '+2347022667336', 'No, 19 MacDoe Ave, Abuja', 'Female'),
(4, 'Jane Marley', 'marley', '9bbb89263c2054d230e0f7271c8ea145', '+2348177556633', 'No. 4, John Blvd, Abuja', 'Female'),
(5, 'Test Admin', 'testadmin', 'testadmin', '12345678910', 'test admin', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(150) NOT NULL,
  `department` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `name`, `phone`, `address`, `department`, `gender`) VALUES
(1, 'John Marley', '+2348177556633', 'No. 4, John Blvd, Abuja', 'Web Development', 'Male'),
(2, 'Marilyn Monroe', '+2348143534673', 'House 15, Bloomingdale Estate, Abuja', 'UX Design', 'Female'),
(3, 'James Conley', '+2349178123672', 'Plot 16, FHA, Lugbe, Abuja', 'Mobile App Development', 'Other'),
(8, 'Martin Cane', '+2348169416978', 'Abuja Nigeria', 'Web Development', 'Male'),
(9, 'Margo Williams', '+2347022667336', 'No, 19 MacDoe Ave, Abuja', 'Mobile App Development', 'Female'),
(10, 'Ben Simons', '12234567899', 'No, 8 MacDoe Ave, Abuja', 'Web Development', 'Other'),
(11, 'John Doe', '+2348012345678', 'Abuja, Nigeria', 'Mobile App Development', 'Male'),
(12, 'Grace Flenroy', '+2349056788909', 'Abuja Nigeria', 'UX Design', 'Female'),
(13, 'Jason Coleman', '+2347062355678', 'House 27, Peachville Estate, Abuja', 'Web Development', 'Male'),
(14, 'John Doe', '+2348012345678', 'Abuja, Nigeria', 'Mobile App Development', 'Other'),
(15, 'Jerry Mikano', '12344567899', 'No 8, sirakoro crescent, Wuse 2, Abuja', 'Web Dev', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `pro_id` int(5) NOT NULL,
  `project` text NOT NULL,
  `description` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `department` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`pro_id`, `project`, `description`, `startdate`, `enddate`, `department`, `status`) VALUES
(1, 'Lessy Mart', 'An e-commerce website for Lessy Mart.', '2023-02-12', '2023-03-15', 'Web Development', 'Successfull'),
(2, 'Wakabuy', 'An e-commerce website for Wakabuy', '2023-02-17', '2023-04-17', 'Web Development', 'InProgress'),
(3, 'Roomie', 'A mobile application for renting room', '2023-02-28', '2023-08-28', 'Mobile App Development', 'Successfull'),
(14, 'Rugs & Co', 'A website for a rug distribution company', '2023-03-17', '2023-04-29', 'Web Development', 'InProgress'),
(18, 'Rave App', 'A mobile application', '2023-03-23', '2023-03-29', 'Mobile App Development', 'OverDue'),
(20, 'Test Data 1', 'Test Data 1', '2023-03-16', '2023-03-24', 'Test Data 1', 'OverDue'),
(21, 'Test Project 2', 'Test Project 2', '2023-03-24', '2023-04-24', 'Test Project 2', 'InProgress');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `sal_id` int(11) NOT NULL,
  `employee` text NOT NULL,
  `department` text NOT NULL,
  `amount` text NOT NULL,
  `payday` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_salary`
--

INSERT INTO `tbl_salary` (`sal_id`, `employee`, `department`, `amount`, `payday`, `status`) VALUES
(1, 'John Marley', 'Web Development', '$5000', '2023-03-08', 'Paid'),
(2, 'James Conley', 'Mobile App Development', '$7000', '2023-03-29', 'Due'),
(3, 'Marqouise Monroe', 'UX Design', '$3000', '2023-03-31', 'Due'),
(4, 'Test Data 1', 'Test Data 1', '$2700', '2023-03-23', 'Paid'),
(6, 'Test Data 2', 'Test Data 2', '$2700', '2023-03-24', 'Paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`sal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
