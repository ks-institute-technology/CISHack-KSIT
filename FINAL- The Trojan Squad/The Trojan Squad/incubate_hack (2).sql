-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 04:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `incubate_hack`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_test`
--

CREATE TABLE `basic_test` (
  `pid` int(11) NOT NULL,
  `bp_sys` int(11) NOT NULL,
  `bp_dia` int(11) NOT NULL,
  `oxy` int(11) NOT NULL,
  `pulse` int(11) NOT NULL,
  `sugar` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `basic_test`
--

INSERT INTO `basic_test` (`pid`, `bp_sys`, `bp_dia`, `oxy`, `pulse`, `sugar`, `timestamp`) VALUES
(0, 120, 80, 94, 78, 120, '0000-00-00 00:00:00'),
(0, 120, 75, 95, 56, 85, '2021-04-16 07:05:27'),
(0, 120, 75, 95, 56, 85, '2021-04-16 07:06:00'),
(2, 120, 75, 92, 78, 100, '2021-04-16 07:08:32'),
(2, 120, 75, 92, 78, 100, '2021-04-16 07:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `specialization` varchar(25) NOT NULL,
  `license_id` varchar(25) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `doctid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`fname`, `lname`, `email_id`, `contact`, `specialization`, `license_id`, `hname`, `password`, `doctid`) VALUES
('Nikitha', 'Reddy', 'nikicm26@gmail.com', '25735512', 'cardiologist', '', 'fortis', 'nik', 1),
('Kruthika', 'SV', 'vasishtkruthika@gmail.com', '123456789', 'cardiologist', '25896', 'fortis', 'krusv', 3),
('Srividya', 'HR', 'srividya@example.com', '9874563215', 'cardiologist', '85478', 'apollo', 'sri', 4),
('Ashwini', 'J', 'ashwini@example.com', '745896123', 'cardiologist', '98563', 'apollo', 'ash', 5),
('Nikhil', 'Basu', 'abcd@example.com', '8562147', 'cardiologist', '99545', 'apollo', 'qwerty', 6);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_profile`
--

CREATE TABLE `doctor_profile` (
  `blood_group` varchar(15) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `expert` varchar(10) NOT NULL,
  `skype` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `name` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`name`, `branch`, `email`, `contact`, `address`, `password`, `hid`) VALUES
('fortis', 'bg road', 'admin@fortis', '1258963', 'bg road', 'fortis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`fname`, `lname`, `dob`, `email`, `contact`, `address`, `password`, `pid`) VALUES
('Prerana', 'Sharma', '2002-06-07', 'prerana@example.com', '9874563210', 'bengaluru', 'prerana', 1),
('Anurag', 'Basu', '2000-02-08', 'anurag@example.com', '59874632', 'kolkata', 'anurag', 2),
('Navya', 'Ananth', '1998-06-11', 'navya@example.com', '8562147', 'bengaluru', 'navya', 3),
('Kavya', 'S', '1997-05-08', 'kavya@example.com', '78541263', 'bengaluru', 'kavya', 4),
('Aabha', 'K', '1992-12-11', 'aabha@example.com', '54789632', 'ujjain', 'aabha', 6);

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE `patient_profile` (
  `blood group` varchar(25) NOT NULL,
  `mp_name` varchar(30) NOT NULL,
  `mp_email` varchar(30) NOT NULL,
  `mp_contact` varchar(15) NOT NULL,
  `mp_rel` varchar(30) NOT NULL,
  `allergies` text NOT NULL,
  `med_history` text NOT NULL,
  `cur_med` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `pdf_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctid`,`email_id`),
  ADD KEY `doctid` (`doctid`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hid`,`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`,`email`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basic_test`
--
ALTER TABLE `basic_test`
  ADD CONSTRAINT `basic_test_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`doctid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
