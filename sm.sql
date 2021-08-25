-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 11:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `photo`, `gender`, `phone`, `password`, `role`) VALUES
(3, 'Partho Roy', 'partho@gmail.com', 'uploads/57cea0a550a.jpg', 'Male', '', '98902634417d4ce10764eaaa35da9641', 'SuperAdmin'),
(4, 'Antu Kuri', 'antu@gmail.com', 'uploads/57cea0a550a.jpg', 'Male', '', 'c05c87f940979466d1d90d78c79183b5', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(2, 'Two'),
(3, 'Three'),
(4, 'Four'),
(5, 'Five'),
(6, 'Six'),
(7, 'Seven'),
(8, 'One');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `examName` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `examName`, `subject_id`, `time`, `duration`, `date`, `class`, `section`, `shift`) VALUES
(7, 'Mid Term', 'CSE-302', '11:10:AM', '1 Hour 30 Min', '2019-09-26', 'Five', 'B', 'Morning'),
(8, 'Mid Term', 'ENG-105', '10:10:AM', '1 Hour', '2019-09-19', 'Five', 'B', 'Day'),
(10, 'Mid Term', 'CSE-105', '11:10:AM', '1 Hour 30 Min', '2019-09-18', 'Three', 'B', 'Day'),
(11, 'Class Test', 'CSE-105', '12:20:AM', '2 Hour', '2019-09-25', 'Four', 'B', 'Morning'),
(12, 'Mid Term', 'Math-101', '10:20:AM', '1 Hour 30 Min', '2019-09-25', 'Four', 'B', 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `father`
--

CREATE TABLE `father` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `childrean` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `parents_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `father`
--

INSERT INTO `father` (`id`, `name`, `phone`, `occupation`, `email`, `password`, `childrean`, `status`, `photo`, `parents_id`) VALUES
(22, 'Barun Roy', '+8801719542834', 'Teacher', 'father@gmail.com', 'c06296eac2a5b487ae70a90addf13886', '192044038', '0', 'uploads/57cea0a550a.jpg', '57cea0'),
(23, 'Rana Alex', '+8801489878956', 'Doctor', 'alexf@gmail.com', '66d5865b51b120e48f2ae7a0a6ff43ae', '19204541656', '0', 'uploads/8725d7e344d.jpg', '8725d7'),
(24, 'Barun Roy', '+8801489878956', 'Doctor', '', '', '1920415566445', '0', 'uploads/2f49600643e.jpg', '2f4960'),
(25, 'Islam Khan', '+8801719542834', 'Teacher', '', '', '16548782414', '0', 'uploads/89492c6405d.jpg', '89492c'),
(26, 'Islam Khan', '+8801719542834', 'Teacher', '', '', '16548782414', '0', 'uploads/8caa93866ba.jpg', '8caa93');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `reciever_id` varchar(255) NOT NULL,
  `reciever_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(25) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `sender_id`, `sender_name`, `reciever_id`, `reciever_name`, `date`, `status`, `time`) VALUES
(9, 'Hello', '11', 'Antu Kuri', '14', 'Ashraful Moyeen ', '2019-02-25 10:49:40', '0', 'February 25, 2019, 4:49 pm'),
(10, 'Hi', '14', 'Ashraful Moyeen ', '11', 'Antu Kuri', '2019-02-25 10:50:44', '0', 'February 25, 2019, 4:50 pm'),
(11, 'Hello', '11', 'Antu Kuri', '14', 'Ashraful Moyeen ', '2019-02-25 10:50:49', '0', 'February 25, 2019, 4:49 pm'),
(12, 'Hello gamer!', '16', 'Istiak Ahmed', '17', 'Arpon Ahmed', '2019-02-25 11:31:08', '0', 'February 25, 2019, 5:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `mother`
--

CREATE TABLE `mother` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `childrean` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `parents_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mother`
--

INSERT INTO `mother` (`id`, `name`, `phone`, `occupation`, `email`, `password`, `childrean`, `photo`, `status`, `parents_id`) VALUES
(21, 'Purnima Roy', '+8801785288080', 'Home Maker', 'mother@gmail.com', 'f967ecd0868b69a220973e18af6cd7d9', '192044038', 'uploads/57cea0a550af.jpg', '0', '57cea'),
(22, 'Julye Alex', '+8801785288080', 'Home Maker', '', '', '19204541656', 'uploads/8725d7e344d5.jpg', '0', '8725d'),
(23, 'Purnima Roy', '+8801785288080', 'Home Maker', '', '', '1920415566445', 'uploads/2f49600643eb.jpg', '0', '2f496'),
(24, 'Julye islam', '+8801785288080', 'Home Maker', '', '', '16548782414', 'uploads/89492c6405d8.jpg', '0', '89492'),
(25, 'Julye islam', '+8801785288080', 'Home Maker', '', '', '16548782414', 'uploads/8caa93866bac.jpg', '0', '8caa9');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heading` varchar(555) NOT NULL,
  `notice` text NOT NULL,
  `audience` varchar(255) NOT NULL,
  `submitted_by` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `date`, `heading`, `notice`, `audience`, `submitted_by`, `time`) VALUES
(28, 'September 6, 2019, 12:12 am', 'This is First Notice Heading.This is First Notice Heading.This is First Notice Heading.This is First Notice Heading.', '<p>This is Heading Paragraph</p>', 'student', 'Admin', '2019-09-05 18:17:05'),
(29, 'September 6, 2019, 12:12 am', 'This is First Notice Heading.This is First Notice Heading.This is First Notice Heading.This is First Notice Heading.', '<p>This is Heading Paragraph</p>', 'all', 'Admin', '2019-09-06 07:56:28'),
(30, 'September 6, 2019, 2:41 am', 'This is First Notice Heading This is First Notice Heading This is First Notice Heading', '<p><strong>This is First heading</strong></p><p><strong>jghjhgkhgkh</strong></p><p><a href=\"https://www.youtube.com/watch?v=ydsDukGZUJU&amp;fbclid=IwAR15aQnzAW-CEjXNJOD-hk8ybwp6a3FoZThDGFRoccIkvI_aE_gPiaN28vg\"><strong>Link</strong></a></p><p>&nbsp;</p>', 'teacher', 'Admin', '2019-09-05 20:42:04'),
(31, 'September 6, 2019, 1:47 pm', 'This is First Notice HeadingThis is First Notice HeadingThis is First Notice Heading', '<p>This is First Notice HeadingThis is First Notice HeadingThis is First Notice Heading</p><p>This is First Notice HeadingThis is First Notice HeadingThis is First Notice Heading</p><p>This is First Notice HeadingThis is First Notice HeadingThis is First Notice Heading</p>', 'parents', 'Admin', '2019-09-06 07:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `realtions`
--

CREATE TABLE `realtions` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `parents_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realtions`
--

INSERT INTO `realtions` (`id`, `student_id`, `parents_id`) VALUES
(1, '192044038', 'aa0317'),
(2, '15245894037', 'aa0317');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `examName` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `subject_id`, `student_id`, `total`, `grade`, `examName`, `year`) VALUES
(9, 'CSE-302 ', '19204541656', '100', '75', 'Class Test (1)', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `subject_id`, `class_id`, `time`, `day`, `shift`, `section`, `teacher_id`) VALUES
(14, 'ENG-105', 'Four', '12:20:AM', 'Mon', 'Morning', 'B', '8'),
(15, 'CSE-302', 'Five', '11:30:AM', 'Wed', 'Morning', 'A', '9'),
(16, 'CSE-105', 'Three', '12:40:PM', 'Mon', 'Morning', 'B', '10'),
(17, 'CSE-302', 'Three', '11:20:AM', 'Mon', 'Day', 'B', '9'),
(18, 'ENG-105', 'Three', '1:30:AM', 'Mon', 'Day', 'B', '8'),
(22, 'ENG-105', 'Five', '12:10:PM', 'Sun', 'Day', 'B', '6'),
(23, 'CSE-302', 'Five', '10:00:PM', 'Sat', 'Morning', 'B', '11'),
(24, 'CSE-302', 'Five', '11:10:AM', 'Sun', 'Morning', 'B', '11'),
(25, 'CSE-105', 'Five', '10:10:PM', 'Sat', 'Day', 'B', '11'),
(26, 'CSE-105', 'Four', '9:10:AM', 'Sat', 'Day', 'B', '11'),
(27, 'CSE-302', 'Five', '11:20:AM', 'Sun', 'Morning', 'A', '11'),
(29, 'CSE-302', 'Five', '12:20:PM', 'Mon', 'Morning', 'B', '11'),
(30, 'CSE-105', 'Four', '11:00:AM', 'Tue', 'Morning', 'B', '11'),
(31, 'CSE-105', 'Four', '10:00:PM', 'Wed', 'Morning', 'B', '11'),
(32, 'CSE-105', 'Four', '10:20:PM', 'Thu', 'Day', 'B', '11'),
(33, 'CSE-105', 'Five', '11:10:AM', 'Tue', 'Morning', 'B', '11'),
(34, 'CSE-105', 'Three', '9:00:PM', 'Sun', 'Morning', 'B', '11'),
(35, 'CSE-105', 'Three', '11:00:PM', 'Mon', 'Morning', 'B', '11'),
(36, 'CSE-105', 'Three', '11:00:PM', 'Mon', 'Morning', 'B', '11'),
(37, 'CSE-302', 'Four', '9:10:AM', 'Tue', 'Morning', 'A', '11'),
(39, 'CSE-302', 'Four', '11:20:PM', 'Wed', 'Day', 'B', '11'),
(40, 'CSE-302', 'Four', '11:20:PM', 'Wed', 'Day', 'B', '11'),
(41, 'CSE-302', 'Four', '10:00:AM', 'Sun', 'Day', 'B', '8'),
(42, 'CSE-105', 'Three', '10:10:AM', 'Sat', 'Day', 'B', '9'),
(43, 'CHEM-102', 'Three', '8:10:AM', 'Sat', 'Day', 'B', '10'),
(44, 'CHEM-102', 'Four', '11:10:AM', 'Sun', 'Morning', 'B', '8'),
(45, 'Math-101', 'Four', '2:10:AM', 'Sat', 'Morning', 'B', '10'),
(46, 'CSE-302', 'Four', '12:20:AM', 'Tue', 'Morning', 'B', '15');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `name`) VALUES
(1, 'Day'),
(2, 'Morning'),
(3, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `current_year` varchar(255) NOT NULL,
  `student_photo` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_job` varchar(255) NOT NULL,
  `father_phone` varchar(255) NOT NULL,
  `father_photo` varchar(255) NOT NULL,
  `mother_job` varchar(255) NOT NULL,
  `mother_phone` varchar(255) NOT NULL,
  `mother_photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alumni` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `father_id` varchar(255) NOT NULL,
  `mother_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `student_id`, `gender`, `dob`, `religion`, `nationality`, `address`, `blood`, `email`, `phone`, `class`, `section`, `shift`, `roll`, `admission_date`, `current_year`, `student_photo`, `father_name`, `mother_name`, `father_job`, `father_phone`, `father_photo`, `mother_job`, `mother_phone`, `mother_photo`, `password`, `alumni`, `status`, `time`, `father_id`, `mother_id`) VALUES
(43, 'Durjoy Roy', '192044038', 'Male', '2013-08-12', 'Sonaton', 'Bangladeshi', 'Thakurgaon', 'O+', 'student@gmail.com', '+8801795005235', 'Four', 'A', 'Day', '66', '16-08-2019', '2021', 'uploads/57cea0a550.jpg', 'Barun Roy', 'Purnima Roy', 'Teacher', '+8801719542834', 'uploads/57cea0a550a.jpg', 'Home Maker', '+8801785288080', 'uploads/57cea0a550af.jpg', '7deab5a95f3858c740e12ba79e030521', '0', '0', '2021-08-22 16:47:35', '57cea0', '57cea'),
(44, 'Alex ', '19204541656', 'Male', '2004-09-14', 'Islam', 'Bangladeshi', 'Dhaka', 'B+', 'alex@gmail.com', '+8801544966454', 'Four', 'B', 'Morning', '', '16-08-2019', '', 'uploads/8725d7e344.jpg', 'Rana Alex', 'Julye Alex', 'Doctor', '+8801489878956', 'uploads/8725d7e344d.jpg', 'Home Maker', '+8801785288080', 'uploads/8725d7e344d5.jpg', 'ec07151292060f66c4fc948d03afdc4c', '0', '0', '2021-08-22 16:49:28', '8725d7', '57cea'),
(45, 'partho Chandra ', '1920415566445', 'Male', '2019-08-13', 'Sonaton', 'Bangladeshi', 'Dhaka', 'O+', '', '+8801646646653', 'Two', 'B', 'Day', '', '16-08-2019', '', 'uploads/2f49600643.jpg', 'Barun Roy', 'Purnima Roy', 'Doctor', '+8801489878956', 'uploads/2f49600643e.jpg', 'Home Maker', '+8801785288080', 'uploads/2f49600643eb.jpg', '', '0', '0', '2019-08-16 20:07:00', '2f4960', '2f496'),
(46, 'Fariya islam', '16548782414', 'Female', '2019-08-07', 'Islam', 'Bangladeshi', 'Rangpur', 'O-', '', '+8801544966454', 'Three', 'A', 'Day', '', '16-08-2019', '', 'uploads/89492c6405.jpg', 'Islam Khan', 'Julye islam', 'Teacher', '+8801719542834', 'uploads/89492c6405d.jpg', 'Home Maker', '+8801785288080', 'uploads/89492c6405d8.jpg', '', '0', '0', '2019-08-16 20:09:55', '89492c', '89492'),
(47, 'Fariya islam', '16548782414', 'Female', '2019-08-07', 'Islam', 'Bangladeshi', 'Rangpur', 'O-', '', '+8801544966454', 'Three', 'A', 'Day', '', '16-08-2019', '', 'uploads/8caa93866b.jpg', 'Islam Khan', 'Julye islam', 'Teacher', '+8801719542834', 'uploads/8caa93866ba.jpg', 'Home Maker', '+8801785288080', 'uploads/8caa93866bac.jpg', '', '0', '0', '2019-08-16 20:10:56', '8caa93', '8caa9');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `teacher_id`, `year`) VALUES
('CHEM-102', 'Chemistry', '6', '2019'),
('CSE-105', 'Compiler Design', '9', '2019'),
('CSE-302', 'Networking', '8', '2019'),
('ENG-105', 'English For Today', '6', '2019'),
('Math-101', 'Math', '11', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(155) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `address`, `qualification`, `email`, `password`, `gender`, `image`) VALUES
(2, 'test Teacher2', 'Dhaka', 'BSC in CSE', 'test2@gmail.com', '626dbb03b51cfb4c851718de9930325a', 'Male', 'uploads/57cea0a550.jpg'),
(6, 'Partho Roy', 'Thakurgaon Sadar', 'BSc', 'partho@hotmail.com', 'd75e709c53885b597083c32ce28872b6', 'Male', 'uploads/57cea0a550.jpg'),
(8, 'Sampa Roy', 'Thakurgaon', 'BSC English', 'sampa@gmail.com', 'cd943cd8df5563d522089214b6deee2a', 'Female', 'uploads/57cea0a550.jpg'),
(9, 'Durjoy Roy', 'Thakurgaon Sadar', 'B.ED', 'durjoy@gmail.com', '2747f98c1c83d1e899fee6da4f8c850a', 'Male', 'uploads/57cea0a550.jpg'),
(10, 'Apu Roy', 'Dinajpur', 'Diploma', 'apu@gmail.com', '6ea2a3ae74e3fdd8007fc1f9a29ff362', 'Male', 'uploads/57cea0a550.jpg'),
(11, 'teacher1', 'Thakurgaon Sadar', 'BSC English', 'teacher1@gmail.com', '1a31911c9b27204b24cbc54dce04629b', 'Male', 'uploads/57cea0a550.jpg'),
(14, 'New  Teacher', 'Thakurgaon,Bangladesh', 'BSc In CSE', 'new@gmail.com', 'd0004b787db302f6403a009c96388c6b', 'Male', 'uploads/57cea0a550.jpg'),
(15, 'test Teacher', 'Dhaka', 'BSC in CSE', 'test@gmail.com', '19d8d206fd5a9e0ad06b223ca7e48c55', 'Male', 'uploads/57cea0a550.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `father`
--
ALTER TABLE `father`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother`
--
ALTER TABLE `mother`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtions`
--
ALTER TABLE `realtions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `father`
--
ALTER TABLE `father`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mother`
--
ALTER TABLE `mother`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `realtions`
--
ALTER TABLE `realtions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
