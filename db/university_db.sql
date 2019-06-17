-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 12:04 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocateclassrooms`
--

CREATE TABLE `allocateclassrooms` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `day_id` varchar(255) NOT NULL,
  `startfrom` time NOT NULL,
  `endto` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocateclassrooms`
--

INSERT INTO `allocateclassrooms` (`id`, `department_id`, `course_id`, `room_id`, `day_id`, `startfrom`, `endto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(46, 9, 9, '302', 'SaturDay', '09:00:00', '13:00:00', '2017-05-05 23:15:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 9, 9, '301', 'Sunday', '09:00:00', '13:00:00', '2017-05-05 23:16:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 8, 7, '303', 'SaturDay', '09:00:00', '13:00:00', '2017-05-05 23:19:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 8, 10, '305', 'SaturDay', '09:00:00', '13:00:00', '2017-05-05 23:23:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courseassigntoteacher`
--

CREATE TABLE `courseassigntoteacher` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `courseassigntoteacher`
--

INSERT INTO `courseassigntoteacher` (`id`, `department_id`, `teacher_id`, `course_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 8, 5, 7, '2017-04-30 19:35:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 8, 6, 9, '2017-05-01 18:02:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 8, 5, 10, '2017-05-05 23:23:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_cradite` int(11) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `department_id`, `semester_id`, `course_code`, `course_name`, `course_cradite`, `course_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 8, 1, '1234567', 'first', 5, 'testing', 1, '2017-04-30 18:28:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 10, 2, '7654321', 'secend', 4, 'secound', 0, '2017-04-30 18:28:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 2, '56789', 'seo', 4, 'seo', 1, '2017-04-30 21:34:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 8, 1, 'CSE-101', 'Computer Fundamental', 5, 'Basic Computer Fundamental Course', 1, '2017-05-05 23:22:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SaturDay', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Sunday', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Monday', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Tuesday', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Wednesday', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_code` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_code`, `department_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'cse', 'computer scienc', 1, '2017-04-30 18:24:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'eee', 'electronics', 1, '2017-04-30 18:24:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'bba', 'buisness studies', 1, '2017-04-30 18:25:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', '2017-04-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'B', '2017-04-28 02:09:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'C', '2017-04-28 02:09:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enrollcourses`
--

CREATE TABLE `enrollcourses` (
  `id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roomes`
--

CREATE TABLE `roomes` (
  `id` int(11) NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomes`
--

INSERT INTO `roomes` (`id`, `room_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '302', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '301', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '303', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '304', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '305', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1st', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2nd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '3rd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '6th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '7th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '8th', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `studentresults`
--

CREATE TABLE `studentresults` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_reg_no` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_contactNo` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `department_id`, `student_name`, `student_reg_no`, `student_email`, `student_contactNo`, `student_address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 8, 'Kuntal Gupta', 'cse-2017-1', 'kuntal1230@gmail.com', '01744968888', 'Mirpur-1', 1, '2017-05-05 23:43:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 9, 'Gupta Kuntal', 'eee-2017-1', 'k.gupta1@outlook.com', '01837851230', 'mirpur-1', 1, '2017-05-05 23:43:57', '0000-00-00 00:00:00', '2017-05-05 23:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_contactNo` varchar(255) NOT NULL,
  `teacher_creditTaken` int(11) NOT NULL,
  `teacher_remainingcredit` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `designation_id`, `department_id`, `teacher_name`, `teacher_address`, `teacher_email`, `teacher_contactNo`, `teacher_creditTaken`, `teacher_remainingcredit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 8, 'kuntal', 'mirpur-1', 'kuntal@gmail.com', '123456789', 60, 32, 1, '2017-04-30 18:25:49', '2017-05-05 23:23:11', '0000-00-00 00:00:00'),
(6, 2, 8, 'gupta', 'mirpue-2', 'gupta@gmail.com', '1234567890', 30, 8, 1, '2017-04-30 18:26:48', '2017-05-01 18:02:07', '0000-00-00 00:00:00'),
(7, 3, 9, 'aaaaa', 'bbbbb', 'a@b.c', '9807989', 40, 40, 1, '2017-04-30 18:27:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocateclassrooms`
--
ALTER TABLE `allocateclassrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseassigntoteacher`
--
ALTER TABLE `courseassigntoteacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollcourses`
--
ALTER TABLE `enrollcourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomes`
--
ALTER TABLE `roomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentresults`
--
ALTER TABLE `studentresults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocateclassrooms`
--
ALTER TABLE `allocateclassrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `courseassigntoteacher`
--
ALTER TABLE `courseassigntoteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `enrollcourses`
--
ALTER TABLE `enrollcourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roomes`
--
ALTER TABLE `roomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `studentresults`
--
ALTER TABLE `studentresults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
