-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 01:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peer_tutoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `available_time`
--

CREATE TABLE `available_time` (
  `available_time_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `isBooked` tinyint(1) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_time`
--

INSERT INTO `available_time` (`available_time_id`, `date`, `start_time`, `end_time`, `isBooked`, `subject`, `student_id`) VALUES
(5, '2020-01-01', '10:10:10', '10:10:10', 0, '', 1),
(9, '2022-01-02', '15:15:15', '15:15:15', 0, '', 1),
(15, '2022-01-17', '11:57:00', '11:57:00', 1, 'MATH 10', 1),
(16, '2022-01-18', '15:42:00', '15:42:00', 1, 'MATH 10', 1),
(17, '2022-01-18', '11:33:00', '11:33:00', 1, 'MATH 10', 1),
(18, '2022-01-20', '14:17:00', '14:17:00', 1, 'MATH 57', 1),
(19, '2022-01-22', '14:23:00', '14:24:00', 1, 'MATH 57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `upmail` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `year_level` int(1) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isTutor` tinyint(1) NOT NULL,
  `isPendingApproval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `upmail`, `program`, `year_level`, `password`, `isTutor`, `isPendingApproval`) VALUES
(1, 'Caarl', 'Mate', 'cpmate@up.edu.ph', 'BS in Computer Science', 3, '202cb962ac59075b964b07152d234b70', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `title`, `program`) VALUES
(1, 'MATH 10', 'BS in Computer Science'),
(2, 'MATH 57', 'BS in Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial_session`
--

CREATE TABLE `tutorial_session` (
  `tutor_id` int(11) NOT NULL,
  `tutee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject` varchar(100) NOT NULL,
  `status` enum('ONGOING','COMPLETED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial_session`
--

INSERT INTO `tutorial_session` (`tutor_id`, `tutee_id`, `date`, `start_time`, `end_time`, `subject`, `status`) VALUES
(1, 1, '2022-01-22', '14:23:00', '14:24:00', 'MATH 57', 'COMPLETED');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_available_time`
--

CREATE TABLE `tutor_available_time` (
  `available_time_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_available_time`
--

INSERT INTO `tutor_available_time` (`available_time_id`, `tutor_id`) VALUES
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_teaches`
--

CREATE TABLE `tutor_teaches` (
  `tutor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_teaches`
--

INSERT INTO `tutor_teaches` (`tutor_id`, `subject_id`) VALUES
(1, 1),
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `available_time`
--
ALTER TABLE `available_time`
  ADD PRIMARY KEY (`available_time_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tutorial_session`
--
ALTER TABLE `tutorial_session`
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `tutee_id` (`tutee_id`);

--
-- Indexes for table `tutor_available_time`
--
ALTER TABLE `tutor_available_time`
  ADD KEY `available_time_id` (`available_time_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `tutor_teaches`
--
ALTER TABLE `tutor_teaches`
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_time`
--
ALTER TABLE `available_time`
  MODIFY `available_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_time`
--
ALTER TABLE `available_time`
  ADD CONSTRAINT `available_time_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `tutorial_session`
--
ALTER TABLE `tutorial_session`
  ADD CONSTRAINT `tutorial_session_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `tutorial_session_ibfk_2` FOREIGN KEY (`tutee_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `tutor_available_time`
--
ALTER TABLE `tutor_available_time`
  ADD CONSTRAINT `tutor_available_time_ibfk_1` FOREIGN KEY (`available_time_id`) REFERENCES `available_time` (`available_time_id`),
  ADD CONSTRAINT `tutor_available_time_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `tutor_teaches`
--
ALTER TABLE `tutor_teaches`
  ADD CONSTRAINT `tutor_teaches_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `tutor_teaches_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
