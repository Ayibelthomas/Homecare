-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 06:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_pending`
--

CREATE TABLE `booking_pending` (
  `dp_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `pid` int(15) NOT NULL,
  `bid` int(15) NOT NULL,
  `d_name` varchar(20) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `approval` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_reject`
--

CREATE TABLE `booking_reject` (
  `dp_id` int(25) NOT NULL,
  `d_id` int(11) NOT NULL,
  `pid` int(20) NOT NULL,
  `bid` int(30) NOT NULL,
  `d_name` varchar(20) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `approval` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_reject`
--

INSERT INTO `booking_reject` (`dp_id`, `d_id`, `pid`, `bid`, `d_name`, `pname`, `time`, `date`, `approval`) VALUES
(3, 22, 16, 1, 'Sidarth PS', 'ayibel', '00:00:14', '0000-00-00', 'Rejected'),
(2, 21, 16, 3, 'Imran Khan', 'ayibel', '00:00:15', '0000-00-00', 'Rejected'),
(2, 21, 16, 7, 'Imran Khan', 'ayibel', '00:00:18', '0000-00-00', 'Rejected'),
(2, 21, 16, 8, 'Imran Khan', 'ayibel', '16:53:00', '2023-12-20', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `dp_id` int(15) NOT NULL,
  `d_id` int(15) NOT NULL,
  `pid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `d_name` varchar(15) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `approval` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `dg_id` int(15) NOT NULL,
  `bid` int(10) NOT NULL,
  `d_id` int(15) NOT NULL,
  `pid` int(50) NOT NULL,
  `diagnosis_details` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`dg_id`, `bid`, `d_id`, `pid`, `diagnosis_details`) VALUES
(23, 9, 23, 16, 'flue');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `d_id` int(15) NOT NULL,
  `dp_id` int(15) NOT NULL,
  `d_name` varchar(10) NOT NULL,
  `consult_time_from` time NOT NULL,
  `consult_time_to` time NOT NULL,
  `location` varchar(15) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `fee` int(10) NOT NULL,
  `number_of_consultation` int(10) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `idproof` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `d_id`, `dp_id`, `d_name`, `consult_time_from`, `consult_time_to`, `location`, `phonenumber`, `fee`, `number_of_consultation`, `image_path`, `idproof`) VALUES
(74, 20, 1, 'Rajesh Mon', '09:05:00', '15:05:00', 'kottayam', 1234567891, 4000, 21, '6552eadfec0ef1.00648073.jpg', '0'),
(75, 21, 2, 'Imran Khan', '09:47:00', '14:00:00', 'kollam', 2147483647, 4000, 22, '65532d10c94fb0.05687466.jpg', '0'),
(76, 22, 3, 'Sidarth PS', '12:00:00', '15:00:00', 'madapally', 2147483647, 4000, 10, '65532da447fe34.25044888.jpg', '0'),
(78, 23, 1, 'jismon', '09:00:00', '15:00:00', 'changanacherry', 2147483647, 4000, 22, '655331c250c091.49682576.jpg', '0'),
(92, 29, 1, 'jensa', '05:54:00', '20:50:00', 'kilimala', 2147483647, 230, 10, '6556334199a943.20705765.jpg', '16556343b9bc5f.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_department`
--

CREATE TABLE `doctor_department` (
  `dp_id` int(15) NOT NULL,
  `dp_name` varchar(10) NOT NULL,
  `d_id` int(15) NOT NULL,
  `d_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_department`
--

INSERT INTO `doctor_department` (`dp_id`, `dp_name`, `d_id`, `d_name`) VALUES
(1, 'Cardiolagy', 20, 'Rajesh Mony'),
(2, 'Gastroente', 21, 'Imran Khan'),
(3, 'Neurology', 22, 'Sidarth PS'),
(1, 'Cardiolagy', 23, 'jismon'),
(1, 'Cardiolagy', 29, 'jensa');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(50) NOT NULL,
  `pid` int(10) NOT NULL,
  `pname` varchar(15) NOT NULL,
  `location` varchar(10) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `age` int(4) NOT NULL,
  `gender` enum('m','f','o') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `pid`, `pname`, `location`, `phonenumber`, `age`, `gender`) VALUES
(77, 15, 'aravind', 'kottaym', 1234567891, 20, 'm'),
(81, 16, 'ayibel', 'kottayam', 2147483647, 20, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(10) NOT NULL,
  `d_id` int(15) NOT NULL,
  `dp_id` int(10) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `consult_time_from` time NOT NULL,
  `consult_time_to` time NOT NULL,
  `location` varchar(15) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `fee` int(10) NOT NULL,
  `number_of_consultation` int(10) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `idproof` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescripition`
--

CREATE TABLE `prescripition` (
  `bid` int(10) NOT NULL,
  `d_id` int(15) NOT NULL,
  `pid` int(50) NOT NULL,
  `medicines` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescripition`
--

INSERT INTO `prescripition` (`bid`, `d_id`, `pid`, `medicines`) VALUES
(9, 23, 16, 'dolo550');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `typeofuser` enum('user','doctor','admin','medshop') NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `password` varchar(25) NOT NULL,
  `image_path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `username`, `typeofuser`, `email`, `gender`, `password`, `image_path`) VALUES
(44, 'chris', 'chris321', 'admin', 'chris1234@gmail.com', 'm', '7534', '165562374a50e5.jpg'),
(74, 'Rajesh Mony', 'rajesh123', 'doctor', 'rajesh@gmail.com', 'm', 'Rajesh123', '6552eadfec0ef1.00648073.jpg'),
(75, 'Imran Khan', 'imran123', 'doctor', 'khan@gmail.com', 'm', 'Imran123', '65532d10c94fb0.05687466.jpg'),
(76, 'Sidarth PS', 'Sidarth', 'doctor', 'ps@gmail.com', 'm', 'Sidarth123', '65532da447fe34.25044888.jpg'),
(77, 'aravind', 'aravind123', 'user', 'aravind@gmail.com', 'm', 'Aravind1234', '65532ed70f8c25.47430991.jpg'),
(78, 'jismon', 'jismon7', 'doctor', 'jis@gmail.com', 'm', 'Jiss1234', '655331c250c091.49682576.jpg'),
(81, 'ayibel', 'ayibel', 'user', 'asdasxas@gmail.com', 'm', 'Ayibelthomas', '165545422200d8.jpg'),
(86, 'Dony', 'dony', 'doctor', 'dom@gmail.com', 'm', 'Dony@1234', '6553b7243fd791.83318842.jpg'),
(92, 'jensa', 'jensa', 'doctor', 'jensa@gmail.com', 'm', 'Jensa@1234', '6556334199a943.20705765.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_pending`
--
ALTER TABLE `booking_pending`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `fk_d_id` (`d_id`),
  ADD KEY `fk_dp_id` (`dp_id`),
  ADD KEY `fk_pid` (`pid`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`dg_id`),
  ADD KEY `fk_1d_id` (`d_id`),
  ADD KEY `fk_bk_id` (`bid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `fk_id` (`id`);

--
-- Indexes for table `doctor_department`
--
ALTER TABLE `doctor_department`
  ADD KEY `fk_doc_id` (`d_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_registration_id` (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `prescripition`
--
ALTER TABLE `prescripition`
  ADD KEY `fk_2d_id` (`d_id`),
  ADD KEY `fk_bk1_id` (`bid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_pending`
--
ALTER TABLE `booking_pending`
  MODIFY `bid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `dg_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2371;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_registration_id` FOREIGN KEY (`id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
