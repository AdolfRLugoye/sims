-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2016 at 05:19 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SIMSDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_date` date DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  KEY `fk_attendance_student1_idx` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `classroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `section` char(2) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`classroom_id`),
  KEY `fk_classroom_teacher1_idx` (`teacher_id`),
  KEY `fk_classroom_grade1_idx` (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classroom_id`, `grade_id`, `year`, `section`, `status`, `remarks`, `teacher_id`) VALUES
(1, 1, 2015, 'A', 'Active', 'Operating', 1),
(2, 1, 2015, 'B', 'Active', 'Operating', 1),
(3, 2, 2015, 'A', 'Active', 'Operating', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classroom_student`
--

CREATE TABLE IF NOT EXISTS `classroom_student` (
  `student_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  KEY `fk_classroom_student_student1_idx` (`student_id`),
  KEY `fk_classroom_student_classroom1_idx` (`classroom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `description`) VALUES
(1, 'BMath1', 'Mathematics Standard 1'),
(2, 'BMath2', 'Mathematics Standard 2'),
(3, 'BMath3', 'Mathematics Standard 3'),
(4, 'BMath4', 'Mathematics Standard 4'),
(5, 'BMath5', 'Mathematics Standard 5'),
(6, 'BMath6', 'Mathematics Standard 6'),
(7, 'BMath7', 'Mathematics Standard 7'),
(8, 'English1', 'English Standard 1'),
(9, 'English2', 'English Standard 2'),
(10, 'English3', 'English Standard 3'),
(11, 'English4', 'English Standard 4'),
(12, 'English5', 'English Standard 5'),
(13, 'English6', 'English Standard 6'),
(14, 'English7', 'English Standard 7');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_type_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  PRIMARY KEY (`exam_id`),
  KEY `fk_exam_exam_type1_idx` (`exam_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE IF NOT EXISTS `exam_result` (
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `marks` varchar(45) DEFAULT NULL,
  KEY `fk_exam_result_course1_idx` (`course_id`),
  KEY `fk_exam_result_student1_idx` (`student_id`),
  KEY `fk_exam_result_exam1_idx` (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE IF NOT EXISTS `exam_type` (
  `exam_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`exam_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `description`) VALUES
(1, 'Std1', 'Standard One'),
(2, 'Std2', 'Standard Two'),
(3, 'Std3', 'Standard Three'),
(4, 'Std4', 'Standard Four'),
(5, 'Std5', 'Standard Five'),
(6, 'Std6', 'Standard Six'),
(7, 'Std7', 'Standard Seven');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1438861000),
('m130524_201442_init', 1438861006);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `email`, `password`, `first_name`, `last_name`, `dob`, `mobile`, `status`, `last_login`) VALUES
(8, 'martin.singu@gmail.com', NULL, 'Martin', 'Mahugija', '1969-08-06', '+255688657400', 'Active', NULL),
(9, 'donald.mbeke@gmail.com', '', 'Donald', 'Mbeke', '1962-08-22', '+255763986784', 'Active', NULL),
(10, 'samuel.john@gmail.com', NULL, 'Samuel', 'John', '1942-02-03', '+255688657400', 'Active', NULL),
(11, 'daniel.richard@gmail.com', NULL, 'Daniel', 'Richard', '1962-09-11', '+255688657400', 'Active', NULL),
(13, 'chris.nehemiah@gmail.com', NULL, 'Christopher', 'Nehemiah', '0000-00-00', '+255763986784', 'Active', NULL),
(14, 'chris.nehemiah@gmail.com', NULL, 'Christopher', 'Nehemiah', '2015-08-25', '+255688657400', 'Active', NULL),
(15, 'steven.lutinga@gmail.com', NULL, 'Steven', 'Lutinga', '1971-05-11', '+255688657400', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `join_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `fk_student_parent_idx` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `dob`, `phone`, `mobile`, `parent_id`, `join_date`, `status`, `last_login`) VALUES
(2, 'charles.martin@gmail.com', NULL, 'Charles', 'Martin', 'Singu', '1992-05-11', '+255756099435', '+255756099435', 8, '2012-02-06', 'Active', NULL),
(3, 'mary.mbeke@gmail.com', NULL, 'Mary', 'Donald', 'Mbeke', '1993-07-13', '+255756099435', '+255756099435', 9, '2011-01-12', 'Active', NULL),
(4, 'ellen.samuel@gmail.com', NULL, 'Ellen', 'Samuel', 'John', '1991-05-13', '+255756099435', '+255756099435', 10, '2012-04-12', 'Active', NULL),
(5, 'ian.richard@gmail.com', NULL, 'Ian', 'Daniel', 'Richard', '1995-11-29', '+255756099435', '+255756099435', 11, '2012-03-13', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dynagrid`
--

CREATE TABLE IF NOT EXISTS `tbl_dynagrid` (
  `id` varchar(100) NOT NULL COMMENT 'Unique dynagrid setting identifier',
  `filter_id` varchar(100) DEFAULT NULL COMMENT 'Filter setting identifier',
  `sort_id` varchar(100) DEFAULT NULL COMMENT 'Sort setting identifier',
  `data` varchar(5000) DEFAULT NULL COMMENT 'Json encoded data for the dynagrid configuration',
  PRIMARY KEY (`id`),
  KEY `tbl_dynagrid_FK1` (`filter_id`),
  KEY `tbl_dynagrid_FK2` (`sort_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dynagrid personalization configuration settings';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dynagrid_dtl`
--

CREATE TABLE IF NOT EXISTS `tbl_dynagrid_dtl` (
  `id` varchar(100) NOT NULL COMMENT 'Unique dynagrid detail setting identifier',
  `category` varchar(10) NOT NULL COMMENT 'Dynagrid detail setting category "filter" or "sort"',
  `name` varchar(150) NOT NULL COMMENT 'Name to identify the dynagrid detail setting',
  `data` varchar(5000) DEFAULT NULL COMMENT 'Json encoded data for the dynagrid detail configuration',
  `dynagrid_id` varchar(100) NOT NULL COMMENT 'Related dynagrid identifier',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_dynagrid_dtl_UK1` (`name`,`category`,`dynagrid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dynagrid detail configuration settings';

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `dob`, `phone`, `mobile`, `status`, `last_login`) VALUES
(1, 'simon.kisheri@gmail.com', NULL, 'Simon', '', 'Kisheri', '1975-06-19', NULL, '+255789876543', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ado', 'rjo9rLzKYqJEqECge6nR8XBO7EWghv-G', '$2y$13$8lFcwYOq.f0psocaRD6Lb.cFUE.t/Rqkar1LDFMek17EGwayieg2W', NULL, 'arlugoye@gmail.com', 10, 1438861119, 1438861119);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `fk_classroom_grade1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classroom_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `classroom_student`
--
ALTER TABLE `classroom_student`
  ADD CONSTRAINT `fk_classroom_student_classroom1` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`classroom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classroom_student_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `fk_exam_exam_type1` FOREIGN KEY (`exam_type_id`) REFERENCES `exam_type` (`exam_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD CONSTRAINT `fk_exam_result_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exam_result_exam1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exam_result_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_parent` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_dynagrid`
--
ALTER TABLE `tbl_dynagrid`
  ADD CONSTRAINT `tbl_dynagrid_FK1` FOREIGN KEY (`filter_id`) REFERENCES `tbl_dynagrid_dtl` (`id`),
  ADD CONSTRAINT `tbl_dynagrid_FK2` FOREIGN KEY (`sort_id`) REFERENCES `tbl_dynagrid_dtl` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
